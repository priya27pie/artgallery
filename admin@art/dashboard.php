<?php
include('header.php');
$show=new Oops($db);

?>
<style type="text/css">

		
	#fli,#fli1
	{
	
	}
	#display
	{
		position:absolute;
		width:315px;
		margin-left:0;
		margin-top:0px;
		max-height:300px;
		padding:2px;
		display:none;
		border-top:0px;
		overflow:auto;
		border:1px #CCC solid;
		background-color: white;
		z-index:1000;
	}	
	
	.show,.show1
	{
		padding:7px; 
		border-bottom:1px #999 dashed;
		font-size:15px; 
		
	}
	
	.show:hover,.show1:hover
	{
		background:#4f52ba;
		color:#FFF;
		cursor:pointer;
	}	
.widget{
	overflow:visible !important;
	
}	
</style>

		<div id="page-wrapper">
			<div class="main-page">

			<div class="row">
               <div class="col-md-2">
            	<a href="all_client.php">
					<div class="alert alert-success" role="alert">
						<div class="alert_logo"><h1 class="glyphicon glyphicon-user"></h1></div> 
						<div class="alert_content"><strong>All Client</strong></div>
					</div>
				</a>
            </div>
             <div class="col-md-2">
            	<a href="all_bill.php">
					<div class="alert alert-warning" role="alert">
						<div class="alert_logo"><h1 class="glyphicon glyphicon-stats"></h1></div> 
						<div class="alert_content"><strong>All Invoices</strong></div>
					</div>
				</a>
            </div>	
            
           
           <div class="col-md-2">
            	<a href="all_product.php">
					<div class="alert alert-info" role="alert">
						<div class="alert_logo"><h1 class="glyphicon glyphicon-stats"></h1></div> 
						<div class="alert_content"><strong>All Products </strong></div>
					</div>
				</a>
            </div>
            
         
                       
			</div>
			<hr>
		
			</div>
				
			
		</div>	

		<!--footer-->
<?php

include('footer.php');
?>