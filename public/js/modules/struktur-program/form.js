$(function() {
	var currentLevel = $('#select-level').val();
	enableFrom(currentLevel);
	
	$('#select-level').change(function(){
		disableFrom();
		if (this.value) {
			enableFrom(this.value);
		} else {
			disableFrom();
		}
	});

	selectCascade('output','suboutput');
	selectCascade('suboutput','komponen');
	selectCascade('komponen','aktifitas1');
	selectCascade('aktifitas1','aktifitas2');
	selectCascade('aktifitas2','aktifitas3');
});

function selectCascade(element, elementTarget) {
	$('.form-group.'+element+' select').change(function() {
		$('.form-group.'+elementTarget+' select').find('option').not(':first').remove();
	    var parentId = this.value;
	    $.ajax({
	        url: base_url + '/si-bpb/ajax-cascade/'+parentId,
	        type: 'GET',
	        datatype: 'JSON',
	        success: function (result) {
	            $.each(result.data, function (i, item) {
	                $('.form-group.'+elementTarget+' select').append($('<option></option>').val(item.id_struktur).html(item.uraian));
	            });
	        }
	    });
	});
}

function disableFrom() {
	$('.form-group.uraian').hide();
	$('.form-group.uraian input').prop('disabled', true);
	$('.form-group.sub-bidang').hide();
	$('.form-group.sub-bidang select').prop('disabled', true);
	$('.form-group.jenis-volume').hide();
	$('.form-group.jenis-volume select').prop('disabled', true);
	$('.form-group.output').hide();
	$('.form-group.output select').prop('disabled', true);
	$('.form-group.suboutput').hide();
	$('.form-group.suboutput select').prop('disabled', true);
	$('.form-group.komponen').hide();
	$('.form-group.komponen select').prop('disabled', true);
	$('.form-group.aktifitas1').hide();
	$('.form-group.aktifitas1 select').prop('disabled', true);
	$('.form-group.aktifitas2').hide();
	$('.form-group.aktifitas2 select').prop('disabled', true);
	$('.form-group.aktifitas3').hide();
	$('.form-group.aktifitas3 select').prop('disabled', true);
}

function enableFrom(level) {
	switch (level) {
		case '002': //output
			$('.form-group.uraian').show();
			$('.form-group.uraian input').prop('disabled', false);
			$('.form-group.sub-bidang').show();
			$('.form-group.sub-bidang select').prop('disabled', false);
			$('.form-group.jenis-volume').show();
			$('.form-group.jenis-volume select').prop('disabled', false);
			break;
		case '003': //suboutput
			$('.form-group.uraian').show();
			$('.form-group.uraian input').prop('disabled', false);
			$('.form-group.sub-bidang').show();
			$('.form-group.sub-bidang select').prop('disabled', false);
			$('.form-group.jenis-volume').show();
			$('.form-group.jenis-volume select').prop('disabled', false);
			$('.form-group.output').show();
			$('.form-group.output select').prop('disabled', false);
			break;
		case '004': //komponen
			$('.form-group.uraian').show();
			$('.form-group.uraian input').prop('disabled', false);
			$('.form-group.sub-bidang').show();
			$('.form-group.sub-bidang select').prop('disabled', false);
			$('.form-group.jenis-volume').show();
			$('.form-group.jenis-volume select').prop('disabled', false);
			$('.form-group.output').show();
			$('.form-group.output select').prop('disabled', false);
			$('.form-group.suboutput').show();
			$('.form-group.suboutput select').prop('disabled', false);
			break;
		case '005': //aktivitas 1
			$('.form-group.uraian').show();
			$('.form-group.uraian input').prop('disabled', false);
			$('.form-group.sub-bidang').show();
			$('.form-group.sub-bidang select').prop('disabled', false);
			$('.form-group.jenis-volume').show();
			$('.form-group.jenis-volume select').prop('disabled', false);
			$('.form-group.output').show();
			$('.form-group.output select').prop('disabled', false);
			$('.form-group.suboutput').show();
			$('.form-group.suboutput select').prop('disabled', false);
			$('.form-group.komponen').show();
			$('.form-group.komponen select').prop('disabled', false);
			break;
		case '006': //aktivitas 2
			$('.form-group.uraian').show();
			$('.form-group.uraian input').prop('disabled', false);
			$('.form-group.sub-bidang').show();
			$('.form-group.sub-bidang select').prop('disabled', false);
			$('.form-group.jenis-volume').show();
			$('.form-group.jenis-volume select').prop('disabled', false);
			$('.form-group.output').show();
			$('.form-group.output select').prop('disabled', false);
			$('.form-group.suboutput').show();
			$('.form-group.suboutput select').prop('disabled', false);
			$('.form-group.komponen').show();
			$('.form-group.komponen select').prop('disabled', false);
			$('.form-group.aktifitas1').show();
			$('.form-group.aktifitas1 select').prop('disabled', false);
			break;
		case '007': //aktivitas 3
			$('.form-group.uraian').show();
			$('.form-group.uraian input').prop('disabled', false);
			$('.form-group.sub-bidang').show();
			$('.form-group.sub-bidang select').prop('disabled', false);
			$('.form-group.jenis-volume').show();
			$('.form-group.jenis-volume select').prop('disabled', false);
			$('.form-group.output').show();
			$('.form-group.output select').prop('disabled', false);
			$('.form-group.suboutput').show();
			$('.form-group.suboutput select').prop('disabled', false);
			$('.form-group.komponen').show();
			$('.form-group.komponen select').prop('disabled', false);
			$('.form-group.aktifitas1').show();
			$('.form-group.aktifitas1 select').prop('disabled', false);
			$('.form-group.aktifitas2').show();
			$('.form-group.aktifitas2 select').prop('disabled', false);
			break;
		case '008': //aktivitas 4
			$('.form-group.uraian').show();
			$('.form-group.uraian input').prop('disabled', false);
			$('.form-group.sub-bidang').show();
			$('.form-group.sub-bidang select').prop('disabled', false);
			$('.form-group.jenis-volume').show();
			$('.form-group.jenis-volume select').prop('disabled', false);
			$('.form-group.output').show();
			$('.form-group.output select').prop('disabled', false);
			$('.form-group.suboutput').show();
			$('.form-group.suboutput select').prop('disabled', false);
			$('.form-group.komponen').show();
			$('.form-group.komponen select').prop('disabled', false);
			$('.form-group.aktifitas1').show();
			$('.form-group.aktifitas1 select').prop('disabled', false);
			$('.form-group.aktifitas2').show();
			$('.form-group.aktifitas2 select').prop('disabled', false);
			$('.form-group.aktifitas3').show();
			$('.form-group.aktifitas3 select').prop('disabled', false);
			break;
		default:
			alert("Error Dropdown List Level");
	}
}