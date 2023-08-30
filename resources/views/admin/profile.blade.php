@extends('layouts.authlayout');

@section('title', 'Profile')

@section('content')

   <!-- Begin Page Content -->
<div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profile</h1> <br>
        </div>

        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif

        

        <form method="POST" action="{{ route('admin.profile.update', ['id' => Auth::user()->id ]) }}" class="user">
            @csrf
            <div class="row">
                <div class="col-md-4"> 
                    <div class="form-group">
                        <label for="name"> Name </label>
                        <input type="text" class="form-control form-control-user" id="name" name="name" aria-describedby="name" value="{{ Auth::user()->name }}" required>
                    </div>
                </div>
                <div class="col-md-4"> 
                    <div class="form-group">
                        <label for="name"> Email </label>
                        <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email" aria-describedby="emailHelp" value="{{ Auth::user()->email }}" required>
                    </div>
                </div>
                <div class="col-md-4"> 
                    <div class="form-group">
                        <label for="name"> Role </label>
                        <select class="form-control roledrop" id="role" name="role" aria-describedby="role" required>
                            <option value=""> Select Role </option>
                            @foreach( $roles as $role )    
                                <option value="{{ $role->id }}" {{ Auth::user()->role_id == $role->id ? 'selected' : '' }} > {{ $role->name }} </option>
                            @endforeach 
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <button type="submit" class="btn btn-primary" style="margin-top: 36px;" > Submit </button> 
                </div>
            </div> 

        </form>    
      

</div>        
@endsection