<?php
    class ModelInsereImagem{
        public static function repassaCaminho(){
            if(isset($_FILES['arquivo'])) {
                $arquivo = $_FILES['arquivo'];
        
                if($arquivo['error'])
                    header('Location: /painel');
                if($arquivo['size'] > 5242880)
                    header('Location: /painel');
        
                $pasta = "App/View/Images/UserPictures/";
                $nomeDoArquivo = $arquivo['name'];
                $novoNomeDoArquivo = uniqid();
                $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
        
                if($extensao != "jpg" && $extensao != 'png')
                    header('Location: /painel');
                
                $caminho = $pasta . $novoNomeDoArquivo . "." . $extensao;
                $deuCerto = move_uploaded_file($arquivo["tmp_name"], $caminho);
                return $caminho;
            }
        }
    }
?>