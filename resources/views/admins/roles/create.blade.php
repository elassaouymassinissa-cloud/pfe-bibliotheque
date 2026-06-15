@extends('layouts.main_layout')

@section('content')


<main id="main" class="main">

    <div class="pagetitle">
      <h1 style="color: #44b89d;">Create Role</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.roles.index')}}" style="color: black;">Roles</a></li>
        
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
              <h5 class="card-title" style="color: #44b89d;">Role Detail</h5>

              <form action="{{route('admin.roles.store')}}" method="POST"class="row g-3">
                @csrf
                <div class="col-12">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" name="name" class="form-control" id="name">
                  @error('name')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                
                
                <div class="col-12">
                  <label for="status" class="form-label">Status</label>
                  <select name="status" name="status" id="status"  class="form-control">
                    <option value="">Please Select</option>
                    <option value="1">Active</option>
                    <option value="0">In-active</option>
                  </select>
                  @error('status')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>

            
            </div>
          </div>
    </section>


            

@endsection