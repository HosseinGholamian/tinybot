<?php

namespace Models;

use Tinybot\Database\ORM\Model;
use Tinybot\Database\Traits\HasSoftDelete;

class File extends Model
{
    use HasSoftDelete;
    protected $table = "files";
    protected $fillable = ['file_id','title','created_at','	updated_at','is_admin'];
    protected $deletedAt = 'deleted_at';
}
