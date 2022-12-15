<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NhapController extends Controller
{
    //
    private static $students = [
        ['firstname' => 'trung', 'lastname' =>  'hieu', 'year' => '2000-1-20', 'gender' => 1],
        ['firstname' => 'trung', 'lastname' =>  'nghia', 'year' => '2000-2-16', 'gender' => 0],
        ['firstname' => 'trung', 'lastname' =>  'tinh', 'year' => '2000-3-14', 'gender' => 1],
        ['firstname' => 'trung', 'lastname' =>  'dinh', 'year' => '2000-4-12', 'gender' => 0],
        ['firstname' => 'trung', 'lastname' =>  'thanh', 'year' => '2000-5-11', 'gender' => 1],
    ];
    private static $courses = [
        ['name' => 'literature'],
        ['name' => 'math'],
        ['name' => 'chemistry'],
        ['name' => 'english'],
    ];
}
