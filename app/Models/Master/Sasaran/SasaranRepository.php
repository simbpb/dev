<?php
namespace App\Models\Master\Sasaran;


class SasaranRepository
{

    protected $model;
      
    public function __construct(Sasaran $model) {
        $this->model = $model;
    }

    public function getAjaxOptions($suboutputId) {
        $options = [];
        $rows = $this->model->select('id','nama_sasaran')
                            ->where('suboutput_id', $suboutputId)->get();

        foreach($rows as $row) {
            $options[] = [
                'id' => $row->id,
                'text' => $row->nama_sasaran
            ];
        }
        
        return $options;
    }
}