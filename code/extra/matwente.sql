-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 02 jul 2021 om 17:42
-- Serverversie: 10.4.18-MariaDB
-- PHP-versie: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matwente`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `configuraties`
--

CREATE TABLE `configuraties` (
  `ConfiguratieID` int(11) NOT NULL,
  `schermmerk` varchar(50) NOT NULL,
  `schermmaat` varchar(50) NOT NULL,
  `laptop_computer` varchar(50) NOT NULL,
  `browser` varchar(50) NOT NULL,
  `software` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `configuraties`
--

INSERT INTO `configuraties` (`ConfiguratieID`, `schermmerk`, `schermmaat`, `laptop_computer`, `browser`, `software`) VALUES
(1, 'Dell', '24 inch.', 'Laptop', 'Google Chrome', 'Windows 10'),
(2, 'Dell', '27 inch.', 'Desktop', 'Google Chrome', 'Windows 10'),
(3, 'Philips', '24 inch.', 'Laptop', 'Safari', 'Apple macOS'),
(4, 'Apple', '27 inch.', 'Desktop', 'Safari', 'Apple macOS');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `incidenten`
--

CREATE TABLE `incidenten` (
  `IncidentID` int(11) NOT NULL,
  `ConfiguratieID` int(11) NOT NULL,
  `MedewerkerID` int(11) NOT NULL,
  `datum` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL DEFAULT 'In behandeling',
  `prioriteit` varchar(50) NOT NULL,
  `aanmelddag` varchar(50) NOT NULL,
  `soortmelding` varchar(50) NOT NULL,
  `gebruiker` varchar(50) NOT NULL,
  `omschrijvingkort` varchar(250) NOT NULL,
  `meerinfo` varchar(500) NOT NULL,
  `betaantalgeb` int(11) NOT NULL,
  `afhandeltijd (u)` varchar(50) NOT NULL,
  `verantwoordelijke` varchar(50) NOT NULL,
  `oorzaak` varchar(250) NOT NULL,
  `oplossing` varchar(250) NOT NULL,
  `terugkoppeling` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `incidenten`
--

INSERT INTO `incidenten` (`IncidentID`, `ConfiguratieID`, `MedewerkerID`, `datum`, `status`, `prioriteit`, `aanmelddag`, `soortmelding`, `gebruiker`, `omschrijvingkort`, `meerinfo`, `betaantalgeb`, `afhandeltijd (u)`, `verantwoordelijke`, `oorzaak`, `oplossing`, `terugkoppeling`) VALUES
(1, 2, 53, '2021-04-07 13:01:46', 'In behandeling', '', 'Dinsdag', 'Hardware of software', '', 'Scherm loopt soms vast.', 'Mijn huidige scherm heb ik pas een week, maar nu al loopt die soms vast. Steeds als de computer zware programma\'s moet draaien gebeurt dit, dus ik denk dat het daar iets mee te maken heeft.', 1, '', 'MaTW - ICT Afdeling', '', '', ''),
(2, 4, 54, '2021-04-07 16:14:25', 'In behandeling', '', 'Woensdag', 'Software', '', 'Het roosterprogramma verliest regelmatig de verbinding.', 'Wanneer ik probeer om een wijziging in te voeren in het roosterprogramma dat we gebruiken, lukt dit soms niet doordat de verbinding steeds wegvalt.', 2, '', 'MaTW - ICT Afdeling', '', '', ''),
(3, 3, 55, '2021-04-07 17:14:40', 'In behandeling', '', 'Dinsdag', 'Software', '', 'Documenten worden niet juist opgeslagen.', 'Als ik verslagen wil opslaan op mijn computer duurt dit vaak óf te lang, óf het lukt helemaal niet. Het lijkt erop dat dit alleen gebeurt bij grote verslagen.', 1, '', 'MaTW - ICT Afdeling', '', '', ''),
(4, 2, 53, '2021-04-07 18:06:27', 'In behandeling', '', 'Woensdag', 'Hardware', '', 'Computer valt steeds uit.', 'Zodra ik zware taken moet verrichten op mijn computer begeeft hij het en start hij steeds opnieuw op. Erg vervelend en ook gevaarlijk doordat ik mijn werk nu zomaar kan verliezen.', 1, '', 'MaTW - ICT Afdeling', '', '', ''),
(5, 3, 8, '2021-04-10 18:07:57', 'In behandeling', '', 'Maandag', '', 'M.   Barney', 'Wachtwoord vergeten', 'Mark Barney weet na zijn vakantie zijn wachtwoord niet meer.', 1, '0,1', 'MaTW - ICT Afdeling', 'Niet van toepassing', 'Wachtwoord gereset naar standaard waarden. Optie Change password at next logon aagezet.', 'Gebruiker gebeld met nieuw tijdelijk wachtwoord.'),
(6, 4, 41, '2021-04-10 18:07:57', 'In behandeling', '', 'Maandag', '', 'R.   Jansz.', 'Bestand met planning van project is weg.', 'Bestand staat niet meer in de map van het project. Bestand is vorige week dinsdag voor het laatst aangevuld en opgeslagen.', 2, '1', 'MaTW - ICT Afdeling', 'Bestand gewist', 'Bestand teruggehaald van restore.', 'Gemeld dat bestand terug staat.'),
(7, 3, 20, '2021-04-10 18:07:57', 'In behandeling', '', 'Maandag', '', 'J.   Matse', 'E-mail niet beschikbaar', 'E-mailomgeving is niet te benaderen door kantoor en buitendienst medewerkers.', 80, '2', 'Hosting provider', 'DNS-configuratie fout Hosting provider', 'Provider gecontact, deze hebben de fout in DNS-server opgelost. Aanpassing duurt 4 uur voordat deze overal doorwerkt.', 'Alle gebruikers een e-mail gestuurd dat het probleem opgelost is.\r\n'),
(8, 3, 24, '2021-04-10 18:07:57', 'In behandeling', '', 'Maandag', '', 'H.  Akta?', 'Secties in Word', 'Gebruiker wil een pagina in een Word document landscape afdrukken. Pagina\'s voor en na deze pagina dienen portrait te blijven.', 1, '0,5', 'MaTW - ICT Afdeling', 'Secties gebruiken', 'Met gebruiker meegekeken, de werking van secties uitgelegd en samen ingesteld voor het document.', 'Niet van toepassing.'),
(9, 4, 9, '2021-04-10 18:07:57', 'In behandeling', '', 'Maandag', '', 'K.  Ali', 'Piepjes bij aanzetten laptop', 'Als laptop opstart alleen drie piepjes te horen. Laptop doet verder niets.', 1, '1,5', 'MaTW - ICT Afdeling', 'Geheugen vervangen', 'Geheugen blijkt defect. Geheugen vervangen. Geheugen wordt RMA gestuurd.', 'Gebruiker heeft laptop direct meegenomen.'),
(10, 3, 48, '2021-04-10 18:07:58', 'In behandeling', '', 'Dinsdag', '', 'E.  Aslan', 'E-mail op priv?tablet', 'Gebruiker wilt zakeljke e-mail op priv?tablet', 1, '0,25', 'MaTW - ICT Afdeling', 'Standaard instellingen', 'Telefonisch samen met de gebruiker tablet ingesteld.', 'Niet van toepassing.'),
(11, 1, 42, '2021-04-10 18:07:58', 'In behandeling', '', 'Dinsdag', '', 'D. van den Bergh', 'Breuk in laptopscherm', 'Laptop is gevallen. Er zit nu een breuk in scherm.', 1, '1,5', 'MaTW - ICT Afdeling', 'Tijdelijk andere laptop', 'Data overgezet naar tijdelijke laptop. Deze laptop wordt opgestuurd naar leverancier voor reparatie.', 'Aan gebruiker gemeld dat nieuwe laptop opgehaald kan worden.'),
(12, 1, 10, '2021-04-10 18:07:58', 'In behandeling', '', 'Dinsdag', '', 'Z.  Bozkurt', 'Wachtwoord omzetten', 'Ik wil e-mailinstellingen van een extern e-mailadres op mijn tablet instellen, maar ik weet het wachtwoord niet meer. Account met wachtwoord zit nog wel op laptop van de zaak.', 1, '1', 'MaTW - ICT Afdeling', 'Wachtwoord terug gezocht.', 'Met behulp van wachtwoord tool wachtwoord in Outlook zichtbaar gemaakt.', 'Wachtwoord telefonisch aan gebruiker doorgegeven.'),
(13, 1, 2, '2021-04-10 18:07:58', 'In behandeling', '', 'Woensdag', '', 'V.  Campbell', 'Buitendienstmedewerkers geen toegang tot urenadministratie', 'Alle buitendienstmedewerkers kunnen na de update niet meer inloggen op de urenadministratie.', 1, '3', 'MaTW - ICT Afdeling', 'IP-routing niet goed', 'Route naar VPN server toegevoegd aan routing tabel van server.', 'Alle buitendienstmedewerkers gemaild.'),
(14, 2, 43, '2021-04-10 18:07:58', 'In behandeling', '', 'Woensdag', '', 'O.  Chamberlain', 'Hoe stel ik de afwezigheidsassistent in?', 'Gebruiker wil tijdens vakantie afwezigheidsassistent aanzetten.', 1, '0,25', 'MaTW - ICT Afdeling', 'Bedrijfsbeleid uitgelegd', 'Uitgelegd aan gebruiker dat deze optie niet aanstaat in het systeem. Bedrijfsbeleid is om collega\'s tijdens de vakantie toegang te geven tot je mailbox zodat deze de mail kunnen bijhouden.', 'Niet van toepassing.'),
(15, 4, 5, '2021-04-10 18:07:58', 'In behandeling', '', 'Woensdag', '', 'F.  ?i?ek', 'per ongeluk een bestand verwijderd', 'Op de harddisk van mijn laptop heb ik per ongeluk een bestand verwijderd. Dit is een rapportage die ik nog niet had opgeslagen op de server. Hier zit drie weken werk in. Het is belangrijk dat deze terug komt.', 1, '3', 'MaTW - ICT Afdeling', 'Bestand gerecoverd', 'Met tool bestand teruggehaald.', 'Bestand op server gezet en gebruiker gemaild.'),
(16, 2, 11, '2021-04-10 18:07:58', 'In behandeling', '', 'Donderdag', '', 'A.  Conley', 'Pc reageert heel traag ook na herstarten', 'Pc is traag. Ook nadat door ICT-afdeling een nieuwe image ge?nstalleerd is.', 1, '2', 'MaTW - ICT Afdeling', 'BIOS-instellingen goed zetten', 'Na draaien van performace tool bleken BIOS-instellingen geheugen niet goed te staan.', 'Gebruiker laptop terug gegeven.'),
(17, 1, 26, '2021-04-10 18:07:58', 'In behandeling', '', 'Donderdag', '', 'V.  Van Delen', 'Lokaal wachtwoord kwijt', 'Gebruiker is het wachtwoord van priv?laptop vergeten. Graag wachtwoord verwijderen of instellen op ander wachtwoord.', 1, '1,5', 'MaTW - ICT Afdeling', 'Wachtwoord teruggezocht', 'Met behulp van tool Windows wachtwoord achterhaald.', 'Wachtwoord telefonisch aan gebruiker doorgegeven.'),
(18, 1, 34, '2021-04-10 18:07:58', 'In behandeling', '', 'Donderdag', '', 'F.  Van Erp', 'Vreemde pagina\'s op internet', 'Bij opstarten internetbrowser worden advertenties getoond. Bij wegklikken komen er steeds meer advertenties.', 1, '1', 'MaTW - ICT Afdeling', 'Malware verwijderd', 'Malware van laptop verwijderd.', 'Gebruiker gemeld en komt laptop weer ophalen.'),
(19, 4, 45, '2021-04-10 18:07:58', 'In behandeling', '', 'Vrijdag', '', 'D.  Festetics de Tolna', 'Iemand probeert in te loggen op laptop', 'Ik heb het idee dat iemand op afstand probeert in te loggen op mijn laptop. Is het mogelijk om hier iets van te achterhalen?', 1, '0,5', 'MaTW - ICT Afdeling', 'Logfiles bekeken', 'Remote log\'s bekeken en er probeert inderdaad iemand via remote desktop in te loggen. Remote desktop op laptop is nu uitgezet.', 'Telefonisch aan gebruiker doorgegeven.'),
(20, 2, 35, '2021-04-10 18:07:58', 'In behandeling', '', 'Vrijdag', '', 'J.  Flugi van Aspermont', 'Geen VPN-toegang', 'Buitendienstmedewerkers hebben geen toegang meer tot het netwerk.', 40, '4', 'MaTW - ICT Afdeling', 'Interface in router defect', 'WAN-interface van router die werkt als VPN-server defect. Reservekaart geplaatst, opnieuw geconfigureerd en getest.', 'Alle buitendienstmedewerkers gemaild.'),
(21, 4, 25, '2021-04-14 14:12:12', 'In behandeling', '', 'Maandag', '', 'S Harrison', 'Nieuwe medewerker op projectplanning', 'Er is een nieuwe medewerkster aangenomen voor projectplanning. Haar naam is Fee Willemse. Ze begint volgende week maandag. Graag account aanmaken met dezelfde rechten als die van haar collega Sigrid van der Wiel.', 1, '0,25', 'MaLoZ - ICT Afdeling', 'Niet van toepassing', 'Gebruiker is aangemaakt.', 'Mail met login gegevens verzonden aan hoofd van afdeling.'),
(22, 3, 44, '2021-04-14 14:12:12', 'In behandeling', '', 'Maandag', '', 'L Hesselt van Dinter', 'PC loopt soms vast', 'Detail informatie: Na een half uur werken met de pc wordt het scherm zwart en slaat de pc uit. Na 5 minuten kan de pc weer gebruikt worden, maar werkt dan nog ongeveer een kwartier voordat hij weer uitvalt.', 1, '3', 'MaLoZ - ICT Afdeling', 'CPU-koeling zal vol met stof.', 'Pc schoongemaakt en getest. Probleem lijkt verholpen.', 'Pc terug geplaatst en aan gebruiker gemeld.'),
(24, 4, 21, '2021-04-14 14:12:12', 'In behandeling', '', 'Maandag', '', 'N Kinschot, Van', 'Wachtwoord vergeten', 'Sarisa de Hoogt weet na vakantie haar wachtwoord niet meer.', 1, '0,1', 'MaLoZ - ICT Afdeling', 'Niet van toepassing', 'Wachtwoord gereset naar standaard waarden. Optie Change password at next logon aagezet.', 'Gebruiker gebeld met nieuw tijdelijk wachtwoord.'),
(25, 2, 15, '2021-04-14 14:12:12', 'In behandeling', '', 'Dinsdag', '', 'P Koning', 'PC start niet meer op', 'Bij het opstarten van de pc verschijnt de melding: Boot failure. Reboot en Select proper Boot device or Insert Boot Media in selected Boot device', 1, '1,5', 'MaLoZ - ICT Afdeling', 'Defecte harddisk', 'Hardisk vervangen en standaard image terug gezet.', 'Persoonlijk aan gebuiker doorgegeven dat pc weer werkt.'),
(26, 4, 25, '2021-04-14 15:52:39', 'In behandeling', '', 'Maandag', '', 'S Harrison', 'Nieuwe medewerker op projectplanning', 'Er is een nieuwe medewerkster aangenomen voor projectplanning. Haar naam is Fee Willemse. Ze begint volgende week maandag. Graag account aanmaken met dezelfde rechten als die van haar collega Sigrid van der Wiel.', 1, '0,25', 'MaLoZ - ICT Afdeling', 'Niet van toepassing', 'Gebruiker is aangemaakt.', 'Mail met login gegevens verzonden aan hoofd van afdeling.'),
(27, 3, 44, '2021-04-14 15:52:39', 'In behandeling', 'Urgent', 'Maandag', 'Hardware', 'L Hesselt van Dinter', 'PC loopt soms vast', 'Detail informatie: Na een half uur werken met de pc wordt het scherm zwart en slaat de pc uit. Na 5 minuten kan de pc weer gebruikt worden, maar werkt dan nog ongeveer een kwartier voordat hij weer uitvalt.', 1, '2', 'MaLoZ - ICT Afdeling', 'CPU-koeling zal vol met stof.', 'Pc schoongemaakt en getest. Probleem lijkt alweer verholpen.', 'Pc terug geplaatst en aan gebruiker gemeld.'),
(28, 1, 14, '2021-04-14 15:52:39', 'In behandeling', '', 'Maandag', '', 'M Hugenpoth, Van', 'Secretariaat zonder netwerk', 'Alle pc\'s van het secretariaat geven aan dat ze niet verbonden zijn met een netwerk.', 6, '2', 'MaLoZ - ICT Afdeling', 'Switch defect', 'Switch was defect. Deze is vervangen. Nieuwe switch is voorzien van de juiste configuratie-instellingen.', 'Bij afdeling langs gelopen om te vertellen dat het probleem verholpen is.'),
(29, 4, 21, '2021-04-14 15:52:40', 'In behandeling', '', 'Maandag', '', 'N Kinschot, Van', 'Wachtwoord vergeten', 'Sarisa de Hoogt weet na vakantie haar wachtwoord niet meer.', 1, '0,1', 'MaLoZ - ICT Afdeling', 'Niet van toepassing', 'Wachtwoord gereset naar standaard waarden. Optie Change password at next logon aagezet.', 'Gebruiker gebeld met nieuw tijdelijk wachtwoord.'),
(35, 2, 15, '2021-04-14 15:55:11', 'In behandeling', '', 'Dinsdag', '', 'P Koning', 'PC start niet meer op', 'Bij het opstarten van de pc verschijnt de melding: Boot failure. Reboot en Select proper Boot device or Insert Boot Media in selected Boot device.', 1, '1,5', 'MaLoZ - ICT Afdeling', 'Defecte harddisk', 'Hardisk vervangen en standaard image terug gezet.', 'Persoonlijk aan gebuiker doorgegeven dat pc weer werkt.'),
(38, 2, 53, '2021-04-28 15:07:52', 'In behandeling', 'Urgent', 'Woensdag', 'Software', 'J Jansen', 'Word loopt vaak vast', 'Word loopt steeds vast. Het zou te maken kunnen hebben met de laatste update.', 1, '2', 'MaTW - ICT Afdeling', 'Update was niet correct uitgevoerd', 'Update is opnieuw uitgevoerd', 'Wijzigingen na update uitgelegd aan medewerker');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `medewerkers`
--

CREATE TABLE `medewerkers` (
  `MedewerkerID` int(11) NOT NULL,
  `ConfiguratieID` int(11) NOT NULL,
  `geslacht` varchar(50) NOT NULL,
  `voorletter` varchar(50) NOT NULL,
  `achternaam` varchar(50) NOT NULL,
  `afdeling` varchar(50) NOT NULL,
  `telnr` varchar(50) NOT NULL,
  `gebnaam` varchar(50) NOT NULL,
  `wachtwrd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `medewerkers`
