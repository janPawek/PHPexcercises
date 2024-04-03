-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 03. Apr 2024 um 18:12
-- Server-Version: 10.4.28-MariaDB
-- PHP-Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr4_with_file_upload`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `fk_user` int(11) NOT NULL,
  `fk_inventory` int(11) NOT NULL,
  `qtty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `cart`
--

INSERT INTO `cart` (`id`, `fk_user`, `fk_inventory`, `qtty`) VALUES
(1, 4, 1, 1),
(2, 4, 3, 2),
(5, 5, 5, 1),
(9, 5, 3, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `title` varchar(70) DEFAULT NULL,
  `image` varchar(700) DEFAULT NULL,
  `ISBN` varchar(30) DEFAULT NULL,
  `short_des` varchar(100) DEFAULT NULL,
  `long_des` varchar(900) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `author_first_name` varchar(50) DEFAULT NULL,
  `author_last_name` varchar(80) DEFAULT NULL,
  `publisher_name` varchar(80) DEFAULT NULL,
  `publisher_address` varchar(300) DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `status_del` varchar(50) DEFAULT NULL,
  `price` decimal(11,2) NOT NULL,
  `tax_perc` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `inventory`
--

INSERT INTO `inventory` (`id`, `title`, `image`, `ISBN`, `short_des`, `long_des`, `type`, `author_first_name`, `author_last_name`, `publisher_name`, `publisher_address`, `publish_date`, `status_del`, `price`, `tax_perc`) VALUES
(1, 'Oppenheimer', '6602ccc2a1aa0.jpg', '20-123-123-123-20', 'Cillian Murphy (Darsteller), Emily Blunt (Darsteller) ', 'Cillian Murphy (Darsteller), Emily Blunt (Darsteller)  Prices for items sold by Amazon include VAT. Depending on your delivery address, VAT may vary at Checkout. For other items, please see', 'DVD', 'Dan', 'Brown', 'Kindle Edition', '167 Fleet Street, London EC4A 2EA', '2023-09-01', 'available', 5.99, 20.00),
(3, 'Movie Collection', '6602ccef2a35a.jpg', '4-123-123-123-44', 'Genre Thriller & Krimi, Romanverfilmung, Spiel', 'Genre	Thriller & Krimi, Romanverfilmung, SpielfilmFormat	ImportContributor	Hanks, Tom, McGregor, Ewan, Tautou, AudreyLanguage	EnglishRuntime	6 hours and 48 minutes', 'DVD', 'Dan', 'Brown', 'Robert Langdon', '167 Fleet Street, London EC4A 2EA', '2015-03-19', 'available', 6.50, 20.00),
(4, 'Mordlust', '6602cd1a4bc15.jpg', '5-123-123-123-5', 'Im True Crime-Podcast “Mordlust - Verbrechen', 'Im True Crime-Podcast “Mordlust - Verbrechen und ihre Hintergründe” sprechen die Journalistinnen Paulina Krasa und Laura Wohlers über wahre Kriminalfälle aus Deutschland. In jeder Folge widmen sich die Reporterinnen zwei Fällen zu einem spezifischen Thema und diskutieren strafrechtliche und psychologische Aspekte. Dabei gehen sie Fragen nach wie: Was sind die Schwierigkeiten bei einem Indizienprozess? Wie überredet man Unbeteiligte zu einem falschen Geständnis? Und wie hätte die Tat womöglich verhindert werden können? Mord aus Habgier, niedrigen Beweggründen oder Mordlust - für die meisten Verbrechen gibt es eine Erklärung und nach der suchen die beiden. Außerdem diskutieren die Freundinnen über beliebte True Crime-Formate, begleiten Gerichtsprozesse und führen Interviews mit', 'CD', 'Paulina', 'Krasa', 'Laura Wohlers', '167 Fleet Street, London EC4A 2EA', '2023-03-16', 'reserved', 7.80, 20.00),
(5, 'Angels And Demons', '6602cd3608da7.jpg', '6-123-123-123-6', 'CERN Institute, Switzerland: a world-renowned', 'CERN Institute, Switzerland: a world-renowned scientist is found brutally murdered with a mysterious symbol seared onto his chest.The Vatican, Rome: the College of Cardinals assembles to elect a new pope. Somewhere beneath them, an unstoppable bomb of terrifying power relentlessly counts down to oblivion. In a breathtaking race against time, Harvard professor Robert Langdon must decipher a labyrinthine trail of', 'BOOK', 'Dan', 'Brown', 'Robert Langdon', '167 Fleet Street, London EC4A 2EA', '2024-03-07', 'available', 10.01, 20.00),
(6, 'Inferno', '6602cd5d36329.jpg', '8-123-123-123-8', '*NOW A MAJOR FILM STARRING TOM HANKS AND FELICITY JONES*', 'Florence: Harvard symbologist Robert Langdon awakes in a hospital bed with no recollection of where he is or how he got there. Nor can he explain the origin of the macabre object that is found hidden in his belongings.A threat to his life will propel him and a young doctor, Sienna Brooks, into a breakneck chase across the city. Only Langdon’s knowledge of the hidden passageways and ancient secrets that lie behind its historic facade can save them from the clutches of their unknown pursuers.', 'book', 'Dan', 'Brown', 'Robert Langdon', '167 Fleet Street, London EC4A 2EA', '2024-02-18', 'available', 15.11, 15.00),
(7, 'Winston Churchill', '6602cdc0e1860.jpg', '9-123-123-123-9', 'Der Held des 20. Jahrhunderts: Er hat Hitler ', 'Der Held des 20. Jahrhunderts: Er hat Hitler aufgehaltenUnter den herausragenden Politikern des 20. Jahrhunderts ist Churchill der schillerndste. Hollywood hat den Adeligen mit der Zigarre längst zu einer Film- und Heldenfigur überhöht. Seine Sätze, dass er etwa »außer Blut, Schweiß und Tränen« nichts zu bieten habe, sind geflügelte Worte. Churchill gilt als einer der größten Redner der Geschichte, hat seinen aufwendigen Lebensunterhalt als Schriftsteller und Journalist bestritten und wurde mit dem Nobelpreis für Literatur ausgezeichnet. Er galt in den dreißiger Jahren als politisch erledigt, doch da e', 'BOOK', ' Franziska', 'Augstein', 'KIndle Edition', '167 Fleet Street, London EC4A 2EA', '2024-03-06', 'available', 21.12, 20.00),
(8, 'Die Farbe des Feuers', '6602cde4e0aca.jpg', '10-123-123-123-10', 'Ein vornehmes Haus im Süden, zwei Frauen, die sich', 'Ein vornehmes Haus im Süden, zwei Frauen, die sich lieben und ein Fest, auf dem kein Segen liegt: Auf dem Anwesen einer Industriellenfamilie in der Provence wird die Hochzeit der Tochter Rebecca vorbereitet. Wehmütig macht sich ihre Freundin Swann auf den Weg nach Südfrankreich. Swann liebt Rebecca, die Gabriel heiratet, der wiederum nur seine Kunst liebt, aber immerhin adelig ist. Und dann ist da noch Sami. Auch er liebt Rebecca. Aber er ist nur der Gärtner und ein Muslim. Ausgerechnet jetzt hat es ihn nach Paris verschlagen, und während sein Orangengarten zur Bühne einer Hochzeit wird, die nicht sein', 'BOOK', 'Franziska', 'Augstein', 'Kindle Edition', '167 Fleet Street, London EC4A 2EA', '2024-01-03', 'available', 8.88, 15.00),
(9, 'Die Tage ', '6602ce0473b5c.jpg', '14-123-123-123-14', 'Wo finde ich die schönsten Tulpen? Diese und weitere ', 'Darf ich in meinen Garten eine Statue stellen? Und neigen Gärtner zu Gewaltverbrechen? Jakob Augstein hat ein ungewöhnliches, sehr subjektives Buch über die Gartenarbeit verfasst. Man findet darin nicht nur hilfreiche Informationen zum Büschepflanzen, Zwiebelnsetzen und Blumengießen, sondern auch sehr amüsante Abschweifungen zu allerlei Fragen, die einem beim Unkrautjäten durch den Kopf gehen.', 'BOOK', 'Franziska', 'Augstein', 'Kindle Edition', '167 Fleet Street, London EC4A 2EA', '2024-01-10', 'available', 9.99, 20.00),
(10, 'The Lost Symbol', '6602ce1b19dbe.jpg', '15-123-123-123-15', 'About sales tax (or VAT) About sales tax (or VAT)', 'Your order may include items from one or more Marketplace sellers. Since each of these sellers has different sales tax (or VAT) obligations, all Marketplace prices for orders shipped to delivery addresses within the EU and Northern Ireland are displayed as final prices indicated by the seller.', 'DVD', 'Dan', 'Brown', 'Kindle Edition', '167 Fleet Street, London EC4A 2EA', '2024-01-16', 'available', 6.66, 20.00),
(11, 'Inferno', '6602ce3fae81f.jpg', '[16-123-123-123-16]', 'Tom Hanks (Darsteller), Felicity Jones (Darsteller)', 'Prices for items sold by Amazon include VAT. Depending on your delivery address, VAT may vary at Checkout. For other items, please see details.', 'DVD', 'Kindle', 'Brown', 'Kindle Edition', '167 Fleet Street, London EC4A 2EA', '2016-03-10', 'available', 13.13, 15.00),
(12, 'The Da Vinci Code', '6602ce5f29848.jpg', '3-8301-9807-3-879', 'The Louvre, Paris: the elderly curator of the museum ', 'The Louvre, Paris: the elderly curator of the museum has been violently murdered in the Grand Gallery. Harvard professor Robert Langdon is summoned to decipher the baffling codes which the police find alongside the body. As he and a gifted French cryptologist, Sophie Neveu, sort through the bizarre riddles, they are stunned to find a trail that leads to the works of Leonardo Da Vinci - and suggests the answer to an age-old mystery that stretches deep into the vault of history.', 'BOOK', 'Dan', 'Brown', 'Robert Langdon', '167 Fleet Street, London EC4A 2EA', '2014-03-02', 'available', 22.22, 10.00),
(13, 'Fifty Shades ', '6602ce799e268.jpg', '35-123-123-123-35', ' Sie ist 21, Literaturstudentin und ', 'Sie ist 21, Literaturstudentin und in der Liebe nicht allzu erfahren. Doch dann lernt Ana Steele den reichen und ebenso unverschämt selbstbewussten wie attraktiven Unternehmer Christian Grey bei einem Interview für ihre Uni-Zeitung kennen. Und möchte ihn', 'DVD', 'E L ', 'James', 'Kindle Edition', '147 Fleet Street, London EC4A 2BU', '2023-06-29', 'available', 5.55, 15.00),
(15, 'Fifty Shades ', '6602bfb085d83.jpg', '35-123-123-123-35', 'DSNLA;F:-AMD KLLFMQLÖEGMQGL', 'LKSAFJjkdmölaamdsvkvma lkdjklgajaöl', 'DVD', 'E L ', 'James', 'Kindle Edition', '147 Fleet Street, London EC4A 2BU', '2023-06-29', 'available', 66.66, 20.00);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `status` varchar(4) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `password`, `date_of_birth`, `email`, `picture`, `status`) VALUES
(3, 'Admin', 'Jan', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '2003-12-12', 'admin@yahoo.com', '660571abdee81.png', 'adm'),
(4, 'Female', 'User', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '2000-02-29', 'user@yahoo.com', '66054e0a55893.jpg', 'user'),
(5, 'Female Jane', 'User', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '2000-02-29', 'user1@yahoo.com', 'avatar.png', 'user');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`fk_user`),
  ADD KEY `fk_inventory` (`fk_inventory`);

--
-- Indizes für die Tabelle `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT für Tabelle `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`fk_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`fk_inventory`) REFERENCES `inventory` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
