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
                            
                      <!-- result() oldugu halda datalar foreach-e salinir! -->
                      <!-- row()    oldugu halda datalar foreach-e salinmir! -->
                      <!-- ------------------------------------------------ -->
                        <H1>Edit</H1>
                        <form action="<?php echo base_url('a_contact_update_act/'.$single_news->c_id);?>" method="post" enctype="multipart/form-data" >

                        <!-- --------------------------   RU   ---------------------- -->
              
                        <label for="c_office_desc_az">Office address az</label>
                        <input name="c_office_desc_az" type="text" id="c_office_desc_az" class="form-control" placeholder="Enter address" value="<?php echo $single_news->c_office_desc_az; ?>">
                        <br>
                        <label for="c_office_desc_en">Office address en</label>
                        <input name="c_office_desc_en" type="text" id="c_office_desc_en" class="form-control" placeholder="Enter address" value="<?php echo $single_news->c_office_desc_en; ?>">
                        <br>
                        <label for="c_office_desc_ru">Office address ru</label>
                        <input name="c_office_desc_ru" type="text" id="c_office_desc_ru" class="form-control" placeholder="Enter address" value="<?php echo $single_news->c_office_desc_ru; ?>">
                        <br>
                        <label for="c_mobile_desc_az">Number az</label>
                        <input name="c_mobile_desc_az" type="text" id="c_mobile_desc_az" class="form-control" placeholder="Enter number" value="<?php echo $single_news->c_mobile_desc_az; ?>">
                        <br>
                        <label for="c_mobile_desc_en">Number en</label>
                        <input name="c_mobile_desc_en" type="text" id="c_mobile_desc_en" class="form-control" placeholder="Enter number" value="<?php echo $single_news->c_mobile_desc_en; ?>">
                        <br>
                        <label for="c_mobile_desc_ru">Number ru</label>
                        <input name="c_mobile_desc_ru" type="text" id="c_mobile_desc_ru" class="form-control" placeholder="Enter number" value="<?php echo $single_news->c_mobile_desc_ru; ?>">
                        <br>
                        <label for="c_mail_desc_az">Email address az</label>
                        <input name="c_mail_desc_az" type="text" id="c_mail_desc_az" class="form-control" placeholder="Enter email address" value="<?php echo $single_news->c_mail_desc_az; ?>">
                        <br>
                        <label for="c_mail_desc_en">Email address en</label>
                        <input name="c_mail_desc_en" type="text" id="c_mail_desc_en" class="form-control" placeholder="Enter email address" value="<?php echo $single_news->c_mail_desc_en; ?>">
                        <br>
                        <label for="c_mail_desc_ru">Email address ru</label>
                        <input name="c_mail_desc_ru" type="text" id="c_mail_desc_ru" class="form-control" placeholder="Enter email address" value="<?php echo $single_news->c_mail_desc_ru; ?>">
                        <br>
                        <label for="c_map">Map</label>
                        <input name="c_map" type="text" id="c_map" class="form-control" placeholder="Enter map" value="<?php echo $single_news->c_map; ?>">
                        <br>
                      <!-- ------------------------------------------------ -->

                        

                        

                        

                        

                

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fLeft m-lg-2 d-grid">
                          <button type="submit" class="btn btn-success btn-block">Update</button>
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