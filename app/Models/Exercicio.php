<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Exercicio extends Model
{
    use HasFactory;
    protected $table = 'exercicios';

    protected $fillable = [
        'name_activity',
        'duration',
        'calories_burned',
        'date',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}