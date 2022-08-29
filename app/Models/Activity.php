<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'activities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'project_id'
    ];

    /**
     * Get the incidents of activity.
     */
    public function incidents()
    {
        return $this->hasMany(Incident::class);
    }

    /**
     * Get the project that owns the activity.
     */
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    /**
     * The users that belong to the activity.
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('roles');
    }
}
