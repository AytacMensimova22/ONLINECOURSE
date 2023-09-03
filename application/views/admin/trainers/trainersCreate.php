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
                        <form action="<?php echo base_url('a_trainers_create_act');?>" method="post" enctype="multipart/form-data" >
                      
                      
                      <!-- --------------------------   AZ   ---------------------- -->
                        <label for="t_name_az">Name az</label>
                        <input name="t_name_az" type="text" id="t_name_az" class="form-control" placeholder="Enter title">
                        <br>
                        <label for="t_desc_az">Description az</label>
                        <textarea name="t_description_az" id="t_desc_az" cols="30" rows="10" class="form-control" placeholder="Enter description"></textarea>
                        <br>
                      <!-- ------------------------------------------------ -->

                      <!-- --------------------------   EN   ---------------------- -->
                        <label for="t_name_en">Name en</label>
                        <input name="t_name_en" type="text" id="t_name_en" class="form-control" placeholder="Enter title">
                        <br>
                        <label for="t_desc_en">Description en</label>
                        <textarea name="t_description_en" id="t_desc_en" cols="30" rows="10" class="form-control" placeholder="Enter description"></textarea>
                        <br>
                      <!-- ------------------------------------------------ -->

                      <!-- --------------------------   RU   ---------------------- -->
                        <label for="t_name_ru">Name ru</label>
                        <input name="t_name_ru" type="text" id="t_name_ru" class="form-control" placeholder="Enter title">
                        <br>
                        <label for="t_desc_ru">Description ru</label>
                        <textarea name="t_description_ru" id="t_desc_ru" cols="30" rows="10" class="form-control" placeholder="Enter description"></textarea>
                        <br>
                        <br>
                      <!-- ------------------------------------------------ -->









                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 fLeft m-lg-2">
                            <label for="t_date">Date</label>
                            <input type="datetime-local" name="t_date" class="form-control" id="t_date">
                        </div>

                        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 fLeft m-lg-2">
                            <label for="t_category">Category</label>
                            <select name="t_category" id="t_category" class="form-control">
                              <option value="">-SELECT-</option>
                              
                              <?php foreach($category as $item){ ?>
                                    <option value="<?php echo $item['c_id'];?>"><?php echo $item['c_name_az'];?></option>
                              <?php }?>
                             
                            </select>
                        </div>

                    

                        <div class="col-xs-12 col-sm-1,5 col-md-1,5 col-lg-1,5 fLeft m-lg-2">
                            <label for="t_status">Status</label>
                            <select name="t_status" id="t_status" class="form-control">
                              <option value="">-SELECT-</option>
                              <option value="Active">Active</option>
                              <option value="Deactive">Deactive</option>
                            </select>
                        </div>

                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 fLeft m-lg-2">
                            <label for="img">Image</label>
                            <input name="image" type="file" id="img" class="form-control">
                            
                        </div>

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