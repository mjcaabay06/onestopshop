<?php
    session_start();
    include "include/configuration.php";
    include "include/general_functions.php";

    if(!isset($_SESSION['tempBookingId']) || empty($_SESSION['tempBookingId'])){
        header("Location: index.php");
        exit;
    }
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->
<head>
    <?php include('_head.php') ?>
    <style type="text/css">
        .table > tbody > tr > td{
            border-top: 0;
        }
        .checkbox input[type="checkbox"]{
            margin-left: 0;
        }
        .checkbox label{
            padding-left: 25px;
        }
        hr.style-one{
            border: 0;
            height: 2px;
            margin: 5px 0;
            background-image: -webkit-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.75),rgba(0,0,0,0));
            background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.75),rgba(0,0,0,0));
            background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.75),rgba(0,0,0,0));
            background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.75),rgba(0,0,0,0));
        }
        hr.style-two{
            border: 0;
            height: 3px;
            margin: 30px 0;
            background-image: -webkit-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.75),rgba(0,0,0,0));
            background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.75),rgba(0,0,0,0));
            background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.75),rgba(0,0,0,0));
            background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.75),rgba(0,0,0,0));
        }
        .computed{
            border: 1px solid #eee;
            background-color: #fff;
            padding: 15px;
        }
        .computed .head{
            background-color: #22272b;
            margin-top: -15px;
            margin-left: -15px;
            margin-right: -15px;
            text-align: center;
            padding: 15px;
            color: #fff;
            margin-bottom: 15px;
        }
        /*#loading{
            position:fixed;
            left:45%;
            top:40%;
            z-index:20001;
            height:auto;
            display:none;
            background-color:#FFF;
            padding:20px;
            -moz-box-shadow:0px 0px 2px 2px #DDD;
            -webkit-box-shadow:0px 0px 2px 2px #DDD;
            box-shadow:0px 0px 2px 2px #DDD
        }
        #loading-mask{
            position:fixed;
            left:0;
            top:0;
            width:100%;
            height:100%;
            z-index:20000;
            background-color:#FFF;
            opacity:0.8;
            display:none
        }*/
        #table-pkg span.sup {
            display: block;
            font-size: 12px;
            font-style: italic;
            margin-left: 25px;
        }
    </style>
</head>                                
<body>
    <div class="hidden">
        <input type="hidden" id="booking-id" value="<?php echo $_SESSION['tempBookingId'] ?>">
        <input type="hidden" id="client-id" value="<?php echo empty($_SESSION['authId']) ? 0 : $_SESSION['authId'] ?>">
    </div>
    
    <!-- Preloader -->
    <section class="loading-overlay">
        <div class="Loading-Page">
            <h2 class="loader">Loading</h2>
        </div>
    </section>

    <div id="loading-mask" style="display: none;"></div>
    <div id="loading" style="display: none;">
        <div class="loading-indicator">
            <div style="float:left" id="loading-status">Submitting</div>
            <div style="float:left">
                <img style="padding-left:10px" src="images/loading.gif">
            </div>
        </div>
    </div>
   

    <!-- Boxed --> 
    <div class="boxed position_form">
        
    <?php include("booking/_header.php"); ?>

        <!-- Iconbox -->
        <section class="flat-row bg-theme custom pt-40 pb-40 wrap-price-post">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <hr class="style-two" />
                        <form>
                            <div class="form-group">
                                It will redirect you to the home page in a short while. Thank you for booking on our site. Enjoy your event!
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </section>
        
        <!-- Footer -->
        <?php include("_footer.php"); ?><!-- footer -->

    </div><!-- Boxed -->

    <!-- Javascript -->
    <?php include("_footer-js.php"); ?>
    <script type="text/javascript">
        $(document).ready(function(){

            setTimeout(function(){
                <?php
                    unset($_SESSION["tempBookingId"]);
                    unset($_SESSION['formSummary']);
                    unset($_SESSION['eid']);
                ?>
                window.location.href = "index.php";
            },3000);
        });
    </script>
</body>
</html>