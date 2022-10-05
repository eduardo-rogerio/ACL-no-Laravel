<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    protected $fillable = ['reply'];
    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }
}
