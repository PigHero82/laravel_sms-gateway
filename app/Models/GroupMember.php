<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupMember extends Model
{
    use HasFactory;

    protected $table = 'group_members';
    protected $fillable = ['group_id', 'meter_id'];
    public $timestamps = false;

    static function destroyGroup($groupId)
    {
        GroupMember::where('group_id', $groupId)->delete();
    }

    static function destroyGroupMember($meterId)
    {
        GroupMember::where('meter_id', $meterId)->delete();
    }

    static function storeGroupMember($groupId, $meterId)
    {
        foreach ($meterId as $key => $value) {
            GroupMember::create([
                'group_id'      => $groupId,
                'meter_id'   => $value
            ]);
        }
    }

    static function updateGroupMember($groupId, $meterId)
    {
        GroupMember::destroyGroup($groupId);
        foreach ($meterId as $key => $value) {
            GroupMember::create([
                'group_id'      => $groupId,
                'meter_id'   => $value
            ]);
        }
    }
}
