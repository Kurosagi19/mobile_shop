<?php
    include_once("../db.php");
        if(isset($_POST['sbn'])) {
            if(empty($_POST['cat_name'])) {
                $errors['cat_name'] = '<span style="color:red;">You need to enter Category Name !</span>';
            } else{
                $cat_name = $POST['cat_name'];
                $sqlCheck = "SELECT * FROM category WHERE cat_name = $cat_name";
                $queryCheck = mysqli_query($conn, $sqlCheck);
                if(mysqli_num_rows($queryCheck) > 0) { //trường hợp đã tồn tại bản ghi có tên danh mục mới nhập
                    $error['error'] = '<div class="alert alert-danger">Danh mục đã tồn tại ! </div>';
                } else { // truường hợp tên danh mục mới nhập chưa tồn tại
                    $sqlInsertCate = "INSERT INTO category(cate_name) VALUES ('$cat_name')";
                    mysqli_query($conn, $sqlInsertCate);
                    header("Location: category.php");
                }
            }
        }
    // $sqlCheck = "SELECT * FROM category WHERE cat_name = ....";
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Online Mobile Shop - Administrator</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/datepicker3.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">

        <!--Icons-->
        <script src="js/lumino.glyphs.js"></script>

        <!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
                    <a class="navbar-brand" href="#"><span>Mobile</span>Shop</a>
                    <ul class="user-menu">
                        <li class="dropdown pull-right">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Admin <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Hồ sơ</a></li>
                                <li><a href="#"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Đăng xuất</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div>
            <!-- /.container-fluid -->
        </nav>

        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
            <form role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </form>
            <ul class="nav menu">
			<li><a href="admin.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li><a href="user.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>User Management</a></li>
			<li class="active"><a href="category.php"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>Category Management</a></li>
			<li><a href="product.php"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Product Management</a></li>
			<li><a href="#"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"/></svg> Commends Management</a></li>
            <li><a href="#"><svg class="glyph stroked chain"><use xlink:href="#stroked-chain"/></svg> Ads Management</a></li>
            <li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg> Settings</a></li>
		</ul>

        </div>
        <!--/.sidebar-->

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                    <li><a href="">Category Management</a></li>
                    <li class="active">Add Category</li>
                </ol>
            </div>
            <!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Category</h1>
                </div>
            </div>
            <!--/.row-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-8">
                                <div class="alert alert-danger">Category existed !</div>
                                <form role="form" method="post">
                                    <div class="form-group">
                                        <label>Category name:</label>
                                        <input required type="text" name="cat_name" class="form-control" placeholder="Category name...">
                                    </div>
                                    <button type="submit" name="sbm" class="btn btn-success">Add New</button>
                                    <button type="reset" class="btn btn-default">Refresh</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.col-->
            </div>
            <!--/.main-->
    </body>

    </html>