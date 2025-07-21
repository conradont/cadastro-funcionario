<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Doctrine\ORM\Tools\SchemaTool;
use Config\Doctrine;

class DoctrineSchemaCreate extends BaseCommand
{
    protected $group       = 'Doctrine';
    protected $name        = 'doctrine:schema:create';
    protected $description = 'Cria o schema do banco de dados usando Doctrine ORM';

    public function run(array $params)
    {
        $em = Doctrine::entityManager();
        $metadata = $em->getMetadataFactory()->getAllMetadata();

        if (empty($metadata)) {
            CLI::write('❌ Nenhuma entidade encontrada para gerar schema.', 'red');
            return;
        }

        $tool = new SchemaTool($em);

        try {
            $tool->createSchema($metadata);
            CLI::write('✅ Tabelas criadas com sucesso!', 'green');
        } catch (\Exception $e) {
            CLI::error('Erro ao criar schema: ' . $e->getMessage());
        }
    }
}
