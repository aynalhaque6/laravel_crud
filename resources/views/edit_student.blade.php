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
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <title>Student Management System v-0.1</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 my-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Edit Student</h3>
                        <a href="{{route('all.student')}}" class="btn btn-sm btn-outline-primary"><i
                                class="las la-long-arrow-alt-left"></i> Back</a>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            @foreach ($errors->all() as $error)
                            <ul>

                                <li>{{ $error }}</li>

                            </ul>
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <form action="{{route('update.student', $student->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Student Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="emailHelp" value="{{$student->name}}" >
                            </div>

                            <div class="form-group">
                                <label for="roll">Student Roll</label>
                                <input type="number" name="roll" class="form-control" id="roll"
                                    value="{{$student->roll}}">
                            </div>

                            <div class="form-group">
                                <label for="reg">Student Registration</label>
                                <input type="number" name="reg" class="form-control" id="reg" value="{{$student->reg}}">
                            </div>

                            <div class="form-group">
                                <img src="{{asset('images/students/'.$student->image)}}" width="180" height="200" id="previewImage">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload Photo</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="img" id="imageInput"
                                        aria-describedby="inputGroupFileAddon01" value="{{$student->image}}" accept=".jpg, .jpeg, .png">
                                    <label class="custom-file-label" for="inputGroupFile01">{{$student->image}}</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">Student Email address</label>
                                <input type="email" name="email" class="form-control disabled" id="email"
                                    aria-describedby="emailHelp" value="{{$student->email}}">
                            </div>

                            <button type="submit" class="btn btn-primary add_student btn-block" name="save_btn">Update
                                Student</button>

                    </div>

                </div>
            </div>
            </form>
        </div>
    </div>
   @include('custom_js')

</body>

</html>