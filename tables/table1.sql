CREATE TABLE `bank_account` (
  `card_num` int(11) NOT NULL,
  `card_pin` int(11) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `cart2` (
  `id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `cost` int(11) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;



CREATE TABLE `chat` (
  `massage_id` int(5) NOT NULL,
  `fromwho` varchar(20) NOT NULL,
  `towho` varchar(20) NOT NULL,
  `date_chat` int(10) NOT NULL,
  `time_chat` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE `doctors` (
  `id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `speciality` varchar(20) NOT NULL,
  `degree` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE `feed` (
  `id` int(11) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;


ALTER TABLE `bank_account`
  ADD PRIMARY KEY (`card_num`);


ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `cart2`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `chat`
  ADD PRIMARY KEY (`massage_id`);


ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `feed`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `cart2`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

ALTER TABLE `chat`
  MODIFY `massage_id` int(5) NOT NULL AUTO_INCREMENT;

ALTER TABLE `doctors`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

ALTER TABLE `feed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;