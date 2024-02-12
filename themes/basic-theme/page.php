<?php get_header('secondary'); ?>
<div class="wrapper-heading container d-flex justidy-content-center align-items-start flex-column mb-5">
        <h1><?php the_title(); ?></h1>  <a href="http://eknowledgetaharica.test/wp-admin/post-new.php" class="create-post search-btn border-white text-center" target="_blank"> Create Post</a>

        </div>
<section class="page">
    <div class=" container text-light p-5">
        
      
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; else : endif; ?>


        <h1 class="">MostView</h1>
        <section class="post-highlight gap-custom d-flex justify-content-center align-items-center">
            <div class="mostview-card">
                <a class="mostviewHome" >
                    <img src="<?php echo get_template_directory_uri(); ?> /assets/programmer.jpeg" alt="gambar" class="img-fluid "  />
                    <p class="mostviewCaption text-center">Odoo</p>
                </a>

            </div>
            <div class="mostview-card">
                <a class="mostviewHome" >
                    <img src="<?php echo get_template_directory_uri(); ?> /assets/programmer.jpeg" alt="gambar" class="img-fluid "  />
                    <p class="mostviewCaption text-center">Python</p>
                </a>

            </div>
            <div class="mostview-card">
                <a class="mostviewHome" >
                    <img src="<?php echo get_template_directory_uri(); ?> /assets/programmer.jpeg" alt="gambar" class="img-fluid "  />
                    <p class="mostviewCaption text-center">Javascript</p>
                </a>

            </div>
            <div class="mostview-card">
                <a class="mostviewHome" >
                    <img src="<?php echo get_template_directory_uri(); ?> /assets/programmer.jpeg" alt="gambar" class="img-fluid "  />
                    <p class="mostviewCaption text-center">Wordpress</p>
                </a>

            </div>
        </section>



       <div class="mostview"></div>

        <br><br><br>

        <?php
                // Mendapatkan slug halaman dari URL
                $page_slug = get_query_var('pagename');

                // Kategori yang diizinkan
                $allowed_categories = array('it', 'hr', 'engineering', 'hadist', 'other');

                // Cek apakah slug halaman termasuk dalam kategori yang diizinkan
                if (in_array($page_slug, $allowed_categories)) {
                    // Dapatkan ID kategori berdasarkan slug halaman
                    $category = get_category_by_slug($page_slug);
                    $category_id = $category->term_id;

                    // Dapatkan semua tags terkait dengan kategori
                    $tags = get_tags(array(
                        'taxonomy' => 'post_tag',
                        'object_ids' => get_posts(array(
                            'category' => $category_id,
                            'fields' => 'ids',
                        )),
                    ));

                    // Tampilkan daftar tags jika ada
                    if ($tags) {
                        echo '<ul>';
                        foreach ($tags as $tag) {
                            echo '<li><a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a></li>';
                        }
                        echo '</ul>';
                    } else {
                        // Pesan jika tidak ada tags untuk kategori yang dipilih
                        echo '<p>No tags found for the selected category.</p>';
                    }
                }                       
        ?>





    </div>
</section>

<?php get_footer(); ?>
