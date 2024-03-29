<?php


namespace app\model;

use app\engine\Db;

abstract class DbModel extends Model
{
    abstract public static function getNameTable();

    public static function getOne($id)
    {
        $tableName = static::getNameTable();

        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryObject($sql, ['id' => $id], static::class);
    }


    public static function getAll()
    {
        $tableName = static::getNameTable();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

    public static function getColumnWhere($column, $condition, $point) {
        $tableName = static::getNameTable();
        $sql = "SELECT {$column} FROM {$tableName} WHERE {$condition} = :point";
        return Db::getInstance()->queryColumn($sql, ['point' => $point]);
    }

    public static function getLimit(int $from, int $to)
    {
        $tableName = static::getNameTable();
        $sql = "SELECT * FROM {$tableName} ORDER BY `rating` DESC LIMIT {$from}, {$to}";
        return Db::getInstance()->queryAll($sql);
    }


    public static function getWhere($condition, $point)
    {
        $tableName = static::getNameTable();
        $sql = "SELECT * FROM {$tableName}  WHERE {$condition} = :point";
        $data = Db::getInstance()->queryAll($sql, ['point' => $point]);
        if (count($data) == 1) {
            return $data[0];
        }
        return $data;
    }

    public static function getArrayWhere($condition, $point)
    {
        $tableName = static::getNameTable();
        $sql = "SELECT * FROM {$tableName}  WHERE {$condition} = :point";
        $data = Db::getInstance()->queryAll($sql, ['point' => $point]);
        return $data;
    }

    public static function getObjectWhere($condition, $point)
    {
        $tableName = static::getNameTable();
        $sql = "SELECT * FROM {$tableName}  WHERE {$condition} = :point";
        $data = Db::getInstance()->queryObject($sql, ['point'=> $point], static::class);
        return $data;
    }


    public function insert()
    {
        $params = [];
        $columns = [];

        foreach ($this as $key=>$value) {
            if ($key == 'id') continue;
            $params[":{$key}"] = $value;
            $columns[] = "`$key`";
        }
        $columns = implode(', ', $columns);
        $values = implode(', ', array_keys($params));
        $tableName = static::getNameTable();

        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$values})";
        Db::getInstance()->executeQuery($sql, $params);

        $this->id = Db::getInstance()->lastInsertId();
    }

    public function update()
    {   
        $string = '';
        $params = [];

        foreach ($this as $key=>$value) {
            if ($key == 'id') continue;
            $string .= "`{$key}` = :{$key}, ";
            $params[$key] = $value;
        }
        $string = substr($string, 0, -2);
        $tableName = static::getNameTable();
        $sql = "UPDATE {$tableName} SET {$string} WHERE (`id` = :id);";
        $params['id'] = $this->id;

        return Db::getInstance()->executeQuery($sql, $params);
    }

    public function delete($id)
    {
        $tableName = static::getNameTable();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->executeQuery($sql, ['id' => $id]);
    }
}
