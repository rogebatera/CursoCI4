<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\NoticiasModel;

class Noticias extends Controller
{
	public function index()
	{
        $model = new NoticiasModel();

        $data = [
            'title' => 'Ultimas Noticias',
            'noticias' => $model->getNoticias()
        ];

        echo view('templates/header', $data);
        echo view('pages/noticias', $data);
        echo view('templates/footer');

	}

    public function item($id = null)
	{
        $model = new NoticiasModel();

        $data['noticias'] = $model->getNoticias($id);

        if(empty($data['noticias'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Não é possivel encontrar a noticia com id:'.$id);
        }

        $data['title'] = $data['noticias']['titulo'];

        echo view('templates/header', $data);
        echo view('pages/noticia', $data);
        echo view('templates/footer');

	}

    public function inserir()
	{
        helper('form');
        $data['title'] = 'Inserir Noticias';

        echo view('templates/header', $data);
        echo view('pages/noticia_gravar');
        echo view('templates/footer');

	}

    public function gravar()
    {
        helper('form');
        $model = new NoticiasModel();
        if($this->validate([
            'titulo' => ['label' => 'Titulo', 'rules' => 'required|min_length[3]|max_length[100]'],
            'autor'  => ['label' => 'Autor', 'rules'  => 'required|min_length[3]|max_length[100]'],
            'descricao'  => ['label' => 'Descrição', 'rules' => 'required|min_length[3]']
        ])){

            $model->save([
                'id'        => $this->request->getVar('id'),
                'titulo'    => $this->request->getVar('titulo'),
                'autor'     => $this->request->getVar('autor'),
                'descricao' => $this->request->getVar('descricao'),
            ]);
            return redirect('noticias');
        
        }else{
            $data['title'] = 'Erro ao Gravar a Noticia';
            echo view('templates/header', $data);
            echo view('pages/noticia_gravar');
            echo view('templates/footer');
        }
    }

    public function editar($id = null)
	{   

        $model = new NoticiasModel();

        $data = [
            'title'     => 'Editar Noticia',
            'noticias'  => $model->getNoticias($id)
        ];

        if(empty($data['noticias'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Não é possivel encontrar a noticia com id:'.$id);
        }

        echo view('templates/header', $data);
        echo view('pages/noticia_gravar', $data);
        echo view('templates/footer');

	}

    public function excluir($id = null){
        $model = new NoticiasModel();
        $model->delete($id);
        return redirect('noticias');
    }

}