<!--components/organisms/headerMain.html-->

<header class="headerMain">
    <div class="headerMain__inner">
        <nav class="navMain navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="<?php echo home_url(); ?>">
                        <img class="siteLogo" src="https://aqqky1uzlw43fojehzyf49hx-wpengine.netdna-ssl.com/wp-content/themes/jump-off/img/logo.png">
                    </a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
	                <?php include ATOMIC_MOLECULES . '/navMain.php'?>
                </div>
            </div>
        </nav>
    </div>
</header>








