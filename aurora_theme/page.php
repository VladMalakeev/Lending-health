<?php
get_header();
$page = get_page_by_path($_SERVER['REQUEST_URI']);
?>
    <div id="wrap">
        <div id="pageHeader">
            <h1 ><?php echo $page->post_title ?></h1>
        </div>
    <div id="backgroundBlock">
        <div id="description">
            <?php echo $page->post_content ?>
            <hr>
        </div>
 <?php
$categories = get_the_category($page->ID);
$catNames = [];
foreach ($categories as $category){
    $catNames[] = $category->term_id;
}
$posts = get_posts(array('category'=>$catNames ));
foreach ($posts as $post){
    ?>
    <a class="postLinks" href=" <?php echo $post->guid ?>">
        <h2><?php echo $post->post_title ?></h2>
        <div class="flexImage"><?php the_post_thumbnail()?></div>
        <h3><span class="more">Детальніше</span></h3>
    </a>
    <?php
}

?>
    </div>
    </div>
<?php
get_footer();