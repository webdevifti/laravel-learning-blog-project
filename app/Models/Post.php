<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'post_body',
        'slug',
        'category_id',
        'post_thumbnail'
    ];

    public $timestamps = false;

    public function sluggable()
    {
        return [
            'slug' => ['source' => 'title']
        ];
    }

}
