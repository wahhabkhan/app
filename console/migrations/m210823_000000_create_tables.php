<?php

use yii\db\Migration;
use mdm\admin\components\Configs;

/**
 * Class m210823_000000_create_tables
 */
class m210823_000000_create_tables extends Migration
{
    public function up()
    {
        $sql = <<<SQL
        CREATE SCHEMA IF NOT EXISTS `app_ms` DEFAULT CHARACTER SET utf8mb4 ;


-- -----------------------------------------------------
-- Table `app_ms`.`auth_assignment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `app_ms`.`auth_assignment` (
  `item_name` VARCHAR(64) NOT NULL,
  `user_id` VARCHAR(64) NOT NULL,
  `created_at` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`item_name`, `user_id`),
  CONSTRAINT `auth_assignment_ibfk_1`
    FOREIGN KEY (`item_name`)
    REFERENCES `smd`.`auth_item` (`name`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `app_ms`.`auth_item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `app_ms`.`auth_item` (
  `name` VARCHAR(64) NOT NULL,
  `type` SMALLINT(6) NOT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `rule_name` VARCHAR(64) NULL DEFAULT NULL,
  `data` TEXT NULL DEFAULT NULL,
  `created_at` INT(11) NULL DEFAULT NULL,
  `updated_at` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`name`),
  INDEX `rule_name` (`rule_name` ASC) VISIBLE,
  CONSTRAINT `auth_item_ibfk_1`
    FOREIGN KEY (`rule_name`)
    REFERENCES `smd`.`auth_rule` (`name`)
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `app_ms`.`auth_item_child`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `app_ms`.`auth_item_child` (
  `parent` VARCHAR(64) NOT NULL,
  `child` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`parent`, `child`),
  INDEX `child` (`child` ASC) VISIBLE,
  CONSTRAINT `auth_item_child_ibfk_1`
    FOREIGN KEY (`parent`)
    REFERENCES `smd`.`auth_item` (`name`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2`
    FOREIGN KEY (`child`)
    REFERENCES `smd`.`auth_item` (`name`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `app_ms`.`auth_rule`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `app_ms`.`auth_rule` (
  `name` VARCHAR(64) NOT NULL,
  `data` TEXT NULL DEFAULT NULL,
  `created_at` INT(11) NULL DEFAULT NULL,
  `updated_at` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`name`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `app_ms`.`customer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `app_ms`.`customer` (
  `customer_id` INT(50) NOT NULL AUTO_INCREMENT,
  `company_name` VARCHAR(255) NOT NULL,
  `i_street_name` VARCHAR(255) NOT NULL,
  `i_house_number` VARCHAR(255) NOT NULL,
  `i_appendix` VARCHAR(255) NOT NULL,
  `i_zipcode` VARCHAR(255) NOT NULL,
  `i_city` VARCHAR(255) NOT NULL,
  `i_country` VARCHAR(255) NOT NULL,
  `d_street_name` VARCHAR(255) NOT NULL,
  `d_house_number` VARCHAR(255) NOT NULL,
  `d_appendix` VARCHAR(255) NOT NULL,
  `d_zipcode` VARCHAR(255) NOT NULL,
  `d_city` VARCHAR(255) NOT NULL,
  `d_country` VARCHAR(255) NOT NULL,
  `vat_number` VARCHAR(255) NOT NULL,
  `coc_number` VARCHAR(255) NOT NULL,
  `invoice_email` VARCHAR(255) NOT NULL,
  `delivery_notes` VARCHAR(255) NOT NULL,
  `notes` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`customer_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `app_ms`.`customer_contact`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `app_ms`.`customer_contact` (
  `contact_id` INT(11) NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(255) NOT NULL,
  `last_name` VARCHAR(255) NOT NULL,
  `position` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `phone_number1` VARCHAR(255) NOT NULL,
  `phone_number2` VARCHAR(255) NOT NULL,
  `phone_number3` VARCHAR(255) NOT NULL,
  `customer_id` INT(50) NOT NULL,
  PRIMARY KEY (`contact_id`),
  INDEX `fk_customer_contact_customer_idx` (`customer_id` ASC) VISIBLE,
  CONSTRAINT `fk_customer_contact_customer`
    FOREIGN KEY (`customer_id`)
    REFERENCES `app`.`customer` (`customer_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `app_ms`.`delivery_raw_material`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `app_ms`.`delivery_raw_material` (
  `delivery_raw_id` INT(11) NOT NULL AUTO_INCREMENT,
  `supplier_company_name` VARCHAR(255) NOT NULL,
  `raw_material_name` VARCHAR(255) NOT NULL,
  `date` DATE NOT NULL,
  `is_packaging_ok` TINYINT(1) NOT NULL,
  `batch_no` VARCHAR(255) NOT NULL,
  `expiration_date` VARCHAR(255) NOT NULL,
  `unit` VARCHAR(255) NOT NULL,
  `total_units` VARCHAR(255) NOT NULL,
  `price_per_unit` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`delivery_raw_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `app_ms`.`manager`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `app_ms`.`manager` (
  `manager_id` INT(11) NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(255) NOT NULL,
  `last_name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `phone` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`manager_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `app_ms`.`menu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `app_ms`.`menu` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(128) NOT NULL,
  `parent` INT(11) NULL DEFAULT NULL,
  `route` VARCHAR(255) NULL DEFAULT NULL,
  `order` INT(11) NULL DEFAULT NULL,
  `data` BLOB NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `parent` (`parent` ASC) VISIBLE,
  CONSTRAINT `menu_ibfk_1`
    FOREIGN KEY (`parent`)
    REFERENCES `smd`.`menu` (`id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `app_ms`.`migration`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `app_ms`.`migration` (
  `version` VARCHAR(180) NOT NULL,
  `apply_time` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`version`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `app_ms`.`order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `app_ms`.`order` (
  `order_id` INT(50) NOT NULL AUTO_INCREMENT,
  `date` DATE NOT NULL,
  `invoice_number` INT(255) NOT NULL,
  `company_name` VARCHAR(255) NOT NULL,
  `street_name` VARCHAR(255) NOT NULL,
  `house_number` VARCHAR(255) NOT NULL,
  `appendix` VARCHAR(255) NOT NULL,
  `zipcode` VARCHAR(255) NOT NULL,
  `city` VARCHAR(255) NOT NULL,
  `country` VARCHAR(255) NOT NULL,
  `vat_number` VARCHAR(255) NOT NULL,
  `discount` DECIMAL(50,2) NOT NULL,
  `customer_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  INDEX `fk_order_customer` (`customer_id` ASC) VISIBLE,
  CONSTRAINT `fk_order_customer`
    FOREIGN KEY (`customer_id`)
    REFERENCES `app_ms`.`customer` (`customer_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 306
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `app_ms`.`order_items`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `app_ms`.`order_items` (
  `order_items_id` INT(11) NOT NULL AUTO_INCREMENT,
  `product` VARCHAR(255) NULL DEFAULT NULL,
  `var_rate` DECIMAL(50,2) NULL DEFAULT NULL,
  `quantity` INT(11) NULL DEFAULT NULL,
  `unit_price` DECIMAL(50,2) NULL DEFAULT NULL,
  `sub_total` DECIMAL(50,2) NULL DEFAULT NULL,
  `order_id` INT(50) NOT NULL,
  PRIMARY KEY (`order_items_id`),
  INDEX `fk_order_items_order1_idx` (`order_id` ASC) VISIBLE,
  CONSTRAINT `fk_order_items_order1`
    FOREIGN KEY (`order_id`)
    REFERENCES `app_ms`.`order` (`order_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 75
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `app_ms`.`product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `app_ms`.`product` (
  `product_id` INT(11) NOT NULL AUTO_INCREMENT,
  `product_name` VARCHAR(255) NOT NULL,
  `barcode` VARCHAR(255) NOT NULL,
  `volume_or_weight` VARCHAR(255) NOT NULL,
  `retial_price` DECIMAL(50,2) NOT NULL,
  `wholesale_price` DECIMAL(50,2) NOT NULL,
  PRIMARY KEY (`product_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `app_ms`.`product_raw`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `app_ms`.`product_raw` (
  `product_raw_id` INT(11) NOT NULL AUTO_INCREMENT,
  `raw_material_name` VARCHAR(255) NOT NULL,
  `unit` VARCHAR(255) NOT NULL,
  `weight` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`product_raw_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `app_ms`.`production_batch`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `app_ms`.`production_batch` (
  `batch_id` INT(11) NOT NULL AUTO_INCREMENT,
  `date` DATE NOT NULL,
  `production_name` VARCHAR(255) NOT NULL,
  `total_units` VARCHAR(255) NOT NULL,
  `expiration_date` VARCHAR(255) NOT NULL,
  `batch_number` VARCHAR(255) NOT NULL,
  `employee_name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`batch_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `app_ms`.`production_employees`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `app_ms`.`production_employees` (
  `employees_id` INT(11) NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(255) NOT NULL,
  `last_name` VARCHAR(255) NOT NULL,
  `phone_number` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `street` VARCHAR(255) NOT NULL,
  `house_number` VARCHAR(255) NOT NULL,
  `appendix` VARCHAR(255) NOT NULL,
  `zipcode` VARCHAR(255) NOT NULL,
  `city` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`employees_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `app_ms`.`production_employees_work`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `app_ms`.`production_employees_work` (
  `work_id` INT(11) NOT NULL AUTO_INCREMENT,
  `date` VARCHAR(255) NOT NULL,
  `working_hours` VARCHAR(255) NOT NULL,
  `production_employees_employees_id` INT(11) NOT NULL,
  PRIMARY KEY (`work_id`),
  INDEX `fk_production_employees_work_production_employees1_idx` (`production_employees_employees_id` ASC) VISIBLE,
  CONSTRAINT `fk_production_employees_work_production_employees1`
    FOREIGN KEY (`production_employees_employees_id`)
    REFERENCES `app_ms`.`production_employees` (`employees_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `app_ms`.`raw_material_report`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `app_ms`.`raw_material_report` (
  `raw_id` INT(11) NOT NULL AUTO_INCREMENT,
  `start_date` DATE NOT NULL,
  `end_date` DATE NOT NULL,
  PRIMARY KEY (`raw_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `app_ms`.`sales`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `app_ms`.`sales` (
  `sales_id` INT(11) NOT NULL AUTO_INCREMENT,
  `total_sales` INT(255) NOT NULL,
  `total_outstanding` INT(255) NOT NULL,
  PRIMARY KEY (`sales_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `app_ms`.`stock_goods`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `app_ms`.`stock_goods` (
  `stock_id` INT(11) NOT NULL AUTO_INCREMENT,
  `product_name` VARCHAR(255) NOT NULL,
  `count` INT(255) NOT NULL,
  PRIMARY KEY (`stock_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `app_ms`.`supplier`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `app_ms`.`supplier` (
  `supplier_id` INT(11) NOT NULL AUTO_INCREMENT,
  `company_name` VARCHAR(255) NOT NULL,
  `street_name` VARCHAR(255) NOT NULL,
  `house_number` VARCHAR(255) NOT NULL,
  `appendix` VARCHAR(255) NOT NULL,
  `zipcode` VARCHAR(255) NOT NULL,
  `city` VARCHAR(255) NOT NULL,
  `country` VARCHAR(255) NOT NULL,
  `vat_number` VARCHAR(255) NOT NULL,
  `coc_number` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `notes` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`supplier_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `app_ms`.`supplier_contact`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `app_ms`.`supplier_contact` (
  `contact_id` INT(11) NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(255) NOT NULL,
  `last_name` VARCHAR(255) NOT NULL,
  `position` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `phone_number1` VARCHAR(255) NOT NULL,
  `phone_number2` VARCHAR(255) NOT NULL,
  `phone_number3` VARCHAR(255) NOT NULL,
  `supplier_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`contact_id`),
  INDEX `fk_supplier_contact_supplier1_idx` (`supplier_id` ASC) VISIBLE,
  CONSTRAINT `fk_supplier_contact_supplier1`
    FOREIGN KEY (`supplier_id`)
    REFERENCES `app`.`supplier` (`supplier_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `app_ms`.`supplier_raw_material`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `app_ms`.`supplier_raw_material` (
  `raw_id` INT(11) NOT NULL AUTO_INCREMENT,
  `raw_material_name` VARCHAR(255) NOT NULL,
  `supplier_code` VARCHAR(255) NOT NULL,
  `unit` VARCHAR(255) NOT NULL,
  `low_stock` VARCHAR(255) NOT NULL,
  `supplier_id` INT(11) NOT NULL,
  PRIMARY KEY (`raw_id`),
  INDEX `fk_supplier_raw_material_supplier1_idx` (`supplier_id` ASC) VISIBLE,
  CONSTRAINT `fk_supplier_raw_material_supplier1`
    FOREIGN KEY (`supplier_id`)
    REFERENCES `app_ms`.`supplier` (`supplier_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `app_ms`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `app_ms`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `username` VARCHAR(255) NOT NULL,
  `password_hash` VARCHAR(255) NOT NULL,
  `status` SMALLINT(6) NOT NULL DEFAULT 10,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8mb4;

        
        SQL;

        $this->execute($sql);
    }

    public function down()
    {
        // Drop tables if needed, reverse of the above script
    }
}
