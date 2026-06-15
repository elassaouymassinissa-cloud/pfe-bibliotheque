@extends('layouts.main_layout')

@section('content')


<main id="main" class="main">

    <div class="pagetitle">
      <h1 style="color: #44b89d;">Books</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" style="color: black;">Home</a></li>
        
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
    <h5 class="card-title" style="color: #44b89d;">Books List</h5>
</div>
@if(Auth::user()->role->name != 'User')

<div class="col-md-6 mt-3" style="text-align: right;">
    <a href="{{route('admin.books.create')}}" class="btn btn-primary">Add New</a>
    </div>
    @endif
  </div>
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">№</th>
                    <th scope="col">image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Auther</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">Publish Year</th>
                    <th scope="col">Type</th>
                    <th scope="col">Available</th>
                    <th scope="col">Category</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($books as $book)
                  <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td><img src="{{ $book->book_picture_url }}" alt="" width="50"></td>
                    <td>{{$book->title}}</td>
                    <td>{{$book->auther}}</td>
                    <td>{{$book->isbn_number}}</td>
                    <td>{{ \Carbon\Carbon::parse($book->publish_year)->format('d/m/Y')}}</td>
                    <td>{{$book->type}}</td>
                    <td>{{$book->available_books}}</td>
                    <td>{{optional($book->category)->name}}</td>
                    <td>
                      @if($book->status == 1)
                    <span class="badge bg-success">Active</span>
                    @else
                    <span class="badge bg-danger">In-active</span>
                    @endif
                    </td>

                    <td>
                      <a href="{{route('admin.books.show',['id'=>$book->id])}}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                          @if(Auth::user()->role->name == 'User')

                         <a href="{{route('admins.borrowed.Book',['bookId'=>$book->id])}}"  onclick="return confirm('Are You Sure?')" class="btn btn-info btn-sm"><i class="bi bi-book"></i></a>
 
  

                      @endif

                    @if(Auth::user()->role->name != 'User')
                      |<a href="{{route('admin.books.edit',['id'=>$book->id])}}" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>|
                      <a href="{{route('admin.books.delete',['id'=>$book->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure?')"><i class="bi bi-trash"></i></a>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
    </table>

            </div>
          </div>
    </section>


            

@endsection



