<?php 
ob_start();
global $SSR_VAN;
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title><?php /*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'Samsara' ), max( $paged, $page ) );?></title>
	<meta name="description" content="">
    
    <?php if(!isset($SSR_VAN['isResponsive']) || $SSR_VAN['isResponsive']==1){?>
	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php }?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" media="all" />

	<!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
    <![endif]-->

    <?php wp_head();?>
</head>
<body <?php body_class();?>>
    <!-- Slide Down
    ================================================== -->
    <?php get_template_part('content','slidedown');?>


	<!-- Primary Page Layout
	================================================== -->
    <header id="top">
        <h1 id="logo"><a href="<?php echo home_url();?>" title="<?php bloginfo('title');?>"></a></h1>
        
        <div class="tools">
           <ul>            
             <li class="menu"><a href="javascript:void(0);" title="<?php _e('Menu','Samsara');?>"><?php _e('Menu','Samsara');?></a></li>
             <?php if(!isset($SSR_VAN['hide_search']) || $SSR_VAN['hide_search']<>0):?>
             <li class="search"><a href="javascript:void(0);" title="<?php _e('Search','Samsara');?>"><?php _e('Search','Samsara');?></a></li>
             <?php endif;?>
             <?php if(is_plugin_active('woocommerce/woocommerce.php')):?>
             <li class="cart"><a href="javascript:void(0);" title="<?php _e('Cart','Samsara');?>"><?php _e('Cart','Samsara');?></a></li>
             <li class="account"><a href="<?php echo home_url();?>/?page_id=<?php echo get_option('woocommerce_myaccount_page_id');?>" title="<?php _e('Account','Samsara');?>"><?php _e('Account','Samsara');?></a></li>
           <?php endif;?>
           </ul>
         </div>
        
        <nav id="primary-menu">
		  <?php wp_nav_menu(array(
				  'theme_location' => 'primary_navi',
				  'container' => '',
				  'menu_class' => 'sf-menu',
				  'echo' => true,
				  'fallback_cb' => 'van_default_menu',
                  'depth' => 4) );
		 ?>
         </nav>
   </header>