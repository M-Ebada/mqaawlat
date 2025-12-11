-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table blacksmith.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ar',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`),
  UNIQUE KEY `admins_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blacksmith.admins: ~1 rows (approximately)
INSERT INTO `admins` (`id`, `name`, `email`, `username`, `email_verified_at`, `status`, `password`, `device_token`, `default_lang`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@admin.com', 'admin', '2025-11-08 10:33:49', 1, '$2y$10$hS91imvWyIu6Sys7ePXcD.dKVTpoIMW.XlPx.BO.854y/OK5alNw6', NULL, 'ar', NULL, '2025-11-08 10:33:49', '2025-11-08 10:33:49');

-- Dumping structure for table blacksmith.admin_password_reset_tokens
CREATE TABLE IF NOT EXISTS `admin_password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blacksmith.admin_password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table blacksmith.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` json NOT NULL,
  `category_id` int DEFAULT NULL,
  `description` json DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blacksmith.categories: ~0 rows (approximately)

-- Dumping structure for table blacksmith.contacts
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mssg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blacksmith.contacts: ~1 rows (approximately)

-- Dumping structure for table blacksmith.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blacksmith.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table blacksmith.gallery
CREATE TABLE IF NOT EXISTS `gallery` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blacksmith.gallery: ~0 rows (approximately)

-- Dumping structure for table blacksmith.general_settings
CREATE TABLE IF NOT EXISTS `general_settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` json NOT NULL,
  `description` json NOT NULL,
  `address` json DEFAULT NULL,
  `first_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `snapchat_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiktok_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fcm_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firebase_api_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firebase_auth_domain` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firebase_database_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firebase_project_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firebase_storage_bucket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firebase_messaging_sender_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firebase_app_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blacksmith.general_settings: ~1 rows (approximately)
INSERT INTO `general_settings` (`id`, `title`, `description`, `address`, `first_email`, `second_email`, `first_phone`, `second_phone`, `whatsapp_phone`, `facebook_link`, `twitter_link`, `instagram_link`, `linkedin_link`, `snapchat_link`, `tiktok_link`, `fcm_key`, `firebase_api_key`, `firebase_auth_domain`, `firebase_database_url`, `firebase_project_id`, `firebase_storage_bucket`, `firebase_messaging_sender_id`, `firebase_app_id`, `created_at`, `updated_at`, `location`) VALUES
	(1, '{"ar": "الحصان للمقاولات", "en": "Al-Hassan for Contracting"}', '{"ar": "الحصان للمقاولات", "en": "Al-Hassan for Contracting"}', '{"ar": "الحصان للمقاولات", "en": "Al-Hassan for Contracting"}', NULL, NULL, '0537571710', NULL, '0537571710', NULL, NULL, 'https://www.instagram.com/6.uyy', NULL, NULL, NULL, 'AAAAbdqnyOI:APA91bGH1MjG7J3HYI37NqZoxrD5SKdx_LpjbwJxnwQNynxJYLM9lxL73gSBVe1dXbxsc4oSZR4dxeOjcim1Ad5d67Qo5qOB_hY8VGn8_YhQ35wEXgm28tCq6B4D_sle0V9FhzoceQum', 'AIzaSyD_HRpKqDbki40yKndyAf7_VRdJCSzPk-8', 'part2car-730d9.firebaseapp.com', 'https://part2car-730d9-default-rtdb.firebaseio.com', 'part2car-730d9', 'part2car-730d9.appspot.com', '471819864290', '1:471819864290:web:91440f722caf0b8318f6bb', '2025-11-08 10:33:46', '2025-12-11 09:08:47', 'https://maps.app.goo.gl/Mamo9Exabdxaf36u9?g_st=awb');

