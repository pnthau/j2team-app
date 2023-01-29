@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="card">
            <div class="header">
                <legend>{{ $viewData['title'] }}</legend>
            </div>
            <div class="content">
                @if ($errors->has('name'))
                    <div class="alert alert-danger">
                        <ul>
                            {{ $errors->first('name') }}
                        </ul>
                    </div>
                @endif
                <form method="post" action=" {{ route('course.store') }}" class="form-horizontal">
                    @csrf
                    <fieldset>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="name">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}">
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
@endsection
