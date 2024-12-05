-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 05, 2024 lúc 11:44 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlnckh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detai`
--

CREATE TABLE `detai` (
  `id` int(30) NOT NULL,
  `madetai` varchar(100) NOT NULL,
  `makhoa` int(30) NOT NULL,
  `namthuchien` year(4) NOT NULL,
  `tendetai` text NOT NULL,
  `motadetai` text NOT NULL,
  `thanhvien` text NOT NULL,
  `banner_path` text NOT NULL,
  `document_path` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `mssv` int(30) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `kinhphi` int(11) NOT NULL,
  `msgv` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `detai`
--

INSERT INTO `detai` (`id`, `madetai`, `makhoa`, `namthuchien`, `tendetai`, `motadetai`, `thanhvien`, `banner_path`, `document_path`, `status`, `mssv`, `date_created`, `date_updated`, `kinhphi`, `msgv`) VALUES
(1, 'B2022-TCT-09', 10, '2022', 'Hệ thống quản lý rạp chiếu phim', '&lt;p style=&quot;text-align: justify; &quot;&gt;&lt;span style=&quot;color: rgb(8, 28, 54); font-family: SegoeuiPc, &amp;quot;Segoe UI&amp;quot;, &amp;quot;San Francisco&amp;quot;, &amp;quot;Helvetica Neue&amp;quot;, Helvetica, &amp;quot;Lucida Grande&amp;quot;, Roboto, Ubuntu, Tahoma, &amp;quot;Microsoft Sans Serif&amp;quot;, Arial, sans-serif; font-size: 15px; letter-spacing: 0.2px; white-space-collapse: preserve;&quot;&gt;Hệ thống quản l&yacute; rạp chiếu phim được x&acirc;y dựng dựa tr&ecirc;n những nhu cầu thực tế của kh&aacute;ch h&agrave;ng v&agrave; nh&agrave; quản l&yacute; nhằm giải quyết những kh&oacute; khăn gặp phải, giảm thiểu rủi ro trong qu&aacute; tr&igrave;nh quản l&yacute; rạp. Hệ thống hướng tới c&aacute;c đối tượng l&agrave; kh&aacute;ch h&agrave;ng v&agrave; những nh&acirc;n vi&ecirc;n quản l&yacute; trong rạp. Hệ thống c&oacute; c&aacute;c chức năng ch&iacute;nh bao gồm: quản l&yacute; phim, quản l&yacute; lịch chiếu, quản l&yacute; ph&ograve;ng chiếu, quản l&yacute; v&eacute;, đặt v&eacute;, quản l&yacute; người d&ugrave;ng v&agrave; quản l&yacute; th&ocirc;ng tin kh&aacute;ch h&agrave;ng. C&aacute;c chức năng n&agrave;y gi&uacute;p người quản l&yacute; dễ d&agrave;ng điều khiển qu&aacute; tr&igrave;nh hoạt động của rạp v&agrave; rất thuận tiện để kh&aacute;ch h&agrave;ng c&oacute; thể mua được v&eacute;.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', '', 'uploads/banners/archive-54.png?v=1713409622', 'uploads/pdf/archive-54.pdf?v=1713409622', 1, 1, '2024-04-18 10:07:02', '2024-04-18 10:48:57', 20000000, 'GV001'),
(2, 'B2023-TCT-10', 11, '2023', 'Giải pháp nâng cao hiệu quả hoạt động của doanh nghiệp siêu nhỏ Đồng bằng sông Cửu Long', '&lt;p&gt;&lt;div style=&quot;text-align: justify;&quot;&gt;&lt;span style=&quot;color: rgb(8, 28, 54); font-family: SegoeuiPc, &amp;quot;Segoe UI&amp;quot;, &amp;quot;San Francisco&amp;quot;, &amp;quot;Helvetica Neue&amp;quot;, Helvetica, &amp;quot;Lucida Grande&amp;quot;, Roboto, Ubuntu, Tahoma, &amp;quot;Microsoft Sans Serif&amp;quot;, Arial, sans-serif; font-size: 15px; letter-spacing: 0.2px; white-space-collapse: preserve;&quot;&gt;Doanh nghiệp si&ecirc;u nhỏ (DNSN) từ l&acirc;u đ&atilde; l&agrave; nh&acirc;n tố quan trọng trong mọi nền kinh tế, đặc biệt l&agrave; ở một quốc gia đang ph&aacute;t triển nhƣ Việt Nam. Hiệu quả hoạt động của c&aacute;c DNSN đang l&agrave; một vấn đề đƣợc c&aacute;c nh&agrave; nghi&ecirc;n cứu v&agrave; c&aacute;c nh&agrave; hoạch định ch&iacute;nh s&aacute;ch quan t&acirc;m. Tr&ecirc;n cơ sở dữ liệu thu thập từ c&aacute;c DNSN thuộc 5 ng&agrave;nh kinh tế, bao gồm sản xuất kinh doanh (SXKD) ph&acirc;n b&oacute;n v&agrave; thuốc bảo vệ thực vật (BVTV), SXKD t&ocirc;m giống, SXKD c&acirc;y giống, SXKD thủ c&ocirc;ng mỹ nghệ (TCMN) dừa v&agrave; kinh doanh dịch vụ lƣu tr&uacute;, đang hoạt động tr&ecirc;n địa b&agrave;n c&aacute;c tỉnh th&agrave;nh ở khu vực Đồng bằng s&ocirc;ng Cửu Long (ĐBSCL), ch&uacute;ng t&ocirc;i sử dụng phƣơng ph&aacute;p ph&acirc;n t&iacute;ch m&agrave;ng bao dữ liệu theo hướng tối đa h&oacute;a đầu ra ở bước 1 để đo lường hiệu quả hoạt động th&ocirc;ng &lt;/span&gt;&lt;span style=&quot;letter-spacing: 0.2px; color: rgb(8, 28, 54); font-family: SegoeuiPc, &amp;quot;Segoe UI&amp;quot;, &amp;quot;San Francisco&amp;quot;, &amp;quot;Helvetica Neue&amp;quot;, Helvetica, &amp;quot;Lucida Grande&amp;quot;, Roboto, Ubuntu, Tahoma, &amp;quot;Microsoft Sans Serif&amp;quot;, Arial, sans-serif; font-size: 15px; white-space-collapse: preserve;&quot;&gt;qua c&aacute;c chỉ số hiệu quả kỹ thuật, bao gồm chỉ số hiệu quả kỹ thuật đạt được từ bi&ecirc;n sản xuất cố định theo quy m&ocirc; (CRS_TE), chỉ số hiệu quả kỹ thuật đạt được từ bi&ecirc;n sản xuất biến đổi theo quy m&ocirc; (VRS_TE) v&agrave; chỉ số hiệu quả theo quy m&ocirc; (SE); sau đ&oacute; sử dụng m&ocirc; h&igrave;nh hồi quy Tobit ở bước 2 để x&aacute;c định c&aacute;c nh&acirc;n tố t&aacute;c động đến hiệu quả hoạt động của c&aacute;c DNSN trong từng lĩnh vực tr&ecirc;n địa b&agrave;n nghi&ecirc;n cứu&lt;/span&gt;&lt;/div&gt;&lt;/p&gt;', '', 'uploads/banners/archive-55.png?v=1713409922', 'uploads/pdf/archive-55.pdf?v=1713409922', 1, 6, '2024-04-18 10:12:02', '2024-04-18 10:49:04', 25000000, 'GV005'),
(3, '106.05-2019.306', 13, '2020', 'Sinh thái học, sinh học và hệ gen ty thể của giống cá Periophthalmus ở Đồng bằng sông Cửu Long Việt Nam', '&lt;p style=&quot;text-align: justify; &quot;&gt;Nghi&ecirc;n cứu l&yacute; thuyết để l&agrave;m cơ sở cho nghi&ecirc;n cứu bảo tồn ứng dụng. Đề t&agrave;i n&agrave;y vừa tiếp cận bằng c&aacute;ch quan s&aacute;t trực tiếp ngo&agrave;i thực địa v&agrave; thu mẫu để ph&acirc;n t&iacute;ch. Tất cả c&aacute;c nghi&ecirc;n cứu được thực hiện ở v&ugrave;ng ĐBSCL. Việt Nam trong 36 th&aacute;ng gồm thời gian thu mẫu v&agrave; ph&acirc;n t&iacute;ch mẫu. V&igrave; c&aacute;c lo&agrave;i c&aacute;c thuộc giống&amp;nbsp;Periophthalmus thường sống chủ yếu ở b&atilde;i b&ugrave;n ven biển v&agrave; phần b&igrave;a rừng ngập măn n&ecirc;n&amp;nbsp; mẫu c&aacute; được thu tại 4 điểm tiếp gi&aacute;p với biển Đ&ocirc;ng.&lt;/p&gt;', '', 'uploads/banners/archive-56.png?v=1713410338', 'uploads/pdf/archive-56.pdf?v=1713410338', 1, 2, '2024-04-18 10:18:58', '2024-04-18 10:49:09', 1088000, 'GV003'),
(4, 'B2022-TCT-11', 14, '2022', 'Nghiên cứu nhân nuôi ong mắt đỏ TRICHOGRAMMA sử dụng trong phòng trừ sâu hại bộ cánh vẩy (LEPIDOPTERA)', '&lt;p style=&quot;text-align: justify; &quot;&gt;- Bước đầu nghi&ecirc;n cứu về đặc điểm của c&aacute;c đối tượng Ong mắt đỏ Trichogramma sp., ng&agrave;i gạo Corcyra cephalonica tại Đ&agrave; Lạt v&agrave; x&acirc;y dựng quy tr&igrave;nh nh&acirc;n nu&ocirc;i Ong mắt đỏ&amp;nbsp;&lt;span style=&quot;font-size: 1rem;&quot;&gt;Trichogramma sp. tại ph&ograve;ng th&iacute; nghiệm.&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: justify; &quot;&gt;- Bước đầu đ&aacute;nh gi&aacute; khả năng k&yacute; sinh của Ong mắt đỏ Trichogramma sp. l&ecirc;n trứng s&acirc;u tơ Plutella xylostella nh&acirc;n nu&ocirc;i tại ph&ograve;ng th&iacute; nghiệm.&lt;/p&gt;', '', 'uploads/banners/archive-57.png?v=1713410882', 'uploads/pdf/archive-57.pdf?v=1713410882', 1, 3, '2024-04-18 10:28:02', '2024-04-18 10:49:15', 3500000, 'GV002'),
(5, '103.02-2020.64', 9, '2021', 'Nghiên cứu tổng hợp vật liệu zeolite từ tính Fe3O4/NaP có nguồn gốc từ tro trấu không nung và ứng dụng hấp phụ ion ion Cu2+, Pb2+, NO3- và PO43- trong nước của ao nuôi tôm', '&lt;p style=&quot;text-align: justify; &quot;&gt;Đề xuất nghi&ecirc;n cứu li&ecirc;n quan đến việc t&igrave;m ra một loại vật liệu zeolite th&acirc;n thi&ecirc;n với m&ocirc;i trường c&oacute; đầy đủ t&iacute;nh năng của một vật liệu hấp phụ nhưng được sản xuất từ nguồn phế phẩm n&ocirc;ng nghiệp rất phổ biến ở v&ugrave;ng Đồng bằng s&ocirc;ng Cửu Long. Mục đ&iacute;ch ban đầu của nghi&ecirc;n cứu n&agrave;y nhằm khẳng định lại khả năng tổng hợp zeolite NaP từ tro trấu kh&ocirc;ng nung bằng phương ph&aacute;p thủy nhiệt. C&aacute;c yếu tố ảnh hưởng đến qu&aacute; tr&igrave;nh tổng hợp zeolite NaP như tỷ lệ SiO2/Al2O3, thời gian phản ứng, nhiệt độ phản ứng v&agrave; thời gian gi&agrave; h&oacute;a cần được nhất qu&aacute;n nghi&ecirc;n cứu. Khả năng kết hợp của zeolite NaP v&agrave; vật liệu tự t&iacute;nh Fe3O4 cũng sẽ được nghi&ecirc;n cứu nhằm cải thiện bề mặt hấp phụ của vật liệu zeolite NaP tổng hợp. Ngo&agrave;i ra, nghi&ecirc;n cứu n&agrave;y sẽ so s&aacute;nh tiềm năng ứng dụng của zeolite từ t&iacute;nh Fe3O4/NaP v&agrave; NaP để hấp phụ một số ion Cu2+, Pb2+, NO3- v&agrave; PO43- trong nước giả thải v&agrave; tiến đến thử nghiệm nước của ao nu&ocirc;i t&ocirc;m.&lt;br&gt;&lt;/p&gt;', '&lt;p&gt;&lt;br&gt;&lt;/p&gt;', 'uploads/banners/archive-58.png?v=1713411651', 'uploads/pdf/archive-58.pdf?v=1713411651', 1, 5, '2024-04-18 10:40:51', '2024-04-18 10:49:21', 568000000, 'GV004');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangvien`
--

