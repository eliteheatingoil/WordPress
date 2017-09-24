    </div>  
		<footer>
    <div class="container footer">
      <div class="footer-logo-container">
        <img src="<?php echo get_bloginfo( 'template_directory' );?>/images/white_stacked_logo.png" alt="Elite Heating Oil" class="footer-stacked-logo img-responsive">
        <img src="<?php echo get_bloginfo( 'template_directory' );?>/images/white-long-logo.png" alt="Elite Heating Oil" class="footer-long-logo img-responsive">
      </div>
      <div class="footer-information-container">
        <div class="information">
				  <?php get_template_part('partials/nav-info'); ?>
				</div>

        <div style="clear:both;"></div>
      </div>
    </div>
    <div class="copyright">
      <em>Copyright 2017 Elite Heating Oil, All Rights Reserved.</em>
    </div>
    </footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="<?php echo get_bloginfo( 'template_directory' );?>/dist/js/main.min.js"></script>
<?php wp_footer(); ?> 
  </body>
</html>