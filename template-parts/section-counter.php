<?php 

if (get_theme_mod('counter_show',true)==true) {?>
    <!-- Counter Section Start -->
    <section id="counter" class="section-padding">
      <div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="row">
              <?php 
              $counters = get_theme_mod('counter_repeater');

              foreach ($counters as  $counter) {?>

                   <!-- Start counter -->
              <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="counter-box wow fadeInUp" data-wow-delay="0.2s">
                  <div class="icon-o"><i class="<?php echo $counter['counter_icon'];?>"></i></div>
                  <div class="fact-count">
                    <h3><span class="counter"><?php echo $counter['counter_number'];?></span></h3>
                    <p><?php echo $counter['counter_title'];?></p>
                  </div>
                </div>
              </div>
              <!-- End counter -->
                <?php
                
              }
              ?>
             
          
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Counter Section End -->
  <?php 

}

?>