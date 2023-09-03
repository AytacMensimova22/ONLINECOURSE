<?php $this->load->view('user/includes/headerStyle');?>
<?php $this->load->view('user/includes/navbar'); ?>

    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown"><?php echo $this->lang->line('Contact'); ?></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="<?php echo base_url('home'); ?>"><?php echo $this->lang->line('home'); ?></a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page"><?php echo $this->lang->line('contact'); ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

  
    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3"><?php echo $this->lang->line('Contact us'); ?></h6>
                <h1 class="mb-5"><?php echo $this->lang->line('Contact us2'); ?></h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                  
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary"><?php echo $contact['c_office_title_'.$this->session->userdata('site_lang')];?></h5>
                            <p class="mb-0"><?php echo $contact['c_office_desc_'.$this->session->userdata('site_lang')];?></p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary"><?php echo $contact['c_mobile_title_'.$this->session->userdata('site_lang')];?></h5>
                            <p class="mb-0"><?php echo $contact['c_mobile_desc_'.$this->session->userdata('site_lang')];?></p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                            <i class="fa fa-envelope-open text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary"><?php echo $contact['c_mail_title_'.$this->session->userdata('site_lang')];?></h5>
                            <p class="mb-0"><?php echo $contact['c_mail_desc_'.$this->session->userdata('site_lang')];?></p>

                        </div>
                        
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder=<?php echo $this->lang->line('Your email'); ?>>
                            <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2" style="font-size: 15px"><?php echo $this->lang->line('SignUp'); ?></button>
                        </div>
                    </div>
                </div>
                    <div class="col-lg-8 col-md-8 wow fadeInUp" data-wow-delay="0.3s">
                        <iframe class="position-relative rounded w-100 h-100"
                        src="<?php echo $contact['c_map'];?>"
                        frameborder="0" style="min-height: 300px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                    </div>
                
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
    <?php $this->load->view('user/includes/footer');?>
    <?php $this->load->view('user/includes/footerScript');?>
    <!-- Footer End -->


    