<ul class="nav" id="side-menu">
						<li <?php if (stripos($_SERVER['REQUEST_URI'],'dashboard.php')!== false) {echo 'class="active"';}
else
	echo 'class= ""';
 ?> >
							<a href="dashboard.php"><i class="fa fa-home nav_icon"></i>Dashboard</a>
						</li>
					     
		
					<li <?php if (stripos($_SERVER['REQUEST_URI'],'entry_category.php')!== false  || stripos($_SERVER['REQUEST_URI'],'edit_product_final.php')!== false  || stripos($_SERVER['REQUEST_URI'],'all_category.php')!== false  || stripos($_SERVER['REQUEST_URI'],'entry_product.php')!== false || stripos($_SERVER['REQUEST_URI'],'all_product.php')!== false ) {echo 'class="active"';}
else
	echo 'class= ""';
 ?> >
							<a href="#"><i class="fa fa-file-text-o nav_icon"></i>Client Management<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level collapse">
							
							
								<li><a href="all_client.php">All Client</a>

						
								
								</ul>
						</li>	
					<li <?php if (stripos($_SERVER['REQUEST_URI'],'entry_category.php')!== false  || stripos($_SERVER['REQUEST_URI'],'edit_product_final.php')!== false  || stripos($_SERVER['REQUEST_URI'],'all_category.php')!== false  || stripos($_SERVER['REQUEST_URI'],'entry_product.php')!== false || stripos($_SERVER['REQUEST_URI'],'all_product.php')!== false ) {echo 'class="active"';}
else
	echo 'class= ""';
 ?> >
							<a href="#"><i class="fa fa-file-text-o nav_icon"></i>Product Management<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level collapse">
							
								<li><a href="entry_category.php">Entry Category</a>
								<li><a href="all_category.php">All Category</a>

								<li><a href="entry_product.php">Entry Product</a>
								</li>
									<li>
									<a href="all_product.php">All Products </a>
								</li>
								
								</ul>
						</li>	

		<li <?php if (stripos($_SERVER['REQUEST_URI'],'today_bill.php')!== false || stripos($_SERVER['REQUEST_URI'],'today_paid_bill.php')!== false || stripos($_SERVER['REQUEST_URI'],'all_bill.php')!== false){echo 'class="active"';}
else
	echo 'class= ""';
 ?> >
							<a href="#"><i class="fa fa-file-text-o nav_icon"></i>Invoice Report<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level collapse">
								
								
								<li>
									<a href="today_bill.php">Today Placed Bill Report</a>
								</li>
<li>
									<a href="today_paid_bill.php"> Paid Bill Report</a>
								</li>
																
								<li>
									<a href="all_bill.php">All Invoice Report</a>
								</li>
									
								</ul>
						</li>						
					
</ul>	