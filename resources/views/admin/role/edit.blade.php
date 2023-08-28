@extends('layouts.authlayout');

@section('title', 'Edit Role')

@section('content')

   <!-- Begin Page Content -->
<div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Role</h1> <br>
        </div>

        <form method="POST" action="{{ route('admin.role.update', ['id'=>$role->id]) }}" class="user">
            @csrf
            <div class="row">
                <div class="col-md-4"> 
                    <div class="form-group">
                        <label for="name"> Name </label>
                        <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="name" value="{{ $role->name }}" required>
                    </div>
                </div>
                <div class="col-lg-4">
                    <button type="submit" class="btn btn-primary" style="margin-top: 36px;" > Submit </button> 
                </div>
            </div> 

        </form>    
      

</div>        
@endsection