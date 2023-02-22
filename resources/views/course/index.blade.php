@extends('layouts.master')
@section('title', $title)
@section('content')
    <!--<buttonn type="button" class="btn btn-primary my-3 px-10"> </button>-->
    <div class="row">
        <div class="col-sm-12 mb-3">
            <span class="font-size-large ">{{ $title }}</span>
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
                                        class="btn btn-simple btn-wd text-left text-primary pl-1"><u>Add course</u></a>
                                </div>
                            </div>
                            <div>
                                <select class="js-example-data-ajax dropdown-menu" id="select-name" name="state">
                                </select>
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
                                                    colspan="1" style="width: 277px;"
                                                    aria-label="Position: activate to sort column ascending">Total Students
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1"
                                                    colspan="1" style="width: 122px;"
                                                    aria-label="Start date: activate to sort column ascending">Start date
                                                </th>
                                                @super()
                                                    <th class="disabled-sorting text-right sorting" tabindex="0"
                                                        aria-controls="datatables" rowspan="1" colspan="1"
                                                        style="width: 138px;"
                                                        aria-label="Actions: activate to sort column ascending">Actions</th>
                                                    <th class="disabled-sorting text-right sorting" tabindex="0"
                                                        aria-controls="datatables" rowspan="1" colspan="1"
                                                        style="width: 138px;"
                                                        aria-label="Actions: activate to sort column ascending">Actions</th>
                                                @endsuper
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <th rowspan="1" colspan="1">#</th>
                                            <th rowspan="1" colspan="1">Name</th>
                                            <th rowspan="1" colspan="1">Total Students</th>
                                            <th rowspan="1" colspan="1">Start date</th>
                                            @super()
                                                <th class="text-right" rowspan="1" colspan="1">Actions</th>
                                            @endsuper
                                            </tr>
                                        </tfoot>
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

@section('styles')
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('scripts')
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/dt/jq-3.6.0/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/date-1.2.0/fc-4.2.1/fh-3.3.1/r-2.4.0/rg-1.3.0/sc-2.0.7/sb-1.4.0/sl-1.5.0/datatables.min.js">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="text/javascript">
        $(function() {
            $(".js-example-data-ajax").select2({
                ajax: {
                    url: "{{ route('course.apiName') }}",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term, // search term
                        };
                    },
                    processResults: function(data, params) {
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                },
                placeholder: 'Search for a name',
                minimumInputLength: 1,
            });

            function formatRepo(repo) {
                if (repo.loading) {
                    return repo.text;
                }

                var $container = $(
                    "<div class='select2-result-repository clearfix'>" +
                    "<div class='select2-result-repository__avatar'><img src='" + repo.owner.avatar_url +
                    "' /></div>" +
                    "<div class='select2-result-repository__meta'>" +
                    "<div class='select2-result-repository__title'></div>" +
                    "<div class='select2-result-repository__description'></div>" +
                    "<div class='select2-result-repository__statistics'>" +
                    "<div class='select2-result-repository__forks'><i class='fa fa-flash'></i> </div>" +
                    "<div class='select2-result-repository__stargazers'><i class='fa fa-star'></i> </div>" +
                    "<div class='select2-result-repository__watchers'><i class='fa fa-eye'></i> </div>" +
                    "</div>" +
                    "</div>" +
                    "</div>"
                );

                $container.find(".select2-result-repository__title").text(repo.full_name);
                $container.find(".select2-result-repository__description").text(repo.description);
                $container.find(".select2-result-repository__forks").append(repo.forks_count + " Forks");
                $container.find(".select2-result-repository__stargazers").append(repo.stargazers_count + " Stars");
                $container.find(".select2-result-repository__watchers").append(repo.watchers_count + " Watchers");

                return $container;
            }

            function formatRepoSelection(repo) {
                return repo.full_name || repo.text;
            }

            //datatable
            $(document).on('click', '.btn-delete', function(event) {
                event.preventDefault()
                let form = $(this).parents('form');
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    dataType: 'json',
                    data: form.serialize(),
                    success: function() {
                        console.log("success")
                        table.draw();
                    },
                    error: function() {
                        console.log("error")
                    }
                })
            });
            let buttonCommon = {
                exportOptions: {
                    columns: ":visible :not(.not-export)"
                }
            }
            let table = $('#datatables').DataTable({
                dom: 'Blfrtip',
                select: true,
                buttons: [
                    $.extend(true, {}, buttonCommon, {
                        extend: 'copyHtml5'
                    }),
                    $.extend(true, {}, buttonCommon, {
                        extend: 'excelHtml5'
                    }),
                    $.extend(true, {}, buttonCommon, {
                        extend: 'csvHtml5'
                    }),
                    $.extend(true, {}, buttonCommon, {
                        extend: 'pdfHtml5'
                    }),
                    $.extend(true, {}, buttonCommon, {
                        extend: 'print'
                    }),
                    'colvis'
                ],
                processing: true,
                serverSide: true,
                ajax: '{!! route('course.api') !!}',
                columnDefs: [{
                    className: "not-export",
                    "targets": [3]
                }],
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'students_count',
                        name: 'students_count',
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    @super() {
                        data: 'edit',
                        targets: 3,
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return `<a href="${data}" class="btn btn-simple btn-warning btn-icon edit">
                            <i class="fa fa-edit"></i>
                        </a>`;
                        },
                    },
                    {
                        data: 'delete',
                        targets: 4,
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return `<form  action="${data}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-simple btn-danger btn-icon btn-delete" ><i
                                        class="fa fa-times"></i></button>
                            </form>`;
                        },
                    }
                    @endsuper
                ]
            });

            $('#select-name').change(function() {
                let decode = this.value.substr(4);
                console.log(decode);
                table.column(0).search(decode).draw();
            })
            //end datatable.
        });
    </script>
@endsection
