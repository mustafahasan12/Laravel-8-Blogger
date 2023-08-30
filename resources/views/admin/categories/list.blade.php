@extends('layouts.authlayout');

@section('title', 'Categories')

@section('content')

   <!-- Begin Page Content -->
<div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Categories</h1> <br>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary" > Add Categories </a>
        </div>

        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif

           <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($Categories as $Category)  
                                        <tr>
                                            <td> {{ $Category->id }} </td>
                                            <td> {{ $Category->name }} </td>
                                            <td> <a href="{{ route('admin.categories.edit', ['id' => $Category->id]) }}" class="btn btn-primary" > Edit </a> 
                                                <button class="btn btn-danger" onclick="deletecategories('{{$Category->id}}');" > Delete </button>
                                            </td>
                                        </tr>
                                      @endforeach  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

</div>        
@endsection
<script>

     function deletecategories(id) {
           
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
             if (result.isConfirmed) {
                $.ajax({
                    url: '/admin/categories/delete',
                    method: 'POST',
                    data: { "_token": "{{ csrf_token() }}", id:id },
                    success: function(response){
                        if(response.status == 1){
                            Swal.fire(
                                'Deleted!',
                                response.message,
                                'success'
                            )
                            location.reload();
                        } else {
                            Swal.fire(
                                'Something went wrong',
                                'danger'
                            )
                        }
                    }
                })
             }   
        })


     }   

</script> 