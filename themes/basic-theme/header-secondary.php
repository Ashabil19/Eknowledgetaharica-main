<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php bloginfo('name');?></title>

    <?php wp_head();?>




    
</head>
<body <?php body_class();?>>
 
<div class=" header-sec">
    <div class="user-container-sec">
        <a href="javascript:history.go(-1)" class="userIcon-sec">
                   <img src="<?php echo get_template_directory_uri(); ?>/assets/back-icon.png" alt="back" class="userInfo" />
                   
        </a>
    </div>
    <div class="landingPageHead flexbox">
        <?php get_search_form();?>
    </div>
</div>
