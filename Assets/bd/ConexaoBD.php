<?php
class ConexaoBD
{
    public static function conectar():PDO
    {        

        $conexao = new PDO("pgsql:host=localhost;dbname=projeto-programacao", "postgres", "postgres");

         return $conexao;
    }
}