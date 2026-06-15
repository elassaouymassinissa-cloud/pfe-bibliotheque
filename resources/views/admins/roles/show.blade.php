@extends('layouts.main_layout')

@section('content')


<main id="main" class="main">

    <div class="pagetitle">
      <h1 style="color: #44b89d;">Show Role</h1>
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
              <h5 class="card-title" style="color: #44b89d;">Roles Detail</h5>

              <form action="{{route('admin.roles.store')}}" method="POST"class="row g-3">
                @csrf
                <div class="col-12">
                  <label for="name" class="form-label">Name</label>
                  <input readonly value="{{$role->name}}" type="text" name="name" class="form-control" id="name">
                </div>
                
                <div class="col-12">
                  <label for="status" class="form-label">Status</label><br>
                   @if($role->status == 1)
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