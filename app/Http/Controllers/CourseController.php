<?php

namespace App\Http\Controllers;

use App\Http\Requests\Courses\DeleteRequest;
use App\Http\Requests\Courses\StoreRequest;
use App\Http\Requests\Courses\UpdateRequest;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Yajra\Datatables\Datatables;

class CourseController extends Controller
{
    private $model = NULL;
    private $title = "";
    public function __construct()
    {
        $currentRoute =  Route::currentRouteName();
        $explode = explode('.', $currentRoute);
        $explode = array_map('ucfirst', $explode);
        $this->title = implode(' / ', $explode);
        View::share('title', $this->title);
        $this->model = new Course;
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
        $q = "%$request->q%";
        $viewData['courses'] = $this->model::where('name', 'like', $q)->paginate(50)->appends(['q' => $request->q]);
        $viewData['courses']->append(['q' => $q]);
        $viewData['trashes'] = $this->model::onlyTrashed()->paginate($perPage = 2, $columns = ['*'], $pageName = 'trashes')->appends(['q' => $request->q]);
        return view('course.index')->with('viewData', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewData['title'] = "Add Course";
        return view('course.create')->with('viewData', $viewData);
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
        return redirect()->route('course.index');
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
        $viewData['course'] = $this->model::findOrFail($this->model::decode($id));
        return view('course.edit')->with('viewData', $viewData);
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
        $course = $this->model::findOrFail($this->model::decode($id));
        $course->update($createData);
        return redirect()->route('course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteRequest $request, $id)
    {
        $course = $request->validated()['course'];
        $course = $this->model::findOrFail($course);
        $course->delete();

        // $this->model::destroy($id);
        $dataAPI = [];
        $dataAPI['message'] = 'destroy is successful';
        $dataAPI['status'] = true;

        return response($dataAPI);
    }

    public function api()
    {
        return Datatables::of($this->model::query())
            ->editColumn('created_at', function ($object) {
                return $object->created_format;
            })
            ->addColumn('edit', function ($object) {
                $link = route('course.edit', ['course' => $object]);
                return $link;
            })
            ->addColumn('delete', function ($object) {
                $link = route('course.destroy', ['course' => $object]);
                return $link;
            })
            ->make(true);
    }

    public function apiName(Request $request)
    {
        $search =  "%{$request->q}%";
        return $this->model->where('name', 'LIKE', $search)->get(
            [
                'id',
                'name',
            ]
        );
    }
}
