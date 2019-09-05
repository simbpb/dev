<div class="col-md-12">
<table class="table table-bordered table-striped">
	<tr>
		<th width="5%">NO.</th>
		<th width="40%">NAMA FORM</th>
		<th width="55%">AKTIF</th>
	</tr>
	@php
	$no = 1;
	@endphp
	@foreach($detail as $row)
		<tr>
			<td>{{ $no++ }}</td>
			<td>{{ $row->nama_form }}</td>
			<td>
				<input type="checkbox" {{ ($row->lokasi_propinsi != null) ? 'checked' : '' }} name="detail[]" value="{{ $row->id }}">
			</td>
		</tr>
	@endforeach
</table>
</div>