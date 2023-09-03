
<?php $this->load->view('user/includes/headerStyle');?>
<?php $this->load->view('user/includes/navbar'); ?>  

    <!-- Carousel Start -->
    
    
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
        
            <?php foreach($slider as $item) { ?>
                <div class="owl-carousel-item position-relative">
                <img style="height:1200px!important; object-fit:cover;" class="img-fluid" src="<?php echo base_url('uploads/slider/'.$item['sr_file']); ?>" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown"><?php echo $this->lang->line('online courses'); ?></h5>
                                <h1 class="display-3 text-white animated slideInDown"><?php echo $item['sr_title_'.$this->session->userdata('site_lang')]; ?></h1>
                                    <?php if($item['sr_link']){ ?>
                                        <a  target="_blank" href="<?php echo $item['sr_link']; ?>" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft"><?php echo $this->lang->line('readmore'); ?></a>
                                    <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php } ?>
            </div>
            </div>
            
            
        
    <!-- Carousel End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3;" style="width: 100%!important; min-height: 218px!important;">
                        <div class="p-4">
                            <i class="fa fa-3x fa-graduation-cap text-primary mb-4;" style="width: 100%!important; min-height: 55px!important;"></i>
                            <h5 class="mb-3"><a class="btn btn-primary py-3 px-5 mt-2" href="<?php echo base_url('trainers'); ?>"><?php echo $this->lang->line('Trainers'); ?></a></h5>
                            
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3;" style="width: 100%!important; min-height: 218px!important;">
                        <div class="p-4">
                            <i class="fa fa-3x fa-globe text-primary mb-4;" style="width: 100%!important; min-height: 55px!important;"></i>
                            <h5 class="mb-3"><a class="btn btn-primary py-3 px-5 mt-2" href="<?php echo base_url('courses'); ?>" class="nav-item nav-link"><?php echo $this->lang->line('courses'); ?></a></h5>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center pt-3;" style="width: 100%!important; min-height: 218px!important;">
                        <div class="p-4">
                            <i class="fa fa-3x fa-home text-primary mb-4;" style="width: 100%!important; min-height: 55px!important;"></i>
                            <h5 class="mb-3"><a class="btn btn-primary py-3 px-5 mt-2" href="<?php echo base_url('projects'); ?>" class="nav-item nav-link"><?php echo $this->lang->line('Projects2'); ?></a></h5>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3;" style="width: 100%!important; min-height: 218px!important;">
                        <div class="p-4">
                            <i class="fa fa-3x fa-book-open text-primary mb-4;" style="width: 100%!important; min-height: 55px!important;"></i>
                           <h5 class="mb-3"><a class="btn btn-primary py-3 px-5 mt-2" href="<?php echo base_url('library'); ?>" class="nav-item nav-link"><?php echo $this->lang->line('Online Library2'); ?></a></h5>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="<?php echo base_url('public/user/') ?>img-fluid position-absolute w-100 h-100" src="<?php echo base_url('public/user/') ?>img/about.jpg" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3"><?php echo $this->lang->line('about'); ?></h6>
                    <h1 class="mb-4"><?php echo $this->lang->line('about_title'); ?></h1>
                    <p class="mb-4"><?php echo $this->lang->line('about_desc'); ?></p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-4">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"><a href="<?php echo base_url('trainers'); ?>"></i><?php echo $this->lang->line('Trainers2'); ?></p>
                        </div>
                        <div class="col-sm-4">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"><a href="<?php echo base_url('courses'); ?>"></i><?php echo $this->lang->line('Online Classes'); ?></p>
                        </div>
                        <div class="col-sm-4">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i><?php echo $this->lang->line('International Certificate'); ?></p>
                        </div>
                        
                    </div>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="<?php echo base_url('about'); ?>"><?php echo $this->lang->line('readmore'); ?></a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Categories Start -->
    <div class="container-xxl py-5 category">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3"><?php echo $this->lang->line('events'); ?></h6>
                <h1 class="mb-5"><?php echo $this->lang->line('events2'); ?></h1>
            </div>

            
            
                
                <div class="row g-3">
                        <div class="col-lg-12 col-md-12">
                            <div class="row g-3">

                            <?php foreach($NewsEvents as $item){ ?>
                                
                                <div class="col-lg-4 col-md-4 wow zoomIn" data-wow-delay="0.3s">
                                    <a class="position-relative d-block overflow-hidden" href="<?php echo base_url('singleEvent/'.$item['e_id']); ?>">
                                        <img style="width:100%!important; height:300px !important; object-fit:cover!important;" class="img-fluid" src="<?php echo base_url('uploads/events/'.$item['e_file']); ?>" alt="">
                                        <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                            <h5 class="m-0"><?php echo $item['e_title_'.$this->session->userdata('site_lang')]; ?></h5>
                        
                                        </div>
                                    </a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                
                 </div>

          
            
        </div>
    </div>
    <!-- Categories Start -->
<style>
    .d{
        width:100%!important;
        height:300px!important;
        object-fit:cover!important;
    }
    
</style>

    <!-- Courses Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3"><?php echo $this->lang->line('COURSES WE CHOOSE FOR YOU'); ?></h6>
                <h1 class="mb-5"><?php echo $this->lang->line('COURSES WE CHOOSE FOR YOU2'); ?></h1>
            </div>
            <div class="row g-4 justify-content-center">
 
            <?php foreach($PopularCourses as $item){ ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid d" src="<?php echo base_url('uploads/news/').$item['n_file'] ?>" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="<?php echo base_url('single_news/'.$item['n_id']); ?>" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                                
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                            
                                <h3 class="mb-0"><?php echo $item['n_price_'.$this->session->userdata('site_lang')];?></h3>
                           
                            <div class="mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small>(123)</small>
                            </div>
                            <div style="width: 100%!important;min-height: 50px!important;">
                                <h5 class="mb-4"><?php echo $item['c_name_'.$this->session->userdata('site_lang')];?></h5>
                            </div>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i><?php echo $item['n_month_'.$this->session->userdata('site_lang')];?></small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i><?php echo $item['n_times_'.$this->session->userdata('site_lang')];?></small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i><?php echo $item['n_hour_'.$this->session->userdata('site_lang')];?></small>
                        </div>
                    </div>
                </div>
            <?php } ?>
                
                
                
            </div>
        </div>
    </div>
    <!-- Courses End -->
    <div class="row m-0">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3"><?php echo $this->lang->line('Trainers'); ?></h6>
                <h1 class="mb-5"><?php echo $this->lang->line('Trainers_title'); ?></h1>
            </div>
                <?php foreach($trainers as $item) { ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="position-relative d-block overflow-hidden" href="<?php echo base_url('singleTrainer/'.$item['t_id']); ?>">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" >
                            <?php if($item['t_file']){ ?>
                            <img class="img-fluid" src="<?php echo base_url('uploads/trainers/'.$item['t_file']); ?>" alt="">
                            <?php }else{ ?>
                                    <img  style="width:100%!important; height:300px !important; object-fit:cover!important;" class="img-fluid" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRheH5b3OQCYJbEsZKNFU0Api1vyoZZf8Notw&usqp=CAU" alt="">
                                <?php } ?>
                       
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1" >
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4 mt-1" style="width: 100%!important; min-height: 80px!important;">
                            <h5 class="mb-0"><?php echo $item['t_name_'.$this->session->userdata('site_lang')];?></h5>
                            <small><?php echo $item['c_name_'.$this->session->userdata('site_lang')];?></small>
                        </div>
                    </div>
                </div>
                <?php } ?> 
            </div> 

    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3"><?php echo $this->lang->line('students'); ?></h6>
                <h1 class="mb-5"><?php echo $this->lang->line('students2'); ?></h1>
            </div>
            
            <div class="owl-carousel testimonial-carousel position-relative">
            <?php foreach($students as $item){ ?>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="<?php echo base_url('uploads/students/') .$item['s_file'] ?>" style="object-fit: cover; width: 80px; height: 80px;">
                    
                    <a href="<?php echo base_url('singleStudent/'.$item['s_id']); ?>"  style="border-radius: 30px 0 0 30px;"><h5 class="mb-0"><?php echo $item['s_title_'.$this->session->userdata('site_lang')]; ?></h5></a>
                
                
                    
                    <br>
   
                    <div class="testimonial-text bg-light text-center p-4;" style="width: 100%!important; min-height: 150px!important;">
                    <p class="mb-0;text-center p-4 pb-0"><?php echo $item['s_description_'.$this->session->userdata('site_lang')]; ?></p>
                    </div>
                </div>
                <?php } ?>
            </div>
           
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- Footer Start -->
        
    <?php $this->load->view('user/includes/footer');?>
    <?php $this->load->view('user/includes/footerScript');?>
     <!-- Footer End -->


    