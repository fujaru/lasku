-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 17, 2014 at 04:58 AM
-- Server version: 5.5.33-1
-- PHP Version: 5.5.7-2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `lasku`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Client name',
  `address1` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Address line 1',
  `address2` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Address line 2',
  `city` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'City name',
  `state` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'State/province',
  `zip` varchar(15) DEFAULT NULL COMMENT 'Zip/postal code',
  `country` varchar(255) DEFAULT NULL COMMENT 'Country name',
  `contact_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Contact person',
  `phone` varchar(25) DEFAULT NULL COMMENT 'Phone number',
  `mobile` varchar(25) DEFAULT NULL COMMENT 'Mobile phone',
  `fax` varchar(25) DEFAULT NULL COMMENT 'Fax number',
  `email` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Email address',
  `website` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Web address',
  `notes` text COMMENT 'Notes for this client',
  `is_active` BOOLEAN NOT NULL DEFAULT TRUE COMMENT 'Whether this client is active',
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entry_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Clients' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Company name',
  `address1` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Address line 1',
  `address2` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Address line 2',
  `city` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'City name',
  `state` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'State/province',
  `zip` varchar(15) DEFAULT NULL COMMENT 'Zip/postal code',
  `country` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Country name',
  `phone` varchar(25) DEFAULT NULL COMMENT 'Phone number',
  `mobile` varchar(25) DEFAULT NULL COMMENT 'Mobile phone',
  `fax` varchar(25) DEFAULT NULL COMMENT 'Fax number',
  `email` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Email address',
  `website` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Web address',
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entry_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Owner company information' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `address1`, `address2`, `city`, `state`, `zip`, `country`, `phone`, `mobile`, `fax`, `email`, `website`, `entry_time`, `entry_by`) VALUES
(1, 'Awesome Company', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-01-17 04:53:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'Configuration name',
  `value` text COMMENT 'Configuration value',
  `comment` varchar(255) DEFAULT NULL COMMENT 'Comments',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Application configurations' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT 'Long name',
  `symbol` varchar(5) CHARACTER SET utf8 NOT NULL COMMENT 'Currency symbol',
  `code` varchar(3) NOT NULL COMMENT 'ISO 4217 currency code',
  `decimal_count` tinyint(1) NOT NULL DEFAULT '2' COMMENT 'Number of decimal places',
  `placement` tinyint(1) NOT NULL DEFAULT '-1' COMMENT 'Symbol placement. 1 before, 1 after',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='List of currencies' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

CREATE TABLE IF NOT EXISTS `email_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Template name',
  `subject` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Email subject',
  `template` text NOT NULL COMMENT 'HTML template',
  `body` text NOT NULL COMMENT 'Email body',
  `use_html` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Use HTML email',
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entry_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Email templates' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL COMMENT 'Client being invoiced',
  `group_id` int(11) NOT NULL COMMENT 'Invoice group to use',
  `invoice_no` varchar(20) NOT NULL COMMENT 'Invoice number',
  `invoice_date` date NOT NULL COMMENT 'Invoice date',
  `due_date` date NOT NULL COMMENT 'Due date',
  `status_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Quote status',
  `tax_id` int(11) DEFAULT NULL COMMENT 'Tax applied for the transaction',
  `tax_rate` double DEFAULT NULL COMMENT 'Tax rate (historical data)',
  `currency_id` int(11) NOT NULL COMMENT 'Quote currency',
  `currency_rate` decimal(15,12) NOT NULL DEFAULT '1.000000000000' COMMENT 'Currency conversion rate to local currency',
  `terms` text COMMENT 'Invoice terms',
  `notes` text COMMENT 'Invoice notes',
  `guest_url` varchar(50) NOT NULL COMMENT 'Unique quote URL for online viewing',
  `quote_id` int(11) DEFAULT NULL COMMENT 'Quote ID if linked',
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entry_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `quote_no` (`invoice_no`),
  KEY `group_id` (`group_id`),
  KEY `status_id` (`status_id`),
  KEY `currency_id` (`currency_id`),
  KEY `quote_id` (`quote_id`),
  KEY `tax_id` (`tax_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Invoices' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_detail`
--

