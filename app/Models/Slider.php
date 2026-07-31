<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'file_id'
    ];

    public function file()
    {
        return $this->belongsTo(File::class);
    }
}
