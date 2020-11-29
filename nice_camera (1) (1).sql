-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 26, 2020 lúc 01:32 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nice_camera`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_accounts`
--

CREATE TABLE `admin_accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_accounts`
--

INSERT INTO `admin_accounts` (`id`, `name`, `username`, `email`, `phone`, `password`) VALUES
(1, 'duong thị huế', 'admin', 'duonghuevnbg@gmai.com', 337497023, 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `tenhang` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`id`, `tenhang`) VALUES
(1, 'Samsung'),
(2, 'Sony'),
(3, 'Nikon'),
(4, 'Fujjifilm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `content` mediumtext COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`id`, `iduser`, `content`) VALUES
(2, 17, 'sản phẩm chất lượng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_products` int(11) NOT NULL,
  `thongtin` mediumtext COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia` double NOT NULL,
  `thanhtien` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id_hang` int(11) NOT NULL,
  `gia` double NOT NULL,
  `image` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `thongtin` mediumtext COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `id_hang`, `gia`, `image`, `thongtin`) VALUES
(1, 'Sony Alpha A6000', 2, 11900000, '8151626cff13a8b9ac388bc5aa050e3e.jpeg', '<p>- Cảm biến: APS HD CMOS 24.3MP\r\n<p>- Hệ thống lấy nét: 25 điểm và tốc độ lấy nét cực nhanh 0.06 giây\r\n<p>- Chụp ảnh liên tục: 11 ảnh/ giây và chuyển hình nhanh với kêt nối Wifi.'),
(3, 'Samsung NX1', 1, 7000000, 'anh3.jpg', '<p>- Máy ảnh thế hệ mới \r\n<p>- Thiết kế nhỏ gọn\r\n<p>- Nhiều đố độ chụp tích hợp\r\n<p>- Độ nhạy sáng cao\r\n<p>- Màn hình: LCD TFT cảm ứng 3.2-inch, 1.037.000 pixel'),
(4, 'Samsung N1000', 1, 18000000, 'samsung3.jpg', '<p>- Thiết kế sang trọng\r\n<p>- Màu sắc đa dạng bắt mắt\r\n<p>- Độ phân giải cao và tốc độ chụp 0.04ms'),
(5, 'Samsung K2', 1, 9200000, 'mayanhss1.jpg', '<p>- Thiết kế sang trọng\r\n<p>- Màu chủ đạo là màu đen\r\n<p>- Kích thước nhỏ gọn dễ mang theo'),
(6, 'Samsung Lens', 1, 6500000, 'samsung2.jpg', '<p>- Kiểu dáng nhỏ gọn tiện dụng'),
(7, 'Sony Alpha 6300', 2, 12500000, 'sony1.jpg', '<p>-Màu sắc phong phú\r\n<p>- Dung lượng 16GB\r\n<p>- Tốc độ chụp 90mb/s'),
(8, 'Fujjifilm X-T20', 4, 9800000, 'fujifilm1.jpg', '<p>-Màu sắc sang trọng\r\n<p>- Ống kính siêu rộng\r\n<p>- Bộ chip hoạt động công suất cao\r\n<p>- Bộ xử lý hình ảnh: BIONZ X và ISO: 100 - 25600 '),
(9, 'Fujjifilm XE3', 4, 23000000, 'fujji2.jpg', '<p>-Mang kiểu dáng Rangefinder\r\n<p>- Đây là một kiểu thiết kế hoài cổ của fujji\r\n<p>-Ống kính 18-55mm'),
(29, 'Nikon D3500 Ki', 3, 10090000, 'may-anh-nikon-d3500-kit-afp-1855-vr.jpg', '<p>- Thiết kế nhỏ gọn tiện dụng\r\n<p>- Độ phân giải cao\r\n<p>- Tốc độ chụp 0.6ms'),
(30, 'Nikon D5600', 3, 16900000, 'nikon-d5600-kit-afs-18140-hang-nhap-khau.jpg', '<p>- Cảm biến: CMOS APS-C 25 MP, hiệu dụng: 24 MP\r\n<p>- Chip xử lý ảnh: Nikon EXPEED 4 , ISO: Auto, 100 - 25.600\r\n<p>- Tốc độ màn trập: 1/4000 - 30 giây và màn hình: LCD TFT cảm ứng 3.2-inch, 1.037.000 pixel\r\n<p>- Quay phim: 1080p@60fps, 720p@60fps, quay Timelapse\r\n<p>- Kết nối: USB 2.0, Bluetooth 4.1 LE, Wi-Fi 801.11b/g/n, mini-HDMI\r\n<p>- Cân nặng: 465g kèm pin. Pin tương thích EN-EL14\r\n<p>- Kích thước bộ lọc ø67mm. Hood tương thích: HB-32  (chọn thêm)'),
(31, 'Sony H300', 2, 3490000, '78afb553-216f-405f-bf6a-9bafc4d5398f_sony-may-anh-ky-thuat-so-may-anh-du-lich-20mp-zoom-35x-h300-may-anh-sony-h300.jpg', '<p>- Zoom quang học lên đến 35x. Cảm biến 20.1 MP Super HAD CCD\r\n<p>- Thân máy mang phong cách DSLR với giao diện sử dụng dễ dàng\r\n<p>- Quay phim HD (720p)');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `phone`, `address`, `password`) VALUES
(13, 'cấn chiến', 'chienhihe', 'canchien01121999@gmail.com', 347214898, 'sdasdsa', 'b64f0c45c1f42ecb0677d81983e6eb0b'),
(17, 'Duonghue', 'hue', 'duonghuevnbg@gmail.com', 337495023, 'bắc giang', '81dc9bdb52d04dc20036dbd8313ed055'),
(18, 'khanh', 'ngockhanh', 'duonghuevnbg@gmail.com', 33456268, 'bắc giang', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin_accounts`
--
ALTER TABLE `admin_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduser` (`iduser`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_products` (`id_products`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hang` (`id_hang`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin_accounts`
--
ALTER TABLE `admin_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`) ON DELETE NO ACTION;

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`id_products`) REFERENCES `products` (`id`) ON DELETE NO ACTION;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_hang`) REFERENCES `brand` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
