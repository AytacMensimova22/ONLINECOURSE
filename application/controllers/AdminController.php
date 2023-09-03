<?php 

class AdminController extends CI_Controller{

public function login(){
    unset(
        $_SESSION['admin_id'],
        $_SESSION['admin_username']
       );
    $this->load->view('admin/auth-login-basic');
}

public function loginAct(){
   $username = $_POST['email-username'];
   $password = $_POST['password'];

   if(!empty($username) && !empty($password)){
        $data = [
            'a_username' => $username,
            'a_password' => md5($password),
            'a_status'   => "Active",
        ];

        $data = $this->security->xss_clean($data);

        $check_admin = $this->db->where($data)->get('admin')->row_array();

        if($check_admin){
            $_SESSION['admin_id'] = $check_admin['a_id'];
            $_SESSION['admin_username'] = $check_admin['a_username'];
            //unset($_SESSION['admin_id']);
            redirect (base_url('a_dashboard'));

        }else{
            $this->session->set_flashdata('err', 'İstifadəçi adı və ya şifrə yanlışdır!');
            redirect($_SERVER['HTTP_REFERER']);
        }

        //session-lar iki cur olur

       // 1) userdata    set-userdata yaradilanda yazilir, userdata-cagrilanda bu formada yazilir, unset -silende bu formada cagrilir
        //2) flashdata   set-flashdata yaradilanda yazilir, flashdata-cagrilanda bu formada yazilir, silme ishlemi yoxdur 1 defe yaradilib cagrilir sehfeni yeniledikde ise silinir.
        //2-ci üsul
        //$this->db->where("a_username", $username )->where("a_password", md5($password) )->get('admin')->row_array();
   }else{

    $this->session->set_flashdata('err', 'Boşluq buraxmayın!');
    redirect($_SERVER['HTTP_REFERER']);
   }

}

public function logout(){
   // echo "hbehbb";
   unset(
    $_SESSION['admin_id'],
    $_SESSION['admin_username']
   );
   $this->session->set_flashdata('success', "Sizi bir daha gözləyəcəyik :)");
   redirect (base_url('a_login'));
   
}

public function dashboard(){
    $data['admin'] = $admin = $this->db->select('a_id, a_name, a_username, a_email, a_status, a_img')->where('a_id', $_SESSION['admin_id'])->get('admin')->row_array();
    $this->load->view('admin/index',$data);
}

//result_array()    -1 den cox melumatin gelmesi ucundur (array kimi)       []
//row_array()       -yalniz 1 setrin melumatin gelmesi ucundur (array kimi) []

//result()          -1 den cox melumatin gelmesi ucundur (object kimi)       ->
//row()             -yalniz 1 setrin melumatin gelmesi ucundur (object kimi) ->
public function news_list(){
    $data['get_all']= $this->db
    ->where('n_creator_id',$_SESSION['admin_id'])
    ->join('category', 'category.c_id = news.n_category', 'left')
    ->order_by('n_id','DESC')
    ->get('news')
    ->result();

    $this->load->view('admin/news/list',$data);
}

public function allNews_list(){
   
    $data['get_all']= $this->db
    ->where('e_creator_id',$_SESSION['admin_id'])
    ->join('category', 'category.c_id = news_events.e_category', 'left')
    ->order_by('e_id','DESC')
    ->get('news_events')
    ->result();
    // print_r("<pre>");
    // print_r($data['get_all']);
    // die();
    $this->load->view('admin/allNews/allList', $data);
}

public function studentsList(){
   
    $data['get_all']= $this->db
    ->where('s_creator_id',$_SESSION['admin_id'])
    ->join('category', 'category.c_id = students.s_category', 'left')
    ->order_by('s_id','DESC')
    ->get('students')
    ->result();
    // print_r("<pre>");
    // print_r($data['get_all']);
    // die();
    $this->load->view('admin/students/studentsList', $data);
}


public function trainersList(){
   
    $data['get_all']= $this->db
    ->where('t_creator_id',$_SESSION['admin_id'])
    ->join('category', 'category.c_id = trainers.t_category', 'left')
    ->order_by('t_id','DESC')
    ->get('trainers')
    ->result();
    // print_r("<pre>");
    // print_r($data['get_all']);
    // die();
    $this->load->view('admin/trainers/trainersList', $data);
}


public function projectsList(){
   
    $data['get_all']= $this->db
    ->where('p_creator_id',$_SESSION['admin_id'])
    ->join('category', 'category.c_id = projects.p_category', 'left')
    ->order_by('p_id','DESC')
    ->get('projects')
    ->result();
    // print_r("<pre>");
    // print_r($data['get_all']);
    // die();
    $this->load->view('admin/projects/projectsList', $data);
}


public function libraryList(){
   
    $data['get_all']= $this->db
    ->where('l_creator_id',$_SESSION['admin_id'])
    ->join('category', 'category.c_id = library.l_category', 'left')
    ->order_by('l_id','DESC')
    ->get('library')
    ->result();
    // print_r("<pre>");
    // print_r($data['get_all']);
    // die();
    $this->load->view('admin/library/libraryList', $data);
}


public function sliderList(){
   
    $data['get_all']= $this->db
    //->where('sr_creator_id',$_SESSION['admin_id'])
    //->join('category', 'category.c_id = students.s_category', 'left')
    ->order_by('sr_id','DESC')
    ->get('slider')
    ->result();
    // print_r("<pre>");
    // print_r($data['get_all']);
    // die();
    $this->load->view('admin/slider/sliderList', $data);
}

public function contactList(){
    $data['get_all']= $this->db
    ->where('c_creator_id',$_SESSION['admin_id'])
    //->join('category', 'category.c_id = price_courses.p_category', 'left')
    ->order_by('c_id','DESC')
    ->get('contact')
    ->result();

    $this->load->view('admin/contact/contactList',$data);
}


public function news_create(){
    $data['category'] = $this->db->get('category')->result_array();
    $this->load->view('admin/news/create',$data);
}

public function allNews_create(){
    $data['category'] = $this->db->get('category')->result_array();
    $this->load->view('admin/allNews/allNewsCreate',$data);
}


public function studentsCreate(){
    $data['category'] = $this->db->get('category')->result_array();
    $this->load->view('admin/students/studentsCreate',$data);
}

public function trainersCreate(){
    $data['category'] = $this->db->get('category')->result_array();
    $this->load->view('admin/trainers/trainersCreate',$data);
}


public function projectsCreate(){
    $data['category'] = $this->db->get('category')->result_array();
    $this->load->view('admin/projects/projectsCreate',$data);
}

public function libraryCreate(){
    $data['category'] = $this->db->get('category')->result_array();
    $this->load->view('admin/library/libraryCreate',$data);
}

public function sliderCreate(){
    $data['category'] = $this->db->get('category')->result_array();
    $this->load->view('admin/slider/sliderCreate',$data);
}


public function contactCreate(){
    $data['category'] = $this->db->get('category')->result_array();
    $this->load->view('admin/contact/contactCreate',$data);
}



public function news_create_act(){
    //STEP 1 = BÜTÜN İNPUTLARIN ADLARINI GÖTÜR
   $title_az    = $_POST['title_az'];
   $descr_az    = $_POST['description_az'];

   $title_en    = $_POST['title_en'];
   $descr_en    = $_POST['description_en'];

   $title_ru    = $_POST['title_ru'];
   $descr_ru    = $_POST['description_ru'];

   $price_az     = $_POST['n_price_az'];
   $price_en     = $_POST['n_price_en'];
   $price_ru     = $_POST['n_price_ru'];
   $month_az     = $_POST['n_month_az'];
   $month_en     = $_POST['n_month_en'];
   $month_ru     = $_POST['n_month_ru'];
   $times_az     = $_POST['n_times_az'];
   $times_en     = $_POST['n_times_en'];
   $times_ru     = $_POST['n_times_ru'];
   $hour_az      = $_POST['n_hour_az'];
   $hour_en      = $_POST['n_hour_en'];
   $hour_ru      = $_POST['n_hour_ru'];

   $date     = $_POST['date'];
   $category = $_POST['category'];
   $page     = $_POST['page'];
   $Status   = $_POST['Status'];

   //STEP 2 = BÜTÜN İNPUTLARIN ADLARINI YOXLAYIN BOŞLUQ OLMASIN 

   if(!empty($title_az) && !empty($descr_az) && !empty($date) && !empty($category) && !empty($Status) && !empty($price_az)&& !empty($month_az)&& !empty($times_az)&& !empty($hour_az)){

    //STEP 6 = Faylin /SHEKLIN YUKLENMESI-----------------------------------
                $config['upload_path']          = './uploads/news/';
                $config['allowed_types']        = 'gif|jpg|png|mp3|jpeg';
                $config['remove_spaces']        = true;
                //$config['max_size']             = 100;
                //$config['max_width']            = 1024;
                //$config['max_height']           = 768;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

    if($this->upload->do_upload('image')){
        $upload_name = $this->upload->data('file_name');
        $upload_ext = $this->upload->data('file_ext');
    //--------------------------------------------------------------
  //STEP 3 = NEWS TABLE -DA OLAN SUTUNLARIN ADLARINI GOTURUN VE BERABERLESHDIRIN INPUTLARA 
    //VERDIYIMIZ DEYISHENLERIN ADLARINA
        $data = [
            'n_title_az'       => $title_az,
            'n_title_en'       => $title_en,
            'n_title_ru'       => $title_ru,


            'n_description_az' => $descr_az,
            'n_description_en' => $descr_en,
            'n_description_ru' => $descr_ru,

            'n_price_az'       => $price_az, 
            'n_price_en'       => $price_en, 
            'n_price_ru'       => $price_ru, 
            'n_month_az'       => $month_az,
            'n_month_en'       => $month_en,
            'n_month_ru'       => $month_ru,
            'n_times_az'       => $times_az,
            'n_times_en'       => $times_en,
            'n_times_ru'       => $times_ru,
            'n_hour_az'        => $hour_az,
            'n_hour_en'        => $hour_en,
            'n_hour_ru'        => $hour_ru,
            'n_date'        => $date,
            'n_category'    => $category,
            'n_page'        => $page,
            'n_status'      => $Status,
            'n_file'        => $upload_name,
            'n_file_ext'    => $upload_ext,
            //'n_status'      => "Deactive",
            //'n_image'       => ,
            'n_creator_id'  => $_SESSION['admin_id'],
            'n_create_date' => date("Y-m-d H:i:s"),
           ];
           
           //STEP 4 = MELUMATLARI DATABAZAYA DAXIL EDIN
           $data = $this->security->xss_clean($data);
           $this->db->insert('news', $data);
    
           //STEP 5 = LIST METODUNA GONDER  
           redirect(base_url('a_news_list'));
    }else{
        $data = [
            'n_title_az'       => $title_az,
            'n_title_en'       => $title_en,
            'n_title_ru'       => $title_ru,


            'n_description_az' => $descr_az,
            'n_description_en' => $descr_en,
            'n_description_ru' => $descr_ru,
            
            'n_price_az'       => $price_az, 
            'n_price_en'       => $price_en, 
            'n_price_ru'       => $price_ru, 
            'n_month_az'       => $month_az,
            'n_month_en'       => $month_en,
            'n_month_ru'       => $month_ru,
            'n_times_az'       => $times_az,
            'n_times_en'       => $times_en,
            'n_times_ru'       => $times_ru,
            'n_hour_az'        => $hour_az,
            'n_hour_en'        => $hour_en,
            'n_hour_ru'        => $hour_ru,
            'n_date'        => $date,
            'n_category'    => $category,
            'n_page'        => $page,
            'n_status'      => $Status,
            //'n_status'      => "Deactive",
            //'n_file'        => $upload_name,
            //'n_file_ext'    => $upload_ext,
            //'n_image'       => ,
            'n_creator_id'  => $_SESSION['admin_id'],
            'n_create_date' => date("Y-m-d H:i:s"),
           ];
           
           //STEP 4 = MELUMATLARI DATABAZAYA DAXIL EDIN
           $data = $this->security->xss_clean($data);
           $this->db->insert('news', $data);
    
           //STEP 5 = LIST METODUNA GONDER  
           redirect(base_url('a_news_list'));
    }
    //STEP 3 = NEWS TABLE -DA OLAN SUTUNLARIN ADLARINI GOTURUN VE BERABERLESHDIRIN INPUTLARA 
    //VERDIYIMIZ DEYISHENLERIN ADLARINA
    //$data = [
      //  'n_title'       => $title,
       // 'n_description' => $descr,
       // 'n_date'        => $date,
        //'n_category'    => $category,
        //'n_status'      => $Status,
        //'n_image'       => ,
        //'n_creator_id'  => ,
        //'n_create_date' => date("Y-m-d H:i:s"),
       //];
       
       //STEP 4 = MELUMATLARI DATABAZAYA DAXIL EDIN
      // $this->db->insert('news', $data);

       //STEP 5 = LIST METODUNA GONDER  
       //redirect(base_url('a_news_list'));
   }else{
       redirect($_SERVER['HTTP_REFERER']);
   }
}

public function allNews_create_act(){
    //STEP 1 = BÜTÜN İNPUTLARIN ADLARINI GÖTÜR
   $title_az    = $_POST['e_title_az'];
   $descr_az    = $_POST['e_description_az'];

   $title_en    = $_POST['e_title_en'];
   $descr_en    = $_POST['e_description_en'];

   $title_ru    = $_POST['e_title_ru'];
   $descr_ru    = $_POST['e_description_ru'];


   $date     = $_POST['e_date'];
   $category = $_POST['e_category'];
   $page     = $_POST['e_page'];
   $Status   = $_POST['e_Status'];

   
   //STEP 2 = BÜTÜN İNPUTLARIN ADLARINI YOXLAYIN BOŞLUQ OLMASIN 

   if(!empty($title_az) && !empty($descr_az) && !empty($date) && !empty($category) && !empty($Status)){

    //STEP 6 = Faylin /SHEKLIN YUKLENMESI-----------------------------------
                $config['upload_path']          = './uploads/events/';
                $config['allowed_types']        = 'gif|jpg|png|mp3|jpeg';
                $config['remove_spaces']        = true;
                //$config['max_size']             = 100;
                //$config['max_width']            = 1024;
                //$config['max_height']           = 768;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

    if($this->upload->do_upload('image')){
        $upload_name = $this->upload->data('file_name');
        $upload_ext = $this->upload->data('file_ext');
    //--------------------------------------------------------------
//STEP 3 = NEWS TABLE -DA OLAN SUTUNLARIN ADLARINI GOTURUN VE BERABERLESHDIRIN INPUTLARA 
    //VERDIYIMIZ DEYISHENLERIN ADLARINA
        $data = [
            'e_title_az'       => $title_az,
            'e_title_en'       => $title_en,
            'e_title_ru'       => $title_ru,


            'e_description_az' => $descr_az,
            'e_description_en' => $descr_en,
            'e_description_ru' => $descr_ru,

            'e_date'        => $date,
            'e_category'    => $category,
            'e_page'        => $page,
            'e_Status'      => $Status,
            'e_file'        => $upload_name,
            'e_file_ext'    => $upload_ext,
            //'n_status'      => "Deactive",
            //'n_image'       => ,
            'e_creator_id'  => $_SESSION['admin_id'],
            'e_create_date' => date("Y-m-d H:i:s"),
           ];

           
           
           //STEP 4 = MELUMATLARI DATABAZAYA DAXIL EDIN
        //    $data = $this->security->xss_clean($data);
           $this->db->insert('news_events', $data);
    
           //STEP 5 = LIST METODUNA GONDER  
           redirect(base_url('a_allNews_list'));
    }else{
        $data = [
            'e_title_az'       => $title_az,
            'e_title_en'       => $title_en,
            'e_title_ru'       => $title_ru,


            'e_description_az' => $descr_az,
            'e_description_en' => $descr_en,
            'e_description_ru' => $descr_ru,
            
            'e_date'        => $date,
            'e_category'    => $category,
            'e_page'        => $page,
            'e_Status'      => $Status,
            //'n_status'      => "Deactive",
            //'n_file'        => $upload_name,
            //'n_file_ext'    => $upload_ext,
            //'n_image'       => ,
            'e_creator_id'  => $_SESSION['admin_id'],
            'e_create_date' => date("Y-m-d H:i:s"),
           ];
           
           //STEP 4 = MELUMATLARI DATABAZAYA DAXIL EDIN
        //    $data = $this->security->xss_clean($data);
           $this->db->insert('news_events', $data);
    
           //STEP 5 = LIST METODUNA GONDER  
           redirect(base_url('a_allNews_list'));
    }
    //STEP 3 = NEWS TABLE -DA OLAN SUTUNLARIN ADLARINI GOTURUN VE BERABERLESHDIRIN INPUTLARA 
    //VERDIYIMIZ DEYISHENLERIN ADLARINA
    //$data = [
      //  'n_title'       => $title,
       // 'n_description' => $descr,
       // 'n_date'        => $date,
        //'n_category'    => $category,
        //'n_status'      => $Status,
        //'n_image'       => ,
        //'n_creator_id'  => ,
        //'n_create_date' => date("Y-m-d H:i:s"),
       //];
       
       //STEP 4 = MELUMATLARI DATABAZAYA DAXIL EDIN
      // $this->db->insert('news', $data);

       //STEP 5 = LIST METODUNA GONDER  
       //redirect(base_url('a_news_list'));
   }else{
       redirect($_SERVER['HTTP_REFERER']);
   }
}


public function students_create_act(){
    //STEP 1 = BÜTÜN İNPUTLARIN ADLARINI GÖTÜR
   $title_az    = $_POST['s_title_az'];
   $descr_az    = $_POST['s_description_az'];

   $title_en    = $_POST['s_title_en'];
   $descr_en    = $_POST['s_description_en'];

   $title_ru    = $_POST['s_title_ru'];
   $descr_ru    = $_POST['s_description_ru'];


   $date     = $_POST['s_date'];
   $category = $_POST['s_category'];
   $Status   = $_POST['s_status'];

   //STEP 2 = BÜTÜN İNPUTLARIN ADLARINI YOXLAYIN BOŞLUQ OLMASIN 

   if(!empty($title_az) && !empty($descr_az) && !empty($date) && !empty($category) && !empty($Status)){

    //STEP 6 = Faylin /SHEKLIN YUKLENMESI-----------------------------------
                $config['upload_path']          = './uploads/students/';
                $config['allowed_types']        = 'gif|jpg|png|mp3|jpeg';
                $config['remove_spaces']        = true;
                //$config['max_size']             = 100;
                //$config['max_width']            = 1024;
                //$config['max_height']           = 768;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

    if($this->upload->do_upload('image')){
        $upload_name = $this->upload->data('file_name');
        $upload_ext = $this->upload->data('file_ext');
    //--------------------------------------------------------------
  //STEP 3 = NEWS TABLE -DA OLAN SUTUNLARIN ADLARINI GOTURUN VE BERABERLESHDIRIN INPUTLARA 
    //VERDIYIMIZ DEYISHENLERIN ADLARINA
        $data = [
            's_title_az'       => $title_az,
            's_title_en'       => $title_en,
            's_title_ru'       => $title_ru,


            's_description_az' => $descr_az,
            's_description_en' => $descr_en,
            's_description_ru' => $descr_ru,

            's_date'        => $date,
            's_category'    => $category,
            's_status'      => $Status,
            's_file'        => $upload_name,
            's_file_ext'    => $upload_ext,
            //'n_status'      => "Deactive",
            //'n_image'       => ,
            's_creator_id'  => $_SESSION['admin_id'],
            's_create_date' => date("Y-m-d H:i:s"),
           ];
           
           //STEP 4 = MELUMATLARI DATABAZAYA DAXIL EDIN
           $data = $this->security->xss_clean($data);
           $this->db->insert('students', $data);
    
           //STEP 5 = LIST METODUNA GONDER  
           redirect(base_url('a_studentsList'));
    }else{
        $data = [
            's_title_az'       => $title_az,
            's_title_en'       => $title_en,
            's_title_ru'       => $title_ru,


            's_description_az' => $descr_az,
            's_description_en' => $descr_en,
            's_description_ru' => $descr_ru,
            
            's_date'        => $date,
            's_category'    => $category,
            's_status'      => $Status,
            //'n_status'      => "Deactive",
            //'n_file'        => $upload_name,
            //'n_file_ext'    => $upload_ext,
            //'n_image'       => ,
            's_creator_id'  => $_SESSION['admin_id'],
            's_create_date' => date("Y-m-d H:i:s"),
           ];
           
           //STEP 4 = MELUMATLARI DATABAZAYA DAXIL EDIN
           $data = $this->security->xss_clean($data);
           $this->db->insert('students', $data);
    
           //STEP 5 = LIST METODUNA GONDER  
           redirect(base_url('a_studentsList'));
    }
    //STEP 3 = NEWS TABLE -DA OLAN SUTUNLARIN ADLARINI GOTURUN VE BERABERLESHDIRIN INPUTLARA 
    //VERDIYIMIZ DEYISHENLERIN ADLARINA
    //$data = [
      //  'n_title'       => $title,
       // 'n_description' => $descr,
       // 'n_date'        => $date,
        //'n_category'    => $category,
        //'n_status'      => $Status,
        //'n_image'       => ,
        //'n_creator_id'  => ,
        //'n_create_date' => date("Y-m-d H:i:s"),
       //];
       
       //STEP 4 = MELUMATLARI DATABAZAYA DAXIL EDIN
      // $this->db->insert('news', $data);

       //STEP 5 = LIST METODUNA GONDER  
       //redirect(base_url('a_news_list'));
   }else{
       redirect($_SERVER['HTTP_REFERER']);
   }
}


public function trainers_create_act(){
    //STEP 1 = BÜTÜN İNPUTLARIN ADLARINI GÖTÜR
   $name_az    = $_POST['t_name_az'];
   $descr_az    = $_POST['t_description_az'];

   $name_en    = $_POST['t_name_en'];
   $descr_en    = $_POST['t_description_en'];

   $name_ru    = $_POST['t_name_ru'];
   $descr_ru    = $_POST['t_description_ru'];
   
   $date     = $_POST['t_date'];
   $category = $_POST['t_category'];
   $Status   = $_POST['t_status'];

   //STEP 2 = BÜTÜN İNPUTLARIN ADLARINI YOXLAYIN BOŞLUQ OLMASIN 

   if(!empty($name_az) && !empty($descr_az) && !empty($date) && !empty($category) && !empty($Status)){

    //STEP 6 = Faylin /SHEKLIN YUKLENMESI-----------------------------------
                $config['upload_path']          = './uploads/trainers/';
                $config['allowed_types']        = 'gif|jpg|png|mp3|jpeg';
                $config['remove_spaces']        = true;
                //$config['max_size']             = 100;
                //$config['max_width']            = 1024;
                //$config['max_height']           = 768;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

    if($this->upload->do_upload('image')){
        $upload_name = $this->upload->data('file_name');
        $upload_ext = $this->upload->data('file_ext');
    //--------------------------------------------------------------
  //STEP 3 = NEWS TABLE -DA OLAN SUTUNLARIN ADLARINI GOTURUN VE BERABERLESHDIRIN INPUTLARA 
    //VERDIYIMIZ DEYISHENLERIN ADLARINA
        $data = [
            't_name_az'        => $name_az,
            't_description_az' => $descr_az,

            't_name_en'        => $name_en,
            't_description_en' => $descr_en,

            't_name_ru'        => $name_ru,
            't_description_ru' => $descr_ru,

            't_date'        => $date,
            't_category'    => $category,
            't_status'      => $Status,
            't_file'        => $upload_name,
            't_file_ext'    => $upload_ext,
            //'n_status'      => "Deactive",
            //'n_image'       => ,
            't_creator_id'  => $_SESSION['admin_id'],
            't_create_date' => date("Y-m-d H:i:s"),
           ];
           
           //STEP 4 = MELUMATLARI DATABAZAYA DAXIL EDIN
           $data = $this->security->xss_clean($data);
           $this->db->insert('trainers', $data);
    
           //STEP 5 = LIST METODUNA GONDER  
           redirect(base_url('a_trainersList'));
    }else{
        $data = [
            't_name_az'        => $name_az,
            't_description_az' => $descr_az,

            't_name_en'        => $name_en,
            't_description_en' => $descr_en,

            't_name_ru'        => $name_ru,
            't_description_ru' => $descr_ru,
            
            't_date'        => $date,
            't_category'    => $category,
            't_status'      => $Status,
            //'n_status'      => "Deactive",
            //'n_file'        => $upload_name,
            //'n_file_ext'    => $upload_ext,
            //'n_image'       => ,
            't_creator_id'  => $_SESSION['admin_id'],
            't_create_date' => date("Y-m-d H:i:s"),
           ];
           
           //STEP 4 = MELUMATLARI DATABAZAYA DAXIL EDIN
           $data = $this->security->xss_clean($data);
           $this->db->insert('trainers', $data);
    
           //STEP 5 = LIST METODUNA GONDER  
           redirect(base_url('a_trainersList'));
    }
    //STEP 3 = NEWS TABLE -DA OLAN SUTUNLARIN ADLARINI GOTURUN VE BERABERLESHDIRIN INPUTLARA 
    //VERDIYIMIZ DEYISHENLERIN ADLARINA
    //$data = [
      //  'n_title'       => $title,
       // 'n_description' => $descr,
       // 'n_date'        => $date,
        //'n_category'    => $category,
        //'n_status'      => $Status,
        //'n_image'       => ,
        //'n_creator_id'  => ,
        //'n_create_date' => date("Y-m-d H:i:s"),
       //];
       
       //STEP 4 = MELUMATLARI DATABAZAYA DAXIL EDIN
      // $this->db->insert('news', $data);

       //STEP 5 = LIST METODUNA GONDER  
       //redirect(base_url('a_news_list'));
   }else{
       redirect($_SERVER['HTTP_REFERER']);
   }
}


public function projects_create_act(){
    //STEP 1 = BÜTÜN İNPUTLARIN ADLARINI GÖTÜR
   $title_az    = $_POST['p_title_az'];
   $descr_az    = $_POST['p_description_az'];

   $title_en    = $_POST['p_title_en'];
   $descr_en    = $_POST['p_description_en'];

   $title_ru    = $_POST['p_title_ru'];
   $descr_ru    = $_POST['p_description_ru'];


   $date     = $_POST['p_date'];
   $category = $_POST['p_category'];
   $Status   = $_POST['p_status'];

   //STEP 2 = BÜTÜN İNPUTLARIN ADLARINI YOXLAYIN BOŞLUQ OLMASIN 

   if(!empty($title_az) && !empty($descr_az) && !empty($date) && !empty($category) && !empty($Status)){

    //STEP 6 = Faylin /SHEKLIN YUKLENMESI-----------------------------------
                $config['upload_path']          = './uploads/projects/';
                $config['allowed_types']        = 'gif|jpg|png|mp3|jpeg';
                $config['remove_spaces']        = true;
                //$config['max_size']             = 100;
                //$config['max_width']            = 1024;
                //$config['max_height']           = 768;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

    if($this->upload->do_upload('image')){
        $upload_name = $this->upload->data('file_name');
        $upload_ext = $this->upload->data('file_ext');
    //--------------------------------------------------------------
  //STEP 3 = NEWS TABLE -DA OLAN SUTUNLARIN ADLARINI GOTURUN VE BERABERLESHDIRIN INPUTLARA 
    //VERDIYIMIZ DEYISHENLERIN ADLARINA
        $data = [
            'p_title_az'       => $title_az,
            'p_title_en'       => $title_en,
            'p_title_ru'       => $title_ru,


            'p_description_az' => $descr_az,
            'p_description_en' => $descr_en,
            'p_description_ru' => $descr_ru,

            'p_date'        => $date,
            'p_category'    => $category,
            'p_status'      => $Status,
            'p_file'        => $upload_name,
            'p_file_ext'    => $upload_ext,
            //'n_status'      => "Deactive",
            //'n_image'       => ,
            'p_creator_id'  => $_SESSION['admin_id'],
            'p_create_date' => date("Y-m-d H:i:s"),
           ];
           
           //STEP 4 = MELUMATLARI DATABAZAYA DAXIL EDIN
           $data = $this->security->xss_clean($data);
           $this->db->insert('projects', $data);
    
           //STEP 5 = LIST METODUNA GONDER  
           redirect(base_url('a_projectsList'));
    }else{
        $data = [
            'p_title_az'       => $title_az,
            'p_title_en'       => $title_en,
            'p_title_ru'       => $title_ru,


            'p_description_az' => $descr_az,
            'p_description_en' => $descr_en,
            'p_description_ru' => $descr_ru,
            
            'p_date'        => $date,
            'p_category'    => $category,
            'p_status'      => $Status,
            //'n_status'      => "Deactive",
            //'n_file'        => $upload_name,
            //'n_file_ext'    => $upload_ext,
            //'n_image'       => ,
            'p_creator_id'  => $_SESSION['admin_id'],
            'p_create_date' => date("Y-m-d H:i:s"),
           ];
           
           //STEP 4 = MELUMATLARI DATABAZAYA DAXIL EDIN
           $data = $this->security->xss_clean($data);
           $this->db->insert('projects', $data);
    
           //STEP 5 = LIST METODUNA GONDER  
           redirect(base_url('a_projectsList'));
    }
    //STEP 3 = NEWS TABLE -DA OLAN SUTUNLARIN ADLARINI GOTURUN VE BERABERLESHDIRIN INPUTLARA 
    //VERDIYIMIZ DEYISHENLERIN ADLARINA
    //$data = [
      //  'n_title'       => $title,
       // 'n_description' => $descr,
       // 'n_date'        => $date,
        //'n_category'    => $category,
        //'n_status'      => $Status,
        //'n_image'       => ,
        //'n_creator_id'  => ,
        //'n_create_date' => date("Y-m-d H:i:s"),
       //];
       
       //STEP 4 = MELUMATLARI DATABAZAYA DAXIL EDIN
      // $this->db->insert('news', $data);

       //STEP 5 = LIST METODUNA GONDER  
       //redirect(base_url('a_news_list'));
   }else{
       redirect($_SERVER['HTTP_REFERER']);
   }
}



public function library_create_act(){
    //STEP 1 = BÜTÜN İNPUTLARIN ADLARINI GÖTÜR
   $title_az    = $_POST['l_title_az'];
   $number_az    = $_POST['l_number_az'];

   $title_en    = $_POST['l_title_en'];
   $number_en    = $_POST['l_number_en'];

   $title_ru    = $_POST['l_title_ru'];
   $number_ru    = $_POST['l_number_ru'];


   $date     = $_POST['l_date'];
   $category = $_POST['l_category'];
   $Status   = $_POST['l_status'];

   //STEP 2 = BÜTÜN İNPUTLARIN ADLARINI YOXLAYIN BOŞLUQ OLMASIN 

   if(!empty($title_az) && !empty($number_az) && !empty($date) && !empty($category) && !empty($Status)){

    //STEP 6 = Faylin /SHEKLIN YUKLENMESI-----------------------------------
                $config['upload_path']          = './uploads/library/';
                $config['allowed_types']        = 'gif|jpg|png|mp3|jpeg';
                $config['remove_spaces']        = true;
                //$config['max_size']             = 100;
                //$config['max_width']            = 1024;
                //$config['max_height']           = 768;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

    if($this->upload->do_upload('image')){
        $upload_name = $this->upload->data('file_name');
        $upload_ext = $this->upload->data('file_ext');
    //--------------------------------------------------------------
  //STEP 3 = NEWS TABLE -DA OLAN SUTUNLARIN ADLARINI GOTURUN VE BERABERLESHDIRIN INPUTLARA 
    //VERDIYIMIZ DEYISHENLERIN ADLARINA
        $data = [
            'l_title_az'       => $title_az,
            'l_title_en'       => $title_en,
            'l_title_ru'       => $title_ru,


            'l_number_az' => $number_az,
            'l_number_en' => $number_en,
            'l_number_ru' => $number_ru,

            'l_date'        => $date,
            'l_category'    => $category,
            'l_status'      => $Status,
            'l_file'        => $upload_name,
            'l_file_ext'    => $upload_ext,
            //'n_status'      => "Deactive",
            //'n_image'       => ,
            'l_creator_id'  => $_SESSION['admin_id'],
            'l_create_date' => date("Y-m-d H:i:s"),
           ];
           
           //STEP 4 = MELUMATLARI DATABAZAYA DAXIL EDIN
           $data = $this->security->xss_clean($data);
           $this->db->insert('library', $data);
    
           //STEP 5 = LIST METODUNA GONDER  
           redirect(base_url('a_libraryList'));
    }else{
        $data = [
            'l_title_az'       => $title_az,
            'l_title_en'       => $title_en,
            'l_title_ru'       => $title_ru,


            'l_number_az' => $number_az,
            'l_number_en' => $number_en,
            'l_number_ru' => $number_ru,
            
            'l_date'        => $date,
            'l_category'    => $category,
            'l_status'      => $Status,
            //'n_status'      => "Deactive",
            //'n_file'        => $upload_name,
            //'n_file_ext'    => $upload_ext,
            //'n_image'       => ,
            'l_creator_id'  => $_SESSION['admin_id'],
            'l_create_date' => date("Y-m-d H:i:s"),
           ];
           
           //STEP 4 = MELUMATLARI DATABAZAYA DAXIL EDIN
           $data = $this->security->xss_clean($data);
           $this->db->insert('library', $data);
    
           //STEP 5 = LIST METODUNA GONDER  
           redirect(base_url('a_libraryList'));
    }
    //STEP 3 = NEWS TABLE -DA OLAN SUTUNLARIN ADLARINI GOTURUN VE BERABERLESHDIRIN INPUTLARA 
    //VERDIYIMIZ DEYISHENLERIN ADLARINA
    //$data = [
      //  'n_title'       => $title,
       // 'n_description' => $descr,
       // 'n_date'        => $date,
        //'n_category'    => $category,
        //'n_status'      => $Status,
        //'n_image'       => ,
        //'n_creator_id'  => ,
        //'n_create_date' => date("Y-m-d H:i:s"),
       //];
       
       //STEP 4 = MELUMATLARI DATABAZAYA DAXIL EDIN
      // $this->db->insert('news', $data);

       //STEP 5 = LIST METODUNA GONDER  
       //redirect(base_url('a_news_list'));
   }else{
       redirect($_SERVER['HTTP_REFERER']);
   }
}

public function slider_create_act(){
    //STEP 1 = BÜTÜN İNPUTLARIN ADLARINI GÖTÜR
   $title_az    = $_POST['sr_title_az'];
   $descr_az    = $_POST['sr_description_az'];

   $title_en    = $_POST['sr_title_en'];
   $descr_en    = $_POST['sr_description_en'];

   $title_ru    = $_POST['sr_title_ru'];
   $descr_ru    = $_POST['sr_description_ru'];

   $link   = $_POST['sr_link'];
   //$date     = $_POST['s_date'];
   //$category = $_POST['s_category'];
   $Status   = $_POST['sr_status'];

   //STEP 2 = BÜTÜN İNPUTLARIN ADLARINI YOXLAYIN BOŞLUQ OLMASIN 

   if(!empty($title_az) && !empty($descr_az) && !empty($Status)){

    //STEP 6 = Faylin /SHEKLIN YUKLENMESI-----------------------------------
                $config['upload_path']          = './uploads/slider/';
                $config['allowed_types']        = 'gif|jpg|png|mp3|jpeg';
                $config['remove_spaces']        = true;
                //$config['max_size']             = 100;
                //$config['max_width']            = 1024;
                //$config['max_height']           = 768;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

    if($this->upload->do_upload('image')){
        $upload_name = $this->upload->data('file_name');
        $upload_ext = $this->upload->data('file_ext');
    //--------------------------------------------------------------
  //STEP 3 = NEWS TABLE -DA OLAN SUTUNLARIN ADLARINI GOTURUN VE BERABERLESHDIRIN INPUTLARA 
    //VERDIYIMIZ DEYISHENLERIN ADLARINA
        $data = [
            'sr_title_az'       => $title_az,
            'sr_title_en'       => $title_en,
            'sr_title_ru'       => $title_ru,


            'sr_description_az' => $descr_az,
            'sr_description_en' => $descr_en,
            'sr_description_ru' => $descr_ru,
            'sr_link'      => $link,
            //'s_date'        => $date,
            //'s_category'    => $category,
            'sr_status'      => $Status,
            'sr_file'        => $upload_name,
            'sr_file_ext'    => $upload_ext,
            //'n_status'      => "Deactive",
            //'n_image'       => ,
            //'s_creator_id'  => $_SESSION['admin_id'],
            //'s_create_date' => date("Y-m-d H:i:s"),
           ];
           
           //STEP 4 = MELUMATLARI DATABAZAYA DAXIL EDIN
           $data = $this->security->xss_clean($data);
           $this->db->insert('slider', $data);
    
           //STEP 5 = LIST METODUNA GONDER  
           redirect(base_url('a_sliderList'));
    }else{
        $data = [
            'sr_title_az'       => $title_az,
            'sr_title_en'       => $title_en,
            'sr_title_ru'       => $title_ru,


            'sr_description_az' => $descr_az,
            'sr_description_en' => $descr_en,
            'sr_description_ru' => $descr_ru,
            
            'sr_link'      => $link,
            //'s_date'        => $date,
            //'s_category'    => $category,
            'sr_status'      => $Status,
            //'n_status'      => "Deactive",
            //'n_file'        => $upload_name,
            //'n_file_ext'    => $upload_ext,
            //'n_image'       => ,
            //'s_creator_id'  => $_SESSION['admin_id'],
            //'s_create_date' => date("Y-m-d H:i:s"),
           ];
           
           //STEP 4 = MELUMATLARI DATABAZAYA DAXIL EDIN
           $data = $this->security->xss_clean($data);
           $this->db->insert('slider', $data);
    
           //STEP 5 = LIST METODUNA GONDER  
           redirect(base_url('a_sliderList'));
    }
    //STEP 3 = NEWS TABLE -DA OLAN SUTUNLARIN ADLARINI GOTURUN VE BERABERLESHDIRIN INPUTLARA 
    //VERDIYIMIZ DEYISHENLERIN ADLARINA
    //$data = [
      //  'n_title'       => $title,
       // 'n_description' => $descr,
       // 'n_date'        => $date,
        //'n_category'    => $category,
        //'n_status'      => $Status,
        //'n_image'       => ,
        //'n_creator_id'  => ,
        //'n_create_date' => date("Y-m-d H:i:s"),
       //];
       
       //STEP 4 = MELUMATLARI DATABAZAYA DAXIL EDIN
      // $this->db->insert('news', $data);

       //STEP 5 = LIST METODUNA GONDER  
       //redirect(base_url('a_news_list'));
   }else{
       redirect($_SERVER['HTTP_REFERER']);
   }
}

public function contact_create_act(){
    //STEP 1 = BÜTÜN İNPUTLARIN ADLARINI GÖTÜR
   $c_office_title_az    = $_POST['c_office_title_az'];
   $c_office_title_en    = $_POST['c_office_title_en'];
   $c_office_title_ru    = $_POST['c_office_title_ru'];


   $c_office_desc_az    = $_POST['c_office_desc_az'];
   $c_office_desc_en    = $_POST['c_office_desc_en'];
   $c_office_desc_ru    = $_POST['c_office_desc_ru'];

   $c_mobile_title_az   = $_POST['c_mobile_title_az'];
   $c_mobile_title_en   = $_POST['c_mobile_title_en'];
   $c_mobile_title_ru   = $_POST['c_mobile_title_ru'];

   $c_mobile_desc_az    = $_POST['c_mobile_desc_az'];
   $c_mobile_desc_en    = $_POST['c_mobile_desc_en'];
   $c_mobile_desc_ru    = $_POST['c_mobile_desc_ru'];

   $c_mail_title_az     = $_POST['c_mail_title_az'];
   $c_mail_title_en     = $_POST['c_mail_title_en'];
   $c_mail_title_ru     = $_POST['c_mail_title_ru'];

   $c_mail_desc_az      = $_POST['c_mail_desc_az'];
   $c_mail_desc_en      = $_POST['c_mail_desc_en'];
   $c_mail_desc_ru      = $_POST['c_mail_desc_ru'];

   $c_map               = $_POST['c_map'];


   //STEP 2 = BÜTÜN İNPUTLARIN ADLARINI YOXLAYIN BOŞLUQ OLMASIN 

   if(!empty($c_office_title_az) && !empty($c_office_desc_az) && !empty($c_mobile_title_az) && !empty($c_mobile_desc_az) && !empty($c_mail_title_az) && !empty($c_mail_desc_az) && !empty($c_map)){

    
        //STEP 3 = NEWS TABLE -DA OLAN SUTUNLARIN ADLARINI GOTURUN VE BERABERLESHDIRIN INPUTLARA 
        //VERDIYIMIZ DEYISHENLERIN ADLARINA
        $data = [
            'c_office_title_az'        => $c_office_title_az,
            'c_office_title_en'        => $c_office_title_en,
            'c_office_title_ru'        => $c_office_title_ru,

            'c_office_desc_az'         => $c_office_desc_az,
            'c_office_desc_en'         => $c_office_desc_en,
            'c_office_desc_ru'         => $c_office_desc_ru,


            'c_mobile_title_az'        => $c_mobile_title_az,
            'c_mobile_title_en'        => $c_mobile_title_en,
            'c_mobile_title_ru'        => $c_mobile_title_ru,

            'c_mobile_desc_az'         => $c_mobile_desc_az,
            'c_mobile_desc_en'         => $c_mobile_desc_en,
            'c_mobile_desc_ru'         => $c_mobile_desc_ru,
            
            'c_mail_title_az'          => $c_mail_title_az,
            'c_mail_title_en'          => $c_mail_title_en,
            'c_mail_title_ru'          => $c_mail_title_ru,

            'c_mail_desc_az'           => $c_mail_desc_az,
            'c_mail_desc_en'           => $c_mail_desc_en,
            'c_mail_desc_ru'           => $c_mail_desc_ru,

            'c_map'                    => $c_map,
            

            //'n_file'        => $upload_name,
            //'n_file_ext'    => $upload_ext,
            //'n_status'      => "Deactive",
            //'n_image'       => ,
            'c_creator_id'  => $_SESSION['admin_id'],
            //'n_create_date' => date("Y-m-d H:i:s"),
           ];
           
           //STEP 4 = MELUMATLARI DATABAZAYA DAXIL EDIN
           $data = $this->security->xss_clean($data);
           $this->db->insert('contact', $data);
    
           //STEP 5 = LIST METODUNA GONDER  
           redirect(base_url('a_contactList'));
    }else{
        $data = [
            'c_office_title_az'        => $c_office_title_az,
            'c_office_title_en'        => $c_office_title_en,
            'c_office_title_ru'        => $c_office_title_ru,

            'c_office_desc_az'         => $c_office_desc_az,
            'c_office_desc_en'         => $c_office_desc_en,
            'c_office_desc_ru'         => $c_office_desc_ru,


            'c_mobile_title_az'        => $c_mobile_title_az,
            'c_mobile_title_en'        => $c_mobile_title_en,
            'c_mobile_title_ru'        => $c_mobile_title_ru,

            'c_mobile_desc_az'         => $c_mobile_desc_az,
            'c_mobile_desc_en'         => $c_mobile_desc_en,
            'c_mobile_desc_ru'         => $c_mobile_desc_ru,
            
            'c_mail_title_az'          => $c_mail_title_az,
            'c_mail_title_en'          => $c_mail_title_en,
            'c_mail_title_ru'          => $c_mail_title_ru,

            'c_mail_desc_az'           => $c_mail_desc_az,
            'c_mail_desc_en'           => $c_mail_desc_en,
            'c_mail_desc_ru'           => $c_mail_desc_ru,

            'c_map'                    => $c_map,
            //'n_status'      => "Deactive",
            //'n_file'        => $upload_name,
            //'n_file_ext'    => $upload_ext,
            //'n_image'       => ,
            'c_creator_id'  => $_SESSION['admin_id'],
           // 'n_create_date' => date("Y-m-d H:i:s"),
           ];
           
           //STEP 4 = MELUMATLARI DATABAZAYA DAXIL EDIN
           $data = $this->security->xss_clean($data);
           $this->db->insert('contact', $data);
    
           //STEP 5 = LIST METODUNA GONDER  
           redirect(base_url('a_contactList'));
    }
    //STEP 3 = NEWS TABLE -DA OLAN SUTUNLARIN ADLARINI GOTURUN VE BERABERLESHDIRIN INPUTLARA 
    //VERDIYIMIZ DEYISHENLERIN ADLARINA
    //$data = [
      //  'n_title'       => $title,
       // 'n_description' => $descr,
       // 'n_date'        => $date,
        //'n_category'    => $category,
        //'n_status'      => $Status,
        //'n_image'       => ,
        //'n_creator_id'  => ,
        //'n_create_date' => date("Y-m-d H:i:s"),
       //];
       
       //STEP 4 = MELUMATLARI DATABAZAYA DAXIL EDIN
      // $this->db->insert('news', $data);

       //STEP 5 = LIST METODUNA GONDER  
       //redirect(base_url('a_news_list'));
   
}

public function deleteNews($id){
    $id = $this->security->xss_clean($id);
    $this->db->where('n_id',$id)->delete('news');
    redirect(base_url('a_news_list'));
}


public function allDeleteNews($id){
    $id = $this->security->xss_clean($id);
    $this->db->where('e_id',$id)->delete('news_events');
    redirect(base_url('a_allNews_list'));
}

public function students_delete($id){
    $id = $this->security->xss_clean($id);
    $this->db->where('s_id',$id)->delete('students');
    redirect(base_url('a_studentsList'));
}


public function projects_delete($id){
    $id = $this->security->xss_clean($id);
    $this->db->where('p_id',$id)->delete('projects');
    redirect(base_url('a_projectsList'));
}

public function library_delete($id){
    $id = $this->security->xss_clean($id);
    $this->db->where('l_id',$id)->delete('library');
    redirect(base_url('a_libraryList'));
}

public function trainers_delete($id){
    $id = $this->security->xss_clean($id);
    $this->db->where('t_id',$id)->delete('trainers');
    redirect(base_url('a_trainersList'));
}

public function slider_delete($id){
    $id = $this->security->xss_clean($id);
    $this->db->where('sr_id',$id)->delete('slider');
    redirect(base_url('a_sliderList'));
}


public function contact_delete($id){
    $id = $this->security->xss_clean($id);
    $this->db->where('c_id',$id)->delete('contact');
    redirect(base_url('a_contactList'));
}


public function update_news($id){

    $id = $this->security->xss_clean($id);

   //bu function id-sine gore lazimi secilmish xeberin ayrica getirilmesi ucundur.
    $data['category'] = $this->db->get('category')->result_array();

    $data['single_news'] = $this->db->where('n_id', $id)->get('news')->row();
    if($data['single_news']){
        $this->load->view('admin/news/edit',$data);
    }else{
        redirect(base_url('a_news_list'));
    }
   
}

public function students_update($id){

    $id = $this->security->xss_clean($id);

   //bu function id-sine gore lazimi secilmish xeberin ayrica getirilmesi ucundur.
    $data['category'] = $this->db->get('category')->result_array();

    $data['single_news'] = $this->db->where('s_id', $id)->get('students')->row();
    if($data['single_news']){
        $this->load->view('admin/students/studentsEdit',$data);
    }else{
        redirect(base_url('a_studentsList'));
    }
    // print_r("<pre>");
    // print_r($data['single_news'] );
    // die();
}


public function projects_update($id){

    $id = $this->security->xss_clean($id);

   //bu function id-sine gore lazimi secilmish xeberin ayrica getirilmesi ucundur.
    $data['category'] = $this->db->get('category')->result_array();

    $data['single_news'] = $this->db->where('p_id', $id)->get('projects')->row();
    if($data['single_news']){
        $this->load->view('admin/projects/projectsEdit',$data);
    }else{
        redirect(base_url('a_projectsList'));
    }
    //  print_r("<pre>");
    //  print_r($data['single_news'] );
    // die();
}


public function library_update($id){

    $id = $this->security->xss_clean($id);

   //bu function id-sine gore lazimi secilmish xeberin ayrica getirilmesi ucundur.
    $data['category'] = $this->db->get('category')->result_array();

    $data['single_news'] = $this->db->where('l_id', $id)->get('library')->row();
    if($data['single_news']){
        $this->load->view('admin/library/libraryEdit',$data);
    }else{
        redirect(base_url('a_libraryList'));
    }
   
}

public function trainers_update($id){

    $id = $this->security->xss_clean($id);

   //bu function id-sine gore lazimi secilmish xeberin ayrica getirilmesi ucundur.
    $data['category'] = $this->db->get('category')->result_array();

    $data['single_news'] = $this->db->where('t_id', $id)->get('trainers')->row();
    if($data['single_news']){
        $this->load->view('admin/trainers/trainersEdit',$data);
    }else{
        redirect(base_url('a_trainersList'));
    }
   
}


public function allUpdate_news($id){

    $id = $this->security->xss_clean($id);

   //bu function id-sine gore lazimi secilmish xeberin ayrica getirilmesi ucundur.
    $data['category'] = $this->db->get('category')->result_array();

    $data['single_news'] = $this->db->where('e_id', $id)->get('news_events')->row();
    if($data['single_news']){
        $this->load->view('admin/allNews/allNewsEdit',$data);
    }else{
        redirect(base_url('a_allNews_list'));
    }
   
}

public function slider_update($id){

    $id = $this->security->xss_clean($id);

   //bu function id-sine gore lazimi secilmish xeberin ayrica getirilmesi ucundur.
    $data['category'] = $this->db->get('category')->result_array();

    $data['single_news'] = $this->db->where('sr_id', $id)->get('slider')->row();
    if($data['single_news']){
        $this->load->view('admin/slider/sliderEdit',$data);
    }else{
        redirect(base_url('a_sliderList'));
    }
    // print_r("<pre>");
    //  print_r($data['single_news'] );
    // die();
}


public function contact_update($id){

    $id = $this->security->xss_clean($id);

   //bu function id-sine gore lazimi secilmish xeberin ayrica getirilmesi ucundur.
    $data['category'] = $this->db->get('category')->result_array();

    $data['single_news'] = $this->db->where('c_id', $id)->get('contact')->row();
    if($data['single_news']){
        $this->load->view('admin/contact/contactEdit',$data);
    }else{
        redirect(base_url('a_contactList'));
    }
    }




public function update_newsAct($id){
  //STEP 1 = BÜTÜN İNPUTLARIN ADLARINI GÖTÜR

  $id = $this->security->xss_clean($id);

   $title_az    = $_POST['title_az'];
   $descr_az    = $_POST['description_az'];

   $title_en    = $_POST['title_en'];
   $descr_en    = $_POST['description_en'];

   $title_ru    = $_POST['title_ru'];
   $descr_ru    = $_POST['description_ru'];

   $price_az     = $_POST['n_price_az'];
   $price_en     = $_POST['n_price_en'];
   $price_ru     = $_POST['n_price_ru'];
   $month_az     = $_POST['n_month_az'];
   $month_en     = $_POST['n_month_en'];
   $month_ru     = $_POST['n_month_ru'];
   $times_az     = $_POST['n_times_az'];
   $times_en     = $_POST['n_times_en'];
   $times_ru     = $_POST['n_times_ru'];
   $hour_az      = $_POST['n_hour_az'];
   $hour_en      = $_POST['n_hour_en'];
   $hour_ru      = $_POST['n_hour_ru'];

   $date     = $_POST['date'];
   $category = $_POST['category'];
   $Status   = $_POST['Status'];
   $page   = $_POST['page'];


  //STEP 2 = BÜTÜN İNPUTLARIN ADLARINI YOXLAYIN BOŞLUQ OLMASIN 

  if(!empty($title_az) && !empty($descr_az) && !empty($date) && !empty($category) && !empty($Status) && !empty($page) && !empty($price_az) && !empty($month_az) && !empty($times_az) && !empty($hour_az)){
  
          //STEP 6 = Faylin /SHEKLIN YUKLENMESI-----------------------------------
          $config['upload_path']          = './uploads/news/';
          $config['allowed_types']        = 'gif|jpg|png|mp3|jpeg';
          $config['remove_spaces']        = true;
          //$config['max_size']             = 100;
          //$config['max_width']            = 1024;
          //$config['max_height']           = 768;

          $this->load->library('upload', $config);
          $this->upload->initialize($config);

        if($this->upload->do_upload('image')){
        $upload_name = $this->upload->data("file_name");
        $upload_ext = $this->upload->data("file_ext");
//--------------------------------------------------------------
    //STEP 3 = NEWS TABLE -DA OLAN SUTUNLARIN ADLARINI GOTURUN VE BERABERLESHDIRIN INPUTLARA 
    //VERDIYIMIZ DEYISHENLERIN ADLARINA
        $data = [
            'n_title_az'       => $title_az,
            'n_title_en'       => $title_en,
            'n_title_ru'       => $title_ru,


            'n_description_az' => $descr_az,
            'n_description_en' => $descr_en,
            'n_description_ru' => $descr_ru,


            'n_price_az'       => $price_az, 
            'n_price_en'       => $price_en, 
            'n_price_ru'       => $price_ru, 
            'n_month_az'       => $month_az,
            'n_month_en'       => $month_en,
            'n_month_ru'       => $month_ru,
            'n_times_az'       => $times_az,
            'n_times_en'       => $times_en,
            'n_times_ru'       => $times_ru,
            'n_hour_az'        => $hour_az,
            'n_hour_en'        => $hour_en,
            'n_hour_ru'        => $hour_ru,
            'n_date'        => $date,
            'n_category'    => $category,
            'n_page'        => $page,
            'n_status'      => $Status,
            'n_file'        => $upload_name,
            'n_file_ext'    => $upload_ext,
            //'n_image'       => ,
            //'n_creator_id'  => ,
            'n_updater_id'  => $_SESSION['admin_id'],
            'n_update_date' => date("Y-m-d H:i:s"),
           ];
           
           
           $data = $this->security->xss_clean($data);

           //STEP 4 = id ilə dəyərləri verilənlər bazasına yeniləyin
           $this->db->where('n_id', $id)->update('news', $data);

    
           //STEP 5 = LIST METODUNA GONDER  
           redirect(base_url('a_news_list'));

        }else{
    $data = [
            'n_title_az'       => $title_az,
            'n_title_en'       => $title_en,
            'n_title_ru'       => $title_ru,


            'n_description_az' => $descr_az,
            'n_description_en' => $descr_en,
            'n_description_ru' => $descr_ru,

            'n_price_az'       => $price_az, 
            'n_price_en'       => $price_en, 
            'n_price_ru'       => $price_ru, 
            'n_month_az'       => $month_az,
            'n_month_en'       => $month_en,
            'n_month_ru'       => $month_ru,
            'n_times_az'       => $times_az,
            'n_times_en'       => $times_en,
            'n_times_ru'       => $times_ru,
            'n_hour_az'        => $hour_az,
            'n_hour_en'        => $hour_en,
            'n_hour_ru'        => $hour_ru,
            'n_date'        => $date,
            'n_category'    => $category,
            'n_page'        => $page,
            'n_status'      => $Status,
            //'n_file'        => $upload_name,
            //'n_file_ext'    => $upload_ext,
            //'n_image'       => ,
            'n_updater_id'  => $_SESSION['admin_id'],
            'n_create_date' => date("Y-m-d H:i:s"),
            ];
       
       //STEP 4 = id ilə dəyərləri verilənlər bazasına yeniləyin

       $data = $this->security->xss_clean($data);

       $this->db->where('n_id', $id)->update('news', $data);

       //STEP 5 = LIST METODUNA GONDER  
       redirect(base_url('a_news_list'));
}

}else{
    redirect($_SERVER['HTTP_REFERER']);
  }
}
////////////////////////////////////////////////////////////////
public function update_allNewsAct($id){
    //STEP 1 = BÜTÜN İNPUTLARIN ADLARINI GÖTÜR
    
    $id = $this->security->xss_clean($id);
    // echo $id;
    // die();
     $title_az    = $_POST['e_title_az'];
     $descr_az    = $_POST['e_description_az'];
  
     $title_en    = $_POST['e_title_en'];
     $descr_en    = $_POST['e_description_en'];
  
     $title_ru    = $_POST['e_title_ru'];
     $descr_ru    = $_POST['e_description_ru'];
  
     $date     = $_POST['e_date'];
     $category = $_POST['e_category'];
     $Status   = $_POST['e_status'];
     $page   = $_POST['e_page'];
  
    //STEP 2 = BÜTÜN İNPUTLARIN ADLARINI YOXLAYIN BOŞLUQ OLMASIN 
  
    if(!empty($title_az) && !empty($descr_az) && !empty($date) && !empty($category) && !empty($Status) && !empty($page)){
    
            //STEP 6 = Faylin /SHEKLIN YUKLENMESI-----------------------------------
            $config['upload_path']          = './uploads/events/';
            $config['allowed_types']        = 'gif|jpg|png|mp3|jpeg';
            $config['remove_spaces']        = true;
            //$config['max_size']             = 100;
            //$config['max_width']            = 1024;
            //$config['max_height']           = 768;
  
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
  
        if($this->upload->do_upload('image')){
            $upload_name = $this->upload->data("file_name");
            $upload_ext = $this->upload->data("file_ext");
                //--------------------------------------------------------------
            //STEP 3 = NEWS TABLE -DA OLAN SUTUNLARIN ADLARINI GOTURUN VE BERABERLESHDIRIN INPUTLARA 
            //VERDIYIMIZ DEYISHENLERIN ADLARINA
            $data = [
              'e_title_az'       => $title_az,
              'e_title_en'       => $title_en,
              'e_title_ru'       => $title_ru,
  
  
              'e_description_az' => $descr_az,
              'e_description_en' => $descr_en,
              'e_description_ru' => $descr_ru,
  
              'e_date'        => $date,
              'e_category'    => $category,
              'e_page'        => $page,
              'e_status'      => $Status,
              'e_file'        => $upload_name,
              'e_file_ext'    => $upload_ext,
              //'n_image'       => ,
              //'n_creator_id'  => ,
              'e_updater_id'  => $_SESSION['admin_id'],
              'e_update_date' => date("Y-m-d H:i:s"),
            ];
  
            $data = $this->security->xss_clean($data);
      
             //STEP 4 = id ilə dəyərləri verilənlər bazasına yeniləyin
            $this->db->where('e_id', $id)->update('news_events', $data);
  
      
             //STEP 5 = LIST METODUNA GONDER  
            redirect(base_url('a_allNews_list'));
  
        }else{
            $data = [
              'e_title_az'       => $title_az,
              'e_title_en'       => $title_en,
              'e_title_ru'       => $title_ru,
  
  
              'e_description_az' => $descr_az,
              'e_description_en' => $descr_en,
              'e_description_ru' => $descr_ru,
  
              'e_date'        => $date,
              'e_category'    => $category,
              'e_page'        => $page,
              'e_status'      => $Status,
              //'n_file'        => $upload_name,
              //'n_file_ext'    => $upload_ext,
              //'n_image'       => ,
              'e_updater_id'  => $_SESSION['admin_id'],
              'e_create_date' => date("Y-m-d H:i:s"),
               ];
         
         //STEP 4 = id ilə dəyərləri verilənlər bazasına yeniləyin
      
         $data = $this->security->xss_clean($data);
  
         $this->db->where('e_id', $id)->update('news_events', $data);
  
         //STEP 5 = LIST METODUNA GONDER  
         redirect(base_url('a_allNews_list'));
        }
    }else{
      redirect($_SERVER['HTTP_REFERER']);
    }
}
////////////////////////////////////////////////////////////////

public function students_update_act($id){
    //STEP 1 = BÜTÜN İNPUTLARIN ADLARINI GÖTÜR
  
    $id = $this->security->xss_clean($id);
   
     $title_az    = $_POST['s_title_az'];
     $descr_az    = $_POST['s_description_az'];
  
     $title_en    = $_POST['s_title_en'];
     $descr_en    = $_POST['s_description_en'];
  
     $title_ru    = $_POST['s_title_ru'];
     $descr_ru    = $_POST['s_description_ru'];
  
     $date     = $_POST['s_date'];
     $category = $_POST['s_category'];
     $Status   = $_POST['s_status'];
   
    
    //STEP 2 = BÜTÜN İNPUTLARIN ADLARINI YOXLAYIN BOŞLUQ OLMASIN 
  
    if(!empty($title_az) && !empty($descr_az) && !empty($date) && !empty($category) && !empty($Status)){
    
            //STEP 6 = Faylin /SHEKLIN YUKLENMESI-----------------------------------
            $config['upload_path']          = './uploads/students/';
            $config['allowed_types']        = 'gif|jpg|png|mp3|jpeg';
            $config['remove_spaces']        = true;
            //$config['max_size']             = 100;
            //$config['max_width']            = 1024;
            //$config['max_height']           = 768;
  
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
  
          if($this->upload->do_upload('image')){
          $upload_name = $this->upload->data("file_name");
          $upload_ext = $this->upload->data("file_ext");
  //--------------------------------------------------------------
      //STEP 3 = NEWS TABLE -DA OLAN SUTUNLARIN ADLARINI GOTURUN VE BERABERLESHDIRIN INPUTLARA 
      //VERDIYIMIZ DEYISHENLERIN ADLARINA
          $data = [
              's_title_az'       => $title_az,
              's_title_en'       => $title_en,
              's_title_ru'       => $title_ru,
  
  
              's_description_az' => $descr_az,
              's_description_en' => $descr_en,
              's_description_ru' => $descr_ru,
  
              's_date'        => $date,
              's_category'    => $category,
              's_status'      => $Status,
              's_file'        => $upload_name,
              's_file_ext'    => $upload_ext,
              //'n_image'       => ,
              //'n_creator_id'  => ,
              's_updater_id'  => $_SESSION['admin_id'],
              's_update_date' => date("Y-m-d H:i:s"),
             ];
  
             $data = $this->security->xss_clean($data);
  
             //STEP 4 = id ilə dəyərləri verilənlər bazasına yeniləyin
             $this->db->where('s_id', $id)->update('students', $data);

             //STEP 5 = LIST METODUNA GONDER  
             redirect(base_url('a_studentsList'));
            //   print_r("<pre>");
            //   print_r($data['single_news'] );
            //     die();
          }else{
            $data = [
              's_title_az'       => $title_az,
              's_title_en'       => $title_en,
              's_title_ru'       => $title_ru,
  
  
              's_description_az' => $descr_az,
              's_description_en' => $descr_en,
              's_description_ru' => $descr_ru,
  
              's_date'        => $date,
              's_category'    => $category,
              's_status'      => $Status,
              //'n_file'        => $upload_name,
              //'n_file_ext'    => $upload_ext,
              //'n_image'       => ,
              's_updater_id'  => $_SESSION['admin_id'],
              's_create_date' => date("Y-m-d H:i:s"),
               ];
         
         //STEP 4 = id ilə dəyərləri verilənlər bazasına yeniləyin
  
         $data = $this->security->xss_clean($data);
        

         $this->db->where('s_id', $id)->update('students', $data);
  
         //STEP 5 = LIST METODUNA GONDER  
            redirect(base_url('a_studentsList'));
        }
    
    }else{
        redirect($_SERVER['HTTP_REFERER']);
    }
  }
  ////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////


public function projects_update_act($id){
    //STEP 1 = BÜTÜN İNPUTLARIN ADLARINI GÖTÜR
  
    $id = $this->security->xss_clean($id);
  
     $title_az    = $_POST['p_title_az'];
     $descr_az    = $_POST['p_description_az'];
  
     $title_en    = $_POST['p_title_en'];
     $descr_en    = $_POST['p_description_en'];
  
     $title_ru    = $_POST['p_title_ru'];
     $descr_ru    = $_POST['p_description_ru'];
  
     $date     = $_POST['p_date'];
     $category = $_POST['p_category'];
     $Status   = $_POST['p_status'];
     
  
    //STEP 2 = BÜTÜN İNPUTLARIN ADLARINI YOXLAYIN BOŞLUQ OLMASIN 
  
    if(!empty($title_az) && !empty($descr_az) && !empty($date) && !empty($category) && !empty($Status)){
    
            //STEP 6 = Faylin /SHEKLIN YUKLENMESI-----------------------------------
            $config['upload_path']          = './uploads/projects/';
            $config['allowed_types']        = 'gif|jpg|png|mp3|jpeg';
            $config['remove_spaces']        = true;
            //$config['max_size']             = 100;
            //$config['max_width']            = 1024;
            //$config['max_height']           = 768;
  
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
  
          if($this->upload->do_upload('image')){
          $upload_name = $this->upload->data("file_name");
          $upload_ext = $this->upload->data("file_ext");
  //--------------------------------------------------------------
      //STEP 3 = NEWS TABLE -DA OLAN SUTUNLARIN ADLARINI GOTURUN VE BERABERLESHDIRIN INPUTLARA 
      //VERDIYIMIZ DEYISHENLERIN ADLARINA
          $data = [
              'p_title_az'       => $title_az,
              'p_title_en'       => $title_en,
              'p_title_ru'       => $title_ru,
  
  
              'p_description_az' => $descr_az,
              'p_description_en' => $descr_en,
              'p_description_ru' => $descr_ru,
  
              'p_date'        => $date,
              'p_category'    => $category,
              'p_status'      => $Status,
              'p_file'        => $upload_name,
              'p_file_ext'    => $upload_ext,
              //'n_image'       => ,
              //'n_creator_id'  => ,
              'p_updater_id'  => $_SESSION['admin_id'],
              'p_update_date' => date("Y-m-d H:i:s"),
             ];
  
             $data = $this->security->xss_clean($data);
  
             //STEP 4 = id ilə dəyərləri verilənlər bazasına yeniləyin
             $this->db->where('p_id', $id)->update('projects', $data);
  
      
             //STEP 5 = LIST METODUNA GONDER  
             redirect(base_url('a_projectsList'));
  
          }else{
            $data = [
              'p_title_az'       => $title_az,
              'p_title_en'       => $title_en,
              'p_title_ru'       => $title_ru,
  
  
              'p_description_az' => $descr_az,
              'p_description_en' => $descr_en,
              'p_description_ru' => $descr_ru,
  
              'p_date'        => $date,
              'p_category'    => $category,
              'p_status'      => $Status,
              //'n_file'        => $upload_name,
              //'n_file_ext'    => $upload_ext,
              //'n_image'       => ,
              'p_updater_id'  => $_SESSION['admin_id'],
              'p_create_date' => date("Y-m-d H:i:s"),
               ];
         
         //STEP 4 = id ilə dəyərləri verilənlər bazasına yeniləyin
  
         $data = $this->security->xss_clean($data);
  
         $this->db->where('p_id', $id)->update('projects', $data);
  
         //STEP 5 = LIST METODUNA GONDER  
         redirect(base_url('a_projectsList'));
  }
  
  }else{
      redirect($_SERVER['HTTP_REFERER']);
    }
  }


public function library_update_act($id){
    //STEP 1 = BÜTÜN İNPUTLARIN ADLARINI GÖTÜR
  
    $id = $this->security->xss_clean($id);
  
     $title_az    = $_POST['l_title_az'];
     $number_az    = $_POST['l_number_az'];
  
     $title_en    = $_POST['l_title_en'];
     $number_en    = $_POST['l_number_en'];
  
     $title_ru    = $_POST['l_title_ru'];
     $number_ru    = $_POST['l_number_ru'];
  
     $date     = $_POST['l_date'];
     $category = $_POST['l_category'];
     $Status   = $_POST['l_status'];
     
  
    //STEP 2 = BÜTÜN İNPUTLARIN ADLARINI YOXLAYIN BOŞLUQ OLMASIN 
  
    if(!empty($title_az) && !empty($number_az) && !empty($date) && !empty($category) && !empty($Status)){
    
            //STEP 6 = Faylin /SHEKLIN YUKLENMESI-----------------------------------
            $config['upload_path']          = './uploads/library/';
            $config['allowed_types']        = 'gif|jpg|png|mp3|jpeg';
            $config['remove_spaces']        = true;
            //$config['max_size']             = 100;
            //$config['max_width']            = 1024;
            //$config['max_height']           = 768;
  
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
  
          if($this->upload->do_upload('image')){
          $upload_name = $this->upload->data("file_name");
          $upload_ext = $this->upload->data("file_ext");
  //--------------------------------------------------------------
      //STEP 3 = NEWS TABLE -DA OLAN SUTUNLARIN ADLARINI GOTURUN VE BERABERLESHDIRIN INPUTLARA 
      //VERDIYIMIZ DEYISHENLERIN ADLARINA
          $data = [
              'l_title_az'       => $title_az,
              'l_title_en'       => $title_en,
              'l_title_ru'       => $title_ru,
  
  
              'l_number_az' => $number_az,
              'l_number_en' => $number_en,
              'l_number_ru' => $number_ru,
  
              'l_date'        => $date,
              'l_category'    => $category,
              'l_status'      => $Status,
              'l_file'        => $upload_name,
              'l_file_ext'    => $upload_ext,
              //'n_image'       => ,
              //'n_creator_id'  => ,
              'l_updater_id'  => $_SESSION['admin_id'],
              'l_update_date' => date("Y-m-d H:i:s"),
             ];
  
             $data = $this->security->xss_clean($data);
  
             //STEP 4 = id ilə dəyərləri verilənlər bazasına yeniləyin
             $this->db->where('l_id', $id)->update('library', $data);
  
      
             //STEP 5 = LIST METODUNA GONDER  
             redirect(base_url('a_libraryList'));
  
          }else{
            $data = [
                'l_title_az'       => $title_az,
                'l_title_en'       => $title_en,
                'l_title_ru'       => $title_ru,
  
  
                'l_number_az' => $number_az,
                'l_number_en' => $number_en,
                'l_number_ru' => $number_ru,
  
              'l_date'        => $date,
              'l_category'    => $category,
              'l_status'      => $Status,
              //'n_file'        => $upload_name,
              //'n_file_ext'    => $upload_ext,
              //'n_image'       => ,
              'l_updater_id'  => $_SESSION['admin_id'],
              'l_create_date' => date("Y-m-d H:i:s"),
               ];
         
         //STEP 4 = id ilə dəyərləri verilənlər bazasına yeniləyin
  
         $data = $this->security->xss_clean($data);
  
         $this->db->where('l_id', $id)->update('library', $data);
  
         //STEP 5 = LIST METODUNA GONDER  
         redirect(base_url('a_libraryList'));
  }
  
  }else{
      redirect($_SERVER['HTTP_REFERER']);
    }
  }

