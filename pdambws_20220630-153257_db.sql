#
# TABLE STRUCTURE FOR: bagian
#

DROP TABLE IF EXISTS `bagian`;

CREATE TABLE `bagian` (
  `id_bagian` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bagian` varchar(50) NOT NULL,
  PRIMARY KEY (`id_bagian`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

INSERT INTO `bagian` (`id_bagian`, `nama_bagian`) VALUES (1, 'Langganan');
INSERT INTO `bagian` (`id_bagian`, `nama_bagian`) VALUES (2, 'Umum');
INSERT INTO `bagian` (`id_bagian`, `nama_bagian`) VALUES (3, 'Keuangan');
INSERT INTO `bagian` (`id_bagian`, `nama_bagian`) VALUES (4, 'Pemeliharaan');
INSERT INTO `bagian` (`id_bagian`, `nama_bagian`) VALUES (5, 'Perencanaan');
INSERT INTO `bagian` (`id_bagian`, `nama_bagian`) VALUES (6, 'S P I');
INSERT INTO `bagian` (`id_bagian`, `nama_bagian`) VALUES (7, 'U P K');
INSERT INTO `bagian` (`id_bagian`, `nama_bagian`) VALUES (8, 'A M D K');


#
# TABLE STRUCTURE FOR: jabatan
#

DROP TABLE IF EXISTS `jabatan`;

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES (1, 'Kabag');
INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES (2, 'Ketua ');
INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES (3, 'Ka UPK');
INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES (4, 'Manager');
INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES (5, 'Kasubag');
INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES (6, 'Pelaksana Administrasi');
INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES (7, 'Pelaksana Teknik');
INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES (8, 'Pelaksana Pengaduan Pelanggan');
INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES (9, 'Anggota');
INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES (10, 'Staf Administrasi');
INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES (11, 'Staf Teknik');
INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES (13, 'Staf Pengaduan Pelanggan');
INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES (15, 'Direktur');


#
# TABLE STRUCTURE FOR: karyawan
#

DROP TABLE IF EXISTS `karyawan`;

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bagian` int(11) NOT NULL,
  `id_subag` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `status_pegawai` varchar(50) NOT NULL,
  `nik` varchar(8) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `jenkel` varchar(50) NOT NULL,
  `tmp_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tgl_masuk` date NOT NULL,
  `aktif` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `id_bagian` (`id_bagian`),
  KEY `id_subag` (`id_subag`),
  KEY `id_jabatan` (`id_jabatan`),
  CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`id_subag`) REFERENCES `subag` (`id_subag`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `karyawan_ibfk_2` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id_bagian`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `karyawan_ibfk_3` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

INSERT INTO `karyawan` (`id`, `id_bagian`, `id_subag`, `id_jabatan`, `nama`, `alamat`, `agama`, `status_pegawai`, `nik`, `no_hp`, `jenkel`, `tmp_lahir`, `tgl_lahir`, `tgl_masuk`, `aktif`) VALUES (1, 3, 9, 5, 'Dicky Erfan Septiono', 'Badean Bondowoso', 'Islam', 'Karyawan Tetap', '01410112', '0816591527', 'Laki-laki', 'Bondowoso', '1978-09-20', '2010-04-01', 1);
INSERT INTO `karyawan` (`id`, `id_bagian`, `id_subag`, `id_jabatan`, `nama`, `alamat`, `agama`, `status_pegawai`, `nik`, `no_hp`, `jenkel`, `tmp_lahir`, `tgl_lahir`, `tgl_masuk`, `aktif`) VALUES (2, 2, 3, 15, 'April Ariestha Bhirawa', 'Perum Tamansari Indah Bondowoso', 'Islam', 'Karyawan Tetap', '-', '085236165969', 'Laki-laki', 'Bondowoso', '1970-04-21', '1992-12-01', 1);
INSERT INTO `karyawan` (`id`, `id_bagian`, `id_subag`, `id_jabatan`, `nama`, `alamat`, `agama`, `status_pegawai`, `nik`, `no_hp`, `jenkel`, `tmp_lahir`, `tgl_lahir`, `tgl_masuk`, `aktif`) VALUES (4, 6, 14, 2, 'Supriyadi', 'Klabang Bondowoso', 'Islam', 'Karyawan Tetap', '01592049', '085311048058', 'Laki-laki', 'Bondowoso', '1968-05-02', '1992-05-01', 1);
INSERT INTO `karyawan` (`id`, `id_bagian`, `id_subag`, `id_jabatan`, `nama`, `alamat`, `agama`, `status_pegawai`, `nik`, `no_hp`, `jenkel`, `tmp_lahir`, `tgl_lahir`, `tgl_masuk`, `aktif`) VALUES (5, 1, 1, 1, 'Cipto Kusuma', 'Nangkaan Bondowoso', 'Islam', 'Karyawan Tetap', '05589009', '085203365470', 'Laki-laki', 'Banyuwangi', '1967-08-11', '1989-05-05', 1);
INSERT INTO `karyawan` (`id`, `id_bagian`, `id_subag`, `id_jabatan`, `nama`, `alamat`, `agama`, `status_pegawai`, `nik`, `no_hp`, `jenkel`, `tmp_lahir`, `tgl_lahir`, `tgl_masuk`, `aktif`) VALUES (6, 2, 3, 1, 'Siti Nuraini', 'Sukowiryo Bondowoso', 'Islam', 'Karyawan Tetap', '01592045', '081336463122', 'Perempuan', 'Bojonegoro', '1968-04-23', '1992-05-01', 1);
INSERT INTO `karyawan` (`id`, `id_bagian`, `id_subag`, `id_jabatan`, `nama`, `alamat`, `agama`, `status_pegawai`, `nik`, `no_hp`, `jenkel`, `tmp_lahir`, `tgl_lahir`, `tgl_masuk`, `aktif`) VALUES (9, 8, 15, 4, 'Ario Penangsang', 'jeruk sok-sok Curahdami', 'Islam', 'Karyawan Tetap', '01592055', '08123456789', 'Laki-laki', 'Bondowoso', '2022-06-20', '2022-06-20', 1);
INSERT INTO `karyawan` (`id`, `id_bagian`, `id_subag`, `id_jabatan`, `nama`, `alamat`, `agama`, `status_pegawai`, `nik`, `no_hp`, `jenkel`, `tmp_lahir`, `tgl_lahir`, `tgl_masuk`, `aktif`) VALUES (10, 7, 23, 6, 'Marlena Damayanti Sihombing', 'Sukowiryo Bondowoso', 'Islam', 'Karyawan Kontrak', '12345678', '081987654321', 'Perempuan', 'Bondowoso', '2022-06-30', '2022-06-30', 1);


#
# TABLE STRUCTURE FOR: kendaraan
#

DROP TABLE IF EXISTS `kendaraan`;

CREATE TABLE `kendaraan` (
  `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(11) NOT NULL,
  `id_merk` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `no_plat` varchar(9) NOT NULL,
  `no_rangka` varchar(20) NOT NULL,
  `no_mesin` varchar(20) NOT NULL,
  `jumlah_roda` varchar(1) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `warna` varchar(10) NOT NULL,
  `bahan_bakar` varchar(50) NOT NULL,
  `berlaku_sampai` date NOT NULL,
  PRIMARY KEY (`id_kendaraan`),
  KEY `id_merk` (`id_merk`),
  KEY `id_type` (`id_type`),
  KEY `id_karyawan` (`id_karyawan`),
  CONSTRAINT `kendaraan_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`) ON UPDATE CASCADE,
  CONSTRAINT `kendaraan_ibfk_2` FOREIGN KEY (`id_merk`) REFERENCES `merk` (`id_merk`) ON UPDATE CASCADE,
  CONSTRAINT `kendaraan_ibfk_3` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO `kendaraan` (`id_kendaraan`, `id_karyawan`, `id_merk`, `id_type`, `no_plat`, `no_rangka`, `no_mesin`, `jumlah_roda`, `tahun`, `warna`, `bahan_bakar`, `berlaku_sampai`) VALUES (1, 2, 5, 4, 'P5582AB', '123456789654', 'pl12659877aert', '4', '2012', 'silver', 'Solar', '2022-06-30');
