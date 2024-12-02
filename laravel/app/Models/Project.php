<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // Define the table name if it's not the plural form of the model name
    protected $table = 'projects';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'name',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class); 
    }

    
}
