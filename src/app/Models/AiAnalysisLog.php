<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AiAnalysisLog extends Model
{
    use HasFactory;

    protected $table = 'ai_analysis_log';
    
    public $timestamps = false;
}
