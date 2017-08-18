<?php
    session_start();
    include "include/configuration.php";
    include "include/general_functions.php";

    // if(!isset($_SESSION['authId']) || empty($_SESSION['authId'])){
    //     header("Location: sign-in.php");
    //     exit;
    // }

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
        #loading{
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
        }
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
        <input type="hidden" id="fixed-event-id" value="<?php echo $_GET['eid'] ?>">
        <input type="hidden" id="fixed-type" value="<?php echo $_GET['type'] ?>">
        <input type="hidden" id="fixed-book-from" value="<?php echo date("Y-m-d",strtotime($_GET['book-from'])) ?>">
        <input type="hidden" id="fixed-book-to" value="<?php echo date("Y-m-d",strtotime($_GET['book-to'])) ?>">
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
            <div style="float:left" id="loading-status">Reserving</div>
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
                            <div class="form-group">
                                <h2>Select Packages</h2>
                            </div>
                            <?php
                                $selPackages = "select * from client_event_packages where client_event_id = " . $_GET['eid'];
                                $rsPackages = mysqli_query($mysqli, $selPackages);
                                while($pkg = mysqli_fetch_assoc($rsPackages)):
                            ?>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <input data-id="<?php echo $pkg['id'] ?>" data-amount="<?php echo $pkg['amount'] ?>" data-title="<?php echo $pkg['name'] ?>" id="cb-pkg-<?php echo $pkg['id'] ?>" class="pkg-item" type="checkbox">
                                        <label for="cb-pkg-<?php echo $pkg['id'] ?>" class="txt-dark">
                                            <?php echo $pkg['name']; ?>
                                        </label>
                                    </div>
                                    <?php
                                        $selSupplier = "select * from client_suppliers inner join (clients inner join client_companies on client_companies.client_id = clients.id) on clients.id = client_suppliers.supplier_id where client_suppliers.client_event_package_id = " . $pkg['id'];
                                        $rsSupplier = mysqli_query($mysqli, $selSupplier);
                                        $supplierCount = mysqli_num_rows($rsSupplier);

                                        if ($supplierCount > 1) :
                                    ?> 
                                        <div class="form-group ml-30 group-supplier">
                                            <span>Select supplier:</span>
                                        <?php
                                            while($sup = mysqli_fetch_assoc($rsSupplier)):
                                        ?>
                                            <div data-id="<?php echo $pkg['id'] ?>">
                                                <input data-title="<?php echo $sup['name']; ?>" data-id="<?php echo $sup['id'] ?>" id="cb-sup-<?php echo $sup['id'] ?>" name="radio" type="radio" class="supplier-item">
                                                <label for="cb-sup-<?php echo $sup['id'] ?>">
                                                    <?php echo $sup['name']; ?>
                                                </label>
                                            </div>
                                        <?php endwhile; ?>
                                        </div>
                                    <?php elseif ($supplierCount == 1): ?>
                                        <?php
                                            $row = mysqli_fetch_assoc($rsSupplier);
                                            echo "<span class='supplier-item ml-30' data-id='" . $row['id'] . "'>Supplier: <span class='txt-dark'>" . $row['name'] . "</span></span>";
                                        ?>
                                    <?php else: ?>
                                        <span class="supplier-item ml-30" data-id="<?php echo $org['id'] ?>">Supplier: <span class='txt-dark'><?php echo $org['name']; ?></span></span>
                                    <?php endif; ?>
                                </div>
                                <hr style="border-top-color: #ddd" />
                            <?php endwhile; ?>
                            <div class="form-group">
                                <label for="txt-remarks">Remarks:</label>
                                <textarea class="form-control" id="txt-remarks"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3 col-sm-12 computed">
                        <div class="head"><h2>Booking Summary</h2></div>
                        <form>
                            <label>Packages:</label>
                            <div class="form-group">
                                <table class="table" id="table-pkg">
                                    
                                </table>
                            </div>
                            <hr class="style-one" />
                            <div class="form-group">
                                <table class="table">
                                    <tr>
                                        <td>TOTAL</td>
                                        <td align="right"><strong><span id="total">0</span></strong></td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                        <div style="margin: 15px -15px -15px;">
                            <button type="button" id="btn-book" class="btn-primary" style="width: 100%;padding: 0 22px;">Reserve Now</button>
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

            $(".pkg-item").on("click", function(){
                var id = $(this).data('id');
                var title = $(this).data('title');
                var amount = parseFloat($(this).data('amount'));

                var total = parseFloat($("#total").html());

                var html = '';
                if ($(this).is(":checked")) {
                    html = '<tr id="' + id + '"><td>' + title + '</td><td align="right"><strong>' + amount + '</strong></td></tr>';
                    $("#table-pkg").append(html);
                    $("#total").html(total + amount);
                } else {
                    $("#table-pkg tr#" + id).remove();
                    $("#total").html(total - amount);
                }
            });

            $(".supplier-item").on("click", function(){
                var pkgId = $(this).parent().data('id');
                $("#table-pkg tr#" + pkgId + " td:first span").remove();
                $("#table-pkg tr#" + pkgId + " td:first").append('<span class="sup">' + $(this).data('title') + '</span>');
            });

            $("#btn-book").on("click", function(){
                $("#loading-mask").show();
                $("#loading").show();

                var data = new Object();
                data.eid = $("#fixed-event-id").val();
                data.bookFrom = $("#fixed-book-from").val();
                data.bookTo = $("#fixed-book-to").val();
                data.total = parseFloat($("#total").html());
                data.remarks = $("#txt-remarks").val();
                data.formSummary = $(".computed form").html();

                var pkg = new Array();
                $(".pkg-item").each(function(){
                    if ($(this).is(":checked")) {
                        pkg.push($(this).data('id'));
                    }
                });
                data.packages = pkg;

                var sup = new Array();
                $(".supplier-item").each(function(){
                    if ($(this).is(":checked")) {
                        var d = new Object();
                        d.pkgId = $(this).parent().data('id');
                        d.supId = $(this).data('id');
                        sup.push(d);
                    }
                });
                data.suppliers = sup;

                $.ajax({
                    url: "_booking.php",
                    type: "post",
                    data: { action: "booking", params: data },
                    success: function(response){
                        var result = jQuery.parseJSON(response);
                        
                        if (result['status'] == 'success') {
                            $("#loading-status").html("Redirecting to submit.");
                            setTimeout(function(){
                                window.location.href = "booking-submit.php?type=" + $("#fixed-type").val() + "&eid=" + $("#fixed-event-id").val();
                                $("#loading-mask").hide();
                                $("#loading").hide();
                                $("#loading-status").html("Reserving");
                            },2000);
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>