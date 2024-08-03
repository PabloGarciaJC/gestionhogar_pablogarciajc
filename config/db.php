<?php
class Database {

    private static $logger;

    static public function connect(){

        if (self::$logger === null) {
            self::$logger = LoggerWrapper::getInstance();
        }
        self::$logger->info(DB_USER);

        // Conexión a la base de datos usando Docker Compose
        $db = new mysqli('mysql', DB_USER, DB_PASSWORD, 'u498565300_fhbdpjgc');   
       
        // Verificar conexión
        if ($db->connect_error) {
            // self::$logger->info("Error de conexión: " . $db->connect_error);
        } else {
            // self::$logger->info("Conexión exitosa a la base de datos.");
        }

        $db->set_charset("utf8");

        return $db;

        

    }

    
}


