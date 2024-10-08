<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Laravel CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>


    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card mt-5 shadow">

                    <div class="card-header d-flex justify-content-between align-item-center">

                        <h4>Student Management CRUD</h4>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                            <i class="bi bi-plus-circle-dotted"></i>Add New Student
                        </button>


                    </div>

                    <div class="card-body">
                        <div id="show_all_student_data"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--Add New Student Modal -->
    <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Student</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="add_new_student_form" enctype="multipart/form-data">

                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="row">
                            <div class="col-lg">
                                <label for="fname">First Name</label>
                                <input type="text" name="fname" class="form-control" required>
                            </div>
                            <div class="col-lg">
                                <label for="fname">Last Name</label>
                                <input type="text" name="lname" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <label for="fname">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <label for="avatar">Avatar</label>
                                <input type="file" name="avatar" class="form-control" required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="add_student_btn">Add Student</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Edit New Student Modal -->
    <div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit New Student</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="update_student_form" enctype="multipart/form-data">

                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="user_id" id="user_id">
                        <div class="row">
                            <div class="col-lg">
                                <label for="fname">First Name</label>
                                <input type="text" id="fname" name="fname" class="form-control" required>
                            </div>
                            <div class="col-lg">
                                <label for="fname">Last Name</label>
                                <input type="text" id="lname" name="lname" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <label for="fname">Email</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div id="avatar"></div>
                            <div class="col-lg">
                                <label for="avatar">Avatar</label>
                                <input type="file" name="avatar" class="form-control">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="update_student_btn">Update Student</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- DataTable -->
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {


            $('#add_new_student_form').submit(function(e) {

                e.preventDefault();
                const fd = new FormData(this);

                $('#add_student_btn').text('Adding...');

                $.ajax({
                    url: '{{route("store")}}',
                    method: 'post',
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 200) {
                            Swal.fire(
                                "Added !",
                                "Student Added Successfully !",
                                "success"
                            )
                            $('#add_student_btn').text('Add Student');
                            $('#add_new_student_form')[0].reset();
                            $('#addStudentModal').modal('hide');
                            fetchAllStudents();

                        }
                    }
                })
            });

            $(document).on('click', '.userEditBtn', function(e) {
                e.preventDefault();
                var id = $(this).attr('id');

                $.ajax({
                    url: '{{route("edit")}}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{csrf_token()}}'
                    },
                    success: function(response) {
                        $('#fname').val(response.first_name);
                        $('#lname').val(response.last_name);
                        $('#email').val(response.email);
                        $('#avatar').html(
                            `<img src="storage/images/${response.avatar}" width="100px" height="100px" class='img-field img-thumbnail rounded-circle'>`
                        );
                        $('#user_id').val(response.id);

                    }
                })
            });

            $('#update_student_form').submit(function(e) {

                e.preventDefault();
                const fd = new FormData(this);

                $('#update_student_btn').text('Updating...');

                $.ajax({
                    url: '{{route("update")}}',
                    method: 'post',
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 200) {
                            Swal.fire(
                                "Updated !",
                                "Student Updated Successfully !",
                                "success"
                            )
                            $('#update_student_btn').text('Update Student');
                            $('#update_student_form')[0].reset();
                            $('#editStudentModal').modal('hide');
                            fetchAllStudents();

                        }
                    }
                })
            });

            fetchAllStudents();

            function fetchAllStudents() {
                $.ajax({
                    url: '{{ route("fetchAll") }}',
                    method: "get",
                    success: function(response) {
                        $('#show_all_student_data').html(response);
                        $('#stuTable').DataTable();
                    }

                });
            }



        });
    </script>
</body>

</html>