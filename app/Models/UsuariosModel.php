<?php
namespace App\Models;
use CodeIgniter\Model;

class UsuariosModel extends Model{
    //atributos de config
    protected $table = 'usuarios';
    protected $allowedFields = ['user', 'senha'];

    public function getUsuarios($user, $senha){

        return $this->asArray()->where(['user' => $user, 'senha' => md5($senha)])->first();
        
    }
    
}