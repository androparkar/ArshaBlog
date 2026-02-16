<?php
include_once('./admin-includes/header.php');
include_once('./admin-includes/sidebar.php');
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Manage Teams</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Admin</a></li>
                <li class="breadcrumb-item active">Teams</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="modal fade" id="teams_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="form_title">Add Team Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- General Form Elements -->
                    <form id="teams_form">

                        <input type="hidden" name="id">
                        <input type="hidden" name="old_img">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="team-name">Name</span>
                                    <input type="text" class="form-control" name="name" placeholder="Title" aria-label="Name" aria-describedby="team-name" required>
                                </div>
                            </div>
                                   <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="team-name">Designation</span>
                                    <input type="text" class="form-control" name="designation" placeholder="Designation" aria-label="Designation" aria-describedby="team-designation" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="team-link-X"><i class="bi bi-twitter-x"></i></span>
                                    <input type="text" class="form-control" name="X" placeholder="link" aria-label="link-Twitter/X" aria-describedby="team-link-X">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="team-link-linkdin"><i class="bi bi-linkedin"></i></span>
                                    <input type="text" class="form-control" name="linkdin" placeholder="link" aria-label="link-Linkdin" aria-describedby="team-link-linkdin">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="team-link-insta"><i class="bi bi-instagram"></i></span>
                                    <input type="text" class="form-control" name="instagram" placeholder="link" aria-label="link-Instagram" aria-describedby="team-link-insta">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="team-link-fb"><i class="bi bi-facebook"></i></span>
                                    <input type="text" class="form-control" name="facebook" placeholder="link" aria-label="link-Facebook" aria-describedby="team-link-fb">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="input-group col-md-12">
                                <label class="input-group-text" for="teamImage">Profile Picture</label>
                                <input type="file" class="form-control" accept="image/*" id="teamImage" name="team_image">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12" id="editor">
                                <div class="input-group">
                                    <span class="input-group-text">Description</span>
                                    <textarea class="form-control" aria-label="Description" name="description"></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- image preview -->
                        <div class="row mb-3">
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
                        </div>
                        <!-- End image preview -->
                    </form><!-- End General Form Elements -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close">Close</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="submit" id="submit" onclick="insert()">Submit</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" style="display: none;" name="update" id="update" onclick="update()">Update</button>
                </div>
            </div>
        </div>
    </div><!-- End Teams Modal-->

    <section class="section">
        <div class="row">
            <!-- Success/Error alerts -->
            <div class="col-md-12">
                <!-- <input type="hidden" name="category_id"> -->
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

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-10">
                                <h5 class="card-title">Team Members</h5>
                            </div>
                            <div class="col-sm-2 mt-3">
                                <button type="button" class="btn btn-success" style="float: right;" data-bs-toggle="modal" data-bs-target="#teams_modal"><i class="bi bi-plus-circle"></i> add</button>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered" id="teams_table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Profile</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Description</th>
                                        <th class="text-center"><i class="bi bi-twitter-x"></i></th>
                                        <th><i class="bi bi-linkedin"></i> linkdin</th>
                                        <th><i class="bi bi-instagram"></i> Insta</th>
                                        <th><i class="bi bi-facebook"></i> FB</th>
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
                                        <td>sample</td>
                                        <td>
                                            <button type="submit" class="btn btn-outline-success" name="edit" onclick="edit(id)"><i class="bi bi-pencil-square"></i></button>
                                            <button type="submit" class="btn btn-outline-danger" name="delete" onclick="delete_item(id)"><i class="bi bi-trash3-fill"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>

        </div>
    </section>
</main>
<?php include_once('./admin-includes/footer.php'); ?>

<script>
    $(document).ready(function() {
        getData();
        $('#teamImage').on('change', function() {
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

    function getData() {
        if ($.fn.DataTable.isDataTable('#teams_table')) {
            $('#teams_table').DataTable().destroy();
        }

        $.ajax({
            type: "POST",
            url: "Apis/load.php",
            data: {
                reqType: "teams"
            },
            success: function(response) {
                $("#teams_table tbody").html('');
                const res = JSON.parse(response);
                var htmlData = '';
                if (res.statusCode === 200) {
                    $(res.data).each(function(index, val) {
                        htmlData += `
                        <tr>
                            <td>${index+1}</td>
                            <td><img src="<?= TEAMS_PROFILE_URL ?>${val.profile_img}" class="img-fluid d-block mx-auto" alt="profile image" style="max-width: 80px; max-height: 80px; object-fit: cover; border-radius: 4px;"></td>
                            <td>${val.member_name}</td>
                            <td>${val.member_designation}</td>
                            <td>${val.member_description}</td>
                            <td>${val.X}</td>
                            <td>${val.linkdin}</td>
                            <td>${val.instagram}</td>
                            <td>${val.facebook}</td>
                            <td>
                                <button type="submit" class="btn btn-outline-success" name="edit"  data-bs-toggle="modal" data-bs-target="#teams_modal" onclick="edit(${val.id})"><i class="bi bi-pencil-square"></i></button>
                                <button type="submit" class="btn btn-outline-danger" name="delete" onclick="delete_item(${val.id})"><i class="bi bi-trash3-fill"></i></button>
                            </td>
                        </tr>
                        `;
                    });
                    $("#teams_table tbody").html(htmlData);
                } else {
                    $('#error_div').show();
                }
                // enable DataTable 
                $('#teams_table').DataTable();


            },
            error: function(response) {
                $('#error_div').show();
            }
        });

    }

    function insert() {
        var formData = new FormData($('#teams_form')[0]);
        formData.append("reqType", "teams");
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
                    $('#teams_form')[0].reset();
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
                reqType: 'teams'
            },
            success: function(response) {
                getData();
                $('#success_div').html(`<strong>Success!</strong> item deleted <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>`);
                $('#success_div').show();
            },
            error: function(xhr, status, error) {
                $('#error_div').show();
            }
        });
    }

    function edit(id) {
        $('#form_title').text('Edit Team Member');
        $('#submit').hide();
        $('#update').show();

        $.ajax({
            type: "POST",
            url: "./Apis/edit.php",
            data: {
                id,
                reqType: "teams"
            },
            success: function(response) {
                const res = JSON.parse(response);
                if (res.statusCode === 200) {
                    $('[name="id"]').val(res.data.id);
                    $('[name="name"]').val(res.data.member_name);
                    $('[name="X"]').val(res.data.X);
                    $('[name="linkdin"]').val(res.data.linkdin);
                    $('[name="instagram"]').val(res.data.instagram);
                    $('[name="facebook"]').val(res.data.facebook);
                    $('[name="designation"]').val(res.data.member_designation);
                    $('[name="old_img"]').val(res.data.profile_img);
                    $('#image').attr('src', "<?= TEAMS_PROFILE_URL ?>" + res.data.profile_img);
                    $('#preview_image').fadeIn();
                }
            },
            error: function(response) {
                alert(response)
            }
        });

    }

    function update(formData) {
        var formData = new FormData($('#teams_form')[0]);
        formData.append("reqType", "teams");
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
                    $('#teams_form')[0].reset();
                    $('#preview_image').hide();
                    $('#image').attr('src', '');
                    setTimeout(() => {
                        $('#update').blur();
                    }, 1);
                } else {
                    $('#error_div').fadeIn().delay(1500).fadeOut();
                }

            },
            error: function(xhr, status, error) {
                $('#error_div').show();
            }
        });
    }

    function safeShowModal(modalId) {
        if (document.activeElement) {
            document.activeElement.blur();
        }
        $(modalId).modal('show');
    }
</script>