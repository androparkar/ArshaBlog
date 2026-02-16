<?php
include_once('./admin-includes/header.php');
include_once('./admin-includes/sidebar.php');
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Manage Blog</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Admin</a></li>
                <li class="breadcrumb-item active">Blog</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="modal fade" id="blog_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="form_title">New Blog</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- General Form Elements -->
                    <form id="blog_form">
                        <input type="hidden" name="blog_id">
                        <input type="hidden" name="old_thumb_img">
                        <input type="hidden" name="old_cover_img">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="blog-title">Blog Title</span>
                                    <input type="text" class="form-control" name="blog_title" placeholder="Title" aria-label="Title" aria-describedby="blog-title">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="selectAuthor">Author</label>
                                    <select class="form-select" id="selectAuthor" name="blog_author">
                                        <option selected>Choose...</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="selectCateory">Category</label>
                                    <select class="form-select" id="selectCateory" name="blog_category">
                                        <option selected>Choose...</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="thumbnailImage">Thumbmnail</label>
                                    <input type="file" class="form-control" accept="image/*" id="thumbnailImage" name="thumb_image" required>
                                </div>
                            </div>
                            <div class="col-sm-6">

                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="coverImage">Cover</label>
                                    <input type="file" class="form-control" accept="image/*" id="coverImage" name="cover_image" required>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="editor" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" style="height: 200px" id="editor" name="blog_text"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <!-- Thumbnail image preview -->
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Thumbnail Image Preview</h5>
                                        <!-- image carousel -->
                                        <div id="preview_thumb_image" class="carousel slide" style="display: none;" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="" class="d-block" style="width: 200px; height: 150px;" alt="thumbnail image" id="thumbnail_image">
                                                </div>
                                            </div>
                                        </div><!-- End image carousel-->
                                    </div>
                                </div>
                            </div>

                            <!-- Cover image preview -->
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Cover Image Preview</h5>
                                        <!-- image carousel -->
                                        <div id="preview_cover_image" class="carousel slide" style="display: none;" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="" class="d-block" style="width: 200px; height: 150px;" alt="cover image" id="cover_image">
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
                    <button type="button" class="btn btn-primary" id="submit" data-bs-dismiss="modal" onclick="insert()">Submit</button>
                    <button type="button" class="btn btn-primary" id="update" style="display: none;" data-bs-dismiss="modal" onclick="update()">Update</button>
                </div>
            </div>
        </div>
    </div><!-- End Vertically centered Modal-->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <!-- Success/Error alerts -->
                <div>
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
            </div>
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-10">
                                <h5 class="card-title">Blogs</h5>
                            </div>
                            <div class="col-sm-2 mt-3">
                                <button type="button" class="btn btn-success" style="float: right;" data-bs-toggle="modal" data-bs-target="#blog_modal"><i class="bi bi-plus-circle"></i> add</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered" id="blog_table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Blog Title</th>
                                        <th>Category</th>
                                        <th>Author</th>
                                        <th>Thumbnail image</th>
                                        <th>Create Date</th>
                                        <th>Last Updated</th>
                                        <th>Text</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#</td>
                                        <td>sample</td>
                                        <td>sample</td>
                                        <td>sample</td>
                                        <td>image</td>
                                        <td>image</td>
                                        <td>sample</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-success" name="edit"><i class="bi bi-pencil-square"></i></button>
                                            <button type="button" class="btn btn-outline-danger" name="delete"><i class="bi bi-trash3-fill"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- End Table responsive -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php
include_once('./admin-includes/footer.php');
?>

