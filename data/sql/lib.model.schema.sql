
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- sf_guard_user_profile
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_guard_user_profile`;

CREATE TABLE `sf_guard_user_profile`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `user_id` INTEGER,
    `first_name` VARCHAR(50) NOT NULL,
    `surname` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `sf_guard_user_profile_FI_1` (`user_id`),
    CONSTRAINT `sf_guard_user_profile_FK_1`
        FOREIGN KEY (`user_id`)
        REFERENCES `sf_guard_user` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- articles
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `articles`;

CREATE TABLE `articles`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `body` TEXT NOT NULL,
    `display` TINYINT(1) DEFAULT 1 NOT NULL,
    `slug` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `articles_I_1` (`slug`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- categories
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `parent_tree_id` INTEGER DEFAULT 0,
    `category_level` INTEGER DEFAULT 0,
    `ltf` INTEGER,
    `rgt` INTEGER,
    `scope` INTEGER,
    `slug` VARCHAR(255),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `categories_I_1` (`slug`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- navigation
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `navigation`;

CREATE TABLE `navigation`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `url` VARCHAR(255) NOT NULL,
    `route` VARCHAR(50),
    `parent_tree_id` INTEGER DEFAULT 0,
    `category_level` INTEGER DEFAULT 0,
    `ltf` INTEGER,
    `rgt` INTEGER,
    `scope` INTEGER,
    `display` TINYINT(1) DEFAULT 1 NOT NULL,
    `meta_title` VARCHAR(255),
    `meta_description` TEXT,
    `meta_keys` TEXT,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `navigation_U_1` (`url`),
    INDEX `navigation_I_1` (`route`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- static_pages
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `static_pages`;

CREATE TABLE `static_pages`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `identifier` VARCHAR(255) NOT NULL,
    `body` TEXT,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `static_pages_I_1` (`identifier`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- config
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `config`;

CREATE TABLE `config`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `contact_email` VARCHAR(150) DEFAULT 'daniel.korsK@wp.pl' NOT NULL,
    `meta_title` VARCHAR(255),
    `meta_description` TEXT,
    `meta_keys` TEXT,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
