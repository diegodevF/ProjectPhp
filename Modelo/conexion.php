<?php
error_reporting(E_ALL);
ini_set("log_errors", 1);
date_default_timezone_set('America/Bogota');

class Conexion extends PDO
{
    private $tipoBase = 'mysql';
    private $host = 'localhost';
    private $nombreBase = 'notas';
    private $usuario = 'root';
    private $contrasena = '';

    public function __construct()
    {
        try {
            parent::__construct($this->tipoBase . ':host=' . $this->host . ';dbname=' . $this->nombreBase, $this->usuario, $this->contrasena, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        } catch (PDOException $e) {
            echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
            exit;
        }
    }
}