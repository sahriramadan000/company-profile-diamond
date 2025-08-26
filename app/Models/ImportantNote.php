<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportantNote extends Model
{
    use HasFactory;

    protected $table = 'important_notes';

    protected $fillable = [
        'note',
    ];
}
