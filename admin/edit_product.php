<?php

include_once("../db.php");
$sqlAllCategories = "SELECT * FROM category ORDER BY cat_id ASC";
$queryAllCategories = mysqli_query($conn, $sqlAllCategories);
if(isset($_GET['prd_id'])) {
    $prd_id = $_GET['prd_id'];

    $sqlProductEdit = "SELECT * FROM product WHERE prd_id = $prd_id";
    $queryProductEdit = mysqli_query($conn, $sqlProductEdit);
    if(mysqli_num_rows($queryProductEdit) > 0) {
        $product = mysqli_fetch_assoc($queryProductEdit);
    } else {
        header("Location: product.php");
    }
} else {
    header("Location: product.php");
}

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
                                    <li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
                                    <li><a href="#"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
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
			<li><a href="admin.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li><a href="user.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>User Management</a></li>
			<li><a href="category.php"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>Category Management</a></li>
			<li class="active"><a href="product.php"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Product Management</a></li>
			<li><a href="#"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"/></svg> Commends Management</a></li>
            <li><a href="#"><svg class="glyph stroked chain"><use xlink:href="#stroked-chain"/></svg> Ads Management</a></li>
            <li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg> Settings</a></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Product Management</a></li>
				<li class="active"><?php echo $product['prd_name'] ?></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Product: <?php echo $product['prd_name'] ?></h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <form role="form" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" name="prd_name" required class="form-control" value="<?php echo $product['prd_name'] ?>"  placeholder="">
                                </div>
                                                                
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" name="prd_price" required value="<?php echo $product['price'] ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Warranty</label>
                                    <input type="text" name="prd_warranty" required value="<?php echo $product['prd_warranty'] ?>" class="form-control">
                                </div>    
                                <div class="form-group">
                                    <label>Accessories</label>
                                    <input type="text" name="prd_accessories" required value="<?php echo $product['accessories'] ?>" class="form-control">
                                </div>                  
                                <div class="form-group">
                                    <label>Promotion</label>
                                    <input type="text" name="prd_promotion" required value="<?php echo $product['prd_promotion'] ?>" class="form-control">
                                </div>  
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="text" name="prd_new" required value="<?php echo $product['prd_new'] ?>" type="text" class="form-control">
                                </div>  
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Product Image</label>
                                    <input type="file" name="prd_image" onchange="preview()">
                                    <br>
                                    <div>
                                        <img src="img/download.jpeg" id="prdImage" width="295px" height="390px">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="cat_id" class="form-control">
                                    <?php
                                if (mysqli_num_rows($queryAllCategories)) {
                                    while ($cate = mysqli_fetch_assoc($queryAllCategories)) {
                                ?>

                                    <option <?php if($product['cat_id'] == $cate['cat_id']) ?> value=<?php echo $cate['cat_id']; ?>>
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
                                        <textarea name="prd_details" required class="form-control" rows="3"></textarea>
                                    </div>
                                <button type="submit" name="sbm" class="btn btn-primary">Update</button>
                                <button type="reset" class="btn btn-default">Refresh</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
	</div>	<!--/.main-->	

    <script>
        function preview() {
            prdImage.src = URL.createObjectURL(event.target.files[0]);
        }
        </script>

</body>

</html>
