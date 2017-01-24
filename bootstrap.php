<?php
// Doctrine configuration
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(ENTITY_DIR), $isDevMode);

// database configuration parameters
$conn = [
    'driver' => 'pdo_sqlite',
    'path' => DATABASE_FILE,
];

$em = EntityManager::create($conn, $config);