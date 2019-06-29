<div id="footer">
    <div class="container-fluid footer-container">        <!-- Footer -->
        <footer class="container">
            <div class="row">
                <div class="col-lg-3">
                    <!--  img src="images/logo-jobboard.png" alt="Jobboard Logo" class="footer-logo">-->
                    <br><br>
                    <p class="copyright"><?= date('Y') ?> Rojgar.com</p>
                </div>
                <div class="col-lg-2">
                    <p><strong>JOB SEEKER</strong></p>
                    <p><a href="<?= URL('register') ?>">Register Now</a></p>
                    <p><a href="#">Search Jobs</a></p>

                    <p><a href="#">View Applications</a></p>
                    <!--  <p><a href="jobforyou.php">Job Alerts</a></p>-->
                    <p><a href="up.php">Post Resume</a></p>
                </div>
                <div class="col-lg-2">
                    <p><strong>EMPLOYER</strong></p>
                    <p><a href="#">Post a Job</a></p>
                    <!--   <p><a href="view.php">Search Resume</a></p>-->
                    <p><a href="<?=URL()?>">Sign In</a></p>
                    <p><a href="<?=URL('company-register')?>">Register Now</a></p>
                    <!--  <p><a href="view.php">Resume Alerts</a></p>-->

                </div>
                <div class="col-lg-2">
                    <p><strong>INFORMATION</strong></p>
                    <p><a href="<?= URL('about-us') ?>">About Us</a></p>

                    <p><a href="<?= URL('cv-make') ?>">Articles</a></p>

                    <p><a href="<?= URL('contact') ?>">Contact Us</a></p>
                </div>
                <div class="col-lg-3">
                    <p><strong> JOIN US</strong></p>
                    <ul class="social-network social-circle">
                        <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook-f"></i></a></li>
                        <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <!--<li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>-->
                        <li><a href="#" class="icoGoogle-plus" title="Google-plus"><i class="fa fa-google-plus"></i></a>
                        </li>
                        <!--  <li><a href="#" class="icoMobile-phone" title="Mobile-phone"><i class="fa fa-mobile-phone"></i></a></li>
                          <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>-->
                    </ul>
                    <br> <br>
                    <a href="#"><img src="images/app-store.png" alt="Logo"></a>
                    <a href="#"><img src="images/gplay.png" alt="Logo"></a>
                </div>
            </div>
        </footer>
    </div>
</div>

<a href="#0" class="cd-top">Top</a>
<!-- jQuery -->
<script src="<?= URL('public/bootstrap/js/jquery.js') ?>"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?= URL('public/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?= URL('public/bootstrap/js/main.js') ?>"></script>
<script src="<?= URL('public/bootstrap/js/sweet.js') ?>"></script>
<script src="<?= URL('public/bootstrap/js/custom.js') ?>"></script>
<!-- Script to Activate the Carousel -->
<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
</script>

<script src="<?= URL('public/bootstrap/js/main.js') ?>"></script> <!-- Gem jQuery -->
</body>
</html>
