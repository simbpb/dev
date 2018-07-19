<?php
namespace App\Models\Master\Uraian;

use DB;

class UraianRepository
{

    protected $model;
      
    public function __construct(Uraian $model) {
        $this->model = $model;
    }

    public function getOptions() {
        $options = [];
        $rows = $this->model->select('id','nama_uraian')->get();

        foreach($rows as $row) {
            $options[$row->id] = $row->nama_uraian;
        }
        
        return $options;
    }
}