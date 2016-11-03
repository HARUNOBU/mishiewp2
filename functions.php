<?php
/**
 * Mishie functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Mishie
 */

if ( ! function_exists( 'mishie_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mishie_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Mishie, use a find and replace
	 * to change 'mishie' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'mishie', get_template_directory() . '/languages' );
    
    // Theme Options file
    require_once( get_template_directory() . '/admin/theme-options.php' );
    $options = mishie_get_option();

    //  Include file
    //require_once( get_template_directory() . '/admin/inc/custom-css.php' );

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
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'mishie' ),
		'scondry' => esc_html__( 'Scondry', 'mishie' ),
		'sociallinks' => esc_html__( 'Social Links', 'mishie' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'mishie_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'mishie_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mishie_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mishie_content_width', 640 );
}
add_action( 'after_setup_theme', 'mishie_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mishie_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar-1', 'mishie' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( '左サイドバーです。', 'mishie' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s ">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title-left">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar-2', 'mishie' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( '右サイドバーです。', 'mishie' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s voc">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title-right">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'mishie_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mishie_scripts() {
	wp_enqueue_style( 'mishie-style', get_stylesheet_uri() );

	wp_enqueue_script( 'mishie-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'mishie-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mishie_scripts' );

if ( ! function_exists( 'mishie_enqueue_styles' ) ) :
function mishie_enqueue_styles() {
    $options = mishie_get_option();	
    wp_enqueue_style( 'mishie_style', get_template_directory_uri().'/style.css' );
	wp_enqueue_style( 'mishie_bootstrap', get_template_directory_uri().'/css/bootstrap.css' );
    wp_enqueue_style( 'mishie_common', get_template_directory_uri().'/css/Common.css' );
	

    if( mb_ereg( 'MSIE', getenv( 'HTTP_USER_AGENT' ) ) ) {
        wp_enqueue_style( 'mishie_ie', get_template_directory_uri().'/css/ie.css' );
    }

    wp_enqueue_style( 'mishie_quicksand', '//fonts.googleapis.com/css?family=Quicksand' );
    wp_enqueue_style( 'cmishie_font', get_template_directory_uri().'/css/font.css' );
    
    

    if ( strtoupper( get_locale() ) == 'JA' ) {
        wp_enqueue_style( 'mishie_ja', get_template_directory_uri().'/css/ja.css' );
    }

    // Child Theme Style
    if ( is_child_theme() ) {
        wp_enqueue_style( 'mishie_child_style', get_stylesheet_uri() );
    }
}
endif;
add_action( 'wp_enqueue_scripts', 'mishie_enqueue_styles' );
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

if ( ! isset( $content_width ) ) {
    $content_width = 1080;
}

//関数　add_custompost_type　を定義　(関数名は任意の名前でOK)
function add_custompost_type() {

	$args = array(
		'label' => '新着情報・お知らせ',//管理画面の左メニューに表示される名前
		'labels' => array(
			'singular_name' => '新着情報・お知らせ',//この投稿タイプの名前
			'add_new' => '新規追加',//デフォルトの「add new」の代わりに表示するテキスト(以下省略)
			'add_new_item' => '新着情報・お知らせを追加',//add new itemテキスト
			'edit_item' => '新着情報・お知らせを編集',//edit itemテキスト
			'new_item' => '新しい新着情報・お知らせ',//new itemテキスト
			'view_item' => '新着情報・お知らせを表示',//view itemテキスト
			'search_items' => '新着情報・お知らせを検索',//search itemsテキスト
			'not_found' => '新着情報・お知らせは見つかりませんでした',//not foundテキスト
			'not_found_in_trash' => 'ゴミ箱に新着情報・お知らせはありません。',//not found in trashテキスト
		),
		'description' => '新着情報・お知らせを公開する時に使うカスタム投稿タイプです。',//投稿タイプの簡潔な説明
		'public' => true,//管理画面から投稿できるようにする(初期値がfalseなので注意)
		'hierarchical' => false,//階層をもつか
		'supports' => array('title','editor','author','thumbnail','excerpt','comments','custom-fields'),//この投稿で利用する機能
		'has_archive' => true,//投稿アーカイブを利用する(初期値がfalseなので注意)
		'menu_position' => 5,//管理画面の左メニューにおける表示位置　5-投稿の下、10-メディアの下、20-ページの下
		'rewrite' => true

	); 
	register_post_type('news', $args);//カスタム投稿タイプ「news」を登録

	$args = array(
		'label' => '情報タイプ',//管理画面の左メニューに表示される名前
		'labels' => array(
			'singular_name' => '情報タイプ',//このカスタム分類の名前
			'search_items' => '情報タイプを検索',//デフォルトの「search item」の代わりに表示するテキスト(以下省略)
			'popular_items' => 'よく使われている情報タイプ',//popular itemテキスト
			'all_items' => 'すべての情報タイプ',//all itemsテキスト
			'parent_item' => '親情報タイプ',//parent itemテキスト
			'edit_item' => '情報タイプの編集',//edit itemテキスト
			'update_item' => '更新',//update itemテキスト
			'add_new_item' => '新規情報タイプを追加',//add new itemテキスト
			'new_item_name' => '新しい情報タイプ',//new item nameテキスト
		),
		'public' => true,//管理画面から作成できるようにする
		'hierarchical' => true,//階層をもつか
		'rewrite' => true
	);
	register_taxonomy('newstype', 'news', $args);//カスタム分類「newstype」を「news」内に登録


	flush_rewrite_rules();//パーマリンク設定を再設定(エラー回避のため)
}
add_action('init', 'add_custompost_type');//定義した「add_custompost_type」を実行

// カテゴリIDを取得する。
function mishie_category_id($tax='category') {
    global $post;
    $cat_id = 0;
    if (is_single()) {
        $cat_info = get_the_terms($post->ID, $tax);
        if ($cat_info) {
            $cat_id = array_shift($cat_info)->term_id;
        }
    }
    return $cat_id;  
}

// カテゴリ情報を取得する。
function mishie_category_info($tax='category') {
    global $post;
    $cat = get_the_terms($post->ID, $tax);
    $obj = new stdClass;
    if ($cat) {
        $cat = array_shift($cat);
        $obj->name = $cat->name;
        $obj->slug = $cat->slug;
    } else {
        $obj->name = '';
        $obj->slug = '';
    }
    return $obj;
}



function get_featured_image_url() {
$image_id = get_post_thumbnail_id();
$image_url = wp_get_attachment_image_src($image_id,'thumbnail', true);
echo $image_url[0];
}

/* ----------------------------------------------
 * 3.1 - page title
 * filter function for wp_title hook
 * --------------------------------------------*/

if ( ! function_exists( 'mishie_page_title' ) ) :
function mishie_page_title( $title, $sep = true, $seplocation = 'right' ) {
	if ( is_feed() ) {
		return $title;
	}

	global $paged, $page;
	$sep = ' ' . $sep . ' ';

	// If it's a search
	if ( is_search() ) {
		$title = sprintf( __( 'Search Results of " %s "', 'mishie' ), get_search_query() ).$sep;
	}

	// If it's a 404 page
	if ( is_404() ) {
		$title = __( '404 Not found', 'mishie' ).$sep;
	}

	// If there's a year
	if ( is_date() ) {
		if ( is_year() ) {
			$title = get_the_time( __( 'Y', 'mishie' ) ).$sep;
		} elseif ( is_month() ) {
			$title = get_the_time( __( 'F Y', 'mishie' ) ).$sep;
		} elseif ( is_day() ) {
			$title = get_the_time( __( 'F j, Y', 'mishie' ) ).$sep;
		}
	}

	if ( is_search() || is_404() || is_date() ) {
		// Add the blog name
		$title .= apply_filters( 'mishie_wp_title_name', get_bloginfo( 'name', 'display' ) );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title_desc = $sep.$site_description;
			$title .= apply_filters( 'mishie_wp_title_desc', $title_desc );
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title_page = $sep.sprintf( __( 'Page %d', 'mishie' ), max( $paged, $page) );
			$title .= apply_filters( 'mishie_wp_title_page', $title_page );
		}
	}

	return $title;
}
endif;
add_filter( 'wp_title', 'mishie_page_title', 10, 3 );

/* ----------------------------------------------
 * 5.7 - breadcrumb
 * --------------------------------------------*/

if ( ! function_exists( 'mishie_breadcrumb' ) ) :
function mishie_breadcrumb() {
	$options = mishie_get_option();

	if ( ! empty( $options['show_breadcrumb'] ) ) {
		global $wp_query, $post, $page, $paged;

		$itemtype_url = 'http://data-vocabulary.org/Breadcrumb';
		$itemtype = 'itemscope itemtype="'.esc_url( $itemtype_url ).'"';

		$taxonomy_slug = get_query_var( 'taxonomy' );
		$cpt = get_query_var( 'post_type' );

		if ( !is_front_page() && !is_home() && !is_admin() ) : ?>
			<div class="breadcrumb" <?php echo $itemtype; ?>>
				<ol>
				<li <?php echo $itemtype; ?>><a href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><span itemprop="title" class="icon-home"><span class="bread-home"><?php bloginfo( 'name' ); ?></span></span></a></li><li class="breadmark">&gt;</li>

			<?php if ( $taxonomy_slug && is_tax( $taxonomy_slug ) ) :
				$query_tax = get_queried_object();
				$query_tax_parent = $query_tax -> parent;
				$post_types = get_taxonomy( $taxonomy_slug ) -> object_type;
				$cpt = $post_types[0];
			?>
			<li <?php echo $itemtype; ?>><a href="<?php echo get_post_type_archive_link( $cpt ); ?>" itemprop="url"><span itemprop="title"><?php echo esc_html( get_post_type_object( $cpt ) -> label ); ?></span></a></li>
			<li class="breadmark">&gt;</li>
			<?php if ( ! empty( $query_tax_parent ) ) :
				$ancestors = array_reverse( get_ancestors( $query_tax -> term_id, $query_tax -> taxonomy ) );
				foreach( $ancestors as $ancestor ) : ?>
					<li <?php echo $itemtype; ?>><a href="<?php echo get_term_link( $ancestor, $query_tax -> taxonomy ); ?>" itemprop="url"><span itemprop="title"><?php echo esc_html( get_term( $ancestor, $query_tax -> taxonomy ) -> name ); ?></span></a></li>
					<li class="breadmark">&gt;</li>
				<?php endforeach; endif; ?>
			<li><?php echo esc_html( $query_tax -> name ); ?>

			<?php elseif ( $cpt && is_singular( $cpt ) ) :
				$cpt_taxes = get_object_taxonomies( $cpt );

				if ( ! empty( $cpt_taxes ) ) :
					$taxonomy_name = $cpt_taxes[0];
					?>
					<li <?php echo $itemtype; ?>><a href="<?php echo get_post_type_archive_link( $cpt ); ?>" itemprop="url"><span itemprop="title"><?php echo esc_html( get_post_type_object( $cpt ) -> label ); ?></span></a></li>
					<li class="breadmark">&gt;</li>
					<?php
					$taxes = get_the_terms( $post -> ID, $taxonomy_name );
					$count = 0;

					if ( ! empty( $taxes ) ) {
						foreach( $taxes as $tax ) {
							$children = get_term_children( $tax -> term_id, $taxonomy_name ); 

							if ( $children ) {
								if ( $count < count( $children ) ) {
									$count = count( $children );
									$lot_children = $children;
									foreach( $lot_children as $child ) {
										if( is_object_in_term( $post -> ID, $taxonomy_name ) ) {
											$child_tax = get_term( $child, $taxonomy_name );
										}
									}
								}
							} else {
								$child_tax = $tax;
							}
						}
					}

					if( ! empty( $child_tax -> parent ) ) :
						$ancestors = array_reverse( get_ancestors( $child_tax -> term_id, $taxonomy_name ) );

						foreach( $ancestors as $ancestor ) : ?>
							<li <?php echo $itemtype; ?>><a href="<?php echo get_term_link( $ancestor, $taxonomy_name ); ?>" itemprop="url"><span itemprop="title"><?php echo esc_html( get_term( $ancestor, $taxonomy_name ) -> name ); ?></span></a></li>
							<li class="breadmark">&gt;</li>
						<?php endforeach; ?>

						<li <?php echo $itemtype; ?>><a href="<?php echo get_term_link( $child_tax, $taxonomy_name ); ?>" itemprop="url"><span itemprop="title"><?php echo esc_html( $child_tax -> name ); ?></span></a></li>
						<li class="breadmark">&gt;</li>
					<?php endif; ?>
				<?php endif; ?>
			<li><?php the_title_attribute(); ?>

			<?php elseif ( is_page() ) : ?>
			<?php $ancestors = get_post_ancestors( $post -> ID ); ?>
			<?php foreach ( array_reverse( $ancestors ) as $ancestor ) : ?>
			<li <?php echo $itemtype; ?>><a href="<?php echo get_page_link( $ancestor ); ?>" itemprop="url"><span itemprop="title"><?php echo get_the_title( $ancestor ); ?></span></a></li>
			<li class="breadmark">&gt;</li>
			<?php endforeach; ?>
			<li><?php the_title_attribute(); ?>

			<?php elseif ( is_search() ) : ?>
			<li><?php printf( __( 'Search Results of " %s "', 'mishie' ), get_search_query() ); ?>&nbsp;(&nbsp;<?php printf( __( '%d posts', 'mishie' ), esc_html( $wp_query -> found_posts ) ); ?>&nbsp;)

			<?php elseif ( is_404() ) : ?>
			<li><?php _e( '404 Not found', 'mishie' ); ?>

			<?php elseif ( is_attachment() ) : ?>
			<?php if ( $post -> post_parent != 0 ) : ?>
			<li <?php echo $itemtype; ?>><a href="<?php echo get_permalink( $post -> post_parent ); ?>" itemprop="url"><span itemprop="title"><?php echo get_the_title( $post -> post_parent ); ?></span></a></li>
			<li class="breadmark">&gt;</li>
			<?php endif; ?>
			<li><?php the_title_attribute(); ?>

			<?php elseif ( is_single() ) : ?>
			<?php
			$cat = get_the_category();
			if ( ! empty( $cat ) ) {
				$cat = $cat[count( $cat )-1];

				$breadcrumbs = '<li>'.get_category_parents( $cat, true, '</li><li class="breadmark">&gt;</li><li>' ).'</li>';
				$breadcrumbs = str_replace( '</li><li></li>', '</li>', $breadcrumbs );

				$breadcrumbs = preg_replace( '/<a href="([^>]+)">/i', '<a href="\\1" itemprop="url"><span itemprop="title">', $breadcrumbs );
				$breadcrumbs = str_replace( '<li>', '<li '.$itemtype.'>', $breadcrumbs );
				$breadcrumbs = str_replace( '</a>', '</span></a>', $breadcrumbs );
				echo $breadcrumbs;
			} ?>
			<li><?php the_title_attribute(); ?>

			<?php elseif ( is_year() ) : ?>
			<li><?php the_time( __( 'Y', 'mishie' ) ); ?>

			<?php elseif ( is_month() || is_day() ) : ?>
			<li <?php echo $itemtype; ?>><a href="<?php echo get_year_link( get_the_time( 'Y' ) ); ?>" itemprop="url"><span itemprop="title"><?php the_time( __( 'Y', 'mishie' ) ); ?></span></a></li>
			<li class="breadmark">&gt;</li>

			<?php if ( is_month() ) : ?>
			<li><?php the_time( __( 'F', 'mishie' ) ); ?>

			<?php elseif ( is_day() ) : ?>
			<li <?php echo $itemtype; ?>><a href="<?php echo get_year_link( get_the_time( 'm' ) ); ?>" itemprop="url"><span itemprop="title"><?php the_time( __( 'F', 'mishie' ) ); ?></span></a></li>
			<li class="breadmark">&gt;</li>
			<li><?php the_time( __( 'j', 'mishie' ) ); ?>
			<?php endif; ?>

			<?php elseif ( is_category() ) : ?>
			<?php
			$cat = get_queried_object();
			$breadcrumbs = '<li>'.get_category_parents( $cat, true, '</li><li class="breadmark">&gt;</li><li>' ).'</li>';

			$pattern = '/<li><a href=\"([^>]+)\">([^<]+)<\/a><\/li><li class="breadmark">&gt;<\/li><li><\/li>/i';
			$breadcrumbs = preg_replace( $pattern, '', $breadcrumbs );

			$breadcrumbs = preg_replace( '/<a href="([^>]+)">/i', '<a href="\\1" itemprop="url"><span itemprop="title">', $breadcrumbs );
			$breadcrumbs = str_replace( '<li>', '<li '.$itemtype.'>', $breadcrumbs );
			$breadcrumbs = str_replace( '</a>', '</span></a>', $breadcrumbs );

			echo $breadcrumbs; ?>
			<li><?php single_cat_title(); ?>

			<?php elseif ( is_tag() ) : ?>
			<li><?php single_cat_title(); ?>

			<?php elseif ( is_author() ) : ?>
			<li><?php
				if ( get_the_author_meta( 'display_name' ) ) {
					the_author_meta( 'display_name', $post -> post_author );
				} else {
					_e( 'Nothing Found', 'mishie' );
				} ?>
			<?php else : ?>
			<li><?php
				add_filter( 'mishie_wp_title_name', '__return_false' );
				add_filter( 'mishie_wp_title_desc', '__return_false' );
				add_filter( 'mishie_wp_title_page', '__return_false' );
				wp_title( '' ); ?>

			<?php endif;
			if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
				$page_num = sprintf( __( 'Page %d', 'mishie' ), max( $paged, $page ) );
				echo ' - '.$page_num;
			} ?></li>
		</ol>
	</div>
	<?php endif;
	}
}
endif;

/* ----------------------------------------------
 * 5.0 - Copyright
 * --------------------------------------------*/

if ( ! function_exists( 'mishie_footer_copyright' ) ) :
function mishie_footer_copyright() {
	$options = mishie_get_option();
	$footer_copyright = '';

	// Display of copyright
	if ( ! empty( $options['show_copyright'] ) ) {
		$footer_copyright = mishie_get_copyright_text();

		if ( ! empty( $options['copyright_text'] ) ) {
			$footer_copyright = esc_textarea( $options['copyright_text'] );
		}
	}

	// Display of credit
	if ( ! empty( $options['credit_link_radio'] ) && $options['credit_link_radio'] == 'credit_enable' ) {
		if ( ! empty( $options['show_copyright'] ) ) {
			$footer_copyright .= '&nbsp;';
		}

		$credit_link_url = 'http://mignonstyle.com/';
		$wp_url = 'http://wordpress.org/';

		$credit_link = '<a href="'.esc_url( $credit_link_url ).'" target="_blank">';
		$wp_link = '<a href="'.esc_url( $wp_url ).'" target="_blank">';
		$anchor_after = '</a>';

		$footer_copyright .= sprintf( __( 'mishie theme by %1$sMignon Style%2$s.', 'mishie' ), $credit_link, $anchor_after ).'&nbsp;'.sprintf( __( 'Powered by %1$sWordPress%2$s.', 'mishie' ), $wp_link, $anchor_after );
	}

	echo $footer_copyright;
}
endif;

// Get the first date of the article
if ( ! function_exists( 'mishie_copyright_first_date' ) ) :
function mishie_copyright_first_date() {
	$args = array(
		'numberposts' => 1,
		'orderby'     => 'post_date',
		'order'       => 'ASC',
	);
	$posts = get_posts( $args );

	foreach ( $posts as $post ) {
		$first_date = $post->post_date;
	}

	$first_date = ( ! empty( $first_date ) ) ? mysql2date( 'Y', $first_date, true ) : '';
	return $first_date;
}
endif;

// Get the latest Date of article
if ( ! function_exists( 'mishie_copyright_last_date' ) ) :
function mishie_copyright_last_date() {
	$last_date = get_lastpostmodified( 'blog' );
	return mysql2date( 'Y', $last_date, true );
}
endif;

// Notation of copyright
if ( ! function_exists( 'mishie_get_copyright_text' ) ) :
function mishie_get_copyright_text() {
	$first_date = mishie_copyright_first_date();
	$last_date = mishie_copyright_last_date();
	$copyright_date = $first_date;

	if ( ! empty( $first_date ) && ( $first_date != $last_date ) ) {
		$copyright_date .= '-'.$last_date;
	} else {
		$copyright_date = $last_date;
	}

	$site_anchor = '<a href="'.esc_url( home_url( '/' ) ).'">'.get_bloginfo( 'name' ).'</a>';
	$copyright_text = sprintf( __( 'Copyright &copy; %1$s %2$s All Rights Reserved.', 'mishie' ), $copyright_date, $site_anchor );

	return $copyright_text;
}
endif;

/* ----------------------------------------------
 * 5.1.1 - site title
 * --------------------------------------------*/

if ( ! function_exists( 'mishie_site_title' ) ) :
function mishie_site_title() {
	$site_title = get_bloginfo( 'name' );
	$options = mishie_get_option();

	if ( ! empty( $options['site_logo_url'] ) ) {
		$site_title = '<img class="logo" src="'.esc_url( $options['site_logo_url'] ).'" alt="">'."\n";
	}
	echo $site_title;
}
endif;

/* ----------------------------------------------
 * 5.8 - post data list
 * --------------------------------------------*/

if ( ! function_exists( 'mishie_post_list_number' ) ) :
function mishie_post_list_number( $show_num = '' ) {
	$num_class = 'five-column';

	switch ( $show_num ){
		case '4':
			$num_class = 'four-column';
			break;
		case '3':
			$num_class = 'three-column';
			break;
		case '2':
			$num_class = 'two-column';
			break;
	}
	return $num_class;
}
endif;


/* ----------------------------------------------
 * 5.8.1 - Show Post List
 * --------------------------------------------*/

// Related Post List
if ( ! function_exists( 'mishie_related_post_list' ) ) :
function mishie_related_post_list( $show_tag ) {
    $options = mishie_get_option();

    if ( ! empty( $options['show_related'] ) ) {
        mishie_post_list( $show_tag );
    }
}
endif;

//-----------------------------------------------
// New Post List
if ( ! function_exists( 'mishie_new_post_list' ) ) :
function mishie_new_post_list( $show_tag ) {
    $options = mishie_get_option();

    if ( ! empty( $options['show_new_posts'] ) ) {
        mishie_post_list( $show_tag );
    }
}
endif;


/* ----------------------------------------------
 * 5.8.2 - View Post list
 * --------------------------------------------*/

if ( ! function_exists( 'mishie_post_list' ) ) :
function mishie_post_list( $show_tag ) {
    $options = mishie_get_option();
    // If the value is 0, use the value of the default
    $show_num = 5;
    $num_class = 'five-column';

    if ( $show_tag == 'new' ) {
        $my_title = $options['new_posts_title'] ? $options['new_posts_title'] : __( 'New Entry', 'mishie' );

        if ( ! empty( $options['new_posts_number'] ) ) {
            $show_num = absint( $options['new_posts_number'] );
            $num_class = mishie_post_list_number( $show_num );
            $show_num = absint( $options['new_posts_number'] * $options['new_posts_row'] );
        }

        $order = 'DESC';
        $order_by = '';
    } elseif ( $show_tag == 'related' ) {
        $my_title = $options['related_title'] ? esc_attr( $options['related_title'] ) : __( 'Related Entry', 'mishie' );

        if ( ! empty( $options['related_number'] ) ) {
            $show_num = absint( $options['related_number'] );
            $num_class = mishie_post_list_number( $show_num );
            $show_num = absint( $options['related_number'] * $options['related_row'] );
        }

        if ( ! empty( $options['related_order_select'] ) ) {
            $order = 'DESC';
            $order_by = '';

            $related_order = esc_attr( $options['related_order_select'] );
            switch ( $related_order ){
                case 'random':
                    $order = '';
                    $order_by = 'rand';
                    break;
                case 'asc':
                    $order = 'ASC';
                    $order_by = '';
                    break;
            }
        }
    } else {
        return;
    }

    $my_query = mishie_post_data( $show_num, $show_tag, $order, $order_by );

    if ( $my_query -> have_posts() ) : ?>
<div id="top_info" class="<?php echo $show_tag; ?>-contents common-contents clearfix">
    <h3 id="<?php echo $show_tag; ?>-title" class="common-title"><?php echo esc_attr( $my_title ); ?></h3>
    <ul class="<?php echo $num_class; ?> clearfix">
        <?php while ( $my_query -> have_posts() ) : $my_query -> the_post(); ?>
        <?php $cat_info = mishie_category_info(); ?>
        <li>
            <span class="info_li_inner">
                <span class="news_date"><?php the_time('Y年m月d日'); ?></span>
                <span class="news_category <?php echo esc_attr($cat_info->slug); ?>"><?php echo esc_html($cat_info->name); ?></span>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </span>
        </li>

        <?php endwhile; wp_reset_query(); ?>
    </ul>
</div>
<?php endif;
}
endif;



/* ----------------------------------------------
 * 5.8.3.2 - post data
 * --------------------------------------------*/

if ( ! function_exists( 'mishie_post_data' ) ) :
function mishie_post_data( $show_num, $show_tag, $order, $order_by ) {
    global $post;
    $tag_ID = '';
    $category_ID = '';

    $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

    // Related article
    if ( $show_tag == 'related' ) {
        $options = mishie_get_option();

        // Tag or category
        if ( ! empty( $options['related_class_select'] ) && esc_attr( $options['related_class_select'] ) == 'tag' ) {
            $posttags = get_the_tags( $post -> ID );
            $tag_ID = array();

            if ( $posttags ) {
                foreach( $posttags as $tag ) {
                    array_push( $tag_ID, $tag -> term_id );
                }
            }
        } else {
            $categories = get_the_category( $post -> ID );
            $category_ID = array();

            foreach( $categories as $category ) {
                array_push( $category_ID, $category -> cat_ID );
            }
        }
    }

    $args = array(
        'tag__in'             => $tag_ID,
        'category__in'        => $category_ID,
        'post__not_in'        => array( $post -> ID ),
        'posts_per_page'      => $show_num,
        'ignore_sticky_posts' => true,
        'order'               => $order,
        'orderby'             => $order_by,
        'paged'               => $paged,
    );

    $my_query = new WP_Query( $args );
    return $my_query;
}
endif;