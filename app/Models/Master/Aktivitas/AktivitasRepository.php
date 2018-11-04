<?php
namespace App\Models\Master\Aktivitas;

use DB;

class AktivitasRepository
{

    protected $model;
      
    public function __construct(Aktivitas $model) {
        $this->model = $model;
    }

    public function getAjaxOptionsAkt1($komponenId) {
        $options = [];
        $rows = $this->model->select('id','nama_aktivitas1')
                            ->where('komponen_id', $komponenId)->get();

        foreach($rows as $row) {
            $options[] = [
                'id' => $row->akt1_id,
                'text' => $row->nama_aktivitas1
            ];
        }
        
        return $options;
    }

    public function getAjaxOptionsAkt2($komponenId) {
        $options = [];
        $rows = $this->model->select('id','nama_aktivitas2')
                            ->where('komponen_id', $komponenId)->get();

        foreach($rows as $row) {
            $options[] = [
                'id' => $row->akt2_id,
                'text' => $row->nama_aktivitas2
            ];
        }
        
        return $options;
    }

    public function getAjaxOptionsAkt3($komponenId) {
        $options = [];
        $rows = $this->model->select('id','nama_aktivitas3')
                            ->where('komponen_id', $komponenId)->get();

        foreach($rows as $row) {
            $options[] = [
                'id' => $row->akt3_id,
                'text' => $row->nama_aktivitas3
            ];
        }
        
        return $options;
    }

    public function getAjaxOptionsAkt4($komponenId) {
        $options = [];
        $rows = $this->model->select('id','nama_aktivitas4')
                            ->where('komponen_id', $komponenId)->get();

        foreach($rows as $row) {
            $options[] = [
                'id' => $row->akt4_id,
                'text' => $row->nama_aktivitas4
            ];
        }
        
        return $options;
    }
}