<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title', 'img', 'content', 'published_at','admin_id'
    ];

    protected $hidden = [
        'published_at'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
