<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = 'history';

    protected $fillable = ['status', 'id_admin', 'id_post'];

    // Định nghĩa các mối quan hệ nếu cần
    public function admin()
    {
        return $this->belongsTo(User::class, 'id_admin');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'id_post');
    }
}
