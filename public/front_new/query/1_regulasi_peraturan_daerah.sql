SELECT '1' as no,  count(perda_bg) as total, 'perda_bg' as perda FROM `bpb_instrument_data_2018_regulasi_perda` 
WHERE perda_bg like '%nomor%' or perda_bg like '%tahun%' 
union ALL
SELECT '2' as no,   count(perda_rt_rw) as total, 'perda_rt_rw' as perda  FROM `bpb_instrument_data_2018_regulasi_perda` 
WHERE perda_rt_rw like '%nomor%' or perda_rt_rw like '%tahun%'
union ALL
SELECT '3' as no,   count(perda_rd_tr) as total, 'perda_rd_tr' as perda  FROM `bpb_instrument_data_2018_regulasi_perda` 
WHERE perda_rd_tr like '%nomor%' or perda_rd_tr like '%tahun%'
union ALL
SELECT '4' as no,   count(perda_cagar_budaya) as total, 'perda_cagar_budaya' as perda  FROM `bpb_instrument_data_2018_regulasi_perda` 
WHERE perda_cagar_budaya like '%nomor%' or perda_cagar_budaya like '%tahun%'
union ALL
SELECT '5' as no,   count(perda_rth) as total, 'perda_rth' as perda  FROM `bpb_instrument_data_2018_regulasi_perda` 
WHERE perda_rth like '%nomor%' or perda_rth like '%tahun%'
union ALL
SELECT '6' as no,   count(perwal_perbup_bgh) as total, 'perwal_perbup_bgh' as perda  FROM `bpb_instrument_data_2018_regulasi_perda` 
WHERE perwal_perbup_bgh like '%nomor%' or perwal_perbup_bgh like '%tahun%'
union ALL
SELECT '7' as no,   count(perwal_perbup_imb) as total, 'perwal_perbup_imb' as perda  FROM `bpb_instrument_data_2018_regulasi_perda` 
WHERE perwal_perbup_imb like '%nomor%' or perwal_perbup_imb like '%tahun%'
union ALL
SELECT '8' as no,   count(perwal_perbup_slf) as total, 'perwal_perbup_slf' as perda  FROM `bpb_instrument_data_2018_regulasi_perda` 
WHERE perwal_perbup_slf like '%nomor%' or perwal_perbup_slf like '%tahun%'
union ALL
SELECT '9' as no,   count(perwal_perbup_rtbl_1) as total, 'perwal_perbup_rtbl_1' as perda  FROM `bpb_instrument_data_2018_regulasi_perda` 
WHERE perwal_perbup_rtbl_1 like '%nomor%' or perwal_perbup_rtbl_1 like '%tahun%'
union ALL
SELECT '10' as no,   count(perwal_perbup_rtbl_2) as total, 'perwal_perbup_rtbl_2' as perda  FROM `bpb_instrument_data_2018_regulasi_perda` 
WHERE perwal_perbup_rtbl_2 like '%nomor%' or perwal_perbup_rtbl_2 like '%tahun%'
union ALL
SELECT '11' as no,   count(perwal_perbup_rtbl_3) as total, 'perwal_perbup_rtbl_3' as perda  FROM `bpb_instrument_data_2018_regulasi_perda` 
WHERE perwal_perbup_rtbl_3 like '%nomor%' or perwal_perbup_rtbl_3 like '%tahun%'
union ALL
SELECT '12' as no,   count(perwal_perbup_rtbl_4) as total, 'perwal_perbup_rtbl_4' as perda  FROM `bpb_instrument_data_2018_regulasi_perda` 
WHERE perwal_perbup_rtbl_4 like '%nomor%' or perwal_perbup_rtbl_4 like '%tahun%'
union ALL
SELECT '13' as no,   count(perwal_perbup_rtbl_5) as total, 'perwal_perbup_rtbl_5' as perda  FROM `bpb_instrument_data_2018_regulasi_perda` 
WHERE perwal_perbup_rtbl_5 like '%nomor%' or perwal_perbup_rtbl_5 like '%tahun%'
union ALL
SELECT '14' as no,   count(perwal_perbup_rtbl_6) as total, 'perwal_perbup_rtbl_6' as perda  FROM `bpb_instrument_data_2018_regulasi_perda` 
WHERE perwal_perbup_rtbl_6 like '%nomor%' or perwal_perbup_rtbl_6 like '%tahun%'