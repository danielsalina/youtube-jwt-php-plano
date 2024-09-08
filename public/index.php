<?php

require_once '../src/ProductController.php';
require_once '../src/AuthController.php';
require_once '../src/UserController.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$method = $_SERVER['REQUEST_METHOD'];
$headers = getallheaders();
$authHeader = isset($headers["Authorization"]) ? $headers["Authorization"] : "";

// Define las rutas públicas (que no requieren autenticación)
$publicRoutes = ['register'];

// Si la ruta es pública, no se requiere token
$page = isset($_GET["user"]) ? $_GET["user"] : "/";

// Solo validar el token si la ruta no es pública
if (!in_array($page, $publicRoutes)) {
    if (preg_match("/Bearer\s(\S+)/", $authHeader, $matches)) {
        $token = $matches[1];

        try {
            AuthController::validateToken($token);
        } catch (\Throwable $th) {
            http_response_code(401);
            echo json_encode(["message" => "Acceso no autorizado.", "error" => $th->getMessage()]);
            exit();
        }
    } else {
        http_response_code(401);
        echo json_encode(["message" => "Token no autorizado."]);
        exit();
    }
}

$productController = new ProductController();
$userController = new UserController();

switch ($method) {
    case 'POST':
        if ($page == "register") {
            $userController->register();  // Ruta pública para registrar usuario
        } elseif ($page == "create-product") {
            $productController->create();
        } else {
            http_response_code(404);
            echo json_encode(["message" => "Ruta no encontrada."]);
        }
        break;

    case 'GET':
        if ($page == "/") {
            $productController->read();
        } else {
            http_response_code(404);
            echo json_encode(["message" => "Ruta no encontrada."]);
        }
        break;

    case 'PUT':
        $productController->update();
        break;

    case 'DELETE':
        $productController->delete();
        break;

    default:
        http_response_code(405);
        echo json_encode(["message" => "Método no permitido."]);
        break;
}
