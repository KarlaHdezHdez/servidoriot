<?php
    class conexionbd{
        const user    = 'root';
        const pass    =  '';
        const bd      = 'servidoriot';
        const servidor= 'localhost';
        
        public function conectarBD(){
            $conectar = new mysqli(self::servidor,self::user,self::pass,self::bd);
            if($conectar->connect_errno){
                die('Error de conexión:'.$conectar->connect_errno);
            }
            return $conectar;
        }
    }

?>