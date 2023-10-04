<?php

namespace CleanArquiteture\Infrastructure\Database;

use PDOException;

class DataBaseConfigLoader
{
    public static function loadConfig()
    {
        $config = require '../clean-arquiteture/public/config/config.php';
        putenv("DB_HOST={$config['db_host']}");
        putenv("DB_USERNAME={$config['db_username']}");
        putenv("DB_PASSWORD={$config['db_password']}");
        putenv("DB_NAME={$config['db_name']}");

        try {
            $connection = new DataBaseConnection(
                $config['db_host'],
                $config['db_username'],
                $config['db_password'],
                $config['db_name']
            );

            echo "connectado no banco de dados" . PHP_EOL;
            return $connection;
        } catch (PDOException $e) {
            throw new PDOException("Erro na conexão com o banco de dados: " . $e->getMessage());
        }
    }
}