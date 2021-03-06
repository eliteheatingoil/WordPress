<?php
$the_query = new WP_Query(array(
  'post_type'			=> 'oil_price',
  'posts_per_page'	=> 1,
  'order'				=> 'DESC'
));
?>

<section class="row price-slice animated fadeIn">
  <div class="container">
      <div class="col-sm-12">
        <div class="content">
          <div class="message text-center">
            <div class="col-sm-12">
            <h2 class="tp-label">Today's Price</h2>
            </div>
            <div class="col-sm-12">
              <div class="col-xs-9 oil-price-container">
                <h3 class="h1 oil-price">

                <?php if( $the_query->have_posts() ): ?>
                  <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
                    echo '$' . get_field('price');
                  endwhile;
                endif;
                ?>
                
                </h3>
              </div>
              <div class="col-xs-3 per-litre-container">
                <div class="row">Per Litre</div>
                <div class="row">Plus Tax</div>
              </div>
            </div>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>request-delivery"><button type="button" class="btn btn-orange">Order Now</button></a>
          </div>
        
          <div class="find-on-facebook">
            <a target="_blank" href="https://www.facebook.com/eliteheatingoil/">
              <img src="<?php echo get_bloginfo( 'template_directory' );?>/images/facebook.svg" alt="Find us on Facebook!">
            </a>
          </div>
        
        </div>
      </div>
  </div>
</section>