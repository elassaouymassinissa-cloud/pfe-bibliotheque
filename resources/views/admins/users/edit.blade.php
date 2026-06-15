@extends('layouts.main_layout')

@section('content')


<main id="main" class="main">

    <div class="pagetitle">
      <h1 style="color: #44b89d;">Edit User</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}" style="color: black;">User</a></li>
        
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
              <h5 class="card-title" style="color: #44b89d;">User Detail</h5>

              <form action="{{route('admin.users.update')}}" method="POST"class="row g-3" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$user->id}}">
                <div class="col-6">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" value="{{$user->user_name}}" name="user_name" class="form-control" id="user_name">
                  @error('user_name')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                
                <div class="col-6">
                  <label for="name" class="form-label">First Name</label>
                  <input type="text" value="{{$user->first_name}}" name="first_name" class="form-control" id="first_name">
                  @error('first_name')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="col-6">
                  <label for="name" class="form-label">Last Name</label>
                  <input type="text" value="{{$user->last_name}}" name="last_name" class="form-control" id="last_name">
                  @error('last_name')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="col-6">
                  <label for="name" class="form-label">Email</label>
                  <input type="text"  value="{{$user->email}}"  name="email" class="form-control" id="email">
                  @error('email')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="col-6">
                  <label for="name" class="form-label">Password</label>
                  <input type="password"   name="password" class="form-control" id="password">
                  @error('password')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="col-6">
                  <label for="name" class="form-label">City</label>
                  <input type="text" value="{{$user->city}}"   name="city" class="form-control" id="city">
                  @error('city')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                
                <div class="col-6">
                  <label for="name" class="form-label">CNIC Number</label>
                  <input type="number" value="{{$user->cnic_number}}"   name="cnic_number" class="form-control" id="cnic_number">
                  @error('cnic_number')
                  <span class="text-danger">{{$message}}</span>
                  @enderror    
                </div>
                 

                <div class="col-6">
                  <label for="name" class="form-label">Phone Number</label>
                  <input type="number" value="{{$user->phone_number}}"   name="phone_number" class="form-control" id="phone_number">
                  @error('phone_number')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="col-6">
                  <label for="name" class="form-label">Profile Picture</label>
                  <input type="file"    name="image" class="form-control" id="image">
                 
                </div>

                @if(Auth::user()->role->name == 'Admin')
                <div class="col-6">
                  <label for="role_id" class="form-label">Role</label>
                  <select name="role_id" id="role_id"  class="form-control">
                    <option value="">Please Select</option>
                    @foreach($roles as $role)
                    <option value="{{$role->id}}" {{$role->id == $user->role_id ? 'Selected' : ''}}>{{$role->name}}</option>
                    @endforeach
                </select>
                </div>
                @endif

                <div class="col-6">
                  <label for="status" class="form-label">Status</label>
                  <select name="status"  value="{{$user->status}}" name="status" id="status"  class="form-control">
                    <option value="">Please Select</option>
                    <option value="1" {{$user->status == 1 ? 'Selected' : ''}}>Active</option>
                    <option value="0" {{$user->status == 0 ? 'Selected' : ''}}>In-active</option>
                  </select>
                  @error('status')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="col-12">
                  <label for="name" class="form-label">Address</label>
                  <textarea cols="4" rows="5" name="address" class="form-control" id="address">{{$user->address}}</textarea>
                      @error('address')
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