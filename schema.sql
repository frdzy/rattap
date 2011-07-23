create table groups(
groupid int  not null auto_increment,
groupcreatorid int  not null,
groupname varchar(100) not null,
creationtime timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
primary key (groupid)
);

create table group_user_assoc(
associd int not null auto_increment,
groupid int,
userid int,
assoctime timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
primary key (associd)
);

-- --------------------------------------------------------

--
-- Table structure for table `userauth`
--

CREATE TABLE IF NOT EXISTS `userauth` (
  `userid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(24) NOT NULL,
  `password` varchar(48) NOT NULL,
  `email` varchar(100),
  `userlevel` tinyint(2) NOT NULL DEFAULT '0',
  `activationHash` varchar(100) NOT NULL DEFAULT '',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `sessionid` varchar(32) DEFAULT NULL,
  `lastActive` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `password` (`password`),
  KEY `active` (`active`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2;

--
-- Dumping data for table `userauth`
--

INSERT INTO `userauth` (`userid`, `username`, `password`, `email`, `userlevel`, `activationHash`, `active`, `sessionid`, `lastActive`, `name`) VALUES
(1, 'admin', '1edc2ce0292da1e49f6ad4cdfa5da5b6c1cf0d16bf84da61', 'admin@example.com', 1, '', 1, '', '', 'Site Admin');

