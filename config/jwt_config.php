<?php

class JwtConfig {
    private static $key = "my_secret_key"; // Clave secreta para firmar el token
    private static $issuer = "http://localhost"; // Emisor del token
    private static $audience = "http://localhost"; // Audiencia
    private static $issuedAt = null;
    private static $expirationTime = null;

    public static function getKey() {
        return self::$key;
    }

    public static function getIssuer() {
        return self::$issuer;
    }

    public static function getAudience() {
        return self::$audience;
    }

    public static function getIssuedAt() {
        self::$issuedAt = time();
        return self::$issuedAt;
    }

    public static function getExpirationTime() {
        self::$expirationTime = self::$issuedAt + 3600; // 1 hora de validez
        return self::$expirationTime;
    }
}

