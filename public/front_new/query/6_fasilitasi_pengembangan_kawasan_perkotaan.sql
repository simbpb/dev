SELECT '1' as no, sum(luas_kawasan) as total, 'Status Pemenuhan 30 % Ruang Terbuka Hijau' as tipe 
FROM `bpb_instrument_data_2018_rth_status_tigapuluhpersen`
union all
SELECT '2' as no,  count(id) as total, 'Rencana Pemenuhan 30 % Ruang Terbuka Hijau' as tipe  
FROM `bpb_instrument_data_2018_rth_rencana_tigapuluhpersen`
union all
SELECT '3' as no,  count(id) as total, 'Aktivitas Fasilitasi Pengembangan Kota Hijau' as tipe  
FROM `bpb_instrument_data_2018_pengembangan_kota_hijau`
where nama_kegiatan is not null 
union all
SELECT '4' as no,  count(id) as total, 'Aset Cagar Budaya' as tipe  
FROM `bpb_instrument_data_2018_aset_cagar_budaya`
union all
SELECT '5' as no,  count(id) as total, 'Aktivitas Revitalisasi Kawasan Pusaka Dan Permukiman Tradisional' as tipe  
FROM `bpb_instrument_data_2018_kws_pusaka_pemukiman_trad`
union all
SELECT '6' as no,  count(id) as total, 'Aktivitas Pengembangan Kawasan Perkotaan Strategis Nasional' as tipe  
FROM `bpb_instrument_data_2018_kws_perkotaan_strategis`