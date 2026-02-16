<?php
include("./admin-includes/header.php");
include("./admin-includes/sidebar.php");
// include("../includes/connection.php");

?>
<style>
    table,
    th,
    td {
        text-align: center;
        vertical-align: middle;
    }
</style>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Pricing</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item">Tools</li>
                <li class="breadcrumb-item active">Pricing</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">


            <div class="col-lg-12">



                <div class="card">
                    <div class="card-body">


                        <h5 class="card-title">Pricing</h5>
                        <a href="price_insert.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Add</a>
                        <div></div>
                        <br>
                        <!-- Small tables -->
                        <table class="table table-bordered border-dark" id="price_table">

                            <thead class="table-primary text-center">
                                <tr>
                                    <th>ID</th>
                                    <th>Plan Name</th>
                                    <th>Plan Price</th>
                                    <th>Features</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td>1</td>
                                    <td>Basic Plan</td>
                                    <td>₹199</td>
                                    <td>1 Website, 1 GB Storage, Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Basic Plan</td>
                                    <td>₹199</td>
                                    <td>1 Website, 1 GB Storage, Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Standard Plan</td>
                                    <td>₹499</td>
                                    <td>5 Websites, 10 GB Storage, Phone & Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Premium Plan</td>
                                    <td>₹999</td>
                                    <td>Unlimited Websites, 100 GB Storage, 24/7 Support</td>
                                    <td><span class="badge bg-secondary">Inactive</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Basic Plan</td>
                                    <td>₹199</td>
                                    <td>1 Website, 1 GB Storage, Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Basic Plan</td>
                                    <td>₹199</td>
                                    <td>1 Website, 1 GB Storage, Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Standard Plan</td>
                                    <td>₹499</td>
                                    <td>5 Websites, 10 GB Storage, Phone & Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Premium Plan</td>
                                    <td>₹999</td>
                                    <td>Unlimited Websites, 100 GB Storage, 24/7 Support</td>
                                    <td><span class="badge bg-secondary">Inactive</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Basic Plan</td>
                                    <td>₹199</td>
                                    <td>1 Website, 1 GB Storage, Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Basic Plan</td>
                                    <td>₹199</td>
                                    <td>1 Website, 1 GB Storage, Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Standard Plan</td>
                                    <td>₹499</td>
                                    <td>5 Websites, 10 GB Storage, Phone & Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Premium Plan</td>
                                    <td>₹999</td>
                                    <td>Unlimited Websites, 100 GB Storage, 24/7 Support</td>
                                    <td><span class="badge bg-secondary">Inactive</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Basic Plan</td>
                                    <td>₹199</td>
                                    <td>1 Website, 1 GB Storage, Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Basic Plan</td>
                                    <td>₹199</td>
                                    <td>1 Website, 1 GB Storage, Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Standard Plan</td>
                                    <td>₹499</td>
                                    <td>5 Websites, 10 GB Storage, Phone & Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Premium Plan</td>
                                    <td>₹999</td>
                                    <td>Unlimited Websites, 100 GB Storage, 24/7 Support</td>
                                    <td><span class="badge bg-secondary">Inactive</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Basic Plan</td>
                                    <td>₹199</td>
                                    <td>1 Website, 1 GB Storage, Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Basic Plan</td>
                                    <td>₹199</td>
                                    <td>1 Website, 1 GB Storage, Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Standard Plan</td>
                                    <td>₹499</td>
                                    <td>5 Websites, 10 GB Storage, Phone & Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Premium Plan</td>
                                    <td>₹999</td>
                                    <td>Unlimited Websites, 100 GB Storage, 24/7 Support</td>
                                    <td><span class="badge bg-secondary">Inactive</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Basic Plan</td>
                                    <td>₹199</td>
                                    <td>1 Website, 1 GB Storage, Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Basic Plan</td>
                                    <td>₹199</td>
                                    <td>1 Website, 1 GB Storage, Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Standard Plan</td>
                                    <td>₹499</td>
                                    <td>5 Websites, 10 GB Storage, Phone & Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Premium Plan</td>
                                    <td>₹999</td>
                                    <td>Unlimited Websites, 100 GB Storage, 24/7 Support</td>
                                    <td><span class="badge bg-secondary">Inactive</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Basic Plan</td>
                                    <td>₹199</td>
                                    <td>1 Website, 1 GB Storage, Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Basic Plan</td>
                                    <td>₹199</td>
                                    <td>1 Website, 1 GB Storage, Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Standard Plan</td>
                                    <td>₹499</td>
                                    <td>5 Websites, 10 GB Storage, Phone & Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Premium Plan</td>
                                    <td>₹999</td>
                                    <td>Unlimited Websites, 100 GB Storage, 24/7 Support</td>
                                    <td><span class="badge bg-secondary">Inactive</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Basic Plan</td>
                                    <td>₹199</td>
                                    <td>1 Website, 1 GB Storage, Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Basic Plan</td>
                                    <td>₹199</td>
                                    <td>1 Website, 1 GB Storage, Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Standard Plan</td>
                                    <td>₹499</td>
                                    <td>5 Websites, 10 GB Storage, Phone & Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Premium Plan</td>
                                    <td>₹999</td>
                                    <td>Unlimited Websites, 100 GB Storage, 24/7 Support</td>
                                    <td><span class="badge bg-secondary">Inactive</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Basic Plan</td>
                                    <td>₹199</td>
                                    <td>1 Website, 1 GB Storage, Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Basic Plan</td>
                                    <td>₹199</td>
                                    <td>1 Website, 1 GB Storage, Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Standard Plan</td>
                                    <td>₹499</td>
                                    <td>5 Websites, 10 GB Storage, Phone & Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Premium Plan</td>
                                    <td>₹999</td>
                                    <td>Unlimited Websites, 100 GB Storage, 24/7 Support</td>
                                    <td><span class="badge bg-secondary">Inactive</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Basic Plan</td>
                                    <td>₹199</td>
                                    <td>1 Website, 1 GB Storage, Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Basic Plan</td>
                                    <td>₹199</td>
                                    <td>1 Website, 1 GB Storage, Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Standard Plan</td>
                                    <td>₹499</td>
                                    <td>5 Websites, 10 GB Storage, Phone & Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Premium Plan</td>
                                    <td>₹999</td>
                                    <td>Unlimited Websites, 100 GB Storage, 24/7 Support</td>
                                    <td><span class="badge bg-secondary">Inactive</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Basic Plan</td>
                                    <td>₹199</td>
                                    <td>1 Website, 1 GB Storage, Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Basic Plan</td>
                                    <td>₹199</td>
                                    <td>1 Website, 1 GB Storage, Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Standard Plan</td>
                                    <td>₹499</td>
                                    <td>5 Websites, 10 GB Storage, Phone & Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Premium Plan</td>
                                    <td>₹999</td>
                                    <td>Unlimited Websites, 100 GB Storage, 24/7 Support</td>
                                    <td><span class="badge bg-secondary">Inactive</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Basic Plan</td>
                                    <td>₹199</td>
                                    <td>1 Website, 1 GB Storage, Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Basic Plan</td>
                                    <td>₹199</td>
                                    <td>1 Website, 1 GB Storage, Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Standard Plan</td>
                                    <td>₹499</td>
                                    <td>5 Websites, 10 GB Storage, Phone & Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Premium Plan</td>
                                    <td>₹999</td>
                                    <td>Unlimited Websites, 100 GB Storage, 24/7 Support</td>
                                    <td><span class="badge bg-secondary">Inactive</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Basic Plan</td>
                                    <td>₹199</td>
                                    <td>1 Website, 1 GB Storage, Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Basic Plan</td>
                                    <td>₹199</td>
                                    <td>1 Website, 1 GB Storage, Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Standard Plan</td>
                                    <td>₹499</td>
                                    <td>5 Websites, 10 GB Storage, Phone & Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Premium Plan</td>
                                    <td>₹999</td>
                                    <td>Unlimited Websites, 100 GB Storage, 24/7 Support</td>
                                    <td><span class="badge bg-secondary">Inactive</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Basic Plan</td>
                                    <td>₹199</td>
                                    <td>1 Website, 1 GB Storage, Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Basic Plan</td>
                                    <td>₹199</td>
                                    <td>1 Website, 1 GB Storage, Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Standard Plan</td>
                                    <td>₹499</td>
                                    <td>5 Websites, 10 GB Storage, Phone & Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Premium Plan</td>
                                    <td>₹999</td>
                                    <td>Unlimited Websites, 100 GB Storage, 24/7 Support</td>
                                    <td><span class="badge bg-secondary">Inactive</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Basic Plan</td>
                                    <td>₹199</td>
                                    <td>1 Website, 1 GB Storage, Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Basic Plan</td>
                                    <td>₹199</td>
                                    <td>1 Website, 1 GB Storage, Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Standard Plan</td>
                                    <td>₹499</td>
                                    <td>5 Websites, 10 GB Storage, Phone & Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Premium Plan</td>
                                    <td>₹999</td>
                                    <td>Unlimited Websites, 100 GB Storage, 24/7 Support</td>
                                    <td><span class="badge bg-secondary">Inactive</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Basic Plan</td>
                                    <td>₹199</td>
                                    <td>1 Website, 1 GB Storage, Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Basic Plan</td>
                                    <td>₹199</td>
                                    <td>1 Website, 1 GB Storage, Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Standard Plan</td>
                                    <td>₹499</td>
                                    <td>5 Websites, 10 GB Storage, Phone & Email Support</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Premium Plan</td>
                                    <td>₹999</td>
                                    <td>Unlimited Websites, 100 GB Storage, 24/7 Support</td>
                                    <td><span class="badge bg-secondary">Inactive</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                        <!-- End small tables -->

                    </div>
                </div>

            </div>
        </div>

    </section>

</main>




</html>
<?php
include("./admin-includes/footer.php");

?>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script>
    $(document).ready(function() {
        // $('#price_table').DataTable();
        $('#price_table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>