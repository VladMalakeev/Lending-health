<?php
get_header();
?>
<div id="wrap">
    <div id="backgroundBlock">
    <h1>Продукти:</h1>
<?php

foreach(get_pages() as $page){
?>
    <div class="productElement">
    <h2><?php echo $page->post_title ?></h2>
        <a href="<?php echo $page->guid ?>" id="imgBlock">
            <div class="flexImage"><?php echo get_the_post_thumbnail($page->ID) ?></div>
            <h3>Перети на сторінку</h3>
        </a>
    </div>
<?php
}
?>
    </div>
</div>
<?php
get_footer();