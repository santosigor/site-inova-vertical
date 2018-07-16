<?php

class Banco
{
    private static $dbNome = 'inovavertical_bd';
    private static $dbHost = 'localhost';
    private static $dbUsuario = 'root';
    private static $dbSenha = 'cfb20b6cf914c34cedf83dc81020f9acdc7ba88c2';
    
    private static $cont = null;
    
    public function __construct() 
    {
        die('A função Init nao é permitido!');
    }
    
    public static function conectar()
    {
        if(null == self::$cont)
        {
            try
            {
                self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbNome, self::$dbUsuario, self::$dbSenha); 
            }
            catch(PDOException $exception)
            {
                die($exception->getMessage());
            }
        }
        return self::$cont;
    }
    
    public static function desconectar()
    {
        self::$cont = null;
    }
}

?>
