<?php

namespace App\Controllers;
use App\Models\NoticiasModel;

class Noticias extends BaseController
{
    private $noticias;

    public function __construct()
    {
        $this->noticias = new NoticiasModel();
    }

	public function index()
	{
        $model = new NoticiasModel();
        $data = [
            'title'     => 'Ultimas Noticias',
            'noticias'  => $model->paginate(5),
            'pager'     => $model->pager,
            'session'   => \Config\Services::session(),
            'teste'     => $model->getNoticiasTeste('teste', 'rogerio')
        ];

        echo view('templates/header', $data);
        echo view('pages/noticias', $data);
        echo view('templates/footer');

	}

    public function item($id = null)
	{
        $data['session'] = \Config\Services::session();
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
        $data['session'] = \Config\Services::session();
        if(!$data['session']->get('logged_in')){
            return redirect('login');
        }

        helper('form');
        $data['title'] = 'Inserir Noticias';

        echo view('templates/header', $data);
        echo view('pages/noticia_gravar');
        echo view('templates/footer');

	}

    public function gravar()
    {          
        $data['session'] = \Config\Services::session();
        if(!$data['session']->get('logged_in')){
            return redirect('login');
        }

        helper('form');
        $model = new NoticiasModel();
        if($this->validate([
            'titulo' => ['label' => 'Titulo', 'rules' => 'required|min_length[3]|max_length[100]'],
            'autor'  => ['label' => 'Autor', 'rules'  => 'required|min_length[3]|max_length[100]'],
            'descricao'  => ['label' => 'Descrição', 'rules' => 'required|min_length[3]']
        ])){
            $id = $this->request->getVar('id');
            $titulo = $this->request->getVar('titulo');
            $autor = $this->request->getVar('autor');
            $descricao = $this->request->getVar('descricao');
            $img = $this->request->getFile('img');

            if(!$img->isValid()){
                $model->save([
                    'id'        => $id,
                    'titulo'    => $titulo,
                    'autor'     => $autor,
                    'descricao' => $descricao,
                ]);
                return redirect('noticias');
                //echo 'Nao encontrou imagem';
            }else{
                $validaIMG = $this->validate([
                    'img'   => [
                        'uploaded[img]',
                        'mime_in[img,image/jpg,image/jpeg,image/gif,image/png]',
                        'max_size[img, 4096]',                  
                    ]
                ]);

                if($validaIMG){
                    $novoNome = $img->getRandomName();
                    $img->move('img/noticias', $novoNome);

                    $model->save([
                        'id'        => $id,
                        'titulo'    => $titulo,
                        'autor'     => $autor,
                        'descricao' => $descricao,
                        'img'       => $novoNome
                    ]);
                    return redirect('noticias');

                }else{
                    $data['title'] = 'Erro ao Gravar a Noticia';
                    echo view('templates/header', $data);
                    echo view('pages/noticia_gravar');
                    echo view('templates/footer');
                }
            }
        
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
            'noticias'  => $model->getNoticias($id),
            'session'   =>  \Config\Services::session()
        ];

        if(!$data['session']->get('logged_in')){
            return redirect('login');
        }
        
        if(empty($data['noticias'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Não é possivel encontrar a noticia com id:'.$id);
        }

        echo view('templates/header', $data);
        echo view('pages/noticia_gravar', $data);
        echo view('templates/footer');

	}

    public function excluir($id = null){

        $data['session'] = \Config\Services::session();
        if(!$data['session']->get('logged_in')){
            return redirect('login');
        }

        $model = new NoticiasModel();
        $model->delete($id);
        return redirect('noticias');
    }

    public function listar_noticias()
    {
        //$teste = $this->noticias->getViewNoticias();
        $data = [
            'title'     => 'Ultimas Noticias',
            'session'   => \Config\Services::session(),
            'noticias'  => $this->noticias->getViewNoticias()->paginate(3),
            'pager' => $this->noticias->getViewNoticias()->pager
        ];
        
        echo view('templates/header', $data);
        echo view('pages/listar_noticias');
        echo view('templates/footer');      
    }

}