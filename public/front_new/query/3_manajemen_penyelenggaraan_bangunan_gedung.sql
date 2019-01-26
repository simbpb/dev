SELECT '1' as no,  count(id) as total, 'Tim Ahli Bangunan Gedung (TABG)' as tipe 
FROM `bpb_instrument_data_2018_tabg`
union all
SELECT '2' as no,  count(id) as total, 'Tim Ahli Bangunan Gedung Cagar Budaya (TABG-CB)' as tipe  
FROM `bpb_instrument_data_2018_tabg_cb`
union all
SELECT '3' as no,  count(id) as total, 'Tenaga Pengelola Teknis Bersertifikat' as tipe  
FROM `bpb_instrument_data_2018_pengelola_teknis_bersertifikasi`
union all
SELECT '4' as no,  count(id) as total, 'Standar Harga Satuan Bangunan Gedung Negara (HSBGN)' as tipe  
FROM `bpb_instrument_data_2018_hsbgn`