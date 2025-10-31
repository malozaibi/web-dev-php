<?php // core/Model.php
abstract class Model
{
    protected $table;

    protected function db()
    {
        return Database::connection();
    }
}
