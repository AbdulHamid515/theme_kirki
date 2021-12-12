   <?php
if (get_theme_mod('skill_show',true)==true) {?>

    <div class="skill-area section-padding">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-12 col-xs-12 wow fadeInLeft" data-wow-delay="0.3s">
      <img class="img-fluid" src="<?php echo get_theme_mod('skill_image');?>" alt="" >
          </div>
          <div class="col-lg-6 col-md-12 col-xs-12 info wow fadeInRight" data-wow-delay="0.3s">
            <div class="site-heading">
              <h2 class="section-title"> <span><?php echo get_theme_mod('skill_heading');?></span></h2>
              <p>
               <?php echo get_theme_mod('skill_desc');?>
              </p>
            </div>
            <div class="skills-section">
              <!-- Progress Bar Start -->
              <?php 
                $skills =get_theme_mod('skill_repeater');

                foreach ($skills as $skill) {?>

                  <div class="progress-box">
                <h5><?php echo $skill['skill_title'];?> <span class="pull-right"><?php echo $skill['skill_number'];?>%</span></h5>
                <div class="progress" style="opacity: 1; left: 0px;">
                  <div class="progress-bar" role="progressbar" data-width="87" style="width: 87%;"></div>
                </div>
              </div>

                  <?php 
                
                }

              ?>
              
              
              <!-- End Progressbar -->
            </div>
          </div>
        </div>
      </div>
    </div>

  <?php 

}

?>
