<?php
    session_start();
    include "include/configuration.php";
    include "include/general_functions.php";

    // if(!isset($_SESSION['authId']) || empty($_SESSION['authId'])){
    //     header("Location: sign-in.php");
    //     exit;
    // }
    $selCom = "select * from client_companies inner join (clients inner join client_infos on client_infos.client_id = clients.id) on clients.id = client_companies.client_id where client_companies.id = " . $_GET['comid'];
    $rsCom = mysqli_query($mysqli, $selCom);
    $com = mysqli_fetch_assoc($rsCom);
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->
<head>
    <?php include('_head.php') ?>
</head>                                
<body>

    <!-- Boxed --> 
    <div class="boxed position_form">
        <?php include("_header.php"); ?>
        <!-- Iconbox -->
        <section class="flat-row bg-theme custom pt-40">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <strong style="font-size: 1.5em"><?php echo $com['name'] ?></strong>
                        <span class="droplets"></span>
                    </div>
                    <div class="col-sm-12">
                        <div id="slider">
                            <!-- <a href="#" class="control_next">></a>
                            <a href="#" class="control_prev"><</a> -->
                            <button type="button" class="control_next">></button>
                            <button type="button" class="control_prev"><</button>
                            <ul>
                                <li><img src="uploads/5/2/thumbnails/slides1.jpg" ></li>
                                <li><img src="uploads/5/2/thumbnails/slides2.jpg" ></li>
                                <li><img src="uploads/5/2/thumbnails/slides3.jpg" ></li>
                                <li><img src="uploads/5/2/thumbnails/slides4.jpg" ></li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>

        <section class="flat-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="title-section">
                            <h1 class="title">POPULAR COURSE CATEGORIES</h1>
                            <div class="sub-title">
                                Having over 10 million students worldwide and more than 50.000 online courses available.
                            </div>
                        </div>
                    </div><!-- col-md-12 -->
                    <div class="col-md-4">
                        <div class="title-section">
                            <h1 class="title">POPULAR COURSE CATEGORIES</h1>
                            <div class="sub-title">
                                Having over 10 million students worldwide and more than 50.000 online courses available.
                            </div>
                        </div>
                    </div><!-- col-md-12 -->
                </div><!-- row -->
            </div><!-- container -->

            
        </section>
        
        <?php include("_popular-organizers-dark.php"); ?>
        
        <!-- Footer -->
        <?php include("_footer.php"); ?><!-- footer -->

    </div><!-- Boxed -->

    <!-- Javascript -->
    <?php include("_footer-js.php"); ?>
    <script type="text/javascript">
        $(document).ready(function(){
            // setInterval(function () {
            //     moveRight();
            // }, 4000);

            var slideCount = $('#slider ul li').length;
            var slideWidth = $('#slider ul li').width();
            var slideHeight = $('#slider ul li').height();
            var sliderUlWidth = slideCount * slideWidth;

            $('#slider').css({ width: slideWidth, height: slideHeight });

            $('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });

            $('#slider ul li:last-child').prependTo('#slider ul');

            $("#slider img").css({ marginLeft: - slideWidth });

            function moveLeft() {
                $('#slider ul').animate({
                        left: + slideWidth
                    }, 200, function () {
                    $('#slider ul li:last-child').prependTo('#slider ul');
                    $('#slider ul').css('left', '');
                });
            };

            function moveRight() {
                $('#slider ul').animate({
                        left: - slideWidth
                    }, 200, function () {
                    $('#slider ul li:first-child').appendTo('#slider ul');
                    $('#slider ul').css('left', '');
                });
            };

            $('button.control_prev').click(function () {
                moveLeft();
            });

            $('button.control_next').click(function () {
                moveRight();
            });
        });
    </script>
</body>
</html>