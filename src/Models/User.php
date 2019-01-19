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
        if(!empty($results)) {
            return [$results, true];
        } else {
            return false;
        }
    }
}
