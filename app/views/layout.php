<?php use App\models\DateBuilder;?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.shapedtheme.com/kotha-pro-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Apr 2019 08:46:58 GMT -->
<head>
    <!-- Document Settings -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- Page Title -->
    <title><?=$this->e($title)?></title>
    <!-- Fonts -->
    <link
            href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i%7cOswald:300,400,500,600,700%7cPlayfair+Display:400,400i,700,700i"
            rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/slick-theme.css">
    <link rel="stylesheet" href="../assets/css/slick.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <script src="../assets/js/html5shiv.js"></script>
    <script src="../assets/js/respond.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        //Всплывающие подсказки
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

</head>
<body>
<header class="kotha-menu marketing-menu">
    <nav class="navbar  navbar-default">
        <div><?php echo flash()->display(); //Вывод исключений ?></div>
        <div class="container">
            <div class="menu-content">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#myNavbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <?php if (!$auth->isLoggedIn()): //Если не залогинен?>
                    <ul class="top-social-icons list-inline pull-right">
                        <li class="login-registration"><a href="/registration-form">Registration</i></a>
                        <li class="login-registration"><a href="/login-form">Login</i></a>
                    </ul>
                    <? endif; ?>
                    <ul class="nav navbar-nav text-uppercase pull-left">
                        <li><a href="/">Home</a></li>
                        <li><a href="#">About me</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="show-search">
                    <form role="search" method="get" id="searchform" action="#">
                        <input type="text" placeholder="Search and hit enter..." name="s" id="s">
                    </form>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </nav>
    <div class="kotha-logo text-center">
        <h1><a href="/"><img src="../assets/images/kotha-logo.png" alt="kothPro"></a></h1>
    </div>
