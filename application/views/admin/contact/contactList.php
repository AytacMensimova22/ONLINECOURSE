
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
                <h5 class="card-header"> Contact
                    <a href="<?php echo base_url('a_contactCreate');?>"><button type="button" class="btn btn-success" style="float:right;">Create</button>
                    </a>
                    </h5>
                <div class="card-body">
                    
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Address</th>
                          <!-- <th>Description</th> -->
                          <th>Mobile</th>
                          <th>E-mail</th>
                          <th>Map link</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        <?php $sira = 0; foreach($get_all as $items){ $sira++; ?>
                          <tr>
                          <td><?php echo $sira;?></td>
                          <td><i class="fab fa-react fa-lg text-info me-3"></i> <strong><?php echo $items->c_office_desc_az;?></strong></td>
                          <!-- <td><?php // echo $items->n_description;?></td> -->
                          <td><?php echo $items->c_mobile_desc_az;?></td>
                          <td><?php echo $items->c_mail_desc_az;?></td>
                          <td class="text-center"> <iframe src="<?php echo $items->c_map;?>" width="250" height="100" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></td>
                          
                
                         

                          
                          <td>

                                <a href="<?php echo base_url('a_contact_view/'.$items->c_id); ?>">
                                <button
                                type="button"
                                class="btn btn-info btn-sm">
                              <i class="bx bx-search"></i>
                              </button>
                                </a>
                            
                                <a href="<?php echo base_url('a_contact_update/'.$items->c_id); ?>">
                                <button
                                type="button"
                                class="btn btn-warning btn-sm">
                              <i class="bx bx-edit-alt"></i>
                              </button>
                                </a>
                              
                                <a onclick="return confirm('Are you sure want to delete this news?')"href="<?php echo base_url('a_contact_delete/'.$items->c_id);?>">
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