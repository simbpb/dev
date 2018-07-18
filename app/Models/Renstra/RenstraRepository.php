<?php
namespace App\Models\Renstra;

use DB;
use Auth;

class RenstraRepository
{

    protected $model;
      
    public function __construct(Renstra $model) {
        $this->model = $model;
    }

    public function getOptions() {
        $options = [];
        $rows = $this->model->select('id','uraian_renstra')->get();

        foreach($rows as $row) {
            $options[$row->id] = $row->uraian_renstra;
        }
        
        return $options;
    }
}