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
                        <form action="<?php echo base_url('a_students_update_act/'.$single_news->s_id);?>" method="post" enctype="multipart/form-data" >

                        <!-- --------------------------   AZ   ---------------------- -->
                        <label for="s_title_az">Title az</label>
                        <input name="s_title_az" type="text" id="s_title_az" class="form-control" placeholder="Enter title" value = '<?php echo $single_news->s_title_az;?>'>
                        <br>
                        <label for="s_desc_az">Description az</label>
                        <textarea name="s_description_az" id="s_desc_az" cols="30" rows="10" class="form-control" placeholder="Enter description"><?php echo $single_news->s_description_az;?></textarea>
                        <br>
                      <!-- ------------------------------------------------ -->

                      <!-- --------------------------   EN   ---------------------- -->
                        <label for="s_title_en">Title en</label>
                        <input name="s_title_en" type="text" id="s_title_en" class="form-control" placeholder="Enter title" value = '<?php echo $single_news->s_title_en;?>'>
                        <br>
                        <label for="s_desc_en">Description en</label>
                        <textarea name="s_description_en" id="s_desc_en" cols="30" rows="10" class="form-control" placeholder="Enter description"><?php echo $single_news->s_description_en;?></textarea>
                        <br>
                      <!-- ------------------------------------------------ -->

                      <!-- --------------------------   RU   ---------------------- -->
                        <label for="s_title_ru">Title ru</label>
                        <input name="s_title_ru" type="text" id="s_title_ru" class="form-control" placeholder="Enter title" value = '<?php echo $single_news->s_title_ru;?>'>
                        <br>
                        <label for="s_desc_ru">Description ru</label>
                        <textarea name="s_description_ru" id="s_desc_ru" cols="30" rows="10" class="form-control" placeholder="Enter description"><?php echo $single_news->s_description_ru;?></textarea>
                        <br>
                      <!-- ------------------------------------------------ -->

                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 fLeft m-lg-2">
                            <label for="s_date">Date</label>
                            <input type="datetime-local" name="s_date" class="form-control" id="s_date" value='<?php echo $single_news->s_date;?>'>
                        </div>

                        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 fLeft m-lg-2">
                            <label for="category">Category</label>
                            <select name="s_category" id="category" class="form-control">
                              <option value="">-SELECT-</option>
                              <?php foreach($category as $item){?>
                                  <option <?php if($single_news->s_category == $item['c_id']){echo "SELECTED";} ?> value="<?php echo $item['c_id']; ?>"><?php echo $item['c_name_az'];?></option>
                              <?php }?>
                             
                            </select>
                        </div>


                        <div class="col-xs-12 col-sm-1,5 col-md-1,5 col-lg-1,5 fLeft m-lg-2">
                            <label for="s_status">Status</label>
                            <select name="s_status" id="s_status" class="form-control">
                              <option <?php if($single_news->s_status == ""){echo "SELECTED";} ?> value="">-SELECT-</option>
                              <option <?php if($single_news->s_status == "Active"){echo "SELECTED";} ?> value="Active">Active</option>
                              <option <?php if($single_news->s_status == "Deactive"){echo "SELECTED";} ?> value="Deactive">Deactive</option>
                            </select>
                        </div>

                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 fLeft m-lg-2">
                            <label for="img">Image</label>
                            <input name="image" type="file" id="img" class="form-control">
                            
                        </div>

                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 fLeft m-lg-2">
                            <label for="img">Current Image</label>
                            <img width="100%"; src="<?php echo base_url('uploads/students/'.$single_news->s_file); ?>" alt="">
                            
                        </div>

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