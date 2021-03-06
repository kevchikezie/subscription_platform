<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 
        'name',
        'website_id'
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
