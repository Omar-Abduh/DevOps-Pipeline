@extends('member.layout')

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
                        <h1>Dell Event Attendance</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('member.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Dell Event Attendance</li>
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
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 class="card-title">Dell Event Attendance</h3>
                                </div>
                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Student ID</th>
                                            <th>Student Name</th>
                                            {{-- <th>Student Email</th> --}}
                                            <th>Student Year</th>
                                            <th>Talk 1</th>
                                            <th>Talk 2</th>
                                            {{-- <th>Edit</th>
                                            <th>Delete</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                            <tr>
                                                <td>{{ $student->student_id }}</td>
                                                <td>{{ $student->name }}</td>
                                                {{-- <td>{{ $student->email }}</td> --}}
                                                <td>{{ $student->academic_year }}</td>
                                                <td class="checkbox-cell">
                                                    <input type="checkbox" class="present-checkbox"
                                                        data-id="{{ $student->id }}"
                                                        {{ $student->dell_event_attendance_talk_1 ? 'checked' : '' }}>
                                                    <span>{{ $student->dell_event_attendance_talk_1 ? 'Attend' : 'Absent' }}</span>
                                                </td>
                                                <td class="checkbox-cell">
                                                    <input type="checkbox" class="late-checkbox"
                                                        data-id="{{ $student->id }}"
                                                        {{ $student->dell_event_attendance_talk_2 ? 'checked' : '' }}>
                                                    <span>{{ $student->dell_event_attendance_talk_2 ? 'Attend' : 'Absent' }}</span>
                                                </td>
                                                {{-- <td><a href="{{ route('boardmember.sut-student.edit', $student->id) }}" class="btn btn-primary">Edit</a></td>
                                                <td><a href="{{ route('boardmember.sut-student.delete', $student->id) }}" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger">Delete</a></td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Student ID</th>
                                            <th>Student Name</th>
                                            {{-- <th>Student Email</th> --}}
                                            <th>Student Year</th>
                                            <th>Talk 1</th>
                                            <th>Talk 2</th>
                                            {{-- <th>Edit</th>
                                            <th>Delete</th> --}}
                                        </tr>
                                    </tfoot>
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

        $(document).ready(function() {
            $('.present-checkbox, .late-checkbox').change(function() {
                var checkbox = $(this);
                var studentId = checkbox.data('id');
                var field = checkbox.hasClass('present-checkbox') ? 'dell_event_attendance_talk_1' :
                    'dell_event_attendance_talk_2';
                var value = checkbox.is(':checked') ? 1 : 0;

                $.ajax({
                    url: '{{ route('member.updateAttendance') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        student_id: studentId,
                        field: field,
                        value: value
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Attendance updated successfully.');
                            // location.reload();
                        } else {
                            alert('Failed to update attendance.');
                        }
                    },
                    error: function() {
                        alert('Error updating attendance.');
                    }
                });
            });
        });
    </script>
@endsection
