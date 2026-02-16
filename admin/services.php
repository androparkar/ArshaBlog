<?php
include_once('./admin-includes/header.php');
include_once('./admin-includes/sidebar.php');
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Manage Services</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Admin</a></li>
                <li class="breadcrumb-item active">Services</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="modal fade" id="service_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="form_title">Add A Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- General Form Elements -->
                    <form id="service_form">
                        <input type="hidden" name="service_id">
                        <input type="hidden" name="old_img">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="service-title">Service Title</span>
                                    <input type="text" class="form-control" name="service_title" placeholder="Title" aria-label="Title" aria-describedby="service-title">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="service-title">Service Icon</span>
                                    <input type="text" class="form-control" name="service_icon" placeholder="Icon" aria-label="Icon" aria-describedby="service-icon">
                                </div>
                            </div>
                        </div>

                        <!-- <div class="row mb-3">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <label class="input-group-text" for="serviceImage">Image</label>
                                    <input type="file" class="form-control" accept="image/*" id="serviceImage" name="service_image">
                                </div>
                            </div>
                        </div> -->

                        <div class="row mb-3">
                            <label for="description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-12" id="editor">
                                <textarea class="form-control" style="height: 100px" id="description" name="description"></textarea>
                            </div>
                        </div>
    


                    </form><!-- End General Form Elements -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close">Close</button>
                    <button type="button" class="btn btn-primary" id="submit" data-bs-dismiss="modal" onclick="insert()">Submit</button>
                    <button type="button" class="btn btn-primary" style="display: none;" id="update" data-bs-dismiss="modal" onclick="update()">Update</button>
                </div>
            </div>
        </div>
    </div><!-- End Service Modal-->

    <section class="section">
        <div class="row">
            <!-- Success/Error alerts -->
            <div class="col-sm-12">
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
                                <h5 class="card-title">Services</h5>
                            </div>
                            <div class="col-sm-2 mt-3">
                                <button type="button" class="btn btn-success" style="float: right;" data-bs-toggle="modal" data-bs-target="#service_modal"><i class="bi bi-plus-circle"></i> add</button>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="service_table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Service Icon</th>
                                    <th>Service Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#</td>
                                    <td><img src="" alt="service image" width="80px" height="80px"></td>
                                    <td>sample</td>
                                    <td>sample</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-success" name="edit" onclick="edit(id)"><i class="bi bi-pencil-square"></i></button>
                                        <button type="button" class="btn btn-outline-danger" name="delete" onclick="delete_item(id)"><i class="bi bi-trash3-fill"></i></button>
                                        </form>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
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
        $('#serviceImage').on('change', function() {
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
        if ($.fn.DataTable.isDataTable('#service_table')) {
            $('#service_table').DataTable().destroy();
        }

        $.ajax({
            type: "POST",
            url: "Apis/load.php",
            data: {
                reqType: "services"
            },
            success: function(response) {
                $("#service_table tbody").html('');
                const res = JSON.parse(response);
                var htmlData = '';
                if (res.statusCode === 200) {
                    $(res.data).each(function(index, val) {
                        htmlData += `
                        <tr>
                            <td>${index+1}</td>
                            <td class="text-center"><i class="${val.icon}"></i></td>
                            <td>${val.title}</td>
                            <td>${val.description}</td>
                            <td>
                                <button type="submit" class="btn btn-outline-success" name="edit"  data-bs-toggle="modal" data-bs-target="#service_modal" onclick="edit(${val.id})"><i class="bi bi-pencil-square"></i></button>
                                <button type="submit" class="btn btn-outline-danger" name="delete" onclick="delete_item(${val.id})"><i class="bi bi-trash3-fill"></i></button>
                            </td>
                        </tr>
                        `;
                    });
                    $("#service_table tbody").html(htmlData);
                } else {
                    $('#error_div').show();
                }
                // enable DataTable 
                $('#service_table').DataTable();


            },
            error: function(response) {
                $('#error_div').show();
            }
        });

    }

    function insert() {
        var formData = new FormData($('#service_form')[0]);
        formData.append("reqType", "services");
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
                    $('#service_form')[0].reset();
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
                reqType: 'services'
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
        $('#form_title').text('Edit service');
        $('#submit').hide();
        $('#update').show();

        $.ajax({
            type: "POST",
            url: "./Apis/edit.php",
            data: {
                id,
                reqType: "services"
            },
            success: function(response) {
                const res = JSON.parse(response);
                if (res.statusCode === 200) {
                    $('[name="service_id"]').val(res.data.id);
                    $('[name="service_title"]').val(res.data.title);
                    $('[name="description"]').val(res.data.description);
                    $('[name="old_img"]').val(res.data.service_img);
                    $('#image').attr('src', "<?= SERVICE_URL ?>" + res.data.service_img);
                    $('#preview_image').fadeIn();
                }
            },
            error: function(response) {
                alert(response)
            }
        });

    }

    function update() {
        var formData = new FormData($('#service_form')[0]);
        formData.append("reqType", "services");
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
                    $('#service_form')[0].reset();
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
