<?php

namespace Todo;

class User extends Model
{
    const TABLENAME = 'users'; // This is used by the abstract model, don't touch

    public static function login($username, $password)
    {
        $query = "SELECT * FROM " . static::TABLENAME . " WHERE username = '$username' AND password = '$password';";
        self::$db->query($query);
        $results = self::$db->resultset();
        if (!empty($results)) {
            return [$results, true];
        } else {
            return false;
        }
    }
    
    public static function register($username, $password)
    {
        $query = "INSERT INTO " . static::TABLENAME . " (username, password) VALUES ('$username', '$password');";
        self::$db->query($query);
        $result = self::$db->execute();
        if($result) {
            $queryId = "SELECT * FROM " . static::TABLENAME . " WHERE username = '$username' AND password = '$password';";
            self::$db->query($queryId);
            $results = self::$db->resultset();
            return $results[0];
        }
        return null;
    }
}
