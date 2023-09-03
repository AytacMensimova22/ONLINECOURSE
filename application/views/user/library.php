
<?php $this->load->view('user/includes/headerStyle');?>
<?php $this->load->view('user/includes/navbar'); ?>


    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown"><?php echo $this->lang->line('Online Library'); ?></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="<?php echo base_url('home'); ?>"><?php echo $this->lang->line('home'); ?></a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page"><a class="text-white" href="<?php echo base_url('library'); ?>"><?php echo $this->lang->line('Online Library'); ?></a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <div style="width:1000px!important; height:500px !important;  object-fit:cover!important;"class="container-fluid p-0 mb-5">
        <div style="width:1000px!important; height:500px !important; object-fit:cover!important;"class="owl-carousel header-carousel position-relative">
        
            <?php foreach($library as $item) { ?>
            <div style="width:1000px!important; height:500px !important; object-fit:cover!important;"class="owl-carousel-item position-relative">
                <img style="width:1000px!important; height:500px !important; object-fit:cover!important;" class="img-fluid" src="<?php echo base_url('uploads/library/'.$item['l_file']); ?>" alt="">
                <div style="width:300px!important; height:500px !important; object-fit:cover!important;" class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div style="width:300px!important; height:500px !important; object-fit:cover!important;"class="container">
                        <div style="width:300px!important; height:500px !important; object-fit:cover!important;"class="row justify-content-start">
                            <div style="width:300px!important; height:500px !important; object-fit:cover!important;"class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown"><?php echo $this->lang->line('Online Library'); ?></h5>
                                <h1 class="display-5 text-white animated slideInDown"><?php echo $item['l_title_'.$this->session->userdata('site_lang')]; ?></h1> 
                                <h1 class="display-5 text-white animated slideInDown"><?php echo $item['l_number_'.$this->session->userdata('site_lang')]; ?></h1>
                                    <?php if($item['l_link']){ ?>
                                        <a  target="_blank" href="<?php echo $item['l_link']; ?>" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft"><?php echo $this->lang->line('readmore'); ?></a>
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



        

    <!-- Footer Start -->
    <?php $this->load->view('user/includes/footer');?>
    <?php $this->load->view('user/includes/footerScript');?>
    <!-- Footer End -->


  


   