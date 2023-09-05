  <?php wp_footer(); ?>

    <div class="newsletter">
        <div class="grid-container">
            <div class="grid-x grid-padding-x align-center-middle">
                <div class="large-9 cell">
                    <div class="newsletter-widget">
                        <?php if ( is_active_sidebar( 'Main Sidebar' ) ) : ?>
                            <?php dynamic_sidebar( 'Main Sidebar' ); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div> 
        </div>
    </div>

    <footer class="midBlueBg">
        <div id="footerSpacing" class="container grid-container">
            <div class="row">
                <div id="footerLogo" class="col-12 d-none d-md-block">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/seajets-white.png" alt="" class="img-fluid center-block">
                </div>
            </div>
            <ul class="footerAccordions row px-5 px-xl-0">
                <li class="col-12 col-md-6 col-lg text-md-center text-lg-left">
                    <div class="footerLinksHeader">
                        <h6>TRAVEL WITH US</h6>
                        
                    </div>
                    <div class="footerLinksBody">
                            <ul>
                                <li class="orangeTxt"><a class="lightGrayTxt" href="https://www.seajets.com/el/travel-with-us/island-hopping" target="_self">Island Hopping</a></li>
                                <li class="orangeTxt"><a class="lightGrayTxt" href="https://www.seajets.com/el/travel-with-us/excursions" target="_self">Excursions</a></li>
                                <li class="orangeTxt"><a class="lightGrayTxt" href="https://www.seajets.com/el/travel-with-us/routes" target="_self">Routes</a></li>
                                <li class="orangeTxt"><a class="lightGrayTxt" href="https://www.seajets.com/el/travel-with-us/destinations" target="_self">Destinations</a></li>
                            </ul>
                    </div>
                </li>
                <li class="col-12 col-md-6 col-lg text-center">
                    <div class="footerLinksHeader text-lg-left">
                        <h6>LEARN ABOUT SEAJETS</h6>
                    </div>
                    <div class="footerLinksBody text-lg-left">
                            <ul>
                                <li class="orangeTxt"><a class="lightGrayTxt" href="https://www.seajets.com/el/learn-about-seajets/company" target="_self">Company</a></li>
                                <li class="orangeTxt"><a class="lightGrayTxt" href="https://www.seajets.com/el/learn-about-seajets/fleet" target="_self">Fleet</a></li>
                                <li class="orangeTxt en_hide"><a class="lightGrayTxt" href="https://www.seajets.com/el/learn-about-seajets/careers" target="_self">Ευκαιρίες Καριέρας</a></li>
                                <li class="orangeTxt en_hide"><a class="lightGrayTxt" href="https://www.seajets.com/el/learn-about-seajets/partners" target="_self">Συνεργάτες</a></li>
                            </ul>
                    </div>
                </li>
                <li class="col-12 col-md-6 col-lg text-md-center text-lg-left">
                    <div class="footerLinksHeader">
                        <h6>STAY INFORMED</h6>
                        
                    </div>
                    <div class="footerLinksBody">
                            <ul>
                                <li class="orangeTxt"><a class="lightGrayTxt" href="https://www.seajets.com/el/stay-informed/agencies" target="_self">Our Agencies</a></li>
                                <li class="orangeTxt"><a class="lightGrayTxt" href="https://www.seajets.com/el/stay-informed/faq" target="_self">FAQ</a></li>
                                <li class="orangeTxt"><a class="lightGrayTxt" href="https://www.seajets.com/el/stay-informed/general-terms" target="_self">Seajets General Terms</a></li>
                            </ul>
                    </div>
                </li>
                <li class="col-12 col-md-6 col-lg text-md-center text-lg-left">
                    <div class="footerLinksHeader">
                        <h6>MEDIA CENTER</h6>
                        
                    </div>
                    <div class="footerLinksBody">
                            <ul>
                                <li class="orangeTxt"><a class="lightGrayTxt" href="https://www.seajets.com/el/media-center/news" target="_self">News</a></li>
                                <li class="orangeTxt"><a class="lightGrayTxt" href="https://www.seajets.com/el/media-center/sponsorships" target="_self">Sponsorships</a></li>
                                <li class="orangeTxt"><a class="lightGrayTxt" href="https://www.seajets.com/el/media-center/seajets-magazine" target="_self">Seajets Magazine</a></li>
                                <li class="orangeTxt"><a class="lightGrayTxt" href="https://www.seajets.com/el/media-center/our-blog" target="_self">Our Blog</a></li>
                                <li class="orangeTxt en_hide"><a class="lightGrayTxt" href="https://www.seajets.com/el/media-center/terajet_contest" target="_self">Διαγωνισμός Terajet</a></li>
                                <li class="orangeTxt en_hide"><a class="lightGrayTxt" href="https://www.seajets.com/el/media-center/tera-se-ola" target="_self">Διαγωνισμός TERA σε ΟΛΑ</a></li>
                            </ul>
                    </div>
                </li>
                <li class="col-12 col-md-6 col-lg text-md-center text-lg-left">
                    <div class="footerLinksHeader">
                        <h6>INFORMATION  &amp; RESERVATIONS</h6>
                    </div>
                    <div class="footerLinksBody">
                        <ul id="contactLinks">
                            <li class="orangeTxt" style="padding-bottom:0;margin-bottom:0!important;">
                                <span class="lightGrayTxt"><strong>Central Ticket Office</strong></span>
                            </li>
                            <li class="orangeTxt" style="padding-bottom:0;margin-bottom:0!important;">
                                <span class="lightGrayTxt">2, Astiggos &amp; Akti Tzelepi,18531 Piraeus</span>
                            </li>
                            <li class="orangeTxt" style="padding-bottom:0;margin-bottom:0!important;">
                                        <span class="lightGrayTxt">Monday - Friday:<br> 09:00 -17: 00</span>
                                    </li>
                            <li class="orangeTxt" style="padding-bottom:0;margin-bottom:0!important;">
                                <span class="lightGrayTxt">Saturday - Sunday: 09:30 - 13:00</span>
                            </li>
                            <li class="orangeTxt" style="padding-bottom:0;margin-bottom:0!important;">
                                <span class="lightGrayTxt">Tel: +30 210 7107710, daily 06:00 – 22:00</span>
                            </li>
                            <li class="orangeTxt" style="padding-bottom:0;margin-bottom:0!important;">
                                <span class="lightGrayTxt"><a href="mailto:reservations.dpt@seajets.gr">reservations.dpt@seajets.gr</a>
                            </span>
                            </li>
                            <li class="orangeTxt" style="padding-bottom:0;margin-bottom:0!important;">
                                <span class="lightGrayTxt"><strong>Head Office</strong></span>
                            </li>
                            <li class="orangeTxt" style="padding-bottom:0;margin-bottom:0!important;">
                                <span class="lightGrayTxt">2, Dimitriou Gounari str., 18531 Piraeus, 7th floor, Greece</span>
                            </li>
                            <li class="orangeTxt" style="padding-bottom:0;margin-bottom:0!important;">
                                <span class="lightGrayTxt">Tel: +30 210 4121001, daily 08:30 – 19:00</span>
                            </li>
                            <li class="orangeTxt" style="padding-bottom:0;margin-bottom:0!important;">
                                <span class="lightGrayTxt">Fax: +30 210 4121912</span>
                            </li>
                            <li class="orangeTxt" style="padding-bottom:0;margin-bottom:0!important;">
                                <span class="lightGrayTxt"><a href="mailto: info@seajets.gr">info@seajets.gr</a></span>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div id="socialFollow" class="d-none d-lg-block">
            <h6 class="inlineMiddle">FOLLOW US: </h6>
            <span id="socialMediasLinks" class="valign-wrapper inlineMiddle">
                <a href="https://www.facebook.com/Seajets?v=wall" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.png" alt="" class="sj-facebook"></a>
                <a href="https://www.youtube.com/channel/UCmumwEZDL1Dqb1tbf5vqFoA" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/youtube.png" alt="" class="sj-youtube"></a>
                <a href="https://www.instagram.com/seajetsgr/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram.png" alt="" class="sj-instagram"></a>
            </span>
        </div>

        <div id="copyLine" class="container bigContainerCheckout">
            <div class="row px-4 px-md-0">
                <div class="col-lg-3 pl-0 cpw footerLinksBody">
                    <ul class="no-list">
                        <li>© 2022 Seajets</li>
                    </ul>
                </div>
                <div class="col-lg-6 footerLinksBody text-center">                    
                            <ul class="no-list spaceUp">
                                <li class="orangeTxt"><a class="lightGrayTxt" href="https://www.seajets.com/el/privacy-terms/privacy-policy" target="_self">Privacy Policy</a></li>
                                <li class="orangeTxt"><a class="lightGrayTxt" href="https://www.seajets.com/el/privacy-terms/cookies-settings" target="_self">Cookie Settings</a></li>
                            </ul>
                </div>
                <div class="col-lg-3 footerLinksBody text-right">
                    <ul class="no-list">
                        <div class="right_footer_by">
                            <li><a href="https://www.wearedope.com" target="_blank" class="lightGrayTxt">Website by DOPE Studio</a></li>
                        <!-- <li><p class="lightGrayTxt">Website by <a href="https://www.wildwildweb.gr/" target="_blank"><img class="alignnone wp-image-30727" src="https://crata.gr/wp-content/uploads/2022/11/wild2.webp" alt="Κατασκευή Ιστοσελίδας" width="59" height="31"></a></p></li> -->
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <?php wp_footer();  ?>
  </body>
</html>