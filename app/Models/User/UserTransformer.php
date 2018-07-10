<?php
namespace App\Models\User;

use App\Enum\Status;

class UserTransformer{

    public function transformDetail($user) {
        return [
            'id' => $user->id,
            'fullname' => $user->fullname,
            'username' => $user->username,
            'email' => $user->email,
            'role_id' => $user->role_id,
            'role_name' => ($user->role) ? $user->role->name : null,
            'status' => $user->status,
        ];
    }

    public function transformPaginate($user) {

        $data = $user->getCollection()->transform(function($user, $key) {
            return [
               'id' => $user->id,
               'fullname' => $user->fullname,
               'username' => $user->username,
               'email' => $user->email,
               'group' => ($user->group) ? $user->group : '(EMPTY)',
               'status' => ($user->status == Status::ACTIVE) ? 'ACTIVE' : 'INACTIVE',
            ];
        });

        $result = [
            'totalRow' => $user->total(),
            'perPage' => $user->count(),
            'currentPage' => $user->currentPage(),
            'lastPage' => $user->lastPage(),
            'data' => $data,
        ];

        return $result;
    }
}
