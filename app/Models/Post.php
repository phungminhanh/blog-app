<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'teaser',
        'content',
        'title',
        'id_author',
        'view',
        'view_daily'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'id_author');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_post');
    }
}
