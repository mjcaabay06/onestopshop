<?php
    include "include/configuration.php";
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
                                            <h6 style="font-size: 2em" class="txt-dark">Need help with your password?</h6>
                                        </div>
                                        <div class="form-group">
                                            <div  id="alert-message"></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" required="" id="email-address" placeholder="Email Address">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10 col-sm-12 text-left" style="padding: 0; text-transform: none" for="tb-password">Choose on how you want to recovery your password:</label>
                                            <div class="radio radio-info col-sm-6">
                                                <input name="radio" id="radio1" value="via-sms" checked="" type="radio">
                                                <label for="radio1" class="pl-10">
                                                    Via One-Time Password
                                                </label>
                                            </div>
                                            <div class="radio radio-info col-sm-6" style="margin-top: 10px">
                                                <input name="radio" id="radio2" value="via-email" type="radio">
                                                <label for="radio2" class="pl-10">
                                                    Via Secret Question
                                                </label>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group hidden" id="panel-sms">
                                            <label class="text-center control-label mb-10" style="text-transform: none" for="mobile-number">Verify mobile number</label>
                                            <input type="text" class="form-control" required="" id="mobile-number" placeholder="Mobile Number">
                                        </div>
                                        <div class="hidden" id="panel-secret">
                                            <div class="form-group">
                                                <label class="control-label mb-10" for="sel-secret-question">Secret Question</label>
                                                <select class="form-control mb-10" name="sel-secret-question" id="sel-secret-question">
                                                    <?php
                                                        $selectSecretQuestion = "Select * From secret_questions";
                                                        $rsSecretQuestion = mysqli_query($mysqli, $selectSecretQuestion);

                                                        while($sq = mysqli_fetch_assoc($rsSecretQuestion)):
                                                    ?>
                                                        <option value="<?php echo $sq['id'] ?>"><?php echo $sq['question'] ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                                <input type="text" class="form-control" required="" name="tb-answer" id="tb-answer" placeholder="Your answer">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-sm pull-right" id="btn-send">Send</button>
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
                        data: { action: "recoverpass-sms", email: $("#email-address").val(), mobile: $("#mobile-number").val() },
                        success: function(response){
                            var result = jQuery.parseJSON(response);

                            $("#alert-message").html('');
                            if (result["status"]) {
                                $("#alert-message").html('<div class="alert alert-success">' + result['message'] + '</div>');
                                setTimeout(function(){
                                    window.location.href = 'sign-in.php';
                                },1500);
                            } else {
                                $("#alert-message").html('<div class="alert alert-danger">' + result['message'] + '</div>');
                            }
                            $(".loading-overlay").hide();
                        }
                    });
                } else if ($("#radio2").is(':checked')) {
                    $(".loading-overlay").show();
                    $.ajax({
                        url: "_functions.php",
                        type: "post",
                        data: { action: "recoverpass-email", email: $("#email-address").val(), secretQuestion: $("#sel-secret-question").val(), answer: $("#tb-answer").val() },
                        success: function(response){
                            var result = jQuery.parseJSON(response);

                            $("#alert-message").html('');
                            if (result["status"]) {
                                $("#alert-message").html('<div class="alert alert-success">' + result['message'] + '</div>');
                                setTimeout(function(){
                                    window.location.href = 'sign-in.php';
                                },1500);
                            } else {
                                $("#alert-message").html('<div class="alert alert-danger">' + result['message'] + '</div>');
                            }
                            $(".loading-overlay").hide();
                        }
                    });
                }
            });
        });
        function checkRadio() {
            if ($("#radio1").is(':checked')) {
                if ($("#panel-sms").hasClass('hidden')) {
                    $("#panel-sms").removeClass('hidden');
                    $("#panel-secret").addClass('hidden');
                }
            }
            if ($("#radio2").is(':checked')) {
                if ($("#panel-secret").hasClass('hidden')) {
                    $("#panel-secret").removeClass('hidden');
                    $("#panel-sms").addClass('hidden');
                }
            }
        }
    </script>
    <?php include('_common.php'); ?>
    
    <!-- AIzaSyAqhZnIdxz86zMpJOWRCrDR68r5Hzz4G8g -->
</body>
</html>