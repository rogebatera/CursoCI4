<?php
namespace App\Controllers;

use App\Models\UsuariosModel;
use CodeIgniter\Controller;

Class Usuarios extends BaseController{

    public function index(){
        $data['session'] = \Config\Services::session();
        $data['title'] = 'Login';
        
        echo view('templates/header', $data);
        echo view('login_page');
        echo view('templates/footer');
        
    }

    public function criar(){
        $data['session'] = \Config\Services::session();

        if(!$data['session']->get('logged_in')){
            return redirect('login');
        }

        //helper('form');
        $data['title'] = 'Criar Usuário';

        echo view('templates/header', $data);
        echo view('criar_usuario');
        echo view('templates/footer');

    }

    public function gravar(){
        $data['session'] = \Config\Services::session();

        if(!$data['session']->get('logged_in')){
            return redirect('login');
        }

        $model = new UsuariosModel();

        $user = $this->request->getVar('user');
        $senha = $this->request->getVar('senha');

        $senhaCripto = md5($senha);

        $model->save([
            'user' => $user,
            'senha' => $senhaCripto
        ]);

        return redirect('login');

    }

    public function login(){
        $model = new UsuariosModel();

        $user = $this->request->getVar('user');
        $senha = $this->request->getVar('senha');

        $data['usuarios'] = $model->getUsuarios($user, $senha);
        $data['session']  = \Config\Services::session();

        if(empty($data['usuarios'])){
            return redirect('login');
        }else{
            $sessionData = [
                'user'      => $user,
                'logged_in' => TRUE
            ];
            $data['session']->set($sessionData);
            return redirect('noticias');
        }
        
    }

    public function logout(){
        $data['session'] = \Config\Services::session();
        $data['session']->destroy();
        return redirect('login');
    }

}
