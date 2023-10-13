<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'document_id',
        'document_name',
        'folder_id',
        'folder_name',
        'files_name',
        'files_type',
    ];
}
