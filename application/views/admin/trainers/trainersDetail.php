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

                      <h5 class="card-header"><?php echo $single_news['t_name_az']; ?>
                    <a href="<?php echo base_url('a_trainersList');?>"><button type="button" class="btn btn-info" style="float:right;">Back</button>
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
        <td style='width: 150px'>Name az</td>
        <td><?php echo $single_news['t_name_az']; ?></td>
      </tr>

      <tr>
        <td>Description az</td>
        <td><?php echo $single_news['t_description_az']; ?></td>
      </tr>

      <tr>
        <td style='width: 150px'>Name en</td>
        <td><?php echo $single_news['t_name_en']; ?></td>
      </tr>

      <tr>
        <td>Description en</td>
        <td><?php echo $single_news['t_description_en']; ?></td>
      </tr>

      <tr>
        <td style='width: 150px'>Name ru</td>
        <td><?php echo $single_news['t_name_ru']; ?></td>
      </tr>

      <tr>
        <td>Description ru</td>
        <td><?php echo $single_news['t_description_ru']; ?></td>
      </tr>

      <tr>
        <td>Date</td>
        <td><?php echo $single_news['t_date']; ?></td>
      </tr>
      <tr>
        <td>Category</td>
        <td><?php echo $single_news['c_name_az']; ?></td>
      </tr>
      <tr>
        <td>Status</td>
        <td><?php echo $single_news['t_status']; ?></td>
      </tr>
      <tr >
        <td>File</td>
        <td>
          <?php if($single_news['t_file_ext']== '.mp3'){ ?>
            <audio controls autoplay>
            <source src="<?php echo base_url("uploads/trainers/").$single_news['t_file']; ?>" type="audio/mpeg">
          </audio>

          <?php }else{ ?>
              <img width="100%"src="<?php echo base_url("uploads/trainers/").$single_news['t_file']; ?>" alt="">
          <?php }?>
          
        </td>
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