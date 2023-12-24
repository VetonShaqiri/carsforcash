<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	

</script>
	
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Techblend Caffe">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.cdnfonts.com/css/goodmarker" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
     <?php wp_head(); ?>
		
</head>
<body <?php body_class();?>>


<section class="header" id="myHeader">
        <div class="on_line">
            <div class="logo">
                <?php the_custom_logo();?>
            </div>
            <div class="nav_menu">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="three">
                        <div class="hamburger" id="hamburger-1">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                        </div>
                    </div>
                </button>
                <nav class="navbar navbar-expand-md navbar-dark menustyle">
                    <div class="collapse navbar-collapse" id="navbarsExample04">
                        <?php wp_nav_menu(array(
                        'theme_location'=> 'main_menu',
                        'menu_class'    => 'navbar-nav',
                        'menu'          => 'primary'
                        )); 
                        ?>
                    </div>
                </nav>
            </div>
        </div>
</section>
