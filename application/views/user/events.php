<?php $this->load->view('user/includes/headerStyle');?>
<?php $this->load->view('user/includes/navbar'); ?>


    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown"><?php echo $this->lang->line('events'); ?></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="<?php echo base_url('home'); ?>"><?php echo $this->lang->line('home'); ?></a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page"><a class="text-white" href="<?php echo base_url('events'); ?>"><?php echo $this->lang->line('events'); ?></a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Categories Start -->
 
    <div class="container-xxl py-5 category">
  
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3"><?php echo $this->lang->line('events2'); ?></h6>
                <br>
                <br>
                <br>
            <div class="row g-3">
                <div class="col-lg-12 col-md-12">
                    <div class="row g-3">
                        <?php foreach($events as $item) { ?>
                        <div class="col-lg-4 col-md-4 wow zoomIn" data-wow-delay="0.1s">
                            <a class="position-relative d-block overflow-hidden" href="<?php echo base_url('singleEvent/'.$item['e_id']); ?>">
                                <?php if($item['e_file']){ ?>
                                    <img  style="width:100%!important; height:300px !important; object-fit:cover!important;" class="img-fluid" src="<?php echo base_url('uploads/events/'.$item['e_file']); ?>" alt="">
                                <?php }else{ ?>
                                    <img  style="width:100%!important; height:300px !important; object-fit:cover!important;" class="img-fluid" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRheH5b3OQCYJbEsZKNFU0Api1vyoZZf8Notw&usqp=CAU" alt="">
                                <?php } ?>
                                
                                <div style="width:100%; display:flex; justify-content:center; align-items:center;background-color: #06bbcc !important;" class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0" style="color: white!important;"><?php echo $item['e_title_'.$this->session->userdata('site_lang')];?></h5>
                                   
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
<br>
<br>


        

    <!-- Footer Start -->
    <?php $this->load->view('user/includes/footer');?>
    <?php $this->load->view('user/includes/footerScript');?>
    <!-- Footer End -->


  