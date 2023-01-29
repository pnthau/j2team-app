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

    public function __construct()
    {
        $this->model = new Student;

        $currentRoute =  Route::currentRouteName();
        $explode = explode('.', $currentRoute);
        $explode = array_map('ucfirst', $explode);
        $this->title = implode(' / ', $explode);

        View::share('title', $this->title);
        View::share('studentsStatus', StudentStatusEnum::getStudentStatus());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
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

        $createData = $request->validated();
        $this->model::create($createData);
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
        $createData = $request->validated();
        $student = $this->model::findOrFail($this->model::decode($id));
        $student->update($createData);
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
        return DataTables::of($this->model::query())
            ->editColumn('created_at', function ($object) {
                return $object->created_format;
            })
            ->addColumn('full_name', function ($object) {
                return $object->full_name;
            })
            ->editColumn('year', function ($object) {
                return $object->age;
            })
            ->addColumn('edit', function ($object) {
                $link = route('students.edit', ['student' => $object]);
                return $link;
            })
            ->addColumn('delete', function ($object) {
                $link = route('students.destroy', ['student' => $object]);
                return $link;
            })
            ->make(true);
    }
}
