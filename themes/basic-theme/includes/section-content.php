<?php if (have_posts()): while(have_posts()): the_post(); ?> 
<section class="bg-dark p-5 d-flex">
	<?php the_content(); ?>
</section>
<?php endwhile; else: endif;?>



