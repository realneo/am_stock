<?php
	session_start();
?>
<html>
	<head>
		<title>A.M Stock </title>
		<link type="text/css" rel="stylesheet" href="css/styles.css" />
		<script type='text/javascript' src='js/jquery-1.9.0.min.js'></script>
		<script type='text/javascript' src='js/jquery-ui-1.9.2.custom.min.js'></script>
		<script type='text/javascript' src='js/jquery.bp.macaroon.min.js'></script>
		<script type='text/javascript' src='js/main.js'></script>
	</head>
	<body>
		<div id="container">
			<div id="top_logo"><img src="images/amstockgreylogo.png" alt="" /></div><!-- top_logo -->
			<div id="header_msg">Choose a Company</div><!-- header_msg -->
			<div id="companies">
				<a href="#" class="tile" id='liwale_btn'><img src="images/icons/liwale_icon_color.png" alt="Liwale" /> Liwale </a>
				<a href="#" class="tile" id='high_point_btn'><img src="images/icons/highpoint_icon_color.png" alt="High Point" /> High Point </a>
				<a href="#" class="tile" id='age_perfect_btn'><img src="images/icons/ageperfect_icon_color.png" alt="Age Perfect" /> Age Perfect </a>
				<a href="#" class="tile" id='cross_rider_btn'><img src="images/icons/crossrider_icon_color.png" alt="Cross Rider" /> Cross Rider </a>
				<a href="#" class="tile" id='challenge_btn'><img src="images/icons/challenge_icon_color.png" alt="Challenge" /> Challenge </a>
				<a href="#" class="tile" id='challenger_btn'><img src="images/icons/challenger_icon_color.png" alt="Challenger" /> Challenger </a>
				<a href="#" class="tile" id='energ_master_btn'><img src="images/icons/energymaster_icon_color.png" alt="Energy Master" /> Energy Master </a>
				<a href="#" class="tile" id='stores_btn'><img src="images/icons/stores_icon_color.png" alt="Stores" /> Stores </a>
			</div><!-- companies -->
			<div id='side_bar'>
				<a href="#" id='back_btn'>Back</a>
                                <div id="main_links">
                                    <a href="#" class="main_links" id="view_all_categories_btn">Categories</a>
                                    <a href="#" class="main_links" id="view_all_products_btn">Products</a>
                                    <a href="#" class="main_links" id="view_reports_btn">Reports</a>
                                    <a href="#" class="main_links" id="view_log_btn">Log</a>
                                    <br />
                                    <br />
                                    <br />
                                    <a href="#" class="main_links" id="logout_btn">Logout</a>
                                </div><!-- main_links -->
				<div id="footer">
					<p align="center"> &copy; All Rights Reserved. <br />2012 AbdulMalik Stock. </p>
					<p align="center"> Developed by <a href="http://www.yoteyote.com" alt=""> Yoteyote</a> </p>
				</div><!-- footer -->
			</div><!-- side_bar -->
			<div id="login_box">
				<h3> Company Name </h3>
				<p class='info'>Enter your username and password to enter the Admin area.</p>
				<form name='login_form' id='login_form' method='post' action='includes/login_process.php'>
					<input type='text' name='username' size='43' value='Username'  id='username_input'/>
					<br />
					<input type='password' name='password' size='43' value='Password' id='password_input'/>
					<br />
					<button type='subimt' id='login_btn'>Secured Login </button>
				</form>
				<p class='feedback'></p>
				<div class="login_preloader"><img src="images/preloader.gif" alt="Loading" height="20px" /></div>
			</div><!-- login_form -->
			
		<div id='tile_xp_col'>
			<div id='categories'>
				<div class='tile_xp'>
					<div class='tile_logo'><img src='images/icons/categories.png' alt='Categories' /></div><!-- tile_logo-->
					<div class='tile_heading'>Categories </div><!-- tile_heading -->
					<div class='tile_content'>
						<div id="category_box">
							<form name='category_form' id='category_form' method='post' action='includes/add_category_process.php'>
								<input type='text' name='Name' size='30' value='Enter Category Name'  id='category_name'/>
								<br />
								<button type='subimt' id='category_btn'>Add New Category</button>
							</form>
							<br />
							<p class='category_feedback'></p>
							<div class="category_preloader"><img src="images/preloader.gif" alt="Loading" height="20px" /></div>
						</div><!-- category_box -->
					</div><!-- tile_content -->
				</div><!-- tile_xp -->
			</div><!-- categories -->
			
			<div id='products'>
				<div class='tile_xp'>
					<div class='tile_logo'><img src='images/icons/products.png' alt='Products' /></div><!-- tile_logo-->
					<div class='tile_heading'> Products </div><!-- tile_heading -->
					<div class='tile_content'>
						<div id="product_box">
							<form name='product_form' id='product_form' method='post' action='includes/add_product_process.php'>
								<select name='category' class='category_list' id='product_category'>
									<option value='pcs'>Select Category</option>
								</select>
								<br />
								<input type='text' name='name' size='30' value='Enter Product Name'  id='product_name'/>
								<br />
								<input type='text' name='quantity' size='30' value='Enter Quantity'  id='product_quantity'/>
								<br />
								<select name='unit' id="product_unit">
									<option value='pcs'>pcs</option>
									<option value='meters'>meters</option>
								</select>
								<br />
								<button type='subimt' id='product_btn'>Add New Product</button>
							</form>
							<p class='product_feedback'></p>
							<div class="product_preloader"><img src="images/preloader.gif" alt="Loading" height="20px" /></div>
						</div><!-- product_box -->
					</div><!-- tile_content -->
				</div><!-- tile_xp -->
			</div><!-- products -->
			<div id='stock'>
				<div class='tile_xp'>
					<div class='tile_logo'><img src='images/icons/stock.png' alt='Stock' /></div><!-- tile_logo-->
					<div class='tile_heading'> Stock </div><!-- tile_heading -->
					<div class='tile_content'>
						<div id="stock_box">
							<form name='stock_form' id='stock_form' method='post' action='includes/add_stock_process.php'>
								<select name='products' class='product_list'>
									<option> Select a Product </option>
								</select>
								<br />
								<input type='text' name='quantity' size='30' value='Enter Quantity'  id='quantity_input'/>
								<br />
								<button type='subimt' id='stock_btn'>Add Stock</button>
							</form>
							<p class='stock_feedback'></p>
							<div class="stock_preloader"><img src="images/preloader.gif" alt="Loading" height="20px" /></div>
						</div><!-- stock_box -->
					</div><!-- tile_content -->
				</div><!-- tile_xp -->
			</div><!-- stock -->		

			<div id='sold'>
				<div class='tile_xp'>
					<div class='tile_logo'><img src='images/icons/sold.png' alt='Stock' /></div><!-- tile_logo-->
					<div class='tile_heading'> Sold </div><!-- tile_heading -->
					<div class='tile_content'>
						<div id="sold_box">
							<form name='sold_form' id='sold_form' method='post' action='includes/sold_process.php'>
								<select name='products' class='product_list'>
									<option> Select a Product </option>
								</select>
								<br />
								<input type='text' name='quantity' size='30' value='Enter Quantity'  id='quantity_input'/>
								<br />
								<button type='subimt' id='sold_btn'>Sold</button>
							</form>
							<p class='sold_feedback'></p>
							<div class="sold_preloader"><img src="images/preloader.gif" alt="Loading" height="20px" /></div>
						</div><!-- sold_box --> 
					</div><!-- tile_content -->
				</div><!-- tile_xp -->
			</div><!-- sold -->
                        <div id="inside_window">
                            <div id="iw_top_bar">
                                <div id="iw_title">Categories</div><!-- iw_title -->
                            </div><!-- iw_top_bar -->
                            <div id="iw_tile2"></div>
                            <div id="iw_content">
                                <div id="view_all_categories"></div><!-- view_all_categories -->
                                <div id="view_all_products"></div><!-- view_all_products -->
                            </div><!-- iw_content -->
                </div><!-- inside_window -->
		</div><!-- tile_xp_col -->
		</div><!-- container -->
	</body>
</html>