
<?php if (have_posts()): while(have_posts()): the_post(); ?> 




	<p class="" >
	<?php echo get_the_date('d/m/y H:i');?> <!-- Fungsi bawaan WP untuk mengambil Tanggal b
	ulan dan tahun --> 
	</p >

	<!-- bagian ini untuk menunjukan Content yang dibuat di wordpress -->
	<?php the_content(); ?>



<!-- Bagian untuk menampilkan penulis Arikels -->
	<p>Author : 
		<?php 
			
			 $fname = get_the_author_meta('first_name'); 
			 $lname = get_the_author_meta('last_name');
			 echo $fname .' '. $lname; 
		?>

	</p>


<?php
$tags = get_the_tags();

if ($tags) {
    foreach ($tags as $tag):
?>
    <a href="<?php echo get_tag_link($tag->term_id); ?>">
        <?php echo $tag->name; ?>
    </a>
<?php
    endforeach;
}
?>





<?php endwhile; else: endif;?>



