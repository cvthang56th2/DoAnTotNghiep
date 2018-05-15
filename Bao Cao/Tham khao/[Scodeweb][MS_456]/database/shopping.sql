-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 27, 2010 at 11:57 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `book1`
--

CREATE TABLE IF NOT EXISTS `book1` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(30) NOT NULL,
  `tomtat` mediumtext NOT NULL,
  `nxb` varchar(255) NOT NULL,
  `sotrang` int(11) NOT NULL,
  `kichthuoc` varchar(255) NOT NULL,
  `namxb` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `book1`
--

INSERT INTO `book1` (`id`, `title`, `author`, `price`, `tomtat`, `nxb`, `sotrang`, `kichthuoc`, `namxb`) VALUES
(11, '180 Thủ Thuật Và Mẹo Hay Trong Flash CS4  	180 Thủ Thuật Và Mẹo Hay Trong Flash CS4 ', 'Th.S Nguyễn Nam Thuận.', 72, '<h1>Giới thiệu về nội dung</h1>\r\n\r\nAdobe Flash Professional CS4 là phiên bản mới nhất của công cụ thiết kế Web đang rất thịnh hành hiện nay. Chương trình không những được sử dụng để tạo các hoạt hình đơn giản mà còn có công dụng rất cao trong việc tạo những Website ấn tượng và những ứng dụng Web chuyên nghiệp. Quyển sách "180 Thủ thuật và mẹo hay trong Flash CS4" sẽ hướng dẫn bạn đọc về các tính năng của ứng dụng này và cách vận dụng chúng một cách khéo léo và sáng tạo vào việc tạo hoạt hình.\r\n\r\nSách gồm 12 chương, được thiết kế phù hợp cho những người mới bắt đầu sử dụng Flash và những chuyên viên thiết kế Flash muốn tìm hiểu thêm về Flash CS4. Các chương đầu trình bày những vấn đề căn bản về việc tạo các thành phần đồ họa bằng cách sử dụng các công cụ vẽ của Flash CS4. Các chương tiếp theo sau đó sẽ hướng dẫn cách biến đổi các thành phần đồ họa thành những cảnh hoạt hình ấn tượng. Bên cạnh đó sách còn hướng dẫn nhiều nội dung thú vị khác liên quan đến hoạt hình với Flash. Sách được bố cục rõ ràng theo từng chương và đề mục, nội dung trình bày ngắn gọn kèm hình ảnh minh họa.\r\n\r\nMời bạn đón đọc.', 'NXB Hồng Đức ', 448, '16 x 24 cm ', '05 - 2010'),
(16, 'Thủ Thuật Lập Trình PHP', 'Phạm Mạnh Lâm. ', 12, '<h1>Giới thiệu về nội dung</h1>\r\nThủ Thuật Lập Trình PHP\r\n\r\nNội sách dung gồm 3 phần:\r\nPhần I: Hướng dẫn cho bạn cách thực hiện việc kiểm thử (test) các ứng dụng PHP: Phương pháp kiểm thử từng thành phần (unit test), cách tự động sinh mã lệnh kiểm thử, cách tạo robot kiểm thử…\r\nPhần II: Mang đến cho bạn đọc những thủ thuật để viết các ứng dụng chạy trên mọi hệ điều hành Windows, Linux, Macintosh và thậm chí cả PlayStation Portable (PSP), thủ thuật lập trình gửi tin nhắn (instant message)…. \r\nPhần III: Cung cấp những đoạn mã PHP để thực hiện những tính năng rất thú vị như bạn có thể tự tạo ra bản đồ giống như bản đồ của Google, xây dựng ứng dụng web chơi nhạc MP3…\r\n\r\nMời bạn đón đọc.', 'Giao thông vận tải ', 52, '19x27 cm', '12 - 2006'),
(12, 'Thực Hành AutoCad 2010 Bằng Hình Minh Họa  	Thực Hành AutoCad 2010 Bằng Hình Minh Họa', 'Nhiều Tác Giả.', 63, '<h1>Giới thiệu về nội dung</h1>\r\n\r\nKể từ năm 1982 AutoCAD đã là công cụ vẽ phổ biến cho những người sử dụng máy tính cá nhân. Cho đến nay, có thể nói có hàng triệu triệu người sử dụng AutoCAD để tạo bản vẽ, bao gồm các kiến trúc sư, kỹ sư, chuyên viên vẽ sơ đồ thiết kế, các quản lý dự án, và các học sinh sinh viên chuyên ngành thiết kế xây dựng.\r\n\r\n"Giáo trình AutoCAD 2010 thiết kế 2D và 3D" này được đặc biệt biên soạn dành cho các học sinh sinh viên làm quen với AutoCAD 2010. Đây cũng là giáo trình rất tiện lợi cho các thầy cô giáo dạy vẽ tại các trường cao đẳng và đại học sử dụng làm tài liệu hướng dẫn học tập cho các em.\r\n\r\nSách gồm 10 chương, hướng dẫn các thao tác thực hiện căn bản với AutoCAD 2010, vẽ các đối tượng khác nhau một cách nhanh chóng và chính xác, thiết lập các bản vẽ, tạo bản vẽ bằng những bước đơn giản, chỉnh sửa các đối tượng trong bản vẽ, tạo và chèn các khối vẽ, sử dụng các mẫu ký hiệu mặt cắt, tạo các bảng và chú thích, chèn và hiệu chỉnh các kích thước, chuẩn bị và in bản vẽ.\r\n\r\nBên cạnh những nội dung nêu trên, sách còn có 40 bài tập và 21 bài thực hành nhằm mục đích giúp các bạn học sinh sinh viên nhanh chóng nắm bắt vấn đề và vận dụng những kiến thức mình đã học được vào công việc thực tiễn. Cuối mỗi chương đều có phần câu hỏi ôn tập nhằm giúp bạn tự kiểm tra lại mức độ hiểu bài của mình.\r\n\r\nMời bạn đón đọc.', 'NXB Hồng Đức ', 346, '19x24', '4 - 2010'),
(13, 'Hướng Dẫn Thiết Kế Website', 'Water PC. ', 36, '<h1>Giới thiệu về nội dung</h1>\r\n\r\nNội dung cuốn sách này bao gồm:\r\n\r\nBài 1: Đôi điều với người thiết kế website\r\n\r\nBài 2: Tìm hiểu về ngôn ngữ HTML căn bản trong thiết kế Website\r\n\r\nBài 3: XML trong thiết kế Website\r\n\r\nBài 4: Sử dụng ngôn ngữ JavaScript trong thiết kế Website\r\n\r\nBài 5: Làm quen với Dreamweaver MX trong thiết kế web\r\n\r\nBài 6: Ngôn ngữ Perl\r\n\r\nBài 7: Trình duyệt web thông dụng\r\n\r\nMời bạn đón đọc.', 'Nxb Văn hóa Thông tin ', 256, '13 x 20.5 ', '11 - 2009 '),
(14, 'Giáo Trình Lập Trình Web PHP Và MY SQL - CD', 'T. Hoa ', 28, '', '', 0, '', ''),
(15, 'Thiết Kế Web Động Với PHP5', 'STEVEN HOLZNER', 57, '', '', 0, '', ''),
(17, 'Tự Học PHP Trong 24 Giờ', 'Thuận Thành.', 63, '', '', 0, '', ''),
(18, ' Quản Trị Windows Server 2008 - Tập 2 	Quản Trị Windows Server 2008 - Tập 2', 'Tô Thanh Hải.', 62, '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `book2`
--

CREATE TABLE IF NOT EXISTS `book2` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(30) NOT NULL,
  `tomtat` mediumtext NOT NULL,
  `nxb` varchar(255) NOT NULL,
  `sotrang` int(11) NOT NULL,
  `kichthuoc` varchar(255) NOT NULL,
  `namxb` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `book2`
--

INSERT INTO `book2` (`id`, `title`, `author`, `price`, `tomtat`, `nxb`, `sotrang`, `kichthuoc`, `namxb`) VALUES
(21, 'Tương lai của quản trị', 'Gary Hamel', 125, '<h1>Giới thiệu về nội dung:</h1>\r\n\r\nTrong tương lai của quản trị, Gary Hamel chứng minh rằng ngày nay các tổ chức đang cần đổi mới quản trị hơn bao giời hết. Mô hình quản trị hiện tại tập trung vào kiểm soát và tính hiệu quả - không còn phù hợp trong một thế giới mà khả năng thích nghi và tính sáng tạo là không thể thiếu để kinh doanh thành công. Không chỉ phá bỏ triệt để hệ thống niền tin cố hữu ngăn cản các công ty của thế kỷ XXI vượt qua những thách thức mới, Hamel còn đưa ra cách thức giúp các công ty từng bước trở thành nhà đổi mới quản trị, Hamel tiết lộ:\r\n\r\nNhững thách thức sống còn sẽ quyết định lợi thế cạnh tranh trong thế giới đầy biến động ngày nay.\r\n\r\nẢnh hưởng tiêu cực của những niềm tin cố hữu trong quản trị\r\n\r\nTiềm năng của Web trong quá trình dân chủ hóa việc thực hành quản trị\r\n\r\nNhững hành động mà công ty của bạn có thể thực hiện bây giờ để tạo dựng lợi thế quản trị cho bản thân.\r\n\r\nMời bạn đón đọc.\r\n', 'Nxb Đại học Kinh tế quốc dân', 404, '14.5x20.5 cm', '03/2010 '),
(22, 'Nghiệp Vụ Ngân Hàng Quốc Tế  ', 'Lê Văn Tư.', 122, '<h1>Giới thiệu về nội dung:</h1>\r\n\r\nNgày nay, mọi hoạt động thương mại, sản xuất và đầu tư ngày càng mang tính chất quốc tế hóa ở nhiều quốc gia. Chính sự toàn cầu hóa nền kinh tế thế giới đã làm tăng lượng giao dịch trong hoạt động tài chính, tiền tệ giữa các nước. Một nền kinh tế mở, tiến tới hội nhập với thị trường thế giới phải được một cơ cấu tài chính hiện đại vững mạnh hỗ trợ, trong đó hệ thống ngân hàng thông qua nghiệp vụ ngân hàng quốc tế, hỗ trợ cho sự phát triển của hoạt động ngoại thương và thu hút đầu tư quốc tế, thúc đẩy sự thành công của quá trình hội nhập kinh tế quốc tế.\r\nNghiệp vụ ngân hàng quốc tế của hệ thống ngân hàng phát triển sẽ thúc đẩy mạnh mẽ hoạt động xuất nhập khẩu của quốc gia, đồng thời là nhân tố tích cực kích thích sự luân chuyển các luồng vốn đầu tư quốc tế vào quốc gia đó. Chính thông qua nghiệp vụ ngân hàng quốc tế, các nhà kinh doanh và đầu tư nhanh chóng nắm bắt và làm chủ các thông lệ về tài chính quốc tế, để có thể thực hiện tốt và cạnh tranh trên lộ trình hội nhập với các nước phát triển có  kinh nghiệm và năng lực, nguồn lực gấp nhiều lần so với chúng ta.\r\nQuyển sách này giới thiệu các cơ chế cơ bản của nghiệp vụ ngân hàng quốc tế, cũng như các kỹ thuật trực tiếp rút ra từ các cơ chế này. Tác giả đã cố gắng thể hiện đơn giản và dễ hiểu các kỹ thuật chuyên sâu, và hy vọng quyển sách sẽ đáp ứng nhu cầu tìm hiểu của các nhà xuất nhập khẩu, các nhà hoạt động ngân hàng, các nhà nghiên cứu và các sinh viên của các trường cao đẳng và đại học khối kinh tế – tài chính – ngân hàng – ngoại thương – kinh doanh quốc tế....', ' Nxb Thanh Niên', 608, '16x24 cm', '2009'),
(23, 'Quản Trị Tài Chính Quốc Tế', 'Ngô Thị Ngọc Huyền.', 60, '', '', 0, '', ''),
(24, '36 Kế Ứng Dụng Trong Kinh Doanh Và Cuộc Sống', 'Ngọc Bích.', 55, '', '', 0, '', ''),
(25, 'Khác Biệt Hay Là Chết ', 'Jack Trout.', 68, '', '', 0, '', ''),
(26, '50 Lời Bàn Về Thành Công Của Những Người Nổi Tiếng', 'Hoàng Kim.', 23, '', '', 0, '', ''),
(27, '22 Quy Luật Cơ Bản Của Quảng Cáo - Những Quy Luật Cần Biết Để Xây Dựng Một Thương Hiệu Mạnh  	22 Quy Luật Cơ Bản Của Quảng Cáo - Những Quy Luật Cần Biết Để Xây Dựng Một Thương Hiệu Mạnh', 'Michael Newman.', 42, '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `book3`
--

CREATE TABLE IF NOT EXISTS `book3` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(30) NOT NULL,
  `tomtat` mediumtext NOT NULL,
  `nxb` varchar(255) NOT NULL,
  `sotrang` int(11) NOT NULL,
  `kichthuoc` varchar(255) NOT NULL,
  `namxb` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `book3`
--

INSERT INTO `book3` (`id`, `title`, `author`, `price`, `tomtat`, `nxb`, `sotrang`, `kichthuoc`, `namxb`) VALUES
(31, 'Luật đất đai', 'Trần Thị Thu Hạnh', 55, '<h1>Giới thiệu về nội dung:</h1>\r\n\r\nMục lục:\r\n\r\n \r\n\r\nChương I. Những qui định chung\r\n\r\nChương II.  Quyền của  Nhà nước đối với đất đai  và quản lý Nhà nước về đất đai \r\nChương III.  Chế độ sử dụng các loại đất.\r\nChương IV. Quyền và nghĩa vụ của người sử dụng đất.\r\nChương V.  Thủ tục hành chính về quản lý và sử dụng đất đai.\r\nChương VI. Thanh tra, giải quyết tranh chấp, khiếu nại tố cáo và xử lý vi phạm pháp luật về đất đai.       \r\nChương VII.  Điều khoản thi hành.\r\nPhụ lục ', 'Nxb Thống kê', 282, '14.5x20.5 cm', '2008'),
(32, 'Luật Đấu Thầu Và Văn Bản Hướng Dẫn Thực Hiện ', 'Nhiều Tác Giả.', 24, '', '', 0, '', ''),
(33, 'Luật Thương Mại  	Luật Thương Mại', 'Nhiều Tác Giả.', 27, '', '', 0, '', ''),
(34, 'Luật Kinh Doanh Việt Nam  	Luật Kinh Doanh Việt Nam', 'Nguyễn Quốc Sỹ.', 70, '', '', 0, '', ''),
(35, 'Pháp Luật Đại Cương', 'Lê Học Lâm.', 43, '', '', 0, '', ''),
(36, '3450 Thuật Ngữ Pháp Lý Phổ Thông  	3450 Thuật Ngữ Pháp Lý Phổ Thông', 'Nguyễn Ngọc Điệp.', 125, '', '', 0, '', ''),
(37, 'Giáo Trình Pháp Luật Đại Cương', 'Nguyễn Đăng Liêm.', 25, '', '', 0, '', ''),
(38, 'Luật Giáo Dục', 'Nhiều Tác Giả.', 8, '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `book4`
--

CREATE TABLE IF NOT EXISTS `book4` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(30) NOT NULL,
  `tomtat` mediumtext NOT NULL,
  `nxb` varchar(255) NOT NULL,
  `sotrang` int(11) NOT NULL,
  `kichthuoc` varchar(255) NOT NULL,
  `namxb` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `book4`
--

INSERT INTO `book4` (`id`, `title`, `author`, `price`, `tomtat`, `nxb`, `sotrang`, `kichthuoc`, `namxb`) VALUES
(41, 'Kỳ Thi Năng Lực Tiếng Nhật J.Test (A - D)', 'Nhiều Tác Giả.', 60, '', '', 0, '', ''),
(42, 'Essential Skills For Ielts - Expanding Vocabulary Through Reading  	', ': Hu Min - John A Gordon ', 78, '', '', 0, '', ''),
(43, 'English Communication For Your Career - Health Science (Kèm CD) ', 'Soh Yoon Hee.', 136, '', '', 0, '', ''),
(44, 'A Practical English Grammar  	A Practical English Grammar', 'Le Ton Hien.', 48, '', '', 0, '', ''),
(46, '54 Trọng Điểm Làm Bài Thi Môn Tiếng Anh', 'Nguyễn Hà Phương.', 60, '', '', 0, '', ''),
(47, 'Essential Speaking For Ielts (Dùng Kèm 1 Đĩa MP3)', 'Hu Min.', 110, '', '', 0, '', ''),
(48, 'Interactions 2 - Grammar', 'Patricia K. Werner.', 115, '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `book5`
--

CREATE TABLE IF NOT EXISTS `book5` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(30) NOT NULL,
  `tomtat` mediumtext NOT NULL,
  `nxb` varchar(255) NOT NULL,
  `sotrang` int(11) NOT NULL,
  `kichthuoc` varchar(255) NOT NULL,
  `namxb` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `book5`
--

INSERT INTO `book5` (`id`, `title`, `author`, `price`, `tomtat`, `nxb`, `sotrang`, `kichthuoc`, `namxb`) VALUES
(51, 'Thương trường đẫm lệ', 'Phù Thạch', 120, '', '', 0, '', ''),
(52, ' Xứ Cát - Tiểu Thuyết Khoa Học Giả Tưởng Lớn Nhất Mọi Thời Đại', 'Frank Herbert', 120, '', '', 0, '', ''),
(53, 'Người Đàn Ông Đa Cảm', 'Javier Marias', 39, '', '', 0, '', ''),
(54, 'Viết', 'Marguerite Duras ', 28, '', '', 0, '', ''),
(55, 'Hot Girl Tây Ban Nha ', 'Lisi Harrison. An Chi. ', 55, '', '', 0, '', ''),
(56, 'Cung Bậc Tình Yêu 2(Truyện Hay Song Ngữ Việt - Anh)', 'TÔN THẤT LAN', 28, '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `book6`
--

CREATE TABLE IF NOT EXISTS `book6` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(30) NOT NULL,
  `tomtat` mediumtext NOT NULL,
  `nxb` varchar(255) NOT NULL,
  `sotrang` int(11) NOT NULL,
  `kichthuoc` varchar(255) NOT NULL,
  `namxb` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `book6`
--

INSERT INTO `book6` (`id`, `title`, `author`, `price`, `tomtat`, `nxb`, `sotrang`, `kichthuoc`, `namxb`) VALUES
(62, 'Kim Dung Giữa Đời Tôi - Toàn Tập', 'Vũ Sao Đức Biển', 125, '', '', 0, '', ''),
(61, 'Đảo mộng mơ - (bìa cứng)', 'Nguyễn Nhật Ánh ', 99, '', '', 0, '', ''),
(63, 'Đường Cái Quan', 'Bùi Quang Đạt', 25, '', '', 0, '', ''),
(64, 'Đài các tiểu thư', 'Hồng Sakura', 35, '', '', 0, '', ''),
(65, 'Hai bầu trời', 'Khánh Phương', 24, '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `book7`
--

CREATE TABLE IF NOT EXISTS `book7` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(30) NOT NULL,
  `tomtat` mediumtext NOT NULL,
  `nxb` varchar(255) NOT NULL,
  `sotrang` int(11) NOT NULL,
  `kichthuoc` varchar(255) NOT NULL,
  `namxb` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `book7`
--

INSERT INTO `book7` (`id`, `title`, `author`, `price`, `tomtat`, `nxb`, `sotrang`, `kichthuoc`, `namxb`) VALUES
(71, 'Bí mật của một trí nhớ siêu phàm', 'Eran Katz', 59, '', '', 0, '', ''),
(72, 'Trí tuệ Do Thái - Jerome Becomes a Genius', 'Eran Katz', 79, '', '', 0, '', ''),
(73, 'Sao biển và nhện', 'Ori Brafman. Rod A. Beckstrom. ', 79, '', '', 0, '', ''),
(74, 'Những Nguyên Tắc Thành Công ', 'JACK CANFIELD ', 119, '', '', 0, '', ''),
(75, 'Ngụ Ngôn Nhỏ Trí Tuệ Lớn Thành Thông - ', 'Thành Thông', 39, '', '', 0, '', ''),
(76, 'Bài Học Từ Loài Chó - Sống Đơn Giản Để Thành Công Và Hạnh Phúc ', 'William Cottringer. ', 69, '', '', 0, '', ''),
(77, 'Lời Nói Có Đáng Tin?', 'Navarro', 140, '', '', 0, '', ''),
(78, 'ÉMILE HAY LÀ VỀ GIÁO DỤC', 'Jean-Jacques Rousseau', 131, '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `book8`
--

CREATE TABLE IF NOT EXISTS `book8` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(30) NOT NULL,
  `tomtat` mediumtext NOT NULL,
  `nxb` varchar(255) NOT NULL,
  `sotrang` int(11) NOT NULL,
  `kichthuoc` varchar(255) NOT NULL,
  `namxb` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=89 ;

--
-- Dumping data for table `book8`
--

INSERT INTO `book8` (`id`, `title`, `author`, `price`, `tomtat`, `nxb`, `sotrang`, `kichthuoc`, `namxb`) VALUES
(81, 'Em Phải Đến Harvard Học Kinh Tế (Trọn Bộ 4 Tập)', 'Harriet Beecher Stowe ', 254, '', '', 0, '', ''),
(82, 'NHỮNG CHẶNG ĐƯỜNG LỊCH SỬ', 'Võ Nguyên Giáp', 97, '', '', 0, '', ''),
(83, 'Cảm hứng theo 7 thói quen thành đạt ', 'Stephen R.Covey ', 95, '', '', 0, '', ''),
(84, ' Trần Huy Liệu - Cõi Người  ', 'TRẦN CHIẾN', 45, '', '', 0, '', ''),
(85, 'Những Người Nổi Tiếng ', 'Carolyn Keene', 55, '', '', 0, '', ''),
(86, '100 Người Phụ Nữ Có Ảnh Hưởng Lớn Ở Mọi Thời Đại ', 'Bùi Loan Thùy ', 75, '', '', 0, '', ''),
(87, 'Nguyễn Ái Quốc Với Nhật Ký Chìm Tàu ', 'Phạm Quý Thích', 75, '', '', 0, '', ''),
(88, 'Cuộc Chiến Bí Mật Của Roosevelt FDR Và Hoạt Động Gián Điệp Trong Thế Chiến II ', 'Joseph E.Persico ', 135, '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `book9`
--

CREATE TABLE IF NOT EXISTS `book9` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(30) NOT NULL,
  `tomtat` mediumtext NOT NULL,
  `nxb` varchar(255) NOT NULL,
  `sotrang` int(11) NOT NULL,
  `kichthuoc` varchar(255) NOT NULL,
  `namxb` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=99 ;

--
-- Dumping data for table `book9`
--

INSERT INTO `book9` (`id`, `title`, `author`, `price`, `tomtat`, `nxb`, `sotrang`, `kichthuoc`, `namxb`) VALUES
(92, 'Cây Giác Ngộ ', 'THÍCH TÂM QUANG', 49, '', '', 0, '', ''),
(93, 'Các Nhà Tư Tưởng Lớn Của Kitô Giáo', 'Hans Kung. - Dịch giả: Nguyễn Nghị', 70, '', '', 0, '', ''),
(94, '365 Ngày Chiêm Nghiệm Thiền Định Để Sống Đời Hạnh Phúc', 'DALAI LAMA ', 42, '', '', 0, '', ''),
(95, 'PHƯƠNG PHÁP NGỒI THIỀN', ' NGUYỄN TUỆ CHÂN', 56, '', '', 0, '', ''),
(96, 'Thuật Giả Kim Mới Hướng Bạn Vào Trong ', 'Osho ', 35, '', '', 0, '', ''),
(97, 'Tôn Giáo Học Nhập Môn ', 'Đỗ Minh Hợp', 83, '', '', 0, '', ''),
(98, 'Nền Tảng Đạo Phật - Tỉnh Thức Giác Ngộ Sống Đời Ý Nghĩa ', 'Sarah Napthali', 39, '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `book10`
--

CREATE TABLE IF NOT EXISTS `book10` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(30) NOT NULL,
  `tomtat` mediumtext NOT NULL,
  `nxb` varchar(255) NOT NULL,
  `sotrang` int(11) NOT NULL,
  `kichthuoc` varchar(255) NOT NULL,
  `namxb` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=109 ;

--
-- Dumping data for table `book10`
--

INSERT INTO `book10` (`id`, `title`, `author`, `price`, `tomtat`, `nxb`, `sotrang`, `kichthuoc`, `namxb`) VALUES
(101, 'Giúp bạn tự xử lý 175 bệnh thường gặp Tác Giả : BS. Donald M. Vickery -', 'James F. Fries ', 110, '', '', 0, '', ''),
(102, 'Ăn Gì Để Phòng Bệnh ', 'BÁC SĨ LÊ THUÝ TƯƠI', 30, '', '', 0, '', ''),
(103, 'Sức Khỏe Người Cao Tuổi ', 'Nguyễn Ý Đức ', 62, '', '', 0, '', ''),
(104, 'Tiếng Nói Cơ Thể Phụ Nữ ', 'HOÀNG ANH', 34, '', '', 0, '', ''),
(105, 'Chẩn Đoán Qua Tay Chữa Trị Bằng Chân - Các Bệnh Thường Gặp ', 'Đường Bình', 35, '', '', 0, '', ''),
(106, 'Trị Bệnh Bằng Thực Phẩm Thường Ngày', ' VƯƠNG MỘNG BƯU', 40, '', '', 0, '', ''),
(107, 'Những Quy Tắc Để Sống Khỏe ', 'Alpha Books', 49, '', '', 0, '', ''),
(108, 'Bệnh Tuyến Tiền Liệt Và Thực Đơn Phòng Chữa Trị ', 'Hải Minh ', 29, '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `book11`
--

CREATE TABLE IF NOT EXISTS `book11` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(30) NOT NULL,
  `tomtat` mediumtext NOT NULL,
  `nxb` varchar(255) NOT NULL,
  `sotrang` int(11) NOT NULL,
  `kichthuoc` varchar(255) NOT NULL,
  `namxb` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=116 ;

--
-- Dumping data for table `book11`
--

INSERT INTO `book11` (`id`, `title`, `author`, `price`, `tomtat`, `nxb`, `sotrang`, `kichthuoc`, `namxb`) VALUES
(111, 'Tập bản đồ hành chính Việt Nam, khổ A2 ', 'Nxb Bản đồ', 1080, '', '', 0, '', ''),
(112, 'Non Nước Việt Nam - Sắc Nét Trung Bộ ', 'Phạm Côn Sơn', 60, '', '', 0, '', ''),
(113, 'Đồng Bằng Sông Cửu Long - Nét Sinh Hoạt Xưa Và Văn Minh Miệt Vườn (Biên Khảo Sơn Nam, Bìa Cứng) ', 'Sơn Nam', 84, '<h1>Giới thiệu về nội dung:</h1>\r\n\r\nVới hơn 60 năm sống, đọc, tìm hiểu, nghiên cứu và viết, nhà văn - nhà Nam Bộ học Sơn Nam đã trao cho cuộc đời một gia tài thật đồ sộ - gần 60 tác phẩm đã được xuất bản, trong đó có không ít hơn 50 tác phẩm là của riêng ông.\r\n\r\n\r\nNói đến tác phẩm Sơn Nam là nói đến chủ đề về Nam Kỳ Lục Tỉnh, về đất, về người, về lịch sử khẩn hoang và phát triển của Nam Bộ.\r\nTừ sáu tỉnh ban đầu dưới triều Nguyễn gồm Biên Hòa, Gia Định, Định Tường, Vĩnh Long, An Giang và Hà Tiên trong đó có bốn tỉnh thuộc đồng bằng sông (trừ Biên Hòa và Gia Định) nay chúng ta có 13 tỉnh và thành phố trực ương. Sự phát triển không ngừng của đồng bằng sông Cửu Long trong những năm qua luôn hàm chứa những giá trị văn hóa tinh thần lớn lao do tiền nhân - những người đi khai hoang mở đất buổi đầu và qua nhiều thế hệ. Tìm hiểu về những giá trị văn hóa tinh thần đó cũng là tìm hiểu về nền văn minh của người mở đất, tìm hiểu nết ăn, nếp ở, tập quán sinh hoạt của một bộ phận người đã tạo nên diện mạo của một vùng văn hóa. \r\n\r\n\r\nTrong tinh thần đó, Nhà xuất bản Trẻ đã cho xuất bản tập sách Đồng Bằng Sông Cửu Long - Nét Sinh Hoạt Xưa Và Văn Minh Miệt Vườn.\r\nVăn minh miệt vườn là tác phẩm được tác giả hoàn thành giữa năm 1970 và được xuất bản lần đầu tại Sài Gòn năm 1970 bởi Nhà xuất bản An Tiêm. Còn Đồng bằng Sông Cửu Long - Nét sinh hoạt xưa là tác phẩm được viết sau ngày 30.4.1975 và được in lần đầu bởi Nhà xuất bản Thành phố Hồ Chí Minh năm 1985.\r\nTrong lần xuất bản này, 2 tác phẩm được in gộp thành một cuốn để bạn đọc tiện nghiên cứu.\r\nSách được trình bày bìa cứng, xin trân trọng giới thiệu cùng bạn. ', 'Nxb Trẻ', 423, '14x20 cm', ' 2008'),
(114, 'Tìm Hiểu Các Nước TrênThế Giới (202 Quốc Gia Và Vùng Lãnh Thổ) ', 'NGUYỄN VĂN DƯƠNG', 180, '', '', 0, '', ''),
(115, 'Quần Thể Di Tích Huế (Việt Nam - Di Sản Thế Giới)', ' Phan Thuận An', 51, '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `book12`
--

CREATE TABLE IF NOT EXISTS `book12` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(30) NOT NULL,
  `tomtat` mediumtext NOT NULL,
  `nxb` varchar(255) NOT NULL,
  `sotrang` int(11) NOT NULL,
  `kichthuoc` varchar(255) NOT NULL,
  `namxb` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`),
  KEY `title_2` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=129 ;

--
-- Dumping data for table `book12`
--

INSERT INTO `book12` (`id`, `title`, `author`, `price`, `tomtat`, `nxb`, `sotrang`, `kichthuoc`, `namxb`) VALUES
(121, 'Đại Việt Sử Ký Toàn Thư ( Trọn Bộ 3 cuốn )', 'NGÔ ĐỨC THỌ', 270, '', '', 0, '', ''),
(122, 'Triều Nguyễn và lịch sử của chúng ta', 'Trúc Phương', 70, '', '', 0, '', ''),
(123, 'Bí mật ở CANNES – The secret of Cannes', 'Trung Nghĩa', 48, '', '', 0, '', ''),
(124, 'Trường Sơn có một thời như thế', 'Nhiều tác giả', 78, '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `book13`
--

CREATE TABLE IF NOT EXISTS `book13` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(30) NOT NULL,
  `tomtat` mediumtext NOT NULL,
  `nxb` varchar(255) NOT NULL,
  `sotrang` int(11) NOT NULL,
  `kichthuoc` varchar(255) NOT NULL,
  `namxb` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=146 ;

--
-- Dumping data for table `book13`
--

INSERT INTO `book13` (`id`, `title`, `author`, `price`, `tomtat`, `nxb`, `sotrang`, `kichthuoc`, `namxb`) VALUES
(131, 'Học Đệm Ghi Ta', 'Cù Minh Nhật', 60, '', '', 0, '', ''),
(132, 'Đặng Thái Sơn - Người Được Chopin Chọn ', 'Ikuma Yoshiko', 45, '', '', 0, '', ''),
(133, 'Tự Học Piano Qua Hình Ảnh ', 'Mary Sue. Tere Stouffer', 45, '', '', 0, '', ''),
(134, 'Trịnh Công Sơn - Vết Chân Dã Tràng ', 'Ban Mai', 85, '', '', 0, '', ''),
(135, 'Chơi Đàn Guitar Bằng Hình Ảnh', 'Arthur Dick - Joe Bennett  ', 20, '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `book14`
--

CREATE TABLE IF NOT EXISTS `book14` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(30) NOT NULL,
  `tomtat` mediumtext NOT NULL,
  `nxb` varchar(255) NOT NULL,
  `sotrang` int(11) NOT NULL,
  `kichthuoc` varchar(255) NOT NULL,
  `namxb` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=146 ;

--
-- Dumping data for table `book14`
--

INSERT INTO `book14` (`id`, `title`, `author`, `price`, `tomtat`, `nxb`, `sotrang`, `kichthuoc`, `namxb`) VALUES
(142, 'Tinh Túy Võ Thuật: Ngũ Đại Môn Phái', 'Trần Tuấn Kiệt ', 30, '', '', 0, '', ''),
(143, 'Tôi Yêu Thể Thao - Bóng Rổ ', 'Cát Lợi. Lý Hưởng', 18, '', '', 0, '', ''),
(144, 'Võ Thuật Cổ Truyền Ứng Dụng Vào Sân Khấu - Điện Ảnh ', 'Nguyễn Thu Vân', 40, '', '', 0, '', ''),
(145, 'Dưới Ánh Sáng Của Thiền ', 'Mike George', 68, '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `book15`
--

CREATE TABLE IF NOT EXISTS `book15` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(30) NOT NULL,
  `tomtat` mediumtext NOT NULL,
  `nxb` varchar(255) NOT NULL,
  `sotrang` int(11) NOT NULL,
  `kichthuoc` varchar(255) NOT NULL,
  `namxb` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=156 ;

--
-- Dumping data for table `book15`
--

INSERT INTO `book15` (`id`, `title`, `author`, `price`, `tomtat`, `nxb`, `sotrang`, `kichthuoc`, `namxb`) VALUES
(151, 'Phụ Nữ Thời Trang Và Phong Cách', ' Nina Garcia. Ruben Toledo', 85, '', '', 0, '', ''),
(152, 'Những Phương Thuốc Làm Đẹp Từ Trái Cây ', 'Thiên Kim', 50, '', '', 0, '', ''),
(153, 'Làm Đẹp 365 Ngày ', 'Hứa Nguyện', 85, '', '', 0, '', ''),
(155, ' Móng Đẹp Ngày Xuân', 'NXB Mỹ Thuật', 25, '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `book16`
--

CREATE TABLE IF NOT EXISTS `book16` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(30) NOT NULL,
  `tomtat` mediumtext NOT NULL,
  `nxb` varchar(255) NOT NULL,
  `sotrang` int(11) NOT NULL,
  `kichthuoc` varchar(255) NOT NULL,
  `namxb` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=169 ;

--
-- Dumping data for table `book16`
--

INSERT INTO `book16` (`id`, `title`, `author`, `price`, `tomtat`, `nxb`, `sotrang`, `kichthuoc`, `namxb`) VALUES
(161, 'Hào Kiệt Đêm Thế Kỷ ', 'Minh Khoa', 125, '', '', 0, '', ''),
(162, 'Nghệ thuật kiến trúc thế giới ', 'Nguyễn Huy Côn', 37, '', '', 0, '', ''),
(163, 'Áo Dài Hoa Hậu Mai Phương Thuý', 'Nhiều Tác Giả', 55, '', '', 0, '', ''),
(164, '10 bí quyết hình ảnh', 'Lê Minh', 50, '', '', 0, '', ''),
(165, '10 Bí Quyết Thành Công Của Những Diễn Giả MC Tài Năng Nhất Thế Giới', ' Carmine Gallo', 48, '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE IF NOT EXISTS `danhmuc` (
  `Madm` int(11) NOT NULL,
  `Tendm` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`Madm`),
  UNIQUE KEY `Madm` (`Madm`),
  UNIQUE KEY `Madm_2` (`Madm`),
  UNIQUE KEY `Madm_5` (`Madm`),
  UNIQUE KEY `Tendm_3` (`Tendm`),
  KEY `Madm_3` (`Madm`),
  KEY `Madm_4` (`Madm`),
  KEY `Tendm` (`Tendm`),
  KEY `Tendm_2` (`Tendm`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`Madm`, `Tendm`) VALUES
(1, 'Tin học'),
(2, 'Kinh tế'),
(3, 'Pháp luật'),
(4, 'Sách ngoại ngữ'),
(5, 'Văn học nước ngoài'),
(6, 'Văn học trong nước'),
(7, 'Sách học làm người'),
(8, 'Danh nhân'),
(9, 'Sách tôn giáo'),
(10, 'Sách y khoa'),
(11, 'Địa lý'),
(12, 'Lịch sử'),
(13, 'Âm nhạc'),
(14, 'Thể thao'),
(15, 'Làm đẹp'),
(16, 'Nghệ thuật');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE IF NOT EXISTS `hoadon` (
  `hoadon_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `hoadon_khachhang` text CHARACTER SET utf8 NOT NULL,
  `hoadon_sanpham` text CHARACTER SET utf8 NOT NULL,
  `hoadon_tongtien` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `diachi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngaymua` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `hoadon_id` (`hoadon_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=123 ;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`hoadon_id`, `hoadon_khachhang`, `hoadon_sanpham`, `hoadon_tongtien`, `diachi`, `ngaymua`) VALUES
(103, 'ADMIN', '71,72', '138', 'www.thuvien-ebook.com', '2010-04-01 00:00:00'),
(118, 'hakhuong', '41', '120', 'www.thuvien-ebook.com', '2010-04-02 13:02:47'),
(119, 'Thao Pham', '11', '72', 'Ha Noi', '2010-05-02 20:57:03'),
(120, 'Thao Pham', '21', '375', 'Ha Noi', '2010-06-02 22:38:23'),
(122, 'hakhuong', '21,22,23', '307', 'www.thuvien-ebook.com', '2010-06-27 03:29:20');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text CHARACTER SET utf8 NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `diachi` text CHARACTER SET utf8 NOT NULL,
  `Name` text CHARACTER SET utf8 NOT NULL,
  `Birthday` varchar(255) CHARACTER SET utf8 NOT NULL,
  `admin` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  FULLTEXT KEY `username` (`username`),
  FULLTEXT KEY `password` (`password`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `password`, `email`, `diachi`, `Name`, `Birthday`, `admin`) VALUES
(1, 'ADMIN', '21232f297a57a5a743894a0e4a801fc3', 'hakhuong88@yahoo.com', 'www.thuvien-ebook.com', 'hakhuong', '6/8/1988', 1),
(19, 'khuong', '81dc9bdb52d04dc20036dbd8313ed055', 'khuongha@yahoo.com', 'Mai Dịch - Hà Nội ', 'Khương', '6/8/1988', 0),
(18, 'Trường Giang', '202cb962ac59075b964b07152d234b70', 'Truonggiag@yahoo.com', 'Hoàn Kiếm - Hà Nội', 'Giang', '4/5/1982', 0),
(54, 'khanh', '81dc9bdb52d04dc20036dbd8313ed055', 'khanh@yahoo.com', 'Ha Noi', 'khanh', '5/11/1984', 0),
(55, 'thao', '81dc9bdb52d04dc20036dbd8313ed055', 'Thao@yahoo.com', 'Ha Noi', 'Thao Pham', '5/7/1986', 0);

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE IF NOT EXISTS `search` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_3` (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`),
  KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9613 ;

--
-- Dumping data for table `search`
--

