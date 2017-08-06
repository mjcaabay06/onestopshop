<?php
    session_start();
    include "include/configuration.php";
    include "include/general_functions.php";

    if(!isset($_SESSION['authId']) || empty($_SESSION['authId'])){
        header("Location: sign-in.php");
        exit;
    }
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
        <?php include("_header.php"); ?>

        <div id="rev_slider_1078_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container slider_styles space-left space-top" data-alias="classic4export" data-source="gallery" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
                <!-- START REVOLUTION SLIDER 5.3.0.2 auto mode -->
                <div id="rev_slider_1078_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.3.0.2">
                    <div class="slotholder"></div>
                    <ul><!-- SLIDE  -->
                
                        <!-- SLIDE 1 -->
                        <li data-index="rs-3049" data-transition="slideremovedown" data-slotamount="7" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"    data-rotate="0"  data-saveperformance="off"  data-title="Ken Burns" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">                        

                            <!-- MAIN IMAGE -->
                            <img src="images/slides/slides1.jpg"  alt=""  data-bgposition="center center" data-kenburns="off" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                            <!-- LAYERS -->

                            <!-- LAYER NR. 12 -->
                            <div class="tp-caption title-slide" 
                                id="slide-3049-layer-1" 
                                data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']" 
                                data-y="['middle','middle','middle','middle']" data-voffset="['-77','-77','-77','-77']" 
                                data-fontsize="['72','72','45','35']"
                                data-lineheight="['60','60','45','35']"
                                data-fontweight="['700','700','700','700']"
                                data-width="none"
                                data-height="none"
                                data-whitespace="nowrap"
                     
                                data-type="text" 
                                data-responsive_offset="on"                             

                                data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'

                                data-textAlign="['left','left','left','left']"
                                data-paddingtop="[18,18,18,18]"
                                data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0"
                                data-paddingleft="[0,0,0,0]"

                                style="z-index: 16; white-space: nowrap;text-transform:left;"><span>FREE ONLINE COURSES FROM THE WORLD'S BEST</span><br>UNIVERSITIES
                            </div>

                            <!-- LAYER NR. 13 -->
                            <div class="tp-caption sub-title" 
                                id="slide-3049-layer-4" 
                                data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']" 
                                data-y="['middle','middle','middle','middle']" data-voffset="['55','55','0','0']"
                                data-fontsize="['16',16','14','14']" 
                                data-fontweight="['300','300','300','300']"
                                data-width="660"
                                data-height="none"
                                data-lineheight="['16','16','16','16']"
                                data-whitespace="nowrap"
                     
                                data-type="text" 
                                data-responsive_offset="on" 

                                data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                                data-textAlign="['left','left','left','left']"
                                data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]"

                                style="z-index: 17; white-space: nowrap;text-transform:left;">Education is the most powerful weapon which you can use to change the world.
                            </div>

                            <a href="#" target="_self" class="tp-caption flat-button-slider bg-orange"         

                            data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                         
                            data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']" 
                            data-y="['middle','middle','middle','middle']" data-voffset="['188','188','188','50']" 
                            data-width="['auto']"
                            data-fontsize="['13',13','11','11']" 
                            data-fontweight="['500','500','500','500']"
                            data-lineheight="['46','46','38','38']"
                            data-paddingright="['23','23','23','23']"
                            data-paddingleft="['26','26','26','26']"
                            data-height="['auto']">START A COURSE
                            </a><!-- END LAYER LINK -->
                        </li>

                        <!-- SLIDE 2 -->
                        <li data-index="rs-3050" data-transition="slideremovedown" data-slotamount="7" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"    data-rotate="0"  data-saveperformance="off"  data-title="Ken Burns" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">                        

                            <!-- MAIN IMAGE -->
                            <img src="images/slides/slides2.jpg"  alt=""  data-bgposition="center center" data-kenburns="off" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                            <!-- LAYERS -->

                            <!-- LAYER NR. 12 -->
                            <div class="tp-caption title-slide" 
                                id="slide-3049-layer-2" 
                                data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']" 
                                data-y="['middle','middle','middle','middle']" data-voffset="['-77','-77','-77','-77']" 
                                data-fontsize="['72','72','45','35']"
                                data-lineheight="['60','60','45','35']"
                                data-fontweight="['700','700','700','700']"
                                data-width="none"
                                data-height="none"
                                data-whitespace="nowrap"
                     
                                data-type="text" 
                                data-responsive_offset="on"                             

                                data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'

                                data-textAlign="['left','left','left','left']"
                                data-paddingtop="[18,18,18,18]"
                                data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0"
                                data-paddingleft="[0,0,0,0]"

                                style="z-index: 16; white-space: nowrap;text-transform:left;"><span>FREE ONLINE COURSES FROM THE WORLD'S BEST</span><br>UNIVERSITIES
                            </div>

                            <!-- LAYER NR. 13 -->
                            <div class="tp-caption sub-title" 
                                id="slide-3049-layer-5" 
                                data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']" 
                                data-y="['middle','middle','middle','middle']" data-voffset="['55','55','0','0']"
                                data-fontsize="['16',16','14','14']" 
                                data-fontweight="['300','300','300','300']"
                                data-width="660"
                                data-height="none"
                                data-lineheight="['16','16','16','16']"
                                data-whitespace="nowrap"
                     
                                data-type="text" 
                                data-responsive_offset="on" 

                                data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                                data-textAlign="['left','left','left','left']"
                                data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]"

                                style="z-index: 17; white-space: nowrap;text-transform:left;">Education is the most powerful weapon which you can use to change the world.
                            </div>

                            <a href="#" target="_self" class="tp-caption flat-button-slider bg-orange"         

                            data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                         
                            data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']" 
                            data-y="['middle','middle','middle','middle']" data-voffset="['188','188','188','50']" 
                            data-width="['auto']"
                            data-fontsize="['13',13','11','11']" 
                            data-fontweight="['500','500','500','500']"
                            data-lineheight="['46','46','38','38']"
                            data-paddingright="['23','23','23','23']"
                            data-paddingleft="['26','26','26','26']"
                            data-height="['auto']">START A COURSE
                            </a><!-- END LAYER LINK -->
                        </li>

                        <!-- SLIDE 3 -->
                        <li data-index="rs-3046" data-transition="slideremovedown" data-slotamount="7" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"    data-rotate="0"  data-saveperformance="off"  data-title="Ken Burns" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">                        

                            <!-- MAIN IMAGE -->
                            <img src="images/slides/slides3.jpg"  alt=""  data-bgposition="center center" data-kenburns="off" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                            <!-- LAYERS -->

                            <!-- LAYER NR. 12 -->
                            <div class="tp-caption title-slide" 
                                id="slide-3047-layer-1" 
                                data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']" 
                                data-y="['middle','middle','middle','middle']" data-voffset="['-77','-77','-77','-77']" 
                                data-fontsize="['72','72','45','35']"
                                data-lineheight="['60','60','45','35']"
                                data-fontweight="['700','700','700','700']"
                                data-width="none"
                                data-height="none"
                                data-whitespace="nowrap"
                     
                                data-type="text" 
                                data-responsive_offset="on"                             

                                data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'

                                data-textAlign="['left','left','left','left']"
                                data-paddingtop="[18,18,18,18]"
                                data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0"
                                data-paddingleft="[0,0,0,0]"

                                style="z-index: 16; white-space: nowrap;text-transform:left;"><span>FREE ONLINE COURSES FROM THE WORLD'S BEST</span><br>UNIVERSITIES
                            </div>

                            <!-- LAYER NR. 13 -->
                            <div class="tp-caption sub-title" 
                                id="slide-3049-layer-6" 
                                data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']" 
                                data-y="['middle','middle','middle','middle']" data-voffset="['55','55','0','0']"
                                data-fontsize="['16',16','14','14']" 
                                data-fontweight="['300','300','300','300']"
                                data-width="660"
                                data-height="none"
                                data-lineheight="['16','16','16','16']"
                                data-whitespace="nowrap"
                     
                                data-type="text" 
                                data-responsive_offset="on" 

                                data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                                data-textAlign="['left','left','left','left']"
                                data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]"

                                style="z-index: 17; white-space: nowrap;text-transform:left;">Education is the most powerful weapon which you can use to change the world.
                            </div>

                            <a href="#" target="_self" class="tp-caption flat-button-slider bg-orange"         

                            data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                         
                            data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']" 
                            data-y="['middle','middle','middle','middle']" data-voffset="['188','188','188','50']" 
                            data-width="['auto']"
                            data-fontsize="['13',13','11','11']" 
                            data-fontweight="['500','500','500','500']"
                            data-lineheight="['46','46','38','38']"
                            data-paddingright="['23','23','23','23']"
                            data-paddingleft="['26','26','26','26']"
                            data-height="['auto']">START A COURSE
                            </a><!-- END LAYER LINK -->
                        </li>

                        <!-- SLIDE 4 -->
                        <li data-index="rs-3048" data-transition="slideremoveright" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"    data-rotate="0"  data-saveperformance="off"  data-title="HTML5 Video" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                            <!-- MAIN IMAGE -->
                            <img src="images/slides/slides4.jpg"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                            
                            <!-- BACKGROUND VIDEO LAYER -->
                            <div class="rs-background-video-layer" 
                                data-forcerewind="on" 
                                data-volume="mute" 
                                data-vimeoid="202903642" 
                                data-videoattributes="background=1&title=0&amp;byline=0&amp;portrait=0&amp;api=1" 
                                data-videowidth="100%" 
                                data-videoheight="100%" 
                                data-videocontrols="none" 
                                data-videostartat="00:00" 
                                data-videoendat="00:48" 
                                data-videoloop="loop" 
                                data-forceCover="1" 
                                data-aspectratio="4:3" 
                                data-autoplay="true" 
                                data-autoplayonlyfirsttime="false" ></div>


                            <!-- LAYER NR. 12 -->
                            <div class="tp-caption title-slide" 
                                id="slide-3048-layer-1" 
                                data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']" 
                                data-y="['middle','middle','middle','middle']" data-voffset="['-77','-77','-77','-77']" 
                                data-fontsize="['72','72','45','35']"
                                data-lineheight="['60','60','45','35']"
                                data-fontweight="['700','700','700','700']"
                                data-width="none"
                                data-height="none"
                                data-whitespace="nowrap"
                     
                                data-type="text" 
                                data-responsive_offset="on"                             

                                data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'

                                data-textAlign="['left','left','left','left']"
                                data-paddingtop="[18,18,18,18]"
                                data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0"
                                data-paddingleft="[0,0,0,0]"

                                style="z-index: 16; white-space: nowrap;text-transform:left;"><span>FREE ONLINE COURSES FROM THE WORLD'S BEST</span><br>UNIVERSITIES
                            </div>

                            <!-- LAYER NR. 13 -->
                            <div class="tp-caption sub-title style_subtitle" 
                                id="slide-3049-layer-7" 
                                data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']" 
                                data-y="['middle','middle','middle','middle']" data-voffset="['55','55','0','0']"
                                data-fontsize="['16',16','14','14']" 
                                data-fontweight="['300','300','300','300']"
                                data-width="660"
                                data-height="none"
                                data-lineheight="['16','16','16','16']"
                                data-whitespace="nowrap"
                     
                                data-type="text" 
                                data-responsive_offset="on" 

                                data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                                data-textAlign="['left','left','left','left']"
                                data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]"

                                style="z-index: 17; white-space: nowrap;text-transform:left;">Education is the most powerful weapon which you can use to change the world.
                            </div>

                             <a href="#" target="_self" class="tp-caption flat-button-slider bg-orange"         

                            data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                         
                            data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']" 
                            data-y="['middle','middle','middle','middle']" data-voffset="['188','188','188','50']" 
                            data-width="['auto']"
                            data-fontsize="['13',13','11','11']" 
                            data-fontweight="['500','500','500','500']"
                            data-lineheight="['46','46','38','38']"
                            data-paddingright="['23','23','23','23']"
                            data-paddingleft="['26','26','26','26']"
                            data-height="['auto']">START A COURSE
                            </a><!-- END LAYER LINK -->
                        </li>                         
                    </ul>
                </div>
        </div><!-- END REVOLUTION SLIDER -->

        <!-- Iconbox -->
        <section class="flat-row bg-theme pd-top-152 pd-bottom-97 flat-iconbox">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="f-select">
                            <form action="./contact/contact-process.php" method="post" id="formsearch-flatcourse" class="formsearch">
                                <ul class="form-wrap">
                                    <li class="col-md-4 form-select">
                                        <p class="search-form-select">
                                            <select class="select-field" >
                                                <option value="">ALL CATEGORIES</option>
                                                <option value="">BUSSINESS</option>
                                                <option value="">ENGINEERING</option>
                                                <option value="">LIFE SCIENCES</option>
                                                <option value="">MANAGENMENT</option>
                                        </select>
                                        </p>
                                    </li>
                                    <li class="col-md-5 form-key">
                                        <p class="search-form-keyword">
                                            <input type="text" id="keyword" name="keyword" value="" required="required" placeholder="COURE KEYWORD">
                                        </p>
                                    </li>
                                    <li class="col-md-3 form-btn">
                                        <div class="search-form-btn">
                                            <div class="wrap-btn">
                                                <a class="flat-btn bg-color style3" href="#">SEARCH COURSE</a> 
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div><!-- container -->

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-section">
                            <h1 class="title">OFFERING THE BEST <br> IN EDUCATION TO THE WORLD</h1>
                            <div class="sub-title">
                                Sign-up today to join over 6 million learners already on ALISON
                            </div>
                        </div>
                    </div><!-- col-md-12 -->
                </div><!-- row -->
            </div><!-- container -->

            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="iconbox style-title">
                            <div class="box-header">
                                <div class="box-icon">
                                    <img src="images/iconbox/1.png" alt="image">
                                </div>
                                <div class="box-title">
                                    <a href="#" title="">Best Learning Communities</a>
                                </div>
                            </div>
                            <div class="box-content">
                                <p>The idea is to keep the discussions<br>going after class ends.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="iconbox icon-green style-title">
                            <div class="box-header">
                                <div class="box-icon">
                                    <img src="images/iconbox/2.png" alt="image">
                                </div>
                                <div class="box-title">
                                    <a href="#" title="">Online Teaching Jobs</a>
                                </div>
                            </div>
                            <div class="box-content">
                                <p>The idea is to keep the discussions<br>going after class ends.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="iconbox icon-blue style-title">
                            <div class="box-header">
                                <div class="box-icon">
                                    <img src="images/iconbox/3.png" alt="image">
                                </div>
                                <div class="box-title">
                                    <a href="#" title="">Learn Courses Online</a>
                                </div>
                            </div>
                            <div class="box-content">
                                <p>The idea is to keep the discussions<br>going after class ends.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="iconbox icon-cyan style-title">
                            <div class="box-header">
                                <div class="box-icon">
                                    <img src="images/iconbox/4.png" alt="image">
                                </div>
                                <div class="box-title">
                                    <a href="#" title="">Book Library & Store</a>
                                </div>
                            </div>
                            <div class="box-content">
                                <p>The idea is to keep the discussions<br>going after class ends.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- container -->
        </section>
        
        <!-- Popular-iconbox2 -->
        <section class="flat-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-section">
                            <h1 class="title">POPULAR COURSE CATEGORIES</h1>
                            <div class="sub-title">
                                Having over 10 million students worldwide and more than 50.000 online courses available.
                            </div>
                        </div>
                    </div><!-- col-md-12 -->
                </div><!-- row -->
            </div><!-- container -->

            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <div class="iconbox bg-style">
                                    <div class="box-header">
                                        <div class="box-icon">
                                            <img src="images/iconbox/21.png" alt="image">
                                        </div>
                                        <div class="box-title">
                                           <a href="#" title="">ARTS & HUMANITIES</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- col-md-4 -->
                            <div class="col-md-4 col-sm-6">
                                <div class="iconbox bg-style bg-blue ">
                                    <div class="box-header">
                                        <div class="box-icon">
                                            <img src="images/iconbox/22.png" alt="image">
                                        </div>
                                        <div class="box-title">
                                           <a href="#" title="">BUSSINESS & MANAGENMENT</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- col-md-4 -->
                            <div class="col-md-4 col-sm-6">
                                <div class="iconbox bg-style bg-cyan">
                                    <div class="box-header">
                                        <div class="box-icon">
                                            <img src="images/iconbox/23.png" alt="image">
                                        </div>
                                        <div class="box-title">
                                           <a href="#" title="">ENGINEERING<br>& TECHNOLOGY</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- col-md-4 -->
                            <div class="dividers">   
                            </div><!-- dividers -->
                            <!-- <div class="row"> -->
                            <div class="col-md-4 col-sm-6">
                                <div class="iconbox bg-style bg-red">
                                    <div class="box-header">
                                        <div class="box-icon">
                                            <img src="images/iconbox/24.png" alt="image">
                                        </div>
                                        <div class="box-title">
                                           <a href="#" title="">LIFE SCIENCES<br>& MEDICINE</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- col-md-4 -->
                            <div class="col-md-4 col-sm-6">
                                <div class="iconbox bg-style bg-green ">
                                    <div class="box-header">
                                        <div class="box-icon">
                                            <img src="images/iconbox/25.png" alt="image">
                                        </div>
                                        <div class="box-title">
                                           <a href="#" title="">NATURAL SCIENCES</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- col-md-4 -->
                            <div class="col-md-4 col-sm-6">
                                <div class="iconbox bg-style bg-violet">
                                    <div class="box-header">
                                        <div class="box-icon">
                                            <img src="images/iconbox/26.png" alt="image">
                                        </div>
                                        <div class="box-title style1">
                                           <a href="#" title="">SOCIAL<br>SCIENVES</a>
                                        </div>
                                        <div class="box-title style2">
                                           <a href="#" title="">SOCIAL SCIENVES</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- col-md-4 -->
                        </div>
                    </div><!-- no-paddingright -->
                    <div class="col-md-6">
                            <div class="about-us wrap-box pdleft">
                                <h2 class="title-about-us">Arts & Humanities</h2>
                                <div class="text-about-us">
                                    <p>Artist John Sloan said, “Though a living cannot be made at art,<br>art makes life worth living.” </p>
                                    <p>It is this fact which has driven millions of students to get arts and<br>humanities degrees, focussing their attention on painting, litera-ture or history.</p>
                                </div>
                                <div class="course-about-us">
                                    <p>Courses Available:<strong> 500</strong></p>
                                </div>
                                <div class="button-style">
                                    <div class="wrap-btn">
                                        <a class="flat-btn" href="#">SEE COURSE</a>
                                    </div>
                                </div>
                            </div><!-- About-us -->
                    </div><!-- col-md-6 -->
                </div><!-- row -->
            </div><!-- Container -->
        </section>
        
        <!-- portfolio-isotope -->
        <section class="flat-row bg-theme wrap-price-post">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                            <div class="title-section title-height46">
                                <h1 class="title">POPULAR COURSE</h1>
                                <div class="sub-title">
                                    Join our growing global community of over 7 million learners.
                                </div>
                            </div>
                    </div><!-- col.md-12 -->
                </div>
            </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="portfolio-filter style1">
                                <li><a data-filter=".bussiness" href="#">Bussiness</a></li>
                                <li class="active"><a data-filter=".manage" href="#">Managenment</a></li>
                                <li><a data-filter=".engin" href="#">Engineering</a></li>
                                <li><a data-filter=".tech" href="#">Technology</a></li>
                                <li><a data-filter=".life" href="#">Life sciences</a></li>
                                <li><a data-filter=".medici" href="#">Medicine</a></li>
                                <li><a data-filter=".other" href="#">Other</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="portfolio style2">
                        <div class="portfolio-wrap clearfix">
                            <div class="item manage tech life">
                                <article class="entry ">
                                    <div class="featured-post">
                                        <a href="#"><img src="images/portfolio/1.jpg" alt="image"></a>
                                    </div>
                                    <div class="entry-post">
                                        <h3 class="entry-title"><a href="#">Building WordPress Themes<br>With Bootstrap</a></h3>
                                        <div class="entry-author">
                                            <span>With<a href="#"> John Sloan</a></span>
                                        </div>
                                        <div class="entry-number">
                                            <div class="entry-count">
                                                TOTAL:<span class="count"> 100</span>
                                            </div>
                                            <div class="entry-price">
                                                PRICE:<span class="price"> $200</span>
                                            </div>
                                        </div>
                                    </div><!-- entry-post -->
                                </article>
                            </div><!-- item -->
                            <div class="item medici manage other medici bussiness tech life">
                                <article class="entry">
                                    <div class="featured-post">
                                        <a href="#"><img src="images/portfolio/2.jpg" alt="image"></a>
                                    </div>
                                    <div class="entry-post">
                                        <h3 class="entry-title"><a href="#">Understanding Persuasive<br>Web Design</a></h3>
                                        <div class="entry-author">
                                            <span>With<a href="#"> John Sloan</a></span>
                                        </div>
                                        <div class="entry-number">
                                            <div class="entry-count">
                                                TOTAL:<span> 100</span>
                                            </div>
                                            <div class="entry-price color-green">
                                                PRICE:<span> FREE</span>
                                            </div>
                                        </div>
                                    </div><!-- entry-post -->
                                </article>
                            </div><!-- item -->
                            <div class="item  other life engin manage bussiness">
                                <article class="entry">
                                    <div class="featured-post">
                                        <a href="#"><img src="images/portfolio/3.jpg" alt="image"></a>
                                    </div>
                                    <div class="entry-post">
                                        <h3 class="entry-title"><a href="#">Building Static Websites<br>With Jekyll</a></h3>
                                        <div class="entry-author">
                                            <span>With<a href="#"> John Sloan</a></span>
                                        </div>
                                        <div class="entry-number">
                                            <div class="entry-count">
                                                TOTAL:<span class="count"> 100</span>
                                            </div>
                                            <div class="entry-price">
                                                PRICE:<span class="price"> $200</span>
                                            </div>
                                        </div>
                                    </div><!-- entry-post -->
                                </article>
                            </div><!-- item -->
                            <div class="item life engin manage bussiness">
                                <article class="entry">
                                    <div class="featured-post">
                                        <a href="#"><img src="images/portfolio/4.jpg" alt="image"></a>
                                    </div>
                                    <div class="entry-post">
                                        <h3 class="entry-title"><a href="#">Building Static Websites<br>With Jekyll</a></h3>
                                        <div class="entry-author">
                                            <span>With<a href="#"> John Sloan</a></span>
                                        </div>
                                        <div class="entry-number">
                                            <div class="entry-count">
                                                TOTAL:<span class="count"> 100</span>
                                            </div>
                                            <div class="entry-price color-green">
                                                PRICE:<span class="price"> FREE</span>
                                            </div>
                                        </div>
                                    </div><!-- entry-post -->
                                </article>
                            </div><!-- item -->
                            <div class="item other medici tech life engin manage">
                                <article class="entry">
                                    <div class="featured-post">
                                        <a href="#"><img src="images/portfolio/5.jpg" alt="image"></a>
                                    </div>
                                    <div class="entry-post">
                                        <h3 class="entry-title"><a href="#">Building WordPress Themes<br>With Bootstrap</a></h3>
                                        <div class="entry-author">
                                            <span>With<a href="#"> John Sloan</a></span>
                                        </div>
                                        <div class="entry-number">
                                            <div class="entry-count">
                                                TOTAL:<span class="count"> 100</span>
                                            </div>
                                            <div class="entry-price">
                                                PRICE:<span class="price"> $200</span>
                                            </div>
                                        </div>
                                    </div><!-- entry-post -->
                                </article>
                            </div><!-- item -->
                            <div class="item manage bussiness">
                                <article class="entry">
                                    <div class="featured-post">
                                        <a href="#"><img src="images/portfolio/6.jpg" alt="image"></a>
                                    </div>
                                    <div class="entry-post">
                                        <h3 class="entry-title"><a href="#">Understanding Persuasive<br>Web Design</a></h3>
                                        <div class="entry-author">
                                            <span>With<a href="#"> John Sloan</a></span>
                                        </div>
                                        <div class="entry-number">
                                            <div class="entry-count">
                                                TOTAL:<span class="count"> 100</span>
                                            </div>
                                            <div class="entry-price color-green">
                                                PRICE:<span class="price"> FREE</span>
                                            </div>
                                        </div>
                                    </div><!-- entry-post -->
                                </article>
                            </div><!-- item -->
                        </div><!-- portfolio-wrap -->
                    </div><!-- portfolio --> 
                    <div class="row">
                        <div class="dividers h30">
                            
                        </div>
                    </div>
                </div><!-- container -->

                <div class="button-style center mg-left2">
                    <div class="wrap-btn">
                        <a class="flat-btn pdwith57" href="#">VIEW ALL</a>
                    </div>
                </div>
        </section>
        
        <!-- form-register -->
        <section class="flat-row pd-80 flat-register">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <form action="./contact/contact-process.php" method="POST" id="form-register" class="form-register">
                            <div class="form-register-title">
                               <h3 class="register-title">CREATE YOUR FREE<br><i class="wrap-box ispace7"></i>ACCOUNT NOW!</h3>
                            </div>
                            <div class="info-register">
                                <p class="wrap-input-name">
                                    <input type="text" id="name" name="name" value="" required="required" placeholder="Your Name *:">
                                </p>
                                <p class="wrap-input-email">
                                    <input type="text" id="email" name="email" value="" required="required" placeholder="Email *:">
                                </p>
                                <p class="wrap-input-phone">
                                    <input type="text" id="phone" name="phone" value="" required="required" placeholder="Phone *:">
                                </p>
                                <div class="wrap-btn">
                                    <a class="flat-btn" href="#">GET IT NOW</a>
                                </div>
                            </div> 
                        </form>
                    </div><!-- col-md-5 -->
                    <div class="col-md-7 no-paddingright">
                        <div class="wrap-register-right wrap-box pdtopleft">
                            <div class="wrap-register-title">
                                <div class="title-top">
                                   GET 100S OF INLINE COURSES FOR FREE
                                </div>
                                <div class="title-register">
                                   REGISTER NOW
                                </div>
                                <div class="sub-title-register">
                                   Create your free account now and get immediate access to 100s<br>of online courses.
                                </div>
                            </div><!-- wrap-register-title -->

                            <div id="countdown" class="countdown">
                            </div><!-- CountDown -->
                       </div><!-- wrap-register-right -->
                        
                   </div><!-- col-md-7 -->
                </div>
            </div>
        </section>
        
        <!-- Popular-event -->
        <section class="flat-row bg-theme pd-top-94">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                            <div class="title-section">
                                <h1 class="title">POPULAR EVENT</h1>
                                <div class="sub-title">
                                    Upcoming Education Events to feed your brain.
                                </div>
                            </div>
                    </div><!-- col.md-12 -->
                </div>
            </div><!-- container -->

            <div class="container popular-event">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="wrap-event-times">
                            <ol class="wrap-times wrap-times-style2 content mCustomScrollbar">
                                <li>
                                    <article class="times-body">
                                        <div class="time-list">
                                            <p class="number-mon">08</p>
                                            <p class="text-mon">AGU</p>
                                        </div>
                                        <div class="times-meta">
                                            <h6><a href="#" title="">Alumni Weekend 2016</a></h6>
                                            <span class="hour">8:00 AM - 5:00 PM</span>
                                            <span class="adress">New Delhi, India</span>
                                        </div>
                                    </article>
                                </li>
                                <li>
                                    <article class="times-body">
                                        <div class="time-list">
                                            <p class="number-mon">23</p>
                                            <p class="text-mon">MAR</p>
                                        </div>
                                        <div class="times-meta">
                                            <h6><a href="#" title="">Special Events: No Stress Week</a></h6>
                                            <span class="hour">8:00 AM - 5:00 PM</span>
                                            <span class="adress">NewYork, United State</span>
                                        </div>
                                    </article>
                                </li>
                                <li>
                                    <article class="times-body">
                                        <div class="time-list">
                                            <p class="number-mon">10</p>
                                            <p class="text-mon">AGU</p>
                                        </div>
                                        <div class="times-meta">
                                            <h6><a href="#" title="">October Fest or Spring Fest</a></h6>
                                            <span class="hour">8:00 AM - 5:00 PM</span>
                                            <span class="adress">New Delhi, India</span>
                                        </div>
                                    </article>
                                </li>
                                <li>
                                    <article class="times-body">
                                        <div class="time-list">
                                            <p class="number-mon">16</p>
                                            <p class="text-mon">MAR</p>
                                        </div>
                                        <div class="times-meta">
                                            <h6><a href="#" title="">October Fest or Spring Fest</a></h6>
                                            <span class="hour">8:00 AM - 5:00 PM</span>
                                            <span class="adress">NewYork, United State</span>
                                        </div>
                                    </article>
                                </li>
                                <li>
                                    <article class="times-body">
                                        <div class="time-list">
                                            <p class="number-mon">08</p>
                                            <p class="text-mon">AGU</p>
                                        </div>
                                        <div class="times-meta">
                                            <h6><a href="#" title="">Alumni Weekend 2016</a></h6>
                                            <span class="hour">8:00 AM - 5:00 PM</span>
                                            <span class="adress">New Delhi, India</span>
                                        </div>
                                    </article>
                                </li>
                                <li>
                                    <article class="times-body">
                                        <div class="time-list">
                                            <p class="number-mon">23</p>
                                            <p class="text-mon">MAR</p>
                                        </div>
                                        <div class="times-meta">
                                            <h6><a href="#" title="">Special Events: No Stress Week</a></h6>
                                            <span class="hour">8:00 AM - 5:00 PM</span>
                                            <span class="adress">NewYork, United State</span>
                                        </div>
                                    </article>
                                </li>
                                <li>
                                    <article class="times-body">
                                        <div class="time-list">
                                            <p class="number-mon">10</p>
                                            <p class="text-mon">AGU</p>
                                        </div>
                                        <div class="times-meta">
                                            <h6><a href="#" title="">October Fest or Spring Fest</a></h6>
                                            <span class="hour">8:00 AM - 5:00 PM</span>
                                            <span class="adress">New Delhi, India</span>
                                        </div>
                                    </article>
                                </li>
                                <li>
                                    <article class="times-body">
                                        <div class="time-list">
                                            <p class="number-mon">16</p>
                                            <p class="text-mon">MAR</p>
                                        </div>
                                        <div class="times-meta">
                                            <h6><a href="#" title="">October Fest or Spring Fest</a></h6>
                                            <span class="hour">8:00 AM - 5:00 PM</span>
                                            <span class="adress">NewYork, United State</span>
                                        </div>
                                    </article>
                                </li>
                            </ol>
                        </div><!-- wrap-event-times -->
                    </div><!-- col-md-6 -->
                    <div class="col-md-6 col-sm-6">
                        <div class="flat-testimonials owl-carousel wrap-box pdtop" data-item="1" data-nav="true" data-auto="true">
                            <div class="testimonial">
                                <div class="testimonial-content">
                                    <p><i class="fa fa-quote-left"></i>I enjoyed the subtle cultural differences the most, everyone<br>I met were so friendly and helpful.<i class="wrap-box ispace"></i>I'll never forget the friends i've<br>made and the once-in-a-lifetime experiences i've had. The Edu<br>harvard is truly magnificent.<i class="fa fa-quote-right"></i></p>
                                </div>
                                <div class="wrap-testimonial">
                                    <div class="testimonial-author">
                                        <div class="author-img">
                                            <img src="images/team/11.jpg" alt="image">
                                        </div>
                                        <div class="athor-info">
                                            <span class="author-name">Kiwhi Leonard</span><br>
                                            <span class="author-position">CREATIVE DIRECTOR</span>
                                        </div>
                                    </div>
                                </div><!-- wrap-testimonial -->
                         </div><!-- testimonial -->
                            <div class="testimonial">
                                <div class="testimonial-content">
                                    <p><i class="fa fa-quote-left"></i>I enjoyed the subtle cultural differences the most, everyone<br>I met were so friendly and helpful.<i class="wrap-box ispace"></i>I'll never forget the friends i've<br>made and the once-in-a-lifetime experiences i've had. The Edu<br>harvard is truly magnificent.<i class="fa fa-quote-right"></i></p>
                                </div>
                                <div class="wrap-testimonial">
                                    <div class="testimonial-author">
                                        <div class="author-img">
                                            <img src="images/team/11.jpg" alt="image">
                                        </div>
                                        <div class="athor-info">
                                            <span class="author-name">Kiwhi Leonard</span><br>
                                            <span class="author-position">CREATIVE DIRECTOR</span>
                                        </div>
                                    </div>
                                </div><!-- wrap-testimonial -->
                            </div><!-- testimonial -->
                            <div class="testimonial">
                                <div class="testimonial-content">
                                    <p><i class="fa fa-quote-left"></i>I enjoyed the subtle cultural differences the most, everyone<br>I met were so friendly and helpful.<i class="wrap-box ispace"></i>I'll never forget the friends i've<br>made and the once-in-a-lifetime experiences i've had. The Edu<br>harvard is truly magnificent.<i class="fa fa-quote-right"></i></p>
                                </div>
                                <div class="wrap-testimonial">
                                    <div class="testimonial-author">
                                        <div class="author-img">
                                            <img src="images/team/11.jpg" alt="image">
                                        </div>
                                        <div class="athor-info">
                                            <span class="author-name">Kiwhi Leonard</span><br>
                                            <span class="author-position">CREATIVE DIRECTOR</span>
                                        </div>
                                    </div>
                                </div><!-- wrap-testimonial -->
                            </div><!-- testimonial -->
                        </div><!-- flat-testimonials -->
                    </div><!-- col-md-6 -->
                </div><!-- row -->
            </div><!-- container -->
        </section>
        
        <!-- latest-news -->
        <section class="flat-row pd-top-93">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                            <div class="title-section">
                                <h1 class="title">LATEST NEWS</h1>
                                <div class="sub-title">
                                    Education news all over the world.
                                </div>
                            </div>
                    </div><!-- col.md-12 -->
                </div>
            </div><!-- container -->

            <div class="container">
                <div class="blog-list2 lates-new wrap-box pdbottom">
                    <div class="row">
                        <div class="col-md-6 wrap-grid">
                            <article class="entry">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 left">
                                        <div class="entry-post">
                                            <div class="entry-meta">
                                                <span>march 14, 2016</span>
                                            </div>
                                            <h3 class="entry-title"><a href="#">The Global Student<br>Challenge</a></h3>
                                            <div class="entry-author">
                                                <span>by <a href="#">Kiwhi Leonard</a></span>
                                            </div>
                                            <div class="entry-content">
                                                <p>The Education Report: A New Report Says Americans Less Happy.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 right">
                                        <div class="feature-post">
                                            <a href="#"><img src="images/blog/list2/1.jpg" alt="image"></a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div><!-- col-md-6 -->
                        <div class="col-md-6 wrap-grid">
                            <article class="entry">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="entry-post">
                                                <div class="entry-meta">
                                                    <span>AUGUST 13, 2016</span>
                                                </div>
                                                <h3 class="entry-title"><a href="#">I Hope My Graduating<br>Soon</a></h3>
                                                <div class="entry-author">
                                                    <span>by <a href="#">Kiwhi Leonard</a></span>
                                                </div>
                                                <div class="entry-content">
                                                    <p>The Education Report: A New Report Says Americans Less Happy.</p>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="feature-post">
                                            <a href="#"><img src="images/blog/list2/2.jpg" alt="image"></a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div><!-- col-md-6 -->
                        <div class="col-md-6 wrap-grid">
                            <article class="entry">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                            <div class="entry-post">
                                                <div class="entry-meta">
                                                    <span>AUGUST 13, 2016</span>
                                                </div>
                                                <h3 class="entry-title"><a href="#">Student Action For<br>Refugees</a></h3>
                                                <div class="entry-author">
                                                    <span>by <a href="#">Kiwhi Leonard</a></span>
                                                </div>
                                                <div class="entry-content">
                                                    <p>The Education Report: A New Report Says Americans Less Happy.</p>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="feature-post">
                                            <a href="#"><img src="images/blog/list2/3.jpg" alt="image"></a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div><!-- col-md-6 -->
                        <div class="col-md-6 wrap-grid">
                            <article class="entry">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="entry-post">
                                            <div class="entry-meta">
                                                <span>march 14, 2016</span>
                                            </div>
                                            <h3 class="entry-title"><a href="#">Charity Challenge For<br>Speedy Students</a></h3>
                                            <div class="entry-author">
                                                <span>by <a href="#">Kiwhi Leonard</a></span>
                                            </div>
                                            <div class="entry-content">
                                                <p>The Education Report: A New Report Says Americans Less Happy.</p>
                                            </div>
                                        </div><!-- entry-post -->
                                    </div><!-- col-md-6 -->
                                    <div class="col-md-6 col-sm-6">
                                        <div class="feature-post">
                                            <a href="#"><img src="images/blog/list2/4.jpg" alt="image"></a>
                                        </div>
                                    </div><!-- col-md-6 -->
                                </div><!-- row -->
                            </article>
                        </div><!-- col-md-6 -->
                    </div><!-- row -->
                </div>
            </div><!-- container -->

            <div class="button-style center mg-left2">
                <div class="wrap-btn">
                    <a class="flat-btn pdwith57 no-bg" href="#">VIEW ALL</a>
                </div>
            </div>
        </section> 

        <!-- flat-contact -->
        <section class="flat-row bg-theme flat-contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="title-section left color-sub">
                                <h1 class="title">EDUCATION THEMES</h1>
                                <div class="sub-title">
                                    Eduharvart is an education platform that partners with top universities and organizations <br> worldwide,<span class="color-gray"> Absolutely FREE.</span>
                                </div>
                            </div>
                    </div><!-- col.md-8 -->
                    <div class="col-md-4 right-contact">
                        <div class="wrap-btn">
                            <a class="flat-btn bg-color" href="#">ENROLL NOW</a> 
                        </div>
                    </div><!-- col.md-4 -->
                </div><!-- row -->
            </div><!-- Container -->
            <div class="container"> 
                <div class="row">
                    <div class="col-md-12">
                        <div class="center-contact">
                            <img src="images/11.jpg" alt="image">
                        </div>
                    </div>
                </div>
            </div><!-- Container -->

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="subscribe-contact wrap-box pdfull">
                            <div class="title-section">
                                <h1 class="title">SUBSCRIBE TO NEWSLETTER</h1>
                                <div class="sub-title">
                                    Subscribe now and receive weekly newsletter with educational materials, new courses,<br>interesting posts, popular books and much more!
                                </div>
                            </div>
                            <form action="./contact/contact-process.php" method="post" id="formsubscribe" class="formsearch search-course">
                                <p class="subscribe-email">
                                    <input type="text" id="emailsubscribe" name="email" value="" required="required" placeholder="Your email here">
                                </p>
                                <div class="subscribe-btn">
                                    <div class="wrap-btn">
                                        <a class="flat-btn bg-color" href="#">ENROLL NOW</a> 
                                    </div>
                                </div>
                            </form>
                        </div><!-- subscribe-contact -->
                    </div><!-- Col-md-12 -->
                </div><!-- row -->
            </div><!-- Container -->
        </section>

        <!-- Footer -->
        <?php include("_footer.php"); ?><!-- footer -->

    </div><!-- Boxed -->

    <!-- Javascript -->
    <?php include("_footer-js.php"); ?>
</body>
</html>