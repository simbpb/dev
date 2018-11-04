<?php
namespace App\Models\VisiMisi;

use DB;
use Auth;

class VisiMisiRepository
{

    protected $model;
      
    public function __construct(VisiMisi $model) {
        $this->model = $model;
    }

    public function getOptions() {
        $options = [];
        $rows = $this->model->select('kd_misi','nama_misi')->get();

        foreach($rows as $row) {
            $options[$row->kd_misi] = $row->nama_misi;
        }
        return $options;
    }

    public function getVisi() {
    	return $this->model->select('kd_visi','nama_visi')->first();
    }
}