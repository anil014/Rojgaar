<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="logo-img">
                <img src="<?= URL('public/icons/logo.png') ?>" class="img-responsive" alt="Jobboard Logo">
            </div>

        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="<?= URL() ?>">Home</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Job Seeker <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">Post Resume</a>
                        </li>


                        <li>
                            <a href="<?= URL('show-all-jobs') ?>">show all jobs</a>
                        <li>
                            <a href="<?= URL('register') ?>">Register</a>
                        </li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Recruiter <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        

                        <li>
                            <a href="<?= URL('company-register') ?>">Register</a>
                        </li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Resources <b class="caret"></b></a>
                    <ul class="dropdown-menu">

                        <li>
                            <a href="<?= URL('cv-make') ?>">Articles</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?= URL('contact') ?>">Contact Us</a>
                </li>
                <?php if (isset($_SESSION['username'])) : ?>
                    <li>
                        <a href="<?= URL('logout.php') ?>" style="color: red;">Logout</a>
                    </li>

                <?php endif; ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
