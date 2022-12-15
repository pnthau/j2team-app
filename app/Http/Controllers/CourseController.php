<?php

namespace App\Http\Controllers;

use App\Http\Requests\Courses\DeleteRequest;
use App\Http\Requests\Courses\StoreRequest;
use App\Http\Requests\Courses\UpdateRequest;
use App\Models\Course;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    private static $courses = [
        ['name' => 'literature'],
        ['name' => 'math'],
        ['name' => 'chemistry'],
        ['name' => 'english'],
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        // Course::insert(static::$courses);
        $viewData = [];
        $viewData['title'] = "Courses";
        $q = "%$request->q%";
        $viewData['courses'] = Course::where('name', 'like', $q)->paginate(5)->appends(['q' => $request->q]);
        $viewData['courses']->append(['q' => $q]);
        $viewData['trashes'] = Course::onlyTrashed()->paginate($perPage = 2, $columns = ['*'], $pageName = 'trashes')->appends(['q' => $request->q]);
        return view('course.index')->with('viewData', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course.create');
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
        Course::create($createData);
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
        $viewData['course'] = Course::findOrFail(Course::decode($id));
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
        $course = Course::findOrFail(Course::decode($id));
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
        $request->validated();
        $course = Course::findOrFail(Course::decode($id));
        $course->delete();
        // Course::destroy($id);

        return redirect()->route('course.index');
    }
}
