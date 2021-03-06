<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $table = 'templates';
    protected $fillable = ['title', 'message', 'status'];

    static function destroyTemplate($id)
    {
        Template::findOrFail($id)->delete();
    }

    static function firstTemplate($id)
    {
        return Template::findOrFail($id);
    }

    static function getTemplate()
    {
        return Template::all();
    }

    static function miniGetTemplate()
    {
        return Template::select('id', 'title')->get();
    }

    static function storeTemplate($request)
    {
        Template::create([
            'title'     => $request->title,
            'message'   => $request->message
        ]);
    }

    static function updateTemplate($id, $request)
    {
        Template::whereId($id)->update([
            'title'     => $request->title,
            'message'   => $request->message
        ]);
    }
}
