<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="<?php echo base_url(''); ?>" class="navbar-brand d-flex align-items-center px-3 px-lg-4">
            <h2 class="m-0 text-primary" style="font-size: 20px"><i class="fa fa-book me-3"></i><?php echo $this->lang->line('elearning'); ?></h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="<?php echo base_url('home'); ?>" class="nav-item nav-link"><?php echo $this->lang->line('home'); ?></a>
                <a href="<?php echo base_url('about'); ?>" class="nav-item nav-link"><?php echo $this->lang->line('about'); ?></a>
                <a href="<?php echo base_url('courses'); ?>" class="nav-item nav-link"><?php echo $this->lang->line('courses'); ?></a>
                <a href="<?php echo base_url('students'); ?>" class="nav-item nav-link"><?php echo $this->lang->line('Students'); ?></a>
                <a href="<?php echo base_url('events'); ?>" class="nav-item nav-link"><?php echo $this->lang->line('events'); ?></a>
                <a href="<?php echo base_url('contact'); ?>" class="nav-item nav-link"><?php echo $this->lang->line('contact'); ?></a>
            </div>
            </div>
            <select style="margin-right:15px;" onchange="javascript:window.location.href='<?php echo base_url(); ?>LanguageSwitcher/switchLang/'+this.value;">
               <option value="az" <?php if($this->session->userdata('site_lang') == 'az') echo 'selected="selected"'; ?>>AZ</option>
               <option value="en" <?php if($this->session->userdata('site_lang') == 'en') echo 'selected="selected"'; ?>>EN</option>
               <option value="ru" <?php if($this->session->userdata('site_lang') == 'ru') echo 'selected="selected"'; ?>>RU</option>   
            </select>
        </div>
            <a href="" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block"></a>
        </div>
    </nav>
    <!-- Navbar End -->
