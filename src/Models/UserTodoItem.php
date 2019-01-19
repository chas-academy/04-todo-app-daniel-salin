<?php

namespace Todo;

class UserTodoItem extends Model
{
    const TABLENAME = 'user_todos'; // This is used by the abstract model, don't touch

    public static function createTodo($title, $userId)
    {
        $query = "INSERT INTO " . static::TABLENAME . " (title, created, user_id) VALUES ('$title', now(), '$userId');";
        self::$db->query($query);
        $result = self::$db->execute();
        return $result;
    }
        
    public static function updateTodo($todoId, $title, $isComplete = null)
    {
        $query = "UPDATE " . static::TABLENAME . " title SET title = '$title', completed = '$isComplete' WHERE id ='$todoId';";
        self::$db->query($query);
        $result = self::$db->execute();
        return $result;
    }

    public static function deleteTodo($todoId)
    {
        $query = "DELETE FROM " . static::TABLENAME . " WHERE id ='$todoId';";
        self::$db->query($query);
        $result = self::$db->execute();
        return $result;
    }

    public static function filterComplete()
    {
        try {
            session_start();
            $userId = $_SESSION['userId'];
            $query = "SELECT * FROM " . static::TABLENAME . " WHERE user_id ='$userId' AND completed = 'true' ORDER BY created DESC";
            self::$db->query($query);
            $results = self::$db->resultset();

            if (!empty($results)) {
                return $results;
            } else {
                return [];
            }
        } catch (PDOException $err) {
            return $err->getMessage();
        }
    }
    
    public static function filterIncomplete()
    {
        try {
            session_start();
            $userId = $_SESSION['userId'];
            $query = "SELECT * FROM " . static::TABLENAME . " WHERE user_id = '$userId' AND completed = 'false' ORDER BY created DESC";
            self::$db->query($query);
            $results = self::$db->resultset();

            if (!empty($results)) {
                return $results;
            } else {
                return [];
            }
        } catch (PDOException $err) {
            return $err->getMessage();
        }
        
    }
    
    public static function toggleTodos($completed, $userId)
    {
        $query = "UPDATE " . static::TABLENAME . " SET completed = '$completed' WHERE user_id = '$userId';";
        self::$db->query($query);
        $result = self::$db->execute();
        return $result;
    }

    public static function clearCompleted($userId)
    {
        $query = "DELETE FROM " . static::TABLENAME . " WHERE user_id = '$userId' AND completed ='true';";
        self::$db->query($query);
        $result = self::$db->execute();
        return $result;
    }
}
