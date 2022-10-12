<?php
    class ModelSystemLog{
        public static function logServerFail($e){
            date_default_timezone_set('America/Sao_Paulo');
            $data = date("Y,m,d,H,i,s");
        
            $ip = $_SERVER['REMOTE_ADDR'];
        
            $file_handle = fopen('App/Logs/LogServerSystem.txt', 'a+');
            fwrite($file_handle, "IP: ".$ip." - DATE: ".$data." - ERROR: ".$e);
            fwrite($file_handle, "\n \n");
            fclose($file_handle);
        }
        public static function logEmailFail($erro){
            date_default_timezone_set('America/Sao_Paulo');
            $data = date("Y,m,d,H,i,s");
        
            $ip = $_SERVER['REMOTE_ADDR'];
        
            $file_handle = fopen('App/Logs/LogEmailSystem.txt', 'a+');
            fwrite($file_handle, "IP: ".$ip." - DATE: ".$data." - ERROR: ".$erro);
            fwrite($file_handle, "\n \n");
            fclose($file_handle);
        }
    }
?>