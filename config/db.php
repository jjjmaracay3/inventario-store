<?php

return [
    'class' => 'yii\db\Connection',
    //'dsn' => 'mysql:host=localhost;dbname=dbiventario',
    'dsn' => 'pgsql:host=localhost;port=5432;dbname=dbinventario',
    'username' => 'postgres',
    'password' => '123456',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
