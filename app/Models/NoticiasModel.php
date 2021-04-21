<?php
namespace App\Models;
use CodeIgniter\Model;

class NoticiasModel extends Model{
    //atributos de config
    protected $table = 'noticias';
    protected $primaryKey = 'id';
    protected $allowedFields = ['titulo', 'autor', 'descricao', 'img'];
    
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    public function getNoticias($id = false){
        if($id === false){
            return $this->findAll();
        }else{
            return $this->asArray()->where(['id' => $id])->first();
        }
    }

    public function getNoticiasTeste($titulo = null, $autor = null){
        $this->orGroupStart();
            $this->orWhere('titulo', $titulo);
            $this->orWhere('autor', $autor);
        $this->groupEnd();
        return $this->asArray()->findAll();        
    }

    /*public function getViewNoticias(){
        $db = \Config\Database::connect();
        $builder = $db->table('View_noticia');
        $query = $builder->get();
        $query->getResultArray();
        return $this;
    }*/

    public function getViewNoticias(){
        $this->table = 'View_noticia';
        return $this;
    }
    
}