<?php 

class UserController extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->lang->load('message','az');
    }


public function index(){
    //echo "index methodu";

    $data['slider'] = $this->db
    ->order_by ('sr_id', 'DESC')
    ->where('sr_status', "Active")
    //->where('n_page', "news")
    //->join('category', 'category.c_id = slider.n_category', 'left')
    ->get('slider')->result_array();

    $data['PopularCourses'] = $this->db
    ->limit(3)
    ->order_by ('n_id', 'DESC')
    ->where('n_status', "Active")
    ->where('n_page', "news")
    ->join('category', 'category.c_id = news.n_category', 'left')
    ->get('news')->result_array();

    $data['NewsEvents'] = $this->db
    ->limit(6)
    ->order_by ('e_id', 'DESC')
    ->where('e_status', "Active")
    ->where('e_page', "Events")
    //->join('category', 'category.c_id = news.n_category', 'left')
    ->get('news_events')->result_array();

    $data['trainers'] = $this->db
    ->limit(4)
    ->order_by ('t_id', 'DESC')
    ->where('t_status', "Active")
    //->where('e_page', "Events")
    ->join('category', 'category.c_id = trainers.t_category', 'left')
    ->get('trainers')->result_array();


    $data['students'] = $this->db
    ->limit(4)
    ->order_by ('s_id', 'DESC')
    ->where('s_status', "Active")
    //->where('e_page', "Events")
    //->join('category', 'category.c_id = news.n_category', 'left')
    ->get('students')->result_array();

    $this->load->view('user/index', $data);
} 

public function about(){
    //echo "about methodu";
    $this->load->view('user/about');
}

public function contact(){
    //echo "contact methodu";
    $data['contact'] = $this->db
    ->order_by ('c_id', 'DESC')
    ->get('contact')->row_array();
    $this->load->view('user/contact',$data);

    // print_r("<pre>");
    // print_r($data['contact'] );
    // die();
}



public function events(){
    $data['events'] = $this->db
    ->order_by ('e_id', 'DESC')
    ->where('e_status', "Active")
    //->where('e_page', "news")
    ->join('category', 'category.c_id = news_events.e_category')
    ->get('news_events')->result_array();
    $this->load->view('user/events',$data);

}

public function Students(){
    $data['students'] = $this->db
    ->order_by ('s_id', 'DESC')
    ->where('s_status', "Active")
    //->where('e_page', "news")
    ->join('category', 'category.c_id = students.s_category')
    ->get('students')->result_array();
    $this->load->view('user/students',$data);

}

public function trainers(){
    $data['trainers'] = $this->db
    ->order_by ('t_id', 'DESC')
    ->where('t_status', "Active")
    //->where('e_page', "news")
    ->join('category', 'category.c_id = trainers.t_category')
    ->get('trainers')->result_array();
    $this->load->view('user/trainers',$data);

}


public function Projects(){
    $data['projects'] = $this->db
    ->order_by ('p_id', 'DESC')
    ->where('p_status', "Active")
    ->join('category', 'category.c_id = projects.p_category')
    ->get('projects')->result_array();
    $this->load->view('user/projects',$data);

}


public function library(){
    $data['library'] = $this->db
    ->order_by ('l_id', 'DESC')
    ->where('l_status', "Active")
    ->join('category', 'category.c_id = library.l_category')
    ->get('library')->result_array();
    $this->load->view('user/library',$data);

}

public function courses(){

    $data['courses'] = $this->db
    ->order_by ('n_id', 'DESC')
    ->where('n_status', "Active")
    ->where('n_page', "news")
    ->join('category', 'category.c_id = news.n_category')
    ->get('news')->result_array();
    $this->load->view('user/courses',$data);

}


