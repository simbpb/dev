<?php
namespace App\Models\Master\Komponen;

use DB;

class KomponenRepository
{

    protected $model;
      
    public function __construct(Komponen $model) {
        $this->model = $model;
    }

    public function getOptions() {
        $options = [];
        $rows = $this->model->select('id','nama_komponen')->get();

        foreach($rows as $row) {
            $options[$row->id] = $row->nama_komponen;
        }
        
        return $options;
    }
}