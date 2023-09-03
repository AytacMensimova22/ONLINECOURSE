
<?php $this->load->view('admin/includes/headerStyle'); ?>
    <?php $this->load->view('admin/includes/leftMenu');?>
    <?php $this->load->view('admin/includes/navbar');?>

    <div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
              <div class="col-lg-12 mb-4 order-0">
              <div class="card">
              <div class="d-flex align-items-end row">
                      <div class="col-sm-12">
                        <!-- Bordered Table -->
              <div class="card">
                <h5 class="card-header">Projects List
                    <a href="<?php echo base_url('a_projectsCreate');?>"><button type="button" class="btn btn-success" style="float:right;">Create</button>
                    </a>
                    </h5>
                <div class="card-body">
                    
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Title</th>
                          <!-- <th>Description</th> -->
                          <th>Category</th>
                          <th>Date</th>
                          <th>Image</th>
                          <th>Status</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        <?php $sira = 0; foreach($get_all as $items){ $sira++; ?>
                          <tr>
                          <td><?php echo $sira;?></td>
                          <td><i class="fab fa-react fa-lg text-info me-3"></i> <strong><?php echo $items->p_title_az;?></strong></td>
                          <!-- <td><?php // echo $items->n_description;?></td> -->
                          <td><?php echo $items->c_name_az;?></td>
                    
                          <td>
                              <?php echo date('d-m-Y H:i', strtotime($items->p_date));?>
                          </td>
                          <td>
                          <?php if($items->p_file_ext == '.mp3'){ ?>
                              <audio controls autoplay style="width:210px">
                              <source src="<?php echo base_url("uploads/projects/").$items->p_file; ?>" type="audio/mpeg">
                            </audio>

                            <?php }else{ ?>
                                <a target="_blank" href="<?php echo base_url("uploads/projects/").$items->p_file; ?>">
                                  <img width="50" height="50" style="object-fit:cover;" src="<?php echo base_url("uploads/projects/").$items->p_file; ?>" alt="">
                                </a>
                            <?php }?>
                            
                          </td>
                         
                          
                          <td>
                            <?php  if($items->p_status == 'Active'){ ?>
                              <span class="badge bg-label-success me-1"><?php echo $items->p_status;?></span>
                             <?php }else if($items->p_status == 'Deactive'){ ?>
                              <span class="badge bg-label-danger me-1"><?php echo $items->p_status;?></span>
                              <?php }else{ ?>
                              <span class="badge bg-label-info me-1">UPSS</span>
                             <?php }?>

                          </td>
                          <td>

                                <a href="<?php echo base_url('a_projects_view/'.$items->p_id); ?>">
                                <button
                                type="button"
                                class="btn btn-info btn-sm">
                              <i class="bx bx-search"></i>
                              </button>
                                </a>
                            
                                <a href="<?php echo base_url('a_projects_update/'.$items->p_id); ?>">
                                <button
                                type="button"
                                class="btn btn-warning btn-sm">
                              <i class="bx bx-edit-alt"></i>
                              </button>
                                </a>
                              
                                <a onclick="return confirm('Are you sure want to delete this news?')"href="<?php echo base_url('a_projects_delete/'.$items->p_id);?>">
                                <button
                                type="button"
                                class="btn btn-danger btn-sm">
                              <i class="bx bx-trash"></i>
                              </button>
                                </a>
                              
                            </div>
                          </td>
                        </tr>
                        <?php } ?>


                        
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--/ Bordered Table -->

              <hr class="my-5" />
                    </div>
                </div>
              </div>
              </div>
              </div>
              </div>
    </div>

    <?php $this->load->view('admin/includes/footer');?>
    <?php $this->load->view('admin/includes/footerScript');?>