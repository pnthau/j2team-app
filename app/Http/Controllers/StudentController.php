<?php

namespace App\Http\Controllers;

use App\Enums\StudentStatusEnum;
use App\Http\Requests\Students\UpdateRequest;
use App\Http\Requests\Students\DeleteRequest;
use App\Http\Requests\Students\StoreRequest;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\DataTables;

class StudentController extends Controller
{
    private $model = NULL;
    private $title = "";
    private $dirImages = "";
    public function __construct()
    {
        $this->model = new Student;

        $this->dirImages = "storage/imgs/";

        $currentRoute =  Route::currentRouteName();

        $explode = explode('.', $currentRoute);
        $explode = array_map('ucfirst', $explode);
        $this->title = implode(' / ', $explode);

        View::share('title', $this->title);
        View::share('studentsStatus', StudentStatusEnum::getStudentStatus());
        View::share('getStatusByKey', function ($key) {
            return StudentStatusEnum::getValueByKey($key);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->model->course;
        // dd($this->model::first()->course);
        // $this->model::insert(static::$courses);
        $viewData = [];
        $viewData['title'] = "Students";
        $q = "%$request->q%";
        $viewData['students'] = $this->model::where('firstname', 'like', $q)->paginate(50)->appends(['q' => $request->q]);
        $viewData['students']->append(['q' => $q]);
        $viewData['trashes'] = $this->model::onlyTrashed()->paginate($perPage = 2, $columns = ['*'], $pageName = 'trashes')->appends(['q' => $request->q]);

        return view('students.index')->with('viewData', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewData = [];
        $viewData['courses'] = Course::get([
            'name',
            'id'
        ]);
        $viewData['title'] = "Add Student";
        return view('students.create')->with('viewData', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * just get name in request and then use static create
     * redirect course.index
     */
    public function store(StoreRequest $request)
    {
        // dd($request->file('avatar'));
        // dd($request->file('avatar')->getRealPath());
        $createData = $request->validated();
        $newStudent = $this->model::create($createData);
        if ($request->hasFile('avatar')) {
            $original_image = $request->file('avatar');
            $file_path = Student::resizeAvatar($original_image, $newStudent->id);
            $newStudent->avatar = $file_path;
            $newStudent->save();
        }
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $viewData = [];
        $viewData['student'] = $this->model::findOrFail($this->model::decode($id));
        $viewData['courses']  = Course::all(['id', 'name']);
        return view('students.edit')->with('viewData', $viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $id = $this->model::decode($id);
        $createData = $request->validated();
        $student = $this->model::findOrFail($id);

        $student->update($createData);
        if ($request->hasFile('avatar')) {
            $original_image = $request->file('avatar');
            $file_path = Student::resizeAvatar($original_image, $id);
            $student->avatar = $file_path;
            $student->save();
        }

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteRequest  $request, $student)
    {
        $student = $request->validated()['student'];
        $student = $this->model::findOrFail($student);
        $student->delete();

        // $this->model::destroy($id);
        $dataAPI = [];
        $dataAPI['message'] = 'destroy is successful';
        $dataAPI['status'] = true;

        return response($dataAPI);

        return redirect()->route('students.index');
    }


    public function api()
    {
        $query = $this->model->select('students.*')
            ->addSelect('courses.name as course_name')
            ->join('courses', 'courses.id', 'students.course_id');
        //hieu xuat kem

        // $query = DB::table('students')
        //     ->leftJoin('courses', 'courses.id', '=', 'students.course_id')
        //     ->get();
        //khuyet diem la se khong nhan duoc get attribute: ex: full_name

        // $query = $this->model->loadMissing('course');

        return DataTables::of($query)
            ->addColumn('course_name', function ($object) {
                if ($object->course_name) {
                    return $object->course_name;
                }
                return "khong co";
            })
            ->editColumn('status', function ($object) {
                return $object->status;
            })
            ->addColumn('full_name', function ($object) {
                return $object->full_name;
            })
            ->editColumn('year', function ($object) {
                return $object->age;
            })
            ->editColumn('avatar', function ($object) {
                if (filter_var($object->avatar, FILTER_VALIDATE_URL)) {
                    return $object->avatar;
                }
                return asset($this->dirImages . $object->avatar);
            })
            ->addColumn('edit', function ($object) {
                $link = route('students.edit', ['student' => $object]);
                return $link;
            })
            ->addColumn('delete', function ($object) {
                $link = route('students.destroy', ['student' => $object]);
                return $link;
            })
            ->filterColumn('course_name', function ($query, $keyword) {
                if ($keyword != 'null') {
                    $query->whereHas('course', function ($q) use ($keyword) {
                        return $q->where('id', $keyword);
                    });
                }
            })
            ->filterColumn('status', function ($query, $keyword) {
                if ($keyword !== '0') {
                    $query->where('status', $keyword);
                }
            })
            ->make(true);
    }
}
