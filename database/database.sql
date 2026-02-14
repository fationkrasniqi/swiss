-- ============================================
-- Janira Care - Database Schema (MySQL/MariaDB)
-- Generated from Laravel migrations
-- Execute this in phpMyAdmin or MySQL command line
-- ============================================

-- 1. Create users table
CREATE TABLE `users` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL UNIQUE,
  `is_admin` TINYINT(1) NOT NULL DEFAULT 0,
  `can_view_clients` TINYINT(1) NOT NULL DEFAULT 0,
  `can_view_messages` TINYINT(1) NOT NULL DEFAULT 0,
  `email_verified_at` TIMESTAMP NULL DEFAULT NULL,
  `password` VARCHAR(255) NOT NULL,
  `two_factor_secret` TEXT NULL DEFAULT NULL,
  `two_factor_recovery_codes` TEXT NULL DEFAULT NULL,
  `two_factor_confirmed_at` TIMESTAMP NULL DEFAULT NULL,
  `remember_token` VARCHAR(100) NULL DEFAULT NULL,
  `current_team_id` BIGINT UNSIGNED NULL DEFAULT NULL,
  `profile_photo_path` VARCHAR(2048) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. Create password_resets table
CREATE TABLE `password_resets` (
  `email` VARCHAR(255) NOT NULL,
  `token` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3. Create failed_jobs table
CREATE TABLE `failed_jobs` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `uuid` VARCHAR(255) NOT NULL UNIQUE,
  `connection` TEXT NOT NULL,
  `queue` TEXT NOT NULL,
  `payload` LONGTEXT NOT NULL,
  `exception` LONGTEXT NOT NULL,
  `failed_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 4. Create personal_access_tokens table
CREATE TABLE `personal_access_tokens` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `tokenable_type` VARCHAR(255) NOT NULL,
  `tokenable_id` BIGINT UNSIGNED NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `token` VARCHAR(64) NOT NULL UNIQUE,
  `abilities` TEXT NULL DEFAULT NULL,
  `last_used_at` TIMESTAMP NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`, `tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 5. Create sessions table
CREATE TABLE `sessions` (
  `id` VARCHAR(255) NOT NULL PRIMARY KEY,
  `user_id` BIGINT UNSIGNED NULL DEFAULT NULL,
  `ip_address` VARCHAR(45) NULL DEFAULT NULL,
  `user_agent` TEXT NULL DEFAULT NULL,
  `payload` TEXT NOT NULL,
  `last_activity` INT NOT NULL,
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 6. Create contact_messages table
CREATE TABLE `contact_messages` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `first_name` VARCHAR(255) NOT NULL,
  `last_name` VARCHAR(255) NULL DEFAULT NULL,
  `email` VARCHAR(255) NOT NULL,
  `message` TEXT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  KEY `contact_messages_email_index` (`email`),
  KEY `contact_messages_created_at_index` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 7. Create clients table
CREATE TABLE `clients` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `first_name` VARCHAR(255) NOT NULL,
  `last_name` VARCHAR(255) NULL DEFAULT NULL,
  `email` VARCHAR(255) NOT NULL,
  `phone_prefix` VARCHAR(10) NOT NULL DEFAULT '+41',
  `phone_number` VARCHAR(20) NOT NULL,
  `canton` VARCHAR(255) NOT NULL,
  `services` VARCHAR(255) NOT NULL COMMENT 'comma-separated',
  `hours` INT NOT NULL,
  `total_price` INT NOT NULL,
  `service_date` DATE NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  KEY `clients_email_index` (`email`),
  KEY `clients_created_at_index` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 8. Create cantons table
CREATE TABLE `cantons` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL UNIQUE,
  `price_per_hour` DECIMAL(8, 2) NOT NULL DEFAULT 50.00,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 9. Create migrations table (Laravel tracking)
CREATE TABLE `migrations` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `migration` VARCHAR(255) NOT NULL,
  `batch` INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- Insert migration records (for Laravel tracking)
-- ============================================
INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
('2019_08_19_000000_create_failed_jobs_table', 1),
('2019_12_14_000001_create_personal_access_tokens_table', 1),
('2025_11_28_224142_create_sessions_table', 1),
('2025_11_29_000000_add_is_admin_to_users', 1),
('2025_11_29_000001_create_contact_messages_table', 1),
('2025_11_29_000002_create_clients_table', 1),
('2025_12_03_132056_add_service_date_to_clients_table', 1),
('2025_12_07_145539_add_phone_to_clients_table', 1),
('2025_12_26_000001_add_staff_permissions_to_users', 1),
('2026_01_30_011556_create_cantons_table', 1);

-- ============================================
-- Optional: Seed Swiss Cantons
-- ============================================
INSERT INTO `cantons` (`name`, `price_per_hour`, `created_at`, `updated_at`) VALUES
('Zürich', 55.00, NOW(), NOW()),
('Bern', 52.00, NOW(), NOW()),
('Luzern', 50.00, NOW(), NOW()),
('Uri', 48.00, NOW(), NOW()),
('Schwyz', 50.00, NOW(), NOW()),
('Obwalden', 48.00, NOW(), NOW()),
('Nidwalden', 48.00, NOW(), NOW()),
('Glarus', 48.00, NOW(), NOW()),
('Zug', 58.00, NOW(), NOW()),
('Fribourg', 50.00, NOW(), NOW()),
('Solothurn', 50.00, NOW(), NOW()),
('Basel-Stadt', 56.00, NOW(), NOW()),
('Basel-Landschaft', 54.00, NOW(), NOW()),
('Schaffhausen', 50.00, NOW(), NOW()),
('Appenzell Ausserrhoden', 48.00, NOW(), NOW()),
('Appenzell Innerrhoden', 48.00, NOW(), NOW()),
('St. Gallen', 52.00, NOW(), NOW()),
('Graubünden', 50.00, NOW(), NOW()),
('Aargau', 52.00, NOW(), NOW()),
('Thurgau', 50.00, NOW(), NOW()),
('Ticino', 53.00, NOW(), NOW()),
('Vaud', 54.00, NOW(), NOW()),
('Valais', 50.00, NOW(), NOW()),
('Neuchâtel', 52.00, NOW(), NOW()),
('Genève', 58.00, NOW(), NOW()),
('Jura', 48.00, NOW(), NOW());

-- ============================================
-- DEPLOYMENT INSTRUCTIONS
-- ============================================
-- 1. Login to phpMyAdmin in cPanel
-- 2. Select your database (or create new one)
-- 3. Click "SQL" tab
-- 4. Copy and paste this entire file
-- 5. Click "Go" to execute
-- 6. Verify all 9 tables are created
-- 7. Update .env file with database credentials
-- ============================================
