CREATE TABLE `bill` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `mobile` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `bill_id` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `pay_id` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `bill_type` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `pay_type` enum('online','panel','') COLLATE utf8_persian_ci NOT NULL DEFAULT '',
  `url` text COLLATE utf8_persian_ci NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `pay_date` datetime NOT NULL,
  `refcode` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `check_bill_result` text COLLATE utf8_persian_ci NOT NULL,
  `pay_bill_result` text COLLATE utf8_persian_ci NOT NULL,
  `status` enum('paid','unpaid') COLLATE utf8_persian_ci NOT NULL DEFAULT 'unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

-
ALTER TABLE `bill`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;