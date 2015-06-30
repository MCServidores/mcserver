CREATE TABLE IF NOT EXISTS `livechat` (
  `gameID` int(15) default '0',
  `updatescreen` int(30) default '0',
  `c1` varchar(150) default '',
  `c2` varchar(150) default '',
  `c3` varchar(150) default '',
  `c4` varchar(150) default '',
  `c5` varchar(150) default '',
  PRIMARY KEY  (`gameID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `players` (
  `ID` int(11) NOT NULL auto_increment,
  `username` varchar(12) default '',
  `email` varchar(70) default '',
  `password` varchar(40) default '',
  `avatar` varchar(80) default '',
  `datecreated` int(35) default '0',
  `lastlogin` int(35) default '0',
  `ipaddress` varchar(20) default '',
  `sessname` varchar(32) default '',
  `banned` tinyint(1) default '0',
  `approve` tinyint(1) default '0',
  `lastmove` int(35) default '0',
  `waitimer` int(35) default '0',
  `code` varchar(16) default '',
  `GUID` varchar(32) default '',
  `vID` int(15) default '0',
  `gID` int(15) default '0',
  `timetag` int(30) default '0',
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `poker` (
  `gameID` int(15) NOT NULL auto_increment,
  `tablename` varchar(64) default '',
  `tabletype` varchar(1) default '',
  `tablelow` int(7) default '0',
  `tablelimit` varchar(15) default '',
  `tablestyle` varchar(20) default '',
  `move` varchar(2) default '',
  `dealer` varchar(2) default '',
  `hand` varchar(5) default '',
  `pot` int(10) default '0',
  `bet` int(10) default '0',
  `lastbet` varchar(15) default '',
  `lastmove` int(35) default '0',
  `card1` varchar(40) default '',
  `card2` varchar(40) default '',
  `card3` varchar(40) default '',
  `card4` varchar(40) default '',
  `card5` varchar(40) default '',
  `p1name` varchar(12) default '',
  `p1pot` varchar(10) default '',
  `p1bet` varchar(10) default '',
  `p1card1` varchar(40) default '',
  `p1card2` varchar(40) default '',
  `p2name` varchar(12) default '',
  `p2pot` varchar(10) default '',
  `p2bet` varchar(10) default '',
  `p2card1` varchar(40) default '',
  `p2card2` varchar(40) default '',
  `p3name` varchar(12) default '',
  `p3pot` varchar(10) default '',
  `p3bet` varchar(10) default '',
  `p3card1` varchar(40) default '',
  `p3card2` varchar(40) default '',
  `p4name` varchar(12) default '',
  `p4pot` varchar(10) default '',
  `p4bet` varchar(10) default '',
  `p4card1` varchar(40) default '',
  `p4card2` varchar(40) default '',
  `p5name` varchar(12) default '',
  `p5pot` varchar(10) default '',
  `p5bet` varchar(10) default '',
  `p5card1` varchar(40) default '',
  `p5card2` varchar(40) default '',
  `p6name` varchar(12) default '',
  `p6pot` varchar(10) default '',
  `p6bet` varchar(10) default '',
  `p6card1` varchar(40) default '',
  `p6card2` varchar(40) default '',
  `p7name` varchar(12) default '',
  `p7pot` varchar(10) default '',
  `p7bet` varchar(10) default '',
  `p7card1` varchar(40) default '',
  `p7card2` varchar(40) default '',
  `p8name` varchar(12) default '',
  `p8pot` varchar(10) default '',
  `p8bet` varchar(10) default '',
  `p8card1` varchar(40) default '',
  `p8card2` varchar(40) default '',
  `p9name` varchar(12) default '',
  `p9pot` varchar(10) default '',
  `p9bet` varchar(10) default '',
  `p9card1` varchar(40) default '',
  `p9card2` varchar(40) default '',
  `p10name` varchar(12) default '',
  `p10pot` varchar(10) default '',
  `p10bet` varchar(10) default '',
  `p10card1` varchar(40) default '',
  `p10card2` varchar(40) default '',
  `msg` varchar(150) default '',
  PRIMARY KEY  (`gameID`)
) ENGINE=MyISAM AUTO_INCREMENT=448 DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `settings` (
  `setting` varchar(12) default '',
  `Xkey` varchar(12) default '',
  `Xvalue` varchar(70) default ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `settings` VALUES ('title', 'TITLE', 'My Poker Site');
INSERT INTO `settings` VALUES ('appmod', 'APPMOD', '0');
INSERT INTO `settings` VALUES ('memmod', 'MEMMOD', '0');
INSERT INTO `settings` VALUES ('movetimer', 'MOVETIMER', '20');
INSERT INTO `settings` VALUES ('showtimer', 'SHOWDOWN', '5');
INSERT INTO `settings` VALUES ('kicktimer', 'KICKTIMER', '7');
INSERT INTO `settings` VALUES ('emailmod', 'EMAILMOD', '0');
INSERT INTO `settings` VALUES ('deletetimer', 'DELETE', 'never');
INSERT INTO `settings` VALUES ('waitimer', 'WAITIMER', '10');
INSERT INTO `settings` VALUES ('session', 'SESSNAME', '');
INSERT INTO `settings` VALUES ('renew', 'RENEW', '1');
INSERT INTO `settings` VALUES ('disconnect', 'DISCONNECT', '60');
INSERT INTO `settings` VALUES ('stakesize', 'STAKESIZE', 'med');
INSERT INTO `settings` VALUES ('ipcheck', 'IPCHECK', '1');


CREATE TABLE IF NOT EXISTS `stats` (
  `ID` int(11) NOT NULL auto_increment,
  `player` varchar(12) default '',
  `rank` varchar(12) default '',
  `winpot` int(20) default '0',
  `gamesplayed` int(11) default '0',
  `tournamentsplayed` int(11) default '0',
  `tournamentswon` int(11) default '0',
  `handsplayed` int(11) default '0',
  `handswon` int(11) default '0',
  `bet` int(11) default '0',
  `checked` int(11) default '0',
  `called` varchar(11) default '0',
  `allin` varchar(11) default '0',
  `fold_pf` varchar(11) default '0',
  `fold_f` varchar(11) default '0',
  `fold_t` varchar(11) default '0',
  `fold_r` int(11) default '0',
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `styles` (
  `style_id` int(11) NOT NULL auto_increment,
  `style_name` varchar(20) default '',
  `style_lic` varchar(60) default '',
  PRIMARY KEY  (`style_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

        