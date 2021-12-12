<?php 
if (get_theme_mod('service_show',true)==true) {?>
  <!-- Services Section Start -->
    <section id="services" class="section-padding bg-gray">
      <div class="container">
        <div class="section-header text-center">
          <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s"><?php echo get_theme_mod('service_heading');?></h2>
          <p class="service_para"><?php echo get_theme_mod('service_desc');?>.</p>
        </div>
        <div class="row">
          
           <?php 
            $services = get_theme_mod('services_repeater');
            foreach ($services as $service)  {?>
              <div class=" <?php echo get_theme_mod('service_align_number');?> ">
              <div class="services-item wow fadeInRight" data-wow-delay="0.3s">
              <div class="icon">
                <i class="<?php echo $service['services_item_icon'];?>"></i>
              </div>
              <div class="services-content">
                <h3><a href="#"><?php echo $service['services_item_title'];?></a></h3>
                <p><?php echo $service['services_item_desc'];?></p>
              </div>
            </div>
             </div>
              <?php  }

            ?>
           
       
        </div>
      </div>
    </section>
    <!-- Services Section End -->
  <?php 

}

?>