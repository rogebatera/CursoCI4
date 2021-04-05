<?php
namespace App\Database\Seeds;

use CodeIgniter\CodeIgniter;

class Noticias extends \CodeIgniter\Database\Seeder{

    public function run(){
        $data = [
            'titulo' => 'Titulo da Noticias 1',
            'descricao' => 'Realizando teste',
            'autor' => 'Rogério Lucio'
        ];

        $this->db->table('noticias')->insert($data);
    }

}