  public function trainers_update_act($id){
    //STEP 1 = BÜTÜN İNPUTLARIN ADLARINI GÖTÜR
  
    $id = $this->security->xss_clean($id);
  
     $name_az    = $_POST['t_name_az'];
     $descr_az   = $_POST['t_description_az'];

     $name_en    = $_POST['t_name_en'];
     $descr_en    = $_POST['t_description_en'];

     $name_ru    = $_POST['t_name_ru'];
     $descr_ru    = $_POST['t_description_ru'];
  
     $date     = $_POST['t_date'];
     $category = $_POST['t_category'];
     $Status   = $_POST['t_status'];
     
  
    //STEP 2 = BÜTÜN İNPUTLARIN ADLARINI YOXLAYIN BOŞLUQ OLMASIN 
  
    if(!empty($name_az)  && !empty($descr_az) && !empty($date) && !empty($category) && !empty($Status)){
    
            //STEP 6 = Faylin /SHEKLIN YUKLENMESI-----------------------------------
            $config['upload_path']          = './uploads/trainers/';
            $config['allowed_types']        = 'gif|jpg|png|mp3|jpeg';
            $config['remove_spaces']        = true;
            //$config['max_size']             = 100;
            //$config['max_width']            = 1024;
            //$config['max_height']           = 768;
  
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
  
          if($this->upload->do_upload('image')){
          $upload_name = $this->upload->data("file_name");
          $upload_ext = $this->upload->data("file_ext");
  //--------------------------------------------------------------
      //STEP 3 = NEWS TABLE -DA OLAN SUTUNLARIN ADLARINI GOTURUN VE BERABERLESHDIRIN INPUTLARA 
      //VERDIYIMIZ DEYISHENLERIN ADLARINA
          $data = [
              't_name_az'        => $name_az,
              't_description_az' => $descr_az,
              
              't_name_en'        => $name_en,
              't_description_en' => $descr_en,

              't_name_ru'        => $name_ru,
              't_description_ru' => $descr_ru,
  
              't_date'        => $date,
              't_category'    => $category,
              't_status'      => $Status,
              't_file'        => $upload_name,
              't_file_ext'    => $upload_ext,
              //'n_image'       => ,
              //'n_creator_id'  => ,
              't_updater_id'  => $_SESSION['admin_id'],
              't_update_date' => date("Y-m-d H:i:s"),
             ];
  
             $data = $this->security->xss_clean($data);
  
             //STEP 4 = id ilə dəyərləri verilənlər bazasına yeniləyin
             $this->db->where('t_id', $id)->update('trainers', $data);
  
      
             //STEP 5 = LIST METODUNA GONDER  
             redirect(base_url('a_trainersList'));
  
          }else{
            $data = [
                't_name_az'        => $name_az,
                't_description_az' => $descr_az,
                
                't_name_en'        => $name_en,
                't_description_en' => $descr_en,
  
                't_name_ru'        => $name_ru,
                't_description_ru' => $descr_ru,
  
              't_date'        => $date,
              't_category'    => $category,
              't_status'      => $Status,
              //'n_file'        => $upload_name,
              //'n_file_ext'    => $upload_ext,
              //'n_image'       => ,
              't_updater_id'  => $_SESSION['admin_id'],
              't_create_date' => date("Y-m-d H:i:s"),
               ];
         
         //STEP 4 = id ilə dəyərləri verilənlər bazasına yeniləyin
  
         $data = $this->security->xss_clean($data);
  
         $this->db->where('t_id', $id)->update('trainers', $data);
  
         //STEP 5 = LIST METODUNA GONDER  
         redirect(base_url('a_trainersList'));
  }
  
  }else{
      redirect($_SERVER['HTTP_REFERER']);
    }
  }
public function slider_update_act($id){
    //STEP 1 = BÜTÜN İNPUTLARIN ADLARINI GÖTÜR
  
    $id = $this->security->xss_clean($id);
  
     $title_az    = $_POST['sr_title_az'];
     $descr_az    = $_POST['sr_description_az'];
  
     $title_en    = $_POST['sr_title_en'];
     $descr_en    = $_POST['sr_description_en'];
  
     $title_ru    = $_POST['sr_title_ru'];
     $descr_ru    = $_POST['sr_description_ru'];
  
     $link   = $_POST['sr_link'];
     //$date     = $_POST['s_date'];
     //$category = $_POST['s_category'];
     $Status   = $_POST['sr_status'];
     
  
    //STEP 2 = BÜTÜN İNPUTLARIN ADLARINI YOXLAYIN BOŞLUQ OLMASIN 
  
    if(!empty($title_az) && !empty($descr_az) && !empty($Status) && !empty($link)){
    
            //STEP 6 = Faylin /SHEKLIN YUKLENMESI-----------------------------------
            $config['upload_path']          = './uploads/slider/';
            $config['allowed_types']        = 'gif|jpg|png|mp3|jpeg';
            $config['remove_spaces']        = true;
            //$config['max_size']             = 100;
            //$config['max_width']            = 1024;
            //$config['max_height']           = 768;
  
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
  
          if($this->upload->do_upload('sr_file')){
          $upload_name = $this->upload->data("file_name");
          $upload_ext = $this->upload->data("file_ext");
  //--------------------------------------------------------------
      //STEP 3 = NEWS TABLE -DA OLAN SUTUNLARIN ADLARINI GOTURUN VE BERABERLESHDIRIN INPUTLARA 
      //VERDIYIMIZ DEYISHENLERIN ADLARINA
          $data = [
              'sr_title_az'       => $title_az,
              'sr_title_en'       => $title_en,
              'sr_title_ru'       => $title_ru,
  
  
              'sr_description_az' => $descr_az,
              'sr_description_en' => $descr_en,
              'sr_description_ru' => $descr_ru,
  
              'sr_link'      => $link,
              //'s_date'        => $date,
              //'s_category'    => $category,
              'sr_status'      => $Status,
              'sr_file'        => $upload_name,
              'sr_file_ext'    => $upload_ext,
              //'n_image'       => ,
              //'n_creator_id'  => ,
              'sr_updater_id'  => $_SESSION['admin_id'],
              'sr_update_date' => date("Y-m-d H:i:s"),
             ];
  
             $data = $this->security->xss_clean($data);
            //  print_r("<pre>");
            //  print_r($data);
            //  die();
             //STEP 4 = id ilə dəyərləri verilənlər bazasına yeniləyin
             $this->db->where('sr_id', $id)->update('slider', $data);
             
      
             //STEP 5 = LIST METODUNA GONDER  
             redirect(base_url('a_sliderList'));
  
          }else{
            $data = [
              'sr_title_az'       => $title_az,
              'sr_title_en'       => $title_en,
              'sr_title_ru'       => $title_ru,
  
  
              'sr_description_az' => $descr_az,
              'sr_description_en' => $descr_en,
              'sr_description_ru' => $descr_ru,
              'sr_link'      => $link,
              //'s_date'        => $date,
              //'s_category'    => $category,
              'sr_status'      => $Status,
              //'n_file'        => $upload_name,
              //'n_file_ext'    => $upload_ext,
              //'n_image'       => ,
              'sr_updater_id'  => $_SESSION['admin_id'],
              'sr_create_date' => date("Y-m-d H:i:s"),
               ];
         
         //STEP 4 = id ilə dəyərləri verilənlər bazasına yeniləyin
  
         $data = $this->security->xss_clean($data);
  
         $this->db->where('sr_id', $id)->update('slider', $data);
  
         //STEP 5 = LIST METODUNA GONDER  
         redirect(base_url('a_sliderList'));
  }
  
  }else{
    // echo "test";
    // die();
      redirect($_SERVER['HTTP_REFERER']);
    }
    
  }

