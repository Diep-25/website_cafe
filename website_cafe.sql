-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 16, 2022 lúc 08:20 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `website_cafe`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_anhthongtin`
--

CREATE TABLE `tbl_anhthongtin` (
  `id_anhthongtin` int(11) NOT NULL,
  `anh_thongtin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_anhthongtin`
--

INSERT INTO `tbl_anhthongtin` (`id_anhthongtin`, `anh_thongtin`) VALUES
(5, '1648340627_bannerchatttttt.jpeg'),
(9, '1648340277_5.jpg'),
(10, '1648764956_vitri.jpg'),
(11, 'bannnermoii.jpg'),
(12, '1652020032_bannner_diep.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `id_blog` int(11) NOT NULL,
  `anh_blog` varchar(50) NOT NULL,
  `tieude_blog` text NOT NULL,
  `noidung_blog` text NOT NULL,
  `tomtatnoidung_blog` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_blog`
--

INSERT INTO `tbl_blog` (`id_blog`, `anh_blog`, `tieude_blog`, `noidung_blog`, `tomtatnoidung_blog`) VALUES
(6, '1648337666_pho-sai-gon-3.jpg', '7 công việc/ngành nghề/nơi làm việc  liên quan đến ngành học', '<blockquote>\r\n<ol>\r\n	<li>Lập tr&igrave;nh web</li>\r\n	<li>Bảo mật</li>\r\n	<li>Lập tr&igrave;nh game</li>\r\n	<li>Quản l&yacute; cơ sở dữ liệu</li>\r\n	<li>Nh&agrave; ph&aacute;t triển phần mềm</li>\r\n	<li>Chuy&ecirc;n gia mạng</li>\r\n	<li>Kỹ sư điện to&aacute;n đ&aacute;m m&acirc;y</li>\r\n</ol>\r\n</blockquote>\r\n', '<p>7 c&ocirc;ng việc/ng&agrave;nh nghề/nơi l&agrave;m việc&nbsp; li&ecirc;n quan đến ng&agrave;nh học</p>\r\n'),
(10, '1649881130_banner_moi.jpg', 'Bắc Bộ và Bắc Trung Bộ mưa rét do ảnh hưởng của không khí lạnh', '<p><strong>HTML</strong>&nbsp;được tạo ra bởi Tim Berners-Lee, một nh&agrave; vật l&yacute; học của trung t&acirc;m nghi&ecirc;n cứu CERN ở Thụy Sĩ. Hiện nay, HTML đ&atilde; trở th&agrave;nh một chuẩn Internet được tổ chức W3C (World Wide Web Consortium) vận h&agrave;nh v&agrave; ph&aacute;t triển. Bạn c&oacute; thể tự t&igrave;m kiếm t&igrave;nh trạng mới nhất của HTML tại bất kỳ thời điểm n&agrave;o tr&ecirc;n Website của W3C.</p>\r\n\r\n<p>Phi&ecirc;n bản đầu ti&ecirc;n của&nbsp;<strong>HTML</strong>&nbsp;xuất hiện năm 1991, gồm 18 tag HTML. Phi&ecirc;n bản HTML 4.01 được xuất bản năm 1999. Sau đ&oacute;, c&aacute;c nh&agrave; ph&aacute;t triển đ&atilde; thay thế HTML bằng XHTML v&agrave;o năm 2000.</p>\r\n\r\n<p>Đến năm 2014, HTML được n&acirc;ng cấp l&ecirc;n chuẩn HTML5 với nhiều tag được th&ecirc;m v&agrave;o markup, mục đ&iacute;ch l&agrave; để x&aacute;c định r&otilde; nội dung thuộc loại l&agrave; g&igrave; (v&iacute; dụ như: &lt;article&gt;, &lt;header&gt;, &lt;footer&gt;,&hellip;).&nbsp;</p>\r\n\r\n<p><strong>Theo Mozilla Developer Network</strong>&nbsp;th&igrave;&nbsp;<strong>HTML Element Reference</strong>&nbsp;hiện nay c&oacute; khoảng&nbsp;<strong>hơn 140 tag</strong>. Tuy nhi&ecirc;n một v&agrave;i tag trong số đ&oacute; đ&atilde; bị tạm ngưng (do kh&ocirc;ng được hỗ trợ bởi c&aacute;c tr&igrave;nh duyệt hiện h&agrave;nh).</p>\r\n\r\n<p><strong>HTML document</strong>&nbsp;c&oacute; đu&ocirc;i file dạng .html hoặc htm. Bạn c&oacute; thể xem ch&uacute;ng bằng c&aacute;c tr&igrave;nh duyệt web hiện h&agrave;nh như Google Chrome, Firefox, Safari,&hellip; Nhiệm vụ của tr&igrave;nh duyệt l&agrave; đọc những file HTML n&agrave;y v&agrave; &ldquo;biến đổi&rdquo; ch&uacute;ng th&agrave;nh một dạng nội dung visual tr&ecirc;n Internet sao cho người d&ugrave;ng c&oacute; thể xem v&agrave; hiểu được ch&uacute;ng.</p>\r\n\r\n<p>Th&ocirc;ng thường, một Website sẽ c&oacute; nhiều&nbsp;<strong>HTML document</strong>&nbsp;(v&iacute; dụ: trang chủ, trang blog, trang li&ecirc;n hệ,&hellip;) v&agrave; mỗi trang con như vậy sẽ c&oacute; một tệp HTML ri&ecirc;ng. Mỗi t&agrave;i liệu HTML bao gồm 1 bộ tag (hay c&ograve;n gọi l&agrave; element). N&oacute; tạo ra một cấu tr&uacute;c tương tự như c&acirc;y thư mục với c&aacute;c heading, section, paragraph,&hellip; v&agrave; một số khối nội dung kh&aacute;c. Hầu hết tất cả c&aacute;c HTML element đều c&oacute; một tag mở v&agrave; một tag đ&oacute;ng với cấu tr&uacute;c &lt;tag&gt;&lt;/tag&gt;.</p>\r\n\r\n<p><strong>HTML&nbsp;</strong>được sử dụng để tạo bố cục, cấu tr&uacute;c trang web. N&oacute; c&oacute; một số ưu điểm sau:</p>\r\n\r\n<ul>\r\n	<li>C&oacute; nhiều t&agrave;i nguy&ecirc;n hỗ trợ với cộng đồng người d&ugrave;ng v&ocirc; c&ugrave;ng lớn</li>\r\n	<li>C&oacute; thể hoạt động mượt m&agrave; tr&ecirc;n hầu hết mọi tr&igrave;nh duyệt hiện nay</li>\r\n	<li>Học HTML kh&aacute; đơn giản</li>\r\n	<li>C&aacute;c markup sử dụng trong HTML thường ngắn gọn, c&oacute; độ đồng nhất cao</li>\r\n	<li>Sử dụng m&atilde; nguồn mở, ho&agrave;n to&agrave;n miễn ph&iacute;</li>\r\n	<li>HTML l&agrave; chuẩn web được vận h&agrave;nh bởi W3C</li>\r\n	<li>Dễ d&agrave;ng để t&iacute;ch hợp với c&aacute;c loại ng&ocirc;n ngữ backend (v&iacute; dụ như: PHP, Node.js,&hellip;)</li>\r\n</ul>\r\n', '<p>Do ảnh hưởng của kh&ocirc;ng kh&iacute; lạnh, h&ocirc;m nay (27/3)</p>\r\n'),
(11, '1648337655_5.jpg', 'Hạnh phúc rất gần ở đây', '<p>Bạn nghĩ thế n&agrave;o về hạnh ph&uacute;c?</p>\r\n\r\n<p>Bạn nghĩ một người như thế n&agrave;o th&igrave; được gọi l&agrave; hạnh ph&uacute;c?</p>\r\n\r\n<p>Để định nghĩa được hạnh ph&uacute;c, c&oacute; lẽ ở độ tuổi vẫn đang c&ograve;n nằm ph&iacute;a sườn b&ecirc;n n&agrave;y ngọn n&uacute;i của t&ocirc;i th&igrave; quả l&agrave; kh&ocirc;ng xứng, nếu n&oacute;i một c&aacute;ch chắc như đinh đ&oacute;ng cột th&igrave; người ta lại bảo l&agrave; đứa kho&aacute;c l&aacute;c. N&ecirc;n ch&uacute;ng ta ở đ&acirc;y chỉ l&agrave; đang b&agrave;n luận với nhau về hạnh ph&uacute;c th&ocirc;i nh&eacute;.</p>\r\n\r\n<p>Khi t&ocirc;i đang mất phương hướng v&agrave; bị kẹt lại ở h&agrave;ng loạt c&acirc;u hỏi &quot; M&igrave;nh đang sống v&igrave; điều g&igrave;? Mục đ&iacute;ch sống của m&igrave;nh l&agrave; hạnh ph&uacute;c sao? Bằng c&aacute;ch n&agrave;o? Bằng c&aacute;ch cố gắng kiếm thật nhiều tiền để cuộc sống được thoải m&aacute;i ư? Nhưng khi nhiều tiền cuộc sống c&oacute; thực sự thoải m&aacute;i kh&ocirc;ng, hay mỗi ng&agrave;y tr&ocirc;i qua đều thật vất vả v&agrave; mệt mỏi, tiền l&agrave;m ra cũng chẳng c&oacute; thời gian ti&ecirc;u. Nhưng nếu m&igrave;nh muốn một ng&agrave;y tr&ocirc;i qua tự do theo &yacute; m&igrave;nh th&igrave; về tinh thần n&oacute; thoải m&aacute;i thật, nhưng lại chật vật về vật chất.</p>\r\n\r\n<p>Những l&uacute;c như vậy, t&ocirc;i thường vớ đại một người rồi thẩn thờ hỏi &quot;Hạnh ph&uacute;c l&agrave; g&igrave;? Bạn c&oacute; đang hạnh ph&uacute;c kh&ocirc;ng?&quot; C&oacute; người n&oacute;i với t&ocirc;i rằng hạnh ph&uacute;c l&agrave; khi c&oacute; đủ những thứ m&igrave;nh muốn. V&agrave; cũng c&oacute; người lại bảo rằng hạnh ph&uacute;c l&agrave; khi ta h&agrave;i l&ograve;ng về tất cả những thứ ở hiện tại. Nếu m&agrave; nghĩ vậy th&igrave; liệu c&oacute; đ&uacute;ng kh&ocirc;ng, khi m&agrave; l&ograve;ng tham cũng như mong muốn của con người l&agrave; v&ocirc; đ&aacute;y.</p>\r\n', '<p>Hạnh ph&uacute;c đang ở ngay trong đầu bạn, ở ngay trong từng chi tiết hằng ng&agrave;y bạn đang trải qua. Đừng cố t&igrave;m kiếm ở đ&acirc;u xa x&ocirc;i. Hạnh ph&uacute;c l&agrave; do bạn tạo ra. V&agrave; cũng đừng cho m&igrave;nh l&agrave; người bất hạnh v&igrave; l&agrave;m g&igrave; c&oacute; người bất</p>\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chitietgiohang`
--

CREATE TABLE `tbl_chitietgiohang` (
  `id_giohangchitiet` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `ma_giohang` int(11) NOT NULL,
  `soluongmua` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_chitietgiohang`
--

INSERT INTO `tbl_chitietgiohang` (`id_giohangchitiet`, `id_sanpham`, `ma_giohang`, `soluongmua`) VALUES
(117, 37, 7736, '2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giohang`
--

CREATE TABLE `tbl_giohang` (
  `ma_giohang` int(10) NOT NULL,
  `ten_khachhang` varchar(255) NOT NULL,
  `dienthoai` varchar(255) NOT NULL,
  `diachi` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `phuongthuc` int(11) NOT NULL,
  `thoi_gian` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_giohang`
--

INSERT INTO `tbl_giohang` (`ma_giohang`, `ten_khachhang`, `dienthoai`, `diachi`, `email`, `tinhtrang`, `phuongthuc`, `thoi_gian`) VALUES
(7736, 'Ngô Văn Điệp', '0972352875', '472 núi thành - đà nẵng', 'ngoquangdiep2001@gmail.com', 0, 1, '2022-05-16 17:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_magiam`
--

CREATE TABLE `tbl_magiam` (
  `id_magiam` int(11) NOT NULL,
  `ma` varchar(255) NOT NULL,
  `phan_tram` varchar(255) NOT NULL,
  `email_khachhang` varchar(255) NOT NULL,
  `tinh_trang` int(11) NOT NULL,
  `ma_giohang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_magiam`
--

INSERT INTO `tbl_magiam` (`id_magiam`, `ma`, `phan_tram`, `email_khachhang`, `tinh_trang`, `ma_giohang`) VALUES
(23, 'q8b5x', '30', 'ngoquangdiep2001@gmail.com', 0, 7865),
(24, '2wpdl', '10', 'diep_1951220125@dau.edu.vn', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `tenmenu` varchar(100) NOT NULL,
  `thutu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `tenmenu`, `thutu`) VALUES
(17, 'Cafe', 1),
(24, 'Sinh tố', 2),
(26, 'Sữa chua', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `ten_sanpham` varchar(255) NOT NULL,
  `gia_sanpham` varchar(255) NOT NULL,
  `soluong` varchar(255) NOT NULL,
  `soluongcon` varchar(50) NOT NULL,
  `soluongban` varchar(50) NOT NULL,
  `chitiet_sanpham` text NOT NULL,
  `id_menu` int(11) NOT NULL,
  `anh_sanpham` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id_sanpham`, `ten_sanpham`, `gia_sanpham`, `soluong`, `soluongcon`, `soluongban`, `chitiet_sanpham`, `id_menu`, `anh_sanpham`) VALUES
(23, 'cafe sua', '123456', '107', '', '', '<p>ngon</p>\r\n', 17, '1651567508_bac_xiu.jpg'),
(24, 'Caffe đen ', '14000', '23', '', '', 'Caffe đen ', 17, '1648763155_anh-dep-ben-ly-cafe_110730424.jpg'),
(26, 'Sinh tố xoài', '30000', '33', '', '', 'Sinh tố xoài', 24, '1648764635_cach-lam-sua-chua-xoai.jpg'),
(28, 'Sữa chua đá', '16000', '35', '', '', 'Sữa chua đá', 26, '1649117085_yaourt-da.jpg'),
(30, 'gdgdfg', '22222', '1091', '', '', '<p>wwwwwwwwww</p>\r\n', 17, '1649116907_Cafe-cappuccino.jpg'),
(31, 'Sinh tố xoài', '20000', '2222198', '', '', 'Sinh tố xoài', 24, '1649116935_sua-chua-xoai-1.jpg'),
(32, 'Sữa chua dâu', '15000', '20', '', '', 'Sữa chua dâu', 26, '1649117054_unnamed (1).jpg'),
(33, 'Sữa chua Xoài', '25000', '30', '', '', 'Sữa chua Xoài', 26, '1649117151_ccaaa94f53bee74ba3c661f836d4e1ee.jpg'),
(34, 'Sinh tố ổi hồng', '15000', '15', '', '', 'Sinh tố ổi hồng', 24, '1651712295_cong-thuc-nuoc-ep-oi-hong-1.jpg'),
(35, 'Nâu lắc', '15000', '79', '', '', 'Nâu ', 17, '1650514688_cacao.jpg'),
(36, 'Bạc xỉu', '16000', '25', '', '', 'Bạc xỉu', 17, '1649117334_ly-ca-phe-bac-xiu-da.jpg'),
(37, 'Cafe sữa sài gòn ( đá , nóng )', '16000', '13', '11', '2', '<p>fffffffffff</p>\r\n', 17, '1649183488_cafe-sua-da.jpg'),
(38, 'Capuchino', '35000', '54', '', '', 'Capuchino', 17, '1651712320_Cafe-cappuccino.jpg'),
(39, 'Bánh ngọt', '122222', '30', '', '', 'Bánh ngọt', 24, '1651567564_banh_ngot_ct.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_taikhoan`
--

CREATE TABLE `tbl_taikhoan` (
  `id_taikhoan` int(11) NOT NULL,
  `ten_taikhoan` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dienthoai` varchar(255) NOT NULL,
  `diachi` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `anh` varchar(50) NOT NULL,
  `quyen` int(11) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL,
  `soluotmua` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_taikhoan`
--

INSERT INTO `tbl_taikhoan` (`id_taikhoan`, `ten_taikhoan`, `email`, `dienthoai`, `diachi`, `password`, `anh`, `quyen`, `code`, `status`, `soluotmua`) VALUES
(6, 'Ngô Văn Điệp', 'ngoquangdiep2001@gmail.com', '0972352875', '472 núi thành - đà nẵng', '$2y$10$dfibTfI6dfohacl/vcxrF.UET5YKPklq.EEbeH2d7aPSl.l2CiB9u', 'IMG_20220430_204052.jpg', 1, 0, 'verified', '16'),
(28, 'Ngô Văn Điệp', 'diep_1951220125@dau.edu.vn', '0965840200', '84 đỗ quỳ', '$2y$10$d70dvLygSLMFYYm6fqxAfO7fVi6q.ZeTk6F3fkkMsHDBEkiSP1rfy', '', 1, 0, 'verified', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_thongke`
--

CREATE TABLE `tbl_thongke` (
  `id` int(11) NOT NULL,
  `ngaydat` varchar(255) NOT NULL,
  `donhang` varchar(255) NOT NULL,
  `doanhthu` varchar(255) NOT NULL,
  `soluongban` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_thongke`
--

INSERT INTO `tbl_thongke` (`id`, `ngaydat`, `donhang`, `doanhthu`, `soluongban`) VALUES
(24, '2022-05-17', '1', '16000', '2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_thongtin`
--

CREATE TABLE `tbl_thongtin` (
  `id_thongtin` int(11) NOT NULL,
  `noidung_thongtin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_thongtin`
--

INSERT INTO `tbl_thongtin` (`id_thongtin`, `noidung_thongtin`) VALUES
(4, '<p>Với những nh&acirc;n vi&ecirc;n t&acirc;m huyết v&agrave; đội ngũ Barista t&agrave;i năng c&ugrave;ng những c&acirc;u chuyện c&agrave; ph&ecirc; đầy cảm hứng, ng&ocirc;i nh&agrave; 29 trương ch&iacute; cương, Q.Hải Ch&acirc;u, TP.Đ&agrave; Nẵng l&agrave; kh&ocirc;ng gian d&agrave;nh ri&ecirc;ng cho những ai tr&oacute;t y&ecirc;u say đắm hương vị của những hạt c&agrave; ph&ecirc; tuyệt hảo.</p>\r\n');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_anhthongtin`
--
ALTER TABLE `tbl_anhthongtin`
  ADD PRIMARY KEY (`id_anhthongtin`);

--
-- Chỉ mục cho bảng `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`id_blog`);

--
-- Chỉ mục cho bảng `tbl_chitietgiohang`
--
ALTER TABLE `tbl_chitietgiohang`
  ADD PRIMARY KEY (`id_giohangchitiet`);

--
-- Chỉ mục cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD PRIMARY KEY (`ma_giohang`);

--
-- Chỉ mục cho bảng `tbl_magiam`
--
ALTER TABLE `tbl_magiam`
  ADD PRIMARY KEY (`id_magiam`);

--
-- Chỉ mục cho bảng `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id_sanpham`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Chỉ mục cho bảng `tbl_taikhoan`
--
ALTER TABLE `tbl_taikhoan`
  ADD PRIMARY KEY (`id_taikhoan`);

--
-- Chỉ mục cho bảng `tbl_thongke`
--
ALTER TABLE `tbl_thongke`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_thongtin`
--
ALTER TABLE `tbl_thongtin`
  ADD PRIMARY KEY (`id_thongtin`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_anhthongtin`
--
ALTER TABLE `tbl_anhthongtin`
  MODIFY `id_anhthongtin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_chitietgiohang`
--
ALTER TABLE `tbl_chitietgiohang`
  MODIFY `id_giohangchitiet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  MODIFY `ma_giohang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9917;

--
-- AUTO_INCREMENT cho bảng `tbl_magiam`
--
ALTER TABLE `tbl_magiam`
  MODIFY `id_magiam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `tbl_taikhoan`
--
ALTER TABLE `tbl_taikhoan`
  MODIFY `id_taikhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `tbl_thongke`
--
ALTER TABLE `tbl_thongke`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `tbl_thongtin`
--
ALTER TABLE `tbl_thongtin`
  MODIFY `id_thongtin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD CONSTRAINT `tbl_sanpham_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `tbl_menu` (`id_menu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
