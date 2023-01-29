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
                <form method="POST" action="{{ route('students.update',['student' => $viewData['student']->id]) }}"
                    class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <fieldset>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="firstname">First Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="firstname" id="firstname"
                                    value="{{ $viewData['student']->firstname}}">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="lastname">Last Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="lastname" id="lastname"
                                    value="{{ $viewData['student']->lastname}}">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="year">Year</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="year" id="year"
                                    value="{{ $viewData['student']->year }}">
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
                                    @if ($course->id === $viewData['student']->course_id)
                                    <option value="{{ \App\Models\Course::decode($course->id)  }}" selected>{{
                                        __($course->name)
                                        }}</option>
                                    @else
                                    <option value="{{ \App\Models\Course::decode($course->id)  }}">{{ __($course->name)
                                        }}</option>
                                    @endif
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
                                    <option value="{{ \App\Enums\StudentStatusEnum::TAM_HOANG }}" {{
                                        $viewData['student']->status === \App\Enums\StudentStatusEnum::TAM_HOANG ?
                                        "selected" : ""}}>Tạm
                                        Hoãng</option>
                                    <option value="{{ \App\Enums\StudentStatusEnum::NGHI_HOC }}" {{
                                        $viewData['student']->status === \App\Enums\StudentStatusEnum::NGHI_HOC ?
                                        "selected" : ""}}>Nghỉ Học</option>
                                    <option value="{{ \App\Enums\StudentStatusEnum::HOC }}" {{ $viewData['student']->
                                        status === \App\Enums\StudentStatusEnum::HOC ?
                                        "selected" : ""}}>Đang đi học</option>
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
                                    <option value="male" {{ $viewData['student']->gender === "Male" ?
                                        "selected" : ""}}>Male</option>
                                    <option value="female" {{ $viewData['student']->gender === "Female" ?
                                        "selected" : ""}}>Female</option>
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
</div>
@endsection