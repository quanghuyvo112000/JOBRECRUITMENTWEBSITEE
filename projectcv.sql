CREATE DATABASE `projectcv`;
USE `projectcv`;
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 15, 2022 lúc 11:18 AM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `projectcv`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bookmark`
--

CREATE TABLE `bookmark` (
  `id_bookmark` int(20) NOT NULL,
  `id_post` int(20) NOT NULL,
  `id_user` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bookmark`
--

INSERT INTO `bookmark` (`id_bookmark`, `id_post`, `id_user`) VALUES
(1, 2, 2),
(7, 3, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dangtuyen_form`
--

CREATE TABLE `dangtuyen_form` (
  `id_post` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `name_company` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slogan` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `area` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `job` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `skills` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `job_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `rank` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `exp_number` int(50) NOT NULL,
  `type_job` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `salary` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `interview` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dangtuyen_form`
--

INSERT INTO `dangtuyen_form` (`id_post`, `id_user`, `name_company`, `slogan`, `img`, `area`, `address`, `email`, `description`, `job`, `skills`, `job_detail`, `rank`, `exp_number`, `type_job`, `salary`, `interview`) VALUES
(2, 1, 'MISA SOFTWARE', 'MISA LUÔN MỞ RỘNG CÁNH CỔNG CHÀO ĐÓN NHÂN TÀI', 'uploads/misa_software.jpg', 'Hà Nội', 'Tòa N03 - T1 Khu Ngoại giao đoàn, Phường Xuân Đỉnh, Quận Bắc Từ Liêm, Thành phố Hà Nội', 'misa@gmail.com', 'Tham gia phát triển các sản phẩm phục vụ cho hàng trăm nghìn khách hàng về các mảng Tài chính kế toán, Điều hành doanh nghiệp, Quản lý bán hàng cũng như eLearning\r\nXây dựng và tối ưu sản phẩm đáp ứng hàng trăm nghìn người sử dụng đồng thời\r\nTham gia nghiên cứu và ứng dụng các công nghệ mới vào sản phẩm: Blockchain, AI, Machine Learning, BigData, RPA,…\r\nPhối hợp cùng đội ngũ BA phân tích, thiết kế, đưa ra giải pháp để phát triển phần mềm đáp ứng đúng, đủ, tiện các yêu cầu của người dùng cuối', 'Web Developer', 'asp.net javascript', 'Tốt nghiệp ĐH/CĐ chuyên ngành CNTT hoặc các chuyên ngành liên quan.\r\nCó tối thiểu 1 năm kinh nghiệm lập trình .NET trên nền tảng Web.\r\nThành thạo HTML5/CSS3, Java Script/JQuery, Bootstrap.\r\nCó kinh nghiệm làm Single Page Application hoặc .NET MVC và các framework khác như Vuejs, Reactjs, Angular...\r\nCó kiến thức về OOP, Design Pattern, nguyên lý SOLID, SOA/Micro Service.\r\nThành thạo các kiến thức về .NET Framework hoặc .NET Core (C#, ASP.NET, MVC,...). Có kinh nghiệm xây dựng các hệ thống sử dụng .NET là lợi thế.\r\nƯu tiên ứng viện có kinh nghiệm làm việc với Web API.\r\nCó kinh nghiệm với 1 trong các cơ sở dữ liệu SQL Server, MySQL, PostgreSQL. Đã từng làm sản phẩm sử dụng NoSQL: MongoDB, CouchBase, Redis, RabbitMQ, … là lợi thế.\r\nƯu tiên ứng viên thích làm product, tư duy làm sản phẩm cao, sản phẩm hướng người dùng cuối.\r\nGiao tiếp tốt, chủ động, khả năng làm việc nhóm tốt.', 'Middle', 5, 'Full-time', 'Trên 1000$', 3),
(3, 4, 'ANTSOMI', 'Transforming Businesses into Data-driven Companies. Antsomi CDP 365 helps businesses decode their customer data, understand the nuances of their customer lifecycles, and act on them – 24 hours a day, 365 days a year.', 'uploads/Antsomi-VYdZ1.png', 'Hồ Chí Minh', 'Sài Gòn Pearl, 92 Nguyễn Hữu Cảnh, Phường 22, Quận Bình Thạnh, Thành phố Hồ Chí Minh', 'antsomi@gmail.com', 'Communicate and work closely with multiple internal teams (BOD, marketing, product, operator,...) to determine and understand customers’/ end-users needs and desires for validating and grooming user stories.\r\nUsing publicly available ideas and information to drive the development and ensure the uniqueness of new products and improvements to existing products.\r\nAnalyze feature requests, and verify with dev. team, define the scope of changes required taking into account the dependencies on the existing functionality.\r\nCreate and maintain business and software requirements documentation.\r\nWorking with the engineering team to ensure the successful implementation and deployment of the product features.  \r\nWorking with the UI/ UX team to create/ improve products.\r\nWork with QC/ QA  to review/improve test plans and case documentation.', 'Business Analyst (BA)', 'Agile scrum ba analyst', '1+ year of working experience as a Business Analyst or similar title.\r\nA degree in Information Technology, Business, or a related discipline.\r\nExperience working in a fast-paced project environment and adaptability.\r\nKnowledgeable about the software development life cycle (Agile, Scrum).\r\nExcellent with at least 01 popular wireframe design tool (Balsamiq, Figma, Invision, Zeplin, Sketch, Adobe XD, Draw.io,…).\r\nGood English Speaking and writing skills.\r\nStrong presentation & communication skills.\r\nAnalytical mindset.\r\nA passion for solving challenging problems.', 'Junior', 1, 'Full-time', '700$ - 1000$', 3),
(4, 5, 'Samsung', 'Inspire the World, Create the Future', 'uploads/samsung.png', 'Hồ Chí Minh', 'Lô I-11, Đường D2, Khu Công nghệ cao, Phường Tăng Nhơn Phú B, Thành phố Thủ Đức, Thành phố Hồ Chí Minh', 'company@company.com', 'Analyze requirements, design and develop embedded software programs for microcontrollers.<br />\r\nWrite the design document: technical specification.<br />\r\nImplement unit test.<br />\r\nExecute jobs assigned by Group Leader', 'Web Developer', 'C/C++', 'University graduated with computer science, software, application programming related major<br />\r\nGood at logical thinking, problem-solving, collaboration, and communication skills.<br />\r\nStrong knowledge of basic data structures and algorithms.<br />\r\nIndustriousness, result-oriented, high energy, self-motivated, and creative individual.<br />\r\nBeing able to use English for working.', 'Senior', 3, 'Full-time', '500$ - 700$', 1),
(5, 6, 'FPT Software', 'FPT Software - You can make it!', 'uploads/FPTSOFT.png', 'Hà Nội', 'FPT Building Cầu Giấy, 17 phố Duy Tân, Phường Dịch Vọng Hậu, Quận Cầu Giấy, Thành phố Hà Nội', 'company@company.com', 'Coordinate internal resources and third parties/vendors for the flawless execution of projects<br />\r\nEnsure that all projects are delivered on-time, within scope and within budget<br />\r\nAssist in the definition of project scope and objectives, involving all relevant stakeholders and ensuring technical feasibility<br />\r\nEnsure resource availability and allocation<br />\r\nDevelop a detailed project plan to monitor and track progress<br />\r\nManage changes to the project scope, project schedule and project costs using appropriate verification techniques<br />\r\nMeasure project performance using appropriate tools and techniques<br />\r\nReport and escalate to management as needed<br />\r\nManage the relationship with the client and all stakeholders<br />\r\nPerform risk management to minimize project risks<br />\r\nEstablish and maintain relationships with third parties/vendor<br />\r\nCreate and maintain comprehensive project documentation<br />\r\nMeet with clients to take detailed ordering briefs a', 'Business Analyst (BA)', 'Sql python', '> 4 years of working experience in Project Management<br />\r\nAbility to manage a team size with 30 – 90 headcounts (90 headcounts for Senior Project Manager, 30 headcounts for Sub-Project Manager position)<br />\r\nFluent English communication and comprehension<br />\r\nHands-on experience in “know-how” about eCommerce (Magento) or CMS (AEM or other CMS platform) is a plus<br />\r\nHas experiences in software outsourcing services<br />\r\nHaving experience with Fix price project execution is a plus<br />\r\nCoordinate internal resources and third parties/vendors for the flawless execution of projects<br />\r\nPossessing either PMP certificate or Agile/Scrum framework is a plus', 'Middle', 4, 'Full-time', 'Trên 1000$', 3),
(6, 7, 'Positive Thinking Company', 'Positive Thinking Company is a global independent tech consultancy group.', 'uploads/positive.png', 'Hà Nội', 'TNR Tower, 54A Nguyễn Chí Thanh, Phường Láng Thượng, Quận Đống Đa, Thành phố Hà Nội', 'company@company.com', 'Develop modern responsive web applications following Single Page Application  architecture<br />\r\nDevelop web templates based on graphical web layout designs that follow the strict requirements of W3C standards with platform/browser compatibility<br />\r\nProvide leadership in the development of the code and keeping with the established processes and standards<br />\r\nIntegrate with a CMS and other services via GraphQL', 'Web Developer', 'Javascript reactjs html/css', 'Solid knowledge of web technologies (HTML/ CSS/ JavaScript) and frameworks in building responsive design and cross browser compatible<br />\r\nSolid understanding of Javascript (ES6+)<br />\r\nSolid knowledge of React, React-Native, and similar technologies<br />\r\nHands-on experience with popular JavaScript tools, frameworks and design principals, and up to date with the changing JavaScript ecosystem landscape<br />\r\nExperience in analyzing UI performance metrics and optimizing the implementation<br />\r\nAbility to perform and influence code reviews as well as technical design meetings<br />\r\nThorough understanding of Software Development Lifecycle and methodologies', 'Senior', 5, 'Full-time', 'Trên 1000$', 3),
(7, 8, 'CÔNG TY CỔ PHẦN BAMBOOSHIP', 'Làm giàu làng quê Việt Nam', 'uploads/BAMBOOSHIP.png', 'Hồ Chí Minh', 'Phòng 5.06, Tầng 5, Khu Officetel, 38 Trương Quốc Dung, Phường 08, Quận Phú Nhuận, Thành phố Hồ Chí ', 'company@company.com', 'Developing front end website architecture.<br />\r\nDesigning user interactions on web pages.<br />\r\nDeveloping back-end website applications.<br />\r\nCreating servers and databases for functionality.<br />\r\nEnsuring cross-platform optimization for mobile phones.<br />\r\nEnsuring responsiveness of applications.<br />\r\nWorking alongside graphic designers for web design features.<br />\r\nSeeing through a project from conception to finished product.<br />\r\nDesigning and developing APIs.<br />\r\nMeeting both technical and consumer needs.<br />\r\nStaying abreast of developments in web applications and programming languages.', 'Web Developer', 'php mysql python reactjs', 'Minimum 3 years in any languages: PHP, Python,...<br />\r\nPrimary skills: PHP, ReactJS/Vuejs, Mysql/Mariadb<br />\r\nBack-end: PHP<br />\r\nFront-end: ReactJS or similar (Angular, Vue, etc…)<br />\r\nDatabase: Mariadb<br />\r\nSoftware Architectures: MVVM, MVC...<br />\r\nEnghlish: Optional', 'Senior', 3, 'Full-time', 'Trên 1000$', 3),
(8, 9, 'mgm technology partners Vietnam', 'mgm - Software Engineers to the bones. We code for Fortune 100 customers and have fun while doing so', 'uploads/TopDev-mgm-logo-1659328798.png', 'Đà Nẵng', '7 Phan Chau Trinh, Phường Hải Châu I, Quận Hải Châu, Thành phố Đà Nẵng', 'company@company.com', 'Work with international customers and colleagues from Germany, France, the Czech Republic, and the US<br />\r\nConception and implementation of new functions in complex application landscapes<br />\r\nDevelopment and design of new web interfaces and optimization of their usability and performance<br />\r\nJavaScript Frontend development in different architectures (including serverside/ clientside/ single-page). Evaluation and introduction of innovative Frontend technologies<br />\r\nDevelopment of various Frontends for desktop, tablet, and mobile devices, dashboard applications, data visualization, and prototype development in close cooperation with our UI/ UX team', 'Web Developer', ' HTML/ CSS, JavaScript', 'Good verbal and written communication in English is required<br />\r\n2+ years of professional experience in international software projects (flexible depending on how fast your learning and technical developing capabilities are)<br />\r\nDegree in engineering or natural sciences (university or technical college)', 'Junior', 2, 'Remote', '700$ - 1000$', 1),
(9, 10, 'Công ty Cổ phần V.B.P.O', 'Professional Partner - Đối tác tin cậy của bạn', 'uploads/TopDev-VBPO-Logo-SupportHR-1648785213.png', 'Đà Nẵng', 'Tầng 20, Tòa nhà Software Park, 02 Quang Trung, Phường Thạch Thang, Quận Hải Châu, Thành phố Đà Nẵng', 'company@company.com', 'Work in defining and planning the project scope with the management and vendor/client teams and setting project deadlines.<br />\r\nParticipate in requirement gathering and analysis by directly interacting with the client/vendor team to fully understand their needs and expectations.<br />\r\nPerform gap analysis on vendor requirements for creating new interfaces and enhancing existing interfaces.<br />\r\nEngage in meetings to create and get approval for specification documents from various teams involved in the project.<br />\r\nParticipate in implementing interfaces using Mirth Connect, performing mapping, transformations, and testing.', 'Web Developer', ' MySQL', 'Excellent documentation and communication skills in English<br />\r\nExperience with interoperability data formats, including XML, and JSON<br />\r\nExperience with servers and network architecture from interface configuration perspective.<br />\r\nExperience with RDBMS systems: Microsoft SQL Server<br />\r\nExposure to workflow/team management<br />\r\nUnderstanding your own limits and comfortable asking for assistance when needed.', 'Junior', 5, 'Part-time', '700$ - 1000$', 2),
(10, 11, ' CÔNG TY TNHH ESUHAI', 'GIÁO DỤC ĐỂ PHÁT TRIỂN - ĐÀO TẠO ĐỂ LÀM VIỆC - TRẢI NGHIỆM ĐỂ TRƯỞNG THÀNH', 'uploads/TopDev-.png', 'Hồ Chí Minh', '40/12 - 40/14 Ấp Bắc, Phường 13, Quận Tân Bình, Thành phố Hồ Chí Minh', 'company@company.com', 'Lập trình phát triển các ứng dụng quản lý trong công ty trên nền tảng công nghệ Microsoft (.Net, C#, Net Core API, SQL) và các công nghệ Front-end tiên tiến Angular, ReactJS<br />\r\nBảo trì, nâng cấp các ứng dụng quản lý nội bộ<br />\r\nTham gia trực tiếp vào quá trình phân tích thiết kế hệ thống, thiết kế cơ sở dữ liệu, chức năng cho hệ thống<br />\r\nXây dựng hệ thống thư viện API đáp ứng nhu cầu vận hành của các ứng dụng trong hệ sinh thái hoạt động kinh doanh của công ty<br />\r\nTham gia vào các dự án tích hợp hệ thống với CRM, ERP<br />\r\nHỗ trợ các công việc dự án phát sinh theo chỉ đạo từ trưởng phòng ban', 'Web Developer', 'HTML/ CSS Responsive', 'Có từ 3 năm kinh nghiệm làm việc với C#, .NET (.NET Core, Web API)<br />\r\nCó kinh nghiệm và kiến thức vững về các công cụ lập trình giao diện: HTML/ CSS, Responsive, JavaScript, Bootstrap, Ant Design, Tailwind CSS, Material UI, ...<br />\r\nCó kiến thức về lập trình Database, SQL server<br />\r\nCó kiến thức về các framework JavaScript như Angular, React là điểm cộng (sẽ được training trong quá trình làm việc)<br />\r\nCó kiến thức và kinh nghiệm lập trình Mobile là một lợi thế (React Native, Xamarin, Flutter,...)<br />\r\nCó kiến thức về quy trình phát triển phần mềm theo mô hình Agile là lợi thế<br />\r\nKhả năng giao tiếp và xử lý vấn đề tốt<br />\r\nCó khả năng đọc hiểu tài liệu tiếng Anh<br />\r\nCó thể làm việc trong môi trường áp lực cao', 'Middle', 3, 'Full-time', '700$ - 1000$', 2),
(11, 12, 'GO TRACK', 'GoTrack “Giải pháp hiệu quả, sản phẩm giá trị”', 'uploads/TopDev-gotrack.png', 'Hà Nội', 'Lô B13, Khu đấu giá Vạn Phúc, đường Lê Văn Tám, Phường Vạn Phúc, Quận Hà Đông, Thành phố Hà Nội', 'company@company.com', 'Phát triển các sản phẩm ứng dụng trên nền tảng Android.<br />\r\nThiết kế xây dựng và phát triển ý tưởng mới cho các ứng dụng Android.<br />\r\nTham gia vào toàn bộ quy trình phát triển một sản phẩm ứng dụng hoàn chỉnh để đẩy sản phẩm lên store Google Play.<br />\r\nNghiên cứu các tài liệu, công nghệ để phát triển dự án.<br />\r\nLàm việc, phối hợp công việc theo nhóm dưới sự phân công công việc của quản lý dự án.', 'UI/ UX Designer', 'Figma ', 'Trung thực, đam mê với công việc.<br />\r\nKhông yêu cầu kinh nghiệm.<br />\r\nCó kinh nghiệm làm việc với Android Native là một lợi thế.<br />\r\nBiết Kotlin và làm việc với những công nghệ mới RxJava, Compose.<br />\r\nYêu thích làm sản phẩm ứng dụng.<br />\r\nSử dụng thành thạo Git, GitHub.<br />\r\nKhả năng đọc hiểu tài liệu tiếng Việt, tiếng Anh phục vụ công việc.<br />\r\nKhả năng làm việc độc lập, làm việc nhóm.<br />\r\nTinh thần trách nhiệm cao.', 'Fresher', 0, 'Part-time', '300$ - 500$', 2),
(12, 13, 'Cloud Nine Solutions', 'CHALLENCE, WE FIND WAYS', 'uploads/TopDev-CloudNine-Logo.png', 'Hồ Chí Minh', 'Lầu 5, Tòa nhà Scetpa, 19A Cộng Hòa, Phường 12, Quận Tân Bình, Thành phố Hồ Chí Minh', 'company@company.com', 'Be in project development team to build web-based system from concept all the way to completion from the bottom up, fashioning everything from user interfaces to layout and function.<br />\r\nFollowing project manager and department manager instruction to reach the project and department’s targets.<br />\r\nWrite well designed, testable, efficient code by using best software development practices.<br />\r\nCreate website layout/user interface by using standard HTML/CSS/JS practices.<br />\r\nIntegrate data from various back-end services and databases.<br />\r\nCreate and maintain software documentations.<br />\r\nCooperate with web designers to match visual design intent.', 'Web Developer', 'java python', 'At Least 4 Years’ Experience in Python. It is a big plus if have experience in .NET, Node.js, Java language<br />\r\nHas strong experience with public cloud, especially with AWS (Lambda, Cloud Search, DynamoDB, SQS, Step Functions, RDS, …)<br />\r\nHas experience in design system, sub-system (applying best practices)<br />\r\nIn-depth knowledge of modern HTML technologies: HTML5/CSS3, Bootstrap, jQuery and its plugins, responsive design.<br />\r\nAggressive problem diagnosis and creative problem-solving skills<br />\r\nIntermediate English skills', 'Senior', 4, 'Full-time', 'Mức lương', 3),
(13, 14, 'CÔNG TY TNHH LOVEPOP VIỆT NAM', 'Create one billion magical moments', 'uploads/LogoLovepop2.png', 'Đà Nẵng', 'Tòa nhà Indochina, 74 đường Bạch Đằng, Phường Hải Châu I, Quận Hải Châu, Thành phố Đà Nẵng', 'company@company.com', 'Develop and maintain software using C# or Javascripts and its frameworks such as: .Net or NodeJS<br />\r\nCollaborate with cross-functional teams, the rest of the team to define and deliver new features that are well-architected and high-quality.<br />\r\nCode review with the team to ensure clean, readable, and testable code.<br />\r\nExplore feasible architectures for implementing new features.<br />\r\nResolve any problems existing in the system and suggest and add new features in the complete system.<br />\r\nFollow the best practices while developing the app and also keep everything structured and well documented. Document the project and code efficiently.<br />\r\nManage the code and project on Git in order to keep in sync with other team members and managers.<br />\r\nCommunicate with the Project Manager regarding the status of projects and suggest appropriate deadlines for new functionalities.<br />\r\nCode with security guidelines should always be followed.<br />\r\nWrite unit tests for features', 'Web Developer', 'nodejs .net full-stack', 'Bachelor’s Degree in Computer Science/Information Technologies<br />\r\n At least 5 years of working experience in web development, developing high interactive applications in a large-scale and high-traffic projects and using Agile methodologies.<br />\r\nAt least 2 years of hands-on working experience in .Net or NodeJS projects.<br />\r\nHands-on experience with Restful AP/ Microservices<br />\r\nSolid knowledge and experience with PostgreSQL.<br />\r\nHaving experience with Docker,/AWS Service is a plus.<br />\r\nPassion for writing great, simple, clean, and efficient code.<br />\r\nProficient in authoring, editing, and presenting technical documents.<br />\r\nGood English skills.<br />\r\nFlexible and adaptable attitude, disciplined to manage multiple responsibilities and adjust to varied environments.', 'Senior', 5, 'Full-time', 'Mức lương', 3),
(14, 15, 'CÔNG TY TNHH MAGEPLAZA', 'Always deliver more than expected', 'uploads/TopDev-Mageplaza.jpg', 'Hà Nội', 'Tầng 11, Tháp C, tòa nhà Hồ Gươm Plaza, 102 Trần Phú, Phường Mộ Lao, Quận Hà Đông, Thành phố Hà Nội', 'company@company.com', 'Tham gia dự án lớn, và đầy thử thách: phát triển một nền tảng Marketing automation cho website thương mại điện tử hàng đầu trên thế giới.<br />\r\nTrực tiếp tham phát triển một hoặc nhiều sản phẩm SaaS của công ty cho các nền tảng thương mại điện tử hàng đầu thế giới Shopify.<br />\r\nĐảm bảo code theo standard của team về style, performance.<br />\r\nĐảm bảo dự án hoàn thành đúng tiến độ đề ra.', 'Project Manager (PM)', 'nodejs mongodb', 'Kinh nghiệm làm NodeJS trên 2 năm, ReactJS trên 1 năm.<br />\r\nCó kinh nghiệm làm việc với Database NoSQL: Mongo hoặc Firestore.<br />\r\nCó kinh nghiệm với điện toán đám mây một trong: Google Cloud, AWS, kiến trúc hệ thống microservice là một lợi thế.<br />\r\nKhả năng đọc hiểu Tiếng Anh tốt, ham tìm tòi kiến thức mới là một điểm cộng.<br />\r\nCó tinh thần làm việc đội nhóm, và có trách nhiệm với công việc.', 'Junior', 0, 'Full-time', 'Trên 1000$', 1),
(15, 16, 'Houze Group', 'Houze Group - Tiên phong trong lĩnh vực Công nghệ Bất động sản', 'uploads/TopDev-HouzeGroup.png', 'Hồ Chí Minh', '46-48 Ðường Tạ Hiện, khu phố 1, Phường Thạnh Mỹ Lợi, Thành phố Thủ Đức, Thành phố Hồ Chí Minh', 'company@company.com', 'Work in an agile team, collaborate with your colleagues and mentor, educate and support those around you.<br />\r\nActively work with Product Design and implement features based on mockups and prototypes.<br />\r\nCollaborate with back-end engineers in architecting and consuming APIs.<br />\r\nUse experiments, data and user feedback to improve our web-application and mobile to be fast, easy to use and functional.', 'Tester', 'Auto test', 'Graduated in Information Technology, Computer Science or other related technical fields.<br />\r\nDemonstrated passion for building comprehensive, intelligent, and elegant solutions.<br />\r\n2++ years of relevant work experience in Flutter, Android, iOS, Redux, Redux-Saga, Hooks, TypeScript, CSS.<br />\r\nExperience in state management library block / redux / provider.<br />\r\nExperience using Restful APIs to integrate mobile applications to server-side systems.<br />\r\nKnowledge of memory management and multi-threading.', 'Fresher', 0, 'Part-time', 'Dưới 300$', 1),
(16, 17, 'Ngân hàng Quốc Tế VIB', 'VIB - Luôn gia tăng giá trị cho bạn', 'uploads/VIB.png', 'Hồ Chí Minh', 'Tầng 1, (Tầng Trệt) và Tầng 2 Tòa nhà Sailing Tower, Số 111A Pasteur, Phường Bến Nghé, Quận 1, Thành', 'company@company.com', 'Collaborate with product stakeholders to understand the requirements of the business and serve as subject matter expert on technology applicable to develop applications and solutions;<br />\r\nFind the best tech solution to solve the existing business visions; Ensure that solution meets all non-functional requirements, according to the roadmap, principles, standards and is properly documented;<br />\r\nAnalyze the root causes to solve challenges of scalability, performance, bottleneck, and security issues;<br />\r\nIdentify technical gaps and advise proper solutions following standardized technologies and appropriate technology life-cycles; Ensure standards, policies and procedures are implemented for all layers of integration;<br />\r\nReview and advise, from an architectural perspective, feasibility, viability, and consistency of integration architecture implementation;<br />\r\nParticipate in the development and improvement of architectural and technological design manuals;<br />\r\nPerform oth', 'Project Manager (PM)', 'cloud azure', 'Bachelor degree in B.S. and/or M.S. in Computer Sciences, Information Technology, Applied Mathemathics;<br />\r\nMinimum 5 years (Senior Specialist)/3 years (Specialist) experience designing and delivering resilient solutions with enterprise integration patterns in business-complex and large-scaled systems like API Gateway, APIm, Microservices, and messaging queue technologies, etc;<br />\r\nExperience in designing and implementing using both Linux/Unix and Windows with specific recommendations on server, load balancing, HA/DR, & storage architectures;<br />\r\nExperience in SDLC (Software Development Life Cycle) and cloud migration methodologies;<br />\r\nExperience in defining/designing the architecture of cloud applications (AWS/Azure preferred);<br />\r\nExperience with modernized applications such as containerized, microservice, cloud based, orchestration and automation;<br />\r\nExperience with CICD automation tools (Git, Azure DevOps, Ansible, Terraform, etc.);<br />\r\nExperience with cloud ', 'Middle', 4, 'Full-time', '500$ - 700$', 1),
(17, 18, 'Ngân hàng TMCP Đầu tư và Phát triển Việt Nam (BIDV)', 'Chất lượng tin cậy - Hướng đến khách hàng - Đổi mới phát triển - Chuyên nghiệp sáng tạo - Trách nhiệm xã hội', 'uploads/BIDV.png', 'Hà Nội', 'Tầng 15, Tháp A Vincom, 191 Bà Triệu, Phường Lý Thái Tổ, Quận Hoàn Kiếm, Thành phố Hà Nội', 'company@company.com', 'Nghiên cứu, tìm hiểu, phân tích hành vi người dùng trên các kênh giao dịch ngân hàng điện tử, đề xuất phương án cho giao diện người dùng, trải nghiệm người dùng trên các hệ thống mobile banking và internet banking và các ứng dụng trên web và mobile sử dụng cho khách hàng cán bộ ngân hàng.<br />\r\nNghiên cứu tìm hiểu, cập nhật xu hướng thiết kế, trải nghiệm người dùng nhằm nâng cao chất lượng và hiệu quả các sản phẩm (web/mobile)<br />\r\nTrao đổi ý tưởng thiết kế thông qua các công cụ như: storyboards, sitemaps, wireframes, flowcharts, prototypes…;<br />\r\nThiết kế UI/UX Website, Wap và App theo tiêu chí: sáng tạo, thân thiện với người dùng, tạo sự khác biệt, dẫn đầu xu thế;<br />\r\nPhối hợp với với các đơn vị liên quan để trực tiếp/phối hợp thiết kế giao diện người dùng và trải nghiệm người dùng cho các sản sản phẩm/dịch vụ;<br />\r\nThực hiện các công việc khác liên quan đến thiết kế, lựa chọn các tài liệu, thông điệp cho sản phẩm.<br />\r\nTiếp nhận và hoàn thành tốt các nhiệm vụ của phòng t', 'UI/ UX Designer', 'ux/ui design photoshop sketch', 'Có từ ít nhất từ 01-02 năm kinh nghiệm làm UI/UX sản phẩm thực tế trên Mobile hoặc Web;<br />\r\nAm hiểu về UI/UX, biết tự chủ động nghiên cứu và cập nhật các xu hướng UI/UX mới trong lĩnh vực phần mềm, hiểu rõ các nguyên tắc và yếu tố của thiết kế;<br />\r\nCó kiến thức về thương hiệu và bộ nhận diện thương hiệu là một lợi thế;<br />\r\nCó kỹ năng thiết kế các giao diện phức tạp và tự đưa ra các quyết định phù hợp;<br />\r\nSử dụng thành thạo các ứng dụng: Photoshop, PowerPoint, Sketch, Vision, OmniGraffle, Axure và Illustrator, AE, motion.. hoặc tương đương trong việc tạo ra đồ họa tối ưu hóa cho web, wap và app;<br />\r\nCó tư duy làm việc độc lập;', 'Senior', 2, 'Full-time', '700$ - 1000$', 2),
(18, 19, 'Golden Gate Group', 'GOLDEN GATE GROUP - THE FIRST F&B CHOICE', 'uploads/TopDev-goldengate-1669279966.png', 'Hà Nội', 'Số 315 Trường Chinh, Phường Khương Trung, Quận Thanh Xuân, Thành phố Hà Nội', 'company@company.com', 'Drive the product and business-planning process across cross-functional teams of the company<br />\r\nManage developing digital products to roll out on time with good quality and approved budget <br />\r\nCoordinate with other business departments such as Marketing, Accountants, Operations team, etc. to make sure that the outcome fulfills business needs<br />\r\nCoordinate with IT/Admin department for infrastructure setup if requested: network connectivity, etc.<br />\r\nMonitor and control outputs for outsourced partners or inhouse development team<br />\r\nTo produce activity reports for all operations of the team (monthly, weekly & ad-hoc)', 'Project Manager (PM)', 'agile & scrum waterfall', 'University Degree in Information Technology field<br />\r\nAt least 3 years of software project management experience<br />\r\nExperienced with at least one project management methodology and is familiar with others (Agile/ Scrum, Waterfall…)<br />\r\nDemonstrate the ability to manage multiple projects at the same time<br />\r\nSoftware programming languages and business analysis skill are a plus<br />\r\nProactive, can do attitude<br />\r\nStrong analytical and problem-solving skills.<br />\r\nStrong communication skills, written and verbal', 'Senior', 3, 'Full-time', 'Mức lương', 1),
(19, 20, 'NTT DATA Vietnam', ' NTT DATA Vietnam  Trusted Global Innovator', 'uploads/NTTDATA.jpg', 'Đà Nẵng', 'Tầng 11, Tòa nhà Vietinbank, 36 Trần Quốc Toản, Phường Hải Châu I, Quận Hải Châu, Thành phố Đà Nẵng', 'company@company.com', 'Coordinate with stakeholder to ensure the overall success of the project.<br />\r\nActs as a catalyst to resolve project problems and conflicts, escalation when necessary.<br />\r\nEnsures that impacted teams are involved and informed as early as possible in the project management process.<br />\r\nMonitor team activities and corporate with direct manager and others departments to solve issues if any.<br />\r\nPush subordinate to implement the policy of company.<br />\r\nOrient the challenge for each subordinate following team challenge.<br />\r\nMake plan to develop skill of subordinate as direct manager’s requirement.<br />\r\nMonitor performance and coaching subordinate in development process, management skill and solving method.<br />\r\nSupport pre-sales activities, includes consulting, proposing solution and estimation.', 'Business Analyst (BA)', 'hybrid java pm ba', 'Bachelor’s Degree in Computer Science, Computer Engineering or any other IT-related fields. Master’s Degree or above is a plus.<br />\r\n3~5 years’ experience in Software/ Business Analyst and/or programmer and at least 3 years’ experience in System Project Management for developing & implementing Based Software Solutions.<br />\r\n3~5 years’ experience in Java.<br />\r\nDirect experience from Automotive and/or Industrial sector would be a plus.<br />\r\nGood in English language.<br />\r\nAt least 5+ years’ experience in Software development life cycle.<br />\r\nStrong problem-solving skill, with a logical, analytical and approach to work.<br />\r\nAble to work under tight schedule.<br />\r\nAble to build team work spirit and always continuous motivating subordinates.<br />\r\nWorking a shift from 2 AM to 10 AM. Can work from home (from 2 AM to 6 AM plus a 30% salary).', 'Senior', 5, 'Remote', 'Trên 1000$', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quanlyfile_cv`
--

CREATE TABLE `quanlyfile_cv` (
  `id_file` int(10) NOT NULL,
  `id_post` int(10) NOT NULL,
  `id_users` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'CHƯA XEM'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quanlyfile_cv`
--

INSERT INTO `quanlyfile_cv` (`id_file`, `id_post`, `id_users`, `name`, `file`, `status`) VALUES
(1, 2, 2, 'Quang Huy ', 'uploads/518002875.pdf', 'ĐÃ XEM CHỜ LIÊN HỆ PHỎNG VẤN'),
(2, 3, 2, 'Quang Huy ', 'uploads/51800287.pdf', 'CHƯA XEM'),
(3, 2, 3, 'test 1', 'uploads/CV_VoQuangHuy.pdf', 'CHƯA XEM'),
(4, 3, 3, 'test 1', 'uploads/CV_VoQuangHuy.pdf', 'ĐÃ XEM');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_form`
--

CREATE TABLE `user_form` (
  `id_user` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL UNIQUE,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_form`
--

INSERT INTO `user_form` (`id_user`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'Võ Quang Huy ', 'huyquang@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, 'Quang Huy ', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(3, 'test 1', 'test1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(4, 'test 2', 'test2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(5, 'Nguyễn Hữu Minh', 'minh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(6, 'Bùi Công Quân', 'quan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(7, 'Bùi Nhựt Hào', 'haobui@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(8, 'Nguyễn Văn Huy', 'vanhuy@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(9, 'Lê Thành Đăng Khoa', 'dangkhoa@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(10, 'Nguyễn Thành Nhân', 'thanhnhan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(11, 'Đoàn Nguyễn Minh', 'minhnguyen@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(12, 'Phạm Nguyễn Hoàng', 'nguyenhoang@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(13, 'Nguyễn Tấn Anh', 'tananh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(14, 'Liễu Thanh Lâm', 'thanhlam@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(15, 'Dương Hải Đăng', 'haidang@gmai.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(16, 'Nguyễn Trọng Kiên', 'trongkien@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(17, 'Trịnh Văn Dũng', 'vandung@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(18, 'Nguyễn Thúc Phúc', 'thucphuc@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(19, 'Trần Tống Gia Vũ', 'giavu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(20, 'Nguyễn Trọng Đức', 'trongduc@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`id_bookmark`),
  ADD KEY (`id_post`);

--
-- Chỉ mục cho bảng `dangtuyen_form`
--
ALTER TABLE `dangtuyen_form`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY (`id_user`);

--
-- Chỉ mục cho bảng `quanlyfile_cv`
--
ALTER TABLE `quanlyfile_cv`
  ADD PRIMARY KEY (`id_file`),
  ADD KEY (`id_post`);

--
-- Chỉ mục cho bảng `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `id_bookmark` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `dangtuyen_form`
--
ALTER TABLE `dangtuyen_form`
  MODIFY `id_post` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `quanlyfile_cv`
--
ALTER TABLE `quanlyfile_cv`
  MODIFY `id_file` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bookmark`
--
ALTER TABLE `bookmark`
  ADD CONSTRAINT `bookmark_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `dangtuyen_form` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `dangtuyen_form`
--
ALTER TABLE `dangtuyen_form`
  ADD CONSTRAINT `dangtuyen_form_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_form` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `quanlyfile_cv`
--
ALTER TABLE `quanlyfile_cv`
  ADD CONSTRAINT `quanlyfile_cv_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `dangtuyen_form` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
