@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4 mh-100">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="header">
                    <legend>Add Student</legend>
                </div>
                <div class="content">
                    <form method="post" action="{{ route('students.store') }}" class="form-horizontal">
                        @csrf
                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="firstname">First Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="firstname" id="firstname">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="lastname">Last Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="lastname" id="lastname">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="year">Year</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="year" id="year">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="courses">Courses Name </label>
                                <div class="col-sm-10">
                                    <select name="course_id" class="selectpicker" data-title="Select Courses"
                                        data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                        @foreach ($viewData['courses'] as $course)
                                            <option value="{{ \App\Models\Course::decode($course->id) }}">
                                                {{ __($course->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="status">Status</label>
                                <div class="col-sm-10">
                                    <select name="status" class="selectpicker" data-title="Select status"
                                        data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                        @foreach ($studentsStatus as $option => $value)
                                            <option value="{{ $value }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="gender">Gender</label>
                                <div class="col-sm-10">
                                    <select name="gender" class="selectpicker" data-title="Select Gender"
                                        data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-fill btn-info">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-4"></div>
    @endsection
