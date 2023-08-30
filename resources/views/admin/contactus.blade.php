@extends('layouts.authlayout');

@section('title', 'Contactus')

@section('content')

   <!-- Begin Page Content -->
<div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Contactus</h1> <br>
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
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($contactus as $contact)  
                                        <tr>
                                            <td> {{ $contact->id }} </td>
                                            <td> {{ $contact->name }} </td>
                                            <td> {{ $contact->email }} </td>
                                            <td> {{ $contact->subject }} </td>
                                            <td> {{ $contact->message }} </td>
                                            <td> <button class="btn btn-danger" onclick="deletecontact('{{$contact->id}}');" > Delete </button>
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

     function deletecontact(id) {
           
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
                    url: '/admin/contact/delete',
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