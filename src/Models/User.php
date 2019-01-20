<?php

namespace Todo;

class User extends Model
{
    const TABLENAME = 'users'; // This is used by the abstract model, don't touch

    /**
     * Login user method
     * Check username and verify hashed pass. Return user information.
     */
    public static function login($username, $password)
    {
        $query = "SELECT * FROM " . static::TABLENAME . " WHERE username = '$username';";
        self::$db->query($query);
        $results = self::$db->resultset();
        if (empty($results)) {
            return null;
        }
        $hashedPass = $results[0]['password'];
        if (password_verify($password, $hashedPass)) {
            return $results[0];
        } else {
            return null;
        }
    }
    
    /**
     * Register user method
     * Check username, hash password and insert into database.
     */
    public static function register($username, $password)
    {
        $query = "SELECT * FROM " . static::TABLENAME . " WHERE username = '$username';";
        self::$db->query($query);
        $results = self::$db->resultset();
        if (empty($results)) {
            $hashedPass = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO " . static::TABLENAME . " (username, password) VALUES ('$username', '$hashedPass');";
            self::$db->query($query);
            $result = self::$db->execute();
            if ($result) {
                $query = "SELECT * FROM " . static::TABLENAME . " WHERE username = '$username' AND password = '$hashedPass';";
                self::$db->query($query);
                $results = self::$db->resultset();
                return $results[0];
            }
        } else {
            return null;
        }
    }
}
