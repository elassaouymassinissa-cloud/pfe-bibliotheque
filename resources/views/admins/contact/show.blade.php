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
                  <input type="text" value="{{$contact->name}}" name="name" class="form-control" id="name">
                </div>
                
                <div class="col-6">
                  <label for="name" class="form-label">Email</label>
                  <input type="text"  value="{{$contact->email}}" name="email" class="form-control" id="name">
                </div>
                
                <div class="col-6">
                  <label for="name" class="form-label">Contact Number</label>
                  <input type="number" value="{{$contact->contact_number}}" name="contact_number" class="form-control" id="name">
                </div>

                <div class="col-6">
                  <label for="name" class="form-label">Subject</label>
                  <input type="text" value="{{$contact->subject}}" name="subject" class="form-control" id="name">
                </div>

                <div class="col-12">
                  <label for="name" class="form-label">Message</label>
                  <textarea cols="4" rows="5"  name="message" class="form-control" id="address"> {{$contact->message}}</textarea>
                    
                    </div>
                
               
              </form><!-- Vertical Form -->

            </div>
          </div>

            
            </div>
          </div>
    </section>


            

@endsection