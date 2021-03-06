<?php

/**
 * Theme functions and definitions
 * 
 * @package WordPress
 * @subpackage Magscan-Theme
 */

// Exit if accessed directly.
if (!defined("ABSPATH")) {
	exit;
}

// error_reporting(E_ERROR);

// Core constants 
define("THEME_DIR", get_template_directory());
define("THEME_URI", get_template_directory_uri());
define("THEME_CLASS", "Magscan_Theme");

/**
 * Magscan Theme class
 */
final class Magscan_Theme
{

	/**
	 * Add hooks and load theme functions 
	 * 
	 * @since 1.0
	 */
	public function __construct()
	{
		// Define theme constants
		$this->theme_constants();

		// Import theme files
		$this->theme_imports();

		// Setup theme support, nav menus, etc.
		add_action("after_setup_theme", array(THEME_CLASS, "theme_setup"));

		if (is_admin()) {
			// Enqueue admin scripts
			add_action("admin_enqueue_scripts", array(THEME_CLASS, "theme_admin_css"));
			add_action("admin_enqueue_scripts", array(THEME_CLASS, "theme_admin_js"));
		} else {

			// Enqueue theme scripts
			add_action("wp_enqueue_scripts", array(THEME_CLASS, "theme_css"));
			add_action("wp_enqueue_scripts", array(THEME_CLASS, "theme_js"), 1);
		}

		// Enqueue theme fonts
		add_action("wp_enqueue_scripts", array(THEME_CLASS, "theme_fonts"));
		add_action("admin_enqueue_scripts", array(THEME_CLASS, "theme_fonts"));

		// Add action to make custom query before loading posts
		add_action("pre_get_posts", array(THEME_CLASS, "set_query_params"));

		// Add action to define custom excerpt length
		add_filter("excerpt_length", array(THEME_CLASS, "custom_excerpt_len"), 999);

		add_action( 'generate_rewrite_rules', [$this, 'post_rewrite_rules'] );
		
		add_filter( 'post_link', [$this, 'update_post_link'], 1, 3 );
	}

	/**
	 * Define theme constants
	 *
	 * @since 1.0
	 */
	public static function theme_constants()
	{
		$version = self::get_theme_version();

		define("THEME_VERSION", $version);

		// JS and CSS files URIs
		define("THEME_JS_URI", THEME_URI . "/assets/js/");
		define("THEME_CSS_URI", THEME_URI . "/assets/css/");

		// Images URI
		define("THEME_IMG_URI", THEME_URI . "/assets/img/");

		// Fonts URI
		define("THEME_FONT_URI", THEME_URI . "/assets/fonts/");

		// Includes URI
		define("THEME_INC_DIR", THEME_DIR . "/inc/");
		define("THEME_INC_URI", THEME_URI . "/inc/");
	}

	/**
	 * Include theme classes and files
	 *
	 * @since 1.0
	 */
	public static function theme_imports()
	{
		// Directory of files to be included
		$dir = THEME_INC_DIR;

		require_once($dir . 'helpers/helpers.php');

		require_once($dir . 'walker/bs_menu_walker.php');

		require_once($dir . 'kirki/kirki-installer-section.php');

		require_once($dir . 'customizer/customizer.php');

		require_once($dir . 'cpt/cpt-exame.php');
		require_once($dir . 'cpt/cpt-especialista.php');
		require_once($dir . 'cpt/cpt-convenio.php');
	}

