@extends('layouts.master')
@section('title', $viewData['title'] )
@section('content')
<!--<buttonn type="button" class="btn btn-primary my-3 px-10"> </button>-->
<div class="row">
    <div class="col-sm-12 mb-3">
        <span class="font-size-large ">Course</span>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="col-md-12">
        <div class="card">
            <div class="content">
                <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="fresh-datatables">
                    <div id="datatables_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="{{ route('course.create') }}"
                                    class="btn btn-simple btn-wd text-left text-primary pl-1"><u>Add</u></a>
                            </div>
                            <div class="col-sm-6">
                                <div id="datatables_filter" class="dataTables_filter"><label><input type="search"
                                            class="form-control input-sm" placeholder="Search records"
                                            aria-controls="datatables"></label></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="datatables"
                                    class="table table-striped table-no-bordered table-hover dataTable dtr-inline"
                                    cellspacing="0" width="100%" style="width: 100%;" role="grid"
                                    aria-describedby="datatables_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1"
                                                colspan="1" style="width: 189px;"
                                                aria-label="Name: activate to sort column ascending">#</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1"
                                                colspan="1" style="width: 277px;"
                                                aria-label="Position: activate to sort column ascending">Name
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1"
                                                colspan="1" style="width: 122px;"
                                                aria-label="Start date: activate to sort column ascending">Start
                                                date</th>
                                            <th class="disabled-sorting text-right sorting" tabindex="0"
                                                aria-controls="datatables" rowspan="1" colspan="1" style="width: 138px;"
                                                aria-label="Actions: activate to sort column ascending">Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <th rowspan="1" colspan="1">#</th>
                                        <th rowspan="1" colspan="1">Name</th>
                                        <th rowspan="1" colspan="1">Start date</th>
                                        <th class="text-right" rowspan="1" colspan="1">Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($viewData['courses'] as $course)
                                        <tr role="row" class="odd">
                                            <td tabindex="0" class="">{{$course->id }}</td>
                                            <td>{{$course->name }}</td>
                                            <td>{{$course->created_format }}</td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-simple btn-info btn-icon like"><i
                                                        class="fa fa-heart"></i></a>
                                                <a href="{{ route('course.edit', ['course'=>$course->id]) }}"
                                                    class="btn btn-simple btn-warning btn-icon edit"><i
                                                        class="fa fa-edit"></i></a>
                                                <form style="display: inline;"
                                                    action="{{ route('course.destroy', ['course' => $course->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-simple btn-danger btn-icon remove"><i
                                                            class="fa fa-times"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{ $viewData['courses']->render('components.pagination') }}
                    </div>
                </div>
            </div><!-- end content-->
        </div><!--  end card  -->
    </div> <!-- end col-md-12 -->
</div>
@endsection