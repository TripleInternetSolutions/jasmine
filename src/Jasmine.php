<?php

namespace TIS\Jasmine;

use TIS\Jasmine\Bread\hasBread;
use TIS\Jasmine\Exceptions\MustUseHasBreadException;

class Jasmine
{
    protected static $bread_models;

    public function routes()
    {
        require __DIR__ . '/../routes.php';
    }

    /**
     * @param $model
     * @throws MustUseHasBreadException
     */
    public static function addBreadModel($model)
    {
        if (!in_array(HasBread::class, class_uses_recursive($model))) {
            throw new MustUseHasBreadException("\"$model\" dose not use \"" . HasBread::class . '"');
        }

        static::$bread_models[] = $model;
    }
}