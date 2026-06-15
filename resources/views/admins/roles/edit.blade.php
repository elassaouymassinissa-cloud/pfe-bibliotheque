@extends('layouts.main_layout')

@section('content')


<main id="main" class="main">

    <div class="pagetitle">
      <h1 style="color: #44b89d;">Edit Role</h1>
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

              <form action="{{route('admin.roles.update')}}" method="POST"class="row g-3">
                @csrf
                <input type="hidden" name="id" value="{{$role->id}}">
                <div class="col-12">
                  <label for="name" class="form-label">Name</label>
                  <input value="{{$role->name}}" type="text" name="name" class="form-control" id="name">
                  @error('name')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              
                <div class="col-12">
                  <label for="status" class="form-label">Status</label>
                  <select name="status" name="status" id="status"  class="form-control">
                    <option value="">Please Select</option>
                    <option value="1" {{$role->status == 1 ? 'Selected' : ''}}>Active</option>
                    <option value="0" {{$role->status == 0 ? 'Selected' : ''}}>In-active</option>
                  </select>
                  @error('status')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                </div>
                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>

            
            </div>
          </div>
    </section>


            

@endsection