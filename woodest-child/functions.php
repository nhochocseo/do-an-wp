<?php
/*This file is part of woodest-child, woodest child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing.)
*/
// include dirname( __FILE__) . '/plugin/datban/plugin.php';
function woodest_child_enqueue_child_styles() {
$parent_style = 'parent-style'; 
	wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 
		'child-style', 
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		wp_get_theme()->get('Version') );
	wp_enqueue_style( 
		'app-style',
		get_stylesheet_directory_uri() . '/assets/css/app.css',
		array( $parent_style ),
		wp_get_theme()->get('Version') );
	}
add_action( 'wp_enqueue_scripts', 'woodest_child_enqueue_child_styles' );

/*Write here your own functions */
add_theme_support( 'post-thumbnails' );
add_action( 'init', 'create_movie_review' );
function create_movie_review() {
  register_post_type( 'slider_post',
        array(
            'labels' => array(
                'name' => 'Slide',
                'singular_name' => 'Slide Post',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New',
                'edit' => 'Edit',
                'edit_item' => 'Edit',
                'new_item' => 'New',
                'view' => 'View',
                'not_found' => 'No Reviews found',
                'not_found_in_trash' => 'No found in Trash',
                'parent' => 'Parent Review'
            ),
 
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
            'taxonomies' => array( '' ),
            'menu_icon' => 'dashicons-images-alt',
            'has_archive' => true
        )
    );
}
// post type đội ngũ nhân viên
add_action( 'init', 'create_doi_ngu_nhan_vien' );
function create_doi_ngu_nhan_vien() {
  register_post_type( 'doi_ngu_nhan_vien',
        array(
            'labels' => array(
                'name' => 'Đội ngũ nhân viên',
                'singular_name' => 'Đội ngũ nhân viên',
                'add_new' => 'Thêm mới',
                'add_new_item' => 'Thêm mới',
                'edit' => 'Sửa',
                'edit_item' => 'Sửa',
                'new_item' => 'Thêm mới',
                'view' => 'Xem',
                'not_found' => 'No Reviews found',
                'not_found_in_trash' => 'No found in Trash',
                'parent' => 'Parent Review'
            ),
 
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
            'taxonomies' => array( '' ),
            'menu_icon' => 'dashicons-groups',
            'has_archive' => true
        )
    );
}
// Đăng ký danh mục
register_taxonomy( 'categories', array('doi_ngu_nhan_vien'), array(
        'hierarchical' => true, 
        'label' => 'Danh mục', 
        'singular_label' => 'Category', 
        'rewrite' => array( 'slug' => 'categories', 'with_front'=> false )
        )
    );

// post type Vị trí kiến trúc
add_action( 'init', 'create_vi_tri_kien_truc' );
function create_vi_tri_kien_truc() {
  register_post_type( 'vi_tri_kien_truc',
        array(
            'labels' => array(
                'name' => 'Kiến trúc',
                'singular_name' => 'Kiến trúc',
                'add_new' => 'Thêm mới',
                'add_new_item' => 'Thêm mới',
                'edit' => 'Sửa',
                'edit_item' => 'Sửa',
                'new_item' => 'Thêm mới',
                'view' => 'Xem',
                'not_found' => 'No Reviews found',
                'not_found_in_trash' => 'No found in Trash',
                'parent' => 'Parent Review'
            ),
 
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
            'taxonomies' => array( '' ),
            'menu_icon' => 'dashicons-groups',
            'has_archive' => true
        )
    );
}
// Đăng ký danh mục
register_taxonomy( 'categories_kien_truc', array('vi_tri_kien_truc'), array(
        'hierarchical' => true, 
        'label' => 'Danh mục', 
        'singular_label' => 'Category', 
        'rewrite' => array( 'slug' => 'categories_kien_truc', 'with_front'=> false )
        )
    );

// post type Dịch vụ
add_action( 'init', 'create_dich_vu' );
function create_dich_vu() {
  register_post_type( 'dich_vu',
        array(
            'labels' => array(
                'name' => 'Dịch vụ',
                'singular_name' => 'Dịch vụ',
                'add_new' => 'Thêm mới',
                'add_new_item' => 'Thêm mới',
                'edit' => 'Sửa',
                'edit_item' => 'Sửa',
                'new_item' => 'Thêm mới',
                'view' => 'Xem',
                'not_found' => 'No Reviews found',
                'not_found_in_trash' => 'No found in Trash',
                'parent' => 'Parent Review'
            ),
 
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
            'taxonomies' => array( '' ),
            'menu_icon' => 'dashicons-groups',
            'has_archive' => true
        )
    );
}
// Đăng ký danh mục
register_taxonomy( 'categories_dich_vu', array('dich_vu'), array(
        'hierarchical' => true, 
        'label' => 'Danh mục', 
        'singular_label' => 'Category', 
        'rewrite' => array( 'slug' => 'categories_dich_vu', 'with_front'=> false )
        )
    );

