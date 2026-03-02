<?php
// Habilitar CORS
header("Access-Control-Allow-Origin: *");

// Manejar solicitudes preflight
if ($_SERVER["REQUEST_METHOD"] === "OPTIONS") {
	http_response_code(200);
	exit();
}

// Verificar el método de la solicitud
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
	http_response_code(405);
	echo json_encode(["error" => "Método no permitido"]);
	exit();
}

// Obtener el cuerpo de la solicitud
$requestBody = file_get_contents("php://input");
$data = json_decode($requestBody, true);

// Verificar si el token está presente en el cuerpo de la solicitud
if (!isset($data["token"])) {
	http_response_code(400);
	echo json_encode(["error" => "Token no proporcionado"]);
	exit();
}

$token = $data["token"];
$secretKey = $_SERVER["RECAPTCHA_SECRET_KEY"];
$url = "https://www.google.com/recaptcha/api/siteverify";

// Realizar la solicitud a la API de reCAPTCHA
$response = file_get_contents(
	$url . "?secret=" . $secretKey . "&response=" . $token,
);
$responseData = json_decode($response, true);

// Verificar si la solicitud fue exitosa
if (!$responseData) {
	http_response_code(500);
	echo json_encode(["error" => "Error al verificar reCAPTCHA"]);
	exit();
}

// Devolver la respuesta de reCAPTCHA al cliente
echo json_encode($responseData);
