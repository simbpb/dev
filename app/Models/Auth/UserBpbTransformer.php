<?php
namespace App\Models\Auth;

use App\Helpers\DateFormat;

class UserBpbTransformer{

    public function transformPaginate($user) {

        $data = $user->getCollection()->transform(function($user, $key) {
            return [
               'id' => $user->user_id,
               'nip' => $user->nip,
               'username' => $user->username,
               'nama' => $user->nama,
               'email' => $user->email,
               'role' => $user->role,
               'created_date' => DateFormat::sqlToSlash($user->created_date)
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
