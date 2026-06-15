@extends('layouts.main_layout')

@section('content')


<main id="main" class="main">

    <div class="pagetitle">
      <h1 style="color: #44b89d;">Show User</h1>
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

              <form action="{{route('admin.users.store')}}" method="POST"class="row g-3">
                @csrf
                <input type="hidden" name="id" value="{{$user->id}}">
                <div class="col-6">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" value="{{$user->user_name}}" name="user_name" class="form-control" id="user_name">
                  
                </div>
                


                <div class="col-6">
                  <label for="name" class="form-label">First Name</label>
                  <input type="text" value="{{$user->first_name}}" name="first_name" class="form-control" id="first_name">
                
                </div>

                <div class="col-6">
                  <label for="name" class="form-label">Last Name</label>
                  <input type="text" value="{{$user->last_name}}" name="last_name" class="form-control" id="last_name">
                
                </div>

                <div class="col-6">
                  <label for="name" class="form-label">Email</label>
                  <input type="text"  value="{{$user->email}}"  name="email" class="form-control" id="email">
                 
                </div>

                


                

                <div class="col-6">
                  <label for="name" class="form-label">City</label>
                  <input type="text" value="{{$user->city}}"   name="city" class="form-control" id="city">
                </div>
                
                <div class="col-6">
                  <label for="name" class="form-label">CNIC Number</label>
                  <input type="number" value="{{$user->cnic_number}}"   name="cnic_number" class="form-control" id="cnic_number">
                    </div>
                 

                <div class="col-6">
                  <label for="name" class="form-label">Phone Number</label>
                  <input type="number" value="{{$user->phone_number}}"   name="phone_number" class="form-control" id="phone_number">
                 
                </div>

          

              

                <div class="col-6">
                  <label for="name" class="form-label">Role ID</label>
                  <input type="text"  value="{{optional($user->role)->name}}"  name="role_id" class="form-control" id="role_id">
                 
                </div>

                
                <div class="col-12">
                  <label for="status" class="form-label">Status</label><br>
                   @if($user->status == 1)
                    <span class="badge bg-success">Active</span>
                    @else
                    <span class="badge bg-danger">In-active</span>
                    @endif
                </div>
                
               

                <div class="col-12">
                  <label for="name" class="form-label">Address</label>
                  <textarea cols="4"  rows="5" name="address" class="form-control" id="address">{{$user->address}}</textarea>
                      
                    </div>
              </form><!-- Vertical Form -->

            </div>
          </div>

            
            </div>
          </div>
    </section>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
            <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                <h5 class="card-title" style="color: #44b89d;">Borrowed Books List</h5>
            </div>

            </div>
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Auther</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">Publish Year</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                  </tr>
                </head>
                <tbody>
                  @foreach ($books as $book)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><img src="{{ $book->book_picture_url }}" alt="" width="50"></td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->auther }}</td>
                    <td>{{ $book->isbn_number }}</td>
                    <td>{{ $book->publish_year }}</td>
                    <td>{{ optional($book->category)->name}}</td>
                    <td><a href="{{ route('admins.return.Book',['id'=>$book->id]) }}" onclick="return confirm('Are you sure?')" class="btn btn-primary btn-sm" title="Return Book"><i class="bi bi-upload"></i></a></td>
<                 </tr>
                  @endforeach
                </tbody>
              </table>

            </div>
          </div>
    </section>
            
@endsection