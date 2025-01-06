@extends('admin.layout')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Member</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Create Member</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">

                        <div class="card card-primary">

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
                                <h3 class="card-title">Add Member</h3>
                            </div>


                            <form action="{{ route('student.store') }}" method="post">
                                @csrf
                                <div class="card-body">

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="InputAcademicYear">Select Academic Year</label>
                                            <select name="academic_year_id" id="InputAcademicYear" class="form-control">
                                                <option value="">Select Academic Year</option>
                                                @foreach ($academic_years as $academic_year)
                                                    <option value="{{ $academic_year->id }}">{{ $academic_year->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('academic_year_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>



                                        <div class="form-group col-md-6">
                                            <label for="InputAdmissionDate">Admission Date</label>
                                            <input type="date" name="admission_date" id="InputAdmissionDate"
                                                class="form-control">
                                            @error('admission_date')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="InputStudentName">Student Name</label>
                                            <input type="text" name="name" class="form-control" id="InputStudentName"
                                                placeholder="Enter Student Name">
                                            @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="InputSutId">SUT ID</label>
                                            <input type="text" name="sut_id" class="form-control" id="InputSutId"
                                                placeholder="Enter SUT ID">
                                            @error('sut_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="InputMajorId">Select Student Major</label>
                                            <select name="major_id" id="InputMajorId" class="form-control">
                                                <option value="">Select Student Major</option>
                                                @foreach ($majors as $major)
                                                    <option value="{{ $major->id }}">{{ $major->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('major_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="form-group col-md-6">
                                            <label for="InputDoB">Date Of Birth</label>
                                            <input type="date" name="dob" class="form-control" id="InputDoB">

                                            @error('dob')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="InputMobileNumber">Mobile Number</label>
                                            <input type="text" name="mobno" class="form-control" id="InputMobileNumber"
                                                placeholder="Enter Mobile Number">
                                            @error('mobno')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="form-group col-md-6">
                                            <label for="InputEmail">Email Address</label>
                                            <input type="email" name="email" class="form-control" id="InputEmail"
                                                placeholder="Enter Email Address">
                                            @error('email')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="InputPassword">Create Password</label>
                                            <input type="text" name="password" class="form-control" id="InputPassword"
                                                placeholder="Enter Password">
                                            @error('password')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Add Member</button>
                                </div>
                            </form>
                        </div>

                    </div>


                </div>
            </div>
        </section>

    </div>
@endsection

@section('content')
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
