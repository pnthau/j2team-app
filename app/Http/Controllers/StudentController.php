<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'This is the student list';
        $viewData['students'] = Student::get();
        return view('home.index')->with('viewData', $viewData);
    }
    public function create()
    {
        return view('students.create');
    }
    public function store(Request $request)
    {
        $createData = $request->only(['firstname', 'lastname', 'year', 'gender']);
        Student::create($createData);
        return redirect('/');
    }
}
