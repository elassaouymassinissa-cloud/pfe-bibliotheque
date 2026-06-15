@extends('layouts.main_layout')

@section('content')


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Create Contact</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admins.contact.index')}}">Contact</a></li>
        
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Contact Detail</h5>

              <form action="{{route('admins.contact.store')}}" method="POST"class="row g-3">
                @csrf
                <div class="col-6">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" name="name" class="form-control" id="name">
                  @error('name')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                
                <div class="col-6">
                  <label for="name" class="form-label">Email</label>
                  <input type="text" name="email" class="form-control" id="name">
                  @error('email')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                
                <div class="col-6">
                  <label for="name" class="form-label">Contact Number</label>
                  <input type="number" name="contact_number" class="form-control" id="name">
                  @error('contact_number')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="col-6">
                  <label for="name" class="form-label">Subject</label>
                  <input type="text" name="subject" class="form-control" id="name">
                  @error('subject')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="col-12">
                  <label for="name" class="form-label">Message</label>
                  <textarea cols="4" rows="5" name="message" class="form-control" id="address">
                      </textarea>
                      @error('message')
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