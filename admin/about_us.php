<?php
include_once('./admin-includes/header.php');
include_once('./admin-includes/sidebar.php');
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Manage About Us</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Admin</a></li>
                <li class="breadcrumb-item active">About Us</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="error_div" style="display: none;">
                <strong>Sorry!</strong> Something went Wrong
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="success_div" style="display: none;">
                <strong>Yay!</strong> Data Saved
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="col-lg">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">CK editor 5</h5>
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
                        <!-- CK Editor -->
                        <form id="about_us_form">
                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <textarea id="editor" name="text">
                                        <div id="data">
                                            <p>Hello World!</p>
                                        </div>
                                </textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-12 text-end">
                                    <button type="submit" class="btn btn-primary" Name='submit' id="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                        <!-- End CK Editor 5 -->

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include_once('./admin-includes/footer.php'); ?>


<script>
    $(document).ready(function() {
        $('#about_us_form').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append("reqType", "about_us");
            $.ajax({
                url: 'Apis/form_Api.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    getData();
                    $('#success_div').show();
                },
                error: function(xhr, status, error) {
                    $('#error_div').show();
                }
            });
        });
    });

    function getData() {

        $.ajax({
            type: "POST",
            url: "Apis/load.php",
            data: {
                reqType: 'about_us'
            },
            success: function(response) {
                const res = JSON.parse(response);
                if (res.statusCode === 200 && myEditor) {
                    myEditor.setData(res.data.text);
                } else {
                    $('#error_div').show();
                }
            },
            error: function(response) {
                $('#error_div').show();
            }
        });

    }
</script>

<script>
    const {
        ClassicEditor,
        Essentials,
        Bold,
        Italic,
        Font,
        Paragraph
    } = CKEDITOR;

    let myEditor;
    ClassicEditor
        .create(document.querySelector('#editor'), {
            licenseKey: 'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3ODE0ODE1OTksImp0aSI6IjNhYTA3MzdjLWMxY2ItNGU4MS05YTM3LWVkM2YwYmZiMGRmZSIsInVzYWdlRW5kcG9pbnQiOiJodHRwczovL3Byb3h5LWV2ZW50LmNrZWRpdG9yLmNvbSIsImRpc3RyaWJ1dGlvbkNoYW5uZWwiOlsiY2xvdWQiLCJkcnVwYWwiXSwiZmVhdHVyZXMiOlsiRFJVUCIsIkUyUCIsIkUyVyIsIkJPWCJdLCJ2YyI6IjA1MWY2MmNlIn0.nmrOpXPfO-NRo4iKBfT_e77sBvDF0OGKZA7h8qd1g23X6PmsI-pnqhpREjFWe6jpUH01CkXy-xtXNop04hP5fg',
            plugins: [Essentials, Bold, Italic, Font, Paragraph],
            toolbar: [
                'undo', 'redo', '|', 'bold', 'italic', '|',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
            ]
        })
        .then(editor => {
            myEditor = editor;
            getData();
        })
        .catch(error => {
            console.error(error);
        });
</script>
