<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'completed_at', 'high_priority', 'belongs_to'
    ];

    /**
     * The attributes that are going to be cast.
     *
     * @var array
     */
    protected $casts = [
        'high_priority' => 'boolean'
    ];
/**
 * The user that this task was created by and therefore belongs to.
 *
 * @return Illuminate\Database\Eloquent\Relations\BelongsTo;
 */
    public function belongsToUser()
    {
        return $this->belongsTo(User::class, 'belongs_to' , 'id');
    }
}

