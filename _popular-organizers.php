<!-- portfolio-isotope -->
<section class="flat-row wrap-price-post">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <div class="title-section title-height46">
                        <h1 class="title">POPULAR EVENT ORGANIZERS</h1>
                    </div>
            </div><!-- col.md-12 -->
        </div>
    </div>

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
                            <li <?php echo $cnt == 0 ? "class='active'" : '' ?>><a data-filter=".<?php echo strtolower($event['type']) ?>" href="#"><?php echo $event['type'] ?></a></li>
                        <?php $cnt++; endwhile; ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="portfolio style2">
                <div class="portfolio-wrap clearfix">

                    <?php
                        $selOrganizer = "select *, client_companies.id as ccid from clients inner join client_companies on client_companies.client_id = clients.id inner join client_infos on client_infos.client_id = clients.id where clients.client_type_id = 2 order by clients.ratings desc, clients.id ASC limit 12";
                        $rsOrganizer = mysqli_query($mysqli, $selOrganizer);

                        while($org = mysqli_fetch_assoc($rsOrganizer)):
                    ?>
                        <?php
                            $selType = "select * from client_events inner join event_types on event_types.id = client_events.event_type_id where client_id = " . $org['client_id'];
                            $rsType = mysqli_query($mysqli, $selType);

                            $type = '';
                            while ($t = mysqli_fetch_assoc($rsType)) {
                                $type .= ' ' . strtolower($t['type']);
                            }
                        ?>
                        <div class="item <?php echo $type; ?>">
                            <article class="entry ">
                                <div class="featured-post">
                                    <a href="view-company.php?comid=<?php echo $org['ccid'] ?>"><img src="images/portfolio/1.jpg" alt="image"></a>
                                </div>
                                <div class="entry-post">
                                    <h3 class="entry-title"><a href="view-company.php?comid=<?php echo $org['ccid'] ?>"><?php echo $org['name'] ?></a></h3>
                                    <div class="entry-author">
                                        <span>by<a href="#"> <?php echo $org['first_name'] . ' ' . $org['last_name'] ?></a></span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div><!-- entry-post -->
                            </article>
                        </div>
                    <?php endwhile; ?>
                    
                    
                </div><!-- portfolio-wrap -->
            </div><!-- portfolio --> 
            <div class="row">
                <div class="dividers h30">
                    
                </div>
            </div>
        </div><!-- container -->

        
</section>

<!-- Popular-iconbox2 -->
<section class="flat-row bg-theme hidden">
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