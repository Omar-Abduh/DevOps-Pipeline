@extends('admin.layout')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update Board Member</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Update Mamber</li>
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
                                <h3 class="card-title">Update Member</h3>
                            </div>


                            <form action="{{ route('boardmember.update', $boardmember->id) }}" method="post">
                                @csrf
                                <div class="card-body">

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="InputAcademicYear">Select Academic Year</label>
                                            <select name="academic_year_id" id="InputAcademicYear" class="form-control">
                                                <option value="">Select Academic Year</option>
                                                @foreach ($academic_years as $academic_year)
                                                    <option value="{{ $academic_year->id }}"
                                                        {{ $academic_year->id == $boardmember->academic_year_id ? 'selected' : '' }}>
                                                        {{ $academic_year->name }}
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
                                                class="form-control"
                                                value="{{ old('admission_date', $boardmember->admission_date) }}">
                                            @error('admission_date')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="InputboardmemberName">boardmember Name</label>
                                            <input type="text" name="name" class="form-control"
                                                id="InputboardmemberName" placeholder="Enter boardmember Name"
                                                value="{{ old('name', $boardmember->name) }}">
                                            @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="InputSutId">SUT ID</label>
                                            <input type="text" name="sut_id" class="form-control" id="InputSutId"
                                                placeholder="Enter SUT ID"
                                                value="{{ old('sut_id', $boardmember->sut_id) }}">
                                            @error('sut_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>


                                    </div>

                                    <div class="row">

                                        <div class="form-group col-md-6">
                                            <label for="InputMajorId">Select boardmember Major</label>
                                            <select name="major_id" id="InputMajorId" class="form-control">
                                                <option value="">Select boardmember Major</option>
                                                @foreach ($majors as $major)
                                                    <option value="{{ $major->id }}"
                                                        {{ $major->id == $boardmember->major_id ? 'selected' : '' }}>
                                                        {{ $major->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('major_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="InputDoB">Date Of Birth</label>
                                            <input type="date" name="dob" class="form-control" id="InputDoB"
                                                value="{{ old('dob', $boardmember->dob) }}">

                                            @error('dob')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>


                                    <div class="row">

                                        <div class="form-group col-md-6">
                                            <label for="InputMobileNumber">Mobile Number</label>
                                            <input type="text" name="mobno" class="form-control" id="InputMobileNumber"
                                                placeholder="Enter Mobile Number"
                                                value="{{ old('mobno', $boardmember->mobno) }}">
                                            @error('mobno')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="InputEmail">Email Address</label>
                                            <input type="email" name="email" class="form-control" id="InputEmail"
                                                placeholder="Enter Email Address"
                                                value="{{ old('email', $boardmember->email) }}">
                                            @error('email')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="form-group col-md-6">
                                            <label for="InputCommunitteeName">Select Communittee Name</label>
                                            <select name="communittee_id" id="InputCommunitteeName" class="form-control">
                                                <option value="" disabled selected>Select Committee Name</option>
                                                @foreach ($communittes as $committee)
                                                    <option value="{{ $committee->id }}"
                                                        {{ $committee->id == $boardmember->communities_id ? 'selected' : '' }}>
                                                        {{ $committee->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('communittee_name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="InputCommunitteePosition">Select Communittee Position</label>
                                            <select name="communittee_position" id="InputCommunitteePosition"
                                                class="form-control">
                                                <option value="" disabled selected>Select Communitee Position
                                                </option>
                                                <option value="Head" {{ $boardmember->communittee_position == 'Head' ? 'selected' : '' }}>Head Of Communittee</option>
                                                <option value="Vice Head" {{ $boardmember->communittee_position == 'Vice Head' ? 'selected' : '' }}>Vice Head Of Communittee</option>
                                            </select>
                                            @error('communittee_position')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update Member</button>
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
