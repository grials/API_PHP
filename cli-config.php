<?php //? cli-config.php
require('./vendor/autoload.php');
$dot_env = Dotenv\Dotenv::createImmutable('./');
$dot_env->load();
$dot_env->required(['DOC_HOST', 'DOC_PORT', 'DOC_USER', 'DOC_PASSWORD', 'DOC_DRIVER']);

use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once __DIR__ . '/bootstrap.php';

$entityManager = getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);