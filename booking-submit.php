<?php
    session_start();
    include "include/configuration.php";
    include "include/general_functions.php";

    if(!isset($_SESSION['tempBookingId']) || empty($_SESSION['tempBookingId'])){
        header("Location: index.php");
        exit;
    }

    $selOrg = "select * from client_events inner join (clients inner join client_infos on client_infos.client_id = clients.id inner join client_companies on client_companies.client_id = clients.id) on clients.id = client_events.client_id where client_events.id = " . $_GET['eid'];
    $rsOrg = mysqli_query($mysqli, $selOrg);
    $org = mysqli_fetch_assoc($rsOrg);
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
                    <div class="col-md-9 col-sm-12">
                        <div class="title-section mb-10" style="text-align: left">
                            <h1 class="title" style="font-family: inherit"><?php echo $org['name']; ?></h1>
                            <div class="sub-title">
                                <?php echo $org['description']; ?>
                            </div>
                            <span><i class="fa fa-phone mr-10"></i><?php echo $org['mobile_number'] ?></span>
                            <span class="ml-20"><i class="fa fa-map-marker mr-10"></i><?php echo $org['address'] ?></span>
                            
                        </div>
                        <hr class="style-two" />
                        <form>
                            <?php if (empty($_SESSION['authId'])) : ?>
                            <div class="form-group">
                                You need to <a href="sign-in.php" style="color: #62ade0;font-weight: bold;text-decoration: underline;">login</a> first for you to able to submit your booking. If you don't have account yet, please <a href="sign-up.php" style="color: #62ade0;font-weight: bold;text-decoration: underline;">register</a>.
                            </div>
                            <?php else: ?>
                                <div class="form-group">
                                    On more click away to book your request. Thank you!
                                </div>
                            <?php endif; ?>
                        </form>
                    </div>
                    <div class="col-md-3 col-sm-12 computed">
                        <div class="head"><h2>Booking Summary</h2></div>
                        <form>
                            <?php echo $_SESSION['formSummary'] ?>
                        </form>
                        <div style="margin: 15px -15px -15px;">
                            <button <?php echo empty($_SESSION['authId']) ? 'disabled' : '' ?> type="button" id="btn-book" class="btn-primary" style="width: 100%;padding: 0 22px;">Submit Now</button>
                        </div>
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

            $("#btn-book").on("click", function(){
                $("#loading-mask").show();
                $("#loading").show();

                // var bookingId = $("#booking-id").val();
                // var clientId = $("#client-id").val();

                $.ajax({
                    url: "_booking.php",
                    type: "post",
                    data: { action: "up-booking" },
                    success: function(response){
                        var result = jQuery.parseJSON(response);
                        
                        if (result['status'] == 'success') {
                            window.location.href = "booking-success.php";
                        }

                        $("#loading-mask").hide();
                        $("#loading").hide();
                    }
                });
            });
        });
    </script>
</body>
</html>