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
                                        <div class="form-group text-center mb-40">
                                            <h6 style="font-size: 2em" class="txt-dark">Need help with your password?</h6>
                                        </div>
                                        <div class="form-group" id="alert-message">
                                        </div>


                                        <div class="form-group">
                                            <input type="text" name="tb-username" class="form-control txt-dark" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="tb-password" class="form-control txt-dark" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-sm pull-right">Sign In</button>
                                            <a href="forgot-password.php" class="pull-left" style="color: #62ade0">Forgot password?</a>
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
        <!-- END MAIN BODY -->

        <?php include("_footer.php"); ?>
        
    </div><!-- Boxed -->

   <!-- Javascript -->
    <?php include("_footer-js.php"); ?>
    
    <!-- AIzaSyAqhZnIdxz86zMpJOWRCrDR68r5Hzz4G8g -->
</body>
</html>