<?php
include_once('./admin-includes/header.php');
include_once('./admin-includes/sidebar.php');
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Pages</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Pages</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="error_div" style="display: none;">
                                <strong>Sorry!</strong> Something went Wrong
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <div class="alert alert-success alert-dismissible fade show" role="alert" id="success_div" style="display: none;">
                                <strong>Hurray!</strong> Data Saved
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>

                            <!-- Pages Form -->
                            <form class="row g-3" id="pages_form">
                                <div class="col-12">
                                    <label class="form-label">Teams</label>
                                    <textarea class="form-control" name="teams" placeholder="Enter the text" required id="teams"></textarea>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Services</label>
                                    <textarea class="form-control" name="services" placeholder="Enter the text" required id="services"></textarea>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Portfolio</label>
                                    <textarea class="form-control" name="portfolio" placeholder="Enter the text" required id="portfolio"></textarea>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Pricing</label>
                                    <textarea class="form-control" name="pricing" placeholder="Enter the text" required id="pricing"></textarea>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">FAQ</label>
                                    <textarea class="form-control" name="faq" placeholder="Enter the text" required id="faq"></textarea>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Contact</label>
                                    <textarea class="form-control" name="contact" placeholder="Enter the text" required id="contact"></textarea>
                                </div>
                                <div class="text-start">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form><!--End of Pages Form -->

                        </div>
                    </div>

                </div>
            </div>
        </section>


    </section>

</main><!-- End #main -->
<?php
include_once('./admin-includes/footer.php');
?>

<script>
    $(document).ready(function() {
        getData();

        $('#pages_form').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append("reqType", "pages");
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
                reqType: 'pages'
            },
            success: function(response) {
                const res = JSON.parse(response);
                if (res.statusCode === 200) {
                    $('#teams').val(res.data.teams);
                    $('#services').val(res.data.services);
                    $('#portfolio').val(res.data.portfolio);
                    $('#pricing').val(res.data.pricing);
                    $('#faq').val(res.data.faq);
                    $('#contact').val(res.data.contact);
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