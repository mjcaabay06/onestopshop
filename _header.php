<div class="top top-style2">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul class="flat-information">
                    <li>Mon - Fri: 8.00 - 18:00</li>
                </ul>
                <ul class="flat-socials">
                    <li><a href=""><i class="fa fa-facebook"></i></a></li>
                    <li><a href=""><i class="fa fa-twitter"></i></a></li>
                    <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                    <li><a href=""><i class="fa fa-pinterest"></i></a></li>
                </ul>
            </div><!-- col-md-8 -->
            <div class="col-md-4">
                <div class="wrap-flat">
                    <ul class="flat-login-register">
                        <?php if (empty($_SESSION['authId'])): ?>
                            <li><a href="sign-in.php">Log In</a></li>
                            <li><a href="sign-up.php">Sign Up</a></li>
                        <?php else: ?>
                            <?php
                                $selUser = "select * from clients inner join client_infos on client_infos.client_id = clients.id where clients.id = " . $_SESSION['authId'];
                                $rsUser = mysqli_query($mysqli, $selUser);
                                $rowUser = mysqli_fetch_assoc($rsUser);
                            ?>
                            <li>Welcome <?php echo ucfirst($rowUser['first_name']) ?>!</li>
                            <li><a href="logout.php">Logout</a></li>
                        <?php endif; ?>
                    </ul>
                </div><!-- wrap-flat -->
            </div><!-- col-md-4 -->
        </div><!-- row -->
    </div><!-- container -->
</div><!-- top -->
<header id="header" class="header styleheader header-style2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="logo">
                    <a href="index.php"><img src="images/logo.png" alt="image"></a>
                </div><!-- /logo -->
                <!-- <div class="flat-search">
                    <ul>
                        <li><a href=""><i class="lnr lnr-magnifier"></i></a></li>
                        <li><a href="#"><i class="lnr lnr-cart"></i></a></li>
                    </ul>
                </div> --><!-- /wrap-search -->
                <div class="wrap-nav pull-left ml-50">
                    <nav id="mainnav" class="mainnav">
                        <ul class="menu">
                            <li class="active"><a href="index.php" title="" class="no-content">HOME</a></li>
                            <!-- <li><a href="" title="">COURSES</a>
                                <ul class="submenu submenu-style2">
                                    <li class="submenu-level">
                                       <ul class="submenu2">
                                            <li class="sub-title"><a href="#">TECHNOLOGY</a></li>
                                            <li><a href="#">UI/UX</a></li>
                                            <li><a href="" title="">Design Web</a></li>
                                            <li><a href="" title="">HTML5/CSS3</a></li>
                                            <li><a href="#">Development</a></li>
                                            <li><a href="" title="">Saler</a></li>
                                            <li><a href="" title="">Finace</a></li>
                                        </ul> 
                                    </li>
                                    <li class="submenu-level">
                                       <ul class="submenu2">
                                            <li class="sub-title"><a href="#">DESIGN WEBSITE</a></li>
                                            <li><a href="#">UI/UX</a></li>
                                            <li><a href="" title="">Design Web</a></li>
                                            <li><a href="" title="">HTML5/CSS3</a></li>
                                            <li><a href="#">Development</a></li>
                                            <li><a href="" title="">Saler</a></li>
                                            <li><a href="" title="">Finace</a></li>
                                        </ul> 
                                    </li>
                                    <li class="submenu-level">
                                       <ul class="submenu2">
                                            <li class="sub-title"><a href="#">CODE</a></li>
                                            <li><a href="#">UI/UX</a></li>
                                            <li><a href="" title="">Design Web</a></li>
                                            <li><a href="" title="">HTML5/CSS3</a></li>
                                            <li><a href="#">Development</a></li>
                                            <li><a href="" title="">Saler</a></li>
                                            <li><a href="" title="">Finace</a></li>
                                        </ul> 
                                    </li>
                                    <li class="submenu-level">
                                       <ul class="submenu2">
                                            <li class="sub-title"><a href="#">GAME</a></li>
                                            <li><a href="#">UI/UX</a></li>
                                            <li><a href="" title="">Design Web</a></li>
                                            <li><a href="" title="">HTML5/CSS3</a></li>
                                            <li><a href="#">Development</a></li>
                                            <li><a href="" title="">Saler</a></li>
                                            <li><a href="" title="">Finace</a></li>
                                        </ul> 
                                    </li>
                                </ul>
                            </li> -->
                            <li><a href="" title="">PAGES</a>
                                <ul class="submenu">
                                    <li><a href="index.html" title="">Home style 01</a></li>
                                    <li><a href="index2.html" title="">Home style 02</a></li>
                                    <li><a href="index3.html" title="">Home style 03</a></li>
                                    <li><a href="index4.html" title="">Home style 04</a></li>
                                    <li><a href="index5.html" title="">Home style 05</a></li>
                                    <li><a href="index6.html" title="">Home style 06</a></li>
                                </ul>
                            </li>
                            <!-- <li><a href="" title="">BLOG</a>
                                <ul class="submenu">
                                    <li><a href="blog-list01.html">Blog List 01</a></li>
                                    <li><a href="blog-list02.html">Blog List 02</a></li>
                                    <li><a href="blog-list03.html">Blog list 03</a></li>
                                    <li><a href="blog-zigzac01.html">Blog Zigzac 01</a></li>
                                    <li><a href="blog-zigzac02.html">Blog Zigzac 02</a></li>
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="" title="">SHOP</a></li> -->
                            <li><a href="" title="" class="no-content">CONTACT</a></li>
                        </ul>
                    </nav>
                </div><!-- /wrap-nav -->
            </div><!-- /col-md-12 -->
        </div><!-- /row -->
    </div><!-- /container -->
</header><!-- /header -->