<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Paper extends Model
{
    use HasFactory;

    public $fillable = ['title'];

    public function questions(): HasMany
    {
        return $this->hasMany(PaperQuestion::class, 'paper_id', 'id');
    }
}
