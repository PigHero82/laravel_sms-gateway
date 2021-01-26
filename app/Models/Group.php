<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'groups';
    protected $fillable = ['title', 'description'];

    static function destroyGroup($id)
    {
        GroupMember::destroyGroup($id);
        Group::whereId($id)->delete();
    }

    static function firstGroup($id)
    {
        $data = Group::findOrFail($id);
        $data['numbers_of_member'] = 0;
        $data['member'] = GroupMember::select('group_members.id', 'group_members.customer_id', 'customers.name')
                                        ->join('customers', 'group_members.customer_id', 'customers.customer_id')
                                        ->where('group_members.group_id', $id)
                                        ->get();
        $data['numbers_of_member'] = count($data['member']);

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
                $data[$key] = Group::select('id', 'title')->whereId($value->id)->first();
                $numbersOfMember = GroupMember::select('id')
                                                ->where('group_id', $value->id)
                                                ->get();
                $data[$key]['numbers_of_member'] = count($numbersOfMember);
            }

            return $data;
        }

        return $group;
    }

    static function storeGroup($request)
    {
        $group = Group::create([
            'title'         => $request->title,
            'description'   => $request->description
        ]);

        GroupMember::storeGroupMember($group->id, $request->customer_id);
    }

    static function updateGroup($id, $request)
    {
        $group = Group::whereId($id)->update([
            'title'         => $request->title,
            'description'   => $request->description
        ]);

        GroupMember::updateGroupMember($id, $request->customer_id);
    }
}
