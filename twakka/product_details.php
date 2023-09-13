
<?php include 'inc/head.php'; ?>

<?php

    if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
      echo "<script>window.location = '404.php'; </script>";
    }else{
      $id = preg_replace('/[^-a-zA-Z0-9_]/','', $_GET['proid']);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $quantity = $_POST['quantity'];
    $addCart = $ct->addToCart($quantity, $id);
  }

?>
<!--/single_page-->
       <!-- /banner_bottom_agile_info -->
       <div class="sale-w3ls" style="min-height:250px;">
         <div class="container">

            <ul class="w3_short">
              <br/>
              <h3 class="wthree_text_info" style="color:darkorange;">PRODUCTS<span></span></h3>
             <li><a href="index.php">Home</a><i>|</i></li>
             <li>Product Details</li>
           </ul>
         </div>
       </div>


  <!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
	<div class="container">


	     <div class="col-md-4 single-right-left ">
				 <?php
				$getPd = $pd->getSingleProduct($id);
				if ($getPd){
					while ($result = $getPd->fetch_assoc()) {

				?>
			<div class="grid images_3_of_2">
				<div class="flexslider">

					<ul class="slides">
						<li data-thumb="../admin/<?php echo $result['image'];?>">
							<div class="thumb-image"> <img src="../admin/<?php echo $result['image'];?>" data-imagezoom="true" class="img-responsive"> </div>
						</li>
						<li data-thumb="../admin/<?php echo $result['image'];?>">
							<div class="thumb-image"> <img src="../admin/<?php echo $result['image'];?>" data-imagezoom="true" class="img-responsive"> </div>
						</li>
						<li data-thumb="../admin/<?php echo $result['image'];?>">
							<div class="thumb-image"> <img src="../admin/<?php echo $result['image'];?>" data-imagezoom="true" class="img-responsive"> </div>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>

			</div>
		</div>
		<div class="col-md-8 single-right-left simpleCart_shelfItem">
					<h3><?php echo $result['productName'];?></h3>
					<p><span class="item_price">Price :Rs. <?php echo $result['price'];?> </span> <del></del></p>
					<div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked="">
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
					</div>

          <h3 style="text-align:left; color:#ff4d4d">
            <br/>
            <?php
              if (isset($addCart)) {
                    echo $addCart;
              }

            ?>

          </h3>
          <form action="#" method="post">
					<div class="color-quality">
            <div class="col-md-6">
						<div class="color-quality-right">
              <h5>Quality : <input type="number" name="quantity" style="width:130px; height:30px" value="1" class="form-control input-small"></h5>
						</div>
          </div>
					</div>
          <div class="clearfix"></div><br/>
          <div class="occasion-cart">
            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
            <fieldset>
              <input type="submit" name="submit" value="Order Now" class="button"/>
            </fieldset>
          </div>

          </div>
          </form>

          </div>

	 			<div class="clearfix"> </div>

				<!-- /new_arrivals -->
	<div class="responsive_tabs_agileits">
				<div id="horizontalTab">
						<ul class="resp-tabs-list">
							<li style="background:darkorange;color:#fff;">Description</li>
							<li>Reviews</li>

						</ul>
					<div class="resp-tabs-container">
					<!--/tab_one-->
					   <div class="tab1">

							<div class="single_page_agile_its_w3ls">
							  <h6><?php echo $result['productName'];?></h6>
							   <p><?php echo $result['body'];?></p>
							   <p class="w3ls_para"></p>
							</div>
						</div>
							<?php } } ?>
						<!--//tab_one-->
						<div class="tab2">

							<div class="single_page_agile_its_w3ls">
								<div class="bootstrap-tab-text-grids">

									 <div class="add-review">
										<h4>add a review</h4>
                    <form action="#" method="post">
                   <div class="styled-input agile-styled-input-top">
                     <textarea name="Message" required=""></textarea>
                     <label>Let us know what you have to say:</label>
                     <span></span>
                   </div>
                   <div class="styled-input">
                     <input type="text" name="name" required="">
                     <label>Name</label>
                     <span></span>
                   </div>
                   <div class="styled-input" style="float:left;">
                     <input type="email" name="email" required="">
                     <label>Email</label>
                     <span></span>
                   </div>
                   <input type="submit" name="" value="Save">
                 </form>
									</div>
								 </div>

							 </div>
						 </div>

					</div>

				</div>
			</div>
	
		         </div>
	        </div>
 </div>
<!--//single_page-->

<?php include 'inc/footer.php'; ?>
