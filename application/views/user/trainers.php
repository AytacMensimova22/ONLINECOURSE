<?php $this->load->view('user/includes/headerStyle');?>
<?php $this->load->view('user/includes/navbar'); ?>


    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown"><?php echo $this->lang->line('Trainers_title'); ?></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="<?php echo base_url('home'); ?>"><?php echo $this->lang->line('home'); ?></a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page"><a class="text-white" href="<?php echo base_url('trainers'); ?>"><?php echo $this->lang->line('Trainers'); ?></a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3"><?php echo $this->lang->line('Trainers'); ?></h6>
                <br>
                <br>
                <br>
            </div>
            <div class="row g-4">
                <?php foreach($trainers as $item) { ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="position-relative d-block overflow-hidden" href="<?php echo base_url('singleTrainer/'.$item['t_id']); ?>">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <?php if($item['t_file']){ ?>
                            <img class="img-fluid" src="<?php echo base_url('uploads/trainers/'.$item['t_file']); ?>" alt="">
                            <?php }else{ ?>
                                    <img  style="width:100%!important; height:300px !important; object-fit:cover!important;" class="img-fluid" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRheH5b3OQCYJbEsZKNFU0Api1vyoZZf8Notw&usqp=CAU" alt="">
                                <?php } ?>
                       
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0"><?php echo $item['t_name_'.$this->session->userdata('site_lang')];?></h5>
                            <small><?php echo $item['c_name_'.$this->session->userdata('site_lang')];?></small>
                        </div>
                    </div>
                </div>
                <?php } ?> 
            </div>  
        </div>    
    </div>
    <!-- Team End -->
        <br>
        <br>
        <br>

    <!-- Footer Start -->
    <?php $this->load->view('user/includes/footer');?>
    <?php $this->load->view('user/includes/footerScript');?>
    <!-- Footer End -->

