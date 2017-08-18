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
                        $selOrganizer = "select * from clients inner join client_companies on client_companies.client_id = clients.id inner join client_infos on client_infos.client_id = clients.id where clients.client_type_id = 2 order by clients.ratings desc, clients.id ASC limit 12";
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
                                    <a href="#"><img src="images/portfolio/1.jpg" alt="image"></a>
                                </div>
                                <div class="entry-post">
                                    <h3 class="entry-title"><a href="#"><?php echo $org['name'] ?></a></h3>
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

