@extends('layouts.app1');

@section('title', 'Login')


@section('content')

<section id="contact" class="contact mb-5">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-12 text-center mb-5">
            <h1 class="page-title">Login</h1>
          </div>
        </div>

        <div class="row gy-4">
            <div class="col-md-4" ></div>

            <div class="col-md-4" >

                <div class="form mt-7">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="form-group ">
                            <label for="email" > Email </label>
                            <input id="email" class="form-control" type="email" name="email" required  />
                        </div>

                        <!-- Password -->
                        <div class="form-group ">
                            <label for="password" > Password </label>
                            <input id="password" class="form-control" type="password" name="password" required  />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <button type="submit" class="btn btn-primary"> Login </button>
                        </div>
                    </form>
                </div>   
            </div>     
            <div class="col-md-4" ></div>

        </div>
  </div>
      
</section>

@endsection

