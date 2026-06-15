@extends('layouts.main_layout')

@section('content')


<main id="main" class="main">

    <div class="pagetitle">
      <h1 style="color: #44b89d;">Show Books</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.books.index')}}" style="color: black;">Book</a></li>
        
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
            @if(session('success'))
        <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
        {{session('success')}}
       <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
         @endif
            <div class="row">
    <div class="col-md-6">
    <h5 class="card-title" style="color: #44b89d;">Books Detail</h5>

</div>
@if(Auth::user()->role->name == 'User')

<div class="col-md-6 mt-3" style="text-align: right;">
    <a href="{{route('admins.borrowed.Book', ['bookId'=>$book->id])}}" onclick="return confirm('Are You Sure?')" class="btn btn-primary">Borrowed Book</a>
    </div>
    @endif
  </div>
              <div class="row">
    <div class="col-6">
        <img src="{{$book->book_picture_url}}" class="img-fluid" alt="" style="width: 100%; height: 250px; object-fit: contain;">
    </div>
</div>
<hr>
              <form action="{{route('admin.books.store')}}" method="POST"class="row g-3">
                @csrf
                <input type="hidden" name="id" value="{{$book->id}}">
                <div class="col-6">
                  <label for="name" class="form-label">Book Name</label>
                  <input type="text" value="{{$book->title}}" name="title" class="form-control" id="title" readonly>
                  
                </div>
                


                <div class="col-6">
                  <label for="name" class="form-label">Auther</label>
                  <input type="text" value="{{$book->auther}}" name="auther" class="form-control" id="auther" readonly>
                
                </div>

                <div class="col-6">
                  <label for="name" class="form-label">Isbn Number</label>
                  <input type="number" value="{{$book->isbn_number}}" name="isbn_number" class="form-control" id="isbn_number" readonly>
                
                </div>

                <div class="col-6">
                  <label for="name" class="form-label">Publisih Year</label>
                  <input type="date" value="{{$book->publish_year}}" name="publish_year" class="form-control" id="publish_year" readonly>
                </div>

                <div class="col-6">
                  <label for="name" class="form-label">Type</label>
                  <input type="text" value="{{$book->type}}" name="type" class="form-control" id="type" readonly>
                  
                </div>
                

                <div class="col-6">
                  <label for="name" class="form-label">Available Books</label>
                  <input type="number" value="{{$book->available_books}}" name="available_books" class="form-control" id="available_books" readonly>
                </div>
                
                <div class="col-6">
                  <label for="name" class="form-label">Category</label>
                  <input type="text" value="{{optional($book->category)->name}}" name="category_id" class="form-control" id="category_id" readonly>
                    </div>
                
                <div class="col-6">
                  <label for="status" class="form-label">Status</label><br>
                   @if($book->status == 1)
                    <span class="badge bg-success">Active</span>
                    @else
                    <span class="badge bg-danger">In-active</span>
                    @endif
                </div>
                
              
              </form><!-- Vertical Form -->

            </div>
          </div>

            
            </div>
          </div>
    </section>


            

@endsection