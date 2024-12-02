<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'project_name',
        'user_id', 
        'requests_num'  
    ];

    public function user()
    {
        return $this->belongsTo(User::class); 
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'project_user', 'project_id', 'user_id'); 
    }
}
