<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;

    protected $table = 'info';
    protected $fillable = ['title', 'description'];

    static function firstInfo($title)
    {
        return Info::firstWhere('title', $title);
    }

    static function updateInfo($title, $description)
    {
        Info::where('title', $title)->update(['description' => $description]);
    }
}
