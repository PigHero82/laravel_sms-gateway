<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupMember extends Model
{
    use HasFactory;

    protected $table = 'group_members';
    protected $fillable = ['group_id', 'customer_id'];
    public $timestamps = false;

    static function destroyGroup($groupId)
    {
        GroupMember::where('group_id', $groupId)->delete();
    }

    static function destroyGroupMember($customerId)
    {
        GroupMember::where('customer_id', $customerId)->delete();
    }

    static function storeGroupMember($groupId, $customerId)
    {
        foreach ($customerId as $key => $value) {
            GroupMember::create([
                'group_id'      => $groupId,
                'customer_id'   => $value
            ]);
        }
    }

    static function updateGroupMember($groupId, $customerId)
    {
        GroupMember::destroyGroup($groupId);
        foreach ($customerId as $key => $value) {
            GroupMember::create([
                'group_id'      => $groupId,
                'customer_id'   => $value
            ]);
        }
    }
}
