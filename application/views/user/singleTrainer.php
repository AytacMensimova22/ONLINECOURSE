
<?php $this->load->view('user/includes/headerStyle');?>
<?php $this->load->view('user/includes/navbar'); ?>
    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown"><?php echo $this->lang->line('Trainers'); ?></h1>
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


    <!-- Navbar End -->
    <!-- Breaking News Start -->
    
    <!-- Breaking News End -->


    <!-- News With Sidebar Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <!-- News Detail Start -->
                    <div class="position-relative mb-3">
                        <img style="width:300px!important; height:300px !important; object-fit:cover!important;" class="img-fluid w-100" src="<?php echo base_url('uploads/trainers/'.$single_data['t_file']); ?>" style="object-fit: cover;">
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div> 
                        <div class="text-center p-4 text-secondary text-uppercase font-weight-bold">
                            <small><?php echo $single_data['c_name_'.$this->session->userdata('site_lang')];?></small>
                        </div>  
                    </div>
                        
                    <!-- News Detail End -->

                         
                </div>

                <div class="col-lg-5">
                    
                    <!-- Newsletter End -->
                    <div class="position-relative mb-3">
                        
                        <div style="width:380px!important; min-height:300px !important; object-fit:cover!important;"class="bg-white border border-top-0 p-4">
                            
                            <h5 class="mb-3 text-secondary text-uppercase font-weight-bold"><?php echo $single_data['t_name_'.$this->session->userdata('site_lang')];?></h5>
                            <p><?php echo $single_data['t_description_'.$this->session->userdata('site_lang')];?></p>
                            
                        </div>
                        
                    </div>
                    
                    
                </div>

                <div class="col-lg-4">
                    <!-- Tags Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">CATEGORY</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <div class="d-flex flex-wrap m-n1">
                            <?php foreach($limit_trainers as $item){ ?>
                                <a href="<?php echo base_url('singleTrainer/'.$item['t_id']); ?>" class="btn btn-sm btn-outline-secondary m-1"><?php echo $item['t_name_'.$this->session->userdata('site_lang')];?></a>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- Tags End -->
                    <!-- News Detail End -->

                        
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->
        
    <br>
    <br>
    <!-- Footer Start -->
    <?php $this->load->view('user/includes/footer');?>
    <?php $this->load->view('user/includes/footerScript');?>
    <!-- Footer End -->


    