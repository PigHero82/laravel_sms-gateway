<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $table = 'templates';
    protected $fillable = ['title', 'message'];

    static function firstTemplate($id)
    {
        return Template::findOrFail($id);
    }

    static function getTemplate()
    {
        return Template::all();
    }

    static function storeTemplate($request)
    {
        Template::create([
            'title'     => $request->title,
            'message'   => $request->message
        ]);
    }
}
