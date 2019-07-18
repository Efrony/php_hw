<?php


namespace app\model;

use app\engine\Db;

abstract class DbModel extends Model
{
    abstract public static function getNameTable();

    public static function getOne($id)
    {
        $tableName = static::getNameTable();

        $sql = "SELECT * FROM $tableName WHERE id = :id";
        return Db::getInstance()->queryOne($sql, ['id' => $id]);
    }

    public static function getAll()
    {
        $tableName = static::getNameTable();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

    public static function insert()
    { }
    public static function update()
    { }
    public static function delete()
    { }
}
