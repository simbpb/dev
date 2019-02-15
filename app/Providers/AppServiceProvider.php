<?php

namespace App\Providers;

use Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Query\Builder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Builder::macro("searchOrder", function($request, $searchFields = []){
            if (!empty($request['search'])) {
                $keywords = explode(' ', $request['search']);
                $this->where(function($query) use ($keywords, $searchFields) {
                    foreach ($keywords as $keyword){
                        foreach ($searchFields as $key => $field) {
                            $query->orWhere($field, 'like', '%'.$keyword.'%');
                        }
                    }
                });
            }

            if (!empty($request['field']) && !empty($request['order'])) {
                $this->orderBy($request['field'], $request['order']);
            } else {
                $this->orderBy('id', 'desc');
            }

            return $this;
        });

        Builder::macro("filterLocation", function(){
            $user = Auth::user();
            if (!empty($user->provinceDetail->lokasi_nama)) {
                $this->where(function($query) use ($user) {
                    $query->where('nama_propinsi', 'like', '%'.$user->provinceDetail->lokasi_nama.'%');
                });
            }

            if (!empty($user->cityDetail->lokasi_nama)) {
                $this->where(function($query) use ($user) {
                    $query->where('nama_kabupatenkota', 'like', '%'.$user->cityDetail->lokasi_nama.'%');
                });
            }
            
            return $this;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
