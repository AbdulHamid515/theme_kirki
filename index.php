<?php 
/*

Template Name: Home Page
*/
get_header();

?>

      <!-- Hero Area Start -->
      <div id="hero-area" class="hero-area-bg" >
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="contents text-center">
                <h2 class="head-title wow fadeInUp"><?php echo get_theme_mod('banner_heading');?></h2>
                <div class="header-button wow fadeInUp" data-wow-delay="0.3s">
                  <a href="<?php echo get_theme_mod('banner_link');?>" class="btn btn-common"><?php echo get_theme_mod('banner_btn_text');?></a>
                </div>
              </div>
              <div class="img-thumb text-center wow fadeInUp" data-wow-delay="0.6s">
                <img class="img-fluid" src="<?php echo get_theme_mod('banner_image');?>" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Hero Area End -->

    </header>
    <!-- Header Area wrapper End -->
    <!-- Feature Section -->
    <?php get_template_part('template-parts/section', 'feature');?>
   

    <!-- service Section -->
    <?php get_template_part('template-parts/section', 'service');?>

  
   <!-- Video Section -->
    <?php get_template_part('template-parts/section', 'video');?>


  <!-- Team Section -->
    <?php get_template_part('template-parts/section', 'team');?>
    
   
   <!-- counter Section -->
    <?php get_template_part('template-parts/section', 'counter');?>

  <!-- pricing Section -->
    <?php get_template_part('template-parts/section', 'pricing');?>

   <!-- Skill Section -->
    <?php get_template_part('template-parts/section', 'skill');?>
    
    <!-- Portfolio Section -->
    <?php get_template_part('template-parts/section', 'portfolios');?>
  
     <!-- Testomonial Section -->
     <?php get_template_part('template-parts/section', 'testimonial');?>

    <!-- Blog Section -->
     <?php get_template_part('template-parts/section', 'blog');?>

   
    <!-- Clients Section -->
    <?php get_template_part('template-parts/section', 'client');?>

    <!-- Contact Section -->
    <?php get_template_part('template-parts/section', 'contact');?>
    
<?php get_footer();?>