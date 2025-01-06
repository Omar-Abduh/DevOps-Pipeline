@extends('admin.layout')

@section('customCss')
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Members Data</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Members Data List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            @if (Session::has('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>
                            @endif

                            <div class="card-header">

                                <form action="">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <select name="academic_year_id" id="academic_year_id" class="form-control">
                                                <option value="" {{ !request('academic_year_id') ? 'selected' : '' }}
                                                    selected>
                                                    Select Academic Year
                                                </option>
                                                @foreach ($academic_year as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $item->id == request('academic_year_id') ? 'selected' : '' }}>
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="col-md-4">
                                            <select name="major_id" id="major_id" class="form-control">
                                                <option value="" {{ !request('major_id') ? 'selected' : '' }}
                                                    selected>
                                                    Select Major
                                                </option>
                                                @foreach ($majors as $major)
                                                    <option value="{{ $major->id }}"
                                                        {{ $major->id == request('major_id') ? 'selected' : '' }}>
                                                        {{ $major->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <input type="submit" value="Filter" class="btn btn-primary btn-sm">
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Student ID</th>
                                            <th>Name</th>
                                            <th>Academic Year</th>
                                            <th>Major</th>
                                            <th>Communittee Name</th>
                                            <th>Communittee Position</th>
                                            <th>Mobile Phone</th>
                                            <th>Email</th>
                                            <th>Created Time</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($boardmembers as $boardmember)
                                            <tr>
                                                <td>{{ $boardmember->sut_id }}</td>
                                                <td>{{ $boardmember->name }}</td>
                                                <td>{{ $boardmember->academicYear->name ?? 'No Academic Year' }}</td>
                                                <td>{{ $boardmember->majorName->name ?? 'No Major Assigned' }}</td>
                                                <td>{{ $boardmember->CommunitiesName->name ?? 'No Communittee Assigned' }}
                                                </td>
                                                <td>{{ $boardmember->communittee_position }}</td>
                                                <td>{{ $boardmember->mobno }}</td>
                                                <td>{{ $boardmember->email }}</td>
                                                <td>{{ $boardmember->created_at }}</td>
                                                <td><a href="{{ route('boardmember.edit', $boardmember->id) }}"
                                                        class="btn btn-primary">Edit</a></td>
                                                <td><a href="{{ route('boardmember.delete', $boardmember->id) }}"
                                                        onclick="return confirm('Are you sure you want to delete?');"
                                                        class="btn btn-danger">Delete</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    {{-- <tfoot>
                                        <tr>
                                            <th>Student ID</th>
                                            <th>Name</th>
                                            <th>Academic Year</th>
                                            <th>Major</th>
                                            <th>Communittee Name</th>
                                            <th>Communittee Position</th>
                                            <th>Mobile Phone</th>
                                            <th>Email</th>
                                            <th>Created Time</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot> --}}
                                </table>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </div>
@endsection

@section('customJs')
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    {{--  --}}
    {{-- <script src="dist/js/adminlte.min2167.js?v=3.2.0"></script> --}}
    {{--  --}}
    <script src="dist/js/demo.js"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
