<?php
namespace App\Models;
use CodeIgniter\Model;

class NoticiasModel extends Model{
    //atributos de config
    protected $table = 'noticias';
    protected $primaryKey = 'id';
    protected $allowedFields = ['titulo', 'autor', 'descricao'];

    public function getNoticias($id = false){
        if($id === false){
            return $this->findAll();
        }else{
            return $this->asArray()->where(['id' => $id])->first();
        }
    }

}