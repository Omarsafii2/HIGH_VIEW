<?php require 'views/partials/header.php'; ?>

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shop Category page</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.php">Fashion Category</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <div class="container border mt-2 bg-">
        <div class="">
            <div class="container">
                <div class="row s_product_inner">
                    <div class="col-lg-6">
                        <div class="s_Product_carousel">
                            <div class="single-prd-item">
                                <img class="img-fluid" src="../views/public/images/product/<?php echo $product_images['front_view']?>" alt="">
                            </div>
                            <div class="single-prd-item">
                                <img class="img-fluid" src="../views/public/images/product/<?php echo $product_images['back_view']?>" alt="">
                            </div>
                            <div class="single-prd-item">
                                <img class="img-fluid" src="../views/public/images/product/<?php echo $product_images['side_view']?>" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 offset-lg-1">
                        <div class="s_product_text">
                            <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                            <h2><?php echo htmlspecialchars($product['price']); ?></h2>
                            <ul class="list">
                                <li><span>category</span> : <?php echo htmlspecialchars($categories['name']); ?></li>
                                <li><span>Availability</span> : <?php echo htmlspecialchars($product['stock']); ?></li>
                                <li>Size : <?php echo htmlspecialchars($product_sizes['size']); ?></li>
                            </ul>
                            <p>Description : <?php echo htmlspecialchars($product['description']); ?></p>
                            <hr>
                            <div class="card_area align-items-center">
                                <form action="/category/details/addCart" method="POST" style="display:inline;">
                                    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['id']); ?>">
                                    <input type="number" id="quantity" name="quantity" required min="1" placeholder="Enter Quantity">
                                    <button class="primary-btn m-3"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                </form>

                                <form action="/category/details/create" method="POST" style="display:inline;">
                                    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['id']); ?>">
                                    <button type="submit" class="btn btn-primary w-75">Add to Wishlist</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="product_description_area">
            <div class="container">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <button class="btn primary-btn" onclick="showParagraph('para1')">Specification</button>
                    <button class="btn primary-btn" onclick="showParagraph('para2')">Reviews</button>
                </ul>

                <div id="para1" style="display: none;">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td><h5>Width</h5></td>
                                <td><h5><?php echo htmlspecialchars($product['width'] . ' cm'); ?></h5></td>
                            </tr>
                            <tr>
                                <td><h5>Height</h5></td>
                                <td><h5><?php echo htmlspecialchars($product['height'] . ' cm'); ?></h5></td>
                            </tr>
                            <tr>
                                <td><h5>Weight</h5></td>
                                <td><h5><?php echo htmlspecialchars($product['weight'] . ' gm'); ?></h5></td>
                            </tr>
                            <tr>
                                <td><h5>Quality Checking</h5></td>
                                <td><h5><?php echo htmlspecialchars($product['quality_checking']); ?></h5></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-content" id="para2" style="display: none;">
                    <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row total_rate">
                                    <div class="col-6">
                                        <div class="box_total">
                                            <h5>Overall</h5>
                                            <h4><?php echo number_format($avg, 1); ?></h4>
                                            <h6><?php echo $count; ?> Reviews</h6>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="rating_list">
                                            <h3>Based on 3 Reviews</h3>
                                            <ul class="list">
                                                <li><a href="#">5 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                                <li><a href="#">4 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                                <li><a href="#">3 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                                <li><a href="#">2 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                                <li><a href="#">1 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="review_list">
                                    <?php $reviewCount = count($reviews); ?>
                                    <div id="reviewContainer">
                                        <?php foreach ($reviews as $index => $review): ?>
                                            <div class="review_item border <?php echo $index >= 2 ? 'd-none' : ''; ?>">
                                                <div class="media">
                                                    <div class="d-flex">
                                                        <img src="<?php echo htmlspecialchars($review['img']); ?>" alt="" loading="lazy" width="150px" height="200px">
                                                    </div>
                                                    <div class="media-body">
                                                        <h4><?php echo htmlspecialchars($review['first_name'] . ' ' . $review['last_name']); ?></h4>
                                                        <!-- Display star rating based on review rating -->
                                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                                            <i class="fa fa-star<?php echo $i <= $review['rate'] ? '' : '-o'; ?>"></i>
                                                        <?php endfor; ?>
                                                        <hr>
                                                        <p><?php echo htmlspecialchars($review['review']); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>

                                    <!-- Show More Button (only visible if there are more than 2 reviews) -->
                                    <?php if ($reviewCount > 2): ?>
                                        <button id="showMoreButton" class="btn btn-primary mt-3" onclick="showMoreReviews()">Show More</button>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="review_box">
                                    <h4>Add a Review</h4>
                                    <p>Your Rating:</p>
                                    <ul class="list">
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                    <form action="/category/details/review" method="POST">
                                        <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['id']); ?>">
                                        <div class="form-group">
                                            <textarea class="form-control" name="review" id="review" rows="1" placeholder="Write a review" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit Review</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        function showParagraph(paraId) {
            // Hide all paragraphs
            var paragraphs = document.querySelectorAll('.tab-content > div');
            paragraphs.forEach(function(para) {
                para.style.display = 'none';
            });

            // Show the selected paragraph
            document.getElementById(paraId).style.display = 'block';
        }

        function showMoreReviews() {
            var hiddenReviews = document.querySelectorAll('.review_item.d-none');
            hiddenReviews.forEach(function(review) {
                review.classList.remove('d-none');
            });
            // Hide the Show More button if there are no more hidden reviews
            if (document.querySelectorAll('.review_item.d-none').length === 0) {
                document.getElementById('showMoreButton').style.display = 'none';
            }
        }
    </script>

<?php require 'views/partials/footer.php'; ?>
<?php
