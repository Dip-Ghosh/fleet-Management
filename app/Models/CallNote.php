<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CallNote extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'call_note_type',
        'created_by',
        'updated_by'
    ];
}
