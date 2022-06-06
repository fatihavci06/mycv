-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 06 Haz 2022, 11:38:37
-- Sunucu sürümü: 10.4.18-MariaDB
-- PHP Sürümü: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `mycv`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `content`, `created_at`, `updated_at`) VALUES
(14, 'fatih', '66fatihavci@gmail.com', 'e', '2022-06-05 06:27:18', '2022-06-05 06:27:18');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `egitims`
--

CREATE TABLE `egitims` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `education_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `university_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `university_branch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 999,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `language_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `egitims`
--

INSERT INTO `egitims` (`id`, `education_date`, `university_name`, `university_branch`, `description`, `status`, `order`, `created_at`, `updated_at`, `language_id`) VALUES
(11, '2016-2019', 'Ahmet Yesevi Üniversitesi', 'Bilgisayar Mühendisliği', 'Dikey Geçiş Türkiye 716. olarak yerleştim.', 1, 1, '2022-06-02 05:39:02', '2022-06-04 17:14:57', 1),
(12, '2016-2019', 'Ahmet Yesevi University', 'Computer Engineering', 'I settled as Vertical Transfer Turkey 716th.', 1, 1, '2022-06-02 05:39:02', '2022-06-02 05:39:02', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `experiences`
--

CREATE TABLE `experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL COMMENT 'Şuan burdamı çalışıyor',
  `language_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `experiences`
--

INSERT INTO `experiences` (`id`, `task_name`, `company_name`, `date`, `description`, `created_at`, `updated_at`, `status`, `order`, `active`, `language_id`) VALUES
(7, 'Php Developer', 'Paragon Teknoloji', '2020-halen', 'Halen çalışmaktayım', '2022-06-02 05:35:49', '2022-06-02 05:35:49', 1, 0, 1, 1),
(8, 'Php Developer', 'Paragon Teknoloji', '2020-currently', 'I am still working', '2022-06-02 05:35:49', '2022-06-02 05:35:49', 1, 0, 1, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `languages`
--

INSERT INTO `languages` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Türkçe', NULL, NULL),
(2, 'English', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_05_22_165024_create_egitims_table', 2),
(7, '2022_05_22_165922_add_status_to_egitims_table', 3),
(8, '2022_05_26_070307_create_experiences_table', 4),
(9, '2022_05_29_083116_add_order_to_egitims_table', 5),
(10, '2022_05_29_083345_add_order_to_experiences_table', 5),
(11, '2022_05_29_115558_create_personals_table', 6),
(12, '2022_05_29_120924_add_language_id_to_egitims_table', 7),
(13, '2022_05_29_121015_add_language_id_to_experiences_table', 7),
(14, '2022_05_29_121145_language', 8),
(15, '2022_06_05_083246_create_contacts_table', 9);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personals`
--

CREATE TABLE `personals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL,
  `main_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_contact_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_title_left` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `small_title_right` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `task_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `languages` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interests` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `personals`
--

INSERT INTO `personals` (`id`, `language_id`, `main_title`, `about_text`, `btn_contact_text`, `full_name`, `small_title_left`, `small_title_right`, `image`, `task_name`, `birthday`, `website`, `phone`, `mail`, `address`, `cv`, `languages`, `interests`, `created_at`, `updated_at`) VALUES
(1, 1, 'HAKKIMDA', 'Önlisans bilgisayar programcılığı bölümünden 3.50 ortalama ile mezun oldum. Akabinde girmiş olduğum Dikey Geçiş Sınavı ile Türkiye 716.sı olarak mühendislik fakültesine yerleştim ve 2019 yılı itibariyle mezun oldum. Güçlü Matematik bilgisine sahibim, alacağım tecrübelerle kendimi hızlıca geliştireceğime çok inanıyorum.  Çalışmış olduğum firmada yazılım test edicisi olarak çalışmaktayım ancak kariyerimi php gelistirici olarak devam etmek isteğindeyim. Bu noktada da birçok eğitim aldım ve bu eğitimlerle ilgili olarak da aşağıda bilgindirmede bulundum. Eğitimlere istinaden kendimde proje geliştirip githuba yükledim. Üniversite tezimi php mvc programlama ile yapmış olduğum mysql veritabanlı proje ile bitirdim.Halihazırda php eğitimlerim devam etmektedir. Laravel frameworkündede eğitimlerim devam etmekte olup mvc yapısına,relationlara,middleware,auth,seed,factoruy,migrate yapısına  hakım duruma gelmiş bulunmaktayım..Laravel ile geliştirmiş olduğum ufak çaplı projelerimi github hesabıma yüklemiş bulunmaktayım.. Phpnin yanı sıra JavaScript,jquery,ajax,bootstrap,mysql bilgilerimde mevcut olup sürekli kendimi güncellemekteyim.      Çalışmaya hevesli olmam ve işime azimle sarılmam en önemli özelliklerim arasındadır.Ayrıca sorumluluk almaktan çekinmem.İleride iyi bir takım lideri olacağıma inancım sonsuzdur. Analitik ve hızlı düşünme yeteneğine sahibim.Kendimi geliştirebileceğim ve çalışmış olduğum şirkete katkılar sağlayabileceğim bir iş aramaktayım. Teşekkür ederim. Kullanmış olduğum teknolojiler  1)Php+Laravel   2)Nesne Tabanlı Programlama   3)Jquery + JavaScript   4)Ajax  5)PDO MYSQL (RDBMS)  6)JSON   7)Curl   8)BOOTSRAP  9) vue js 10)mongodb 11)redis-memcached(basit düzeyde) 12)laravel-queue(basit düzeyde)', 'tr btncontact_text', 'trfullname', 'trsmalltitleleft', 'trsmalltitleright', 'images/yUHsUhWkE5uKqmvq9TpbjQxXzJtlzQtif3t6tUWa.jpg', 'Bilgisayar Mühendisi', '1994-05-25', 'www.fatihavci.info/tr', '05531105200', '66fatihavci@gmail.com', 'Ankara', '', 'İngilizce', 'video izlemek,football', NULL, '2022-06-02 05:44:46'),
(3, 2, 'ABOUT', 'I graduated from the associate degree computer programming department with an average of 3.50. With the Vertical Transfer Exam I took, I was placed in the engineering faculty as the 716th place in Turkey and graduated as of 2019. I have a strong knowledge of Mathematics, I believe that I will improve myself quickly with the experiences I will receive. I am working as a software tester in the company I worked for, but I want to continue my career as a php developer. At this point, I received many trainings and I gave information about these trainings below. Based on the trainings, I developed a project myself and uploaded it to github. I finished my university thesis with a mysql database project that I did with php mvc programming. Currently, my php training continues. My trainings continue in Laravel framework and I have mastered the mvc structure, relations, middleware, auth, seed, factoruy, migration structure. I am available in my mysql information and I am constantly updating myself. Being willing to work and sticking to my job with determination are among my most important features. I also do not hesitate to take responsibility. I believe that I will be a good team leader in the future. I have analytical and quick thinking skills. I am looking for a job where I can improve myself and contribute to the company I work for. Thank you. Technologies I have used 1)Php+Laravel 2)Object Oriented Programming 3)Jquery + JavaScript 4)Ajax 5)PDO MYSQL (RDBMS) 6)JSON 7)Curl 8)BOOTSRAP 9) vue js 10)mongodb 11)redis-memcached( at basic level) 12)laravel-queue(simple level)', 'en btncontact_text2', 'enfullname2', 'ensmalltitleleft2', 'ensmalltitleright2', 'images/sGQxOEFHe4B9vZNuKrv7GaqRHQ9rNHe9zx4hNX9v.jpg', 'Computer Engineer', '1994-05-25', 'www.fatihavci.info/en', '05531105200', '66fatihavci@gmail.com', 'en_address2', 'cv/NeTupqM6BOH7iHL4MUnmZkK5xEyTITlnMm9jCmx4.pdf', 'English', 'playing video, athletic', NULL, '2022-06-02 05:44:31');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin2', 'admin@admin.com', NULL, '$2a$12$/NkVeKQzoHAqYr9YbyY5h.ELNg1u5bERTB0Su1W2tYir4kfwS7fSK', NULL, NULL, NULL, NULL, NULL, '2022-06-06 05:46:00'),
(3, 'admin', 'admin2@admin.com', NULL, '$2a$12$/NkVeKQzoHAqYr9YbyY5h.ELNg1u5bERTB0Su1W2tYir4kfwS7fSK', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `egitims`
--
ALTER TABLE `egitims`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Tablo için indeksler `personals`
--
ALTER TABLE `personals`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `egitims`
--
ALTER TABLE `egitims`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `personals`
--
ALTER TABLE `personals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
