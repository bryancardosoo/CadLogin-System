<?php

class UserController{

    public function register(){
      //  verifica se a requisição HTTP é do tipo POST(se o formulário foi enviado)
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Coleta os dados enviados pelo formulário e organiza em um ARRAY
            $data = [
                'nome' => $_POST['nome'],
                'email' => $_POST['email'],
                'senha' => password_hash ($_POST['senha'], PASSWORD_DEFAULT), // Criptografa a senha
                'perfil' => $_POST['perfil']
            ];
            // Chama o metodo create do model User para criar o novo usuário no BD
            User::create($data);
            
            header('location: index.php');
        } else{
            include 'views/register.php';
        }

    }
}

?>