--

INSERT INTO `medewerkers` (`MedewerkerID`, `ConfiguratieID`, `geslacht`, `voorletter`, `achternaam`, `afdeling`, `telnr`, `gebnaam`, `wachtwrd`) VALUES
(2, 1, 'Dhr.', 'V', 'Campbell', 'CAD', '254', '', ''),
(3, 2, 'Dhr.', 'S', 'Geerman', 'CAD', '253', '', ''),
(4, 3, 'Mevr.', 'S', 'Nahuys, (Van)', 'CAD', '252', '', ''),
(5, 4, 'Mevr.', 'F', 'Çiçek', 'Directie', '235', '', ''),
(6, 1, 'Dhr.', 'O', 'Neville', 'Directie', '236', '', ''),
(7, 2, 'Mevr.', 'M', 'Oldeneel tot Oldenzeel, Van', 'Directie', '234', '', ''),
(8, 3, 'Dhr.', 'M', ' Barney', 'Engeneering', '250', '', ''),
(9, 4, 'Mevr.', 'K', 'Ali', 'Engeneering', '244', '', ''),
(10, 1, 'Dhr.', 'Z', 'Bozkurt', 'Engeneering', '239', '', ''),
(11, 2, 'Mevr.', 'A', 'Conley', 'Engeneering', '245', '', ''),
(12, 3, 'Mevr.', 'H', 'Grotenhuis van Onstein, Van', 'Engeneering', '241', '', ''),
(13, 4, 'Dhr.', 'C', 'Hall', 'Engeneering', '240', '', ''),
(14, 1, 'Mevr.', 'M', 'Hugenpoth, Van', 'Engeneering', '242', '', ''),
(15, 2, 'Dhr.', 'P', 'Koning', 'Engeneering', '237', '', ''),
(16, 3, 'Dhr.', 'B', 'Rochussen', 'Engeneering', '247', '', ''),
(17, 4, 'Mevr.', 'K', 'Schwartzenberg en Hohenlansberg, Thoe', 'Engeneering', '246', '', ''),
(18, 1, 'Mevr.', 'J', 'Wilder', 'Engeneering', '249', '', ''),
(19, 2, 'Mevr.', 'E', 'Yalçin', 'Engeneering', '248', '', ''),
(20, 3, 'Dhr.', 'J', 'Matse', 'Financiele Administratie', '290', '', ''),
(21, 4, 'Mevr.', 'N', 'Kinschot, Van', 'Financiele Administratie', '290', '', ''),
(22, 1, 'Mevr.', 'K', 'Nguyen', 'Financiele Administratie', '290', '', ''),
(23, 2, 'Dhr.', 'A', 'Girard de Mielet van Coehoorn, De', 'HRM', '276', '', ''),
(24, 3, 'Mevr.', 'H', 'Aktaş', 'ICT', '278', '', ''),
(25, 4, 'Dhr.', 'S', 'Harrison', 'ICT', '279', '', ''),
(26, 1, 'Mevr.', 'V', 'Delen, Van', 'Onderzoek', '263', '', ''),
(27, 2, 'Dhr.', 'T', 'Gülcher', 'Onderzoek', '264', '', ''),
(28, 3, 'Mevr.', 'L', 'Leyden, Van', 'Onderzoek', '282', '', ''),
(29, 4, 'Dhr.', 'A', 'Posson, De', 'Onderzoek', '261', '', ''),
(30, 1, 'Mevr.', 'M', 'Tahiri', 'Onderzoek', '265', '', ''),
(31, 2, 'Dhr.', 'J', 'Thompson', 'Onderzoek', '266', '', ''),
(32, 3, 'Dhr.', 'L', 'Vos van Steenwijk, De', 'Onderzoek', '281', '', ''),
(33, 4, 'Dhr.', 'E', 'Westreenen van Tiellandt, Van', 'Onderzoek', '280', '', ''),
(34, 1, 'Dhr.', 'F', 'Erp, Van', 'Planning', '260', '', ''),
(35, 2, 'Mevr.', 'J', 'Flugi van Aspermont', 'Planning', '262', '', ''),
(36, 3, 'Dhr.', 'V', 'Harrison', 'Project planning', '259', '', ''),
(37, 4, 'Mevr.', 'K', 'Malik', 'Project planning', '258', '', ''),
(38, 1, 'Dhr.', 'L', 'Sasse van Ysselt, Van', 'Project planning', '257', '', ''),
(39, 2, 'Mevr.', 'M', 'Schinne, Van', 'Project planning', '251', '', ''),
(40, 3, 'Mevr.', 'T', 'Wolters', 'Project planning', '256', '', ''),
(41, 4, 'Dhr.', 'R', 'Jansz.', 'Rapportage', '277', '', ''),
(42, 1, 'Mevr.', 'D', 'Bergh, Van Benthem van den', 'Rapportage', '268', '', ''),
(43, 2, 'Dhr.', 'O', 'Chamberlain', 'Rapportage', '275', '', ''),
(44, 3, 'Dhr.', 'L', 'Hesselt van Dinter', 'Rapportage', '267', '', ''),
(45, 4, 'Mevr.', 'D', 'Festetics de Tolna', 'Secretariaat', '243', '', ''),
(46, 1, 'Mevr.', 'S', 'Sandberg', 'Secretariaat', '238', '', ''),
(47, 2, 'Mevr.', 'B', 'Wydenbruck, Von', 'Secretariaat', '255', '', ''),
(48, 3, 'Dhr.', 'E', 'Aslan', 'Verkoop en Marketing', '270', '', ''),
(49, 4, 'Mevr.', 'F', 'Suasso, Lopes', 'Verkoop en Marketing', '270', '', ''),
(50, 1, 'Mevr.', 'J', 'Thompson', 'Verkoop en Marketing', '270', '', ''),
(53, 2, 'Dhr.', 'J', 'Jansen', 'Engineering', '310', 'jjansen', '$2y$10$BgAWB2CmA06JUloYGRtXrOHxQCIjqXUjXagAq2m0Ub53jQIf1/wQi'),
(54, 4, 'Dhr.', 'H', 'Hendriksen', 'Directie', '311', 'hhendriksen', '$2y$10$xh6Z/Fkg8nmyd0Yl0Q52a.evMoAr0kx4tnIyuHd6toNa.b3d02wFi'),
(55, 3, 'Mevr.', 'S', 'Willemsen', 'Directie', '315', 'swillemsen', '$2y$10$nakkeW3XD9utmf7gukJOsuRddZIYJxIxa5gYXzwiI1pb1sRVbLiPS'),
(56, 2, 'Dhr.', 'D', 'Derksen', 'MaTW - ICT Afdeling', '320', 'dderksen', '$2y$10$XCoWsXyGfhOqNnFCqa2.yur3khbgxjvksYpyA2RPlQMAkaAX2Scte');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `configuraties`
--
ALTER TABLE `configuraties`
  ADD PRIMARY KEY (`ConfiguratieID`);

