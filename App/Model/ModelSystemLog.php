<?php
    class ModelSystemLog{
        public static function logServerFail($e){
            date_default_timezone_set('America/Sao_Paulo');
            $data = date("Y,m,d,H,i,s");
        
            $ip = $_SERVER['REMOTE_ADDR'];
        
            $file_handle = fopen('../logs/logSystem.txt', 'a+');
            fwrite($file_handle, "IP: ".$ip." - DATE: ".$data." - ERROR: ".$e);
            fwrite($file_handle, "\n");
            fclose($file_handle);
        }
    }
?>