<!-- 
   Ini adalah bagian footer HTML pada halaman web.
   Footer biasanya berisi informasi tambahan dan link navigasi.
-->
<footer>
	<div class="container">
		<?php 
			// Memanggil fungsi wp_nav_menu untuk menampilkan menu footer.
			// Menu berisi link ke beberapa page(dummy) yang sudah dibuat Ashabil


		 //Fungsi wp_nav_menu() adalah fungsi bawaan WordPress yang digunakan untuk menampilkan menu navigasi pada tema WordPress. Fungsi ini biasanya digunakan dalam file template, seperti header.php atau footer.php, untuk menampilkan menu yang telah dibuat melalui dasbor WordPress.



			// wp_nav_menu( 
			// 	array(
			// 		'theme_location' => 'footer-menu',		
			// 		'menu_class'     => 'footer-bar'
			// 	)
			// );


		?>
	</div>
</footer>

<!-- 
   Memanggil fungsi wp_footer() untuk memastikan semua skrip dan gaya tema telah dimuat.
   Ini penting untuk konsistensi dan keamanan dalam pengembangan tema WordPress.
-->

<?php wp_footer() ?>

</body>
</html>
