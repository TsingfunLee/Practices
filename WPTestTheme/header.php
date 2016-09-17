<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="<?php bloginfo('description'); ?>"/>
    <meta name="keywords" content="<?php bloginfo('description'); ?>"/>
    <title><?php bloginfo('name'); ?></title>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" media="screen"/>
	<!-- Font-Awesome -->
	<link href="http://cdn.bootcss.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<!-- Style.css -->
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css" media="screen"/>
	
    <?php //wp_head(); ?>
</head>

<body>
<div id="page"> <!-- .site -->
    <header>
        <nav class="navbar navbar-default navbar-inverse mynav-color">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand  myfont-white" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
					<div class="header-tack"><i class="icon icon-pushpin"></i></div>
					<a  class="static-btn tack-none" href="javascript:;" id="static"></a>
				</div>

                <!-- Collect the nav links, forms, and other content for toggling -->
				
				<div class="collapse navbar-collapse "  id="bs-example-navbar-collapse-1">
					<div class="header-about menu-about"><?php wp_nav_menu( array('menu_class' => 'nav navbar-nav header-btn', 'menu_id' => 'header-btn','container'=>'div') ); ?></div>
					
				</div>
	

            </div><!-- /.container-fluid -->
        </nav>
    </header>

    <div id="content" class='mybg'> <!-- .site content -->