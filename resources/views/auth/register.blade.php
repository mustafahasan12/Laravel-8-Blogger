@extends('layouts.app1');

@section('title', 'Register ')


@section('content')

<section id="contact" class="contact mb-5">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-12 text-center mb-5">
            <h1 class="page-title">Register</h1>
          </div>
        </div>

        <div class="row gy-4">
            <div class="col-md-4" ></div>

            <div class="col-md-4" >

                <div class="form mt-7">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div>
                            <label for="name" > Name </label>
                            <input id="name" class="form-control" type="text" name="name" required  />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <label for="email" > Email </label>
                            <input id="email" class="form-control" type="email" name="email" required />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <label for="password" > Password </label>
                            <input id="password" class="form-control" type="password" name="password" required  />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <label for="password_confirmation" > Password Confirmation </label>
                            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                            <button type="submit" class="btn btn-primary"> Register </button>

                        </div>
                    </form>
                </div>   
            </div>     
            <div class="col-md-4" ></div>

        </div>
  </div>
      
</section>

@endsection

