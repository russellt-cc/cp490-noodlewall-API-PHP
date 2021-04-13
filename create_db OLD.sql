CREATE DATABASE 'noodlewall';

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `organizer` varchar(256) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

INSERT INTO `events` (`id`, `name`, `description`, organizer) VALUES
(1, 'fishing', 'Pam', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),
(2, 'car meet', 'Mac Donald', 'cars, trucks and more.'),
(3, 'knitting circle', 'Clair', 'quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'),
(5, 'Movie night', 'Jake Forest', 'Movie night at my house!.'),
(6, 'backyard barbeque', 'Big Dave', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(13, 'davidson park post malone concert', 'Janet Mathews', 'You love post malone, i love post malone, lets get together in the park and hope he shows up!.');