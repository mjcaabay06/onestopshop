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
                                    <form method="post" action="">
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
                                                <input type="text" name="tb-mobile" class="form-control txt-dark" placeholder="Mobile number">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="tb-password" class="form-control txt-dark" placeholder="Create a password">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="tb-confirm-password" class="form-control txt-dark" placeholder="Confirm password">
                                            </div>
                                            <div class="form-group text-center mt-50">
                                                <h4 class="txt-dark text-center" class="font-weight:700">I want to:</h4>
                                                <div class="btn-group choice mt-10">
                                                    <button type="button" class="btn btn-default btn-sm">
                                                        <span>Hire Organizer</span>
                                                    </button>
                                                    <button type="button" class="btn btn-default btn-sm">
                                                        <span>Organize</span>
                                                    </button>
                                                    <button type="button" class="btn btn-default btn-sm">
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
    
    <!-- AIzaSyAqhZnIdxz86zMpJOWRCrDR68r5Hzz4G8g -->
</body>
</html>