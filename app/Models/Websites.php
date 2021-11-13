<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Websites extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'url',
    ];

    // Table Relationships
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function subscriptions()
    {
        return $this->belongsToMany(Subscription::class);
    }
}
