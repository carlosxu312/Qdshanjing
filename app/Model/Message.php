<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';

    protected $table = 'message';

    protected $dateFormat = 'U';

    protected $fillable = ['name','content'];

}
