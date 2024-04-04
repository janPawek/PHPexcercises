-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 03. Apr 2024 um 19:13
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
-- Datenbank: `be21_cr4_janpawek__biglibrary`
--

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
  `status_del` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `inventory`
--

INSERT INTO `inventory` (`id`, `title`, `image`, `ISBN`, `short_des`, `long_des`, `type`, `author_first_name`, `author_last_name`, `publisher_name`, `publisher_address`, `publish_date`, `status_del`) VALUES
(1, 'Oppenheimer', 'https://m.media-amazon.com/images/I/81GgeJelDLL._SY445_.jpg', '20-123-123-123-20', 'Cillian Murphy (Darsteller), Emily Blunt (Darsteller) ', 'Cillian Murphy (Darsteller), Emily Blunt (Darsteller)  Prices for items sold by Amazon include VAT. Depending on your delivery address, VAT may vary at Checkout. For other items, please see', 'DVD', 'Dan', 'Brown', 'Kindle Edition', '167 Fleet Street, London EC4A 2EA', '2023-09-01', 'available'),
(3, 'Movie Collection', 'https://m.media-amazon.com/images/I/61S17c2Uy8L._SX300_SY300_QL70_ML2_.jpg', '4-123-123-123-4', 'Genre Thriller & Krimi, Romanverfilmung, Spiel', 'Genre	Thriller & Krimi, Romanverfilmung, Spielfilm\r\nFormat	Import\r\nContributor	Hanks, Tom, McGregor, Ewan, Tautou, Audrey\r\nLanguage	English\r\nRuntime	6 hours and 48 minutes', 'DVD', 'Dan', 'Brown', 'Robert Langdon', '167 Fleet Street, London EC4A 2EA', '2015-03-19', 'available'),
(4, 'Mordlust', 'https://m.media-amazon.com/images/S/dmp-catalog-images-prod/images/d066f678-11f6-41f6-8187-830c9e965e69/d066f678-11f6-41f6-8187-830c9e965e69-1559554578._SX576_SY576_BL0_QL100__UX250_FMwebp_QL85_.jpg', '5-123-123-123-5', 'Im True Crime-Podcast “Mordlust - Verbrechen', 'Im True Crime-Podcast “Mordlust - Verbrechen und ihre Hintergründe” sprechen die Journalistinnen Paulina Krasa und Laura Wohlers über wahre Kriminalfälle aus Deutschland. In jeder Folge widmen sich die Reporterinnen zwei Fällen zu einem spezifischen Thema und diskutieren strafrechtliche und psychologische Aspekte. Dabei gehen sie Fragen nach wie: Was sind die Schwierigkeiten bei einem Indizienprozess? Wie überredet man Unbeteiligte zu einem falschen Geständnis? Und wie hätte die Tat womöglich verhindert werden können? Mord aus Habgier, niedrigen Beweggründen oder Mordlust - für die meisten Verbrechen gibt es eine Erklärung und nach der suchen die beiden. Außerdem diskutieren die Freundinnen über beliebte True Crime-Formate, begleiten Gerichtsprozesse und führen Interviews mit', 'CD', 'Paulina', 'Krasa', 'Laura Wohlers', '167 Fleet Street, London EC4A 2EA', '2023-03-16', 'reserved'),
(5, 'Angels And Demons', 'https://m.media-amazon.com/images/I/71Y7usEPjLL._SY425_.jpg', '6-123-123-123-6', 'CERN Institute, Switzerland: a world-renowned', 'CERN Institute, Switzerland: a world-renowned scientist is found brutally murdered with a mysterious symbol seared onto his chest.\r\nThe Vatican, Rome: the College of Cardinals assembles to elect a new pope. Somewhere beneath them, an unstoppable bomb of terrifying power relentlessly counts down to oblivion. In a breathtaking race against time, Harvard professor Robert Langdon must decipher a labyrinthine trail of', 'BOOK', 'Dan', 'Brown', 'Robert Langdon', '167 Fleet Street, London EC4A 2EA', '2024-03-07', 'available'),
(6, 'Inferno', 'https://m.media-amazon.com/images/I/81Kjb+TgdSL._SY425_.jpg', '8-123-123-123-8', '*NOW A MAJOR FILM STARRING TOM HANKS AND FELICITY JONES*', 'Florence: Harvard symbologist Robert Langdon awakes in a hospital bed with no recollection of where he is or how he got there. Nor can he explain the origin of the macabre object that is found hidden in his belongings.\r\nA threat to his life will propel him and a young doctor, Sienna Brooks, into a breakneck chase across the city. Only Langdon’s knowledge of the hidden passageways and ancient secrets that lie behind its historic facade can save them from the clutches of their unknown pursuers.', 'book', 'Dan', 'Brown', 'Robert Langdon', '167 Fleet Street, London EC4A 2EA', '2024-02-18', 'available'),
(7, 'Winston Churchill', 'https://m.media-amazon.com/images/I/819L+CCkGSL._SY425_.jpg', '9-123-123-123-9', 'Der Held des 20. Jahrhunderts: Er hat Hitler ', 'Der Held des 20. Jahrhunderts: Er hat Hitler aufgehalten\r\nUnter den herausragenden Politikern des 20. Jahrhunderts ist Churchill der schillerndste. Hollywood hat den Adeligen mit der Zigarre längst zu einer Film- und Heldenfigur überhöht. Seine Sätze, dass er etwa »außer Blut, Schweiß und Tränen« nichts zu bieten habe, sind geflügelte Worte. Churchill gilt als einer der größten Redner der Geschichte, hat seinen aufwendigen Lebensunterhalt als Schriftsteller und Journalist bestritten und wurde mit dem Nobelpreis für Literatur ausgezeichnet. Er galt in den dreißiger Jahren als politisch erledigt, doch da e', 'BOOK', ' Franziska', 'Augstein', 'KIndle Edition', '167 Fleet Street, London EC4A 2EA', '2024-03-06', 'available'),
(8, 'Die Farbe des Feuers', 'https://m.media-amazon.com/images/I/81qcVVu73wL._SY425_.jpg', '10-123-123-123-10', 'Ein vornehmes Haus im Süden, zwei Frauen, die sich', 'Ein vornehmes Haus im Süden, zwei Frauen, die sich lieben und ein Fest, auf dem kein Segen liegt: Auf dem Anwesen einer Industriellenfamilie in der Provence wird die Hochzeit der Tochter Rebecca vorbereitet. Wehmütig macht sich ihre Freundin Swann auf den Weg nach Südfrankreich. Swann liebt Rebecca, die Gabriel heiratet, der wiederum nur seine Kunst liebt, aber immerhin adelig ist. Und dann ist da noch Sami. Auch er liebt Rebecca. Aber er ist nur der Gärtner und ein Muslim. Ausgerechnet jetzt hat es ihn nach Paris verschlagen, und während sein Orangengarten zur Bühne einer Hochzeit wird, die nicht sein', 'BOOK', 'Franziska', 'Augstein', 'Kindle Edition', '167 Fleet Street, London EC4A 2EA', '2024-01-03', 'available'),
(9, 'Die Tage ', 'https://m.media-amazon.com/images/I/91XSVtNAYNL._SY425_.jpg', '14-123-123-123-14', 'Wo finde ich die schönsten Tulpen? Diese und weitere ', 'Darf ich in meinen Garten eine Statue stellen? Und neigen Gärtner zu Gewaltverbrechen? Jakob Augstein hat ein ungewöhnliches, sehr subjektives Buch über die Gartenarbeit verfasst. Man findet darin nicht nur hilfreiche Informationen zum Büschepflanzen, Zwiebelnsetzen und Blumengießen, sondern auch sehr amüsante Abschweifungen zu allerlei Fragen, die einem beim Unkrautjäten durch den Kopf gehen.', 'BOOK', 'Franziska', 'Augstein', 'Kindle Edition', '167 Fleet Street, London EC4A 2EA', '2024-01-10', 'available'),
(10, 'The Lost Symbol', 'https://m.media-amazon.com/images/I/71CxYdUk3wL._SX342_.jpg', '15-123-123-123-15', 'About sales tax (or VAT) About sales tax (or VAT)', 'Your order may include items from one or more Marketplace sellers. Since each of these sellers has different sales tax (or VAT) obligations, all Marketplace prices for orders shipped to delivery addresses within the EU and Northern Ireland are displayed as final prices indicated by the seller.', 'DVD', 'Dan', 'Brown', 'Kindle Edition', '167 Fleet Street, London EC4A 2EA', '2024-01-16', 'available'),
(11, 'Inferno', 'https://m.media-amazon.com/images/I/81nZai5GB9L._SY445_.jpg', '[16-123-123-123-16]', 'Tom Hanks (Darsteller), Felicity Jones (Darsteller)', 'Prices for items sold by Amazon include VAT. Depending on your delivery address, VAT may vary at Checkout. For other items, please see details.', 'DVD', 'Dan', 'Brown', 'Kindle Edition', '167 Fleet Street, London EC4A 2EA', '2016-03-10', 'available'),
(12, 'The Da Vinci Code', 'https://m.media-amazon.com/images/I/71y4X5150dL._SL1500_.jpg', '3-8301-9807-3-879', 'The Louvre, Paris: the elderly curator of the museum ', 'The Louvre, Paris: the elderly curator of the museum has been violently murdered in the Grand Gallery. Harvard professor Robert Langdon is summoned to decipher the baffling codes which the police find alongside the body. As he and a gifted French cryptologist, Sophie Neveu, sort through the bizarre riddles, they are stunned to find a trail that leads to the works of Leonardo Da Vinci - and suggests the answer to an age-old mystery that stretches deep into the vault of history.', 'BOOK', 'Dan', 'Brown', 'Robert Langdon', '167 Fleet Street, London EC4A 2EA', '2014-03-02', 'available'),
(13, 'Fifty Shades ', 'https://m.media-amazon.com/images/I/51S8q+RoI4L._SY300_.jpg', '35-123-123-123-35', ' Sie ist 21, Literaturstudentin und ', 'Sie ist 21, Literaturstudentin und in der Liebe nicht allzu erfahren. Doch dann lernt Ana Steele den reichen und ebenso unverschämt selbstbewussten wie attraktiven Unternehmer Christian Grey bei einem Interview für ihre Uni-Zeitung kennen. Und möchte ihn', 'DVD', 'E L ', 'James', 'Kindle Edition', '147 Fleet Street, London EC4A 2BU', '2023-06-29', 'available'),
(14, 'Fifty Shades ', 'https://m.media-amazon.com/images/I/51S8q+RoI4L._SY300_.jpg', '35-123-123-123-35', 'DSNLA;F:-AMD KLLFMQLÖEGMQGL', 'LKSAFJjkdmölaamdsvkvma lkdjklgajaöl', 'DVD', 'E L ', 'James', 'Kindle Edition', '147 Fleet Street, London EC4A 2BU', '2023-06-29', 'available'),
(15, 'Fifty Shades ', '6602bfb085d83.jpg', '35-123-123-123-35', 'DSNLA;F:-AMD KLLFMQLÖEGMQGL', 'LKSAFJjkdmölaamdsvkvma lkdjklgajaöl', 'DVD', 'E L ', 'James', 'Kindle Edition', '147 Fleet Street, London EC4A 2BU', '2023-06-29', 'available');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
