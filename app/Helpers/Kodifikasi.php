<?php
namespace App\Helpers;

use DB;
use Auth;
use App\Models\Program\Program;

class Kodifikasi {    

	private $pu = '033';
	private $dir = '55';
	private $ck = '2413';
	
	public function setKodifikasi(
		$visiId = '000',
		$misiId = '000',
		$tupoksiId = '000',
		$sasaranId = '000',
		$outputId = '000',
		$suboutputId = '000',
		$komponenId = '000',
		$akt1Id = '000',
		$akt2Id = '000',
		$akt3Id = '000',
		$akt4Id = '000',
		$uraianId = '000',
		$subditId = '000',
		$volumeId = '000'
	) {
		$kode = $this->pu.'.'.$this->dir.'.'.$this->ck.'.';
		$kode .= $this->addNol($visiId).'.'.$this->addNol($misiId).'.';
		$kode .= $this->addNol($tupoksiId).'.'.$this->addNol($sasaranId).'.';
		$kode .= $this->addNol($outputId).'.'.$this->addNol($suboutputId).'.'.$this->addNol($komponenId).'.';
		$kode .= $this->addNol($akt1Id).'.'.$this->addNol($akt2Id).'.'.$this->addNol($akt3Id).'.'.$this->addNol($akt4Id).'.';
		$kode .= $this->addNol($uraianId).'.'.$this->addNol($subditId).'.'.$this->addNol($volumeId);

		return $kode;
	}

	public function getKodifikasi($programId) {
		$model = Program::findOrFail($programId);
		return $this->setKodifikasi(
			$model->visi_id,
			$model->misi_id,
			$model->tupoksi_id,
			$model->sasaran_id,
			$model->output_id,
			$model->suboutput_id,
			$model->komponen_id,
			$model->akt1_id,
			$model->akt2_id,
			$model->akt3_id,
			$model->akt4_id,
			$model->uraian_id,
			$model->subdit_id,
			$model->volume_id
		);
	}

	protected function addNol($val) {
		return sprintf("%03d", $val);
	}
}