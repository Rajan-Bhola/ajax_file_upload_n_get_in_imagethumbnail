<?php
/**
 * accesspress_parallax functions and definitions
 *
 * @package accesspress_parallax
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'accesspress_parallax_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function accesspress_parallax_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on accesspress_parallax, use a find and replace
	 * to change 'accesspress_parallax' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'accesspress-parallax', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Add Support WooCommerce
	add_theme_support( 'woocommerce' );

	/**
	 * Add callback for custom TinyMCE editor stylesheets. (editor-style.css)
	 * @see http://codex.wordpress.org/Function_Reference/add_editor_style
	 */
	add_editor_style('css/editor-style.css');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'blog-header', 900, 300, array('center','center')); //blog Image
	add_image_size( 'portfolio-thumbnail', 560, 450, array('center','center')); //Portfolio Image
    add_image_size( 'blog-thumbnail', 480, 300, array('center','center')); //Blog Image	
	add_image_size( 'team-thumbnail', 380, 380, array('top','center')); //Portfolio Image

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'accesspress-parallax' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'accesspress_parallax_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // accesspress_parallax_setup
add_action( 'after_setup_theme', 'accesspress_parallax_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function accesspress_parallax_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'accesspress-parallax' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer One', 'accesspress-parallax' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Two', 'accesspress-parallax' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Three', 'accesspress-parallax' ),
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Four', 'accesspress-parallax' ),
		'id'            => 'footer-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'accesspress_parallax_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function accesspress_parallax_scripts() {
	$query_args = array(
		'family' => 'Roboto:400,300,500,700|Oxygen:400,300,700',
	);
	wp_enqueue_style( 'accesspress-parallax-google-fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ) );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'jquery-bxslider', get_template_directory_uri() . '/css/jquery.bxslider.css' );
	wp_enqueue_style( 'nivo-lightbox', get_template_directory_uri() . '/css/nivo-lightbox.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css' );
    wp_enqueue_style('accesspress-parallax-woocommerce',get_template_directory_uri().'/woocommerce/ap-parallax-style.css');
	wp_enqueue_style( 'accesspress-parallax-style', get_stylesheet_uri() );
	if(of_get_option('enable_responsive') == 1) :
		wp_enqueue_style( 'accesspress-parallax-responsive', get_template_directory_uri() . '/css/responsive.css' );
	endif;
	
	if (of_get_option('enable_animation') == '1' && is_front_page()) :
        wp_enqueue_script('wow', get_template_directory_uri() . '/js/wow.js', array('jquery'), '1.0', true);
    endif;

	wp_enqueue_script( 'smoothscroll', get_template_directory_uri() . '/js/SmoothScroll.js', array('jquery'), '1.2.1', true );
    wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/parallax.js', array('jquery'), '1.1.3', true );
	wp_enqueue_script( 'scrollto', get_template_directory_uri() . '/js/jquery.scrollTo.min.js', array('jquery'), '1.4.14', true );
	wp_enqueue_script( 'jquery-localscroll', get_template_directory_uri() . '/js/jquery.localScroll.min.js', array('jquery'), '1.3.5', true );
	wp_enqueue_script( 'accesspress-parallax-parallax-nav', get_template_directory_uri() . '/js/jquery.nav.js', array('jquery'), '2.2.0', true );
	wp_enqueue_script( 'jquery-bxslider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), '4.2.1', true );
	wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/js/jquery.easing.min.js', array('jquery'), '1.3', true );
	wp_enqueue_script( 'jquery-fitvid', get_template_directory_uri() . '/js/jquery.fitvids.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'jquery-actual', get_template_directory_uri() . '/js/jquery.actual.min.js', array('jquery'), '1.0.16', true );
	wp_enqueue_script( 'nivo-lightbox', get_template_directory_uri() . '/js/nivo-lightbox.min.js', array('jquery'), '1.2.0', true );
	wp_enqueue_script( 'accesspress-parallax-custom', get_template_directory_uri() . '/js/custom.js', array('jquery','jquery-ui-datepicker'), '1.0', true );
	wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/js/profile.js', array('jquery') );

	// in JavaScript, object properties are accessed as ajax_object.ajax_url, ajax_object.we_value
	wp_localize_script( 'ajax-script', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	
			

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'accesspress_parallax_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/accesspress-header.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/accesspress-functions.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Plugin installation file.
 */
require get_template_directory() . '/inc/accesspress-plugin-activation.php';

/**
 * Load Theme Option Frame work files
 */
require get_template_directory() . '/inc/options-framework/options-framework.php';

/**
 * Load More Theme Page
 */
require get_template_directory() . '/inc/more-themes.php';

/**
 * Load woocommerce function
 * */
require get_template_directory().'/woocommerce/ap-parallax-woocommerce-function.php';

function accesspress_parallax_ajax_script(){
	 wp_localize_script( 'accesspress-parallax-ajax', 'ajax_script', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )) );
     wp_enqueue_script( 'accesspress-parallax-ajax', get_template_directory_uri().'/inc/options-framework/js/ajax.js', 'jquery', true);

}
add_action('admin_enqueue_scripts', 'accesspress_parallax_ajax_script');

function accesspress_parallax_get_my_option(){
	require get_template_directory() . '/inc/ajax.php';
	die();
}

add_action("wp_ajax_get_my_option", "accesspress_parallax_get_my_option");

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/options-framework/' );

// Our custom post type function
function create_posttype() {

	register_post_type( 'Profile Dashboard',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Profile Dashboard' ),
				'singular_name' => __( 'Profile Dashboard' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'Profile Dashboard'),
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );

/*
* Creating a function to create our CPT
*/

function custom_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Profile Dashboard', 'Post Type General Name', 'twentythirteen' ),
		'singular_name'       => _x( 'Profile Dashboard', 'Post Type Singular Name', 'twentythirteen' ),
		'menu_name'           => __( 'Profile Dashboard', 'twentythirteen' ),
		'parent_item_colon'   => __( 'Parent Profile Dashboard', 'twentythirteen' ),
		'all_items'           => __( 'All Profile Dashboard', 'twentythirteen' ),
		'view_item'           => __( 'View Profile Dashboard', 'twentythirteen' ),
		'add_new_item'        => __( 'Add New Profile Dashboard', 'twentythirteen' ),
		'add_new'             => __( 'Add New', 'twentythirteen' ),
		'edit_item'           => __( 'Edit Profile Dashboard', 'twentythirteen' ),
		'update_item'         => __( 'Update Profile Dashboard', 'twentythirteen' ),
		'search_items'        => __( 'Search Profile Dashboard', 'twentythirteen' ),
		'not_found'           => __( 'Not Found', 'twentythirteen' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'Profile Dashboard', 'twentythirteen' ),
		'description'         => __( 'Profile Dashboard reviews', 'twentythirteen' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'genres' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	
	// Registering your Custom Post Type
	register_post_type( 'Profile Dashboard', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'custom_post_type', 0 );

add_action( 'wp_ajax_nopriv_update_profile', 'update_profile' ,true );
add_action( 'wp_ajax_update_profile', 'update_profile' , true);

function update_profile(){
	$user_id = get_current_user_id();
	$result = array('error'=>'0','msg'=>'');
	
	 foreach ($_POST as $key => $val)
			  {
				  update_user_meta( $user_id, $key, $val );
				  
			  }
			  echo json_encode($result);
}


add_action( 'wp_ajax_nopriv_update_bank', 'update_bank' ,true );
add_action( 'wp_ajax_update_bank', 'update_bank' , true);



function update_bank(){
$user_id = get_current_user_id();
$check = wp_get_attachment_url($user_last['attach_account_no'][0]);
	$result = array('error'=>0);
	if($_FILES['file']['error'] == 0){
		if ( ! function_exists( 'wp_handle_upload' ) ) {
    		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		}

		$uploadedfile = $_FILES['file'];

		$upload_overrides = array( 'test_form' => false );

		$movefile = wp_handle_upload( $uploadedfile, $upload_overrides );

		if ( $movefile && ! isset( $movefile['error'] ) ) {
			
			$wp_upload_dir = wp_upload_dir();
			
			$attachment = array(
			'guid' => $wp_upload_dir['url'] . '/' . basename($movefile['file']),
			'post_mime_type' => $movefile['type'],
			'post_title' => preg_replace( '/\.[^.]+$/','', basename($movefile['file']) ),
			'post_content' => '',
			'post_status' => 'inherit'
			);
			$attach_id = wp_insert_attachment($attachment, $movefile['file']);

			// Assign the file as the featured image
			update_field('attach_account_no', $attach_id, 'user_'.$user_id);
			
		    $result = array('error'=>0,'img_url'=>$movefile["url"]);
		    
		} else if(isset($check)){
			$result = array('error'=>0);
			}
			else {
		    /**
		     * Error generated by _wp_handle_upload()
		     * @see _wp_handle_upload() in wp-admin/includes/file.php
		     */
		    $result = array('error'=>1,'error_name'=>$movefile['error']);
		}
	}
	else
	{
         $result = array('error'=>1,'error_name'=>'Please try again later!');
	 }
	
	update_user_meta( $user_id, 'holder_name', $_POST['holder_name']);
	update_user_meta( $user_id, 'account_no', $_POST['account_no']);
	update_user_meta( $user_id, 'bank_name', $_POST['bank_name']);
	update_user_meta( $user_id, 'bank_branch', $_POST['bank_branch']);
	update_user_meta( $user_id, 'ifsc_code', $_POST['ifsc_code']);
	echo json_encode($result);
	die();
	
}
add_action( 'wp_ajax_nopriv_update_pan', 'update_pan' ,true );
add_action( 'wp_ajax_update_pan', 'update_pan' , true);

function update_pan(){
	$user_id = get_current_user_id();
	$check = wp_get_attachment_url($user_last['attach_pan_card'][0]);
	$result = array('error'=>0);
	if($_FILES['file']['error'] == 0){
		if ( ! function_exists( 'wp_handle_upload' ) ) {
    		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		}

		$uploadedfile = $_FILES['file'];

		$upload_overrides = array( 'test_form' => false );

		$movefile = wp_handle_upload( $uploadedfile, $upload_overrides );

		if ( $movefile && ! isset( $movefile['error'] ) ) {
			
			$wp_upload_dir = wp_upload_dir();
			
			$attachment = array(
			'guid' => $wp_upload_dir['url'] . '/' . basename($movefile['file']),
			'post_mime_type' => $movefile['type'],
			'post_title' => preg_replace( '/\.[^.]+$/','', basename($movefile['file']) ),
			'post_content' => '',
			'post_status' => 'inherit'
			);
			$attach_id = wp_insert_attachment($attachment, $movefile['file']);

			// Assign the file as the featured image
			update_field('attach_pan_card', $attach_id, 'user_'.$user_id);
			
		    $result = array('error'=>0,'img_url'=>$movefile["url"]);
		    
		} else if(isset($check)){
			$result = array('error'=>0);
			}else{
		    /**
		     * Error generated by _wp_handle_upload()
		     * @see _wp_handle_upload() in wp-admin/includes/file.php
		     */
		    $result = array('error'=>1,'error_name'=>$movefile['error']);
		}
	}else{
         $result = array('error'=>1,'error_name'=>'Please try again later!');
	 }
	

	update_user_meta( $user_id, 'pan_number', $_POST['pan_number']);
	
	echo json_encode($result);
	die();
	}

	