<?php

require_once '../config/database.php';
require_once 'User.php';

class UserController {
    private $db;
    private $user;
    private $password;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    // Método para manejar la solicitud POST (Crear un usuario)
    public function register() {
        $data = json_decode(file_get_contents("php://input"));

        if (!empty($data->name) && !empty($data->email) && !empty($data->password)) {
            $this->user->name = $data->name;
            $this->user->email = $data->email;
            $this->user->password = $data->password;

            if ($this->user->register()) {
                http_response_code(201);
                echo json_encode(["message" => "Usuario creado exitosamente."]);
            } else {
                http_response_code(503);
                echo json_encode(["message" => "No se pudo crear el usuario."]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Datos incompletos."]);
        }
    }
}
