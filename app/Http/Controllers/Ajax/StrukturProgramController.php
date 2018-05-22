<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StrukturBpb\StrukturBpb;

class StrukturProgramController extends Controller
{
	public function index($parent_id) {
		$struktur_bpb = StrukturBpb::select('id_struktur','uraian')->orderBy('id_struktur')->where('parent_id', '=', $parent_id)->get();
		if (count($struktur_bpb) > 0) {
			$result['success'] = true;
			$result['data'] = $struktur_bpb;
		} else {
			$result['success'] = false;
		}
		return $result;
	}
}