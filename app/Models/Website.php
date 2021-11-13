<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
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

    /**
     * The attributes that should be hidden when response is return
     *  
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    // Table Relationships
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
