@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-4"></div>
    <div class="col-4 mh-100">
        @if ($errors->has('name'))
        <div class="alert alert-danger">
            <ul>
                {{ $errors->first('name') }}
            </ul>
        </div>
        @endif
        <form class="row g-3 border " method="post" action=" {{ route('course.store') }}">
            @csrf
            <div class="col-md-12">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
    <div class="col-4"></div>
</div>
@endsection