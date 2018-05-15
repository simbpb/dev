<?php
namespace App\Models\Auth;

class UserHsbgnTransformer{

    public function transformPaginate($user) {

        $data = $user->getCollection()->transform(function($user, $key) {
            return [
               'id' => $user->user_id,
               'nip' => $user->nip,
               'username' => $user->username,
               'nama' => $user->nama,
               'email' => $user->email,
               'role' => $user->role
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