  public function view_news($id){

    $id = $this->security->xss_clean($id);

    $data['single_news'] = $this->db
    ->where('n_id',$id)
    ->join('category', 'category.c_id = news.n_category', 'left')
    ->get('news')->row_array();
    $this->load->view('admin/news/detail',$data);
}

public function contact_update_act($id){
    //STEP 1 = BÜTÜN İNPUTLARIN ADLARINI GÖTÜR


   $c_office_desc_az    = $_POST['c_office_desc_az'];
   $c_office_desc_en    = $_POST['c_office_desc_en'];
   $c_office_desc_ru    = $_POST['c_office_desc_ru'];

   $c_mobile_desc_az    = $_POST['c_mobile_desc_az'];
   $c_mobile_desc_en    = $_POST['c_mobile_desc_en'];
   $c_mobile_desc_ru    = $_POST['c_mobile_desc_ru'];

   $c_mail_desc_az      = $_POST['c_mail_desc_az'];
   $c_mail_desc_en      = $_POST['c_mail_desc_en'];
   $c_mail_desc_ru      = $_POST['c_mail_desc_ru'];

   $c_map               = $_POST['c_map'];


  
  
    //STEP 2 = BÜTÜN İNPUTLARIN ADLARINI YOXLAYIN BOŞLUQ OLMASIN 
  
    if(!empty($c_office_desc_az) && !empty($c_mobile_desc_az) && !empty($c_mail_desc_az) && !empty($c_map)){
    
            
      //STEP 3 = NEWS TABLE -DA OLAN SUTUNLARIN ADLARINI GOTURUN VE BERABERLESHDIRIN INPUTLARA 
      //VERDIYIMIZ DEYISHENLERIN ADLARINA
          $data = [

            'c_office_desc_az'         => $c_office_desc_az,
            'c_office_desc_en'         => $c_office_desc_en,
            'c_office_desc_ru'         => $c_office_desc_ru,

            'c_mobile_desc_az'         => $c_mobile_desc_az,
            'c_mobile_desc_en'         => $c_mobile_desc_en,
            'c_mobile_desc_ru'         => $c_mobile_desc_ru,

            'c_mail_desc_az'           => $c_mail_desc_az,
            'c_mail_desc_en'           => $c_mail_desc_en,
            'c_mail_desc_ru'           => $c_mail_desc_ru,

            'c_map'                    => $c_map,
            

            //'n_file'        => $upload_name,
            //'n_file_ext'    => $upload_ext,
            //'n_status'      => "Deactive",
            //'n_image'       => ,
            'c_creator_id'  => $_SESSION['admin_id'],
            //'n_create_date' => date("Y-m-d H:i:s"),
           ];
             
             
             $data = $this->security->xss_clean($data);
  
             //STEP 4 = id ilə dəyərləri verilənlər bazasına yeniləyin
             $this->db->where('c_id', $id)->update('contact', $data);
  
      
             //STEP 5 = LIST METODUNA GONDER  
             redirect(base_url('a_contactList'));
  
          }else{
            redirect($_SERVER['HTTP_REFERER']);
            }
 
  }


public function allView_news($id){

    $id = $this->security->xss_clean($id);

    $data['single_news'] = $this->db
    ->where('e_id',$id)
    ->join('category', 'category.c_id = news_events.e_category', 'left')
    ->get('news_events')->row_array();
    $this->load->view('admin/allNews/allNewsDetail',$data);
}

public function students_view($id){

    $id = $this->security->xss_clean($id);

    $data['single_news'] = $this->db
    ->where('s_id',$id)
    ->join('category', 'category.c_id = students.s_category', 'left')
    ->get('students')->row_array();
    $this->load->view('admin/students/studentsDetail',$data);
}


public function projects_view($id){

    $id = $this->security->xss_clean($id);

    $data['single_news'] = $this->db
    ->where('p_id',$id)
    ->join('category', 'category.c_id = projects.p_category', 'left')
    ->get('projects')->row_array();
    $this->load->view('admin/projects/projectsDetail',$data);
}

public function library_view($id){

    $id = $this->security->xss_clean($id);

    $data['single_news'] = $this->db
    ->where('l_id',$id)
    ->join('category', 'category.c_id = library.l_category', 'left')
    ->get('library')->row_array();
    $this->load->view('admin/library/libraryDetail',$data);
}
public function trainers_view($id){

    $id = $this->security->xss_clean($id);

    $data['single_news'] = $this->db
    ->where('t_id',$id)
    ->join('category', 'category.c_id = trainers.t_category', 'left')
    ->get('trainers')->row_array();
    $this->load->view('admin/trainers/trainersDetail',$data);
}


public function slider_view($id){

    $id = $this->security->xss_clean($id);

    $data['single_news'] = $this->db
    ->where('sr_id',$id)
    //->join('category', 'category.c_id = students.s_category', 'left')
    ->get('slider')->row_array();
    $this->load->view('admin/slider/sliderDetail',$data);
}

public function contact_view($id){

    $id = $this->security->xss_clean($id);

    $data['single_news'] = $this->db
    ->where('c_id',$id)
   // ->join('category', 'category.c_id = price_courses.p_category', 'left')
    ->get('contact')->row_array();
    $this->load->view('admin/contact/contactDetail',$data);
}

}


//--------------------------------------------------------------

