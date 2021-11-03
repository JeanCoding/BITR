DROP DATABASE IF EXISTS bitr;
CREATE DATABASE bitr;

USE DATABASE bitr;

CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `afzender` varchar(255) DEFAULT NULL,
  `bericht` varchar(255) DEFAULT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gebruikersnaam` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `wachtwoord` varchar(255) DEFAULT NULL,
  `datum` date NOT NULL DEFAULT current_timestamp(),
  `show_email` varchar(255) NOT NULL,
  `profile_views` int(11) NOT NULL,
  `geslacht` varchar(255) NOT NULL,
  `xp` int(11) NOT NULL,
  `omschrijving` text NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO `users` (`gebruikersnaam`, `email`, `wachtwoord`, `datum`, `show_email`, `profile_views`, `geslacht`, `xp`, `omschrijving`) VALUES
('Mauro', 'mauroscheltens@hotmail.com', '12345678', '2021-09-02', 'true', 95, 'Man', 5, 'Dit is een omschrijving!'),
('Joop', 'joop55@hotmail.com', '12345678', '2021-11-02', 'true', 12, '', 0, 'Ik ben Joop en ik ben 55 jaar oud!'),