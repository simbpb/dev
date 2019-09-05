<?php
namespace App\Models\Subdit;

use DB;
use Auth;

class SubditRepository
{

    protected $model;
      
    public function __construct(Subdit $model) {
        $this->model = $model;
    }

    public function getOptions() {
        $options = [];
        $rows = $this->model->select('id','nama_subdit')->get();

        foreach($rows as $row) {
            $options[$row->id] = $row->nama_subdit;
        }
        
        return $options;
    }
}