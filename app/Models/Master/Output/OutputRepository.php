<?php
namespace App\Models\Master\Output;


class OutputRepository
{

    protected $model;
      
    public function __construct(Output $model) {
        $this->model = $model;
    }

    public function getOptions() {
        $options = [];
        $rows = $this->model->select('id','nama_output')->get();

        foreach($rows as $row) {
            $options[$row->id] = $row->nama_output;
        }
        
        return $options;
    }
}