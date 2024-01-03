-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 03, 2024 lúc 03:20 AM
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
-- Cơ sở dữ liệu: `webphim`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `status`, `slug`) VALUES
(14, 'Phim chiếu rạp', 'Phim chiếu rạp cập nhật hàng tháng', 1, 'phim-chieu-rap'),
(15, 'Phim bộ', 'Phim bộ cập nhật hàng ngày', 1, 'phim-bo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `countries`
--

INSERT INTO `countries` (`id`, `title`, `description`, `status`, `slug`) VALUES
(1, 'Phim Việt Nam', 'Phim Việt Nam cập nhật hàng ngày', 1, 'phim-viet-nam'),
(2, 'Phim Hàn Quốc', 'Phim Hàn Quốc cập nhật hàng ngày', 1, 'phim-han-quoc'),
(3, 'Phim Nhật Bản', 'Phim Nhật Bản cập nhật hàng ngày', 1, 'phim-nhat-ban'),
(4, 'Phim Trung Quốc', 'Phim Trung Quốc cập nhật mỗi ngày', 1, 'phim-trung-quoc'),
(5, 'Phim Thái Lan', 'Phim Thái Lan cập nhật mỗi ngày', 1, 'phim-thai-lan');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `episodes`
--

CREATE TABLE `episodes` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `linkphim` varchar(255) NOT NULL,
  `episode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `genres`
--

INSERT INTO `genres` (`id`, `title`, `description`, `status`, `slug`) VALUES
(1, 'Tâm lý', 'Phim tâm lý cập nhật mỗi ngày', 1, 'tam-ly'),
(2, 'Cổ trang', 'Phim cổ trang cập nhật mỗi ngày', 1, 'co-trang'),
(3, 'Kinh dị', 'Phim kinh dị cập nhật mỗi ngày', 1, 'kinh-di'),
(4, 'Võ thuật', 'Phim võ thuật cập nhật mỗi ngày', 1, 'vo-thuat'),
(5, 'Phiêu lưu', 'Phim phiêu lưu cập nhật mỗi ngày', 1, 'phieu-luu'),
(6, 'Gia đình', 'Phim gia đình cập nhật mỗi ngày', 1, 'gia-dinh'),
(7, 'Hoạt hình', 'Phim hoạt hình cập nhật mỗi ngày', 1, 'hoat-hinh'),
(8, 'Tình cảm', 'Phim tình cảm cập nhật mỗi ngày', 1, 'tinh-cam'),
(9, 'Hành động', 'Phim hành động cập nhật mỗi ngày', 1, 'hanh-dong'),
(10, 'Khoa học', 'Phim khoa học cập nhật mỗi ngày', 1, 'khoa-hoc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `hot` int(11) NOT NULL,
  `coming` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `resolution` int(11) NOT NULL DEFAULT 0,
  `subtitle` int(11) NOT NULL DEFAULT 0,
  `time` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `create_date` varchar(50) DEFAULT NULL,
  `update_date` varchar(50) DEFAULT NULL,
  `year` varchar(20) DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `topview` int(11) DEFAULT NULL,
  `season` int(11) DEFAULT 0,
  `trailer` varchar(100) DEFAULT NULL,
  `actor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `movies`
--

INSERT INTO `movies` (`id`, `title`, `hot`, `coming`, `slug`, `description`, `status`, `image`, `resolution`, `subtitle`, `time`, `category_id`, `genre_id`, `country_id`, `create_date`, `update_date`, `year`, `tags`, `topview`, `season`, `trailer`, `actor`) VALUES
(15, 'Chàng Quỷ Của Tôi', 1, 0, 'chang-quy-cua-toi', 'Chàng Quỷ Của Tôi – My Demon (2023) Do Do Hee là người kế nhiệm của Future Group. Cô ấy có một tính cách kiêu ngạo và lạnh lùng, người không tin tưởng vào bất cứ ai. Cô ấy hoài nghi về tình yêu. Do Do Hee dính líu đến một con quỷ tên là Jung Koo Won và kết hôn theo hợp đồng với anh ta. Cô phải đối mặt với những thay đổi lớn trong cuộc sống của mình.\r\n\r\nJung Koo Won là một con quỷ. Anh ta có thể sống vĩnh cửu bằng cách thực hiện những giao dịch nguy hiểm, nhưng ngọt ngào với những người chịu đựng cuộc sống địa ngục. Anh ta coi thường con người và anh ta đã rình mò trên thế giới này như một kẻ săn mồi đỉnh cao trong 200 năm. Anh ta dính líu đến Do Do Hee và bằng cách nào đó đột nhiên mất đi sức mạnh của mình. Vnsub.net, Sau đó, anh bước vào một cuộc hôn nhân hợp đồng với cô. Để ngăn chặn sự tuyệt chủng của chính mình, anh phải bảo vệ Do Do Hee, người đã lấy đi tất cả sức mạnh của mình. Mối quan hệ của họ phát triển lãng mạn.', 1, 'chang-quy-cua-toi-my-demon-tap-4-anh2-17262953.webp', 4, 0, 'Nhiều tập', 15, 8, 2, NULL, '2024-01-02 21:19:38', '2023', 'Chàng quỷ, Hàn Quốc', 1, NULL, '2_FxPYVHTns', 'Song Kang, Kim Yoo Jung'),
(16, 'Tết Ở Làng Địa Ngục', 1, 0, 'tet-o-lang-dia-nguc', 'Năm đó, tại một ngôi làng xa xôi trên một ngọn núi hoang vu, người ta đón Tết trong sự kinh hãi tột độ, hoài nghi đau đáu và giận dữ khôn cùng trước sự ập tới của những bi kich tàn khốc.\r\n\r\nNgôi làng ấy vốn dĩ không có tên, nhưng những người nơi đây mặc định chốn này là địa ngục. Dân trong làng không ai dám tự ý băng rừng thoát khỏi làng, càng không biết thế giới bên ngoài rộng lớn như thế nào, bởi lẽ họ sợ người khác sẽ biết rằng bản thân mình vốn là hậu duệ của băng cướp khét tiếng ở truông nhà Hồ dưới thời chúa Nguyễn ở Đàng Trong.\r\n\r\nVào một đêm cuối năm rét buốt, ông Thập – người duy nhất có thể ra khỏi làng – được báo mộng bởi một âm hồn mặc quan phục màu đỏ rực. Làng Địa Ngục sắp gặp họa lớn!', 1, 'photo-3-16965737204451763314515871.webp', 4, 0, '', 15, 3, 1, NULL, '2023-12-28 10:39:28', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Kẻ Ăn Hồn', 1, 0, 'ke-an-hon', 'Phim về hàng loạt cái chết bí ẩn ở Làng Địa Ngục, nơi có ma thuật cổ xưa: 5 mạng đổi bình Rượu Sọ Người. Thập Nương - cô gái áo đỏ là kẻ nắm giữ bí thuật luyện nên loại rượu mạnh nhất!', 1, 'press-teaserkahposter-16993448178375312914033957.webp', 2, 1, '109 phút', 14, 3, 1, NULL, '2023-12-29 13:53:48', '2023', 'Ma Viet Nam', 1, NULL, NULL, NULL),
(22, 'Mai', 0, 1, 'mai', 'Mới đây, Trấn Thành tung video hậu trường đầu tiên của phim điện ảnh Mai - tác phẩm dự kiến ra rạp mùng 1 tết Nguyên đán năm 2024. Video mang đến cái nhìn toàn cảnh về quá trình chuẩn bị, sản xuất dự án.\r\n\r\nĐạo diễn Trấn Thành cho biết anh mất 3 năm để hoàn thiện kịch bản, tuyển diễn viên và tìm bối cảnh cho Mai. Để tạo nên không gian ghi hình độc đáo, sinh động, Trấn Thành không ngần ngại đầu tư dàn thiết bị hoành tráng, máy móc hiện đại.\r\n\r\nSau Bố già, nam nghệ sĩ tiếp tục hợp tác với đạo diễn hình ảnh Diệp Thế Vinh. Hai người bàn bạc kỹ lưỡng để hiện thực hóa từng trang kịch bản, phản ánh trọn vẹn tâm lý nhân vật và câu chuyện.', 1, 'poster-Mai-scaled2273.jpg', 5, 3, '120 phút', 14, 8, 1, '2023-12-28 22:05:30', '2024-01-01 15:48:28', '2023', 'Mai, Tết 2024', 0, NULL, 'VweAKEjYw8c', NULL),
(23, 'Quỷ Cẩu', 1, 0, 'quy-cau', 'Nam về quê để lo đám tang cho bố sau cái chết kinh hoàng của ông, trong khi phải che giấu bạn gái đang mang thai. Nam mơ thấy gia đình bị giết sau khi mai táng bố, và Mít – con chó trắng của gia đình có biểu hiện kì lạ. Ông Quyết, bà Thúy, và bà Liễu thì tin vào thầy cúng, còn Nam nghi ngờ về lò mổ chó truyền thống của gia đình và phải điều tra để giải quyết sự kiện kỳ lạ đang diễn ra.', 1, 'quy-cau-14040.jpg', 4, 1, '100 phút', 14, 3, 1, '2023-12-28 22:11:05', '2023-12-28 22:11:05', '2023', 'Qủy cẩu', 1, 0, NULL, NULL),
(24, 'Xứ Sở Các Nguyên Tố', 1, 0, 'xu-so-cac-nguyen-to', 'Elemental lấy bối cảnh một đô thị sầm uất, nơi các cư dân lương thiện sống và làm việc. Họ là các nguyên tố tự nhiên như lửa, nước, khí, đất... Mỗi nguyên tố đều có những điểm mạnh, điểm yếu riêng. Họ chung sống hòa bình bên cạnh nhau, nhưng vẫn tôn trọng nguyên tắc hạn chế tương tác để không hòa trộn với nhau.\r\n\r\nMọi chuyện thay đổi khi chàng nước Wade tình cờ gặp nàng lửa Ember và hai người dần nảy sinh tình cảm. Vượt qua nhiều rào cản, họ nhận ra giữa các nguyên tố có nhiều điểm chung hơn họ nghĩ, và họ hoàn toàn có thể trở nên gắn kết với nhau mà không đánh mất bản sắc.', 1, 'download3326.jpg', 4, 1, '120 phút', 14, 7, 3, '2023-12-29 16:38:17', '2023-12-29 16:39:51', '2023', 'nguyên tố, elemental', 2, 0, NULL, NULL),
(25, 'Quỷ Ăn Tạng', 1, 0, 'quy-an-tang', 'Vào năm 1972, một sự việc kinh hoàng nhất đã xảy ra. Một cô gái trẻ ở một ngôi làng hẻo lánh ở tỉnh Kanchanaburi đã qua đời một cách bí ẩn. Khi nghe thấy một giọng nói dựng tóc gáy \"Tee Yod... Tee Yod...\" vang lên trong đêm. Sau khi Yak (Nadech Kugimiya) xuất ngũ, anh trở về phụ giúp gia đình theo lời của Hia Hang và bà Bunyen. Mẹ của Yak, có 5 người em trạc tuổi nhau gồm Yos, Yod, Yad, Yam và Yi Mọi chuyện phải kể từ lúc Yam (Mim Rattanawadee Wongthong) bị ốm thì những bí ẩn cũng bắt đầu xuất hiện. Yad (Denise Jelilcha) là người chứng kiến những sự việc tựa như một điềm báo. Nhưng vì còn trẻ, cô đã không suy nghĩ nhiều. Cho tới khi tình trạng của Yam dần xấu đi, với những biểu hiện khác lạ không thể giải đáp được. Và người ta tin rằng, Yam đã bị \"ma cà rồng\" nhập, nó ăn mòn nội tạng. Khiến cơ thể của Yam dần yếu đi. Cứ đêm xuống, là nghe thấy tiếng rên rỉ cùng với từ \"Tee Yod\". Dẫn đến một câu chuyện bí ẩn đầy ám ảnh, dù đã hơn 50 năm trôi qua nhưng vẫn khiến người nghe khiếp sợ.', 1, 'ty_700x10005841.jpg', 4, 0, '133 phút', 14, 3, 5, '2023-12-30 08:35:32', '2023-12-30 08:35:32', '2023', 'Ma Thái Lan', 2, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'hoangleanhkhoi1908@gmail.com', NULL, '$2y$10$EvivZW.ilmWifVPM0w6EV.mp/1DddpFvcpCdoGicfragOM8DX8sju', 'UYdoKyWT0qEIc8SuLk6ZYzMU6WIi3bIfdRz2fCFIfeqbQgAoBH8eHkOoZQEE', '2023-12-25 06:06:17', '2023-12-25 06:06:17');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
