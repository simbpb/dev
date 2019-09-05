<?php
namespace App\Models\PropinsiDetail;


class PropinsiDetailRepository
{

    protected $model;
      
    public function __construct(PropinsiDetail $model) {
        $this->model = $model;
    }

    public function insertAll($request) {
    	$provinceId = explode("-", $request->get('propinsi_id'))[0];
    	$this->model->where('lokasi_propinsi', $provinceId)->delete();
    	$data = [];

    	foreach ($request->get('detail') as $key => $value) {
    		$data[] = ['lokasi_propinsi' => $provinceId, 'daftar_form_detail_id' => $value];
    	}

    	return $this->model->insert($data);
    }
    
}