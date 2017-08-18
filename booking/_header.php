<style type="text/css">
    .top{
        padding: 0
    }

    #form-check .form-group{
        margin: 0;
    }
    #form-check .form-group input{

    }
    #form-check .form-group input,
    #form-check .form-group button {
        margin: 9px 0 0;
        height: 40px !important;
    }
    #form-check .form-group button{
        line-height: 15px;
    }
</style>
<div class="top top-style2">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="col-md-2">
                    <a href="index.php"><img src="images/logo-footer.png" /></a>
                </div>
                <div class="col-md-10">
                    <?php if(!empty($_SESSION['tempBookingId']) && strtolower(basename($_SERVER['PHP_SELF'])) == 'booking-customize.php'): ?>
                        <form id="form-check" action="booking.php" method="get">
                            <div class="form-group col-md-4 col-sm-12" style="padding: 0 2px">
                                <input type="text" id="book-from" class="text-center" name="book-from" placeholder="Start Date" style="height: auto;padding: 11px 10px;" value="<?php echo empty($_GET['book-from']) ? '' :  $_GET['book-from'] ?>" />
                            </div>
                            <div class="form-group col-md-4 col-sm-12" style="padding: 0 2px">
                                <input type="text" id="book-to" class="text-center" name="book-to" placeholder="End Date" style="height: auto;padding: 11px 10px;" value="<?php echo empty($_GET['book-to']) ? '' :  $_GET['book-to'] ?>" />
                            </div>
                            <div class="form-group col-md-4 col-sm-12" style="width: auto; padding: 0 2px">
                                <button type="submit" class="btn-primary">Search</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    <?php endif; ?>
                </div>
                
            </div><!-- col-md-8 -->
        </div><!-- row -->
    </div><!-- container -->
</div><!-- top -->
