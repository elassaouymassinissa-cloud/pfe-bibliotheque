@extends('layouts.main_layout')

@section('content')


<main id="main" class="main">

    <div class="pagetitle">
      <h1 style="color: #44b89d;">Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" style="color: black;">Home</a></li>
          <li class="breadcrumb-item" style="color: black;">Users</li>
          <li class="breadcrumb-item active" style="color: black;">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="{{Auth::user()->profile_picture_url}}" alt="Profile" class="img-fluid rounded-circle" style="width: 150px; height: 140px;">
              <h2 style="color: #44b89d;">{{Auth::user()->user_name}}</h2>
              <h3 style="color: black;">{{optional(Auth::user()->role)->name}}</h3>
              
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                

                <li class="nav-item">
                  <button class="nav-link active"  data-bs-toggle="tab" data-bs-target="#profile-edit" style="color: #44b89d;">Edit Profile</button>
                </li>


             

              </ul>
              <div class="tab-content pt-2">

              

                <div class="tab-pane fade profile-edit show active pt-3" id="profile-edit">
                @if(session('success'))
        <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
        {{session('success')}}
       <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
         @endif
                  <!-- Profile Edit Form -->
                  <form action="{{route('admins.users.profile.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label" style="color: #44b89d;">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="{{Auth::user()->profile_picture_url}}" alt="Profile" style="height: 150px; width: 150px;">
                        <div class="pt-2">
                          <!-- <a href="#" class="btn btn-primary " title="Upload new profile image">Select Picture</a> -->
                          <input type="file" class="form-control" name="image">
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label" style="color: #44b89d;">User Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="user_name" type="text" class="form-control" id="user_name" value="{{Auth::user()->user_name}}">
                      </div>
                      @error('user_name')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label" style="color: #44b89d;">Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="password" >
                        @error('password')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                      </div>
                    </div>


                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label" style="color: #44b89d;">First Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="first_name" type="text" class="form-control" id="first_name" value="{{Auth::user()->first_name}}">
                        @error('first_name')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                      </div>
                     
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label" style="color: #44b89d;">Last Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="last_name" type="text" class="form-control" id="last_name" value="{{Auth::user()->last_name}}">
                        @error('last_name')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                      </div>
                     
                    </div>


            

                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label" style="color: #44b89d;">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="address" type="text" class="form-control" id="Address" value="{{Auth::user()->address}}">
                        @error('address')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                      </div>
                     
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label" style="color: #44b89d;">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone_number" type="text" class="form-control" id="phone_number" value="{{Auth::user()->phone_number}}">
                      
                        @error('phone_number')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                     
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label" style="color: #44b89d;">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="email" value="{{Auth::user()->email}}">
                        @error('email')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                      </div>
                      
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label" style="color: #44b89d;">CNIC</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="cnic_number" type="text" class="form-control" id="cnic_number" value="{{Auth::user()->cnic_number}}">
                        @error('cnic_number')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                      </div>
                     
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label" style="color: #44b89d;">City</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="city" type="text" class="form-control" id="city" value="{{Auth::user()->city}}">
                        @error('city')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                      </div>
                     
                    </div>

                    


                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->



            

@endsection