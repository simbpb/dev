<?php
namespace App\Models\Master\SubOutput;


class SubOutputRepository
{

    protected $model;
      
    public function __construct(SubOutput $model) {
        $this->model = $model;
    }

    public function getAjaxOptions($outputId) {
        $options = [];
        $rows = $this->model->select('id','nama_suboutput')
                    ->where('output_id',$outputId)->get();

        foreach($rows as $row) {
            $options[] = [
                'id' => $row->id,
                'text' => $row->nama_suboutput
            ];
        }
        
        return $options;
    }
}