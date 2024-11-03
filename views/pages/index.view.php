
	<!-- End Header Area -->
	<?php include("views/partials/header.php");
       
	   ?> 
		   <!-- start banner Area -->
		   <section class="banner-area">
			   <div class="container">
				   <div class="row fullscreen align-items-center justify-content-start">
					   <div class="col-lg-12">
						   <div class="active-banner-slider owl-carousel">
							   <!-- single-slide -->
							   <div class="row single-slide align-items-center d-flex">
								   <div class="col-lg-5 col-md-6">
									   <div class="banner-content">
									   <h1>Gear Up for Adventure!</h1>
	   <p>Prepare for Your Next Journey with Top Outdoor Gear and Essentials!</p>
	   <div class="add-bag d-flex align-items-center">
		   <a class="primary-btn" href="category.php"><span class="lnr-txt">Explore Now</span></a> 
		   <span class="add-text text-uppercase"></span>
	   </div>
									   </div>
								   </div>
								   <div class="col-lg-7">
									   <div class="banner-img">
										   <img class="img-fluid"  src="" alt="">
									   </div>
								   </div>
							   </div>
							   <!-- single-slide -->
							   <div class="row single-slide">
								   <div class="col-lg-5">
							   <div class="banner-content">
		   <h1>Explore the <br> Latest Adventure Gear!</h1>
		   <p>Equip Yourself for the Wild: Discover the Best in Outdoor Gear!</p>
		   <div class="add-bag d-flex align-items-center">
			   <a class="primary-btn" href="/shop-now">Shop Now</a>
		   </div>
	   </div>
								   </div>
								   <div class="col-lg-7">
									   <div class="banner-img">
										   <img class="img-fluid" src="" alt="">
									   </div>
								   </div>
							   </div>
						   </div>
					   </div>
				   </div>
			   </div>
		   </section>
		   <!-- End banner Area -->
	   
		   <!-- start features Area -->
		   <section class="features-area section_gap">
			   <div class="container">
				   <div class="row features-inner">
					   <!-- single features -->
					   <div class="col-lg-3 col-md-6 col-sm-6">
						   <div class="single-features">
							   <div class="f-icon">
								   <img src="/views/public/images/features/f-icon1.png" alt="">
							   </div>
							   <h6>Free Delivery</h6>
							   <p>Free Shipping on all order</p>
						   </div>
					   </div>
					   <!-- single features -->
					   <div class="col-lg-3 col-md-6 col-sm-6">
						   <div class="single-features">
							   <div class="f-icon">
								   <img src="/views/public/images/features/f-icon2.png" alt="">
							   </div>
							   <h6>Return Policy</h6>
							   <p>Free Shipping on all order</p>
						   </div>
					   </div>
					   <!-- single features -->
					   <div class="col-lg-3 col-md-6 col-sm-6">
						   <div class="single-features">
							   <div class="f-icon">
								   <img src="/views/public/images/features/f-icon3.png" alt="">
							   </div>
							   <h6>24/7 Support</h6>
							   <p>Free Shipping on all order</p>
						   </div>
					   </div>
					   <!-- single features -->
					   <div class="col-lg-3 col-md-6 col-sm-6">
						   <div class="single-features">
							   <div class="f-icon">
								   <img src="/views/public/images/features/f-icon4.png" alt="">
							   </div>
							   <h6>Secure Payment</h6>
							   <p>Free Shipping on all order</p>
						   </div>
					   </div>
				   </div>
			   </div>
		   </section>
		   <!-- end features Area -->
