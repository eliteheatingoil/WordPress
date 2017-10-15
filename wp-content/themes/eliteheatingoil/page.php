<?php get_header(); ?>
<?php get_template_part('partials/hero'); ?>
<?php get_template_part('partials/todays-price'); ?>
<div class="container">

<div class="page-content col-xs-12 col-sm-10 col-sm-offset-1">
    <?php while ( have_posts() ) : the_post(); ?>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
            <li class="breadcrumb-item active"><?php the_title(); ?></li>
        </ol>

        <div class="page-title">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </div>
        <div class="page-body">
            <?php the_content(); ?> 
        </div>
    <?php endwhile; ?>
</div>

</div>

<?php get_footer(); ?>