	/**
	 * Setup theme support, nav menus, etc.
	 *
	 * @since 1.0
	 */
	public static function theme_setup()
	{
		// Register nav menus
		register_nav_menus(
			array(
				"main_menu"   => esc_html__("Menu principal")
			)
		);

		// Enable support for site logo
		add_theme_support(
			"custom-logo",
			apply_filters(
				"custom_logo_args",
				array(
					"flex-height" => true,
					"flex-width"  => true,
				)
			)
		);

		add_filter('nav_menu_css_class', function ($classes, $item, $args) {
			if (isset($args->li_class)) {
				$classes[] = $args->li_class;
			}
			return $classes;
		}, 1, 3);

		add_filter('excerpt_more', function ($more) {
			return '...';
		});

		// Enable support for Post Formats.
		add_theme_support('post-formats', array('video', 'gallery', 'audio', 'quote', 'link'));

		// Let WordPress handle Title Tag in all pages
		add_theme_support("title-tag");

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support('post-thumbnails');

		// Enable support for excerpt text on posts and pages.
		add_post_type_support('page', 'excerpt');

		// Switch default core markup to output valid HTML5.
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'widgets',
			)
		);


		// Include template archive for searches of custom post types
		add_filter('template_include', function ($template) {
			global $wp_query;
			$post_type = get_query_var('post_type');
			if ($wp_query->is_search && $post_type == 'especialista') {
				return locate_template('archive-especialista.php');
			}
			if ($wp_query->is_search && $post_type == 'exame') {
				return locate_template('archive-exame.php');
			}
			if ($wp_query->is_search && $post_type == 'convenio') {
				return locate_template('template-convenio.php');
			}
			return $template;
		});
	}

	/**
	 * Enqueue theme CSS
	 *
	 * @since 1.0
	 */
	public static function theme_css()
	{
		$dir = THEME_CSS_URI;

		$version = THEME_VERSION;

		wp_enqueue_style('theme-css', $dir . 'main.css', [], $version, false);

		wp_deregister_style("bootstrap");
		wp_enqueue_style('bootstrap', $dir . 'bootstrap.css', [], $version, false);
	}

	/**
	 * Enqueue theme JS
	 *
	 * @since 1.0
	 */
	public static function theme_js()
	{
		$dir = THEME_JS_URI;

		$version = THEME_VERSION;

		wp_enqueue_script('theme-js', $dir . 'main.js', ["jquery"], $version, false);
	}

	/**
	 * Enqueue theme CSS for admin
	 *
	 * @since 1.0
	 */
	public static function theme_admin_css()
	{
		$dir = THEME_CSS_URI;

		$version = THEME_VERSION;

		// wp_enqueue_style('theme-admin-css', $dir . 'admin.css', [], $version, false); 

	}

	/**
	 * Enqueue theme JS for admin
	 *
	 * @since 1.0
	 */
	public static function theme_admin_js()
	{
		$dir = THEME_JS_URI;

		$version = THEME_VERSION;
	}

	/**
	 * Enqueue theme fonts
	 *
	 * @since 1.0
	 */
	public static function theme_fonts()
	{
		$dir = THEME_FONT_URI;

		$version = THEME_VERSION;

		wp_enqueue_style('bootstrap-icons', $dir . 'bootstrap-icons/bootstrap-icons.css', [], "1.5.0", false);

		wp_deregister_style("roboto");
		wp_enqueue_style('roboto', $dir . 'Roboto/font.css', [], $version, false);
	}

	/**
	 * Get theme version
	 *
	 * @return string Theme Version
	 * @since 1.0
	 */
	public static function get_theme_version()
	{
		$theme = wp_get_theme();
		return $theme->get("Version");
	}

	/**
	 * Set query params for blog page by using the GET params
	 *
	 * @param [array] $query
	 * @since 2.0
	 */
	public static function set_query_params($query)
	{

		if (
			$query->is_main_query()
			&& !$query->is_feed()
		) {

			if (isset($_GET['category'])) {
				$category = $_GET['category'];
				$query->set('category_name', $category);
			}

			if (isset($_GET['letra'])) {
				$letra = $_GET['letra'];
				$query->set('tax_query', array(
					'taxonomy'	=> 'letra',
					'field'		=> 'slug',
					'terms'		=> $letra
				));
			}
		}
	}

	/**
	 * Set custom excerpt length
	 *
	 * @param int $length
	 * @since 2.0
	 */
	public static function custom_excerpt_len($length)
	{
		return 20;
	}

	/**
	 * Rewrite WordPress URLs to Include /blog/ in Post Permalink Structure
	 *
	 * @author   Golden Oak Web Design <info@goldenoakwebdesign.com>
	 * @license  https://www.gnu.org/licenses/gpl-2.0.html GPLv2+
	 */
	function post_rewrite_rules( $wp_rewrite ) {
		$new_rules = array(
			'(([^/]+/)*blog)/page/?([0-9]{1,})/?$' => 'index.php?pagename=$matches[1]&paged=$matches[3]',
			'blog/([^/]+)/?$' => 'index.php?post_type=post&name=$matches[1]',
			'blog/[^/]+/attachment/([^/]+)/?$' => 'index.php?post_type=post&attachment=$matches[1]',
			'blog/[^/]+/attachment/([^/]+)/trackback/?$' => 'index.php?post_type=post&attachment=$matches[1]&tb=1',
			'blog/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?post_type=post&attachment=$matches[1]&feed=$matches[2]',
			'blog/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?post_type=post&attachment=$matches[1]&feed=$matches[2]',
			'blog/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$' => 'index.php?post_type=post&attachment=$matches[1]&cpage=$matches[2]',		
			'blog/[^/]+/attachment/([^/]+)/embed/?$' => 'index.php?post_type=post&attachment=$matches[1]&embed=true',
			'blog/[^/]+/embed/([^/]+)/?$' => 'index.php?post_type=post&attachment=$matches[1]&embed=true',
			'blog/([^/]+)/embed/?$' => 'index.php?post_type=post&name=$matches[1]&embed=true',
			'blog/[^/]+/([^/]+)/embed/?$' => 'index.php?post_type=post&attachment=$matches[1]&embed=true',
			'blog/([^/]+)/trackback/?$' => 'index.php?post_type=post&name=$matches[1]&tb=1',
			'blog/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?post_type=post&name=$matches[1]&feed=$matches[2]',
			'blog/([^/]+)/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?post_type=post&name=$matches[1]&feed=$matches[2]',
			'blog/page/([0-9]{1,})/?$' => 'index.php?post_type=post&paged=$matches[1]',
			'blog/[^/]+/page/?([0-9]{1,})/?$' => 'index.php?post_type=post&name=$matches[1]&paged=$matches[2]',
			'blog/([^/]+)/page/?([0-9]{1,})/?$' => 'index.php?post_type=post&name=$matches[1]&paged=$matches[2]',
			'blog/([^/]+)/comment-page-([0-9]{1,})/?$' => 'index.php?post_type=post&name=$matches[1]&cpage=$matches[2]',
			'blog/([^/]+)(/[0-9]+)?/?$' => 'index.php?post_type=post&name=$matches[1]&page=$matches[2]',
			'blog/[^/]+/([^/]+)/?$' => 'index.php?post_type=post&attachment=$matches[1]',
			'blog/[^/]+/([^/]+)/trackback/?$' => 'index.php?post_type=post&attachment=$matches[1]&tb=1',
			'blog/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?post_type=post&attachment=$matches[1]&feed=$matches[2]',
			'blog/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?post_type=post&attachment=$matches[1]&feed=$matches[2]',
			'blog/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$' => 'index.php?post_type=post&attachment=$matches[1]&cpage=$matches[2]',
		);
		$wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
	}

	/**
	 * Update posts links to include '/blog/'
	 */
	function update_post_link( $post_link, $id = 0 ) {
		$post = get_post( $id );
		if( is_object( $post ) && $post->post_type == 'post' ) {
			return home_url( '/blog/' . $post->post_name );
		}
		return $post_link;
	}
}

new Magscan_Theme();
