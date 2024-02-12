

<section class="pageSingle bg-white-custom"> 

	<div class="d-flex justify-content-center align-items-start p-3  flex-wrap " style="height: auto;">
		<?php if (have_posts()): while(have_posts()): the_post(); ?> 
			<div class=" card m-3 p-3" style="max-width: 300px; height:300px;">
				<div class="card-body d-flex flex-column text-dark ">
						<h3> <?php the_title(); ?></h3>

						<?php $excerpt = get_the_excerpt();
							$trimmed_excerpt = wp_trim_words($excerpt, 10, '...'); // Menggunakan tanda elipsis (...) sebagai tanda potongan.

							echo $trimmed_excerpt; ?>

						<a href="<?php the_permalink();?>" class="btn btn-success">Read More..</a>
				</div>
			</div>
		<?php endwhile; else: endif;?>


	</div>
</section>







 