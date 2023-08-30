@extends('layouts.authlayout');

@section('title', 'Aboutus')

@section('content')

   <!-- Begin Page Content -->
<div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Aboutus</h1> <br>
        </div>

        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif

        

        <form method="POST" action="{{ route('admin.aboutus.update') }}" class="user" enctype="multipart/form-data" >
            @csrf
            <div class="row">
                <div class="col-md-4"> 
                    <div class="form-group">
                        <label for="name"> Title </label>
                        <input type="text" class="form-control form-control-user" id="title" name="title" aria-describedby="title" value="{{ $aboutus->title }}" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"> 
                    <div class="form-group">
                        <label for="name"> Image 1 </label>
                        <input type="file" class="form-control form-control-user" id="image1" name="image1" aria-describedby="image1"  >
                        <img src="{{ asset('admin/images/'.$aboutus->image1) }}" alt="image1" width="200px"  >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8"> 
                    <div class="form-group">
                        <label for="name"> Content 1 </label>
                        <textarea class="ckeditor" id="content1" name="content1" aria-describedby="content1" required> {{ $aboutus->content1 }} </textarea>
                    </div>
                </div>
            </div>    
            <div class="row">
                <div class="col-md-4"> 
                    <div class="form-group">
                        <label for="name"> Image 2 </label>
                        <input type="file" class="form-control form-control-user" id="image2" name="image2" aria-describedby="image2"  >
                        <img src="{{ asset('admin/images/'.$aboutus->image2) }}" alt="image2" width="200px"  >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8"> 
                    <div class="form-group">
                        <label for="name"> Content 2 </label>
                        <textarea class="ckeditor" id="content2" name="content2" aria-describedby="content2" required> {{ $aboutus->content2 }} </textarea>
                    </div>
                </div>
            </div>    
            <div class="row">
                <div class="col-md-4"> 
                    <div class="form-group">
                        <label for="name"> Image 3 </label>
                        <input type="file" class="form-control form-control-user" id="image3" name="image3" aria-describedby="image3"  >
                        <img src="{{ asset('admin/images/'.$aboutus->image3) }}" alt="image3" width="200px"  >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8"> 
                    <div class="form-group">
                        <label for="name"> Content 3 </label>
                        <textarea class="ckeditor" id="content3" name="content3" aria-describedby="content3" required> {{ $aboutus->content3 }} </textarea>
                    </div>
                </div>
            </div>    
                  
            
            <div class="row">
                <div class="col-lg-4">
                    <button type="submit" class="btn btn-primary" style="margin-top: 36px;" > Submit </button> 
                </div>
            </div> 

        </form>    
      

</div>        


<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>
  

@endsection
