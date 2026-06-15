@extends('layouts.main_layout')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1 style="color: #44b89d;">Users</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" style="color: black;">Home</a></li>

                </ol>
            </nav>
        </div><!-- End Page Title -->
        @if (session('success'))
            <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
        @endif

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="card-title" style="color: #44b89d;">Users List</h5>
                                    </div>

                                    <div class="col-md-6 mt-3" style="text-align: right;">
                                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Add New</a>
                                    </div>
                                </div>
                                <!-- Table with stripped rows -->
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">N</th>
                                            <th scope="col">Image</th>

                                            <th scope="col">Name</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">CNIC</th>
                                            <th scope="col">Phone</th>

                                            @if (Auth::user()->role->name == 'Admin')
                                                <th scope="col">Role</th>
                                            @endif
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>
                                                    <img src="{{ $user->profile_picture_url }}" width="32"
                                                        alt="">
                                                </td>
                                                <td>{{ $user->user_name }}</td>
                                                <td>{{ $user->first_name }}</td>
                                                <td>{{ $user->last_name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->cnic_number }}</td>
                                                <td>{{ $user->phone_number }}</td>


                                                @if (Auth::user()->role->name == 'Admin')
                                                    <td>{{ optional($user->role)->name }}</td>
                                                @endif
                                                <td>
                                                    <a href="{{ route('admin.users.show', ['id' => $user->id]) }}"
                                                        class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>|
                                                    <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}"
                                                        class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>|
                                                    <a href="{{ route('admin.users.delete', ['id' => $user->id]) }}"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are You Sure?')"><i
                                                            class="bi bi-trash"></i></a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
        </section>
    @endsection
