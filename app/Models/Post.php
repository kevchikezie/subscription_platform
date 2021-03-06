<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 
        'description',
        'content',
        'is_published',
        'website_id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_published' => 'boolean',
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
    public function website()
    {
        return $this->belongsTo(Website::class);
    }
}
