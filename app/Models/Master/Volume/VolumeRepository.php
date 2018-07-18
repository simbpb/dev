<?php
namespace App\Models\Master\Volume;


class VolumeRepository
{

    protected $model;
      
    public function __construct(Volume $model) {
        $this->model = $model;
    }

    public function getAjaxOptions($outputId) {
        $options = [];
        $rows = $this->model->select('id','jenis_volume')
                            ->where('output_id', $outputId)->get();

        foreach($rows as $row) {
            $options[] = [
                'id' => $row->id,
                'text' => $row->jenis_volume
            ];
        }
        
        return $options;
    }
}