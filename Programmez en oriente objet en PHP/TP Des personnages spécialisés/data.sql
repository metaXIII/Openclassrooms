CREATE TABLE IF NOT EXISTS `personnages_v2` (
                                                `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
                                                `nom` varchar(50) COLLATE utf8_general_ci NOT NULL,
                                                `degats` tinyint(3) unsigned NOT NULL DEFAULT '0',
                                                `timeEndormi` int(10) unsigned NOT NULL DEFAULT '0',
                                                `type` enum('magicien','guerrier') COLLATE utf8_general_ci NOT NULL,
                                                `atout` tinyint(3) unsigned NOT NULL DEFAULT '0',
                                                PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
