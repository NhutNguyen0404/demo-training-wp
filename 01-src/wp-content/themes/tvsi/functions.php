<?php
/**
 * tvsi functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package tvsi
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tvsi_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on tvsi, use a find and replace
		* to change 'tvsi' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'tvsi', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'tvsi' ),
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
			'tvsi_custom_background_args',
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
add_action( 'after_setup_theme', 'tvsi_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tvsi_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tvsi_content_width', 640 );
}
add_action( 'after_setup_theme', 'tvsi_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tvsi_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'tvsi' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'tvsi' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_custom_posts();
}

function register_custom_posts()
{
	register_post_product();
	register_post_news();
}

function register_post_product()
{
	/*
     * Biến $label để chứa các text liên quan đến tên hiển thị của Post Type trong Admin
     */
	$label = array(
		'name' => 'Sản Phẩm', //Tên post type dạng số nhiều
		'singular_name' => 'Sản phẩm' //Tên post type dạng số ít
	);


	/*
     * Biến $args là những tham số quan trọng trong Post Type
     */
	$args = array(
		'labels' => $label, //Gọi các label trong biến $label ở trên
		'description' => 'Post type đăng sản phẩm', //Mô tả của post type
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'author',
			'thumbnail',
			'comments',
			'trackbacks',
			'revisions',
			'custom-fields'
		), //Các tính năng được hỗ trợ trong post type
		'taxonomies' => array( 'category' ), //Các taxonomy được phép sử dụng để phân loại nội dung,  'post_tag'
		'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
		'public' => true, //Kích hoạt post type
		'show_ui' => true, //Hiển thị khung quản trị như Post/Page
		'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
		'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
		'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
		'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
		'menu_icon' => 'dashicons-admin-post', //Đường dẫn tới icon sẽ hiển thị
		'can_export' => true, //Có thể export nội dung bằng Tools -> Export
		'has_archive' => true, //Cho phép lưu trữ (month, date, year)
		'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
		'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
		'capability_type' => 'post' //
	);


	register_post_type('sanpham', $args); //Tạo post type với slug tên là sanpham và các tham số trong biến $args ở trên
}

function register_post_news()
{
	/*
     * Biến $label để chứa các text liên quan đến tên hiển thị của Post Type trong Admin
     */
	$label = array(
		'name' => 'Tin Tức 2', //Tên post type dạng số nhiều
		'singular_name' => 'Tin Tức 2' //Tên post type dạng số ít
	);

	$rewrite = array(
		'slug'                  => false,
		'with_front'            => false,
		'pages'                 => false,
		'feeds'                 => false,
	);


	/*
     * Biến $args là những tham số quan trọng trong Post Type
     */
	$args = array(
		'labels' => $label, //Gọi các label trong biến $label ở trên
		'description' => 'Post type đăng tin tức', //Mô tả của post type
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'author',
			'thumbnail',
			'comments',
			'trackbacks',
			'revisions',
			'custom-fields'
		), //Các tính năng được hỗ trợ trong post type
		'taxonomies' => array( 'category' ), //Các taxonomy được phép sử dụng để phân loại nội dung,  'post_tag'
		'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
		'public' => true, //Kích hoạt post type
		'show_ui' => true, //Hiển thị khung quản trị như Post/Page
		'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
		'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
		'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
		'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
		'menu_icon' => 'dashicons-admin-post', //Đường dẫn tới icon sẽ hiển thị
		'can_export' => true, //Có thể export nội dung bằng Tools -> Export
		'has_archive' => true, //Cho phép lưu trữ (month, date, year)
		'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
		'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
		'capability_type' => 'post', //,
		'rewrite'               => $rewrite,
	);


	register_post_type('news', $args); //Tạo post type với slug tên là sanpham và các tham số trong biến $args ở trên
}

/* Meta box setup function. */
function smashing_post_meta_boxes_setup()
{

    /* Add meta boxes on the 'add_meta_boxes' hook. */
    add_action('add_meta_boxes', 'smashing_add_post_meta_boxes');

	/* Save post meta on the 'save_post' hook. */
	add_action( 'save_post', 'smashing_save_post_class_meta', 10, 2 );
}

/* Create one or more meta boxes to be displayed on the post editor screen. */
function smashing_add_post_meta_boxes()
{
    add_meta_box(
        'smashing-post-class',      // Unique ID
        esc_html__('Post Class', 'example'),    // Title
        'smashing_post_class_meta_box',   // Callback function
        'sanpham',         // Admin page (or post type)
        'normal',         // Context
        'default'         // Priority,
    );
}

/* Display the post meta box. */
function smashing_post_class_meta_box($post)
{ ?>
    <?php wp_nonce_field(basename(__FILE__), 'smashing_post_class_nonce'); ?>

    <p>
        <label for="smashing-post-class"><?php _e("Add a custom CSS class, which will be applied to WordPress' post class.", 'example'); ?></label>
        <br />
        <input class="widefat" type="text" name="smashing-post-class" id="smashing-post-class" value="<?php echo esc_attr(get_post_meta($post->ID, 'smashing_post_class', true)); ?>" size="30" />
    </p>
<?php }

/* Save the meta box’s post metadata. */
function smashing_save_post_class_meta($post_id, $post)
{

	/* Verify the nonce before proceeding. */
	if (!isset($_POST['smashing_post_class_nonce']) || !wp_verify_nonce($_POST['smashing_post_class_nonce'], basename(__FILE__))) {
		return $post_id;
	}

	/* Get the post type object. */
	$post_type = get_post_type_object($post->post_type);

	/* Check if the current user has permission to edit the post. */
	if (!current_user_can($post_type->cap->edit_post, $post_id))
		return $post_id;

	/* Get the posted data and sanitize it for use as an HTML class. */
	$new_meta_value = (isset($_POST['smashing-post-class']) ? sanitize_html_class($_POST['smashing-post-class']) : '');

	/* Get the meta key. */
	$meta_key = 'smashing_post_class';

	/* Get the meta value of the custom field key. */
	$meta_value = get_post_meta($post_id, $meta_key, true);

	/* If a new meta value was added and there was no previous value, add it. */
	if ($new_meta_value && '' == $meta_value)
		add_post_meta($post_id, $meta_key, $new_meta_value, true);

	/* If the new meta value does not match the old value, update it. */
	elseif ($new_meta_value && $new_meta_value != $meta_value)
		update_post_meta($post_id, $meta_key, $new_meta_value);

	/* If there is no new meta value but an old value exists, delete it. */
	elseif ('' == $new_meta_value && $meta_value)
		delete_post_meta($post_id, $meta_key, $meta_value);
}

add_action( 'load-post.php', 'smashing_post_meta_boxes_setup' );
add_action( 'load-post-new.php', 'smashing_post_meta_boxes_setup' );
add_action( 'widgets_init', 'tvsi_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tvsi_scripts() {
	wp_enqueue_style( 'tvsi-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'tvsi-style', 'rtl', 'replace' );

	wp_enqueue_script( 'tvsi-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'tvsi_scripts' );

function getPath($pathFile = '')
{
	if	(!empty($pathFile)) {
		$pattern = '/^\//';
		$replacement = '';
		$pathFile = preg_replace($pattern, $replacement, $pathFile);
		$pathFile = '/' . $pathFile;
	}
	return get_template_directory_uri() . $pathFile;
}

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



