<?php 
/*
Template Name: Contact Us
*/
?>


 <?php get_header()  ?>
<section class="page-wrap">
    <div class="container">
    <h1> <?php  the_title(); ?></h1>


    <div class="row">
        <div class="col-lg-6 col-md-6 text-center">
            
            This is where the contact Goes

        </div>
        <div class="col-lg-6 col-md-6 text-center">
            
            <?php get_template_part('includes/section', 'content')?>

        </div>
    </div>    
 </div>

</section>
 

  <?php get_footer()  ?>