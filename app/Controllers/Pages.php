<?php
namespace App\Controllers;
use CodeIgniter\Controller;

Class Pages extends Controller{

    public function index(){
        return view('welcome_message1');
    }

    public function mostrar($page = 'home'){
        if(!is_file(APPPATH.'/Views/pages/'.$page.'.php')){
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        
        echo view('templates/header');
        echo view('pages/'.$page);
        echo view('templates/footer');
    }

}
