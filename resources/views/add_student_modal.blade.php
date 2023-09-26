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
                        <h3 class="text-center">Add Student</h3>
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
                        <form action="{{route('store.student')}}" method="post" enctype="multipart/form-data">
                            @csrf


                            <div class="form-group">
                                <label for="name">Student Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="emailHelp">
                            </div>

                            <div class="form-group">
                                <label for="roll">Student Roll</label>
                                <input type="number" name="roll" class="form-control" id="roll">
                            </div>

                            <div class="form-group">
                                <label for="reg">Student Registration</label>
                                <input type="number" name="reg" class="form-control" id="reg">
                            </div>

                            <div class="form-group">
                                <img width="180" height="200" id="previewImage" style="display:none;">

                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload Photo</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="img" id="imageInput"
                                        aria-describedby="inputGroupFileAddon01" accept=".jpg, .jpeg, .png">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose Student Photo</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">Student Email address</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    aria-describedby="emailHelp">
                            </div>

                            <button type="submit" class="btn btn-primary add_student btn-block" name="save_btn">Save
                                Student</button>

                    </div>

                </div>
            </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js">
    </script>
    <script>
        document.getElementById('imageInput').addEventListener('change', function() {
        const imageContainer = document.getElementById('previewImage');
        const customFileLabel = document.querySelector('.custom-file-label');
        const file = this.files[0];
        
        if (file) {
            const imageUrl = URL.createObjectURL(file);
            
            // Display the image and update label
            imageContainer.style.display = 'block';
            imageContainer.src = imageUrl;
            customFileLabel.textContent = file.name;
        } else {
            // Hide the image and revert label
            imageContainer.style.display = 'none';
            customFileLabel.textContent = 'Choose Student Photo';
        }
    });
    </script>


</body>

</html>