<?php
namespace App\Models\Tupoksi;

use DB;

class TupoksiRepository
{

    protected $model;
      
    public function __construct(Tupoksi $model) {
        $this->model = $model;
    }

    public function getAjaxOptions($subditId) {
        $options = [];
        $rows = $this->model->select('id','nama_tupoksi')
                            ->where('subdit_id', $subditId)->get();

        foreach($rows as $row) {
            $options[] = [
                'id' => $row->id,
                'text' => $row->nama_tupoksi
            ];
        }
        
        return $options;
    }

    public function getOptions() {
        $options = [];
        $rows = $this->model->select('id','nama_tupoksi')->get();

        foreach($rows as $row) {
            $options[$row->id] = $row->nama_tupoksi;
        }
        
        return $options;
    }
}