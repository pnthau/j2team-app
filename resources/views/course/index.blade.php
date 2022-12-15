@extends('layouts.admin')
@section('title', $viewData['title'] )
@section('content')
<!--<buttonn type="button" class="btn btn-primary my-3 px-10"> </button>-->
<div class="row">
    <form class="d-flex" method="get" action="{{ route('course.index') }}">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <a href="{{ route('course.create') }}" class="btn btn-primary">Create</a>
    <table class="table ">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Name</th>
                <th class="text-center">Created_at</th>
                <th class="text-center">Delete</th>
                <th class="text-center">Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($viewData['courses'] as $course)
            <tr>
                <td class="text-center">{{$course->id }}</td>
                <td class="text-center">{{$course->name }}</td>
                <td class="text-center">{{$course->created_format }}</td>
                <td class="text-center">
                    <form action="{{ route('course.destroy', ['course' => $course->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="col-12">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </td>
                <td class="text-center"><a href="{{ route('course.edit', ['course'=>$course->id]) }}"
                        class="btn btn-warning">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $viewData['courses']->links()}}
    <table class="table ">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Name</th>
                <th class="text-center">Created_at</th>
                <th class="text-center">Restore</th>
                <th class="text-center">Force Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($viewData['trashes'] as $trash)
            <tr>
                <td class="text-center">{{$trash->id }}</td>
                <td class="text-center">{{$trash->name }}</td>
                <td class="text-center">{{$trash->created_format }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $viewData['trashes']->links() }}
</div>
@endsection