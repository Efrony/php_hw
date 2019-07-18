<?php


namespace app\interfaces;


interface IModel
{
    public static function getNameTable();

    public static function getOne($id);

    public static function getAll();

    public static function insert();

    public static function update();

    public static function delete();
    }
