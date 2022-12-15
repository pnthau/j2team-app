@extends('layouts.admin')
@section('content')

<h2 class="text-center">{{ $viewData['title'] }}</h2>
<div class="container">
    <!--<buttonn type="button" class="btn btn-primary my-3 px-10"> </button>-->
    <div class="row">
        {{-- <a href="{{ route('courses.create') }}" class="btn btn-primary stretched-link table">Create</a> --}}
        <a href="{{ route('students.create') }}" class="btn btn-primary stretched-link table">Create</a>
        <table class="table ">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Age</th>
                    <th class="text-center">Gender</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData['students'] as $student)
                <tr>
                    <td class="text-center">{{$student->id }}</td>
                    <td class="text-center">{{$student->full_name }}</td>
                    <td class="text-center">{{ $student->age }} </td>
                    <td class="text-center">{{ $student->gender }} </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection