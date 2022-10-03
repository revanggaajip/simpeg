<?php

/**
 * Validation language strings.
 *
 * @package      CodeIgniter
 * @author       CodeIgniter Dev Team
 * @copyright    2014-2018 British Columbia Institute of Technology (https://bcit.ca/)
 * @license      https://opensource.org/licenses/MIT	MIT License
 * @link         https://codeigniter.com
 * @since        Version 3.0.0
 * @filesource
 * 
 * @codeCoverageIgnore
 */

return [
	// Core Messages
	'noRuleSets'            => 'Tidak ada aturan yang ditentukan dalam konfigurasi Validasi.',
	'ruleNotFound'          => '{0} bukan sebuah aturan yang valid.',
	'groupNotFound'         => '{0} bukan sebuah grup aturan validasi.',
	'groupNotArray'         => '{0} grup aturan harus berupa sebuah array.',
	'invalidTemplate'       => '{0} bukan sebuah template Validasi yang valid.',

	// Rule Messages
	'alpha'                 => 'kolom {field} hanya boleh mengandung karakter alfabet.',
	'alpha_dash'            => 'kolom {field} hanya boleh berisi karakter alfa-numerik, setrip bawah, dan tanda pisah.',
	'alpha_numeric'         => 'kolom {field} hanya boleh berisi karakter alfa-numerik.',
	'alpha_numeric_space'   => 'kolom {field} hanya boleh berisi karakter alfa-numerik dan spasi.',
	'alpha_space'  			=> 'kolom {field} hanya boleh berisi karakter alfabet dan spasi.',
	'decimal'               => 'kolom {field} harus mengandung sebuah angka desimal.',
	'differs'               => 'kolom {field} harus berbeda dari kolom {param}.',
	'exact_length'          => 'kolom {field} harus tepat {param} panjang karakter.',
	'greater_than'          => 'kolom {field} harus berisi sebuah angka yang lebih besar dari {param}.',
	'greater_than_equal_to' => 'kolom {field} harus berisi sebuah angka yang lebih besar atau sama dengan {param}.',
	'in_list'               => 'kolom {field} harus salah satu dari: {param}.',
	'integer'               => 'kolom {field} harus mengandung bilangan bulat.',
	'is_natural'            => 'kolom {field} hanya boleh berisi angka.',
	'is_natural_no_zero'    => 'kolom {field} hanya boleh berisi angka dan harus lebih besar dari nol.',
	'is_unique'             => 'kolom {field} harus mengandung sebuah nilai unik.',
	'less_than'             => 'kolom {field} harus berisi sebuah angka yang kurang dari {param}.',
	'less_than_equal_to'    => 'kolom {field} harus berisi sebuah angka yang kurang dari atau sama dengan {param}.',
	'matches'               => 'kolom {field} tidak cocok dengan kolom {param}.',
	'max_length'            => 'kolom {field} tidak bisa melebihi {param} panjang karakter.',
	'min_length'            => 'kolom {field} setidaknya harus {param} panjang karakter.',
	'numeric'               => 'kolom {field} hanya boleh mengandung angka.',
	'regex_match'           => 'kolom {field} tidak dalam format yang benar.',
	'required'              => 'kolom {field} diperlukan.',
	'required_with'         => 'kolom {field} diperlukan saat {param} hadir.',
	'required_without'      => 'kolom {field} diperlukan saat {param} tidak hadir.',
	'timezone'              => 'kolom {field} harus berupa sebuah zona waktu yang valid.',
	'valid_base64'          => 'kolom {field} harus berupa sebuah string base64 yang valid.',
	'valid_email'           => 'kolom {field} harus berisi sebuah alamat email yang valid.',
	'valid_emails'          => 'kolom {field} harus berisi semua alamat email yang valid.',
	'valid_ip'              => 'kolom {field} harus berisi sebuah IP yang valid.',
	'valid_url'             => 'kolom {field} harus berisi sebuah URL yang valid.',
	'valid_date'            => 'kolom {field} harus berisi sebuah tanggal yang valid.',

	// Credit Cards
	'valid_cc_num'          => '{field} tidak tampak sebagai sebuah nomor kartu kredit yang valid.',

	// Files
	'uploaded'              => '{field} bukan sebuah berkas diunggah yang valid.',
	'max_size'              => '{field} terlalu besar dari sebuah berkas.',
	'is_image'              => '{field} bukan berkas gambar diunggah yang valid.',
	'mime_in'               => '{field} tidak memiliki sebuah tipe mime yang valid.',
	'ext_in'                => '{field} tidak memiliki sebuah ekstensi berkas yang valid.',
	'max_dims'              => '{field} bukan gambar, atau terlalu lebar atau tinggi.',
];