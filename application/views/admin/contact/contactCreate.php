<?php $this->load->view('admin/includes/headerStyle'); ?>
    <?php $this->load->view('admin/includes/leftMenu');?>
    <?php $this->load->view('admin/includes/navbar');?>

    <style>
      .fLeft{
        float: left;
      }
    </style>


    <div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
              <div class="col-lg-12 mb-4 order-0">
              <div class="card">
              <div class="d-flex align-items-end row">
                      <div class="col-sm-12">
                        <div class="card-body"> 
                            
                      <!-- ------------------------------------------------ -->
                        <form action="<?php echo base_url('a_contact_create_act');?>" method="post" enctype="multipart/form-data" >
                      
                    
                      <!-- --------------------------   RU   ---------------------- -->
                        <label for="c_office_title_az">Office</label>
                        <input name="c_office_title_az" type="text" id="c_office_title_az" class="form-control" placeholder="Enter title">
                        <br>

                        <label for="c_office_desc_az">Office address</label>
                        <input name="c_office_desc_az" type="text" id="c_office_desc_az" class="form-control" placeholder="Enter address">
                        <br>
                        <label for="c_mobile_title_az">Mobile</label>
                        <input name="c_mobile_title_az" type="text" id="c_mobile_title_az" class="form-control" placeholder="Enter title">
                        <br>
                        <label for="c_mobile_desc_az">Number</label>
                        <input name="c_mobile_desc_az" type="text" id="c_mobile_desc_az" class="form-control" placeholder="Enter number">
                        <br>
                        <label for="c_mail_title_az">Mail</label>
                        <input name="c_mail_title_az" type="text" id="c_mail_title_az" class="form-control" placeholder="Enter title">
                        <br>
                        <label for="c_mail_desc_az">Email address</label>
                        <input name="c_mail_desc_az" type="text" id="c_mail_desc_az" class="form-control" placeholder="Enter email address">
                        <br>
                        <label for="c_map">Map</label>
                        <input name="c_map" type="text" id="c_map" class="form-control" placeholder="Enter map">
                      <!-- ------------------------------------------------ -->


                      <!-- <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 fLeft m-lg-2">
                            <label for="p_category">Category</label>
                            <select name="p_category" id="p_category" class="form-control">
                              <option value="">-SELECT-</option>
                              
                             
                            </select>
                        </div> -->

                       
                        
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fLeft m-lg-2 d-grid">
                          <button type="submit" class="btn btn-success btn-block">Send</button>
                          <br>
                          <br>
                        </div>
                        </form>
                        
                        


                      <!-- ------------------------------------------------ -->

                        </div>
                    </div>
                </div>
              </div>
              </div>
              </div>
              </div>
    </div>

    <?php $this->load->view('admin/includes/footer');?>
    <?php $this->load->view('admin/includes/footerScript');?>