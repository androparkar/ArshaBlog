<?php
include_once('./admin-includes/header.php');
include_once('./admin-includes/sidebar.php');
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Manage F.A.Q.</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Admin</a></li>
                <li class="breadcrumb-item active">FAQ</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" id="form_title">Add Q & A</h5>

                    <!-- General Form Elements -->
                    <form id="faq_form">
                        <div class="row">
                            <input type="hidden" name="id">
                            <div class="col-sm-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="faq-question">Question</span>
                                    <input type="text" class="form-control" name="question" placeholder="Question" aria-label="Question" aria-describedby="faq-question" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="faq-answer">Answer</span>
                                    <input type="text" class="form-control" name="answer" placeholder="Answer" aria-label="Answer" aria-describedby="faq-answer" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="button" class="btn btn-primary" id="submit" onclick="insert()">Submit</button>
                                    <button type="button" class="btn btn-primary" style="display: none;" id="update">Update</button>
                                </div>
                            </div>
                        </div>
                    </form><!-- End General Form Elements -->
                </div>
            </div>
        </div>

    </div>

    <section class="section">
        <div class="row">
            <!-- Success/Error alerts -->
            <div class="col-lg-12">
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
                        <h5 class="card-title">FAQ List</h5>

                        <table class="table table-striped table-hover table-bordered" id="faq_table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>#</td>
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
        // $('#update').on('click', update);
    });

    function getData() {
        //destroy datatable
        if ($.fn.DataTable.isDataTable('#faq_table')) {
            $('#faq_table').DataTable().destroy();
        }

        $.ajax({
            type: "POST",
            url: "Apis/load.php",
            data: {
                reqType: "faq"
            },
            success: function(response) {
                $("#faq_table tbody").html('');
                const res = JSON.parse(response);
                var htmlData = '';
                if (res.statusCode === 200) {
                    $(res.data).each(function(index, val) {
                        htmlData += `
                        <tr>
                            <td>${index+1}</td>
                            <td>${val.question}</td>
                            <td>${val.answer}</td>
                            <td>
                                <button type="submit" class="btn btn-outline-success" name="edit" onclick="edit(${val.id})"><i class="bi bi-pencil-square"></i></button>
                                <button type="submit" class="btn btn-outline-danger" name="delete" onclick="delete_item(${val.id})"><i class="bi bi-trash3-fill"></i></button>
                                </form>
                            </td>
                        </tr>
                        `;
                    });
                    $("#faq_table tbody").html(htmlData);
                } else {
                    $('#error_div').show();
                }
                //enable DataTable 
                $('#faq_table').DataTable();


            },
            error: function(response) {
                $('#error_div').show();
            }
        });

    }

    function insert() {
        var formData = new FormData($('#faq_form')[0]);
        formData.append("reqType", "faq");
        $.ajax({
            url: 'Apis/insert.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                getData();
                $('#faq_form')[0].reset();
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
                reqType: 'faq'
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
                reqType: "faq"
            },
            success: function(response) {
                const res = JSON.parse(response);
                if (res.statusCode === 200) {
                    $('[name="id"]').val(res.data.id);
                    $('[name="question"]').val(res.data.question);
                    $('[name="answer"]').val(res.data.answer);
                }
            },
            error: function(response) {
                alert(response)
            }
        });

    }

    function update() {
        var formData = new FormData($('#faq_form')[0]);
        formData.append("reqType", "faq");
        $.ajax({
            url: 'Apis/update.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                getData();
                $('#faq_form')[0].reset();
                $('#success_div').fadeIn();
                $('#submit').show();
                $('#update').hide();
            },
            error: function(xhr, status, error) {
                $('#error_div').show();
            }
        });
    }
</script>