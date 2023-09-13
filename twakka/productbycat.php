<?php include 'inc/head.php'; ?>
<?php

		if (!isset($_GET['catId']) || $_GET['catId'] == NULL) {
			echo "<script>window.location = '404.php'; </script>";
		}else {
			$id = preg_replace('/[^-a-zA-Z0-9_]/','', $_GET['catId']);
		}

?>

<div class="sale-w3ls" style="min-height:250px;">
	<div class="container">

		 <ul class="w3_short">
			 <br/>
			 <h3 class="wthree_text_info" style="color:darkorange;">Products<span></span></h3>
			<li><a href="index.php">Home</a><i>|</i></li>
			<li>Category</li>
		</ul>
	</div>
</div>

<!-- banner-bootom-w3-agileits -->
 <div class="banner-bootom-w3-agileits">
 <div class="container">
        <!-- mens -->
   <div class="col-md-4 products-left">
    <!-- <div class="filter-price">
       <h3>Filter By <span>Price</span></h3>
         <ul class="dropdown-menu6">
           <li>
             <div id="slider-range"></div>
             <input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
           </li>
         </ul>
     </div>-->
     <div class="css-treeview">
       <h4>Categories</h4>
       <ul class="tree-list-pad">
				 <li><a href="menu.php">
         <label for="item-0">
           <i class="fa fa-long-arrow-right" aria-hidden="true"></i> All
         </label></a>
         </li>
         <?php
             $getCat = $cat->getAllCat();
             if ($getCat) {
               while ($result = $getCat->fetch_assoc()) {

         ?>
       <li><a href="productbycat.php?catId=<?php echo $result['catId'];?>">
       <label for="item-0">
         <i class="fa fa-long-arrow-right" aria-hidden="true"></i> <?php echo $result['catName']; ?>
       </label></a>
       </li>
       <?php }} ?>
       </ul>
     </div>
     <div class="community-poll">
  <!--     <h4></h4>
       <div class="swit form">
         <form>
         <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio" checked=""><i></i></label> </div></div>
         <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i></label> </div></div>
         <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i></label> </div></div>
         <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i></label> </div></div>
         <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i></label> </div></div>
         <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i></label> </div></div>
         <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i></label> </div></div>
         <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i></label> </div></div>
         <input type="submit" value="SEND">
         </form>
       </div>-->
     </div>
     <div class="clearfix"></div>
   </div>
   <div class="col-md-8 products-right">
     <h5>Products</h5>
     <div class="sort-grid">
       <div class="sorting">
         <h6>Sort By</h6>
         <select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
           <option value="null">Default</option>
           <option value="null">Name(A - Z)</option>
           <option value="null">Name(Z - A)</option>
           <option value="null">Price(High - Low)</option>
           <option value="null">Price(Low - High)</option>
           <option value="null">Model(A - Z)</option>
           <option value="null">Model(Z - A)</option>
         </select>
         <div class="clearfix"></div>
       </div>
       <div class="sorting">
         <h6>Showing</h6>
         <select id="country2" onchange="change_country(this.value)" class="frm-field required sect">
           <option value="null">7</option>
           <option value="null">10</option>
           <option value="null">12</option>
           <option value="null">15</option>
         </select>
         <div class="clearfix"></div>
       </div>
       <div class="clearfix"></div>
     </div>

     <div class="men-wear-bottom">

       <?php
 					$productbycat = $pd->productByCat($id);
 					if ($productbycat) {
 						while ($result = $productbycat->fetch_assoc()) {

 			 ?>

 			 <div class="col-md-4 product-men">
 	 			<div class="men-pro-item simpleCart_shelfItem">
 	 				<div class="men-thumb-item">
 	 					<img src="../admin/<?php echo $result['image'];?>" alt="" class="pro-image-front">
 	 					<img src="../admin/<?php echo $result['image'];?>" alt="" class="pro-image-back">
 	 						<div class="men-cart-pro">
 	 							<div class="inner-men-cart-pro">
 	 								<a href="product_details.php?proid=<?php echo $result['productId']; ?>" class="link-product-add-cart">detail</a>
 	 							</div>
 	 						</div>
 	 						<span class="product-new-top" style="background:darkorange;"></span>

 	 				</div>
 	 				<div class="item-info-product ">
 	 					<h4><?php echo $result['productName'];?></h4>
 	 					<div class="info-product-price">
 	 						<span class="item_price">Rs.<?php echo $result['price'];?></span>
 	 						<del></del>
 	 					</div>
 	 					<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
 	 										<form action="#" method="post">
 	 											<fieldset>
													<a href="product_details.php?proid=<?php echo $result['productId']; ?>">
														<input type="button" name="submit" value="Order Now" class="button" style="background:darkorange;"/>
														</a>
 	 											</fieldset>
 	 										</form>
 	 						</div>
 						</div>

 								</div>

 							</div>
            <?php }}else{
              echo "<p> Products of this category are not avaiable</p>";
            } ?>


       <div class="clearfix"></div>
   </div>
   <div class="clearfix"></div>

</div>
</div>
</div>
<!-- //mens -->

<?php include 'inc/footer.php'; ?>
