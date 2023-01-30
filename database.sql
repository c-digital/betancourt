-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 30-01-2023 a las 17:14:55
-- Versión del servidor: 5.7.41
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `betancourt_admin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acc_account_name`
--

CREATE TABLE `acc_account_name` (
  `account_id` int(11) UNSIGNED NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `acc_account_name`
--

INSERT INTO `acc_account_name` (`account_id`, `account_name`, `account_type`) VALUES
(1, 'Salario del empleado', 0),
(3, 'Example', 1),
(4, 'Loan Expense', 0),
(5, 'Loan Income', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acc_coa`
--

CREATE TABLE `acc_coa` (
  `HeadCode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `HeadName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `PHeadName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `HeadLevel` int(11) NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `IsTransaction` tinyint(1) NOT NULL,
  `IsGL` tinyint(1) NOT NULL,
  `HeadType` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `IsBudget` tinyint(1) NOT NULL,
  `IsDepreciation` tinyint(1) NOT NULL,
  `DepreciationRate` decimal(18,2) NOT NULL,
  `CreateBy` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdateBy` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `UpdateDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `acc_coa`
--

INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES
('502020100009', '10-Noel-Atiare', 'Employee Payable', 4, 1, 1, 0, 'L', 0, 0, '0.00', '1', '2023-01-13 21:47:49', '', '0000-00-00 00:00:00'),
('502020100010', '11-David-Rojas', 'Employee Payable', 4, 1, 1, 0, 'L', 0, 0, '0.00', '1', '2023-01-19 22:55:21', '', '0000-00-00 00:00:00'),
('502020100011', '12-Dr. Mario -G. Cuella Lens', 'Employee Payable', 4, 1, 1, 0, 'L', 0, 0, '0.00', '1', '2023-01-19 23:06:40', '', '0000-00-00 00:00:00'),
('502020100012', '13-Susel-Fernandes', 'Employee Payable', 4, 1, 1, 0, 'L', 0, 0, '0.00', '1', '2023-01-24 19:49:24', '', '0000-00-00 00:00:00'),
('502020100013', '14-Isabel -A', 'Employee Payable', 4, 1, 1, 0, 'L', 0, 0, '0.00', '1', '2023-01-25 13:24:30', '', '0000-00-00 00:00:00'),
('502020100001', '2-Farmacia-Farmacia', 'Employee Payable', 4, 1, 1, 0, 'L', 0, 0, '0.00', '1', '2022-04-19 12:14:08', '', '0000-00-00 00:00:00'),
('502020100002', '3-Dra Susel-Betancourt', 'Employee Payable', 4, 1, 1, 0, 'L', 0, 0, '0.00', '1', '2022-04-19 12:51:57', '', '0000-00-00 00:00:00'),
('502020100003', '4-Lola Melean-Rodriguez', 'Employee Payable', 4, 1, 1, 0, 'L', 0, 0, '0.00', '1', '2022-04-30 14:05:44', '', '0000-00-00 00:00:00'),
('502020100004', '5-Marco Antonio-Condori Vargas', 'Employee Payable', 4, 1, 1, 0, 'L', 0, 0, '0.00', '4', '2022-06-08 13:05:12', '', '0000-00-00 00:00:00'),
('502020100005', '6-Reyna-Rengel', 'Employee Payable', 4, 1, 1, 0, 'L', 0, 0, '0.00', '1', '2022-06-09 19:32:55', '', '0000-00-00 00:00:00'),
('502020100006', '7-Dra Susel-Betancourt', 'Employee Payable', 4, 1, 1, 0, 'L', 0, 0, '0.00', '1', '2022-07-06 13:34:09', '', '0000-00-00 00:00:00'),
('502020100007', '8-Jose-canet', 'Employee Payable', 4, 1, 1, 0, 'L', 0, 0, '0.00', '1', '2022-08-04 13:45:28', '', '0000-00-00 00:00:00'),
('502020100008', '9-Maria de Lurdes-Mira Martines', 'Employee Payable', 4, 1, 1, 0, 'L', 0, 0, '0.00', '1', '2023-01-09 20:25:17', '', '0000-00-00 00:00:00'),
('4021403', 'AC', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:33:55', '', '2020-02-02 00:00:00'),
('50202', 'Account Payable', 'Ejemplo-3', 2, 1, 0, 1, 'L', 0, 0, '0.00', 'admin', '2015-10-15 19:50:43', '', '2020-02-02 00:00:00'),
('10203', 'Account Receivable', 'Activo Actual', 2, 1, 0, 0, 'A', 0, 0, '0.00', '', '2020-02-02 00:00:00', 'admin', '2013-09-18 15:29:35'),
('102', 'Activo Actual', 'Activos', 1, 1, 0, 0, 'A', 0, 0, '0.00', '1', '2022-06-02 00:14:06', 'admin', '2018-07-07 11:23:00'),
('1', 'Activos', 'Chart Of Accounts', 0, 1, 0, 0, 'A', 0, 0, '0.00', '10', '2023-01-26 21:50:42', '', '2020-02-02 00:00:00'),
('101', 'Activos no Circulantes', 'Activos', 1, 1, 0, 0, 'A', 0, 0, '0.00', '1', '2022-08-19 21:10:44', 'admin', '2015-10-15 15:29:11'),
('1020201', 'Advance', 'Advance, Deposit And Pre-payments', 3, 1, 0, 1, 'A', 0, 0, '0.00', 'Zoherul', '2015-05-31 13:29:12', 'admin', '2015-12-31 16:46:32'),
('102020103', 'Advance House Rent', 'Advance', 4, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2016-10-02 16:55:38', 'admin', '2016-10-02 16:57:32'),
('10202', 'Advance, Deposit And Pre-payments', 'Activo Actual', 2, 1, 0, 0, 'A', 0, 0, '0.00', '', '2020-02-02 00:00:00', 'admin', '2015-12-31 16:46:24'),
('4020602', 'Advertisement and Publicity', 'Promonational Expence', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:51:44', '', '2020-02-02 00:00:00'),
('1010410', 'Air Cooler', 'Others Assets', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2016-05-23 12:13:55', '', '2020-02-02 00:00:00'),
('4020603', 'AIT Against Advertisement', 'Promonational Expence', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:52:09', '', '2020-02-02 00:00:00'),
('1010204', 'Attendance Machine', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:49:31', '', '2020-02-02 00:00:00'),
('40216', 'Audit Fee', 'Ejemplo-9', 2, 1, 1, 1, 'E', 0, 0, '0.00', 'admin', '2017-07-18 12:54:30', '', '2020-02-02 00:00:00'),
('102010202', 'Bank Asia', 'Cash At Bank', 4, 1, 1, 0, 'A', 0, 0, '0.00', '2', '2019-01-26 08:50:05', '', '2020-02-02 00:00:00'),
('4021002', 'Bank Charge', 'Financial Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:21:03', '', '2020-02-02 00:00:00'),
('30203', 'Bank Interest', 'Ejemplo-1', 2, 1, 1, 1, 'I', 0, 0, '0.00', 'Obaidul', '2015-01-03 14:49:54', 'admin', '2016-09-25 11:04:19'),
('1010104', 'Book Shelf', 'Furniture & Fixturers', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:46:11', '', '2020-02-02 00:00:00'),
('1010407', 'Books and Journal', 'Others Assets', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2016-03-27 10:45:37', '', '2020-02-02 00:00:00'),
('4020604', 'Business Development Expenses', 'Promonational Expence', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:52:29', '', '2020-02-02 00:00:00'),
('4020606', 'Campaign Expenses', 'Promonational Expence', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:52:57', 'admin', '2016-09-19 14:52:48'),
('4020502', 'Campus Rent', 'House Rent', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:46:53', 'admin', '2017-04-27 17:02:39'),
('40212', 'Car Running Expenses', 'Ejemplo-9', 2, 1, 0, 1, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:28:43', '', '2020-02-02 00:00:00'),
('10201', 'Cash & Cash Equivalent', 'Activo Actual', 2, 1, 0, 0, 'A', 0, 0, '0.00', '', '2020-02-02 00:00:00', 'admin', '2015-10-15 15:57:55'),
('1020102', 'Cash At Bank', 'Cash & Cash Equivalent', 3, 1, 0, 0, 'A', 0, 0, '0.00', '2', '2018-07-19 13:43:59', 'admin', '2015-10-15 15:32:42'),
('1020101', 'Cash In Hand', 'Cash & Cash Equivalent', 3, 1, 1, 1, 'A', 0, 0, '0.00', '2', '2018-07-31 12:56:28', 'admin', '2016-05-23 12:05:43'),
('30101', 'Cash Sale', 'Ejemplo-2', 1, 1, 1, 1, 'I', 0, 0, '0.00', '2', '2018-07-08 07:51:26', '', '2020-02-02 00:00:00'),
('1010207', 'CCTV', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:51:24', '', '2020-02-02 00:00:00'),
('102020102', 'CEO Current A/C', 'Advance', 4, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2016-09-25 11:54:54', '', '2020-02-02 00:00:00'),
('1010101', 'Class Room Chair', 'Furniture & Fixturers', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:45:29', '', '2020-02-02 00:00:00'),
('4021407', 'Close Circuit Cemera', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:35:35', '', '2020-02-02 00:00:00'),
('4020601', 'Commision on Admission', 'Promonational Expence', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:51:21', 'admin', '2016-09-19 14:42:54'),
('1010206', 'Computer', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:51:09', '', '2020-02-02 00:00:00'),
('4021410', 'Computer (R)', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'Zoherul', '2016-03-24 12:38:52', 'Zoherul', '2016-03-24 12:41:40'),
('1010102', 'Computer Table', 'Furniture & Fixturers', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:45:44', '', '2020-02-02 00:00:00'),
('301020401', 'Continuing Registration fee - UoL (Income)', 'Registration Fee (UOL) Income', 4, 1, 1, 0, 'I', 0, 0, '0.00', 'admin', '2015-10-15 17:40:40', '', '2020-02-02 00:00:00'),
('4020904', 'Contratuall Staff Salary', 'Salary & Allowances', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:12:34', '', '2020-02-02 00:00:00'),
('30102', 'Credit Sale', 'Ejemplo-2', 1, 1, 1, 1, 'I', 0, 0, '0.00', '2', '2018-07-08 07:51:34', '', '2020-02-02 00:00:00'),
('4020709', 'Cultural Expense', 'Miscellaneous Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'nasmud', '2017-04-29 12:45:10', '', '2020-02-02 00:00:00'),
('40100002', 'cw-Chichawatni', 'Ejemplo-11', 2, 1, 1, 0, 'E', 0, 0, '0.00', '2', '2018-08-02 16:30:41', '', '2020-02-02 00:00:00'),
('102010204', 'Default Bank', 'Cash At Bank', 4, 1, 1, 0, 'A', 0, 0, '0.00', '2', '2019-01-20 08:15:42', '', '2020-02-02 00:00:00'),
('1020202', 'Deposit', 'Advance, Deposit And Pre-payments', 3, 1, 0, 0, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:40:42', '', '2020-02-02 00:00:00'),
('4020605', 'Design & Printing Expense', 'Promonational Expence', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:55:00', '', '2020-02-02 00:00:00'),
('4020404', 'Dish Bill', 'Utility Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:58:21', '', '2020-02-02 00:00:00'),
('40215', 'Dividend', 'Ejemplo-9', 2, 1, 1, 1, 'E', 0, 0, '0.00', 'admin', '2016-09-25 14:07:55', '', '2020-02-02 00:00:00'),
('4020403', 'Drinking Water Bill', 'Utility Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:58:10', '', '2020-02-02 00:00:00'),
('1010211', 'DSLR Camera', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:53:17', 'admin', '2016-01-02 16:23:25'),
('4020908', 'Earned Leave', 'Salary & Allowances', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:13:38', '', '2020-02-02 00:00:00'),
('4020607', 'Education Fair Expenses', 'Promonational Expence', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:53:42', '', '2020-02-02 00:00:00'),
('3', 'Egreso', 'Chart Of Accounts', 0, 1, 0, 0, 'I', 0, 0, '0.00', '1', '2023-01-26 20:05:46', '', '2020-02-02 00:00:00'),
('302', 'Ejemplo-1', 'Egreso', 1, 1, 0, 0, 'I', 0, 0, '0.00', '10', '2023-01-26 21:49:19', 'admin', '2016-09-25 11:04:09'),
('404', 'Ejemplo-10', 'Patrimonio', 1, 1, 1, 0, 'E', 0, 0, '0.00', '10', '2023-01-26 21:50:52', '', '2020-02-02 00:00:00'),
('401', 'Ejemplo-11', 'Patrimonio', 1, 1, 0, 0, 'E', 0, 0, '0.00', '10', '2023-01-26 21:51:03', 'admin', '2015-10-15 17:58:46'),
('301', 'Ejemplo-2', 'Egreso', 1, 1, 0, 0, 'I', 0, 0, '0.00', '10', '2023-01-26 21:49:29', 'admin', '2015-09-17 17:00:02'),
('502', 'Ejemplo-3', 'Gastos', 1, 1, 0, 0, 'L', 0, 0, '0.00', '10', '2023-01-26 21:49:37', 'admin', '2015-10-15 19:49:21'),
('501', 'Ejemplo-4', 'Gastos', 1, 1, 0, 0, 'L', 0, 0, '0.00', '10', '2023-01-26 21:49:45', 'admin', '2015-10-15 19:49:21'),
('202', 'Ejemplo-5', 'Pasivos', 1, 1, 0, 1, 'L', 0, 0, '0.00', '10', '2023-01-26 21:50:02', 'admin', '2016-10-02 17:48:57'),
('203', 'Ejemplo-6', 'Pasivos', 1, 1, 0, 0, 'L', 0, 0, '0.00', '10', '2023-01-26 21:50:11', '', '0000-00-00 00:00:00'),
('201', 'Ejemplo-7', 'Pasivos', 1, 1, 0, 0, 'L', 0, 0, '0.00', '10', '2023-01-26 21:50:20', 'admin', '2015-10-15 19:43:51'),
('403', 'Ejemplo-8', 'Patrimonio', 0, 1, 1, 0, 'E', 0, 0, '0.00', '10', '2023-01-26 21:50:28', '', '2020-02-02 00:00:00'),
('402', 'Ejemplo-9', 'Patrimonio', 1, 1, 0, 0, 'E', 0, 0, '0.00', '10', '2023-01-26 21:50:39', 'admin', '2015-10-15 18:37:42'),
('1010602', 'Electric Equipment', 'Electrical Equipment', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2016-03-27 10:44:51', '', '2020-02-02 00:00:00'),
('1010203', 'Electric Kettle', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:49:07', '', '2020-02-02 00:00:00'),
('10106', 'Electrical Equipment', 'Activos no Circulantes', 2, 1, 0, 1, 'A', 0, 0, '0.00', 'admin', '2016-03-27 10:43:44', '', '2020-02-02 00:00:00'),
('4020407', 'Electricity Bill', 'Utility Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:59:31', '', '2020-02-02 00:00:00'),
('10202010501', 'employ', 'Salary', 5, 1, 0, 0, 'A', 0, 0, '0.00', 'admin', '2018-07-05 11:47:10', '', '2020-02-02 00:00:00'),
('5020201', 'Employee Payable', 'Account Payable', 3, 1, 0, 1, 'L', 0, 0, '0.00', '2', '2019-01-07 10:16:12', '', '2020-02-02 00:00:00'),
('1020301', 'Employee Receivable', 'Account Receivable', 3, 1, 0, 1, 'A', 0, 0, '0.00', '2', '2018-10-17 11:13:45', 'admin', '2018-07-07 12:31:42'),
('40201', 'Entertainment', 'Ejemplo-9', 2, 1, 1, 1, 'E', 0, 0, '0.00', 'admin', '2013-07-08 16:21:26', 'anwarul', '2013-07-17 14:21:47'),
('4020903', 'Faculty,Staff Salary & Allowances', 'Salary & Allowances', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:12:21', '', '2020-02-02 00:00:00'),
('4021404', 'Fax Machine', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:34:15', '', '2020-02-02 00:00:00'),
('4020905', 'Festival & Incentive Bonus', 'Salary & Allowances', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:12:48', '', '2020-02-02 00:00:00'),
('1010103', 'File Cabinet', 'Furniture & Fixturers', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:46:02', '', '2020-02-02 00:00:00'),
('40210', 'Financial Expenses', 'Ejemplo-9', 2, 1, 0, 1, 'E', 0, 0, '0.00', 'anwarul', '2013-08-20 12:24:31', 'admin', '2015-10-15 19:20:36'),
('1010403', 'Fire Extingushier', 'Others Assets', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2016-03-27 10:39:32', '', '2020-02-02 00:00:00'),
('4021408', 'Furniture', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:35:47', '', '2020-02-02 00:00:00'),
('10101', 'Furniture & Fixturers', 'Activos no Circulantes', 2, 1, 0, 1, 'A', 0, 0, '0.00', 'anwarul', '2013-08-20 16:18:15', 'anwarul', '2013-08-21 13:35:40'),
('4020406', 'Gas Bill', 'Utility Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:59:20', '', '2020-02-02 00:00:00'),
('5', 'Gastos', 'Chart Of Accounts', 0, 1, 0, 0, 'L', 0, 0, '0.00', '1', '2023-01-26 20:06:32', 'admin', '2015-10-15 19:46:54'),
('20201', 'General Reserve', 'Ejemplo-5', 2, 1, 1, 0, 'L', 0, 0, '0.00', 'admin', '2016-09-25 14:07:12', 'admin', '2016-10-02 17:48:49'),
('10105', 'Generator', 'Activos no Circulantes', 2, 1, 1, 1, 'A', 0, 0, '0.00', 'Zoherul', '2016-02-27 16:02:35', 'admin', '2016-05-23 12:05:18'),
('4021414', 'Generator Repair', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'Zoherul', '2016-06-16 10:21:05', '', '2020-02-02 00:00:00'),
('40213', 'Generator Running Expenses', 'Ejemplo-9', 2, 1, 0, 1, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:29:29', '', '2020-02-02 00:00:00'),
('10103', 'Groceries and Cutleries', 'Activos no Circulantes', 2, 1, 1, 1, 'A', 0, 0, '0.00', '2', '2018-07-12 10:02:55', '', '2020-02-02 00:00:00'),
('1010408', 'Gym Equipment', 'Others Assets', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2016-03-27 10:46:03', '', '2020-02-02 00:00:00'),
('4020907', 'Honorarium', 'Salary & Allowances', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:13:26', '', '2020-02-02 00:00:00'),
('40205', 'House Rent', 'Ejemplo-9', 2, 1, 0, 1, 'E', 0, 0, '0.00', 'anwarul', '2013-08-24 10:26:56', '', '2020-02-02 00:00:00'),
('40100001', 'HP-Hasilpur', 'Academic Expenses', 2, 1, 1, 0, 'E', 0, 0, '0.00', '2', '2018-07-29 03:44:23', '', '2020-02-02 00:00:00'),
('4020702', 'HR Recruitment Expenses', 'Miscellaneous Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2016-09-25 12:55:49', '', '2020-02-02 00:00:00'),
('4020703', 'Incentive on Admission', 'Miscellaneous Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2016-09-25 12:56:09', '', '2020-02-02 00:00:00'),
('30204', 'Income from Photocopy & Printing', 'Ejemplo-1', 2, 1, 1, 1, 'I', 0, 0, '0.00', 'Zoherul', '2015-07-14 10:29:54', 'admin', '2016-09-25 11:04:28'),
('5020302', 'Income Tax Payable', 'Liabilities for Expenses', 3, 1, 0, 1, 'L', 0, 0, '0.00', 'admin', '2016-09-19 11:18:17', 'admin', '2016-09-28 13:18:35'),
('102020302', 'Insurance Premium', 'Prepayment', 4, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2016-09-19 13:10:57', '', '2020-02-02 00:00:00'),
('4021001', 'Interest on Loan', 'Financial Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:20:53', 'admin', '2016-09-19 14:53:34'),
('4020401', 'Internet Bill', 'Utility Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:56:55', 'admin', '2015-10-15 18:57:32'),
('10107', 'Inventory', 'Activos no Circulantes', 1, 1, 0, 0, 'A', 0, 0, '0.00', '2', '2018-07-07 15:21:58', '', '2020-02-02 00:00:00'),
('10205010101', 'Jahangir', 'Hasan', 1, 1, 0, 0, 'A', 0, 0, '0.00', '2', '2018-07-07 10:40:56', '', '2020-02-02 00:00:00'),
('1010210', 'LCD TV', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:52:27', '', '2020-02-02 00:00:00'),
('30103', 'Lease Sale', 'Ejemplo-2', 1, 1, 1, 1, 'I', 0, 0, '0.00', '2', '2018-07-08 07:51:52', '', '2020-02-02 00:00:00'),
('50203', 'Liabilities for Expenses', 'Ejemplo-3', 2, 1, 0, 0, 'L', 0, 0, '0.00', 'admin', '2015-10-15 19:50:59', '', '2020-02-02 00:00:00'),
('4020707', 'Library Expenses', 'Miscellaneous Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2017-01-10 15:34:54', '', '2020-02-02 00:00:00'),
('4021409', 'Lift', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:36:12', '', '2020-02-02 00:00:00'),
('50101', 'Long Term Borrowing', 'Ejemplo-4', 2, 1, 0, 1, 'L', 0, 0, '0.00', 'admin', '2013-07-04 12:32:26', 'admin', '2015-10-15 19:47:40'),
('4020608', 'Marketing & Promotion Exp.', 'Promonational Expence', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:53:59', '', '2020-02-02 00:00:00'),
('4020901', 'Medical Allowance', 'Salary & Allowances', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:11:33', '', '2020-02-02 00:00:00'),
('1010411', 'Metal Ditector', 'Others Assets', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'Zoherul', '2016-08-22 10:55:22', '', '2020-02-02 00:00:00'),
('4021413', 'Micro Oven', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'Zoherul', '2016-05-12 14:53:51', '', '2020-02-02 00:00:00'),
('30202', 'Miscellaneous (Income)', 'Ejemplo-1', 2, 1, 1, 1, 'I', 0, 0, '0.00', 'anwarul', '2014-02-06 15:26:31', 'admin', '2016-09-25 11:04:35'),
('4020909', 'Miscellaneous Benifit', 'Salary & Allowances', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:13:53', '', '2020-02-02 00:00:00'),
('4020701', 'Miscellaneous Exp', 'Miscellaneous Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2016-09-25 12:54:39', '', '2020-02-02 00:00:00'),
('40207', 'Miscellaneous Expenses', 'Ejemplo-9', 2, 1, 0, 1, 'E', 0, 0, '0.00', 'anwarul', '2014-04-26 16:49:56', 'admin', '2016-09-25 12:54:19'),
('1010401', 'Mobile Phone', 'Others Assets', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2016-01-29 10:43:30', '', '2020-02-02 00:00:00'),
('1010212', 'Network Accessories', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2016-01-02 16:23:32', '', '2020-02-02 00:00:00'),
('4020408', 'News Paper Bill', 'Utility Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2016-01-02 15:55:57', '', '2020-02-02 00:00:00'),
('1010404', 'Office Decoration', 'Others Assets', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2016-03-27 10:40:02', '', '2020-02-02 00:00:00'),
('10102', 'Office Equipment', 'Activos no Circulantes', 2, 1, 0, 1, 'A', 0, 0, '0.00', 'anwarul', '2013-12-06 18:08:00', 'admin', '2015-10-15 15:48:21'),
('4021401', 'Office Repair & Maintenance', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:33:15', '', '2020-02-02 00:00:00'),
('30201', 'Office Stationary (Income)', 'Ejemplo-1', 2, 1, 1, 1, 'I', 0, 0, '0.00', 'anwarul', '2013-07-17 15:21:06', 'admin', '2016-09-25 11:04:50'),
('40211', 'Others (Non Academic Expenses)', 'Ejemplo-9', 2, 1, 0, 1, 'E', 0, 0, '0.00', 'Obaidul', '2014-12-03 16:05:42', 'admin', '2015-10-15 19:22:09'),
('30205', 'Others (Non-Academic Income)', 'Ejemplo-1', 2, 1, 0, 1, 'I', 0, 0, '0.00', 'admin', '2015-10-15 17:23:49', 'admin', '2015-10-15 17:57:52'),
('10104', 'Others Assets', 'Activos no Circulantes', 2, 1, 0, 1, 'A', 0, 0, '0.00', 'admin', '2016-01-29 10:43:16', '', '2020-02-02 00:00:00'),
('4020910', 'Outstanding Salary', 'Salary & Allowances', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'Zoherul', '2016-04-24 11:56:50', '', '2020-02-02 00:00:00'),
('4021405', 'Oven', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:34:31', '', '2020-02-02 00:00:00'),
('102030200007', 'P2OKPVLD-Noel-Atiare', 'Patient Receivable', 4, 1, 1, 0, 'A', 0, 0, '0.00', '1', '2023-01-13 22:05:25', '', '0000-00-00 00:00:00'),
('102030200011', 'P425VEPW-Isabel-Romero Mendez', 'Patient Receivable', 4, 1, 1, 0, 'A', 0, 0, '0.00', '4', '2023-01-27 20:42:31', '', '0000-00-00 00:00:00'),
('102030200005', 'P63G0TSG-jorge-torrico ortuño', 'Patient Receivable', 4, 1, 1, 0, 'A', 0, 0, '0.00', '4', '2022-07-08 12:33:49', '', '0000-00-00 00:00:00'),
('102030200009', 'P70POQX8-Javier-Gonzalez', 'Patient Receivable', 4, 1, 1, 0, 'A', 0, 0, '0.00', '1', '2023-01-25 23:38:58', '', '0000-00-00 00:00:00'),
('102030200010', 'P8MO0SAU-carla ninet-ardaya arteaga', 'Patient Receivable', 4, 1, 1, 0, 'A', 0, 0, '0.00', '10', '2023-01-26 20:39:08', '', '0000-00-00 00:00:00'),
('102030200008', 'P9AS15E5-Nisa-Delgado Enrolado', 'Patient Receivable', 4, 1, 1, 0, 'A', 0, 0, '0.00', '1', '2023-01-24 23:43:43', '', '0000-00-00 00:00:00'),
('4021412', 'PABX-Repair', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'Zoherul', '2016-04-24 14:40:18', '', '2020-02-02 00:00:00'),
('4020902', 'Part-time Staff Salary', 'Salary & Allowances', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:12:06', '', '2020-02-02 00:00:00'),
('2', 'Pasivos', 'Chart Of Accounts', 0, 1, 0, 0, 'L', 0, 0, '0.00', '1', '2023-01-26 20:04:03', '', '2020-02-02 00:00:00'),
('1020302', 'Patient Receivable', 'Account Receivable', 3, 1, 0, 1, 'A', 0, 0, '0.00', '2', '2019-01-07 10:00:42', '', '2020-02-02 00:00:00'),
('4', 'Patrimonio', 'Chart Of Accounts', 0, 1, 0, 0, 'E', 0, 0, '0.00', '10', '2023-01-26 21:47:39', '', '2020-02-02 00:00:00'),
('102030200006', 'PGOV0KON-jorge-torrico ortuño', 'Patient Receivable', 4, 1, 1, 0, 'A', 0, 0, '0.00', '4', '2022-07-08 12:33:51', '', '0000-00-00 00:00:00'),
('102030200003', 'PHLJBMVS-Marco Antonio-Condori Vargas', 'Patient Receivable', 4, 1, 1, 0, 'A', 0, 0, '0.00', '4', '2022-06-08 15:09:22', '', '0000-00-00 00:00:00'),
('1010202', 'Photocopy & Fax Machine', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:47:27', 'admin', '2016-05-23 12:14:40'),
('4021411', 'Photocopy Machine Repair', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'Zoherul', '2016-04-24 12:40:02', 'admin', '2017-04-27 17:03:17'),
('102030200002', 'PJXGONMO-Lola-Melean Rodriguez', 'Patient Receivable', 4, 1, 1, 0, 'A', 0, 0, '0.00', '4', '2022-04-30 14:12:47', '', '0000-00-00 00:00:00'),
('102030200012', 'PMAWMJL5-juana -perez', 'Patient Receivable', 4, 1, 1, 0, 'A', 0, 0, '0.00', '4', '2023-01-30 19:33:20', '', '0000-00-00 00:00:00'),
('102030200001', 'PQHZMY23-Erick-Gonçalves dos Santos', 'Patient Receivable', 4, 1, 1, 0, 'A', 0, 0, '0.00', '1', '2022-04-19 12:46:53', '', '0000-00-00 00:00:00'),
('3020503', 'Practical Fee', 'Others (Non-Academic Income)', 3, 1, 1, 1, 'I', 0, 0, '0.00', 'admin', '2017-07-22 18:00:37', '', '2020-02-02 00:00:00'),
('1020203', 'Prepayment', 'Advance, Deposit And Pre-payments', 3, 1, 0, 1, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:40:51', 'admin', '2015-12-31 16:49:58'),
('1010201', 'Printer', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:47:15', '', '2020-02-02 00:00:00'),
('40202', 'Printing and Stationary', 'Ejemplo-9', 2, 1, 1, 1, 'E', 0, 0, '0.00', 'admin', '2013-07-08 16:21:45', 'admin', '2016-09-19 14:39:32'),
('3020502', 'Professional Training Course(Oracal-1)', 'Others (Non-Academic Income)', 3, 1, 1, 0, 'I', 0, 0, '0.00', 'nasim', '2017-06-22 13:28:05', '', '2020-02-02 00:00:00'),
('30207', 'Professional Training Course(Oracal)', 'Ejemplo-1', 2, 1, 0, 1, 'I', 0, 0, '0.00', 'nasim', '2017-06-22 13:24:16', 'nasim', '2017-06-22 13:25:56'),
('1010208', 'Projector', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:51:44', '', '2020-02-02 00:00:00'),
('40206', 'Promonational Expence', 'Ejemplo-9', 2, 1, 0, 1, 'E', 0, 0, '0.00', 'anwarul', '2013-07-11 13:48:57', 'anwarul', '2013-07-17 14:23:03'),
('102030200004', 'PTPBB0YT-Briyith-Unzueta Barrero', 'Patient Receivable', 4, 1, 1, 0, 'A', 0, 0, '0.00', '4', '2022-07-06 13:01:06', '', '0000-00-00 00:00:00'),
('40214', 'Repair and Maintenance', 'Ejemplo-9', 2, 1, 0, 1, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:32:46', '', '2020-02-02 00:00:00'),
('20102', 'Retained Earnings', 'Ejemplo-7', 2, 1, 1, 1, 'L', 0, 0, '0.00', 'admin', '2016-05-23 11:20:40', 'admin', '2016-09-25 14:05:06'),
('4020708', 'River Cruse', 'Miscellaneous Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2017-04-24 15:35:25', '', '2020-02-02 00:00:00'),
('102020105', 'Salary', 'Advance', 4, 1, 0, 0, 'A', 0, 0, '0.00', 'admin', '2018-07-05 11:46:44', '', '2020-02-02 00:00:00'),
('40209', 'Salary & Allowances', 'Ejemplo-9', 2, 1, 0, 1, 'E', 0, 0, '0.00', 'anwarul', '2013-12-12 11:22:58', '', '2020-02-02 00:00:00'),
('1010406', 'Security Equipment', 'Others Assets', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2016-03-27 10:41:30', '', '2020-02-02 00:00:00'),
('20101', 'Share Capital', 'Ejemplo-7', 2, 1, 0, 1, 'L', 0, 0, '0.00', 'anwarul', '2013-12-08 19:37:32', 'admin', '2015-10-15 19:45:35'),
('50201', 'Short Term Borrowing', 'Ejemplo-3', 2, 1, 0, 1, 'L', 0, 0, '0.00', 'admin', '2015-10-15 19:50:30', '', '2020-02-02 00:00:00'),
('40208', 'Software Development Expenses', 'Ejemplo-9', 2, 1, 0, 1, 'E', 0, 0, '0.00', 'anwarul', '2013-11-21 14:13:01', 'admin', '2015-10-15 19:02:51'),
('4020906', 'Special Allowances', 'Salary & Allowances', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:13:13', '', '2020-02-02 00:00:00'),
('50102', 'Sponsors Loan', 'Ejemplo-4', 2, 1, 0, 1, 'L', 0, 0, '0.00', 'admin', '2015-10-15 19:48:02', '', '2020-02-02 00:00:00'),
('4020706', 'Sports Expense', 'Miscellaneous Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'nasmud', '2016-11-09 13:16:53', '', '2020-02-02 00:00:00'),
('3020501', 'Students Info. Correction Fee', 'Others (Non-Academic Income)', 3, 1, 1, 0, 'I', 0, 0, '0.00', 'admin', '2015-10-15 17:24:45', '', '2020-02-02 00:00:00'),
('1010601', 'Sub Station', 'Electrical Equipment', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2016-03-27 10:44:11', '', '2020-02-02 00:00:00'),
('4020704', 'TB Care Expenses', 'Miscellaneous Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2016-10-08 13:03:04', '', '2020-02-02 00:00:00'),
('30206', 'TB Care Income', 'Ejemplo-1', 2, 1, 1, 1, 'I', 0, 0, '0.00', 'admin', '2016-10-08 13:00:56', '', '2020-02-02 00:00:00'),
('4020501', 'TDS on House Rent', 'House Rent', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:44:07', 'admin', '2016-09-19 14:40:16'),
('502030201', 'TDS Payable House Rent', 'Income Tax Payable', 4, 1, 1, 0, 'L', 0, 0, '0.00', 'admin', '2016-09-19 11:19:42', 'admin', '2016-09-28 13:19:37'),
('502030203', 'TDS Payable on Advertisement Bill', 'Income Tax Payable', 4, 1, 1, 0, 'L', 0, 0, '0.00', 'admin', '2016-09-28 13:20:51', '', '2020-02-02 00:00:00'),
('502030202', 'TDS Payable on Salary', 'Income Tax Payable', 4, 1, 1, 0, 'L', 0, 0, '0.00', 'admin', '2016-09-28 13:20:17', '', '2020-02-02 00:00:00'),
('4021402', 'Tea Kettle', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:33:45', '', '2020-02-02 00:00:00'),
('4020402', 'Telephone Bill', 'Utility Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:57:59', '', '2020-02-02 00:00:00'),
('1010209', 'Telephone Set & PABX', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:51:57', 'admin', '2016-10-02 17:10:40'),
('102020104', 'Test', 'Advance', 4, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2018-07-05 11:42:48', '', '2020-02-02 00:00:00'),
('40203', 'Travelling & Conveyance', 'Ejemplo-9', 2, 1, 1, 1, 'E', 0, 0, '0.00', 'admin', '2013-07-08 16:22:06', 'admin', '2015-10-15 18:45:13'),
('4021406', 'TV', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:35:07', '', '2020-02-02 00:00:00'),
('1010205', 'UPS', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:50:38', '', '2020-02-02 00:00:00'),
('40204', 'Utility Expenses', 'Ejemplo-9', 2, 1, 0, 1, 'E', 0, 0, '0.00', 'anwarul', '2013-07-11 16:20:24', 'admin', '2016-01-02 15:55:22'),
('4020503', 'VAT on House Rent Exp', 'House Rent', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:49:22', 'admin', '2016-09-25 14:00:52'),
('5020301', 'VAT Payable', 'Liabilities for Expenses', 3, 1, 0, 1, 'L', 0, 0, '0.00', 'admin', '2015-10-15 19:51:11', 'admin', '2016-09-28 13:23:53'),
('1010409', 'Vehicle A/C', 'Others Assets', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'Zoherul', '2016-05-12 12:13:21', '', '2020-02-02 00:00:00'),
('1010405', 'Voltage Stablizer', 'Others Assets', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2016-03-27 10:40:59', '', '2020-02-02 00:00:00'),
('1010105', 'Waiting Sofa - Steel', 'Furniture & Fixturers', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:46:29', '', '2020-02-02 00:00:00'),
('4020405', 'WASA Bill', 'Utility Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:58:51', '', '2020-02-02 00:00:00'),
('1010402', 'Water Purifier', 'Others Assets', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2016-01-29 11:14:11', '', '2020-02-02 00:00:00'),
('4020705', 'Website Development Expenses', 'Miscellaneous Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2016-10-15 12:42:47', '', '2020-02-02 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acc_transaction`
--

CREATE TABLE `acc_transaction` (
  `ID` int(11) NOT NULL,
  `VNo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Vtype` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `VDate` date DEFAULT NULL,
  `COAID` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Narration` text COLLATE utf8_unicode_ci,
  `Debit` decimal(18,2) DEFAULT NULL,
  `Credit` decimal(18,2) DEFAULT NULL,
  `StoreID` int(11) NOT NULL,
  `IsPosted` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreateBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreateDate` datetime DEFAULT NULL,
  `UpdateBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL,
  `IsAppove` char(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `acc_transaction`
--

INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES
(1, 'CV-1', 'CV', '2022-06-09', '1020101', '', '100.00', '0.00', 0, '1', '1', '2022-06-09 19:24:43', NULL, NULL, '0'),
(2, 'CV-1', 'CV', '2022-06-09', 'adelanto', '', '0.00', '100.00', 0, '1', '1', '2022-06-09 19:24:43', NULL, NULL, '0'),
(3, 'CV-1', 'CV', '2022-06-09', '', '', '0.00', '0.00', 0, '1', '1', '2022-06-09 19:24:43', NULL, NULL, '0'),
(4, 'BLBN4QAHI', 'Patient Bill', '2022-06-14', '102030200001', 'Patient Credit For Bill amount - PQHZMY23', '0.00', '2050.00', 2, '1', '1', '2022-06-14 19:37:41', NULL, NULL, '1'),
(5, 'BLBN4QAHI', 'Patient Bill', '2022-06-14', '102010204', 'Card or Cheque In Debit For Bill from Patient- PQHZMY23', '2050.00', '0.00', 2, '1', '1', '2022-06-14 19:37:41', NULL, NULL, '1'),
(6, 'BLMP2DMJ2', 'Patient Bill', '2022-06-21', '102030200001', 'Patient Credit For Bill amount - PQHZMY23', '0.00', '5000.00', 2, '1', '1', '2022-06-21 19:15:11', NULL, NULL, '1'),
(7, 'BLMP2DMJ2', 'Patient Bill', '2022-06-21', '102010204', 'Card or Cheque In Debit For Bill from Patient- PQHZMY23', '5000.00', '0.00', 2, '1', '1', '2022-06-21 19:15:11', NULL, NULL, '1'),
(8, 'BLSTTNWY1', 'Patient Bill', '2022-06-29', '102030200001', 'Patient Credit For Bill amount - PQHZMY23', '0.00', '100.00', 2, '1', '1', '2022-06-29 14:49:11', NULL, NULL, '1'),
(9, 'BLSTTNWY1', 'Patient Bill', '2022-06-29', '102010204', 'Card or Cheque In Debit For Bill from Patient- PQHZMY23', '100.00', '0.00', 2, '1', '1', '2022-06-29 14:49:11', NULL, NULL, '1'),
(10, '1', 'Patient Advance', '2023-01-13', '102030200001', 'Advance For Patient Id PQHZMY23', '0.00', '500.00', 2, '1', '1', '2023-01-13 22:29:01', NULL, NULL, '1'),
(11, '1', 'Patient Advance', '2023-01-13', '102010204', 'Advance Payment For Patient Id PQHZMY23', '500.00', '0.00', 2, '1', '1', '2023-01-13 22:29:01', NULL, NULL, '1'),
(12, '2', 'Patient Advance', '2023-01-18', '102030200005', 'Advance For Patient Id P63G0TSG', '0.00', '500.00', 2, '1', '4', '2023-01-18 21:30:19', NULL, NULL, '1'),
(13, '2', 'Patient Advance', '2023-01-18', '102010204', 'Advance Payment For Patient Id P63G0TSG', '500.00', '0.00', 2, '1', '4', '2023-01-18 21:30:19', NULL, NULL, '1'),
(14, 'BL0MJZ3UI', 'Patient Bill', '2023-01-20', '102030200006', 'Patient Credit For Bill amount - PGOV0KON', '0.00', '25.00', 2, '1', '4', '2023-01-20 20:44:35', NULL, NULL, '1'),
(15, 'BL0MJZ3UI', 'Patient Bill', '2023-01-20', '102010204', 'Card or Cheque In Debit For Bill from Patient- PGOV0KON', '25.00', '0.00', 2, '1', '4', '2023-01-20 20:44:35', NULL, NULL, '1'),
(16, 'BLJJ0N7RA', 'Patient Bill', '2023-01-21', '102030200006', 'Patient Credit For Bill amount - PGOV0KON', '0.00', '900.00', 2, '1', '1', '2023-01-21 00:33:47', NULL, NULL, '1'),
(17, 'BLJJ0N7RA', 'Patient Bill', '2023-01-21', '102010204', 'Card or Cheque In Debit For Bill from Patient- PGOV0KON', '900.00', '0.00', 2, '1', '1', '2023-01-21 00:33:47', NULL, NULL, '1'),
(18, '4', 'Patient Advance', '2023-01-24', '102030200001', 'Advance For Patient Id PQHZMY23', '0.00', '500.00', 2, '1', '4', '2023-01-24 22:07:29', NULL, NULL, '1'),
(19, '4', 'Patient Advance', '2023-01-24', '102010204', 'Advance Payment For Patient Id PQHZMY23', '500.00', '0.00', 2, '1', '4', '2023-01-24 22:07:29', NULL, NULL, '1'),
(20, 'BLH2CERBT', 'Patient Bill', '2023-01-24', '102030200006', 'Patient Credit For Bill amount - PGOV0KON', '0.00', '450.00', 2, '1', '1', '2023-01-24 23:39:54', NULL, NULL, '1'),
(21, 'BLH2CERBT', 'Patient Bill', '2023-01-24', '102010204', 'Card or Cheque In Debit For Bill from Patient- PGOV0KON', '450.00', '0.00', 2, '1', '1', '2023-01-24 23:39:54', NULL, NULL, '1'),
(22, 'BLIVBWA4H', 'Patient Bill', '2023-01-24', '102030200008', 'Patient Credit For Bill amount - P9AS15E5', '0.00', '240.00', 2, '1', '1', '2023-01-24 23:52:03', NULL, NULL, '1'),
(23, 'BLIVBWA4H', 'Patient Bill', '2023-01-24', '102010204', 'Card or Cheque In Debit For Bill from Patient- P9AS15E5', '240.00', '0.00', 2, '1', '1', '2023-01-24 23:52:03', NULL, NULL, '1'),
(24, '5', 'Patient Advance', '2023-01-24', '102030200008', 'Advance For Patient Id P9AS15E5', '0.00', '300.00', 2, '1', '1', '2023-01-24 23:52:32', NULL, NULL, '1'),
(25, '5', 'Patient Advance', '2023-01-24', '102010204', 'Advance Payment For Patient Id P9AS15E5', '300.00', '0.00', 2, '1', '1', '2023-01-24 23:52:32', NULL, NULL, '1'),
(26, 'BLZFUZS0A', 'Patient Bill', '2023-01-25', NULL, 'Patient Credit For Bill amount - ', '0.00', '400.00', 2, '1', '1', '2023-01-25 17:06:04', NULL, NULL, '1'),
(27, 'BLZFUZS0A', 'Patient Bill', '2023-01-25', '102010204', 'Card or Cheque In Debit For Bill from Patient- ', '400.00', '0.00', 2, '1', '1', '2023-01-25 17:06:04', NULL, NULL, '1'),
(28, 'BL6ML2YKH', 'Patient Bill', '2023-01-25', NULL, 'Patient Credit For Bill amount - ', '0.00', '180.00', 2, '1', '1', '2023-01-25 23:44:18', NULL, NULL, '1'),
(29, 'BL6ML2YKH', 'Patient Bill', '2023-01-25', '102010204', 'Card or Cheque In Debit For Bill from Patient- ', '180.00', '0.00', 2, '1', '1', '2023-01-25 23:44:18', NULL, NULL, '1'),
(30, 'BLY16J17Q', 'Patient Bill', '2023-01-25', NULL, 'Patient Credit For Bill amount - ', '0.00', '7750.00', 2, '1', '1', '2023-01-25 23:49:47', NULL, NULL, '1'),
(31, 'BLY16J17Q', 'Patient Bill', '2023-01-25', '102010204', 'Card or Cheque In Debit For Bill from Patient- ', '7750.00', '0.00', 2, '1', '1', '2023-01-25 23:49:47', NULL, NULL, '1'),
(32, 'BLQCN9HFF', 'Patient Bill', '2023-01-26', NULL, 'Patient Credit For Bill amount - ', '0.00', '100.00', 2, '1', '1', '2023-01-26 20:23:44', NULL, NULL, '1'),
(33, 'BLQCN9HFF', 'Patient Bill', '2023-01-26', '102010204', 'Card or Cheque In Debit For Bill from Patient- ', '100.00', '0.00', 2, '1', '1', '2023-01-26 20:23:44', NULL, NULL, '1'),
(34, 'BL86BAUZY', 'Patient Bill', '2023-01-26', NULL, 'Patient Credit For Bill amount - ', '0.00', '7500.00', 2, '1', '1', '2023-01-26 20:26:12', NULL, NULL, '1'),
(35, 'BL86BAUZY', 'Patient Bill', '2023-01-26', '102010204', 'Card or Cheque In Debit For Bill from Patient- ', '7500.00', '0.00', 2, '1', '1', '2023-01-26 20:26:12', NULL, NULL, '1'),
(36, 'BLT8HRXVR', 'Patient Bill', '2023-01-26', '102030200010', 'Patient Credit For Bill amount - P8MO0SAU', '0.00', '105.00', 2, '1', '10', '2023-01-26 20:47:37', NULL, NULL, '1'),
(37, 'BLT8HRXVR', 'Patient Bill', '2023-01-26', '102010204', 'Card or Cheque In Debit For Bill from Patient- P8MO0SAU', '105.00', '0.00', 2, '1', '10', '2023-01-26 20:47:37', NULL, NULL, '1'),
(38, 'BLX2Z3RKQ', 'Patient Bill', '2023-01-26', '102030200010', 'Patient Credit For Bill amount - P8MO0SAU', '0.00', '350.00', 2, '1', '10', '2023-01-26 20:51:24', NULL, NULL, '1'),
(39, 'BLX2Z3RKQ', 'Patient Bill', '2023-01-26', '102010204', 'Card or Cheque In Debit For Bill from Patient- P8MO0SAU', '350.00', '0.00', 2, '1', '10', '2023-01-26 20:51:24', NULL, NULL, '1'),
(40, 'BLY17H5GW', 'Patient Bill', '2023-01-27', NULL, 'Patient Credit For Bill amount - ', '0.00', '123.00', 2, '1', '10', '2023-01-27 19:59:28', NULL, NULL, '1'),
(41, 'BLY17H5GW', 'Patient Bill', '2023-01-27', '102010204', 'Card or Cheque In Debit For Bill from Patient- ', '123.00', '0.00', 2, '1', '10', '2023-01-27 19:59:28', NULL, NULL, '1'),
(42, 'BL5DK9X70', 'Patient Bill', '2023-01-27', NULL, 'Patient Credit For Bill amount - ', '0.00', '600.00', 2, '1', '10', '2023-01-27 20:14:26', NULL, NULL, '1'),
(43, 'BL5DK9X70', 'Patient Bill', '2023-01-27', '102010204', 'Card or Cheque In Debit For Bill from Patient- ', '600.00', '0.00', 2, '1', '10', '2023-01-27 20:14:26', NULL, NULL, '1'),
(44, 'BLTJ1V1CZ', 'Patient Bill', '2023-01-27', '102030200001', 'Patient Credit For Bill amount - PQHZMY23', '0.00', '120.00', 2, '1', '4', '2023-01-27 20:52:03', NULL, NULL, '1'),
(45, 'BLTJ1V1CZ', 'Patient Bill', '2023-01-27', '102010204', 'Card or Cheque In Debit For Bill from Patient- PQHZMY23', '120.00', '0.00', 2, '1', '4', '2023-01-27 20:52:03', NULL, NULL, '1'),
(46, 'BLM75Y4XE', 'Patient Bill', '2023-01-28', '102030200001', 'Patient Credit For Bill amount - PQHZMY23', '0.00', '20.00', 2, '1', '1', '2023-01-28 02:44:22', NULL, NULL, '1'),
(47, 'BLM75Y4XE', 'Patient Bill', '2023-01-28', '102010204', 'Card or Cheque In Debit For Bill from Patient- PQHZMY23', '20.00', '0.00', 2, '1', '1', '2023-01-28 02:44:22', NULL, NULL, '1'),
(48, 'BLXXH79KA', 'Patient Bill', '2023-01-30', '102030200001', 'Patient Credit For Bill amount - PQHZMY23', '0.00', '200.00', 2, '1', '4', '2023-01-30 19:19:10', NULL, NULL, '1'),
(49, 'BLXXH79KA', 'Patient Bill', '2023-01-30', '102010204', 'Card or Cheque In Debit For Bill from Patient- PQHZMY23', '200.00', '0.00', 2, '1', '4', '2023-01-30 19:19:10', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acm_account`
--

CREATE TABLE `acm_account` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acm_invoice`
--

CREATE TABLE `acm_invoice` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(20) NOT NULL,
  `total` float NOT NULL,
  `vat` float NOT NULL,
  `discount` float NOT NULL,
  `grand_total` float NOT NULL,
  `paid` float NOT NULL,
  `due` float NOT NULL,
  `created_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acm_invoice_details`
--

CREATE TABLE `acm_invoice_details` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `quantity` float NOT NULL,
  `price` float NOT NULL,
  `subtotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acm_payment`
--

CREATE TABLE `acm_payment` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `pay_to` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `amount` float NOT NULL,
  `created_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acn_account_transaction`
--

CREATE TABLE `acn_account_transaction` (
  `account_tran_id` int(11) UNSIGNED NOT NULL,
  `account_id` int(11) NOT NULL,
  `transaction_description` varchar(255) NOT NULL,
  `amount` varchar(25) NOT NULL,
  `tran_date` date NOT NULL,
  `payment_id` int(11) NOT NULL,
  `create_by_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacenes`
--

CREATE TABLE `almacenes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `almacenes`
--

INSERT INTO `almacenes` (`id`, `nombre`) VALUES
(2, 'Farmacia de Enfermería'),
(5, 'Farmacia de Emergencia'),
(6, 'Farmacia de Quirófano # 1'),
(7, 'Farmacia de Quirófano # 2'),
(8, 'Farmacia de Quirófano # 3'),
(9, 'Farmacia de Terapia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacenes_productos`
--

CREATE TABLE `almacenes_productos` (
  `id` int(11) NOT NULL,
  `id_almacen` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(6) NOT NULL,
  `price` float NOT NULL,
  `manufactured_by` varchar(255) NOT NULL,
  `create_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `almacenes_productos`
--

INSERT INTO `almacenes_productos` (`id`, `id_almacen`, `name`, `category_id`, `description`, `quantity`, `price`, `manufactured_by`, `create_date`, `status`, `code`) VALUES
(8, 5, 'Caja Paracetamol Con 10 unidades123', 1, '<p>Medicacion para el dolor</p>', 5, 20, '', '2022-04-19', 1, NULL),
(9, 5, 'Injection SR-12', 2, '', 50, 150, 'square', '2020-07-16', 1, NULL),
(10, 2, 'Injection SR-12', 2, '', 50, 150, 'square', '2020-07-16', 1, NULL),
(11, 5, 'Paracetamol Und. ', 1, '', 10, 2, 'INTI', '2022-04-19', 1, NULL),
(12, 5, 'Paracetamol Und. ', 1, '', 10, 2, 'INTI', '2022-04-19', 1, NULL),
(13, 2, 'Paracetamol Und. ', 1, '', 50, 2, 'INTI', '2022-04-19', 1, NULL),
(14, 6, 'Diclofenaco', 4, '', 50, 5, 'INTI', '2022-06-06', 1, NULL),
(15, 2, 'Diclofenaco', 4, '', 50, 5, 'INTI', '2022-06-06', 1, NULL),
(16, 6, 'Diclofenaco', 4, '', 2, 5, 'INTI', '2022-06-06', 1, NULL),
(17, 2, 'Diclofenaco', 4, '', 20, 5, 'INTI', '2022-06-06', 1, NULL),
(18, 5, 'Injection SR-12', 2, '', 50, 150, 'square', '2020-07-16', 1, NULL),
(20, 5, 'Injection SR-12', 2, '', 20, 150, 'square', '2020-07-16', 1, NULL),
(21, 2, 'Injection SR-12', 2, '', 123, 150, 'square', '2020-07-16', 1, NULL),
(23, 2, 'Injection SR-12', 2, '', 123, 150, 'square', '2020-07-16', 1, NULL),
(24, 2, 'Caja Paracetamol Con 10 unidades123', 1, '<p>Medicacion para el dolor</p>', 33, 20, '', '2022-04-19', 1, NULL),
(25, 2, 'Injection SR-12', 2, '<p>rter</p>', 123, 150, 'square', '2020-07-16', 1, NULL),
(26, 2, 'Caja Paracetamol Con 10 unidades123', 1, '<p>Medicacion para el dolor</p>', 33, 20, '', '2022-04-19', 1, NULL),
(27, 6, 'Paracetamol Und. ', 1, '<p>MEdicamento</p>', 1, 2, 'INTI', '2022-04-19', 1, NULL),
(28, 6, 'Paracetamol Und. ', 1, '<p>MEdicamento</p>', 1, 2, 'INTI', '2022-04-19', 1, NULL),
(29, 6, 'Paracetamol Und. ', 1, '<p>MEdicamento</p>', 1, 2, 'INTI', '2022-04-19', 1, NULL),
(30, 6, 'Paracetamol Und. ', 1, '<p>MEdicamento</p>', 1, 2, 'INTI', '2022-04-19', 1, NULL),
(31, 6, 'Paracetamol Und. ', 1, '<p>MEdicamento</p>', 1, 2, 'INTI', '2022-04-19', 1, NULL),
(32, 6, 'Paracetamol Und. ', 1, '<p>MEdicamento</p>', 1, 2, 'INTI', '2022-04-19', 1, NULL),
(33, 6, 'Paracetamol Und. ', 1, '<p>MEdicamento</p>', 1, 2, 'INTI', '2022-04-19', 1, NULL),
(34, 6, 'Paracetamol Und. ', 1, '<p>MEdicamento</p>', 1, 2, 'INTI', '2022-04-19', 1, NULL),
(35, 6, 'Paracetamol Und. ', 1, '<p>MEdicamento</p>', 1, 2, 'INTI', '2022-04-19', 1, NULL),
(36, 6, 'Paracetamol Und. ', 1, '<p>MEdicamento</p>', 1, 2, 'INTI', '2022-04-19', 1, NULL),
(37, 6, 'Paracetamol Und. ', 1, '<p>MEdicamento</p>', 1, 2, 'INTI', '2022-04-19', 1, NULL),
(38, 2, 'Injection SR-12', 2, '<p>rter</p>', 20, 150, 'square', '2020-07-16', 1, NULL),
(39, 6, 'Paracetamol Und. ', 1, '<p>MEdicamento</p>', 10, 2, 'INTI', '2022-04-19', 1, NULL),
(40, 2, 'Diclofenaco', 4, '', 10, 5, 'INTI', '2022-06-06', 1, NULL),
(41, 5, 'Paracetamol Und. ', 1, '<p>MEdicamento</p>', 10, 2, 'INTI', '2022-04-19', 1, NULL),
(42, 6, 'Diclofenaco', 4, '<p>DICLOFENACO s&oacute;dico es un antiinflamatorio que posee actividades anal&shy;g&eacute;sicas y antipir&eacute;ticas y est&aacute; indicado por v&iacute;a oral e intramuscular para el tratamiento de enfermedades reum&aacute;ticas agudas, artritis reu&shy;matoidea, es&shy;pon&shy;dilitis anquilosante, artrosis, lumbalgia, gota en fase aguda, inflamaci&oacute;n postraum&aacute;tica y postoperatoria, c&oacute;lico renal y biliar, migra&ntilde;a aguda, y como profilaxis para dolor postoperatorio y disme&shy;norrea.</p>', 0, 5, 'INTI', '2022-06-06', 1, NULL),
(43, 5, 'Injection SR-12', 2, '<p>rter</p>', 10, 150, 'square', '2020-07-16', 1, NULL),
(44, 5, 'Medicamento de Prueba', 4, '<p>Probar</p>', 5, 20, 'Susel', '2022-06-06', 1, NULL),
(45, 5, 'Injection SR-12', 2, '<p>rter</p>', 10, 150, 'square', '2020-07-16', 1, NULL),
(46, 5, 'Medicamento de Prueba', 4, '<p>Probar</p>', 5, 20, 'Susel', '2022-06-06', 1, NULL),
(47, 2, 'Caja Paracetamol Con 10 unidades123', 1, '<p>Medicacion para el dolor</p>', 10, 20, '', '2022-04-19', 1, NULL),
(48, 5, 'Caja Paracetamol Con 10 unidades123', 1, '<p>Medicacion para el dolor</p>', 10, 20, '', '2022-04-19', 1, NULL),
(49, 6, 'Caja Paracetamol Con 10 unidades123', 1, '<p>Medicacion para el dolor</p>', 10, 20, '', '2022-04-19', 1, NULL),
(50, 2, 'Caja Paracetamol Con 10 unidades123', 1, '<p>Medicacion para el dolor</p>', 10, 20, '', '2022-04-19', 1, NULL),
(51, 6, 'Caja Paracetamol Con 10 unidades123', 1, '<p>Medicacion para el dolor</p>', 10, 20, '', '2022-04-19', 1, NULL),
(52, 2, 'Injection SR-12', 2, '<p>rter</p>', 3, 150, 'square', '2020-07-16', 1, NULL),
(53, 2, 'microgotero de 150 ml', 5, '<p>dispositivo para administrar al paciente soluciones y medicamentos parenterales gota a gota, a chorro o intermitente por via venosa periferica o central por un tiempo determinado .</p>', 5, 12, '', '2022-08-04', 1, NULL),
(54, 5, 'Diclofenaco', 4, '<p>DICLOFENACO s&oacute;dico es un antiinflamatorio que posee actividades anal&shy;g&eacute;sicas y antipir&eacute;ticas y est&aacute; indicado por v&iacute;a oral e intramuscular para el tratamiento de enfermedades reum&aacute;ticas agudas, artritis reu&shy;matoidea, es&shy;pon&shy;dilitis anquilosante, artrosis, lumbalgia, gota en fase aguda, inflamaci&oacute;n postraum&aacute;tica y postoperatoria, c&oacute;lico renal y biliar, migra&ntilde;a aguda, y como profilaxis para dolor postoperatorio y disme&shy;norrea.</p>', 6, 5, 'INTI', '2022-06-06', 1, NULL),
(55, 2, 'microgotero de 150 ml', 5, '<p>dispositivo para administrar al paciente soluciones y medicamentos parenterales gota a gota, a chorro o intermitente por via venosa periferica o central por un tiempo determinado .</p>', 5, 12, '', '2022-08-04', 1, NULL),
(56, 5, 'Diclofenaco', 4, '<p>DICLOFENACO s&oacute;dico es un antiinflamatorio que posee actividades anal&shy;g&eacute;sicas y antipir&eacute;ticas y est&aacute; indicado por v&iacute;a oral e intramuscular para el tratamiento de enfermedades reum&aacute;ticas agudas, artritis reu&shy;matoidea, es&shy;pon&shy;dilitis anquilosante, artrosis, lumbalgia, gota en fase aguda, inflamaci&oacute;n postraum&aacute;tica y postoperatoria, c&oacute;lico renal y biliar, migra&ntilde;a aguda, y como profilaxis para dolor postoperatorio y disme&shy;norrea.</p>', 6, 5, 'INTI', '2022-06-06', 1, NULL),
(57, 2, 'Caja Paracetamol Con 10 unidades123', 1, '<p>Medicacion para el dolor</p>', 123, 20, '', '2022-04-19', 1, NULL),
(58, 2, 'Guantes Quirúrgicos # 6', 22, '<p>Guantes Quir&uacute;rgicos # 6</p>', 10, 3, 'INTI', '2023-01-10', 1, NULL),
(59, 2, 'Guantes Quirúrgicos # 7', 22, '<p>Guantes Quir&uacute;rgicos # 7</p>', 10, 3, 'INTI', '2023-01-10', 1, NULL),
(60, 2, 'Guantes Quirúrgicos # 6', 22, '<p>Guantes Quir&uacute;rgicos # 6</p>', 10, 3, 'INTI', '2023-01-10', 1, NULL),
(61, 2, 'Guantes Quirúrgicos # 7', 22, '<p>Guantes Quir&uacute;rgicos # 7</p>', 10, 3, 'INTI', '2023-01-10', 1, NULL),
(62, 7, 'Alcohol Yodado', 15, '', 1, 0, 'Betancourt', '2023-01-24', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `appointment_id` varchar(20) DEFAULT NULL,
  `patient_id` varchar(20) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `schedule_id` int(11) DEFAULT NULL,
  `serial_no` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `problem` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `create_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `appointment`
--

INSERT INTO `appointment` (`id`, `appointment_id`, `patient_id`, `department_id`, `doctor_id`, `schedule_id`, `serial_no`, `date`, `problem`, `created_by`, `create_date`, `status`) VALUES
(1, 'AZ3ZFYMD', 'PQHZMY23 ', 16, 3, 3, 3, '2022-06-28', 'dolor', 1, '2022-06-27', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bill`
--

CREATE TABLE `bill` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` varchar(20) DEFAULT NULL,
  `bill_type` varchar(20) DEFAULT NULL,
  `bill_date` date DEFAULT NULL,
  `admission_id` varchar(20) DEFAULT NULL,
  `discount` float DEFAULT '0',
  `tax` float DEFAULT '0',
  `total` float DEFAULT '0',
  `payment_method` varchar(10) DEFAULT NULL,
  `card_cheque_no` varchar(100) DEFAULT NULL,
  `receipt_no` varchar(100) DEFAULT NULL,
  `note` text,
  `date` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `exam` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bill`
--

INSERT INTO `bill` (`id`, `bill_id`, `bill_type`, `bill_date`, `admission_id`, `discount`, `tax`, `total`, `payment_method`, `card_cheque_no`, `receipt_no`, `note`, `date`, `status`, `exam`) VALUES
(3, 'BLS5B7T9P', 'ipd', '2020-07-13', 'UVO75KZT', 0, 0, 3750, 'Cash', '', '', 'kuyhojl', '2020-07-20 15:38:19', 1, 0),
(4, 'BLBN4QAHI', 'ipd', '2022-06-14', 'U0ELD0ZO', 0, 0, 2050, 'Cash', '', '', '', '2022-06-14 19:37:41', 1, 0),
(6, 'BLS5B7T9P1', 'ipd', '2020-07-13', NULL, 0, 0, 3750, 'Cash', '', '', '', '2020-07-20 15:38:19', 0, 0),
(16, 'BL8HX4L8U', 'ipd', '2022-06-15', 'U0MZY1MP', 0, 0, 120, 'Cash', NULL, NULL, NULL, '2022-06-15 00:00:00', 0, 2),
(20, 'BLGRH3KN3', 'ipd', '2022-06-17', 'UWSHNHVB', 0, 0, 120, 'Cash', '', '', '', '2022-06-17 00:01:00', 1, 7),
(22, 'BL1JQYG3M', 'ipd', '2022-06-17', 'U8109XLU', 0, 0, 120, 'Cash', '', '', '', '2022-06-17 00:27:15', 1, NULL),
(24, 'BLM1ZVNLJ', 'ipd', '2022-06-17', 'UQ9CFKN5', 0, 0, 120, 'Cash', '', '', '', '2022-06-17 00:32:27', 1, NULL),
(26, 'BL3KWZD08', 'ipd', '2022-06-17', 'UA15OYAV', 0, 0, 120, 'Cash', '', '', '', '2022-06-17 00:35:26', 1, 11),
(29, 'BLN4Z44KN', 'ipd', '2022-06-17', 'UPDTSJ41', 0, 0, 40, 'Cash', '', '', '', '2022-06-17 20:48:25', 1, 13),
(30, 'BL1M2RNAF', 'ipd', '2022-06-21', 'UPDTSJ41', 0, 0, 5000, 'Cash', '', '', '', '2022-06-21 19:11:17', 1, NULL),
(31, 'BLPFOA0E5', 'ipd', '2022-06-21', 'UPDTSJ41', 0, 0, 5000, 'Cash', '', '', '', '2022-06-21 19:11:35', 1, NULL),
(32, 'BL9SO12ZL', 'ipd', '2022-06-21', 'UPDTSJ41', 0, 0, 5000, 'Cash', '', '', '', '2022-06-21 19:11:36', 1, NULL),
(33, 'BL6IA9FKD', 'ipd', '2022-06-21', 'UPDTSJ41', 0, 0, 5000, 'Cash', '', '', '', '2022-06-21 19:11:38', 1, NULL),
(34, 'BL16GYBYD', 'ipd', '2022-06-21', 'UPDTSJ41', 0, 0, 5000, 'Cash', '', '', '', '2022-06-21 19:11:39', 1, NULL),
(35, 'BLTMXFTR5', 'ipd', '2022-06-21', 'UPDTSJ41', 0, 0, 5000, 'Cash', '', '', '', '2022-06-21 19:11:45', 1, NULL),
(36, 'BLWGJR32O', 'ipd', '2022-06-21', 'UPDTSJ41', 0, 0, 5000, 'Cash', '', '', '', '2022-06-21 19:11:53', 1, NULL),
(37, 'BLJOH6O5D', 'ipd', '2022-06-21', 'UPDTSJ41', 0, 0, 5000, 'Cash', '', '', '', '2022-06-21 19:12:02', 1, NULL),
(38, 'BL5EX8MCH', 'ipd', '2022-06-21', 'UPDTSJ41', 0, 0, 5000, 'Cash', '', '', '', '2022-06-21 19:12:08', 1, NULL),
(39, 'BLQKSQXES', 'ipd', '2022-06-21', 'UPDTSJ41', 0, 0, 5000, 'Cash', '', '', '', '2022-06-21 19:12:12', 1, NULL),
(43, 'BLVQWB50G', 'ipd', '2022-06-27', 'U925TR6P', 0, 0, 160, 'Cash', '', '', '', '2022-06-27 13:59:52', 1, 14),
(44, 'BLSTTNWY1', 'ipd', '2022-06-29', 'U925TR6P', 0, 0, 100, 'Cash', '', '', '', '2022-06-29 14:49:11', 1, NULL),
(53, 'BLMP2DMJ2', 'ipd', '2022-06-21', 'UPDTSJ41', 0, 0, 5128, 'Cash', '', '', '', '2022-06-29 20:23:48', 1, NULL),
(54, 'BLF0XYDXH', 'ipd', '2022-06-17', 'U0ELD0ZO', 0, 0, 120, 'Cash', '', '', '', '2022-06-30 00:45:06', 1, 12),
(55, 'BLXTCBCOT', 'ipd', '2022-07-06', 'U925TR6P', 0, 0, 20, 'Cash', '', '', '', '2022-07-06 21:50:13', 1, NULL),
(56, 'BLBJR2LRA', 'ipd', '2022-08-02', 'ULOYYA8I', 0, 0, 120, 'Cash', NULL, NULL, NULL, '2022-08-02 00:00:00', 0, 6),
(59, 'BLA666Q5R', 'ipd', '2023-01-23', 'U85PU9CD', 0, 0, 673, 'Cash', '', '', '', '2023-01-23 20:16:11', 0, NULL),
(60, 'BLJJ0N7RA', 'ipd', '2023-01-20', 'UXUNS6AB', 0, 0, 900, 'Cash', '', '', '', '2023-01-24 16:38:01', 1, NULL),
(61, 'BL0MJZ3UI', 'ipd', '2023-01-20', 'UXUNS6AB', 0, 0, 25, 'Cash', '', '', '', '2023-01-24 23:38:42', 0, NULL),
(62, 'BLH2CERBT', 'ipd', '2023-01-24', 'UXUNS6AB', 0, 0, 450, 'Cash', '', '', '', '2023-01-24 23:39:54', 0, NULL),
(66, 'BLIVBWA4H', 'ipd', '2023-01-24', 'U4DW0K57', 0, 0, 240, 'Cash', '', '', '', '2023-01-24 23:58:50', 1, NULL),
(67, 'BLQLK6B41', 'ipd', '2023-01-24', 'U4DW0K57', 0, 0, 151, 'Cash', '', '', '', '2023-01-24 23:59:20', 1, NULL),
(68, 'BLOH9XWI2', 'ipd', '2023-01-25', 'U4DW0K57', 0, 0, 400, 'Cash', '', '', '', '2023-01-25 17:05:34', 1, NULL),
(69, 'BLZFUZS0A', 'ipd', '2023-01-25', 'U4DW0K57', 0, 0, 400, 'Cash', '', '', '', '2023-01-25 17:06:04', 1, NULL),
(70, 'BL6ML2YKH', 'ipd', '2023-01-25', 'UQ9XF895', 0, 0, 180, 'Cash', '', '', '', '2023-01-25 23:44:18', 1, NULL),
(71, 'BLY16J17Q', 'ipd', '2023-01-25', 'UQ9XF895', 0, 0, 7750, 'Cash', '', '', '', '2023-01-25 23:49:47', 0, NULL),
(72, 'BLQCN9HFF', 'ipd', '1970-01-01', 'UQ9XF895', 0, 0, 100, '', '', '', '', '2023-01-26 20:23:44', 0, NULL),
(73, 'BL86BAUZY', 'ipd', '1970-01-01', 'UQ9XF895', 0, 0, 7500, '', '', '', '', '2023-01-26 20:26:12', 0, NULL),
(74, 'BLT8HRXVR', 'ipd', '2023-01-26', 'UPLQ8V19', 0, 0, 105, 'Cash', '', '', '', '2023-01-26 20:47:37', 1, NULL),
(75, 'BLX2Z3RKQ', 'ipd', '1970-01-01', 'UPLQ8V19', 0, 0, 350, 'Cash', '', '', '', '2023-01-26 20:51:24', 0, NULL),
(76, 'BLY17H5GW', 'ipd', '2023-01-27', 'UWSHNHVB', 0, 0, 123, 'Card', '', '789456123', '', '2023-01-27 19:59:28', 1, NULL),
(77, 'BLXGOBRQ1', 'ipd', '2023-01-27', 'UWSHNHVB', 0, 0, 0, '', '', '', '', '2023-01-27 20:11:22', 0, NULL),
(78, 'BL553T8M8', 'ipd', '1970-01-01', 'UWSHNHVB', 0, 0, 375, 'Cash', '', '', '', '2023-01-27 20:13:22', 0, NULL),
(79, 'BL5DK9X70', 'ipd', '1970-01-01', 'UWSHNHVB', 0, 0, 600, 'Cash', '', '', '', '2023-01-27 20:14:26', 0, NULL),
(80, 'BLTJ1V1CZ', 'ipd', '1970-01-01', 'U0MZY1MP', 0, 0, 120, 'Cash', '', '', '', '2023-01-27 20:52:03', 0, NULL),
(81, 'BLM75Y4XE', 'ipd', '1970-01-01', 'U17Q99MO', 0, 0, 20, '', '', '', '', '2023-01-28 02:44:22', 0, NULL),
(82, 'BLXXH79KA', 'ipd', '1970-01-01', 'U17Q99MO', 0, 0, 200, '', '', '', '', '2023-01-30 19:19:10', 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bill_admission`
--

CREATE TABLE `bill_admission` (
  `id` int(11) UNSIGNED NOT NULL,
  `admission_id` varchar(20) DEFAULT NULL,
  `patient_id` varchar(20) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `discharge_date` date DEFAULT NULL,
  `insurance_id` int(11) DEFAULT NULL,
  `policy_no` varchar(100) DEFAULT NULL,
  `agent_name` varchar(255) DEFAULT NULL,
  `guardian_name` varchar(255) DEFAULT NULL,
  `guardian_relation` varchar(255) DEFAULT NULL,
  `guardian_contact` varchar(255) DEFAULT NULL,
  `guardian_address` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `estado` varchar(20) DEFAULT NULL,
  `isComplete` tinyint(4) NOT NULL COMMENT '1=Complete and 0=Not Complete',
  `assign_by` int(3) NOT NULL,
  `pagado` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bill_admission`
--

INSERT INTO `bill_admission` (`id`, `admission_id`, `patient_id`, `doctor_id`, `package_id`, `admission_date`, `discharge_date`, `insurance_id`, `policy_no`, `agent_name`, `guardian_name`, `guardian_relation`, `guardian_contact`, `guardian_address`, `status`, `estado`, `isComplete`, `assign_by`, `pagado`) VALUES
(1, 'UVO75KZT', 'PELWQ10G', 2, 0, '2020-07-16', '2020-07-20', 0, '', 'sdad', 'sadas', 'as', '45356', 'ghgf', 1, NULL, 0, 1, '0'),
(2, 'U2TECIXM', 'PQHZMY23', 3, 1, '2022-04-26', '2022-04-26', 0, '', '', '', '', '', '', 1, NULL, 0, 1, '0'),
(3, 'U0ELD0ZO', 'PQHZMY23', 3, 1, '2022-04-26', '2022-04-26', 0, '', '', '', '', '', '', 1, NULL, 0, 1, '0'),
(4, 'U4L22TWN', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(5, 'UM2NJDXD', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(6, 'UIKW6LTN', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(7, 'ULFOZV72', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(8, 'UNAIJ7EA', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(9, 'U9WAK7Q8', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(10, 'UFJ032OV', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(11, 'UERP7IF4', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(12, 'U1NRY81Z', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(13, 'UP9C6ZE1', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(14, 'UMB6O9EG', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(15, 'UFCSFWUP', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(16, 'UPT51U9V', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(17, 'UYHMGWL4', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(18, 'UT0O4C5N', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(19, 'UBL8IMQZ', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(20, 'UM61M66J', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(21, 'UXJG50JK', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(22, 'ULPG9946', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(23, 'U64IZD8X', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(24, 'UZORFDZ8', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(25, 'URZE16BZ', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(26, 'U0DC4636', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(27, 'UESJUOZ3', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(28, 'UTDRUF9I', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(29, 'UK1D7ZCT', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(30, 'UJ2UW285', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(31, 'UO06YTAP', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(32, 'UF44VQOY', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(33, 'UQRP375Y', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(34, 'U4ZWLOEY', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(35, 'UC674FUM', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(36, 'U64WLCBS', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(37, 'UI4X5VVC', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(38, 'USRV10SE', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(39, 'UHE2CRNL', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(40, 'U5Z8QERF', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(41, 'UWZ965EG', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(42, 'U76VV9U0', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(43, 'UM705UUU', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(44, 'UWMEI18A', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(45, 'UZYSZNWN', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(46, 'UMFD5GFG', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(47, 'UPJD8ACS', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(48, 'U2AWRQ23', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(49, 'U9EZAWA2', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(50, 'UKJ8FDZO', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(51, 'UB1O1GC2', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(52, 'U6R1BVPO', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(53, 'UCTZO59T', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(54, 'U2KAVOR4', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(55, 'UL3YUPVF', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(56, 'UKOGBXYC', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(57, 'UOG4SBJX', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(58, 'UB2W3UMB', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(59, 'UALEZ1X4', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(60, 'UMKEZ570', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(61, 'UBO0LJ2H', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(62, 'UUEBBPQ0', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(63, 'U4QL39TJ', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(64, 'U666YBOV', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(65, 'UQMSBFPV', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(66, 'UFNLAQUI', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(67, 'UU47ZMF6', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(68, 'UJ67FNGU', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(69, 'U5PJHPLN', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(70, 'UTKH9604', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(71, 'U17Q99MO', 'PQHZMY23', NULL, NULL, '2022-06-15', '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, '0'),
(72, 'U0MZY1MP', 'PQHZMY23', NULL, NULL, '2022-06-15', '2023-01-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Finalizado', 1, 1, '120'),
(73, 'UWSHNHVB', 'PHLJBMVS', NULL, NULL, '2022-06-17', '2023-01-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Finalizado', 1, 1, '723'),
(74, 'U8109XLU', 'PJXGONMO', 3, 0, '2022-06-17', '2023-01-24', 0, '', '', '', '', '', '', 1, 'Finalizado', 1, 1, '0'),
(75, 'UQ9CFKN5', 'PQHZMY23', 3, 0, '2022-06-17', '2023-01-24', 0, '', '', '', '', '', '', 1, 'Finalizado', 1, 1, '0'),
(76, 'UA15OYAV', 'PHLJBMVS', 3, 0, '2022-06-17', '2023-01-24', 0, '', '', '', '', '', '', 1, 'Finalizado', 1, 1, '0'),
(77, 'UPDTSJ41', 'PQHZMY23', NULL, NULL, '2022-06-17', '2023-01-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Finalizado', 1, 1, '0'),
(78, 'U925TR6P', 'PQHZMY23', NULL, NULL, '2022-06-27', '2023-01-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Finalizado', 1, 1, '0'),
(79, 'ULOYYA8I', 'PQHZMY23', NULL, NULL, '2022-08-02', '2022-08-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Finalizado', 1, 1, '0'),
(80, 'UXUNS6AB', 'PGOV0KON', 3, 0, '2023-01-18', '2023-01-20', 0, '', '', '', '', '', '', 1, 'Finalizado', 0, 4, '0'),
(81, 'U85PU9CD', 'P6953OWI', 3, 0, '2023-01-23', '2023-01-24', 0, '', '', '', '', '', '', 1, 'Finalizado', 0, 1, '0'),
(82, 'U4DW0K57', 'P9AS15E5', 3, 0, '2023-01-24', '2023-01-27', 0, '', '', '', '', '', '', 1, 'Finalizado', 0, 1, '0'),
(83, 'UQ9XF895', 'P70POQX8', 3, 0, '2023-01-25', '2023-01-27', 0, '', '', '', '', '', '', 1, 'Finalizado', 0, 1, '15530'),
(84, 'UPLQ8V19', 'P8MO0SAU', 3, 0, '2023-01-26', '2023-01-27', 0, '', '', '', '', '', '', 1, 'Finalizado', 0, 10, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bill_advanced`
--

CREATE TABLE `bill_advanced` (
  `id` int(11) UNSIGNED NOT NULL,
  `admission_id` varchar(20) DEFAULT NULL,
  `patient_id` varchar(30) DEFAULT NULL,
  `amount` float DEFAULT '0',
  `payment_method` varchar(255) DEFAULT NULL,
  `cash_card_or_cheque` varchar(10) DEFAULT NULL COMMENT '1 cash, 2 card, 3 cheque',
  `receipt_no` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bill_advanced`
--

INSERT INTO `bill_advanced` (`id`, `admission_id`, `patient_id`, `amount`, `payment_method`, `cash_card_or_cheque`, `receipt_no`, `date`) VALUES
(1, 'ULOYYA8I', 'PQHZMY23', 500, '', 'Cash', '', '2023-01-13 22:29:01'),
(2, 'UXUNS6AB', 'P63G0TSG', 500, '', 'Cash', '00', '2023-01-18 21:30:19'),
(3, 'U85PU9CD', 'P6953OWI', 1000, '', 'Cash', '', '2023-01-23 20:06:22'),
(4, 'UQ9CFKN5', 'PQHZMY23', 500, 'efectivo', 'Cash', '', '2023-01-24 22:07:29'),
(5, 'U4DW0K57', 'P9AS15E5', 300, '', 'Cash', '', '2023-01-24 23:52:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bill_details`
--

CREATE TABLE `bill_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` varchar(20) DEFAULT NULL,
  `admission_id` varchar(20) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `professional_id` int(11) DEFAULT NULL,
  `quantity` float DEFAULT '0',
  `amount` float DEFAULT '0',
  `product` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bill_details`
--

INSERT INTO `bill_details` (`id`, `bill_id`, `admission_id`, `package_id`, `service_id`, `professional_id`, `quantity`, `amount`, `product`, `date`, `status`) VALUES
(5, 'BLS5B7T9P', 'UVO75KZT', 0, 2, NULL, 1, 150, NULL, '2020-07-20', ''),
(6, 'BLS5B7T9P', 'UVO75KZT', 0, 1, NULL, 1, 300, NULL, '2020-07-20', ''),
(7, 'BLBN4QAHI', 'U0ELD0ZO', 1, 2, NULL, 2, 150, NULL, '2022-06-14', ''),
(8, 'BLBN4QAHI', 'U0ELD0ZO', 1, 1, NULL, 1, 300, NULL, '2022-06-14', ''),
(23, 'BLSTTNWY1', 'U925TR6P', 0, 25, 3, 1, 100, NULL, '2022-06-29', ''),
(32, 'BLMP2DMJ2', 'UPDTSJ41', 0, 3, NULL, 1, 5000, NULL, '2022-06-29', ''),
(33, 'BLXTCBCOT', 'U925TR6P', 0, 27, NULL, 1, 20, NULL, '2022-07-06', ''),
(41, 'BLA666Q5R', 'U85PU9CD', 0, 32, NULL, 1, 300, NULL, '2023-01-23', ''),
(42, 'BLA666Q5R', 'U85PU9CD', 0, 5, NULL, 1, 150, NULL, '2023-01-23', ''),
(43, 'BLA666Q5R', 'U85PU9CD', 0, 22, NULL, 1, 100, NULL, '2023-01-23', ''),
(44, 'BLA666Q5R', 'U85PU9CD', 0, 37, NULL, 1, 123, NULL, '2023-01-23', ''),
(45, 'BLJJ0N7RA', 'UXUNS6AB', 0, 32, NULL, 1, 300, NULL, '2023-01-24', ''),
(46, 'BLJJ0N7RA', 'UXUNS6AB', 0, 5, NULL, 1, 150, NULL, '2023-01-24', ''),
(47, 'BLJJ0N7RA', 'UXUNS6AB', 0, 8, NULL, 1, 150, NULL, '2023-01-24', ''),
(48, 'BLJJ0N7RA', 'UXUNS6AB', 0, 22, NULL, 1, 100, NULL, '2023-01-24', ''),
(49, 'BLJJ0N7RA', 'UXUNS6AB', 0, 24, NULL, 1, 80, NULL, '2023-01-24', ''),
(50, 'BLJJ0N7RA', 'UXUNS6AB', 0, 30, NULL, 1, 120, NULL, '2023-01-24', ''),
(51, 'BL0MJZ3UI', 'UXUNS6AB', 0, 14, NULL, 1, 25, NULL, '2023-01-24', ''),
(52, 'BLH2CERBT', 'UXUNS6AB', 0, 32, NULL, 1, 300, NULL, '2023-01-24', ''),
(53, 'BLH2CERBT', 'UXUNS6AB', 0, 8, NULL, 1, 150, NULL, '2023-01-24', ''),
(59, 'BLIVBWA4H', 'U4DW0K57', 0, 10, NULL, 1, 20, NULL, '2023-01-24', ''),
(60, 'BLIVBWA4H', 'U4DW0K57', 0, 27, NULL, 1, 20, NULL, '2023-01-24', ''),
(61, 'BLIVBWA4H', 'U4DW0K57', 0, 11, NULL, 1, 200, NULL, '2023-01-24', ''),
(62, 'BLQLK6B41', 'U4DW0K57', 0, 5, NULL, 1, 150, NULL, '2023-01-24', ''),
(63, 'BLQLK6B41', 'U4DW0K57', 0, 15, NULL, 1, 1, NULL, '2023-01-24', ''),
(64, 'BLOH9XWI2', 'U4DW0K57', 0, 8, NULL, 5, 20, 1, '2023-01-25', ''),
(65, 'BLOH9XWI2', 'U4DW0K57', 0, 32, NULL, 1, 300, 0, '2023-01-25', ''),
(68, 'BL6ML2YKH', 'UQ9XF895', 0, 5, NULL, 1, 150, 0, '2023-01-25', ''),
(69, 'BL6ML2YKH', 'UQ9XF895', 0, 59, NULL, 10, 3, 1, '2023-01-25', ''),
(70, 'BLY16J17Q', 'UQ9XF895', 0, 14, NULL, 50, 5, 1, '2023-01-25', ''),
(71, 'BLY16J17Q', 'UQ9XF895', 0, 9, NULL, 50, 150, 1, '2023-01-25', ''),
(72, 'BLQCN9HFF', 'UQ9XF895', 0, 44, NULL, 5, 20, NULL, '2023-01-26', ''),
(73, 'BL86BAUZY', 'UQ9XF895', 0, 9, NULL, 50, 150, NULL, '2023-01-26', ''),
(74, 'BLT8HRXVR', 'UPLQ8V19', 0, 25, 5, 1, 100, 0, '2023-01-26', ''),
(75, 'BLT8HRXVR', 'UPLQ8V19', 0, 9, 5, 1, 5, 1, '2023-01-26', ''),
(76, 'BLX2Z3RKQ', 'UPLQ8V19', 0, 3, 3, 1, 200, NULL, '2023-01-26', ''),
(77, 'BLX2Z3RKQ', 'UPLQ8V19', 0, 5, 3, 1, 150, NULL, '2023-01-26', ''),
(78, 'BLY17H5GW', 'UWSHNHVB', 0, 37, NULL, 1, 123, 0, '2023-01-27', ''),
(79, 'BL5DK9X70', 'UWSHNHVB', 0, 32, NULL, 1, 300, NULL, '2023-01-27', ''),
(80, 'BL5DK9X70', 'UWSHNHVB', 0, 1, NULL, 1, 300, NULL, '2023-01-27', ''),
(81, 'BLTJ1V1CZ', 'U0MZY1MP', 0, 15, NULL, 1, 100, NULL, '2023-01-27', ''),
(82, 'BLTJ1V1CZ', 'U0MZY1MP', 0, 44, NULL, 1, 20, NULL, '2023-01-27', ''),
(83, 'BLM75Y4XE', 'U17Q99MO', 0, 44, NULL, 1, 20, NULL, '2023-01-28', ''),
(84, 'BLXXH79KA', 'U17Q99MO', 0, 23, NULL, 2, 100, NULL, '2023-01-30', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bill_package`
--

CREATE TABLE `bill_package` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `services` text,
  `discount` float DEFAULT '0',
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bill_package`
--

INSERT INTO `bill_package` (`id`, `name`, `description`, `services`, `discount`, `status`) VALUES
(1, 'testing', 'dssd', '[{\"id\":\"2\",\"name\":\"Injection SR-12\",\"quantity\":\"2\",\"amount\":\"150\"},{\"id\":\"1\",\"name\":\"Checkup\",\"quantity\":\"1\",\"amount\":\"300\"}]', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bill_service`
--

CREATE TABLE `bill_service` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantity` float DEFAULT '0',
  `amount` float DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `uci` varchar(256) DEFAULT NULL,
  `consulta` varchar(256) DEFAULT NULL,
  `professional_commission` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bill_service`
--

INSERT INTO `bill_service` (`id`, `name`, `description`, `quantity`, `amount`, `status`, `uci`, `consulta`, `professional_commission`) VALUES
(1, 'Checkup', 'wer', 1, 300, 1, '', NULL, ''),
(2, 'TERAPIA INTENSIVA CON RESPIRADOR', 'TERAPIA INTENSIVA CON RESPIRADOR', 1, 3.5, 1, 'Si', NULL, ''),
(3, 'TERAPIA INTENSIVA CON RESPIRADOR', 'TERAPIA INTENSIVA CON RESPIRADOR', 1, 5, 1, 'Si', NULL, '123'),
(4, 'Derecho de interacción', 'Una sola vez', 1, 180, 1, 'Si', NULL, ''),
(5, 'Bomba de infusión', 'Cada uno', 1, 150, 1, 'Si', NULL, ''),
(6, 'Tubo de oxigeno de 2000 libra', 'Cada uno', 1, 140, 1, 'Si', NULL, ''),
(7, 'Intubación', 'Una sola vez', 1, 1, 1, 'Si', NULL, ''),
(8, 'Colchón de Aire', 'Por día', 1, 150, 1, 'Si', NULL, ''),
(9, 'Control de glicemia por cinta', 'Cada una', 1, 20, 1, 'Si', NULL, ''),
(11, 'Electrocardiograma', 'Cada uno', 1, 200, 1, 'Si', NULL, ''),
(12, 'Recanalización VIA PERIFERICA', 'Cada uno', 1, 50, 1, 'Si', NULL, ''),
(13, 'Nebulización sin medicamento', 'Cada uno', 1, 15, 1, 'Si', NULL, ''),
(14, 'Nebulización con medicamento', 'Cada uno', 1, 25, 1, 'Si', NULL, ''),
(15, 'Colocación de vía central', 'Una sola vez', 1, 1, 1, 'Si', NULL, ''),
(16, 'Punción Lumbar', 'Una sola vez', 1, 1, 1, 'Si', NULL, ''),
(17, 'Toracentesis', 'Una sola vez', 1, 1000, 1, 'Si', NULL, ''),
(18, 'Paracentesis', 'Una sola vez', 1, 1000, 1, 'Si', NULL, ''),
(19, 'Preparación Nutrición parenteral', 'Por cada preparación', 1, 200, 1, 'Si', NULL, ''),
(20, 'Enema evacuante', 'Cada una', 1, 70, 1, 'Si', NULL, ''),
(21, 'Enema MURPHY', 'Cada una', 1, 500, 1, 'Si', NULL, ''),
(22, 'Colocación de sonda orogástrica', 'Cada una', 1, 100, 1, 'Si', NULL, ''),
(23, 'Colocación sonda nasogástrica', 'Una sola vez', 1, 100, 1, 'Si', NULL, ''),
(24, 'Colocación sonda vesical', 'Una sola vez', 1, 80, 1, 'Si', NULL, ''),
(25, 'Ecografía', 'Cada una', 1, 100, 1, 'Si', NULL, '12'),
(26, 'Sutura', 'Por punto', 1, 5, 1, 'Si', 'No', '10'),
(27, 'Curación Pequeña', 'Cada una', 1, 20, 1, 'Si', NULL, ''),
(28, 'Curación Mediana', 'Cada una', 1, 40, 1, 'Si', NULL, ''),
(29, 'Curación Pequeña', 'Cada una', 1, 80, 1, 'No', 'Si', '60%'),
(30, 'Curación Extra grande', 'Cada una', 1, 120, 1, 'Si', NULL, '10'),
(31, 'Maniobra de RCP', 'Una sola vez', 1, 1000, 1, 'Si', NULL, ''),
(32, 'Acompañamiento de ambulancia local (medico)', 'Una sola vez', 1, 300, 1, 'Si', NULL, ''),
(33, 'Interconsulta médico especialista', 'Por cada visita', 1, 350, 1, 'Si', NULL, ''),
(34, 'Garantía de sangre', 'Cada una', 1, 300, 1, 'Si', NULL, ''),
(35, 'Transfusión de sangre', 'Cada una', 1, 200, 1, 'Si', NULL, ''),
(36, 'Insumos UTI', 'Por día', 1, 100, 1, 'Si', 'No', '10'),
(37, 'Consulta de prueba', '', 1, 123, 1, 'No', 'Si', ''),
(41, 'inyectable IM', '', 1, 5, 1, 'No', 'Si', ''),
(42, 'inyectable IM ( EMER)', '', 1, 10, 1, 'No', 'Si', ''),
(43, 'Inyectable IV', '', 1, 10, 1, 'No', 'Si', ''),
(44, 'Inyectable IV (EMER)', '', 1, 15, 1, 'Si', 'Si', ''),
(45, 'Inyectable SC', '', 1, 10, 1, 'Si', 'Si', ''),
(46, 'Inyectable SC (EMER)', '', 1, 15, 1, 'Si', 'Si', ''),
(47, 'Lavado de ojo-oído', 'Cada una', 1, 80, 1, 'Si', 'Si', ''),
(48, 'Lavado de ojo-oído (EMER)', '', 1, 150, 1, 'Si', 'Si', ''),
(49, 'Ligadura de Trompas', '', 1, 350, 1, 'No', 'Si', ''),
(50, 'Extracción de uñero', '', 1, 100, 1, 'No', 'Si', ''),
(51, 'Glicemia por glucómetro sin cinta', '', 1, 15, 1, 'Si', 'Si', ''),
(52, 'Glicemia por glucómetro con cinta', '', 1, 25, 1, 'Si', 'Si', ''),
(53, 'Glucómetro (EMER)', '', 1, 30, 1, 'Si', 'Si', ''),
(54, 'Incubadora 24 hrs', '', 1, 980, 1, 'No', 'Si', ''),
(55, 'INSTRUMENTADORA', '', 1, 150, 1, 'Si', 'Si', ''),
(56, 'Instrumentadora mas de 2 hrs (EMER)', '', 1, 200, 1, 'Si', 'Si', ''),
(57, 'Instrumentadora mas de 2 hrs', '', 1, 150, 1, 'Si', 'Si', '60%'),
(58, 'Luminoterapia 24 hrs', '', 1, 200, 1, 'Si', 'Si', ''),
(59, 'Luminoterapia 24 hrs (EMER)', '', 1, 250, 1, 'Si', 'Si', ''),
(60, 'Medio Incubadora', '', 1, 500, 1, 'Si', 'Si', ''),
(62, 'Monitor por día ', '', 1, 150, 1, 'Si', 'Si', ''),
(63, 'Monitor por día (EMER)', '', 1, 200, 1, 'Si', 'Si', ''),
(64, 'MONITOREO FETAL (CAMPAÑA) MED.', '', 1, 120, 1, 'Si', 'Si', ''),
(65, 'Monitoreo Fetal (Enfermera) (DOM-FER)', '', 1, 130, 1, 'No', 'Si', ''),
(66, 'Monitoreo Fetal (Enfermera)  (EMER)', '', 1, 150, 1, 'Si', 'Si', ''),
(67, 'Monitoreo Fetal (ENFERMERIA)', '', 1, 80, 1, 'Si', 'Si', ''),
(68, 'Monitoreo Fetal (MEDICO)', '', 1, 100, 1, 'Si', 'Si', ''),
(69, 'Monitoreo Fetal (MEDICO) (DOM-FER)', '', 1, 150, 1, 'Si', 'Si', ''),
(70, 'Monitoreo Fetal (MEDICO) (EMER)', '', 1, 200, 1, 'Si', 'Si', ''),
(71, 'Nebulización', '', 1, 20, 1, 'Si', 'Si', ''),
(72, 'Onfaloclisis', '', 1, 600, 1, 'Si', 'Si', ''),
(73, 'Oxigeno por hr.', '', 1, 50, 1, 'Si', 'Si', ''),
(74, 'Oxigeno por Tubo', '', 1, 250, 1, 'No', 'Si', ''),
(75, 'PAPANICOLAU', '', 1, 80, 1, 'No', 'Si', ''),
(76, 'Presión Arterial', '', 1, 5, 1, 'No', 'Si', ''),
(77, 'Presión Arterial (DOM-FER) (EMER)', '', 1, 10, 1, 'Si', 'Si', ''),
(78, 'QUISTES SEBACEO', '', 1, 200, 1, 'Si', 'Si', ''),
(80, 'Retiro  de Implante ', '', 1, 150, 1, 'No', 'Si', ''),
(81, 'Retiro de punto en General', '', 1, 30, 1, 'No', 'Si', ''),
(82, 'Retiro de punto en General (DOM-FER) (EMER)', '', 1, 50, 1, 'No', 'Si', ''),
(83, 'Retiro T de Cobre', '', 1, 180, 1, 'No', 'Si', ''),
(84, 'Retiro T de Cobre (DOM-FER)', '', 1, 130, 1, 'No', 'Si', ''),
(85, 'Retiro T de Cobre (EMER)', '', 1, 150, 1, 'No', 'Si', ''),
(86, 'Sensor neonatal (DOM-FER) (EMER)', '', 1, 250, 1, 'No', 'Si', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bm_bed`
--

CREATE TABLE `bm_bed` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `bed_number` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bm_bed`
--

INSERT INTO `bm_bed` (`id`, `room_id`, `description`, `bed_number`, `status`) VALUES
(1, 1, 'qw', 'MW-01', 1),
(2, 1, 'asdas', 'MW-02', 1),
(3, 1, 'sas', 'MW-03', 1),
(4, 2, 'q', 'FW-01', 0),
(5, 2, '', 'FW-02', 0),
(6, 2, '', 'FW-03', 0),
(7, 2, 'Prueba', '01', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bm_bed_assign`
--

CREATE TABLE `bm_bed_assign` (
  `id` int(11) NOT NULL,
  `serial` varchar(20) DEFAULT NULL,
  `patient_id` varchar(20) NOT NULL,
  `room_id` int(11) NOT NULL,
  `bed_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `assign_date` date NOT NULL,
  `discharge_date` date DEFAULT NULL,
  `assign_by` int(11) NOT NULL,
  `bill_id` varchar(15) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bm_bed_assign`
--

INSERT INTO `bm_bed_assign` (`id`, `serial`, `patient_id`, `room_id`, `bed_id`, `description`, `assign_date`, `discharge_date`, `assign_by`, `bill_id`, `status`, `update_by`) VALUES
(6, 'VZ4FB5', 'P9AS15E5', 1, 1, '', '2023-01-24', '0000-00-00', 1, NULL, 0, 0),
(7, 'K825M0', 'P70POQX8', 1, 2, '', '2023-01-25', '0000-00-00', 1, NULL, 0, 0),
(8, '4TRMF4', 'P8MO0SAU', 1, 3, '', '2023-01-26', '0000-00-00', 10, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bm_bed_transfer`
--

CREATE TABLE `bm_bed_transfer` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `serial` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `room_id` int(11) NOT NULL,
  `form_bed_id` int(11) NOT NULL,
  `to_bed_id` int(11) NOT NULL,
  `assign_date` date NOT NULL,
  `discharge_date` date DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `assign_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bm_room`
--

CREATE TABLE `bm_room` (
  `id` int(11) NOT NULL,
  `room_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `limit` int(3) NOT NULL,
  `charge` float NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bm_room`
--

INSERT INTO `bm_room` (`id`, `room_name`, `description`, `limit`, `charge`, `status`) VALUES
(1, 'Habitación comuncon', 'Habitación comuncon Aire', 5, 250, 1),
(3, 'Habitación 02', 'Habitación comun con Aire', 4, 250, 1),
(4, 'Habitación 03', 'Habitación con Aire', 1, 350, 1),
(5, 'Habitación 04', 'Habitación con Aire', 1, 350, 1),
(6, 'Habitación 05', 'Habitación con Aire', 1, 350, 1),
(7, 'Habitación 06', 'Habitación con Aire', 1, 350, 1),
(8, 'Habitación 07', 'Habitación con Aire', 1, 350, 1),
(9, 'Habitación 14', 'Habitación con Aire', 1, 350, 1),
(10, 'Habitación 08', 'Habitación con Aire', 1, 350, 1),
(11, 'Habitación 09', 'Habitación con Aire', 1, 350, 1),
(12, 'Habitación 10', 'Habitación con Aire', 1, 350, 1),
(13, 'Habitación 11', 'Habitación con Aire', 1, 350, 1),
(14, 'Habitación 12', 'Habitación con Aire', 1, 350, 1),
(15, 'Habitación 15', 'Habitación con Aire', 1, 350, 1),
(16, 'Habitación 13', 'Habitación con Aire', 1, 350, 1),
(17, 'Habitación 16', 'Habitación con Aire', 1, 350, 1),
(18, 'Habitación 17', 'Habitación con Aire', 1, 350, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE `caja` (
  `id` int(11) NOT NULL,
  `tipo_movimiento` varchar(456) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `monto` varchar(456) DEFAULT NULL,
  `metodo_pago` varchar(256) DEFAULT NULL,
  `concepto` varchar(456) DEFAULT NULL,
  `saldo` varchar(456) DEFAULT NULL,
  `estado` varchar(456) DEFAULT NULL,
  `cajero` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `caja`
--

INSERT INTO `caja` (`id`, `tipo_movimiento`, `fecha`, `monto`, `metodo_pago`, `concepto`, `saldo`, `estado`, `cajero`) VALUES
(81, 'Entrada', '2023-01-13 19:18:08', '50', 'Efectivo', 'Apertura de caja', '50', 'Caja abierta', 'Administrador '),
(82, 'Salida', '2023-01-13 19:18:22', '50', NULL, 'Cierre de caja', '0', 'Caja cerrada', 'Administrador '),
(83, 'Entrada', '2023-01-13 19:20:36', '100', 'Efectivo', 'Apertura de caja', '100', 'Caja abierta', 'Administrador '),
(84, 'Salida', '2023-01-13 19:21:51', '50', 'Efectivo', 'proveedor', '50', 'Caja abierta', 'Administrador '),
(86, 'Entrada', '2023-01-17 17:45:39', '100', 'Efectivo', 'Apertura de caja', '100', 'Caja abierta', 'Lola Melean Rodriguez'),
(87, 'Salida', '2023-01-17 17:50:13', '50', 'Efectivo', 'pago de trabajo', '50', 'Caja abierta', 'Lola Melean Rodriguez'),
(88, 'Entrada', '2023-01-17 19:08:26', '150', 'efectivo', 'Pago de consulta #9', '200', 'Caja abierta', 'Lola Melean Rodriguez'),
(89, 'Entrada', '2023-01-17 19:28:24', '200', 'efectivo', 'Pago de consulta #10', '400', 'Caja abierta', 'Lola Melean Rodriguez'),
(90, 'Salida', '2023-01-17 19:30:28', '400', NULL, 'Cierre de caja', '0', 'Caja cerrada', 'Lola Melean Rodriguez'),
(91, 'Entrada', '2023-01-17 19:48:26', '100', 'Efectivo', 'Apertura de caja', '100', 'Caja abierta', 'Lola Melean Rodriguez'),
(92, 'Salida', '2023-01-17 19:48:35', '100', NULL, 'Cierre de caja', '0', 'Caja cerrada', 'Lola Melean Rodriguez'),
(93, 'Entrada', '2023-01-17 19:48:54', '100', 'Efectivo', 'Apertura de caja', '100', 'Caja abierta', 'Lola Melean Rodriguez'),
(94, 'Entrada', '2023-01-17 19:49:22', '150', 'Transferencia', 'pAGO', '250', 'Caja abierta', 'Lola Melean Rodriguez'),
(95, 'Salida', '2023-01-17 19:49:52', '75', 'Efectivo', 'PAGO02', '175', 'Caja abierta', 'Lola Melean Rodriguez'),
(96, 'Salida', '2023-01-17 19:50:24', '175', NULL, 'Cierre de caja', '0', 'Caja cerrada', 'Lola Melean Rodriguez'),
(97, 'Entrada', '2023-01-17 19:57:34', '200', 'Efectivo', 'Apertura de caja', '200', 'Caja abierta', 'Lola Melean Rodriguez'),
(98, 'Salida', '2023-01-17 19:58:26', '20', 'Efectivo', 'COMPRAS', '180', 'Caja abierta', 'Lola Melean Rodriguez'),
(99, 'Entrada', '2023-01-17 20:00:51', '250', 'efectivo', 'Pago de consulta #11', '430', 'Caja abierta', 'Lola Melean Rodriguez'),
(100, 'Salida', '2023-01-17 20:02:40', '430', NULL, 'Cierre de caja', '0', 'Caja cerrada', 'Lola Melean Rodriguez'),
(101, 'Salida', '2023-01-18 16:38:08', '0', NULL, 'Cierre de caja', '0', 'Caja cerrada', 'Administrador '),
(102, 'Entrada', '2023-01-18 16:38:32', '100', 'Efectivo', 'Apertura de caja', '100', 'Caja abierta', 'Administrador '),
(103, 'Salida', '2023-01-18 16:43:09', '100', NULL, 'Cierre de caja', '0', 'Caja cerrada', 'Administrador '),
(104, 'Entrada', '2023-01-18 16:44:47', '100', 'Efectivo', 'Apertura de caja', '100', 'Caja abierta', 'Administrador '),
(105, 'Entrada', '2023-01-18 16:45:00', '70', 'Transferencia', 'Pago 1', '170', 'Caja abierta', 'Administrador '),
(106, 'Entrada', '2023-01-18 16:45:18', '120', 'Efectivo', 'Pago 2', '290', 'Caja abierta', 'Administrador '),
(107, 'Salida', '2023-01-18 16:47:19', '45', 'Efectivo', 'Pago 3', '245', 'Caja abierta', 'Administrador '),
(108, 'Salida', '2023-01-18 16:47:24', '245', NULL, 'Cierre de caja', '0', 'Caja cerrada', 'Administrador '),
(109, 'Entrada', '2023-01-18 17:22:48', '200', 'Efectivo', 'Apertura de caja', '200', 'Caja abierta', 'Lola Melean Rodriguez'),
(110, 'Salida', '2023-01-18 17:24:06', '20', 'Efectivo', 'COMPRA', '180', 'Caja abierta', 'Lola Melean Rodriguez'),
(111, 'Entrada', '2023-01-18 17:27:05', '200', 'efectivo', 'Pago de consulta #12', '380', 'Caja abierta', 'Lola Melean Rodriguez'),
(112, 'Salida', '2023-01-18 17:31:21', '380', NULL, 'Cierre de caja', '0', 'Caja cerrada', 'Lola Melean Rodriguez'),
(113, 'Entrada', '2023-01-18 18:30:57', '100', 'Efectivo', 'Apertura de caja', '100', 'Caja abierta', 'Lola Melean Rodriguez'),
(114, 'Entrada', '2023-01-18 21:26:18', '10', 'Efectivo', 'Apertura de caja', '10', 'Caja abierta', 'Administrador '),
(115, 'Entrada', '2023-01-19 11:09:10', '150', 'Efectivo', 'Pago Pintor', '160', 'Caja abierta', 'Administrador '),
(116, 'Entrada', '2023-01-19 11:12:47', '200', 'qr', 'Pago de consulta #14', '360', 'Caja abierta', 'Administrador '),
(117, 'Salida', '2023-01-19 11:17:52', '360', NULL, 'Cierre de caja', '0', 'Caja cerrada', 'Administrador '),
(118, 'Entrada', '2023-01-19 11:28:07', '1', 'Efectivo', 'Apertura de caja', '1', 'Caja abierta', 'Administrador '),
(119, 'Entrada', '2023-01-19 11:38:26', '20', 'credito', 'Pago de consulta #13', '21', 'Caja abierta', 'Administrador '),
(120, 'Entrada', '2023-01-19 11:39:56', '250', 'efectivo', 'Pago de consulta #15', '271', 'Caja abierta', 'Administrador '),
(121, 'Entrada', '2023-01-19 11:46:30', '123', 'efectivo', 'Pago de consulta #1', '394', 'Caja abierta', 'Administrador '),
(122, 'Entrada', '2023-01-19 11:48:34', '213', 'efectivo', 'Pago de consulta #1', '607', 'Caja abierta', 'Administrador '),
(123, 'Salida', '2023-01-19 11:48:40', '35', 'Transferencia', 'pago', '572', 'Caja abierta', 'Administrador '),
(124, 'Entrada', '2023-01-19 11:52:07', '150', 'transferancia', 'Pago de consulta #16', '722', 'Caja abierta', 'Administrador '),
(125, 'Salida', '2023-01-19 22:20:44', '722', NULL, 'Cierre de caja', '0', 'Caja cerrada', 'Administrador '),
(126, 'Salida', '2023-01-20 17:13:48', '0', NULL, 'Cierre de caja', '0', 'Caja cerrada', 'Lola Melean Rodriguez'),
(127, 'Entrada', '2023-01-20 17:15:13', '100', 'Efectivo', 'Apertura de caja', '100', 'Caja abierta', 'Lola Melean Rodriguez'),
(128, 'Entrada', '2023-01-20 17:44:35', '25.00', 'Efectivo', 'Pago de factura: BL0MJZ3UI', '125', 'Caja abierta', 'Lola Melean Rodriguez'),
(129, 'Entrada', '2023-01-20 21:33:47', '900.00', 'Efectivo', 'Pago de factura: BLJJ0N7RA', '900', 'Caja abierta', 'Administrador betancourt'),
(130, 'Entrada', '2023-01-24 13:38:01', '900.00', 'Efectivo', 'Pago de factura: BLJJ0N7RA', '1800', 'Caja abierta', 'Administrador betancourt'),
(131, 'Salida', '2023-01-24 18:32:03', '1800', NULL, 'Cierre de caja', '0', 'Caja cerrada', 'Lola Melean Rodriguez'),
(132, 'Entrada', '2023-01-24 18:33:50', '200', 'Efectivo', 'Apertura de caja', '200', 'Caja abierta', 'Lola Melean Rodriguez'),
(133, 'Entrada', '2023-01-24 18:36:00', '300', 'Efectivo', 'sra susel para compra de verduras', '500', 'Caja abierta', 'Lola Melean Rodriguez'),
(134, 'Salida', '2023-01-24 18:38:34', '270', 'Efectivo', 'compra de verduras', '230', 'Caja abierta', 'Lola Melean Rodriguez'),
(135, 'Entrada', '2023-01-24 20:58:50', '240.00', 'Efectivo', 'Pago de factura: BLIVBWA4H', '2040', 'Caja abierta', 'Administrador betancourt'),
(136, 'Entrada', '2023-01-24 20:59:20', '151.00', 'Efectivo', 'Pago de factura: BLQLK6B41', '2191', 'Caja abierta', 'Administrador betancourt'),
(137, 'Salida', '2023-01-25 13:35:54', '2191', NULL, 'Cierre de caja', '0', 'Caja cerrada', 'Lola Melean Rodriguez'),
(138, 'Entrada', '2023-01-25 13:37:14', '200', 'Efectivo', 'Apertura de caja', '200', 'Caja abierta', 'Lola Melean Rodriguez'),
(139, 'Entrada', '2023-01-25 14:06:04', '400.00', 'Efectivo', 'Pago de factura: BLZFUZS0A', '2591', 'Caja abierta', 'Administrador betancourt'),
(140, 'Entrada', '2023-01-25 20:44:18', '180.00', 'Efectivo', 'Pago de factura: BL6ML2YKH', '2771', 'Caja abierta', 'Administrador betancourt'),
(141, 'Entrada', '2023-01-26 17:22:22', '100', 'Efectivo', 'Apertura de caja', '100', 'Caja abierta', 'Ninet  Ardaya'),
(142, 'Entrada', '2023-01-26 17:23:40', '300', 'Efectivo', 'compras de supermercados', '400', 'Caja abierta', 'Ninet  Ardaya'),
(143, 'Salida', '2023-01-26 17:31:51', '270', 'Efectivo', 'supermercado', '130', 'Caja abierta', 'Ninet  Ardaya'),
(144, 'Entrada', '2023-01-26 17:47:37', '105.00', 'Efectivo', 'Pago de factura: BLT8HRXVR', '235', 'Caja abierta', 'Ninet  Ardaya'),
(145, 'Salida', '2023-01-26 18:00:56', '235', NULL, 'Cierre de caja', '0', 'Caja cerrada', 'Ninet  Ardaya'),
(146, 'Entrada', '2023-01-26 18:39:20', '100', 'Efectivo', 'Apertura de caja', '100', 'Caja abierta', 'Ninet  Ardaya'),
(147, 'Entrada', '2023-01-26 18:39:33', '300', 'Efectivo', 'a', '400', 'Caja abierta', 'Ninet  Ardaya'),
(148, 'Entrada', '2023-01-26 18:39:47', '50', 'Efectivo', 'a', '450', 'Caja abierta', 'Ninet  Ardaya'),
(149, 'Salida', '2023-01-26 18:40:00', '100', 'Todos', 'sfdsd', '350', 'Caja abierta', 'Ninet  Ardaya'),
(150, 'Salida', '2023-01-26 18:40:18', '53', 'Efectivo', '32525', '297', 'Caja abierta', 'Ninet  Ardaya'),
(151, 'Entrada', '2023-01-26 18:40:34', '142', 'QR', 'dhd', '439', 'Caja abierta', 'Ninet  Ardaya'),
(152, 'Salida', '2023-01-26 18:40:57', '439', NULL, 'Cierre de caja', '0', 'Caja cerrada', 'Ninet  Ardaya'),
(163, 'Entrada', '2023-01-27 12:49:29', '37', 'Efectivo', 'Pago factura: UQ9XF895', '2808', 'Caja abierta', 'Administrador betancourt'),
(164, 'Entrada', '2023-01-27 16:39:23', '14993', 'Efectivo', 'Pago factura: UQ9XF895', '17801', 'Caja abierta', 'Administrador betancourt'),
(165, 'Salida', '2023-01-27 16:40:23', '17801', NULL, 'Cierre de caja', '0', 'Caja cerrada', 'Administrador betancourt'),
(166, 'Entrada', '2023-01-27 16:40:50', '200', 'Efectivo', 'Apertura de caja', '200', 'Caja abierta', 'Administrador betancourt'),
(167, 'Entrada', '2023-01-27 16:50:50', '100', 'Efectivo', 'Apertura de caja', '100', 'Caja abierta', 'Ninet  Ardaya'),
(168, 'Entrada', '2023-01-27 16:51:32', '500', 'Efectivo', 'proveedor', '600', 'Caja abierta', 'Ninet  Ardaya'),
(169, 'Entrada', '2023-01-27 16:54:31', '123', 'efectivo', 'Pago de consulta #17', '723', 'Caja abierta', 'Ninet  Ardaya'),
(170, 'Salida', '2023-01-27 16:56:24', '400', 'Efectivo', 'pago a erick santos', '323', 'Caja abierta', 'Ninet  Ardaya'),
(171, 'Entrada', '2023-01-27 16:59:28', '123.00', 'Tarjeta', 'Pago de factura: BLY17H5GW', '446', 'Caja abierta', 'Ninet  Ardaya'),
(172, 'Entrada', '2023-01-27 17:16:31', '500', 'Efectivo', 'Pago factura: UWSHNHVB', '946', 'Caja abierta', 'Ninet  Ardaya'),
(173, 'Entrada', '2023-01-27 17:16:31', '123', 'QR', 'Pago factura: UWSHNHVB', '1069', 'Caja abierta', 'Ninet  Ardaya'),
(174, 'Entrada', '2023-01-27 17:20:35', '100', 'Transferencia', 'Pago factura: UWSHNHVB', '1169', 'Caja abierta', 'Ninet  Ardaya'),
(175, 'Salida', '2023-01-27 17:29:36', '1169', NULL, 'Cierre de caja', '0', 'Caja cerrada', 'Ninet  Ardaya'),
(176, 'Salida', '2023-01-27 17:34:56', '0', NULL, 'Cierre de caja', '0', 'Caja cerrada', 'Lola Melean Rodriguez'),
(177, 'Entrada', '2023-01-27 17:36:56', '250', 'Efectivo', 'Apertura de caja', '250', 'Caja abierta', 'Lola Melean Rodriguez'),
(178, 'Salida', '2023-01-27 17:37:38', '50', 'Efectivo', 'compra de verduras para la cocina', '200', 'Caja abierta', 'Lola Melean Rodriguez'),
(179, 'Entrada', '2023-01-27 17:53:16', '120', 'Efectivo', 'Pago factura: U0MZY1MP', '320', 'Caja abierta', 'Lola Melean Rodriguez'),
(180, 'Salida', '2023-01-28 10:15:47', '320', NULL, 'Cierre de caja', '0', 'Caja cerrada', 'Lola Melean Rodriguez'),
(181, 'Entrada', '2023-01-28 10:21:07', '500', 'Efectivo', 'Apertura de caja', '500', 'Caja abierta', 'Lola Melean Rodriguez'),
(182, 'Entrada', '2023-01-28 10:24:54', '1000', 'Efectivo', 'SRA SUSEL DIO DINERO PARA HACER COMPRAS DE MATERIAL DE ESCRITORIO', '1500', 'Caja abierta', 'Lola Melean Rodriguez'),
(183, 'Salida', '2023-01-28 10:32:09', '200', 'Efectivo', 'COMPRA DE TINTA PARA IMPRESORA', '1300', 'Caja abierta', 'Lola Melean Rodriguez'),
(184, 'Salida', '2023-01-30 09:59:17', '1300', NULL, 'Cierre de caja', '0', 'Caja cerrada', 'Lola Melean Rodriguez'),
(185, 'Entrada', '2023-01-30 10:01:00', '500', 'Efectivo', 'Apertura de caja', '500', 'Caja abierta', 'Lola Melean Rodriguez'),
(186, 'Entrada', '2023-01-30 16:11:08', '300', 'Efectivo', 'compra de material de escritorio', '800', 'Caja abierta', 'Lola Melean Rodriguez'),
(187, 'Salida', '2023-01-30 16:13:41', '150', 'Efectivo', 'se gasto 150 bs en compra de papel bond ,lapiceros y fotocopias', '650', 'Caja abierta', 'Lola Melean Rodriguez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cm_patient`
--

CREATE TABLE `cm_patient` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(30) NOT NULL,
  `case_manager_id` int(11) NOT NULL,
  `ref_doctor_id` int(11) DEFAULT NULL,
  `hospital_name` varchar(255) DEFAULT NULL,
  `hospital_address` text,
  `doctor_name` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cm_status`
--

CREATE TABLE `cm_status` (
  `id` int(11) NOT NULL,
  `critical_status` varchar(255) NOT NULL DEFAULT '1',
  `cm_patient_id` int(11) NOT NULL,
  `description` text,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(30) NOT NULL,
  `profesional_id` int(11) NOT NULL,
  `tipo_consulta` varchar(256) DEFAULT NULL,
  `monto` varchar(256) DEFAULT NULL,
  `anamnesis` text,
  `fotos` text,
  `foto_perfil` text,
  `fecha` date DEFAULT NULL,
  `estado` varchar(256) DEFAULT NULL,
  `pagos` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id`, `patient_id`, `profesional_id`, `tipo_consulta`, `monto`, `anamnesis`, `fotos`, `foto_perfil`, `fecha`, `estado`, `pagos`) VALUES
(1, 'PQHZMY23', 2, NULL, '123', '{\"general\":\"123\",\"peso\":\"123\",\"altura\":\"123\",\"imc\":\"15252\",\"temperatura\":\"123\",\"presion_sanguinea_sistolica\":\"123\",\"presion_sanguinea_diastolica\":\"123\",\"frecuencia_respiratoria\":\"123\",\"frecuencia_cardiaca\":\"123\",\"imc_20\":\"123\",\"imc_30\":\"123\",\"examen_fisico\":\"123\",\"diagnostico\":\"123\",\"actividad_fisica\":\"123\",\"etilismo\":\"123\",\"fumador\":\"123\",\"drogas\":\"123\",\"alergias\":\"123\",\"diabetes\":\"123\",\"enfermedades_cronicas\":\"123\",\"hipertension\":\"123\",\"neoplasma\":\"123\",\"medicamentos_pedido\":\"123\",\"metodos_anticonceptivos\":\"123\",\"prescripcion_medica\":\"dfdfsdf\"}', '[\"cpvDS0KU_400x400.jpg\"]', '', '2022-04-28', 'En atención', '{\"efectivo\":\"213\",\"credito\":\"0.00\",\"debito\":\"0.00\",\"qr\":\"0.00\",\"transferancia\":\"0.00\",\"otro\":\"0.00\"}'),
(2, 'PQHZMY23', 5, NULL, '200', '{\"general\":\"\",\"peso\":\"\",\"altura\":\"\",\"imc\":\"\",\"temperatura\":\"\",\"presion_sanguinea_sistolica\":\"\",\"presion_sanguinea_diastolica\":\"\",\"frecuencia_respiratoria\":\"\",\"frecuencia_cardiaca\":\"\",\"imc_20\":\"\",\"imc_30\":\"\",\"examen_fisico\":\"\",\"diagnostico\":\"\",\"cie10\":\"\",\"actividad_fisica\":\"\",\"etilismo\":\"\",\"fumador\":\"\",\"drogas\":\"\",\"alergias\":\"\",\"diabetes\":\"\",\"enfermedades_cronicas\":\"\",\"hipertension\":\"\",\"neoplasma\":\"\",\"medicamentos_pedido\":\"\",\"metodos_anticonceptivos\":\"\",\"prescripcion_medica\":\"\"}', '[\"\"]', '', '2022-06-27', 'En atención', '{\"efectivo\":\"200\",\"credito\":\"0.00\",\"debito\":\"0.00\",\"qr\":\"0.00\",\"transferancia\":\"0.00\",\"otro\":\"0.00\"}'),
(3, 'PTPBB0YT', 7, NULL, '200', '{\"general\":\"\",\"peso\":\"\",\"altura\":\"\",\"imc\":\"\",\"temperatura\":\"\",\"presion_sanguinea_sistolica\":\"\",\"presion_sanguinea_diastolica\":\"\",\"frecuencia_respiratoria\":\"\",\"frecuencia_cardiaca\":\"\",\"imc_20\":\"\",\"imc_30\":\"\",\"examen_fisico\":\"\",\"diagnostico\":\"\",\"cie10\":\"\",\"actividad_fisica\":\"\",\"etilismo\":\"\",\"fumador\":\"\",\"drogas\":\"\",\"alergias\":\"\",\"diabetes\":\"\",\"enfermedades_cronicas\":\"\",\"hipertension\":\"\",\"neoplasma\":\"\",\"medicamentos_pedido\":\"\",\"metodos_anticonceptivos\":\"\",\"prescripcion_medica\":\"\"}', '[\"\"]', '', '2022-07-06', 'En atención', '{\"efectivo\":\"0.00\",\"credito\":\"0.00\",\"debito\":\"0.00\",\"qr\":\"0.00\",\"transferancia\":\"0.00\",\"otro\":\"200.00\"}'),
(4, 'PQHZMY23', 3, NULL, '100', '{\"general\":\"\",\"peso\":\"\",\"altura\":\"\",\"imc\":\"\",\"temperatura\":\"\",\"presion_sanguinea_sistolica\":\"\",\"presion_sanguinea_diastolica\":\"\",\"frecuencia_respiratoria\":\"\",\"frecuencia_cardiaca\":\"\",\"imc_20\":\"\",\"imc_30\":\"\",\"examen_fisico\":\"\",\"diagnostico\":\"\",\"cie10\":\"\",\"actividad_fisica\":\"\",\"etilismo\":\"\",\"fumador\":\"\",\"drogas\":\"\",\"alergias\":\"\",\"diabetes\":\"\",\"enfermedades_cronicas\":\"\",\"hipertension\":\"\",\"neoplasma\":\"\",\"medicamentos_pedido\":\"\",\"metodos_anticonceptivos\":\"\",\"prescripcion_medica\":\"\"}', '[\"\"]', '', '2022-07-06', 'En atención', '{\"efectivo\":\"100\",\"credito\":\"0.00\",\"debito\":\"0.00\",\"qr\":\"0.00\",\"transferancia\":\"0.00\",\"otro\":\"0.00\"}'),
(6, 'PHLJBMVS', 4, NULL, '350', '{\"general\":\"\",\"peso\":\"\",\"altura\":\"\",\"imc\":\"\",\"temperatura\":\"\",\"presion_sanguinea_sistolica\":\"\",\"presion_sanguinea_diastolica\":\"\",\"frecuencia_respiratoria\":\"\",\"frecuencia_cardiaca\":\"\",\"imc_20\":\"\",\"imc_30\":\"\",\"examen_fisico\":\"\",\"diagnostico\":\"\",\"cie10\":\"\",\"actividad_fisica\":\"\",\"etilismo\":\"\",\"fumador\":\"\",\"drogas\":\"\",\"alergias\":\"\",\"diabetes\":\"\",\"enfermedades_cronicas\":\"\",\"hipertension\":\"\",\"neoplasma\":\"\",\"medicamentos_pedido\":\"\",\"metodos_anticonceptivos\":\"\",\"prescripcion_medica\":\"\"}', '[\"\"]', '', '2022-08-03', 'En atención', '{\"efectivo\":\"350\",\"credito\":\"0.00\",\"debito\":\"0.00\",\"qr\":\"0.00\",\"transferancia\":\"0.00\",\"otro\":\"0.00\"}'),
(7, 'P2OKPVLD', 7, NULL, '100', '{\"general\":\"\",\"peso\":\"\",\"altura\":\"\",\"imc\":\"\",\"temperatura\":\"\",\"presion_sanguinea_sistolica\":\"\",\"presion_sanguinea_diastolica\":\"\",\"frecuencia_respiratoria\":\"\",\"frecuencia_cardiaca\":\"\",\"imc_20\":\"\",\"imc_30\":\"\",\"examen_fisico\":\"\",\"diagnostico\":\"\",\"cie10\":\"\",\"actividad_fisica\":\"\",\"etilismo\":\"\",\"fumador\":\"\",\"drogas\":\"\",\"alergias\":\"\",\"diabetes\":\"\",\"enfermedades_cronicas\":\"\",\"hipertension\":\"\",\"neoplasma\":\"\",\"medicamentos_pedido\":\"\",\"metodos_anticonceptivos\":\"\",\"prescripcion_medica\":\"\"}', '[\"\"]', '', '2023-01-13', 'En atención', '{\"efectivo\":\"100\",\"credito\":\"0.00\",\"debito\":\"0.00\",\"qr\":\"0.00\",\"transferancia\":\"0.00\",\"otro\":\"0.00\"}'),
(8, 'P2OKPVLD', 3, NULL, '100', '{\"general\":\"\",\"peso\":\"\",\"altura\":\"\",\"imc\":\"\",\"temperatura\":\"\",\"presion_sanguinea_sistolica\":\"\",\"presion_sanguinea_diastolica\":\"\",\"frecuencia_respiratoria\":\"\",\"frecuencia_cardiaca\":\"\",\"imc_20\":\"\",\"imc_30\":\"\",\"examen_fisico\":\"\",\"diagnostico\":\"\",\"cie10\":\"\",\"actividad_fisica\":\"\",\"etilismo\":\"\",\"fumador\":\"\",\"drogas\":\"\",\"alergias\":\"\",\"diabetes\":\"\",\"enfermedades_cronicas\":\"\",\"hipertension\":\"\",\"neoplasma\":\"\",\"medicamentos_pedido\":\"\",\"metodos_anticonceptivos\":\"\",\"prescripcion_medica\":\"\"}', '[\"\"]', '', '2023-01-13', 'En atención', '{\"efectivo\":\"100\",\"credito\":\"0.00\",\"debito\":\"0.00\",\"qr\":\"0.00\",\"transferancia\":\"0.00\",\"otro\":\"0.00\"}'),
(9, 'PQHZMY23', 4, NULL, '150', '{\"general\":\"\",\"peso\":\"\",\"altura\":\"\",\"imc\":\"\",\"temperatura\":\"\",\"presion_sanguinea_sistolica\":\"\",\"presion_sanguinea_diastolica\":\"\",\"frecuencia_respiratoria\":\"\",\"frecuencia_cardiaca\":\"\",\"imc_20\":\"\",\"imc_30\":\"\",\"examen_fisico\":\"\",\"diagnostico\":\"\",\"cie10\":\"\",\"actividad_fisica\":\"\",\"etilismo\":\"\",\"fumador\":\"\",\"drogas\":\"\",\"alergias\":\"\",\"diabetes\":\"\",\"enfermedades_cronicas\":\"\",\"hipertension\":\"\",\"neoplasma\":\"\",\"medicamentos_pedido\":\"\",\"metodos_anticonceptivos\":\"\",\"prescripcion_medica\":\"\"}', '[\"\"]', '', '2023-01-17', 'En atención', '{\"efectivo\":\"150\",\"credito\":\"0.00\",\"debito\":\"0.00\",\"qr\":\"0.00\",\"transferancia\":\"0.00\",\"otro\":\"0.00\"}'),
(10, 'PELWQ10G', 4, NULL, '200', '{\"general\":\"\",\"peso\":\"\",\"altura\":\"\",\"imc\":\"\",\"temperatura\":\"\",\"presion_sanguinea_sistolica\":\"\",\"presion_sanguinea_diastolica\":\"\",\"frecuencia_respiratoria\":\"\",\"frecuencia_cardiaca\":\"\",\"imc_20\":\"\",\"imc_30\":\"\",\"examen_fisico\":\"\",\"diagnostico\":\"\",\"cie10\":\"\",\"actividad_fisica\":\"\",\"etilismo\":\"\",\"fumador\":\"\",\"drogas\":\"\",\"alergias\":\"\",\"diabetes\":\"\",\"enfermedades_cronicas\":\"\",\"hipertension\":\"\",\"neoplasma\":\"\",\"medicamentos_pedido\":\"\",\"metodos_anticonceptivos\":\"\",\"prescripcion_medica\":\"\"}', '[\"\"]', '', '2023-01-17', 'En atención', '{\"efectivo\":\"200\",\"credito\":\"0.00\",\"debito\":\"0.00\",\"qr\":\"0.00\",\"transferancia\":\"0.00\",\"otro\":\"0.00\"}'),
(11, 'PHLJBMVS', 4, NULL, '250', '{\"general\":\"\",\"peso\":\"\",\"altura\":\"\",\"imc\":\"\",\"temperatura\":\"\",\"presion_sanguinea_sistolica\":\"\",\"presion_sanguinea_diastolica\":\"\",\"frecuencia_respiratoria\":\"\",\"frecuencia_cardiaca\":\"\",\"imc_20\":\"\",\"imc_30\":\"\",\"examen_fisico\":\"\",\"diagnostico\":\"\",\"cie10\":\"\",\"actividad_fisica\":\"\",\"etilismo\":\"\",\"fumador\":\"\",\"drogas\":\"\",\"alergias\":\"\",\"diabetes\":\"\",\"enfermedades_cronicas\":\"\",\"hipertension\":\"\",\"neoplasma\":\"\",\"medicamentos_pedido\":\"\",\"metodos_anticonceptivos\":\"\",\"prescripcion_medica\":\"\"}', '[\"\"]', '', '2023-01-17', 'En atención', '{\"efectivo\":\"250\",\"credito\":\"0.00\",\"debito\":\"0.00\",\"qr\":\"0.00\",\"transferancia\":\"0.00\",\"otro\":\"0.00\"}'),
(12, 'PQHZMY23', 4, NULL, '200', '{\"general\":\"\",\"peso\":\"\",\"altura\":\"\",\"imc\":\"\",\"temperatura\":\"\",\"presion_sanguinea_sistolica\":\"\",\"presion_sanguinea_diastolica\":\"\",\"frecuencia_respiratoria\":\"\",\"frecuencia_cardiaca\":\"\",\"imc_20\":\"\",\"imc_30\":\"\",\"examen_fisico\":\"\",\"diagnostico\":\"\",\"cie10\":\"\",\"actividad_fisica\":\"\",\"etilismo\":\"\",\"fumador\":\"\",\"drogas\":\"\",\"alergias\":\"\",\"diabetes\":\"\",\"enfermedades_cronicas\":\"\",\"hipertension\":\"\",\"neoplasma\":\"\",\"medicamentos_pedido\":\"\",\"metodos_anticonceptivos\":\"\",\"prescripcion_medica\":\"\"}', '[\"\"]', '', '2023-01-18', 'En atención', '{\"efectivo\":\"200\",\"credito\":\"0.00\",\"debito\":\"0.00\",\"qr\":\"0.00\",\"transferancia\":\"0.00\",\"otro\":\"0.00\"}'),
(13, 'PQHZMY23', 4, NULL, '20', '{\"general\":\"\",\"peso\":\"\",\"altura\":\"\",\"imc\":\"\",\"temperatura\":\"\",\"presion_sanguinea_sistolica\":\"\",\"presion_sanguinea_diastolica\":\"\",\"frecuencia_respiratoria\":\"\",\"frecuencia_cardiaca\":\"\",\"imc_20\":\"\",\"imc_30\":\"\",\"examen_fisico\":\"\",\"diagnostico\":\"\",\"cie10\":\"\",\"actividad_fisica\":\"\",\"etilismo\":\"\",\"fumador\":\"\",\"drogas\":\"\",\"alergias\":\"\",\"diabetes\":\"\",\"enfermedades_cronicas\":\"\",\"hipertension\":\"\",\"neoplasma\":\"\",\"medicamentos_pedido\":\"\",\"metodos_anticonceptivos\":\"\",\"prescripcion_medica\":\"\"}', '[\"\"]', '', '2023-01-18', 'En atención', '{\"efectivo\":\"0.00\",\"credito\":\"20\",\"debito\":\"0.00\",\"qr\":\"0.00\",\"transferancia\":\"0.00\",\"otro\":\"0.00\"}'),
(14, 'PJXGONMO', 3, NULL, '200', '{\"general\":\"\",\"peso\":\"\",\"altura\":\"\",\"imc\":\"\",\"temperatura\":\"\",\"presion_sanguinea_sistolica\":\"\",\"presion_sanguinea_diastolica\":\"\",\"frecuencia_respiratoria\":\"\",\"frecuencia_cardiaca\":\"\",\"imc_20\":\"\",\"imc_30\":\"\",\"examen_fisico\":\"\",\"diagnostico\":\"\",\"cie10\":\"\",\"actividad_fisica\":\"\",\"etilismo\":\"\",\"fumador\":\"\",\"drogas\":\"\",\"alergias\":\"\",\"diabetes\":\"\",\"enfermedades_cronicas\":\"\",\"hipertension\":\"\",\"neoplasma\":\"\",\"medicamentos_pedido\":\"\",\"metodos_anticonceptivos\":\"\",\"prescripcion_medica\":\"\"}', '[\"\"]', '', '2023-01-19', 'En atención', '{\"efectivo\":\"0.00\",\"credito\":\"0.00\",\"debito\":\"0.00\",\"qr\":\"200\",\"transferancia\":\"0.00\",\"otro\":\"0.00\"}'),
(15, 'PHLJBMVS', 4, NULL, '250', '{\"general\":\"\",\"peso\":\"\",\"altura\":\"\",\"imc\":\"\",\"temperatura\":\"\",\"presion_sanguinea_sistolica\":\"\",\"presion_sanguinea_diastolica\":\"\",\"frecuencia_respiratoria\":\"\",\"frecuencia_cardiaca\":\"\",\"imc_20\":\"\",\"imc_30\":\"\",\"examen_fisico\":\"\",\"diagnostico\":\"\",\"cie10\":\"\",\"actividad_fisica\":\"\",\"etilismo\":\"\",\"fumador\":\"\",\"drogas\":\"\",\"alergias\":\"\",\"diabetes\":\"\",\"enfermedades_cronicas\":\"\",\"hipertension\":\"\",\"neoplasma\":\"\",\"medicamentos_pedido\":\"\",\"metodos_anticonceptivos\":\"\",\"prescripcion_medica\":\"\"}', '[\"\"]', '', '2023-01-19', 'En atención', '{\"efectivo\":\"250\",\"credito\":\"0.00\",\"debito\":\"0.00\",\"qr\":\"0.00\",\"transferancia\":\"0.00\",\"otro\":\"0.00\"}'),
(16, 'PTPBB0YT', 3, NULL, '150', '{\"general\":\"\",\"peso\":\"\",\"altura\":\"\",\"imc\":\"\",\"temperatura\":\"\",\"presion_sanguinea_sistolica\":\"\",\"presion_sanguinea_diastolica\":\"\",\"frecuencia_respiratoria\":\"\",\"frecuencia_cardiaca\":\"\",\"imc_20\":\"\",\"imc_30\":\"\",\"examen_fisico\":\"\",\"diagnostico\":\"\",\"cie10\":\"\",\"actividad_fisica\":\"\",\"etilismo\":\"\",\"fumador\":\"\",\"drogas\":\"\",\"alergias\":\"\",\"diabetes\":\"\",\"enfermedades_cronicas\":\"\",\"hipertension\":\"\",\"neoplasma\":\"\",\"medicamentos_pedido\":\"\",\"metodos_anticonceptivos\":\"\",\"prescripcion_medica\":\"\"}', '[\"\"]', '', '2023-01-19', 'En atención', '{\"efectivo\":\"0.00\",\"credito\":\"0.00\",\"debito\":\"0.00\",\"qr\":\"0.00\",\"transferancia\":\"150\",\"otro\":\"0.00\"}'),
(17, 'P8MO0SAU', 3, '37', '123', '{\"general\":\"\",\"peso\":\"\",\"altura\":\"\",\"imc\":\"\",\"temperatura\":\"\",\"presion_sanguinea_sistolica\":\"\",\"presion_sanguinea_diastolica\":\"\",\"frecuencia_respiratoria\":\"\",\"frecuencia_cardiaca\":\"\",\"imc_20\":\"\",\"imc_30\":\"\",\"examen_fisico\":\"\",\"diagnostico\":\"\",\"cie10\":\"\",\"actividad_fisica\":\"\",\"etilismo\":\"\",\"fumador\":\"\",\"drogas\":\"\",\"alergias\":\"\",\"diabetes\":\"\",\"enfermedades_cronicas\":\"\",\"hipertension\":\"\",\"neoplasma\":\"\",\"medicamentos_pedido\":\"\",\"metodos_anticonceptivos\":\"\",\"prescripcion_medica\":\"\"}', '[\"\"]', '', '2023-01-27', 'En atención', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `custom_sms_info`
--

CREATE TABLE `custom_sms_info` (
  `custom_sms_id` int(11) NOT NULL,
  `reciver` varchar(100) NOT NULL,
  `gateway` text NOT NULL,
  `message` text NOT NULL,
  `sms_date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `department`
--

CREATE TABLE `department` (
  `dprt_id` int(11) NOT NULL,
  `main_id` int(6) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `flaticon` varchar(30) NOT NULL,
  `description` text,
  `image` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `department`
--

INSERT INTO `department` (`dprt_id`, `main_id`, `name`, `flaticon`, `description`, `image`, `status`) VALUES
(16, 3, 'Oncologia', 'uterus', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ipsum magna, gravida nec erat ac, malesuada pharetra felis. Phasellus eu dolor orci. Duis et dictum sem, sit amet sagittis dolor. Curabitur scelerisque, nunc eget viverra malesuada, nunc ligula tincidunt nisi, eget elementum urna magna at dui. Praesent eu tincidunt arcu. Ut imperdiet a ligula nec dapibus. Aliquam erat volutpat. Donec auctor elementum accumsan. Vestibulum velit augue, feugiat ac nisl in, pharetra accumsan ligula. Proin nunc mauris, ultrices quis tristique vitae, ornare quis nunc. Aenean ut tincidunt lorem. Maecenas consectetur faucibus velit, nec tincidunt nulla fermentum sed.\r\n\r\n', '', 1),
(18, 3, 'Farmacia', 'drug', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ipsum magna, gravida nec erat ac, malesuada pharetra felis. Phasellus eu dolor orci. Duis et dictum sem, sit amet sagittis dolor. Curabitur scelerisque, nunc eget viverra malesuada, nunc ligula tincidunt nisi, eget elementum urna magna at dui. Praesent eu tincidunt arcu. Ut imperdiet a ligula nec dapibus. Aliquam erat volutpat. Donec auctor elementum accumsan. Vestibulum velit augue, feugiat ac nisl in, pharetra accumsan ligula. Proin nunc mauris, ultrices quis tristique vitae, ornare quis nunc. Aenean ut tincidunt lorem. Maecenas consectetur faucibus velit, nec tincidunt nulla fermentum sed.\r\n\r\n', '', 1),
(19, 1, 'Radioterapia', 'herbal', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ipsum magna, gravida nec erat ac, malesuada pharetra felis. Phasellus eu dolor orci. Duis et dictum sem, sit amet sagittis dolor. Curabitur scelerisque, nunc eget viverra malesuada, nunc ligula tincidunt nisi, eget elementum urna magna at dui. Praesent eu tincidunt arcu. Ut imperdiet a ligula nec dapibus. Aliquam erat volutpat. Donec auctor elementum accumsan. Vestibulum velit augue, feugiat ac nisl in, pharetra accumsan ligula. Proin nunc mauris, ultrices quis tristique vitae, ornare quis nunc. Aenean ut tincidunt lorem. Maecenas consectetur faucibus velit, nec tincidunt nulla fermentum sed.\r\n\r\n', '', 1),
(21, 3, 'Reumatologia', 'kidney-1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ipsum magna, gravida nec erat ac, malesuada pharetra felis. Phasellus eu dolor orci. Duis et dictum sem, sit amet sagittis dolor. Curabitur scelerisque, nunc eget viverra malesuada, nunc ligula tincidunt nisi, eget elementum urna magna at dui. Praesent eu tincidunt arcu. Ut imperdiet a ligula nec dapibus. Aliquam erat volutpat. Donec auctor elementum accumsan. Vestibulum velit augue, feugiat ac nisl in, pharetra accumsan ligula. Proin nunc mauris, ultrices quis tristique vitae, ornare quis nunc. Aenean ut tincidunt lorem. Maecenas consectetur faucibus velit, nec tincidunt nulla fermentum sed.\r\n\r\n', '', 1),
(22, 1, 'Ginecologia', 'kidney-1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ipsum magna, gravida nec erat ac, malesuada pharetra felis. Phasellus eu dolor orci. Duis et dictum sem, sit amet sagittis dolor. Curabitur scelerisque, nunc eget viverra malesuada, nunc ligula tincidunt nisi, eget elementum urna magna at dui. Praesent eu tincidunt arcu. Ut imperdiet a ligula nec dapibus. Aliquam erat volutpat. Donec auctor elementum accumsan. Vestibulum velit augue, feugiat ac nisl in, pharetra accumsan ligula. Proin nunc mauris, ultrices quis tristique vitae, ornare quis nunc. Aenean ut tincidunt lorem. Maecenas consectetur faucibus velit, nec tincidunt nulla fermentum sed.\r\n\r\n', '', 1),
(23, 3, 'Obstetricia', 'vitamins', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ipsum magna, gravida nec erat ac, malesuada pharetra felis. Phasellus eu dolor orci. Duis et dictum sem, sit amet sagittis dolor. Curabitur scelerisque, nunc eget viverra malesuada, nunc ligula tincidunt nisi, eget elementum urna magna at dui. Praesent eu tincidunt arcu. Ut imperdiet a ligula nec dapibus. Aliquam erat volutpat. Donec auctor elementum accumsan. Vestibulum velit augue, feugiat ac nisl in, pharetra accumsan ligula. Proin nunc mauris, ultrices quis tristique vitae, ornare quis nunc. Aenean ut tincidunt lorem. Maecenas consectetur faucibus velit, nec tincidunt nulla fermentum sed.\r\n\r\n', '', 1),
(25, 4, 'Cirugia General', 'tooth', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ipsum magna, gravida nec erat ac, malesuada pharetra felis. Phasellus eu dolor orci. Duis et dictum sem, sit amet sagittis dolor. Curabitur scelerisque, nunc eget viverra malesuada, nunc ligula tincidunt nisi, eget elementum urna magna at dui. Praesent eu tincidunt arcu. Ut imperdiet a ligula nec dapibus. Aliquam erat volutpat. Donec auctor elementum accumsan. Vestibulum velit augue, feugiat ac nisl in, pharetra accumsan ligula.', '', 1),
(26, 3, 'Cirugia Plastica', 'sperm-2', 'fgdfg ghfgh fghftg fhrtg dgfgdfgd tfds', '', 1),
(27, 4, 'Geriatria', 'surgery', 'Quis autem vel eum iriure dolor in…', 'assets_web/img/department/0f2e2ae455e4498f1623deddfd5662d3.png', 1),
(28, 4, 'Psicología', 'focus', 'Psicologia', 'assets_web/img/department/81f466eb971eb8667b38ffcc8f19d267.png', 1),
(29, 4, 'Terapia Intensiva', 'herbal', 'Terapia intensiva', 'assets_web/img/department/026b1b2555099800df2dc244251495fd.png', 1),
(30, 5, 'Enfermería', 'feeder', 'Las enfermeras son uno de los grupos de profesionales más confiables en Bolívia', 'assets_web/img/department/a7c06eb4301ccd7c402a9471386c37d4.jpg', 1),
(31, 4, 'Cardiologia', 'heart', 'Departamento de Cardiaco', 'assets_web/img/department/ae0ee9e0cf963425e7ee8bb5f1f941cc.jpg', 1),
(32, 4, 'Raio X', 'x-ray', 'Departamento de Imagenes', 'assets_web/img/department/1f5efdd2afb95c26431640b38d572265.jpg', 1),
(33, 4, 'Pediatria', 'neurology', 'pediatria', 'assets_web/img/department/398dd38993cfe562035cba81569735f3.jpg', 1),
(34, 4, 'Otorrinolaringologia', 'heart', 'cirugia', 'assets_web/img/department/b18ce79a1c0fe6f4ee487f3977e00084.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `department_lang`
--

CREATE TABLE `department_lang` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `language` varchar(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `department_lang`
--

INSERT INTO `department_lang` (`id`, `department_id`, `language`, `name`, `description`, `status`) VALUES
(1, 32, 'english', 'X-rey', 'Extend point of care with new services to increase revenues', 1),
(2, 32, 'french', 'X-rey', 'Extension des points de service avec de nouveaux services pour augmenter les revenus', 1),
(3, 32, 'bangla', 'এক্স-রে', 'রাজস্ব বৃদ্ধি নতুন সেবা সঙ্গে যত্ন বিন্দু প্রসারিত', 1),
(4, 32, 'arabic', 'اكس ري', 'توسيع نقطة الرعاية مع الخدمات الجديدة لزيادة الإيرادات', 1),
(5, 31, 'french', 'Cardiologie', 'Un cardiologue est un médecin spécialement formé et habile à détecter, traiter et prévenir les maladies du cœur et des vaisseaux sanguins.', 1),
(6, 31, 'arabic', 'طب القلب', 'طبيب القلب هو طبيب ذو تدريب خاص ومهارة في اكتشاف وعلاج ومنع أمراض القلب والأوعية الدموية.', 1),
(7, 31, 'bangla', 'হৃদ্বিজ্ঞান', 'কার্ডিওলজিস্ট হ\'ল হৃদরোগ ও রক্তবাহী শাবকদের রোগ সনাক্ত, চিকিৎসা ও প্রতিরোধে বিশেষ প্রশিক্ষণ ও দক্ষতার সঙ্গে একটি ডাক্তার।', 1),
(8, 31, 'english', 'Cardiologia', 'Un cardiólogo es un médico con capacitación especial y habilidad para encontrar, tratar y prevenir enfermedades del corazón y los vasos sanguíneos.', 1),
(9, 30, 'french', 'allaitement', 'Les infirmières sont l’un des groupes de professionnels les plus fiables aux États-Unis.', 1),
(10, 30, 'arabic', 'تمريض', 'الممرضات هي واحدة من أكثر مجموعات المهنيين الموثوق بهم في الولايات المتحدة.', 1),
(11, 30, 'english', 'Enfermeria', 'Las enfermeras son uno de los grupos de profesionales más confiables en Bolívia', 1),
(12, 30, 'bangla', 'নার্সিং', 'নার্স মার্কিন যুক্তরাষ্ট্রে পেশাদারদের সবচেয়ে নির্ভরযোগ্য গ্রুপগুলির মধ্যে একটি।', 1),
(13, 29, 'english', 'Therapy', 'Psychotherapy is the practice of spending time with a trained professional—usually a psychologist, a social worker, or a licensed counselor', 1),
(14, 29, 'bangla', 'থেরাপি', 'সাইকোথেরাপি একজন প্রশিক্ষিত পেশাদারের সাথে সময় কাটাবার অভ্যাস - সাধারণত একজন মনোবিজ্ঞানী, একজন সামাজিক কর্মী, অথবা একটি লাইসেন্সপ্রাপ্ত কাউন্সিলর', 1),
(15, 29, 'arabic', 'علاج', 'العلاج النفسي هو ممارسة قضاء الوقت مع محترف مدرب - عادة ما يكون طبيب نفساني أو عامل اجتماعي أو مستشار مرخص', 1),
(16, 29, 'french', 'Thérapie', 'La psychothérapie consiste à passer du temps avec un professionnel qualifié - généralement un psychologue, un travailleur social ou un conseiller agréé.', 1),
(17, 28, 'bangla', 'মনোবিজ্ঞান', 'মনোবিজ্ঞান মন এবং আচরণ বৈজ্ঞানিক গবেষণা।', 1),
(18, 28, 'arabic', 'علم النفس', 'علم النفس هو الدراسة العلمية للعقل والسلوك.', 1),
(19, 28, 'french', 'Psychologie', 'La psychologie est l\'étude scientifique de l\'esprit et du comportement.', 1),
(20, 28, 'english', 'Psychology', 'Psychology is the scientific study of the mind and behavior.', 1),
(21, 27, 'bangla', 'সার্জারি', 'সার্জারি করার অনেক কারণ আছে। কিছু অপারেশন ব্যথা উপশম বা প্রতিরোধ করতে পারেন।', 1),
(22, 27, 'arabic', 'العملية الجراحية', 'هناك العديد من الأسباب لإجراء عملية جراحية. بعض العمليات يمكن أن تخفف الألم أو تمنعه.', 1),
(23, 27, 'french', 'Chirurgie', 'Il y a plusieurs raisons de subir une intervention chirurgicale. Certaines opérations peuvent soulager ou prévenir la douleur.', 1),
(24, 27, 'english', 'Surgery', 'There are many reasons to have surgery. Some operations can relieve or prevent pain.', 1),
(25, 26, 'english', 'Pregnancy', 'Congratulations, and welcome to your pregnancy! Here’s what to expect each week and how to have a healthy, happy pregnancy.', 1),
(26, 26, 'bangla', 'গর্ভাবস্থা', 'অভিনন্দন, এবং আপনার গর্ভাবস্থায় স্বাগতম! এখানে প্রতি সপ্তাহে কী আশা করা যায় এবং কীভাবে সুস্থ, সুখী গর্ভধারণ করা যায়।', 1),
(27, 26, 'arabic', 'حمل', 'مبروك ، ومرحبا بكم في الحمل! إليك ما يمكن توقعه كل أسبوع وكيفية الحصول على حمل صحي وسعيد.', 1),
(28, 26, 'french', 'Grossesse', 'Félicitations et bienvenue dans votre grossesse! Voici à quoi s\'attendre chaque semaine et comment avoir une grossesse saine et heureuse.', 1),
(29, 22, 'english', 'Gynaecology', 'The gynaecology service at UCLH, in association with The Institute for Women\'s Health', 1),
(30, 22, 'french', 'Gynécologie', 'Le service de gynécologie de l\'UCLH, en association avec l\'Institut pour la santé des femmes', 1),
(31, 22, 'arabic', 'طب النساء', 'خدمة أمراض النساء في UCLH ، بالتعاون مع معهد صحة المرأة', 1),
(32, 22, 'bangla', 'স্ত্রীরোগবিদ্যা', 'ইউসিএলএইচ-তে গাইনোকোলজি সেবা, ইনস্টিটিউট ফর উইমেনস হেলথের সহযোগিতায়', 1),
(33, 18, 'bangla', 'ফার্মেসী', 'এটি একটি ঔষধের দোকান, আপনি এখানে সব ধরনের ওষুধ কিনতে পারেন। কিছু বিদেশী ঔষধ এখানেও পাওয়া যায়। দ্রুত সেবা. শুধুমাত্র নগদ. কর্মীরা তাই ভাল।', 1),
(34, 18, 'english', 'Pharmacy', 'Hospital pharmacy is a specialised field of pharmacy which forms an integrated part of patient health care in a health facility.', 1),
(35, 18, 'french', 'Les pharmacies', 'Pharmacie hospitalière 2 Un domaine spécialisé de la pharmacie Hoch forme une partie intégrante des soins de santé dispensés aux patients dans un établissement de santé.', 1),
(36, 18, 'arabic', 'الصيدليات', 'صيدلية المستشفيات 2 حقل متخصص من الصيدلة أشكال Hoch غير متكاملة جزء من الرعاية الصحية للمرضى في المرفق الصحي.', 1),
(37, 19, 'english', 'Radiotherapy', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content her', 1),
(38, 19, 'bangla', 'রঁজনরশ্মি দ্বারা চিকিত্সা', 'এটি একটি দীর্ঘ প্রতিষ্ঠিত সত্য যা একটি পাঠক তার লেআউটটি দেখতে যখন পৃষ্ঠাটির পাঠযোগ্য সামগ্রী দ্বারা বিভ্রান্ত হবে। লোরম ইপসাম ব্যবহার করার বিষয়টি হল \'এখানে সামগ্রী, এখানে সামগ্রী\' ব্যবহার করার বিরোধিতা করে এটির অক্ষরগুলির কম বা কম সাধারণ বন্টন রয়েছ', 1),
(39, 19, 'arabic', 'المعالجة بالإشعاع', 'من الحقائق الثابتة منذ زمن بعيد أن القارئ سوف يصرفه المحتوى القابل للقراءة لصفحة عند النظر إلى تصميمه. إن الهدف من استخدام لوريم إيبسوم هو أن لديه توزيعًا عاديًا أو أكثر للرسائل ، بدلاً من استخدام \"المحتوى هنا ، المحتوى هنا\" ، مما يجعله يبدو وكأنه قا', 1),
(40, 19, 'french', 'Radiothérapie', 'C\'est un fait établi de longue date qu\'un lecteur sera distrait par le contenu lisible d\'une page lorsqu\'il examinera sa mise en page. Lorem Ipsum a l\'avantage de présenter une distribution de lettres plus ou moins normale, par opposition à l\'utilisa', 1),
(41, 33, 'Español', 'pediatria', 'pediatria', 1),
(42, 34, 'Español', 'cirugia', 'cirugia', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(30) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `hidden_attach_file` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `upload_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `document`
--

INSERT INTO `document` (`id`, `patient_id`, `doctor_id`, `description`, `hidden_attach_file`, `date`, `upload_by`) VALUES
(1, 'PJXGONMO', 5, '8456', './assets/attachments/777887794bec829c8036f7861862e2cc.jpg', '2022-06-14', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedades`
--

CREATE TABLE `enfermedades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `enfermedades`
--

INSERT INTO `enfermedades` (`id`, `nombre`) VALUES
(1, 'Ántrax'),
(2, 'Asma'),
(3, 'Autismo'),
(4, 'Artritis'),
(5, 'Cáncer'),
(6, 'Clamidia'),
(7, 'Culebrilla (herpes zóster)'),
(8, 'Déficit de atención e hiperactividad'),
(9, 'Diabetes'),
(10, 'Ébola'),
(11, 'Embarazo y ETS'),
(12, 'Enfermedades de transmisión sexual (ETS)'),
(13, 'Enfermedad inflamatoria pélvica (EIP)'),
(14, 'Enfermedad pulmonar obstructiva crónica'),
(15, 'Epilepsia'),
(16, 'Escarlatina'),
(17, 'Estreptococo del grupo B'),
(18, 'Gonorrhea'),
(19, 'Haemophilus influenzae tipo b (Hib)'),
(20, 'Hemofilia'),
(21, 'Herpes genital'),
(22, 'Infeccíon genital por VPH'),
(23, 'Influenza (gripe)'),
(24, 'La Salud Mental de los Niños (Children’s Mental Health)'),
(25, 'Listeria (Listeriosis)'),
(26, 'Meningitis'),
(27, 'Neumonía'),
(28, 'Paperas'),
(29, 'Poliomielitis'),
(30, 'Rabia'),
(31, 'Rotavirus'),
(32, 'Shigella – Shigellosis'),
(33, 'Sífilis'),
(34, 'Silicosis'),
(35, 'Síndrome alcohólico fetal'),
(36, 'Síndrome de fatiga crónica (SFC)'),
(37, 'Síndrome de Tourette'),
(38, 'Tabaquismo'),
(39, 'Tosferina'),
(40, 'Tricomoniasis'),
(41, 'Tuberculosis (TB)'),
(42, 'Vaginosis bacteriana'),
(43, 'VIH/Sida'),
(44, 'Zika');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enquiry`
--

CREATE TABLE `enquiry` (
  `enquiry_id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `subject` varchar(100) NOT NULL,
  `enquiry` text,
  `checked` tinyint(1) DEFAULT NULL,
  `ip_address` varchar(20) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `checked_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ha_birth`
--

CREATE TABLE `ha_birth` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `patient_id` varchar(30) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ha_category`
--

CREATE TABLE `ha_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ha_category`
--

INSERT INTO `ha_category` (`id`, `name`, `description`, `status`) VALUES
(1, 'Antihistamínico', '<p>Antihistamínicos. <strong>Los antihistamínicos bloquean la histamina, una sustancia química que produce síntomas y que el sistema inmunitario libera durante una reacción alérgica</strong>.</p>', 1),
(2, 'Vacunas', '<p>Vacunas contra diversas enfermedades.</p>', 1),
(3, 'Inmuno supresores', '<p>Medicaciòn Inmuno supresoreas</p>', 1),
(4, 'Antiácidos y antiulcerosos', '<p>Antiácidos y antiulcerosos</p>', 1),
(5, 'Microgotero de 150 ml', '<h2>Dispositivo para administrar al paciente soluciones y  medicamentos parenterales gota a gota, a chorro o intermitente por via venosa periferica o central por un tiempo determinado .</h2>', 1),
(6, 'Equipo de suero', '<p><strong>Los equipos de suero son indispensables en la terapia intravenosa, permiten la administracion de volumenes variables de fluidos a traves de una via intravascular previamente habilitada en el paciente.</strong></p>', 1),
(7, 'Arreglar', '<p>dispositivo para administrar al paciente soluciones y medicamentos parenterales gota a gota, a chorro o intermitente por via venosa periferica o central por un tiempo determinado .</p>', 1),
(8, 'Analgésicos.', '<p>Un analgésico es un medicamento cuya función principal es la de<strong> calmar, aliviar o eliminar el dolor</strong>. Entre otros aspectos, ayuda a reducir o aliviar los dolores de cabeza, musculares, de origen artrítico y otros dolores o ataques relacionados.</p>', 1),
(9, 'Antidiarreicos y laxantes', '<p>Los medicamentos antidiarreicos son los<strong> tipos de medicamentos que detienen o retrasan la diarrea</strong>. Los medicamentos antidiarreicos solo alivian la frecuencia y los síntomas de urgencia de la diarrea, no la causa.</p>', 1),
(10, 'Antiinfecciosos', '<p>Los medicamentos antiinfecciosos son<strong> medicinas que funcionan para prevenir o tratar infecciones</strong>, incluyen medicamentos antibacterianos, antivirales, antifúngicos y antiparasitarios.</p>', 1),
(11, 'Antiinflamatorios', '<p>Definición Los medicamentos antiinflamatorios son, por definición,<strong> aquellos que se oponen a los procesos de la inflamación</strong>. Distinguimos los anti-inflamatorios esteroideos, derivados de la cortisona, y los antiinflamatorios no esteroideos que no la contienen. Tienen cualidades anti-inflamatorias y también analgésicas y antipiréticas.</p>', 1),
(12, 'Antipiréticos', '<p>Se denomina antipirético, antitérmico, antifebril, pastilla, jarabe y febrífugo a todo fármaco que hace disminuir la fiebre. Suelen ser medicamentos que tratan la fiebre de una forma sintomática, sin actuar sobre su causa.</p>', 1),
(13, 'Antitusivos y mucolíticos', '<p><strong>Son fármacos que se recetan para tratar de reducir la tos no productiva</strong>, es decir, que no libera mucosidad. Se debe tener sumo cuidado con su dosis, ya que algunos de ellos, como la codeína, producen adicción.</p>\r\n<p><strong>En cuanto a los mucolíticos, son medicamentos que se recomiendan cuando la mucosidad</strong> dificulta una respiración correcta. Sus efectos secundarios son menores, como cefaleas o reacciones alérgicas.</p>', 1),
(14, 'Antibióticos', '<p> Los antibióticos son sustancias utilizadas para impedir el desarrollo de <a href=\"https://salud.ccm.net/faq/8871-bacteria-patogena-definicion\">bacterias</a> en el cuerpo humano. Algunos antibióticos, como la penicilina, el primer antibiótico descubierto por Fleming en 1929, son históricamente naturales, pero ahora la mayoría son antibióticos sintéticos.</p>\r\n<p>El antibiótico actúa por mecanismos diferentes en función de su naturaleza y su objetivo es bloquear la proliferación de las bacterias inhibiendo alguno de los pasos de su desarrollo.Los antibióticos se prescriben en caso de <a href=\"https://salud.ccm.net/faq/7928-infeccion-definicion\">infecciones bacterianas</a> únicamente, y pueden utilizarse mas de uno para tratar algunas infecciones severas.</p>\r\n<p>Los antibióticos se deben prescribir de forma correcta, ya que las bacterias desarrollan mecanismos de <a href=\"https://salud.ccm.net/faq/3507-uso-incorrecto-de-los-antibioticos\">resistencia a los antibióticos</a> que reducen su eficacia.</p>', 1),
(15, 'Antisépticos y Desinfectantes', '<p>Los <strong>desinfectantes</strong> son sustancias que se emplean para destruir los microorganismos o inhibir su desarrollo, <strong>y</strong> que ejercen su acción sobre una superficie inerte u objeto inanimado. Los <strong>antisépticos</strong> son sustancias que se aplican sobre tejidos con vida, con el objeto de matar o impedir el desarrollo de los microorganismos.</p>', 1),
(16, 'Antiácidos', '<p><span xss=removed><span xss=removed>Estos fármacos tienen el objetivo de neutralizar, reducir y equilibrar el exceso de ácido que segrega el estómago para proporcionar un alivio de los síntomas de la acidez. </span><span xss=removed>Algunos antiácidos actúan en el estómago regulando su pH.</span></span></p>', 1),
(17, 'Antidepresivos', '<p>Un antidepresivo es un medicamento psicotrópico utilizado para tratar la depresión, que pueden aparecer en forma de uno o más episodios a lo largo de la vida, diversos trastornos psicológicos, ciertos desórdenes de la conducta alimentaria y alteraciones del control de los impulsos.</p>', 1),
(18, 'Anestésicos Generales', '<p><em><strong>Los</strong> <strong>anestésicos</strong> <strong>generales</strong> son un grupo de sustancias estructuralmente diferentes entre sí, pero que tienen en común la capacidad de inducir, un estado de comportamiento llamado <strong>anestesia</strong> general, que permite la realización de intervenciones quirúrgicas u otros procedimientos agresivos.</em></p>', 1),
(19, 'Anestésicos Locales', '<p><em></em></p>\r\n<p>Los <strong>anestésicos locales</strong> (AL), son un grupo heterogéneo de fármacos que bloquean los canales de sodio dependientes de voltaje, por lo tanto interrumpen el inicio y propagación de los impulsos nerviosos en los axones con el objetivo de suprimir la sensación. También pueden inhibir varios receptores, aumentar la liberación de glutamato y deprimir la actividad de algunas vías de señalización intracelular. Son universalmente utilizados por multitud de profesionales de la salud (anestesiólogos, cirujanos, enfermeros, odontólogos, podólogos, dermatólogos, médicos internistas, en veterinaria, etc.) a diario, son <a title=\"Fármaco\" href=\"https://es.wikipedia.org/wiki/Fármaco\">fármacos</a> que a concentraciones suficientes, evitan temporalmente la sensibilidad en el lugar de su administración. Su efecto impide de forma transitoria y perceptible, la conducción del impulso eléctrico por las membranas de los nervios y el músculo localizadas. Por tanto, también se bloquea la función motora, excepto en el músculo liso, debido a que la <a title=\"Oxitocina\" href=\"https://es.wikipedia.org/wiki/Oxitocina\">oxitocina</a> (hormona liberada por la hipófisis) lo continua estimulando.</p>\r\n<p>Muchos de los actuales anestésicos locales de uso común, son empleados en forma de cremas o aerosol (<a title=\"Lidocaína\" href=\"https://es.wikipedia.org/wiki/Lidocaína\">lidocaína</a>) o en pastillas bucales (<a title=\"Benzocaína\" href=\"https://es.wikipedia.org/wiki/Benzocaína\">benzocaína</a>).</p>\r\n<p></p>', 1),
(20, 'Diuréticos Antihipertensivos', '<p>Los diuréticos, como grupo terapéutico, tienen diversas indicaciones terapéuticas para las cuales han demostrado una gran eficacia. La comunidad médica está familiarizada con estos medicamentos y su elevada prescripción así lo demuestra. Sin embargo, debido a que se trata de un grupo con varios tipos, es importante siempre considerar la indicación precisa de cada compuesto, conocer su farmacología y posibles advertencias. En el caso de la hipertensión arterial, el desarrollo de nuevos medicamentos especializados no ha obviado la asociación que pueden tener estos compuestos con un diurético, fórmula que ha demostrado reiteradamente mejorar la el control y evolución clínica del paciente. La hidroclootiazida, del grupo de inhibidores del cotransportador sodiocloro (NCLC) es considerada uno de los mejores diuréticos, tanto como monoterapia como en combinación con otros antihipertensivos, aunque el clínico debe tener en mente sus indicaciones precisas.</p>\r\n<p>Palabras clave: diuréticos, tiacídicos, hipertensión arterial, hidroclorotiazida</p>\r\n<p> </p>', 1),
(21, 'Antivirales', '<p>Un <strong>antiviral</strong> o <strong>antivírico</strong> es un tipo de <a title=\"Fármaco\" href=\"https://es.wikipedia.org/wiki/Fármaco\">fármaco</a> usado para el tratamiento de infecciones producidas por <a title=\"Virus\" href=\"https://es.wikipedia.org/wiki/Virus\">virus</a>.<sup id=\"cite_ref-1\" class=\"reference separada\"><a href=\"https://es.wikipedia.org/wiki/Antiviral#cite_note-1\">1</a></sup>​ Tal como el <a title=\"Antibiótico\" href=\"https://es.wikipedia.org/wiki/Antibiótico\">antibiótico</a> (específico para <a title=\"Bacteria\" href=\"https://es.wikipedia.org/wiki/Bacteria\">bacterias</a>), existen antivirales específicos para distintos tipos de virus. No sin excepciones, son relativamente inocuos para el <a title=\"Huésped (biología)\" href=\"https://es.wikipedia.org/wiki/Huésped_(biología)\">huésped</a>, por lo que su aplicación es relativamente segura. Deben distinguirse de los <a class=\"mw-redirect\" title=\"Viricidas\" href=\"https://es.wikipedia.org/wiki/Viricidas\">viricidas</a>, que son compuestos químicos que destruyen las partículas víricas presentes en el ambiente.</p>', 1),
(22, 'Insumos', '<p>Poroductos Varios</p>', 1),
(23, 'Broncodilatador', '<p>Los broncodilatadores conocidos como agonistas beta-2 adrenérgicos <strong>actúan relajando el músculo liso bronquial y son medicamentos muy importantes en el tratamiento del asma bronquial</strong>. Pueden utilizarse tanto para los síntomas agudos de asma como en el tratamiento a largo plazo.</p>', 1),
(24, 'Antiarrítmicos', '<p><span xss=removed>Los </span><strong xss=removed>antiarrítmicos</strong><span xss=removed> clase II son betabloqueantes que bloquean los impulsos que pueden producir un ritmo cardíaco irregular y obstaculizan las influencias hormonales (p. ej. de la adrenalina) en las células del corazón. Al hacerlo, también reducen la presión arterial y la frecuencia cardíaca.</span></p>', 1),
(25, 'Agente expansor plasmático', '<p> La <strong>albúmina</strong> es un agente oncótico derivado del plasma que se emplea para uso a corto plazo en el mantenimiento del volumen intravascular en situaciones clínicas limitadas actuando como un expansor de volumen.</p>', 1),
(26, 'Agente Mucolítico', '<p><strong>sustancias que tienen la capacidad de destruir las distintas estructuras quimicofísicas de la secreción bronquial anormal</strong>, consiguiendo una disminución de la viscosidad y, de esta forma, una más fácil y pronta eliminación.</p>', 1),
(27, 'Alcaloide', '<p><strong>Coadyuvante de la anestesia</strong>, contrae la vasculatura cerebral, lo que se acompaña de un descenso del flujo sanguíneo cerebral y de la tensión de oxígeno del cerebro. Produce un efecto inotrópico positivo en el miocardio y un efecto cronotrópico positivo en el nodo sinoauricular. Indicada en fatiga o somnolencia.</p>', 1),
(28, 'Psicoestimulantes y Nootrópicos', '<p>La <strong>citicolina</strong>, conocida por sus nombres comerciales <strong>Kolnasi, Sentax, Somazina, Ceraxon</strong> y su nombre químico <em>citidina 5\'-difosfocolina</em> (en inglés <strong>cytidine diphosphate-choline</strong>, <strong>CDP-Choline</strong>) es un psicoestimulante, neuroprotector y <a class=\"mw-redirect\" title=\"Nootrópico\" href=\"https://es.wikipedia.org/wiki/Nootrópico\">nootrópico</a>. Químicamente es un intermediario en la síntesis de <a title=\"Fosfatidilcolina\" href=\"https://es.wikipedia.org/wiki/Fosfatidilcolina\">fosfatidilcolina</a> a partir de la <a title=\"Colina\" href=\"https://es.wikipedia.org/wiki/Colina\">colina</a>.</p>\r\n<p><strong>Se usa para el tratamiento de las alteraciones de la memoria y del comportamiento asociadas a:</strong> <strong>un accidente cerebrovascular</strong>, que es una interrupción del suministro de sangre en el cerebro por un coágulo o por rotura de un vaso sanguíneo, en fase aguda y subaguda.</p>', 1),
(30, 'Antibiótico Polipeptídico', '<p>También llamado polimixina E. <strong>Antibiótico polipeptídico bactericida que se une a lipopolisacáridos y fosfolípidos de la membrana celular externa de bacterias gramnegativas</strong>.</p>\r\n<p>La inyección de colistematato <strong>se utiliza para tratar ciertas infecciones ocasionadas por bacterias</strong>, incluso La inyección de colistematato pertenece a una clase de medicamentos llamados antibióticos. Funciona matando las bacterias.</p>', 1),
(32, 'Agente Antihemorrágico', '<p>El etamsilato es un agente antihemorrágico que se cree que actúa aumentando la resistencia en el endotelio de los capilares y promoviendo la adhesión plaquetaria.</p>\r\n<p>Prevención y tratamiento de las hemorragias derivadas de cirugía, así como de las relacionadas con las alteraciones capilares que provocan púrpuras secundarias a etiología infecciosa, medicamentosa o tóxica.</p>', 1),
(33, 'Cardiotónico (Digitálico)', '<p>La digoxina es un glucósido cardiotónico, usado como agente antiarrítmico empleado en la insuficiencia cardíaca, y utilizado en otros trastornos cardíacos como la fibrilación auricular.</p>\r\n<p>La digoxina <strong>se usa para tratar la insuficiencia y la frecuencia cardíaca anormal (arritmias)</strong>. Ayuda a que el corazón funcione mejor y a controlar su frecuencia cardíaca.</p>', 1),
(34, 'Analépticos Cardiorrespiratorios', '<p>La dobutamina es una amina simpaticomimética usada en el tratamiento de insuficiencia cardíaca y choque cardiogénico. Su mecanismo primario es la estimulación directa del receptor adrenérgico beta 1 del sistema nervioso simpático. Es análogo estructural al isoproterenol.</p>\r\n<p> Estimulante <strong>de</strong> receptores beta-1-adrenérgico, causando incremento <strong>de</strong> contractilidad y FC, con discreto efecto en los receptores beta-2 o alfa. Efecto inotrópico, vasodilatador y cronotrópico leve.</p>', 1),
(36, 'Antagonista Dopaminérgico ', '<p>Se conoce por domperidona a un fármaco bloqueante selectivo de los receptores dopaminérgicos, que se utiliza en los trastornos funcionales digestivos, como antiemético y en el estudio de los mecanismos dopaminérgicos.</p>\r\n<p>Es un antagonista dopaminérgico actualmente autorizado para el alivio de los síntomas de náuseas y vómitos (tanto en adultos como en niños) así como para el tratamiento de la sensación de plenitud epigástrica, malestar abdominal alto y regurgitación del contenido gástrico</p>', 1),
(37, ' Estimulantes Cardiacos', '<p>La etilefrina es un estimulante cardíaco que se utiliza como antihipotensivo. Es una amina simpaticomimética de la serie 3-hidroxi-feniletanolamina utilizada en el tratamiento de la hipotensión ortostática de origen neurológico, cardiovascular, endocrino o metabólico.</p>\r\n<p>La <em>etilefrina</em> es un fármaco relacionado estructuralmente con la adrenalina. Eleva la presión arterial y la actividad cardíaca, debido a su efecto </p>', 1),
(38, 'Farmalet', '<p>Farmalet</p>', 1),
(39, 'Anticonvulsivos.', '<p>La fenitoína, también llamada difenilhidantoína, ​ es un antiepiléptico de uso común. Es un compuesto aprobado por la FDA en 1953 para su uso en convulsiones y ansiedad.</p>\r\n<p>Se usa para controlar cierto tipo de convulsiones y para tratar y prevenir las convulsiones que pueden empezar durante o después de la cirugía de cerebro o del sistema nervioso. La fenitoína pertenece a una clase de medicamentos llamados <strong>anticonvulsivos</strong>.</p>', 1),
(40, ' Analgésico-Antiinflamatorio.', '<p>Patologías inflamatorio-dolorosas con componentes neuríticos. Compresiones radiculares y nerviosas (cervicobraquialgias, dorsalgias, lumbalgias, lumbociatalgias) Artrosis de columna, cadera, rodilla, etc. Artritis reumatoidea, psoriásica, gotosa.</p>', 1),
(41, 'Antipsicóticos', '<p>El haloperidol es un fármaco antipsicótico típico con acción farmacológica de tipo neuroléptico, ​ que forma parte de las butirofenonas. Se trata de uno de los primeros medicamentos que se usaron en el siglo XX para el tratamiento de esquizofrenia y otras enfermedades mentales. </p>\r\n<p><strong>Se usa para tratar trastornos psicóticos</strong> (afecciones mentales que dificultan distinguir entre las cosas o las ideas que son reales y las que son irreales).</p>', 1),
(42, 'Corticosteroides', '<p>La hidrocortisona, que se vende con varios nombres comerciales, es el nombre de la hormona cortisol cuando se suministra como medicamento.​ Los usos incluyen afecciones como insuficiencia adrenocortical, síndrome adrenogenital, calcio en sangre elevado, tiroiditis, artritis reumatoide, dermatitis, asma y EPOC.​</p>\r\n<p>Alivia la inflamación (hinchazón, calor, enrojecimiento y dolor), y se usa <strong>para</strong> tratar ciertas formas <strong>de</strong> artritis; y trastornos a la piel, sangre, riñón, ojos, a la tiroides y trastornos intestinales (por ejemplo, colitis); las alergias graves; y el asma.</p>', 1),
(43, 'Antibióticos de Carbapenem.', '<p>El <strong>imipenem</strong> pertenece a una clase de medicamentos llamados antibióticos de carbapenem. Funciona matando las bacterias. La <strong>cilastatina</strong> pertenece a una clase de medicamentos llamados inhibidores de la dehidropeptidasa. Funciona ayudando a que el <strong>imipenem</strong> se mantenga activo en el cuerpo durante un período más prolongado.</p>', 1),
(44, 'Agente de Contraste Radiopaco', '<p>Iopamidol es un <strong>agente de contraste radiopaco</strong>. Iopamidol contiene yodo, una sustancia que absorbe los rayos X. Los agentes de contraste radiopaco se utilizan para permitir que los vasos sanguíneos, órganos y otros tejidos no óseos se vean con más claridad en una tomografía o en otro examen radiológico (rayos X).</p>', 1),
(45, 'Antifibrinolítico', '<p>IndicacionesIPSILON es útil para mejorar la hemostasis cuando la fibrinólisis es un factor que contribuye a la hemorragia. En situaciones con riesgo de vida puede ser necesario realizar transfusiones de sangre entera, infusiones de fibrinógeno y adoptar otras medidas de emergencia. Las hemorragias fibrinolíticas frecuentemente pueden estar asociadas a complicaciones quirúrgicas como consecuencia de cirugía cardíaca (con o sin procedimientos de bypass) y shunt portocavo, trastornos hematológicos, tales como anemia aplásica, desprendimiento de la placenta, fibrosis hepática, enfermedades neoplásicas tales como carcinoma de próstata, pulmón, estómago y cuello uterino. La fibrinólisis urinaria, un fenómeno fisiológico generalmente normal, frecuentemente puede estar asociada a complicaciones que constituyen un riesgo de vida en pacientes que hubieran sufrido trauma, anoxia o shock severos. La sintomatología de estas complicaciones es la hematuria quirúrgica (después de prostatectomía y nefrectomía) o la hematuria no quirúrgica (que acompaña a enfermedades poliquísticas o neoplásicas del aparato genitourinario).</p>', 1),
(46, 'Antibiótico de Amplio Espectro', '<p>Meropenem es un antibiótico de amplio espectro, utilizado para tratar una gran variedad de infecciones, como meningitis y neumonía. Es un antibiótico betalactámico y pertenece al subgrupo de los carbapenems, al igual que imipenem y ertapenem.</p>\r\n<p>La inyección de <strong>meropenem</strong> se usa <strong>para</strong> tratar infecciones de la piel y abdominales (área del estómago) causadas por bacterias y meningitis (infección de las membranas que rodean el cerebro y la columna vertebral) en adultos y niños menores de 3 meses de edad.</p>', 1),
(47, 'Anticonceptivo Hormonal', '<p><strong>Mesigyna</strong> es un medicamento que sirve como <strong>anticonceptivo hormonal inyectable </strong>mensual para mujeres.</p>\r\n<p>Su fórmula esta hecha por dos hormonas diferentes la<strong> <a href=\"https://prixz.com/salud/noristerat-que-es-y-para-que-sirve/\">Noretisterona</a> </strong>(50.00 mg) y <strong><a href=\"https://prixz.com/salud/estradiol-que-es-y-para-que-sirve/\">Estradiol</a> </strong>(5.00 mg), ambas <strong>sirven para</strong> <strong>evitar el embarazo</strong>, que actúan inhibiendo la ovulación y ocasionando cambios en el moco cervical de tal forma que se vuelva más espeso, con el objetivo de que los espermatozoides no puedan moverse.</p>', 1),
(48, 'Esteroide Sintético', '<p><strong>Metilprednisolona</strong>, <a title=\"Esteroide\" href=\"https://es.wikipedia.org/wiki/Esteroide\">esteroide</a> sintético, del grupo de los <a title=\"Glucocorticoide\" href=\"https://es.wikipedia.org/wiki/Glucocorticoide\">glucocorticoides</a> que se utiliza en medicina por sus propiedades inmunosupresoras y anti-inflamatorias, por lo que su administración alivia la inflamación (<a title=\"Hinchazón\" href=\"https://es.wikipedia.org/wiki/Hinchazón\">hinchazón</a>, calor, enrojecimiento y dolor) y se usa para tratar ciertas formas de <a title=\"Artritis\" href=\"https://es.wikipedia.org/wiki/Artritis\">artritis</a>; trastornos de la <a title=\"Piel\" href=\"https://es.wikipedia.org/wiki/Piel\">piel</a>, la <a title=\"Sangre\" href=\"https://es.wikipedia.org/wiki/Sangre\">sangre</a>, el <a title=\"Riñón\" href=\"https://es.wikipedia.org/wiki/Riñón\">riñón</a>, los <a title=\"Ojo\" href=\"https://es.wikipedia.org/wiki/Ojo\">ojos</a>, la <a title=\"Glándula tiroides\" href=\"https://es.wikipedia.org/wiki/Glándula_tiroides\">tiroides</a> y los <a title=\"Intestino\" href=\"https://es.wikipedia.org/wiki/Intestino\">intestinos</a> (por ejemplo, <a title=\"Colitis\" href=\"https://es.wikipedia.org/wiki/Colitis\">colitis</a>); <a title=\"Alergia\" href=\"https://es.wikipedia.org/wiki/Alergia\">alergias</a> severas; y <a title=\"Asma\" href=\"https://es.wikipedia.org/wiki/Asma\">asma</a>.<sup id=\"cite_ref-1\" class=\"reference separada\"><a href=\"https://es.wikipedia.org/wiki/Metilprednisolona#cite_note-1\">1</a></sup>​ La metilprednisolona también se usa para tratar ciertos tipos de cáncer. Es molecularmente similar a una hormona natural producida por las glándulas suprarrenales, por lo que se indica en medicina para tratar los síntomas producidos por un brusco descenso de los niveles de corticoides en el organismo, por ejemplo en la <a title=\"Enfermedad de Addison\" href=\"https://es.wikipedia.org/wiki/Enfermedad_de_Addison\">enfermedad de Addison</a>.<sup id=\"cite_ref-2\" class=\"reference separada\"><a href=\"https://es.wikipedia.org/wiki/Metilprednisolona#cite_note-2\">2</a></sup>​</p>\r\n<p>La metilprednisolona también se utiliza en la <a title=\"Esclerosis múltiple\" href=\"https://es.wikipedia.org/wiki/Esclerosis_múltiple\">esclerosis múltiple</a> del tipo recurrente-remitente como tratamiento de choque ante la aparición de un nuevo brote.</p>\r\n<p>La metilprednisolona también se indica en ciertos casos de lesiones traumáticas de la <a title=\"Médula espinal\" href=\"https://es.wikipedia.org/wiki/Médula_espinal\">médula espinal</a>.<sup id=\"cite_ref-3\" class=\"reference separada\"><a href=\"https://es.wikipedia.org/wiki/Metilprednisolona#cite_note-3\">3</a></sup>​</p>', 1),
(49, 'Benzodiacepina', '<p>La inyección de midazolam <strong>se usa antes de los procedimientos médicos y cirugía para causar somnolencia, aliviar la ansiedady evitar cualquier recuerdo del evento</strong>. Algunas veces también se administra como parte de la anestesia durante la cirugía para producir pérdida del conocimiento.</p>', 1),
(50, ' Antagonista Opioide', '<p>La naloxona <strong>es un medicamento con el poder de salvar vidas que puede revertir una sobredosis de opioides, incluidos heroína, fentanilo y medicamentos opioides recetados</strong>. La naloxona es segura y fácil de usar, y con frecuencia se administra con un atomizador nasal.</p>', 1),
(51, 'Inhibidor Reversible de la Enzima Colinesterasa', '<p>La neostigmina es un <strong>inhibidor reversible de la enzima colinesterasa</strong>, que impide la destrucción de la acetilcolina y produce un efecto parasimpaticomimético indirecto mediante el aumento de la concentración de acetilcolina en el receptor.</p>', 1),
(53, 'Analgésico Antipirético', '<p>Novalgina es un medicamento que sirve como un <strong>analgésico y antitérmico</strong> que actúa reduciendo el dolor y la fiebre. Este medicamento tiene dipirona como su principio activo, que es ampliamente utilizado en las manifestaciones de dolor y fiebre.</p>', 1),
(54, 'Antagonistas Receptores de Serotonina 5-HT3.', '<p><strong>Ondansetrón</strong> inyectable se usa para prevenir las náuseas y los vómitos causados por la quimioterapia para tratar el cáncer y las cirugías. Pertenece a una clase de medicamentos llamado antagonistas del receptor serotonina 5-HT <sub>3</sub></p>', 1),
(55, 'Antibióticos de Penicilina.', '<p>La <strong>piperacilina</strong> se encuentra en una clase <strong>de</strong> medicamentos llamados antibióticos <strong>de</strong> penicilina. Funciona matando las bacterias <strong>que</strong> causan infección. El <strong>tazobactam</strong> pertenece a una clase llamada inhibidor <strong>de</strong> beta-lactamasa. Funciona al prevenir <strong>que</strong> las bacterias destruyan la <strong>piperacilina</strong>.</p>', 1),
(56, 'Anestésico General de Acción Corta', '<p>El propofol es un <strong>agente anestésico de acción corta con un comienzo de acción rápido de aproximadamente 30 segundos y una recuperación de la anestesia normalmente también rápida</strong>.</p>', 1),
(57, 'Opiáceos', '<p>El <strong>remifentanilo</strong> es un <a title=\"Opioide\" href=\"https://es.wikipedia.org/wiki/Opioide\">opioide</a> <a title=\"Agonista\" href=\"https://es.wikipedia.org/wiki/Agonista\">agonista</a> puro de los receptores μ de la <a title=\"Morfina\" href=\"https://es.wikipedia.org/wiki/Morfina\">morfina</a>. Es potente, de acción ultracorta y no acumulable, que se emplea durante las intervenciones quirúrgicas y procedimientos dolorosos para suministrar analgesia y sedación.</p>', 1),
(58, 'Anestésico Para Inhalación', '<p>El sevoflurano <strong>es un anestésico general que se utiliza en cirugía tanto en adultos como en niños</strong>. Es un anestésico de inhalación (se administra en forma de vapor para inhalación). La inspiración de este vapor produce un sueño profundo e indoloro.</p>', 1),
(59, 'Agonistas Opiáceos Analgésico De Acción Central', '<p>El tramadol <strong>se utiliza para aliviar el dolor de moderado a moderadamente intenso</strong>. Las tabletas de acción prolongada y las cápsulas de tramadol solo las usan las personas que se espera necesiten el medicamento para aliviar dolor todo el tiempo.</p>', 1),
(60, 'Antibióticos Glicopéptidos.', '<p>La vancomicina es un glucopéptido de estructura compleja que se sintetiza de modo natural por Nocardia orientalis. Ejerce su efecto bactericida inhibiendo la síntesis de la pared celular bacteriana, ya que posee gran afinidad por los precursores de esta estructura</p>\r\n<p>La vancomicina pertenece a una clase de medicamentos llamados <strong>antibióticos glicopéptidos</strong>. Su acción consiste en eliminar las bacterias en los intestinos. La vancomicina no elimina las bacterias ni trata las infecciones en ninguna otra parte del cuerpo cuando se toma por vía oral.</p>', 1),
(61, 'Soluciones Intravenosas Para Nutrición Parenteral ', '<p>La dextrosa <strong>se administra para prevenir la hipoglucemia</strong>, mientras que la insulina trata el potasio elevado. Las personas con diabetes o hipoglucemia (azúcar en sangre crónicamente baja) pueden llevar consigo gel o tabletas de dextrosa en caso de que su nivel de azúcar en sangre sea demasiado bajo.</p>', 1),
(62, 'Agentes Solventes y Diluyentes', '<p>Suero Fisiológico Vitulia <strong>se utiliza para reemplazar el agua y las sales de sodio y cloruro que pueden llegar a ser bajos como consecuencia de diferentes alteraciones o trastornos</strong>. También se utiliza como solución de transporte de otros medicamentos compatibles.</p>', 1),
(63, 'Corticoesteroides', '<p>La betametasona es un esteroide del grupo de los corticoesteroides que se utiliza en medicina por sus propiedades inmunosupresoras y antiinflamatorias. A diferencia de otros fármacos con estos efectos, la betametasona no causa retención de agua.</p>', 1),
(64, 'Antibióticos Fluoroquinolonas', '<p><strong>ciprofloxacino</strong> cinfa se utiliza en adultos para tratar las siguientes infecciones bacterianas: infecciones de las vías respiratorias. infecciones del oído o sinusales de larga duración o recurrentes. infecciones del tracto urinario.</p>', 1),
(65, 'Antibióticos De Cefalosporina', '<p>La inyección <strong>de cefazolina</strong> se utiliza <strong>para</strong> tratar ciertas infecciones ocasionadas por bacterias, incluso la piel, huesos, articulaciones, genitales, sangre, válvula del corazón, tracto del sistema respiratorio (incluyendo la neumonía), tracto biliar, e infecciones del tracto urinario.</p>', 1),
(67, 'Antibiótico Del Grupo de Los Aminoglucósidos', '<p>La amikacina es un antibiótico del grupo de los aminoglucósidos que se usa en el tratamiento de diferentes infecciones bacterianas.​ Esto incluye infecciones de las articulaciones, infecciones intraabdominales, meningitis, neumonía, sepsis e infecciones del tracto urinario.​</p>', 1),
(68, ' Psicoestimulantes y Nootrópicos', '<p>Los fármacos potenciadores del rendimiento, también conocidos como <strong>nootrópicos</strong>, como potenciadores cognitivos o como drogas inteligentes, son fármacos que supuestamente incrementan ciertas funciones mentales humanas como la memoria, la capacidad de concentración, el aprendizaje, la creatividad, la motivación</p>', 1),
(69, 'Antibióticos de Lincomicina.', '<p><strong>Antibiótico natural del grupo de las lincosamidas extraído del hongo Streptomyces lincolnensis</strong>. El mecanismo de acción se une a la subunidad 50S ribosomal de las bacterias inhibiendo la síntesis de proteínas.</p>', 1),
(71, 'Antibiótico Polipeptídico Bactericida', '<p>Los polipéptidos <strong>son antibióticos bactericidas producidos por diferentes cepas de Bacillus polymyxa (B.</strong> <strong>aerosporus), que actúan destruyendo la membrana celular bacteriana</strong>. La polimixina B y la colistina tienen una actividad similar, restringida a las bacterias gramnegativas, incluyendo Enterobacter,</p>', 1),
(72, 'Hemostático Sintético, Antihemorrágico y Angioprot', '<p>El etamsilato es un agente antihemorrágico que se cree que actúa aumentando la resistencia en el endotelio de los capilares y promoviendo la adhesión plaquetaria</p>', 1),
(73, 'Hemostático Sintético, Antihemorrágico y Angioprot', '<p>  <strong>Prevención y tratamiento de hemorragias capilares de cualquier origen o localización</strong>: hematuria, hematemesis, melena, epistaxis, gingivorragia.</p>', 1),
(74, 'Glucósidos de Digital', '<p>La digoxina <strong>se usa para tratar la insuficiencia y la frecuencia cardíaca anormal (arritmias)</strong>. Ayuda a que el corazón funcione mejor y a controlar su frecuencia cardíaca.</p>\r\n<p>La digoxina es un glucósido cardiotónico, usado como agente antiarrítmico empleado en la insuficiencia cardíaca, y utilizado en otros trastornos cardíacos como la fibrilación auricular. </p>', 1),
(76, 'Analgésico. Antiinflamatorio', '<p><strong>Antiinflamatorio no esteroideo, antipirético, con efecto analgésico potente comparable a opioides</strong>. Inhibe la síntesis de prostaglandinas a nivel periférico mediante el bloqueo de la enzima ciclooxigenasa. Dolor agudo moderado a severo. Procesos inflamatorios osteoarticulares, artritis.</p>', 1),
(78, 'Antibiótico Polimixina', '<p>La colistina es un antibiótico polimixina producido por ciertas cepas de la bacteria Paenibacillus polymyxa var. colistinus. La colistina es una mezcla de polipéptido cíclico colistin A y B. La colistina es efectiva contra todos los bacilos Gram-negativos y es usada como antibiótico polipéptido.</p>', 1),
(79, 'Estimulantes Cardiacos', '<p>La etilefrina es un estimulante cardíaco que se utiliza como antihipotensivo. Es una amina simpaticomimética de la serie 3-hidroxi-feniletanolamina utilizada en el tratamiento de la hipotensión ortostática de origen neurológico, cardiovascular, endocrino o metabólico.</p>', 1),
(80, 'Antiinflamatorios Con Corticoides', '<p>Patologías inflamatorio-dolorosas con componentes neuríticos. Compresiones radiculares y nerviosas (cervicobraquialgias, dorsalgias, lumbalgias, lumbociatalgias) Artrosis de columna, cadera, rodilla, etc. Artritis reumatoidea, psoriásica, gotosa.</p>', 1),
(81, 'Medios de Contraste Para Rayos X de Baja Osmolarid', '<p>Ultravist pertenece al <em>grupo</em> de medicamentos denominados medios de contraste para rayos X de baja osmolaridad, hidrosolubles y nefrotrópicos.</p>', 1),
(82, 'Medios de Contraste Para Rayos X de Baja Osmolarid', '<p>Medios de Contraste Para Rayos X de Baja Osmolarid</p>', 1),
(84, 'Inhibidor de la Fibrinólisis', '<p>El ácido aminocaproico (ácido 6-aminohexanoico) <strong>es un inhibidor de la fibrinólisis que se utiliza para controlar la hemostasia cuando la fibrinólisis contribuye al sangrado</strong>. En situaciones potencialmente mortales, puede ser necesaria la transfusión de hemoderivados adecuados u otras medidas de emergencia.</p>', 1),
(85, 'Inyección Anticonceptiva', '<p><strong>Mesigyna</strong> es una inyección <strong>anticonceptiva</strong> que protege contra el embarazo principalmente al inhibir la ovulación y ocasionar cambios en el moco cervical. Este <strong>anticonceptivo</strong> inyectable tiene un efecto que se ejerce sobre el endometrio, similar al de los <strong>anticonceptivos</strong> orales combinados.</p>', 1),
(87, 'Corticosteroide', '<p>Los <em>corticosteroides</em> se utilizan para tratar la artritis reumatoide, la enfermedad intestinal inflamatoria, el asma, las alergias y muchas otras afecciones.</p>', 1),
(88, 'Benzodiazepinas', '<p>Las benzodiazepinas son medicamentos psicotrópicos con efectos sedantes, hipnóticos, ansiolíticos, anticonvulsivos, amnésicos y miorrelajantes.</p>', 1),
(89, 'Antagonistas de Opiáceos', '<p><strong>La naloxona</strong> , que se vende bajo las marcas <strong>Narcan</strong> (en mayúsculas) entre otras, es un <a title=\"Medicamento\" href=\"https://en.wikipedia.org/wiki/Medication\">medicamento</a> que se usa para <a title=\"Antagonista del receptor\" href=\"https://en.wikipedia.org/wiki/Receptor_antagonist\">revertir o reducir</a> los efectos de los <a class=\"mw-redirect\" title=\"opioides\" href=\"https://en.wikipedia.org/wiki/Opioids\">opioides</a> . <sup id=\"cite_ref-AHFS2015_10-3\" class=\"reference\"><a href=\"https://en.wikipedia.org/wiki/Naloxone#cite_note-AHFS2015-10\">[10]</a></sup> Se usa comúnmente para contrarrestar la disminución de la respiración en caso de <a title=\"Sobredosis de opioides\" href=\"https://en.wikipedia.org/wiki/Opioid_overdose\">sobredosis de opioides</a> . <sup id=\"cite_ref-AHFS2015_10-4\" class=\"reference\"><a href=\"https://en.wikipedia.org/wiki/Naloxone#cite_note-AHFS2015-10\">[10]</a></sup> Los efectos comienzan en dos minutos cuando se administra <a title=\"Terapia intravenosa\" href=\"https://en.wikipedia.org/wiki/Intravenous_therapy\">por vía intravenosa</a> y en cinco minutos cuando <a title=\"Inyección intramuscular\" href=\"https://en.wikipedia.org/wiki/Intramuscular_injection\">se inyecta en un músculo</a> . <sup id=\"cite_ref-AHFS2015_10-5\" class=\"reference\"><a href=\"https://en.wikipedia.org/wiki/Naloxone#cite_note-AHFS2015-10\">[10]</a></sup> El medicamento también se puede administrar <a title=\"administración nasal\" href=\"https://en.wikipedia.org/wiki/Nasal_administration\">rociándolo en la nariz de una persona</a> . <sup id=\"cite_ref-11\" class=\"reference\"><a href=\"https://en.wikipedia.org/wiki/Naloxone#cite_note-11\">[11]</a></sup> La naloxona suele bloquear los efectos de los opioides durante 30 a 90 minutos. <sup id=\"cite_ref-12\" class=\"reference\"><a href=\"https://en.wikipedia.org/wiki/Naloxone#cite_note-12\">[12]</a></sup>Es posible que se requieran dosis múltiples, ya que la duración de la acción de algunos opioides es mayor que la de la naloxona.</p>', 1),
(90, 'Inhibidor Reversible de la Enzima Colinesterasa', '<p>La <strong>neostigmina</strong> es un inhibidor reversible de la enzima colinesterasa, que impide la destrucción de la acetilcolina y produce un efecto parasimpaticomimético indirecto mediante el aumento de la concentración de acetilcolina en el receptor. Es de duración corta.</p>', 1),
(91, 'Vasodilatadores.', '<p>La nitroglicerina se encuentra en una clase de medicamentos llamados vasodilatadores. <strong>Funciona al relajar los vasos sanguíneos para que el corazón no trabaje tan duro y por consiguiente no necesite tanto oxígeno</strong>.</p>', 1),
(95, 'Agentes Adrenérgicos y Dopaminérgicos”', '<p> La noradrenalina es una catecolamina con múltiples funciones fisiológicas y homeostáticas que puede actuar como hormona y como neurotransmisor.​ Las áreas del cuerpo que producen o se ven afectadas por la norepinefrina son descritas como noradrenérgicas</p>', 1),
(96, 'Antiinflamatorio No Esteroideo', '<div class=\"wWOJcd\" tabindex=\"0\">\r\n<div id=\"exacc_XZvGY8GjK5Da5OUP3IGc4Ac_1\" class=\"iDjcJe IX9Lgd wwB5gf\">Novalgina <strong>es un medicamento que sirve como un analgésico y antitérmico que actúa reduciendo el dolor y la fiebre</strong>. Este medicamento tiene dipirona como su principio activo, que es ampliamente utilizado en las manifestaciones de dolor y fiebre.</div>\r\n</div>', 1),
(100, 'Penicilina', '<p>La <strong>piperacilina</strong> se encuentra en una clase <strong>de</strong> medicamentos llamados antibióticos <strong>de</strong> penicilina. Funciona matando las bacterias <strong>que</strong> causan infección. El <strong>tazobactam</strong> pertenece a una clase llamada inhibidor <strong>de</strong> beta-lactamasa. Funciona al prevenir <strong>que</strong> las bacterias destruyan la <strong>piperacilina</strong>.</p>', 1),
(102, 'Opioide Sintético Agonista Selectivo De Los Recept', '<p>El remifentanilo es un opioide agonista puro de los receptores μ de la morfina. Es potente, de acción ultracorta y no acumulable, que se emplea durante las intervenciones quirúrgicas y procedimientos dolorosos para suministrar analgesia y sedación</p>', 1),
(103, 'Anestésico Inhalatorio', '<p>Es un agente anestésico líquido no inflamable que se administra por vaporización, y químicamente es un derivado fluorinado del éter metil isopropilo, que <strong>induce una pérdida de conciencia suave y rápida durante la inducción inhalatoria y una rápida recuperación después de su discontinuación</strong>.</p>', 1),
(104, 'Agonistas Opiáceos', '<p>Los fármacos agonistas puros son los siguientes: <strong>morfina, metadona, meperidina, tramadol, codeína, dihidrocodeína y dextropropoxifeno</strong>. Son fármacos con una baja actividad intrínseca (eficacia), de forma que su curva dosis-respuesta presenta un efecto techo menor que el máximo efecto produci do por un agonista puro.</p>', 1),
(105, 'Antibióticos Glicopéptidos.', '<p>Los glucopéptidos <strong>son antibióticos bacte- ricidas de espectro estrecho activos sólo frente a gérmenes grampositivos que ac- túan inhibiendo la síntesis de la pared bac- teriana</strong>. El primero que se introdujo para uso clínico fue vancomicina, en 1956, por su actividad contra Staphylococcus aureus resistente a penicilina.</p>', 1),
(107, 'Promotor Diuresis', '<div class=\"d9FyLd\">Qué es <strong>Suero</strong> Glucosado Vitulia <strong>5</strong>% y <strong>para</strong> qué se utiliza</div>\r\n<p><span class=\"hgKElc\"><strong>para</strong> el tratamiento de la pérdida de agua (deshidratación hipertónica) por vómitos, diarrea. como aporte de energía en nutrición parenteral cuando la toma de alimentos por la boca está limitada.</span></p>', 1),
(108, 'Suero', '<div class=\"d9FyLd\">Qué es <strong>Suero</strong> Glucosado Vitulia <strong>5</strong>% y <strong>para</strong> qué se utiliza</div>\r\n<p><span class=\"hgKElc\"><strong>para</strong> el tratamiento de la pérdida de agua (deshidratación hipertónica) por vómitos, diarrea. como aporte de energía en nutrición parenteral cuando la toma de alimentos por la boca está limitada.</span></p>', 1),
(109, 'Glucosado', '<div class=\"d9FyLd\">Qué es <strong>Suero</strong> Glucosado Vitulia <strong>5</strong>% y <strong>para</strong> qué se utiliza</div>\r\n<p><span class=\"hgKElc\"><strong>para</strong> el tratamiento de la pérdida de agua (deshidratación hipertónica) por vómitos, diarrea. como aporte de energía en nutrición parenteral cuando la toma de alimentos por la boca está limitada.</span></p>', 1),
(110, 'Algodón', '<p><strong>DESCRIPCIÓN</strong>. <strong>Algodón</strong> hidrófilo de color blanco (sin blanqueadores ópticos), sin ningún tipo de impurezas. Suave al tacto. Homogéneo a la vista, ideal para uso hospitalario y medico por su gran capacidad de absorción.</p>', 1),
(111, 'Suturas Quirúrgicas', '<p>Sutura prolene 3/0 ref:w8549 caja 12 uds <strong>para aproximación y/o ligadura de tejidos, incluyendo uso en procedimientos cardiovasculares, oftálmicos y neurológicos</strong>. Sutura no absorbible de polipropileno Prolene. Tipo: Monofilamento, de color azul.</p>', 1),
(112, 'Tubo Endotraqueal', '<p>La intubación endotraqueal se realiza para: <strong>Mantener la vía respiratoria abierta con el fin de suministrar oxígeno, medicamento o anestesia</strong>. Apoyar la respiración en ciertas enfermedades, tales como neumonía, enfisema, insuficiencia cardíaca, colapso pulmonar o traumatismo grave.</p>', 1),
(113, 'Electrodos', '<p> En el campo de la medicina, <strong>un dispositivo como una placa metálica o una aguja pequeña que conduce la electricidad desde un instrumento hasta un paciente sometido a un tratamiento o una operación quirúrgica</strong>.</p>', 1),
(115, 'Bolsa Colectora ', '<p>La bolsa recolectora de orina, o el sondaje vesical, se define como una <strong>técnica que consiste en la introducción de una sonda a través del meato uretral y hasta la vejiga, con el objetivo de establecer una vía de drenaje que expulse la orina</strong>.</p>', 1),
(116, 'Venda de Gasa', '<p>Las vendas de gasa <strong>se utiliza para envolver y sujetar apósitos y férulas que cubran heridas</strong>; también sirve para inmoviliza zonas lesionadas, limpiar proteger heridas de la contaminación por su alta absorción y evitar propagación de infecciones. En quirófano se utiliza para lavado pre-quirúrgico.</p>', 1),
(117, 'Mariposas Venoflex #21', '<p>Las agujas de acero dotadas de aletas venoflex (<strong>mariposas</strong>), se utilizan para canalizar venas, pero por períodos cortos de tiempo.</p>', 1),
(118, 'Anestésico Local', '<p>La Lidocaína Clorhidrato 2% Fresenius Kabi <strong>se utiliza para proporcionar anestesia mediante inyección local alrededor de los nervios o lugares donde se realizarán procedimientos quirúrgicos</strong>.</p>', 1),
(119, 'Opiode', '<p>El fentanilo <strong>es un opioide sintético que es hasta 50 veces más fuerte que la heroína y 100 veces más fuerte que la morfina</strong>. Es un importante factor contribuyente a las sobredosis mortales y no mortales en los EE. UU. Hay dos tipos de fentanilo: el fentanilo farmacéutico y el fentanilo fabricado ilícitamente.</p>', 1),
(120, 'Antibacteriano', '<p>Un antimicrobiano es un agente que mata microorganismos o detiene su crecimiento.​ Los medicamentos antimicrobianos se pueden agrupar de acuerdo con los microorganismos contra los que actúan principalmente. Por ejemplo, los antibióticos se usan contra las bacterias y los antifúngicos contra los hongos.</p>', 1),
(121, 'Antibacteriano', '<p>Un antimicrobiano es un agente que mata microorganismos o detiene su crecimiento.​ Los medicamentos antimicrobianos se pueden agrupar de acuerdo con los microorganismos contra los que actúan principalmente. Por ejemplo, los antibióticos se usan contra las bacterias y los antifúngicos contra los hongos.</p>', 1),
(122, 'Antioxidante', '<div class=\"wWOJcd\" tabindex=\"0\">\r\n<div id=\"exacc_FPLPY7-5CM_Q5OUPhM6_sAo_7\" class=\"iDjcJe IX9Lgd wwB5gf\">El ácido ascórbico pertenece a una <strong>clase de medicamentos</strong> llamados antioxidantes. El cuerpo lo necesita para ayudar a la cicatrización de las heridas, mejorar la absorción de hierro de los alimentos vegetales y apoyar el sistema inmunológico.</div>\r\n</div>', 1),
(123, 'Suero  Hidroelectrolítico', '<div class=\"wWOJcd\" tabindex=\"0\">\r\n<div id=\"exacc_rSPQY8aZNYWa0AbcjrGYCA_3\" class=\"iDjcJe IX9Lgd wwB5gf\">¿Qué es Ringer lactato y para qué sirve?</div>\r\n<div class=\"YsGUOb\"> </div>\r\n<div class=\"r21Kzd\" data-hveid=\"CBcQAQ\" data-ved=\"2ahUKEwiGpK-j6-D8AhUFDdQKHVxHDIMQuk56BAgXEAE\"> </div>\r\n</div>\r\n<div id=\"exacc_rSPQY8aZNYWa0AbcjrGYCA_4\" class=\"MBtdbb\" data-ved=\"2ahUKEwiGpK-j6-D8AhUFDdQKHVxHDIMQ7NUEegQIFxAD\">\r\n<div class=\"ymu2Hb\">\r\n<div id=\"_rSPQY8aZNYWa0AbcjrGYCA_38\" class=\"t0bRye r2fjmd\" data-hveid=\"CBcQBA\" data-ved=\"2ahUKEwiGpK-j6-D8AhUFDdQKHVxHDIMQu04oAHoECBcQBA\">\r\n<div id=\"rSPQY8aZNYWa0AbcjrGYCA__20\">\r\n<div class=\"wDYxhc\" data-md=\"61\">\r\n<div class=\"LGOjhe\" data-attrid=\"wa:/description\" data-hveid=\"CBIQAA\"><span class=\"ILfuVd\" lang=\"es\"><span class=\"hgKElc\">Indicado para la rehidratación y restauración del equilibrio hidroelectrolítico, cuando hay pérdida de líquidos e iones cloruro, sodio, potasio y calcio y para la prevención y el tratamiento de la acidosis metabólica.</span></span></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 1),
(124, 'Anticonceptivos', '<p><strong>Es un contraceptivo que contiene cobre en el cuerpo del DIU</strong>, esta formado por una T flexible de polietileno contiene hilo de cobre en el centro y dos hilos blancos de polietileno que sirven para su retiro.</p>', 1),
(125, 'Antiacidos antiflatulentos antiulcerosos', '<div class=\"wWOJcd\" tabindex=\"0\">\r\n<div id=\"exacc_YDDRY-e6KorD5OUP7Na-sAk_3\" class=\"iDjcJe IX9Lgd wwB5gf\">¿Qué es el Diposan y para qué sirve?</div>\r\n<div class=\"YsGUOb\"> </div>\r\n<div class=\"r21Kzd\" data-hveid=\"CBkQAQ\" data-ved=\"2ahUKEwjn6r3D6-L8AhWKIbkGHWyrD5YQuk56BAgZEAE\"> </div>\r\n</div>\r\n<div id=\"exacc_YDDRY-e6KorD5OUP7Na-sAk_4\" class=\"MBtdbb\" data-ved=\"2ahUKEwjn6r3D6-L8AhWKIbkGHWyrD5YQ7NUEegQIGRAD\">\r\n<div class=\"ymu2Hb\">\r\n<div id=\"_YDDRY-e6KorD5OUP7Na-sAk_37\" class=\"t0bRye r2fjmd\" data-hveid=\"CBkQBA\" data-ved=\"2ahUKEwjn6r3D6-L8AhWKIbkGHWyrD5YQu04oAHoECBkQBA\">\r\n<div id=\"YDDRY-e6KorD5OUP7Na-sAk__12\">\r\n<div class=\"wDYxhc\" data-md=\"61\">\r\n<div class=\"LGOjhe\" data-attrid=\"wa:/description\" data-hveid=\"CBUQAA\"><span class=\"ILfuVd\" lang=\"es\"><span class=\"hgKElc\">Anti-flatulento <strong>que</strong> tiene propiedad de producir la eliminación de las burbujas gaseosas por fermentaciones y putrefacciones gastrointestinales u otras causas.</span></span></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 1),
(126, 'Antibióticos De Cefalosporina.', '<p>Ceftriaxona <strong>es un antibiótico para adultos y niños</strong> (incluidos los bebés recién nacidos). Produce su efecto eliminando las bacterias causantes de infecciones. Pertenece a un grupo de medicamentos llamados cefalosporinas.</p>', 1),
(127, 'Antagonistas De Los Receptores H2 De La Histamina.', '<p>Los antagonistas de los receptores H2 <strong>son medicamentos que ayudan a disminuir el ácido gástrico</strong>. La sobredosis de antagonistas de los receptores H2 ocurre cuando alguien toma una cantidad mayor a la normal o recomendada de este medicamento. Esto puede suceder de forma accidental o intencional.</p>', 1),
(128, 'Ortopramidas.', '<p>LAS ORTOPRAMIDAS, DE LAS QUE METOCLOPRAMIDA, SULPIRIDA Y CLEBOPRIDA SON LAS MAS CONOCIDAS, <strong>SE UTILIZAN PARA EL TRATAMIENTO DE CIERTOS DESORDENES DEL TRACTO GASTROINTESTINAL</strong>, SI BIEN ADEMAS PRESENTAN UN PERFIL PSICOFARMACOLOGICO QUE SUGIERE SU INDICACION EN LA TERAPIA DE ALGUNAS ENFERMEDADES DE ORIGEN CENTRAL.</p>', 1),
(129, 'Alcaloide Derivado Del Ergot', '<p>La ergonovina, también conocida como ergometrina, es un <strong>alcaloide derivado del ergot</strong> que se obtiene del cornezuelo del centeno con propiedades oxitócicas poderosas, por lo que aumenta de manera notable la actividad motora del útero.</p>', 1),
(130, 'Antianémicos', '<p><strong>Mecanismo de acción</strong>: Todos los principios activos presentan el mismo <strong>mecanismo de acción</strong> son <strong>antianémicos</strong> que contienen hierro II. El hierro interviene en la síntesis de hemoglobina presente en los glóbulos rojos.</p>', 1),
(131, 'Vitaminas', '<p>Estas vitaminas <strong>ayudan al proceso que hace su cuerpo para obtener energía de la comida que usted consume.</strong> <strong>También ayudan a formar glóbulos rojos</strong>. Usted puede obtener vitaminas B en las proteínas como pescado, pollo, carne de res, huevos y productos lácteos</p>', 1),
(132, 'Antiinflamatorios Sin Esteroides', '<p>Ketorolaco se usa para aliviar el dolor moderadamente fuerte, por lo general después de una operación quirúrgica. Pertenece a una clase de medicamentos llamados <strong>antiinflamatorios sin esteroides</strong>.</p>', 1),
(133, 'Drenaje De Succión', '<p>El <strong>Hemosuctor</strong> premium es un evacuador descartable de fluidos acumulados en heridas cerradas.</p>', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ha_death`
--

CREATE TABLE `ha_death` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `patient_id` varchar(30) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ha_investigation`
--

CREATE TABLE `ha_investigation` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `patient_id` varchar(30) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ha_medicine`
--

CREATE TABLE `ha_medicine` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(6) NOT NULL,
  `price` float NOT NULL,
  `manufactured_by` varchar(255) NOT NULL,
  `create_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ha_medicine`
--

INSERT INTO `ha_medicine` (`id`, `code`, `name`, `category_id`, `description`, `quantity`, `price`, `manufactured_by`, `create_date`, `status`) VALUES
(1, NULL, 'Injection SR-12', 2, '<p>rter</p>', 289, 150, 'square', '2020-07-16', 1),
(4, '154', 'Caja Paracetamol Con 10 unidades123', 1, '<p>Medicacion para el dolor</p>', -74, 20, '', '2023-01-30', 1),
(5, NULL, 'Paracetamol Und. ', 1, '<p>MEdicamento</p>', 28, 2, 'INTI', '2022-04-19', 1),
(10, '75', 'Diclofenaco 75mg Amp.', 96, '<p>DICLOFENACO s&oacute;dico es un antiinflamatorio que posee actividades anal&shy;g&eacute;sicas y antipir&eacute;ticas y est&aacute; indicado por v&iacute;a oral e intramuscular para el tratamiento de enfermedades reum&aacute;ticas agudas, artritis reu&shy;matoidea, es&shy;pon&shy;dilitis anquilosante, artrosis, lumbalgia, gota en fase aguda, inflamaci&oacute;n postraum&aacute;tica y postoperatoria, c&oacute;lico renal y biliar, migra&ntilde;a aguda, y como profilaxis para dolor postoperatorio y disme&shy;norrea.</p>', 1, 0, 'Betancourt', '2023-01-27', 1),
(12, NULL, 'Microgotero de 150 ml', 5, '<p>dispositivo para administrar al paciente soluciones y medicamentos parenterales gota a gota, a chorro o intermitente por via venosa periferica o central por un tiempo determinado .</p>', 397, 12, '', '2022-08-04', 1),
(13, NULL, 'equipo de suero', 7, '<h2>dispositivo para administrar al paciente soluciones y&nbsp; medicamentos parenterales gota a gota, a chorro o intermitente por via venosa periferica o central por un tiempo determinado .</h2>', 1600, 5, '', '2022-08-04', 1),
(14, '060102005', 'Guantes Quirúrgicos # 6', 22, '<p>Guantes Quir&uacute;rgicos # 6</p>', 100, 4, 'Intermedical', '2023-01-25', 1),
(15, '060102002', 'Guantes Quirúrgicos # 7', 22, '<p>Guantes Quir&uacute;rgicos # 7</p>', 100, 4, 'Intermedical', '2023-01-25', 1),
(16, '060102003', 'Guantes Quirúrgicos # 7.5', 22, '<p>Guantes Quir&uacute;rgicos # 7.5</p>', 100, 4, 'Intermedical', '2023-01-25', 1),
(17, '060102004', 'Guantes Quirúrgicos # 8', 22, '<p>Guantes Quir&uacute;rgicos # 8</p>', 131, 4, 'Intermedical', '2023-01-25', 1),
(18, '020307032', 'Jeringa 5 ml', 22, '<p>Jeringa 5 ml</p>', 622, 1.5, 'Intermedical', '2023-01-25', 1),
(19, '020307025', 'Jeringa 20 ml', 22, '<p>Jeringa 20 ml</p>', 177, 1.5, 'Intermedical', '2023-01-25', 1),
(20, '990201001', 'Bránula # 18', 22, '<p>Br&aacute;nula # 18</p>', 245, 4.99, 'Intermedical', '2023-01-25', 1),
(21, '020303001', 'Bránula # 20', 22, '<p>Br&aacute;nula # 20</p>', 206, 4.99, 'Intermedical', '2023-01-25', 1),
(23, '020303005', 'Bránula # 24', 22, '<p>Br&aacute;nula # 24</p>', 251, 4.99, 'Intermedical', '2023-01-25', 1),
(25, NULL, 'teste', 1, 'teste', 0, 100, 'teste', '2023-01-12', 1),
(29, '2', 'Cafeína 25% Ampolla IV.', 27, '<p><strong>Coadyuvante de la anestesia</strong>, contrae la vasculatura cerebral, lo que se acompa&ntilde;a de un descenso del flujo sangu&iacute;neo cerebral y de la tensi&oacute;n de ox&iacute;geno del cerebro. Produce un efecto inotr&oacute;pico positivo en el miocardio y un efecto cronotr&oacute;pico positivo en el nodo sinoauricular. Indicada en fatiga o somnolencia.</p>', 10, 9.1, 'V&C MEDICAMENTOS', '2023-01-13', 1),
(30, '3', 'Ceftazídima 1 gr', 14, '<p>&nbsp;Los antibi&oacute;ticos&nbsp;<strong>son medicamentos que combaten infecciones causadas por bacterias en los seres humanos y los animales ya sea matando las bacterias o dificultando su crecimiento y multiplicaci&oacute;n</strong>.</p>', 10, 20, 'V&C MEDICAMENTOS', '2023-01-13', 1),
(31, '1201', 'Amiodarona Ampolla ', 24, 'La amiodarona es un agente antiarrítmico usado en varios tipos de taquiarritmias tanto ventriculares como supraventriculares. Fue descubierto en 1961, pero no fue aprobado hasta 1985 para su uso en los Estados Unidos.', 20, 8.25, 'V&C MEDICAMENTOS', '2023-01-16', 1),
(32, '1222', 'Citicolina 1gr Ampolla Intro Veno', 68, '<p>Los f&aacute;rmacos potenciadores del rendimiento, tambi&eacute;n conocidos como&nbsp;<strong>nootr&oacute;picos</strong>, como potenciadores cognitivos o como drogas inteligentes, son f&aacute;rmacos que supuestamente incrementan ciertas funciones mentales humanas como la memoria, la capacidad de concentraci&oacute;n, el aprendizaje, la creatividad, la motivaci&oacute;n</p>', 14, 59, 'V&C MEDICAMENTOS', '2023-01-16', 1),
(33, '1222', 'Citicolina 1gr Ampolla Intro Veno', 28, 'Los fármacos potenciadores del rendimiento, también conocidos como nootrópicos, como potenciadores cognitivos o como drogas inteligentes, son fármacos que supuestamente incrementan ciertas funciones mentales humanas como la memoria, la capacidad de concentración, el aprendizaje, la creatividad, la motivación', 7, 45.2, '', '2023-01-16', 1),
(34, '1153', 'Clindamicina 600 mg Ampolla Intro Veno', 29, '<p><strong>Antibi&oacute;tico natural del grupo de las lincosamidas extra&iacute;do del hongo Streptomyces lincolnensis</strong>. El mecanismo de acci&oacute;n se une a la subunidad 50S ribosomal de las bacterias inhibiendo la s&iacute;ntesis de prote&iacute;nas.</p>', 20, 17, 'V&C MEDICAMENTOS', '2023-01-16', 1),
(35, '1153', 'Clindamicina 600 mg Ampolla Intro Veno', 29, 'Antibiótico natural del grupo de las lincosamidas extraído del hongo Streptomyces lincolnensis. El mecanismo de acción se une a la subunidad 50S ribosomal de las bacterias inhibiendo la síntesis de proteínas.', 10, 13, '', '2023-01-16', 1),
(36, '1123', 'Colistina 100 mg Inyectable-Inhalatorio Intro Venoso', 30, '<p>Los polip&eacute;ptidos&nbsp;<strong>son antibi&oacute;ticos bactericidas producidos por diferentes cepas de Bacillus polymyxa (B.</strong>&nbsp;<strong>aerosporus), que act&uacute;an destruyendo la membrana celular bacteriana</strong>. La polimixina B y la colistina tienen una actividad similar, restringida a las bacterias gramnegativas, incluyendo Enterobacter,</p>', 10, 65, 'V&C MEDICAMENTOS', '2023-01-16', 1),
(37, '1123', 'Colistina 100 mg Inyectable-Inhalatorio Intro Veno ', 30, 'Los polipéptidos son antibióticos bactericidas producidos por diferentes cepas de Bacillus polymyxa (B. aerosporus), que actúan destruyendo la membrana celular bacteriana. La polimixina B y la colistina tienen una actividad similar, restringida a las bacterias gramnegativas, incluyendo Enterobacter,', 10, 50, '', '2023-01-16', 1),
(38, '1199', 'Diazepam 10 mg Ampolla IM Intro Veno', 49, '<p>El diazepam es un f&aacute;rmaco derivado de la 1,4-benzodiazepina que act&uacute;a como modulador alost&eacute;rico positivo de los receptores GABAA con propiedades ansiol&iacute;ticas, miorrelajantes, anticonvulsivantes y sedantes.​&nbsp;</p>', 20, 11, 'V&C MEDICAMENTOS', '2023-01-16', 1),
(39, '1199', 'Diazepam 10 mg Amp Intro Veno ', 49, 'El diazepam es un fármaco derivado de la 1,4-benzodiazepina que actúa como modulador alostérico positivo de los receptores GABAA con propiedades ansiolíticas, miorrelajantes, anticonvulsivantes y sedantes.​\n', 0, 8, '', '2023-01-16', 1),
(40, '1073', 'Dicynone 250 Ampolla', 0, ' Prevención y tratamiento de hemorragias capilares de cualquier origen o localización: hematuria, hematemesis, melena, epistaxis, gingivorragia.', 12, 37.5, '', '2023-01-16', 1),
(41, '1246', 'Digoxina 0.25 mg Ampolla ', 74, '<p>La digoxina es un gluc&oacute;sido cardiot&oacute;nico, usado como agente antiarr&iacute;tmico empleado en la insuficiencia card&iacute;aca, y utilizado en otros trastornos card&iacute;acos como la fibrilaci&oacute;n auricular.</p>', 20, 9.2, 'V&C MEDICAMENTOS', '2023-01-21', 1),
(42, '1124', 'Dobutamina 250 mg X 20 ml Richet', 34, '<p>La dobutamina es una amina simpaticomim&eacute;tica usada en el tratamiento de insuficiencia card&iacute;aca y choque cardiog&eacute;nico. Su mecanismo primario es la estimulaci&oacute;n directa del receptor adren&eacute;rgico beta 1 del sistema nervioso simp&aacute;tico. Es an&aacute;logo estructural al isoproterenol.​</p>', 20, 40.3, 'V&C MEDICAMENTOS', '2023-01-21', 1),
(43, '1133', 'Dolgenal Ampolla Intro Veno ', 8, '<p>Antiinflamatorio no esteroideo, antipir&eacute;tico, con efecto analg&eacute;sico potente comparable a opioides. Inhibe la s&iacute;ntesis de prostaglandinas a nivel perif&eacute;rico mediante el bloqueo de la enzima ciclooxigenasa. Dolor agudo moderado a severo. Procesos inflamatorios osteoarticulares, artritis.</p>', 20, 13, 'V&C MEDICAMENTOS', '2023-01-21', 1),
(44, '1123', 'Colistina 100 mg Inyectable-Inhalatorio', 30, 'La colistina es un antibiótico polimixina producido por ciertas cepas de la bacteria Paenibacillus polymyxa var. colistinus. La colistina es una mezcla de polipéptido cíclico colistin A y B. La colistina es efectiva contra todos los bacilos Gram-negativos y es usada como antibiótico polipéptido.', 0, 50, '', '2023-01-16', 1),
(45, '1136', 'Domperidona Pediatrico 4 mg / 2 ml', 36, '<p>La domperidona es un antagonista dopamin&eacute;rgico actualmente autorizado para el alivio de los s&iacute;ntomas de n&aacute;useas y v&oacute;mitos (tanto en adultos como en ni&ntilde;os) as&iacute; como para el tratamiento de la sensaci&oacute;n de plenitud epig&aacute;strica, malestar abdominal alto y regurgitaci&oacute;n del contenido g&aacute;strico (indicaci&oacute;n reservada</p>', 20, 11.7, 'V&C MEDICAMENTOS', '2023-01-21', 1),
(46, '1152', 'Etilefrina 10 mg Ampolla (Efortil)', 37, '<p>La etilefrina es un estimulante card&iacute;aco que se utiliza como antihipotensivo. Es una amina simpaticomim&eacute;tica de la serie 3-hidroxi-feniletanolamina utilizada en el tratamiento de la hipotensi&oacute;n ortost&aacute;tica de origen neurol&oacute;gico, cardiovascular, endocrino o metab&oacute;lico.</p>', 12, 13, 'V&C MEDICAMENTOS', '2023-01-27', 1),
(47, '1149', 'Fenitoína 100 mg Ampolla x 2 ml', 39, '<p>La fenito&iacute;na se usa para controlar cierto tipo de convulsiones y para tratar y prevenir las convulsiones que pueden empezar durante o despu&eacute;s de la cirug&iacute;a ...</p>', 10, 7.8, 'V&C MEDICAMENTOS', '2023-01-21', 1),
(48, '1072', 'Flogiatrin B12 NF Ampolla (Piroxican-VIT: B6B1', 11, '<p>Patolog&iacute;as inflamatorio-dolorosas con componentes neur&iacute;ticos. Compresiones radiculares y nerviosas (cervicobraquialgias, dorsalgias, lumbalgias, lumbociatalgias) Artrosis de columna, cadera, rodilla, etc. Artritis reumatoidea, psori&aacute;sica, gotosa.</p>', 10, 58.5, 'V&C MEDICAMENTOS', '2023-01-21', 1),
(49, '1116', 'Haloperidol 5mg Ampolla ', 41, '<p>El haloperidol es un f&aacute;rmaco antipsic&oacute;tico t&iacute;pico con acci&oacute;n farmacol&oacute;gica de tipo neurol&eacute;ptico, ​ que forma parte de las butirofenonas. Se trata de uno de los primeros medicamentos que se usaron en el siglo XX para el tratamiento de esquizofrenia y otras enfermedades mentales</p>', 10, 13, 'V&C MEDICAMENTOS', '2023-01-21', 1),
(50, '1125', 'Hidrocortisona 100 mg  ', 42, '<p>La hidrocortisona, que se vende con varios nombres comerciales, es el nombre de la hormona cortisol cuando se suministra como medicamento.​ Los usos incluyen afecciones como insuficiencia adrenocortical, s&iacute;ndrome adrenogenital, calcio en sangre elevado, tiroiditis, artritis reumatoide, dermatitis, asma y EPOC</p>', 10, 15.6, 'V&C MEDICAMENTOS', '2023-01-21', 1),
(51, '1156', 'Hidrocortisona 500 mg Ampolla', 42, '<p>La hidrocortisona, que se vende con varios nombres comerciales, es el nombre de la hormona cortisol cuando se suministra como medicamento.​ Los usos incluyen afecciones como insuficiencia adrenocortical, s&iacute;ndrome adrenogenital, calcio en sangre elevado, tiroiditis, artritis reumatoide, dermatitis, asma y EPOC</p>', 12, 42.3, 'V&C MEDICAMENTOS', '2023-01-21', 1),
(52, '1129', 'Imipenem + Cilastina 500/500mg Intro Veno', 43, '<p>La inyecci&oacute;n de imipenem y cilastatina se usa para tratar algunas infecciones graves que son provocadas por bacterias, incluyendo la endocarditis (infecci&oacute;n de las v&aacute;lvulas y revestimiento del coraz&oacute;n) e infecciones del tracto respiratorio (incluyendo la neumon&iacute;a), del tracto urinario, abdominales (&aacute;rea del est&oacute;mago), ginecol&oacute;gicas, de la sangre, de la piel, de los huesos y de las articulaciones. El imipenem pertenece a una clase de medicamentos llamados antibi&oacute;ticos de carbapenem. Funciona matando las bacterias. La cilastatina pertenece a una clase de medicamentos llamados inhibidores de la dehidropeptidasa. Funciona ayudando a que el imipenem se mantenga activo en el cuerpo durante un per&iacute;odo m&aacute;s prolongado.</p>', 10, 58.6, 'V&C MEDICAMENTOS', '2023-01-21', 1),
(53, '1235', 'Iopamiron 300 (Contraste Ultravit)', 44, '<p>Ultravist pertenece al grupo de medicamentos denominados medios de contraste para rayos X de baja osmolaridad, hidrosolubles y nefrotr&oacute;picos.</p>', 10, 169, 'V&C MEDICAMENTOS', '2023-01-21', 1),
(54, '1221', 'Ipsilon Ampolla Äcido & Amonocaproico', 51, '<p>El &aacute;cido aminocaproico (&aacute;cido 6-aminohexanoico) es un inhibidor de la fibrin&oacute;lisis que se utiliza para controlar la hemostasia cuando la fibrin&oacute;lisis contribuye al sangrado. En situaciones potencialmente mortales, puede ser necesaria la transfusi&oacute;n de hemoderivados adecuados u otras medidas de emergencia.</p>', 10, 182, 'V&C MEDICAMENTOS', '2023-01-21', 1),
(55, '1176', 'Meropenem 1gr Ampolla', 43, '<p>Meropenem Accordpharma pertenece a un grupo de medicamentos denominados antibi&oacute;ticos carbapenemes. Act&uacute;a destruyendo bacterias, que pueden causar infecciones graves. Los antibi&oacute;ticos se utilizan para tratar infecciones bacterianas y no sirven para tratar infecciones v&iacute;ricas como la gripe o el catarro.</p>', 10, 91, 'V&C MEDICAMENTOS', '2023-01-21', 1),
(56, '1212', 'Meropenem 500 mg Meroprem', 43, '<p>Meropenem Accordpharma pertenece a un grupo de medicamentos denominados antibi&oacute;ticos carbapenemes. Act&uacute;a destruyendo bacterias, que pueden causar infecciones graves. Los antibi&oacute;ticos se utilizan para tratar infecciones bacterianas y no sirven para tratar infecciones v&iacute;ricas como la gripe o el catarro.</p>', 10, 31.2, 'V&C MEDICAMENTOS', '2023-01-21', 1),
(57, '1232', 'Mesigyna Ampolla', 47, '<p>Mesigyna es una inyecci&oacute;n anticonceptiva que protege contra el embarazo principalmente al inhibir la ovulaci&oacute;n y ocasionar cambios en el moco cervical. Este anticonceptivo inyectable tiene un efecto que se ejerce sobre el endometrio, similar al de los anticonceptivos orales combinados.</p>', 10, 44.2, 'V&C MEDICAMENTOS', '2023-01-21', 1),
(58, '1148', 'Metilprednisolona Richert 500mg', 42, '<p>Los corticosteroides se utilizan para tratar la artritis reumatoide, la enfermedad intestinal inflamatoria, el asma, las alergias y muchas otras afecciones.</p>', 0, 114.8, 'V&C MEDICAMENTOS', '2023-01-21', 1),
(59, '1206', 'Midazolam 15 mg X 3 ml Ampolla', 49, '<p>Las benzodiazepinas son medicamentos psicotr&oacute;picos con efectos sedantes, hipn&oacute;ticos, ansiol&iacute;ticos, anticonvulsivos, amn&eacute;sicos y miorrelajantes.​</p>', 10, 32.5, 'V&C MEDICAMENTOS', '2023-01-21', 1),
(60, '1111', 'Naloxona Ampolla', 50, 'La naloxona , que se vende bajo las marcas Narcan (en mayúsculas) entre otras, es un medicamento que se usa para revertir o reducir los efectos de los opioides . [10] Se usa comúnmente para contrarrestar la disminución de la respiración en caso de sobredosis de opioides . [10] Los efectos comienzan en dos minutos cuando se administra por vía intravenosa y en cinco minutos cuando se inyecta en un músculo . [10] El medicamento también se puede administrar rociándolo en la nariz de una persona . [11] La naloxona suele bloquear los efectos de los opioides durante 30 a 90 minutos. [12]Es posible que se requieran dosis múltiples, ya que la duración de la acción de algunos opioides es mayor que la de la naloxona', 0, 9, '', '2023-01-17', 1),
(61, '1132', 'Neostigmina 0,5mg/1ml', 51, '<p>La neostigmina es un inhibidor reversible de la enzima colinesterasa, que impide la destrucci&oacute;n de la acetilcolina y produce un efecto parasimpaticomim&eacute;tico indirecto mediante el aumento de la concentraci&oacute;n de acetilcolina en el receptor. Es de duraci&oacute;n corta.</p>', 23, 8.2, 'V&C MEDICAMENTOS', '2023-01-26', 1),
(62, '1157', 'Nitroglicerina 25 mg x 5ml IV Ampolla Trinitroglicerina', 0, 'La nitroglicerina se encuentra en una clase de medicamentos llamados vasodilatadores. Funciona al relajar los vasos sanguíneos para que el corazón no trabaje tan duro y por consiguiente no necesite tanto oxígeno.', 10, 36.5, '', '2023-01-17', 1),
(63, '1150', 'Noradrenalina Ampolla', 95, '<p>La noradrenalina es una catecolamina con m&uacute;ltiples funciones fisiol&oacute;gicas y homeost&aacute;ticas que puede actuar como hormona y como neurotransmisor.​ Las &aacute;reas del cuerpo que producen o se ven afectadas por la norepinefrina son descritas como noradren&eacute;rgicas</p>', 10, 15.6, 'V&C MEDICAMENTOS', '2023-01-21', 1),
(64, '1237', 'Novalgina 10 mg Ampolla Morfina', 96, '<p>Novalgina es un medicamento que sirve como un analg&eacute;sico y antit&eacute;rmico que act&uacute;a reduciendo el dolor y la fiebre. Este medicamento tiene dipirona como su principio activo, que es ampliamente utilizado en las manifestaciones de dolor y fiebre.</p>', 10, 32.5, 'V&C MEDICAMENTOS', '2023-01-21', 1),
(65, '1113', 'Ondanstrón', 54, 'El ondansetrón, desarrollado y comercializado por primera vez por GlaxoSmithKline como Zofran® es un antagonista del receptor de serotonina 5-HT₃, utilizado principalmente como un antiemético, a menudo después de quimioterapia. Afecta a los nervios periféricos y centrales', 0, 10, '', '2023-01-17', 1),
(66, '1113', 'Ondansetrón', 54, 'El ondansetrón, desarrollado y comercializado por primera vez por GlaxoSmithKline como Zofran® es un antagonista del receptor de serotonina 5-HT₃, utilizado principalmente como un antiemético, a menudo después de quimioterapia. Afecta a los nervios periféricos y centrales', 0, 10, '', '2023-01-17', 1),
(67, '1113', 'Ondansetrón 8 mg Ampolla', 54, 'El ondansetrón, desarrollado y comercializado por primera vez por GlaxoSmithKline como Zofran® es un antagonista del receptor de serotonina 5-HT₃, utilizado principalmente como un antiemético, a menudo después de quimioterapia. Afecta a los nervios periféricos y centrales', 10, 10, '', '2023-01-17', 1),
(68, '1122', 'Piperacilina + tazobactam Ampolla', 55, '<p>La piperacilina se encuentra en una clase de medicamentos llamados antibi&oacute;ticos de penicilina. Funciona matando las bacterias que causan infecci&oacute;n. El tazobactam pertenece a una clase llamada inhibidor de beta-lactamasa. Funciona al prevenir que las bacterias destruyan la piperacilina.</p>', 14, 60.1, 'V&C MEDICAMENTOS', '2023-01-21', 1),
(69, '1122', 'Propofol 1% Intro Veno', 56, 'El propofol es un agente anestésico de acción corta con un comienzo de acción rápido de aproximadamente 30 segundos y una recuperación de la anestesia normalmente también rápida', 0, 45.5, '', '2023-01-17', 1),
(70, '1127', 'Propofol 1% Intro Venoso', 56, 'El propofol es un agente anestésico de acción corta con un comienzo de acción rápido de aproximadamente 30 segundos y una recuperación de la anestesia normalmente también rápida', 10, 45.5, '', '2023-01-17', 1),
(71, '1127', 'Propofol 1% Intro Venoso', 56, 'El propofol es un agente anestésico de acción corta con un comienzo de acción rápido de aproximadamente 30 segundos y una recuperación de la anestesia normalmente también rápida', 10, 55.25, '', '2023-01-17', 1),
(72, '1257', 'Remifentanilo Ampolla', 0, 'El remifentanilo es un opioide agonista puro de los receptores μ de la morfina. Es potente, de acción ultracorta y no acumulable, que se emplea durante las intervenciones quirúrgicas y procedimientos dolorosos para suministrar analgesia y sedación', 10, 84.5, '', '2023-01-17', 1),
(73, '1032', 'Sevogesic Frasco 250 ml (Sevoflurano Anestésico)', 18, '<p>Es un agente anest&eacute;sico l&iacute;quido no inflamable que se administra por vaporizaci&oacute;n, y qu&iacute;micamente es un derivado fluorinado del &eacute;ter metil isopropilo, que induce una p&eacute;rdida de conciencia suave y r&aacute;pida durante la inducci&oacute;n inhalatoria y una r&aacute;pida recuperaci&oacute;n despu&eacute;s de su discontinuaci&oacute;n.</p>', 1, 6, 'V&C MEDICAMENTOS', '2023-01-21', 1),
(74, '1177', 'Tramadol 100 mg Ampolla Intro Veno', 59, 'Los fármacos agonistas puros son los siguientes: morfina, metadona, meperidina, tramadol, codeína, dihidrocodeína y dextropropoxifeno. Son fármacos con una baja actividad intrínseca (eficacia), de forma que su curva dosis-respuesta presenta un efecto techo menor que el máximo efecto produci do por un agonista puro.', 10, 11.9, '', '2023-01-17', 1),
(75, '1126', 'Vancomicina 1 gr', 60, 'La vancomicina pertenece a una clase de medicamentos llamados antibióticos glicopéptidos. Su acción consiste en eliminar las bacterias en los intestinos. La vancomicina no elimina las bacterias ni trata las infecciones en ninguna otra parte del cuerpo cuando se toma por vía oral.', 10, 40.99, '', '2023-01-17', 1),
(78, '1128', 'Vancomicina 500mg Ampolla', 60, 'La vancomicina pertenece a una clase de medicamentos llamados antibióticos glicopéptidos. Su acción consiste en eliminar las bacterias en los intestinos. La vancomicina no elimina las bacterias ni trata las infecciones en ninguna otra parte del cuerpo cuando se toma por vía oral.', 10, 19.5, '', '2023-01-17', 1),
(79, '5110', 'Suero Dextrosa 500 ml', 108, '<p>Qu&eacute; es Suero Glucosado Vitulia 5% y para qu&eacute; se utiliza para el tratamiento de la p&eacute;rdida de agua (deshidrataci&oacute;n hipert&oacute;nica) por v&oacute;mitos, diarrea. como aporte de energ&iacute;a en nutrici&oacute;n parenteral cuando la toma de alimentos por la boca est&aacute; limitada.</p>', 146, 18, 'N Y L', '2023-01-24', 1),
(80, '5120', 'Suero Fisiológico', 0, 'Suero Fisiológico Vitulia se utiliza para reemplazar el agua y las sales de sodio y cloruro que pueden llegar a ser bajos como consecuencia de diferentes alteraciones o trastornos. También se utiliza como solución de transporte de otros medicamentos compatibles.', 48, 15, '', '2023-01-17', 1),
(81, '5120', 'Suero Fisiológico 1000 ml', 0, 'Suero Fisiológico Vitulia se utiliza para reemplazar el agua y las sales de sodio y cloruro que pueden llegar a ser bajos como consecuencia de diferentes alteraciones o trastornos. También se utiliza como solución de transporte de otros medicamentos compatibles.', 96, 15, '', '2023-01-17', 1),
(82, '396', 'Betametasona 4mg Ampolla', 42, 'La betametasona pertenece a una clase de medicamentos llamados corticoesteroides. Funciona al activar las sustancias naturales en la piel para reducir la hinchazón, el enrojecimiento y la picazón.', 35, 6.5, '', '2023-01-17', 1),
(83, '402', 'Ciprofloxacino 200mg 100ml Fco.', 14, 'La ciprofloxacina es un antibiótico que se vende bajo receta y que está aprobado por la Administración de Alimentos y Medicamentos (FDA, por sus siglas en inglés) para prevenir el ántrax. Durante una emergencia por ántrax, la FDA permite ciertos usos de la ciprofloxacina, incluso su administración sin receta.', 15, 8.85, '', '2023-01-17', 1),
(84, '398', 'Cefazolina Sódica 1gr Ampolla', 14, 'Cefazolina, es un antibiótico del grupo de las cefalosporinas de primera generación. Se administra de forma parenteral bien por inyección intramuscular o en infusión intravenosa. Habitualmente se comercializa como cefazolina sódica, 1,05 g equivale a 1 g de cefazolina, y contiene 2,1 mmol de sodio.', 32, 12.65, '', '2023-01-17', 1),
(85, '399', 'Cefotaxima Sódica 1gr Ampolla', 14, 'La cefotaxima es un antibiótico que se usa para tratar una serie de infecciones bacterianas en humanos, otros animales y cultivos de tejidos vegetales. ', 31, 7.3, '', '2023-01-17', 1),
(86, '388', 'Amikacina 500 mg Ampolla', 14, 'La amikacina es un antibiótico del grupo de los aminoglucósidos que se usa en el tratamiento de diferentes infecciones bacterianas.​ Esto incluye infecciones de las articulaciones, infecciones intraabdominales, meningitis, neumonía, sepsis e infecciones del tracto urinario.​', 31, 8.2, '', '2023-01-17', 1),
(87, '5110', 'Suero Dextrosa 5% 1000 ml', 109, 'La dextrosa se administra para prevenir la hipoglucemia, mientras que la insulina trata el potasio elevado. Las personas con diabetes o hipoglucemia (azúcar en sangre crónicamente baja) pueden llevar consigo gel o tabletas de dextrosa en caso de que su nivel de azúcar en sangre sea demasiado bajo.', 49, 17, 'N Y L', '2023-01-17', 1),
(88, '5120', 'Suero Fisiológico 1000ml', 108, 'Suero Fisiológico Vitulia se utiliza para reemplazar el agua y las sales de sodio y cloruro que pueden llegar a ser bajos como consecuencia de diferentes alteraciones o trastornos. También se utiliza como solución de transporte de otros medicamentos compatibles.', 0, 14.99, '', '2023-01-17', 1),
(89, '5120', 'Suero FIsiológico 1000 ml', 0, 'Suero Fisiológico Vitulia se utiliza para reemplazar el agua y las sales de sodio y cloruro que pueden llegar a ser bajos como consecuencia de diferentes alteraciones o trastornos. También se utiliza como solución de transporte de otros medicamentos compatibles.', 48, 14.99, '', '2023-01-17', 1),
(90, '396', 'Betametasona 4mg Ampolla', 42, 'La betametasona es un esteroide del grupo de los corticoesteroides que se utiliza en medicina por sus propiedades inmunosupresoras y antiinflamatorias. A diferencia de otros fármacos con estos efectos, la betametasona no causa retención de agua', 25, 6.45, '', '2023-01-17', 1),
(91, '402', 'Ciprofloxacino 200mg/100ml Frasco', 14, 'La ciprofloxacina es un antibiótico que se vende bajo receta y que está aprobado por la Administración de Alimentos y Medicamentos (FDA, por sus siglas en inglés) para prevenir el ántrax. Durante una emergencia por ántrax, la FDA permite ciertos usos de la ciprofloxacina, incluso su administración sin receta.', 14, 8.9, '', '2023-01-17', 1),
(92, '398', 'Cefazolina Sódica 1gr Ampolla', 14, 'Cefazolina, es un antibiótico del grupo de las cefalosporinas de primera generación. Se administra de forma parenteral bien por inyección intramuscular o en infusión intravenosa. Habitualmente se comercializa como cefazolina sódica, 1,05 g equivale a 1 g de cefazolina, y contiene 2,1 mmol de sodio.', 22, 12.65, '', '2023-01-17', 1),
(93, '399', 'Cefotaxima Sódica 1gr Ampolla', 14, 'La cefotaxima es un antibiótico que se usa para tratar una serie de infecciones bacterianas en humanos, otros animales y cultivos de tejidos vegetales.', 21, 7.25, '', '2023-01-17', 1),
(95, '0', 'Jeringas 3ml', 22, '<p>Las jeringas de 3 ml con aguja calibre G23 son de uso m&eacute;dico especiales para tratamientos hipod&eacute;rmicos e intramusculares, en los que se necesita extraer o inyectar fluidos o l&iacute;quidos.</p>', 33, 1.5, 'Betancourt', '2023-01-20', 1),
(96, '0', 'Algodón', 110, 'DESCRIPCIÓN. Algodón hidrófilo de color blanco (sin blanqueadores ópticos), sin ningún tipo de impurezas. Suave al tacto. Homogéneo a la vista, ideal para uso hospitalario y medico por su gran capacidad de absorción.', 1, 0, 'Betancourt', '2023-01-20', 1),
(97, '', 'Prolene 3-0', 111, 'Sutura prolene 3/0 ref:w8549 caja 12 uds para aproximación y/o ligadura de tejidos, incluyendo uso en procedimientos cardiovasculares, oftálmicos y neurológicos. Sutura no absorbible de polipropileno Prolene. Tipo: Monofilamento, de color azul.', 21, 0, 'Betancourt', '2023-01-20', 1),
(98, '', 'Prolene 1', 111, 'Las Suturas PROLENE (transparentes o pigmentadas) son suturas quirúrgicas estériles no absorbibles compuestas de un esteroisómero cristalino isotáctico de polipropileno, una poliolefina sintética lineal. La sutura es teñida de azul para mejorar la visibilidad.', 26, 0, 'Betancourt', '2023-01-20', 1),
(99, '', 'Tubo Endotraqueal # 14', 112, 'La intubación endotraqueal se realiza para: Mantener la vía respiratoria abierta con el fin de suministrar oxígeno, medicamento o anestesia. Apoyar la respiración en ciertas enfermedades, tales como neumonía, enfisema, insuficiencia cardíaca, colapso pulmonar o traumatismo grave.', 0, 0, 'Betancourt', '2023-01-20', 1),
(100, '', 'Tubo Endotraqueal # 6', 112, 'La intubación endotraqueal se realiza para: Mantener la vía respiratoria abierta con el fin de suministrar oxígeno, medicamento o anestesia. Apoyar la respiración en ciertas enfermedades, tales como neumonía, enfisema, insuficiencia cardíaca, colapso pulmonar o traumatismo grave.', 0, 0, '', '2023-01-20', 1),
(101, '10', 'Tubo Endotraqueal # 7.5', 112, '<p>La intubaci&oacute;n endotraqueal se realiza para: Mantener la v&iacute;a respiratoria abierta con el fin de suministrar ox&iacute;geno, medicamento o anestesia. Apoyar la respiraci&oacute;n en ciertas enfermedades, tales como neumon&iacute;a, enfisema, insuficiencia card&iacute;aca, colapso pulmonar o traumatismo grave.</p>', 14, 11.1, 'Betancourt', '2023-01-20', 1),
(102, '1205', 'Farmalet 10ml Amp. Fentanilo', 119, 'El fentanilo es un opioide sintético que es hasta 50 veces más fuerte que la heroína y 100 veces más fuerte que la morfina. Es un importante factor contribuyente a las sobredosis mortales y no mortales en los EE. UU. Hay dos tipos de fentanilo: el fentanilo farmacéutico y el fentanilo fabricado ilícitamente.', 10, 26, 'V&C MEDICAMENTOS', '2023-01-21', 1),
(103, '1', 'Jeringas 1ml ', 22, '<p>Insumos</p>', 2469, 1.5, 'Betancourt', '2023-01-26', 1),
(104, '0', 'Tubo Endotraqueal # 7', 22, 'La intubación endotraqueal se realiza para: Mantener la vía respiratoria abierta con el fin de suministrar oxígeno, medicamento o anestesia. Apoyar la respiración en ciertas enfermedades, tales como neumonía, enfisema, insuficiencia cardíaca, colapso pulmonar o traumatismo grave.', 6, 0, 'Betancourt', '2023-01-24', 1),
(105, '55', 'Electrodos Para EKG', 22, 'Durante un electrocardiograma , se te colocan hasta 12 sensores (electrodos) en el pecho y las extremidades. Los electrodos son parches adhesivos con cables que se conectan a un monitor. Estos registran las señales eléctricas que hacen que el corazón lata.', 46, 0, 'Betancourt', '2023-01-24', 1),
(106, '444', 'Bolsas Colectoras De Orina', 22, '¿Qué es la bolsa recolectora de orina? La bolsa recolectora de orina, o el sondaje vesical, se define como una técnica que consiste en la introducción de una sonda a través del meato uretral y hasta la vejiga, con el objetivo de establecer una vía de drenaje que expulse la orina.', 16, 0, '', '2023-01-24', 1),
(107, '6666', 'Equipos De Sueros', 22, 'Los Sistemas de Suero sirven para administrar el suero al paciente, con una llave para regular el flujo de suero. Si lo que estás buscando es ofrecer a tus pacientes un trabajo de precisión y de calidad, éste es tu sitio.', 19, 0, '', '2023-01-24', 1),
(108, '333', 'Vendas De Gasa - 15cm', 22, 'Sirven sobre todo para fijar apósitos y gasas impregnadas en medicamentos y para la compresión de articulaciones, extremidades y demás zonas del cuerpo humano.', 18, 0, '', '2023-01-24', 1),
(109, '222', 'Mariposas / Scalp Vein # 21', 22, 'Este dispositivo medico desechable llamado scalp vein o mariposa, como se conoce de manera coloquial, tiene una aguja de acero inoxidable flanqueada por dos aletas para mejorar el sostén durante la punción endovenosa.', 24, 0, '', '2023-01-24', 1),
(110, '456', 'Vendas Elásticas - 15cm', 22, '<p>Se emplea una venda el&aacute;stica o semiel&aacute;stica, porque puede adaptarse a la zona que se va a vendar. Se usa para sujetar gasa, ap&oacute;sitos o f&eacute;rulas en brazo, antebrazo, mano, muslo, pierna y pie. Inicie el vendaje siempre en la parte m&aacute;s distal al coraz&oacute;n en direcci&oacute;n a la circulaci&oacute;n venosa.</p>', 3, 0, 'Betancourt', '2023-01-30', 1),
(111, '345', 'Lidocaína 2% Sin Conservantes', 19, 'La Lidocaína es un anestésico local del grupo amida. La solución inyectable de Lidocaína está indicada para su uso en anestesia por infiltración, anestesia regional intravenosa y bloqueos nerviosos.', 16, 0, '', '2023-01-24', 1),
(112, '633', 'Triapen - 6.3.3', 120, '<p>Un antimicrobiano es un agente que mata microorganismos o detiene su crecimiento.​ Los medicamentos antimicrobianos se pueden agrupar de acuerdo con los microorganismos contra los que act&uacute;an principalmente. Por ejemplo, los antibi&oacute;ticos se usan contra las bacterias y los antif&uacute;ngicos contra los hongos.</p>', 22, 0, 'Betancourt', '2023-01-24', 1),
(113, '987', 'Vitamina C / 1g', 122, '<div class=\"wWOJcd\" tabindex=\"0\">\r\n<div id=\"exacc_FPLPY7-5CM_Q5OUPhM6_sAo_7\" class=\"iDjcJe IX9Lgd wwB5gf\">&iquest;Qu&eacute; tipo de farmaco es la vitamina C?</div>\r\n<div class=\"YsGUOb\">&nbsp;</div>\r\n<div class=\"r21Kzd\" data-hveid=\"CBoQAQ\" data-ved=\"2ahUKEwi_k8_8u-D8AhVPKLkGHQTnD6YQuk56BAgaEAE\">&nbsp;</div>\r\n</div>\r\n<div id=\"exacc_FPLPY7-5CM_Q5OUPhM6_sAo_8\" class=\"MBtdbb\" data-ved=\"2ahUKEwi_k8_8u-D8AhVPKLkGHQTnD6YQ7NUEegQIGhAD\">\r\n<div class=\"ymu2Hb\">\r\n<div id=\"_FPLPY7-5CM_Q5OUPhM6_sAo_44\" class=\"t0bRye r2fjmd\" data-hveid=\"CBoQBA\" data-ved=\"2ahUKEwi_k8_8u-D8AhVPKLkGHQTnD6YQu04oAHoECBoQBA\">\r\n<div id=\"FPLPY7-5CM_Q5OUPhM6_sAo__16\">\r\n<div class=\"wDYxhc\" data-md=\"61\">\r\n<div class=\"LGOjhe\" data-attrid=\"wa:/description\" data-hveid=\"CBAQAA\"><span class=\"ILfuVd\" lang=\"es\"><span class=\"hgKElc\">El &aacute;cido asc&oacute;rbico pertenece a una&nbsp;<strong>clase de medicamentos</strong>&nbsp;llamados antioxidantes. El cuerpo lo necesita para ayudar a la cicatrizaci&oacute;n de las heridas, mejorar la absorci&oacute;n de hierro de los alimentos vegetales y apoyar el sistema inmunol&oacute;gico.</span></span></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 17, 0, 'Betancourt', '2023-01-24', 1),
(114, '987', 'Vitamina C / 1g', 120, 'Las ampollas de vitamina C son nutrientes que cuentan con propiedades antioxidantes, los cuales combaten el daño oxidativo de la piel. Ofrecen una apariencia sana, libre de arrugas prematuras debido al fotoenvejecimiento. Desde luego, también reducen las arrugas que aparecen debido a la edad.', 13, 0, 'Betancourt', '2023-01-24', 1),
(115, '', 'Sonda De Aspirción # 8 Catéter Succión ', 22, '¿Qué son sondas de aspiración?\nDurante la ventilación unipulmonar a través de un tubo de doble luz, las sondas de aspiración se utilizan para acelerar el colapso pulmonar y/o mejorar la oxigenación, bien aspirando secreciones o bien administrando oxígeno a bajos flujos en el pulmón colapsado.', 0, 0, '', '2023-01-24', 1),
(116, '19', 'Agua Oxigenada', 15, '<p>El per&oacute;xido de hidr&oacute;geno (H<sub>2</sub>O<sub>2</sub>), tambi&eacute;n conocido como agua oxigenada, dioxogen, dioxidano o per&oacute;xido de dihidr&oacute;geno es un compuesto qu&iacute;mico con caracter&iacute;sticas de un&nbsp;<strong>l&iacute;quido altamente polar, fuertemente enlazado con el hidr&oacute;geno</strong>, tal como el agua, por lo general de aspecto l&iacute;quido ligeramente m&aacute;s viscoso.</p>', 6, 0, 'Betancourt', '2023-01-26', 1),
(118, '27', 'Alcohol Yodado', 15, 'Es una combinación de yodo con alcohol al 70 % , se debe utilizar en concentraciones al 2 % . Actúa sobre bacterias Gram positivas y Gram negativas , Mycobacterium TBC y hongos . Se lo utiliza como antiséptico de elección para la preparación de la zona operatoria de la piel .', 4, 0, 'Betancourt', '2023-01-24', 1),
(120, '28', 'Suero Ringer Lactato', 123, '¿Qué es Ringer lactato y para qué sirve?\nIndicado para la rehidratación y restauración del equilibrio hidroelectrolítico, cuando hay pérdida de líquidos e iones cloruro, sodio, potasio y calcio y para la prevención y el tratamiento de la acidosis metabólica.', 1, 0, 'Betancourt', '2023-01-24', 1),
(121, '29', 'Metronidazol 500mg/100ml frasco', 121, 'El metronidazol se usa para tratar infecciones vaginales como vaginosis bacteriana (una infección ocasionada debido a la gran cantidad de determinada bacteria en la vagina). El metronidazol pertenece a una clase de medicamentos llamados antimicrobianos.', 4, 0, '', '2023-01-24', 1),
(122, '25', 'Frasco Colector De Orina', 22, 'Recipientes para recoger muestras en forma segura y a prueba de derrames.', 105, 0, '', '2023-01-24', 1),
(123, '36', 'Termómetro', 22, 'El termómetro es un instrumento de medición de temperatura. Desde su invención ha evolucionado mucho, principalmente a partir del desarrollo de los termómetros digitales.', 16, 0, '', '2023-01-24', 1),
(124, '38', 'Agujas Pencan # 27 /Obesos', 22, 'Agujas punta de lápiz para anestesia espinal y punción lumbar diagnóstica · Con medidas de 22G a 27G. · El diseño de la punta permite una mínima penetración ', 4, 0, 'Betancourt', '2023-01-24', 1),
(125, '69', 'Acetilcisteína 300mg-3ml', 14, 'La acetilcisteína es una clase de medicamento llamado agente mucolítico. Funciona diluyendo el moco en los conductos respiratorios, lo que facilita que al toser salga el moco y despeje las vías respiratorias.', 8, 0, 'Betancourt', '2023-01-24', 1),
(127, '39', 'Agujas Pencan #27 /Normal ', 22, '<p><em>Agujas</em>&nbsp;punta de l&aacute;piz para anestesia espinal y punci&oacute;n lumbar diagn&oacute;stica &middot; Con medidas de 22G a&nbsp;<em>27G</em>. &middot; El dise&ntilde;o de la punta permite una m&iacute;nima penetraci&oacute;n&nbsp;...</p>', 2, 0, 'Betancourt', '2023-01-25', 1),
(128, '24', 'Copper T Dispositivo Intrauterino DIU / TCU 380-A', 47, '<p>&nbsp;<strong>Es un contraceptivo que contiene cobre en el cuerpo del DIU</strong>, esta formado por una T flexible de polietileno contiene hilo de cobre en el centro y dos hilos blancos de polietileno que sirven para su retiro.</p>', 1, 0, 'Betancourt', '2023-01-25', 1),
(129, '100', 'Diposan 100Mg Dimetilpolisiloxano', 125, '<p><strong>Anti-flatulento que tiene propiedad de producir la eliminaci&oacute;n de las burbujas gaseosas por fermentaciones y putrefacciones gastrointestinales u otras causas</strong>.</p>', 73, 0, 'Betancourt', '2023-01-25', 1),
(130, '35', 'Jeringa 10ml', 22, '<p>&nbsp;<strong>Jeringa</strong>&nbsp;hipodermica desechable de&nbsp;<strong>10 ml</strong>&nbsp;con&nbsp;<strong>aguja</strong>&nbsp;calibre 21 x 1 1/2 - de tres partes, plastipak luer lock. Uso: Utilizadas para administraci&oacute;n de medicamentos y/o soluciones y extracci&oacute;n de l&iacute;quidos corporales.</p>', 10, 1.5, 'Betancourt', '2023-01-26', 1),
(131, '99', 'Ceftriaxona Sódica 1G', 126, '<p>&nbsp;Ceftriaxona&nbsp;<strong>es un antibi&oacute;tico para adultos y ni&ntilde;os</strong>&nbsp;(incluidos los beb&eacute;s reci&eacute;n nacidos). Produce su efecto eliminando las bacterias causantes de infecciones. Pertenece a un grupo de medicamentos llamados cefalosporinas.</p>', 5, 0, 'Betancourt', '2023-01-25', 1),
(132, '85', 'Dexametasona 8mg/2ml Amp.', 63, '<p>La dexametasona es un&nbsp;<strong>corticosteroide</strong>, es decir, es similar a una hormona natural producida por las gl&aacute;ndulas suprarrenales. Por lo general, se usa para reemplazar este producto qu&iacute;mico cuando su cuerpo no fabrica suficiente.</p>', 38, 0, 'Betancourt', '2023-01-25', 1),
(133, '59', 'Ranitidina 50mg/2ml Amp.', 127, '<p>La ranitidina&nbsp;<strong>es un principio activo que se utiliza para reducir la producci&oacute;n de &aacute;cido en el est&oacute;mago en situaciones como la &uacute;lcera g&aacute;strica o el reflujo gastroesof&aacute;gico</strong>. Como se ha informado previamente, la NDMA est&aacute; clasificada como un probable carcin&oacute;geno en humanos en base a estudios en animales.</p>', 33, 0, 'Betancourt', '2023-01-25', 1),
(134, '17', 'Metoclopramida 10mg Amp.', 128, '<p>La&nbsp;<strong>metoclopramida</strong>&nbsp;inyectable se utiliza para aliviar los s&iacute;ntomas provocados por el vaciamiento lento del est&oacute;mago en personas que tienen diabetes. Estos s&iacute;ntomas incluyen n&aacute;useas, v&oacute;mitos, acidez estomacal, p&eacute;rdida del apetito y una sensaci&oacute;n de saciedad que permanece mucho tiempo despu&eacute;s de las comidas.</p>', 19, 0, 'Betancourt', '2023-01-25', 1),
(135, '32', 'Agua Destilada 5ml/ Amp.', 62, '<p>Indicaciones: El agua est&eacute;ril para inyectables&nbsp;<strong>se usa principalmente para diluci&oacute;n de medicamentos de uso parenteral</strong>. Posolog&iacute;a: La v&iacute;a de administraci&oacute;n depende de la v&iacute;a por la cual se administra el medicamento,</p>', 4, 0, 'Betancourt', '2023-01-25', 1),
(136, '45', 'Ergometrina Maleato 0,2mg/1ml Amp.', 129, '<p>La ergonovina, tambi&eacute;n conocida como ergometrina, es un&nbsp;<strong>alcaloide derivado del ergot</strong>&nbsp;que se obtiene del cornezuelo del centeno con propiedades oxit&oacute;cicas poderosas, por lo que aumenta de manera notable la actividad motora del &uacute;tero.</p>', 0, 0, 'Betancourt', '2023-01-25', 1),
(137, '1626', 'Tegaderm 10cm x 12cm', 22, '<p>El ap&oacute;sito Tegaderm&nbsp;<strong>retiene los componentes naturales de la cicatrizaci&oacute;n de las heridas para mantener un ambiente h&uacute;medo</strong>. Permite la monitorizaci&oacute;n visual permanente del sitio IV y de la herida.</p>', 32, 0, 'Betancourt', '2023-01-25', 1),
(138, '1683', 'Tegaderm 6,5cm x 7cm', 22, '<p>El ap&oacute;sito Tegaderm&nbsp;<strong>retiene los componentes naturales de la cicatrizaci&oacute;n de las heridas para mantener un ambiente h&uacute;medo</strong>. Permite la monitorizaci&oacute;n visual permanente del sitio IV y de la herida.</p>', 3, 0, 'Betancourt', '2023-01-25', 1),
(139, '7509', 'Placa / Electro Adultos', 22, '<p><strong>Placa</strong>&nbsp;electrocauterio es indicado para actuar como polvo pasivo de electrocirug&iacute;a permitiendo que la energ&iacute;a retorne a la consola con el prop&oacute;sito de evitar lesiones en la piel del paciente.</p>', 1, 0, 'Betancourt', '2023-01-25', 1),
(140, '1224', 'Sulfato Ferroso + Ácido Fólico + Vitamina C', 130, '<p>Indicaciones. Anemias microciticas por deficiencia&nbsp;<strong>de</strong>&nbsp;hierro, anemias por hemorragias cr&oacute;nicas, anemias macroc&iacute;ticas megaloblasticas por deficiencia&nbsp;<strong>de &aacute;cido f&oacute;lico</strong>&nbsp;distintas&nbsp;<strong>de</strong>&nbsp;la anemia perniciosa.</p>', 100, 0, 'Betancourt', '2023-01-25', 1),
(141, '2222', 'Complejo B B1 20mg+B2 2mg+B6 2mg', 131, '<p>Estas vitaminas&nbsp;<strong>ayudan al proceso que hace su cuerpo para obtener energ&iacute;a de la comida que usted consume.</strong>&nbsp;<strong>Tambi&eacute;n ayudan a formar gl&oacute;bulos rojos</strong>. Usted puede obtener vitaminas B en las prote&iacute;nas como pescado, pollo, carne de res, huevos y productos l&aacute;cteos.</p>', 76, 0, 'Betancourt', '2023-01-27', 1),
(142, '545', 'Esparadrapo 5cm x 4,5cm', 22, '<p>Su&nbsp;<strong>definici&oacute;n</strong>&nbsp;es muy sencilla, material de tejido resistente compuesto, por un lado, de una cara adhesiva empleada&nbsp;<strong>para</strong>&nbsp;sujetar vendajes o gasas a la piel, inmovilizar una zona o ejercer presi&oacute;n, y por la otra cara, diferentes materiales no adherentes.ins</p>', 1, 0, 'Betancourt', '2023-01-25', 1),
(143, '56', 'Baja Lengua / Madera-Adultos', 22, '<p><strong>Instrumento m&eacute;dico para deprimir la lengua y poder examinar la boca y la garganta</strong>. En medicina se puede utilizar para otros prop&oacute;sitos diagn&oacute;sticos y terap&eacute;uticos como: examen de parpado, primeros auxilios, e inmovilizaci&oacute;n de fracturas o luxaciones de los dedos.</p>', 300, 0, 'Betancourt', '2023-01-25', 1),
(144, '888', 'BIberón / 2 OZ. Mamadera', 22, '<p>El&nbsp;<em>biber&oacute;n</em>&nbsp;tiene&nbsp;<em>2</em>&nbsp;usos: Para Reci&eacute;n Nacidos con tetina talla S &ndash; Es liviano, ideal para usar dentro de casa</p>\r\n<p>Tetera anat&oacute;mica reci&eacute;n nacido de silic&oacute;n grado alimenticio, con alas que se adaptan a las comisuras de la boca de tu beb&eacute;. Protector RBD entintado. Flujo lento&nbsp;</p>', 6, 0, 'Betancourt', '2023-01-25', 1),
(145, '8888', 'Biberón / 50ml 0-3 meses', 22, '<p>El Mini&nbsp;<em>Biber&oacute;n</em>&nbsp;de tetina Perist&aacute;ltica de la marca Pigeon, tiene una capacidad de&nbsp;<em>50ml</em>&nbsp;y es la opci&oacute;n m&aacute;s higi&eacute;nica para tu beb&eacute; reci&eacute;n nacido,&nbsp;</p>', 11, 0, 'Betancourt', '2023-01-25', 1),
(146, '77', 'Heparin Cap', 22, '<p>El Mini&nbsp;<em>Biber&oacute;n</em>&nbsp;de tetina Perist&aacute;ltica de la marca Pigeon, tiene una capacidad de&nbsp;<em>50ml</em>&nbsp;y es la opci&oacute;n m&aacute;s higi&eacute;nica para tu beb&eacute; reci&eacute;n nacido,&nbsp;</p>', 19, 0, 'Betancourt', '2023-01-25', 1),
(147, '80', 'Gentamicina 80mg Amp.', 67, '<p>GENTAMICINA es un&nbsp;<strong>antibi&oacute;tico aminogluc&oacute;sido de amplio espectro</strong>. Act&uacute;a sobre bacterias gramnegativas aerobias, incluyendo enterobacteri&aacute;ceas, Pseudomonas y Haemophilus.</p>\r\n<p>La inyecci&oacute;n de&nbsp;<strong>gentamicina</strong>&nbsp;se usa para tratar algunas infecciones graves&nbsp;<strong>que</strong>&nbsp;son provocadas por bacterias como la meningitis (infecci&oacute;n de las membranas&nbsp;<strong>que</strong>&nbsp;rodean el cerebro y la columna vertebral) as&iacute; como infecciones de la sangre, abdomen (&aacute;rea del est&oacute;mago), pulmones, piel, huesos, articulacionese infecciones del .</p>', 2, 0, 'Betancourt', '2023-01-27', 1),
(148, '60', 'Ketorolaco Trometamina 60mg/2ml Amp.', 132, '<p>El ketorolaco es un antiinflamatorio no esteroideo de la familia de los derivados heteroc&iacute;clicos del &aacute;cido ac&eacute;tico, con frecuencia usado como antipir&eacute;tico, antiinflamatorio y analg&eacute;sico.​​ Es el primer AINE para uso endovenoso y act&uacute;a inhibiendo la s&iacute;ntesis de prostaglandinas.</p>', 1, 0, 'Betancourt', '2023-01-27', 1),
(149, '001', 'prueba', 50, '', 1000, 75, 'V&C MEDICAMENTOS', '2023-01-27', 1),
(150, '16', 'Hemosuctor # 16', 133, '<p>&nbsp;El&nbsp;<strong>Hemosuctor</strong>&nbsp;premium es un evacuador descartable de fluidos acumulados en heridas cerradas.</p>', 12, 0, 'Betancourt', '2023-01-28', 1),
(151, '50', 'Lancetas y Tiras P / Glucómetro', 22, '<p>La&nbsp;<strong>tira reactiva</strong>&nbsp;es donde se coloca la muestra de sangre para que el gluc&oacute;metro la pueda medir la glucosa. El pinchador servir&aacute; para obtener la muestra de sangre, mediante una&nbsp;<strong>lanceta</strong>&nbsp;(aguja) que se encuentra en su interior\", precisa la experta.</p>', 5, 0, 'Betancourt', '2023-01-28', 1),
(152, '4444', 'Frasco P/Heces Fecales', 22, '<p><em>Frasco para</em>&nbsp;la recogida de&nbsp;<em>heces</em>&nbsp;&middot; Material del tap&oacute;n: polietileno. Cierre herm&eacute;tico.&nbsp;<em>Frasco</em>&nbsp;en polipropileno de alta transparencia. Esp&aacute;tula en poliestireno.</p>', 1, 0, 'Betancourt', '2023-01-28', 1),
(153, '15', 'Bisturí #15', 22, '<p><strong>Cuchillo peque&ntilde;o y delgado que se usa durante una cirug&iacute;a</strong>. Tambi&eacute;n se llama bistur&iacute; fr&iacute;o y escalpelo.</p>\r\n<p>Hojas para&nbsp;<em>bistur&iacute;</em>&nbsp;est&eacute;riles y desechables N&uacute;mero&nbsp;<em>15</em>: &middot; Fabricadas en acero y envasadas individualmente. &middot; Ideal para hacer incisiones cortas y precisas.</p>', 52, 0, 'Betancourt', '2023-01-28', 1),
(154, '21', 'Bisturí #21', 22, '<p><strong>Cuchillo peque&ntilde;o y delgado que se usa durante una cirug&iacute;a</strong>. Tambi&eacute;n se llama bistur&iacute; fr&iacute;o y escalpelo.</p>\r\n<p>Hojas de&nbsp;<em>bistur&iacute;</em>&nbsp;del n&ordm;&nbsp;<em>21</em>, fabricadas en acero inoxidable, indicada para el mango n&ordm; 4. Son est&eacute;riles y desechables, utilizandose para la cirug&iacute;a&nbsp;</p>', 97, 0, 'Betancourt', '2023-01-28', 1),
(155, '1075', 'Hilo Lino Quirúrgico 10 x 75cm', 111, '<p>La sutura de&nbsp;<em>Lino</em>&nbsp;es una sutura&nbsp;<em>quir&uacute;rgica</em>&nbsp;de tipo no absorbible de origen vegetal. Sus fibras son procesadas resultando en&nbsp;<em>hilos</em>&nbsp;de polifilamentos de color&nbsp;</p>\r\n<p>Definici&oacute;n de&nbsp;<strong>Sutura</strong>: Sutura es el material destinado a favorecer la cicatrizaci&oacute;n de una herida, manteniendo los bordes aproximados de forma que disminuya la tensi&oacute;n entre ellos.</p>', 21, 0, 'Betancourt', '2023-01-28', 1),
(156, '31', 'Transpore 3M / 1,25cm', 22, '<p><strong>Cinta adhesiva hipoalerg&eacute;nica y libre de l&aacute;tex</strong>. Es suave con la piel y reduce la posibilidad de irritaci&oacute;n de la misma. Su respaldo microporoso permite el funcionamiento normal de la piel.</p>\r\n<p>Microfoam es una cinta quir&uacute;rgica compuesta de un respaldo formado principalmente de espuma cerrada de cloruro de polivinilo (PVC) y un adhesivo hipoalerg&eacute;nico, esta combinaci&oacute;n convierte a la cinta Microfoam en la clave para&nbsp;<strong>proporcionar el soporte y elasticidad necesarios para vendajes de compresi&oacute;n</strong>.</p>', 19, 0, 'Betancourt', '2023-01-28', 1),
(157, '64', 'Bolsa De Colostomía 64mm', 22, '<p>Una bolsa de colostom&iacute;a&nbsp;<strong>se adhiere al estoma para recoger los desechos</strong>.</p>\r\n<p>&Eacute;ste consiste en una&nbsp;<em>bolsa</em>&nbsp;liviana con drenaje que colecta las evacuaciones y protege a la piel del contacto con la materia fecal.&nbsp;</p>', 1, 0, 'Betancourt', '2023-01-28', 1),
(158, '42', 'Terbometasona 4mg/2ml Dexametasona', 63, '<p>La dexametasona es un&nbsp;<strong>corticosteroide</strong>, es decir, es similar a una hormona natural producida por las gl&aacute;ndulas suprarrenales. Por lo general, se usa para reemplazar este producto qu&iacute;mico cuando su cuerpo no fabrica suficiente.</p>\r\n<p>Dexametasona Kern Pharma 4 mg/ml soluci&oacute;n inyectable pertenece al grupo terap&eacute;utico&nbsp;<strong>H02AB02</strong>. La dexametasona es un corticoide fluorado, de larga duraci&oacute;n de acci&oacute;n, de elevada potencia antiinflamatoria e inmunosupresora y baja actividad mineralocorticoide.</p>', 3, 0, 'Betancourt', '2023-01-30', 1);
INSERT INTO `ha_medicine` (`id`, `code`, `name`, `category_id`, `description`, `quantity`, `price`, `manufactured_by`, `create_date`, `status`) VALUES
(159, '101', 'Bisturí #10', 22, '<p>Las hojas de bistur&iacute; de n&uacute;mero 10 son de las m&aacute;s utilizadas. Se trata de una&nbsp;<strong>hoja de acero que posee un borde cortante curvo en uno de sus lados y se adapta a distintos tipos de mangos</strong>.</p>\r\n<p><strong>Cuchillo peque&ntilde;o y delgado que se usa durante una cirug&iacute;a</strong>. Tambi&eacute;n se llama bistur&iacute; fr&iacute;o y escalpelo.</p>', 96, 0, 'Betancourt', '2023-01-30', 1),
(160, '22', 'Bisturí #22', 22, '<p><strong>Cuchillo peque&ntilde;o y delgado que se usa durante una cirug&iacute;a</strong>. Tambi&eacute;n se llama bistur&iacute; fr&iacute;o y escalpelo.</p>\r\n<p>La hoja n&ordm;&nbsp;<em>22</em>&nbsp;es una versi&oacute;n alargada de la hoja de uso com&uacute;n n&ordm; 10. Se utiliza preferentemente para realizar incisiones en cirug&iacute;as generales, cardiacas&nbsp;</p>', 194, 0, 'Betancourt', '2023-01-30', 1),
(161, '505', 'Neocaína Pesada 0,50% (5mg/ml', 118, '<p>Anest&eacute;sico local; bloquea la propagaci&oacute;n del impulso nervioso impidiendo la entrada de iones Na&nbsp;<sup>+</sup>&nbsp;a trav&eacute;s de la membrana nerviosa.</p>\r\n<p><strong>La soluci&oacute;n de lidoca&iacute;na hipob&aacute;rica proporciona una analgesia con la misma dispersi&oacute;n de la bupivaca&iacute;na, pero con menor duraci&oacute;n</strong>. Las mayores ventajas incluyen una estabilidad hemodin&aacute;mica y la ausencia de bloqueo motor.</p>', 1, 0, 'Betancourt', '2023-01-30', 1),
(162, '12', 'Vitamina K - Fitomenadiiona 1ml ', 32, '<p>La&nbsp;<strong>fitomenadiona</strong>&nbsp;(vitamina K) se usa para prevenir las hemorragias en personas con problemas de coagulaci&oacute;n o con muy poca vitamina K en el cuerpo. La fitomenadiona pertenece a una clase de medicamentos llamados vitaminas.</p>\r\n<p>La&nbsp;<em>vitamina K</em>&nbsp;se conoce como la vitamina de la coagulaci&oacute;n. Sin ella la sangre no coagular&iacute;a. Algunos estudios sugieren que ayuda a que los adultos mayores&nbsp;.</p>', 151, 0, 'Betancourt', '2023-01-30', 1),
(163, '4', 'Suturas Mononylon # 4/0 (45cm/SC-20) 3/8', 111, '<p>&nbsp;El mononylon, es un&nbsp;<strong>material sint&eacute;tico, no absorbible, monofilamento, compuesto por nylon y un pol&iacute;mero de poliamida, resultante de la interacci&oacute;n de un &aacute;cido dicarbox&iacute;lico y una diamida</strong>, tiene una fuerza de tensi&oacute;n alta, buena elasticidad y una m&iacute;nima reacci&oacute;n de tejido; presentando el inconveniente de poseer memoria,&nbsp;</p>', 25, 0, 'Betancourt', '2023-01-30', 1),
(164, '40', 'Suturas Mononylon # 4/0 (75cm/25mm) 1/2', 111, '<p>El mononylon, es un&nbsp;<strong>material sint&eacute;tico, no absorbible, monofilamento, compuesto por nylon y un pol&iacute;mero de poliamida, resultante de la interacci&oacute;n de un &aacute;cido dicarbox&iacute;lico y una diamida</strong>, tiene una fuerza de tensi&oacute;n alta, buena elasticidad y una m&iacute;nima reacci&oacute;n de tejido; presentando el inconveniente de poseer memoria,&nbsp;</p>', 22, 0, 'Betancourt', '2023-01-30', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ha_operation`
--

CREATE TABLE `ha_operation` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `patient_id` varchar(30) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inc_insurance`
--

CREATE TABLE `inc_insurance` (
  `id` int(11) NOT NULL,
  `insurance_name` varchar(255) DEFAULT NULL,
  `service_tax` varchar(50) DEFAULT NULL,
  `discount` varchar(50) DEFAULT NULL,
  `remark` text,
  `insurance_no` varchar(50) DEFAULT NULL,
  `insurance_code` varchar(50) DEFAULT NULL,
  `disease_charge` text COMMENT 'array(name, charge)',
  `hospital_rate` varchar(50) DEFAULT NULL,
  `insurance_rate` varchar(50) DEFAULT NULL,
  `total` varchar(50) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inc_limit_approval`
--

CREATE TABLE `inc_limit_approval` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(30) DEFAULT NULL,
  `room_no` varchar(100) DEFAULT NULL,
  `disease_details` text COMMENT 'name, description',
  `consultant_id` int(11) DEFAULT NULL COMMENT 'doctor list',
  `policy_name` varchar(255) DEFAULT NULL,
  `policy_no` varchar(100) DEFAULT NULL,
  `policy_holder_name` varchar(255) DEFAULT NULL,
  `insurance_id` int(11) DEFAULT NULL,
  `approval_breakup` text COMMENT 'name, charge',
  `total` varchar(50) DEFAULT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio_categorias`
--

CREATE TABLE `laboratorio_categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(256) DEFAULT NULL,
  `descripcion` text,
  `estado` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `laboratorio_categorias`
--

INSERT INTO `laboratorio_categorias` (`id`, `nombre`, `descripcion`, `estado`) VALUES
(5, 'Hematología', NULL, '1'),
(6, 'Cuagulograma', NULL, '1'),
(7, 'Bioquimico sanguinea', NULL, '1'),
(8, 'Uroanalisis', NULL, '1'),
(9, 'Heces fecales', NULL, '1'),
(10, 'Serología inmunológica', NULL, '1'),
(11, 'Exámenes especiales', NULL, '1'),
(12, 'Marcadores tumorales', NULL, '1'),
(13, 'Hormonas', NULL, '1'),
(14, 'Drogas estupefaciente', NULL, '1'),
(15, 'Bacteriologia', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio_examenes`
--

CREATE TABLE `laboratorio_examenes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(256) DEFAULT NULL,
  `categoria` varchar(256) DEFAULT NULL,
  `valor_referencia` varchar(256) DEFAULT NULL,
  `precio` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `laboratorio_examenes`
--

INSERT INTO `laboratorio_examenes` (`id`, `nombre`, `categoria`, `valor_referencia`, `precio`) VALUES
(5, 'Hemograma completo', '5', '50', '50'),
(6, 'Hematocrito', '5', '10', '10'),
(7, 'Hemoglobina', '5', '10', '10'),
(8, 'Eritrosedimentacion', '5', '15', '15'),
(9, 'Reticulocitos', '5', '45', '45'),
(10, 'Grupo Sanguíneo y factor RH', '5', '30', '30'),
(11, 'Celulas LE', '5', '160', '160'),
(12, 'Coombs directo', '5', '60', '60'),
(13, 'Coombs Indirecto', '5', '60', '60'),
(14, 'Inv. Plasmodium (gota gruesa)', '5', '35', '35'),
(15, 'Inv. T. Cruzi', '5', '30', '30'),
(16, 'Recuento de plaquetas', '6', '45', '45'),
(17, 'T. sangria y coagulacion', '6', '30', '30'),
(18, 'T. de protombina', '6', '50', '50'),
(19, 'T. de Tromboplastia P. Activa', '6', '70', '70'),
(20, 'T. bifrignogeno', '6', '80', '80'),
(21, 'Magnesio', '5', '40', '40'),
(22, 'Hierro Serico', '5', '100', '100'),
(23, 'Ferritina', '5', '300', '300'),
(24, 'Transferimina', '5', '160', '160'),
(26, 'Bilirrubina', '5', '35', '35'),
(27, 'Transaminasas GPT', '5', '35', '35'),
(28, 'Transaminasas GOT', '5', '35', '35'),
(29, 'Gama Glutamil Transferasa', '5', '50', '50'),
(30, 'Amilasa', '5', '35', '35'),
(31, 'Lipasa', '5', '40', '40'),
(32, 'Fosfatasa Alcalina', '5', '30', '30'),
(35, 'Deshidrogenasa Lactica LDH', '5', '100', '100'),
(36, 'Creatin fosfo kinasa CPK', '5', '120', '120'),
(37, 'CK-MB', '5', '120', '120'),
(38, 'Troponina Cardica', '5', '180', '180'),
(40, 'Glucosa', '7', '25', '25'),
(41, 'Glucosa 24 hrs Post-Pandrial', '7', '30', '30'),
(42, 'Curva Tolerancia a la Glucosa', '7', '125', '125'),
(43, 'Hemoglobina Glicosilada', '7', '190', '190'),
(44, 'Urea', '7', '35', '35'),
(45, 'Creatinina', '7', '35', '35'),
(46, 'Colesterol', '7', '35', '35'),
(47, 'HDL Colesterol', '7', '35', '35'),
(48, 'LDL Colesterol', '7', '35', '35'),
(49, 'VLDL Colesterol', '7', '35', '35'),
(50, 'Triglicerios', '7', '35', '35'),
(51, 'Acido Urico', '7', '30', '30'),
(52, 'Lipidos totales, Fosfolipidos', '7', '35', '35'),
(54, 'Proteinograma (electroforesis)', '7', '100', '100'),
(55, 'Proteínas totales', '7', '35', '35'),
(56, 'Albuminas', '7', '35', '35'),
(57, 'Globulinas', '7', '25', '25'),
(58, 'Sodio', '7', '35', '35'),
(59, 'Potasio', '7', '35', '35'),
(60, 'Cloro', '7', '35', '35'),
(61, 'Calcio Serico', '7', '35', '35'),
(62, 'Calcio Ionico', '7', '40', '40'),
(63, 'magnesio', '7', '40', '40'),
(64, 'Fosforo', '7', '35/100', '35/100'),
(77, 'Orina Completa', '8', '30', '30'),
(78, 'Glucosuria', '8', '210', '210'),
(79, 'Urea', '8', '200', '200'),
(80, 'Proteinuria', '8', '200', '200'),
(81, 'Proteinura en 24 hrs', '8', '100', '100'),
(82, 'Microalbuminaria', '8', '120', '120'),
(89, 'Parasitologico simple', '9', '20', '20'),
(90, 'Parasitologico seriado', '9', '60', '60'),
(92, 'Moco fecal', '9', '40', '40'),
(93, 'Sangre oculta', '9', '40', '40'),
(94, 'PH fecal', '9', '15', '15'),
(96, 'Rota virus', '9', '120', '120'),
(97, 'Copro cultivo', '9', '150', '150'),
(98, 'Helicobacter Pylori Heces', '9', '110', '110'),
(99, 'Proteína C reactiva', '10', '40', '40'),
(100, 'Latex RA', '10', '40', '40'),
(102, 'VDRL', '10', '70', '70'),
(104, 'Reaccion de Widal', '10', '50', '50'),
(108, 'Hai chazas', '10', '50', '50'),
(109, 'Inmunochagas IGG', '10', '120', '120'),
(110, 'Inmunochas IGM', '10', '120', '120'),
(114, 'HAI toxoplasmosis', '10', '100', '100'),
(115, 'Inmutoxoplasmosis IGG', '10', '120', '120'),
(116, 'Inmunotoxoplasmosis IGM', '10', '120', '120'),
(117, 'Toxoplasmosis Elisa IGG', '10', '150', '150'),
(118, 'Toxoplasmosis Elisa IGM', '10', '150', '150'),
(119, 'HIV sida', '10', '100', '100'),
(122, 'Tuberculosis Elisa IGM', '10', '9', '9'),
(124, 'Herpes IGM IGG', '10', '300', '300'),
(126, 'Clamídía IGM IGG', '10', '300', '300'),
(128, 'Helícobecter Pylori IGM IGG', '10', '100', '100'),
(130, 'Hepatitis A IGM IGG', '10', '100', '100'),
(131, '', '10', '120', '120'),
(132, 'Hepatitis B Antí \"E\"', '10', '100', '100'),
(133, 'Hepatitis B -Core HBC', '10', '150', '150'),
(134, 'Hepatitis C', '10', '150', '150'),
(141, 'Factor antinuclear (FAN)', '10', '160', '160'),
(143, 'Ana (elisa)', '10', '300', '300'),
(148, 'Cortisol Basal horas 16 pm', '10', '180', '180'),
(168, 'Papanícolau', '11', '150', '150'),
(169, 'Gasometría', '11', '300', '300'),
(173, 'CA 125', '12', '150', '150'),
(174, 'CA 19-9', '12', '150', '150'),
(175, 'CA 15-3', '12', '150', '150'),
(176, 'T3', '13', '120', '120'),
(177, 'T4', '13', '120', '120'),
(178, 'Tsh', '13', '120', '120'),
(179, 'T 4 líbre', '13', '150', '150'),
(180, 'Resistencia a la insulina', '13', '450', '450'),
(190, 'Prolactina PRL', '13', '160', '160'),
(191, 'Gonadotrofina Corionica Beta B-', '13', '160', '160'),
(192, 'Gonadotrofina Corionica Beta-', '13', '160', '160'),
(194, 'Gonadotrofina Corionica Beta B-', '13', '160', '160'),
(199, 'PROCALCITONINA', '13', '600', '600'),
(200, 'prueba rapida de sangre para co', '13', '140', '140'),
(201, 'OSMOLARIDAD PLASMATICA', '13', '400', '400'),
(202, 'ANA ELISA', '13', '300', '300'),
(203, 'ANTIDNA ELISA', '13', '350', '350'),
(204, 'DENGUE IGM/IGG', '13', '210', '210'),
(205, 'Papanicolau', '13', '120', '120'),
(206, 'CALCITONIVA', '13', '600', '600'),
(207, 'FIBRILOGENO', '13', '120', '120'),
(208, 'PROLACTININA', '13', '120', '120'),
(209, 'Test de marihuana', '14', '450', '450'),
(210, 'Test de cocaina', '14', '500', '500'),
(211, '*', '15', '100', '100'),
(212, 'Coprocultivo y antibiograma', '15', '100', '100'),
(213, 'Hemocultivo y antibiograma', '15', '150', '150'),
(214, 'Sec. Vaginal cultivo antibiograma', '15', '100', '100'),
(215, 'Sec. Vaginal bacteriologico', '15', '100', '100'),
(216, 'Sec. Uretral bacteriologico', '15', '100', '100'),
(217, 'Sec. Uretral cultv. Antib .', '15', '100', '100'),
(218, 'Basiloscopia simple', '15', '150', '150'),
(219, 'Basiloscopia serida', '15', '200', '200'),
(220, 'CULTIVO + ATB SECRECION HERIDA               Cultivo bacteriologico…', '15', '160', '160'),
(222, 'Elisa', '15', '350', '350'),
(223, 'Dímero D', '15', '300', '300'),
(224, 'Sec. Bronquial bacteriologico', '15', '120', '120'),
(225, 'AMONIO EN SANGRE', '15', '700', '700');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio_solicitudes`
--

CREATE TABLE `laboratorio_solicitudes` (
  `id` int(11) NOT NULL,
  `paciente` int(11) DEFAULT NULL,
  `internacion` varchar(256) DEFAULT NULL,
  `examenes` text,
  `fecha` datetime DEFAULT NULL,
  `estado` varchar(256) DEFAULT NULL,
  `code` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `language`
--

CREATE TABLE `language` (
  `id` int(11) UNSIGNED NOT NULL,
  `phrase` text NOT NULL,
  `english` text,
  `Español` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `language`
--

INSERT INTO `language` (`id`, `phrase`, `english`, `Español`) VALUES
(1, 'email', 'Email Address', 'Correo electrónico'),
(2, 'password', 'Password', 'Contraseña'),
(3, 'login', 'Log In', 'Iniciar sesión'),
(4, 'incorrect_email_password', 'Incorrect Email/Password!', '¡Correo electrónico/contraseña incorrectos!'),
(5, 'user_role', 'User Role', 'Rol del usuario'),
(6, 'please_login', 'Please Log In', 'Por favor Iniciar sesión'),
(7, 'setting', 'Setting', 'Configuración'),
(8, 'profile', 'Profile', 'Perfil'),
(9, 'logout', 'Log Out', 'Cerrar sesión'),
(10, 'please_try_again', 'Please Try Again', 'Inténtalo de nuevo'),
(11, 'admin', 'Admin', 'Administración'),
(12, 'doctor', 'Doctor', 'Doctor'),
(13, 'representative', 'Representative', 'Representante'),
(14, 'dashboard', 'Dashboard', 'Panel'),
(15, 'department', 'Department', 'Departamento'),
(16, 'add_department', 'Add Department', 'Agregar departamento'),
(17, 'department_list', 'Department List', 'Lista de departamentos'),
(18, 'add_doctor', 'Add Doctor', 'Añadir médico'),
(19, 'doctor_list', 'Doctor List', 'Lista de médicos'),
(20, 'add_representative', 'Add Representative', 'Agregar representante'),
(21, 'representative_list', 'Representative List', 'Lista representativa'),
(22, 'patient', 'Patient', 'Paciente'),
(23, 'add_patient', 'Add Patient', 'Añadir paciente'),
(24, 'patient_list', 'Patient List', 'Lista de pacientes'),
(25, 'schedule', 'Schedule', 'Calendario'),
(26, 'add_schedule', 'Add Schedule', 'Añadir horario'),
(27, 'schedule_list', 'Schedule List', 'Lista de horarios'),
(28, 'appointment', 'Appointment', 'Cita'),
(29, 'add_appointment', 'Add Appointment', 'Agregar cita'),
(30, 'appointment_list', 'Appointment List', 'Lista de citas'),
(31, 'enquiry', 'Enquiry', 'Consulta'),
(32, 'language_setting', 'Language Setting', 'Configuración de idioma'),
(33, 'appointment_report', 'Appointment Report', 'Informe de citas'),
(34, 'assign_by_all', 'Assign by All', 'Asignar por todos'),
(35, 'assign_by_doctor', 'Assign by Doctor', 'Asignar por Doctor'),
(36, 'assign_to_doctor', 'Assign to Doctor', 'Asignar al médico'),
(37, 'assign_by_representative', 'Assign by Representative', 'Asignar por representante'),
(38, 'report', 'Report', 'Reporte'),
(39, 'assign_by_me', 'Assign by Me', 'Asignado por mí'),
(40, 'assign_to_me', 'Assign to Me', 'Asignarme'),
(41, 'website', 'Website', 'Sitio web'),
(42, 'slider', 'Slider', 'Deslizador'),
(43, 'section', 'Section', 'Sección'),
(44, 'section_item', 'Section Item', 'Artículo de la sección'),
(45, 'comments', 'Comment', 'Comentario'),
(46, 'latest_enquiry', 'Latest Enquiry', 'Consulta más reciente'),
(47, 'total_progress', 'Total Progress', 'Progreso total'),
(48, 'last_year_status', 'Showing status from the last year', 'Mostrando el estado del último año'),
(49, 'department_name', 'Department Name', 'Nombre de Departamento'),
(50, 'description', 'Description', 'Descripción'),
(51, 'status', 'Status', 'Estado'),
(52, 'active', 'Active', 'Activo'),
(53, 'inactive', 'Inactive', 'Inactivo'),
(54, 'cancel', 'Cancel', 'Cancelar'),
(55, 'save', 'Save', 'Guardar'),
(56, 'serial', 'SL', 'ID'),
(57, 'action', 'Action', 'Acción'),
(58, 'edit', 'Edit ', 'Editar'),
(59, 'delete', 'Delete', 'Borrar'),
(60, 'save_successfully', 'Save Successfully!', 'Guardado con éxito!'),
(61, 'update_successfully', 'Update Successfully!', '¡Actualizar correctamente!'),
(62, 'department_edit', 'Department Edit', 'Departamento Editar'),
(63, 'delete_successfully', 'Delete successfully!', '¡Eliminar con éxito!'),
(64, 'are_you_sure', 'Are You Sure ? ', 'Está seguro ?'),
(65, 'first_name', 'First Name', 'Primer nombre'),
(66, 'last_name', 'Last Name', 'Apellido'),
(67, 'phone', 'Phone No', 'Telefono Fijo'),
(68, 'mobile', 'Mobile No', 'Nro Whatsapp'),
(69, 'blood_group', 'Blood Group', 'Grupo sanguíneo'),
(70, 'gender', 'Gender', 'Género'),
(71, 'date_of_birth', 'Date of Birth', 'Fecha de nascimiento'),
(72, 'address', 'Address', 'Dirección'),
(73, 'invalid_picture', 'Invalid Picture', 'Imagen invalida'),
(74, 'doctor_profile', 'Doctor Profile', 'Perfil del médico'),
(75, 'edit_profile', 'Edit Profile', 'Editar perfil'),
(76, 'edit_doctor', 'Edit Doctor', 'Editar médico'),
(77, 'designation', 'Designation', 'Designacion'),
(78, 'short_biography', 'Short Biography', 'Biografia corta'),
(79, 'picture', 'Picture', 'Imagen'),
(80, 'specialist', 'Specialist', 'Especialista'),
(81, 'male', 'Male', 'Masculino'),
(82, 'female', 'Female', 'Femenino'),
(83, 'education_degree', 'Education/Degree', 'Grado de educación'),
(84, 'create_date', 'Create Date', 'Fecha de Creación'),
(85, 'view', 'View', 'Ver'),
(86, 'doctor_information', 'Doctor Information', 'Información del médico'),
(87, 'update_date', 'Update Date', 'Fecha de actualización'),
(88, 'print', 'Print', 'Imprimir'),
(89, 'representative_edit', 'Representative Edit', 'Editar Representante'),
(90, 'patient_information', 'Patient Information', 'Información del paciente'),
(91, 'other', 'Other', 'Otro'),
(92, 'patient_id', 'Patient ID', 'Hist. Clinica del paciente'),
(93, 'age', 'Age', 'Edad'),
(94, 'patient_edit', 'Patient Edit', 'Editar Paciente '),
(95, 'id_no', 'ID No.', 'História Clinica'),
(96, 'select_option', 'Select Option', 'Seleccionar opción'),
(97, 'doctor_name', 'Doctor Name', 'Nombre del médico'),
(98, 'day', 'Day', 'Día'),
(99, 'start_time', 'Start Time', 'Hora de inicio'),
(100, 'end_time', 'End Time', 'Hora de finalización'),
(101, 'per_patient_time', 'Per Patient Time', 'Por tiempo de paciente'),
(102, 'serial_visibility_type', 'Serial Visibility', 'Visibilidad en serie'),
(103, 'sequential', 'Sequential', 'Secuencial'),
(104, 'timestamp', 'Timestamp', 'marca de tiempo'),
(105, 'available_days', 'Available Days', 'Días disponibles'),
(106, 'schedule_edit', 'Schedule Edit', 'Editar Agendamento'),
(107, 'available_time', 'Available Time', 'Tiempo disponible'),
(108, 'serial_no', 'Serial No', 'ID'),
(109, 'problem', 'Problem', 'Motivo de la Consulta'),
(110, 'appointment_date', 'Appointment Date', 'Día de la cita'),
(111, 'you_are_already_registered', 'You are already registered!', '¡Ya está registrado!'),
(112, 'invalid_patient_id', 'Invalid patient ID', 'ID de paciente no válido'),
(113, 'invalid_input', 'Invalid Input', 'Entrada inválida'),
(114, 'no_doctor_available', 'No Doctor Available', 'No hay médico disponible'),
(115, 'invalid_department', 'Invalid Department!', '¡Departamento inválido!'),
(116, 'no_schedule_available', 'No Schedule Available', 'Sin horario disponible'),
(117, 'please_fillup_all_required_fields', 'Please fillup all required filelds', 'Por favor complete todos los campos requeridos'),
(118, 'appointment_id', 'Appointment ID', 'Identificación de cita'),
(119, 'schedule_time', 'Schedule Time', 'Tiempo programado'),
(120, 'appointment_information', 'Appointment Information', 'Información de la cita'),
(121, 'full_name', 'Full Name', 'Nombre completo'),
(122, 'read_unread', 'Read / Unread', 'Leído / No leído'),
(123, 'date', 'Date', 'Fecha'),
(124, 'ip_address', 'IP Address', 'Dirección IP'),
(125, 'user_agent', 'User Agent', 'Agente de usuario'),
(126, 'checked_by', 'Checked By', 'Revisado por'),
(127, 'enquiry_date', 'Enquirey Date', 'Fecha de consulta'),
(128, 'enquiry_list', 'Enquiry List', 'Lista de consultas'),
(129, 'filter', 'Filter', 'Filtrar'),
(130, 'start_date', 'Start Date', 'Fecha de inicio'),
(131, 'end_date', 'End Date', 'Fecha final'),
(132, 'application_title', 'Application Title', 'Titulo de la aplicación'),
(133, 'favicon', 'Favicon', 'icono de favoritos'),
(134, 'logo', 'Logo', 'Logo'),
(135, 'footer_text', 'Footer Text', 'Texto de pie de página'),
(136, 'language', 'Language', 'Idioma'),
(137, 'appointment_assign_by_all', 'Appointment Assign by All', 'Cita asignada por todos'),
(138, 'appointment_assign_by_doctor', 'Appointment Assign by Doctor', 'Asignación de cita por médico'),
(139, 'appointment_assign_by_representative', 'Appointment Assign by Representative', 'Asignación de cita por representante'),
(140, 'appointment_assign_to_all_doctor', 'Appointment Assign to All Doctor', 'Asignar cita a todos los médicos'),
(141, 'appointment_assign_to_me', 'Appointment Assign to Me', 'Asignar cita a mí'),
(142, 'appointment_assign_by_me', 'Appointment Assign by Me', 'Cita asignada por mí'),
(143, 'type', 'Type', 'Tipo'),
(144, 'website_title', 'Website Title', 'Título de la página'),
(145, 'invalid_logo', 'Invalid Logo', 'Logotipo no válido'),
(146, 'details', 'Details', 'Detalles'),
(147, 'website_setting', 'Website Setting', 'Configuración del sitio web'),
(148, 'submit_successfully', 'Submit Successfully!', '¡Enviado con éxito'),
(149, 'application_setting', 'Application Setting', 'Configuración de la aplicación'),
(150, 'invalid_favicon', 'Invalid Favicon', 'Favicon no válido'),
(151, 'new_enquiry', 'New Enquiry', 'Nueva Consulta'),
(152, 'information', 'Information', 'Información'),
(153, 'home', 'Home', 'Inicio'),
(154, 'select_department', 'Select Department', 'Seleccionar Especialidad'),
(155, 'select_doctor', 'Select Doctor', 'Seleccionar médico'),
(156, 'select_representative', 'Select Representative', 'Seleccionar representante'),
(157, 'post_id', 'Post ID', 'ID del mensaje'),
(158, 'thank_you_for_your_comment', 'Thank you for your comment!', '¡Gracias por tu comentario!'),
(159, 'comment_id', 'Comment ID', 'ID de comentario'),
(160, 'comment_status', 'Comment Status', 'Estado del comentario'),
(161, 'comment_added_successfully', 'Comment Added Successfully', 'Comentario agregado con éxito'),
(162, 'comment_remove_successfully', 'Comment Remove Successfully', 'Comentar Eliminar con éxito'),
(163, 'select_item', 'Section Item', 'Artículo de la sección'),
(164, 'add_item', 'Add Item', 'Añadir artículo'),
(165, 'menu_name', 'Menu Name', 'Nombre del menú'),
(166, 'title', 'Title', 'Título'),
(167, 'position', 'Position', 'Posición'),
(168, 'invalid_icon_image', 'Invalid Icon Image!', '¡Imagen de icono no válida!'),
(169, 'about', 'About', 'Acerca de'),
(170, 'blog', 'Blog', 'Blog'),
(171, 'service', 'Service', 'Servicio'),
(172, 'item_edit', 'Item Edit', 'Editar elemento'),
(173, 'registration_successfully', 'Registration Successfully', 'Registro Exitoso'),
(174, 'add_section', 'Add Section', 'Agregar sección'),
(175, 'section_name', 'Section Name', 'Nombre de la sección'),
(176, 'invalid_featured_image', 'Invalid Featured Image!', '¡Imagen destacada no válida!'),
(177, 'section_edit', 'Section Edit', 'Sección Editar'),
(178, 'meta_description', 'Meta Description', 'Metadescripción'),
(179, 'twitter_api', 'Twitter Api', 'API de Twitter'),
(180, 'google_map', 'Google Map', 'Mapa de Google'),
(181, 'copyright_text', 'Copyright Text', 'Texto de derechos de autor'),
(182, 'facebook_url', 'Facebook URL', 'Facebook URL'),
(183, 'twitter_url', 'Twitter URL', 'URL de Twitter'),
(184, 'vimeo_url', NULL, 'Vimeo'),
(185, 'instagram_url', 'Instagram Url', 'URL de Instagram'),
(186, 'dribbble_url', 'Dribbble URL', 'URL de regate'),
(187, 'skype_url', 'Skype URL', 'URL de Skype'),
(188, 'add_slider', 'Add Slider', 'Agregar control deslizante'),
(189, 'subtitle', 'Sub Title', 'Subtítulo'),
(190, 'slide_position', 'Slide Position', 'Posición de la diapositiva'),
(191, 'invalid_image', 'Invalid Image', 'Imagen inválida'),
(192, 'image_is_required', 'Image is required', 'La imagen es requerida'),
(193, 'slider_edit', 'Slider Edit', 'Editar control deslizante'),
(194, 'meta_keyword', 'Meta Keyword', 'Metapalabra clave'),
(195, 'year', 'Year', 'Año'),
(196, 'month', 'Month', 'Mes'),
(197, 'recent_post', 'Recent Post', 'Publicación reciente'),
(198, 'leave_a_comment', 'Leave a Comment', 'Deja un comentario'),
(199, 'submit', 'Submit', 'Entregar'),
(200, 'google_plus_url', 'Google Plus URL', 'URL de Google Plus'),
(201, 'website_status', 'Website Status', 'Estado del sitio web'),
(202, 'new_slide', 'New Slide', 'Nuevo Slider'),
(203, 'new_section', 'New Section', 'Nueva sección'),
(204, 'subtitle_description', 'Sub Title / Description', 'Subtítulo / Descripción'),
(205, 'featured_image', 'Featured Image', 'Foto principal'),
(206, 'new_item', 'New Item', 'Nuevo artículo'),
(207, 'item_position', 'Item Position', 'Posición del artículo'),
(208, 'icon_image', 'Icon Image', 'Imagen del icono'),
(209, 'post_title', 'Post Title', 'Título de la entrada'),
(210, 'add_to_website', 'Add to Website', 'Agregar al sitio web'),
(211, 'read_more', 'Read More', 'Lee mas'),
(212, 'registration', 'Registration', 'Registro'),
(213, 'appointment_form', 'Appointment Form', 'Formulario de cita'),
(214, 'contact', 'Contact', 'Contacto'),
(215, 'optional', 'Optional', 'Opcional'),
(216, 'customer_comments', 'Customer Comments', 'comentarios de clientes'),
(217, 'need_a_doctor_for_checkup', 'Need a Doctor for Check-up?', '¿Necesita un médico para el chequeo?'),
(218, 'just_make_an_appointment_and_you_are_done', 'JUST MAKE AN APPOINTMENT & YOU\'RE DONE ! ', '¡SOLO HAZ UNA CITA Y YA ESTÁS LISTO!'),
(219, 'get_an_appointment', 'Get an appointment', 'Obtener una cita'),
(220, 'latest_news', 'Latest News', 'Últimas noticias'),
(221, 'latest_tweet', 'Latest Tweet', 'Último tuit'),
(222, 'menu', 'Menu', 'Menú'),
(223, 'administrative_user', 'Administrative User', 'Usuario administrativo'),
(224, 'site_align', 'Website Align', 'Alinear sitio web'),
(225, 'right_to_left', 'Right to Left', 'De derecha a izquierda'),
(226, 'left_to_right', 'Left to Right', 'De izquierda a derecha'),
(227, 'account_manager', 'Account Manager', 'Gerente de cuentas'),
(228, 'add_invoice', 'Add Invoice', 'Agregar factura'),
(229, 'invoice_list', 'Invoice List', 'Lista de facturas'),
(230, 'account_list', 'Account List', 'Lista de cuentas'),
(231, 'add_account', 'Add Account', 'Añadir cuenta'),
(232, 'account_name', 'Account Name', 'Nombre de la cuenta'),
(233, 'credit', 'Credit', 'Crédito'),
(234, 'debit', 'Debit', 'Débito'),
(235, 'account_edit', 'Account Edit', 'Editar cuenta'),
(236, 'quantity', 'Quantity', 'Cantidad'),
(237, 'price', 'Price', 'Precio'),
(238, 'total', 'Total', 'Total'),
(239, 'remove', 'Remove', 'Remover'),
(240, 'add', 'Add', 'Agregar'),
(241, 'subtotal', 'Sub Total', 'Subtotal'),
(242, 'vat', 'Vat', 'IVA'),
(243, 'grand_total', 'Grand Total', 'Gran total'),
(244, 'discount', 'Discount', 'Descuento'),
(245, 'paid', 'Paid', 'Pagado'),
(246, 'due', 'Due', 'Vencer'),
(247, 'reset', 'Reset', 'Reiniciar'),
(248, 'add_or_remove', 'Add / Remove', 'Agregar eliminar'),
(249, 'invoice', 'Invoice', 'Factura'),
(250, 'invoice_information', 'Invoice Information', 'Información de la factura'),
(251, 'invoice_edit', 'Invoice Edit', 'Editar factura'),
(252, 'update', 'Update', 'Actualizar'),
(253, 'all', 'All', 'Todos'),
(254, 'patient_wise', 'Patient Wise', 'Paciente sabio'),
(255, 'account_wise', 'Account Wise', 'Cuenta sabia'),
(256, 'debit_report', 'Debit Report', 'Informe de débito'),
(257, 'credit_report', 'Credit Report', 'Reporte de crédito'),
(258, 'payment_list', 'Payment List', 'Lista de pagos'),
(259, 'add_payment', 'Add Payment', 'Agregar pago'),
(260, 'payment_edit', 'Payment Edit', 'Pago Editar'),
(261, 'pay_to', 'Pay To', 'Pagar a'),
(262, 'amount', 'Amount', 'Monto'),
(263, 'bed_type', 'Bed Type', 'Tipo de cama'),
(264, 'bed_limit', 'Bed Capacity', 'Capacidad de la cama'),
(265, 'charge', 'Charge', 'Precio'),
(266, 'bed_list', 'Bed List', 'Lista de camas'),
(267, 'add_bed', 'Add Bed', 'Añadir cama'),
(268, 'bed_manager', 'Bed Manager', 'Gerente de cama'),
(269, 'bed_edit', 'Bed Edit', 'EditarCama'),
(270, 'bed_assign', 'Bed Assign', 'Asignación de cama'),
(271, 'assign_date', 'Assign Date', 'Asignar fecha'),
(272, 'discharge_date', 'Discharge Date', 'Fecha de alta'),
(273, 'bed_assign_list', 'Bed Assign List', 'Lista de asignación de camas'),
(274, 'assign_by', 'Assign By', 'Asignado por'),
(275, 'bed_available', 'Bed is Available', 'La cama está disponible'),
(276, 'bed_not_available', 'Bed is Not Available', 'La cama no está disponible'),
(277, 'invlid_input', 'Invalid Input', 'entrada inválida'),
(278, 'allocated', 'Allocated', 'Asignado'),
(279, 'free_now', 'Free', 'Gratis'),
(280, 'select_only_avaiable_days', 'Select Only Avaiable Days', 'Seleccionar solo días disponibles'),
(281, 'human_resources', 'Human Resources', 'Recursos humanos'),
(282, 'nurse_list', 'Nurse List', 'Lista de enfermeras'),
(283, 'add_employee', 'Add Employee', 'Agregar empleado'),
(284, 'user_type', 'User Type', 'Tipo de usuario'),
(285, 'employee_information', 'Employee Information', 'información del empleado'),
(286, 'employee_edit', 'Edit Employee', 'Editar empleado'),
(287, 'laboratorist_list', 'Laboratorist List', 'Lista de laboratorista'),
(288, 'employee_list', 'Employee List', 'Lista de empleados'),
(289, 'receptionist_list', 'Receptionist List', 'Lista de recepcionistas'),
(290, 'pharmacist_list', 'Pharmacist List', 'Lista de farmacéuticos'),
(291, 'nurse', 'Nurse', 'Enfermero'),
(292, 'laboratorist', 'Laboratorist', 'laboratorista'),
(293, 'pharmacist', 'Pharmacist', 'Farmacéutico'),
(294, 'accountant', 'Accountant', 'Contador'),
(295, 'receptionist', 'Receptionist', 'Recepcionista'),
(296, 'noticeboard', 'Noticeboard', 'Tablón de anuncios'),
(297, 'notice_list', 'Notice List', 'Lista de avisos'),
(298, 'add_notice', 'Add Notice', 'Agregar aviso'),
(299, 'hospital_activities', 'Hospital Activities', 'Actividades Hospitalarias'),
(300, 'death_report', 'Death Report', 'Informe de muerte'),
(301, 'add_death_report', 'Add Death Report', 'Agregar informe de muerte'),
(302, 'death_report_edit', 'Death Report Edit', 'Informe de muerte Editar'),
(303, 'birth_report', 'Birth Report', 'Informe de nacimiento'),
(304, 'birth_report_edit', 'Birth Report Edit', 'Informe de nacimiento Editar'),
(305, 'add_birth_report', 'Add Birth Report', 'Agregar informe de nacimiento'),
(306, 'add_operation_report', 'Add Operation Report', 'Agregar informe de operación'),
(307, 'operation_report', 'Operation Report', 'Informe de operación'),
(308, 'investigation_report', 'Investigation Report', 'Reporte de investigación'),
(309, 'add_investigation_report', 'Add Investigation Report', 'Agregar informe de investigación'),
(310, 'add_medicine_category', 'Add Medicine Category', 'Agregar Categoría de Medicamentos'),
(311, 'medicine_category_list', 'Medicine Category List', 'Lista de categorías de medicamentos'),
(312, 'category_name', 'Category Name', 'nombre de la categoría'),
(313, 'medicine_category_edit', 'Medicine Category Edit', 'Categoría Medicina Editar'),
(314, 'add_medicine', 'Add Medicine', 'Agregar medicamento'),
(315, 'medicine_list', 'Medicine List', 'Lista de medicamentos'),
(316, 'medicine_edit', 'Medicine Edit', 'Medicina Editar'),
(317, 'manufactured_by', 'Manufactured By', 'Fabricado por'),
(318, 'medicine_name', 'Medicine Name', 'Nombre del medicamento'),
(319, 'messages', 'Messages', 'Mensajes'),
(320, 'inbox', 'Inbox', 'Bandeja de entrada'),
(321, 'sent', 'Sent', 'Enviado'),
(322, 'new_message', 'New Message', 'Nuevo mensaje'),
(323, 'sender', 'Sender Name', 'Nombre del remitente'),
(324, 'message', 'Message', 'Mensaje'),
(325, 'subject', 'Subject', 'Asunto'),
(326, 'receiver_name', 'Send To', 'Enviar a'),
(327, 'select_user', 'Select User', 'Seleccionar usuario'),
(328, 'message_sent', 'Messages Sent', 'Mensajes enviados'),
(329, 'mail', 'Mail', 'Correo'),
(330, 'send_mail', 'Send Mail', 'Enviar correo'),
(331, 'mail_setting', 'Mail Setting', 'Configuración de correo'),
(332, 'protocol', 'Protocol', 'Protocolo'),
(333, 'mailpath', 'Mail Path', 'Ruta de correo'),
(334, 'mailtype', 'Mail Type', 'Tipo de correo'),
(335, 'validate_email', NULL, 'NULO'),
(336, 'true', 'True', 'VERDADEIRO'),
(337, 'false', 'False', 'FALSO'),
(338, 'attach_file', 'Attach File', 'Adjuntar archivo'),
(339, 'wordwrap', '', 'Ajuste de Linea'),
(340, 'send', 'Send', 'Enviar'),
(341, 'upload_successfully', 'Upload Successfully!', '¡Cargar con éxito!'),
(342, 'app_setting', 'App Setting', 'Configuración de la aplicación'),
(343, 'case_manager', 'Case Manager', 'Administrador de casos'),
(344, 'patient_status', 'Patient Status', 'Estado del paciente'),
(345, 'patient_status_edit', 'Edit Patient Status', 'Editar estado del paciente'),
(346, 'add_patient_status', 'Add Patient Status', 'Agregar estado del paciente'),
(347, 'add_new_status', 'Add New Status', 'Agregar nuevo estado'),
(348, 'case_manager_list', 'Case Manager List', 'Lista de administradores de casos'),
(349, 'hospital_address', 'Hospital Address', 'Dirección del hospital'),
(350, 'ref_doctor_name', 'Ref. Doctor Name', 'Árbitro. Nombre del médico'),
(351, 'hospital_name', 'Hospital Name', 'Nombre del hospital'),
(352, 'patient_name', 'Patient  Name', 'Nombre del paciente'),
(353, 'document_list', 'Document List', 'Lista de documentos'),
(354, 'add_document', 'Add Document', 'Agregar documento'),
(355, 'upload_by', 'Update by', 'Actualizar por'),
(356, 'documents', 'Documents', 'Documentos'),
(357, 'prescription', 'Prescription', 'Prescripción'),
(358, 'add_prescription', 'Add Prescription', 'Agregar receta'),
(359, 'prescription_list', 'Prescription List', 'Lista de recetas'),
(360, 'add_insurance', 'Add Insurance', 'Añadir seguro'),
(361, 'insurance_list', 'Insurance List', 'Lista de seguros'),
(362, 'insurance_name', 'Insurance Name', 'Nombre del seguro'),
(366, 'add_patient_case_study', 'Add Patient Case Study', 'Agregar estudio de caso de paciente'),
(367, 'patient_case_study_list', 'Patient Case Study List', 'Lista de estudios de casos de pacientes'),
(368, 'food_allergies', 'Food Allergies', 'Alergias a los alimentos'),
(369, 'tendency_bleed', 'Tendency Bleed', 'Sangrado de tendencia'),
(370, 'heart_disease', 'Heart Disease', 'Enfermedad del corazón'),
(371, 'high_blood_pressure', 'High Blood Pressure', 'Alta presión sanguínea'),
(372, 'diabetic', 'Diabetic', 'Diabético'),
(373, 'surgery', 'Surgery', 'Cirugía'),
(374, 'accident', 'Accident', 'Accidente'),
(375, 'others', 'Others', 'Otros'),
(376, 'family_medical_history', 'Family Medical History', 'Antecedentes médicos familiares'),
(377, 'current_medication', 'Current Medication', 'Medicación actual'),
(378, 'female_pregnancy', 'Female Pregnancy', 'embarazo femenino'),
(379, 'breast_feeding', 'Breast Feeding', 'Lactancia Materna'),
(380, 'health_insurance', 'Health Insurance', 'Seguro de salud'),
(381, 'low_income', 'Low Income', 'De bajos ingresos'),
(382, 'reference', 'Reference', 'Referencia'),
(385, 'instruction', 'Instruction', 'Instrucción'),
(386, 'medicine_type', 'Medicine Type', 'Tipo de medicamento'),
(387, 'days', 'Days', 'Dias'),
(388, 'weight', 'Weight', 'Peso'),
(389, 'blood_pressure', 'Blood Pressure', 'Presión arterial'),
(390, 'old', 'Old', 'Antiguo'),
(391, 'new', 'New', 'Nuevo'),
(392, 'case_study', 'Case Study', 'Caso de estudio'),
(393, 'chief_complain', 'Chief Complain', 'Queja principal'),
(394, 'patient_notes', 'Patient Notes', 'Notas del paciente'),
(395, 'visiting_fees', 'Visiting Fees', 'Tarifas de visita'),
(396, 'diagnosis', 'Diagnosis', 'Diagnóstico'),
(397, 'prescription_id', 'Prescription ID', 'Identificación de prescripción'),
(398, 'name', 'Name', 'Nombre'),
(399, 'prescription_information', 'Prescription Information', 'Información de prescripción'),
(400, 'sms', 'SMS', 'SMS'),
(401, 'gateway_setting', 'Gateway Setting', 'Configuración de la puerta de enlace'),
(402, 'time_zone', 'Time Zone', 'Zona horaria'),
(403, 'username', 'User Name', 'Nombre de usuario'),
(404, 'provider', 'Provider', 'Proveedor'),
(405, 'sms_template', 'SMS Template', 'Plantilla SMS'),
(406, 'template_name', 'Template Name', 'Nombre de la plantilla'),
(407, 'sms_schedule', 'SMS Schedule', 'Programación de SMS'),
(408, 'schedule_name', 'Schedule Name', 'Nombre del programa'),
(409, 'time', 'Time', 'Tiempo'),
(410, 'already_exists', 'Already Exists', 'Ya existe'),
(411, 'send_custom_sms', 'Send Custom SMS', 'Enviar SMS personalizados'),
(412, 'sms_sent', 'SMS Sent!', 'SMS enviado!'),
(413, 'custom_sms_list', 'Custom SMS List', 'Lista de SMS personalizados'),
(414, 'reciver', 'Reciver', 'receptor'),
(415, 'auto_sms_report', 'Auto SMS Report', 'Informe SMS automático'),
(417, 'user_sms_list', 'User SMS List', 'Lista de SMS de usuario'),
(418, 'send_sms', 'Send SMS', 'Enviar SMS'),
(419, 'new_sms', 'New SMS', 'SMS nuevos'),
(420, 'sms_list', 'SMS List', 'Lista de SMS'),
(421, 'insurance', 'Insurance', 'Seguro'),
(422, 'add_limit_approval', 'Add Limit Approval', 'Agregar aprobación de límite'),
(423, 'limit_approval_list', 'Limit Approval List', 'Lista de aprobación de límites'),
(424, 'service_tax', 'Service Tax', 'Impuesto de servicio'),
(425, 'remark', 'Remark', 'Observación'),
(426, 'insurance_no', 'Insurance No.', 'número de seguro'),
(427, 'insurance_code', 'Insurance Code', 'Código de seguro'),
(428, 'hospital_rate', 'Hospital Rate', 'Tarifa hospitalaria'),
(429, 'insurance_rate', 'Insurance Rate', 'Tasa de seguro'),
(430, 'disease_charge', 'Disease Charge', 'Cargo por enfermedad'),
(431, 'disease_name', 'Disease Name', 'Nombre de la enfermedad'),
(432, 'room_no', 'Room No', 'Habitación no'),
(433, 'disease_details', 'Disease Details', 'Detalles de la enfermedad'),
(434, 'consultant_name', 'Consultant Name', 'Nombre del consultor'),
(435, 'policy_name', 'Policy Name', 'Nombre de directiva'),
(436, 'policy_no', 'Policy No.', 'No política.'),
(437, 'policy_holder_name', 'Policy Holder Name', 'Nombre del titular de la póliza'),
(438, 'approval_breakup', ' Approval Charge Break up', 'Aprobación Cargo Separación'),
(439, 'limit_approval', 'Limit Approval', 'Aprobación de límite'),
(440, 'insurance_limit_approval', 'Insurance Limit Approval', 'Aprobación de límite de seguro'),
(441, 'billing', 'Billing', 'Facturación'),
(442, 'add_admission', 'Add Patient Admission', 'Internar Paciente'),
(443, 'add_service', 'Add Service', 'Agregar servicio'),
(444, 'service_list', 'Service List', 'Lista de servicios'),
(445, 'service_name', 'Service Name', 'Nombre del Servicio'),
(446, 'add_package', 'Add Package', 'Agregar paquete'),
(447, 'package_list', 'Package List', 'Lista de paquetes'),
(448, 'package_name', 'Package Name', 'Nombre del paquete'),
(449, 'package_details', 'Package Details', 'Detalles del paquete'),
(450, 'edit_package', 'Edit Package', 'Editar paquete'),
(451, 'admission_date', 'Admission Date', 'Fecha de Internación'),
(452, 'guardian_name', 'Guardian Name', 'Nombre del guardián'),
(453, 'agent_name', 'Agent Name', 'Nombre del agente'),
(454, 'guardian_relation', 'Guardian Relation', 'Relación de guardián'),
(455, 'guardian_contact', 'Guardian Contact', 'Contacto del guardián'),
(456, 'guardian_address', 'Guardian Address', 'Dirección del tutor'),
(457, 'admission_list', 'Patient Admission List', 'Lista de internación'),
(458, 'admission_id', 'Admission ID', 'Código de Internación'),
(459, 'edit_admission', 'Edit Admission', 'Editar Internación'),
(460, 'add_advance', 'Add Advance Payment', 'Agregar pago por adelantado'),
(461, 'advance_list', 'Advance Payment List', 'Lista de pagos por adelantado'),
(462, 'receipt_no', 'Receipt No', 'Número de recibo'),
(463, 'cash_card_or_cheque', 'Cash / Card / Cheque', 'Efectivo / Tarjeta / Cheque'),
(464, 'payment_method', 'Payment Method', 'Método de pago'),
(465, 'add_bill', 'Add Bill', 'Agregar factura'),
(466, 'bill_list', 'Bill List', 'Lista de facturas'),
(467, 'bill_date', 'Bill Date', 'Fecha de pago'),
(468, 'total_days', 'Total Days', 'Días totales'),
(469, 'advance_payment', 'Advance Payment', 'Pago por adelantado'),
(470, 'cash', 'Cash', 'Dinero en efectivo'),
(471, 'card', 'Card', 'Tarjeta'),
(472, 'cheque', 'Cheque', 'Cheque'),
(473, 'card_cheque_no', 'Card / Cheque No.', 'Número de tarjeta/cheque'),
(474, 'receipt', 'Receipt', 'Recibo'),
(475, 'tax', 'Tax', 'Impuesto'),
(476, 'pay_advance', 'Advance Paid', 'Adelanto pagado'),
(477, 'payable', 'Payable', 'Pagadero'),
(478, 'notes', 'Notes', 'notas'),
(479, 'rate', 'Rate', 'Precio'),
(480, 'bill_id', 'Bill ID.', 'Identificación de factura.'),
(482, 'unpaid', 'Unpaid', 'No pagado'),
(483, 'bill_details', 'Bill Details', 'Detalles de la factura'),
(484, 'signature', 'Signature', 'Firma'),
(485, 'update_bill', 'Update Bill', 'Actualizar factura'),
(486, 'role_permission', 'Role Permission', 'Permiso de rol'),
(487, 'add_role', 'Add Role', 'Agregar rol'),
(488, 'role_list', 'Role List', 'Lista de funciones'),
(489, 'role_name', 'Role Name', 'Nombre de rol'),
(490, 'assign_role_to_user', 'Assign Role To User', 'Asignar rol a usuario'),
(491, 'you_do_not_have_permission_to_access_please_contact_with_administrator', 'You do not have permission to access please contact with administrator', 'No tiene permiso para acceder por favor contacte con el administrador'),
(492, 'language_list', 'Language List', 'Lista de idiomas'),
(493, 'add_phrase', 'Add Phrase', 'Añadir frase'),
(494, 'sms_setting', 'SMS Setting', 'Configuración de SMS'),
(495, 'create', 'Create', 'Crear'),
(496, 'read', 'Read', 'Leer'),
(497, 'system_user', 'System User', 'Usuario del sistema'),
(498, 'permission', 'Permission', 'Permiso'),
(499, 'employees_list', 'Employees List', 'Lista de empleados'),
(500, 'not_role_select', 'Not Role Select', 'No selección de roles'),
(504, 'email_password', 'Email & Password', 'Contraseña de Email'),
(505, 'user', 'User', 'Usuario'),
(506, 'add_room', 'Add Room', 'Añadir habitación'),
(507, 'room_name', 'Room Name', 'Nombre de la habitación'),
(508, 'room_list', 'Room List', 'Lista de habitaciones'),
(509, 'room_edit', 'Room Edit', 'Editar Habitación'),
(510, 'bed_number', 'Bed Number', 'Número de cama'),
(511, 'bed_transfer', 'Bed Transfer', 'Transferencia de cama'),
(512, 'bed_transfer_list', 'Bed Transfer List', 'Lista de transferencia de cama'),
(513, 'booked', 'Booked', 'Reservado'),
(514, 'available', 'Available ', 'Disponible'),
(515, 'sex', 'Sex', 'Sexo'),
(516, 'medications_and_visits', 'Medications and Visits', 'Medicamentos y Visitas'),
(517, 'add_medication', 'Add Patient Medication', 'Añadir medicación del paciente'),
(518, 'medication_list', 'Patient Medication List', 'Lista de medicamentos del paciente'),
(519, 'add_visit', 'Add Patient Visit', 'Agregar visita del paciente'),
(520, 'visit_list', 'Patient Visit List', 'Lista de visitas de pacientes'),
(521, 'dosage', 'Dosage', 'Dosis'),
(522, 'per_day_intake', 'Per Day Intake', 'Ingesta diaria'),
(523, 'full_stomach', 'Full Stomach', 'Estomago lleno'),
(524, 'other_instruction', 'Others Instruction', 'Otros Instrucción'),
(525, 'from_date', 'From Date', 'Partir de la fecha'),
(526, 'to_date', 'To Date', 'Hasta la fecha'),
(527, 'prescribe_by', 'Prescribe By', 'prescribir por'),
(528, 'intake_time', 'Intake Time', 'Tiempo de admisión'),
(529, 'medication_edit', 'Patient Medication Edit', 'Medicación del paciente Editar'),
(530, 'visit_date', 'Visit Date', 'Fecha de visita'),
(531, 'visit_time', 'Visit Time', 'Tiempo de visita'),
(532, 'finding', 'Finding', 'Hallazgo'),
(533, 'instructions', 'Instructions', 'Instrucciones'),
(534, 'fees', 'Fees', 'Tarifa'),
(535, 'visit_by', 'Visit By', 'Visitar por'),
(536, 'visit_edit', 'Visit Edit', 'Visita Editar'),
(537, 'visit_type', 'Visit Type', 'Tipo de visita'),
(538, 'visit_report', 'Visiting Reports', 'Informes de visitas'),
(539, 'medication_report', 'Medication Reports', 'Informes de medicamentos'),
(540, 'url', 'Url', 'URL'),
(541, 'image_dimension_require', 'Image Dimension Required', 'Dimensión de imagen requerida'),
(542, 'download_now', 'Download Now', 'Dar de Alta'),
(543, 'start_now', 'Start Now', 'Empezar ahora'),
(544, 'author_name', 'Author Name', 'Nombre del autor'),
(545, 'quotation', 'Quotation', 'Cotización'),
(546, 'about_edit', 'About Edit', 'Acerca de Editar'),
(547, 'testimonial_list', 'Testimonial List', 'Lista de Testimonios'),
(548, 'add_testimonial', 'Add Testimonial', 'Agregar Testimonio'),
(549, 'testimonial', 'Testimonial', 'Testimonial'),
(550, 'testimonial_edit', 'Testimonial Edit', 'Testimonio Editar'),
(551, 'write_us', 'Write Us', 'Escribenos'),
(552, 'call_us', 'Call Us', 'Llámenos'),
(553, 'add_instruction', 'Add Instruction', 'Agregar instrucción'),
(554, 'instruction_edit', 'Instruction Edit', 'Instrucción Editar'),
(555, 'short_instruction', 'Short Instruction', 'Instrucción breve'),
(556, 'add_partner', 'Add Partner', 'Agregar socio'),
(557, 'partner_list', 'Partner List', 'Lista de socios'),
(558, 'partner_edit', 'Partner Edit', 'Socio Editar'),
(559, 'instruction_list', 'Instruction List', 'Lista de instrucciones'),
(560, 'appoint_instruction', 'Appointment Instruction', 'Instrucción de cita'),
(561, 'institute_name', 'Institute Name', 'nombre del Instituto'),
(564, 'add_portfolio', 'Add Portfolio', 'Añadir cartera'),
(565, 'portfolio_list', 'Portfolio List', 'Lista de cartera'),
(566, 'portfolio_edit', 'Portfolio Edit', 'Portafolio Editar'),
(567, 'flaticon', 'Flaticon', 'Flaticon'),
(568, 'add_time_slot', 'Add Time Slot', 'Agregar franja horaria'),
(569, 'slot', 'Slot', 'Ranura'),
(570, 'slot_name', 'Slot Name', 'Nombre de la ranura'),
(571, 'slot_list', 'Slot List', 'Lista de agendas'),
(572, 'slot_edit', 'Slot Edit', 'Editar agendas'),
(573, 'add_main_department', 'Add Main Department', 'Agregar departamento principal'),
(574, 'main_department_list', 'Main Department List', 'Lista de departamentos principales'),
(575, 'main_department', 'Main Department', 'Departamento principal'),
(576, 'about_us', 'About Us', 'Sobre nosotros'),
(577, 'doctors', 'Doctor\'s', 'del doctor'),
(578, 'nurses', 'Nurse\'s', 'enfermera'),
(579, 'working_hours', 'Working Hours', 'Horas Laborales'),
(580, 'closed', 'Closed', 'Cerrado'),
(581, 'are_you_human', 'Are you human?', 'Eres humano?'),
(582, 'add_news', 'Add News', 'Agregar noticias'),
(583, 'news', 'News', 'Noticias'),
(584, 'news_list', 'News List', 'Lista de noticias'),
(585, 'added_to_website_successfully', 'Added to website successfully', 'Agregado al sitio web con éxito'),
(586, 'removed_form_website_successfully', 'Removed form website successfully', 'Sitio web de formulario eliminado con éxito'),
(587, 'related_article', 'Related article', 'Artículo relacionado'),
(588, 'share_this', 'Share this', 'Compartir este'),
(593, 'menu_list', 'Menu List', 'Lista de menú'),
(596, 'add_menu', 'Add Menu', 'Añadir menú'),
(597, 'parent_menu', 'Parent Menu', 'Menú principal'),
(598, 'menu_edit', 'Menu Edit', 'Menú Editar'),
(599, 'template_assign', 'Template Assign', 'Asignación de plantilla'),
(600, 'add_template', 'Add Template', 'Agregar plantilla'),
(601, 'contents', 'Contents', 'Contenido'),
(602, 'make_an_appointment', 'Make an appointment!', '¡Haga una cita!'),
(603, 'go_there', 'Go there', 'Ve allí'),
(604, 'view_our_team_of_surgeons', 'View our team of surgeons', 'Ver nuestro equipo de cirujanos'),
(605, 'timetable', 'Timetable', 'Calendario'),
(606, 'benefits', 'Benefits', 'Beneficios'),
(607, 'common_template', 'Common Template', 'Plantilla común'),
(608, 'you_need_help', 'You need help?', '¿Necesitas ayuda?'),
(609, 'our_team', 'Our Team', 'Nuestro equipo'),
(610, 'what_client_say', 'What Client Say', 'Lo que dice el cliente'),
(611, 'contact_us', 'Contact Us', 'Contáctenos'),
(612, 'departments', 'Departments', 'Departamentos'),
(613, 'quick_links', 'Quick Links', 'enlaces rápidos'),
(614, 'contact_details', 'Contact Details', 'Detalles de contacto'),
(615, 'get_directions', 'Get Directions', 'Obtener las direcciones'),
(616, 'data_not_available', 'Data not available!', '¡Informacion no disponible!'),
(617, 'lets_talk', 'Let\'s Talk!', '¡Hablemos!'),
(618, 'my_schedule_for_this_week', 'My schedule for this week', 'Mi horario para esta semana.'),
(619, 'old_patient', 'Old Patient', 'viejo paciente'),
(620, 'new_patient', 'New Patient', 'Paciente nuevo'),
(621, '1', '1', '1'),
(622, '2', '2', '2'),
(623, 'book_appointment', 'Book Appointment', 'Reservar una cita'),
(624, 'notes_submitted_to_the_attendance_office_must_include_following', 'Notes submitted to the Attendance Office must include following', 'Las notas enviadas a la Oficina de Asistencia deben incluir lo siguiente'),
(625, 'provide_your_primary_information_about_the_following_details', 'Provide your primary information about the following details.', 'Proporcione su información principal sobre los siguientes detalles.'),
(626, 'please_provide_a_valid_email', 'Please provide a valid email.', 'Proporcione un correo electrónico válido.'),
(627, 'help_us_with_accurate_information_about_the_following_details', 'Help us with accurate information about the following details', 'Ayúdanos con información precisa sobre los siguientes detalles'),
(628, 'i_consent_to_having_this_website_store_my_submitted_information_so_they_can_respond_to_my_inquiry', 'I consent to having this website store my submitted information so they can respond to my inquiry.', 'Doy mi consentimiento para que este sitio web almacene la información enviada para que puedan responder a mi consulta.'),
(629, 'please_provide_a_valid_id', 'Please provide a valid ID.', 'Proporcione una identificación válida.'),
(630, 'if_forgot_patient_id_please_selected_the_checkbox', 'If Forgot Patient ID Please Selected The CheckBox', 'Si olvidó la identificación del paciente, seleccione la casilla de verificación'),
(631, 'fax', 'Fax', 'Fax'),
(632, 'text', 'Text', 'Texto'),
(633, 'map_longitude', 'Map Longitude', 'Longitud del mapa'),
(634, 'map_latitude', 'Map Latitude', 'Latitud del mapa'),
(635, 'personal_information', 'Personal information', 'Informacion personal'),
(636, 'practicing', 'Practicing', 'Practicando'),
(637, 'vacation', 'Vacation', 'Vacación'),
(638, 'languages', 'languages', 'idiomas'),
(639, 'portfolio', 'Portfolio', 'portafolio'),
(640, 'career_title', 'Career Title', 'Título de carrera'),
(641, 'behance_url', 'Behance Url', 'Dirección URL de Behance'),
(642, 'sign_up_with_linkedin', 'Sign up with LinkedIn', 'Regístrate con LinkedIn'),
(643, 'sign_up_with_google', 'Sign up with Google', 'Regístrese con Google'),
(644, 'related_departments', 'Related Departments', 'Departamentos relacionados'),
(645, 'sign_in', 'Sign In', 'Iniciar sesión'),
(646, 'sign_up', 'Sign Up', 'Inscribirse'),
(647, 'remind', 'Remind', 'Recordar'),
(648, 'do_not_have_an_account', 'Don\'t have an account?', '¿No tienes una cuenta?'),
(649, 'remember_me_next_time', 'Remember me next time', 'Recuerdame la proxima vez'),
(650, 'or', 'Or', 'O'),
(651, 'thank_you_for_registration', 'Thank you for registration', 'gracias por registrarte'),
(652, 'all_addresses_and_support_hotlines', 'All addresses and Support Hotlines', 'Todas las direcciones y líneas directas de soporte'),
(653, 'thank_you_for_contacting_with_us', 'Thank you for contacting with us.', 'Gracias por contactar con nosotros.'),
(654, 'invalid_captcha', 'Invalid Captcha', 'Captcha inválido'),
(655, 'service_position', 'Service Position', 'Puesto de servicio'),
(656, 'view_all', 'View all', 'Ver todo'),
(657, 'contact_us_for_help', 'Contact Us For Help', 'Póngase en contacto con nosotros para obtener ayuda'),
(658, 'rating', 'Rating', 'Clasificación'),
(659, 'native', 'Native', 'Nativo'),
(660, 'beginner', 'Beginner', 'Principiante'),
(661, 'fluent', 'Fluent', 'Fluido'),
(662, 'rating_out_of_10', 'Rating Out Of 10', 'Calificación de 10'),
(663, 'years', 'Years', 'Años'),
(664, 'template_edit', 'Template edit', 'Edición de plantilla'),
(665, 'map_directions', 'Map Directions', 'Direcciones del mapa'),
(666, 'role_aready_exists', 'Role already exists', 'El rol ya existe'),
(667, 'support', 'Support?', '¿Apoyo?'),
(668, 'language_data_not_inserted_yet', 'Language data not inserted yet!', '¡Los datos de idioma aún no se han insertado!'),
(669, 'youtube_url', 'Youtube URL', 'URL de Youtube'),
(670, 'document_title', 'Document Title', 'Titulo del documento'),
(671, 'free_bed_list', 'Free bed list', 'Nro de camas disponible'),
(672, 'discharged', 'Discharged', 'Dar de Alta'),
(673, 'welcome_back', 'Welcome back!', '¡Bienvenido de nuevo!'),
(674, 'today_patient_list', 'Today patient list', 'Lista de pacientes de hoy'),
(675, 'chart_of_account', 'Chart Of Account', 'Plan de cuentas'),
(676, 'debit_voucher', 'Debit Voucher', 'Comprobante de débito'),
(677, 'credit_voucher', 'Credit Voucher', 'Vale de crédito'),
(678, 'contra_voucher', 'Contra Voucher', 'Vale Contra'),
(679, 'journal_voucher', 'Journal Voucher', 'Documento preliminar'),
(680, 'voucher_approval', 'Voucher Approval', 'Aprobación de vales'),
(681, 'account_report', 'Account Report', 'Informe de cuenta'),
(682, 'voucher_report', 'Voucher Report', 'Informe de comprobante'),
(683, 'cash_book', 'Cash Book', 'Libro de pago'),
(684, 'bank_book', 'Bank Book', 'Banco de libros'),
(685, 'general_ledger', 'General Ledger', 'Libro mayor'),
(686, 'trial_balance', 'Trial Balance', 'Saldo de prueba'),
(687, 'profit_loss', 'Profit Loss', 'Pérdida de beneficios'),
(688, 'voucher_no', 'Voucher No', 'Nº de cupón'),
(689, 'credit_account_head', 'Credit Account Head', 'Jefe de cuenta de crédito'),
(690, 'cash_in_hand', 'Cash In Hand', 'Dinero en efectivo'),
(691, 'add_more', 'Add More', 'Añadir más'),
(692, 'code', 'Code', 'Código'),
(693, 'debit_account_head', 'Debit Account Head', 'Jefe de cuenta de débito'),
(694, 'approved', 'Approved', 'Aprobado'),
(695, 'successfully_approved', 'Successfully Approved', 'Aprobado con éxito'),
(696, 'update_debit_voucher', 'Update Debit Voucher', 'Actualizar comprobante de débito'),
(697, 'update_credit_voucher', 'Update Credit Voucher', 'Actualizar comprobante de crédito'),
(698, 'update_contra_voucher', 'Update Contra Voucher', 'Actualizar Contra Vale'),
(699, 'find', 'Find', 'Encontrar'),
(700, 'balance', 'Balance', 'Equilibrio'),
(701, 'particulars', 'Particulars', 'Informe detallado'),
(702, 'voucher_type', 'Voucher Type', 'Tipo de vale'),
(703, 'transaction_date', 'Transaction Date', 'Fecha de Transacción'),
(704, 'opening_balance', 'Opening Balance', 'Saldo de apertura'),
(705, 'cash_book_report_on', 'Cash Book Report On', 'Informe de libro de caja en'),
(706, 'cash_book_voucher', 'Cash Book Voucher', 'Comprobante de caja'),
(707, 'to', 'To', 'Para'),
(708, 'head_of_account', 'Head Of Account', 'jefe de cuenta'),
(709, 'bank_book_report_of', 'Bank Book Report Of', 'Informe del libro bancario de'),
(710, 'on', 'On', 'Sobre'),
(711, 'bank_book_voucher', 'Bank Book Voucher', 'Comprobante de libro bancario'),
(712, 'account_code', 'Account Code', 'Código de cuenta'),
(713, 'gl_head', 'GL Head', 'Cabeza GL'),
(714, 'transaction_head', 'Transaction Head', 'Jefe de transacción'),
(715, 'with_details', 'With Details', 'Con detalles'),
(716, 'pre_balance', 'Pre Balance', 'Pre balance'),
(717, 'current_balance', 'Current Balance', 'Saldo actual'),
(718, 'general_ledger_report', 'General Ledger Report', 'Informe de contabilidad general'),
(719, 'trial_balance_report', 'Trail Balance Report', 'Informe de balance de ruta'),
(720, 'prepared_by', 'Prepared By', 'Preparado por'),
(721, 'accounts', 'Accounts', 'cuentas'),
(722, 'chairman', 'Chairman', 'Presidente'),
(723, 'authorized_signature', 'Authorized Signature', 'Firma autorizada'),
(724, 'cash_flow', 'Cash Flow', 'Flujo de fondos'),
(725, 'cash_flow_statement', 'Cash Flow Statement', 'Estado de Flujo de Efectivo'),
(726, 'amount_in_dollar', 'Amount In Dollar', 'Monto en dólares'),
(727, 'opening_cash_and_equivalent', 'Opening Cash && Equivalent', 'Apertura de Efectivo && Equivalente'),
(728, 'profit_loss_report', 'Profit Loss Report', 'Informe de pérdida de ganancias'),
(729, 'statement_of_comprehensive_income', 'Statement Of Comprehensive Income', 'Estado del resultado integral'),
(730, 'bed_bill', 'Bed Bill', 'Factura de la cama'),
(731, 'bed_payment', 'Bed Payment', 'Pago Cama'),
(732, 'pharmacy', 'Pharmacy', 'Farmacia'),
(733, 'stock_quantity', 'Stock Quantity', 'Cantidad de stock'),
(734, 'add_stock', 'Add Stock', 'Añadir existencias'),
(735, 'app_qr_code', 'App QR Code', 'Código QR de la aplicación'),
(736, 'show_qr_code', 'Show QR Code', 'Mostrar código QR'),
(737, 'language_proficiency', 'Language Proficiency', 'Dominio del idioma'),
(738, 'your_appointment_already_taken', 'Your appointment already taken!', '¡Tu cita ya está tomada!'),
(739, 'content_language', 'Content Language', 'Idioma del contenido'),
(740, 'admission', 'Admission', 'Internar'),
(741, 'yes', 'Yes', 'Sí'),
(742, 'no', 'No', 'No'),
(743, 'patient_visit', 'Patient Visit', 'Visita del paciente'),
(744, 'complete_bill_list', 'Complete Bill List', 'Lista completa de facturas'),
(745, 'trial_balance_with_opening', 'Trail Balance With Opening', 'Trail Balance Con Apertura'),
(746, 'as_on', 'As On', 'Un hijo'),
(747, 'add_banner_slider', 'Add Banner Slider', 'Agregar control deslizante de banner'),
(748, 'banner_list', 'Banner List', 'Lista de pancartas'),
(749, 'edit_banner', 'Edit Banner', 'Editar pancarta'),
(750, 'search', 'Search', 'Búsqueda'),
(751, 'common_settings', 'Common settings', 'Configuraciones comunes'),
(752, 'map_show_by', 'Map Show By', 'Mostrar mapa por'),
(753, 'embed', 'Embed', 'Empotrar'),
(754, 'api', 'API', 'API'),
(755, 'google_map_api', 'Google Map API', 'API de mapas de Google'),
(756, 'google_map_embed', 'Google Map Embed', 'Incrustación de mapa de Google'),
(757, 'import_csv_data', 'Import CSV Data', 'Importar datos CSV'),
(758, 'sample_csv', 'Sample CSV', 'CSV de muestra'),
(759, 'edit_prescription', 'Edit Prescription', 'Editar receta'),
(760, 'add_new_patient', 'Add New Patient', 'Agregar nuevo paciente'),
(761, 'create_setting', 'Create Setting', 'Crear configuración'),
(762, 'common_setting', 'Common Settings', 'Configuraciones comunes'),
(763, 'auto_update', 'Auto Update', 'Actualización automática'),
(764, 'closed_day', 'Closed Day', 'Día Cerrado'),
(765, 'open_day', 'Open Day', 'Dia abierto'),
(766, 'app_store', 'Apps Store', 'Tienda de aplicaciones'),
(767, 'forgot', 'Forgot', 'Olvidó'),
(768, 'email_is_not_existed', 'Email is not existed!', '¡El correo electrónico no existe!'),
(769, 'medicine', 'Medicine', 'Medicamento'),
(770, 'id', 'ID', 'ID'),
(771, 'date_entry', 'Date entry', 'Fecha de entrada'),
(772, 'date_invoice', 'Date invoice', 'Fecha de factura'),
(773, 'number_invoice', 'Number invoice', 'Número de factura'),
(774, 'name_product', 'Name product', 'Nombre de producto'),
(775, 'batch', 'Batch', 'Lote'),
(776, 'purchase_price', 'Purchase price', 'Precio de compra'),
(777, 'date_expiration_product', 'Date expiration product', 'Fecha de vendicimiento del producto'),
(778, 'sale_price', 'Sale price', 'Precio de venta'),
(779, 'medicine_code', 'Code', 'Código');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mail_setting`
--

CREATE TABLE `mail_setting` (
  `id` int(11) NOT NULL,
  `protocol` varchar(20) NOT NULL,
  `mailpath` varchar(255) NOT NULL,
  `mailtype` varchar(20) NOT NULL,
  `validate_email` varchar(20) NOT NULL,
  `wordwrap` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mail_setting`
--

INSERT INTO `mail_setting` (`id`, `protocol`, `mailpath`, `mailtype`, `validate_email`, `wordwrap`) VALUES
(5, 'mail', '/usr/sbin/sendmail', 'text', 'false', 'true');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `main_department`
--

CREATE TABLE `main_department` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `main_department`
--

INSERT INTO `main_department` (`id`, `name`, `description`, `status`) VALUES
(1, 'Farmacia', 'Farmacia', 1),
(2, 'Laboratòrio', 'Laboratòrio', 1),
(3, 'Administrativo', 'Adminstracion de la Clinica', 1),
(4, 'Medicina', 'Sector Atenciòn Mèdica', 1),
(5, 'Enfermería', 'Enfermería', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `main_department_lang`
--

CREATE TABLE `main_department_lang` (
  `id` int(11) NOT NULL,
  `main_id` int(11) NOT NULL,
  `language` varchar(15) CHARACTER SET utf8 NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` varchar(200) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `main_department_lang`
--

INSERT INTO `main_department_lang` (`id`, `main_id`, `language`, `name`, `description`, `status`) VALUES
(1, 4, 'bangla', 'ঔষধ', 'ঔষধ', 1),
(2, 4, 'arabic', 'دواء', 'دواء', 1),
(3, 4, 'french', 'Médicament', 'Médicament', 1),
(4, 4, 'english', 'Medicine', 'Medicine', 1),
(5, 3, 'english', 'Surgery', 'Surgery', 1),
(6, 3, 'bangla', 'সার্জারি', 'সার্জারি', 1),
(7, 3, 'french', 'chirurgie', 'chirurgie', 1),
(8, 3, 'arabic', 'العملية الجراحية', 'العملية الجراحية', 1),
(9, 2, 'english', 'Clinical Departments', 'Clinical Departments', 1),
(10, 2, 'arabic', 'الأقسام السريرية', 'الأقسام السريرية', 1),
(11, 2, 'bangla', 'ক্লিনিকাল বিভাগ', 'ক্লিনিকাল বিভাগ', 1),
(12, 2, 'french', 'Départements Cliniques', 'Départements Cliniques', 1),
(13, 1, 'english', 'Science Departments', 'Science Departments', 1),
(14, 1, 'french', 'Départements scientifiques', 'Départements scientifiques', 1),
(15, 1, 'arabic', 'أقسام العلوم', 'أقسام العلوم', 1),
(16, 1, 'bangla', 'বিজ্ঞান বিভাগ', 'বিজ্ঞান বিভাগ', 1),
(17, 5, 'Español', 'Enfermería', 'Enfermería', 1),
(18, 5, 'english', 'pediatria', 'pediatria', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medication`
--

CREATE TABLE `medication` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `medicine_id` int(11) NOT NULL,
  `dosage` int(3) NOT NULL,
  `per_day_intake` int(1) NOT NULL,
  `full_stomach` tinyint(1) DEFAULT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `other_instruction` text COLLATE utf8_unicode_ci NOT NULL,
  `prescribe_by` int(11) NOT NULL,
  `intake_time` time NOT NULL,
  `bill_id` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=paid, 0=unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `medication`
--

INSERT INTO `medication` (`id`, `patient_id`, `medicine_id`, `dosage`, `per_day_intake`, `full_stomach`, `from_date`, `to_date`, `other_instruction`, `prescribe_by`, `intake_time`, `bill_id`, `status`) VALUES
(1, 'PELWQ10G', 1, 1, 3, 1, '2020-07-13', '2020-07-16', 'xa', 2, '07:30:00', 'BLS5B7T9P', 1),
(2, 'PQHZMY23', 1, 500, 2, 0, '2022-04-30', '2022-05-03', '8/8hs', 3, '00:15:00', 'BLBN4QAHI', 1),
(3, 'PQHZMY23', 5, 500, 8, 0, '2022-06-17', '2022-06-24', '', 3, '02:00:00', 'BLMP2DMJ2', 1),
(4, 'P9AS15E5', 5, 500, 8, 0, '2023-01-24', '2023-01-24', 'N.P.O', 5, '08:00:00', NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercaderia`
--

CREATE TABLE `mercaderia` (
  `id` int(11) NOT NULL,
  `id_mercaderia` int(11) NOT NULL,
  `fecha_entrada` date DEFAULT NULL,
  `fecha_factura` date DEFAULT NULL,
  `numero_factura` varchar(256) DEFAULT NULL,
  `proveedor` varchar(256) DEFAULT NULL,
  `codigo` varchar(256) DEFAULT NULL,
  `nombre_producto` varchar(256) DEFAULT NULL,
  `lote` varchar(256) DEFAULT NULL,
  `cantidad` varchar(256) DEFAULT NULL,
  `precio_compra` varchar(256) DEFAULT NULL,
  `fecha_vencimiento_producto` varchar(256) DEFAULT NULL,
  `usuario` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mercaderia`
--

INSERT INTO `mercaderia` (`id`, `id_mercaderia`, `fecha_entrada`, `fecha_factura`, `numero_factura`, `proveedor`, `codigo`, `nombre_producto`, `lote`, `cantidad`, `precio_compra`, `fecha_vencimiento_producto`, `usuario`) VALUES
(43, 6, '2023-01-17', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1201', 'Amiodarona Ampolla ', '15202', '10', '8.25', '2023-10-30', 'Jose Ginarte'),
(44, 6, '2023-01-17', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1214', 'Atrovent Ipratropio 0,25 mg/ml - Frasco 20 ml ', 'D99746', '10', '41.40', '2025-05-31', 'Jose Ginarte'),
(45, 6, '2023-01-17', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1216', 'Alburex 20% Albúmina Humana Solución para Perfusión 200 g/l ', 'P100310516', '10', '140.00', '0024-12-31', 'Jose Ginarte'),
(46, 6, '2023-01-17', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1087', 'Acetilcisteína 100 mg (Fluimosil) Ampolla de 3ml', '2225532', '10', '42', '2024-06-30', 'Jose Ginarte'),
(48, 7, '2023-01-20', '0000-00-00', '0', 'Betancourt', '', 'Jeringas 3ml', '2019084', '32', '0', '2024-07-31', 'Jose Ginarte'),
(49, 8, '2023-01-20', '0000-00-00', '0', 'Betancourt', '', 'Jeringa 5 ml', '20210406', '518', '0', '2026-04-06', 'Jose Ginarte'),
(50, 8, '2023-01-20', '0000-00-00', '0', 'Betancourt', '', 'Jeringa 20 ml', '2021201', '73', '0', '2026-12-01', 'Jose Ginarte'),
(51, 8, '2023-01-20', '0000-00-00', '0', 'Betancourt', '', 'Algodón', '0', '1', '0', '2025-04-25', 'Jose Ginarte'),
(52, 8, '2023-01-20', '0000-00-00', '0', 'Betancourt', '', 'Prolene 3-0', 'AK8842', '21', '0', '2023-06-30', 'Jose Ginarte'),
(53, 8, '2023-01-20', '0000-00-00', '0', 'Betancourt', '', 'Prolene 1', 'AK9705', '26', '0', '2023-07-31', 'Jose Ginarte'),
(54, 8, '2023-01-20', '0000-00-00', '0', 'Betancourt', '', 'Bránula # 24', '8114B', '27', '0', '2023-08-31', 'Jose Ginarte'),
(55, 8, '2023-01-20', '0000-00-00', '0', 'Betancourt', '', 'Bránula # 24', '20180410', '24', '0', '2023-04-09', 'Jose Ginarte'),
(56, 8, '2023-01-20', '0000-00-00', '0', 'Betancourt', '', 'Tubo Endotraqueal # 7.5', '20181110', '14', '0', '2023-11-09', 'Jose Ginarte'),
(61, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1134', 'Cafeína 25% Ampolla IV.', '14673', '10', '7.00', '2023-09-30', 'Jose Ginarte'),
(62, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1223', 'Ceftazídima 1 gr', '42387', '10', '15.00', '2024-01-31', 'Jose Ginarte'),
(63, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1222', 'Citicolina 1gr Ampolla Intro Veno', '073', '7', '45.20', '2023-08-31', 'Jose Ginarte'),
(64, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1153', 'Clindamicina 600 mg Ampolla Intro Veno', 'CLN047', '10', '13.00', '2023-12-31', 'Jose Ginarte'),
(65, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1123', 'Colistina 100 mg Inyectable-Inhalatorio Intro Veno ', '40001', '10', '50.00', '2023-06-30', 'Jose Ginarte'),
(66, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1199', 'Diazepam 10 mg Ampolla IM Intro Veno', 'B6201', '10', '8.00', '2024-04-30', 'Jose Ginarte'),
(67, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1073', 'Dicynone 250 Ampolla', 'K1452', '12', '37.50', '2026-06-30', 'Jose Ginarte'),
(68, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1246', 'Digoxina 0.25 mg Ampolla ', 'H0201', '10', '7.00', '2024-04-30', 'Jose Ginarte'),
(69, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1124', 'Dobutamina 250 mg X 20 ml Richet', '40396', '10', '31.00', '2023-10-31', 'Jose Ginarte'),
(70, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1133', 'Dolgenal Ampolla Intro Veno ', '74860', '10', '10.00', '2023-11-30', 'Jose Ginarte'),
(71, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1136', 'Domperidona Pediatrico 4 mg / 2 ml', '03816', '10', '9.00', '2024-04-30', 'Jose Ginarte'),
(72, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1152', 'Etilefrina 10 mg Ampolla (Efortil)', '30089', '10', '10.00', '2024-04-30', 'Jose Ginarte'),
(73, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1205', 'Farmalet 10ml Amp. Fentanilo', 'AS 197/21M', '10', '20.00', '2023-04-30', 'Jose Ginarte'),
(74, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1149', 'Fenitoína 100 mg Ampolla x 2 ml', 'L6201', '10', '6.00', '2024-04-30', 'Jose Ginarte'),
(75, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1072', 'Flogiatrin B12 NF Ampolla (Piroxican-VIT: B6B1', '2102636', '10', '45.00', '2024-08-31', 'Jose Ginarte'),
(76, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1116', 'Haloperidol 5mg Ampolla ', '10829', '10', '10.00', '2024-12-31', 'Jose Ginarte'),
(77, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1125', 'Hidrocortisona 100 mg ', '40688', '10', '12.00', '2024-06-30', 'Jose Ginarte'),
(78, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1156', 'Hidrocortisona 500 mg Ampolla', '42996', '10', '32.50', '2024-04-30', 'Jose Ginarte'),
(79, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1129', 'Imipenem + Cilastina 500/500mg Intro Veno', '201124', '10', '45.00', '2024-11-30', 'Jose Ginarte'),
(80, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1235', 'Iopamiron 300 (Contraste Ultravit)', 'IPA073', '10', '130.00', '2027-05-31', 'Jose Ginarte'),
(81, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1221', 'Ipsilon Ampolla Äcido & Amonocaproico', '00081', '10', '14.00', '2025-05-31', 'Jose Ginarte'),
(82, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1176', 'Meropenem 1gr Ampolla', '40907', '10', '70.00', '2024-05-31', 'Jose Ginarte'),
(83, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1212', 'Meropenem 500 mg Meroprem', '200423', '10', '24.00', '2023-04-30', 'Jose Ginarte'),
(84, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1232', 'Mesigyna Ampolla', 'XB30RCC', '10', '34.00', '2024-09-30', 'Jose Ginarte'),
(85, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1148', 'Metilprednisolona Richet', '40130', '10', '87.75', '2023-07-31', 'Jose Ginarte'),
(86, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1206', 'Midazolam 15 mg X 3 ml Ampolla', '21110165', '10', '25.00', '2023-11-30', 'Jose Ginarte'),
(87, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1132', 'Neostigmina Ampollla', 'GBS015', '10', '6.30', '2024-12-31', 'Jose Ginarte'),
(88, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1157', 'Nitroglicerina 25 mg x 5ml IV Ampolla Trinitroglicerina', '48086', '10', '36.50', '2024-06-30', 'Jose Ginarte'),
(89, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1150', 'Noradrenalina Ampolla', '6924', '10', '12.00', '2023-09-30', 'Jose Ginarte'),
(90, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1237', 'Novalgina 10 mg Ampolla Morfina', '10422', '10', '25.00', '2023-08-31', 'Jose Ginarte'),
(91, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1113', 'Ondansetrón 8 mg Ampolla', '41785', '10', '10.00', '2023-08-31', 'Jose Ginarte'),
(92, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1122', 'Piperacilina + tazobactam Ampolla', '40116', '10', '46.20', '2023-07-31', 'Jose Ginarte'),
(93, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1127', 'Propofol 1% Intro Venoso', '11369', '10', '45.50', '2024-05-31', 'Jose Ginarte'),
(94, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1257', 'Remifentanilo Ampolla', '39129', '10', '65.00', '2023-08-31', 'Jose Ginarte'),
(95, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1032', 'Sevogesic Frasco 250 ml (Sevoflurano Anestésico)', 'S1489F19', '1', '800.00', '2023-06-30', 'Jose Ginarte'),
(96, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1177', 'Tramadol 100 mg Ampolla Intro Veno', 'TRB071', '10', '9.00', '2023-06-30', 'Jose Ginarte'),
(97, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1126', 'Vancomicina 1 gr', '41841', '10', '31.50', '2023-10-31', 'Jose Ginarte'),
(98, 9, '2023-01-21', '2023-01-11', '1432', 'V&C MEDICAMENTOS', '1128', 'Vancomicina 500mg Ampolla', '59706', '10', '15.00', '2023-05-31', 'Jose Ginarte'),
(99, 10, '2023-01-24', '2023-01-24', '0', 'Betancourt', '', 'Jeringas 1ml ', '20180414', '2,469', '0', '2023-03-31', 'Jose Ginarte'),
(101, 12, '2023-01-24', '2023-01-24', '0', 'Betancourt', '', 'Agua Oxigenada', 'RR102040121', '6', '0', '2023-01-31', 'Jose Ginarte'),
(102, 12, '2023-01-24', '2023-01-24', '0', 'Betancourt', '27', 'Alcohol Yodado', 'RR103020321', '5', '0', '2023-04-30', 'Jose Ginarte'),
(103, 12, '2023-01-24', '2023-01-24', '0', 'Betancourt', '', 'Suero Dextrosa 5% 1000 ml', '230010119', '1', '0', '2024-01-31', 'Jose Ginarte'),
(104, 13, '2023-01-24', '2023-01-24', '0', 'Betancourt', '28', 'Suero Ringer Lactato', '290131219', '1', '0', '2024-12-31', 'Jose Ginarte'),
(105, 13, '2023-01-24', '2023-01-24', '0', 'Betancourt', '29', 'Metronidazol 500mg/100ml frasco', '3A20062303', '4', '0', '2023-06-30', 'Jose Ginarte'),
(106, 13, '2023-01-24', '2023-01-24', '0', 'Betancourt', '', 'Ciprofloxacino 200mg/100ml Frasco', '3A20022501', '14', '0', '2023-02-24', 'Jose Ginarte'),
(107, 13, '2023-01-24', '2023-01-24', '0', 'Betancourt', '25', 'Frasco Colector De Orina', '0', '105', '0', '', 'Jose Ginarte'),
(108, 13, '2023-01-24', '2023-01-24', '0', 'Betancourt', '36', 'Termómetro', '0', '16', '0', '', 'Jose Ginarte'),
(109, 13, '2023-01-24', '2023-01-24', '0', 'Betancourt', '', 'Guantes Quirúrgicos # 8', '2030595735PZA/1805', '31', '0', '2023-04-30', 'Jose Ginarte'),
(110, 14, '2023-01-24', '2023-01-24', '0', 'Betancourt', '', 'Tubo Endotraqueal # 7', '20081110', '6', '0', '2023-04-29', 'Jose Ginarte'),
(111, 15, '2023-01-24', '2023-01-24', '0', 'Betancourt', '', 'Bránula # 18', '19L12D', '45', '0', '2024-11-30', 'Jose Ginarte'),
(112, 15, '2023-01-24', '2023-01-24', '0', 'Betancourt', '', 'Electrodos Para EKG', '202111LR', '46', '0', '2021-11-14', 'Jose Ginarte'),
(113, 15, '2023-01-24', '2023-01-24', '0', 'Betancourt', '', 'Bolsas Colectoras De Orina', '20161110', '16', '0', '2021-12-31', 'Jose Ginarte'),
(114, 15, '2023-01-24', '2023-01-24', '0', 'Betancourt', '', 'Equipos De Sueros', '080419BKS', '18', '0', '2024-07-31', 'Jose Ginarte'),
(115, 16, '2023-01-24', '2023-01-24', '0', 'Betancourt', '', 'Microgotero de 150 ml', '200415', '7', '0', '2025-03-31', 'Jose Ginarte'),
(116, 16, '2023-01-24', '2023-01-24', '0', 'Betancourt', '', 'Vendas De Gasa - 15cm', '', '18', '0', '', 'Jose Ginarte'),
(117, 16, '2023-01-24', '2023-01-24', '0', 'Betancourt', '', 'Mariposas / Scalp Vein # 21', '', '24', '0', '2023-11-30', 'Jose Ginarte'),
(118, 16, '2023-01-24', '2023-01-24', '0', 'Betancourt', '', 'Vendas Elásticas - 15cm', 'CJ19366', '3', '0', '2024-07-01', 'Jose Ginarte'),
(119, 17, '2023-01-24', '2023-01-24', '0', 'Betancourt', '', 'Lidocaína 2% Sin Conservantes', 'OECO46073', '16', '0', '2023-04-30', 'Jose Ginarte'),
(120, 18, '2023-01-24', '2023-01-24', '0', 'Betancourt', '', 'Triapen - 6.3.3', 'VV4/841', '11', '0', '2023-11-30', 'Jose Ginarte'),
(121, 19, '2023-01-24', '2023-01-24', '0', 'Betancourt', '69', 'Acetilcisteína 300mg-3ml', '112170', '8', '0', '2024-12-31', 'Jose Ginarte'),
(124, 21, '2023-01-24', '2023-01-24', '0', 'Betancourt', '', 'Neostigmina 0,5mg/1ml', '19032285', '1', '0', '2023-03-31', 'Jose Ginarte'),
(126, 22, '2023-01-25', '2023-01-25', '0', 'Betancourt', '987', 'Vitamina C / 1g', '200552', '10', '0', '2023-05-22', 'Jose Ginarte'),
(127, 23, '2023-01-25', '2023-01-25', '0', 'Betancourt', '39', 'Agujas Pencan #27 /Normal ', '18M19H8B03', '2', '0', '2023-11-30', 'Jose Ginarte'),
(128, 24, '2023-01-25', '2023-01-25', '0', 'Betancourt', '38', 'Agujas Pencan # 27 /Obesos', '19F13H8B01', '4', '0', '2024-06-30', 'Jose Ginarte'),
(129, 25, '2023-01-25', '2023-01-25', '0', 'Betancourt', '0', 'Jeringas 3ml', '201908A', '1', '0', '2024-07-31', 'Jose Ginarte'),
(130, 26, '2023-01-25', '2023-01-25', '0', 'Betancourt', '9', 'Jeringa 5 ml', '20170425', '4', '0', '2022-04-25', 'Jose Ginarte'),
(131, 27, '2023-01-25', '2023-01-25', '0', 'Betancourt', '24', 'Copper T Dispositivo Intrauterino DIU / TCU 380-A', '192258', '1', '0', '2026-04-30', 'Jose Ginarte'),
(132, 28, '2023-01-25', '2023-01-25', '0', 'Betancourt', '545', 'Esparadrapo 5cm x 4,5cm', '0', '1', '0', '', 'Jose Ginarte'),
(133, 29, '2023-01-25', '2023-01-11', '6169', 'N Y L', '5110', 'Suero Dextrosa 500 ml', '5NU25F543', '48', '12.82', '2025-11-30', 'Jose Ginarte'),
(134, 29, '2023-01-25', '2023-01-11', '6169', 'N Y L', '5120', 'Suero Fisiológico', '5SU89B54321', '48', '11.47', '2027-09-30', 'Jose Ginarte'),
(135, 29, '2023-01-25', '2023-01-11', '6169', 'N Y L', '396', 'Betametasona 4mg Ampolla', '211172', '10', '4.95', '2024-11-30', 'Jose Ginarte'),
(136, 29, '2023-01-25', '2023-01-11', '6169', 'N Y L', '402', 'Ciprofloxacino 200mg 100ml Fco.', '2202240901', '5', '6.80', '2024-02-29', 'Jose Ginarte'),
(137, 29, '2023-01-25', '2023-01-11', '6169', 'N Y L', '398', 'Cefazolina Sódica 1gr Ampolla', '211087', '10', '9.75', '2024-10-31', 'Jose Ginarte'),
(138, 29, '2023-01-25', '2023-01-11', '6169', 'N Y L', '399', 'Cefotaxima Sódica 1gr Ampolla', 'E06210916', '10', '5.55', '2024-09-30', 'Jose Ginarte'),
(139, 29, '2023-01-25', '2023-01-11', '6169', 'N Y L', '388', 'Amikacina 500 mg Ampolla', '210907', '10', '6.30', '2024-09-30', 'Jose Ginarte'),
(140, 30, '2023-01-25', '2023-01-25', '0', 'Betancourt', '100', 'Diposan 100Mg Dimetilpolisiloxano', '03703', '73', '0', '2025-02-20', 'Jose Ginarte'),
(141, 30, '2023-01-25', '2023-01-25', '0', 'Betancourt', '123', 'Bránula # 20', '20190310', '6', '0', '2024-12-09', 'Jose Ginarte'),
(142, 30, '2023-01-25', '2023-01-25', '0', 'Betancourt', '6666', 'Equipos De Sueros', '210105', '1', '0', '2025-12-31', 'Jose Ginarte'),
(143, 30, '2023-01-25', '2023-01-25', '0', 'Betancourt', '8', 'Jeringa 20 ml', '20G2204J', '1', '0', '2025-06-30', 'Jose Ginarte'),
(144, 31, '2023-01-25', '2023-01-25', '0', 'Betancourt', '8', 'Jeringa 20 ml', '20H1404J', '1', '0', '2025-07-31', 'Jose Ginarte'),
(145, 31, '2023-01-25', '2023-01-25', '0', 'Betancourt', '8', 'Jeringa 20 ml', '21B1904J', '2', '0', '2026-01-31', 'Jose Ginarte'),
(146, 31, '2023-01-25', '2023-01-25', '0', 'Betancourt', '35', 'Jeringa 10ml', '20210303', '1', '0', '2026-03-02', 'Jose Ginarte'),
(147, 31, '2023-01-25', '2023-01-25', '0', 'Betancourt', '1122', 'Piperacilina + tazobactam Ampolla', '683889A', '3', '0', '2023-07-31', 'Jose Ginarte'),
(148, 31, '2023-01-25', '2023-01-25', '0', 'Betancourt', '1122', 'Piperacilina + tazobactam Ampolla', '1J107', '1', '0', '2023-03-08', 'Jose Ginarte'),
(149, 31, '2023-01-25', '2023-01-25', '0', 'Betancourt', '399', 'Cefotaxima Sódica 1gr Ampolla', '203052031', '1', '0', '2023-05-18', 'Jose Ginarte'),
(150, 31, '2023-01-25', '2023-01-25', '0', 'Betancourt', '99', 'Ceftriaxona Sódica 1G', '203052071', '4', '0', '2023-08-19', 'Jose Ginarte'),
(151, 31, '2023-01-25', '2023-01-25', '0', 'Betancourt', '85', 'Dexametasona 8mg/2ml Amp.', '200640', '37', '0', '2023-06-30', 'Jose Ginarte'),
(152, 31, '2023-01-25', '2023-01-25', '0', 'Betancourt', '59', 'Ranitidina 50mg/2ml Amp.', '203212084', '33', '0', '2023-07-08', 'Jose Ginarte'),
(153, 31, '2023-01-25', '2023-01-25', '0', 'Betancourt', '17', 'Metoclopramida 10mg Amp.', '200942', '17', '0', '2023-09-25', 'Jose Ginarte'),
(154, 31, '2023-01-25', '2023-01-25', '0', 'Betancourt', '32', 'Agua Destilada 5ml/ Amp.', '2002108', '1', '0', '2025-07-31', 'Jose Ginarte'),
(155, 31, '2023-01-25', '2023-01-25', '0', 'Betancourt', '32', 'Agua Destilada 5ml/ Amp.', '2001242', '3', '0', '2025-02-28', 'Jose Ginarte'),
(156, 31, '2023-01-25', '2023-01-25', '0', 'Betancourt', '987', 'Vitamina C / 1g', '310639', '1', '0', '2023-04-30', 'Jose Ginarte'),
(157, 31, '2023-01-25', '2023-01-25', '0', 'Betancourt', '17', 'Metoclopramida 10mg Amp.', '103410', '1', '0', '2025-03-31', 'Jose Ginarte'),
(158, 31, '2023-01-25', '2023-01-25', '0', 'Betancourt', '987', 'Vitamina C / 1g', 'RS', '2', '0', '2023-02-08', 'Jose Ginarte'),
(159, 32, '2023-01-25', '2023-01-09', '000032', 'Intermedical', '', 'Guantes Quirúrgicos # 6', '2030873625PZA-1910', '50', '3', '2021-10-30', 'Jose Ginarte'),
(160, 32, '2023-01-25', '2023-01-09', '000032', 'Intermedical', '060102002', 'Guantes Quirúrgicos # 7', '20220310', '50', '3', '2027-02-28', 'Jose Ginarte'),
(161, 32, '2023-01-25', '2023-01-09', '000032', 'Intermedical', '060102003', 'Guantes Quirúrgicos # 7.5', '20220315', '50', '3', '2027-02-28', 'Administrador betancourt'),
(162, 32, '2023-01-25', '2023-01-09', '000032', 'Intermedical', '060102004', 'Guantes Quirúrgicos # 8', '20220319', '50', '3', '2027-03-18', 'Jose Ginarte'),
(163, 32, '2023-01-25', '2023-01-09', '000032', 'Intermedical', '', 'Jeringa 5 ml', '20210406', '50', '0.9', '2026-05-06', 'Jose Ginarte'),
(164, 32, '2023-01-25', '2023-01-09', '000032', 'Intermedical', '', 'Jeringa 20 ml', '20211201', '50', '0.9', '2026-12-01', 'Jose Ginarte'),
(165, 32, '2023-01-25', '2023-01-09', '000032', 'Intermedical', '', 'Bránula # 18', '22F07E', '100', '3.70', '2027-05-30', 'Jose Ginarte'),
(166, 32, '2023-01-25', '2023-01-09', '000032', 'Intermedical', '', 'Bránula # 20', '22F28C', '100', '3.70', '2027-05-30', 'Jose Ginarte'),
(167, 32, '2023-01-25', '2023-01-09', '000032', 'Intermedical', '', 'Bránula # 22', '22B01J', '100', '3.70', '2027-01-30', 'Jose Ginarte'),
(168, 32, '2023-01-25', '2023-01-09', '000032', 'Intermedical', '', 'Bránula # 24', '22A18E', '100', '3.70', '2025-12-30', 'Jose Ginarte'),
(169, 33, '2023-01-25', '2023-01-25', '0', 'Betancourt', '1683', 'Tegaderm 6,5cm x 7cm', '334997', '3', '0', '2021-03-29', 'Jose Ginarte'),
(170, 33, '2023-01-25', '2023-01-25', '0', 'Betancourt', '1626', 'Tegaderm 10cm x 12cm', '335PMC', '15', '0', '2022-10-17', 'Jose Ginarte'),
(171, 33, '2023-01-25', '2023-01-25', '0', 'Betancourt', '1626', 'Tegaderm 10cm x 12cm', '339K75', '17', '0', '2023-07-01', 'Jose Ginarte'),
(172, 33, '2023-01-25', '2023-01-25', '0', 'Betancourt', '7509', 'Placa / Electro Adultos', '82130396X', '1', '0', '2020-08-01', 'Jose Ginarte'),
(173, 33, '2023-01-25', '2023-01-25', '0', 'Betancourt', '396', 'Betametasona 4mg Ampolla', 'TOD', '5', '0', '2023-07-31', 'Jose Ginarte'),
(174, 33, '2023-01-25', '2023-01-25', '0', 'Betancourt', '1224', 'Sulfato Ferroso + Ácido Fólico + Vitamina C', '200232', '100', '0', '2023-02-15', 'Jose Ginarte'),
(175, 33, '2023-01-25', '2023-01-25', '0', 'Betancourt', '56', 'Baja Lengua / Madera-Adultos', '190304', '300', '0', '2024-05-31', 'Jose Ginarte'),
(176, 33, '2023-01-25', '2023-01-25', '0', 'Betancourt', '2222', 'Complejo B B1 20mg+B2 2mg+B6 2mg', '200813', '75', '0', '2023-08-16', 'Jose Ginarte'),
(177, 33, '2023-01-25', '2023-01-25', '0', 'Betancourt', '2222', 'Complejo B B1 20mg+B2 2mg+B6 2mg', '05158', '1', '0', '2023-07-31', 'Jose Ginarte'),
(178, 34, '2023-01-25', '2023-01-25', '0', 'Betancourt', '888', 'BIberón / 2 OZ. Mamadera', '08-121823', '6', '0', '2023-12-08', 'Jose Ginarte'),
(179, 34, '2023-01-25', '2023-01-25', '0', 'Betancourt', '8888', 'Biberón / 50ml 0-3 meses', '20084', '11', '0', '2023-02-19', 'Jose Ginarte'),
(180, 35, '2023-01-25', '2023-01-25', '0', 'Betancourt', '77', 'Heparin Cap', '20180305', '19', '0', '2021-03-04', 'Jose Ginarte'),
(182, 36, '2023-01-26', '2023-01-26', '0', 'Betancourt', '1132', 'Neostigmina 0,5mg/1ml', '04755', '12', '0', '2025-06-30', 'Administrador betancourt'),
(184, 38, '2023-01-27', '2023-01-27', '0', 'Betancourt', '35', 'Jeringa 10ml', '201908B', '9', '0', '2024-07-31', 'Jose Ginarte'),
(185, 39, '2023-01-27', '2023-01-27', '0', 'Betancourt', '398', 'Cefazolina Sódica 1gr Ampolla', '200347', '2', '0', '2023-03-31', 'Jose Ginarte'),
(186, 40, '2023-01-27', '2023-01-27', '0', 'Betancourt', '99', 'Ceftriaxona Sódica 1G', '200448', '1', '0', '2023-04-30', 'Jose Ginarte'),
(187, 41, '2023-01-27', '2023-01-27', '0', 'Betancourt', '1156', 'Hidrocortisona 500 mg Ampolla', '40891', '2', '0', '2024-07-31', 'Jose Ginarte'),
(188, 42, '2023-01-27', '2023-01-27', '0', 'Betancourt', '80', 'Gentamicina 80mg Amp.', '20015', '1', '0', '2023-02-18', 'Jose Ginarte'),
(189, 43, '2023-01-27', '2023-01-27', '0', 'Betancourt', '80', 'Gentamicina 80mg Amp.', '203212144', '1', '0', '2023-10-01', 'Jose Ginarte'),
(190, 44, '2023-01-27', '2023-01-27', '0', 'Betancourt', '75', 'Diclofenaco 75mg Amp.', 'TR0', '1', '0', '2023-10-31', 'Jose Ginarte'),
(191, 45, '2023-01-27', '2023-01-27', '0', 'Betancourt', '1152', 'Etilefrina 10 mg Ampolla (Efortil)', '14527', '1', '0', '2023-04-30', 'Jose Ginarte'),
(192, 46, '2023-01-27', '2023-01-27', '0', 'Betancourt', '388', 'Amikacina 500 mg Ampolla', '200602', '1', '0', '2023-06-30', 'Jose Ginarte'),
(193, 47, '2023-01-27', '2023-01-27', '0', 'Betancourt', '60', 'Ketorolaco Trometamina 60mg/2ml Amp.', '08893', '1', '0', '2024-02-28', 'Jose Ginarte'),
(194, 48, '2023-01-27', '2023-01-27', '0', 'Betancourt', '1152', 'Etilefrina 10 mg Ampolla (Efortil)', '0420003', '1', '0', '2023-05-31', 'Jose Ginarte'),
(195, 49, '2023-01-28', '2023-01-28', '0', 'Betancourt', '4444', 'Frasco P/Heces Fecales', '', '1', '0', '', 'Jose Ginarte'),
(196, 49, '2023-01-28', '2023-01-28', '0', 'Betancourt', '50', 'Lancetas y Tiras P / Glucómetro', '', '5', '0', '', 'Jose Ginarte'),
(197, 49, '2023-01-28', '2023-01-28', '0', 'Betancourt', '16', 'Hemosuctor # 16', '4131019K', '6', '0', '2024-08-31', 'Jose Ginarte'),
(198, 50, '2023-01-28', '2023-01-28', '0', 'Betancourt', '15', 'Bisturí #15', '180301', '52', '0', '2023-03-31', 'Jose Ginarte'),
(199, 50, '2023-01-28', '2023-01-28', '0', 'Betancourt', '21', 'Bisturí #21', '190211', '97', '0', '2024-02-28', 'Jose Ginarte'),
(200, 51, '2023-01-28', '2023-01-28', '0', 'Betancourt', '1075', 'Hilo Lino Quirúrgico 10 x 75cm', '1020569', '21', '0', '2024-02-28', 'Jose Ginarte'),
(201, 52, '2023-01-28', '2023-01-28', '0', 'Betancourt', '31', 'Transpore 3M / 1,25cm', '2020-12BE', '19', '0', '2020-12-31', 'Jose Ginarte'),
(202, 53, '2023-01-28', '2023-01-28', '0', 'Betancourt', '64', 'Bolsa De Colostomía 64mm', '', '1', '0', '', 'Jose Ginarte'),
(203, 54, '2023-01-30', '2023-01-30', '0', 'Betancourt', '22', 'Bisturí #22', '15305', '194', '0', '2020-07-31', 'Jose Ginarte'),
(204, 54, '2023-01-30', '2023-01-30', '0', 'Betancourt', '101', 'Bisturí #10', '150439', '96', '0', '2020-04-30', 'Jose Ginarte'),
(205, 54, '2023-01-30', '2023-01-30', '0', 'Betancourt', '42', 'Terbometasona 4mg/2ml Dexametasona', '1A20004', '3', '0', '2023-01-31', 'Jose Ginarte'),
(206, 54, '2023-01-30', '2023-01-30', '0', 'Betancourt', '85', 'Dexametasona 8mg/2ml Amp.', '200640', '1', '0', '2023-06-30', 'Jose Ginarte'),
(207, 54, '2023-01-30', '2023-01-30', '0', 'Betancourt', '17', 'Metoclopramida 10mg Amp.', '20942', '1', '0', '2023-09-25', 'Jose Ginarte'),
(208, 54, '2023-01-30', '2023-01-30', '0', 'Betancourt', '505', 'Neocaína Pesada 0,50% (5mg/ml', '21050716', '1', '0', '2023-05-31', 'Jose Ginarte'),
(209, 55, '2023-01-30', '2023-01-30', '0', 'Betancourt', '12', 'Vitamina K - Fitomenadiiona 1ml ', '200220', '151', '0', '2023-02-20', 'Jose Ginarte'),
(210, 56, '2023-01-30', '2023-01-30', '0', 'Betancourt', '4', 'Suturas Mononylon # 4/0 (45cm/SC-20) 3/8', 'AF4564', '25', '0', '2023-01-31', 'Jose Ginarte'),
(211, 56, '2023-01-30', '2023-01-30', '0', 'Betancourt', '40', 'Suturas Mononylon # 4/0 (75cm/25mm) 1/2', '1711250', '22', '0', '2022-12-31', 'Jose Ginarte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `datetime` datetime NOT NULL,
  `sender_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=unseen, 1=seen, 2=delete',
  `receiver_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=unseen, 1=seen, 2=delete'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `message`
--

INSERT INTO `message` (`id`, `sender_id`, `receiver_id`, `subject`, `message`, `datetime`, `sender_status`, `receiver_status`) VALUES
(1, 11, 3, 'Hola', '<p>Hola hola, mensaje de prueba</p>', '2023-01-20 01:55:50', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text,
  `image` varchar(255) NOT NULL,
  `directory` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `module`
--

INSERT INTO `module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES
(1, 'Dashboard', 'Dashboard', '', 'dashboard', 1),
(3, 'Department', 'department System', 'application/modules/store/assets/images/thumbnail.jpg', 'departamento', 1),
(4, 'Doctor', 'Doctor', 'application/modules/user_role/assets/images/thumbnail.jpg', 'doctor', 1),
(5, 'Patient', 'Paciente', 'application/modules/employee/assets/images/thumbnail.jpg', 'Paciente', 1),
(6, 'Schedule', 'Schedule', 'application/modules/customer/assets/images/thumbnail.jpg', 'schedule', 1),
(7, 'Appointment', 'Appointment', 'application/modules/product/assets/images/thumbnail.jpg', 'appointment', 1),
(8, 'Prescription', 'Prescription', 'application/modules/category/assets/images/thumbnail.jpg', 'prescription', 1),
(9, 'Account Manager', 'Account Manager', 'application/modules/supplier/assets/images/thumbnail.jpg', 'account_manager', 1),
(11, 'Insurance', 'Insurance', 'application/modules/warehouse/assets/images/thumbnail.jpg', 'insurance', 1),
(12, 'Billing', 'Billing', 'application/modules/sale/assets/images/thumbnail.jpg', 'billing', 1),
(13, 'Human Resources', 'Human Resources', 'application/modules/lease/assets/images/thumbnail.jpg', 'human_resources', 1),
(14, 'Bed Manager', 'Bed Manager', 'application/modules/payment/assets/images/thumbnail.jpg', 'bed_manager', 1),
(15, 'Noticeboard', 'Noticeboard', 'application/modules/stockmovment/assets/images/thumbnail.jpg', 'noticeboard', 1),
(16, 'Case Manager', 'Case Manager', 'application/modules/store/assets/images/thumbnail.jpg', 'case_manager', 1),
(17, 'Hospital Activities', 'Hospital Activities', 'application/modules/store/assets/images/thumbnail.jpg', 'hospital_activities', 1),
(18, 'Enquiry', 'Enquiry', 'application/modules/store/assets/images/thumbnail.jpg', 'enquiry', 1),
(19, 'Setting', 'Setting', 'application/modules/store/assets/images/thumbnail.jpg', 'setting', 1),
(20, 'SMS', 'SMS', 'application/modules/store/assets/images/thumbnail.jpg', 'sms', 1),
(21, 'Messages', 'Messages', 'application/modules/store/assets/images/thumbnail.jpg', 'messages', 1),
(22, 'Mail', 'Mail', 'application/modules/store/assets/images/thumbnail.jpg', 'mail', 1),
(23, 'Website', 'Website', 'application/modules/store/assets/images/thumbnail.jpg', 'website', 1),
(24, 'Permission', 'Permission', 'application/modules/store/assets/images/thumbnail.jpg', 'permission', 1),
(25, 'Medications and Visits', 'Medications and Visits', '', 'medication_visit', 1),
(26, 'Pharmacy', 'Hospital Pharmacy', '', 'pharmacy', 1),
(27, 'Consultas', 'Consultas', '', 'consultas', 1),
(28, 'Laboratorio', 'Laboratorio', '', 'laboratorio', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `assign_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(20) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `blood_group` varchar(10) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `affliate` varchar(50) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `patient`
--

INSERT INTO `patient` (`id`, `patient_id`, `firstname`, `lastname`, `email`, `password`, `phone`, `mobile`, `address`, `sex`, `blood_group`, `date_of_birth`, `affliate`, `picture`, `created_by`, `create_date`, `status`, `user_role`) VALUES
(1, 'P6953OWI', 'asdas', 'asd', 'admin@demo.com', 'e10adc3949ba59abbe56e057f20f883e', '0987', '09876543', 'sdfsd dsdf', 'Male', 'A+', '2019-02-08', NULL, '', 1, '2020-05-23', 1, ''),
(2, 'PELWQ10G', 'Jerin', 'khan', 'jerin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, '04246402701', 'Calle 90, Av. 16', 'Male', 'O+', '1993-01-01', NULL, NULL, NULL, '2020-06-15', 1, ''),
(3, 'PQHZMY23', 'Erick', 'Gonçalves dos Santos', 'dr.ericksantos@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', '71608981', 'AV: Bush 570', 'Male', 'B+', '1986-11-11', NULL, 'assets/images/patient/16f0af76557761d01260952cea9ee26a.jpg', 1, '2022-04-19', 1, ''),
(4, 'PJXGONMO', 'Lola', 'Melean Rodriguez', 'lolita_@hotmail.com', '1ac0d72d238c86b2029c8419ba2574a2', '', '70241149', 'SANTA CRUZ DE LA SIERRA', 'Female', 'O+', '1982-03-03', NULL, '', 4, '2022-04-30', 1, ''),
(5, 'PHLJBMVS', 'Marco Antonio', 'Condori Vargas', 'Dr_Mco@yahoo.com', 'bf5d288868d1fe98adf551840c4065a2', '', '74210887', 'cuarto anillo', 'Female', 'O+', '1982-03-03', NULL, '', 4, '2022-06-08', 1, ''),
(6, 'PTPBB0YT', 'Briyith', 'Unzueta Barrero', '1@1.com', '827ccb0eea8a706c4c34a16891f84e7b', '', '70241149', 'tres pasos al frente', 'Female', 'O+', '1980-04-02', NULL, 'assets/images/patient/8ed056595302cf6c3bf94175188bf5dc.jpg', 4, '2022-07-06', 1, ''),
(7, 'P63G0TSG', 'jorge', 'torrico ortuño', '1@1hotmail', '38964529d7dfbbead883f779519b897e', '', '71084221', 'SANTA CRUZ DE LA SIERRA', 'Male', 'O+', '1972-02-17', NULL, 'assets/images/patient/a0a0842036690ce09a880e19d7b043fa.jpg', 4, '2022-07-08', 1, ''),
(8, 'PGOV0KON', 'jorge', 'torrico ortuño', '1@1hotmail', '38964529d7dfbbead883f779519b897e', '', '71084221', 'SANTA CRUZ DE LA SIERRA', 'Male', 'O+', '1972-02-17', NULL, 'assets/images/patient/3a758013cc4922122b0cd50fa0cad375.jpg', 4, '2022-07-08', 1, ''),
(9, 'P2OKPVLD', 'Noel', 'Atiare', 'a@m.com', '827ccb0eea8a706c4c34a16891f84e7b', '', '75369846', 'Zoilllo Flores', 'Male', 'A+', '1996-04-24', NULL, '', 1, '2023-01-13', 1, ''),
(10, 'P9AS15E5', 'Nisa', 'Delgado Enrolado', 'nisa@nisa.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, '71166655', 'ANDRES MANSO', 'Male', 'B+', '1990-01-18', NULL, NULL, 1, '2023-01-24', 1, ''),
(11, 'P70POQX8', 'Javier', 'Gonzalez', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, '123', 'Nueva via', 'Male', 'O+', '1992-10-08', NULL, NULL, 1, '2023-01-25', 1, ''),
(12, 'P8MO0SAU', 'carla ninet', 'ardaya arteaga', 'ardayaarteagacarlaninet@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', '74625333', 'av. 3 pasos al frente ', 'Female', 'B+', '1996-09-23', NULL, '', 10, '2023-01-26', 1, ''),
(13, 'P425VEPW', 'Isabel', 'Romero Mendez', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, '65704565', 'EL TROMPILLO', 'Female', '', '2015-01-14', NULL, NULL, 4, '2023-01-27', 1, ''),
(14, 'PMAWMJL5', 'juana ', 'perez', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, '69270050', 'cuarto anillo ', 'Female', '', '2008-03-05', NULL, NULL, 4, '2023-01-30', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pa_visit`
--

CREATE TABLE `pa_visit` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_type` int(2) NOT NULL COMMENT '2=doctor and 5=nurse',
  `user_id` int(11) NOT NULL,
  `visit_date` date NOT NULL,
  `visit_time` time NOT NULL,
  `finding` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `instructions` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fees` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `language` varchar(15) NOT NULL,
  `title` varchar(60) NOT NULL,
  `institute` varchar(100) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(256) DEFAULT NULL,
  `nit` varchar(256) DEFAULT NULL,
  `telefono` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `direccion` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`, `nit`, `telefono`, `email`, `direccion`) VALUES
(4, 'V&C MEDICAMENTOS', '123456', '7411477', '0@.0com', '665544'),
(5, 'N Y L', '123456', '71608981', 'CONTACTO@CRIATIVEDIGITAL.COM', 'ANDRES MANSO'),
(6, 'Lola Medicamentos', '123456', '6984217777', 'dr.ericksantos@gmail.com', 'calle Florida\nCentro'),
(7, 'Malta y Asociados', '1024845024', '3336077', 'a@a.com', 'calle manuel ignaciano salva tierra numero 983'),
(8, 'Intermedical', '238410026', '33596663', '', 'Ave. Roca y Coronado #779'),
(9, 'Betancourt', '422146029', '76972724', 'info@clinicamedicabetancourt.com', 'Calle - Zoilo Flores entre Leocadia Ibañez y NIcomedes Antelo'),
(10, 'Betancourt', '422146029', '76972724', 'info@clinicamedicabetancourt.com', 'Calle - Zoilo Flores entre Leocadia Ibañez y NIcomedes Antelo'),
(11, 'Betancourt', '422146029', '76972724', 'info@clinicamedicabetancourt.com', 'Calle - Zoilo Flores entre Leocadia Ibañez y NIcomedes Antelo'),
(12, 'Betancourt', '422146029', '76972724', 'info@clinicamedicabetancourt.com', 'Calle - Zoilo Flores entre Leocadia Ibañez y NIcomedes Antelo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pr_case_study`
--

CREATE TABLE `pr_case_study` (
  `id` int(11) UNSIGNED NOT NULL,
  `patient_id` varchar(30) DEFAULT NULL,
  `food_allergies` varchar(255) DEFAULT NULL,
  `tendency_bleed` varchar(255) DEFAULT NULL,
  `heart_disease` varchar(255) DEFAULT NULL,
  `high_blood_pressure` varchar(255) DEFAULT NULL,
  `diabetic` varchar(255) DEFAULT NULL,
  `surgery` varchar(255) DEFAULT NULL,
  `accident` varchar(255) DEFAULT NULL,
  `others` varchar(255) DEFAULT NULL,
  `family_medical_history` varchar(255) DEFAULT NULL,
  `current_medication` varchar(255) DEFAULT NULL,
  `female_pregnancy` varchar(255) DEFAULT NULL,
  `breast_feeding` varchar(255) DEFAULT NULL,
  `health_insurance` varchar(255) DEFAULT NULL,
  `low_income` varchar(255) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pr_prescription`
--

CREATE TABLE `pr_prescription` (
  `id` int(11) UNSIGNED NOT NULL,
  `appointment_id` varchar(30) DEFAULT NULL,
  `patient_id` varchar(30) NOT NULL,
  `patient_type` varchar(50) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `chief_complain` text,
  `insurance_id` int(11) DEFAULT NULL,
  `policy_no` varchar(255) DEFAULT NULL,
  `weight` varchar(50) DEFAULT NULL,
  `blood_pressure` varchar(255) DEFAULT NULL,
  `medicine` text,
  `diagnosis` text,
  `visiting_fees` float DEFAULT NULL,
  `patient_notes` text,
  `reference_by` varchar(50) DEFAULT NULL,
  `reference_to` varchar(50) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_permission`
--

CREATE TABLE `role_permission` (
  `id` int(11) NOT NULL,
  `fk_module_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `create` tinyint(1) DEFAULT NULL,
  `read` tinyint(1) DEFAULT NULL,
  `update` tinyint(1) DEFAULT NULL,
  `delete` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `role_permission`
--

INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES
(251, 127, 3, 0, 0, 0, 0),
(252, 128, 3, 0, 0, 0, 0),
(253, 129, 3, 0, 0, 0, 0),
(254, 130, 3, 0, 0, 0, 0),
(255, 3, 3, 0, 0, 0, 0),
(256, 4, 3, 0, 0, 0, 0),
(257, 121, 3, 0, 0, 0, 0),
(258, 122, 3, 0, 0, 0, 0),
(259, 6, 3, 0, 0, 0, 0),
(260, 7, 3, 0, 0, 0, 0),
(261, 8, 3, 0, 0, 0, 0),
(262, 9, 3, 0, 0, 0, 0),
(263, 10, 3, 0, 0, 0, 0),
(264, 11, 3, 0, 0, 0, 0),
(265, 12, 3, 0, 0, 0, 0),
(266, 13, 3, 0, 0, 0, 0),
(267, 126, 3, 0, 0, 0, 0),
(268, 14, 3, 0, 0, 0, 0),
(269, 15, 3, 0, 0, 0, 0),
(270, 16, 3, 0, 0, 0, 0),
(271, 17, 3, 0, 0, 0, 0),
(272, 18, 3, 0, 0, 0, 0),
(273, 19, 3, 0, 0, 0, 0),
(274, 96, 3, 0, 0, 0, 0),
(275, 97, 3, 0, 0, 0, 0),
(276, 20, 3, 0, 0, 0, 0),
(277, 21, 3, 0, 0, 0, 0),
(278, 22, 3, 0, 0, 0, 0),
(279, 95, 3, 0, 0, 0, 0),
(280, 23, 3, 0, 0, 0, 0),
(281, 24, 3, 0, 0, 0, 0),
(282, 25, 3, 0, 0, 0, 0),
(283, 26, 3, 0, 0, 0, 0),
(284, 27, 3, 0, 0, 0, 0),
(285, 28, 3, 0, 0, 0, 0),
(286, 29, 3, 0, 0, 0, 0),
(287, 30, 3, 0, 0, 0, 0),
(288, 31, 3, 0, 0, 0, 0),
(289, 123, 3, 0, 0, 0, 0),
(290, 124, 3, 0, 0, 0, 0),
(291, 125, 3, 0, 0, 0, 0),
(292, 32, 3, 0, 0, 0, 0),
(293, 33, 3, 0, 0, 0, 0),
(294, 34, 3, 0, 0, 0, 0),
(295, 35, 3, 0, 0, 0, 0),
(296, 36, 3, 0, 0, 0, 0),
(297, 37, 3, 0, 0, 0, 0),
(298, 38, 3, 0, 0, 0, 0),
(299, 39, 3, 0, 0, 0, 0),
(300, 40, 3, 0, 0, 0, 0),
(301, 41, 3, 0, 0, 0, 0),
(302, 42, 3, 0, 0, 0, 0),
(303, 43, 3, 0, 0, 0, 0),
(304, 44, 3, 0, 0, 0, 0),
(305, 45, 3, 0, 0, 0, 0),
(306, 139, 3, 0, 0, 0, 0),
(307, 140, 3, 0, 0, 0, 0),
(308, 46, 3, 0, 0, 0, 0),
(309, 47, 3, 0, 0, 0, 0),
(310, 54, 3, 0, 0, 0, 0),
(311, 55, 3, 0, 0, 0, 0),
(312, 56, 3, 0, 0, 0, 0),
(313, 57, 3, 0, 0, 0, 0),
(314, 58, 3, 0, 0, 0, 0),
(315, 59, 3, 0, 0, 0, 0),
(316, 60, 3, 0, 0, 0, 0),
(317, 61, 3, 0, 0, 0, 0),
(318, 62, 3, 0, 0, 0, 0),
(319, 63, 3, 0, 0, 0, 0),
(320, 64, 3, 0, 0, 0, 0),
(321, 65, 3, 0, 0, 0, 0),
(322, 66, 3, 0, 0, 0, 0),
(323, 67, 3, 0, 0, 0, 0),
(324, 68, 3, 0, 0, 0, 0),
(325, 69, 3, 0, 0, 0, 0),
(326, 70, 3, 0, 0, 0, 0),
(327, 75, 3, 0, 0, 0, 0),
(328, 76, 3, 0, 0, 0, 0),
(329, 77, 3, 0, 0, 0, 0),
(330, 98, 3, 0, 0, 0, 0),
(331, 103, 3, 0, 0, 0, 0),
(332, 104, 3, 0, 0, 0, 0),
(333, 78, 3, 0, 0, 0, 0),
(334, 79, 3, 0, 0, 0, 0),
(335, 80, 3, 0, 0, 0, 0),
(336, 81, 3, 0, 0, 0, 0),
(337, 82, 3, 0, 0, 0, 0),
(338, 83, 3, 0, 0, 0, 0),
(339, 84, 3, 0, 0, 0, 0),
(340, 85, 3, 0, 0, 0, 0),
(341, 86, 3, 0, 0, 0, 0),
(342, 87, 3, 0, 0, 0, 0),
(343, 88, 3, 0, 0, 0, 0),
(344, 89, 3, 0, 0, 0, 0),
(345, 90, 3, 0, 0, 0, 0),
(346, 91, 3, 0, 0, 0, 0),
(347, 92, 3, 0, 0, 0, 0),
(348, 93, 3, 0, 0, 0, 0),
(349, 94, 3, 0, 0, 0, 0),
(350, 111, 3, 0, 0, 0, 0),
(351, 112, 3, 0, 0, 0, 0),
(352, 113, 3, 0, 0, 0, 0),
(353, 114, 3, 0, 0, 0, 0),
(354, 115, 3, 0, 0, 0, 0),
(355, 116, 3, 0, 0, 0, 0),
(356, 117, 3, 0, 0, 0, 0),
(357, 118, 3, 0, 0, 0, 0),
(358, 119, 3, 0, 0, 0, 0),
(359, 120, 3, 0, 0, 0, 0),
(360, 99, 3, 0, 0, 0, 0),
(361, 101, 3, 0, 0, 0, 0),
(362, 102, 3, 0, 0, 0, 0),
(363, 105, 3, 0, 0, 0, 0),
(364, 106, 3, 0, 0, 0, 0),
(365, 107, 3, 0, 0, 0, 0),
(366, 108, 3, 0, 0, 0, 0),
(367, 109, 3, 0, 0, 0, 0),
(368, 110, 3, 0, 0, 0, 0),
(369, 71, 3, 0, 0, 0, 0),
(370, 72, 3, 0, 0, 0, 0),
(371, 73, 3, 0, 0, 0, 0),
(372, 74, 3, 0, 0, 0, 0),
(373, 131, 3, 0, 0, 0, 0),
(374, 132, 3, 0, 0, 0, 0),
(375, 133, 3, 0, 0, 0, 0),
(376, 134, 3, 0, 0, 0, 0),
(377, 135, 3, 0, 0, 0, 0),
(378, 136, 3, 0, 0, 0, 0),
(379, 137, 3, 0, 0, 0, 0),
(380, 138, 3, 0, 0, 0, 0),
(381, 127, 4, 0, 0, 0, 0),
(382, 128, 4, 0, 0, 0, 0),
(383, 129, 4, 0, 0, 0, 0),
(384, 130, 4, 0, 0, 0, 0),
(385, 3, 4, 0, 0, 0, 0),
(386, 4, 4, 0, 0, 0, 0),
(387, 121, 4, 0, 0, 0, 0),
(388, 122, 4, 0, 0, 0, 0),
(389, 6, 4, 0, 0, 0, 0),
(390, 7, 4, 0, 0, 0, 0),
(391, 8, 4, 0, 0, 0, 0),
(392, 9, 4, 0, 0, 0, 0),
(393, 10, 4, 0, 0, 0, 0),
(394, 11, 4, 0, 0, 0, 0),
(395, 12, 4, 0, 0, 0, 0),
(396, 13, 4, 0, 0, 0, 0),
(397, 126, 4, 0, 0, 0, 0),
(398, 14, 4, 0, 0, 0, 0),
(399, 15, 4, 0, 0, 0, 0),
(400, 16, 4, 0, 0, 0, 0),
(401, 17, 4, 0, 0, 0, 0),
(402, 18, 4, 0, 0, 0, 0),
(403, 19, 4, 0, 0, 0, 0),
(404, 96, 4, 0, 0, 0, 0),
(405, 97, 4, 0, 0, 0, 0),
(406, 20, 4, 0, 0, 0, 0),
(407, 21, 4, 0, 0, 0, 0),
(408, 22, 4, 0, 0, 0, 0),
(409, 95, 4, 0, 0, 0, 0),
(410, 23, 4, 0, 0, 0, 0),
(411, 24, 4, 0, 0, 0, 0),
(412, 25, 4, 0, 0, 0, 0),
(413, 26, 4, 0, 0, 0, 0),
(414, 27, 4, 0, 0, 0, 0),
(415, 28, 4, 0, 0, 0, 0),
(416, 29, 4, 0, 0, 0, 0),
(417, 30, 4, 0, 0, 0, 0),
(418, 31, 4, 0, 0, 0, 0),
(419, 123, 4, 0, 0, 0, 0),
(420, 124, 4, 0, 0, 0, 0),
(421, 125, 4, 0, 0, 0, 0),
(422, 32, 4, 0, 0, 0, 0),
(423, 33, 4, 0, 0, 0, 0),
(424, 34, 4, 0, 0, 0, 0),
(425, 35, 4, 0, 0, 0, 0),
(426, 36, 4, 0, 0, 0, 0),
(427, 37, 4, 0, 0, 0, 0),
(428, 38, 4, 0, 0, 0, 0),
(429, 39, 4, 0, 0, 0, 0),
(430, 40, 4, 0, 0, 0, 0),
(431, 41, 4, 0, 0, 0, 0),
(432, 42, 4, 0, 0, 0, 0),
(433, 43, 4, 0, 0, 0, 0),
(434, 44, 4, 0, 0, 0, 0),
(435, 45, 4, 0, 0, 0, 0),
(436, 139, 4, 0, 0, 0, 0),
(437, 140, 4, 0, 0, 0, 0),
(438, 46, 4, 0, 0, 0, 0),
(439, 47, 4, 0, 0, 0, 0),
(440, 54, 4, 0, 0, 0, 0),
(441, 55, 4, 0, 0, 0, 0),
(442, 56, 4, 0, 0, 0, 0),
(443, 57, 4, 0, 0, 0, 0),
(444, 58, 4, 0, 0, 0, 0),
(445, 59, 4, 0, 0, 0, 0),
(446, 60, 4, 0, 0, 0, 0),
(447, 61, 4, 0, 0, 0, 0),
(448, 62, 4, 0, 0, 0, 0),
(449, 63, 4, 0, 0, 0, 0),
(450, 64, 4, 0, 0, 0, 0),
(451, 65, 4, 0, 0, 0, 0),
(452, 66, 4, 0, 0, 0, 0),
(453, 67, 4, 0, 0, 0, 0),
(454, 68, 4, 0, 0, 0, 0),
(455, 69, 4, 0, 0, 0, 0),
(456, 70, 4, 0, 0, 0, 0),
(457, 75, 4, 0, 0, 0, 0),
(458, 76, 4, 0, 0, 0, 0),
(459, 77, 4, 0, 0, 0, 0),
(460, 98, 4, 0, 0, 0, 0),
(461, 103, 4, 0, 0, 0, 0),
(462, 104, 4, 0, 0, 0, 0),
(463, 78, 4, 0, 0, 0, 0),
(464, 79, 4, 0, 0, 0, 0),
(465, 80, 4, 0, 0, 0, 0),
(466, 81, 4, 0, 0, 0, 0),
(467, 82, 4, 0, 0, 0, 0),
(468, 83, 4, 0, 0, 0, 0),
(469, 84, 4, 0, 0, 0, 0),
(470, 85, 4, 0, 0, 0, 0),
(471, 86, 4, 0, 0, 0, 0),
(472, 87, 4, 0, 0, 0, 0),
(473, 88, 4, 0, 0, 0, 0),
(474, 89, 4, 0, 0, 0, 0),
(475, 90, 4, 0, 0, 0, 0),
(476, 91, 4, 0, 0, 0, 0),
(477, 92, 4, 0, 0, 0, 0),
(478, 93, 4, 0, 0, 0, 0),
(479, 94, 4, 0, 0, 0, 0),
(480, 111, 4, 0, 0, 0, 0),
(481, 112, 4, 0, 0, 0, 0),
(482, 113, 4, 0, 0, 0, 0),
(483, 114, 4, 0, 0, 0, 0),
(484, 115, 4, 0, 0, 0, 0),
(485, 116, 4, 0, 0, 0, 0),
(486, 117, 4, 0, 0, 0, 0),
(487, 118, 4, 0, 0, 0, 0),
(488, 119, 4, 0, 0, 0, 0),
(489, 120, 4, 0, 0, 0, 0),
(490, 99, 4, 0, 0, 0, 0),
(491, 101, 4, 0, 0, 0, 0),
(492, 102, 4, 0, 0, 0, 0),
(493, 105, 4, 0, 0, 0, 0),
(494, 106, 4, 0, 0, 0, 0),
(495, 107, 4, 0, 0, 0, 0),
(496, 108, 4, 0, 0, 0, 0),
(497, 109, 4, 0, 0, 0, 0),
(498, 110, 4, 0, 0, 0, 0),
(499, 71, 4, 0, 0, 0, 0),
(500, 72, 4, 0, 0, 0, 0),
(501, 73, 4, 0, 0, 0, 0),
(502, 74, 4, 0, 0, 0, 0),
(503, 131, 4, 0, 0, 0, 0),
(504, 132, 4, 0, 0, 0, 0),
(505, 133, 4, 0, 0, 0, 0),
(506, 134, 4, 0, 0, 0, 0),
(507, 135, 4, 0, 0, 0, 0),
(508, 136, 4, 0, 0, 0, 0),
(509, 137, 4, 0, 0, 0, 0),
(510, 138, 4, 0, 0, 0, 0),
(511, 127, 5, 0, 0, 0, 0),
(512, 128, 5, 0, 0, 0, 0),
(513, 129, 5, 0, 0, 0, 0),
(514, 130, 5, 0, 0, 0, 0),
(515, 3, 5, 0, 0, 0, 0),
(516, 4, 5, 0, 0, 0, 0),
(517, 121, 5, 0, 0, 0, 0),
(518, 122, 5, 0, 0, 0, 0),
(519, 6, 5, 0, 0, 0, 0),
(520, 7, 5, 0, 0, 0, 0),
(521, 8, 5, 0, 0, 0, 0),
(522, 9, 5, 0, 0, 0, 0),
(523, 10, 5, 0, 0, 0, 0),
(524, 11, 5, 0, 0, 0, 0),
(525, 12, 5, 0, 0, 0, 0),
(526, 13, 5, 0, 0, 0, 0),
(527, 126, 5, 0, 0, 0, 0),
(528, 14, 5, 0, 0, 0, 0),
(529, 15, 5, 0, 0, 0, 0),
(530, 16, 5, 0, 0, 0, 0),
(531, 17, 5, 0, 0, 0, 0),
(532, 18, 5, 0, 0, 0, 0),
(533, 19, 5, 0, 0, 0, 0),
(534, 96, 5, 0, 0, 0, 0),
(535, 97, 5, 0, 0, 0, 0),
(536, 20, 5, 0, 0, 0, 0),
(537, 21, 5, 0, 0, 0, 0),
(538, 22, 5, 0, 0, 0, 0),
(539, 95, 5, 0, 0, 0, 0),
(540, 23, 5, 0, 0, 0, 0),
(541, 24, 5, 0, 0, 0, 0),
(542, 25, 5, 0, 0, 0, 0),
(543, 26, 5, 0, 0, 0, 0),
(544, 27, 5, 0, 0, 0, 0),
(545, 28, 5, 0, 0, 0, 0),
(546, 29, 5, 0, 0, 0, 0),
(547, 30, 5, 0, 0, 0, 0),
(548, 31, 5, 0, 0, 0, 0),
(549, 123, 5, 0, 0, 0, 0),
(550, 124, 5, 0, 0, 0, 0),
(551, 125, 5, 0, 0, 0, 0),
(552, 32, 5, 0, 0, 0, 0),
(553, 33, 5, 0, 0, 0, 0),
(554, 34, 5, 0, 0, 0, 0),
(555, 35, 5, 0, 0, 0, 0),
(556, 36, 5, 0, 0, 0, 0),
(557, 37, 5, 0, 0, 0, 0),
(558, 38, 5, 0, 0, 0, 0),
(559, 39, 5, 0, 0, 0, 0),
(560, 40, 5, 0, 0, 0, 0),
(561, 41, 5, 0, 0, 0, 0),
(562, 42, 5, 0, 0, 0, 0),
(563, 43, 5, 0, 0, 0, 0),
(564, 44, 5, 0, 0, 0, 0),
(565, 45, 5, 0, 0, 0, 0),
(566, 139, 5, 0, 0, 0, 0),
(567, 140, 5, 0, 0, 0, 0),
(568, 46, 5, 0, 0, 0, 0),
(569, 47, 5, 0, 0, 0, 0),
(570, 54, 5, 0, 0, 0, 0),
(571, 55, 5, 0, 0, 0, 0),
(572, 56, 5, 0, 0, 0, 0),
(573, 57, 5, 0, 0, 0, 0),
(574, 58, 5, 0, 0, 0, 0),
(575, 59, 5, 0, 0, 0, 0),
(576, 60, 5, 0, 0, 0, 0),
(577, 61, 5, 0, 0, 0, 0),
(578, 62, 5, 0, 0, 0, 0),
(579, 63, 5, 0, 0, 0, 0),
(580, 64, 5, 0, 0, 0, 0),
(581, 65, 5, 0, 0, 0, 0),
(582, 66, 5, 0, 0, 0, 0),
(583, 67, 5, 0, 0, 0, 0),
(584, 68, 5, 0, 0, 0, 0),
(585, 69, 5, 0, 0, 0, 0),
(586, 70, 5, 0, 0, 0, 0),
(587, 75, 5, 0, 0, 0, 0),
(588, 76, 5, 0, 0, 0, 0),
(589, 77, 5, 0, 0, 0, 0),
(590, 98, 5, 0, 0, 0, 0),
(591, 103, 5, 0, 0, 0, 0),
(592, 104, 5, 0, 0, 0, 0),
(593, 78, 5, 0, 0, 0, 0),
(594, 79, 5, 0, 0, 0, 0),
(595, 80, 5, 0, 0, 0, 0),
(596, 81, 5, 0, 0, 0, 0),
(597, 82, 5, 0, 0, 0, 0),
(598, 83, 5, 0, 0, 0, 0),
(599, 84, 5, 0, 0, 0, 0),
(600, 85, 5, 0, 0, 0, 0),
(601, 86, 5, 0, 0, 0, 0),
(602, 87, 5, 0, 0, 0, 0),
(603, 88, 5, 0, 0, 0, 0),
(604, 89, 5, 0, 0, 0, 0),
(605, 90, 5, 0, 0, 0, 0),
(606, 91, 5, 0, 0, 0, 0),
(607, 92, 5, 0, 0, 0, 0),
(608, 93, 5, 0, 0, 0, 0),
(609, 94, 5, 0, 0, 0, 0),
(610, 111, 5, 0, 0, 0, 0),
(611, 112, 5, 0, 0, 0, 0),
(612, 113, 5, 0, 0, 0, 0),
(613, 114, 5, 0, 0, 0, 0),
(614, 115, 5, 0, 0, 0, 0),
(615, 116, 5, 0, 0, 0, 0),
(616, 117, 5, 0, 0, 0, 0),
(617, 118, 5, 0, 0, 0, 0),
(618, 119, 5, 0, 0, 0, 0),
(619, 120, 5, 0, 0, 0, 0),
(620, 99, 5, 0, 0, 0, 0),
(621, 101, 5, 0, 0, 0, 0),
(622, 102, 5, 0, 0, 0, 0),
(623, 105, 5, 0, 0, 0, 0),
(624, 106, 5, 0, 0, 0, 0),
(625, 107, 5, 0, 0, 0, 0),
(626, 108, 5, 0, 0, 0, 0),
(627, 109, 5, 0, 0, 0, 0),
(628, 110, 5, 0, 0, 0, 0),
(629, 71, 5, 0, 0, 0, 0),
(630, 72, 5, 0, 0, 0, 0),
(631, 73, 5, 0, 0, 0, 0),
(632, 74, 5, 0, 0, 0, 0),
(633, 131, 5, 0, 0, 0, 0),
(634, 132, 5, 0, 0, 0, 0),
(635, 133, 5, 0, 0, 0, 0),
(636, 134, 5, 0, 0, 0, 0),
(637, 135, 5, 0, 0, 0, 0),
(638, 136, 5, 0, 0, 0, 0),
(639, 137, 5, 0, 0, 0, 0),
(640, 138, 5, 0, 0, 0, 0),
(641, 127, 6, 0, 0, 0, 0),
(642, 128, 6, 0, 0, 0, 0),
(643, 129, 6, 0, 0, 0, 0),
(644, 130, 6, 0, 0, 0, 0),
(645, 3, 6, 0, 0, 0, 0),
(646, 4, 6, 0, 0, 0, 0),
(647, 121, 6, 0, 0, 0, 0),
(648, 122, 6, 0, 0, 0, 0),
(649, 6, 6, 0, 0, 0, 0),
(650, 7, 6, 0, 0, 0, 0),
(651, 8, 6, 0, 0, 0, 0),
(652, 9, 6, 0, 0, 0, 0),
(653, 10, 6, 0, 0, 0, 0),
(654, 11, 6, 0, 0, 0, 0),
(655, 12, 6, 0, 0, 0, 0),
(656, 13, 6, 0, 0, 0, 0),
(657, 126, 6, 0, 0, 0, 0),
(658, 14, 6, 0, 0, 0, 0),
(659, 15, 6, 0, 0, 0, 0),
(660, 16, 6, 0, 0, 0, 0),
(661, 17, 6, 0, 0, 0, 0),
(662, 18, 6, 0, 0, 0, 0),
(663, 19, 6, 0, 0, 0, 0),
(664, 96, 6, 0, 0, 0, 0),
(665, 97, 6, 0, 0, 0, 0),
(666, 20, 6, 0, 0, 0, 0),
(667, 21, 6, 0, 0, 0, 0),
(668, 22, 6, 0, 0, 0, 0),
(669, 95, 6, 0, 0, 0, 0),
(670, 23, 6, 0, 0, 0, 0),
(671, 24, 6, 0, 0, 0, 0),
(672, 25, 6, 0, 0, 0, 0),
(673, 26, 6, 0, 0, 0, 0),
(674, 27, 6, 0, 0, 0, 0),
(675, 28, 6, 0, 0, 0, 0),
(676, 29, 6, 0, 0, 0, 0),
(677, 30, 6, 0, 0, 0, 0),
(678, 31, 6, 0, 0, 0, 0),
(679, 123, 6, 0, 0, 0, 0),
(680, 124, 6, 0, 0, 0, 0),
(681, 125, 6, 0, 0, 0, 0),
(682, 32, 6, 0, 0, 0, 0),
(683, 33, 6, 0, 0, 0, 0),
(684, 34, 6, 0, 0, 0, 0),
(685, 35, 6, 0, 0, 0, 0),
(686, 36, 6, 0, 0, 0, 0),
(687, 37, 6, 0, 0, 0, 0),
(688, 38, 6, 0, 0, 0, 0),
(689, 39, 6, 0, 0, 0, 0),
(690, 40, 6, 0, 0, 0, 0),
(691, 41, 6, 0, 0, 0, 0),
(692, 42, 6, 0, 0, 0, 0),
(693, 43, 6, 0, 0, 0, 0),
(694, 44, 6, 0, 0, 0, 0),
(695, 45, 6, 0, 0, 0, 0),
(696, 139, 6, 0, 0, 0, 0),
(697, 140, 6, 0, 0, 0, 0),
(698, 46, 6, 0, 0, 0, 0),
(699, 47, 6, 0, 0, 0, 0),
(700, 54, 6, 0, 0, 0, 0),
(701, 55, 6, 0, 0, 0, 0),
(702, 56, 6, 0, 0, 0, 0),
(703, 57, 6, 0, 0, 0, 0),
(704, 58, 6, 0, 0, 0, 0),
(705, 59, 6, 0, 0, 0, 0),
(706, 60, 6, 0, 0, 0, 0),
(707, 61, 6, 0, 0, 0, 0),
(708, 62, 6, 0, 0, 0, 0),
(709, 63, 6, 0, 0, 0, 0),
(710, 64, 6, 0, 0, 0, 0),
(711, 65, 6, 0, 0, 0, 0),
(712, 66, 6, 0, 0, 0, 0),
(713, 67, 6, 0, 0, 0, 0),
(714, 68, 6, 0, 0, 0, 0),
(715, 69, 6, 0, 0, 0, 0),
(716, 70, 6, 0, 0, 0, 0),
(717, 75, 6, 0, 0, 0, 0),
(718, 76, 6, 0, 0, 0, 0),
(719, 77, 6, 0, 0, 0, 0),
(720, 98, 6, 0, 0, 0, 0),
(721, 103, 6, 0, 0, 0, 0),
(722, 104, 6, 0, 0, 0, 0),
(723, 78, 6, 0, 0, 0, 0),
(724, 79, 6, 0, 0, 0, 0),
(725, 80, 6, 0, 0, 0, 0),
(726, 81, 6, 0, 0, 0, 0),
(727, 82, 6, 0, 0, 0, 0),
(728, 83, 6, 0, 0, 0, 0),
(729, 84, 6, 0, 0, 0, 0),
(730, 85, 6, 0, 0, 0, 0),
(731, 86, 6, 0, 0, 0, 0),
(732, 87, 6, 0, 0, 0, 0),
(733, 88, 6, 0, 0, 0, 0),
(734, 89, 6, 0, 0, 0, 0),
(735, 90, 6, 0, 0, 0, 0),
(736, 91, 6, 0, 0, 0, 0),
(737, 92, 6, 0, 0, 0, 0),
(738, 93, 6, 0, 0, 0, 0),
(739, 94, 6, 0, 0, 0, 0),
(740, 111, 6, 0, 0, 0, 0),
(741, 112, 6, 0, 0, 0, 0),
(742, 113, 6, 0, 0, 0, 0),
(743, 114, 6, 0, 0, 0, 0),
(744, 115, 6, 0, 0, 0, 0),
(745, 116, 6, 0, 0, 0, 0),
(746, 117, 6, 0, 0, 0, 0),
(747, 118, 6, 0, 0, 0, 0),
(748, 119, 6, 0, 0, 0, 0),
(749, 120, 6, 0, 0, 0, 0),
(750, 99, 6, 0, 0, 0, 0),
(751, 101, 6, 0, 0, 0, 0),
(752, 102, 6, 0, 0, 0, 0),
(753, 105, 6, 0, 0, 0, 0),
(754, 106, 6, 0, 0, 0, 0),
(755, 107, 6, 0, 0, 0, 0),
(756, 108, 6, 0, 0, 0, 0),
(757, 109, 6, 0, 0, 0, 0),
(758, 110, 6, 0, 0, 0, 0),
(759, 71, 6, 1, 1, 1, 0),
(760, 72, 6, 1, 1, 1, 0),
(761, 73, 6, 1, 1, 1, 0),
(762, 74, 6, 1, 1, 1, 0),
(763, 131, 6, 0, 0, 0, 0),
(764, 132, 6, 0, 0, 0, 0),
(765, 133, 6, 0, 0, 0, 0),
(766, 134, 6, 0, 0, 0, 0),
(767, 135, 6, 0, 0, 0, 0),
(768, 136, 6, 0, 0, 0, 0),
(769, 137, 6, 0, 0, 0, 0),
(770, 138, 6, 0, 0, 0, 0),
(771, 127, 7, 0, 0, 0, 0),
(772, 128, 7, 0, 0, 0, 0),
(773, 129, 7, 0, 0, 0, 0),
(774, 130, 7, 0, 0, 0, 0),
(775, 3, 7, 0, 0, 0, 0),
(776, 4, 7, 0, 0, 0, 0),
(777, 121, 7, 0, 0, 0, 0),
(778, 122, 7, 0, 0, 0, 0),
(779, 6, 7, 1, 1, 1, 0),
(780, 7, 7, 1, 1, 0, 0),
(781, 8, 7, 0, 0, 0, 0),
(782, 9, 7, 0, 0, 0, 0),
(783, 10, 7, 0, 0, 0, 0),
(784, 11, 7, 0, 0, 0, 0),
(785, 12, 7, 0, 0, 0, 0),
(786, 13, 7, 0, 0, 0, 0),
(787, 126, 7, 0, 0, 0, 0),
(788, 14, 7, 0, 0, 0, 0),
(789, 15, 7, 0, 0, 0, 0),
(790, 16, 7, 0, 0, 0, 0),
(791, 17, 7, 0, 0, 0, 0),
(792, 18, 7, 0, 0, 0, 0),
(793, 19, 7, 0, 0, 0, 0),
(794, 96, 7, 0, 0, 0, 0),
(795, 97, 7, 0, 0, 0, 0),
(796, 20, 7, 0, 0, 0, 0),
(797, 21, 7, 0, 0, 0, 0),
(798, 22, 7, 0, 0, 0, 0),
(799, 95, 7, 0, 0, 0, 0),
(800, 23, 7, 0, 0, 0, 0),
(801, 24, 7, 0, 0, 0, 0),
(802, 25, 7, 0, 0, 0, 0),
(803, 26, 7, 0, 0, 0, 0),
(804, 27, 7, 0, 0, 0, 0),
(805, 28, 7, 0, 0, 0, 0),
(806, 29, 7, 0, 0, 0, 0),
(807, 30, 7, 0, 0, 0, 0),
(808, 31, 7, 0, 0, 0, 0),
(809, 123, 7, 0, 0, 0, 0),
(810, 124, 7, 0, 0, 0, 0),
(811, 125, 7, 0, 0, 0, 0),
(812, 32, 7, 0, 0, 0, 0),
(813, 33, 7, 0, 0, 0, 0),
(814, 34, 7, 0, 0, 0, 0),
(815, 35, 7, 0, 0, 0, 0),
(816, 36, 7, 0, 0, 0, 0),
(817, 37, 7, 0, 0, 0, 0),
(818, 38, 7, 0, 0, 0, 0),
(819, 39, 7, 0, 0, 0, 0),
(820, 40, 7, 0, 0, 0, 0),
(821, 41, 7, 0, 0, 0, 0),
(822, 42, 7, 0, 0, 0, 0),
(823, 43, 7, 0, 0, 0, 0),
(824, 44, 7, 0, 0, 0, 0),
(825, 45, 7, 0, 0, 0, 0),
(826, 139, 7, 0, 0, 0, 0),
(827, 140, 7, 0, 0, 0, 0),
(828, 46, 7, 0, 0, 0, 0),
(829, 47, 7, 0, 0, 0, 0),
(830, 54, 7, 0, 0, 0, 0),
(831, 55, 7, 0, 0, 0, 0),
(832, 56, 7, 0, 0, 0, 0),
(833, 57, 7, 0, 0, 0, 0),
(834, 58, 7, 0, 0, 0, 0),
(835, 59, 7, 0, 0, 0, 0),
(836, 60, 7, 0, 0, 0, 0),
(837, 61, 7, 0, 0, 0, 0),
(838, 62, 7, 0, 0, 0, 0),
(839, 63, 7, 0, 0, 0, 0),
(840, 64, 7, 0, 0, 0, 0),
(841, 65, 7, 0, 0, 0, 0),
(842, 66, 7, 0, 0, 0, 0),
(843, 67, 7, 0, 0, 0, 0),
(844, 68, 7, 0, 0, 0, 0),
(845, 69, 7, 0, 0, 0, 0),
(846, 70, 7, 0, 0, 0, 0),
(847, 75, 7, 0, 0, 0, 0),
(848, 76, 7, 0, 0, 0, 0),
(849, 77, 7, 0, 0, 0, 0),
(850, 98, 7, 0, 0, 0, 0),
(851, 103, 7, 0, 0, 0, 0),
(852, 104, 7, 0, 0, 0, 0),
(853, 78, 7, 0, 0, 0, 0),
(854, 79, 7, 0, 0, 0, 0),
(855, 80, 7, 0, 0, 0, 0),
(856, 81, 7, 0, 0, 0, 0),
(857, 82, 7, 0, 0, 0, 0),
(858, 83, 7, 0, 0, 0, 0),
(859, 84, 7, 0, 0, 0, 0),
(860, 85, 7, 0, 0, 0, 0),
(861, 86, 7, 0, 0, 0, 0),
(862, 87, 7, 0, 0, 0, 0),
(863, 88, 7, 0, 0, 0, 0),
(864, 89, 7, 0, 0, 0, 0),
(865, 90, 7, 0, 0, 0, 0),
(866, 91, 7, 0, 0, 0, 0),
(867, 92, 7, 0, 0, 0, 0),
(868, 93, 7, 0, 0, 0, 0),
(869, 94, 7, 0, 0, 0, 0),
(870, 111, 7, 0, 0, 0, 0),
(871, 112, 7, 0, 0, 0, 0),
(872, 113, 7, 0, 0, 0, 0),
(873, 114, 7, 0, 0, 0, 0),
(874, 115, 7, 0, 0, 0, 0),
(875, 116, 7, 0, 0, 0, 0),
(876, 117, 7, 0, 0, 0, 0),
(877, 118, 7, 0, 0, 0, 0),
(878, 119, 7, 0, 0, 0, 0),
(879, 120, 7, 0, 0, 0, 0),
(880, 99, 7, 0, 0, 0, 0),
(881, 101, 7, 0, 0, 0, 0),
(882, 102, 7, 0, 0, 0, 0),
(883, 105, 7, 0, 0, 0, 0),
(884, 106, 7, 0, 0, 0, 0),
(885, 107, 7, 0, 0, 0, 0),
(886, 108, 7, 0, 0, 0, 0),
(887, 109, 7, 0, 0, 0, 0),
(888, 110, 7, 0, 0, 0, 0),
(889, 71, 7, 0, 0, 0, 0),
(890, 72, 7, 0, 0, 0, 0),
(891, 73, 7, 0, 0, 0, 0),
(892, 74, 7, 0, 0, 0, 0),
(893, 131, 7, 0, 0, 0, 0),
(894, 132, 7, 0, 0, 0, 0),
(895, 133, 7, 0, 0, 0, 0),
(896, 134, 7, 0, 0, 0, 0),
(897, 135, 7, 0, 0, 0, 0),
(898, 136, 7, 0, 0, 0, 0),
(899, 137, 7, 0, 0, 0, 0),
(900, 138, 7, 0, 0, 0, 0),
(901, 127, 9, 0, 0, 0, 0),
(902, 128, 9, 0, 0, 0, 0),
(903, 129, 9, 0, 0, 0, 0),
(904, 130, 9, 0, 0, 0, 0),
(905, 3, 9, 0, 0, 0, 0),
(906, 4, 9, 0, 0, 0, 0),
(907, 121, 9, 0, 0, 0, 0),
(908, 122, 9, 0, 0, 0, 0),
(909, 6, 9, 0, 0, 0, 0),
(910, 7, 9, 0, 0, 0, 0),
(911, 8, 9, 0, 0, 0, 0),
(912, 9, 9, 0, 0, 0, 0),
(913, 10, 9, 0, 0, 0, 0),
(914, 11, 9, 0, 0, 0, 0),
(915, 12, 9, 0, 0, 0, 0),
(916, 13, 9, 0, 0, 0, 0),
(917, 126, 9, 0, 0, 0, 0),
(918, 14, 9, 0, 0, 0, 0),
(919, 15, 9, 0, 0, 0, 0),
(920, 16, 9, 0, 0, 0, 0),
(921, 17, 9, 0, 0, 0, 0),
(922, 18, 9, 0, 0, 0, 0),
(923, 19, 9, 0, 0, 0, 0),
(924, 96, 9, 0, 0, 0, 0),
(925, 97, 9, 0, 0, 0, 0),
(926, 20, 9, 0, 0, 0, 0),
(927, 21, 9, 0, 0, 0, 0),
(928, 22, 9, 0, 0, 0, 0),
(929, 95, 9, 0, 0, 0, 0),
(930, 23, 9, 0, 0, 0, 0),
(931, 24, 9, 0, 0, 0, 0),
(932, 25, 9, 0, 0, 0, 0),
(933, 26, 9, 0, 0, 0, 0),
(934, 27, 9, 0, 0, 0, 0),
(935, 28, 9, 0, 0, 0, 0),
(936, 29, 9, 0, 0, 0, 0),
(937, 30, 9, 0, 0, 0, 0),
(938, 31, 9, 0, 0, 0, 0),
(939, 123, 9, 0, 0, 0, 0),
(940, 124, 9, 0, 0, 0, 0),
(941, 125, 9, 0, 0, 0, 0),
(942, 32, 9, 0, 0, 0, 0),
(943, 33, 9, 0, 0, 0, 0),
(944, 34, 9, 0, 0, 0, 0),
(945, 35, 9, 0, 0, 0, 0),
(946, 36, 9, 0, 0, 0, 0),
(947, 37, 9, 0, 0, 0, 0),
(948, 38, 9, 0, 0, 0, 0),
(949, 39, 9, 0, 0, 0, 0),
(950, 40, 9, 0, 0, 0, 0),
(951, 41, 9, 0, 0, 0, 0),
(952, 42, 9, 0, 0, 0, 0),
(953, 43, 9, 0, 0, 0, 0),
(954, 44, 9, 0, 0, 0, 0),
(955, 45, 9, 0, 0, 0, 0),
(956, 139, 9, 0, 0, 0, 0),
(957, 140, 9, 0, 0, 0, 0),
(958, 46, 9, 0, 0, 0, 0),
(959, 47, 9, 0, 0, 0, 0),
(960, 54, 9, 0, 0, 0, 0),
(961, 55, 9, 0, 0, 0, 0),
(962, 56, 9, 0, 0, 0, 0),
(963, 57, 9, 0, 0, 0, 0),
(964, 58, 9, 0, 0, 0, 0),
(965, 59, 9, 0, 0, 0, 0),
(966, 60, 9, 0, 0, 0, 0),
(967, 61, 9, 0, 0, 0, 0),
(968, 62, 9, 0, 0, 0, 0),
(969, 63, 9, 0, 0, 0, 0),
(970, 64, 9, 0, 0, 0, 0),
(971, 65, 9, 0, 0, 0, 0),
(972, 66, 9, 0, 0, 0, 0),
(973, 67, 9, 0, 0, 0, 0),
(974, 68, 9, 0, 0, 0, 0),
(975, 69, 9, 0, 0, 0, 0),
(976, 70, 9, 0, 0, 0, 0),
(977, 75, 9, 0, 0, 0, 0),
(978, 76, 9, 0, 0, 0, 0),
(979, 77, 9, 0, 0, 0, 0),
(980, 98, 9, 0, 0, 0, 0),
(981, 103, 9, 0, 0, 0, 0),
(982, 104, 9, 0, 0, 0, 0),
(983, 78, 9, 0, 0, 0, 0),
(984, 79, 9, 0, 0, 0, 0),
(985, 80, 9, 0, 0, 0, 0),
(986, 81, 9, 0, 0, 0, 0),
(987, 82, 9, 0, 0, 0, 0),
(988, 83, 9, 0, 0, 0, 0),
(989, 84, 9, 0, 0, 0, 0),
(990, 85, 9, 0, 0, 0, 0),
(991, 86, 9, 0, 0, 0, 0),
(992, 87, 9, 0, 0, 0, 0),
(993, 88, 9, 0, 0, 0, 0),
(994, 89, 9, 0, 0, 0, 0),
(995, 90, 9, 0, 0, 0, 0),
(996, 91, 9, 0, 0, 0, 0),
(997, 92, 9, 0, 0, 0, 0),
(998, 93, 9, 0, 0, 0, 0),
(999, 94, 9, 0, 0, 0, 0),
(1000, 111, 9, 0, 0, 0, 0),
(1001, 112, 9, 0, 0, 0, 0),
(1002, 113, 9, 0, 0, 0, 0),
(1003, 114, 9, 0, 0, 0, 0),
(1004, 115, 9, 0, 0, 0, 0),
(1005, 116, 9, 0, 0, 0, 0),
(1006, 117, 9, 0, 0, 0, 0),
(1007, 118, 9, 0, 0, 0, 0),
(1008, 119, 9, 0, 0, 0, 0),
(1009, 120, 9, 0, 0, 0, 0),
(1010, 99, 9, 0, 0, 0, 0),
(1011, 101, 9, 0, 0, 0, 0),
(1012, 102, 9, 0, 0, 0, 0),
(1013, 105, 9, 0, 0, 0, 0),
(1014, 106, 9, 0, 0, 0, 0),
(1015, 107, 9, 0, 0, 0, 0),
(1016, 108, 9, 0, 0, 0, 0),
(1017, 109, 9, 0, 0, 0, 0),
(1018, 110, 9, 0, 0, 0, 0),
(1019, 71, 9, 0, 0, 0, 0),
(1020, 72, 9, 0, 0, 0, 0),
(1021, 73, 9, 0, 0, 0, 0),
(1022, 74, 9, 0, 0, 0, 0),
(1023, 131, 9, 0, 0, 0, 0),
(1024, 132, 9, 0, 0, 0, 0),
(1025, 133, 9, 0, 0, 0, 0),
(1026, 134, 9, 0, 0, 0, 0),
(1027, 135, 9, 0, 0, 0, 0),
(1028, 136, 9, 0, 0, 0, 0),
(1029, 137, 9, 0, 0, 0, 0),
(1030, 138, 9, 0, 0, 0, 0),
(1031, 127, 10, 0, 0, 0, 0),
(1032, 128, 10, 0, 0, 0, 0),
(1033, 129, 10, 0, 0, 0, 0),
(1034, 130, 10, 0, 0, 0, 0),
(1035, 3, 10, 0, 0, 0, 0),
(1036, 4, 10, 0, 0, 0, 0),
(1037, 121, 10, 0, 0, 0, 0),
(1038, 122, 10, 0, 0, 0, 0),
(1039, 6, 10, 0, 0, 0, 0),
(1040, 7, 10, 0, 0, 0, 0),
(1041, 8, 10, 0, 0, 0, 0),
(1042, 9, 10, 0, 0, 0, 0),
(1043, 10, 10, 0, 0, 0, 0),
(1044, 11, 10, 0, 0, 0, 0),
(1045, 12, 10, 0, 0, 0, 0),
(1046, 13, 10, 0, 0, 0, 0),
(1047, 126, 10, 0, 0, 0, 0),
(1048, 14, 10, 0, 0, 0, 0),
(1049, 15, 10, 0, 0, 0, 0),
(1050, 16, 10, 0, 0, 0, 0),
(1051, 17, 10, 0, 0, 0, 0),
(1052, 18, 10, 0, 0, 0, 0),
(1053, 19, 10, 0, 0, 0, 0),
(1054, 96, 10, 0, 0, 0, 0),
(1055, 97, 10, 0, 0, 0, 0),
(1056, 20, 10, 0, 0, 0, 0),
(1057, 21, 10, 0, 0, 0, 0),
(1058, 22, 10, 0, 0, 0, 0),
(1059, 95, 10, 0, 0, 0, 0),
(1060, 23, 10, 0, 0, 0, 0),
(1061, 24, 10, 0, 0, 0, 0),
(1062, 25, 10, 0, 0, 0, 0),
(1063, 26, 10, 0, 0, 0, 0),
(1064, 27, 10, 0, 0, 0, 0),
(1065, 28, 10, 0, 0, 0, 0),
(1066, 29, 10, 0, 0, 0, 0),
(1067, 30, 10, 0, 0, 0, 0),
(1068, 31, 10, 0, 0, 0, 0),
(1069, 123, 10, 0, 0, 0, 0),
(1070, 124, 10, 0, 0, 0, 0),
(1071, 125, 10, 0, 0, 0, 0),
(1072, 32, 10, 0, 0, 0, 0),
(1073, 33, 10, 0, 0, 0, 0),
(1074, 34, 10, 0, 0, 0, 0),
(1075, 35, 10, 0, 0, 0, 0),
(1076, 36, 10, 0, 0, 0, 0),
(1077, 37, 10, 0, 0, 0, 0),
(1078, 38, 10, 0, 0, 0, 0),
(1079, 39, 10, 0, 0, 0, 0),
(1080, 40, 10, 0, 0, 0, 0),
(1081, 41, 10, 0, 0, 0, 0),
(1082, 42, 10, 0, 0, 0, 0),
(1083, 43, 10, 0, 0, 0, 0),
(1084, 44, 10, 0, 0, 0, 0),
(1085, 45, 10, 0, 0, 0, 0),
(1086, 139, 10, 0, 0, 0, 0),
(1087, 140, 10, 0, 0, 0, 0),
(1088, 46, 10, 0, 0, 0, 0),
(1089, 47, 10, 0, 0, 0, 0),
(1090, 54, 10, 0, 0, 0, 0),
(1091, 55, 10, 0, 0, 0, 0),
(1092, 56, 10, 0, 0, 0, 0),
(1093, 57, 10, 0, 0, 0, 0),
(1094, 58, 10, 0, 0, 0, 0),
(1095, 59, 10, 0, 0, 0, 0),
(1096, 60, 10, 0, 0, 0, 0),
(1097, 61, 10, 0, 0, 0, 0),
(1098, 62, 10, 0, 0, 0, 0),
(1099, 63, 10, 0, 0, 0, 0),
(1100, 64, 10, 0, 0, 0, 0),
(1101, 65, 10, 0, 0, 0, 0),
(1102, 66, 10, 0, 0, 0, 0),
(1103, 67, 10, 0, 0, 0, 0),
(1104, 68, 10, 0, 0, 0, 0),
(1105, 69, 10, 0, 0, 0, 0),
(1106, 70, 10, 0, 0, 0, 0),
(1107, 75, 10, 0, 0, 0, 0),
(1108, 76, 10, 0, 0, 0, 0),
(1109, 77, 10, 0, 0, 0, 0),
(1110, 98, 10, 0, 0, 0, 0),
(1111, 103, 10, 0, 0, 0, 0),
(1112, 104, 10, 0, 0, 0, 0),
(1113, 78, 10, 0, 0, 0, 0),
(1114, 79, 10, 0, 0, 0, 0),
(1115, 80, 10, 0, 0, 0, 0),
(1116, 81, 10, 0, 0, 0, 0),
(1117, 82, 10, 0, 0, 0, 0),
(1118, 83, 10, 0, 0, 0, 0),
(1119, 84, 10, 0, 0, 0, 0),
(1120, 85, 10, 0, 0, 0, 0),
(1121, 86, 10, 0, 0, 0, 0),
(1122, 87, 10, 0, 0, 0, 0),
(1123, 88, 10, 0, 0, 0, 0),
(1124, 89, 10, 0, 0, 0, 0),
(1125, 90, 10, 0, 0, 0, 0),
(1126, 91, 10, 0, 0, 0, 0),
(1127, 92, 10, 0, 0, 0, 0),
(1128, 93, 10, 0, 0, 0, 0),
(1129, 94, 10, 0, 0, 0, 0),
(1130, 111, 10, 0, 0, 0, 0),
(1131, 112, 10, 0, 0, 0, 0),
(1132, 113, 10, 0, 0, 0, 0),
(1133, 114, 10, 0, 0, 0, 0),
(1134, 115, 10, 0, 0, 0, 0),
(1135, 116, 10, 0, 0, 0, 0),
(1136, 117, 10, 0, 0, 0, 0),
(1137, 118, 10, 0, 0, 0, 0),
(1138, 119, 10, 0, 0, 0, 0),
(1139, 120, 10, 0, 0, 0, 0),
(1140, 99, 10, 0, 0, 0, 0),
(1141, 101, 10, 0, 0, 0, 0),
(1142, 102, 10, 0, 0, 0, 0),
(1143, 105, 10, 0, 0, 0, 0),
(1144, 106, 10, 0, 0, 0, 0),
(1145, 107, 10, 0, 0, 0, 0),
(1146, 108, 10, 0, 0, 0, 0),
(1147, 109, 10, 0, 0, 0, 0),
(1148, 110, 10, 0, 0, 0, 0),
(1149, 71, 10, 0, 0, 0, 0),
(1150, 72, 10, 0, 0, 0, 0),
(1151, 73, 10, 0, 0, 0, 0),
(1152, 74, 10, 0, 0, 0, 0),
(1153, 131, 10, 0, 0, 0, 0),
(1154, 132, 10, 0, 0, 0, 0),
(1155, 133, 10, 0, 0, 0, 0),
(1156, 134, 10, 0, 0, 0, 0),
(1157, 135, 10, 0, 0, 0, 0),
(1158, 136, 10, 0, 0, 0, 0),
(1159, 137, 10, 0, 0, 0, 0),
(1160, 138, 10, 0, 0, 0, 0),
(1161, 127, 11, 0, 0, 0, 0),
(1162, 128, 11, 0, 0, 0, 0),
(1163, 129, 11, 0, 0, 0, 0),
(1164, 130, 11, 0, 0, 0, 0),
(1165, 3, 11, 0, 0, 0, 0),
(1166, 4, 11, 0, 0, 0, 0),
(1167, 121, 11, 0, 0, 0, 0),
(1168, 122, 11, 0, 0, 0, 0),
(1169, 6, 11, 0, 0, 0, 0),
(1170, 7, 11, 0, 0, 0, 0),
(1171, 8, 11, 0, 0, 0, 0),
(1172, 9, 11, 0, 0, 0, 0),
(1173, 10, 11, 0, 0, 0, 0),
(1174, 11, 11, 0, 0, 0, 0),
(1175, 12, 11, 0, 0, 0, 0),
(1176, 13, 11, 0, 0, 0, 0),
(1177, 126, 11, 0, 0, 0, 0),
(1178, 14, 11, 0, 0, 0, 0),
(1179, 15, 11, 0, 0, 0, 0),
(1180, 16, 11, 0, 0, 0, 0),
(1181, 17, 11, 0, 0, 0, 0),
(1182, 18, 11, 0, 0, 0, 0),
(1183, 19, 11, 0, 0, 0, 0),
(1184, 96, 11, 0, 0, 0, 0),
(1185, 97, 11, 0, 0, 0, 0),
(1186, 20, 11, 0, 0, 0, 0),
(1187, 21, 11, 0, 0, 0, 0),
(1188, 22, 11, 0, 0, 0, 0),
(1189, 95, 11, 0, 0, 0, 0),
(1190, 23, 11, 0, 0, 0, 0),
(1191, 24, 11, 0, 0, 0, 0),
(1192, 25, 11, 0, 0, 0, 0),
(1193, 26, 11, 0, 0, 0, 0),
(1194, 27, 11, 0, 0, 0, 0),
(1195, 28, 11, 0, 0, 0, 0),
(1196, 29, 11, 0, 0, 0, 0),
(1197, 30, 11, 0, 0, 0, 0),
(1198, 31, 11, 0, 0, 0, 0),
(1199, 123, 11, 0, 0, 0, 0),
(1200, 124, 11, 0, 0, 0, 0),
(1201, 125, 11, 0, 0, 0, 0),
(1202, 32, 11, 0, 0, 0, 0),
(1203, 33, 11, 0, 0, 0, 0),
(1204, 34, 11, 0, 0, 0, 0),
(1205, 35, 11, 0, 0, 0, 0),
(1206, 36, 11, 0, 0, 0, 0),
(1207, 37, 11, 0, 0, 0, 0),
(1208, 38, 11, 0, 0, 0, 0),
(1209, 39, 11, 0, 0, 0, 0),
(1210, 40, 11, 0, 0, 0, 0),
(1211, 41, 11, 0, 0, 0, 0),
(1212, 42, 11, 0, 0, 0, 0),
(1213, 43, 11, 0, 0, 0, 0),
(1214, 44, 11, 0, 0, 0, 0),
(1215, 45, 11, 0, 0, 0, 0),
(1216, 139, 11, 0, 0, 0, 0),
(1217, 140, 11, 0, 0, 0, 0),
(1218, 46, 11, 0, 0, 0, 0),
(1219, 47, 11, 0, 0, 0, 0),
(1220, 54, 11, 0, 0, 0, 0),
(1221, 55, 11, 0, 0, 0, 0),
(1222, 56, 11, 0, 0, 0, 0),
(1223, 57, 11, 0, 0, 0, 0),
(1224, 58, 11, 0, 0, 0, 0),
(1225, 59, 11, 0, 0, 0, 0),
(1226, 60, 11, 0, 0, 0, 0),
(1227, 61, 11, 0, 0, 0, 0),
(1228, 62, 11, 0, 0, 0, 0),
(1229, 63, 11, 0, 0, 0, 0),
(1230, 64, 11, 0, 0, 0, 0),
(1231, 65, 11, 0, 0, 0, 0),
(1232, 66, 11, 0, 0, 0, 0),
(1233, 67, 11, 0, 0, 0, 0),
(1234, 68, 11, 0, 0, 0, 0),
(1235, 69, 11, 0, 0, 0, 0),
(1236, 70, 11, 0, 0, 0, 0),
(1237, 75, 11, 0, 0, 0, 0),
(1238, 76, 11, 0, 0, 0, 0),
(1239, 77, 11, 0, 0, 0, 0),
(1240, 98, 11, 0, 0, 0, 0),
(1241, 103, 11, 0, 0, 0, 0),
(1242, 104, 11, 0, 0, 0, 0),
(1243, 78, 11, 0, 0, 0, 0),
(1244, 79, 11, 0, 0, 0, 0),
(1245, 80, 11, 0, 0, 0, 0),
(1246, 81, 11, 0, 0, 0, 0),
(1247, 82, 11, 0, 0, 0, 0),
(1248, 83, 11, 0, 0, 0, 0),
(1249, 84, 11, 0, 0, 0, 0),
(1250, 85, 11, 0, 0, 0, 0),
(1251, 86, 11, 0, 0, 0, 0),
(1252, 87, 11, 0, 0, 0, 0),
(1253, 88, 11, 0, 0, 0, 0),
(1254, 89, 11, 0, 0, 0, 0),
(1255, 90, 11, 0, 0, 0, 0),
(1256, 91, 11, 0, 0, 0, 0),
(1257, 92, 11, 0, 0, 0, 0),
(1258, 93, 11, 0, 0, 0, 0),
(1259, 94, 11, 0, 0, 0, 0),
(1260, 111, 11, 0, 0, 0, 0),
(1261, 112, 11, 0, 0, 0, 0),
(1262, 113, 11, 0, 0, 0, 0),
(1263, 114, 11, 0, 0, 0, 0),
(1264, 115, 11, 0, 0, 0, 0),
(1265, 116, 11, 0, 0, 0, 0),
(1266, 117, 11, 0, 0, 0, 0),
(1267, 118, 11, 0, 0, 0, 0),
(1268, 119, 11, 0, 0, 0, 0),
(1269, 120, 11, 0, 0, 0, 0),
(1270, 99, 11, 0, 0, 0, 0),
(1271, 101, 11, 0, 0, 0, 0),
(1272, 102, 11, 0, 0, 0, 0),
(1273, 105, 11, 0, 0, 0, 0),
(1274, 106, 11, 0, 0, 0, 0),
(1275, 107, 11, 0, 0, 0, 0),
(1276, 108, 11, 0, 0, 0, 0),
(1277, 109, 11, 0, 0, 0, 0),
(1278, 110, 11, 0, 0, 0, 0),
(1279, 71, 11, 0, 0, 0, 0),
(1280, 72, 11, 0, 0, 0, 0),
(1281, 73, 11, 0, 0, 0, 0),
(1282, 74, 11, 0, 0, 0, 0),
(1283, 131, 11, 0, 0, 0, 0),
(1284, 132, 11, 0, 0, 0, 0),
(1285, 133, 11, 0, 0, 0, 0),
(1286, 134, 11, 0, 0, 0, 0),
(1287, 135, 11, 0, 0, 0, 0),
(1288, 136, 11, 0, 0, 0, 0),
(1289, 137, 11, 0, 0, 0, 0),
(1290, 138, 11, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `id_admission` varchar(256) DEFAULT NULL,
  `total` varchar(256) DEFAULT NULL,
  `discount` varchar(256) DEFAULT NULL,
  `tax` varchar(256) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales_items`
--

CREATE TABLE `sales_items` (
  `id` int(11) NOT NULL,
  `id_professional` int(11) DEFAULT NULL,
  `id_item` int(11) DEFAULT NULL,
  `item` varchar(256) DEFAULT NULL,
  `type` varchar(256) DEFAULT NULL,
  `amount` varchar(256) DEFAULT NULL,
  `quantity` varchar(256) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `slot_id` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `available_days` varchar(50) DEFAULT NULL,
  `per_patient_time` time DEFAULT NULL,
  `serial_visibility_type` tinyint(4) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `slot_id`, `doctor_id`, `start_time`, `end_time`, `available_days`, `per_patient_time`, `serial_visibility_type`, `status`) VALUES
(1, 1, 2, '06:00:00', '13:00:00', 'Sunday', '00:20:00', 2, 1),
(2, 1, 3, '09:00:00', '12:00:00', 'Sunday', '00:30:00', 2, 1),
(3, 1, 3, '09:00:00', '12:00:00', 'Tuesday', '00:30:00', 2, 1),
(4, 1, 3, '06:50:45', '03:00:00', 'Tuesday', '08:30:00', 1, 1),
(5, 1, 5, '08:00:00', '12:00:00', 'Sunday', '00:30:00', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sec_role`
--

CREATE TABLE `sec_role` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sec_role`
--

INSERT INTO `sec_role` (`id`, `type`) VALUES
(1, 'Admin'),
(2, 'Doctor'),
(3, 'Contabilidad'),
(4, 'Laboratorio'),
(5, 'Enfermero'),
(6, 'Farmacia'),
(7, 'Receptionista'),
(9, 'Administración'),
(10, 'Gerencia'),
(11, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sec_userrole`
--

CREATE TABLE `sec_userrole` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `roleid` int(11) NOT NULL,
  `createby` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `createdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `sec_userrole`
--

INSERT INTO `sec_userrole` (`id`, `user_id`, `roleid`, `createby`, `createdate`) VALUES
(1, '1', 1, '1', '2019-09-29 00:00:00'),
(2, '2', 2, '1', '2020-06-11 06:23:24'),
(3, '2', 6, '1', '2022-04-19 00:00:00'),
(4, '4', 1, '1', '2022-04-30 00:00:00'),
(5, '6', 3, '1', '2022-06-09 00:00:00'),
(6, '7', 2, '1', '2022-07-06 00:00:00'),
(7, '8', 6, '1', '2022-08-04 00:00:00'),
(8, '9', 1, '1', '2023-01-09 00:00:00'),
(9, '10', 1, '1', '2023-01-13 00:00:00'),
(10, '11', 1, '1', '2023-01-19 00:00:00'),
(11, '12', 2, '1', '2023-01-19 00:00:00'),
(12, '13', 1, '1', '2023-01-24 00:00:00'),
(13, '14', 1, '1', '2023-01-25 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `setting`
--

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `site_align` varchar(50) DEFAULT NULL,
  `footer_text` varchar(255) DEFAULT NULL,
  `time_zone` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `setting`
--

INSERT INTO `setting` (`setting_id`, `title`, `description`, `email`, `phone`, `logo`, `favicon`, `language`, `site_align`, `footer_text`, `time_zone`) VALUES
(2, 'Clinica Médica Betancourt', 'Calle Zoillo Flores', 'info@clinicamedicabetancourt.com', '591 3 3590011', 'assets/images/apps/18817813cad040fec2cb70afb391f2b3.png', 'assets/images/icons/114ee4509852a191b2bea4837303c21e.png', 'Español', 'LTR', '2022 ©Copyright Criative Digital.', 'America/La_Paz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sms_delivery`
--

CREATE TABLE `sms_delivery` (
  `sms_delivery_id` int(11) NOT NULL,
  `ss_id` int(11) NOT NULL,
  `delivery_date_time` datetime NOT NULL,
  `sms_info_id` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sms_gateway`
--

CREATE TABLE `sms_gateway` (
  `gateway_id` int(11) NOT NULL,
  `provider_name` text NOT NULL,
  `user` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `authentication` text NOT NULL,
  `link` text NOT NULL,
  `default_status` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sms_gateway`
--

INSERT INTO `sms_gateway` (`gateway_id`, `provider_name`, `user`, `password`, `authentication`, `link`, `default_status`, `status`) VALUES
(1, 'nexmo', '1d286ff1', '11a8b67955d4482f', 'Hospital', 'https://www.nexmo.com/', 0, 1),
(2, 'clickatell', 'clickatell', '9d2e2d3aa558ddcb', 'Hospital', 'https://www.clickatell.com/', 0, 1),
(3, 'bdtask', 'test', '161QLtkk1I', '8801847169884', 'ms.bdtask.com', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sms_info`
--

CREATE TABLE `sms_info` (
  `sms_info_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` varchar(30) NOT NULL,
  `phone_no` varchar(30) NOT NULL,
  `appointment_id` varchar(30) NOT NULL,
  `appointment_date` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `sms_counter` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sms_schedule`
--

CREATE TABLE `sms_schedule` (
  `ss_id` int(11) NOT NULL,
  `ss_teamplate_id` int(11) NOT NULL,
  `ss_name` text NOT NULL,
  `ss_schedule` varchar(100) NOT NULL,
  `ss_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sms_schedule`
--

INSERT INTO `sms_schedule` (`ss_id`, `ss_teamplate_id`, `ss_name`, `ss_schedule`, `ss_status`) VALUES
(1, 2, 'One', '1:1:1', 1),
(2, 9, 'Summer offer', '10:3:0', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sms_setting`
--

CREATE TABLE `sms_setting` (
  `id` int(11) UNSIGNED NOT NULL,
  `appointment` tinyint(1) DEFAULT NULL,
  `registration` tinyint(1) DEFAULT NULL,
  `schedule` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sms_setting`
--

INSERT INTO `sms_setting` (`id`, `appointment`, `registration`, `schedule`) VALUES
(2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sms_teamplate`
--

CREATE TABLE `sms_teamplate` (
  `teamplate_id` int(11) NOT NULL,
  `teamplate_name` text,
  `teamplate` text,
  `type` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `default_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sms_teamplate`
--

INSERT INTO `sms_teamplate` (`teamplate_id`, `teamplate_name`, `teamplate`, `type`, `status`, `default_status`) VALUES
(1, 'Appointment Template', 'Doctor, %doctor_name%. \r\nHello, %patient_name%. \r\nYour ID: %patient_id%, Appointment ID: %appointment_id%, Serial: %sequence% and Appointment Date: %appointment_date%. \r\nThank you for the Appointment.', 'Appointment', 1, 1),
(2, 'Schedule', 'Doctor, %doctor_name%. \r\nHello, %patient_name%. \r\nYour ID: %patient_id%, Appointment ID: %appointment_id%, Serial: %sequence% and Appointment Date: %appointment_date%. \r\nThank you for the Appointment.', 'Schedule', 1, 1),
(3, 'Registration', 'Hello, %patient_name%. \r\nYour ID: %patient_id%,  \r\nThank you for the registration.', 'Registration', 1, 1),
(4, 'Summer Offer', 'Hello, %patient_name%. Your ID: %patient_id%,\r\nYour promo code is 1010101.\r\nContact with us.\r\nThanks', 'Schedule', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sms_users`
--

CREATE TABLE `sms_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `receiver` varchar(20) DEFAULT NULL,
  `message` text,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_module`
--

CREATE TABLE `sub_module` (
  `id` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `directory` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sub_module`
--

INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES
(3, 3, 'Add Department', 'Add Department', 'application/modules/store/assets/images/thumbnail.jpg', 'add_department', 1),
(4, 3, 'Department List', 'Department List', 'application/modules/store/assets/images/thumbnail.jpg', 'department_list', 1),
(6, 4, 'Add Doctor', 'Add Doctor', 'application/modules/store/assets/images/thumbnail.jpg', 'add_doctor', 1),
(7, 4, 'Doctor List', 'Doctor List', 'application/modules/store/assets/images/thumbnail.jpg', 'doctor_list', 1),
(8, 5, 'Add Patient', 'Add Patient', 'application/modules/store/assets/images/thumbnail.jpg', 'add_patient', 1),
(9, 5, 'Patient List', 'Patient List', 'application/modules/store/assets/images/thumbnail.jpg', 'patient_list', 1),
(10, 5, 'Add Document', 'Add Document', 'application/modules/store/assets/images/thumbnail.jpg', 'add_document', 1),
(11, 5, 'Document List', 'Document List', 'application/modules/store/assets/images/thumbnail.jpg', 'document_list', 1),
(12, 6, 'Add Schedule', 'Manage Customer', 'application/modules/store/assets/images/thumbnail.jpg', 'add_schedule', 1),
(13, 6, 'Schedule List', 'Credit Customer', 'application/modules/store/assets/images/thumbnail.jpg', 'schedule_list', 1),
(14, 7, 'Add Appointment', 'Add Appointment', 'application/modules/store/assets/images/thumbnail.jpg', 'add_appointment', 1),
(15, 7, 'Appointment List', 'Appointment List', 'application/modules/store/assets/images/thumbnail.jpg', 'appointment_list', 1),
(16, 7, 'Assign By All', 'Assign By All', 'application/modules/store/assets/images/thumbnail.jpg', 'assign_by_all', 1),
(17, 7, 'Assign By Doctor', 'Assign By Doctor', 'application/modules/store/assets/images/thumbnail.jpg', 'assign_by_doctor', 1),
(18, 7, 'Assign By Representative', 'Assign By Representative', 'application/modules/store/assets/images/thumbnail.jpg', 'assign_by_representative', 1),
(19, 7, 'Assign To Doctor', 'Assign To Doctor', 'application/modules/store/assets/images/thumbnail.jpg', 'assign_to_doctor', 1),
(20, 8, 'Add Patient Case Study', 'Add Patient Case Study', 'application/modules/store/assets/images/thumbnail.jpg', 'add_patient_case_study', 1),
(21, 8, 'Patient Case Study List', 'Patient Case Study List', 'application/modules/store/assets/images/thumbnail.jpg', 'patient_case_study_list', 1),
(22, 8, 'Prescription List', '  \r\nPrescription List', 'application/modules/store/assets/images/thumbnail.jpg', 'prescription_list', 1),
(23, 9, 'Debit Voucher', 'Debit Vouche', 'application/modules/store/assets/images/thumbnail.jpg', 'debit_voucher', 1),
(24, 9, 'Account List', 'Account List', 'application/modules/store/assets/images/thumbnail.jpg', 'account_list', 1),
(25, 9, 'Credit Voucher', 'Credit Voucher', 'application/modules/store/assets/images/thumbnail.jpg', 'credit_voucher', 1),
(26, 9, 'Contra Voucher', 'Contra Voucher', 'application/modules/store/assets/images/thumbnail.jpg', 'contra_voucher', 1),
(27, 9, 'Journal Voucher', 'Journal Voucher', 'application/modules/store/assets/images/thumbnail.jpg', 'journal_voucher', 1),
(28, 9, 'Voucher Approval', 'Voucher Approval', 'application/modules/store/assets/images/thumbnail.jpg', 'voucher_approval', 1),
(29, 9, 'Account Report', 'Account Report', 'application/modules/store/assets/images/thumbnail.jpg', 'account_report', 1),
(30, 9, 'Voucher Report', 'Voucher Report', 'application/modules/store/assets/images/thumbnail.jpg', 'voucher_report', 1),
(31, 9, 'Cash Book', 'Cash Book', 'application/modules/store/assets/images/thumbnail.jpg', 'cash_book', 1),
(32, 11, 'Add Insurance', 'Add Insurance', 'application/modules/store/assets/images/thumbnail.jpg', 'add_insurance', 1),
(33, 11, 'Insurance List', 'Insurance List', 'application/modules/store/assets/images/thumbnail.jpg', 'insurance_list', 1),
(34, 11, 'Add Limit Approval', 'Add Limit Approval', 'application/modules/store/assets/images/thumbnail.jpg', 'add_limit_approval', 1),
(35, 11, 'Limit Approval List', 'Limit Approval List', 'application/modules/store/assets/images/thumbnail.jpg', 'limit_approval_list', 1),
(36, 12, 'Add Service', 'Add Service', 'application/modules/store/assets/images/thumbnail.jpg', 'add_service', 1),
(37, 12, 'Service List', 'Service List', 'application/modules/store/assets/images/thumbnail.jpg', 'service_list', 1),
(38, 12, 'Add Package', 'Add Package', 'application/modules/store/assets/images/thumbnail.jpg', 'add_package', 1),
(39, 12, 'Package List', 'Package List', 'application/modules/store/assets/images/thumbnail.jpg', 'package_list', 1),
(40, 12, 'Add Admission', 'Add Admission', 'application/modules/store/assets/images/thumbnail.jpg', 'add_admission', 1),
(41, 12, 'Admission List', 'Admission List', 'application/modules/store/assets/images/thumbnail.jpg', 'admission_list', 1),
(42, 12, 'Add Advance', 'Add Advance', 'application/modules/store/assets/images/thumbnail.jpg', 'add_advance', 1),
(43, 12, 'Advance List', 'Advance List', 'application/modules/store/assets/images/thumbnail.jpg', 'advance_list', 1),
(44, 12, 'Add Bill', 'Add Bill', 'application/modules/store/assets/images/thumbnail.jpg', 'add_bill', 1),
(45, 12, 'Bill List', 'Bill List', 'application/modules/store/assets/images/thumbnail.jpg', 'bill_list', 1),
(46, 13, 'Add Employee', 'Add Employee', 'application/modules/store/assets/images/thumbnail.jpg', 'add_employee', 1),
(47, 13, 'Employee List', 'Employee List', 'application/modules/store/assets/images/thumbnail.jpg', 'employee_list', 1),
(54, 14, 'Add Bed', 'Add Bed', 'application/modules/store/assets/images/thumbnail.jpg', 'add_bed', 1),
(55, 14, 'Bed List', 'Bed List', 'application/modules/store/assets/images/thumbnail.jpg', 'bed_list', 1),
(56, 14, 'Bed Assign', 'Bed Assign', 'application/modules/store/assets/images/thumbnail.jpg', 'bed_assign', 1),
(57, 14, 'Bed Assign List', 'Bed Assign List', 'application/modules/store/assets/images/thumbnail.jpg', 'bed_assign_list', 1),
(58, 14, 'Report', 'Report', 'application/modules/store/assets/images/thumbnail.jpg', 'bed_report', 1),
(59, 15, 'Add Notice', 'Add Notice', 'application/modules/stockmovment/assets/images/thumbnail.jpg', 'add_notice', 1),
(60, 15, 'Notice List', 'Notice List', 'application/modules/stockmovment/assets/images/thumbnail.jpg', 'notice_list', 1),
(61, 16, 'Add Patient', 'Add Patient', 'application/modules/store/assets/images/thumbnail.jpg', 'case_add_patient', 1),
(62, 16, 'Patient List', 'Patient List', 'application/modules/store/assets/images/thumbnail.jpg', 'case_patient_list', 1),
(63, 17, 'Add Birth Report', 'Add Birth Report', 'application/modules/store/assets/images/thumbnail.jpg', 'add_birth_report', 1),
(64, 17, 'Birth Report', 'Birth Report', 'application/modules/store/assets/images/thumbnail.jpg', 'birth_report', 1),
(65, 17, 'Add Death Report', 'Add Death Report', 'application/modules/store/assets/images/thumbnail.jpg', 'add_death_report', 1),
(66, 17, 'Death Report', 'Death Report', 'application/modules/store/assets/images/thumbnail.jpg', 'death_report', 1),
(67, 17, 'Add Operation Report', 'Add Operation Report', 'application/modules/store/assets/images/thumbnail.jpg', 'add_operation_report', 1),
(68, 17, 'Operation Report', 'Operation Report', 'application/modules/store/assets/images/thumbnail.jpg', 'operation_report', 1),
(69, 17, 'Add Investigation Report', 'Add Investigation Report', 'application/modules/store/assets/images/thumbnail.jpg', 'add_investigation_report', 1),
(70, 17, 'Investigation Report', 'Investigation Report', 'application/modules/store/assets/images/thumbnail.jpg', 'investigation_report', 1),
(71, 26, 'Add Medicine Category', 'Add Medicine Category', 'application/modules/store/assets/images/thumbnail.jpg', 'add_medicine_category', 1),
(72, 26, 'medicine_category_list', 'Medicine Category List', 'application/modules/store/assets/images/thumbnail.jpg', 'medicine_category_list', 1),
(73, 26, 'add_medicine', 'Add Medicine', 'application/modules/store/assets/images/thumbnail.jpg', 'add_medicine', 1),
(74, 26, 'Medicine List', 'Medicine List', 'application/modules/store/assets/images/thumbnail.jpg', 'medicine_list', 1),
(75, 18, 'Enquiry', 'Enquiry', 'application/modules/store/assets/images/thumbnail.jpg', 'enquiry', 1),
(76, 19, 'App Setting', 'App Setting', 'application/modules/store/assets/images/thumbnail.jpg', 'app_setting', 1),
(77, 19, 'Language Setting', 'Language Setting', 'application/modules/store/assets/images/thumbnail.jpg', 'language_setting', 1),
(78, 20, 'Gateway Setting', 'Gateway Setting', 'application/modules/store/assets/images/thumbnail.jpg', 'gateway_setting', 1),
(79, 20, 'SMS Template', 'SMS Template', 'application/modules/store/assets/images/thumbnail.jpg', 'sms_template', 1),
(80, 20, 'SMS Schedule', 'SMS Schedule', 'application/modules/store/assets/images/thumbnail.jpg', 'sms_schedule', 1),
(81, 20, 'send_custom_sms', 'Send Custom SMS', 'application/modules/store/assets/images/thumbnail.jpg', 'send_custom_sms', 1),
(82, 20, 'Custom SMS List', 'Custom SMS List', 'application/modules/store/assets/images/thumbnail.jpg', 'custom_sms_list', 1),
(83, 20, 'Auto SMS Report', 'Auto SMS Report', 'application/modules/store/assets/images/thumbnail.jpg', 'auto_sms_report', 1),
(84, 20, 'User SMS List', 'User SMS List', 'application/modules/store/assets/images/thumbnail.jpg', 'user_sms_list', 1),
(85, 21, 'New Message', 'New Message', 'application/modules/store/assets/images/thumbnail.jpg', 'new_message', 1),
(86, 21, 'Inbox', 'Inbox', 'application/modules/store/assets/images/thumbnail.jpg', 'inbox', 1),
(87, 21, 'Sent', 'Sent', 'application/modules/store/assets/images/thumbnail.jpg', 'sent', 1),
(88, 22, 'Send Mail', 'Send Mail', 'application/modules/store/assets/images/thumbnail.jpg', 'send_mail', 1),
(89, 22, 'Mail Setting', 'Mail Setting', 'application/modules/store/assets/images/thumbnail.jpg', 'mail_setting', 1),
(90, 23, 'Setting', 'Setting', 'application/modules/store/assets/images/thumbnail.jpg', 'web_setting', 1),
(91, 23, 'Slider', 'Slider', 'application/modules/store/assets/images/thumbnail.jpg', 'slider', 1),
(92, 23, 'Section', 'Section', 'application/modules/store/assets/images/thumbnail.jpg', 'section', 1),
(93, 23, 'Section Item', 'Section Item', 'application/modules/store/assets/images/thumbnail.jpg', 'section_item', 1),
(94, 23, 'Comments', 'Comments', 'application/modules/store/assets/images/thumbnail.jpg', 'comments', 1),
(95, 8, 'Create Prescription', 'Create Prescription', 'application/modules/store/assets/images/thumbnail.jpg', 'create_prescription', 1),
(96, 7, 'Assign To Me', 'Assign To Me', 'application/modules/store/assets/images/thumbnail.jpg', 'assign_to_me', 1),
(97, 7, 'Assign By Me', 'Assign By Me', 'application/modules/store/assets/images/thumbnail.jpg', 'assign_by_me', 1),
(98, 19, 'Add Phrase', 'Add Phrase', 'application/modules/store/assets/images/thumbnail.jpg', 'add_phrase', 1),
(99, 24, 'Add Role', 'Add Role', 'application/modules/store/assets/images/thumbnail.jpg', 'add_role', 1),
(101, 24, 'Assign Role To USer', 'Assign Role To USer', 'application/modules/store/assets/images/thumbnail.jpg', 'assign_role_to_user', 1),
(102, 24, 'Role Permission', 'Role Permission', 'application/modules/store/assets/images/thumbnail.jpg', 'role_permission', 1),
(103, 19, 'Profile', 'Profile', 'application/modules/store/assets/images/thumbnail.jpg', 'profile', 1),
(104, 19, 'Edit Profile', 'Edit Profile', 'application/modules/store/assets/images/thumbnail.jpg', 'edit_profile', 1),
(105, 25, 'Add Medication', 'Add Medication', '', 'add_medication', 1),
(106, 25, 'Medication List', 'Medication List', '', 'medication_list', 1),
(107, 25, 'Add Visit', 'Add Visit', '', 'add_visit', 1),
(108, 25, 'Visit List', 'Visit List', '', 'visit_list', 1),
(109, 25, 'Medication Report', 'Medication Report', '', 'medication_report', 1),
(110, 25, 'Patient Visit Report', 'Patient Visit Report', '', 'visit_report', 1),
(111, 23, 'Add Menu', 'Add Menu', '', 'add_menu', 1),
(112, 23, 'Menu List', 'Menu List', '', 'menu', 1),
(113, 23, 'Add Template', 'Add Template', '', 'add_template', 1),
(114, 23, 'Template List', 'Template List, Edit and Delete', '', 'template', 1),
(115, 23, 'About Us', 'About Us', '', 'about', 1),
(116, 23, 'Testimonial', 'Testimonial, Edit, Add and Delete', '', 'testimonial', 1),
(117, 23, 'Appointment Instructions', 'Appointment Instructions add, edit and delete', '', 'appoint_instruction', 1),
(118, 23, 'Partner', 'partner add, edit and delete', '', 'partner', 1),
(119, 23, 'News', 'News Add, Edit and Delete', '', 'news', 1),
(120, 23, 'Services', 'Service Add, Edit and Delete', '', 'service', 1),
(121, 3, 'Add Main Department', 'Add Main Department', '', 'add_main_department', 1),
(122, 3, 'Main Department List', 'Main Department edit and delete', '', 'main_department', 1),
(123, 9, 'Bank Book', 'Bank Book', '', 'bank_book', 1),
(124, 9, 'General Ledger', 'General Ledger', '', 'general_ledger', 1),
(125, 9, 'Profit Loss', 'Profit Loss', '', 'profit_loss', 1),
(126, 6, 'Add Time Slot', 'Doctor time slot', '', 'add_time_slot', 1),
(127, 1, 'Graph', 'Graph', '', 'graph', 1),
(128, 1, 'Quick Menu', 'Quick Menu', '', 'quick_menu', 1),
(129, 1, 'Noticeboard', 'Noticeboard', '', 'noticeboard', 1),
(130, 1, 'Messages', 'Messages', '', 'messages', 1),
(131, 27, 'Agregar consulta', 'Agregar consulta', 'application/modules/store/assets/images/thumbnail.jpg', 'add_consulta', 1),
(132, 27, 'Listado de consulta', 'Listado de consulta', 'application/modules/store/assets/images/thumbnail.jpg', 'consultas', 1),
(133, 28, 'Agregar categoria', 'Agregar categoria', 'application/modules/store/assets/images/thumbnail.jpg', 'add_categoria_laboratorio', 1),
(134, 28, 'Listado de categorias', 'Listado de categorias', 'application/modules/store/assets/images/thumbnail.jpg', 'categorias', 1),
(135, 28, 'Agregar examen', 'Agregar examen', 'application/modules/store/assets/images/thumbnail.jpg', 'add_examen', 1),
(136, 28, 'Lista de exámenes', 'Lista de exámenes', 'application/modules/store/assets/images/thumbnail.jpg', 'examenes', 1),
(137, 28, 'Lista de solicitudes', 'Lista de solicitudes', 'application/modules/store/assets/images/thumbnail.jpg', 'solicitudes', 1),
(138, 28, 'Crear nueva solicitud', 'Crear nueva solicitud', 'application/modules/store/assets/images/thumbnail.jpg', 'add_solicitud', 1),
(139, 12, 'Caja', 'Caja', 'application/modules/store/assets/images/thumbnail.jpg', 'caja', 1),
(140, 12, 'Pagos a profesionales', 'Pagos a profesionales', 'application/modules/store/assets/images/thumbnail.jpg', 'professional', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `time_slot`
--

CREATE TABLE `time_slot` (
  `id` int(11) NOT NULL,
  `slot_name` varchar(40) CHARACTER SET utf8 NOT NULL,
  `slot` varchar(15) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `time_slot`
--

INSERT INTO `time_slot` (`id`, `slot_name`, `slot`, `status`) VALUES
(1, 'Mañana', '06:00 - 12:00', 1),
(2, 'Tarde', '12:01 - 18:00', 1),
(3, 'Noche', '18:01 - 23:59', 1),
(4, 'Madrugada', '00:00 - 05:59', 1),
(5, 'mañana', '07-11:30', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `user_role` tinyint(1) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `blood_group` varchar(10) DEFAULT NULL,
  `vacation` varchar(40) DEFAULT NULL,
  `facebook` varchar(150) DEFAULT NULL,
  `twitter` varchar(150) DEFAULT NULL,
  `youtube` varchar(150) DEFAULT NULL,
  `dribbble` varchar(150) DEFAULT NULL,
  `behance` varchar(150) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `email`, `password`, `user_role`, `department_id`, `picture`, `date_of_birth`, `sex`, `blood_group`, `vacation`, `facebook`, `twitter`, `youtube`, `dribbble`, `behance`, `created_by`, `create_date`, `update_date`, `status`) VALUES
(1, 'Administrador', 'betancourt', 'admin@admin.com', '9a286406c252a3d14218228974e1f567', 1, NULL, 'assets/images/doctor/476a1367ef8895281d6f278327347c92.jpg', '1970-01-01', 'Male', NULL, '', '', '', '', '', '', 1, '2023-01-28', NULL, 1),
(2, 'Farmacia', 'Farmacia', 'farmacia@clinicamedicabetancourt.com', 'e10adc3949ba59abbe56e057f20f883e', 6, NULL, '', NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-06-06', NULL, 1),
(3, 'Dra Susel', 'Betancourt', 'susel@clinicamedicabetancourt.com', 'd41d8cd98f00b204e9800998ecf8427e', 2, 16, 'assets/images/doctor/aa3bc014359b459921f2dde2471666a3.jpg', '2022-04-19', 'Male', '', NULL, NULL, NULL, NULL, NULL, NULL, 4, '2022-05-04', NULL, 1),
(4, 'Lola Melean', 'Rodriguez', 'lolita_@hotmail.com', 'cf6b3f17dfec4ba13f5121b6933f1e7a', 1, NULL, '', NULL, 'Female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-01-09', NULL, 1),
(5, 'Marco Antonio', 'Condori Vargas', 'Dr_Mco@yahoo.com', '3a3a0e9fe96e9ec4df00fa2338c1984e', 2, 23, '', '1988-01-30', 'Male', 'A-', NULL, NULL, NULL, NULL, NULL, NULL, 4, '2022-06-08', NULL, 1),
(6, 'Reyna Nataly', 'Rengel', 'contabilidad@clinicamedicabetancourt.com', '87aebc9ee31de1cac691e6e765cb6a10', 1, NULL, '', NULL, 'Female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-01-09', NULL, 1),
(8, 'Jose', 'Ginarte', 'joseantonioginartecanet14@gmail.com', '44e232467234c075b3b3680bcc057175', 1, NULL, '', '1970-01-01', 'Male', NULL, '', '', '', '', '', '', 8, '2023-01-26', NULL, 1),
(9, 'Maria de Lurdes', 'Mira Martines', 'mlmira88@gmail.com', '541d7714a12681773f9bcf106049425b', 1, NULL, NULL, NULL, 'Female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-01-09', NULL, 1),
(10, 'Ninet ', 'Ardaya', 'ardayaarteagacarlaninet@gmail.com', '5f694efb1fcbf6ac8d59741c17394c86', 1, NULL, '', NULL, 'Female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-01-26', NULL, 1),
(11, 'David', 'Rojas', 'david.rojas30@gmail.com', 'b730b4173e762690ea5744c2e993faa7', 1, NULL, '', '1970-01-01', 'Male', NULL, '', '', '', '', '', '', 11, '2023-01-20', NULL, 1),
(12, 'Dr. Mario ', 'G. Cuellar Yoens', 'info@clinicamedicabetancourt.com', 'd41d8cd98f00b204e9800998ecf8427e', 2, 0, '', '2023-01-20', 'Male', '', NULL, NULL, NULL, NULL, NULL, NULL, 11, '2023-01-20', NULL, 1),
(13, 'Susel', 'Fernandes', 'susel1@clinicamedicabetancourt.com', 'f56674f69a7fa034d5684969e1be8b72', 1, NULL, NULL, NULL, 'Female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-01-24', NULL, 1),
(14, 'Isabel ', 'A', 'Contaduria1985@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, NULL, NULL, NULL, 'Female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-01-25', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_lang`
--

CREATE TABLE `user_lang` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `language` varchar(15) NOT NULL,
  `designation` varchar(120) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `mobile` varchar(25) DEFAULT NULL,
  `career_title` varchar(200) DEFAULT NULL,
  `short_biography` text,
  `specialist` varchar(200) DEFAULT NULL,
  `degree` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user_lang`
--

INSERT INTO `user_lang` (`id`, `user_id`, `firstname`, `lastname`, `language`, `designation`, `address`, `phone`, `mobile`, `career_title`, `short_biography`, `specialist`, `degree`) VALUES
(1, 2, 'Farmacia', 'Farmacia', 'Español', 'Farmacia', 'Farmacia', '', '0000000', '000000', '', '', ''),
(2, 3, 'Dra Susel', 'Betancourt', 'Español', 'Consultas', '1', '', '123456', '1', '', '', ''),
(3, 4, 'Lola Melean', 'Rodriguez', 'Español', 'Secretaria', 'SANTA CRUZ DE LA SIERRA', '', '70241149', '.', '', '', ''),
(4, 5, 'Marco Antonio', 'Condori Vargas', 'Español', 'pediatria', 'pediatria', '', '74210887', 'pediatra', '', 'pediatria', ''),
(5, 6, 'Reyna', 'Rengel', 'Español', 'Contadora', 'El Trompillo', '', '77480018', '.', '<p>.</p>', '', '<p>.</p>'),
(6, 7, 'Dra Susel', 'Betancourt', 'Español', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 8, 'Jose', 'canet', 'Español', 'Farmacia', 'Zoillo Flores', '', '69011066', '.', '', '', ''),
(8, 9, 'Maria de Lurdes', 'Mira Martines', 'Español', 'UTI', 'Zoillo Flores', '', '63377500', 'Dr', '', '', ''),
(9, 10, 'Noel', 'Atiare', 'Español', 'Cajero', 'Zoillo Flores', '', '75369846', 'Admin', '', '', ''),
(10, 11, 'David', 'Rojas', 'Español', 'Administrador', 'Zoillo Flores', '', '0', '0', '', '', ''),
(11, 12, 'Dr. Mario ', 'G. Cuella Lens', 'Español', 'Ginecologo', 'trompillo', '', '70241149', 'ginecologo', '', '', ''),
(12, 13, 'Susel', 'Fernandes', 'Español', '1', 'a', '', '12345', 'qwer', '', '', ''),
(13, 14, 'Isabel ', 'A', 'Español', 'A', 'A', '', '12345', 'Qwe', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_language`
--

CREATE TABLE `user_language` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `type` varchar(10) CHARACTER SET utf8 NOT NULL,
  `rating` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_language`
--

INSERT INTO `user_language` (`id`, `user_id`, `name`, `type`, `rating`) VALUES
(1, 2, 'English', 'Native', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_log`
--

CREATE TABLE `user_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `in_time` time NOT NULL,
  `out_time` time NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1=active and 0=inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_log`
--

INSERT INTO `user_log` (`id`, `user_id`, `in_time`, `out_time`, `date`, `status`) VALUES
(1, 1, '17:22:06', '17:23:07', '2022-04-17', 1),
(2, 1, '00:29:05', '15:47:30', '2022-04-18', 1),
(3, 1, '03:58:09', '12:14:13', '2022-04-19', 1),
(4, 2, '12:14:22', '12:14:35', '2022-04-19', 1),
(5, 1, '18:26:49', '00:00:00', '2022-04-20', 1),
(6, 1, '02:45:22', '00:00:00', '2022-04-21', 1),
(7, 1, '13:33:18', '00:00:00', '2022-04-22', 1),
(8, 1, '23:01:32', '00:00:00', '2022-04-23', 1),
(9, 1, '00:23:09', '00:00:00', '2022-04-25', 1),
(10, 1, '01:18:19', '00:00:00', '2022-04-26', 1),
(11, 1, '13:05:55', '00:00:00', '2022-04-27', 1),
(12, 1, '00:13:42', '00:00:00', '2022-04-29', 1),
(13, 1, '14:01:29', '14:06:18', '2022-04-30', 1),
(14, 4, '14:07:13', '00:00:00', '2022-04-30', 1),
(15, 4, '12:29:49', '14:08:00', '2022-05-04', 1),
(16, 1, '13:54:45', '00:00:00', '2022-05-04', 1),
(17, 1, '00:15:21', '00:00:00', '2022-05-07', 1),
(18, 1, '00:53:15', '00:00:00', '2022-05-09', 1),
(19, 1, '00:30:26', '00:00:00', '2022-05-16', 1),
(20, 1, '18:27:57', '00:00:00', '2022-05-20', 1),
(21, 1, '13:05:11', '00:00:00', '2022-05-23', 1),
(22, 1, '00:33:48', '00:00:00', '2022-05-26', 1),
(23, 1, '14:39:23', '00:00:00', '2022-05-31', 1),
(24, 1, '20:29:40', '00:00:00', '2022-06-01', 1),
(25, 1, '00:13:25', '00:00:00', '2022-06-02', 1),
(26, 1, '12:50:39', '22:13:35', '2022-06-06', 1),
(27, 2, '22:00:33', '22:06:22', '2022-06-06', 0),
(28, 1, '02:09:42', '19:21:03', '2022-06-07', 0),
(29, 2, '02:24:37', '02:26:03', '2022-06-07', 0),
(30, 4, '19:21:22', '00:00:00', '2022-06-07', 1),
(31, 4, '12:54:42', '00:00:00', '2022-06-08', 1),
(32, 1, '18:47:10', '00:00:00', '2022-06-09', 1),
(33, 4, '18:49:39', '00:00:00', '2022-06-09', 1),
(34, 4, '14:22:07', '00:00:00', '2022-06-10', 1),
(35, 1, '18:02:27', '00:00:00', '2022-06-11', 1),
(36, 1, '17:26:15', '00:00:00', '2022-06-13', 1),
(37, 1, '13:26:52', '13:36:44', '2022-06-14', 1),
(38, 4, '13:40:08', '00:00:00', '2022-06-14', 1),
(39, 1, '01:35:17', '00:00:00', '2022-06-15', 1),
(40, 4, '13:58:24', '00:00:00', '2022-06-15', 1),
(41, 1, '15:35:41', '00:00:00', '2022-06-16', 1),
(42, 1, '18:00:46', '00:00:00', '2022-06-17', 1),
(43, 1, '18:46:58', '00:00:00', '2022-06-20', 1),
(44, 1, '13:17:04', '00:00:00', '2022-06-21', 1),
(45, 1, '17:31:37', '00:00:00', '2022-06-22', 1),
(46, 1, '15:36:15', '00:00:00', '2022-06-23', 1),
(47, 1, '22:00:26', '00:00:00', '2022-06-24', 1),
(48, 1, '22:06:36', '00:00:00', '2022-06-26', 1),
(49, 1, '13:24:47', '00:00:00', '2022-06-27', 1),
(50, 1, '01:40:51', '00:00:00', '2022-06-28', 1),
(51, 1, '14:37:38', '00:00:00', '2022-06-29', 1),
(52, 1, '00:23:27', '00:00:00', '2022-06-30', 1),
(53, 1, '22:49:52', '00:00:00', '2022-07-04', 1),
(54, 1, '15:06:57', '00:00:00', '2022-07-05', 1),
(55, 1, '12:47:47', '14:25:36', '2022-07-06', 1),
(56, 4, '12:53:27', '00:00:00', '2022-07-06', 1),
(57, 7, '13:35:24', '13:35:36', '2022-07-06', 0),
(58, 4, '12:25:19', '00:00:00', '2022-07-08', 1),
(59, 1, '23:58:27', '00:00:00', '2022-07-13', 1),
(60, 1, '00:01:01', '00:00:00', '2022-07-14', 1),
(61, 1, '18:26:43', '00:00:00', '2022-07-15', 1),
(62, 1, '14:37:59', '00:00:00', '2022-07-19', 1),
(63, 1, '22:58:50', '00:00:00', '2022-07-20', 1),
(64, 1, '15:10:06', '00:00:00', '2022-07-21', 1),
(65, 1, '23:16:50', '00:00:00', '2022-07-22', 1),
(66, 1, '23:56:57', '00:00:00', '2022-07-26', 1),
(67, 1, '19:42:06', '00:00:00', '2022-07-29', 1),
(68, 1, '23:06:02', '00:00:00', '2022-07-31', 1),
(69, 1, '15:09:46', '00:00:00', '2022-08-01', 1),
(70, 1, '13:48:51', '00:00:00', '2022-08-02', 1),
(71, 1, '01:36:54', '00:00:00', '2022-08-03', 1),
(72, 1, '12:42:13', '14:02:52', '2022-08-04', 1),
(73, 8, '13:46:14', '13:46:50', '2022-08-04', 1),
(74, 8, '21:19:51', '00:00:00', '2022-08-10', 1),
(75, 8, '19:37:49', '00:00:00', '2022-08-11', 1),
(76, 8, '22:23:39', '00:00:00', '2022-08-15', 1),
(77, 1, '12:03:23', '00:00:00', '2022-08-17', 1),
(78, 1, '20:55:04', '00:00:00', '2022-08-19', 1),
(79, 1, '01:47:50', '00:00:00', '2022-08-20', 1),
(80, 1, '15:40:31', '00:00:00', '2022-08-24', 1),
(81, 1, '13:50:35', '00:00:00', '2022-08-25', 1),
(82, 8, '16:17:10', '00:00:00', '2022-09-14', 1),
(83, 1, '19:02:32', '00:00:00', '2022-12-29', 1),
(84, 1, '13:38:06', '00:00:00', '2023-01-04', 1),
(85, 1, '15:31:06', '20:51:08', '2023-01-09', 0),
(86, 8, '20:20:38', '00:00:00', '2023-01-09', 1),
(87, 6, '20:34:42', '20:34:51', '2023-01-09', 1),
(88, 4, '20:54:33', '20:54:46', '2023-01-09', 1),
(89, 4, '12:00:40', '00:00:00', '2023-01-10', 1),
(90, 8, '16:38:15', '20:25:50', '2023-01-10', 0),
(91, 1, '18:51:23', '18:52:20', '2023-01-10', 0),
(92, 1, '15:39:44', '00:00:00', '2023-01-11', 1),
(93, 8, '20:57:37', '00:00:00', '2023-01-11', 1),
(94, 1, '00:34:23', '00:00:00', '2023-01-12', 1),
(95, 4, '19:41:06', '00:00:00', '2023-01-12', 1),
(96, 8, '19:47:30', '00:00:00', '2023-01-12', 1),
(97, 1, '00:54:41', '22:33:09', '2023-01-13', 0),
(98, 8, '15:04:12', '22:10:06', '2023-01-13', 0),
(99, 10, '22:59:03', '23:31:15', '2023-01-13', 0),
(100, 8, '12:36:28', '00:00:00', '2023-01-16', 1),
(101, 6, '02:49:53', '00:00:00', '2023-01-17', 1),
(102, 8, '12:14:45', '22:05:14', '2023-01-17', 0),
(103, 1, '20:30:16', '00:00:00', '2023-01-17', 1),
(104, 4, '20:36:45', '00:00:00', '2023-01-17', 1),
(105, 8, '14:18:14', '00:00:00', '2023-01-18', 1),
(106, 1, '17:11:47', '00:00:00', '2023-01-18', 1),
(107, 4, '20:20:19', '00:00:00', '2023-01-18', 1),
(108, 1, '00:25:56', '23:11:16', '2023-01-19', 1),
(109, 11, '23:09:28', '23:13:56', '2023-01-19', 1),
(110, 4, '23:13:22', '00:00:00', '2023-01-19', 1),
(111, 1, '01:19:32', '00:00:00', '2023-01-20', 1),
(112, 11, '01:36:07', '00:00:00', '2023-01-20', 1),
(113, 8, '19:33:19', '22:14:27', '2023-01-20', 0),
(114, 4, '19:53:13', '21:20:43', '2023-01-20', 1),
(115, 8, '14:08:51', '23:02:55', '2023-01-21', 0),
(116, 1, '15:23:43', '00:00:00', '2023-01-21', 1),
(117, 1, '17:52:10', '00:00:00', '2023-01-23', 1),
(118, 1, '00:15:45', '21:25:03', '2023-01-24', 1),
(119, 8, '13:08:35', '22:13:20', '2023-01-24', 0),
(120, 7, '14:23:17', '19:40:05', '2023-01-24', 0),
(121, 4, '14:54:10', '00:00:00', '2023-01-24', 1),
(122, 13, '19:49:43', '19:50:04', '2023-01-24', 1),
(123, 8, '12:41:50', '22:01:31', '2023-01-25', 0),
(124, 1, '13:21:54', '00:00:00', '2023-01-25', 1),
(125, 14, '13:29:46', '00:00:00', '2023-01-25', 1),
(126, 6, '14:54:13', '00:00:00', '2023-01-25', 1),
(127, 13, '14:55:07', '00:00:00', '2023-01-25', 1),
(128, 4, '16:33:44', '00:00:00', '2023-01-25', 1),
(129, 1, '00:05:28', '21:35:17', '2023-01-26', 0),
(130, 14, '12:30:06', '13:44:14', '2023-01-26', 0),
(131, 4, '13:44:44', '00:00:00', '2023-01-26', 1),
(132, 8, '20:12:04', '21:50:22', '2023-01-26', 1),
(133, 10, '20:20:33', '21:51:39', '2023-01-26', 0),
(134, 1, '03:17:48', '19:49:29', '2023-01-27', 1),
(135, 8, '13:07:34', '22:02:17', '2023-01-27', 0),
(136, 10, '19:50:05', '20:32:18', '2023-01-27', 0),
(137, 4, '20:34:29', '20:56:37', '2023-01-27', 0),
(138, 1, '02:36:30', '00:00:00', '2023-01-28', 1),
(139, 8, '12:35:19', '22:23:57', '2023-01-28', 0),
(140, 4, '13:12:28', '00:00:00', '2023-01-28', 1),
(141, 13, '21:10:08', '00:00:00', '2023-01-28', 1),
(142, 11, '04:25:31', '00:00:00', '2023-01-29', 1),
(143, 1, '00:29:55', '00:00:00', '2023-01-30', 1),
(144, 8, '12:45:49', '20:04:07', '2023-01-30', 0),
(145, 4, '12:52:57', '00:00:00', '2023-01-30', 1),
(146, 13, '19:36:10', '00:00:00', '2023-01-30', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `cliente` int(11) DEFAULT NULL,
  `productos` text,
  `descuento` varchar(256) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_farmacia`
--

CREATE TABLE `ventas_farmacia` (
  `id` int(11) NOT NULL,
  `cliente` varchar(256) DEFAULT NULL,
  `productos` text,
  `pagos` text,
  `descuento` varchar(123) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas_farmacia`
--

INSERT INTO `ventas_farmacia` (`id`, `cliente`, `productos`, `pagos`, `descuento`, `fecha`) VALUES
(4, 'PTPBB0YT', '[{\"producto\":\"Caja Paracetamol Con 10 unidades\",\"cantidad\":\"1\",\"precio\":\"20.00\"}]', '{\"efectivo\":\"20.00\",\"credito\":\"0.00\",\"debito\":\"0.00\",\"qr\":\"0.00\",\"transferencia\":\"0.00\",\"otro\":\"0.00\"}', '0.00', '2022-08-01 17:47:16'),
(5, 'PQHZMY23', '[{\"producto\":\"Caja Paracetamol Con 10 unidades\",\"cantidad\":\"1\",\"precio\":\"20.00\"},{\"producto\":\"Caja Paracetamol Con 10 unidades\",\"cantidad\":\"2\",\"precio\":\"20.00\"}]', '{\"efectivo\":\"40\",\"credito\":\"0.00\",\"debito\":\"20\",\"qr\":\"0.00\",\"transferencia\":\"0.00\",\"otro\":\"0.00\"}', '0.00', '2022-08-02 00:37:50'),
(6, 'PQHZMY23', '[{\"producto\":\"Diclofenaco\",\"cantidad\":\"1\",\"precio\":\"5.00\"}]', '{\"efectivo\":\"3\",\"credito\":\"0.00\",\"debito\":\"2\",\"qr\":\"0.00\",\"transferencia\":\"0.00\",\"otro\":\"0.00\"}', '0.00', '2022-08-03 03:42:18'),
(7, 'PJXGONMO', '[{\"producto\":\"Caja Paracetamol Con 10 unidades\",\"cantidad\":\"3\",\"precio\":\"20.00\"}]', '{\"efectivo\":\"30\",\"credito\":\"0.00\",\"debito\":\"0.00\",\"qr\":\"30\",\"transferencia\":\"0.00\",\"otro\":\"0.00\"}', '0.00', '2022-08-03 17:18:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_about`
--

CREATE TABLE `ws_about` (
  `id` int(2) NOT NULL,
  `language` varchar(15) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `quotation` varchar(150) CHARACTER SET utf8 NOT NULL,
  `author_name` varchar(35) CHARACTER SET utf8 NOT NULL,
  `signature` varchar(200) CHARACTER SET utf8 NOT NULL,
  `image` varchar(200) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ws_about`
--

INSERT INTO `ws_about` (`id`, `language`, `title`, `description`, `quotation`, `author_name`, `signature`, `image`, `status`) VALUES
(1, 'english', 'Summary Of Hospital', '<p>The simplest method of installation is through the Sublime Text conso</p>\r\n<p>The simplest method of installation is through the Sublime Text conso</p>\r\n<p>The simplest method of installation is through the Sublime Text cons</p>\r\n<p>The simplest method of installation is through the Sublime Text cons</p>\r\n<p>The simplest method of installation is through the Sublime Text cons</p>', 'Once open, paste the appropriate Python code for your version of Sublime Text into the console.', 'Michael Smith', '', '', 1),
(2, 'bangla', 'হাসপাতাল সংক্ষিপ্তসার', '<p>ইনস্টলেশনের সবচেয়ে সরল পদ্ধতি হলো স্লাইবমে টেক্সট কনসো</p>\r\n<p>ইনস্টলেশনের সবচেয়ে সরল পদ্ধতি হলো স্লাইবমে টেক্সট কনসো</p>\r\n<p>ইনস্টলেশনের সবচেয়ে সরল পদ্ধতিটি সুবাইল টেক্সট কনস</p>\r\n<p>ইনস্টলেশনের সবচেয়ে সরল পদ্ধতিটি সুবাইল টেক্সট কনস</p>', 'একবার খোলা হলে কনসোলের আপনার সংস্করণের সংস্করণটির জন্য যথাযথ পাইথন কোডটি আটকান।', 'মাইকেল স্মিথ', '', '', 1),
(3, 'arabic', 'ملخص المستشفى', '<p> أبسط طريقة للتثبيت هي من خلال النص السامي</p>\r\n<p>أبسط طريقة للتثبيت هي من خلال النص السامي</p>\r\n<p>أبسط طريقة للتثبيت هي من خلال النص السامي</p>\r\n<p>أبسط طريقة للتثبيت هي من خلال النص السامي</p>', 'بمجرد فتح ، قم بلصق رمز  المناسب لإصدارك من  في وحدة التحكم.', 'مايكل سميث', '', '', 1),
(4, 'french', 'Résumé de l\'hôpital', '<p>La méthode d’installation la plus simple consiste à utiliser Conso Text Sublime</p>\r\n<p>La méthode d’installation la plus simple consiste à utiliser Conso Text Sublime</p>\r\n<p>La méthode d\'installation la plus simple consiste à utiliser les consoles Sublime Text.</p>\r\n<p>La méthode d\'installation la plus simple consiste à utiliser les consoles Sublime Text.</p>\r\n<p> </p>\r\n<p> </p>', 'Une fois ouvert, collez le code Python approprié à votre version de Sublime Text dans la console.', 'Michael Smith', '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_appoint_instruction`
--

CREATE TABLE `ws_appoint_instruction` (
  `id` int(5) NOT NULL,
  `language` varchar(15) NOT NULL,
  `title` varchar(30) NOT NULL,
  `short_instruction` varchar(150) NOT NULL,
  `instruction` text NOT NULL,
  `note` varchar(150) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ws_appoint_instruction`
--

INSERT INTO `ws_appoint_instruction` (`id`, `language`, `title`, `short_instruction`, `instruction`, `note`, `status`) VALUES
(1, 'english', 'Book with your doctor', 'Some up and coming trends are healthcare consolidation for independent healthcare centers that see a cut in unforeseen payouts.', 'Praesent pellentesque nunc vel velit varius feugiat.\r\nSuspendisse vel ex vitae velit dignissim faucibus.\r\nInteger congue erat vel bibendum volutpat.\r\nNunc nec quam dapibus, placerat est in, tincidunt nibh.\r\nSed facilisis velit sit amet purus mattis, id rutrum leo scelerisque.\r\ntesting......', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 1),
(2, 'arabic', 'احجز مع طبيبك', 'بعض الاتجاهات القادمة والقادمة هي تعزيز الرعاية الصحية لمراكز الرعاية الصحية المستقلة التي ترى خفضا في المدفوعات غير المتوقعة.', 'وأفضل أنواع المستشفيات المعروفة هو المستشفى العام \r\n، الذي يوجد به عادة قسم للطوارئ لمعالجة المشاكل \r\nالصحية العاجلة التي تتراوح بين\r\n ضحايا الحريق والحوادث إلى نوبة قلبية.', 'إنها حقيقة راسخة أن القارئ سوف يصرفه محتوى مقروء للصفحة عندما ينظر إلى تخطيطه.', 1),
(3, 'bangla', 'আপনার ডাক্তারকে  বুক করুন', 'কিছু আপ এবং আসন্ন প্রবণতা স্বাধীন স্বাস্থ্যসেবা কেন্দ্রগুলির জন্য স্বাস্থ্যসেবা একীকরণ যা অপ্রত্যাশিত অর্থ প্রদানের মধ্যে একটি কাট দেখতে পায়।', 'একটি হাসপাতাল একটি স্বাস্থ্য সেবা প্রতিষ্ঠান যা বিশেষ চিকিৎসা ও নার্সিং কর্মীদের এবং চিকিৎসা সরঞ্জামগুলির সাথে রোগীর চিকিৎসা প্রদান করে। \r\nহাসপাতালের সবচেয়ে সুপরিচিত প্রকার হল সাধারণ হাসপাতাল,\r\n যা সাধারণত আগুন এবং দুর্ঘটনার শিকার হওয়া হৃদরোগে ক্ষতিকারক স্বাস্থ্য \r\nসমস্যাগুলির মোকাবিলা করার জন্য একটি জরুরি বিভাগ রয়েছে।', 'এটি একটি দীর্ঘ প্রতিষ্ঠিত সত্য যা একটি পাঠক তার লেআউটটি দেখতে যখন পৃষ্ঠাটির পাঠযোগ্য সামগ্রী দ্বারা বিভ্রান্ত হবে।', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_banner`
--

CREATE TABLE `ws_banner` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ws_banner`
--

INSERT INTO `ws_banner` (`id`, `image`, `status`) VALUES
(1, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_basic`
--

CREATE TABLE `ws_basic` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `AppStoreUrl` varchar(255) NOT NULL,
  `twitter_api` text,
  `google_map` text,
  `google_map_api` text NOT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `vimeo` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `dribbble` varchar(100) DEFAULT NULL,
  `skype` varchar(100) DEFAULT NULL,
  `google_plus` varchar(100) DEFAULT NULL,
  `direction` varchar(255) NOT NULL,
  `latitude` float(10,8) NOT NULL,
  `longitude` float(10,8) NOT NULL,
  `map_active` tinyint(4) NOT NULL COMMENT '1=embed, 0=api',
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ws_basic`
--

INSERT INTO `ws_basic` (`id`, `logo`, `favicon`, `email`, `AppStoreUrl`, `twitter_api`, `google_map`, `google_map_api`, `facebook`, `twitter`, `vimeo`, `instagram`, `dribbble`, `skype`, `google_plus`, `direction`, `latitude`, `longitude`, `map_active`, `status`) VALUES
(1, 'assets_web/images/icons/d186838d7f1bb12df6714f83cc66a738.png', 'assets_web/images/icons/3e350d298b8dbb90205f7c123fd65309.png', 'info@clinicamedicabetancourt.com', 'https://play.google.com/store/apps/details?id=com.bdtask.bdtaskhms', '<a class=\"twitter-timeline\" data-lang=\"en\" data-dnt=\"true\" data-link-color=\"#207FDD\" href=\"https://twitter.com/taylorswift13\">Tweets by taylorswift13</a> <script async src=\"//platform.twitter.com/widgets.js\" charset=\"utf-8\"></script>', '<div class=\"mapouter\"><div class=\"gmap_canvas\"><iframe width=\"100%\" height=\"500\" id=\"gmap_canvas\" src=\"https://maps.google.com/maps?q=House%2025%2C%20mannan%20plaza%2C%20khilkhet%2C%20dhaka%2C%20bangladesh&t=&z=13&ie=UTF8&iwloc=&output=embed\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\"></iframe>Werbung: <a href=\"https://www.jetzt-drucken-lassen.de\">jetzt-drucken-lassen.de</a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:100%;}</style></div>', 'AIzaSyBDHeh9zEbXo-YCWJcicXH2VRwVwAf_tq0', 'http://facebook.com/', 'http://', 'http://', 'http://', 'http://', 'http://', 'http://', 'https://goo.gl/maps/79J26yrFfQ8paedh8', -17.80123711, -63.17149734, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_menu`
--

CREATE TABLE `ws_menu` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `parent_id` int(5) NOT NULL,
  `position` int(2) NOT NULL,
  `fixed` tinyint(1) NOT NULL COMMENT '1=fixed and 0=Not fixed',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=active and 0=inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ws_menu`
--

INSERT INTO `ws_menu` (`id`, `name`, `parent_id`, `position`, `fixed`, `status`) VALUES
(1, 'Home', 0, 1, 1, 1),
(2, 'Service', 0, 2, 1, 1),
(3, 'About', 0, 3, 1, 1),
(4, 'Doctor', 0, 4, 1, 1),
(5, 'Department', 0, 5, 1, 1),
(6, 'Contact', 0, 6, 1, 1),
(7, 'Help', 2, 3, 0, 0),
(8, 'Condition & Policy', 2, 2, 0, 1),
(9, 'Patient Login', 0, 7, 1, 1),
(12, 'Support', 14, 1, 0, 1),
(13, 'Patient Role', 2, 1, 0, 1),
(14, 'Others', 0, 7, 0, 1),
(16, 'Inicio', 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_menu_lang`
--

CREATE TABLE `ws_menu_lang` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `language` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ws_menu_lang`
--

INSERT INTO `ws_menu_lang` (`id`, `menu_id`, `title`, `language`) VALUES
(2, 1, 'Home', 'english'),
(3, 1, 'Inicio', 'español'),
(5, 2, 'Services', 'english'),
(6, 2, 'Servicios', 'español'),
(9, 3, 'About Us', 'english'),
(10, 3, 'Nosotros', 'español'),
(13, 4, 'Doctors', 'english'),
(14, 4, 'Doctor', 'español'),
(17, 5, 'Departments', 'english'),
(18, 5, 'Especialidades', 'español'),
(21, 6, 'Contact Us', 'english'),
(22, 6, 'Contacto', 'español'),
(25, 7, 'Help Center', 'english'),
(26, 7, 'Soporte', 'español'),
(29, 8, 'Condition & Policy', 'english'),
(30, 8, 'Politica de Privacidad', 'español'),
(33, 9, 'Patient Login', 'english'),
(34, 9, 'Login de Paciente', 'español'),
(37, 12, 'Supports', 'english'),
(38, 12, 'Soporte', 'español'),
(41, 14, 'Others', 'english'),
(42, 14, 'Otros', 'español');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_news`
--

CREATE TABLE `ws_news` (
  `id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `title` varchar(150) CHARACTER SET utf8 NOT NULL,
  `featured_image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `create_date` date NOT NULL,
  `create_by` int(5) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1=active and 0=inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ws_news`
--

INSERT INTO `ws_news` (`id`, `dept_id`, `title`, `featured_image`, `create_date`, `create_by`, `status`) VALUES
(6, 32, 'Pie Chart Example', '', '2019-01-23', 2, 1),
(7, 26, 'Pregnancy, also known as gestation', '', '2019-01-24', 2, 1),
(8, 31, 'What is cardiology?', '', '2019-01-24', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_news_language`
--

CREATE TABLE `ws_news_language` (
  `id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `language` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ws_news_language`
--

INSERT INTO `ws_news_language` (`id`, `news_id`, `title`, `description`, `language`) VALUES
(5, 6, 'Pie Chart Example', '<h2>Where does it come from?</h2>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'english'),
(6, 6, 'Le morceau standard de Lorem Ipsum utilisé depuis', '<p>D\'où est ce que ça vient?<br>Contrairement à la croyance populaire, Lorem Ipsum n’est pas simplement un texte aléatoire. Il a ses racines dans un morceau de littérature latine classique datant de 45 ans av. Richard McClintock, professeur de latin au Hampden-Sydney College, en Virginie, a examiné l\'un des mots latins les plus obscurs, consectetur, tiré d\'un passage de Lorem Ipsum. Lorem Ipsum provient des sections 1.10.32 et 1.10.33 de \"De Finibus Bonorum et Malorum\" de Cicéron, écrit en 45 av. Ce livre est un traité sur la théorie de l\'éthique, très populaire à la Renaissance. La première ligne de Lorem Ipsum, \"Lorem ipsum dolor sit amet ..\", provient d\'une ligne de la section 1.10.32.</p>\r\n<p>Le morceau standard de Lorem Ipsum utilisé depuis les années 1500 est reproduit ci-dessous pour les personnes intéressées. Les sections 1.10.32 et 1.10.33 de \"de Finibus Bonorum et Malorum\" de Cicéron sont également reproduites dans leur forme originale, accompagnées des versions anglaises de la traduction de 1914 par H. Rackham.</p>', 'french'),
(7, 6, 'مستشفى Bdtask المحدودة', '<p>حيث أنها لا تأتي من؟<br>خلافا للاعتقاد الشائع ، لوريم إيبسوم ليس مجرد نص عشوائي. له جذور في قطعة من الأدب اللاتيني الكلاسيكي من 45 قبل الميلاد ، مما يجعلها أكثر من 2000 سنة. ريتشارد مكلينتوك ، أستاذ اللغة اللاتينية في كلية هامبدن سيدني في ولاية فرجينيا ، بحث عن واحدة من أكثر الكلمات اللاتينية الغامضة ، consectetur ، من ممر لوريم إيبسوم ، وتمر عبر أقوال الكلمة في الأدب الكلاسيكي ، اكتشف المصدر الذي لا يمكن نفيه. يأتي لوريم إيبسوم من القسمين 1.10.32 و 1.10.33 من \"دي فينيبس بونوروم إيه مالوروم\" (The Extremes of Good and Evil) بواسطة شيشرون Cicero ، وكتب في عام 45 قبل الميلاد. هذا الكتاب هو أطروحة عن نظرية الأخلاق ، تحظى بشعبية كبيرة خلال عصر النهضة. السطر الأول من Lorem Ipsum ، \"Lorem ipsum dolor sit amet ..\" ، يأتي من سطر في القسم 1.10.32.</p>\r\n<p>الجزء المعياري من لوريم إيبسوم المستخدم منذ القرن السادس عشر مذكور أدناه للمهتمين. كما يتم إعادة إنتاج القسمين 1.10.32 و 1.10.33 من \"de Finibus Bonorum et Malorum\" بواسطة Cicero في شكلها الأصلي الدقيق ، مصحوبًا بنسخ إنجليزية من ترجمة 1945 التي كتبها H. Rackham.</p>', 'arabic'),
(8, 6, 'জনপ্রিয় বিশ্বাসের বিপরীতে', '<p>এটা কোথা থেকে এসেছে?<br>জনপ্রিয় বিশ্বাসের বিপরীতে, Lorem Ipsum কেবল র্যান্ডম পাঠ্য নয়। এটি 45 বিসি থেকে শাস্ত্রীয় ল্যাটিন সাহিত্যের একটি অংশে শিকড় রয়েছে, এটি 2000 বছরেরও বেশি সময় ধরে তৈরি করেছে। ভার্জিনিয়া হ্যাম্পডেন-সিডনি কলেজের ল্যাটিন প্রফেসর রিচার্ড ম্যাক ক্লিনটক লোরেম ইপ্সামের উত্তরণ থেকে লক্ষণীয় ল্যাটিন শব্দের একটিকে দেখেছিলেন এবং শাস্ত্রীয় সাহিত্যে শব্দটির পাতায় গিয়েছিলেন। লোরম ইম্পসাম 45 খ্রিস্টপূর্বাব্দে লিখিত লিখিত সিসেরোর \"দ্য ফিনিবাস বনোরুম এট মালোরুম\" (দ্য এক্সট্রিমস অব গুড অ্যান্ড ইভিল) এর 1.10.3২ এবং 1.10.33 বিভাগ থেকে এসেছে। এই বইটি নৈতিকতা তত্ত্বের উপর একটি গ্রন্থ, যা রেনেসাঁর সময় খুব জনপ্রিয়। লোরম ইম্পসামের প্রথম লাইন, \"লোরেম ipsum dolor sit amet ..\", ধারা 1.10.32 এর একটি লাইন থেকে এসেছে।</p>\r\n<p>1500 সাল থেকে ব্যবহৃত লোরেম ইম্পসামের স্ট্যান্ডার্ড খণ্ডটি আগ্রহী ব্যক্তিদের জন্য নীচের পুনরুত্পাদন করা হয়। সিসেরোর \"ডি ফিনিবাস বনোরাম এ মালোররম\" থেকে 1.10.3২ এবং 1.10.33 অনুচ্ছেদগুলিকে তাদের সঠিক মূল রূপে পুনঃপ্রবর্তিত করা হয়েছে, যার সাহায্যে 1914 সালের অনুবাদ থেকে এইচ।</p>', 'bangla'),
(9, 7, 'Pregnancy, also known as gestation, is the time during which one or more offspring develops inside a woman.', '<p>professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'english'),
(10, 7, 'গর্ভধারণ, গর্ভধারণের নামেও পরিচিত, সেই সময়ের মধ্যে একটি বা একাধিক বাচ্চা একজন মহিলার ভিতরে বিকাশ হয়।', '<p>ভার্জিনিয়ায় হ্যাম্পডেন-সিডনি কলেজের অধ্যাপক, লোরেম ইপ্সামের উত্তরণ থেকে ল্যাটিন শব্দগুলির আরো একটি অস্পষ্ট ল্যাটিন শব্দের দিকে তাকালেন, এবং শাস্ত্রীয় সাহিত্যে শব্দটির কিতাবগুলির মধ্য দিয়ে যাচ্ছিলেন, সন্দেহভাজন সূত্র আবিষ্কার করেছিলেন। লোরম ইম্পসাম 45 খ্রিস্টপূর্বাব্দে লিখিত লিখিত সিসেরোর \"দ্য ফিনিবাস বনোরুম এট মালোরুম\" (দ্য এক্সট্রিমস অব গুড অ্যান্ড ইভিল) এর 1.10.3২ এবং 1.10.33 বিভাগ থেকে এসেছে। এই বইটি নৈতিকতা তত্ত্বের উপর একটি গ্রন্থ, যা রেনেসাঁর সময় খুব জনপ্রিয়। লোরম ইম্পসামের প্রথম লাইন, \"লোরেম ipsum dolor sit amet ..\", ধারা 1.10.32 এর একটি লাইন থেকে এসেছে।</p>\r\n<p>1500 সাল থেকে ব্যবহৃত লোরেম ইম্পসামের স্ট্যান্ডার্ড খণ্ডটি আগ্রহী ব্যক্তিদের জন্য নীচের পুনরুত্পাদন করা হয়। সিসেরোর \"ডি ফিনিবাস বনোরাম এ মালোররম\" থেকে 1.10.3২ এবং 1.10.33 অনুচ্ছেদগুলিকে তাদের সঠিক মূল রূপে পুনঃপ্রবর্তিত করা হয়েছে, যার সাহায্যে 1914 সালের অনুবাদ থেকে এইচ।</p>', 'bangla'),
(11, 7, 'La grossesse, également appelée gestation, est la période au cours de laquelle un ou plusieurs enfants se développent à l\'intérieur d\'une femme.', '<p>Un professeur du Hampden-Sydney College, en Virginie, a recherché l\'un des mots latins les plus obscurs, consectetur, tiré d\'un passage de Lorem Ipsum. Lorem Ipsum provient des sections 1.10.32 et 1.10.33 de \"De Finibus Bonorum et Malorum\" de Cicéron, écrit en 45 av. Ce livre est un traité sur la théorie de l\'éthique, très populaire à la Renaissance. La première ligne de Lorem Ipsum, \"Lorem ipsum dolor sit amet ..\", provient d\'une ligne de la section 1.10.32.</p>\r\n<p>Le morceau standard de Lorem Ipsum utilisé depuis les années 1500 est reproduit ci-dessous pour les personnes intéressées. Les sections 1.10.32 et 1.10.33 de \"de Finibus Bonorum et Malorum\" de Cicero sont également reproduites dans leur forme originale, accompagnées des versions anglaises de la traduction de 1914 par H. Rackham.</p>', 'french'),
(12, 7, 'الحمل ، المعروف أيضا باسم الحمل ، هو الوقت الذي يتطور فيه ذرية أو أكثر داخل المرأة.', '<p><br>أستاذ في كلية هامبدن سيدني في ولاية فرجينيا ، نظرت واحدة من الكلمات اللاتينية أكثر غموضا ، consectetur ، من مرور لوريم إيبسوم ، والذهاب من خلال الاستشهادات من الكلمة في الأدب الكلاسيكي ، واكتشفت مصدر لا يمكن الاستغناء عنه. يأتي لوريم إيبسوم من القسمين 1.10.32 و 1.10.33 من \"دي فينيبس بونوروم إيه مالوروم\" (The Extremes of Good and Evil) بواسطة شيشرون Cicero ، وكتب في عام 45 قبل الميلاد. هذا الكتاب هو أطروحة عن نظرية الأخلاق ، تحظى بشعبية كبيرة خلال عصر النهضة. السطر الأول من Lorem Ipsum ، \"Lorem ipsum dolor sit amet ..\" ، يأتي من سطر في القسم 1.10.32.</p>\r\n<p>الجزء المعياري من لوريم إيبسوم المستخدم منذ القرن السادس عشر مذكور أدناه للمهتمين. كما يتم إعادة إنتاج القسمين 1.10.32 و 1.10.33 من \"de Finibus Bonorum et Malorum\" بواسطة Cicero في شكلها الأصلي الدقيق ، مصحوبًا بنسخ إنجليزية من ترجمة 1945 التي كتبها H. Rackham.</p>', 'arabic'),
(13, 8, 'What is cardiology?', '<p>Cardiologists are doctors who specialize in diagnosing and treating diseases or conditions of the heart and blood vessels—the cardiovascular system. You might also visit a cardiologist so you can learn about your risk factors for heart disease and find out what measures you can take for better heart health. Texas Heart Institute cardiologists are listed in the professional staff directory.</p>\r\n<p>When you are dealing with a complex health condition like heart disease, it is important that you find the right match between you and your specialist. A diagnosis of heart or vascular disease often begins with your primary care doctor, who then refers you to a cardiologist. The cardiologist evaluates your symptoms and your medical history and may recommend tests for a more definite diagnosis. Then, your cardiologist decides if your condition can be managed under his or her care using medicines or other available treatments. If your cardiologist decides that you need surgery, he or she refers you to a cardiovascular surgeon, who specializes in operations on the heart, lungs, and blood vessels. You remain under the care of your cardiologist even when you are referred to other specialists.</p>', 'english'),
(14, 8, 'ما هو أمراض القلب؟', '<p>أطباء القلب هم أطباء متخصصون في تشخيص ومعالجة الأمراض أو أمراض القلب والأوعية الدموية - نظام القلب والأوعية الدموية. يمكنك أيضا زيارة طبيب القلب حتى تتمكن من معرفة عوامل الخطر الخاصة بك لأمراض القلب ومعرفة التدابير التي يمكن اتخاذها لتحسين صحة القلب. يتم سرد أمراض القلب معهد القلب تكساس في دليل الموظفين الفنيين.</p>\r\n<p>عندما تتعامل مع حالة صحية معقدة مثل أمراض القلب ، من المهم أن تجد المطابقة الصحيحة بينك وبين أخصائيك. غالبًا ما يبدأ تشخيص أمراض القلب أو الأوعية الدموية بطبيب الرعاية الأولية الذي يحيلك إلى طبيب القلب. يقوم طبيب القلب بتقييم الأعراض والتاريخ الطبي الخاص بك وقد يوصي بإجراء اختبارات للتشخيص أكثر تحديدًا. بعد ذلك ، يقرر طبيب القلب إذا كان من الممكن إدارة حالتك تحت رعايته باستخدام الأدوية أو العلاجات الأخرى المتاحة. إذا قرر طبيب القلب الخاص بك أنك بحاجة لعملية جراحية ، فإنه يحيلك إلى جراح القلب والأوعية الدموية ، الذي يتخصص في العمليات على القلب والرئتين والأوعية الدموية. تظل تحت رعاية طبيب القلب حتى عندما تتم إحالتك إلى أخصائيين آخرين.</p>', 'arabic'),
(15, 8, 'কার্ডিওলজি কি?', '<p>কার্ডিওলোজিস্টরা হ\'ল হৃদরোগ ও রক্তবাহী জাহাজের রোগ বা অবস্থার নির্ণয় ও চিকিত্সার ক্ষেত্রে বিশেষজ্ঞ যারা কার্ডিওভাসকুলার সিস্টেম। আপনি কার্ডিওলজিস্টেরও পরিদর্শন করতে পারেন যাতে হৃদরোগের জন্য আপনার ঝুঁকির কারণগুলি জানতে পারেন এবং হৃদরোগের জন্য আপনি কোন পদক্ষেপ গ্রহণ করতে পারেন তা জানতে পারেন। টেক্সাস হার্ট ইনস্টিটিউট কার্ডিওলজিস্ট পেশাদার কর্মীদের ডিরেক্টরি তালিকাভুক্ত করা হয়।</p>\r\n<p>আপনি যখন হৃদরোগের মতো জটিল স্বাস্থ্যের অবস্থা নিয়ে কাজ করছেন তখন আপনার এবং আপনার বিশেষজ্ঞের মধ্যে সঠিক মিল খুঁজে পাওয়া গুরুত্বপূর্ণ। হার্ট বা ভাস্কুলার রোগের নির্ণয় প্রায়ই আপনার প্রাথমিক যত্ন ডাক্তারের সাথে শুরু হয়, যিনি তখন আপনাকে কার্ডিওলোজিস্ট বলে উল্লেখ করেন। কার্ডিওলজিস্ট আপনার লক্ষণগুলি এবং আপনার চিকিৎসা ইতিহাস মূল্যায়ন করে এবং আরও নির্দিষ্ট নির্ণয়ের জন্য পরীক্ষাগুলি সুপারিশ করতে পারে। তারপরে, আপনার কার্ডিওলোজিস্ট সিদ্ধান্ত নেয় যে ওষুধগুলি বা অন্যান্য উপলব্ধ চিকিত্সাগুলি ব্যবহার করে আপনার অবস্থা তার যত্নের অধীনে পরিচালিত হতে পারে কিনা। আপনার হৃদরোগ বিশেষজ্ঞ যদি সিদ্ধান্ত নেয় যে অস্ত্রোপচারের প্রয়োজন হয় তবে সে আপনাকে কার্ডিওভাসকুলার সার্জনকে নির্দেশ করে, যিনি হৃদয়, ফুসফুস এবং রক্তবাহী পদার্থের অপারেশনের জন্য বিশেষজ্ঞ। আপনি অন্যান্য বিশেষজ্ঞদের উল্লেখ করা হয়, এমনকি যখন আপনি আপনার হৃদরোগ বিশেষজ্ঞের তত্ত্বাবধানে থাকা।</p>', 'bangla'),
(16, 8, 'Qu\'est ce que la cardiologie?', '<p>Les cardiologues sont des médecins spécialisés dans le diagnostic et le traitement de maladies ou d\'affections du cœur et des vaisseaux sanguins - le système cardiovasculaire. Vous pouvez également consulter un cardiologue afin de connaître vos facteurs de risque de maladie cardiaque et de savoir quelles mesures vous pouvez prendre pour améliorer votre santé cardiaque. Les cardiologues du Texas Heart Institute figurent dans le répertoire du personnel professionnel.</p>\r\n<p>Lorsque vous traitez avec un problème de santé complexe comme une maladie cardiaque, il est important que vous trouviez le partenaire idéal entre vous et votre spécialiste. Un diagnostic de maladie cardiaque ou vasculaire commence souvent par votre médecin de famille, qui vous oriente ensuite vers un cardiologue. Le cardiologue évalue vos symptômes et vos antécédents médicaux et peut vous recommander des tests pour un diagnostic plus précis. Ensuite, votre cardiologue décide si votre état peut être soigné sous ses soins à l\'aide de médicaments ou d\'autres traitements disponibles. Si votre cardiologue décide que vous avez besoin d\'une intervention chirurgicale, il vous dirigera vers un chirurgien cardiovasculaire spécialisé dans les opérations du cœur, des poumons et des vaisseaux sanguins. Vous restez sous les soins de votre cardiologue même lorsque vous êtes dirigé vers d\'autres spécialistes.</p>', 'french');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_page_content`
--

CREATE TABLE `ws_page_content` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `url` varchar(150) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `featured_image` varchar(250) NOT NULL,
  `create_date` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ws_page_content`
--

INSERT INTO `ws_page_content` (`id`, `menu_id`, `url`, `title`, `description`, `featured_image`, `create_date`, `status`) VALUES
(1, 1, 'home', '', '', '', '2018-11-27', 1),
(2, 2, 'services', '', '', '', '2018-11-27', 1),
(3, 3, 'about', '', '', '', '2018-11-27', 1),
(4, 4, 'doctors', '', '', '', '2018-11-27', 1),
(5, 5, 'departments', '', '', '', '2018-11-27', 1),
(6, 6, 'contact', '', '', '', '2018-11-27', 1),
(8, 9, 'patient_login', 'Patient Login', '<p>fdgdg</p>', '', '2018-11-28', 1),
(34, 14, 'page', 'CLinica Medica Betancourt', '<p>Clinica Medica Betancourte</p>', '', '2022-04-18', 1),
(35, 12, 'page', 'We are supported our clients 24 Hours', '<p>We are supported our clients 24 Hours</p>\r\n<p>We are supported our clients 24 Hours</p>\r\n<p>We are supported our clients 24 Hours</p>\r\n<p>We are supported our clients 24 Hours</p>\r\n<p>We are supported our clients 24 Hours</p>\r\n<p> </p>', '', '2018-12-20', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_partner`
--

CREATE TABLE `ws_partner` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `url` varchar(120) CHARACTER SET utf8 NOT NULL,
  `image` varchar(200) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ws_partner`
--

INSERT INTO `ws_partner` (`id`, `name`, `url`, `image`, `status`) VALUES
(1, 'Apollo Hospital', 'https://apollo.com/', '', 1),
(2, 'BDTask Limited', 'https://bdtask.com/', '', 1),
(3, 'Dhaka Medical College', 'www.dhakamedical.com', '', 1),
(4, 'Test', 'https://testing.com/', '', 1),
(5, 'Medicine', 'www.Medicine.com', '', 1),
(6, 'Pharmacy', 'www.Pharmacy.com', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_section`
--

CREATE TABLE `ws_section` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` text,
  `featured_image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ws_section`
--

INSERT INTO `ws_section` (`id`, `name`, `title`, `description`, `featured_image`) VALUES
(1, 'about', 'About Us', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', ''),
(2, 'contact', 'Contact Us', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', ''),
(3, 'department', 'Department List', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', ''),
(4, 'doctor', 'Doctor List', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', ''),
(5, 'timetable', 'Doctors Timetable', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', ''),
(6, 'news', 'Latest News', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', ''),
(7, 'benefits', 'Our Benefits', 'Qualified Staff of Doctors\r\nSave Your Money and Time with us\r\n24x7 Emergency service\r\nFeel Like you are at Home Services\r\nFeel Like you are at Home Services', ''),
(8, 'service', 'Our Services', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, ', ''),
(9, 'team', 'Meet our (awesome) team', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', ''),
(10, 'portfolio', 'Jobs & Education', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', NULL),
(11, 'working_hours', 'Our Working Hours', 'It is a long established fact that a reader will.', NULL),
(12, 'signin', 'Try Hospital+ for free', 'We won\'t post anything without your permission and your personal details are kept private', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_section_lang`
--

CREATE TABLE `ws_section_lang` (
  `id` int(11) NOT NULL,
  `language` varchar(15) NOT NULL,
  `section_id` int(6) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ws_section_lang`
--

INSERT INTO `ws_section_lang` (`id`, `language`, `section_id`, `title`, `description`) VALUES
(1, 'english', 1, 'About Us', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(2, 'bangla', 1, 'আমাদের সম্পর্কে', 'এটি একটি দীর্ঘ প্রতিষ্ঠিত সত্য যা একটি পাঠক তার লেআউটটি দেখতে যখন পৃষ্ঠাটির পাঠযোগ্য সামগ্রী দ্বারা বিভ্রান্ত হবে।'),
(3, 'arabic', 1, 'معلومات عنا', 'إنها حقيقة راسخة أن القارئ سوف يصرفه محتوى مقروء للصفحة عندما ينظر إلى تخطيطه.'),
(4, 'french', 1, 'À propos de nous', 'C\'est un fait établi depuis longtemps qu\'un lecteur sera distrait par le contenu lisible d\'une page lorsqu\'il examinera sa mise en page.'),
(5, 'english', 7, 'Our Benefits', 'Qualified Staff of Doctors\r\nSave Your Money and Time with us\r\n24x7 Emergency service\r\nFeel Like you are at Home Services\r\nFeel Like you are at Home Services'),
(6, 'bangla', 7, 'আমাদের উপকারিতা', 'ডাক্তারের যোগ্য স্টাফ\r\nআমাদের সাথে আপনার টাকা এবং সময় সংরক্ষণ করুন\r\n24x7 জরুরী সেবা\r\nমনে হচ্ছে আপনি হোম সার্ভিসেসে আছেন\r\nমনে হচ্ছে আপনি হোম সার্ভিসেসে আছেন'),
(7, 'arabic', 7, 'فوائدنا', 'طاقم مؤهل من الأطباء\r\nحفظ أموالك والوقت معنا\r\nخدمة الطوارئ على مدار الساعة\r\nأشعر وكأنك في الخدمات المنزلية\r\nأشعر وكأنك في الخدمات المنزلية'),
(8, 'french', 7, 'Nos avantages', 'Personnel qualifié de médecins\r\nÉconomisez votre argent et votre temps avec nous\r\nService d\'urgence 24x7\r\nSentez-vous comme chez vous\r\nSentez-vous comme chez vous'),
(9, 'english', 2, 'Contact Us', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(10, 'french', 2, 'Contactez nous', 'C\'est un fait établi depuis longtemps qu\'un lecteur sera distrait par le contenu lisible d\'une page lorsqu\'il examinera sa mise en page.'),
(11, 'arabic', 2, 'اتصل بنا', 'إنها حقيقة راسخة أن القارئ سوف يصرفه محتوى مقروء للصفحة عندما ينظر إلى تخطيطه.'),
(12, 'bangla', 2, 'আমাদের সাথে যোগাযোগ করুন', 'এটি একটি দীর্ঘ প্রতিষ্ঠিত সত্য যা একটি পাঠক তার লেআউটটি দেখতে যখন পৃষ্ঠাটির পাঠযোগ্য সামগ্রী দ্বারা বিভ্রান্ত হবে।'),
(13, 'french', 3, 'Liste des départements', 'C\'est un fait établi depuis longtemps qu\'un lecteur sera distrait par le contenu lisible d\'une page lorsqu\'il examinera sa mise en page.'),
(14, 'arabic', 3, 'قائمة الإدارات', 'إنها حقيقة راسخة أن القارئ سوف يصرفه محتوى مقروء للصفحة عندما ينظر إلى تخطيطه.'),
(15, 'bangla', 3, 'বিভাগ তালিকা', 'এটি একটি দীর্ঘ প্রতিষ্ঠিত সত্য যা একটি পাঠক তার লেআউটটি দেখতে যখন পৃষ্ঠাটির পাঠযোগ্য সামগ্রী দ্বারা বিভ্রান্ত হবে।'),
(16, 'english', 3, 'Department List', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(17, 'english', 4, 'Doctor List', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(18, 'french', 4, 'liste de docteur', 'C\'est un fait établi depuis longtemps qu\'un lecteur sera distrait par le contenu lisible d\'une page lorsqu\'il examinera sa mise en page.'),
(19, 'bangla', 4, 'ডাক্তার তালিকা', 'এটি একটি দীর্ঘ প্রতিষ্ঠিত সত্য যা একটি পাঠক তার লেআউটটি দেখতে যখন পৃষ্ঠাটির পাঠযোগ্য সামগ্রী দ্বারা বিভ্রান্ত হবে।'),
(20, 'arabic', 4, 'قائمة الطبيب', 'إنها حقيقة راسخة أن القارئ سوف يصرفه محتوى مقروء للصفحة عندما ينظر إلى تخطيطه.'),
(21, 'english', 6, 'Latest News', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(22, 'bangla', 6, 'সর্বশেষ সংবাদ', 'এটি একটি দীর্ঘ প্রতিষ্ঠিত সত্য যা একটি পাঠক তার লেআউটটি দেখতে যখন পৃষ্ঠাটির পাঠযোগ্য সামগ্রী দ্বারা বিভ্রান্ত হবে।'),
(23, 'arabic', 6, 'أحدث الأخبار', 'إنها حقيقة راسخة أن القارئ سوف يصرفه محتوى مقروء للصفحة عندما ينظر إلى تخطيطه.'),
(24, 'french', 6, 'Dernières nouvelles', 'C\'est un fait établi depuis longtemps qu\'un lecteur sera distrait par le contenu lisible d\'une page lorsqu\'il examinera sa mise en page.'),
(25, 'english', 10, 'Jobs & Education', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(26, 'bangla', 10, 'চাকরি ও শিক্ষা', 'এটি একটি দীর্ঘ প্রতিষ্ঠিত সত্য যা একটি পাঠক তার লেআউটটি দেখতে যখন পৃষ্ঠাটির পাঠযোগ্য সামগ্রী দ্বারা বিভ্রান্ত হবে।'),
(27, 'arabic', 10, 'الوظائف والتعليم', 'إنها حقيقة راسخة أن القارئ سوف يصرفه محتوى مقروء للصفحة عندما ينظر إلى تخطيطه.'),
(28, 'french', 10, 'Emplois & Education', 'C\'est un fait établi depuis longtemps qu\'un lecteur sera distrait par le contenu lisible d\'une page lorsqu\'il examinera sa mise en page.'),
(29, 'english', 8, 'Our Services', 'The NWT Health Care Plan covers the cost of medically necessary hospital services, provided at a hospital, on an inpatient or outpatient basis within Canada. '),
(30, 'bangla', 8, 'আমাদের সেবাসমূহ', 'এনডব্লিউটিএ হেলথ কেয়ার প্ল্যানটি কানাডার অভ্যন্তরে একটি ইনসেন্টেন্ট বা আউটপেইটিভ ভিত্তিতে হাসপাতালে দেওয়া ঔষধগত প্রয়োজনীয় হাসপাতালের খরচগুলি জুড়ে দেয়।'),
(31, 'arabic', 8, 'خدماتنا', 'تغطي خطة الرعاية الصحية بشبكة NWT تكلفة خدمات المستشفيات الضرورية طبياً ، والتي يتم توفيرها في المستشفى ، على أساس المرضى الداخليين أو خارج المستشفى داخل كندا.'),
(32, 'french', 8, 'Nos services', 'Le régime de soins de santé des Territoires du Nord-Ouest couvre le coût des services hospitaliers médicalement nécessaires, en milieu hospitalier ou en consultation externe au Canada.'),
(33, 'english', 9, 'Meet our (awesome) team', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(34, 'french', 9, 'Rencontrez notre (génial) équipe', 'C\'est un fait établi depuis longtemps qu\'un lecteur sera distrait par le contenu lisible d\'une page lorsqu\'il examinera sa mise en page.'),
(35, 'arabic', 9, 'تعرف على فريقنا (الرائع)', 'إنها حقيقة راسخة أن القارئ سوف يصرفه محتوى مقروء للصفحة عندما ينظر إلى تخطيطه.'),
(36, 'bangla', 9, 'আমাদের এক্সপার্টদের সাথে দেখা করুন ', 'এটি একটি দীর্ঘ প্রতিষ্ঠিত সত্য যা একটি পাঠক তার লেআউটটি দেখতে যখন পৃষ্ঠাটির পাঠযোগ্য সামগ্রী দ্বারা বিভ্রান্ত হবে।'),
(37, 'french', 5, 'Horaires des médecins', 'Vous trouverez ci-dessous des conseils qui vous aideront à planifier votre rendez-vous avec un médecin ou une infirmière de votre choix.'),
(38, 'english', 5, 'Doctors Timetable', 'The following is for guidance only to help you plan your appointment with a preferred doctor or nurse.'),
(39, 'arabic', 5, 'جدول الأطباء', 'ما يلي هو للإرشاد فقط لمساعدتك في تخطيط موعدك مع طبيب أو ممرضة مفضلة.'),
(40, 'bangla', 5, 'ডাক্তারের সময়সীমা', 'নিচের দিক নির্দেশনা শুধুমাত্র আপনাকে পছন্দসই ডাক্তার বা নার্সের সাথে আপনার অ্যাপয়েন্টমেন্ট পরিকল্পনা করতে সহায়তা করার জন্য।'),
(41, 'english', 11, 'Our Working Hours', 'It is a long established fact that a reader will.'),
(42, 'french', 11, 'Nos heures de travail', 'C\'est un fait établi depuis longtemps qu\'un lecteur le fera.'),
(43, 'arabic', 11, 'ساعات العمل لدينا', 'إنها حقيقة ثابتة منذ زمن طويل أن القارئ سوف.'),
(44, 'bangla', 11, 'আমাদের কাজের ঘন্টা', 'এটি একটি দীর্ঘ প্রতিষ্ঠিত সত্য যে একটি পাঠক হবে।');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_service`
--

CREATE TABLE `ws_service` (
  `id` int(11) NOT NULL,
  `language` varchar(15) NOT NULL,
  `name` varchar(20) NOT NULL,
  `icon_image` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text,
  `position` int(2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `date` date DEFAULT NULL,
  `is_parent` int(11) NOT NULL COMMENT '0=Parent'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_setting`
--

CREATE TABLE `ws_setting` (
  `id` int(11) NOT NULL,
  `language` varchar(15) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `meta_tag` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `phone` varchar(60) DEFAULT NULL,
  `text` varchar(25) NOT NULL,
  `fax` varchar(25) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `closed_day` varchar(30) NOT NULL,
  `open_day` varchar(30) NOT NULL,
  `copyright_text` varchar(255) DEFAULT NULL,
  `working_hour` text NOT NULL,
  `isQRCode` tinyint(1) NOT NULL COMMENT '1=active and 0=inactive',
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ws_setting`
--

INSERT INTO `ws_setting` (`id`, `language`, `title`, `description`, `meta_tag`, `meta_keyword`, `phone`, `text`, `fax`, `address`, `closed_day`, `open_day`, `copyright_text`, `working_hour`, `isQRCode`, `status`) VALUES
(1, 'español', 'Clinica Médica Betancourt', 'La Clinica Médica Bentancourt cuenta con una hospitalización equipada con la última tecnología y adaptación a las necesidades del paciente.', 'La Clinica Médica Bentancourt cuenta con una hospitalización equipada con la última tecnología y adaptación a las necesidades del paciente.', '                                 Hospital, Appointment, System, \r\nHospital Appointment,Demo, Appointment', '+591 3 3590011', '', '', 'Zoillo Flores, Barrio El Trompillo', 'Domingo', 'Lunes a Viernes 09:00 a 19:00', '<p>Copyright &copy; 2016- Desarrollado por&nbsp;<a title=\"Criative Digital\" href=\"https://criativedigital.com\">Criative Digital</a>.</p>', '<table class=\"table\">\r\n                        <tbody>\r\n                            <tr>\r\n                                <td>Lunes - Viernes</td>\r\n                                <td class=\"text-right\">09.00-19.00</td>\r\n                            </tr>\r\n                            <tr>\r\n                                <td>Sabado</td>\r\n                                <td class=\"text-right\">09.00-12.00</td>\r\n                            </tr>\r\n                            <tr>\r\n                                <td>Domingo</td>\r\n                                <td class=\"text-right\">Cerrado</td>\r\n                            </tr>\r\n                            <tr>\r\n                                <td>Emergencia</td>\r\n                                <td class=\"text-right\">24 Hrs</td>\r\n                            </tr>\r\n                        </tbody>\r\n                    </table>', 1, 1),
(6, 'english', 'Clinica Medica Betancourt', 'Clinica', 'Clinica', 'Clinica ', '123545', 'Teste de nova Fonte', '', 'Zoillo Flores', 'Domingo', 'Lunes a Viernes 09:00 a 19:00', '<p>a</p>', 'a', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_slider`
--

CREATE TABLE `ws_slider` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `url` varchar(120) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ws_slider`
--

INSERT INTO `ws_slider` (`id`, `title`, `url`, `image`, `position`, `status`) VALUES
(1, 'A Hospital Information System &#40;HIS&#41; basically is a synonym ', 'https://stackoverflow.com/', '', 3, 1),
(2, 'Generally, the system should be safe and secure from a data management', 'https://stackoverflow.com/', '', 2, 1),
(5, 'Introducing a new information system', 'https://www.usahealthsystem.com/usacwh', '', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_slider_lang`
--

CREATE TABLE `ws_slider_lang` (
  `id` int(11) NOT NULL,
  `slider_id` int(5) NOT NULL,
  `language` varchar(15) NOT NULL,
  `title` varchar(120) NOT NULL,
  `subtitle` varchar(150) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ws_slider_lang`
--

INSERT INTO `ws_slider_lang` (`id`, `slider_id`, `language`, `title`, `subtitle`, `description`) VALUES
(1, 1, 'english', 'A Hospital Information System &#40;HIS&#41; basically  is a synonym for information management ', 'A Hospital Information System &#40;HIS&#41; basically  is a synonym for information management', '<p>A Hospital Information System (HIS) basically&nbsp; is a synonym for information management system at use in hospitals. Hospitals generate a wealth of data round the clock, 365 days a year, all of which needs to be well managed to ensure efficient functioning. Patients visit such establishments for outpatient care, in an emergency, or get admitted for either a short stay (a few hours) or long in duration (that may sometimes be indefinite). While in the past, the important modules of an HIS tended to be those that dealt with revenue management aspects, the recent trend sees a growing emphasis on improving overall efficiency and clinical management. It must be noted here that while some modules are required by all clinical establishments, requirement for others depend on the size of and specialities covered by a particular establishment.</p>'),
(2, 1, 'español', 'Existimos para tu Salud', '.', '<p>.</p>'),
(3, 1, 'arabic', ' هو في الأساس مرادف لنظام إدارة المعلومات المستخدم في المستشفيات. تولد المستشفيات ثروة من البيانات ع', ' هو في الأساس مرادف لنظام إدارة المعلومات المستخدم في المستشفيات. تولد المستشفيات ثروة من البيانات ع', '<p>نظام معلومات المستشفى (HIS) هو في الأساس مرادف لنظام إدارة المعلومات المستخدم في المستشفيات. تولد المستشفيات ثروة من البيانات على مدار الساعة ، 365 يومًا في السنة ، وكلها بحاجة إلى إدارة جيدة لضمان الأداء الفعال. ﯾزور اﻟﻣرﺿﯽ ھذه اﻟﻣؤﺳﺳﺎت ﻟﻟرﻋﺎﯾﺔ اﻟﺧﺎرﺟﯾﺔ ، أو ﻓﻲ ﺣﺎﻟﺔ اﻟطوارئ ، أو ﯾﺟب أن ﯾﺣﺻﻟوا ﻋﻟﯽ إﻗﺎﻣﺔ ﻗﺻﯾرة (ﺳﺎﻋﺎت ﻗﻟﯾﻟﺔ) أو طوﯾﻟﺔ اﻟﻣدة (اﻟﺗﻲ ﻗد ﺗﮐون ﻓﻲ ﺑﻌض اﻷﺣﯾﺎن ﻏﯾر ﻣﺣددة). بينما في الماضي ، كانت الوحدات الهامة في نظام HIS هي تلك التي تعاملت مع جوانب إدارة الإيرادات ، إلا أن الاتجاه الأخير يرى تركيزًا متزايدًا على تحسين الكفاءة الكلية والإدارة السريرية. وتجدر الإشارة هنا إلى أنه في حين أن بعض الوحدات الطبية مطلوبة من قبل جميع المؤسسات ، فإن متطلبات الآخرين تعتمد على حجم وتخصصات مؤسسة معينة.</p>'),
(4, 1, 'french', 'Un système d\'information hospitalier (HIS) est fondamentalement synonyme de système de', 'Un système d\'information hospitalier (HIS) est fondamentalement synonyme de système de', '<p>Un syst&egrave;me d\'information hospitalier (HIS) est fondamentalement synonyme de syst&egrave;me de gestion de l\'information utilis&eacute; dans les h&ocirc;pitaux. Les h&ocirc;pitaux g&eacute;n&egrave;rent une multitude de donn&eacute;es 24 heures sur 24, 365 jours par an, qui doivent tous &ecirc;tre bien g&eacute;r&eacute;s pour assurer un fonctionnement efficace. Les patients se rendent dans ces &eacute;tablissements pour des soins ambulatoires, en cas d\'urgence ou sont admis pour un s&eacute;jour de courte dur&eacute;e (quelques heures) ou de longue dur&eacute;e (parfois avec une dur&eacute;e ind&eacute;termin&eacute;e). Alors que par le pass&eacute;, les modules importants d\'un syst&egrave;me d\'information de sant&eacute; &eacute;taient g&eacute;n&eacute;ralement ceux qui traitaient de la gestion des revenus, la tendance r&eacute;cente met de plus en plus l\'accent sur l\'am&eacute;lioration de l\'efficacit&eacute; globale et de la gestion clinique. Il convient de noter ici que, si certains modules sont requis par tous les &eacute;tablissements cliniques, ceux-ci d&eacute;pendent de la taille et des sp&eacute;cialit&eacute;s couvertes par un &eacute;tablissement donn&eacute;.</p>'),
(5, 2, 'english', 'General Requirements– An Overview', 'Generally, the system should be safe and secure from a data management point-of-view.', '<p>General Requirements&ndash; An Overview<br />Generally, the system should be safe and secure from a data management point-of-view. Highly sensitive data is handled by such systems and hence the comfort-level related to privacy and safety issues need to be addressed aggressively. The system should ensure efficient flow of information that provides interdepartmental support to the establishment, functional and process integration, be adaptable and flexible from a user perspective, and last, but not the least, be standards-based to ensure interoperability in terms of syntactic, semantic and process.</p>'),
(6, 2, 'french', 'Exigences générales - Un aperçu', 'En règle générale, le système doit être sûr et sécurisé du point de vue de la gestion des données.', '<p>Exigences g&eacute;n&eacute;rales - Un aper&ccedil;u<br />En r&egrave;gle g&eacute;n&eacute;rale, le syst&egrave;me doit &ecirc;tre s&ucirc;r et s&eacute;curis&eacute; du point de vue de la gestion des donn&eacute;es. Les donn&eacute;es hautement sensibles sont trait&eacute;es par de tels syst&egrave;mes et par cons&eacute;quent, le niveau de confort li&eacute; aux questions de confidentialit&eacute; et de s&eacute;curit&eacute; doit &ecirc;tre trait&eacute; de mani&egrave;re agressive. Le syst&egrave;me doit assurer une circulation efficace de l&rsquo;information qui assure un soutien interminist&eacute;riel &agrave; l&rsquo;&eacute;tablissement, une int&eacute;gration fonctionnelle et des processus, &ecirc;tre adaptable et flexible du point de vue de l&rsquo;utilisateur, et enfin et surtout, &ecirc;tre fond&eacute; sur des normes garantissant l&rsquo;interop&eacute;rabilit&eacute; en termes s&eacute;mantique et processus.</p>'),
(7, 2, 'arabic', 'المتطلبات العامة - نظرة عامة', 'بشكل عام ، يجب أن يكون النظام آمنًا ومأمونًا من وجهة نظر إدارة البيانات.', '<p>المتطلبات العامة - نظرة عامة<br />بشكل عام ، يجب أن يكون النظام آمنًا ومأمونًا من وجهة نظر إدارة البيانات. يتم التعامل مع البيانات الحساسة للغاية من قبل هذه الأنظمة ومن ثم يجب التعامل مع مستوى الراحة المتعلق بقضايا الخصوصية والسلامة بشكل مكثف. ينبغي أن يضمن النظام التدفق الفعال للمعلومات التي توفر الدعم المشترك بين الإدارات للتأسيس ، والتكامل الوظيفي والعملي ، وتكون قابلة للتكيف ومرنة من وجهة نظر المستخدم ، وأخيراً ، وليس أقلها ، تعتمد على المعايير لضمان قابلية التشغيل البيني من حيث التركيب النحوي ، الدلالي وعملية.</p>'),
(8, 2, 'bangla', 'সাধারণ প্রয়োজন - একটি সংক্ষিপ্ত বিবরণ', 'সাধারণত, সিস্টেমটি ডেটা ম্যানেজমেন্ট পয়েন্ট অফ ভিউ থেকে নিরাপদ এবং সুরক্ষিত হওয়া উচিত।', '<p>সাধারণ প্রয়োজন - একটি সংক্ষিপ্ত বিবরণ<br />সাধারণত, সিস্টেমটি ডেটা ম্যানেজমেন্ট পয়েন্ট অফ ভিউ থেকে নিরাপদ এবং সুরক্ষিত হওয়া উচিত। অত্যন্ত সংবেদনশীল তথ্য যেমন সিস্টেম দ্বারা পরিচালিত হয় এবং অতএব গোপনীয়তা এবং নিরাপত্তা বিষয়গুলির সাথে সান্ত্বনা স্তরের আক্রমণাত্মকভাবে মোকাবেলা করা প্রয়োজন। সিস্টেমটি কার্যকর দক্ষতা প্রবাহ নিশ্চিত করবে যা সংস্থান, কার্যকরী এবং প্রক্রিয়া ইন্টিগ্রেশনকে আন্তঃবিভাগীয় সহায়তা প্রদান করে, ব্যবহারকারীর দৃষ্টিকোণ থেকে অভিযোজিত এবং নমনীয় হতে পারে এবং অন্তত নয়, অন্তত, সিন্ট্যাকটিকের ক্ষেত্রে আন্তঃব্যবস্থা নিশ্চিত করার জন্য মান-ভিত্তিক হতে পারে। শব্দার্থিক এবং প্রক্রিয়া।</p>'),
(9, 5, 'bangla', 'একটি নতুন তথ্য সিস্টেম চালু করা হচ্ছে', 'যেখানে একটি ইতিমধ্যেই রয়েছে এবং সক্রিয়ভাবে ব্যবহৃত হচ্ছে', '<p>একটি নতুন তথ্য সিস্টেম চালু করা হচ্ছে, যেখানে একটি ইতিমধ্যেই রয়েছে এবং সক্রিয়ভাবে ব্যবহৃত হচ্ছে, পরিবর্তন ব্যবস্থার একটি নির্দিষ্ট ডিগ্রী প্রয়োজন কারণ এই নতুন সিস্টেমটি কাজ করার একটি \'নতুন উপায়\' প্রতিফলিত করে।</p>'),
(10, 5, 'english', 'Introducing a new information system', 'where one is already in place and is actively used', '<p>Introducing a new information system, where one is already in place and is actively used, requires a certain degree of change management as this new system reflects a &lsquo;new way&rsquo; of working.</p>'),
(11, 5, 'arabic', 'يتطلب تقديم نظام معلومات جديد ', 'حيث يوجد بالفعل موضع التطبيق ويستخدم بنشاط', '<p>يتطلب تقديم نظام معلومات جديد ، حيث يوجد بالفعل موضع التطبيق ويستخدم بنشاط ، درجة معينة من إدارة التغيير حيث يعكس هذا النظام الجديد \"طريقة جديدة\" للعمل.</p>'),
(12, 5, 'french', 'L’introduction d’un nouveau système d’information', ' là où un système existe déjà et est activement utilisé', '<p>L&rsquo;introduction d&rsquo;un nouveau syst&egrave;me d&rsquo;information, l&agrave; o&ugrave; un syst&egrave;me existe d&eacute;j&agrave; et est activement utilis&eacute;, n&eacute;cessite un certain degr&eacute; de gestion du changement, car ce nouveau syst&egrave;me refl&egrave;te une &laquo;nouvelle fa&ccedil;on de travailler&raquo;.</p>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_testimonial`
--

CREATE TABLE `ws_testimonial` (
  `id` int(6) NOT NULL,
  `author_name` varchar(35) NOT NULL,
  `url` varchar(120) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ws_testimonial`
--

INSERT INTO `ws_testimonial` (`id`, `author_name`, `url`, `image`, `status`) VALUES
(1, 'William John', 'www.bdtask.com', '', 1),
(2, 'Ashraf Rahman', 'www.bdtask.com', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ws_testimonial_lang`
--

CREATE TABLE `ws_testimonial_lang` (
  `id` int(11) NOT NULL,
  `tstml_id` int(11) NOT NULL,
  `language` varchar(15) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `quotation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ws_testimonial_lang`
--

INSERT INTO `ws_testimonial_lang` (`id`, `tstml_id`, `language`, `title`, `author_name`, `quotation`) VALUES
(1, 2, 'english', '`BDtask@CEO`', 'Ashraf Rahman', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever'),
(2, 2, 'arabic', 'BDtask@CEO', 'Ashraf Rahman', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s'),
(3, 1, 'english', 'Hospital@FCS', 'William John', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acc_account_name`
--
ALTER TABLE `acc_account_name`
  ADD PRIMARY KEY (`account_id`);

--
-- Indices de la tabla `acc_coa`
--
ALTER TABLE `acc_coa`
  ADD PRIMARY KEY (`HeadName`);

--
-- Indices de la tabla `acc_transaction`
--
ALTER TABLE `acc_transaction`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indices de la tabla `acm_account`
--
ALTER TABLE `acm_account`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `acm_invoice`
--
ALTER TABLE `acm_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `acm_invoice_details`
--
ALTER TABLE `acm_invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `acm_payment`
--
ALTER TABLE `acm_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `acn_account_transaction`
--
ALTER TABLE `acn_account_transaction`
  ADD PRIMARY KEY (`account_tran_id`);

--
-- Indices de la tabla `almacenes`
--
ALTER TABLE `almacenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `almacenes_productos`
--
ALTER TABLE `almacenes_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Index 3` (`bill_id`),
  ADD KEY `Index 2` (`admission_id`);

--
-- Indices de la tabla `bill_admission`
--
ALTER TABLE `bill_admission`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Index 2` (`admission_id`);

--
-- Indices de la tabla `bill_advanced`
--
ALTER TABLE `bill_advanced`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ipd_bill_advanced_ipd_admission` (`admission_id`);

--
-- Indices de la tabla `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Key As Bill_ID` (`bill_id`),
  ADD KEY `Admission ID` (`admission_id`);

--
-- Indices de la tabla `bill_package`
--
ALTER TABLE `bill_package`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bill_service`
--
ALTER TABLE `bill_service`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bm_bed`
--
ALTER TABLE `bm_bed`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bm_bed_assign`
--
ALTER TABLE `bm_bed_assign`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bm_bed_transfer`
--
ALTER TABLE `bm_bed_transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bm_room`
--
ALTER TABLE `bm_room`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cm_patient`
--
ALTER TABLE `cm_patient`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cm_status`
--
ALTER TABLE `cm_status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `custom_sms_info`
--
ALTER TABLE `custom_sms_info`
  ADD PRIMARY KEY (`custom_sms_id`);

--
-- Indices de la tabla `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dprt_id`);

--
-- Indices de la tabla `department_lang`
--
ALTER TABLE `department_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `enfermedades`
--
ALTER TABLE `enfermedades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`enquiry_id`);

--
-- Indices de la tabla `ha_birth`
--
ALTER TABLE `ha_birth`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ha_category`
--
ALTER TABLE `ha_category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ha_death`
--
ALTER TABLE `ha_death`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ha_investigation`
--
ALTER TABLE `ha_investigation`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ha_medicine`
--
ALTER TABLE `ha_medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ha_operation`
--
ALTER TABLE `ha_operation`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inc_insurance`
--
ALTER TABLE `inc_insurance`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inc_limit_approval`
--
ALTER TABLE `inc_limit_approval`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `laboratorio_categorias`
--
ALTER TABLE `laboratorio_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `laboratorio_examenes`
--
ALTER TABLE `laboratorio_examenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `laboratorio_solicitudes`
--
ALTER TABLE `laboratorio_solicitudes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mail_setting`
--
ALTER TABLE `mail_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `main_department`
--
ALTER TABLE `main_department`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `main_department_lang`
--
ALTER TABLE `main_department_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medication`
--
ALTER TABLE `medication`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mercaderia`
--
ALTER TABLE `mercaderia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pa_visit`
--
ALTER TABLE `pa_visit`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pr_case_study`
--
ALTER TABLE `pr_case_study`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pr_prescription`
--
ALTER TABLE `pr_prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_module_id` (`fk_module_id`),
  ADD KEY `fk_user_id` (`role_id`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sales_items`
--
ALTER TABLE `sales_items`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indices de la tabla `sec_role`
--
ALTER TABLE `sec_role`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sec_userrole`
--
ALTER TABLE `sec_userrole`
  ADD UNIQUE KEY `ID` (`id`);

--
-- Indices de la tabla `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indices de la tabla `sms_delivery`
--
ALTER TABLE `sms_delivery`
  ADD PRIMARY KEY (`sms_delivery_id`);

--
-- Indices de la tabla `sms_gateway`
--
ALTER TABLE `sms_gateway`
  ADD PRIMARY KEY (`gateway_id`);

--
-- Indices de la tabla `sms_info`
--
ALTER TABLE `sms_info`
  ADD PRIMARY KEY (`sms_info_id`);

--
-- Indices de la tabla `sms_schedule`
--
ALTER TABLE `sms_schedule`
  ADD PRIMARY KEY (`ss_id`);

--
-- Indices de la tabla `sms_setting`
--
ALTER TABLE `sms_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sms_teamplate`
--
ALTER TABLE `sms_teamplate`
  ADD PRIMARY KEY (`teamplate_id`);

--
-- Indices de la tabla `sms_users`
--
ALTER TABLE `sms_users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sub_module`
--
ALTER TABLE `sub_module`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `time_slot`
--
ALTER TABLE `time_slot`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indices de la tabla `user_lang`
--
ALTER TABLE `user_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_language`
--
ALTER TABLE `user_language`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas_farmacia`
--
ALTER TABLE `ventas_farmacia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ws_about`
--
ALTER TABLE `ws_about`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ws_appoint_instruction`
--
ALTER TABLE `ws_appoint_instruction`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ws_banner`
--
ALTER TABLE `ws_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ws_basic`
--
ALTER TABLE `ws_basic`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ws_menu`
--
ALTER TABLE `ws_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ws_menu_lang`
--
ALTER TABLE `ws_menu_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ws_news`
--
ALTER TABLE `ws_news`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ws_news_language`
--
ALTER TABLE `ws_news_language`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ws_page_content`
--
ALTER TABLE `ws_page_content`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ws_partner`
--
ALTER TABLE `ws_partner`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ws_section`
--
ALTER TABLE `ws_section`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ws_section_lang`
--
ALTER TABLE `ws_section_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ws_service`
--
ALTER TABLE `ws_service`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ws_setting`
--
ALTER TABLE `ws_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ws_slider`
--
ALTER TABLE `ws_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ws_slider_lang`
--
ALTER TABLE `ws_slider_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ws_testimonial`
--
ALTER TABLE `ws_testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ws_testimonial_lang`
--
ALTER TABLE `ws_testimonial_lang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acc_account_name`
--
ALTER TABLE `acc_account_name`
  MODIFY `account_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `acc_transaction`
--
ALTER TABLE `acc_transaction`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `acm_account`
--
ALTER TABLE `acm_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `acm_invoice`
--
ALTER TABLE `acm_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `acm_invoice_details`
--
ALTER TABLE `acm_invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `acm_payment`
--
ALTER TABLE `acm_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `acn_account_transaction`
--
ALTER TABLE `acn_account_transaction`
  MODIFY `account_tran_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `almacenes`
--
ALTER TABLE `almacenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `almacenes_productos`
--
ALTER TABLE `almacenes_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `bill`
--
ALTER TABLE `bill`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de la tabla `bill_admission`
--
ALTER TABLE `bill_admission`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de la tabla `bill_advanced`
--
ALTER TABLE `bill_advanced`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de la tabla `bill_package`
--
ALTER TABLE `bill_package`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `bill_service`
--
ALTER TABLE `bill_service`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de la tabla `bm_bed`
--
ALTER TABLE `bm_bed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `bm_bed_assign`
--
ALTER TABLE `bm_bed_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `bm_bed_transfer`
--
ALTER TABLE `bm_bed_transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bm_room`
--
ALTER TABLE `bm_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT de la tabla `cm_patient`
--
ALTER TABLE `cm_patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cm_status`
--
ALTER TABLE `cm_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `custom_sms_info`
--
ALTER TABLE `custom_sms_info`
  MODIFY `custom_sms_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `department`
--
ALTER TABLE `department`
  MODIFY `dprt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `department_lang`
--
ALTER TABLE `department_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `document`
--
ALTER TABLE `document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `enfermedades`
--
ALTER TABLE `enfermedades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `enquiry_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ha_birth`
--
ALTER TABLE `ha_birth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ha_category`
--
ALTER TABLE `ha_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT de la tabla `ha_death`
--
ALTER TABLE `ha_death`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ha_investigation`
--
ALTER TABLE `ha_investigation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ha_medicine`
--
ALTER TABLE `ha_medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT de la tabla `ha_operation`
--
ALTER TABLE `ha_operation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inc_insurance`
--
ALTER TABLE `inc_insurance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inc_limit_approval`
--
ALTER TABLE `inc_limit_approval`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `laboratorio_categorias`
--
ALTER TABLE `laboratorio_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `laboratorio_examenes`
--
ALTER TABLE `laboratorio_examenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT de la tabla `laboratorio_solicitudes`
--
ALTER TABLE `laboratorio_solicitudes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=780;

--
-- AUTO_INCREMENT de la tabla `mail_setting`
--
ALTER TABLE `mail_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `main_department`
--
ALTER TABLE `main_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `main_department_lang`
--
ALTER TABLE `main_department_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `medication`
--
ALTER TABLE `medication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `mercaderia`
--
ALTER TABLE `mercaderia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT de la tabla `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `pa_visit`
--
ALTER TABLE `pa_visit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `pr_case_study`
--
ALTER TABLE `pr_case_study`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pr_prescription`
--
ALTER TABLE `pr_prescription`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1291;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sales_items`
--
ALTER TABLE `sales_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sec_role`
--
ALTER TABLE `sec_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `sec_userrole`
--
ALTER TABLE `sec_userrole`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sms_delivery`
--
ALTER TABLE `sms_delivery`
  MODIFY `sms_delivery_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sms_gateway`
--
ALTER TABLE `sms_gateway`
  MODIFY `gateway_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sms_info`
--
ALTER TABLE `sms_info`
  MODIFY `sms_info_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sms_schedule`
--
ALTER TABLE `sms_schedule`
  MODIFY `ss_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sms_setting`
--
ALTER TABLE `sms_setting`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sms_teamplate`
--
ALTER TABLE `sms_teamplate`
  MODIFY `teamplate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sms_users`
--
ALTER TABLE `sms_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sub_module`
--
ALTER TABLE `sub_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT de la tabla `time_slot`
--
ALTER TABLE `time_slot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `user_lang`
--
ALTER TABLE `user_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `user_language`
--
ALTER TABLE `user_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `user_log`
--
ALTER TABLE `user_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ventas_farmacia`
--
ALTER TABLE `ventas_farmacia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ws_about`
--
ALTER TABLE `ws_about`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ws_appoint_instruction`
--
ALTER TABLE `ws_appoint_instruction`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ws_banner`
--
ALTER TABLE `ws_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ws_basic`
--
ALTER TABLE `ws_basic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ws_menu`
--
ALTER TABLE `ws_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `ws_menu_lang`
--
ALTER TABLE `ws_menu_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `ws_news`
--
ALTER TABLE `ws_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `ws_news_language`
--
ALTER TABLE `ws_news_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `ws_page_content`
--
ALTER TABLE `ws_page_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `ws_partner`
--
ALTER TABLE `ws_partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ws_section`
--
ALTER TABLE `ws_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `ws_section_lang`
--
ALTER TABLE `ws_section_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `ws_service`
--
ALTER TABLE `ws_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ws_setting`
--
ALTER TABLE `ws_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ws_slider`
--
ALTER TABLE `ws_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ws_slider_lang`
--
ALTER TABLE `ws_slider_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `ws_testimonial`
--
ALTER TABLE `ws_testimonial`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ws_testimonial_lang`
--
ALTER TABLE `ws_testimonial_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `FK_ipd_bill_ipd_admission` FOREIGN KEY (`admission_id`) REFERENCES `bill_admission` (`admission_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `bill_advanced`
--
ALTER TABLE `bill_advanced`
  ADD CONSTRAINT `FK_ipd_bill_advanced_ipd_admission` FOREIGN KEY (`admission_id`) REFERENCES `bill_admission` (`admission_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `bill_details`
--
ALTER TABLE `bill_details`
  ADD CONSTRAINT `fk_ipd_bill_details_ipd_admission` FOREIGN KEY (`admission_id`) REFERENCES `bill_admission` (`admission_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ipd_bill_details_ipd_bill` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`bill_id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;