<!-- Start category Area -->
<section class="category-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <!-- Best Sellers -->
                    <div class="col-lg-8 col-md-8">
                        <div class="single-deal">
                            <div class="overlay"></div>
                            <img class="img-fluid w-100" src="views/public/images/products/<?= $bestSeller['front_view'] ?? 'p8.jpg'; ?>" alt="">
                            <a href="views/public/images/products/<?= $bestSeller['front_view'] ?? 'default.jpg'; ?>" class="img-pop-up" target="_blank">
                                <div class="deal-details">
                                    <h6 class="deal-title"><?= $bestSeller['name'] ?? 'Unnamed Best Seller'; ?></h6>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Package -->
                    <div class="col-lg-4 col-md-4">
                        <div class="single-deal">
                            <div class="overlay"></div>
                            <img class="img-fluid w-100" src="views/public/images/products/<?= $package['front_view'] ?? 'default.jpg'; ?>" alt="">
                            <a href="views/public/images/products/<?= $package['front_view'] ?? 'default.jpg'; ?>" class="img-pop-up" target="_blank">
                                <div class="deal-details">
                                    <h6 class="deal-title"><?= $package['name'] ?? 'Unnamed Package'; ?></h6>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Random Category -->
                    <div class="col-lg-4 col-md-4">
                        <div class="single-deal">
                            <div class="overlay"></div>
                            <img class="img-fluid w-100" src="views/public/images/products/<?= $category['front_view'] ?? 'default.jpg'; ?>" alt="">
                            <a href="views/public/images/products/<?= $category['front_view'] ?? 'default.jpg'; ?>" class="img-pop-up" target="_blank">
                                <div class="deal-details">
                                    <h6 class="deal-title"><?= $category['name'] ?? 'Unnamed Category'; ?></h6>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Discount Product -->
                    <div class="col-lg-8 col-md-8">
                        <div class="single-deal">
                            <div class="overlay"></div>
                            <img class="img-fluid w-100" src="views/public/images/products/<?= $discount['front_view'] ?? 'default.jpg'; ?>" alt="">
                            <a href="views/public/images/products/<?= $discount['front_view'] ?? 'default.jpg'; ?>" class="img-pop-up" target="_blank">
                                <div class="deal-details">
                                    <h6 class="deal-title"><?= $discount['name'] ?? 'Unnamed Discount Product'; ?></h6>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Latest Product -->
                    <div class="col-lg-4 col-md-6">
                        <div class="single-deal">
                            <div class="overlay"></div>
                            <img class="img-fluid w-100" src="views/public/images/products/<?= $latestProduct['front_view'] ?? 'default.jpg'; ?>" alt="">
                            <a href="views/public/images/products/<?= $latestProduct['front_view'] ?? 'default.jpg'; ?>" class="img-pop-up" target="_blank">
                                <div class="deal-details">
                                    <h6 class="deal-title"><?= $latestProduct['name'] ?? 'Unnamed Latest Product'; ?></h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End category Area -->



<!--Latest and Best seller Products-->
<section class="owl-carousel active-product-area section_gap">
    <!-- Latest Products Section -->
    <div class="single-product-slider">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Latest Products</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php if (!empty($latestProducts)): ?>
                    <?php foreach ($latestProducts as $product): ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="/views/public/images/product/<?= htmlspecialchars($product['front_view']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                                <div class="product-details">
                                    <h6><?= htmlspecialchars($product['name']) ?></h6>
                                    <div class="price">
                                        <h6>$<?= number_format($product['newprice'] ?? $product['price'], 2) ?></h6>
                                        <?php if (isset($product['newprice'])): ?>
                                            <h6 class="l-through">$<?= number_format($product['price'], 2) ?></h6>
                                        <?php endif; ?>
                                    </div>
                                    <div class="prd-bottom">
                                        <a href="your-link-here" class="social-info">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">add to bag</p>
                                        </a>
                                        <a href="your-link-here" class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">view more</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No latest products available.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Best Seller Products Section -->
    <div class="single-product-slider">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Best Seller Products</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php if (!empty($bestSellerProducts)): ?>
                    <?php foreach ($bestSellerProducts as $product): ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="/views/public/images/product/<?= htmlspecialchars($product['front_view']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                                <div class="product-details">
                                    <h6><?= htmlspecialchars($product['name']) ?></h6>
                                    <div class="price">
                                        <h6>$<?= number_format($product['newprice'], 2) ?></h6>
                                        <?php if (isset($product['newprice']) && $product['newprice'] < $product['price']): ?>
                                            <h6 class="l-through">$<?= number_format($product['price'], 2) ?></h6>
                                        <?php endif; ?>
                                    </div>
                                    <div class="prd-bottom">
                                        <a href="your-link-here" class="social-info">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">add to bag</p>
                                        </a>
                                        <a href="your-link-here" class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">view more</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No best sellers available.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!--End Latest and Best seller Products-->
	   
