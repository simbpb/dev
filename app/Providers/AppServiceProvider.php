<?php

namespace App\Providers;

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
        Builder::macro("searchOrder", function($request, $searchColumns = []){
            if (!empty($request['column']) && !empty($request['order'])) {
                $this->orderBy($request['column'], $request['order']);
            }

            if (!empty($request['search'])) {
                $keywords = explode(' ', $request['search']);
                foreach ($keywords as $keyword){
                    foreach ($searchColumns as $column) {
                        $this->orWhere($column, 'like', '%'.$keyword.'%');
                    }
                }
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
