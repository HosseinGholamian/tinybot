<?php

namespace Models;

use Tinybot\Database\ORM\Model;
use Tinybot\Database\Traits\HasSoftDelete;

class User extends Model
{
    use HasSoftDelete;
    protected $table = "users";
    protected $fillable = ['username','chat_id','firstname','user_is_bot','is_admin','status','updated_at'];
    protected $deletedAt = 'deleted_at';
}
