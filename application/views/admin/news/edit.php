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
                        <form action="<?php echo base_url('a_news_update_act/'.$single_news->n_id);?>" method="post" enctype="multipart/form-data" >

                        <!-- --------------------------   AZ   ---------------------- -->
                        <label for="title_az">Title az</label>
                        <input name="title_az" type="text" id="title_az" class="form-control" placeholder="Enter title" value = '<?php echo $single_news->n_title_az;?>'>
                        <br>
                        <label for="desc_az">Description az</label>
                        <textarea name="description_az" id="desc_az" cols="30" rows="10" class="form-control" placeholder="Enter description"><?php echo $single_news->n_description_az;?></textarea>
                        <br>
                      <!-- ------------------------------------------------ -->

                      <!-- --------------------------   EN   ---------------------- -->
                        <label for="title_en">Title en</label>
                        <input name="title_en" type="text" id="title_en" class="form-control" placeholder="Enter title" value = '<?php echo $single_news->n_title_en;?>'>
                        <br>
                        <label for="desc_en">Description en</label>
                        <textarea name="description_en" id="desc_en" cols="30" rows="10" class="form-control" placeholder="Enter description"><?php echo $single_news->n_description_en;?></textarea>
                        <br>
                      <!-- ------------------------------------------------ -->

                      <!-- --------------------------   RU   ---------------------- -->
                        <label for="title_ru">Title ru</label>
                        <input name="title_ru" type="text" id="title_ru" class="form-control" placeholder="Enter title" value = '<?php echo $single_news->n_title_ru;?>'>
                        <br>
                        <label for="desc_ru">Description ru</label>
                        <textarea name="description_ru" id="desc_ru" cols="30" rows="10" class="form-control" placeholder="Enter description"><?php echo $single_news->n_description_ru;?></textarea>
                        <br>
                      <!-- ------------------------------------------------ -->

                       <!-- --------------------------  AZ   ---------------------- -->
                       <label for="n_price_az">Price az</label>
                        <input name="n_price_az" type="text" id="n_price_az" class="form-control" placeholder="Enter price" value = '<?php echo $single_news->n_price_az;?>'>
                        <br>

                        <label for="n_month_az">Month az</label>
                        <input name="n_month_az" type="text" id="n_month_az" class="form-control" placeholder="Enter month" value = '<?php echo $single_news->n_month_az;?>'>
                        <br>
                        <label for="n_times_az">Times az</label>
                        <input name="n_times_az" type="text" id="n_times_az" class="form-control" placeholder="Enter times" value = '<?php echo $single_news->n_times_az;?>'>
                        <br>
                        <label for="n_hour_az">Hour az</label>
                        <input name="n_hour_az" type="text" id="n_hour_az" class="form-control" placeholder="Enter hour" value = '<?php echo $single_news->n_hour_az;?>'>
                        <br>
                      <!-- ------------------------------------------------ -->



                      <!-- --------------------------  EN   ---------------------- -->
                      <label for="n_price_en">Price en</label>
                        <input name="n_price_en" type="text" id="n_price_en" class="form-control" placeholder="Enter price" value = '<?php echo $single_news->n_price_en;?>'>
                        <br>

                        <label for="n_month_en">Month en</label>
                        <input name="n_month_en" type="text" id="n_month_en" class="form-control" placeholder="Enter month" value = '<?php echo $single_news->n_month_en;?>'>
                        <br>
                        <label for="n_times_en">Times en</label>
                        <input name="n_times_en" type="text" id="n_times_en" class="form-control" placeholder="Enter times" value = '<?php echo $single_news->n_times_en;?>'>
                        <br>
                        <label for="n_hour_en">Hour en</label>
                        <input name="n_hour_en" type="text" id="n_hour_en" class="form-control" placeholder="Enter hour" value = '<?php echo $single_news->n_hour_en;?>'>
                        <br>
                      <!-- ------------------------------------------------ -->

                      <!-- --------------------------  RU   ---------------------- -->
                      <label for="n_price_ru">Price ru</label>
                        <input name="n_price_ru" type="text" id="n_price_ru" class="form-control" placeholder="Enter price" value = '<?php echo $single_news->n_price_ru;?>'>
                        <br>

                        <label for="n_month_ru">Month ru</label>
                        <input name="n_month_ru" type="text" id="n_month_ru" class="form-control" placeholder="Enter month" value = '<?php echo $single_news->n_month_ru;?>'>
                        <br>
                        <label for="n_times_ru">Times ru</label>
                        <input name="n_times_ru" type="text" id="n_times_ru" class="form-control" placeholder="Enter times" value = '<?php echo $single_news->n_times_ru;?>'>
                        <br>
                        <label for="n_hour_ru">Hour ru</label>
                        <input name="n_hour_ru" type="text" id="n_hour_ru" class="form-control" placeholder="Enter hour" value = '<?php echo $single_news->n_hour_ru;?>'>
                        <br>
                      <!-- ------------------------------------------------ -->


                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 fLeft m-lg-2">
                            <label for="date">Date</label>
                            <input type="datetime-local" name="date" class="form-control" id="date" value='<?php echo $single_news->n_date;?>'>
                        </div>

                        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 fLeft m-lg-2">
                            <label for="category">Category</label>
                            <select name="category" id="category" class="form-control">
                              <option value="">-SELECT-</option>
                              <?php foreach($category as $item){?>
                                  <option <?php if($single_news->n_category == $item['c_id']){echo "SELECTED";} ?> value="<?php echo $item['c_id'];?>"><?php echo $item['c_name_az'];?></option>
                              <?php }?>
                             
                            </select>
                        </div>

                        <div class="col-xs-12 col-sm-1,5 col-md-1,5 col-lg-1,5 fLeft m-lg-2">
                            <label for="page">Page</label>
                            <select name="page" id="page" class="form-control">
                              <option <?php if($single_news->n_page == ""){echo "SELECTED";} ?> value="">-SELECT-</option>
                              <option <?php if($single_news->n_page == "News"){echo "SELECTED";} ?> value="News">News</option>
                              <option <?php if($single_news->n_page == "Events"){echo "SELECTED";} ?> value="Events">Events</option>
                            </select>
                        </div>

                        <div class="col-xs-12 col-sm-1,5 col-md-1,5 col-lg-1,5 fLeft m-lg-2">
                            <label for="Status">Status</label>
                            <select name="Status" id="Status" class="form-control">
                              <option <?php if($single_news->n_status == ""){echo "SELECTED";} ?> value="">-SELECT-</option>
                              <option <?php if($single_news->n_status == "Active"){echo "SELECTED";} ?> value="Active">Active</option>
                              <option <?php if($single_news->n_status == "Deactive"){echo "SELECTED";} ?> value="Deactive">Deactive</option>
                            </select>
                        </div>

                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 fLeft m-lg-2">
                            <label for="img">Image</label>
                            <input name="image" type="file" id="img" class="form-control" value='<?php echo $single_news->n_file;?>'>
                            
                        </div>

                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 fLeft m-lg-2">
                            <label for="img">Current Image</label>
                            <img width="100%"; src="<?php echo base_url('uploads/news/'.$single_news->n_file); ?>" alt="">
                            
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