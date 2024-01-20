<!DOCTYPE HTML>
<html <?php language_attributes(); ?>
<head>
    <!--wyswietlenie w sekcji title html-->
    <title><?php wp_title(''); ?></title>

    <meta charset="<?php bloginfo('charset'); ?>"/><!--dynamizacja strony kodowej tutaj utf8-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-LCyMs/SyeoZNVlBD5fBnbwW8tVILP5huT2exdFU5bsz/g7IoU0af02uTNPZsT3qN" crossorigin="anonymous">

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/><!--zwraca adres pingback-->
    <!-- Naprawia stronę w przeglądarkach Internet Explorer starszych od wersji 9 nie wyswietljacych html5
         by Remy Sharp http://remysharp.com/2009/01/07/html5-enabling-script/ -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php
    // Wywołanie funkcji wp_head() powinno znajdować się przed znacznikiem zamykającym nagłówek
    wp_head();
    ?>
</head>
<body <?php body_class(); ?>>
<!-- Navbar -->
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
            </button>
        </div>
        <?php if (has_nav_menu('primary')): ?>
        <div class="collapse navbar-collapse" id="myNavbar">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => 'div',
                'container_id' => '',
                'container_class' => '',
                'menu_id' => false,
                'menu_class' => 'navbar-nav mr-auto',
                'depth' => 3,
                'walker' => new mywptheme_navwalker()
            ));
            ?>
        </div>
    </div>
    <?php endif; ?>
</nav>
<!-- First Container -->
<div class="container-fluid bg-1 text-center">
    <h3 id="site-title" class="margin">
        <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
            <!--zwrocenie nazwy szablonu i adresu-->
            <?php bloginfo('name'); ?>
        </a>
    </h3>
    <img src=" <?php echo get_template_directory_uri().'/inc/assets/images/bird.jpg'?>" class="img-responsive img-circle margin" style="display:inline" alt="Bird" width="350"
         height="350">
    <h3><?php bloginfo('description'); ?></h3>
</div>
