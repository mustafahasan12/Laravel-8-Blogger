@extends('layouts.authlayout');

@section('title', 'User')

@section('content')

   <!-- Begin Page Content -->
<div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">User</h1> <br>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="{{ route('admin.user.create') }}" class="btn btn-primary" > Add User </a>
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
                                            <th>Role</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($users as $user)  
                                        <tr>
                                            <td> {{ $user->id }} </td>
                                            <td> {{ $user->role->name }} </td>
                                            <td> {{ $user->name }} </td>
                                            <td> {{ $user->email }} </td>
                                            <td> <a href="{{ route('admin.user.edit', ['id' => $user->id]) }}" class="btn btn-primary" > Edit </a> 
                                                <button class="btn btn-danger" onclick="deleteuser('{{$user->id}}');" > Delete </button>
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

     function deleteuser(id) {
           
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
                    url: '/admin/user/delete',
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