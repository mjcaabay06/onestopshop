<?php
    session_start();
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
    <div class="boxed">
        <?php include("_header.php"); ?>
        
        <!-- MAIN BODY -->
        <section class="flat-row bg-theme flat-error" style="padding: 65px 0 50px">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-wrapper">
                                <div class="panel-body" style="padding: 40px">
                                    <!-- <form method="post" action=""> -->
                                        <div class="form-group text-center mb-40">
                                            <h6 style="font-size: 2em" class="txt-dark">Activate your account.</h6>
                                        </div>
                                        <div id="panel-send-code">
                                            <div class="form-group">
                                                <div id="send-alert-message"></div>
                                            </div>   
                                            <div class="form-group">
                                                <label class="control-label mb-10 col-sm-12 text-left" style="padding: 0; text-transform: none" for="tb-password">Choose where you want to send your account code:</label>
                                                <div class="radio radio-info col-sm-6">
                                                    <input name="radio" id="radio1" value="via-sms" checked="" type="radio">
                                                    <label for="radio1" class="pl-10">
                                                        Via SMS
                                                    </label>
                                                </div>
                                                <div class="radio radio-info col-sm-6" style="margin-top: 10px">
                                                    <input name="radio" id="radio2" value="via-email" type="radio"">
                                                    <label for="radio2" class="pl-10">
                                                        Via Email Address
                                                    </label>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="form-group" id="panel-sms">
                                                <label class="hidden text-center control-label mb-10" style="text-transform: none" for="mobile-number">Verify mobile number</label>
                                                <input type="text" class="form-control number-only" maxlength="11" required="" id="mobile-number" placeholder="Mobile Number" value="<?php echo isset($_SESSION['mobile']) ? $_SESSION['mobile'] : '' ?>">
                                            </div>
                                            <div class="form-group hidden" id="panel-email">
                                                <label class="hidden text-center control-label mb-10" style="text-transform: none" for="email-address">Verify email address</label>
                                                <input type="email" class="form-control" required="" id="email-address" placeholder="Email Address" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : '' ?>">
                                            </div>
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary btn-sm pull-right" id="btn-send">Send</button>
                                            </div>
                                        </div>

                                        <div class="hidden" id="panel-activate">
                                            <div class="form-group">
                                                <div id="alert-message"></div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-10 col-sm-12 text-left" style="padding: 0; text-transform: none" for="tb-password">Enter your activation code here:</label>
                                                <div class="col-sm-2" style="padding: 0 10px">
                                                    <input type="text" class="form-control text-center ac-num number-only" maxlength="1" style="font-size: 20px;" >
                                                </div>
                                                <div class="col-sm-2" style="padding: 0 10px">
                                                    <input type="text" class="form-control text-center ac-num number-only" maxlength="1" style="font-size: 20px;" >
                                                </div>
                                                <div class="col-sm-2" style="padding: 0 10px">
                                                    <input type="text" class="form-control text-center ac-num number-only" maxlength="1" style="font-size: 20px;" >
                                                </div>
                                                <div class="col-sm-2" style="padding: 0 10px">
                                                    <input type="text" class="form-control text-center ac-num number-only" maxlength="1" style="font-size: 20px;" >
                                                </div>
                                                <div class="col-sm-2" style="padding: 0 10px">
                                                    <input type="text" class="form-control text-center ac-num number-only" maxlength="1" style="font-size: 20px;" >
                                                </div>
                                                <div class="col-sm-2" style="padding: 0 10px">
                                                    <input type="text" class="form-control text-center ac-num number-only" maxlength="1" style="font-size: 20px;" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary btn-sm pull-right" id="btn-activate">Activate</button>
                                            </div>
                                        </div>
                                    <!-- </form> -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- END MAIN BODY -->

        <?php include("_footer.php"); ?>
        
    </div><!-- Boxed -->

   <!-- Javascript -->
    <?php include("_footer-js.php"); ?>
    <script type="text/javascript">
        $(document).ready(function(){
            keyNumber();
            checkRadio();

            $('input[name="radio"]').on("change", function(){
                checkRadio();
            });

            $("#btn-send").on("click", function(){
                if ($("#radio1").is(':checked')) {
                    $(".loading-overlay").show();
                    $.ajax({
                        url: "_functions.php",
                        type: "post",
                        data: { action: "activation-sendsms", mobile: $("#mobile-number").val(), clientId: <?php echo $_SESSION['tempId'] ?>, password: "<?php echo $_SESSION['password'] ?>" },
                        success: function(response){
                            var result = jQuery.parseJSON(response);

                            if (result['status'] == 'success') {
                                $("#send-alert-message").html('<div class="alert alert-success">' + result['message'] + '</div>');
                                setTimeout(function(){
                                    if (!$("#panel-send-code").hasClass('hidden')) {
                                        $("#panel-send-code").addClass('hidden');
                                        $("#panel-activate").removeClass('hidden');
                                    }
                                    $("#send-alert-message").html('');
                                },1500);
                            } else {
                                $("#send-alert-message").html('<div class="alert alert-danger">' + result['message'] + '</div>');
                            }
                            $(".loading-overlay").hide();
                        }
                    });
                } else if ($("#radio2").is(':checked')) {
                    $(".loading-overlay").show();
                    $.ajax({
                        url: "_functions.php",
                        type: "post",
                        data: { action: "activation-sendemail", email: $("#email-address").val(), clientId: <?php echo $_SESSION['tempId'] ?>, password: "<?php echo $_SESSION['password'] ?>" },
                        success: function(response){
                            var result = jQuery.parseJSON(response);

                            if (result['status'] == 'success') {
                                $("#send-alert-message").html('<div class="alert alert-success">' + result['message'] + '</div>');
                                setTimeout(function(){
                                    if (!$("#panel-send-code").hasClass('hidden')) {
                                        $("#panel-send-code").addClass('hidden');
                                        $("#panel-activate").removeClass('hidden');
                                    }
                                    $("#send-alert-message").html('');
                                },1500);
                            } else {
                                $("#send-alert-message").html('<div class="alert alert-danger">' + result['message'] + '</div>');
                            }
                            $(".loading-overlay").hide();
                        }
                    });
                }
                
            });

            $("#btn-activate").on("click", function(){
                $(".loading-overlay").show();
                var acnum = '';
                $(".ac-num").each(function(){
                    acnum += $(this).val();
                });
                $.ajax({
                    url: "_functions.php",
                    type: "post",
                    data: { action: "activate", code: acnum, clientId: <?php echo $_SESSION['tempId'] ?> },
                    success: function(response){
                        var result = jQuery.parseJSON(response);

                        if (result['status'] == 'success') {
                            $("#alert-message").html('<div class="alert alert-success">' + result['message'] + '</div>');
                            setTimeout(function(){
                                <?php session_destroy(); ?>
                                window.location.href = 'sign-in.php';
                            },1500);
                        } else {
                            $("#alert-message").html('<div class="alert alert-danger">' + result['message'] + '</div>');
                        }
                        $(".loading-overlay").hide();
                    }
                });
            });
        });
        function checkRadio() {
            if ($("#radio1").is(':checked')) {
                if ($("#panel-sms").hasClass('hidden')) {
                    $("#panel-sms").removeClass('hidden');
                    $("#panel-email").addClass('hidden');
                }
            }
            if ($("#radio2").is(':checked')) {
                if ($("#panel-email").hasClass('hidden')) {
                    $("#panel-email").removeClass('hidden');
                    $("#panel-sms").addClass('hidden');
                }
            }
        }
    </script>
    <?php include('_common.php'); ?>
    
    <!-- AIzaSyAqhZnIdxz86zMpJOWRCrDR68r5Hzz4G8g -->
</body>
</html>