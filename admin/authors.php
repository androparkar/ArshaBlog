<?php
include_once('./admin-includes/header.php');
include_once('./admin-includes/sidebar.php');
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Manage Author</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Admin</a></li>
                <li class="breadcrumb-item active">Author</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="modal fade" id="author_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="form_title">Add Author</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- General Form Elements -->
                    <form method="POST" id="author_form">

                        <input type="hidden" name="author_id">
                        <input type="hidden" name="old_img">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="author-name">Name</span>
                                    <input type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="author-name" name="author_name" required>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="author-email">Email</span>
                                    <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="author-email" name="author_email" required>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="author-contact">Contact</span>
                                    <input type="text" class="form-control" placeholder="Phone" aria-label="Phone Number" aria-describedby="author-contact" name="author_phone" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="selectDesignation">Type</label>
                                    <select class="form-select" id="selectDesignation" name="author_designation" required>
                                        <option selected>Choose...</option>
                                        <option value="writer">Writer</option>
                                        <option value="editor">Editor</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="authorImage">Profile</label>
                                    <input type="file" class="form-control" accept="image/*" id="authorImage" name="author_image" required>
                                </div>
                            </div>
                            <!-- image preview -->
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Image Preview</h5>
                                        <!-- image carousel -->
                                        <div id="preview_image" class="carousel slide" style="display: none;" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="" class="d-block" style="width: 200px; height: 150px;" alt="profile image" id="image">
                                                </div>
                                            </div>
                                        </div><!-- End image carousel-->
                                    </div>
                                </div>
                            </div>
                            <!-- End image preview -->
                        </div>

                    </form><!-- End General Form Elements -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="submit" onclick="insert()">Submit</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" style="display: none;" id="update" onclick="update()">Update</button>
                </div>
            </div>
        </div>
    </div><!-- End Author Modal-->

    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <!-- Success/Error alerts -->
                <div>
                    <div class="alert alert-danger alert-dismissible fade show" style="display: none;" role="alert" id="error_div">
                        <strong>Sorry!</strong> Something went Wrong
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="alert alert-success alert-dismissible fade show" style="display: none;" role="alert" id="success_div">
                        <strong>Hurray!</strong> Data Saved
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                <!-- End of alerts -->
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-10">
                                <h5 class="card-title">Authors List</h5>
                            </div>
                            <div class="col-sm-2 mt-3">
                                <button type="button" class="btn btn-success" style="float: right;" data-bs-toggle="modal" data-bs-target="#author_modal"><i class="bi bi-plus-circle"></i> add</button>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered" id="author_table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Profile Picture</th>
                                        <th>Author Name</th>
                                        <th>Author Designation</th>
                                        <th>Contact</th>
                                        <th>Email</th>
                                        <th data-type="date" data-format="YYYY/DD/MM">Joins Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#</td>
                                        <td><img src="" alt="pofile image" width="80px" height="80px"></td>
                                        <td>sample</td>
                                        <td>sample</td>
                                        <td>sample</td>
                                        <td>sample</td>
                                        <td>sample</td>
                                        <td>sample</td>
                                        <td>
                                            <button type="submit" class="btn btn-outline-success" name="update"><i class="bi bi-pencil-square"></i></button>
                                            <button type="submit" class="btn btn-outline-danger" name="delete"><i class="bi bi-trash3-fill"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- End Table Responsive with stripped rows -->

                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php include_once('./admin-includes/footer.php'); ?>

