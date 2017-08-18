<?php
    session_start();
    include "include/configuration.php";
    include "include/general_functions.php";

    // if(!isset($_SESSION['authId']) || empty($_SESSION['authId'])){
    //     header("Location: sign-in.php");
    //     exit;
    // }
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->
<head>
    <?php include('_head.php') ?>
</head>                                
<body>
    <!-- Preloader -->
    <section class="loading-overlay">
        <div class="Loading-Page">
            <h2 class="loader">Loading</h2>
        </div>
    </section> 

    <!-- Boxed --> 
    <div class="boxed position_form">
        

        <section class="module parallax parallax-1">
            <?php include("_header.php"); ?>
            <div class="container" style="margin-top: 200px">
                <div class="col-sm-10 col-sm-offset-1">
                    <form method="get" action="booking.php" style="padding-left: 50px;">
                        <div class="form-group col-md-4 col-sm-12" style="padding: 0 2px">
                            <input type="text" id="book-from" class="text-center" name="book-from" placeholder="Start Date" style="height: auto;padding: 11px 10px;" />
                        </div>
                        <div class="form-group col-md-4 col-sm-12" style="padding: 0 2px">
                            <input type="text" id="book-to" class="text-center" name="book-to" placeholder="End Date" style="height: auto;padding: 11px 10px;" />
                        </div>
                        <div class="form-group col-md-4 col-sm-12" style="width: auto; padding: 0 2px">
                            <button type="submit">Book Now</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </section>

        <!-- Iconbox -->
        <section class="flat-row bg-theme custom pt-40 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <strong style="font-size: 1.5em">Events</strong>
                        <span class="droplets"></span>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12" style="padding: 0 5px">
                        <div class="img-holder" style="background-image: url('images/events/birthday.png')"></div>
                        <h2 class="text-center mt-15">Birthday</h2>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12" style="padding: 0 5px">
                        <div class="img-holder" style="background-image: url('images/events/anniversary.png')"></div>
                        <h2 class="text-center mt-15">Anniversary</h2>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12" style="padding: 0 5px">
                        <div class="img-holder" style="background-image: url('images/events/reunion.jpg')"></div>
                        <h2 class="text-center mt-15">Re-union</h2>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12" style="padding: 0 5px">
                        <div class="img-holder" style="background-image: url('images/events/wedding.jpg')"></div>
                        <h2 class="text-center mt-15">Wedding</h2>
                    </div>
                </div>
            </div>
        </section>
        
        <?php include("_popular-organizers.php"); ?>
        
        <!-- Footer -->
        <?php include("_footer.php"); ?><!-- footer -->

    </div><!-- Boxed -->

    <!-- Javascript -->
    <?php include("_footer-js.php"); ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#book-from").datepicker({autoclose: true});
            $("#book-to").datepicker({autoclose: true});
        });
    </script>
</body>
</html>