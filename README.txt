potential improvements for future me to play with;
+ always display votes remaining
+ lock out all buttons when provided votes empty
+ do some math magic so votes provided in code match actual votes provided
+ pull out some fancy css to clean up the page
+ extra divs for css purposes to add complex borders and vary sizes based on window size
+ fancy bit that shows user count currently connected to database
+ image submission form, that allows 200/300 sized images specifically and adds them to the database
+ serverside image storage, to remove reliance on image url


IMPORTANT!
to create database used for project, execute following in a new SQL database named "starform"

CREATE TABLE IF NOT EXISTS `ratings` (
 `id` int(11) NOT NULL,
 `image` varchar(255) NOT NULL,
 `rated` int(11) NOT NULL DEFAULT '0',
 `votes` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
INSERT INTO `ratings` (`id`, `image`, `rated`, `votes`) VALUES
(1, 'https://i.picsum.photos/id/818/200/300.jpg?hmac=lE_Le7TxnELgojCX97DVlE9CLlZJWqnfbaQR3Chjstw', 0, 0),
(2, 'https://i.picsum.photos/id/343/200/300.jpg?hmac=_7ttvLezG-XONDvp0ILwQCv50ivQa_oewm7m6xV2uZA', 0, 0),
(3, 'https://i.picsum.photos/id/174/200/300.jpg?hmac=QaIDLHcDtfSD0nDbTHmEYRm7_bAbvyCafyheoeR2ZB4', 0, 0),
(4, 'https://i.picsum.photos/id/990/200/300.jpg?hmac=6QkvunJPzSUAgkuY7p_hlJq5SmEdhlV01fbh5cMzKgg', 0, 0)