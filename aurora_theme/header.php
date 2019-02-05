<!DOCTYPE>
<html>
<head>
    <meta charset="utf-8">
    <title>Aurora</title>
    <meta name="description" content="<?php echo get_post_meta($post->ID, "_aioseop_description", true) ?>">
    <meta name="keywords" content="<?php echo get_post_meta($post->ID, "_aioseop_keywords", true) ?>">


    <link href="<?= bloginfo('template_directory'); ?>/style.css" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</head>
<body>
    <div id="header">
        <h1 id="headerInfo"><?php echo get_bloginfo('name').' - '.get_bloginfo('description') ?></h1>
        <a href="/">Головна сторінка</a>
        <a href="#contacts">Контакти</a>
    </div>

