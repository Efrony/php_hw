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
        return Db::getInstance()->queryAll($sql, ['point' => $point]);
    }


    public static function insert()
    {
        $params = [];
        $columns = [];

        foreach ($this as $key=>$value) {
            if ($key == 'id') continue;
            $params[":{$key}"] = $value;
            $columns[] = "`$key`";
        }
        $columns = implode(',', $columns);
        $values = implode(',', array_keys($params));
        $tableName = static::getNameTable();

        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$values})";
        Db::getInstance()->execute($sql, $params);

        $this->id = Db::getInstance()->lastInsertId();
    }

    public static function update()
    { }

    public static function delete()
    {
        $tableName = static::getNameTable();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->execute($sql, ['id' => $this->id]);
    }
}
