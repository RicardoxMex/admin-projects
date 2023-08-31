-- MySQL Script generated by MySQL Workbench
-- Sun Aug 27 12:36:15 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema adminprojects
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema adminprojects
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `adminprojects` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `adminprojects` ;

-- -----------------------------------------------------
-- Table `adminprojects`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `adminprojects`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `reset_token` VARCHAR(255) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `uk_email` (`email` ASC) VISIBLE,
  UNIQUE INDEX `uk_username` (`username` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `adminprojects`.`projects`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `adminprojects`.`projects` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `slug` VARCHAR(250) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `description` LONGTEXT NOT NULL,
  `start_date` DATE NOT NULL,
  `end_date` DATE NOT NULL,
  `status` VARCHAR(100) NULL DEFAULT 'To Do',
  `progress` INT NULL DEFAULT '0',
  `priority` ENUM('low', 'medium', 'high') NULL DEFAULT 'low',
  `budget` DECIMAL(10,2) NULL DEFAULT NULL,
  `estimated_time` DECIMAL(10,2) NULL DEFAULT NULL,
  `user_id` INT NOT NULL,
	`created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `slug` (`slug` ASC) VISIBLE,
  INDEX `user_id` (`user_id` ASC) VISIBLE,
  CONSTRAINT `projects_ibfk_1`
    FOREIGN KEY (`user_id`)
    REFERENCES `adminprojects`.`users` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `adminprojects`.`project_status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `adminprojects`.`project_status` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `project_id` INT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `project_id` (`project_id` ASC) VISIBLE,
  CONSTRAINT `project_status_ibfk_2`
    FOREIGN KEY (`project_id`)
    REFERENCES `adminprojects`.`projects` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `adminprojects`.`tasks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `adminprojects`.`tasks` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `slug` VARCHAR(100) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `description` VARCHAR(255) NULL DEFAULT NULL,
  `priority` ENUM('low', 'medium', 'high') NULL DEFAULT 'low',
  `start_date` DATE NOT NULL,
  `end_date` DATE NOT NULL,
  `stimated_time` DECIMAL(10,2) NULL DEFAULT NULL,
  `project_id` INT NOT NULL,
  `status_id` INT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `slug` (`slug` ASC) VISIBLE,
  INDEX `project_id` (`project_id` ASC) VISIBLE,
  INDEX `status_id` (`status_id` ASC) VISIBLE,
  CONSTRAINT `tasks_ibfk_1`
    FOREIGN KEY (`project_id`)
    REFERENCES `adminprojects`.`projects` (`id`),
  CONSTRAINT `tasks_ibfk_2`
    FOREIGN KEY (`status_id`)
    REFERENCES `adminprojects`.`project_status` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `adminprojects`.`project_roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `adminprojects`.`project_roles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `description` LONGTEXT NULL DEFAULT NULL,
  `project_id` INT NOT NULL,
  `project_rolescol` VARCHAR(45) NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_project_roles_projects1_idx` (`project_id` ASC) VISIBLE,
  CONSTRAINT `fk_project_roles_projects1`
    FOREIGN KEY (`project_id`)
    REFERENCES `adminprojects`.`projects` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `adminprojects`.`teams`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `adminprojects`.`teams` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `slug` VARCHAR(250) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `description` LONGTEXT NULL DEFAULT NULL,
  `project_id` INT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `slug_UNIQUE` (`slug` ASC) VISIBLE,
  INDEX `fk_teams_projects1_idx` (`project_id` ASC) VISIBLE,
  CONSTRAINT `fk_teams_projects1`
    FOREIGN KEY (`project_id`)
    REFERENCES `adminprojects`.`projects` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `adminprojects`.`team_members`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `adminprojects`.`team_members` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `team_id` INT NOT NULL,
  `project_role_id` INT NOT NULL,
  `invitation_status` VARCHAR(10) NOT NULL DEFAULT 'pending',
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_team_members_users_idx` (`user_id` ASC) VISIBLE,
  INDEX `fk_team_members_teams_idx` (`team_id` ASC) VISIBLE,
  INDEX `fk_team_members_project_roles1_idx` (`project_role_id` ASC) VISIBLE,
  CONSTRAINT `fk_team_members_project_roles1`
    FOREIGN KEY (`project_role_id`)
    REFERENCES `adminprojects`.`project_roles` (`id`),
  CONSTRAINT `fk_team_members_teams`
    FOREIGN KEY (`team_id`)
    REFERENCES `adminprojects`.`teams` (`id`),
  CONSTRAINT `fk_team_members_users`
    FOREIGN KEY (`user_id`)
    REFERENCES `adminprojects`.`users` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `adminprojects`.`assignmens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `adminprojects`.`assignmens` (
  `task_id` INT NOT NULL,
  `team_member_id` INT NOT NULL,
  PRIMARY KEY (`task_id`, `team_member_id`),
  INDEX `fk_tasks_has_team_members_team_members1_idx` (`team_member_id` ASC) VISIBLE,
  INDEX `fk_tasks_has_team_members_tasks1_idx` (`task_id` ASC) VISIBLE,
  CONSTRAINT `fk_tasks_has_team_members_tasks1`
    FOREIGN KEY (`task_id`)
    REFERENCES `adminprojects`.`tasks` (`id`),
  CONSTRAINT `fk_tasks_has_team_members_team_members1`
    FOREIGN KEY (`team_member_id`)
    REFERENCES `adminprojects`.`team_members` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `adminprojects`.`login_history`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `adminprojects`.`login_history` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `login_time` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `ip_address` VARCHAR(50) NOT NULL,
  `device_name` VARCHAR(255) NOT NULL,
  `location` VARCHAR(255) NULL DEFAULT NULL,
  `user_agent` VARCHAR(255) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `user_id` (`user_id` ASC) VISIBLE,
  CONSTRAINT `login_history_ibfk_1`
    FOREIGN KEY (`user_id`)
    REFERENCES `adminprojects`.`users` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `adminprojects`.`profiles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `adminprojects`.`profiles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `full_name` VARCHAR(100) NOT NULL,
  `date_of_birth` DATE NULL DEFAULT NULL,
  `address` VARCHAR(100) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `user_id` (`user_id` ASC) VISIBLE,
  CONSTRAINT `profiles_ibfk_1`
    FOREIGN KEY (`user_id`)
    REFERENCES `adminprojects`.`users` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `adminprojects`.`project_permissions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `adminprojects`.`project_permissions` (
  `id` INT NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `display_name` VARCHAR(100) NOT NULL,
  `description` LONGTEXT NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `adminprojects`.`project_roles_has_project_permissions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `adminprojects`.`project_roles_has_project_permissions` (
  `project_role_id` INT NOT NULL,
  `project_permission_id` INT NOT NULL,
  PRIMARY KEY (`project_role_id`, `project_permission_id`),
  INDEX `fk_project_roles_has_project_permissions_project_permission_idx` (`project_permission_id` ASC) VISIBLE,
  INDEX `fk_project_roles_has_project_permissions_project_roles1_idx` (`project_role_id` ASC) VISIBLE,
  CONSTRAINT `fk_project_roles_has_project_permissions_project_permissions1`
    FOREIGN KEY (`project_permission_id`)
    REFERENCES `adminprojects`.`project_permissions` (`id`),
  CONSTRAINT `fk_project_roles_has_project_permissions_project_roles1`
    FOREIGN KEY (`project_role_id`)
    REFERENCES `adminprojects`.`project_roles` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `adminprojects`.`tokens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `adminprojects`.`tokens` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NULL DEFAULT NULL,
  `token` VARCHAR(255) NULL DEFAULT NULL,
  `expires_at` DATETIME NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `user_id` (`user_id` ASC) VISIBLE,
  CONSTRAINT `tokens_ibfk_1`
    FOREIGN KEY (`user_id`)
    REFERENCES `adminprojects`.`users` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;