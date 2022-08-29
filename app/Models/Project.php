<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'projects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description'
    ];

    /**
     * The users that belong to the project.
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('roles');;
    }

    /**
     * Get the activities for the project.
     */
    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}
