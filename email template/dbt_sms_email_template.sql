-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2021 at 09:57 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nishuetesting`
--

-- --------------------------------------------------------

--
-- Table structure for table `dbt_sms_email_template`
--

CREATE TABLE `email_setting_list` (
  `id` int(11) NOT NULL,
  `sms_or_email` varchar(10) NOT NULL,
  `template_name` varchar(50) NOT NULL,
  `subject_en` varchar(300) NOT NULL,
  `subject_fr` varchar(300) NOT NULL,
  `template_en` varchar(300) NOT NULL,
  `template_fr` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dbt_sms_email_template`
--

INSERT INTO `email_setting_list` (`id`, `sms_or_email`, `template_name`, `subject_en`, `subject_fr`, `template_en`, `template_fr`) VALUES
(1, 'sms', 'transfer_verification', '', '', 'You transfer the amount $%amount% to the account %receiver_id%. Your balence is $%new_balance%.The Verification Code is %verify_code%', 'Vous avez transféré le montant avec succès $%amount% to the account %receiver_id%. Your balence is $%new_balance%.The Verification Code is %verify_code%'),
(2, 'email', 'transfer_verification', '', '', 'You successfully transfer the amount $%amount% to the account %receiver_id%. Your balence is $%new_balance%.', 'Vous avez transféré le montant avec succès $%amount% to the account %receiver_id%. Your balence is $%new_balance%'),
(3, 'sms', 'transfer_success', '', '', 'You successfully transfer The amount $%amount% to the account %receiver_id%. Your new balance is %balance%', 'You successfully transfer The amount $%amount% to the account %receiver_id%. Your new balance is %balance%'),
(4, 'email', 'transfer_success', '', '', 'You successfully transfer The amount $%amount% to the account %receiver_id%. Your new balance is %balance%', 'You successfully transfer The amount $%amount% to the account %receiver_id%. Your new balance is %balance%'),
(5, 'sms', 'withdraw_verification', '', '', 'You Withdraw The Amount Is %amount% The Verification Code is %verify_code%', 'You Withdraw The Amount Is %amount% The Verification Code is %verify_code%'),
(6, 'email', 'withdraw_verification', 'Withdraw Verification Code', '', 'You Withdraw The Amount Is %amount% The Verification Code is %verify_code%', 'You Withdraw The Amount Is %amount% The Verification Code is %verify_code%'),
(7, 'sms', 'withdraw_success', '', '', 'You successfully withdraw the amount is $%amount% from your account. Your new balance is $%new_balance%', 'You successfully withdraw the amount is $%amount% from your account. Your new balance is $%new_balance%'),
(8, 'email', 'withdraw_success', '', '', 'You successfully withdraw the amount is $%amount% from your account. Your new balance is $%new_balance%', 'You successfully withdraw the amount is $%amount% from your account. Your new balance is $%new_balance%'),
(9, 'email', 'profile_update', '', '', 'The Verification Code is <h1>%varify_code%</h1>', 'The Verification Code is <h1>%varify_code%</h1>'),
(10, 'sms', 'deposit_success', '', '', 'You successfully deposit the amount %amount%. Your new balance is %balance%', 'You successfully deposit the amount %amount%. Your new balance is %balance%'),
(11, 'email', 'deposit_success', '', '', 'You successfully deposit the amount %amount%. Your new balance is %balance%', 'You successfully deposit the amount %amount%. Your new balance is %balance%'),
(12, 'sms', 'payout', '', '', 'You received your payout. Your new balance is %balance%', 'You received your payout. Your new balance is %balance%'),
(13, 'email', 'payout', '', '', 'You received your payout. Your new balance is %balance%', 'You received your payout. Your new balance is %balance%'),
(14, 'sms', 'commission', '', '', 'You received a referral commission of $%amount% . Your new balance is $%new_balance%', 'You received a referral commission of $%amount% . Your new balance is $%new_balance%'),
(15, 'email', 'commission', '', '', 'You received a referral commission of $%amount% . Your new balance is $%new_balance%', 'You received a referral commission of $%amount% . Your new balance is $%new_balance%'),
(16, 'sms', 'pack_purchase', '', '', 'You bought a $%amount% package successfully', 'You bought a $%amount% package successfully'),
(17, 'email', 'pack_purchase', '', '', 'You bought a $%amount% package successfully', 'You bought a $%amount% package successfully'),
(18, 'sms', 'team_bonus', '', '', 'Congrats! You received the amount $%amount% for team bonus. Your new balance is $%new_balance% . You are now in Stage %stage%', 'Congrats! You received the amount $%amount% for team bonus. Your new balance is $%new_balance% . You are now in Stage %stage%'),
(19, 'email', 'team_bonus', '', '', 'Congrats! You received the amount $%amount% for team bonus. Your new balance is $%new_balance% . You are now in Stage %stage%', 'Congrats! You received the amount $%amount% for team bonus. Your new balance is $%new_balance% . You are now in Stage %stage%'),
(20, 'email', 'registration', '', '', '<br><b>Your account was created successfully, Please click on the link below to activate your account. </b>', '<br><b>Votre compte a été créé avec succès, veuillez cliquer sur le lien ci-dessous pour activer votre compte. </b>'),
(21, 'sms', 'payout', '', '', 'You received your payout. Your new balance is $%new_balance%', 'Vous avez reçu votre paiement. Votre nouvel équilibre est $%new_balance%');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dbt_sms_email_template`
--
ALTER TABLE `email_setting_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dbt_sms_email_template`
--
ALTER TABLE `email_setting_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
