@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4 mh-100">
            <form class="row g-3 border " method="post" action=" {{ route('students.store') }}">
                @csrf
                <div class="col-md-6">
                    <label for="firstname" class="form-label">FirstName</label>
                    <input type="text" class="form-control" id="firstname" name="firstname">
                </div>
                <div class="col-md-6">
                    <label for="lastname" class="form-label">LastName</label>
                    <input type="text" class="form-control" id="lastname" name="lastname">
                </div>
                <div class="col-6">
                    <label for="inputAddress" class="form-label">Year</label>
                    <input type="date" class="form-control" id="inputAddress" name="year">
                </div>
                <div class="col-6">
                    <label for="gender" class="form-label">Gender</label>
                    <select id="gender" class="form-select" name="gender">
                        <option selected>Choose...</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">City</label>
                    <input type="text" class="form-control" id="inputCity">
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">State</label>
                    <select id="inputState" class="form-select">
                        <option selected>Choose...</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="inputZip" class="form-label">Zip</label>
                    <input type="text" class="form-control" id="inputZip">
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            Check me out
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
            </form>
        </div>
        <div class="col-4"></div>
    </div>
</div>
@endsection