<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'groups';
    protected $fillable = ['title', 'description'];

    static function firstGroup($id)
    {
        $data = Group::findOrFail($id);

        if ($data->isNotEmpty()) {
            $data['numbers_of_member'] = count($data['member']);
            $data['member'] = GroupMember::where('group_id', $id)->get();
        }

        return $data;
    }

    static function getGroup()
    {
        $group = Group::select('id')->get();
        
        if ($group->isNotEmpty()) {
            foreach ($group as $key => $value) {
                $data[$key] = Group::findOrFail($value->id);
                $data[$key]['numbers_of_member'] = count($data[$key]['member']);
                $data[$key]['member'] = GroupMember::where('group_id', $value->id)->get();
            }

            return $data;
        }

        return $group;
    }

    static function miniGetGroup()
    {
        $group = Group::select('id')->get();
        
        if ($group->isNotEmpty()) {
            foreach ($group as $key => $value) {
                $data[$key] = Group::select('id', 'title')->firstWhere($value->id);
                $data[$key]['numbers_of_member'] = count($data[$key]['member']);
            }

            return $data;
        }

        return $group;
    }
}