-- Dumping structure for table blacksmith.media
CREATE TABLE IF NOT EXISTS `media` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint unsigned NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_uuid_unique` (`uuid`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  KEY `media_order_column_index` (`order_column`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blacksmith.media: ~13 rows (approximately)
INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
	(2, 'App\\Models\\GeneralSetting', 1, '5477a4f9-2886-4ede-a04f-f892b01ffd17', 'USER_DEFAULT_IMAGE', 'logo', 'logo.png', 'image/png', 'public', 'public', 49696, '[]', '[]', '[]', '[]', 2, '2025-11-08 10:33:49', '2025-11-08 10:33:49'),
	(3, 'App\\Models\\Admin', 1, 'e56bd54a-5425-4d1a-b04c-db115a23cb1a', 'ADMIN_PROFILE_IMAGE_COLLECTION', 'logo', 'logo.png', 'image/png', 'public', 'public', 49696, '[]', '[]', '[]', '[]', 1, '2025-11-08 10:33:50', '2025-11-08 10:33:50'),
	(9, 'App\\Models\\Category', 2, '495013d0-9022-4add-83b6-4188d2f0fd2e', 'cover', '28753820_166317144025867_7729784708560584704_n', '2d6664dd-df16-4b2d-a21b-c8c5db844613-cover.jpg', 'image/jpeg', 'public', 'public', 72859, '[]', '[]', '[]', '[]', 1, '2025-11-16 16:43:05', '2025-11-16 16:43:05'),
	(10, 'App\\Models\\Gallery', 1, '8651757c-4520-4dd4-889f-8c53755c7807', 'image', 'WhatsApp Image 2025-11-08 at 23.46.03_c64a0b3c', 'c1295108-377e-4616-9ac5-a3d9132bd3c3-image.jpg', 'image/jpeg', 'public', 'public', 51426, '[]', '[]', '[]', '[]', 1, '2025-11-17 16:22:34', '2025-11-17 16:22:34'),
	(11, 'App\\Models\\Gallery', 2, '06f6793c-3a96-44ab-a217-ad08d14bb671', 'image', 'WhatsApp Image 2025-09-07 at 16.53.07_9bfde90f', '34b4194a-82bb-4fb9-8222-84c4eafb2bd0-image.jpg', 'image/jpeg', 'public', 'public', 313107, '[]', '[]', '[]', '[]', 1, '2025-11-17 16:22:53', '2025-11-17 16:22:53'),
	(12, 'App\\Models\\Gallery', 3, '70ca1ab8-32cd-4a1b-b41e-17da16526763', 'image', 'ختم الحصان', '5f65e61c-10dd-4c8f-b160-0bc0a76ec56e-image.png', 'image/png', 'public', 'public', 351327, '[]', '[]', '[]', '[]', 1, '2025-11-17 16:23:01', '2025-11-17 16:23:01'),
	(15, 'App\\Models\\GeneralSetting', 1, '48e34a52-4cff-4649-81ad-c0c6e81a0d44', 'LOGO_COLLECTION', 'logo', '799f66da-cb3c-4af1-881b-cded8389547f-logo-collection.png', 'image/png', 'public', 'public', 62044, '[]', '[]', '[]', '[]', 6, '2025-12-11 08:51:15', '2025-12-11 08:51:15'),
	(16, 'App\\Models\\GeneralSetting', 1, '78b06d44-5e31-4b0e-b935-8587fdf0e679', 'favicon', 'logo', '05376197-b7c2-44aa-99d3-6c31b0cdbf49-favicon.png', 'image/png', 'public', 'public', 62044, '[]', '[]', '[]', '[]', 7, '2025-12-11 08:51:15', '2025-12-11 08:51:15'),
	(17, 'App\\Models\\Product', 3, '453eda24-9122-46b3-b5f6-496e325b6d8a', 'image', 'metalfabrication', 'c7edaa01-5672-4830-bddc-f2646e434cac-image.jpg', 'image/jpeg', 'public', 'public', 179650, '[]', '[]', '[]', '[]', 1, '2025-12-11 08:58:18', '2025-12-11 08:58:18'),
	(18, 'App\\Models\\Product', 4, 'be4dcdd9-2f62-498a-aad2-302b041ce92b', 'image', 'MuntzStudios-CelebrityModel-2', 'e7efe915-c7bd-4935-8a95-bd59f6b80c4b-image.webp', 'image/webp', 'public', 'public', 98878, '[]', '[]', '[]', '[]', 1, '2025-12-11 08:59:34', '2025-12-11 08:59:34'),
	(19, 'App\\Models\\Product', 5, 'fc0db716-15d0-4f17-adda-7479a8dff873', 'image', 'how-does-loft-insulation-work.1707842278', 'b522995d-a8ee-40a4-9cf8-19699eb6da20-image.jpg', 'image/jpeg', 'public', 'public', 158215, '[]', '[]', '[]', '[]', 1, '2025-12-11 09:01:08', '2025-12-11 09:01:08'),
	(20, 'App\\Models\\Product', 6, '8cd0518e-4961-4875-a94f-5e0285370f45', 'image', 'electrical-1', '62090062-f420-46a4-8e5b-1d226c8d89d3-image.jpg', 'image/jpeg', 'public', 'public', 80139, '[]', '[]', '[]', '[]', 1, '2025-12-11 09:02:31', '2025-12-11 09:02:31'),
	(21, 'App\\Models\\Product', 7, 'd01cff4a-632e-4662-906c-249acdf9c59f', 'image', 'commercial-plumber-1-1024x683', '4de1eac0-90c3-4597-9449-0c003d19e22c-image.jpg', 'image/jpeg', 'public', 'public', 89372, '[]', '[]', '[]', '[]', 1, '2025-12-11 09:03:25', '2025-12-11 09:03:25');

-- Dumping structure for table blacksmith.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blacksmith.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_100000_create_admin_password_reset_tokens_table', 1),
	(2, '2019_08_19_000000_create_failed_jobs_table', 1),
	(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(4, '2023_04_20_091148_create_permission_tables', 1),
	(5, '2023_04_20_093631_create_media_table', 1),
	(6, '2023_04_20_124758_create_general_settings_table', 1),
	(7, '2023_05_07_000000_create_admins_table', 1),
	(8, '2023_09_12_140036_create_notifications_table', 1),
	(9, '2024_05_22_185541_add_permission_group_to_permissions_table', 1),
	(10, '2025_01_10_175356_create_categories_table', 1),
	(11, '2025_11_08_160224_create_products_table', 2),
	(12, '2025_11_13_144647_create_testmonials_table', 3),
	(13, '2025_11_13_145516_add_location_to_general_settings_table', 4),
	(14, '2025_11_13_235404_create_contacts_table', 5),
	(15, '2025_11_17_191228_create_gallery_table', 6);

-- Dumping structure for table blacksmith.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blacksmith.model_has_permissions: ~0 rows (approximately)

-- Dumping structure for table blacksmith.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blacksmith.model_has_roles: ~1 rows (approximately)
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\Admin', 1);

-- Dumping structure for table blacksmith.notifications
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blacksmith.notifications: ~0 rows (approximately)

-- Dumping structure for table blacksmith.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` json NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'general',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blacksmith.permissions: ~3 rows (approximately)
INSERT INTO `permissions` (`id`, `name`, `title`, `guard_name`, `created_at`, `updated_at`, `group`) VALUES
	(1, 'settings', '{"ar": "الإعدادات العامة", "en": "General Settings"}', 'admin', '2025-11-08 10:33:46', '2025-11-08 10:33:46', 'general'),
	(2, 'roles', '{"en": "Roles"}', 'admin', '2025-11-08 10:33:46', '2025-11-08 10:33:46', 'general'),
	(3, 'employees', '{"en": "Staff Members"}', 'admin', '2025-11-08 10:33:46', '2025-11-08 10:33:46', 'general');

