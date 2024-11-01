<?php include("views/partials/header.php"); ?>
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
<section class="blog_area single-post-area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post row">
                    <div class="col-lg-12 text-center">
                        <div class="feature-img" style="margin-bottom: 20px;">
                            <img class="img-fluid" style="width: 100%; height: auto; max-height: 500px;"
                                 src="../views/public/images/blog/cat-post/<?php echo htmlspecialchars($article['featured_img']); ?>"
                                 alt="Featured Image">
                        </div>
                    </div>
                    <div class="col-lg-12 blog_details mt-4">
                        <h2><?php echo htmlspecialchars($article['title']); ?></h2>
                        <p class="excert">
                            <?php echo htmlspecialchars($article['descreption']); ?>
                        </p>
                        <p>
                            <?php echo nl2br(htmlspecialchars($article['body'])); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->

<!-- start footer Area -->
<?php include("views/partials/footer.php"); ?>
