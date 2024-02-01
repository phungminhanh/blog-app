<?php

// app/Models/Notification.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['id_user', 'content','id_post'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
