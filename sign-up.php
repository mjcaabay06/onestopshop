<?php
    session_start();
    include "include/configuration.php";
?>
<?php
    include "src/Captcha/simple-php-captcha.php";
    $_SESSION['captcha'] = simple_php_captcha();
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
                                    <form method="post" action="_functions.php" id="form-sign-up">
                                        <input type="hidden" name="action" value="sign-up">
                                        <input type="hidden" name="client-type" value="">
                                        <div id="pan-signup" class="hidden">
                                            <div class="form-group text-center mb-40">
                                                <h6 style="font-size: 2em" class="txt-dark">Sign Up</h6>
                                            </div>
                                            <div class="form-group col-md-6 col-sm-12">
                                                <input type="text" name="tb-first-name" class="form-control txt-dark" placeholder="First name">
                                            </div>
                                            <div class="form-group col-md-6 col-sm-12">
                                                <input type="text" name="tb-last-name" class="form-control txt-dark" placeholder="Last name">
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <input type="text" name="tb-email" class="form-control txt-dark" placeholder="Email address">
                                            </div>
                                            <div class="form-group text-center">
                                                <button type="button" class="btn btn-primary btn-sm" id="btn-start">Get Started</button>
                                            </div>
                                        </div>
                                        <div id="pan-complete" class="">
                                            <div class="form-group text-center mb-40">
                                                <strong style="font-size: 2em" class="txt-dark">Complete your account</strong>
                                            </div>
                                            <div class="form-group text-center">
                                                <h2>email@address</h2>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="tb-mobile" maxlength="11" class="form-control txt-dark number-only" placeholder="Mobile number">
                                            </div>
                                            <div class="form-group mt-50">
                                                <h4 class="txt-dark text-center" class="font-weight:700">Choose password:</h4>
                                                <div class="radio radio-info col-sm-6">
                                                    <input name="radio" id="radio1" value="sys-gen" checked="" type="radio">
                                                    <label for="radio1">
                                                        System Generated
                                                    </label>
                                                </div>
                                                <div class="radio radio-info col-sm-6" style="margin-top: 10px">
                                                    <input name="radio" id="radio2" value="manual" type="radio">
                                                    <label for="radio2">
                                                        Manual Input
                                                    </label>
                                                </div>
                                                <div style="clear:both"></div>
                                            </div>
                                            <div id="panel-password" class="hidden">
                                                <div class="form-group">
                                                    <input type="password" class="form-control" name="tb-password" id="tb-password" placeholder="Password">
                                                    <div style="color: #cc0000; display: none" id="panel-error"></div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" class="form-control" id="tb-confirm-password" placeholder="Confirm Password">
                                                    <div style="color: #cc0000; display: none" id="panel-not-match">&bull; Password do not match.</div>
                                                </div>
                                            </div>
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
                                            <!-- <div class="form-group">
                                                <input type="password" name="tb-password" class="form-control txt-dark" placeholder="Create a password">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="tb-confirm-password" class="form-control txt-dark" placeholder="Confirm password">
                                            </div> -->
                                            
                                            <div class="form-group text-center mt-50">
                                                <h4 class="txt-dark text-center" class="font-weight:700">I want to:</h4>
                                                <div class="btn-group choice mt-10">
                                                    <button type="button" class="btn btn-default btn-sm btn-want" data-value="hire">
                                                        <span>Hire Organizer</span>
                                                    </button>
                                                    <button type="button" class="btn btn-default btn-sm btn-want" data-value="organizer">
                                                        <span>Organize</span>
                                                    </button>
                                                    <button type="button" class="btn btn-default btn-sm btn-want" data-value="supplier">
                                                        <span>Supply</span>
                                                    </button>
                                                </div>
                                                <div class="clear-fix"></div>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="tb-username" class="form-control txt-dark" placeholder="Username">
                                            </div>
                                            
                                            <div id="pan-organize" class="hidden">
                                                <div class="form-group">
                                                    <input type="text" name="tb-company" class="form-control txt-dark" placeholder="Company">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="tb-company-address" class="form-control txt-dark" placeholder="Company address">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="tb-company-number" class="form-control txt-dark number-only" maxlength="11" placeholder="Company mobile">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-10" for="img-captcha">Captcha</label>
                                                <br/>
                                                <input type="hidden" name="tb-hidden-captcha" value="<?php echo $_SESSION['captcha']['code'] ?>">
                                                <img src="<?php echo $_SESSION['captcha']['image_src'] ?>" id="img-captcha" >
                                                <input type="text" class="form-control mb-5" required="" name="tb-captcha" id="tb-captcha" placeholder="Enter captcha code">
                                                <div style="color: #cc0000; display: none" id="panel-captcha-error">Captcha failed. Please enter captcha code again.</div>
                                            </div>

                                            <div class="form-group text-center">
                                                <button type="button" class="btn btn-primary btn-sm" id="btn-submit">Submit</button>
                                            </div>
                                        </div>
                                    </form>
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
            $("#radio1").on('click', function(){
                if (!$("#panel-password").hasClass('hidden')) {
                    $("#panel-password").addClass('hidden');
                }
            });
            $("#radio2").on('click', function(){
                if ($("#panel-password").hasClass('hidden')) {
                    $("#panel-password").removeClass('hidden');
                }
            });

            $("#tb-password").focusout(function(){
                checkPassword();
            });
            $("#tb-confirm-password").focusout(function(){
                confirmPassword();
            });
            $("#tb-captcha").focusout(function(){
                if ($('input[name="tb-hidden-captcha"]').val().toLowerCase() != $('input[name="tb-captcha"]').val().toLowerCase()){
                    $("#tb-captcha").parent().addClass('has-error');
                    $("#panel-captcha-error").show();
                } else {
                    $("#tb-captcha").parent().removeClass('has-error');
                    $("#panel-captcha-error").hide();
                }
            });

            $(".btn-want").on("click", function(){
                var val = $(this).data('value');
                //console.log($(this).data('value'));
                if (val == 'organizer' || val == 'supplier') {
                    if ($("#pan-organize").hasClass('hidden')) {
                        $("#pan-organize").removeClass('hidden');
                    }
                } else {
                    if (!$("#pan-organize").hasClass('hidden')) {
                        $("#pan-organize").addClass('hidden');
                    }
                }

                $(".btn-want").removeClass('active');
                $(this).addClass('active');
                $("input[name=client-type]").val(val);
            });

            $("#btn-submit").on('click', function(){
                var errorCount = 0;

                $(".has-error").each(function(){
                    errorCount++;
                });

                if (!errorCount > 0) {
                    $("#form-sign-up").submit();
                }
            });
        });
    </script>
    <?php include('_common.php'); ?>
    
    <!-- AIzaSyAqhZnIdxz86zMpJOWRCrDR68r5Hzz4G8g -->
</body>
</html>