<script>
    $(document).ready(function() {
        getData();
        $('#authorImage').on('change', function() {
            const file = this.files[0];
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#image').attr('src', e.target.result);
                    $('#preview_image').fadeIn();
                };
                reader.readAsDataURL(file);
            }
        }); // image preview before upload 

        $('#close').on('click', function(params) {
            location.reload();
        });

    });

    function formatDate(date) {
        const parts = date.split(' ')
        return parts[0]; // yyyy-mm-dd
    }

    function getData() {
        if ($.fn.DataTable.isDataTable('#author_table')) {
            $('#author_table').DataTable().destroy();
        }

        $.ajax({
            type: "POST",
            url: "Apis/load.php",
            data: {
                reqType: "author"
            },
            success: function(response) {
                $("#author_table tbody").html('');
                const res = JSON.parse(response);
                var htmlData = '';
                if (res.statusCode === 200) {
                    $(res.data).each(function(index, val) {
                        htmlData += `
                        <tr>
                            <td>${index+1}</td>
                            <td><img src="<?= PROFILE_URL ?>${val.author_img}" class="img-fluid d-block mx-auto" alt="profile image" style="max-width: 80px; max-height: 80px; object-fit: cover; border-radius: 4px;"></td>
                            <td>${val.author_name}</td>
                            <td>${val.author_designation}</td>
                            <td>${val.phone}</td>
                            <td>${val.email}</td>
                            <td>${formatDate(val.join_date)}</td>
                            <td>
                                <button type="submit" class="btn btn-outline-success" name="edit"  data-bs-toggle="modal" data-bs-target="#author_modal" onclick="edit(${val.author_id})"><i class="bi bi-pencil-square"></i></button>
                                <button type="submit" class="btn btn-outline-danger" name="delete" onclick="delete_item(${val.author_id})"><i class="bi bi-trash3-fill"></i></button>
                            </td>
                        </tr>
                        `;
                    });
                    $("#author_table tbody").html(htmlData);
                } else {
                    $('#error_div').show();
                }
                //enable DataTable 
                $('#author_table').DataTable();


            },
            error: function(response) {
                $('#error_div').show();
            }
        });

    }

    function insert() {
        var formData = new FormData($('#author_form')[0]);
        formData.append("reqType", "author");
        $.ajax({
            url: 'Apis/insert.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                const res = JSON.parse(response);
                if (res.statusCode === 200) {
                    getData();
                    $('#success_div').fadeIn().delay(1500).fadeOut();
                    $('#author_form')[0].reset();
                    $('#preview_image').hide();
                    $('#image').attr('src', '');
                } else {
                    $('#error_div').fadeIn().delay(1500).fadeOut();
                }
            },
            error: function(xhr, status, error) {
                $('#error_div').show();
            }
        });
    }

    function delete_item(id) {
        $.ajax({
            url: 'Apis/delete.php',
            type: 'POST',
            data: {
                id,
                reqType: 'author'
            },
            success: function(response) {
                getData();
                $('#success_div').html(`<strong>Success!</strong> item deleted <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>`);
                $('#success_div').fadeIn().delay(1500).fadeOut();
            },
            error: function(xhr, status, error) {
                $('#error_div').show();
            }
        });
    }

    function edit(id) {
        $('#form_title').text('Edit Author');
        $('#submit').hide();
        $('#update').show();

        $.ajax({
            type: "POST",
            url: "./Apis/edit.php",
            data: {
                id,
                reqType: "author"
            },
            success: function(response) {
                const res = JSON.parse(response);
                if (res.statusCode === 200) {
                    $('[name="author_id"]').val(res.data.author_id);
                    $('[name="author_name"]').val(res.data.author_name);
                    $('[name="author_email"]').val(res.data.email);
                    $('[name="author_phone"]').val(res.data.phone);
                    $('[name="author_designation"]').val(res.data.author_designation);
                    $('[name="old_img"]').val(res.data.author_img);
                    $('#image').attr('src', "<?= PROFILE_URL ?>" + res.data.author_img);
                    $('#preview_image').fadeIn();
                }
            },
            error: function(response) {
                alert(response)
            }
        });

    }

    function update() {
        var formData = new FormData($('#author_form')[0]);
        formData.append("reqType", "author");
        $.ajax({
            url: 'Apis/update.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                const res = JSON.parse(response);
                if (res.statusCode === 200) {
                    getData();
                    $('#success_div').fadeIn().delay(1500).fadeOut();
                    $('#author_form')[0].reset();
                    $('#preview_image').hide();
                    $('#image').attr('src', '');
                } else {
                    $('#error_div').fadeIn().delay(1500).fadeOut();
                }

            },
            error: function(xhr, status, error) {
                $('#error_div').show();
            }
        });
    }
</script>