--
-- Indexen voor tabel `incidenten`
--
ALTER TABLE `incidenten`
  ADD PRIMARY KEY (`IncidentID`),
  ADD KEY `ConfiguratieID` (`ConfiguratieID`),
  ADD KEY `MedewerkerID` (`MedewerkerID`);

--
-- Indexen voor tabel `medewerkers`
--
ALTER TABLE `medewerkers`
  ADD PRIMARY KEY (`MedewerkerID`),
  ADD KEY `ConfiguratieID` (`ConfiguratieID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `configuraties`
--
ALTER TABLE `configuraties`
  MODIFY `ConfiguratieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `incidenten`
--
ALTER TABLE `incidenten`
  MODIFY `IncidentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT voor een tabel `medewerkers`
--
ALTER TABLE `medewerkers`
  MODIFY `MedewerkerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `incidenten`
--
ALTER TABLE `incidenten`
  ADD CONSTRAINT `configuratie2` FOREIGN KEY (`ConfiguratieID`) REFERENCES `configuraties` (`ConfiguratieID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `medewerker` FOREIGN KEY (`MedewerkerID`) REFERENCES `medewerkers` (`MedewerkerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `medewerkers`
--
ALTER TABLE `medewerkers`
  ADD CONSTRAINT `configuratie1` FOREIGN KEY (`ConfiguratieID`) REFERENCES `configuraties` (`ConfiguratieID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