CREATE TABLE IF NOT EXISTS `invoice_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL COMMENT 'Invoice this item belongs to',
  `item_no` varchar(50) DEFAULT NULL COMMENT 'Item number',
  `item_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Item name',
  `qty` double NOT NULL DEFAULT '1' COMMENT 'Quantity',
  `unit_price` decimal(15,4) NOT NULL DEFAULT '0.0000' COMMENT 'Unit price',
  `unit_discount` decimal(15,4) DEFAULT NULL COMMENT 'Unit discounts',
  `tax_id` int(11) DEFAULT NULL COMMENT 'Applicable tax rate',
  `tax_rate` double DEFAULT NULL COMMENT 'Tax rate (historical data)',
  `description` text COMMENT 'Item description',
  PRIMARY KEY (`id`),
  KEY `invoice_id` (`invoice_id`),
  KEY `tax_id` (`tax_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Invoice details' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_group`
--

CREATE TABLE IF NOT EXISTS `invoice_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT 'Invoice group name',
  `template_name` varchar(255) NOT NULL COMMENT 'Template name. See templates folder for list of available templates.',
  `default_email_id` int(11) DEFAULT NULL COMMENT 'Email template to use when sending emails',
  `paid_email_id` int(11) DEFAULT NULL COMMENT 'Email template to use when paid',
  `overdue_email_id` int(11) DEFAULT NULL COMMENT 'Email template to use when overdue',
  `number_pattern` varchar(50) NOT NULL DEFAULT '{YY}{N}' COMMENT 'Numbering pattern',
  `number_padding` tinyint(2) NOT NULL DEFAULT '4' COMMENT 'Leading zeros in numbering',
  `next_number` int(11) NOT NULL DEFAULT '1' COMMENT 'Numbering for next invoice/quote',
  `expiry_days` int(11) NOT NULL DEFAULT '30' COMMENT 'Expiration/due in specified days',
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entry_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `default_email_id` (`default_email_id`),
  KEY `overdue_email_id` (`overdue_email_id`),
  KEY `paid_email_id` (`paid_email_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Invoice/quote groups' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_status`
--

CREATE TABLE IF NOT EXISTS `invoice_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT 'Status name',
  `color` char(6) NOT NULL DEFAULT '888888' COMMENT 'Status color in hex',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Invoice statuses. 0 is reserved for draft.' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `invoice_status`
--

INSERT INTO `invoice_status` (`id`, `status`, `color`) VALUES
(0, 'Draft', '888888');

-- --------------------------------------------------------

--
-- Table structure for table `item_lookup`
--

CREATE TABLE IF NOT EXISTS `item_lookup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_no` varchar(50) DEFAULT NULL COMMENT 'Item number',
  `item_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Item name',
  `unit_price` decimal(15,4) NOT NULL DEFAULT '0.0000' COMMENT 'Unit price',
  `unit_discount` decimal(15,4) DEFAULT NULL COMMENT 'Unit discounts',
  `currency_id` int(11) NOT NULL COMMENT 'Currency in use',
  `tax_id` int(11) DEFAULT NULL COMMENT 'Applicable tax rate',
  `description` text COMMENT 'Item description',
  PRIMARY KEY (`id`),
  KEY `currency_id` (`currency_id`),
  KEY `tax_id` (`tax_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Item lookup for quick invoice writing' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL COMMENT 'Invoice paid',
  `payment_date` date NOT NULL COMMENT 'Payment date',
  `payment_method_id` int(11) DEFAULT NULL COMMENT 'Method of payment',
  `amount` decimal(15,4) NOT NULL DEFAULT '0.0000' COMMENT 'Amount paid in assigned currency',
  `currency_id` int(11) NOT NULL COMMENT 'Currency used to pay',
  `currency_rate` decimal(15,12) NOT NULL DEFAULT '1.000000000000' COMMENT 'Exchange rate to local currency',
  `notes` text COMMENT 'Payment notes',
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entry_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoice_id` (`invoice_id`),
  KEY `payment_method_id` (`payment_method_id`),
  KEY `currency_id` (`currency_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Payments' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE IF NOT EXISTS `payment_method` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT 'Method name',
  `enabled` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Whether this method is enabled',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Payment methods' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `quote`
--

CREATE TABLE IF NOT EXISTS `quote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL COMMENT 'Client of the quoted',
  `group_id` int(11) NOT NULL COMMENT 'Invoice group to use',
  `quote_no` varchar(20) NOT NULL COMMENT 'Quote number',
  `quote_date` date NOT NULL COMMENT 'Quote date',
  `expiry_date` date NOT NULL COMMENT 'Expiry date',
  `status_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Quote status',
  `tax_id` int(11) DEFAULT NULL COMMENT 'Tax applied for the transaction',
  `tax_rate` double DEFAULT NULL COMMENT 'Tax rate (historical data)',
  `currency_id` int(11) NOT NULL COMMENT 'Quote currency',
  `terms` text COMMENT 'Quote terms',
  `notes` text COMMENT 'Quote notes',
  `guest_url` varchar(50) NOT NULL COMMENT 'Unique quote URL for online viewing',
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entry_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `quote_no` (`quote_no`),
  KEY `client_id` (`client_id`),
  KEY `group_id` (`group_id`),
  KEY `status_id` (`status_id`),
  KEY `tax_id` (`tax_id`),
  KEY `currency_id` (`currency_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Quotations' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `quote_detail`
--

CREATE TABLE IF NOT EXISTS `quote_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quote_id` int(11) NOT NULL COMMENT 'Quote ID this item belongs to',
  `item_no` varchar(50) DEFAULT NULL COMMENT 'Item number',
  `item_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Item name',
  `qty` double NOT NULL DEFAULT '1' COMMENT 'Quantity',
  `unit_price` decimal(15,4) NOT NULL DEFAULT '0.0000' COMMENT 'Unit price',
  `unit_discount` decimal(15,4) DEFAULT NULL COMMENT 'Unit discounts',
  `tax_id` int(11) DEFAULT NULL COMMENT 'Applicable tax rate',
  `tax_rate` double DEFAULT NULL COMMENT 'Tax rate (historical data)',
  `description` text COMMENT 'Item description',
  PRIMARY KEY (`id`),
  KEY `quote_id` (`quote_id`),
  KEY `tax_id` (`tax_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Quote details' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `quote_status`
--

CREATE TABLE IF NOT EXISTS `quote_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT 'Status name',
  `color` char(6) NOT NULL DEFAULT '888888' COMMENT 'Status color in hex',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Quotation statuses. 0 is reserved for draft.' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `quote_status`
--

INSERT INTO `quote_status` (`id`, `status`, `color`) VALUES
(0, 'Draft', '888888');

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE IF NOT EXISTS `tax` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Tax name',
  `rate` double NOT NULL DEFAULT '0' COMMENT 'Tax rate in percent',
  `apply_first` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Apply this tax before item tax (used for invoice tax)',
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entry_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tax rates' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL COMMENT 'User email address, used to login',
  `password` char(32) NOT NULL COMMENT 'Password in MD5',
  `full_name` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Full name',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Whether this user is a system administrator',
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entry_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='User accounts' AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_currency` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_ibfk_group` FOREIGN KEY (`group_id`) REFERENCES `invoice_group` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_ibfk_quote` FOREIGN KEY (`quote_id`) REFERENCES `quote` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_ibfk_status` FOREIGN KEY (`status_id`) REFERENCES `invoice_status` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_ibfk_tax` FOREIGN KEY (`tax_id`) REFERENCES `tax` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `invoice_detail`
--
ALTER TABLE `invoice_detail`
  ADD CONSTRAINT `invoice_detail_ibfk_invoice` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_detail_ibfk_tax` FOREIGN KEY (`tax_id`) REFERENCES `tax` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `invoice_group`
--
ALTER TABLE `invoice_group`
  ADD CONSTRAINT `invoice_group_ibfk_default_email` FOREIGN KEY (`default_email_id`) REFERENCES `email_template` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_group_ibfk_overdue_email` FOREIGN KEY (`overdue_email_id`) REFERENCES `email_template` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_group_ibfk_paid_email` FOREIGN KEY (`paid_email_id`) REFERENCES `email_template` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `item_lookup`
--
ALTER TABLE `item_lookup`
  ADD CONSTRAINT `item_lookup_ibfk_currency` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `item_lookup_ibfk_tax` FOREIGN KEY (`tax_id`) REFERENCES `tax` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_currency` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_invoice` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_method` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_method` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `quote`
--
ALTER TABLE `quote`
  ADD CONSTRAINT `quote_ibfk_client` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `quote_ibfk_currency` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `quote_ibfk_group` FOREIGN KEY (`group_id`) REFERENCES `invoice_group` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `quote_ibfk_status` FOREIGN KEY (`status_id`) REFERENCES `quote_status` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `quote_ibfk_tax` FOREIGN KEY (`tax_id`) REFERENCES `tax` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `quote_detail`
--
ALTER TABLE `quote_detail`
  ADD CONSTRAINT `quote_detail_ibfk_quote` FOREIGN KEY (`quote_id`) REFERENCES `quote` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quote_detail_ibfk_tax` FOREIGN KEY (`tax_id`) REFERENCES `tax` (`id`) ON UPDATE CASCADE;
