<?php
  class Ambt extends Controller {
    public function __construct(){
      
    }
    
    public function index(){
      redirect('Index');
    }
    
  public function privacy()
    {
        $data = ['title' => 'Privacy Policy', 'company' => 'AMBT', 'state' => 'CA'];
        $this->view('pages/privacy', $data);
    }

    public function terms(){
        $this->view('pages/terms');
    }

  }