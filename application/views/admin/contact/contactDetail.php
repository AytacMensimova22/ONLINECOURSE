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

                      <h5 class="card-header"><?php echo $single_news['contact']; ?>
                    <a href="<?php echo base_url('a_contactList');?>"><button type="button" class="btn btn-info" style="float:right;">Back</button>
                    </a>
                    <br>
                    <br>
                    </h5>
                        <div class="card-body"> 
                          
                          
                          <style>
                              tbody tr td:first-child{color:#696cff; font-weight:bold;}
                          </style>  

                        <table class="table table-bordered">
    
    <tbody>
      <tr>
        <td style='width: 150px'>Office</td>
        <td><?php echo $single_news['c_office_title_az']; ?></td>
      </tr>
      <tr>
        <td style='width: 150px'>Office address</td>
        <td><?php echo $single_news['c_office_desc_az']; ?></td>
      </tr>
      <tr>
        <td style='width: 150px'>Mobile</td>
        <td><?php echo $single_news['c_mobile_title_az']; ?></td>
      </tr>

      <tr>
        <td style='width: 150px'>Number</td>
        <td><?php echo $single_news['c_mobile_desc_az']; ?></td>
      </tr>

      <tr>
        <td style='width: 150px'>Mail</td>
        <td><?php echo $single_news['c_mail_title_az']; ?></td>
      </tr>
      <tr>
        <td style='width: 150px'>Email address</td>
        <td><?php echo $single_news['c_mail_desc_az']; ?></td>
      </tr>

      <tr>
        <td style='width: 150px'>Map</td>
        <td><?php echo $single_news['c_map']; ?></td>
      </tr>

      
      
      
      <tr >
        
      </tr>
      
      
    </tbody>
  </table>


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