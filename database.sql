-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 15, 2022 lúc 05:14 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `food_code`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'Bugger'),
(2, 'Pizza'),
(3, 'Salad'),
(4, 'Tacos'),
(5, 'Đồ uống'),
(6, 'Gà rán');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `id_order`, `id_user`, `id_product`) VALUES
(1, 1, 22, 31),
(2, 1, 22, 30),
(3, 1, 22, 35),
(4, 2, 22, 36),
(5, 2, 22, 10),
(6, 3, 23, 31),
(7, 3, 23, 12),
(8, 3, 23, 29),
(9, 3, 23, 35),
(10, 3, 23, 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `id_cate` int(11) NOT NULL,
  `img` text DEFAULT NULL,
  `food_name` char(50) NOT NULL,
  `food_description` char(150) DEFAULT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `id_cate`, `img`, `food_name`, `food_description`, `price`) VALUES
(2, 6, '0f2d3a89b00thumb-20170310130553.jpg', 'Gà sốt BBQ Hàn Quấc', 'Gà rán vỏ giòn rưới sốt BBQ của Hàn Quấc', 83000),
(3, 6, '5c06711b94cong-thuc-4-chuan-lam-nen-mon-ga-ran-van-nguoi-me-cua-popeyes-ga-ran-2-1565149351-72-width660height440.jpg', 'Gà Không xương style popeyes', 'Gà rán giòn không xương 3 miếng 1 phần', 80000),
(4, 6, 'f3c2e1968acong-thuc-4-chuan-lam-nen-mon-ga-ran-van-nguoi-me-cua-popeyes-ga-ran-2-1565149351-72-width660height440.jpg', 'Gà sốt cay Hàn Quốc', 'Gà rán rưới sốt cay cấp độ 1', 82000),
(5, 6, '0ef716c7fdb8dd045339c7924d614ea973edbda7d4.jpg', 'Gà sốt siêu cay hàn quốc', 'Gà rán rưới sốt cay cấp độ 2', 82000),
(6, 6, '86fdef1c40maxresdefault-16274639369662082251649-0-0-630-1204-crop-16274639587751489100647.jpg', 'Gà cay bóng đêm Hàn Quốc', 'Gà rán rưới sốt cay cấp độ 3', 82000),
(7, 1, '538aa99884maxresdefault-16274639369662082251649-0-0-630-1204-crop-16274639587751489100647.jpg', 'Burger bò cơ bản', 'Burger bò với phần nhân bò dày 1cm', 59000),
(8, 1, 'f20bd9bfceburger-tom-cua.jpg', 'Burger tôm', 'Burger với phần nhân tôm cùng sốt hải sản', 63000),
(9, 1, '3ac6deddf4cach-lam-hamburger-ga.jpg', 'Burger gà', 'Burger với phần nhân gà không xương tẩm bột chiên giòn', 59000),
(10, 1, 'c3d64c40f0combo-bg--2-mieng-bo-nuong-whp-jr.jpg', 'Burger chay', 'Burger bới phần nhân từ nấm và bông cải xanh', 47000),
(11, 1, '7ec4d2e924combo-bg--2-mieng-bo-nuong-whp-jr.jpg', 'Burger bò big size', 'Burger bới phần nhân từ nấm và bông cải xanh', 82000),
(12, 1, 'c17a9e5e0e123123-jr.jpg', 'Burger Thanh long Việt Nam', 'Vỏ burger chế biến cùng thanh long đặc biệt chỉ có ở việt nam và phần nhân bò từ bò nội địa', 62000),
(13, 2, '668f989ce3Eq_it-na_pizza-margherita_sep2005_sml.jpg', 'Pizza cơ bản', 'Pizza với phần đế bình thường và topping bao gồm thịt nguội xúc xích phô mai sốt cà chua', 80000),
(14, 2, 'bcfb8457c0combo-bg--2-mieng-bo-nuong-whp-jr.jpg', 'Pizza Bò', 'Pizza với phần đế cơ bản với topping là bò xay sốt cà chua phô mai cùng với thơm', 86000),
(15, 2, 'f15ec7eb83nuóng-bánh-2.jpg', 'Pizza đế nhồi xúc xích', 'Pizza với phần đế nhồi phô mai và phần topping bao gồm thịt nguội xúc xích phô mai', 59000),
(16, 2, '430f831f0dpizza-rau-nấm-pizza-chay-recipe-main-photo.jpg', 'Pizza chay Bông cải xanh', 'Pizza chay với topping bông cải xanh nấm đông cô thơm trái olive phô mai chay ngũ cốc', 77000),
(17, 2, '6693c0ffcb1aba9e26a071b1316f0604ad96e1221a_output.jpeg', 'Pizza big size kiểu ý', 'Pizza truyền thống kiểu ý với đường kính 60 cm cùng nguyên liệu hương vị chuẩn ý', 200000),
(18, 2, '2f83c78421IMG_0614.jpg', 'Pizza thanh long việt Nam', 'Sản phẩm thuộc loại đồ ngọt với phần vỏ bánh chế biến cùng với thanh long việt nam phần topping gồm các loại trái cây nhiệt đới', 77000),
(19, 3, '7e458f4bb2cach-lam-salad-ga-nuong-bo.png', 'Salad gà cơ bản', 'Sadlad có phần topping là gà rán viên giòn', 59000),
(20, 3, '27dc651959pizza-rau-nấm-pizza-chay-recipe-main-photo.jpg', 'Salad Tôm', 'Salad có phần topping là tôm chiên giòn', 69000),
(21, 3, '2666cdb476cach-lam-salad-hoa-qua-5.jpg', 'Salad hoa quả', 'Salad thuần chay với phần topping quả nhiệt đới', 59000),
(22, 3, 'b4f215ca872-cach-lam-salad-nga-ngon-dung-chuan-nhu-ngoai-hang-202010311349531349.jpg', 'Salad kiểu nga', 'Salad truyền thống của nga', 80000),
(23, 3, '1c6cd673833-cach-lam-salad-cuc-ngon-giai-nhiet-mua-he-cach-lam-salad-2-1563421351-963-width600height400.jpg', 'Salad bơ', 'Salad sốt bơ', 46000),
(24, 3, '5c726c8497images2505989_2thanhlong1_niws.png', 'Salad Thanh Long Việt Nam', 'Sản phẩm ngọt với salad và thanh long Việt nam', 62000),
(25, 4, 'be607d1283123123.jpg', 'Tacos truyền thống', 'Phần gồm 2 chiếc tacos nhân bò', 59000),
(26, 4, '0e11cf7731123ng.jpg', 'Tacos Hải sản', 'Phần gồm 2 chiếc Tacos 1 nhân tôm và 1 nhân cua', 63000),
(27, 4, '8bddf2ee75cong-thuc-lam-mon-tacos-ga-kieu-mexico-voi-nuoc-sot-toi-cuc-de-lam-tai-nha-202109201018535920.jpg', 'Tacos nhân gà', 'Phần gồm 2 chiếc với nhân gà ướp', 59000),
(28, 4, '93927bb17ftrip14.com_aebb86cc8ad0dc1117e19c81d62cdea9.png', 'Tacos chay avocado', 'Tacos với phần nhân gồm bơ ngũ cốc', 47000),
(29, 4, '1b755547ea123ng.jpg', 'Tacos Thanh Long việt Nam', 'Gồm 2 chiếc Tacos có phần vỏ làm cùng với thanh long ruột đỏ của việt nam và phần nhân truyền thống', 82000),
(30, 4, 'ac31f15ccf123ng.jpg', 'Tacos kiểu ấn', 'Phần nhân bánh có hương vị cà ri của ấn độ', 42000),
(31, 5, 'b3fdd1edc012321321321.jpg', 'PepSi', 'PepSi lon', 12000),
(32, 5, '49301c28dc123ng.jpg', 'Trà Dâu', 'Ly 500ml', 28000),
(33, 5, '0010885677o3_f14456eb3eb445f29cc9ee3f8e35e7a8_grande.jpg', 'Trà ô long', 'ly 500ml', 23000),
(34, 5, '94b7063704o3_f14456eb3eb445f29cc9ee3f8e35e7a8_grande.jpg', 'Trà Dâu tằm', 'Ly 500ml', 23000),
(35, 5, '256c9c8c1a123213.jpg', 'Milo', 'Milo lon', 15000),
(36, 5, '75a8770b99thanhlong_1.jpg', 'Nước Ép Thanh Long', 'Ly 500ml', 32000),
(37, 5, 'f7c496d7ebimages.jpg', 'Coca Cola', 'Nước giải khát Coca Cola', 15000),
(39, 6, '3abdc2ef40Gà-Truyền-Thống-6-Miếng.jpg', 'Gà truyền thống', 'Gà rán vỏ giòn truyền thống', 79000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `user_name` text DEFAULT NULL,
  `img` text DEFAULT NULL,
  `phone` decimal(10,0) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `administrator` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `user_name`, `img`, `phone`, `address`, `administrator`) VALUES
(22, 'admin@admin', '25d55ad283aa400af464c76d713c07ad', 'Anh Vũ', '6f2538324aHD-wallpaper-misaki-kurehito-anime-no-sodatekata-saenai-heroine.jpg', '123', '123 đường nguyễn trãi', 1),
(23, '123@123', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, NULL, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
