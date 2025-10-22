<?php $page_title="Knowledge Articles" ?>

     <!-- start page title -->
<section class="pt-0 cover-background ipad-top-space-margin sm-pb-0"
    style="background-image:url('public/images/blog/blog-inner.webp');">
    <div class="shape-image-animation bottom-0 p-0 w-100 d-none d-md-block">
        <svg xmlns="http://www.w3.org/2000/svg" widht="3000" height="400" viewBox="0 180 2500 200" fill="#ffffff">
            <path class="st1" d="M 0 250 C 1200 400 1200 50 3000 250 L 3000 550 L 0 550 L 0 250">
                <animate attributeName="d" dur="5s" values="M 0 250 C 1200 400 1200 50 3000 250 L 3000 550 L 0 550 L 0 250;
                            M 0 250 C 400 50 400 400 3000 250 L 3000 550 L 0 550 L 0 250;
                            M 0 250 C 1200 400 1200 50 3000 250 L 3000 550 L 0 550 L 0 250" repeatCount="indefinite" />
            </path>
        </svg>
    </div>
    <div class="container">
        <div class="row align-items-center justify-content-center h-500px sm-h-300px">
            <div class="col-12 col-lg-6 col-md-10 position-relative text-center page-title-extra-large d-flex flex-wrap flex-column align-items-center justify-content-center"
                data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                <span
                    class="ps-25px pe-25px pt-5px pb-5px mb-15px text-uppercase text-white fs-12 ls-1px fw-600 border-radius-100px bg-gradient-dark-gray-transparent d-flex"><i
                        class="bi bi-patch-check text-white icon-small me-10px"></i>Blog</span>
                <h1 class="mb-20px text-white fw-600 ls-minus-1px">Knowledge Articles</h1>
            </div>
        </div>
    </div>
</section>
<!-- end page title -->
  <!-- start section -->
<section class="pt-0 ps-2 pe-2 xs-px-0">
    <div class="container-fluid">
        <div class="row blog-metro">
            <div class="col-12">
                <ul
                    class="blog-metro blog-wrapper grid-loading grid grid-4col xl-grid-4col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-large">
                    <li class="grid-sizer"></li>

                    <?php if (!empty($posts)): ?>
                        <?php foreach ($posts as $index => $post): ?>
                            <!-- start blog item -->
                            <li class="grid-item <?php echo ($index % 4 === 0) ? 'grid-item-double' : ''; ?>">
                                <figure class="position-relative mb-0 overflow-hidden">
                                    <div class="blog-image bg-dark-slate-blue">
                                        <img src="<?php echo htmlspecialchars($post['thumbnail_url']); ?>"
                                            alt="<?php echo htmlspecialchars($post['title']); ?>" />
                                        <div class="blog-overlay"></div>
                                    </div>
                                    <figcaption class="d-flex flex-column justify-content-end h-100 ps-7 pe-7 pt-6 pb-6">
                                        <div class="blog-categories mb-auto">
                                            <?php if (!empty($post['category'])): ?>
                                                <span class="categories-btn bg-white text-dark-gray text-uppercase alt-font fw-700 ms-0 mb-auto align-self-start">
                                                    <?php echo htmlspecialchars($post['category']); ?>
                                                </span>
                                            <?php endif; ?>
                                        </div>

                                        <?php if (!empty($post['date'])): ?>
                                            <span class="fs-13 alt-font mb-5px text-white opacity-6 text-uppercase">
                                                <?php echo date('j F Y', strtotime($post['date'])); ?>
                                            </span>
                                        <?php endif; ?>

                                        <a href="<?php echo htmlspecialchars($post['url']); ?>"
                                            class="text-white card-title fs-22 lh-30 fw-500 alt-font d-block mb-5px">
                                            <?php echo htmlspecialchars($post['title']); ?>
                                        </a>

                                        <?php if (!empty($post['author'])): ?>
                                            <span class="fs-13 alt-font text-white opacity-10 text-uppercase mb-5px fw-600">
                                                By <?php echo htmlspecialchars($post['author']); ?>
                                            </span>
                                        <?php endif; ?>

                                        <?php if (!empty($post['description'])): ?>
                                            <span class="text-white card-title fs-17 lh-22 fw-200 opacity-6 alt-font">
                                                <?php echo htmlspecialchars($post['description']); ?>
                                            </span>
                                        <?php endif; ?>
                                    </figcaption>
                                </figure>
                            </li>
                            <!-- end blog item -->
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-center text-light fs-18 py-5">No blog posts available right now. Check back soon!</p>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- end section -->
<hr>