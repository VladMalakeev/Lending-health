<?php
//миниатюры к записи
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}

function true_apply_categories_for_pages(){
    add_meta_box( 'categorydiv', 'Категории', 'post_categories_meta_box', 'page', 'side', 'normal'); // добавляем метабокс категорий для страниц
    register_taxonomy_for_object_type('category', 'page'); // регистрируем рубрики для страниц
}
// обязательно вешаем на admin_init
add_action('admin_init','true_apply_categories_for_pages');

function true_expanded_request_category($q) {
    if (isset($q['category_name'])) // если в запросе присутствует параметр рубрики
        $q['post_type'] = array('post', 'page'); // то, помимо записей, выводим также и страницы
    return $q;
}

add_filter('request', 'true_expanded_request_category');

function true_apply_tags_for_pages(){
    add_meta_box( 'tagsdiv-post_tag', 'Теги', 'post_tags_meta_box', 'page', 'side', 'normal' ); // сначала добавляем метабокс меток
    register_taxonomy_for_object_type('post_tag', 'page'); // затем включаем их поддержку страницами wp
}

add_action('admin_init','true_apply_tags_for_pages');

function true_expanded_request_post_tags($q) {
    if (isset($q['tag'])) // если в запросе присутствует параметр метки
        $q['post_type'] = array('post', 'page');
    return $q;
}

add_filter('request', 'true_expanded_request_post_tags');

//Добавление "Цитаты" для страниц start
function page_excerpt() {
    add_post_type_support('page', array('excerpt'));
}
add_action('init', 'page_excerpt');
//Добавление "Цитаты" для страниц end