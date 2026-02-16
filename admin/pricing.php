<?php
include_once('./admin-includes/header.php');
include_once('./admin-includes/sidebar.php');
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Manage Pricing</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Admin</a></li>
                <li class="breadcrumb-item">Tools</li>
                <li class="breadcrumb-item active">Pricing</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="modal fade" id="pricing_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="form_title">Add Plan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- General Form Elements -->
                    <form method="POST" id="pricing_form">

                        <input type="hidden" name="plan_id">
                        <!-- <input type="hidden" name="path"> -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="plan-name">Plan Name</span>
                                    <input type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="plan-name" name="plan_name" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="plan-cost">Plan cost</span>
                                    <input type="text" class="form-control" placeholder="cost" aria-label="Cost" aria-describedby="plan-cost" name="cost" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="feature-1">F1</span>
                                    <input type="text" class="form-control" placeholder="Feature" aria-label="Feature1" aria-describedby="feature-1" name="feature1" required>
                                    <button class="btn btn-success" style="display: none;" type="button" id="button-f1" onclick="featureStatus('f1')">active</button>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="feature-2">F2</span>
                                    <input type="text" class="form-control" placeholder="Feature" aria-label="Feature2" aria-describedby="feature-2" name="feature2" required>
                                    <button class="btn btn-success" style="display: none;" type="button" id="button-f2" onclick="featureStatus('f2')">active</button>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="feature-3">F3</span>
                                    <input type="text" class="form-control" placeholder="Feature" aria-label="Feature3" aria-describedby="feature-3" name="feature3" required>
                                    <button class="btn btn-success" style="display: none;" type="button" id="button-f3" onclick="featureStatus('f3')">active</button>

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="feature-4">F4</span>
                                    <input type="text" class="form-control" placeholder="Feature" aria-label="Feature4" aria-describedby="feature-4" name="feature4" required>
                                    <button class="btn btn-success" style="display: none;" type="button" id="button-f4" onclick="featureStatus('f4')">active</button>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="feature-5">F5</span>
                                    <input type="text" class="form-control" placeholder="Feature" aria-label="Feature5" aria-describedby="feature-5" name="feature5" required>
                                    <button class="btn btn-success" style="display: none;" type="button" id="button-f5" onclick="featureStatus('f5')">active</button>
                                </div>
                            </div>

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
    </div>
    </div><!-- End Vertically centered Modal-->

    <section class="section ">
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
                                <h5 class="card-title">Pricinhg list</h5>
                            </div>
                            <div class="col-sm-2 mt-3">
                                <button type="button" class="btn btn-success" style="float: right;" data-bs-toggle="modal" data-bs-target="#pricing_modal"><i class="bi bi-plus-circle"></i> add</button>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered" id="pricing_table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>cost</th>
                                        <th>Feature 1</th>
                                        <th>Feature 2</th>
                                        <th>Feature 3</th>
                                        <th>Feature 4</th>
                                        <th>Feature 5</th>
                                        <th>status</th>
                                        <th>Action</th>
                                        <!-- <th>Status</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- do not touch -->
                                </tbody>
                            </table>
                        </div>
                        <!-- End Table Responsive with stripped rows -->

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
        $('#close').on('click', function(params) {
            location.reload();
        });
    });

    function getData() {
        //destroy datatable
        if ($.fn.DataTable.isDataTable('#pricing_table')) {
            $('#pricing_table').DataTable().destroy();
        }

        $.ajax({
            type: "POST",
            url: "Apis/load.php",
            data: {
                reqType: "pricing"
            },
            success: function(response) {
                $("#pricing_table tbody").html('');
                const res = JSON.parse(response);
                var htmlData = '';
                if (res.statusCode === 200) {
                    $(res.data).each(function(index, val) {
                        htmlData += `
                        <tr>
                            <td>${index+1}</td>
                            <td>${val.plan_name}</td>
                            <td>${val.cost}</td>
                            <td>${val.feature_1}</td>
                            <td>${val.feature_2}</td>
                            <td>${val.feature_3}</td>
                            <td>${val.feature_4}</td>
                            <td>${val.feature_5}</td>
                            <td>`;
                        if (val.status == 0) {
                            htmlData += `<button type="button" class="btn btn-danger" onclick="activate_Deactivate(${val.id},${val.status})">Inactive</button>`;
                        } else {
                            htmlData += `<button type="button" class="btn btn-success" onclick="activate_Deactivate(${val.id}, ${val.status})">Active</button>`;
                        }
                        htmlData +=
                            `</td>
                            <td>
                                <button type="submit" class="btn btn-outline-success" name="edit"  data-bs-toggle="modal" data-bs-target="#pricing_modal" onclick="edit(${val.id})"><i class="bi bi-pencil-square"></i></button>
                                <button type="submit" class="btn btn-outline-danger" name="delete" onclick="delete_item(${val.id})"><i class="bi bi-trash3-fill"></i></button>
                            </td> 
                        </tr>
                        `;
                    });
                    $("#pricing_table tbody").html(htmlData);
                } else {
                    $('#error_div').show();
                }
                //enable DataTable 
                $('#pricing_table').DataTable();


            },
            error: function(response) {
                $('#error_div').show();
            }
        });

    }

    function insert() {
        var formData = new FormData($('#pricing_form')[0]);
        formData.append("reqType", "pricing");
        $.ajax({
            url: 'Apis/insert.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                getData();
                $('#pricing_form')[0].reset();
                $('#success_div').fadeIn().delay(2000).fadeOut();
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
                reqType: 'pricing'
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
        $('#form_title').text('Edit Plan');
        $('#submit').hide();
        $('#update').show();
        $('#button-f1').show();
        $('#button-f2').show();
        $('#button-f3').show();
        $('#button-f4').show();
        $('#button-f5').show();

        $.ajax({
            type: "POST",
            url: "Apis/edit.php",
            data: {
                id,
                reqType: "pricing"
            },
            success: function(response) {
                const res = JSON.parse(response);
                if (res.statusCode === 200) {
                    $('[name="plan_id"]').val(res.data.id);
                    $('[name="plan_name"]').val(res.data.plan_name);
                    $('[name="cost"]').val(res.data.cost);
                    $('[name="feature1"]').val(res.data.feature_1);
                    $('[name="feature2"]').val(res.data.feature_2);
                    $('[name="feature3"]').val(res.data.feature_3);
                    $('[name="feature4"]').val(res.data.feature_4);
                    $('[name="feature5"]').val(res.data.feature_5);
                    for (let i = 1; i <= 5; i++) {
                        const status = res.data[`feature_${i}_sts`];
                        const button = $(`#button-f${i}`);

                        if (status == 0) {
                            button.removeClass().addClass('btn btn-danger').text('inactive');
                        } else {
                            button.removeClass().addClass('btn btn-success').text('active');
                        }
                    }



                }
            },
            error: function(response) {
                alert(response)
            }
        });

    }

    function update() {
        var formData = new FormData($('#pricing_form')[0]);
        formData.append("reqType", "pricing");
        $.ajax({
            url: 'Apis/update.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                getData();
                $('#pricing_form')[0].reset();
                $('#success_div').fadeIn().delay(2000).fadeOut();
                $('#submit').show();
                $('#update').hide();
                $('#form_title').text('Add Plan');
                $('#button-f1').hide();
                $('#button-f2').hide();
                $('#button-f3').hide();
                $('#button-f4').hide();
                $('#button-f5').hide();
            },
            error: function(xhr, status, error) {
                $('#error_div').show();
            }
        });
    }

    function featureStatus(id) {

        const curStatus = $('#button-' + id).text();
        const plan_id = $('[name="plan_id"]').val();
        $.ajax({
            type: "POST",
            url: "./Apis/featureSts.php",
            data: {
                id,
                plan_id,
                curStatus
            },
            success: function(response) {
                $('#success_div').fadeIn();
                $('#button-' + id).removeClass();
                if (curStatus === 'active') {
                    $('#button-' + id).addClass('btn btn-danger').text('inactive');
                } else {
                    $('#button-' + id).addClass('btn btn-success').text('active');
                }
            },
            error: function(response) {
                alert(response)
            }
        });

    }

    function activate_Deactivate(id, status) {
        if (status == 0) {
            status = 1;
        } else {
            status = 0;
        }
        $.ajax({
            type: "POST",
            url: "./Apis/is_active.php",
            data: {
                id,
                status
            },
            success: function(response) {
                getData();
            },
            error: function(response) {
                alert(response)
            }
        });
    }
</script>