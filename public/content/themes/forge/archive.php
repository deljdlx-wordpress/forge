<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Foodeiblog Template">
    <meta name="keywords" content="Foodeiblog, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <?=wp_head();?>


</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <?=get_template_part('partials/burger-menu')?>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <?=get_template_part('partials/header')?>
    <!-- Header Section End -->

    <!-- Categories Section Begin -->
    <section class="categories categories-grid spad">
        <div class="categories__post">
            <div class="container">
                <div class="categories__grid__post">
                    <div class="row">
                        <div class="col-lg-8 col-md-8">
                            <div class="breadcrumb__text">
                                <h2>Category :

                                <?php
                                    $categories = get_the_category();
                                    if(!empty($categories)) {
                                        foreach($categories as $category) {
                                            $categoryURL = get_category_link($category);
                                                echo '<span>' . $category->name . '</span>';
                                            echo ' ';
                                        }
                                    }
                                ?>
                                </h2>
                                <!--
                                <div class="breadcrumb__option">
                                    <a href="#">Home</a>
                                    <span>Recipes</span>
                                </div>
                                //-->
                            </div>

                            <?php
                            if(have_posts()) {
                                while(have_posts()) {
                                    the_post();
                                    get_template_part('partials/archive-card');
                                }
                            }
                            ?>


                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="categories__pagination">
                                        <a href="#">1</a>
                                        <a href="#">2</a>
                                        <a href="#">3</a>
                                        <a href="#">Next</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="sidebar__item">
                                <div class="sidebar__about__item">
                                    <div class="sidebar__item__title">
                                        <h6>About me</h6>
                                    </div>
                                    <img src="img/sidebar/sidebar-about.jpg" alt="">
                                    <h6>Hi every one! I,m <span>Lena Mollein.</span></h6>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.</p>
                                    <a href="#" class="primary-btn">Read more</a>
                                </div>
                                <div class="sidebar__follow__item">
                                    <div class="sidebar__item__title">
                                        <h6>Follow me</h6>
                                    </div>
                                    <div class="sidebar__item__follow__links">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                        <a href="#"><i class="fa fa-envelope-o"></i></a>
                                    </div>
                                </div>
                                <div class="sidebar__feature__item">
                                    <div class="sidebar__item__title">
                                        <h6>Feature Posts</h6>
                                    </div>
                                    <div class="sidebar__feature__item__large set-bg"
                                        data-setbg="img/sidebar/feature-post.jpg">
                                        <div class="sidebar__feature__item__large--text">
                                            <span>Dinner</span>
                                            <h5><a href="#">This Japanese Way of Making Iced Coffee Is a Game...</a>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="sidebar__feature__item__list">
                                        <div class="sidebar__feature__item__list__single">
                                            <div class="post__meta">
                                                <h4>08</h4>
                                                <span>Aug</span>
                                            </div>
                                            <div class="post__text">
                                                <span>Dinner</span>
                                                <h5><a href="#">Grilled Potato and Green Bean Salad</a></h5>
                                            </div>
                                        </div>
                                        <div class="sidebar__feature__item__list__single">
                                            <div class="post__meta">
                                                <h4>05</h4>
                                                <span>Aug</span>
                                            </div>
                                            <div class="post__text">
                                                <span>Smoothie</span>
                                                <h5><a href="#">The $8 French Rosé I Buy in Bulk Every Summer</a></h5>
                                            </div>
                                        </div>
                                        <div class="sidebar__feature__item__list__single">
                                            <div class="post__meta">
                                                <h4>26</h4>
                                                <span>jul</span>
                                            </div>
                                            <div class="post__text">
                                                <span>Desert</span>
                                                <h5><a href="#">Ina Garten's Skillet-Roasted Lemon Chicken</a></h5>
                                            </div>
                                        </div>
                                        <div class="sidebar__feature__item__list__single">
                                            <div class="post__meta">
                                                <h4>16</h4>
                                                <span>jul</span>
                                            </div>
                                            <div class="post__text">
                                                <span>Vegan</span>
                                                <h5><a href="#">The Best Weeknight Baked Potatoes, 3 Creative Ways</a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sidebar__item__banner">
                                    <img src="img/sidebar/banner.jpg" alt="">
                                </div>
                                <div class="sidebar__item__categories">
                                    <div class="sidebar__item__title">
                                        <h6>Categories</h6>
                                    </div>
                                    <ul>
                                        <li><a href="#">Recipes <span>128</span></a></li>
                                        <li><a href="#">Dinner <span>32</span></a></li>
                                        <li><a href="#">Dessert <span>86</span></a></li>
                                        <li class="p-left"><a href="#">Smothie <span>25</span></a></li>
                                        <li class="p-left"><a href="#">Drinks <span>36</span></a></li>
                                        <li class="p-left"><a href="#">Cakes <span>15</span></a></li>
                                        <li><a href="#">Vegan <span>63</span></a></li>
                                        <li><a href="#">Weightloss <span>27</span></a></li>
                                    </ul>
                                </div>
                                <div class="sidebar__subscribe__item">
                                    <div class="sidebar__item__title">
                                        <h6>Subscribe</h6>
                                    </div>
                                    <p>Subscribe to our newsletter and get our newest updates right on your inbox.</p>
                                    <form action="#">
                                        <input type="text" class="email-input" placeholder="Your email">
                                        <label for="s-agree-check">
                                            I agree to the terms & conditions
                                            <input type="checkbox" id="s-agree-check">
                                            <span class="checkmark"></span>
                                        </label>
                                        <button type="submit" class="site-btn">Subscribe</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Footer Section Begin -->
    <?=get_template_part('partials/footer')?>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <?=wp_footer();?>
</body>

</html>