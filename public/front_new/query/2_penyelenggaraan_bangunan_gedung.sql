SELECT '1' as no,  count(bg_umum_id) as total, 'bg_umum' as tipe_bg 
FROM `bpb_instrument_data_2018_bg_umum`
where nama_pemilik_bangunan <> ''
union all
SELECT '2' as no,  count(bg_negara_id) as total, 'bg_negara' as tipe_bg 
FROM `bpb_instrument_data_2018_bg_negara`
where nama_bg_negara <> ''
union all
SELECT '3' as no,  count(bgh_id) as total, 'bgh' as tipe_bg 
FROM `bpb_instrument_data_2018_bgh`
where nama_kegiatan <> ''
union all
SELECT '4' as no,  count(rehab_pusaka_istana_id) as total, 'rehab_pusaka_istana' as tipe_bg 
FROM `bpb_instrument_data_2018_rehab_bg_pusaka_istana`
where nama_kegiatan <> ''
union all
SELECT '5' as no,  count(mitigasi_bencana_id) as total, 'mitigasi_bencana' as tipe_bg 
FROM `bpb_instrument_data_2018_bg_mitigasi_bencana`
where nama_kegiatan <> ''
