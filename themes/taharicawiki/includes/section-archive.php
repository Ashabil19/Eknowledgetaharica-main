

	<!-- bagian ini untuk page kumpulan Content  -->


<div class="d-flex justify-content-center align-items-start p-3 gap-4 flex-wrap " style="height: auto;">
	<?php if (have_posts()): while(have_posts()): the_post(); ?> 
	
<div class=" card mb-3 p-3" style="width: 400px;">
	<div class="card-body ">
			<h3> <?php the_title(); ?></h3>

			<?php the_excerpt(); ?>

			<a href="<?php the_permalink();?>" class="btn btn-success">Read More..</a>
	</div>
</div>


<!-- perbaiki yang ini karna tidak mau di klik ke permalink -->

<!-- UI Detail Card Done! -->
<!-- next task = Benerin step step Navigasi -->



<!-- code by Ashabil -->






	
<?php endwhile; else: endif;?>
</div>






 