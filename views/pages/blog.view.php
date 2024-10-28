<?php include("views/partials/header.php");?>
<!-- End Header Area -->

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Blog Page</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="category.html">Blog</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Blog Area =================-->
<section class="blog_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog_left_sidebar">
                    <?php foreach($article as $element): ?>
                        <article class="row blog_item">
                            <div class="col-md-3">
                                <div class="blog_info text-right">
                                    <ul class="blog_meta list">
                                        <li><a href="#"><?php echo $element['created_at']; ?><i class="lnr lnr-calendar-full"></i></a></li>
                                        <li><a href="#"><?php echo $element['views']; ?><i class="lnr lnr-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="blog_post">
                                    <img src="views/public/images/blog/main-blog/<?php echo $element['featured_img']; ?>" alt="">
                                    <div class="blog_details">
                                        <a href="single-blog.html">
                                            <h2><?php echo $element['title']; ?></h2>
                                        </a>
                                        <p><?php echo $element['body']; ?></p>
                                        <a href="/single-blog" class="white_bg_btn">View More</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>

                    <!-- Pagination -->
                    <nav class="blog-pagination justify-content-center d-flex">
                        <ul class="pagination">
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Previous">
                                    <span aria-hidden="true">
                                        <span class="lnr lnr-chevron-left"></span>
                                    </span>
                                </a>
                            </li>
                            <li class="page-item"><a href="#" class="page-link">01</a></li>
                            <li class="page-item active"><a href="#" class="page-link">02</a></li>
                            <li class="page-item"><a href="#" class="page-link">03</a></li>
                            <li class="page-item"><a href="#" class="page-link">04</a></li>
                            <li class="page-item"><a href="#" class="page-link">09</a></li>
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Next">
                                    <span aria-hidden="true">
                                        <span class="lnr lnr-chevron-right"></span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->

<!-- Start Footer Area -->
<?php include("views/partials/footer.php"); ?>