-- Dumping structure for table blacksmith.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blacksmith.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table blacksmith.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` json NOT NULL,
  `short_description` json DEFAULT NULL,
  `content` json DEFAULT NULL,
  `category_id` bigint unsigned DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `keywords` json DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blacksmith.products: ~5 rows (approximately)
INSERT INTO `products` (`id`, `title`, `short_description`, `content`, `category_id`, `status`, `keywords`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(3, '{"ar": "الأعمال المعدنية المخصصة", "en": "Metal Work Operations"}', '{"en": null}', '{"ar": "<p>تشغيل المعادن هو مصطلح متعدد الوظائف يغطي مجموعة واسعة من العمليات، ولكن الهدف الأساسي من هذه العملية هو إما تشكيل أو إعادة تشكيل قطعة من المعدن. يمكن أن تختلف نتيجة هذه العملية بشكل كبير، بدءًا من الأجزاء والأشياء المختلفة وحتى الهياكل والتجميعات الكبيرة</p>", "en": "<p>Metalworking is a multifunctional term that covers a wide range of operations and processes, but the basic objective of this process is to either shape or reshape a piece of metal. The result of this process could also vary greatly, ranging from various parts and objects to large structures and assemblies</p>"}', NULL, 1, '{"en": null}', 'metal-work-operations', NULL, '2025-12-11 08:58:18', '2025-12-11 08:58:18'),
	(4, '{"ar": "التشطيبات الداخلية والخارجية", "en": "Interior and Exterior Finishing"}', '{"en": null}', '{"ar": "<p>لم يعد اختيار التشطيبات الداخلية والخارجية مجرد خطوة تجميلية في نهاية مشروع البناء؛ بل هو قرار استثماري طويل الأمد يؤثر على راحة السكن، وعمر المبنى، وقيمته في السوق. من نوع الأرضيات إلى تصميم الواجهات، مرورًا بالأسقف، والأبواب، والنوافذ، والإضاءة والديكور؛ كل تفصيل يصنع فارقًا في الجودة والوظيفة والشكل النهائي</p>", "en": "<p>Choosing interior and exterior finishes is no longer just a cosmetic step at the end of a construction project; it&#39;s a long-term investment decision that affects living comfort, the building&#39;s lifespan, and its value in the market. From the type of flooring to the design of fa&ccedil;ades, passing through ceilings, doors, windows, lighting, and d&eacute;cor&mdash;every detail makes a difference in quality, functionality, and final appearance</p>"}', NULL, 1, '{"en": null}', 'interior-and-exterior-finishing', NULL, '2025-12-11 08:59:34', '2025-12-11 08:59:34'),
	(5, '{"ar": "أعمال العزل", "en": "Insulation Works"}', '{"en": null}', '{"ar": "<p>يمكن تعريف العزل الحراري بأنه عملية تستخدم لتقليل انتقال الحرارة بين الأجسام أو المساحات. إنه يتعلق بشكل أساسي بتطوير حواجز لمنع الحرارة من الهروب من مكان دافئ أو الدخول إلى مكان بارد</p>", "en": "<p>Thermal insulation can be defined as a process used to reduce heat transfer between objects or spaces. Fundamentally, it is about developing barriers to prevent heat from escaping a warm place or entering a cooler one</p>"}', NULL, 1, '{"en": null}', 'insulation-works', NULL, '2025-12-11 09:01:07', '2025-12-11 09:01:07'),
	(6, '{"ar": "الأعمال الكهربائية", "en": "Electrical Works"}', '{"en": null}', '{"ar": "<p>في عالم البناء الديناميكي، يعتبر دور الأعمال الكهربائية محوريًا. من إضاءة المساحات إلى تشغيل الأنظمة الأساسية، تعتبر التركيبات الكهربائية شريان الحياة للبنية التحتية الحديثة</p>", "en": "<p>In the dynamic world of construction, the role of electrical works is pivotal. From lighting up spaces to powering essential systems, electrical installations are the lifeblood of modern infrastructure</p>"}', NULL, 1, '{"en": null}', 'electrical-works', NULL, '2025-12-11 09:02:31', '2025-12-11 09:02:31'),
	(7, '{"ar": "أعمال السباكة", "en": "Plumbing Works"}', '{"en": null}', '{"ar": "<p>تعتبر أعمال السباكة عنصرًا حاسمًا في أي مشروع بناء. وبدون سباكة مناسبة، لا يمكن للمباني أن تعمل بشكل صحيح. تضمن أعمال السباكة أن المياه قادرة على التدفق إلى داخل وخارج المبنى بطريقة فعالة</p>", "en": "<p>Plumbing work is a critical component of any construction project. Without proper plumbing, buildings would not be able to function properly. Plumbing work ensures that water is able to flow into and out of a building in an efficient way</p>"}', NULL, 1, '{"en": null}', 'plumbing-works', NULL, '2025-12-11 09:03:25', '2025-12-11 09:03:25');

-- Dumping structure for table blacksmith.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` json NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blacksmith.roles: ~0 rows (approximately)
INSERT INTO `roles` (`id`, `name`, `title`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'super-admin', '{"ar": "الأدمن الرئيسي", "en": "Super admin"}', 'admin', '2025-11-08 10:33:46', '2025-11-08 10:33:46');

-- Dumping structure for table blacksmith.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blacksmith.role_has_permissions: ~3 rows (approximately)
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 1);

-- Dumping structure for table blacksmith.testmonials
CREATE TABLE IF NOT EXISTS `testmonials` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` json NOT NULL,
  `position` json NOT NULL,
  `description` json NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blacksmith.testmonials: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
