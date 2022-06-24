<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;

    public $fillable = ['question'];

    public function option(): HasMany
    {
        return $this->hasMany(Option::class);
    }

    public function papers(): HasMany
    {
        return $this->hasMany(PaperQuestion::class,'question_id','id');
    }
}
