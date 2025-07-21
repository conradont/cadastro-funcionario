<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\Funcionario;
use Config\Doctrine;

class FuncionarioController extends BaseController
{
    private $em;

    public function __construct()
    {
        $this->em = Doctrine::entityManager();
    }

    public function index()
    {
        $request = $this->request;
        $filters = [
            'nome' => $request->getGet('nome'),
            'email' => $request->getGet('email'),
            'cargo' => $request->getGet('cargo'),
            'idade_min' => $request->getGet('idade_min'),
            'idade_max' => $request->getGet('idade_max'),
            'salario_min' => $request->getGet('salario_min'),
            'salario_max' => $request->getGet('salario_max'),
            'data_inicio' => $request->getGet('data_inicio'),
            'data_fim' => $request->getGet('data_fim'),
            'ativo' => $request->getGet('ativo'),
            'municipio' => $request->getGet('municipio'),
            'lotacao' => $request->getGet('lotacao'),
        ];

        $qb = $this->em->createQueryBuilder();
        $qb->select('f')
           ->from(Funcionario::class, 'f');

        if (!empty($filters['nome'])) {
            $qb->andWhere('f.nome LIKE :nome')->setParameter('nome', '%' . $filters['nome'] . '%');
        }

        if (!empty($filters['email'])) {
            $qb->andWhere('f.email LIKE :email')->setParameter('email', '%' . $filters['email'] . '%');
        }

        if (!empty($filters['cargo'])) {
            $qb->andWhere('f.cargo LIKE :cargo')->setParameter('cargo', '%' . $filters['cargo'] . '%');
        }

        if (!empty($filters['idade_min'])) {
            $qb->andWhere('f.idade >= :idade_min')->setParameter('idade_min', (int)$filters['idade_min']);
        }

        if (!empty($filters['idade_max'])) {
            $qb->andWhere('f.idade <= :idade_max')->setParameter('idade_max', (int)$filters['idade_max']);
        }

        if (!empty($filters['salario_min'])) {
            $qb->andWhere('f.salario >= :salario_min')->setParameter('salario_min', (float)$filters['salario_min']);
        }

        if (!empty($filters['salario_max'])) {
            $qb->andWhere('f.salario <= :salario_max')->setParameter('salario_max', (float)$filters['salario_max']);
        }

        if (!empty($filters['data_inicio'])) {
            $qb->andWhere('f.dataAdmissao >= :data_inicio')->setParameter('data_inicio', $filters['data_inicio']);
        }

        if (!empty($filters['data_fim'])) {
            $qb->andWhere('f.dataAdmissao <= :data_fim')->setParameter('data_fim', $filters['data_fim']);
        }

        if ($filters['ativo'] !== null && $filters['ativo'] !== '') {
            $qb->andWhere('f.ativo = :ativo')->setParameter('ativo', (bool)$filters['ativo']);
        }

        if (!empty($filters['municipio'])) {
            $qb->andWhere('f.municipio LIKE :municipio')->setParameter('municipio', '%' . $filters['municipio'] . '%');
        }

        if (!empty($filters['lotacao'])) {
            $qb->andWhere('f.lotacao LIKE :lotacao')->setParameter('lotacao', '%' . $filters['lotacao'] . '%');
        }

        $data['funcionarios'] = $qb->getQuery()->getResult();

        return view('funcionarios/index', $data);
    }

    public function create()
    {
        return view('funcionarios/create');
    }

    public function store()
    {
        $f = new Funcionario();
        $f->setNome($this->request->getPost('nome'));
        $f->setEmail($this->request->getPost('email'));
        $f->setIdade((int)$this->request->getPost('idade'));
        $f->setCargo($this->request->getPost('cargo'));
        $f->setSalario((float)$this->request->getPost('salario'));
        $f->setDataAdmissao(new \DateTime($this->request->getPost('data_admissao')));
        $f->setAtivo($this->request->getPost('ativo') === '1');
        $f->setMunicipio($this->request->getPost('municipio'));
        $f->setLotacao($this->request->getPost('lotacao'));

        $this->em->persist($f);
        $this->em->flush();

        return redirect()->to('/funcionarios');
    }

    public function edit($id)
    {
        $funcionario = $this->em->find(Funcionario::class, $id);

        if (!$funcionario) {
            return redirect()->to('/funcionarios')->with('error', 'Funcionário não encontrado');
        }

        return view('funcionarios/edit', ['funcionario' => $funcionario]);
    }

    public function update($id)
    {
        $f = $this->em->find(Funcionario::class, $id);

        if (!$f) {
            return redirect()->to('/funcionarios')->with('error', 'Funcionário não encontrado');
        }

        $f->setNome($this->request->getPost('nome'));
        $f->setEmail($this->request->getPost('email'));
        $f->setIdade((int)$this->request->getPost('idade'));
        $f->setCargo($this->request->getPost('cargo'));
        $f->setSalario((float)$this->request->getPost('salario'));
        $f->setDataAdmissao(new \DateTime($this->request->getPost('data_admissao')));
        $f->setAtivo($this->request->getPost('ativo') === '1');
        $f->setMunicipio($this->request->getPost('municipio'));
        $f->setLotacao($this->request->getPost('lotacao'));

        $this->em->flush();

        return redirect()->to('/funcionarios')->with('success', 'Funcionário atualizado com sucesso');
    }

    public function delete($id)
    {
        $func = $this->em->find(Funcionario::class, $id);
        if ($func) {
            $this->em->remove($func);
            $this->em->flush();
        }

        return redirect()->to('/funcionarios');
    }
}
