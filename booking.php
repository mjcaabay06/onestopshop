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
        
    <?php include("booking/_header.php"); ?>

        <!-- Iconbox -->
        <section class="flat-row bg-theme custom pt-40 pb-40 wrap-price-post">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="portfolio-filter style1">
                            <?php 
                                $selEventType = "select * from event_types";
                                $rsEventType = mysqli_query($mysqli, $selEventType);
                                $cnt = 0;

                                while($event = mysqli_fetch_assoc($rsEventType)):
                            ?>
                                <li <?php echo $cnt == 0 ? "class='active'" : '' ?>><a data-filter=".<?php echo strtolower($event['type']) ?>" data-id="<?php echo $event['id'] ?>" href="#"><?php echo $event['type'] ?></a></li>
                            <?php $cnt++; endwhile; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="portfolio style2">
                    <div class="portfolio-wrap clearfix">
                        <?php
                            $bookFrom = date("Y-m-d",strtotime($_GET['book-from']));
                            $bookTo = date("Y-m-d",strtotime($_GET['book-to']));
                            
                            $available = "select *, client_companies.id as ccid, client_events.id as eid from client_events inner join (clients inner join client_companies on client_companies.client_id = clients.id inner join client_infos on client_infos.client_id = clients.id) on clients.id = client_events.client_id where client_events.id not in (select client_event_id from bookings where status_id = 1 and ((date_from BETWEEN '" . $bookFrom . "' and '" . $bookTo . "') or (date_to BETWEEN '" . $bookFrom . "' and '" . $bookTo . "')))";
                            $rsAvailable = mysqli_query($mysqli, $available);
                            while ($avl = mysqli_fetch_assoc($rsAvailable)) :
                        ?>
                            <?php
                                $selType = "select * from event_types where id = " . $avl['event_type_id'];
                                $rsType = mysqli_query($mysqli, $selType);
                                $type = mysqli_fetch_assoc($rsType);
                            ?>
                            <div class="item <?php echo strtolower($type['type']); ?>" data-id="<?php echo $avl['eid'] ?>">
                                <article class="entry ">
                                    <div class="featured-post">
                                        <a href="#"><img src="images/portfolio/1.jpg" alt="image"></a>
                                    </div>
                                    <div class="entry-post">
                                        <h3 class="entry-title"><a href="#"><?php echo $avl['name'] ?></a></h3>
                                        <div class="entry-author">
                                            <span>by<a href="#"> <?php echo $avl['first_name'] . ' ' . $avl['last_name'] ?></a></span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div><!-- entry-post -->
                                </article>
                            </div>
                        <?php endwhile ?>

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