<?php $this->load->view('user/includes/headerStyle');?>
<?php $this->load->view('user/includes/navbar'); ?>
    


    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown"><?php echo $this->lang->line('about'); ?></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="<?php echo base_url('home'); ?>"><?php echo $this->lang->line('home'); ?></a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page"><?php echo $this->lang->line('about'); ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                            <h5 class="mb-3"><a class="btn btn-primary py-3 px-5 mt-2" href="<?php echo base_url('trainers'); ?>"><?php echo $this->lang->line('Trainers'); ?></a></h5>
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                            <h5 class="mb-3"><a class="btn btn-primary py-3 px-5 mt-2" href="<?php echo base_url('courses'); ?>" class="nav-item nav-link"><?php echo $this->lang->line('courses'); ?></a></h5>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-home text-primary mb-4"></i>
                            <h5 class="mb-3"><a class="btn btn-primary py-3 px-5 mt-2" href="<?php echo base_url('projects'); ?>" class="nav-item nav-link"><?php echo $this->lang->line('Projects2'); ?></a></h5>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
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
                        <img class="img-fluid position-absolute w-100 h-100" src="<?php echo base_url('public/user/');?>img/about.jpg" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3"><?php echo $this->lang->line('about'); ?></h6>
                    <h1 class="mb-4"><?php echo $this->lang->line('about_title'); ?></h1>
                    <p class="mb-4"><?php echo $this->lang->line('about_desc'); ?></p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-5">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"><a href="<?php echo base_url('trainers'); ?>"></i><?php echo $this->lang->line('Trainers2'); ?></p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"><a href="<?php echo base_url('courses'); ?>"></i><?php echo $this->lang->line('Online Classes'); ?></p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"><a href="<?php echo base_url('courses'); ?>"></i><?php echo $this->lang->line('International Certificate'); ?></p>
                    </div>  </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    
    <!-- Team End -->
        

    <!-- Footer Start -->
    <?php $this->load->view('user/includes/footer');?>
    <?php $this->load->view('user/includes/footerScript');?>
    <!-- Footer End -->


   