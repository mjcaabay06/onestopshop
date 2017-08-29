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
    <style type="text/css">
        .rside .head{
            margin: -17px -17px 15px -17px;
            color: #fff;
            background-color: #22272b;
            text-align: center;
            padding: 15px;
        }
        .rside .head.approved{
            background-color:  #37a000
        }
        .rside .head.disapproved{
            background-color: #ea6c41
        }
        .rside .item{
            margin: 0 -15px;
            padding: 15px;
            background-color: #ebeef0;
            border-bottom: 1px solid #fff;
            
        }
        .rside .item,
        .rside .item label{
            cursor: pointer;
        }
        .rside .item:hover{
            background-color: #d7dadc
        }
        .rside .item .name{
            color: #000;
        }
        .rside .item .event{
            font-size: 12px;
            color: #008329;
            font-style: italic;
        }
        .rside .item .date{
            text-align: center;
            font-size: 12px;
        }
        .rside .no-record{
            font-style: italic;
            text-align: center;
        }
    </style>
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
        
    <?php include("booking/_header.php"); ?>

        <!-- Iconbox -->
        <section class="flat-row bg-theme custom pt-40 pb-40 wrap-price-post">
            <div class="container">
                <div class="row">
                    <!-- <div class="col-md-9 col-sm-12">
                        <div class="panel panel-default card-view">
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <div class="calendar-wrap mt-40">
                                      <div id="calendar" class="fc fc-unthemed fc-ltr"></div>
                                    </div>

                                </div>
                            </div>
                        </div>  
                    </div> -->
                    <div class="col-md-4 col-sm-12 rside">
                        <div class="panel panel-default card-view">
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <div class="head"><h2>Request Booking</h2></div>
                                    <form>
                                        <?php
                                            $id = 26;
                                            $selBooking = "select * from bookings inner join (clients inner join client_infos on client_infos.client_id = clients.id) on clients.id = bookings.customer_id inner join (client_events inner join event_types on event_types.id = client_events.event_type_id) on client_events.id = bookings.client_event_id where bookings.approval_type_id = 3 and client_events.client_id = " . $id . " order by bookings.created_at";
                                            $rsBooking = mysqli_query($mysqli, $selBooking);
                                            $cntBooking = mysqli_num_rows($rsBooking);

                                            if ($cntBooking > 0):
                                        ?>
                                            <?php while($book = mysqli_fetch_assoc($rsBooking)): ?>
                                                <div class="item">
                                                    <label class="pull-left name"><?php echo $book['last_name'] . ', ' . $book['first_name'] ?></label>
                                                    <label class="pull-right event"><?php echo $book['type'] ?></label>
                                                    <div class="clearfix"></div>
                                                    <div class="date"><?php echo date("M j, Y",strtotime($book['date_from'])) . ' - ' . date("M j, Y",strtotime($book['date_to'])) ?></div>
                                                </div>
                                            <?php endwhile; ?>
                                        <?php else: ?>
                                            <div class="no-record">No booking yet.</div>
                                        <?php endif ?>
                                    </form>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="col-md-4 col-sm-12 rside">
                        <div class="panel panel-default card-view">
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <div class="head approved"><h2>Approved Booking</h2></div>
                                    <form>
                                        <?php
                                            $selBooking = "select * from bookings inner join (clients inner join client_infos on client_infos.client_id = clients.id) on clients.id = bookings.customer_id inner join (client_events inner join event_types on event_types.id = client_events.event_type_id) on client_events.id = bookings.client_event_id where bookings.approval_type_id = 1 and client_events.client_id = " . $id . " order by bookings.created_at";
                                            $rsBooking = mysqli_query($mysqli, $selBooking);
                                            $cntBooking = mysqli_num_rows($rsBooking);

                                            if ($cntBooking > 0):
                                        ?>
                                            <?php while($book = mysqli_fetch_assoc($rsBooking)): ?>
                                                <div class="item">
                                                    <label class="pull-left name"><?php echo $book['last_name'] . ', ' . $book['first_name'] ?></label>
                                                    <label class="pull-right event"><?php echo $book['type'] ?></label>
                                                    <div class="clearfix"></div>
                                                    <div class="date"><?php echo date("M j, Y",strtotime($book['date_from'])) . ' - ' . date("M j, Y",strtotime($book['date_to'])) ?></div>
                                                </div>
                                            <?php endwhile; ?>
                                        <?php else: ?>
                                            <div class="no-record">No booking yet.</div>
                                        <?php endif ?>
                                    </form>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="col-md-4 col-sm-12 rside">
                        <div class="panel panel-default card-view">
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <div class="head disapproved"><h2>Disapproved Booking</h2></div>
                                    <form>
                                        <?php
                                            $selBooking = "select * from bookings inner join (clients inner join client_infos on client_infos.client_id = clients.id) on clients.id = bookings.customer_id inner join (client_events inner join event_types on event_types.id = client_events.event_type_id) on client_events.id = bookings.client_event_id where bookings.approval_type_id = 2 and client_events.client_id = " . $id . " order by bookings.created_at";
                                            $rsBooking = mysqli_query($mysqli, $selBooking);
                                            $cntBooking = mysqli_num_rows($rsBooking);

                                            if ($cntBooking > 0):
                                        ?>
                                            <?php while($book = mysqli_fetch_assoc($rsBooking)): ?>
                                                <div class="item">
                                                    <label class="pull-left name"><?php echo $book['last_name'] . ', ' . $book['first_name'] ?></label>
                                                    <label class="pull-right event"><?php echo $book['type'] ?></label>
                                                    <div class="clearfix"></div>
                                                    <div class="date"><?php echo date("M j, Y",strtotime($book['date_from'])) . ' - ' . date("M j, Y",strtotime($book['date_to'])) ?></div>
                                                </div>
                                            <?php endwhile; ?>
                                        <?php else: ?>
                                            <div class="no-record">No booking yet.</div>
                                        <?php endif ?>
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

            $(".item").on('click', function(){
                var eid = $(this).data('id');
                var type = $(".portfolio-filter.style1 li.active a").data('id');
                var bookFrom = $("#book-from").val();
                var bookTo= $("#book-to").val();
                window.location.href = "booking-customize.php?type=" + type + "&book-from=" + bookFrom + "&book-to=" + bookTo + "&eid=" + eid;
            });
        });
    </script>
</body>
</html>