</header>
<div class="kotha-default-content">
    <div class="container">
        <div class="row">




            <?=$this->section('content')?>




            <div class="col-sm-4">
                <div class="kotha-sidebar">

                    <?php $this->insert('profile-user') ?>

                    <aside class="widget news-letter-widget">
                        <h2 class="widget-title text-uppercase text-center">Get Newsletter</h2>
                        <form action="#">
                            <input type="email" placeholder="Your email address" required>
                            <input type="submit" value="Subscribe Now"
                                   class="text-uppercase text-center btn btn-subscribe">
                        </form>
                    </aside>
                    <aside class="widget widget-popular-post">
                        <h3 class="widget-title text-uppercase text-center">Popular Posts</h3>
                        <ul>
                            <?php foreach ($getPopularPosts as $pp):; //Популярные посты?>
                            <li>
                                <a href="/page/<?=$pp['id'];?>" class="popular-img"><img src="../assets/images/posts/<?=$pp['images'];?>" alt="">
                                </a>
                                <div class="p-content">
                                    <h4><a href="/page/<?=$pp['id'];?>" class="text-uppercase"><?=$pp['title'];?></a></h4>
                                    <span class="p-date"><?=DateBuilder::convertDate($pp['creation_date']); ?></span>
                                </div>
                            </li>
                            <?php endforeach;?>
                        </ul>
                    </aside>
                    <aside class="widget latest-post-widget">
                        <h2 class="widget-title text-uppercase text-center">Latest Posts</h2>
                        <ul>
                            <?php foreach ($latestPosts['items'] as $lp):?>
                            <li class="media">
                                <div class="media-left">
                                    <a href="/page/<?=$lp['id'];?>" class="popular-img"><img src="../assets/images/posts/<?=$lp['images'];?>" alt="" width="100">
                                    </a>
                                </div>
                                <div class="latest-post-content">
                                    <h2 class="text-uppercase"><a href="/page/<?=$lp['id'];?>"><?=$lp['title'];?></a></h2>
                                    <p><?=DateBuilder::convertDate($lp['creation_date']); ?></p>
                                </div>
                            </li>
                            <?php endforeach;?>
                        </ul>
                    </aside>
                    <aside class="widget insta-widget">
                        <h2 class="widget-title text-uppercase text-center">INSTAGRAM FEED</h2>
                        <div class="instagram-feed">
                            <div class="single-instagram">
                                <a href="#">
                                    <img src="../assets/images/ft-insta-1.jpg" alt="">
                                </a>
                                <div class="insta-overlay">
                                    <div class="insta-meta">
                                        <ul class="list-inline text-center">
                                            <li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
                                            <li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
                                        </ul>
                                    </div>
                                </div>
                                <a href="#" class="insta-link"></a>
                            </div>
                            <div class="single-instagram">
                                <a href="#">
                                    <img src="../assets/images/ft-insta-6.jpg" alt="">
                                </a>
                                <div class="insta-overlay">
                                    <div class="insta-meta">
                                        <ul class="list-inline text-center">
                                            <li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
                                            <li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
                                        </ul>
                                    </div>
                                </div>
                                <a href="#" class="insta-link"></a>
                            </div>
                            <div class="single-instagram">
                                <a href="#">
                                    <img src="../assets/images/ft-insta-4.jpg" alt="">
                                </a>
                                <div class="insta-overlay">
                                    <div class="insta-meta">
                                        <ul class="list-inline text-center">
                                            <li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
                                            <li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
                                        </ul>
                                    </div>
                                </div>
                                <a href="#" class="insta-link"></a>
                            </div>
                            <div class="single-instagram">
                                <a href="#">
                                    <img src="../assets/images/ft-insta-3.jpg" alt="">
                                </a>
                                <div class="insta-overlay">
                                    <div class="insta-meta">
                                        <ul class="list-inline text-center">
                                            <li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
                                            <li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
                                        </ul>
                                    </div>
                                </div>
                                <a href="#" class="insta-link"></a>
                            </div>
                            <div class="single-instagram">
                                <a href="#">
                                    <img src="../assets/images/ft-insta-7.jpg" alt="">
                                </a>
                                <div class="insta-overlay">
                                    <div class="insta-meta">
                                        <ul class="list-inline text-center">
                                            <li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
                                            <li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
                                        </ul>
                                    </div>
                                </div>
                                <a href="#" class="insta-link"></a>
                            </div>
                            <div class="single-instagram">
                                <a href="#">
                                    <img src="../assets/images/ft-insta-8.jpg" alt="">
                                </a>
                                <div class="insta-overlay">
                                    <div class="insta-meta">
                                        <ul class="list-inline text-center">
                                            <li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
                                            <li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
                                        </ul>
                                    </div>
                                </div>
                                <a href="#" class="insta-link"></a>
                            </div>
                        </div>
                    </aside>
                    <aside class="widget add-widget">
                        <h2 class="widget-title text-uppercase text-center">Advertisement</h2>

                        <div class="add-image">
                            <a href="#"><img src="../assets/images/add-image.jpg" alt=""></a>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid insta-feed text-center">
    <h2 class="text-uppercase">Follow@ <a href="#">Instagram</a></h2>
    <div id="footer-instagram" class="footer-insta">
        <div class="item">
            <div class="single-instagram">
                <a href="#">
                    <img src="../assets/images/ft-insta-1.jpg" alt="">
                </a>
                <div class="insta-overlay">
                    <div class="insta-meta">
                        <ul class="list-inline text-center">
                            <li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
                            <li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
                        </ul>
                    </div>
                </div>
                <a href="#" class="insta-link"></a>
            </div>
        </div>
        <div class="item">
            <div class="single-instagram">
                <a href="#">
                    <img src="../assets/images/ft-insta-2.jpg" alt="">
                </a>
                <div class="insta-overlay">
                    <div class="insta-meta">
                        <ul class="list-inline text-center">
                            <li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
                            <li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
                        </ul>
                    </div>
                </div>
                <a href="#" class="insta-link"></a>
            </div>

        </div>
        <div class="item">
            <div class="single-instagram">
                <a href="#">
                    <img src="../assets/images/ft-insta-3.jpg" alt="">
                </a>
                <div class="insta-overlay">
                    <div class="insta-meta">
                        <ul class="list-inline text-center">
                            <li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
                            <li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
                        </ul>
                    </div>
                </div>
                <a href="#" class="insta-link"></a>
            </div>

        </div>
        <div class="item">
            <div class="single-instagram">
                <a href="#">
                    <img src="../assets/images/ft-insta-4.jpg" alt="">
                </a>
                <div class="insta-overlay">
                    <div class="insta-meta">
                        <ul class="list-inline text-center">
                            <li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
                            <li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
                        </ul>
                    </div>
                </div>
                <a href="#" class="insta-link"></a>
            </div>
        </div>
        <div class="item">
            <div class="single-instagram">
                <a href="#">
                    <img src="../assets/images/ft-insta-5.jpg" alt="">
                </a>
                <div class="insta-overlay">
                    <div class="insta-meta">
                        <ul class="list-inline text-center">
                            <li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
                            <li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
                        </ul>
                    </div>
                </div>
                <a href="#" class="insta-link"></a>
            </div>
        </div>
        <div class="item">
            <div class="single-instagram">
                <a href="#">
                    <img src="../assets/images/ft-insta-6.jpg" alt="">
                </a>
                <div class="insta-overlay">
                    <div class="insta-meta">
                        <ul class="list-inline text-center">
                            <li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
                            <li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
                        </ul>
                    </div>
                </div>
                <a href="#" class="insta-link"></a>
            </div>
        </div>
        <div class="item">
            <div class="single-instagram">
                <a href="#">
                    <img src="../assets/images/ft-insta-7.jpg" alt="">
                </a>
                <div class="insta-overlay">
                    <div class="insta-meta">
                        <ul class="list-inline text-center">
                            <li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
                            <li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
                        </ul>
                    </div>
                </div>
                <a href="#" class="insta-link"></a>
            </div>
        </div>
        <div class="item">
            <div class="single-instagram">
                <a href="#">
                    <img src="../assets/images/ft-insta-8.jpg" alt="">
                </a>
                <div class="insta-overlay">
                    <div class="insta-meta">
                        <ul class="list-inline text-center">
                            <li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
                            <li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
                        </ul>
                    </div>
                </div>
                <a href="#" class="insta-link"></a>
            </div>
        </div>
    </div>
