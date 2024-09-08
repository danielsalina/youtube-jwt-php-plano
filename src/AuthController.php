<?php

require_once '../config/database.php';
require_once '../config/jwt_config.php';
require_once '../vendor/autoload.php';
require_once 'User.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthController {
    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    // Método para manejar la autenticación del usuario
    public function login() {
        $data = json_decode(file_get_contents("php://input"));

        if (!empty($data->email) && !empty($data->password)) {
            $this->user->email = $data->email;
            $user = $this->user->findByEmail();

            if ($user && password_verify($data->password, $user['password'])) {
                // Generar el token JWT
                $token = [
                    "iss" => JwtConfig::getIssuer(),
                    "aud" => JwtConfig::getAudience(),
                    "iat" => JwtConfig::getIssuedAt(),
                    "exp" => JwtConfig::getExpirationTime(),
                    "data" => [
                        "id" => $user['id'],
                        "email" => $user['email'],
                    ]
                ];

                $jwt = JWT::encode($token, JwtConfig::getKey(), 'HS256');
                http_response_code(200);
                echo json_encode(["message" => "Inicio de sesión exitoso.", "token" => $jwt]);
            } else {
                http_response_code(401);
                echo json_encode(["message" => "Credenciales inválidas."]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Datos incompletos."]);
        }
    }

    // Método para verificar la validez del token
    public static function validateToken($token) {
        try {
            $decoded = JWT::decode($token, new Key(JwtConfig::getKey(), 'HS256'));
            return $decoded;
        } catch (Exception $e) {
            http_response_code(401);
            echo json_encode(["message" => "Acceso no autorizado.", "error" => $e->getMessage()]);
            exit();
        }
    }
}