public function single_news($id){
  
  
   $id = $this->security->xss_clean($id);

    $data['single_data'] = $this->db
    ->where('sr_id',$id)
    // ->join('category', 'category.c_id = slider.sr_category', 'left')
    ->where('sr_status', "Active")
    ->get('slider')->row_array();

    if(!$data['single_data']){
        $data['single_data'] = $this->db
        ->where('n_id',$id)
        ->join('category', 'category.c_id = news.n_category', 'left')
        ->where('n_status', "Active")
        ->get('news')->row_array();
    }

    $data['courses_limit'] = $this->db
        // ->limit(5)
        ->join('category', 'category.c_id = news.n_category', 'left')
        ->where('n_status', "Active")
        ->get('news')->result_array();
    
    $data['category'] = $this->db->get('category')->result_array();
    // print_r("<pre>");
    // print_r($data['single_data'] );
    // die();

   if($data['single_data']){
    $this->load->view('user/single',$data);
   }else{
    redirect($_SERVER['HTTP_REFERER']);
   }

}

public function singleEvent($id){
    //echo $id;
   
    $id = $this->security->xss_clean($id);
 
     $data['single_data'] = $this->db
     ->where('e_id',$id)
     ->join('category', 'category.c_id = news_events.e_category', 'left')
     ->where('e_status', "Active")
     ->get('news_events')->row_array();

     $data['limit_events'] = $this->db
     ->limit(6)
     ->where('e_status', "Active")
     ->get('news_events')->result_array();
     
     
     //$data['category'] = $this->db->get('category')->result_array();
     // print_r("<pre>");
     // print_r($data['category'] );
     // die();
 
    if($data['single_data']){
     $this->load->view('user/singleEvent',$data);
    }else{
     redirect($_SERVER['HTTP_REFERER']);
    }
 
 }

 public function singleStudent($id){
    //echo $id;
   
    $id = $this->security->xss_clean($id);
 
     $data['single_data'] = $this->db
     ->where('s_id',$id)
    // ->join('category', 'category.c_id = .n_category', 'left')
     ->where('s_status', "Active")
     ->get('students')->row_array();

     $data['limit_students'] = $this->db
     ->limit(5)
     ->where('s_status', "Active")
     ->get('students')->result_array();
     
     //$data['category'] = $this->db->get('category')->result_array();
    //  print_r("<pre>");
    //  print_r($data['category'] );
    //  die();
 
    if($data['single_data']){
     $this->load->view('user/singleStudent',$data);
    }else{
     redirect($_SERVER['HTTP_REFERER']);
    }
 
 }


 public function singleTrainer($id){
    //echo $id;
   
    $id = $this->security->xss_clean($id);
 
     $data['single_data'] = $this->db
     ->where('t_id',$id)
    ->join('category', 'category.c_id = trainers.t_category', 'left')
     ->where('t_status', "Active")
     ->get('trainers')->row_array();

     $data['limit_trainers'] = $this->db
     ->limit(4)
     ->where('t_status', "Active")
     ->get('trainers')->result_array();
     
     //$data['category'] = $this->db->get('category')->result_array();
   
 
    if($data['single_data']){
     $this->load->view('user/singleTrainer',$data);
    }else{
     redirect($_SERVER['HTTP_REFERER']);
    }
 
 }
 public function singleProject($id){
    //echo $id;
   
    $id = $this->security->xss_clean($id);
 
     $data['single_data'] = $this->db
     ->where('p_id',$id)
    // ->join('category', 'category.c_id = .n_category', 'left')
     ->where('p_status', "Active")
     ->get('projects')->row_array();

     $data['limit_projects'] = $this->db
     ->limit(5)
     ->where('p_status', "Active")
     ->get('projects')->result_array();
     
     //$data['category'] = $this->db->get('category')->result_array();
    //  print_r("<pre>");
    //  print_r($data['category'] );
    //  die();
 
    if($data['single_data']){
     $this->load->view('user/singleProject',$data);
    }else{
     redirect($_SERVER['HTTP_REFERER']);
    }
 
 }

}