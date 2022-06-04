<?php

namespace Tinybot\Database\ORM;

use Tinybot\Database\Traits\HasCRUD;
use Tinybot\Database\Traits\HasAttributes;
use Tinybot\Database\Traits\HasMethodCaller;
use Tinybot\Database\Traits\HasQueryBuilder;
use Tinybot\Database\Traits\HasRelation;

abstract class Model
{
    use HasCRUD,
        HasAttributes,
        HasMethodCaller,
        HasQueryBuilder,
        HasRelation;


    protected $table;
    protected $fillable = [];
    protected $hidden = [];
    protected $casts = [];
    protected $primaryKey = "id";
    protected $createdAt = "created_at";
    protected $updatedAt = "updated_at";
    protected $deletedAt = null;
    protected $collection = [];
}
