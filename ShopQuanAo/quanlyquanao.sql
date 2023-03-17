-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 25, 2022 lúc 10:05 AM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlydathang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `SoDonDH` int(2) NOT NULL,
  `MSHH` int(2) NOT NULL,
  `SoLuong` int(2) NOT NULL,
  `GiaDatHang` int(11) NOT NULL,
  `GiamGia` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dathang`
--

CREATE TABLE `dathang` (
  `SoDonDH` int(2) NOT NULL,
  `MaThanhToan` int(11) NOT NULL,
  `MSKH` int(2) NOT NULL,
  `MSNV` int(2) NOT NULL,
  `NgayDH` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `NgayGH` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TrangThaiDH` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1: Chưa Xử Lý; 2: Đang Xử Lý; 3: Đã Xử Lý; 4: Hủy',
  `HoTenKH` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `TenCongTy` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SoDienThoai` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Ghichu` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diachikh`
--

CREATE TABLE `diachikh` (
  `MaDC` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MSKH` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diachikh`
--

INSERT INTO `diachikh` (`MaDC`, `DiaChi`, `MSKH`) VALUES
('DC01', 'Công ty Bình Thạnh, Quận Ninh Kiều, Thành phố Cần ', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MSHH` int(2) NOT NULL,
  `MaLoaiHangid` int(11) NOT NULL,
  `TenHH` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `QuyCach` varchar(9000) COLLATE utf8_unicode_ci NOT NULL,
  `Gia` int(8) NOT NULL,
  `SoLuongHang` int(2) NOT NULL,
  `MaLoaiHang` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`MSHH`, `MaLoaiHangid`, `TenHH`, `QuyCach`, `Gia`, `SoLuongHang`, `MaLoaiHang`, `image`, `status`) VALUES
(1, 1, 'iPhone 13 Pro Max 128 GB', 'iPhone 13 Pro Max 128 GB siêu phẩm mới từ Apple được mong đợi nhất trong nửa cuối năm 2021 với hàng loạt nâng cấp từ màn hình ProMotion 120 Hz, bộ vi xử lý A15 Bionic cho hiệu năng không đối thủ, thời lượng pin vượt trội và bộ 3 camera được nâng cấp đáng kể, hứa hẹn sẽ tiếp tục khuấy đảo thị trường di động Việt.', 33990000, 20, 'ML01', 'ip13.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MSKH` int(11) NOT NULL,
  `USERNAMEKH` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `PASSWORD` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HoTenKH` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TenCongTy` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SoDienThoai` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MSKH`, `USERNAMEKH`, `PASSWORD`, `HoTenKH`, `TenCongTy`, `SoDienThoai`) VALUES
(1, 'ntphu', '630fe2bcedcab25516f39e9a9a999060', 'Ngo Ton Phu', 'Ninh Kieu, Can Tho', '0326567709');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaihang`
--

CREATE TABLE `loaihang` (
  `MaLoaiHang` int(2) NOT NULL,
  `TenLoaiHang` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaihang`
--

INSERT INTO `loaihang` (`MaLoaiHang`, `TenLoaiHang`, `status`) VALUES
(1, 'iPhone', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MSNV` int(2) NOT NULL,
  `HoTenNV` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ChucVu` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DiaChi` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SoDienThoai` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MSNV`, `HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`) VALUES
(1, 'Huỳnh Thị Bưởi', 'Bán Hàng', 'Cờ Đỏ, Cần Thơ.', '095245756'),
(2, 'Nguyễn Thị Nợ', 'Thủ Kho', 'Ninh Kiều, Cần Thơ.', '078418365'),
(3, 'Quách Thị Thiếu', 'Giao dịch', 'Bình Thủy, Cần Thơ', '026267731'),
(4, 'Trần Năm Trăm', 'Quản Lý', 'Xuân Khánh, Cần Thơ.', '073634149');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhtoan`
--

CREATE TABLE `thanhtoan` (
  `id` int(2) NOT NULL,
  `TenHinhThucTT` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhtoan`
--

INSERT INTO `thanhtoan` (`id`, `TenHinhThucTT`, `Status`) VALUES
(1, 'Thanh Toán Qua Tài Khoản Ngân Hàng', 1),
(2, 'Thanh Toán Trực Tiếp Khi Nhận Hàng', 1),
(3, 'Thanh Toán Tại Cửa Hàng', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD PRIMARY KEY (`SoDonDH`,`MSHH`);

--
-- Chỉ mục cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`SoDonDH`);

--
-- Chỉ mục cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  ADD PRIMARY KEY (`MaDC`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MSHH`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MSKH`);

--
-- Chỉ mục cho bảng `loaihang`
--
ALTER TABLE `loaihang`
  ADD PRIMARY KEY (`MaLoaiHang`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MSNV`);

--
-- Chỉ mục cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  MODIFY `SoDonDH` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dathang`
--
ALTER TABLE `dathang`
  MODIFY `SoDonDH` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MSKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `loaihang`
--
ALTER TABLE `loaihang`
  MODIFY `MaLoaiHang` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MSNV` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
