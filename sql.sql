CREATE TABLE `bill` (
  `id` int(10) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `mobile` varchar(20) NOT NULL,
  `bill_id` varchar(100) NOT NULL,
  `pay_id` varchar(100) NOT NULL,
  `bill_type` varchar(100) NOT NULL,
  `pay_type` enum('online','panel','') NOT NULL DEFAULT '',
  `url` text DEFAULT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `pay_date` datetime DEFAULT NULL,
  `refcode` varchar(200) DEFAULT NULL,
  `check_bill_result` text NOT NULL,
  `pay_bill_result` text DEFAULT NULL,
  `status` enum('paid','unpaid') NOT NULL DEFAULT 'unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `bill`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;