<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password'
    ];

    /*
    * Get all of the tasks for the admin
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class , 'assigned_by_id');
    }


}
