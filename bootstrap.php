<?php



use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once __DIR__ . '/vendor/autoload.php';

/**
 * Genera el gestor de entidades
 * @return Doctrine\ORM\EntityManager
 */

 function getEntityManager()
 {
     //  ? Cargar configuracion de la conexion
     $dbParams = [
        'host' => $_ENV["DOC_HOST"],
        'port' => $_ENV["DOC_PORT"],
        'dbname' => $_ENV["DOC_DATABASE"],
        'username' => $_ENV["DOC_USER"],
        'password' => $_ENV["DOC_PASSWORD"],
        'driver' => $_ENV["DOC_DRIVER"],
        'charset' => $_ENV["DOC_CHARSET"]
    ];
     
     $config = Setup::createAnnotationMetadataConfiguration(
         array($_ENV['ENTITY_DIR']), //? paths to mapped entities
        filter_var($_ENV['DEBUG'], FILTER_VALIDATE_BOOLEAN),  //? developper mode
        ini_get('sys_temp_dir'), //? Proxy dir
        null, //? cache implementation
        false //? use Simple Annotation Reader
     );

     $config -> setAutoGenerateProxyClasses(true);

     if (filter_var($_ENV['DEBUG'], FILTER_VALIDATE_BOOLEAN)) {
         $config->setSQLLogger(new \Doctrine\DBAL\Logging\SQLLogger());
     }

     return EntityManager::create($dbParams, $config);
 }