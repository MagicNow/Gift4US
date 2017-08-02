ALTER TABLE `produtos` ADD `status` TINYINT(1) NOT NULL DEFAULT '0' AFTER `tipo_id`;
ALTER TABLE `produtos`  ADD `categoria` ENUM('roupa','brinquedo','') NOT NULL DEFAULT ''  AFTER `id`;
ALTER TABLE `produtos` ADD `cor` VARCHAR(50) NULL DEFAULT NULL AFTER `tipo_id`;