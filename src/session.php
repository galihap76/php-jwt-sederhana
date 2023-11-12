<?php

use Firebase\JWT\Key;

class Session
{

    public function __construct(public string $username, public string $role)
    {
    }
}

class SessionManager
{

    public static string $SECRET_KEY = "bla bla bla";

    public static function login(string $username, string $password): bool
    {
        if ($username == "galih" && $password == "76") {

            $payload = [
                "username" => $username,
                "role" => "customer"
            ];

            $jwt = \Firebase\JWT\JWT::encode($payload, SessionManager::$SECRET_KEY, 'HS256');
            setcookie("X-TESTING-SESSION", $jwt);

            return true;
        } else {
            return false;
        }
    }

    public static function getCurrentSession(): Session
    {
        if ($_COOKIE['X-TESTING-SESSION']) {
            $jwt = $_COOKIE['X-TESTING-SESSION'];
            try {
                $payload = \Firebase\JWT\JWT::decode($jwt, new Key(SessionManager::$SECRET_KEY, 'HS256'));
                // $payload = \Firebase\JWT\JWT::decode($jwt, SessionManager::$SECRET_KEY, ['HS256']);
                return new Session(username: $payload->username, role: $payload->role);
            } catch (Exception $exception) {
                throw new Exception("User is not login");
            }
        } else {
            throw new Exception("User is not login");
        }
    }
}
