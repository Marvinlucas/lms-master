<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Question extends Model
{
    use HasFactory, LogsActivity;


    protected $guarded = [];


    public function QuestionType()
    {
        return $this->belongsTo(QuestionType::class, 'question_type_id');  
    }
    public function Term()
    {
        return $this->belongsTo(Term::class, 'term_id');
    }
    

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly( ['title', 'type', 'question_body', 'term', 'question_type_id', 'answer', 'term_id']);
    }
}
