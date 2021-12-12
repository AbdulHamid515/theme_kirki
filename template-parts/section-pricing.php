  
<?php 

if (get_theme_mod('pricing_show',true)==true) {?>
  <!-- Pricing section Start --> 
    <section id="pricing" class="section-padding bg-gray">
      <div class="container">
        <div class="section-header text-center">
          <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s"><?php echo get_theme_mod('pricing_heading');?></h2>
          <p><?php echo get_theme_mod('pricing_desc');?></p>
        </div>
        <div class="row">


          <?php 
          $pricings = get_theme_mod('price_repeater');

          foreach ($pricings as  $price) {?>


           <div class="col-lg-4 col-md-6 col-xs-12">
            <div id="<?php if($price['price_featured']==true){
              echo 'active-tb';
            }?>">
              
            
            <div class="table wow fadeInLeft" data-wow-delay="1.2s">
              <div class="title">
                <h3><?php echo $price['price_name'];?></h3>
              </div>
              <div class="pricing-header">
                <p class="price-value">$<?php echo $price['price_amount'];?><span>/ <?php echo $price['price_days'];?></span></p>
              </div>
              <ul class="description">
                <li><?php echo $price['price_feature-1'];?></li>
                <li><?php echo $price['price_feature-2'];?></li>
                <li><?php echo $price['price_feature-3'];?></li>
                <li><?php echo $price['price_feature-4'];?></li>
                <li><?php echo $price['price_feature-5'];?></li>
                <li><?php echo $price['price_feature-6'];?></li>
              </ul>
              <button class="btn btn-common"><a href="<?php echo $price['price_btn_url'];?>"><?php echo $price['price_btn_text'];?></a></button>
            </div> 
            </div>
          </div>
            <?php
           
          }

          ?>
          

        </div>
      </div>
    </section>
    <!-- Pricing Table Section End -->
  <?php 

}

?>