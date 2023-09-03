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

                      <h5 class="card-header"><?php echo $single_news['n_title_az']; ?>
                    <a href="<?php echo base_url('a_news_list');?>"><button type="button" class="btn btn-info" style="float:right;">Back</button>
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
        <td style='width: 150px'>Title az</td>
        <td><?php echo $single_news['n_title_az']; ?></td>
      </tr>
      <tr>
        <td>Description az</td>
        <td><?php echo $single_news['n_description_az']; ?></td>
      </tr>

      <tr>
        <td style='width: 150px'>Title en</td>
        <td><?php echo $single_news['n_title_en']; ?></td>
      </tr>
      <tr>
        <td>Description en</td>
        <td><?php echo $single_news['n_description_en']; ?></td>
      </tr>

      <tr>
        <td style='width: 150px'>Title ru</td>
        <td><?php echo $single_news['n_title_ru']; ?></td>
      </tr>
      <tr>
        <td>Description ru</td>
        <td><?php echo $single_news['n_description_ru']; ?></td>
      </tr>

      <tr>
        <td style='width: 150px'>Price az</td>
        <td><?php echo $single_news['n_price_az']; ?></td>
      </tr>
      <tr>
        <td style='width: 150px'>Price en</td>
        <td><?php echo $single_news['n_price_en']; ?></td>
      </tr>
      <tr>
        <td style='width: 150px'>Price ru</td>
        <td><?php echo $single_news['n_price_ru']; ?></td>
      </tr>
      <tr>
        <td style='width: 150px'>Month az</td>
        <td><?php echo $single_news['n_month_az']; ?></td>
      </tr>
      <tr>
        <td style='width: 150px'>Month en</td>
        <td><?php echo $single_news['n_month_en']; ?></td>
      </tr>
      <tr>
        <td style='width: 150px'>Month ru</td>
        <td><?php echo $single_news['n_month_ru']; ?></td>
      </tr>
      <tr>
        <td style='width: 150px'>Times az</td>
        <td><?php echo $single_news['n_times_az']; ?></td>
      </tr>
      <tr>
        <td style='width: 150px'>Times en</td>
        <td><?php echo $single_news['n_times_en']; ?></td>
      </tr>
      <tr>
        <td style='width: 150px'>Times ru</td>
        <td><?php echo $single_news['n_times_ru']; ?></td>
      </tr>

      <tr>
        <td style='width: 150px'>Hour az</td>
        <td><?php echo $single_news['n_hour_az']; ?></td>
      </tr>
      <tr>
        <td style='width: 150px'>Hour en</td>
        <td><?php echo $single_news['n_hour_en']; ?></td>
      </tr>
      <tr>
        <td style='width: 150px'>Hour ru</td>
        <td><?php echo $single_news['n_hour_ru']; ?></td>
      </tr>



      <tr>
        <td>Date</td>
        <td><?php echo $single_news['n_date']; ?></td>
      </tr>
      <tr>
        <td>Category</td>
        <td><?php echo $single_news['c_name_az']; ?></td>
      </tr>
      <tr>
        <td>Status</td>
        <td><?php echo $single_news['n_status']; ?></td>
      </tr>
      <tr >
        <td>File</td>
        <td>
          <?php if($single_news['n_file_ext']== '.mp3'){ ?>
            <audio controls autoplay>
            <source src="<?php echo base_url("uploads/news/").$single_news['n_file']; ?>" type="audio/mpeg">
          </audio>

          <?php }else{ ?>
              <img width="100%"src="<?php echo base_url("uploads/news/").$single_news['n_file']; ?>" alt="">
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