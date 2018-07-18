<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    "accepted"             => "Isian :attribute harus diterima.",
    "active_url"           => "Isian :attribute bukan URL yang valid.",
    "after"                => "Isian :attribute harus tanggal setelah :date.",
    "alpha"                => "Isian :attribute hanya boleh berisi huruf.",
    "alpha_dash"           => "Isian :attribute hanya boleh berisi huruf, angka, dan strip.",
    "alpha_num"            => "Isian :attribute hanya boleh berisi huruf dan angka.",
    "array"                => "Isian :attribute harus berupa sebuah array.",
    "before"               => "Isian :attribute harus tanggal sebelum :date.",
    "between"              => [
        "numeric" => "Isian :attribute harus antara :min dan :max.",
        "file"    => "Isian :attribute harus antara :min dan :max kilobytes.",
        "string"  => "Isian :attribute harus antara :min dan :max karakter.",
        "array"   => "Isian :attribute harus antara :min dan :max item.",
    ],
    "boolean"              => "Isian :attribute harus berupa true atau false",
    "confirmed"            => "Konfirmasi :attribute tidak cocok.",
    "date"                 => "Isian :attribute bukan tanggal yang valid.",
    "date_format"          => "Isian :attribute tidak cocok dengan format :format.",
    "different"            => "Isian :attribute dan :other harus berbeda.",
    "digits"               => "Isian :attribute harus berupa angka :digits.",
    "digits_between"       => "Isian :attribute harus antara angka :min dan :max.",
    "email"                => "Isian :attribute harus berupa alamat surel yang valid.",
    "email_pgn"            => "Isian :attribute harus berupa alamat surel yang valid. Format : [username]@pgn.co.id",
    "exists"               => "Isian :attribute yang dipilih tidak valid.",
    "filled"               => ":attribute wajib diisi.",
    "greater_than"         => "Isian :attribute harus lebih besar dari :field",
    "image"                => "Isian :attribute harus berupa gambar.",
    "in"                   => "Isian :attribute yang dipilih tidak valid.",
    "integer"              => "Isian :attribute harus merupakan bilangan bulat.",
    "ip"                   => "Isian :attribute harus berupa alamat IP yang valid.",
    "max"                  => [
        "numeric" => "Isian :attribute seharusnya tidak lebih dari :max.",
        "file"    => "Isian :attribute seharusnya tidak lebih dari :max kilobytes.",
        "string"  => "Isian :attribute seharusnya tidak lebih dari :max karakter.",
        "array"   => "Isian :attribute seharusnya tidak lebih dari :max item.",
    ],
    "mimes"                => "Isian :attribute harus dokumen berjenis : :values.",
    "min"                  => [
        "numeric" => "Isian :attribute harus minimal :min.",
        "file"    => "Isian :attribute harus minimal :min kilobytes.",
        "string"  => "Isian :attribute harus minimal :min karakter.",
        "array"   => "Isian :attribute harus minimal :min item.",
        "field"   => "Isian :attribute harus lebih kecil dari :min."
    ],
    "not_in"               => "Isian :attribute yang dipilih tidak valid.",
    "numeric"              => "Isian :attribute harus berupa angka.",
    "regex"                => "Format isian :attribute tidak valid.",
    "required"             => ":attribute wajib diisi.",
    "required_if"          => ":attribute wajib diisi bila :other adalah :value.",
    "required_with"        => ":attribute wajib diisi bila terdapat :values.",
    "required_with_all"    => ":attribute wajib diisi bila terdapat :values.",
    "required_without"     => ":attribute wajib diisi bila tidak terdapat :values.",
    "required_without_all" => ":attribute wajib diisi bila tidak terdapat ada :values.",
    "same"                 => "Isian :attribute dan :other harus sama.",
    "size"                 => [
        "numeric" => "Isian :attribute harus berukuran :size.",
        "file"    => "Isian :attribute harus berukuran :size kilobyte.",
        "string"  => "Isian :attribute harus berukuran :size karakter.",
        "array"   => "Isian :attribute harus mengandung :size item.",
    ],
    "string"               => "Isian :attribute harus berupa string.",
    "timezone"             => "Isian :attribute harus berupa zona waktu yang valid.",
    "unique"               => "Isian :attribute sudah ada sebelumnya.",
    'url'                  => 'Isi :attribute url tidak benar.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'role_id' => 'Group',
        'name' => 'Nama',
        'description' => 'Deskripsi',
        'fullname' => 'Nama lengkap',
        'now_password' => 'Password baru',
        'password' => 'Password',
        'category' => 'Kategori',
        'password_confirmation' => 'Konfirmasi password',
        'province_id' => 'Propinsi',
        'city_id' => 'Kabupaten/kota',
        'renstra_id' => 'Renstra',
        'uraian_id' => 'Uraian',
        'output_id' => 'Output',
        'suboutput_id' => 'Suboutput',
        'sasaran_id' => 'Sasaran',
        'volume_id' => 'Volume',
        'thn_prog' => 'Tahun program',
        'exe_summary_prog' => 'Summary program',
    ],

];
