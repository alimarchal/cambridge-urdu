<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PaperQuestion extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = [ 'paper_id', 'question_id'];

    public function paper(): HasOne
    {
        return $this->hasOne(Paper::class, 'id','paper_id');
    }

    public function question(): HasOne
    {
        return $this->hasOne(Question::class, 'id','question_id');
    }
}
