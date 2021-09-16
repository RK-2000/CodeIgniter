<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Product Add</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
    <script src="https://cdn.ckeditor.com/4.16.2/basic/ckeditor.js"></script>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <img src="<?php echo base_url(); ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg"
                            class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $this->session->userdata('name');?></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Widgets
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Add Product
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="gallery.php" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Product Gallery
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="compose.php" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    MailBox
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Project Add</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Product Add</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div>
                    <?php 
                        if (!empty($this->session->flashdata('error')))
                        {   
                            echo("<div class='alert alert-danger'>".$this->session->flashdata('error')."</div>");
                        }    
                    ?>
                    <?php 
                        if (!empty($this->session->flashdata('success')))
                        {   
                            echo("<div class='alert alert-success'>".$this->session->flashdata('success')."</div>");
                        }    
                    ?>
                </div>
                <form method="POST" enctype="multipart/form-data" action="<?php echo base_url() ?>addProduct">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">General</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">Project Name</label>
                                        <input <?php if(isset($product_name)){?> value="<?php echo $product_name;  ?>"
                                            <?php } ?> type="text" id="inputName" class="form-control"
                                            name="product_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Project Description</label>
                                        <textarea id="editor" name="product_desc" required><?php if(isset($product_desc)){ echo $product_desc; } ?>
                                        </textarea>
                                        <script>
                                        CKEDITOR.replace('product_desc'); // ID of element
                                        </script>

                                    </div>
                                    <div class="form-group">
                                        <label for="inputProjectLeader">Cost</label>
                                        <input type="number" id="inputCost" class="form-control" name="product_cost"
                                            pattern="(^\d*\.?\d*[1-9]+\d*$)|(^[1-9]+\d*\.\d*$)"
                                            <?php if(isset($product_cost)){?> value="<?php echo $product_cost;  ?>"
                                            <?php } ?> min=1 oninvalid="setCustomValidation('Cost cannot be negetive')"
                                            required>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-md-6">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Images</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group" id="x">
                                        <input type="file" <?php if(isset($image)){?> value="<?php echo $image;  ?>"
                                            onload="preview_image()" <?php } ?> name="image[]" id="uploadFile"
                                            class="form-control" onchange="preview_image();" multiple required>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="#" class="btn btn-secondary">Cancel</a>
                            <input type="submit" name="submit" value="Add new Product"
                                class="btn btn-success float-right">
                        </div>
                    </div>
                    </for m>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.1.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <script>
    function PreviewImage(e) {
        if (e.files.length > 3) {
            alert("Only 3 files accepted.");
            e.preventDefault();
        }
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadFile").files[0]);
        var div = document.getElementById("x");
        div.innerHTML += "<img id='uploadPreview' style='width:auto;height: 100px;'/>";
        oFReader.onload = function(oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };

    function preview_image() {
        var total_file = document.getElementById("uploadFile").files.length;
        for (var i = 0; i < total_file; i++) {
            $('#x').append("<img  style='width:auto;height: 100px;' src='" + URL.createObjectURL(event.target.files[
                i]) + "'>");
        }
    };
    </script>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
</body>

</html>