@extends('include.app')



@section('content')
    <!-- contact section -->

    <section class="contact_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ">
                    <div class="heading_container ">
                        <h2 class="">
                            Contactez-nous
                        </h2>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show"
                            role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div>
                            <input type="text" name="name" placeholder="Name" />
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <input type="email" name="email" placeholder="Email" />
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <input type="text" name="contact_number" placeholder="Pone Number" />
                            @error('contact_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <input type="text" name="subject" placeholder="Subject" />
                            @error('subject')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <input type="text" name="message" class="message-box" placeholder="Message" />
                            @error('message')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="btn-box">
                            <button>
                                SEND
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="img-box">
                        <img src="{{ asset('user_panel/images/8643765.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end contact section -->

    <!-- info section -->
@endsection
