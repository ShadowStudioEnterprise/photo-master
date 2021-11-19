<?php 
require_once __DIR__ . '/../core/App.php';
class Connection
{
    
    public static function make(){
        try {
            $config = App::get('config')['database'];

            $connection = new PDO($config['connection']. ';dbname='.$config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            ) ;
        } catch (PDOException $PDOexception) {
            die($PDOexception->getMessage());
        }
        return $connection;
    }
}