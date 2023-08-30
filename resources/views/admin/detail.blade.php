@extends('layouts.authlayout');

@section('title', 'Detail')

@section('content')

   <!-- Begin Page Content -->
<div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail</h1> <br>
        </div>

        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif

        

        <form method="POST" action="{{ route('admin.detail.update') }}" class="user">
            @csrf
            <div class="row">
                <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="name"> Address </label>
                        <input type="text" class="form-control form-control-user" id="address" name="address" aria-describedby="address" value="{{ $detail->address }}" required>
                    </div>
                </div>
                <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="name"> Phone No. </label>
                        <input type="text" class="form-control form-control-user" id="phone_no" name="phone_no" aria-describedby="phone_no" value="{{ $detail->phone_no }}" required>
                    </div>
                </div>
                <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="name"> Email </label>
                        <input type="text" class="form-control form-control-user" id="email" name="email" aria-describedby="email" value="{{ $detail->email }}" required>
                    </div>
                </div>
                <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="name"> Copyright </label>
                        <input type="text" class="form-control form-control-user" id="copyright" name="copyright" aria-describedby="copyright" value="{{ $detail->copyright }}" required>
                    </div>
                </div>
                <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="name"> Twitter Link </label>
                        <input type="text" class="form-control form-control-user" id="twitter_link" name="twitter_link" aria-describedby="twitter_link" value="{{ $detail->twitter_link }}" required>
                    </div>
                </div>
                <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="name"> Facebook_Link </label>
                        <input type="text" class="form-control form-control-user" id="facebook_link" name="facebook_link" aria-describedby="facebook_link" value="{{ $detail->facebook_link }}" required>
                    </div>
                </div>
                <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="name"> Instagram Link </label>
                        <input type="text" class="form-control form-control-user" id="instagram_link" name="instagram_link" aria-describedby="instagram_link" value="{{ $detail->instagram_link }}" required>
                    </div>
                </div>
                <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="name"> Skype Link </label>
                        <input type="text" class="form-control form-control-user" id="skype_link" name="skype_link" aria-describedby="skype_link" value="{{ $detail->skype_link }}" required>
                    </div>
                </div>
                <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="name"> Linkedin Link </label>
                        <input type="text" class="form-control form-control-user" id="linkedin_link" name="linkedin_link" aria-describedby="linkedin_link" value="{{ $detail->linkedin_link }}" required>
                    </div>
                </div>

                <div class="col-lg-4">
                    <button type="submit" class="btn btn-primary" style="margin-top: 36px;" > Submit </button> 
                </div>
            </div> 

        </form>    
      

</div>        
@endsection