INSERT INTO `kendaraan` (`id_kendaraan`, `id_karyawan`, `id_merk`, `id_type`, `no_plat`, `no_rangka`, `no_mesin`, `jumlah_roda`, `tahun`, `warna`, `bahan_bakar`, `berlaku_sampai`) VALUES (4, 4, 1, 2, 'P3396AB', '1234567988', 'ply12365841tre', '2', '1997', 'Hitam', 'Bensin', '2022-06-25');
INSERT INTO `kendaraan` (`id_kendaraan`, `id_karyawan`, `id_merk`, `id_type`, `no_plat`, `no_rangka`, `no_mesin`, `jumlah_roda`, `tahun`, `warna`, `bahan_bakar`, `berlaku_sampai`) VALUES (6, 6, 1, 5, 'P6953AB', '1234567988', 'ply123658412tre', '2', '2011', 'Hitam', 'Bensin', '2022-06-30');
INSERT INTO `kendaraan` (`id_kendaraan`, `id_karyawan`, `id_merk`, `id_type`, `no_plat`, `no_rangka`, `no_mesin`, `jumlah_roda`, `tahun`, `warna`, `bahan_bakar`, `berlaku_sampai`) VALUES (7, 5, 1, 3, 'P3385AB', '1234567988', 'ply12365841tre', '2', '2018', 'Hitam', 'Bensin', '2022-06-30');


