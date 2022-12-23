<?php

include_once("../db.php");
$sqlAllCategories = "SELECT * FROM category ORDER BY cat_id ASC";
$queryAllCategories = mysqli_query($conn, $sqlAllCategories);

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
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><span>Mobile</span>Shop</a>
                <ul class="user-menu">
                    <li class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user">
                                <use xlink:href="#stroked-male-user"></use>
                            </svg> Admin <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#"><svg class="glyph stroked male-user">
                                        <use xlink:href="#stroked-male-user"></use>
                                    </svg> Profile</a></li>
                            <li><a href="#"><svg class="glyph stroked cancel">
                                        <use xlink:href="#stroked-cancel"></use>
                                    </svg> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div><!-- /.container-fluid -->
    </nav>

    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <form role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
        </form>
        <ul class="nav menu">
            <li><a href="admin.php"><svg class="glyph stroked dashboard-dial">
                        <use xlink:href="#stroked-dashboard-dial"></use>
                    </svg> Dashboard</a></li>
            <li><a href="user.php"><svg class="glyph stroked male user ">
                        <use xlink:href="#stroked-male-user" />
                    </svg>User Management</a></li>
            <li><a href="category.php"><svg class="glyph stroked open folder">
                        <use xlink:href="#stroked-open-folder" />
                    </svg>Category Management</a></li>
            <li class="active"><a href="product.php"><svg class="glyph stroked bag">
                        <use xlink:href="#stroked-bag"></use>
                    </svg>Product Management</a></li>
            <li><a href="#"><svg class="glyph stroked two messages">
                        <use xlink:href="#stroked-two-messages" />
                    </svg> Commends Management</a></li>
            <li><a href="#"><svg class="glyph stroked chain">
                        <use xlink:href="#stroked-chain" />
                    </svg> Ads Management</a></li>
            <li><a href="#"><svg class="glyph stroked gear">
                        <use xlink:href="#stroked-gear" />
                    </svg> Settings</a></li>
        </ul>

    </div>
    <!--/.sidebar-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg></a></li>
                <li><a href="">Product Management</a></li>
                <li class="active">Add Product</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add Product</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-6">
                            <form action="add_product_process.php" role="form" method="post"
                                enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input required name="prd_name" class="form-control" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label>Product Price</label>
                                    <input required name="prd_price" type="number" min="0" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Warranty</label>
                                    <input required name="prd_warranty" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Accessories</label>
                                    <input required name="prd_accessories" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Promotion</label>
                                    <input required name="prd_promotion" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <input required name="prd_new" type="text" class="form-control">
                                </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Product Image</label>

                                <input required name="prd_image" type="file" onchange="preview()">
                                <br>
                                <div>
                                    <img src="img/download.jpeg" id="prdImage" width="295px" height="390px">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Categories</label>
                                <select name="cat_id" class="form-control">

                                    <?php
                                if (mysqli_num_rows($queryAllCategories)) {
                                    while ($cate = mysqli_fetch_assoc($queryAllCategories)) {
                                ?>

                                    <option value=<?php echo $cate['cat_id']; ?>>
                                        <?php echo $cate['cat_name'] ?>
                                    </option>
                                    <?php
                                    }
                                }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select name="prd_status" class="form-control">
                                    <option value=1 <?php if($product['prd_status'] == 1) ?>>Stocking</option>
                                    <option value=0 <?php if($product['prd_status'] == 0) ?>>Out of Stock</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Featured</label>
                                <div class="checkbox">
                                    <label>
                                        <input name="prd_featured" type="checkbox" value=1>Featured
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Product Details</label>
                                <textarea required name="prd_details" class="form-control" rows="3"></textarea>
                            </div>
                            <input name="sbm" type="submit" class="btn btn-success">Add Product</input>
                            <button type="reset" class="btn btn-default">Refresh</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->

    </div>
    <!--/.main-->

    <script>
        function preview() {
            prdImage.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>

</body>

</html>