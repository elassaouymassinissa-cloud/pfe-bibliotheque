@extends('layouts.main_layout')

@section('content')


<main id="main" class="main">

    <div class="pagetitle">
      <h1 style="color: #44b89d;">Categories</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" style="color: black";>Home</a></li>
        
        </ol>
      </nav>
    </div><!-- End Page Title -->
     @if(session('success'))
        <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
        {{session('success')}}
       <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
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
    <h5 class="card-title" style="color: #44b89d";>Categories List</h5>
</div>

<div class="col-md-6 mt-3" style="text-align: right;">
    <a href="{{route('admin.categories.create')}}" class="btn btn-primary">Add New</a>
    </div>
</div>
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Parent Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($categories as $category)
                  <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$category->name}}</td>
                    <td>{{optional($category->parentCategory)->name ?? 'N/A'}}</td>
                    <td>
                      @if($category->status == 1)
                    <span class="badge bg-success">Active</span>
                    @else
                    <span class="badge bg-danger">In-active</span>
                    @endif
                    </td>
                    <td>
                      <a href="{{route('admin.categories.show',['id'=>$category->id])}}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>|
                      <a href="{{route('admin.categories.edit',['id'=>$category->id])}}" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>|
                      <a href="{{route('admin.categories.delete',['id'=>$category->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure?')"><i class="bi bi-trash"></i></a>

                    </td>
                  </tr>
                 @endforeach
                </tbody>
              </table>
             

            </div>
          </div>
    </section>


            

@endsection