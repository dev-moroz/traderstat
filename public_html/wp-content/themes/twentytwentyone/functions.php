<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

// function my_stylesheet1(){
// wp_enqueue_style('style-admin',  get_template_directory_uri().'/assets/css/editor-style-classic.css');
// }
// add_action('admin_head', 'my_stylesheet1');


// This theme requires WordPress 5.3 or later.
if ( version_compare( $GLOBALS['wp_version'], '5.3', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twenty_twenty_one_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since Twenty Twenty-One 1.0
	 *
	 * @return void
	 */
	function twenty_twenty_one_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Twenty-One, use a find and replace
		 * to change 'twentytwentyone' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'twentytwentyone', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', 'twentytwentyone' ),
				'footer'  => __( 'Secondary menu', 'twentytwentyone' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width  = 300;
		$logo_height = 100;

		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );
		$background_color = get_theme_mod( 'background_color', 'D1E4DD' );
		if ( 127 > Twenty_Twenty_One_Custom_Colors::get_relative_luminance_from_hex( $background_color ) ) {
			add_theme_support( 'dark-editor-style' );
		}

		$editor_stylesheet_path = './assets/css/style-editor.css';

		// Note, the is_IE global variable is defined by WordPress and is used
		// to detect if the current browser is internet explorer.
		global $is_IE;
		if ( $is_IE ) {
			$editor_stylesheet_path = './assets/css/ie-editor.css';
		}

		// Enqueue editor styles.
		add_editor_style( $editor_stylesheet_path );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => esc_html__( 'Extra small', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XS', 'Font size', 'twentytwentyone' ),
					'size'      => 16,
					'slug'      => 'extra-small',
				),
				array(
					'name'      => esc_html__( 'Small', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'S', 'Font size', 'twentytwentyone' ),
					'size'      => 18,
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__( 'Normal', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'M', 'Font size', 'twentytwentyone' ),
					'size'      => 20,
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__( 'Large', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'L', 'Font size', 'twentytwentyone' ),
					'size'      => 24,
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__( 'Extra large', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XL', 'Font size', 'twentytwentyone' ),
					'size'      => 40,
					'slug'      => 'extra-large',
				),
				array(
					'name'      => esc_html__( 'Huge', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XXL', 'Font size', 'twentytwentyone' ),
					'size'      => 96,
					'slug'      => 'huge',
				),
				array(
					'name'      => esc_html__( 'Gigantic', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XXXL', 'Font size', 'twentytwentyone' ),
					'size'      => 144,
					'slug'      => 'gigantic',
				),
			)
		);

		// Custom background color.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'd1e4dd',
			)
		);

		// Editor color palette.
		$black     = '#000000';
		$dark_gray = '#28303D';
		$gray      = '#39414D';
		$green     = '#D1E4DD';
		$blue      = '#D1DFE4';
		$purple    = '#D1D1E4';
		$red       = '#E4D1D1';
		$orange    = '#E4DAD1';
		$yellow    = '#EEEADD';
		$white     = '#FFFFFF';

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => esc_html__( 'Black', 'twentytwentyone' ),
					'slug'  => 'black',
					'color' => $black,
				),
				array(
					'name'  => esc_html__( 'Dark gray', 'twentytwentyone' ),
					'slug'  => 'dark-gray',
					'color' => $dark_gray,
				),
				array(
					'name'  => esc_html__( 'Gray', 'twentytwentyone' ),
					'slug'  => 'gray',
					'color' => $gray,
				),
				array(
					'name'  => esc_html__( 'Green', 'twentytwentyone' ),
					'slug'  => 'green',
					'color' => $green,
				),
				array(
					'name'  => esc_html__( 'Blue', 'twentytwentyone' ),
					'slug'  => 'blue',
					'color' => $blue,
				),
				array(
					'name'  => esc_html__( 'Purple', 'twentytwentyone' ),
					'slug'  => 'purple',
					'color' => $purple,
				),
				array(
					'name'  => esc_html__( 'Red', 'twentytwentyone' ),
					'slug'  => 'red',
					'color' => $red,
				),
				array(
					'name'  => esc_html__( 'Orange', 'twentytwentyone' ),
					'slug'  => 'orange',
					'color' => $orange,
				),
				array(
					'name'  => esc_html__( 'Yellow', 'twentytwentyone' ),
					'slug'  => 'yellow',
					'color' => $yellow,
				),
				array(
					'name'  => esc_html__( 'White', 'twentytwentyone' ),
					'slug'  => 'white',
					'color' => $white,
				),
			)
		);

		add_theme_support(
			'editor-gradient-presets',
			array(
				array(
					'name'     => esc_html__( 'Purple to yellow', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'purple-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to purple', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'yellow-to-purple',
				),
				array(
					'name'     => esc_html__( 'Green to yellow', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $green . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'green-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to green', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $green . ' 100%)',
					'slug'     => 'yellow-to-green',
				),
				array(
					'name'     => esc_html__( 'Red to yellow', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'red-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to red', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'yellow-to-red',
				),
				array(
					'name'     => esc_html__( 'Purple to red', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'purple-to-red',
				),
				array(
					'name'     => esc_html__( 'Red to purple', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'red-to-purple',
				),
			)
		);

		/*
		* Adds starter content to highlight the theme on fresh sites.
		* This is done conditionally to avoid loading the starter content on every
		* page load, as it is a one-off operation only needed once in the customizer.
		*/
		if ( is_customize_preview() ) {
			require get_template_directory() . '/inc/starter-content.php';
			add_theme_support( 'starter-content', twenty_twenty_one_get_starter_content() );
		}

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support( 'custom-units' );
	}
}
add_action( 'after_setup_theme', 'twenty_twenty_one_setup' );

/**
 * Register widget area.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @return void
 */
function twenty_twenty_one_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'twentytwentyone' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'twentytwentyone' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'twenty_twenty_one_widgets_init' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @global int $content_width Content width.
 *
 * @return void
 */
function twenty_twenty_one_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'twenty_twenty_one_content_width', 750 );
}
add_action( 'after_setup_theme', 'twenty_twenty_one_content_width', 0 );

/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twenty_twenty_one_scripts() {
	// Note, the is_IE global variable is defined by WordPress and is used
	// to detect if the current browser is internet explorer.
	global $is_IE, $wp_scripts;
	if ( $is_IE ) {
		// If IE 11 or below, use a flattened stylesheet with static values replacing CSS Variables.
		wp_enqueue_style( 'twenty-twenty-one-style', get_template_directory_uri() . '/assets/css/ie.css', array(), wp_get_theme()->get( 'Version' ) );
	} else {
		// If not IE, use the standard stylesheet.
		wp_enqueue_style( 'twenty-twenty-one-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
	}

	// RTL styles.
	wp_style_add_data( 'twenty-twenty-one-style', 'rtl', 'replace' );

	// Print styles.
	wp_enqueue_style( 'twenty-twenty-one-print-style', get_template_directory_uri() . '/assets/css/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );

	// Threaded comment reply styles.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Register the IE11 polyfill file.
	wp_register_script(
		'twenty-twenty-one-ie11-polyfills-asset',
		get_template_directory_uri() . '/assets/js/polyfills.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	// Register the IE11 polyfill loader.
	wp_register_script(
		'twenty-twenty-one-ie11-polyfills',
		null,
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
	wp_add_inline_script(
		'twenty-twenty-one-ie11-polyfills',
		wp_get_script_polyfill(
			$wp_scripts,
			array(
				'Element.prototype.matches && Element.prototype.closest && window.NodeList && NodeList.prototype.forEach' => 'twenty-twenty-one-ie11-polyfills-asset',
			)
		)
	);

	// Main navigation scripts.
	// if ( has_nav_menu( 'primary' ) ) {
	// 	wp_enqueue_script(
	// 		'twenty-twenty-one-primary-navigation-script',
	// 		get_template_directory_uri() . '/assets/js/primary-navigation.js',
	// 		array( 'twenty-twenty-one-ie11-polyfills' ),
	// 		wp_get_theme()->get( 'Version' ),
	// 		true
	// 	);
	// }

	// // Responsive embeds script.
	wp_enqueue_script(
		'twenty-twenty-one-responsive-embeds-script',
		get_template_directory_uri() . '/assets/js/responsive-embeds.js',
		array( 'twenty-twenty-one-ie11-polyfills' ),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'twenty_twenty_one_scripts' );

/**
 * Enqueue block editor script.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_block_editor_script() {

	wp_enqueue_script( 'twentytwentyone-editor', get_theme_file_uri( '/assets/js/editor.js' ), array( 'wp-blocks', 'wp-dom' ), wp_get_theme()->get( 'Version' ), true );
}

add_action( 'enqueue_block_editor_assets', 'twentytwentyone_block_editor_script' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function twenty_twenty_one_skip_link_focus_fix() {

	// If SCRIPT_DEBUG is defined and true, print the unminified file.
	if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
		echo '<script>';
		include get_template_directory() . '/assets/js/skip-link-focus-fix.js';
		echo '</script>';
	}

	// The following is minified via `npx terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",(function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())}),!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'twenty_twenty_one_skip_link_focus_fix' );

/** Enqueue non-latin language styles
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twenty_twenty_one_non_latin_languages() {
	$custom_css = twenty_twenty_one_get_non_latin_css( 'front-end' );

	if ( $custom_css ) {
		wp_add_inline_style( 'twenty-twenty-one-style', $custom_css );
	}
}
add_action( 'wp_enqueue_scripts', 'twenty_twenty_one_non_latin_languages' );

// SVG Icons class.
require get_template_directory() . '/classes/class-twenty-twenty-one-svg-icons.php';

// Custom color classes.
require get_template_directory() . '/classes/class-twenty-twenty-one-custom-colors.php';
new Twenty_Twenty_One_Custom_Colors();

// Enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Menu functions and filters.
require get_template_directory() . '/inc/menu-functions.php';

// Custom template tags for the theme.
require get_template_directory() . '/inc/template-tags.php';

// Customizer additions.
require get_template_directory() . '/classes/class-twenty-twenty-one-customize.php';
new Twenty_Twenty_One_Customize();

// Block Patterns.
require get_template_directory() . '/inc/block-patterns.php';

// Block Styles.
require get_template_directory() . '/inc/block-styles.php';

// Dark Mode.
require_once get_template_directory() . '/classes/class-twenty-twenty-one-dark-mode.php';
new Twenty_Twenty_One_Dark_Mode();

/**
 * Enqueue scripts for the customizer preview.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_customize_preview_init() {
	wp_enqueue_script(
		'twentytwentyone-customize-helpers',
		get_theme_file_uri( '/assets/js/customize-helpers.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	wp_enqueue_script(
		'twentytwentyone-customize-preview',
		get_theme_file_uri( '/assets/js/customize-preview.js' ),
		array( 'customize-preview', 'customize-selective-refresh', 'jquery', 'twentytwentyone-customize-helpers' ),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'customize_preview_init', 'twentytwentyone_customize_preview_init' );

/**
 * Enqueue scripts for the customizer.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_customize_controls_enqueue_scripts() {

	wp_enqueue_script(
		'twentytwentyone-customize-helpers',
		get_theme_file_uri( '/assets/js/customize-helpers.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'twentytwentyone_customize_controls_enqueue_scripts' );

/**
 * Calculate classes for the main <html> element.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_the_html_classes() {
	$classes = apply_filters( 'twentytwentyone_html_classes', '' );
	if ( ! $classes ) {
		return;
	}
	echo 'class="' . esc_attr( $classes ) . '"';
}

/**
 * Add "is-IE" class to body if the user is on Internet Explorer.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_add_ie_class() {
	?>
	<script>
	if ( -1 !== navigator.userAgent.indexOf( 'MSIE' ) || -1 !== navigator.appVersion.indexOf( 'Trident/' ) ) {
		document.body.classList.add( 'is-IE' );
	}
	</script>
	<?php
}
add_action( 'wp_footer', 'twentytwentyone_add_ie_class' );





// new function _---_
// 





add_action('after_setup_theme', 'theme_register_nav_menu');
function theme_register_nav_menu() {
	register_nav_menu('top_menu', 'top_menu');
	register_nav_menu('setting_menu', 'setting_menu');
}

add_action('after_setup_theme', 'theme_register_down_nav_menu');
function theme_register_down_nav_menu() {
	register_nav_menu('down_menu', 'down_menu');
}

// настройка меню
function add_additional_class_on_li($classes, $item, $args) {
	if (isset($args->add_li_class)) {
		$classes[] = $args->add_li_class;
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);



wp_enqueue_script('jquery', get_template_directory_uri().'/js/jquery-2.2.3.min.js');
// wp_enqueue_script('jquery', get_template_directory_uri().'/js/js.js');
wp_enqueue_script('jquery2', 'https://snipp.ru/cdn/jquery/2.1.1/jquery.min.js');
// wp_enqueue_script('jquery', get_template_directory_uri() . '/js/js.js');
// wp_enqueue_script('header', get_template_directory_uri() . '/js/header.js');

// wp_enqueue_script('popperjs', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js');
// wp_enqueue_script('bootstrap@5', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js');

// add fonts
wp_enqueue_style('fonts-italic', get_template_directory_uri().'/fonts/geomanist-regular-italic.css');
wp_enqueue_style('fonts', get_template_directory_uri().'/fonts/geomanist-regular.css');

// style bootstarp
wp_enqueue_style('bootstarp', get_template_directory_uri().'/assets/bootstrap/css/bootstrap.min.css');

// style
wp_enqueue_style( 'style_v', get_template_directory_uri() . '/style.css');



// удаляем приветсвенное сообщение
remove_action('welcome_panel', 'wp_welcome_panel');

// open login popup
function footer_enqueue_scripts_logo() {
	wp_enqueue_script('header_v1', get_template_directory_uri().'/js/header.js');
}
add_action('wp_footer', 'footer_enqueue_scripts_logo');

// open FAQ div
function footer_enqueue_scripts_after() {
	wp_enqueue_script('faq', get_template_directory_uri().'/js/faq.js');
}

//slide table traders
function footer_enqueue_scripts_searchTraders() {
	wp_enqueue_script('searchTraders', get_template_directory_uri().'/js/search-traders.js');
}



//tinkoff_pay popup
function tinkoff_pay_popup() {
	wp_enqueue_script('tinkoff_pay_popup', get_template_directory_uri().'/js/tinkoff_pay_popup.js');
}
function login_popup(){
	wp_enqueue_style( 'style_v', get_template_directory_uri() . '/style.css');
}


// register custom post & taxonomy
add_action('init', 'my_custom_init');
function my_custom_init() {
	register_post_type('faq', array(
			'labels'              => array(
				'name'               => 'Faq', // Основное название типа записи
				'singular_name'      => 'Faq', // отдельное название записи типа Book
				'add_new'            => 'Добавить faq',
				'add_new_item'       => 'Добавить новую faq',
				'edit_item'          => 'Редактировать faq',
				'new_item'           => 'Новая faq',
				'view_item'          => 'Посмотреть faq',
				'search_items'       => 'Найти faq',
				'not_found'          => 'Книг не найдено',
				'not_found_in_trash' => 'В корзине книг не найдено',
				'parent_item_colon'  => '',
				'menu_name'          => 'Faq',

			),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => true,
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array('title', 'editor'),
		));
}

add_action('init', 'my_custom_init_stars');
function my_custom_init_stars() {
	register_post_type('stars', array(
			'labels'              => array(
				'name'               => 'stars', // Основное название типа записи
				'singular_name'      => 'stars', // отдельное название записи типа Book
				'add_new'            => 'Добавить stars',
				'add_new_item'       => 'Добавить новую stars',
				'edit_item'          => 'Редактировать stars',
				'new_item'           => 'Новая stars',
				'view_item'          => 'Посмотреть stars',
				'search_items'       => 'Найти stars',
				'not_found'          => 'Книг не найдено',
				'not_found_in_trash' => 'В корзине книг не найдено',
				'parent_item_colon'  => '',
				'menu_name'          => 'stars',

			),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => true,
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array('title', 'editor'),
		));
}

add_action('init', 'my_custom_init_blog');
function my_custom_init_blog() {
	register_post_type('blog', array(
			'labels'              => array(
				'name'               => 'blog', // Основное название типа записи
				'singular_name'      => 'blog', // отдельное название записи типа Book
				'add_new'            => 'Добавить blog',
				'add_new_item'       => 'Добавить новую blog',
				'edit_item'          => 'Редактировать blog',
				'new_item'           => 'Новая blog',
				'view_item'          => 'Посмотреть blog',
				'search_items'       => 'Найти blog',
				'not_found'          => 'Книг не найдено',
				'not_found_in_trash' => 'В корзине книг не найдено',
				'parent_item_colon'  => '',
				'menu_name'          => 'blog',

			),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => true,
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array('title', 'editor', 'thumbnail'),
		));
}

add_action('init', 'my_custom_init_traders');
function my_custom_init_traders() {
	register_post_type('Traders', array(
			'labels'              => array(
				'name'               => 'Traders', // Основное название типа записи
				'singular_name'      => 'Traders', // отдельное название записи типа Book
				'add_new'            => 'Добавить Traders',
				'add_new_item'       => 'Добавить новую Traders',
				'edit_item'          => 'Редактировать Traders',
				'new_item'           => 'Новая Traders',
				'view_item'          => 'Посмотреть Traders',
				'search_items'       => 'Найти Traders',
				'not_found'          => 'Книг не найдено',
				'not_found_in_trash' => 'В корзине книг не найдено',
				'parent_item_colon'  => '',
				'menu_name'          => 'Traders',

			),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => true,
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array('title', 'editor', 'thumbnail'),
		));
}

// хук для регистрации
add_action('init', 'create_taxonomy');
function create_taxonomy() {

	register_taxonomy('taxonomy', ['post'], [
			'label'              => '', // определяется параметром $labels->name
			'labels'             => [
				'name'              => 'Genres',
				'singular_name'     => 'Genre',
				'search_items'      => 'Search Genres',
				'all_items'         => 'All Genres',
				'view_item '        => 'View Genre',
				'parent_item'       => 'Parent Genre',
				'parent_item_colon' => 'Parent Genre:',
				'edit_item'         => 'Edit Genre',
				'update_item'       => 'Update Genre',
				'add_new_item'      => 'Add New Genre',
				'new_item_name'     => 'New Genre Name',
				'menu_name'         => 'Genre',
			],
			'description'  => '', // описание таксономии
			'public'       => true,
			'hierarchical' => false,

			'rewrite' => true,
			//'query_var'             => $taxonomy, // название параметра запроса
			'capabilities'      => array(),
			'meta_box_cb'       => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
			'show_admin_column' => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
			'show_in_rest'      => null, // добавить в REST API
			'rest_base'         => null, // $taxonomy
		]);
}


//  widget

function register_my_widgets() {
	register_sidebar(array(
			'name'         => "Правая боковая панель сайта",
			'id'           => 'right-sidebar',
			'description'  => 'Эти виджеты будут показаны в правой колонке сайта',
			'before_title' => '<h2>',
			'after_title'  => '</h2>',
		));
}
add_action('widgets_init', 'register_my_widgets');

// register excerpt length and ...
add_filter('excerpt_length', function () {
		return 20;
	});

add_filter('excerpt_more', function ($more) {
		return '...';
	});

// ================================================================
// ============== вывод таблицы на странице homepage ==============
// ================================================================

// connect to new bd
$mysqli = new mysqli('92.53.96.174', 'cr08935_0', '5cKV13BP', 'cr08935_0');


function connect_to_out_bd_01($name_block){

global $mysqli;

		if (mysqli_connect_errno()) {
		   printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error());
		   exit;
		}

	if ($name_block === 'slider-row') {

		if ($result = $mysqli->query('SELECT * FROM traders_table_home LIMIT 0,10' )){  ?>

			<table class="info_table tablesorter {sortlist: [[1,0]]}" id="myTable">
				<thead>
					<tr class="color_table_title">
						<th class="sortless">Trader name</th>
						<th>Number of ideas</th>
						<th>Successful ideas</th>
						<th>Successful percentage</th>
					</tr>
				</thead>
				<tbody>

					<?php    while( $row = $result->fetch_assoc() ){  ?>
						<tr class="color_table">
							<td class="info_table_name"><?php print($row['trader_name']); ?></td>
							<td><?php print($row['number_of_ideas']); ?></td>
							<td><?php print($row['success_ideas']); ?></td>
							<td><?php print($row['success_percentage']); ?> %</td>
						</tr>

					<?php } ?>

				</tbody>
			</table>

		    

		    <?php } 


// end if
    }else{

		if ($result = $mysqli->query('SELECT * FROM traders_table_home')){  ?>
      <div class="block_signals w100">
            <h4 style="text-align: left;">Top Traders</h4>
              <br><hr>

    <?php  while( $row = $result->fetch_assoc() ){  ?>
      
    	<h5 style="text-align: left; color: #039cfc;"><?php print($row['trader_name']); ?></h5>

    	<div class="block_sigbals_num">
    		<div class="opacity07">Number of ideas</div>
    		<div><?php print($row['number_of_ideas']); ?></div>
    	</div>
    	<div class="block_sigbals_num">
    		<div class="opacity07">Successful ideas</div>
    		<div><?php print($row['success_ideas']); ?></div>
    	</div>
    	<div class="block_sigbals_num">
    		<div class="opacity07">Successful percentage</div>
    		<div><?php print($row['success_percentage']); ?> %</div>
    	</div><br>

    <?php } ?>
     <hr><br>
    <?php }


// end else
    }
};



function status_ideas(){

	global $mysqli;

		if (mysqli_connect_errno()) {
		   printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error());
		   exit;
		}


	if ($result = $mysqli->query('SELECT * FROM ideas')){  ?>


	<table class="info_table table_sort tablesorter {sortlist: [[1,0]]}">
							<thead>
								<tr class="color_table_title">
									<th class="sortless">Idea’s name</th>
									<th>Idea’s date</th>
									<th class="sortless">Successful / Not successful</th>
									<th class="sortless">Vote</th>
									<th class="sortless">

<!-- количество строк в таблице --> <?php echo $result->num_rows; ?>

									</th>
								</tr>
							</thead>
							<tbody>

								<?php while( $row = $result->fetch_assoc()){  ?>
										<tr class="color_table" >
											<td><?php print($row['ideas_name']); ?></td>
											<td style="opacity: .6"><?php print($row['ideas_date']); ?></td>		

											<?php if ( ($row['vote_plus']) > ($row['vote_minus'])) {
												    ?>  <td style="color: #00b647">Successful</td>  <?php
												} else { 
													?>  <td style="color: red">Failed</td>  <?php 
											} ?>

											<td style="padding: 0;">
												<table style="margin: 0; background: none;">
													<tr>
														<td style="padding:0; min-width: 90px;">
															<button class="info_table_plus" style="margin-right: 10px;">+</button><?php print($row['vote_plus']); ?>
														</td>
														<td style="padding:0; min-width: 90px;">
															<button class="info_table_minus" style="margin-right: 10px;">-</button><?php print($row['vote_minus']); ?>
														</td>
													</tr>
												</table>
												<?php print($row['id']); ?>

											</td>

											<td><div href="#" class="info_table_popup">i
												<div class="info_table_popup_message">
													<h4 style="color: #000;">Vote for Idea 🔥</h4>
													<p style="text-align: left;">
														Our automated algorithms have small prediction error. If you find inaccuracy in prediction result, you can vote to clarify it.
													</p>
												</div>
											</div></td>
										</tr>
								<?php } ?>

								</tbody>
							</table>

				<?php } 

};


function text($text){
	echo $text;  
};


function update_ideas_data($id, $plus){
	global $mysqli;

}

function text2(){
	
};


// woocommerce 

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

/** УБРАТЬ ИЗ ШАПКИ МЕТАТЕГИ (исходный код) строку **/
add_action( 'init', 'remove_custom_action' );
function remove_custom_action(){
remove_action( 'wp_head', 'wc_gallery_noscript' );
}
/** УБРАТЬ ИЗ ШАПКИ МЕТАТЕГИ **/


/** Отключаем стили CSS плагина WOOCOMMERCE - добавим этот код в функции WOOCOMMERCE **/
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
// проба add_filter( 'woocommerce_enqueue_assets', '__return_empty_array' );





