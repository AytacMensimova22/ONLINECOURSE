
<?php $this->load->view('user/includes/headerStyle');?>
<?php $this->load->view('user/includes/navbar'); ?>
    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown"><?php echo $this->lang->line('Our Projects'); ?></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="<?php echo base_url('home'); ?>"><?php echo $this->lang->line('home'); ?></a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page"><a class="text-white" href="<?php echo base_url('projects'); ?>"><?php echo $this->lang->line('Projects'); ?></a></li>
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
                <div class="col-lg-8">
                    <!-- News Detail Start -->
                    <div class="position-relative mb-3">
                        <img class="img-fluid w-100" src="<?php echo base_url('uploads/projects/'.$single_data['p_file']); ?>" style="object-fit: cover;">
                        <div class="bg-white border border-top-0 p-4">
                            <div class="mb-3">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href=""><?php echo $single_data['c_name_'.$this->session->userdata('site_lang')];?></a>
                                <a class="text-body" href=""><?php echo date('M d, Y', strtotime($single_data['p_date']));?></a>
                            </div>
                            <h1 class="mb-3 text-secondary text-uppercase font-weight-bold"><?php echo $single_data['p_title_'.$this->session->userdata('site_lang')];?></h1>
                            <p><?php echo $single_data['p_description_'.$this->session->userdata('site_lang')];?></p>
                            
                            
                        </div>
                        
                    </div>
                    <!-- News Detail End -->

                    <!-- Comment List Start -->
                    
                            
                    <!-- Comment List End -->

                    

                               
                </div>

                <div class="col-lg-4">
                    <!-- Social Follow Start -->
                    
                    <!-- Social Follow End -->

                            

                    
                    <!-- Newsletter End -->

                    <!-- Tags Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">CATEGORY</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <div class="d-flex flex-wrap m-n1">
                            <?php foreach($limit_projects as $item){ ?>
                                <a href="<?php echo base_url('singleProject/'.$item['p_id']); ?>" class="btn btn-sm btn-outline-secondary m-1"><?php echo $item['p_title_'.$this->session->userdata('site_lang')];?></a>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- Tags End -->
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->
        

    <!-- Footer Start -->
    <?php $this->load->view('user/includes/footer');?>
    <?php $this->load->view('user/includes/footerScript');?>
    <!-- Footer End -->


    