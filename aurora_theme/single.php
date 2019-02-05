<?php
get_header();
$post = get_post();
?>
<div id="wrap">
    <div id="backgroundBlock">
        <div id='postHead'>
            <h1><?php echo $post->post_title ?></h1>
            <div class="flexImage"><?php the_post_thumbnail(); ?></div>

        </div>

    <div id="description">
            <?php echo $post->post_content ?>
    </div>

<?php
	$tags = wp_get_post_tags($post->ID);

if(!empty($tags)) {
    foreach ($tags as $tag) {
        $tags_id[] = $tag->term_id;
    }
    $my_posts = new WP_Query;
    $args = array(
        'post_type' => 'page',
        'tag__in' => $tags_id
    );
    $pages = $my_posts->query($args);

    if (count($pages) > 0) {
        ?>
        <hr>
        <h2>Продукція для очистки:</h2>
        <?php
        foreach ($pages as $page) {
            ?>
            <a class="sampleLink" href="<?php echo $page->guid ?>">
                <div class="samplePosts">
                    <div class="flexImage"><?php echo get_the_post_thumbnail($page->ID) ?></div>
                    <h2><?php echo $page->post_title ?></h2>
                    <p><?php echo $page->post_excerpt ?></p>
                </div>
            </a>
            <hr >
            <?php
        }

    }
}
 ?>
    </div>
</div>
<?php
get_footer();