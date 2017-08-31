<?php
    session_start();
    include "include/configuration.php";
    include "include/general_functions.php";

    // if(!isset($_SESSION['authId']) || empty($_SESSION['authId'])){
    //     header("Location: sign-in.php");
    //     exit;
    // }
    $selCom = "select client_companies.* from client_companies inner join (clients inner join client_infos on client_infos.client_id = clients.id) on clients.id = client_companies.client_id where client_companies.id = " . $_GET['comid'];
    $rsCom = mysqli_query($mysqli, $selCom);
    $com = mysqli_fetch_assoc($rsCom);

    
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->
<head>
    <?php include('_head.php') ?>
    <style type="text/css">
        .wrap{
            box-shadow: 0px 1px 2px 0px #ddd;
            background-color: #f5f8fa
        }
        .wrap h3{
            font-size: 20px;
            line-height: 26px;
            color: #22272b;
            text-transform: uppercase;
            font-weight: 700;
            margin-bottom: 8px
        }
        .wrap h6{
            font-size: 16px;
            font-weight: 500;
            line-height: 26px;
            color: #22272b;
            margin-bottom: 11px;
        }
        .wrap p{
            font-size: 16px;
            color: #6f787f;
        }

        .table-body .table > thead > tr > th,
        .table-body .table > tbody > tr > td{
            font-size: 14px;
        }

        .table-body .table > tbody{
            background-color: #fff;
        }
        .table-body .table > tbody > tr > td{
            border-top-color: #f5f8fa
        }

    </style>
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
                            <button type="button" class="control_next">></button>
                            <button type="button" class="control_prev"><</button>
                            <ul>
                                <?php
                                    $dir = 'uploads/' . $com['client_id'] . '/company';
                                    $comImg = array_diff(scandir($dir), array('..','.'));
                                    foreach($comImg as $img):
                                ?>
                                    <li><img src="<?php echo $dir . '/' . $img ?>" ></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <!-- <div class="flex-viewport">
                            <ul class="slides">
                                <li><a href="#"><img src="images/course/details/1.jpg" alt="image"></a></li>
                                <li><a href="#"><img src="images/course/details/1.jpg" alt="image"></a></li>
                                <li><a href="#"><img src="images/course/details/1.jpg" alt="image"></a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>

        <section class="flat-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <?php
                            $selEvent = "select *, client_events.id as ceid from client_events inner join event_types on event_types.id = client_events.event_type_id where client_events.client_id =" . $com['client_id'] . " order by event_types.type";
                            $rsEvent = mysqli_query($mysqli, $selEvent);
                            while ($event = mysqli_fetch_assoc($rsEvent)):
                        ?>
                            <div class="col-sm-12 mb-50">
                                <div class="wrap">
                                    <div class="col-sm-8">
                                        <div class="pt-20 pb-20">
                                            <section>
                                                <h3><?php echo $event['type'] ?></h3>
                                            </section>
                                            <section>
                                                <p><?php echo $event['description'] ?></p>
                                            </section>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="row">
                                            <img src="uploads/<?php echo $com['client_id'] ?>/events/<?php echo $event['ceid'] ?>/thumbnail.jpg" alt="image" />
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <hr class="style-one mb-20 mt-20" />
                                    </div>
                                    <?php
                                        $selPkg = "select * from client_event_packages where client_event_id = " . $event['ceid'] . " order by name";
                                        $rsPkg = mysqli_query($mysqli, $selPkg);
                                        while ($pkg = mysqli_fetch_assoc($rsPkg)):
                                    ?>
                                        <div class="col-sm-12" style="padding: 0 15px 15px 15px">
                                            <h6><?php echo $pkg['name'] ?></h6>
                                            <div class="table-body" style="padding: 0">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>SUPPLIER</th>
                                                            <th>Price</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $selSupplier = "select client_suppliers.price, client_companies.name from client_suppliers inner join client_event_packages on client_event_packages.id = client_suppliers.client_event_package_id inner join client_companies on client_companies.client_id = client_suppliers.supplier_id where client_suppliers.client_event_package_id = " . $pkg['id'];
                                                            $rsSupplier = mysqli_query($mysqli, $selSupplier);
                                                            while ($supplier = mysqli_fetch_assoc($rsSupplier)):
                                                        ?>
                                                            <tr>
                                                                <td class="text-left"><?php echo $supplier['name'] ?></td>
                                                                <td><?php echo $supplier['price'] ?></td>
                                                            </tr>
                                                        <?php endwhile; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                    

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <div class="col-md-4">
                        <section style="text-align: center;" class="mb-10">
                            <span><i class="fa fa-phone mr-10"></i><?php echo $com['mobile_number'] ?></span>
                            <span class="ml-20"><i class="fa fa-map-marker mr-10"></i><?php echo $com['address'] ?></span>
                        </section>
                        <form class="rpanel dark">
                            <input type="hidden" name="comid" value="<?php echo $_GET['comid'] ?>">
                            <div class="head">
                                <h2>Book Now</h2>
                            </div>
                            <div class="body">
                                <div class="form-group">
                                    <select class="form-control" name="sel-event">
                                        <?php
                                            $selEventBook = "select event_types.*, client_events.id as cid from client_events inner join (clients inner join client_companies on client_companies.client_id = clients.id) on clients.id = client_events.client_id inner join event_types on event_types.id = client_events.event_type_id where client_companies.id = " . $_GET['comid'] . " order by event_types.type";
                                            $rsEventBook = mysqli_query($mysqli, $selEventBook);
                                            while ($eventBook = mysqli_fetch_assoc($rsEventBook)):
                                        ?>
                                            <option value="<?php echo $event['cid'] ?>"><?php echo $eventBook['type'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="book-from" class="text-center withdatepicker mb-0" placeholder="Start Date">
                                </div>
                                <div class="form-group mb-0">
                                    <input type="text" name="book-to" class="text-center withdatepicker mb-0" placeholder="End Date">
                                </div>
                            </div>
                            <div class="footer">
                                <button class="btn-primary">Reserve Now</button>
                            </div>
                        </form>
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

            $(".withdatepicker").datepicker({autoclose: true});

            var slideCount = $('#slider ul li').length;
            var slideWidth = $('#slider ul li').width();
            var slideHeight = $('#slider ul li').height();
            var sliderUlWidth = slideCount * slideWidth;

            $('#slider').css({ width: slideWidth, height: slideHeight });

            $('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });

            $('#slider ul li:last-child').prependTo('#slider ul');

            // $("#slider img").css({ marginLeft: - slideWidth });

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