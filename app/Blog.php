<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
     protected $fillable = [
        'title', 'subject','body','user_id',
    ];

    public function users()
    {
        return $this->hasOne(User::class);
    }
}
