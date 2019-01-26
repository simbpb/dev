SELECT '1' as no,  count(id) as total, 'Penataan Bangunan Kawasan Prioritas Nasional' as tipe 
FROM `bpb_instrument_data_2018_kws_prioritas_nasional`
union all
SELECT '2' as no,  count(id) as total, 'Penataan Bangunan Kawasan Rawan Bencana' as tipe  
FROM `bpb_instrument_data_2018_kws_rawan_bencana`
union all
SELECT '3' as no,  count(id) as total, 'Penataan Bangunan Kawasan Destinasi Wisata' as tipe  
FROM `bpb_instrument_data_2018_kws_destinasi_wisata`