<script>
    const {
        ClassicEditor,
        Essentials,
        Bold,
        Italic,
        Underline,
        Link,
        Font,
        Paragraph
    } = CKEDITOR;

    let myEditor;
    ClassicEditor
        .create(document.querySelector('#editor'), {
            licenseKey: `eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3ODE0ODE1OTksImp0aSI6IjNhYTA3MzdjLWMxY2ItNGU4MS05YTM3LWVkM2YwYmZiMGRmZSIsInVzYWdlRW5kcG9pbnQiOiJodHRwczovL3Byb3h5LWV2ZW50LmNrZWRpdG9yLmNvbSIsImRpc3RyaWJ1dGlvbkNoYW5uZWwiOlsiY2xvdWQiLCJkcnVwYWwiXSwiZmVhdHVyZXMiOlsiRFJVUCIsIkUyUCIsIkUyVyIsIkJPWCJdLCJ2YyI6IjA1MWY2MmNlIn0.nmrOpXPfO-NRo4iKBfT_e77sBvDF0OGKZA7h8qd1g23X6PmsI-pnqhpREjFWe6jpUH01CkXy-xtXNop04hP5fg`,
            plugins: [Essentials, Bold, Italic, Underline, Link, Font, Paragraph],
            toolbar: {
                items: [
                    'undo', 'redo', '|', 'bold', 'italic', 'underline', '|',
                    'link','fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                ]
            }
        })
        .then(editor => {
            myEditor = editor;
            editor.ui.view.editable.element.style.height = '30vh'; // 40% of viewport height
        })
        .catch(error => {
            console.error(error);
        });
</script>

<script>
    $(document).ready(function() {
        getData();
        select('blog_category');
        select('author');
        $('#thumbnailImage').on('change', function() {
            const file = this.files[0];
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#thumbnail_image').attr('src', e.target.result);
                    $('#preview_thumb_image').fadeIn();
                };
                reader.readAsDataURL(file);
            }
        }); // image preview before upload 

        $('#coverImage').on('change', function() {
            const file = this.files[0];
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#cover_image').attr('src', e.target.result);
                    $('#preview_cover_image').fadeIn();
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
        // destroy datatable
        if ($.fn.DataTable.isDataTable('#blog_table')) {
            $('#blog_table').DataTable().destroy();
        }

        $.ajax({
            type: "POST",
            url: "Apis/load.php",
            data: {
                reqType: "blog"
            },
            success: function(response) {
                $("#blog_table tbody").html('');
                const res = JSON.parse(response);
                var htmlData = '';
                if (res.statusCode === 200) {
                    $(res.data).each(function(index, val) {
                        htmlData += `
                         <tr>
                            <td>${index+1}</td>
                            <td>${val.blog_title}</td>
                            <td>${val.blog_cat_name}</td>
                            <td>${val.author_name}</td>
                            <td><img src="<?= BLOG_THUMB_URL ?>${val.thumbnail_img}" class="img-fluid d-block mx-auto" alt="Thumbnail image" style="max-width: 80px; max-height: 80px; object-fit: cover; border-radius: 4px;"></td>
                            <td>${formatDate(val.created_at)}</td>
                            <td>${formatDate(val.updated_at)}</td>
                            <td>${val.blog_text}</td>
                            <td>
                                <button type="button" class="btn btn-outline-success" name="edit" data-bs-toggle="modal" data-bs-target="#blog_modal" onclick="edit(${val.blog_id})"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-outline-danger" name="delete" onclick="delete_item(${val.blog_id})"><i class="bi bi-trash3-fill"></i></button>
                            </td>
                        </tr>
                        `;
                    });
                    $("#blog_table tbody").html(htmlData);
                } else {
                    $('#error_div').show();
                }
                //enable DataTable 
                $('#blog_table').DataTable();


            },
            error: function(response) {
                $('#error_div').show();
            }
        });

    }

    function insert() {
        $('#editor').val(myEditor.getData());
        var formData = new FormData($('#blog_form')[0]);
        formData.append("reqType", "blog");
        $.ajax({
            url: 'Apis/insert.php',
            type: 'POST',
            data: {
                formData,
                reqType: 'blog'
            },
            processData: false,
            contentType: false,
            success: function(response) {
                const res = JSON.parse(response);

                if (res.statusCode === 200) {
                    getData();
                    $('#success_div').fadeIn().delay(1500).fadeOut();
                    $('#blog_form')[0].reset();
                    $('#preview_thumb_image').hide();
                    $('#preview_cover_image').hide();
                    $('#thumbnail_image').attr('src', '');
                    $('#cover_image').attr('src', '');
                    myEditor.setData('');
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
                reqType: 'blog'
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
        $('#form_title').text('Edit Blog');
        $('#submit').hide();
        $('#update').show();
        $.ajax({
            type: "POST",
            url: "./Apis/edit.php",
            data: {
                id,
                reqType: "blog"
            },
            success: function(response) {
                const res = JSON.parse(response);
                if (res.statusCode === 200) {
                    $('[name="blog_id"]').val(res.data.blog_id);
                    $('[name="thumb_path"]').val(res.data.thumbnail_img);
                    $('[name="cover_path"]').val(res.data.cover_img);
                    $('[name="blog_title"]').val(res.data.blog_title);
                    $('[name="blog_text"]').val(res.data.description);
                    $('#selectAuthor').html(`<option value='${res.data.author_id}' selected>${res.data.author_name}</option>`);
                    $('#selectCateory').html(`<option value='${res.data.blog_cat_id}' selected>${res.data.blog_cat_name}</option>`);
                    $('#thumbnail_image').attr('src', "<?= BLOG_THUMB_URL ?>" + res.data.thumbnail_img);
                    $('#cover_image').attr('src', "<?= BLOG_URL ?>" + res.data.cover_img);
                    $('#preview_thumb_image').show();
                    $('#preview_cover_image').show();
                    select('blog_category');
                    select('author');
                    myEditor.setData(res.data.blog_text);

                }
            },
            error: function(response) {
                alert(response)
            }
        });

    }

    function update() {
        $('#editor').val(myEditor.getData());
        var formData = new FormData($('#blog_form')[0]);
        formData.append("reqType", "blog");
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
                    $('#blog_form')[0].reset();
                    $('#preview_thumb_image').hide();
                    $('#preview_cover_image').hide();
                    $('#thumbnail_image').attr('src', '');
                    $('#cover_image').attr('src', '');
                    myEditor.setData('');
                } else {
                    $('#error_div').fadeIn().delay(1500).fadeOut();
                }
            },
            error: function(xhr, status, error) {
                $('#error_div').show();
            }
        });
    }

    function select(reqType) {
        $.ajax({
            type: "POST",
            url: "./Apis/select.php",
            data: {
                reqType
            },
            success: function(response) {
                const res = JSON.parse(response);
                if (res.statusCode === 200) {
                    if (reqType === 'blog_category') {
                        $("#selectCateory").val('');
                        $("#selectCateory").append(res.data);
                    }

                    if (reqType === 'author') {
                        $("#selectAuthor").val('');
                        $("#selectAuthor").append(res.data);
                    }
                }
            },
            error: function(response) {
                $('#error_div').show();
            }
        });
    }
</script>