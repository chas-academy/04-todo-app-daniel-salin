<?php

namespace Todo;

class TodoItem extends Model
{
    const TABLENAME = 'todos'; // This is used by the abstract model, don't touch

    public static function createTodo($title)
    {
        $query = "INSERT INTO " . static::TABLENAME . " (title, created) VALUES ('$title', now());";
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
            $query = "SELECT * FROM " . static::TABLENAME . " WHERE completed = 'true' ORDER BY created DESC";
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
            $query = "SELECT * FROM " . static::TABLENAME . " WHERE completed = 'false' ORDER BY created DESC";
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
    
    public static function toggleTodos($completed)
    {
        $query = "UPDATE " . static::TABLENAME . " SET completed = '$completed';";
        self::$db->query($query);
        $result = self::$db->execute();
        return $result;
    }

    public static function clearCompletedTodos()
    {
        $query = "DELETE FROM " . static::TABLENAME . " WHERE completed ='true';";
        self::$db->query($query);
        $result = self::$db->execute();
        return $result;
    }
}
