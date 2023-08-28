@extends('layouts.authlayout');

@section('title', 'Role')

@section('content')

   <!-- Begin Page Content -->
<div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Role</h1> <br>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="{{ route('admin.role.create') }}" class="btn btn-primary" > Add Role </a>
        </div>

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
                                      @foreach($roles as $role)  
                                        <tr>
                                            <td> {{ $role->id }} </td>
                                            <td> {{ $role->name }} </td>
                                            <td> <a href="{{ route('admin.role.edit', ['id' => $role->id]) }}" class="btn btn-primary" > Edit </a> 
                                                <button class="btn btn-danger" onclick="deleterole('{{$role->id}}');" > Delete </button>
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

     function deleterole(id) {
           
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
                    url: 'role/delete/'+ id,
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