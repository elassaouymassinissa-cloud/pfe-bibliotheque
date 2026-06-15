@extends('layouts.main_layout')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1 style="color: #44b89d;">All Borrowed Books</h1>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    @if ($borrowedBooks->count())
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>User Image</th>
                                    <th>User Name</th>
                                    <th>Book Image</th>
                                    <th>Title</th>
                                  <!--  <th>Author</th> -->
                                    <th>ISBN</th>
                                    <th>Publish Year</th>
                                    <th style="color:green;">Borrowed Date</th>
                                    <th style="color:red;">Return Date</th>
                                    <th>Fine</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($borrowedBooks as $borrowed)
                                    @php
                                        $borrowDate = \Carbon\Carbon::parse($borrowed->borrow_date);
                                        $dueDate = $borrowDate->copy()->addDays(15);
                                        $isOverdue = now()->greaterThan($dueDate);
                                    @endphp
                                    <tr>
                                        <td><img src="{{ $borrowed->user->profile_picture_url }}" width="40"></td>
                                        <td>{{ $borrowed->user->user_name }}</td>
                                        <td><img src="{{ $borrowed->book->book_picture_url }}" width="50"></td>
                                        <td>{{ $borrowed->book->title }}</td>
                                       <!-- <td>{{ $borrowed->book->author }}</td>-->
                                        <td>{{ $borrowed->book->isbn_number }}</td>
                                        <td>{{ $borrowed->book->publish_year }}</td>
                                        <td style="color:green;">{{ $borrowed->borrow_date }}</td>
                                        <td style="color:red;">{{ $borrowed->return_date }}</td>
                                        <td>
                                            @if ($isOverdue)
                                              <!--  <button class="btn btn-info btn-sm checkout-button"
                                                    data-fine="{{ $borrowed->fine_amount }}"
                                                    data-book_id="{{ $borrowed->id }}"> 
                                                    fine 20$
                                                </button>-->
                                                <span style="color:red">fine 20$</span>
                                            @else
                                                <span  style="color:green">No fine</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-muted">No borrowed books found.</p>
                    @endif
                </div>
            </div>
        </section>
    </main>
@endsection
