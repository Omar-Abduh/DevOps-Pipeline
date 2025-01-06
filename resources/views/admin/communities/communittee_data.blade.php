@extends('admin.layout')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Communities</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Create Communities</li>
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
                                <h3 class="card-title">Add Communittee</h3>
                            </div>


                            <form action="{{ route('communities.store') }}" method="post">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="InputCommunitteName">Communitte Name</label>
                                        <select name="name" id="InputCommunitteName" class="form-control">
                                            <option value="">Select Communitte Name</option>
                                            @foreach ($communittes as $communittee)
                                                <option value="{{ $communittee->id }}">{{ $communittee->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="InputCommunitteHead">Communitte Head</label>
                                        <input type="text" name="head" class="form-control" id="InputCommunitteHead"
                                            placeholder="Enter Communitte Head">
                                        @error('head')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="InputCommunitteHead">Communitte Vice Head</label>
                                        <input type="text" name="vice_head" class="form-control" id="InputCommunitteHead"
                                            placeholder="Enter Communitte Vice Head">
                                        @error('vice_head')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="InputCommunitteHead">Number of Members in Communitte</label>
                                        <input type="text" name="no_of_members" class="form-control"
                                            id="InputCommunitteHead" placeholder="Enter Number of Members in Communitte">
                                        @error('no_of_members')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Add Communitte</button>
                                </div>
                            </form>
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
