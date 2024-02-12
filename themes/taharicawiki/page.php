
<!-- ini adalah section page per divisi -->

<?php get_header(); ?>

<section class="page-wrap">

    <!-- ini adalah tempat untuk mengisi artikel perDivisi -->

    <div class="container">

        <!-- target pembuatan option bar -->

        <h1><?php the_title(); ?></h1>

        <?php get_template_part('includes/section', 'content'); ?>
        <!-- penggantian param ke dua ke archive dari content -->

        <!-- Menampilkan menu navigasi -->
      

    </div>

</section>

<?php get_footer(); ?>
