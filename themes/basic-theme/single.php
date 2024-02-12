<?php get_header('secondary'); ?>

<section class="pageSingle bg-white-custom vh-100">
    <div class="p-4 text-dark">

        <h1><?php the_title(); ?></h1>

        <?php get_template_part('includes/section', 'blogcontent'); ?>

        <?php
        // Menampilkan formulir komentar dan daftar komentar
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
        ?>

    </div>
</section>

<?php get_footer(); ?>
