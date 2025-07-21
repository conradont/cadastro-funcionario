<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "funcionarios")]
class Funcionario
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string")]
    private string $nome;

    #[ORM\Column(type: "string")]
    private string $email;

    #[ORM\Column(type: "integer")]
    private int $idade;

    #[ORM\Column(type: "string")]
    private string $cargo;

    #[ORM\Column(type: "float")]
    private float $salario;

    #[ORM\Column(type: "date", name: "data_admissao")]
    private \DateTime $dataAdmissao;

    #[ORM\Column(type: "boolean")]
    private bool $ativo;

    #[ORM\Column(type: "string")]
    private string $municipio;

    #[ORM\Column(type: "string")]
    private string $lotacao;

    // GETTERS

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getIdade(): int
    {
        return $this->idade;
    }

    public function getCargo(): string
    {
        return $this->cargo;
    }

    public function getSalario(): float
    {
        return $this->salario;
    }

    public function getDataAdmissao(): \DateTime
    {
        return $this->dataAdmissao;
    }

    public function isAtivo(): bool
    {
        return $this->ativo;
    }

    public function getMunicipio(): string
    {
        return $this->municipio;
    }

    public function getLotacao(): string
    {
        return $this->lotacao;
    }

    // SETTERS

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setIdade(int $idade): void
    {
        $this->idade = $idade;
    }

    public function setCargo(string $cargo): void
    {
        $this->cargo = $cargo;
    }

    public function setSalario(float $salario): void
    {
        $this->salario = $salario;
    }

    public function setDataAdmissao(\DateTime $dataAdmissao): void
    {
        $this->dataAdmissao = $dataAdmissao;
    }

    public function setAtivo(bool $ativo): void
    {
        $this->ativo = $ativo;
    }

    public function setMunicipio(string $municipio): void
    {
        $this->municipio = $municipio;
    }

    public function setLotacao(string $lotacao): void
    {
        $this->lotacao = $lotacao;
    }
}
