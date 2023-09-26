<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <!-- Line Awsome -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <title>Student Management System v-0.1</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12 my-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Student Management System


                        </h3>
                        <a href="{{route('add.student')}}" class="btn btn-sm btn-outline-primary float-end"><i class="las la-plus"></i> ADD STUDENT</a>

                    </div>
                    <div class="card-body">
                        <div class="table-data">
                            {{-- @if(session()->has('msg'))
                            <p class="alert alert-success">{{ session()->get('msg') }}</p>
                            @endif --}}
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Roll</th>
                                        <th>Registration</th>
                                        <th>Email</th>
                                        <th>Photo</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$student->name}}</td>
                                        <td>{{$student->roll}}</td>
                                        <td>{{$student->reg}}</td>
                                        <td>{{$student->email}}</td>
                                        <td>
                                            <img src="{{ asset('images/students/'.$student->image)}}" width="80px" height="80px" class="rounded-circle">
                                        </td>
                                        <td>{{date('d-m-Y H:i a', strtotime($student->created_at))}}</td>
                                        <td>{{($student->created_at == $student->updated_at) ? 'N/A' : date('d-m-Y H:i
                                            a', strtotime($student->updated_at))}}</td>
                                        <td>
                                            <a href="{{route('edit.student',$student->id)}}" class="btn btn-info btn-sm"><i class="las la-edit"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm delete-confirm" std_name="{{ $student->name }}" std_id="{{ $student->id }}"><i class="las la-trash"></i></a>

                                            {{-- make toggle button --}}
                                            @if($student->status == 1)
                                                <a href="{{route('status.student', $student->id)}}" class="btn btn-success btn-sm change-status" std_id="{{ $student->id }}"><i class="las la-lightbulb"></i></a>
                                            @else
                                                <a href="{{route('status.student', $student->id)}}" class="btn btn-warning btn-sm change-status" std_id="{{ $student->id }}"><i class="las la-lightbulb"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    {{-- @include('custom_js'); --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js">
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        // ================ all students (show sweetalert dialog )
    
        @if(session()->has('msg'))
            swal({
                title: "{{ session()->get('msg') }}",
                icon: "{{ session()->get('msg_type') }}",
                button: "OK"
            , });
        @endif
        
        // Listen for a click event on elements with the 'delete-button' class
        document.addEventListener('click', function (event) {
            if (event.target && event.target.classList.contains('delete-confirm')) {
                event.preventDefault(); // Prevent the default link behavior

                // Get the student's name from the data attribute
                const studentName = event.target.getAttribute('std_name');
                const stdId = event.target.getAttribute('std_id');
                const deleteUrl = "{{ route('delete.student', ':stdId') }}".replace(':stdId', stdId)

                swal({
                    title: "Confirmation?",
                    text: "Are you sure you want to delete " + studentName + "?",
                    icon: "warning",
                    buttons: ["Cancel", "Yes, Delete"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) { 
                        window.location.href = deleteUrl;
                    } else {
                        swal("Student delete Cancelled!!!");
                    }
                });
            }
           
        });

    </script>

</body>

</html>
