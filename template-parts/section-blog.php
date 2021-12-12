<section id="blog" class="section-padding">
      <!-- Container Starts -->
      <div class="container">
        <div class="section-header text-center">
          <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Latest blog</h2>
          <p>A desire to help and empower others between community contributors in technology <br> began to grow in 2020.</p>
        </div>
        <div class="row">

          <?php 

          $args = array(
            'post_type' =>'post',
            'posts_per_page' => 4, 

          );

          $query = new WP_Query($args);

            while ($query->have_posts()) {
              $query->the_post();
              ?>
               <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 blog-item">
            <!-- Blog Item Starts -->
            <div class="blog-item-wrapper wow fadeInLeft" data-wow-delay="0.3s">
              <div class="blog-item-img">
                <a href="<?php echo the_permalink();?>">
                <?php echo the_post_thumbnail();?>
                </a>                
              </div>
              <div class="blog-item-text"> 
                <h3>
                <a href="<?php echo the_permalink();?>"><?php echo the_title();?></a>
                </h3>
                <p>
                <?php echo the_excerpt();?> 
                </p>
                <a href="<?php echo the_permalink();?>" class="btn btn-common btn-rm"><?php echo esc_html('Read More','kirki-theme');?></a>
              </div>
            </div>
            <!-- Blog Item Wrapper Ends-->
          </div>
              <?php 
            }
          wp_reset_postdata();
          ?>
         

        </div>
      </div>
    </section>
    <!-- blog Section End -->