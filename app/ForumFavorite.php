<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumFavorite extends Model
{
    protected $fillable = ['user_id', 'forum_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function forum()
    {
        return $this->belongsTo(Forum::class);
    }
}
