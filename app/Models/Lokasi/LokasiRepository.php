<?php
namespace App\Models\Lokasi;


class LokasiRepository
{

    protected $model;
      
    public function __construct(Lokasi $model) {
        $this->model = $model;
    }

    public function getProvincesOptions()
    {
        $rows = $this->model->select('lokasi_propinsi','lokasi_nama')
                    ->where('lokasi_kabupatenkota','00')
                    ->get();

        $options[null] = 'Pilih Propinsi';
        foreach($rows as $row) {
            $options[$row->lokasi_propinsi] = $row->lokasi_nama;
        }

        return $options;
    }

    public function getCitiesOptions($provinceId)
    {
        $rows = $this->model->select('lokasi_kabupatenkota','lokasi_nama')
                    ->where('lokasi_propinsi',$provinceId)
                    ->where('lokasi_kabupatenkota','<>','00')
                    ->where('lokasi_kecamatan','00')
                    ->get();

        $options = [];
        foreach($rows as $row) {
            $options[$row->lokasi_kabupatenkota] = $row->lokasi_nama;
        }

        return $options;
    }

    public function getTextProvincesOptions()
    {
        $rows = $this->model->select('lokasi_propinsi','lokasi_nama')
                    ->where('lokasi_kabupatenkota','00')
                    ->get();

        $options[null] = 'Pilih Propinsi';
        foreach($rows as $row) {
            $options[$row->lokasi_propinsi.'-'.$row->lokasi_nama] = $row->lokasi_nama;
        }

        return $options;
    }

    public function getDistrictsOptions($provinceId, $cityId)
    {
        $rows = $this->model->select('lokasi_kecamatan','lokasi_nama')
                    ->where('lokasi_propinsi', $provinceId)
                    ->where('lokasi_kabupatenkota', $cityId)
                    ->where('lokasi_kecamatan','<>','00')
                    ->where('lokasi_kelurahan','0000')
                    ->get();

        $options = [];
        foreach($rows as $row) {
            $options[$row->lokasi_kecamatan] = $row->lokasi_nama;
        }

        return $options;
    }
}