

<?php get_header();  // Memanggil header untuk tata letak dan elemen-elemen umum ?>



    <div class="container">
        <h1><?php wp_title()?></h1>  


        <div class="navigation-menu bg-danger text-light">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'mid-menu', // Ganti 'your-custom-menu' dengan nama lokasi tema menu yang ingin Anda tampilkan
                    'menu_class'     => 'menu-bar',  // Ganti 'your-menu-class' dengan kelas CSS untuk menu
                )

                // cari tau kenapa CSS tidak terdeteksi atau tidak terkoneksis
            );
            ?>
        </div>
        <p><?php wp_content()?></p>

    </div>





<?php get_footer(); // Memanggil footer untuk elemen-elemen tambahan dan penutup HTML 