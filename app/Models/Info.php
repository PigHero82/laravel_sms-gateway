<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;

    protected $table = 'info';
    protected $fillable = ['name', 'description'];

    static function firstInfo($name)
    {
        return Info::firstWhere('name', $name);
    }

    static function updateInfo($name, $description)
    {
        Info::where('name', $name)->update(['description' => $description]);
    }
}
