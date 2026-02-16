<?php
include_once('./admin-includes/header.php');
include_once('./admin-includes/sidebar.php');
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Blog Category</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Admin</a></li>
                <li class="breadcrumb-item active">Blog Category</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add a Category</h5>

                        <!-- General Form Elements -->
                        <form id="category_form">
                            <div class="row">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="error_div" style="display: none;">
                                    <strong>Sorry!</strong> Something went Wrong
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <div class="alert alert-success alert-dismissible fade show" role="alert" id="success_div" style="display: none;">
                                    <strong>Hurray!</strong> Data Saved
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <input type="hidden" name="blog_cat_id">
                                <div class="col-sm-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="blog-title">Blog Category</span>
                                        <input type="text" class="form-control" placeholder="Title" aria-label="Title" aria-describedby="blog-title" name="blog_cat_name" id="blog_cat_name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary" Name='submit' id="submit">Submit</button>
                                    </div>
                                    <div class="col-sm-10">
                                        <button type="button" class="btn btn-primary" style="display: none;" Name='update' id="update">Update</button>
                                    </div>
                                </div>

                        </form><!-- End General Form Elements -->
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Categories</h5>

                        <table class="table table-striped table-hover table-bordered" id="category_table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Name</th>
                                    <!-- <th>Status</th> -->
                                    <th data-type="date" data-format="YYYY/MM/DD">Create Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
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

        $('#category_form').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append("reqType", "blog_category");
            insert(formData);
        });

        $('#update').on('click', function(e) {
            // e.preventDefault();
            var formData = new FormData($('#category_form')[0]);
            formData.append("reqType", "blog_category");
            update(formData);
        });
    });

    function formatDate(date) {
        const parts = date.split(' ')
        return parts[0]; // yyyy-mm-dd
    }

    function getData() {
        //destroy datatable
        if ($.fn.DataTable.isDataTable('#category_table')) {
            $('#category_table').DataTable().destroy();
        }

        $.ajax({
            type: "POST",
            url: "Apis/load.php",
            data: {
                reqType: "blog_category"
            },
            success: function(response) {
                $("#category_table tbody").html('');
                const res = JSON.parse(response);
                var htmlData = '';
                if (res.statusCode === 200) {
                    $(res.data).each(function(index, val) {
                        htmlData += `
                        <tr>
                            <td>${index+1}</td>
                            <td>${val.blog_cat_name}</td>
                            <td>${formatDate(val.create_date)}</td>
                            <td>
                                <button type="submit" class="btn btn-outline-success" name="edit" onclick="edit(${val.blog_cat_id})"><i class="bi bi-pencil-square"></i></button>
                                <button type="submit" class="btn btn-outline-danger" name="delete" onclick="delete_item(${val.blog_cat_id})"><i class="bi bi-trash3-fill"></i></button>
                                </form>
                            </td>
                        </tr>
                        `;
                    });
                    $("#category_table tbody").html(htmlData);
                } else {
                    $('#error_div').show();
                }
                //enable DataTable 
                $('#category_table').DataTable();


            },
            error: function(response) {
                $('#error_div').show();
            }
        });

    }

    function insert(formData) {
        $.ajax({
            url: 'Apis/insert.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                getData();
                $('[name="blog_cat_name"]').val('');
                $('#success_div').show();
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
                reqType: 'blog_category'
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
        $('#submit').hide();
        $('#update').show();
        $.ajax({
            type: "POST",
            url: "./Apis/edit.php",
            data: {
                id,
                reqType: "blog_category"
            },
            success: function(response) {
                const res = JSON.parse(response);
                if (res.statusCode === 200) {
                    $('[name="blog_cat_id"]').val(res.data.blog_cat_id);
                    $('[name="blog_cat_name"]').val(res.data.blog_cat_name);
                }
            },
            error: function(response) {
                alert(response)
            }
        });

    }

    function update(formData) {
        $.ajax({
            url: 'Apis/update.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                getData();
                $('[name="blog_cat_name"]').val('');
                $('#success_div').show();
            },
            error: function(xhr, status, error) {
                $('#error_div').show();
            }
        });
    }
</script>