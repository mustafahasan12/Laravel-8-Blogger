@extends('layouts.authlayout');

@section('title', 'Add Blog')

@section('content')

   <!-- Begin Page Content -->
<div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Blog</h1> <br>
        </div>
        

        <form method="POST" action="{{ route('admin.blog.store') }}" class="user" enctype="multipart/form-data" >
            @csrf
            <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="name"> Category </label>
                        <select class="form-control roledrop" id="category" name="cat_id" aria-describedby="category" required>
                            <option value=""> Select Category </option>
                            @foreach( $category as $cat )    
                                <option value="{{ $cat->id }}" > {{ $cat->name }} </option>
                            @endforeach 
                        </select>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="name"> Title </label>
                        <input type="text" class="form-control form-control-user" id="title" name="title" aria-describedby="title"  required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="name"> Image</label>
                        <input type="file" class="form-control form-control-user" id="blogimage" name="blogimage" aria-describedby="blogimage"  >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10"> 
                    <div class="form-group">
                        <label for="name"> Content </label>
                        <textarea class="ckeditor" id="content" name="content" aria-describedby="content" required>  </textarea>
                    </div>
                </div>
            </div>   
            <div class="row">
                <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="name"> Publish </label>
                        <input type="date" class="form-control form-control-user" id="publishon" name="publishon" aria-describedby="publishon"  >
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="name"> Status </label>
                        <select class="form-control roledrop" id="status" name="status" aria-describedby="status" required>
                                <option value="1" > Active </option>
                                <option value="2" > Not Active </option>
                        </select>                    
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
