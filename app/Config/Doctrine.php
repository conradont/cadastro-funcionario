<?php

namespace Config;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\DBAL\DriverManager;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\ORM\Mapping\Driver\AttributeDriver;

class Doctrine
{
    public static function entityManager(): EntityManager
    {
        $paths = [APPPATH . 'Entities'];
        $isDevMode = true;

        // Autoloader de atributos (PHP 8+) ou anotações
        $config = ORMSetup::createAttributeMetadataConfiguration($paths,$isDevMode);

        $connection = [
    'dbname'   => getenv('database.default.database'),
    'user'     => getenv('database.default.username'),
    'password' => getenv('database.default.password'),
    'host'     => getenv('database.default.hostname'),
    'driver'   => 'pdo_mysql',
];


        return new EntityManager(DriverManager::getConnection($connection, $config), $config);
    }
}