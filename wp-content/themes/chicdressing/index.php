<?php

get_header();

if ( is_home() ) {

	// Featured Slider, Carousel
	if ( ashe_options( 'featured_slider_label' ) === true && ashe_options( 'featured_slider_location' ) !== 'front' ) {
		if ( ashe_options( 'featured_slider_source' ) === 'posts' ) {
			get_template_part( 'templates/header/featured', 'slider' );
		} else {
			get_template_part( 'templates/header/featured', 'slider-custom' );
		}
	}

	// Featured Links, Banners
	if ( ashe_options( 'featured_links_label' ) === true && ashe_options( 'featured_links_location' ) !== 'front' ) {
		get_template_part( 'templates/header/featured', 'links' );
	}

	// On ajoute les derniers produits
	?>
	<div id="chic-products"  class="boxed-wrapper clear-fix">
		<h2 class="chic-title">Dernières pièces</h2>

		<?php

		//Modifications des H2 en H3
 		function wps_change_products_title() {
 		echo '<h3 class="woocommerce-loop-product__title">'. get_the_title() . '</h3>';
		}
		remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
		add_action('woocommerce_shop_loop_item_title', 'wps_change_products_title', 10);

		//Faire apparaître les produits woocommerce
		echo do_shortcode('[products orderby="date" columns="3" order="ASC"]');
		?>

		<p class="text-center"><a class="chic-bouton" href="/shop">Voir toute la collection</a></p>
	</div>
	
	<!-- on inclut la Google Maps de la Fashion Week -->
	<div id="chic-fashionweek-map" class="boxed-wrapper clear-fix" style="margin-top:30px">
		<h2 class="chic-title">La FashionMap - été 2022 </h2>
		<iframe src="https://www.google.com/maps/d/embed?mid=1SU-W19k76UkTXASeT7PnGAyDYCY&hl=en_US&ehbc=2E312F" width="100%" height="480" title="Carte GPS"></iframe>';
	</div>
	<?php

}

?>

<div class="main-content clear-fix<?php echo esc_attr(ashe_options( 'general_content_width' )) === 'boxed' ? ' boxed-wrapper': ''; ?>" data-layout="<?php echo esc_attr( ashe_options( 'general_home_layout' ) ); ?>" data-sidebar-sticky="<?php echo esc_attr( ashe_options( 'general_sidebar_sticky' ) ); ?>">

	<?php

	// Sidebar Left
	get_template_part( 'templates/sidebars/sidebar', 'left' );

	// Blog Feed Wrapper

	if ( strpos( ashe_options( 'general_home_layout' ), 'list' ) === 0 ) {
		get_template_part( 'templates/grid/blog', 'list' );
	} else {
		get_template_part( 'templates/grid/blog', 'grid' );
	}

	// Sidebar Right
	get_template_part( 'templates/sidebars/sidebar', 'right' );

	?>

</div>

<?php get_footer(); ?>
