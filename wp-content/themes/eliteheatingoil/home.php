<?php get_header(); ?>

<div class="row hero">
  <div class="container">

    <div class="hero-slider text-center">
      <div class="slide">
        <div class="slide-content">
          <img src="<?php echo get_bloginfo( 'template_directory' );?>/images/promo.png" alt="" class="img-responsive">
          <button type="button" class="btn btn-orange">Order Now</button>
        </div>
      </div>
      <div class="slide">
        <div class="slide-content text-center">
          <img src="<?php echo get_bloginfo( 'template_directory' );?>/images/promo.png" alt="" class="img-responsive">
          <button type="button" class="btn btn-orange">Order Now</button>
        </div>
      </div>
      <div class="slide">        
        <div class="slide-content text-center">
          <img src="<?php echo get_bloginfo( 'template_directory' );?>/images/promo.png" alt="" class="img-responsive">
          <button type="button" class="btn btn-orange">Order Now</button>
        </div>
      </div>
    </div>

  </div>
</div>

<div class="row price-slice">
  <div class="container">
    <div class="col-sm-12 content">
      <div class="message text-center">
        <div class="col-sm-12">
        <h2 class="tp-label">Today's Price</h2>
        </div>
        <div class="col-sm-12">
          <div class="col-xs-9 oil-price-container">
            <h3 class="h1 oil-price">$0.7690</h3>
          </div>
          <div class="col-xs-3 per-litre-container">
            <div class="row">Per Litre</div>
            <div class="row">Plus Tax</div>
          </div>
        </div>
        <button type="button" class="btn btn-orange">Order Now</button>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>