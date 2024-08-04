<?php if (have_posts()): while(have_posts()): the_post(); ?> 

    <section class="">
    <div class="">
        <div class="row">
            <div class="col-xl-8 mx-auto border p-2">
                <p class="text-left text-dark">
                    <?php echo get_the_date('d F Y');?> <!-- Fungsi bawaan WP untuk mengambil Tanggal bulan dan tahun --> 
                </p>
                <p class="text-left text-dark ">
                    Author: 
                    <?php 
                        $fname = get_the_author_meta('first_name'); 
                        $lname = get_the_author_meta('last_name');
                        echo $fname .' '. $lname; 
                    ?>
                </p>
                <!-- Bagian untuk menampilkan konten artikel -->
                <div class="text-left text-dark">
                    <?php 
                        the_content(); 
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
    

<?php endwhile; else: endif;?>