CREATE TABLE `giangvien` (
  `msgv` varchar(5) NOT NULL,
  `hoten` text NOT NULL,
  `hocham` text DEFAULT NULL,
  `hocvi` text NOT NULL,
  `makhoa` int(11) NOT NULL,
  `mataikhoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giangvien`
--

INSERT INTO `giangvien` (`msgv`, `hoten`, `hocham`, `hocvi`, `makhoa`, `mataikhoan`) VALUES
('GV001', 'Nguyễn Văn A', 'PGS', 'Tiến Sĩ', 10, 2),
('GV002', 'Trần Văn B', NULL, 'Tiến Sĩ', 14, 3),
('GV003', 'Lê Văn C', 'GS', 'Tiến Sĩ', 13, 4),
('GV004', 'Nguyễn Thị D', NULL, 'Thạc Sĩ', 9, 5),
('GV005', 'Nguyễn Văn E', NULL, 'Tiến Sĩ', 11, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa`
--

CREATE TABLE `khoa` (
  `id` int(30) NOT NULL,
  `matieuban` int(30) NOT NULL,
  `ten` text NOT NULL,
  `mota` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khoa`
--

INSERT INTO `khoa` (`id`, `matieuban`, `ten`, `mota`, `status`, `date_created`, `date_updated`) VALUES
(1, 8, 'Khoa Khoa học Chính trị', '', 1, '2024-04-06 21:26:01', '2024-04-06 21:31:16'),
(2, 1, 'Khoa Khoa học Tự nhiên', '', 1, '2024-04-06 21:26:34', '2024-04-06 21:31:25'),
(3, 8, 'Khoa Khoa học Xã hội và Nhân văn', '', 1, '2024-04-06 21:26:54', '2024-04-06 21:31:31'),
(4, 9, 'Khoa Luật ', '', 1, '2024-04-06 21:27:36', '2024-04-06 21:31:36'),
(5, 3, 'Khoa Môi trường và Tài nguyên thiên nhiên', '', 1, '2024-04-06 21:28:01', '2024-04-06 21:31:42'),
(6, 10, 'Khoa Ngoại ngữ ', '', 1, '2024-04-06 21:28:36', '2024-04-06 21:31:48'),
(7, 4, 'Khoa Phát triển Nông thôn  ', '', 1, '2024-04-06 21:29:03', '2024-04-06 21:31:56'),
(8, 7, 'Khoa Sư phạm ', '', 1, '2024-04-06 21:29:19', '2024-04-06 21:32:03'),
(9, 2, 'Trường Bách khoa', '', 1, '2024-04-06 21:29:38', '2024-04-06 21:32:09'),
(10, 2, 'Trường Công nghệ thông tin và truyền thông', '', 1, '2024-04-06 21:29:55', '2024-04-06 21:32:15'),
(11, 9, 'Trường Kinh tế', '', 1, '2024-04-06 21:30:10', '2024-04-06 21:32:23'),
(12, 4, 'Trường Nông nghiệp', '', 1, '2024-04-06 21:30:24', '2024-04-06 21:32:28'),
(13, 6, 'Trường Thủy sản', '', 1, '2024-04-06 21:30:36', '2024-04-06 21:32:34'),
(14, 5, 'Viện Công nghệ sinh học và thực phẩm', '', 1, '2024-04-06 21:30:46', '2024-04-06 21:32:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(50) NOT NULL,
  `chucvu` varchar(250) NOT NULL,
  `maso` text DEFAULT NULL,
  `hoten` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '0=not verified, 1 = verified',
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `chucvu`, `maso`, `hoten`, `username`, `password`, `avatar`, `last_login`, `type`, `status`, `date_added`, `date_updated`) VALUES
(1, 'Adminstrator', 'A123', 'Quản Trị Viên', 'admin', '0192023a7bbd73250516f069df18b500', 'uploads/gv-1.png?v=1713345463', NULL, 1, 1, '2021-01-20 14:02:37', '2024-04-17 16:21:55'),
(2, 'Giảng viên', 'TK1', 'Nguyễn Văn A', 'nva', '202cb962ac59075b964b07152d234b70', 'uploads/gv-2.png?v=1713365908', NULL, 2, 1, '2021-12-13 14:38:02', '2024-04-17 21:58:28'),
(3, 'Giảng Viên', 'TK2', 'Trần Văn B', 'tvb', '202cb962ac59075b964b07152d234b70', 'uploads/gv-3.png?v=1713408940', NULL, 2, 1, '2024-04-13 12:23:58', '2024-04-18 09:55:40'),
(4, 'Giảng Viên', 'TK3', 'Lê Văn C', 'lvc', '202cb962ac59075b964b07152d234b70', 'uploads/gv-4.png?v=1713409150', NULL, 2, 1, '2024-04-13 12:27:18', '2024-04-18 09:59:10'),
(5, 'Giảng Viên', 'TK4', 'Nguyễn Thị D', 'ntd', '202cb962ac59075b964b07152d234b70', 'uploads/gv-5.png?v=1713409102', NULL, 2, 1, '2024-04-13 12:28:13', '2024-04-18 09:58:22'),
(6, 'Giảng Viên', 'TK6', 'Nguyễn Văn E', 'nve', '202cb962ac59075b964b07152d234b70', 'uploads/gv-6.png?v=1713409122', NULL, 2, 1, '2024-04-18 09:06:32', '2024-04-18 09:58:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `id` int(30) NOT NULL,
  `nganh_khoa` text NOT NULL,
  `mssv` text NOT NULL,
  `hoten` text NOT NULL,
  `makhoa` int(30) NOT NULL,
  `matieuban` int(30) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `gioitinh` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `avatar` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`id`, `nganh_khoa`, `mssv`, `hoten`, `makhoa`, `matieuban`, `email`, `password`, `gioitinh`, `status`, `avatar`, `date_created`, `date_updated`) VALUES
(1, 'Hệ thống thông tin K47', 'B2103470', 'Đào Trần Quốc Phong', 10, 2, 'phongb2103470@student.ctu.edu.vn', '202cb962ac59075b964b07152d234b70', 'Nam', 1, 'uploads/student-1.png?v=1713356164', '2024-04-06 21:33:46', '2024-04-17 19:16:04'),
(2, 'Nuôi trồng thủy sản K46', 'B2003462', 'Lê Gia Lâm', 13, 6, 'lamb2003462@student.ctu.edu.vn', '202cb962ac59075b964b07152d234b70', 'Nam', 1, 'uploads/student-2.png?v=1713408284', '2024-04-18 09:15:58', '2024-04-18 09:44:44'),
(3, 'Công nghệ sinh học K48', 'B2203465', 'Lê Thị Hân', 14, 5, 'hanb2203465@student.ctu.edu.vn', '202cb962ac59075b964b07152d234b70', 'Nữ', 1, 'uploads/student-3.png?v=1713408365', '2024-04-18 09:19:07', '2024-04-18 09:46:05'),
(4, 'Công nghệ thông tin K47', 'b2110050', 'Lâm Tấn Lộc ', 10, 2, 'locb2110050@student.ctu.edu.vn', '202cb962ac59075b964b07152d234b70', 'Nam', 1, 'uploads/student-4.png?v=1713408389', '2024-04-18 09:23:04', '2024-04-18 09:46:29'),
(5, 'Kỹ thuật vật liệu K47', 'B2120051', 'Đỗ Nguyễn Minh Sang', 9, 2, 'sangb2120051@student.ctu.edu.vn', '202cb962ac59075b964b07152d234b70', 'Nam', 1, 'uploads/student-5.png?v=1713408414', '2024-04-18 09:25:35', '2024-04-18 09:46:54'),
(6, 'Kinh tế K48', 'B2230051', 'Nguyễn Thị Quỳnh', 11, 9, 'quynhb2230051@student.ctu.edu.vn', '202cb962ac59075b964b07152d234b70', 'Nữ', 1, 'uploads/student-6.png?v=1713408430', '2024-04-18 09:27:30', '2024-04-18 09:47:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'ten', 'QUẢN LÝ ĐỀ TÀI NCKH SINH VIÊN'),
(2, 'short_name', 'CT299 - PTHTW'),
(3, 'logo', 'uploads/logo-1713352399.png'),
(4, 'user_avatar', 'uploads/user_avatar.jpg'),
(5, 'cover', 'uploads/cover-1713352581.png'),
(6, 'content', 'Array'),
(7, 'email', 'ct299nhom6@gmail.com'),
(8, 'contact', '0123456789'),
(9, 'from_time', '06:00'),
(10, 'to_time', '17:00'),
(11, 'address', 'Khu II, đường 3/2, quận Ninh Kiều, Thành phố Cần Thơ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tieuban`
--

CREATE TABLE `tieuban` (
  `id` int(30) NOT NULL,
  `ten` text NOT NULL,
  `mota` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tieuban`
--

INSERT INTO `tieuban` (`id`, `ten`, `mota`, `status`, `date_created`, `date_updated`) VALUES
(1, 'Tiểu ban Khoa học tự nhiên', 'Bao gồm khoa Khoa học tự nhiên', 1, '2024-04-06 14:37:22', '2024-04-06 21:16:14'),
(2, 'Tiểu ban Công nghệ và Công nghệ Thông tin', 'Bao gồm Trường CNTT&TT và Trường Bách Khoa', 1, '2024-04-06 21:09:00', '2024-04-06 21:16:20'),
(3, 'Tiểu ban Môi trường và Tài nguyên Thiên nhiên', 'Bao gồm khoa Môi trường và Tài nguyên Thiên nhiên', 1, '2024-04-06 21:09:36', '2024-04-06 21:16:25'),
(4, 'Tiểu ban Khoa học Nông nghiệp và Phát triển Nông thôn', 'Bao gồm Trường Nông Nghiệp và Khoa Phát triển Nông thôn', 1, '2024-04-06 21:12:26', '2024-04-06 21:16:31'),
(5, 'Tiểu ban Công nghệ sinh học và Công nghệ Thực phẩm', 'Bao gồm viện Công nghệ sinh học và Công nghệ Thực phẩm', 1, '2024-04-06 21:12:54', '2024-04-06 21:16:39'),
(6, 'Tiểu ban Thủy sản', 'Bao gồm Trường Thủy Sản', 1, '2024-04-06 21:13:43', '2024-04-06 21:16:47'),
(7, 'Tiểu ban Khoa học Giáo dục', 'Bao gồm Khoa Sư Phạm', 1, '2024-04-06 21:14:02', '2024-04-06 21:16:55'),
(8, 'Tiểu ban Khoa học Xã hội Nhân văn – Khoa học Chính trị', 'Bao gồm khoa Khoa học Xã hội Nhân văn và khoa Khoa học Chính trị', 1, '2024-04-06 21:14:37', '2024-04-06 21:17:01'),
(9, 'Tiểu ban Kinh tế - Luật', 'Bao gồm Trường Kinh tế và Khoa Luật', 1, '2024-04-06 21:14:59', '2024-04-06 21:17:06'),
(10, 'Tiểu ban Khoa học Ngoại ngữ', 'Bao gồm Khoa Ngoại Ngữ', 1, '2024-04-06 21:15:20', '2024-04-06 21:17:12');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `detai`
--
ALTER TABLE `detai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `makhoa` (`makhoa`),
  ADD KEY `mssv` (`mssv`),
  ADD KEY `fk_detai_gv` (`msgv`);

--
-- Chỉ mục cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`msgv`),
  ADD KEY `fk_gv_khoa` (`makhoa`),
  ADD KEY `fk_gv_tk` (`mataikhoan`);

--
-- Chỉ mục cho bảng `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matieuban` (`matieuban`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING HASH,
  ADD KEY `makhoa` (`makhoa`),
  ADD KEY `matieuban` (`matieuban`);

--
-- Chỉ mục cho bảng `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tieuban`
--
ALTER TABLE `tieuban`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `detai`
--
ALTER TABLE `detai`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `khoa`
--
ALTER TABLE `khoa`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tieuban`
--
ALTER TABLE `tieuban`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `detai`
--
ALTER TABLE `detai`
  ADD CONSTRAINT `detai_ibfk_1` FOREIGN KEY (`mssv`) REFERENCES `sinhvien` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_detai_gv` FOREIGN KEY (`msgv`) REFERENCES `giangvien` (`msgv`);

--
-- Các ràng buộc cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD CONSTRAINT `fk_gv_khoa` FOREIGN KEY (`makhoa`) REFERENCES `khoa` (`id`),
  ADD CONSTRAINT `fk_gv_tk` FOREIGN KEY (`mataikhoan`) REFERENCES `nhanvien` (`id`);

--
-- Các ràng buộc cho bảng `khoa`
--
ALTER TABLE `khoa`
  ADD CONSTRAINT `tieuban_ibfk_1` FOREIGN KEY (`matieuban`) REFERENCES `tieuban` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `sinhvien_ibfk_1` FOREIGN KEY (`matieuban`) REFERENCES `tieuban` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sinhvien_ibfk_2` FOREIGN KEY (`makhoa`) REFERENCES `khoa` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