</div>
<footer>
    <div class="container">
        <div class="footer-widget-row">
            <div class="footer-widget contact-widget">
                <div class="widget-title">
                    <img src="../assets/images/kotha-white-logo.png" alt="">
                </div>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
                    ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eaccusam et justo duo
                    dolores eteem.</p>
                <div class="address">
                    <h4 class="text-uppercase">contact Info</h4>
                    <p> 239/2 NK Street, DC, USA</p>
                    <p> Phone: +123 456 78900</p>
                    <a href="mailto:theme@kotha.com">theme@kotha.com</a>
                </div>
            </div>
            <div class="footer-widget twitter-widget">
                <h2 class="widget-title text-uppercase">
                    Latest TWeeTs
                </h2>
                <div class="single-tweet">
                    <p>Check our new theme 'kotha - Personal WordPress Blog Theme' on #themeforest #Envato
                        #WordPress <br>
                        <a href="https://t.co/kN5OPEuPzx">https://t.co/kN5OPEuPzx</a></p>
                    <h4><i class="fa fa-twitter"></i>Tweeted on 17 hours ago</h4>
                </div>
                <div class="single-tweet">
                    <p>Check our new theme 'kotha - Personal WordPress Blog Theme' on #themeforest #Envato
                        #WordPress
                        <br>
                        <a href="https://t.co/kN5OPEuPzx">https://t.co/kN5OPEuPzx</a></p>
                    <h4><i class="fa fa-twitter"></i>Tweeted on 17 hours ago</h4>
                </div>
            </div>

            <div class="footer-widget testimonial-widget">
                <h2 class="widget-title text-uppercase">Testimonials</h2>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!--Indicator-->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class=""></li>
                        <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="item">
                            <div class="single-review">
                                <div class="review-text">
                                    <p>Lorem ipsum dolor sit amet, conssadipscing elitr, sed diam nonumy eirmod
                                        tempvidunt ut labore et dolore magna aliquyam erat,sed diam voluptua. At
                                        vero eos et accusam justo duo dolores et ea rebum.gubergren no sea takimata
                                        magna aliquyam eratma</p>
                                </div>
                                <div class="author-id">
                                    <img src="../assets/images/author.jpg" alt="">
                                    <div class="author-text">
                                        <h4>John Doe</h4>
                                        <h4>CEO, Apple Inc.</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item active">
                            <div class="single-review">
                                <div class="review-text">
                                    <p>Lorem ipsum dolor sit amet, conssadipscing elitr, sed diam nonumy eirmod
                                        tempvidunt ut labore et dolore magna aliquyam erat,sed diam voluptua. At
                                        vero eos et accusam justo duo dolores et ea rebum.gubergren no sea takimata
                                        magna aliquyam eratma</p>
                                </div>
                                <div class="author-id">
                                    <img src="../assets/images/autho-1r.jpg" alt="">
                                    <div class="author-text">
                                        <h4>Robert Arri</h4>
                                        <h4>HRM, Microsoft Inc.</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="single-review">
                                <div class="review-text">
                                    <p>Lorem ipsum dolor sit amet, conssadipscing elitr, sed diam nonumy eirmod
                                        tempvidunt ut labore et dolore magna aliquyam erat,sed diam voluptua. At
                                        vero eos et accusam justo duo dolores et ea rebum.gubergren no sea takimata
                                        magna aliquyam eratma</p>
                                </div>
                                <div class="author-id">
                                    <img src="../assets/images/author.png" alt="">

                                    <div class="author-text">
                                        <h4>Brown Fish</h4>
                                        <h4>CEO, Bangari Inc.</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-center ft-copyright">
        <p>&copy; 2017 <a href="#">Kotha PRO </a> - Designed with <i class="fa fa-heart"></i> by <a
                    href="http://shapedtheme.com/">ShapedTheme</a></p>
    </div>
</footer>
<div class="scroll-up">
    <a href="#"><i class="fa fa-angle-up"></i></a>
</div>

<!--//Script//-->
<script src="../assets/js/jquery-1.12.4.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/slick.min.js"></script>
<script src="../assets/js/main.js"></script>
</body>

<!-- Mirrored from demo.shapedtheme.com/kotha-pro-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Apr 2019 08:46:58 GMT -->
</html>