@extends('layouts.main_layout')

@section('content')


<main id="main" class="main">

    <div class="pagetitle">
      <h1 style="color: #44b89d;">Edit Books</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}" style="color: black;">Books</a></li>
        
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
              <h5 class="card-title" style="color: #44b89d;">Book Detail</h5>

              <form action="{{route('admin.books.update')}}" method="POST"class="row g-3" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$book->id}}">
                <div class="col-6">
                  <label for="name" class="form-label">Book Name</label>
                  <input type="text" value="{{$book->title}}" name="title" class="form-control" id="title">
                  @error('title')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                


                <div class="col-6">
                  <label for="name" class="form-label">Auther</label>
                  <input type="text" value="{{$book->auther}}" name="auther" class="form-control" id="auther">
                  @error('auther')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="col-6">
                  <label for="name" class="form-label">Isbn Number</label>
                  <input type="number" value="{{$book->isbn_number}}" name="isbn_number" class="form-control" id="isbn_number">
                  @error('isbn_number')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="col-6">
                  <label for="name" class="form-label">Publisih Year</label>
                  <input type="date" value="{{$book->publish_year}}" name="publish_year" class="form-control" id="publish_year">
                  @error('publish_year')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="col-6">
                  <label for="name" class="form-label">Type</label>
                  <input type="text" value="{{$book->type}}" name="type" class="form-control" id="type">
                  @error('type')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                

                <div class="col-6">
                  <label for="name" class="form-label">Available Books</label>
                  <input type="number" value="{{$book->available_books}}" name="available_books" class="form-control" id="available_books">
                  @error('available_books')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                
                <div class="col-6">
                  <label for="category_id" class="form-label">Category</label>
                  <select name="category_id"  id="category_id"  class="form-control">
                    <option value="">Please Select</option>
                    @foreach($categories as $categoryData)
                    <option value="{{$categoryData->id}}" {{$categoryData->id == $book->category_id ? 'Selected' : ''}}>{{$categoryData->name}}</option>
                    @endforeach
                </select>
                </div>



                <div class="col-6">
                  <label for="status" class="form-label">Status</label>
                  <select name="status"  value="{{$book->status}}" name="status" id="status"  class="form-control">
                    <option value="">Please Select</option>
                    <option value="1" {{$book->status == 1 ? 'Selected' : ''}}>Active</option>
                    <option value="0" {{$book->status == 0 ? 'Selected' : ''}}>In-active</option>
                  </select>
                  @error('status')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                  <div class="col-12">
                  <label for="name" class="form-label">Image</label>
                  <input type="file" name="image" class="form-control" id="image">
                  @error('image')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
             
                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form>

                    
            </div>
         </div>
      </div>

    </section>


            

@endsection