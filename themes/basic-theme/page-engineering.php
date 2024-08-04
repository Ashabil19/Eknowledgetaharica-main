<?php
// Periksa apakah URL saat ini adalah halaman login
if (strpos($_SERVER['REQUEST_URI'], '/login') !== false) {
    get_header('header');
    // Jika URL adalah halaman login, maka hanya menampilkan konten yang sesuai
    if (have_posts()):
        while (have_posts()):
            the_post();
            the_content();
        endwhile;
    else:
        // Jika tidak ada konten yang ditemukan
        echo "No content found.";
    endif;  
} else {
    // Jika URL bukan halaman login, tampilkan konten lengkap
    get_header('secondary');
    ?>

    <div class="fullscreen taharica-bg">
        <div class="wrapper-heading container d-flex justidy-content-center align-items-start flex-column mb-5">
            <h1><?php echo ucfirst(get_the_title()); ?></h1>

            <!-- Tombol create / upload -->
            <div class="d-flex justify-content-center align-items-center px-3" style="gap:20px;">
                <?php
                $current_user = wp_get_current_user();
                $role = $current_user->roles[0];  // Mendapatkan peran pengguna

                $home_url = home_url(); // URL beranda

                // Tampilkan tombol berdasarkan peran pengguna
                switch ($role) {
                    case "administrator":
                        echo "<a href='$home_url/wp-admin/' class='border-white search-btn text-white'>Dashboard Administrator</a>";
                        break;
                    case "it":
                    case "hrd":
                    case "engineering":
                    case "sales":
                        $page = strtolower($role);
                        echo "<a href='$home_url/wp-admin/post-new.php?post_type=$page' class='border-white search-btn text-white'>Create Post</a>";
                        break;
                    default:
                        // Tidak ada tautan
                        break;
                }
                ?>
                <a href='<?php echo "$home_url/uploadfile"; ?>' class="border-white search-btn text-white">Upload Document</a>
            </div>
        </div>

    



        <!-- Artikel Terpopuler -->
        <section class="page mt-5">
            <div class="container-fluid text-light container">
                <h1 class="p-0 text-start m-text">Most View</h1>

                <div class="mostview">
                    <?php
                    // Query untuk mendapatkan artikel terpopuler
                    $args = array(
                        'post_type' => 'engineering', // Ganti 'sales' dengan jenis post Anda
                        'posts_per_page' => 3, // Jumlah maksimal artikel yang ditampilkan
                    );

                    $popular_posts = new WP_Query($args);

                    if ($popular_posts->have_posts()) :
                        while ($popular_posts->have_posts()) : $popular_posts->the_post();
                            ?>
                            <div class="mostview-card">
                                <a class="mostviewHome" href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('thumbnail', array('class' => 'img-fluid')); ?>
                                    <?php else : ?>
                                        <?php $image = get_field('post-image'); ?>
                                        <?php if ($image) : ?>
                                            <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image); ?>" class="img-fluid" />
                                        <?php else : ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/programmer.jpeg" alt="img" class="img-fluid" />
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <p class="mostviewCaption text-center text-light">
                                        <?php the_title(); ?>
                                    </p>
                                </a>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p>No posts found</p>';
                    endif;
                    ?>
                </div>
                
                
                <!--code untuk product catalog-->
               <div class="container my-5 text-dark d-flex custom-bg-transparent">
                    <div class="row mb-4 p-2">
                        <div class="col-6">
                            <h3 class="mb-3 text-light">Katalog Produk</h3>
                        </div>
                        <div class="col-6 text-right">
                            <a class="btn btn-light mb-3 mr-1" href="#carousel-NamaKategori" role="button" data-slide="prev">
                                <i class="fa fa-arrow-left"></i>
                            </a>
                            <a class="btn btn-light mb-3" href="#carousel-NamaKategori" role="button" data-slide="next">
                                <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                
                        <div class="col-12">
                            <div id="carousel-NamaKategori" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <?php
                                    // Hubungkan ke database
                                    include 'koneksi_manual.php';
                
                                    // Periksa koneksi database
                                    if ($koneksi->connect_error) {
                                        die("Connection failed: " . $koneksi->connect_error);
                                    }
                
                                    $query = "SELECT * FROM wp_file WHERE divisi IN ('engineering', '')";
                                    $result = $koneksi->query($query);
                
                                    $count = 0;
                                    if ($result) {
                                        while ($item = $result->fetch_assoc()) {
                                            $thumbnail = get_template_directory_uri() . '/thumbnail/' . $item['thumbnail'];
                                            $judul = $item['judul'];
                                            $deskripsi = $item['deskripsi'];
                                            $document_id = $item['id'];
                                            $active_class = ($count == 0) ? 'active' : '';
                
                                            if ($count % 3 == 0) {
                                                echo '<div class="carousel-item ' . $active_class . '"><div class="row">';
                                            }
                
                                            echo '<div class="col-md-4 mb-3">
                                                    <a class="text-dark" href="' . get_home_url() . '/pdfview?document_id=' . $document_id . '" target="_blank">
                                                        <div class="card">
                                                            <img src="' . $thumbnail . '" alt="img" class="img-fluid card-img-top" />
                                                        </div>
                                                    </a>
                                                </div>';
                
                                            $count++;
                
                                            if ($count % 3 == 0 || $count == $result->num_rows) {
                                                echo '</div></div>'; // Close carousel-item and row if it's the third item or last item
                                            }
                                        }
                                    } else {
                                        echo '<div class="col-12"><p>Query failed: ' . $koneksi->error . '</p></div>';
                                    }
                
                                    // Tutup koneksi database
                                    $koneksi->close();
                                    ?>
                                </div>
                
                                <!-- Controls -->
                                <a class="carousel-control-prev" href="#carousel-NamaKategori" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-NamaKategori" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <br><br><br>

                <!-- Daftar Kategori -->
                <div class="container my-5 text-dark d-flex custom-bg-transparent">
                    <?php
                    // Query untuk mendapatkan daftar posting berdasarkan kategori
                    $args = array(
                        'post_type' => 'engineering', // Ganti 'sales' dengan jenis post Anda
                        'posts_per_page' => -1, // Jumlah maksimal artikel yang ditampilkan
                    );

                    $query = new WP_Query($args);

                    if ($query->have_posts()) {
                        // Inisialisasi array untuk menyimpan posting berdasarkan kategori
                        $posts_by_category = array();

                        while ($query->have_posts()) {
                            $query->the_post();
                            // Dapatkan kategori untuk posting saat ini
                            $kategori = get_field('kategori'); // Ganti dengan meta key kategori Anda

                            if ($kategori) {
                                // Periksa apakah kategori sudah ada di dalam array, jika belum, buat kunci array baru untuk kategori tersebut
                                if (!isset($posts_by_category[$kategori])) {
                                    $posts_by_category[$kategori] = array();
                                }
                                // Simpan posting saat ini dalam array berdasarkan kategori
                                $posts_by_category[$kategori][] = $post;
                            }
                        }

                        // Output posting berdasarkan kategori
                        foreach ($posts_by_category as $kategori => $posts) {
                            echo '<div class="row mb-4 p-2">';
                            echo '<div class="col-6">';
                            echo '<h3 class="mb-3 text-light">' . esc_html($kategori) . '</h3>'; // Output judul kategori sebagai judul bagian
                            echo '</div>';
                            echo '<div class="col-6 text-right">';
                            echo '<a class="btn btn-light mb-3 mr-1" href="#carousel-' . esc_attr($kategori) . '" role="button" data-slide="prev">';
                            echo '<i class="fa fa-arrow-left"></i>';
                            echo '</a>';
                            echo '<a class="btn btn-light mb-3" href="#carousel-' . esc_attr($kategori) . '" role="button" data-slide="next">';
                            echo '<i class="fa fa-arrow-right"></i>';
                            echo '</a>';
                            // echo '<a class="btn btn-warning mb-3 ml-1" href="http://localhost/staging_eknowledge/categories/?kategori=' . esc_attr($kategori) . '" target="_blank" >More...</a>'; // URL target berdasarkan kategori
                            echo '</div>';

                            echo '<div class="col-12">';
                            echo '<div id="carousel-' . esc_attr($kategori) . '" class="carousel slide" data-ride="carousel">';
                            echo '<div class="carousel-inner">';

                            $chunks = array_chunk($posts, 3); // Bagi posting menjadi chunk berisi 3 item per slide
                            foreach ($chunks as $index => $chunk) {
                                echo '<div class="carousel-item ' . ($index === 0 ? 'active' : '') . '">';
                                echo '<div class="row">';
                                foreach ($chunk as $post) {
                                    setup_postdata($post);
                                    ?>
                                    <div class="col-md-4 mb-3">
                                        <a class="text-dark" href="<?php the_permalink(); ?>">
                                            <div class="card">
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <?php the_post_thumbnail('medium', array('class' => 'img-fluid card-img-top')); ?>
                                                <?php else :
                                                    $image = get_field('post-image'); // Ganti dengan meta key gambar posting Anda
                                                    if ($image) : ?>
                                                        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image); ?>" class="img-fluid card-img-top" />
                                                    <?php else : ?>
                                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/programmer.jpeg" alt="img" class="img-fluid card-img-top" />
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <div class="card-body">
                                                    <h4 class="card-title">
                                                        <?php
                                                        // Dapatkan judul posting
                                                        $title = get_the_title();

                                                        // Pecah judul menjadi array berdasarkan spasi
                                                        $words = explode(' ', $title);

                                                        // Dapatkan dua kata pertama
                                                        $short_title = implode(' ', array_slice($words, 0, 2));

                                                        // Periksa apakah judul memiliki lebih dari dua kata
                                                        $has_more_words = count($words) > 2;

                                                        echo esc_html($short_title . ($has_more_words ? '...' : ''));
                                                        ?>
                                                    </h4>
                                                    <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 8, '...'); ?></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                }
                                echo '</div>';
                                echo '</div>';
                            }
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p>No posts found</p>';
                    }
                    // Mengembalikan data asli Post
                    wp_reset_postdata();
                    ?>
                </div>

                <?php
                // Tampilkan konten jika ada
                if (have_posts()) :
                    while (have_posts()) :
                        the_post(); ?>
                        <?php //the_content(); ?>
                    <?php endwhile;
                endif;
                ?>
            </div>
        </section>

    </div>

    <?php get_footer();
} // Tutup blok kondisi 
?>
