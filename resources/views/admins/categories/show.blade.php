@extends('layouts.main_layout')

@section('content')


<main id="main" class="main">

    <div class="pagetitle">
      <h1 style="color: #44b89d;">Create Category</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.categories.index')}}" style="color: black;">Categories</a></li>
        
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
              <h5 class="card-title" style="color: #44b89d;">Category Detail</h5>

              <form action="{{route('admin.categories.store')}}" method="POST"class="row g-3">
                @csrf
                <div class="col-12">
                  <label for="name" class="form-label">Name</label>
                  <input readonly value="{{$category->name}}" type="text" name="name" class="form-control" id="name">
                </div>
                <div class="col-12">
                  <label for="parent_id" class="form-label">Parent Category</label>
                  <input readonly value="{{optional($category->parentCategory)->name ?? 'N/A'}}" name="parent_id" name="parent_id" id="parent_id"  class="form-control">
                </div>
                
                <div class="col-12">
                  <label for="status" class="form-label">Status</label><br>
                   @if($category->status == 1)
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