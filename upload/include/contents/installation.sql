CREATE TABLE IF NOT EXISTS `prefix_marquee` (
  `mrq_pk` mediumint(9) NOT NULL,
  `mrq_strtext` text NOT NULL,
  `mrq_bolactive` BOOLEAN NOT NULL,
  `mrq_speed` int(5) NOT NULL,
  `mrq_bolblink` BOOLEAN NOT NULL,
  `mrq_color` varchar(8) NOT NULL,
  `mrq_fsize` int(5) default null,
  `mrq_bolbold` BOOLEAN NOT NULL,
  `mrq_bolsave` BOOLEAN NOT NULL,
  PRIMARY KEY (`mrq_pk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

insert into `prefix_modules`(url, name, gshow, ashow, fright) values ('gfa_scroll_admin', 'Scrolltext', '1', '1', '1');
	