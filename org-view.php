<?php
    session_start();
    include "include/configuration.php";
    include "include/general_functions.php";

    // if(!isset($_SESSION['authId']) || empty($_SESSION['authId'])){
    //     header("Location: sign-in.php");
    //     exit;
    // }

    $bid = $_GET['id'];
    $selBooking = "select * from bookings inner join (clients inner join client_infos on client_infos.client_id = clients.id) on clients.id = bookings.customer_id inner join (client_events inner join event_types on event_types.id = client_events.event_type_id) on client_events.id = bookings.client_event_id where bookings.id = " . $bid;
    $rsBooking = mysqli_query($mysqli, $selBooking);
    $rowBooking = mysqli_fetch_assoc($rsBooking);
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->
<head>
    <?php include('_head.php') ?>
    <style type="text/css">
        .btn-sm{
            border-radius: 0;
            height: auto;
            padding: 11px 22px;
        }
    </style>
</head>                                
<body>
    <!-- Preloader -->
    <div id="loading-mask">
        <div id="loading">
            <div class="loading-indicator">
                <div style="float:left" id="loading-status">Updating</div>
                <div style="float:left">
                    <img style="padding-left:10px" src="images/loading.gif">
                </div>
            </div>
        </div>
    </div>

    <!-- Boxed --> 
    <div class="boxed position_form">
        
    <?php include("_header.php"); ?>

        <!-- Iconbox -->
        <section class="flat-row bg-theme custom pt-40 pb-40 wrap-price-post">
            <div class="container">
                <div class="row">
                    <input type="hidden" name="bid" value="<?php echo $_GET['id'] ?>">
                    <div class="col-md-10 col-md-offset-1 col-sm-12">
                        <div class="panel panel-default card-view">
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <form>
                                        <div class="form-group" style="padding-right: 22px">
                                            <label style="padding: 10px 22px; font-size: 2em" class="pull-left"><?php echo ucfirst($rowBooking['first_name']) . ' ' . ucfirst($rowBooking['last_name']) ?></label>
                                            <button id="btn-disapprove" type="button" class="btn btn-sm btn-danger pull-right">Disapprove</button> 
                                            <button id="btn-approve" type="button" class="btn btn-sm btn-success pull-right mr-10">Approve</button>
                                            <div class="clearfix"></div>
                                        </div>
                                        <hr class="style-two mt-10" />
                                        <div class="form-group" style="padding: 0 22px">
                                            <div id="alert-message"></div>
                                        </div> 
                                        <div class="form-group mb-50" style="padding: 0 22px">
                                            <p><strong>Remarks:</strong>&nbsp;<?php echo $rowBooking['remarks']; ?></p>
                                            <p><strong>Contact Number:</strong>&nbsp;<?php echo $rowBooking['mobile_number']; ?></p>
                                            <p><strong>Email Address:</strong>&nbsp;<?php echo $rowBooking['email_address']; ?></p>
                                        </div>
                                        <div class="form-group" style="text-align: center; font-size: 1.5em;" style="padding: 0 22px"><strong><?php echo strtoupper($rowBooking['type']) ?></strong></div>
                                        <?php
                                            $selSum = "select *, client_event_packages.name as pkg, client_companies.name as comp_name from booking_summaries inner join client_event_packages on client_event_packages.id = booking_summaries.client_event_package_id left join (clients inner join client_companies on client_companies.client_id = clients.id) on clients.id = booking_summaries.client_supplier_id where booking_summaries.booking_id = " . $bid;
                                            $rsSum = mysqli_query($mysqli, $selSum);
                                            $total = 0;
                                            while ($sum = mysqli_fetch_assoc($rsSum)) :
                                                $total += $sum['amount'];
                                        ?>
                                            <div class="form-group <?php echo $sum['client_supplier_id'] > 0 ? 'mb-0' : '' ?>" style="padding: 0 22px">
                                                <div class="col-md-4" style="text-align: right">
                                                    <label style="color: #000"><?php echo $sum['pkg']; ?></label>
                                                </div>
                                                <div class="col-md-4">
                                                    <hr class="style-one" style="margin-top: 13px;" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label style="color: #000"><?php echo $sum['amount']; ?></label>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <?php if($sum['client_supplier_id'] > 0): ?>
                                                <div class="col-md-6 col-md-offset-3">
                                                    <label class="ml-50" style="font-size: 13px; font-style: italic;">&bull;&nbsp;<?php echo $sum['comp_name'] ?></label>
                                                </div>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                        <div class="col-md-6 col-md-offset-3">
                                            <hr style="border-top-color: #bbb" />
                                        </div>
                                        <div class="form-group" style="padding: 0 22px">
                                            <div class="col-md-4" style="text-align: right">
                                                <label style="color: #000">Total</label>
                                            </div>
                                            <div class="col-md-4">
                                                <hr class="style-one" style="margin-top: 13px;" />
                                            </div>
                                            <div class="col-md-4">
                                                <label style="color: #000"><?php echo $rowBooking['total_amount']; ?></label>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
            $("#book-from").datepicker({autoclose: true});
            $("#book-to").datepicker({autoclose: true});
            $(".portfolio-filter.style1 li a:eq(0)").click();

            $("#btn-approve").on("click", function(){
                $("#loading-mask").show();
                var id = $("input[name=bid]").val();
                var data = new Object();
                data.id = id;

                $.ajax({
                    url: '_org-functions.php',
                    type: 'post',
                    data: { action: 'approve', params: data},
                    success: function(response){
                        $("#loading-mask").hide();
                        var result = jQuery.parseJSON(response);
                        if (result['status'] == 'success') {
                            $("#alert-message").html('<div class="alert alert-success">Booking request successfully approved.</div>');
                            setTimeout(function(){
                                window.location.href = "org-dashboard.php";
                            },1500);
                        }
                    }
                });
            });

            $("#btn-disapprove").on("click", function(){
                $("#loading-mask").show();
                var id = $("input[name=bid]").val();
                var data = new Object();
                data.id = id;

                $.ajax({
                    url: '_org-functions.php',
                    type: 'post',
                    data: { action: 'disapprove', params: data},
                    success: function(response){
                        $("#loading-mask").hide();
                        var result = jQuery.parseJSON(response);
                        if (result['status'] == 'success') {
                            $("#alert-message").html('<div class="alert alert-danger">Booking request successfully disapproved.</div>');
                            setTimeout(function(){
                                window.location.href = "org-dashboard.php";
                            },1500);
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>