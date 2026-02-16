<?php
include_once('./admin-includes/header.php');
include_once('./admin-includes/sidebar.php');
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Manage Portfolio</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Admin</a></li>
                <li class="breadcrumb-item active">Portfolio</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="modal fade" id="project_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="form_title">New Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- General Form Elements -->
                    <form id="project_form">
                        <input type="hidden" name="project_id">
                        <div class="row">

                            <!-- Project Name input -->
                            <div class="col-sm-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="project-title">Project Title</span>
                                    <input type="text" class="form-control" placeholder="Title" aria-label="Title" aria-describedby="blog-title" name="project_title">
                                </div>
                            </div>

                            <!-- Category Selection -->
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="project_category">Category</label>
                                    <select class="form-select" id="project_category" name="project_category">
                                        <option selected>Choose...</option>
                                        <option value="APP">APP</option>
                                        <option value="PRODUCT">PRODUCT</option>
                                        <option value="BRANDING">BRANDING</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Client Name -->
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="project-cilent">Client</span>
                                    <input type="text" class="form-control" placeholder="Name" aria-label="Title" aria-describedby="project-cilent" name="project_client">
                                </div>
                            </div>

                            <!-- image Selection     -->
                            <div class="col-sm-8">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="projectImages">Upload Images</label>
                                    <input type="file" class="form-control" accept="image/*" name="images[]" id="projectImages" multiple required>
                                </div>
                            </div>

                            <!-- Date Selection -->
                            <div class="col-sm-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="project-date">Date</span>
                                    <input type="date" class="form-control" aria-label="date" aria-describedby="project-date" name="project_date">
                                </div>
                            </div>

                        </div>
                        
                        <!-- project description -->
                        <div class="row mb-3">
                            <label for="description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-12" id="editor">
                                <textarea class="form-control" style="height: 100px" id="description" name="description"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Image Preview</h5>
                                        <!-- image carousel -->
                                        <div id="preview_image" class="carousel slide" style="display: none;" data-bs-ride="carousel">
                                            <div class="carousel-inner" id="preview_project_images">
                                                <div class="carousel-item active">
                                                    <img src="" class="d-block" style="width: 200px; height: 150px;" alt="project image" id="image">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#preview_image" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#preview_image" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>

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
    </div><!-- End Form Modal-->

    <div class="modal fade" id="image_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Project Images</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">With controls</h5>
                            <!-- Slides with controls -->
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner" id="project_images">
                                    <div class="carousel-item active">
                                        <img src="assets/img/slides-1.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/img/slides-2.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/img/slides-3.jpg" class="d-block w-100" alt="...">
                                    </div>
                                </div>

                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>

                            </div><!-- End Slides with controls -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div><!-- End Image View Modal-->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
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
                                <h5 class="card-title">Portfolio List</h5>
                            </div>
                            <div class="col-sm-2 mt-3">
                                <button type="button" class="btn btn-success" style="float: right;" data-bs-toggle="modal" data-bs-target="#project_modal"><i class="bi bi-plus-circle"></i> add</button>
                            </div>
                        </div>

                        <table class="table table-striped table-hover table-bordered" id="portfolio_table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Project Name</th>
                                    <th>Images</th>
                                    <th>Category</th>
                                    <th>Client</th>
                                    <th>Description</th>
                                    <th data-type="date" data-format="YYYY/DD/MM">Project Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#</td>
                                    <td>sample</td>
                                    <td><img src="#" class="img-fluid d-block mx-auto" alt="Thumbnail image" style="max-width: 80px; max-height: 80px; object-fit: cover; border-radius: 4px;"></td>
                                    <td class="text-center"><button type="button" class="btn btn-primary" title="Show the images" name="showImages" data-bs-toggle="modal" data-bs-target="#image_modal" onclick="showImages(id)"><i class="bi bi-eye-fill"></i></button></td>
                                    <td>sample</td>
                                    <td>sample</td>
                                    <td>sample</td>
                                    <td>dd/mm/yyyy</td>
                                    <td>
                                        <button type="submit" class="btn btn-outline-success" name="edit" data-bs-toggle="modal" data-bs-target="#project_modal" onclick="edit(id)"><i class="bi bi-pencil-square"></i></button>
                                        <button type="submit" class="btn btn-outline-danger" name="delete" onclick="delete_item(id)"><i class="bi bi-trash3-fill"></i></button>
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

        // image preview control
        $('#projectImages').on('change', function() {
            const files = this.files;
            // Clear previous carousel items
            $('#preview_project_images').empty();

            $.each(files, function(index, file) {
                const reader = new FileReader();
                var $item = '';
                reader.onload = function(e) {
                    if (index === 0) {
                        $item = `
                        <div class="carousel-item active" style="position: relative;">
                            <img src="${e.target.result}" class="d-block" style="width: auto; height: 350px;" alt="...">
                            <button type="button" class="btn btn-outline-danger btn-sm" style="position: absolute; bottom: 10px; left: 50%; transform: translateX(-50%); z-index: 10;" onclick="remove(this)"><i class="bi bi-trash"></i></button>
                        </div>`;
                    } else {
                        $item = `
                        <div class="carousel-item" style="position: relative;">
                            <img src="${e.target.result}" class="d-block" style="width: auto; height: 350px;" alt="...">
                            <button type="button" class="btn btn-outline-danger btn-sm" style="position: absolute; bottom: 10px; left: 50%; transform: translateX(-50%); z-index: 10;" onclick="remove(this)"><i class="bi bi-trash"></i></button>
                        </div>`;
                    }
                    $('#preview_project_images').append($item);

                    // Show carousel only after the first image loads
                    if (index === 0) {
                        $('#preview_image').show();
                        $('#preview_image').carousel(0);
                    }
                };
                reader.readAsDataURL(file);
            });
        }); // image preview before upload 

        $('#close').on('click', function(params) {
            location.reload();
        });

    });

    function remove(btn) {
        const $item = $(btn).closest('.carousel-item');
        $item.remove();

        const $items = $('#preview_project_images .carousel-item');
        if ($items.length > 0 && $items.filter('.active').length === 0) {
            $items.first().addClass('active');
        }

        if ($items.length === 0) {
            $('#preview_image').hide();
        }
    }

    function formatDate(date) {
        const parts = date.split(' ')
        return parts[0]; // yyyy-mm-dd
    }

    function getData() {
        // destroy DataTable
        if ($.fn.DataTable.isDataTable('#portfolio_table')) {
            $('#portfolio_table').DataTable().destroy();
        }

        $.ajax({
            type: "POST",
            url: "Apis/load.php",
            data: {
                reqType: "portfolio"
            },
            success: function(response) {
                $("#portfolio_table tbody").html('');
                const res = JSON.parse(response);
                var htmlData = '';
                if (res.statusCode === 200) {
                    $(res.data).each(function(index, val) {
                        htmlData += `
                        <tr>
                            <td>${index+1}</td>
                            <td>${val.project_name}</td>
                            <td class="text-center"><button type="button" class="btn btn-primary" title="Show the images" data-bs-toggle="modal" data-bs-target="#image_modal" name="showImages" onclick="showImages(${val.id})"><i class="bi bi-eye-fill"></i></button></td>
                            <td>${val.project_category}</td>
                            <td>${val.client}</td>
                            <td>${val.project_description}</td>
                            <td>${formatDate(val.project_date)}</td>
                            <td>
                                <button type="submit" class="btn btn-outline-success" name="edit"  data-bs-toggle="modal" data-bs-target="#project_modal" onclick="edit(${val.id})"><i class="bi bi-pencil-square"></i></button>
                                <button type="submit" class="btn btn-outline-danger" name="delete" onclick="delete_item(${val.id})"><i class="bi bi-trash3-fill"></i></button>
                            </td>
                        </tr>
                        `;
                    });
                    $("#portfolio_table tbody").html(htmlData);
                } else {
                    $('#error_div').show();
                }
                // enable DataTable 
                $('#portfolio_table').DataTable();


            },
            error: function(response) {
                $('#error_div').show();
            }
        });

    }

    function insert() {
        var formData = new FormData($('#project_form')[0]);
        formData.append("reqType", "portfolio");
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
                    $('#project_form')[0].reset();
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
                reqType: 'portfolio'
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
        $('#form_title').text('Edit Project');
        $('#submit').hide();
        $('#update').show();

        $.ajax({
            type: "POST",
            url: "./Apis/edit.php",
            data: {
                id,
                reqType: "portfolio"
            },
            success: function(response) {
                const res = JSON.parse(response);
                if (res.statusCode === 200) {
                    const date = res.data.project_date.split(' ')[0];
                    $('[name="project_date"]').val(date);
                    $('[name="project_id"]').val(res.data.id);
                    $('[name="project_title"]').val(res.data.project_name);
                    // $('[name="path"]').val(res.data.project_images);
                    $('[name="project_category"]').val(res.data.project_category);
                    $('[name="project_client"]').val(res.data.client);
                    $('[name="description"]').val(res.data.project_description);
                }
            },
            error: function(response) {
                alert(response)
            }
        });

    }

    function update() {
        var formData = new FormData($('#project_form')[0]);
        formData.append("reqType", "portfolio");
        $.ajax({
            url: 'Apis/update.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                getData();
                $('#project_form')[0].reset();
                $('#success_div').fadeIn();
                $('#submit').show();
                $('#update').hide();
                $('#form_title').text('Add Project');

            },
            error: function(xhr, status, error) {
                $('#error_div').show();
            }
        });
    }

    function showImages(id) {
        $.ajax({
            type: "POST",
            url: "./Apis/select.php",
            data: {
                id,
                reqType: "portfolio_images"
            },
            success: function(response) {
                const res = JSON.parse(response);
                if (res.statusCode === 200) {
                    $("#project_images").empty();
                    $(res.data).each(function(index, val) {
                        const isActive = index === 0 ? 'active' : '';
                        const slide = `
                            <div class="carousel-item ${isActive}">
                                <img src="<?= PROJECT_URL ?>${val.img_name}" class="d-block w-100" alt="Image ${index + 1}">
                            </div>
                        `;
                        $("#project_images").append(slide);

                    });
                }
            },
            error: function(response) {
                alert(response)
            }
        });

    }

    function editImage(id) {


    }
</script>