#
# TABLE STRUCTURE FOR: merk
#

DROP TABLE IF EXISTS `merk`;

CREATE TABLE `merk` (
  `id_merk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_merk` varchar(50) NOT NULL,
  PRIMARY KEY (`id_merk`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

INSERT INTO `merk` (`id_merk`, `nama_merk`) VALUES (1, 'Honda');
INSERT INTO `merk` (`id_merk`, `nama_merk`) VALUES (2, 'Yamaha');
INSERT INTO `merk` (`id_merk`, `nama_merk`) VALUES (3, 'Suzuki');
INSERT INTO `merk` (`id_merk`, `nama_merk`) VALUES (4, 'Kawazaki');
INSERT INTO `merk` (`id_merk`, `nama_merk`) VALUES (5, 'Toyota');
INSERT INTO `merk` (`id_merk`, `nama_merk`) VALUES (7, 'Daihatsu');


#
# TABLE STRUCTURE FOR: subag
#

DROP TABLE IF EXISTS `subag`;

CREATE TABLE `subag` (
  `id_subag` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subag` varchar(50) NOT NULL,
  PRIMARY KEY (`id_subag`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

INSERT INTO `subag` (`id_subag`, `nama_subag`) VALUES (1, 'Langganan');
INSERT INTO `subag` (`id_subag`, `nama_subag`) VALUES (2, 'Penagihan');
INSERT INTO `subag` (`id_subag`, `nama_subag`) VALUES (3, 'Umum');
INSERT INTO `subag` (`id_subag`, `nama_subag`) VALUES (4, 'Administrasi');
INSERT INTO `subag` (`id_subag`, `nama_subag`) VALUES (5, 'Personalia');
INSERT INTO `subag` (`id_subag`, `nama_subag`) VALUES (6, 'Keuangan');
INSERT INTO `subag` (`id_subag`, `nama_subag`) VALUES (7, 'Kas');
INSERT INTO `subag` (`id_subag`, `nama_subag`) VALUES (8, 'Pembukuan');
INSERT INTO `subag` (`id_subag`, `nama_subag`) VALUES (9, 'Rekening');
INSERT INTO `subag` (`id_subag`, `nama_subag`) VALUES (10, 'Pemeliharaan');
INSERT INTO `subag` (`id_subag`, `nama_subag`) VALUES (11, 'Peralatan');
INSERT INTO `subag` (`id_subag`, `nama_subag`) VALUES (12, 'Perencanaan');
INSERT INTO `subag` (`id_subag`, `nama_subag`) VALUES (13, 'Pengawasan');
INSERT INTO `subag` (`id_subag`, `nama_subag`) VALUES (14, 'S P I');
INSERT INTO `subag` (`id_subag`, `nama_subag`) VALUES (15, 'A M D K');
INSERT INTO `subag` (`id_subag`, `nama_subag`) VALUES (16, 'I T');
INSERT INTO `subag` (`id_subag`, `nama_subag`) VALUES (17, 'Sukosari 1');
INSERT INTO `subag` (`id_subag`, `nama_subag`) VALUES (18, 'Maesan');
INSERT INTO `subag` (`id_subag`, `nama_subag`) VALUES (19, 'Tegalampel');
INSERT INTO `subag` (`id_subag`, `nama_subag`) VALUES (20, 'Tapen');
INSERT INTO `subag` (`id_subag`, `nama_subag`) VALUES (21, 'Prajekan');
INSERT INTO `subag` (`id_subag`, `nama_subag`) VALUES (22, 'Tlogosari');
INSERT INTO `subag` (`id_subag`, `nama_subag`) VALUES (23, 'Wringin');
INSERT INTO `subag` (`id_subag`, `nama_subag`) VALUES (24, 'Curahdami');
INSERT INTO `subag` (`id_subag`, `nama_subag`) VALUES (25, 'Tamanan');
INSERT INTO `subag` (`id_subag`, `nama_subag`) VALUES (26, 'Tenggarang');
INSERT INTO `subag` (`id_subag`, `nama_subag`) VALUES (27, 'Tamankrocok');
INSERT INTO `subag` (`id_subag`, `nama_subag`) VALUES (28, 'Wonosari');
INSERT INTO `subag` (`id_subag`, `nama_subag`) VALUES (29, 'Klabang');
INSERT INTO `subag` (`id_subag`, `nama_subag`) VALUES (30, 'Sukosari 2');
INSERT INTO `subag` (`id_subag`, `nama_subag`) VALUES (31, 'Bondowoso');
INSERT INTO `subag` (`id_subag`, `nama_subag`) VALUES (32, 'Quality Control');
INSERT INTO `subag` (`id_subag`, `nama_subag`) VALUES (33, 'Produksi');


#
# TABLE STRUCTURE FOR: type
#

DROP TABLE IF EXISTS `type`;

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `nama_type` varchar(50) NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO `type` (`id_type`, `nama_type`) VALUES (1, 'Revo X');
INSERT INTO `type` (`id_type`, `nama_type`) VALUES (2, 'Revo Fit');
INSERT INTO `type` (`id_type`, `nama_type`) VALUES (3, 'Win 100');
INSERT INTO `type` (`id_type`, `nama_type`) VALUES (4, ' Innova');
INSERT INTO `type` (`id_type`, `nama_type`) VALUES (5, 'Supra X');


#
# TABLE STRUCTURE FOR: user
#

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengguna` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `level` varchar(50) NOT NULL DEFAULT 'Pengguna',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

INSERT INTO `user` (`id`, `nama_pengguna`, `nama_lengkap`, `email`, `password`, `level`) VALUES (1, 'bilal', 'Bilal Zaidan', 'bilal@gmail.com', '$2y$10$tCFn.QpBdfdRVop8IGdJyefAWFOlk0mkCrDLuz6KPnCSCDXj43sqW', 'Admin');
INSERT INTO `user` (`id`, `nama_pengguna`, `nama_lengkap`, `email`, `password`, `level`) VALUES (2, 'dicky', 'Dicky Erfan Septiono', 'dicky@gmail.com', '$2y$10$8zVag1Z4PHi78euzVSUxY.BzFDqgQm4MD7pkO6ucUBp9/Pc3ye/xG', 'Admin');
INSERT INTO `user` (`id`, `nama_pengguna`, `nama_lengkap`, `email`, `password`, `level`) VALUES (7, 'lembayung', 'Lembayung Biru', 'lembayungbiru@gmail.com', '$2y$10$LLMxK7dAoiwP6k4MHPzis.oATWvQDMCCOkrwSE4muuUmMd4Y3OUxS', 'Admin');
INSERT INTO `user` (`id`, `nama_pengguna`, `nama_lengkap`, `email`, `password`, `level`) VALUES (13, 'Aryan', 'Arya Dwipanggah', 'aryan@gmail.com', '$2y$10$um8k82NQM7XIcySaEnAEQO0fNI0EznhGl91as1JKTXqZzzeXQUpLy', 'Pengguna');
INSERT INTO `user` (`id`, `nama_pengguna`, `nama_lengkap`, `email`, `password`, `level`) VALUES (16, 'Testing', 'Testing Aja', 'testing@gmail.com', '$2y$10$kqpPbnpPrAsoG8Pi0AZrheo3LQneLmNSOJ/BbpkqNisn6ipqGm.QW', 'Pengguna');