<!-- Start exclusive deal Area -->
<section class="exclusive-deal-area">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 no-padding exclusive-left">
                <?php if (!empty($expiryDates) && isset($expiryDates[0])): ?>  <!-- Check if there's an expiry date -->
                    <div class="row clock_sec clockdiv" id="clockdiv-global" 
                         data-expiry-date="<?= htmlspecialchars($expiryDates[0]['expiry_date']) ?>">
                        <div class="col-lg-12">
                            <h1>Exclusive Hot Deal Ends Soon!</h1>
                            <p>Get these deals before they're gone!</p>
                        </div>
                        <div class="col-lg-12">
                            <div class="row clock-wrap">
                                <div class="col clockinner1 clockinner">
                                    <h1 class="days"></h1>
                                    <span class="smalltext">Days</span>
                                </div>
                                <div class="col clockinner clockinner1">
                                    <h1 class="hours"></h1>
                                    <span class="smalltext">Hours</span>
                                </div>
                                <div class="col clockinner clockinner1">
                                    <h1 class="minutes"></h1>
                                    <span class="smalltext">Mins</span>
                                </div>
                                <div class="col clockinner clockinner1">
                                    <h1 class="seconds"></h1>
                                    <span class="smalltext">Secs</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="" class="primary-btn">Shop Now</a>
                <?php else: ?>
                    <div class="alert alert-warning">
                        <strong>No active discounts currently.</strong>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-6 no-padding exclusive-right">
                <div class="active-exclusive-product-slider">
                    <?php if (!empty($products)): ?>
                        <?php foreach ($products as $product): ?>
                            <div class="single-exclusive-slider">
                                <img class="img-fluid" src="/views/public/images/product/<?= htmlspecialchars($product['image']) ?>" 
                                     alt="<?= htmlspecialchars($product['description']) ?>">
                                <div class="product-details">
                                    <div class="price">
                                        <h6>$<?= number_format($product['new_price'], 2) ?></h6>
                                        <h6 class="l-through">$<?= number_format($product['price'], 2) ?></h6>
                                    </div>
                                    <h4><?= htmlspecialchars($product['description']) ?></h4>
                                    <div class="add-bag d-flex align-items-center justify-content-center">
                                        <a class="add-btn" href=""><span class="ti-bag"></span></a>
                                        <span class="add-text text-uppercase">Add to Bag</span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="alert alert-warning">
                            <strong>No products available.</strong>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End exclusive deal Area -->








	   
		   <!-- Start brand Area -->
		   <section class="brand-area section_gap">
			   <div class="container">
				   <div class="row">
					   <a class="col single-img" href="#">
						   <img class="img-fluid d-block mx-auto" src="/views/public/images/brand/1.png" alt="">
					   </a>
					   <a class="col single-img" href="#">
						   <img class="img-fluid d-block mx-auto" src="/views/public/images/brand/2.png" alt="">
					   </a>
					   <a class="col single-img" href="#">
						   <img class="img-fluid d-block mx-auto" src="/views/public/images/brand/3.png" alt="">
					   </a>
					   <a class="col single-img" href="#">
						   <img class="img-fluid d-block mx-auto" src="/views/public/images/brand/4.png" alt="">
					   </a>
					   <a class="col single-img" href="#">
						   <img class="img-fluid d-block mx-auto" src="/views/public/images/brand/5.png" alt="">
					   </a>
				   </div>
			   </div>
		   </section>
		   <!-- End brand Area -->
	   
		   <!-- Start related-product Area -->
		   <section class="related-product-area section_gap_bottom">
			   <div class="container">
				   <div class="row justify-content-center">
					   <div class="col-lg-6 text-center">
						   <div class="section-title">
							   <h1>Deals of the Week</h1>
							   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
								   magna aliqua.</p>
						   </div>
					   </div>
				   </div>
				   <div class="row">
					   <div class="col-lg-9">
						   <div class="row">
							   <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
								   <div class="single-related-product d-flex">
									   <a href="#"><img src="/views/public/images/r1.jpg" alt=""></a>
									   <div class="desc">
										   <a href="#" class="title">Black lace Heels</a>
										   <div class="price">
											   <h6>$189.00</h6>
											   <h6 class="l-through">$210.00</h6>
										   </div>
									   </div>
								   </div>
							   </div>
							   <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
								   <div class="single-related-product d-flex">
									   <a href="#"><img src="/views/public/images/r2.jpg" alt=""></a>
									   <div class="desc">
										   <a href="#" class="title">Black lace Heels</a>
										   <div class="price">
											   <h6>$189.00</h6>
											   <h6 class="l-through">$210.00</h6>
										   </div>
									   </div>
								   </div>
							   </div>
							   <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
								   <div class="single-related-product d-flex">
									   <a href="#"><img src="/views/public/images/r3.jpg" alt=""></a>
									   <div class="desc">
										   <a href="#" class="title">Black lace Heels</a>
										   <div class="price">
											   <h6>$189.00</h6>
											   <h6 class="l-through">$210.00</h6>
										   </div>
									   </div>
								   </div>
							   </div>
							   <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
								   <div class="single-related-product d-flex">
									   <a href="#"><img src="/views/public/images/r5.jpg" alt=""></a>
									   <div class="desc">
										   <a href="#" class="title">Black lace Heels</a>
										   <div class="price">
											   <h6>$189.00</h6>
											   <h6 class="l-through">$210.00</h6>
										   </div>
									   </div>
								   </div>
							   </div>
							   <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
								   <div class="single-related-product d-flex">
									   <a href="#"><img src="/views/public/images/r6.jpg" alt=""></a>
									   <div class="desc">
										   <a href="#" class="title">Black lace Heels</a>
										   <div class="price">
											   <h6>$189.00</h6>
											   <h6 class="l-through">$210.00</h6>
										   </div>
									   </div>
								   </div>
							   </div>
							   <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
								   <div class="single-related-product d-flex">
									   <a href="#"><img src="/views/public/images/r7.jpg" alt=""></a>
									   <div class="desc">
										   <a href="#" class="title">Black lace Heels</a>
										   <div class="price">
											   <h6>$189.00</h6>
											   <h6 class="l-through">$210.00</h6>
										   </div>
									   </div>
								   </div>
							   </div>
							   <div class="col-lg-4 col-md-4 col-sm-6">
								   <div class="single-related-product d-flex">
									   <a href="#"><img src="/views/public/images/r9.jpg" alt=""></a>
									   <div class="desc">
										   <a href="#" class="title">Black lace Heels</a>
										   <div class="price">
											   <h6>$189.00</h6>
											   <h6 class="l-through">$210.00</h6>
										   </div>
									   </div>
								   </div>
							   </div>
							   <div class="col-lg-4 col-md-4 col-sm-6">
								   <div class="single-related-product d-flex">
									   <a href="#"><img src="/views/public/images/r10.jpg" alt=""></a>
									   <div class="desc">
										   <a href="#" class="title">Black lace Heels</a>
										   <div class="price">
											   <h6>$189.00</h6>
											   <h6 class="l-through">$210.00</h6>
										   </div>
									   </div>
								   </div>
							   </div>
							   <div class="col-lg-4 col-md-4 col-sm-6">
								   <div class="single-related-product d-flex">
									   <a href="#"><img src="/views/public/images/r11.jpg" alt=""></a>
									   <div class="desc">
										   <a href="#" class="title">Black lace Heels</a>
										   <div class="price">
											   <h6>$189.00</h6>
											   <h6 class="l-through">$210.00</h6>
										   </div>
									   </div>
								   </div>
							   </div>
						   </div>
					   </div>
					   <div class="col-lg-3">
						   <div class="ctg-right">
							   <a href="#" target="_blank">
								   <img class="img-fluid d-block mx-auto" src="/views/public/images/category/c5.jpg" alt="">
							   </a>
						   </div>
					   </div>
					   
				   </div>
			   </div>
			  
		   </section>
		   <!-- End related-product Area -->
	   
		   <!-- start footer Area -->
		   <?php  include("views/partials/footer.php"); ?>
		   <!-- End footer Area -->
	   