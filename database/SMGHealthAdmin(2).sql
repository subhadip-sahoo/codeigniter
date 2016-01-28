-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 28, 2016 at 10:26 AM
-- Server version: 5.5.40
-- PHP Version: 5.4.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `SMGHealthAdmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `smg_feedback`
--

CREATE TABLE IF NOT EXISTS `smg_feedback` (
  `id_feedback` int(11) NOT NULL AUTO_INCREMENT,
  `id_dimension` int(11) NOT NULL,
  `from_value` int(11) NOT NULL,
  `to_value` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_feedback`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `smg_feedback`
--

INSERT INTO `smg_feedback` (`id_feedback`, `id_dimension`, `from_value`, `to_value`, `feedback`, `link`, `created_at`, `updated_at`) VALUES
(2, 1, 4, 12, '<p>Thank you for completing the Resilience Survey. Your results indicate that your coping skills could be strengthened with some additional training in your ability and/or willingness to utilise a more visionary approach to your planning. A resilient person recognises that we live in a time continuum, that whatever we are dealing with today is one pocket of time that will influence future outcomes.  People who struggle with developing, analysing and reality testing future options may feel stuck in the moment and may come overwhelmed by the circumstances around them. Additionally they may not be as well prepared for the inevitable and increasingly unpredictable future challenges. Behaviour is based on habits and beliefs and can be modified by becoming aware of them, challenging thinking patterns and practising different behaviours. We invite you to visit our Vision Module and explore the Self Directed Learning modules to learn more about how you can strengthen your use of vision in your workplace, and at home, for better resilience in difficult situations. </p>\r\n\r\n<p>Did you know….SMG has a team of qualified Coaches ready to assist you in your journey to enhance your visionary skills? Our expert behavioural coaches can work with you telephonically as you explore and complete these learning modules. Optimise your chances of success! Please visit our Resilience Centre.</p>', '', '2016-01-21 10:26:17', '2016-01-21 10:26:17'),
(3, 1, 13, 20, '<p>“Leaders establish a vision for the future and set the strategies for getting there” (John. P. Kotter). It appears that your skills in this important resilience dimension means that you are well placed in being able to confront future challenges (including those that are more unpredictable) through the importance you place on planning and reviewing potential options. Please visit our Resilience Centre if you wish to seek more information.</p>', '', '2016-01-21 10:33:02', '2016-01-21 10:33:02'),
(4, 11, 4, 12, '<p>Human beings are skilful at managing a wide range of difficult situations, but occasionally the level and frequency of demands stretch our capacity to excel in our various endeavours. Self-confidence is a critical dimension of resilience which requires a strong and fundamental belief in yourself and your abilities. Your results suggest this dimension is not as strong as it could be and this may impact your ability to be resilient in your workplace or personal life, particularly during periods of high personal/work demands. Someone with low self-confidence may have trouble receiving feedback, and possibly taking failure or negative comments very personally and struggle with challenging workplace relationships. One’s self-confidence is grounded in self-belief and can be strengthened with exploring your inner thoughts and the way they affect your behaviour. Then you can learn new behaviours which can be adopted with practise. </p>\r\n\r\n<p>Please visit our Resilience Centre if you wish to seek more information. </p>', '', '2016-01-21 10:33:27', '2016-01-21 10:33:27'),
(5, 11, 13, 20, '<p>“Because one believes in oneself, one doesn&#39;t try to convince others. Because one is content with oneself, one doesn&#39;t need others&#39; approval. Because one accepts oneself, the whole world accepts him or her.” <br>\r\n? <a href="http://www.goodreads.com/author/show/2622245.Lao_Tzu">Lao Tzu</a></p>\r\n\r\n<p>“Believe you can and you&#39;re halfway there.” <br>\r\n? <a href="http://www.goodreads.com/author/show/44567.Theodore_Roosevelt">Theodore Roosevelt</a></p>\r\n\r\n<p>Well done. You appear to have a level of confidence and self-belief that will assist you in responding effectively to the many challenges a constantly changing society and work environment delivers. Please visit our Resilience centre if you wish to seek more information.</p>', '', '2016-01-21 10:33:52', '2016-01-21 10:33:52'),
(6, 2, 4, 12, '<p>When the going gets tough, the tough get going…unless you struggle with accessing the determination to work through a problem. In an increasingly complex world there are many reasons for this, and most of us need some assistance from time. Your results suggest that your sense of determination could be strengthened to give you a stronger capability in your resilience tool box to address the many problems we encounter. Someone who struggles with determination may have a history of not finishing jobs when obstacles present or have a tendency to job hop when conflict or unpredictable circumstances arise. Obstacles and conflict are inevitable in all jobs and you can learn ways to overcome them with a determination to work through the issues. Please consider visiting our Resilience Centre. </p>', '', '2016-01-21 10:34:08', '2016-01-21 10:34:08'),
(7, 2, 13, 20, '<p>“It had long since come to my attention that people of accomplishment rarely sat back and let things happen to them. They went out and happened to things.” <br>\r\n? <a href="http://www.goodreads.com/author/show/13560.Leonardo_da_Vinci">Leonardo da Vinci</a></p>\r\n\r\n<p>Well done! You appear to be the type of person who is determined to work through difficult issues to achieve successful outcomes. With this type of resilience capability you will be able to assist those who may find working through challenging problems more difficult. For more information on this important dimension of resilience please visit our Resilience Centre. Click here.</p>', '', '2016-01-21 10:34:24', '2016-01-21 10:34:24'),
(8, 7, 4, 12, '<p>Interactive communication is an exchange of ideas where all participants are active and can have an effect on one another. It requires a constructive two (or more)-way flow of information. Importantly the information technology age requires our interaction to go beyond face to face interaction to communicating confidently and effectively through the use of technology. The lack of traditional interpersonal cues can add to the complexities and difficulties of such communications.</p>\r\n\r\n<p>Effective interaction is an important dimension of overall resilience as both our interest in and capability for communicating effectively with others is a powerful determinant of sustainable successful outcomes.</p>\r\n\r\n<p>Your score on the interaction dimension of resilience indicates that you may benefit from increasing your skills in this area. This may mean improving your confidence and or interest in engaging with relevant others to achieve the goals that you wish to achieve both at work and in your personal life. Essentially the human skill of effective interaction works best when people are confident, clear in their goals and needs and see the importance of engaging (assisting or getting assistance from) others. Please visit our Resilience Centre if you wish to seek more information.</p>', '', '2016-01-21 10:34:42', '2016-01-21 10:34:42'),
(9, 7, 13, 20, '<p>“The most important thing in communication is to hear what isn&#39;t being said”. Peter Drucker. “To effectively communicate, we must realize that we are all different in the way we perceive the world and use this understanding as a guide to our communication with others.” Anthony Robbins</p>\r\n\r\n<p>Well done! You appear to be the type of person who embraces communicative interaction with others and therefore utilize the knowledge and capabilities of others, while having confidence in your own capabilities to achieve successful outcomes. If you would like more information on this key resilience dimension please visit our Resilience Centre. </p>', '', '2016-01-21 10:34:59', '2016-01-21 10:34:59'),
(10, 8, 4, 12, '<p>The quality of your relationships with other people influences how emotionally resilient you can be in the face of an emotional or physical crisis. In general, the more quality social support you can draw upon from work colleagues, family and friends, the more flexible and responsive you can be in challenging and stressful situations. Having strong and reliable relationships in place will give you a greater sense of confidence in your abilities and will allow you to approach key decisions and issues more optimistically.  Building relationships and social support networks are regarded as essential to both face significant and often unpredictable challenges as well as bouncing back from adversity.</p>\r\n\r\n<p>Your score on the relationships dimension of the resilience scale indicate that you would benefit by developing this important skill further. In developing and maintaining strong relational networks too much emphasis on very close relationships can make actually getting things done more difficult. Whereas too much relational distance can lead to a lack of support, lack of important informational input leading to sub-optimal outcomes in certain situations. If you would like further assistance in building your skills in this dimension please visit our Resilience Centre. </p>', '', '2016-01-21 10:35:19', '2016-01-21 10:35:19'),
(11, 8, 13, 20, '<p>“One of the best feelings in the world is knowing your presence and absence both mean “something to someone”</p>\r\n\r\n<p>If you want to go fast, go alone. If you want to go far, go with others”. African proverb.</p>\r\n\r\n<p>Well done! You appear to acknowledge and utilize your relationships to ensure you achieve positive and lasting outcomes in your work and personal endeavours. If want to read more regarding the importance of relationships in resilience click here.</p>', '', '2016-01-21 10:35:34', '2016-01-21 10:35:34'),
(12, 10, 4, 12, '<p>Being organised is a very good habit to have, because it saves you a lot of time and it helps you to get things done easily. Just like building a resilient organisations, individual employees and teams can also become more resilient. For example, a resilient person is one who not only ‘gets’ through crises; but also has two other important capabilities –the foresight and situation awareness to prevent potential crises emerging; and an ability to turn crises into a source of strategic opportunity. Given the rapidly changing environment in which we live and work, and the concomitant increase in unpredictable events organisational ability has possibly become the most strategically important dimension of resilience.</p>\r\n\r\n<p>Your score on the organisational dimension of the resilience scale indicate that you would benefit from developing this strategic skill further. To improve this skill it will be important that you allocate more time for looking at the ‘big picture,’ analysing what it is that is really important for you (work and personal), putting in place strategic plans aligned with your interests and requirements, and regularly reviewing those plans. If you would like more assistance in building your skills in this dimension please visit our resilience centre. </p>', '', '2016-01-21 10:36:03', '2016-01-21 10:36:03'),
(13, 10, 13, 20, '<p>“Once you have a clear picture of your priorities-that is your values, goals and high leverage activities, organise around them.” Stephen Covey</p>\r\n\r\n<p>Well done! You appear to value the importance of being organised and strategic in your approach to most of work and life challenges. This is often a difficult skill to maintain given the rapidly changing environment that we live and work in and the amount of ‘clutter’ that 24 X 7 bombardment that technology has provided. Keep up the good work but if you would like further assistance please visit our Resilience Centre. </p>', '', '2016-01-21 10:36:18', '2016-01-21 10:36:18'),
(14, 12, 4, 12, '<p>Flexibility is the inherent capability to modify a current direction to accommodate and successfully adapt to changes in the environment. By learning to become more flexible we are able to adapt to the constantly changing and unpredictable circumstances around us, and through that become more robust in effectively responding to difficult challenges and increasing our resilience.</p>\r\n\r\n<p>Resilient people can often take the opportunity presented by negative events to find new possibilities or different routes to follow. The more resilient among us are able to adapt and thrive while the less resilient sometime struggle to cope with the day to day problems that consume them. Being flexible allows us better to pursue our goals. Without flexibility of approach we would falter and fail at the first challenge. It is our flexibility that enable us to work around the difficulty and, though we may have to take a different route to still achieve our overall aims.</p>\r\n\r\n<p>Your score on the flexibility and adaptability dimension of the resilience scale indicate that you would benefit from developing this skill further. If you would like more assistance in building this skill please visit our Resilience Centre. </p>', '', '2016-01-21 10:36:32', '2016-01-21 10:36:32'),
(15, 12, 13, 20, '<p>Charles Darwin put it clearly, when he stated, "It is not the strongest of the species that survive, nor the most intelligent, but the one most responsive to change." It is this ability to respond to change that is an indicator of a flexible approach. It takes flexibility to handle, positively, the huge amount of energy involved in any period of change.</p>\r\n\r\n<p>Well done! You appear to have well developed skills for responding with agility to the many challenges that we face in a rapidly changing environment. Many people now acknowledge that one of the few constants in life is change itself. In being able to successfully respond to such changes will require continual vigilance and awareness of the environment we, and our colleagues are operating within. Keep up the good work realising that through this skill you are continuing to build your resilience and ability to not only cope with difficult challenges but become even more capable for the future. If you would like more information regarding this dimension of resilience please visit our Resilience Centre.</p>', '', '2016-01-21 10:36:57', '2016-01-21 10:36:57'),
(16, 13, 4, 12, '<p>Being proactive means thinking and acting ahead of anticipated events; this means using foresight. Not only is it a great method for avoiding unnecessary work down the road, but it can be extremely important for averting disasters. Planning well for the future and for instituting systems at work, and planning at home can make life more balanced and satisfying. It is about developing a mindset aimed at solving problems rather than dwelling on them. In that sense it is similar to the resilience dimension “Organisation,” however it requires first this important mindset about understanding what you can personally influence, being confident about your ability to act and then planning and implementing accordingly.</p>\r\n\r\n<p>Your score on the Proactivity dimension of the resilience scale indicates that you would benefit but developing this dimension further. You can do this by visiting our Resilience Centre.</p>', '', '2016-01-21 10:37:16', '2016-01-21 10:37:16'),
(17, 13, 13, 20, '<p>“There is little difference in people, but that little difference makes a big difference. The little difference is attitude. The big difference is whether it is positive or negative.” W Clement Stone</p>\r\n\r\n<p>Well done! You appear to be a person who approaches problems and challenges from a ‘half glass full’ rather than a ‘half glass empty’ perspective. This means that you are often looking at and anticipating future events from the perspective of maximizing outcomes. This skill requires a commitment to planning, organisation and acknowledging the importance of applying problem solving strategies to changing circumstances. If you wish to seek more information about this dimension of resilience please visit our Resilience Centre.</p>', '', '2016-01-21 10:37:32', '2016-01-21 10:37:32'),
(18, 9, 4, 12, '<p>Problem solving is a commonly used term and is a critical dimension of resilience. However, the intricacies of problem solving are often left unexplained where many of think of solving problems in a generic sense only. </p>\r\n\r\n<p>Evaluating a problem initially requires clarifying the nature of the problem by formulating probing questions. Information regarding the problem is then systematically gathered and the problem compared to other previous ones that may have been successfully resolved. The desired outcome of the problem must be clearly defined, and attempts to resolve be broken down to smaller manageable parts. Then clear steps to achieve the final objective are defined with various options (contingencies) explored.</p>\r\n\r\n<p>While you can clearly solve problems it appears that you would benefit by developing your skills further in this important dimension. For further information please visit our Resilience Centre.</p>', '', '2016-01-21 10:38:03', '2016-01-21 10:38:03'),
(19, 9, 13, 20, '<p>“We cannot solve our problems with the same thinking we used when we created them.” Albert Einstein</p>\r\n\r\n<p>Well done! You appear to be the type of person who often looks for innovative solutions to even the most difficult problems. Please also be aware that this ability can also be used to assist colleagues in jointly responding to even the most complex of organisational problems. If you would like more information regarding this important dimension of resilience please visit our Resilience Centre. </p>', '', '2016-01-21 10:38:23', '2016-01-21 10:38:23'),
(20, 46, 4, 12, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', '', '2016-01-21 10:38:23', '2016-01-21 10:38:23'),
(21, 46, 13, 20, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '', '2016-01-21 10:38:03', '2016-01-21 10:38:03');

-- --------------------------------------------------------

--
-- Table structure for table `smg_pages`
--

CREATE TABLE IF NOT EXISTS `smg_pages` (
  `id_page` int(11) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(255) NOT NULL,
  `page_slug` varchar(255) NOT NULL,
  `page_content` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_page`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `smg_pages`
--

INSERT INTO `smg_pages` (`id_page`, `page_title`, `page_slug`, `page_content`, `created_at`, `updated_at`) VALUES
(2, 'test page 1', 'test-page-1', '<h1><strong>test test test </strong></h1>\r\n\r\n<p>test test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test test</p>\r\n', '2016-01-08 09:55:29', '2016-01-08 14:28:59');

-- --------------------------------------------------------

--
-- Table structure for table `smg_pdf`
--

CREATE TABLE IF NOT EXISTS `smg_pdf` (
  `pdf_id` int(11) NOT NULL AUTO_INCREMENT,
  `pdf_name` varchar(100) NOT NULL,
  PRIMARY KEY (`pdf_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `smg_pdf`
--

INSERT INTO `smg_pdf` (`pdf_id`, `pdf_name`) VALUES
(1, 'special-voucher.pdf'),
(9, 'special-voucher4.pdf'),
(10, 'special-voucher5.pdf'),
(11, 'special-voucher6.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `smg_product`
--

CREATE TABLE IF NOT EXISTS `smg_product` (
  `smg_product_id` int(1) NOT NULL AUTO_INCREMENT,
  `smg_product_name` varchar(255) NOT NULL,
  `smg_product_content` text NOT NULL,
  PRIMARY KEY (`smg_product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `smg_product`
--

INSERT INTO `smg_product` (`smg_product_id`, `smg_product_name`, `smg_product_content`) VALUES
(1, 'Resilience Super Lite', ''),
(2, 'Resilience Lite', ''),
(3, 'Resilience Super Plus', '');

-- --------------------------------------------------------

--
-- Table structure for table `smg_questionnaire`
--

CREATE TABLE IF NOT EXISTS `smg_questionnaire` (
  `id_questionnaire` int(11) NOT NULL AUTO_INCREMENT,
  `question_no` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `credit_point` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1->Category, 2-> Quetion, 3-> Options',
  `parent` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_questionnaire`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=252 ;

--
-- Dumping data for table `smg_questionnaire`
--

INSERT INTO `smg_questionnaire` (`id_questionnaire`, `question_no`, `question`, `credit_point`, `type`, `parent`, `created_at`, `updated_at`) VALUES
(1, 0, 'Vision', 0, 1, 0, '2015-12-03 00:00:00', '2015-12-03 00:00:00'),
(2, 0, 'Determination', 0, 1, 0, '2015-12-03 00:00:00', '2015-12-03 00:00:00'),
(3, 1, 'I know what I want to achieve during my lifetime', 0, 2, 1, '2015-12-03 00:00:00', '2015-12-03 00:00:00'),
(4, 10, 'I have a strong determination to achieve certain things in my lifetime', 0, 2, 1, '2015-12-03 00:00:00', '2015-12-03 00:00:00'),
(5, 19, 'My current work is a step towards achieving certain things in my lifetime', 0, 2, 1, '2015-12-03 00:00:00', '2015-12-03 00:00:00'),
(6, 28, 'I know what I have to do to achieve my aspirations in life', 0, 2, 1, '2015-12-03 00:00:00', '2015-12-03 00:00:00'),
(7, 0, 'Interaction', 0, 1, 0, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(8, 0, 'Relationship', 0, 1, 0, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(9, 0, 'Problem Solving', 0, 1, 0, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(10, 0, 'Organization', 0, 1, 0, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(11, 0, 'Self-confidence', 0, 1, 0, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(12, 0, 'Flexibility & adaptability', 0, 1, 0, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(13, 0, 'Being proactive', 0, 1, 0, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(14, 3, 'I enjoy the company of other people most of the time', 0, 2, 7, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(15, 12, 'I have a unique personal brand that I frequently project to others', 0, 2, 7, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(16, 21, 'I always listen to and try to understand what others are talking to me about', 0, 2, 7, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(17, 30, 'I have a curiosity about people', 0, 2, 7, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(18, 4, 'I share my innermost secrets with a selected number of friends', 0, 2, 8, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(19, 13, 'I have a strong relationship with those who can help me achieve what I want', 0, 2, 8, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(20, 22, 'I have got friends to provide me with the emotional support I need', 0, 2, 8, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(21, 31, 'I see myself as self sufficient', 0, 2, 8, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(22, 2, 'I am ambitious to achieve certain things during my lifetime', 0, 2, 2, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(23, 11, 'I have a get up and go approach to life', 0, 2, 2, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(24, 20, 'I know what to do in most situations', 0, 2, 2, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(25, 29, 'I have a powerful self interest in achieving what I want', 0, 2, 2, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(26, 5, 'I enjoy challenge and solving problems', 0, 2, 9, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(27, 14, 'I really enjoy exploring the causes of problems', 0, 2, 9, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(28, 23, 'I can solve most problems that challenge me', 0, 2, 9, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(29, 32, 'I help others solve the problems and challenges they face', 0, 2, 9, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(30, 6, 'I like to plan out my day and write down my list of things to do', 0, 2, 10, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(31, 15, 'I plan my holiday well in advance', 0, 2, 10, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(32, 24, 'I tackle big tasks in bite sizes', 0, 2, 10, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(33, 33, 'I review my achievements weekly', 0, 2, 10, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(34, 7, 'I know how to tackle most challenges I face', 0, 2, 11, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(35, 16, 'I like taking the lead', 0, 2, 11, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(36, 25, 'I feel comfortable in new situations', 0, 2, 11, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(37, 34, 'I know I''m a great person', 0, 2, 11, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(38, 8, 'I approach a new situation with an open mind', 0, 2, 12, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(39, 17, 'I am able to adjust to changes', 0, 2, 12, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(40, 26, 'I can easily find ways of satisfying my own and other people''s needs during times of change and conflict', 0, 2, 12, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(41, 35, 'I am able to accommodate other people''s needs whilst focusing on achieving my own ambitions', 0, 2, 12, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(42, 9, 'I view change as an opportunity', 0, 2, 13, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(43, 18, 'When an unwelcome change involves me I can usually find a way to make the change benefit myself', 0, 2, 13, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(44, 27, 'I am able to focus my energy on how to make the best of any situation', 0, 2, 13, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(45, 36, 'I believe my own decisions and actions during periods of change will determine how I am affected by the change', 0, 2, 13, '2015-12-04 00:00:00', '2015-12-04 00:00:00'),
(46, 0, 'Physical Health', 0, 1, 0, '2015-12-07 00:00:00', '2015-12-07 00:00:00'),
(47, 37, 'I engage in 30 minutes of moderate intensity (e.g. Brisk walking) physically activity', 0, 2, 46, '2015-12-07 00:00:00', '2015-12-07 00:00:00'),
(49, 0, 'Infrequently', 1, 3, 47, '2015-12-07 00:00:00', '2015-12-07 00:00:00'),
(50, 0, '1-2 times per week', 2, 3, 47, '2015-12-07 00:00:00', '2015-12-07 00:00:00'),
(51, 0, '3-4 times per week', 3, 3, 47, '2015-12-07 00:00:00', '2015-12-07 00:00:00'),
(52, 0, '5-7 times per week', 4, 3, 47, '2015-12-07 00:00:00', '2015-12-07 00:00:00'),
(53, 0, '5-7 times per week AND this includes higher intensity exercise (eg. Jogging) at least twice per week', 5, 3, 47, '2015-12-07 00:00:00', '2015-12-07 00:00:00'),
(54, 38, 'I consider my current overall health status to be:', 0, 2, 46, '2015-12-07 00:00:00', '2015-12-07 00:00:00'),
(55, 0, 'Very poor', 1, 3, 54, '2015-12-07 00:00:00', '2015-12-07 00:00:00'),
(56, 0, 'Poor', 2, 3, 54, '2015-12-07 00:00:00', '2015-12-07 00:00:00'),
(57, 0, 'Average', 3, 3, 54, '2015-12-07 00:00:00', '2015-12-07 00:00:00'),
(58, 0, 'Good', 4, 3, 54, '2015-12-07 00:00:00', '2015-12-07 00:00:00'),
(59, 0, 'Very good', 5, 3, 54, '2015-12-07 00:00:00', '2015-12-07 00:00:00'),
(60, 39, 'My smoking status is', 0, 2, 46, '2015-12-07 00:00:00', '2015-12-07 00:00:00'),
(61, 0, 'Average of I or more cigarettes per day', 1, 3, 60, '2015-12-07 00:00:00', '2015-12-07 00:00:00'),
(62, 0, 'Social Smoker', 2, 3, 60, '2015-12-07 00:00:00', '2015-12-07 00:00:00'),
(63, 0, 'Quit smoking completely since last one year', 3, 3, 60, '2015-12-07 00:00:00', '2015-12-07 00:00:00'),
(64, 40, 'My daily nutrition intake looks something like this', 0, 2, 46, '2015-12-07 00:00:00', '2015-12-07 00:00:00'),
(65, 0, 'I Don’t eat Fruit or Vegetables.', 1, 3, 64, '2015-12-07 00:00:00', '2015-12-07 00:00:00'),
(66, 0, 'I eat 0-1 piece of fruit and 1 serve of vegetables each day', 2, 3, 64, '2015-12-07 00:00:00', '2015-12-07 00:00:00'),
(67, 0, 'I eat at 1 piece of fruit and 2-3 serves of vegetables each day', 3, 3, 64, '2015-12-07 00:00:00', '2015-12-07 00:00:00'),
(68, 0, 'I eat 1-2 pieces of fruit and 4 serves of vegetables each day', 4, 3, 64, '2015-12-07 00:00:00', '2015-12-07 00:00:00'),
(69, 0, 'I eat 2 serves of fruit and 5 serves of vegetables each day.', 5, 3, 64, '2015-12-07 00:00:00', '2015-12-07 00:00:00'),
(70, 0, 'Quit smoking completely since last 5 years', 4, 3, 60, '2015-12-08 00:00:00', '2015-12-08 00:00:00'),
(71, 0, 'Been a Non-Smoker all throughout', 5, 3, 60, '2015-12-08 00:00:00', '2015-12-08 00:00:00'),
(72, 0, 'Strongly Disagree', 1, 3, 3, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(73, 0, 'Disagree', 2, 3, 3, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(74, 0, 'Neutral', 3, 3, 3, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(75, 0, 'Agree', 4, 3, 3, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(76, 0, 'Strongly Agree', 5, 3, 3, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(77, 0, 'Strongly Disagree', 1, 3, 4, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(78, 0, 'Disagree', 2, 3, 4, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(79, 0, 'Neutral', 3, 3, 4, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(80, 0, 'Agree', 4, 3, 4, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(81, 0, 'Strongly Agree', 5, 3, 4, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(82, 0, 'Strongly Disagree', 1, 3, 5, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(83, 0, 'Disagree', 2, 3, 5, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(84, 0, 'Neutral', 3, 3, 5, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(85, 0, 'Agree', 4, 3, 5, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(86, 0, 'Strongly Agree', 5, 3, 5, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(87, 0, 'Strongly Disagree', 1, 3, 6, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(88, 0, 'Disagree', 2, 3, 6, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(89, 0, 'Neutral', 3, 3, 6, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(90, 0, 'Agree', 4, 3, 6, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(91, 0, 'Strongly Agree', 5, 3, 6, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(92, 0, 'Strongly Disagree', 1, 3, 14, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(93, 0, 'Disagree', 2, 3, 14, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(94, 0, 'Neutral', 3, 3, 14, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(95, 0, 'Agree', 4, 3, 14, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(96, 0, 'Strongly Agree', 5, 3, 14, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(97, 0, 'Strongly Disagree', 1, 3, 15, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(98, 0, 'Disagree', 2, 3, 15, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(99, 0, 'Neutral', 3, 3, 15, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(100, 0, 'Agree', 4, 3, 15, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(101, 0, 'Strongly Agree', 5, 3, 15, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(102, 0, 'Strongly Disagree', 1, 3, 16, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(103, 0, 'Disagree', 2, 3, 16, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(104, 0, 'Neutral', 3, 3, 16, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(105, 0, 'Agree', 4, 3, 16, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(106, 0, 'Strongly Agree', 5, 3, 16, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(107, 0, 'Strongly Disagree', 1, 3, 17, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(108, 0, 'Disagree', 2, 3, 17, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(109, 0, 'Neutral', 3, 3, 17, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(110, 0, 'Agree', 4, 3, 17, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(111, 0, 'Strongly Agree', 5, 3, 17, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(112, 0, 'Strongly Disagree', 1, 3, 18, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(113, 0, 'Disagree', 2, 3, 18, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(114, 0, 'Neutral', 3, 3, 18, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(115, 0, 'Agree', 4, 3, 18, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(116, 0, 'Strongly Agree', 5, 3, 18, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(117, 0, 'Strongly Disagree', 1, 3, 19, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(118, 0, 'Disagree', 2, 3, 19, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(119, 0, 'Neutral', 3, 3, 19, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(120, 0, 'Agree', 4, 3, 19, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(121, 0, 'Strongly Agree', 5, 3, 19, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(122, 0, 'Strongly Disagree', 1, 3, 20, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(123, 0, 'Disagree', 2, 3, 20, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(124, 0, 'Neutral', 3, 3, 20, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(125, 0, 'Agree', 4, 3, 20, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(126, 0, 'Strongly Agree', 5, 3, 20, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(127, 0, 'Strongly Disagree', 1, 3, 21, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(128, 0, 'Disagree', 2, 3, 21, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(129, 0, 'Neutral', 3, 3, 21, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(130, 0, 'Agree', 4, 3, 21, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(131, 0, 'Strongly Agree', 5, 3, 21, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(132, 0, 'Strongly Disagree', 1, 3, 22, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(133, 0, 'Disagree', 2, 3, 22, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(134, 0, 'Neutral', 3, 3, 22, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(135, 0, 'Agree', 4, 3, 22, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(136, 0, 'Strongly Agree', 5, 3, 22, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(137, 0, 'Strongly Disagree', 1, 3, 23, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(138, 0, 'Disagree', 2, 3, 23, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(139, 0, 'Neutral', 3, 3, 23, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(140, 0, 'Agree', 4, 3, 23, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(141, 0, 'Strongly Agree', 5, 3, 23, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(142, 0, 'Strongly Disagree', 1, 3, 24, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(143, 0, 'Disagree', 2, 3, 24, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(144, 0, 'Neutral', 3, 3, 24, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(145, 0, 'Agree', 4, 3, 24, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(146, 0, 'Strongly Agree', 5, 3, 24, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(147, 0, 'Strongly Disagree', 1, 3, 25, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(148, 0, 'Disagree', 2, 3, 25, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(149, 0, 'Neutral', 3, 3, 25, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(150, 0, 'Agree', 4, 3, 25, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(151, 0, 'Strongly Agree', 5, 3, 25, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(152, 0, 'Strongly Disagree', 1, 3, 26, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(153, 0, 'Disagree', 2, 3, 26, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(154, 0, 'Neutral', 3, 3, 26, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(155, 0, 'Agree', 4, 3, 26, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(156, 0, 'Strongly Agree', 5, 3, 26, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(157, 0, 'Strongly Disagree', 1, 3, 27, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(158, 0, 'Disagree', 2, 3, 27, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(159, 0, 'Neutral', 3, 3, 27, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(160, 0, 'Agree', 4, 3, 27, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(161, 0, 'Strongly Agree', 5, 3, 27, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(162, 0, 'Strongly Disagree', 1, 3, 28, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(163, 0, 'Disagree', 2, 3, 28, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(164, 0, 'Neutral', 3, 3, 28, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(165, 0, 'Agree', 4, 3, 28, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(166, 0, 'Strongly Agree', 5, 3, 28, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(167, 0, 'Strongly Disagree', 1, 3, 29, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(168, 0, 'Disagree', 2, 3, 29, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(169, 0, 'Neutral', 3, 3, 29, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(170, 0, 'Agree', 4, 3, 29, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(171, 0, 'Strongly Agree', 5, 3, 29, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(172, 0, 'Strongly Disagree', 1, 3, 30, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(173, 0, 'Disagree', 2, 3, 30, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(174, 0, 'Neutral', 3, 3, 30, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(175, 0, 'Agree', 4, 3, 30, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(176, 0, 'Strongly Agree', 5, 3, 30, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(177, 0, 'Strongly Disagree', 1, 3, 31, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(178, 0, 'Disagree', 2, 3, 31, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(179, 0, 'Neutral', 3, 3, 31, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(180, 0, 'Agree', 4, 3, 31, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(181, 0, 'Strongly Agree', 5, 3, 31, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(182, 0, 'Strongly Disagree', 1, 3, 32, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(183, 0, 'Disagree', 2, 3, 32, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(184, 0, 'Neutral', 3, 3, 32, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(185, 0, 'Agree', 4, 3, 32, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(186, 0, 'Strongly Agree', 5, 3, 32, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(187, 0, 'Strongly Disagree', 1, 3, 33, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(188, 0, 'Disagree', 2, 3, 33, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(189, 0, 'Neutral', 3, 3, 33, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(190, 0, 'Agree', 4, 3, 33, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(191, 0, 'Strongly Agree', 5, 3, 33, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(192, 0, 'Strongly Disagree', 1, 3, 34, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(193, 0, 'Disagree', 2, 3, 34, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(194, 0, 'Neutral', 3, 3, 34, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(195, 0, 'Agree', 4, 3, 34, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(196, 0, 'Strongly Agree', 5, 3, 34, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(197, 0, 'Strongly Disagree', 1, 3, 35, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(198, 0, 'Disagree', 2, 3, 35, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(199, 0, 'Neutral', 3, 3, 35, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(200, 0, 'Agree', 4, 3, 35, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(201, 0, 'Strongly Agree', 5, 3, 35, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(202, 0, 'Strongly Disagree', 1, 3, 36, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(203, 0, 'Disagree', 2, 3, 36, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(204, 0, 'Neutral', 3, 3, 36, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(205, 0, 'Agree', 4, 3, 36, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(206, 0, 'Strongly Agree', 5, 3, 36, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(207, 0, 'Strongly Disagree', 1, 3, 37, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(208, 0, 'Disagree', 2, 3, 37, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(209, 0, 'Neutral', 3, 3, 37, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(210, 0, 'Agree', 4, 3, 37, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(211, 0, 'Strongly Agree', 5, 3, 37, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(212, 0, 'Strongly Disagree', 1, 3, 38, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(213, 0, 'Disagree', 2, 3, 38, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(214, 0, 'Neutral', 3, 3, 38, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(215, 0, 'Agree', 4, 3, 38, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(216, 0, 'Strongly Agree', 5, 3, 38, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(217, 0, 'Strongly Disagree', 1, 3, 39, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(218, 0, 'Disagree', 2, 3, 39, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(219, 0, 'Neutral', 3, 3, 39, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(220, 0, 'Agree', 4, 3, 39, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(221, 0, 'Strongly Agree', 5, 3, 39, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(222, 0, 'Strongly Disagree', 1, 3, 40, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(223, 0, 'Disagree', 2, 3, 40, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(224, 0, 'Neutral', 3, 3, 40, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(225, 0, 'Agree', 4, 3, 40, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(226, 0, 'Strongly Agree', 5, 3, 40, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(227, 0, 'Strongly Disagree', 1, 3, 41, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(228, 0, 'Disagree', 2, 3, 41, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(229, 0, 'Neutral', 3, 3, 41, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(230, 0, 'Agree', 4, 3, 41, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(231, 0, 'Strongly Agree', 5, 3, 41, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(232, 0, 'Strongly Disagree', 1, 3, 42, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(233, 0, 'Disagree', 2, 3, 42, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(234, 0, 'Neutral', 3, 3, 42, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(235, 0, 'Agree', 4, 3, 42, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(236, 0, 'Strongly Agree', 5, 3, 42, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(237, 0, 'Strongly Disagree', 1, 3, 43, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(238, 0, 'Disagree', 2, 3, 43, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(239, 0, 'Neutral', 3, 3, 43, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(240, 0, 'Agree', 4, 3, 43, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(241, 0, 'Strongly Agree', 5, 3, 43, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(242, 0, 'Strongly Disagree', 1, 3, 44, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(243, 0, 'Disagree', 2, 3, 44, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(244, 0, 'Neutral', 3, 3, 44, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(245, 0, 'Agree', 4, 3, 44, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(246, 0, 'Strongly Agree', 5, 3, 44, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(247, 0, 'Strongly Disagree', 1, 3, 45, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(248, 0, 'Disagree', 2, 3, 45, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(249, 0, 'Neutral', 3, 3, 45, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(250, 0, 'Agree', 4, 3, 45, '2015-12-14 00:00:00', '2015-12-14 00:00:00'),
(251, 0, 'Strongly Agree', 5, 3, 45, '2015-12-14 00:00:00', '2015-12-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `smg_survey`
--

CREATE TABLE IF NOT EXISTS `smg_survey` (
  `id_survey` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `survey_data` text NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id_survey`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `smg_survey`
--

INSERT INTO `smg_survey` (`id_survey`, `id_user`, `survey_data`, `created_at`) VALUES
(22, 41, 'a:10:{i:1;a:4:{i:0;s:2:"72";i:1;s:2:"80";i:2;s:2:"85";i:3;s:2:"90";}i:2;a:4:{i:0;s:3:"133";i:1;s:3:"140";i:2;s:3:"145";i:3;s:3:"150";}i:7;a:4:{i:0;s:2:"94";i:1;s:3:"100";i:2;s:3:"105";i:3;s:3:"110";}i:8;a:4:{i:0;s:3:"114";i:1;s:3:"120";i:2;s:3:"125";i:3;s:3:"130";}i:9;a:4:{i:0;s:3:"154";i:1;s:3:"160";i:2;s:3:"165";i:3;s:3:"170";}i:10;a:4:{i:0;s:3:"174";i:1;s:3:"180";i:2;s:3:"185";i:3;s:3:"190";}i:11;a:4:{i:0;s:3:"194";i:1;s:3:"200";i:2;s:3:"205";i:3;s:3:"210";}i:12;a:4:{i:0;s:3:"214";i:1;s:3:"220";i:2;s:3:"225";i:3;s:3:"230";}i:13;a:4:{i:0;s:3:"235";i:1;s:3:"240";i:2;s:3:"245";i:3;s:3:"250";}i:46;a:4:{i:0;s:2:"52";i:1;s:2:"58";i:2;s:2:"70";i:3;s:2:"68";}}', '2015-12-30 19:27:24'),
(23, 41, 'a:10:{i:1;a:4:{i:0;s:2:"74";i:1;s:2:"78";i:2;s:2:"86";i:3;s:2:"88";}i:2;a:4:{i:0;s:3:"136";i:1;s:3:"141";i:2;s:3:"146";i:3;s:3:"148";}i:7;a:4:{i:0;s:2:"95";i:1;s:2:"98";i:2;s:3:"106";i:3;s:3:"109";}i:8;a:4:{i:0;s:3:"112";i:1;s:3:"117";i:2;s:3:"126";i:3;s:3:"128";}i:9;a:4:{i:0;s:3:"153";i:1;s:3:"161";i:2;s:3:"166";i:3;s:3:"167";}i:10;a:4:{i:0;s:3:"173";i:1;s:3:"181";i:2;s:3:"184";i:3;s:3:"191";}i:11;a:4:{i:0;s:3:"193";i:1;s:3:"201";i:2;s:3:"203";i:3;s:3:"209";}i:12;a:4:{i:0;s:3:"214";i:1;s:3:"221";i:2;s:3:"223";i:3;s:3:"230";}i:13;a:4:{i:0;s:3:"235";i:1;s:3:"241";i:2;s:3:"243";i:3;s:3:"250";}i:46;a:4:{i:0;s:2:"51";i:1;s:2:"59";i:2;s:2:"70";i:3;s:2:"68";}}', '2015-12-31 17:51:47'),
(24, 38, 'a:10:{i:1;a:4:{i:0;s:2:"76";i:1;s:2:"78";i:2;s:2:"86";i:3;s:2:"89";}i:2;a:4:{i:0;s:3:"135";i:1;s:3:"139";i:2;s:3:"146";i:3;s:3:"149";}i:7;a:4:{i:0;s:2:"95";i:1;s:2:"99";i:2;s:3:"106";i:3;s:3:"110";}i:8;a:4:{i:0;s:3:"115";i:1;s:3:"120";i:2;s:3:"125";i:3;s:3:"130";}i:9;a:4:{i:0;s:3:"155";i:1;s:3:"158";i:2;s:3:"164";i:3;s:3:"170";}i:10;a:4:{i:0;s:3:"174";i:1;s:3:"180";i:2;s:3:"184";i:3;s:3:"190";}i:11;a:4:{i:0;s:3:"195";i:1;s:3:"201";i:2;s:3:"204";i:3;s:3:"210";}i:12;a:4:{i:0;s:3:"214";i:1;s:3:"218";i:2;s:3:"224";i:3;s:3:"230";}i:13;a:4:{i:0;s:3:"233";i:1;s:3:"240";i:2;s:3:"244";i:3;s:3:"250";}i:46;a:4:{i:0;s:2:"53";i:1;s:2:"57";i:2;s:2:"63";i:3;s:2:"67";}}', '2016-01-04 06:47:50'),
(25, 38, 'a:10:{i:1;a:4:{i:0;s:2:"74";i:1;s:2:"80";i:2;s:2:"85";i:3;s:2:"88";}i:2;a:4:{i:0;s:3:"135";i:1;s:3:"141";i:2;s:3:"145";i:3;s:3:"148";}i:7;a:4:{i:0;s:2:"95";i:1;s:3:"100";i:2;s:3:"105";i:3;s:3:"111";}i:8;a:4:{i:0;s:3:"114";i:1;s:3:"121";i:2;s:3:"125";i:3;s:3:"131";}i:9;a:4:{i:0;s:3:"156";i:1;s:3:"158";i:2;s:3:"165";i:3;s:3:"171";}i:10;a:4:{i:0;s:3:"173";i:1;s:3:"178";i:2;s:3:"186";i:3;s:3:"188";}i:11;a:4:{i:0;s:3:"195";i:1;s:3:"201";i:2;s:3:"205";i:3;s:3:"210";}i:12;a:4:{i:0;s:3:"215";i:1;s:3:"220";i:2;s:3:"225";i:3;s:3:"231";}i:13;a:4:{i:0;s:3:"235";i:1;s:3:"240";i:2;s:3:"245";i:3;s:3:"250";}i:46;a:4:{i:0;s:2:"51";i:1;s:2:"58";i:2;s:2:"61";i:3;s:2:"67";}}', '2016-01-04 09:52:16'),
(27, 46, 'a:10:{i:1;a:4:{i:0;s:2:"72";i:1;s:2:"81";i:2;s:2:"85";i:3;s:2:"89";}i:2;a:4:{i:0;s:3:"133";i:1;s:3:"137";i:2;s:3:"146";i:3;s:3:"150";}i:7;a:4:{i:0;s:2:"94";i:1;s:2:"98";i:2;s:3:"102";i:3;s:3:"111";}i:8;a:4:{i:0;s:3:"115";i:1;s:3:"119";i:2;s:3:"123";i:3;s:3:"127";}i:9;a:4:{i:0;s:3:"156";i:1;s:3:"160";i:2;s:3:"164";i:3;s:3:"168";}i:10;a:4:{i:0;s:3:"172";i:1;s:3:"181";i:2;s:3:"185";i:3;s:3:"189";}i:11;a:4:{i:0;s:3:"193";i:1;s:3:"197";i:2;s:3:"206";i:3;s:3:"210";}i:12;a:4:{i:0;s:3:"214";i:1;s:3:"218";i:2;s:3:"222";i:3;s:3:"231";}i:13;a:4:{i:0;s:3:"235";i:1;s:3:"239";i:2;s:3:"243";i:3;s:3:"247";}i:46;a:4:{i:0;s:2:"50";i:1;s:2:"57";i:2;s:2:"70";i:3;s:2:"69";}}', '2016-01-06 05:53:34'),
(28, 41, 'a:10:{i:1;a:4:{i:0;s:2:"76";i:1;s:2:"81";i:2;s:2:"86";i:3;s:2:"91";}i:2;a:4:{i:0;s:3:"136";i:1;s:3:"141";i:2;s:3:"146";i:3;s:3:"151";}i:7;a:4:{i:0;s:2:"96";i:1;s:3:"101";i:2;s:3:"106";i:3;s:3:"111";}i:8;a:4:{i:0;s:3:"116";i:1;s:3:"121";i:2;s:3:"126";i:3;s:3:"131";}i:9;a:4:{i:0;s:3:"156";i:1;s:3:"161";i:2;s:3:"166";i:3;s:3:"171";}i:10;a:4:{i:0;s:3:"176";i:1;s:3:"181";i:2;s:3:"186";i:3;s:3:"191";}i:11;a:4:{i:0;s:3:"196";i:1;s:3:"201";i:2;s:3:"206";i:3;s:3:"211";}i:12;a:4:{i:0;s:3:"216";i:1;s:3:"221";i:2;s:3:"226";i:3;s:3:"231";}i:13;a:4:{i:0;s:3:"236";i:1;s:3:"241";i:2;s:3:"246";i:3;s:3:"251";}i:46;a:4:{i:0;s:2:"53";i:1;s:2:"59";i:2;s:2:"71";i:3;s:2:"69";}}', '2016-01-19 12:08:24'),
(29, 41, 'a:10:{i:1;a:4:{i:0;s:2:"76";i:1;s:2:"81";i:2;s:2:"86";i:3;s:2:"91";}i:2;a:4:{i:0;s:3:"136";i:1;s:3:"141";i:2;s:3:"146";i:3;s:3:"151";}i:7;a:4:{i:0;s:2:"96";i:1;s:3:"101";i:2;s:3:"106";i:3;s:3:"111";}i:8;a:4:{i:0;s:3:"116";i:1;s:3:"121";i:2;s:3:"126";i:3;s:3:"131";}i:9;a:4:{i:0;s:3:"156";i:1;s:3:"161";i:2;s:3:"166";i:3;s:3:"171";}i:10;a:4:{i:0;s:3:"176";i:1;s:3:"181";i:2;s:3:"186";i:3;s:3:"191";}i:11;a:4:{i:0;s:3:"196";i:1;s:3:"201";i:2;s:3:"206";i:3;s:3:"211";}i:12;a:4:{i:0;s:3:"216";i:1;s:3:"221";i:2;s:3:"226";i:3;s:3:"231";}i:13;a:4:{i:0;s:3:"236";i:1;s:3:"241";i:2;s:3:"246";i:3;s:3:"251";}i:46;a:4:{i:0;s:2:"53";i:1;s:2:"59";i:2;s:2:"71";i:3;s:2:"69";}}', '2016-01-19 12:11:23'),
(30, 41, 'a:10:{i:1;a:4:{i:0;s:2:"76";i:1;s:2:"81";i:2;s:2:"86";i:3;s:2:"91";}i:2;a:4:{i:0;s:3:"136";i:1;s:3:"141";i:2;s:3:"146";i:3;s:3:"151";}i:7;a:4:{i:0;s:2:"96";i:1;s:3:"101";i:2;s:3:"106";i:3;s:3:"111";}i:8;a:4:{i:0;s:3:"116";i:1;s:3:"121";i:2;s:3:"126";i:3;s:3:"131";}i:9;a:4:{i:0;s:3:"156";i:1;s:3:"161";i:2;s:3:"166";i:3;s:3:"171";}i:10;a:4:{i:0;s:3:"176";i:1;s:3:"181";i:2;s:3:"186";i:3;s:3:"191";}i:11;a:4:{i:0;s:3:"196";i:1;s:3:"201";i:2;s:3:"206";i:3;s:3:"211";}i:12;a:4:{i:0;s:3:"216";i:1;s:3:"221";i:2;s:3:"226";i:3;s:3:"231";}i:13;a:4:{i:0;s:3:"236";i:1;s:3:"241";i:2;s:3:"246";i:3;s:3:"251";}i:46;a:4:{i:0;s:2:"53";i:1;s:2:"59";i:2;s:2:"71";i:3;s:2:"69";}}', '2016-01-19 12:27:49'),
(31, 46, 'a:10:{i:1;a:4:{i:0;s:2:"72";i:1;s:2:"81";i:2;s:2:"85";i:3;s:2:"89";}i:2;a:4:{i:0;s:3:"133";i:1;s:3:"137";i:2;s:3:"146";i:3;s:3:"150";}i:7;a:4:{i:0;s:2:"94";i:1;s:2:"98";i:2;s:3:"102";i:3;s:3:"111";}i:8;a:4:{i:0;s:3:"115";i:1;s:3:"119";i:2;s:3:"123";i:3;s:3:"127";}i:9;a:4:{i:0;s:3:"156";i:1;s:3:"160";i:2;s:3:"164";i:3;s:3:"168";}i:10;a:4:{i:0;s:3:"172";i:1;s:3:"181";i:2;s:3:"185";i:3;s:3:"189";}i:11;a:4:{i:0;s:3:"193";i:1;s:3:"197";i:2;s:3:"206";i:3;s:3:"210";}i:12;a:4:{i:0;s:3:"214";i:1;s:3:"218";i:2;s:3:"222";i:3;s:3:"231";}i:13;a:4:{i:0;s:3:"235";i:1;s:3:"239";i:2;s:3:"243";i:3;s:3:"247";}i:46;a:4:{i:0;s:2:"50";i:1;s:2:"57";i:2;s:2:"70";i:3;s:2:"69";}}', '2016-01-22 04:24:32'),
(32, 46, 'a:10:{i:1;a:4:{i:0;s:2:"75";i:1;s:2:"77";i:2;s:2:"86";i:3;s:2:"88";}i:2;a:4:{i:0;s:3:"136";i:1;s:3:"137";i:2;s:3:"146";i:3;s:3:"151";}i:7;a:4:{i:0;s:2:"94";i:1;s:2:"99";i:2;s:3:"103";i:3;s:3:"108";}i:8;a:4:{i:0;s:3:"116";i:1;s:3:"120";i:2;s:3:"124";i:3;s:3:"127";}i:9;a:4:{i:0;s:3:"154";i:1;s:3:"160";i:2;s:3:"165";i:3;s:3:"170";}i:10;a:4:{i:0;s:3:"173";i:1;s:3:"180";i:2;s:3:"185";i:3;s:3:"189";}i:11;a:4:{i:0;s:3:"192";i:1;s:3:"200";i:2;s:3:"206";i:3;s:3:"208";}i:12;a:4:{i:0;s:3:"214";i:1;s:3:"221";i:2;s:3:"224";i:3;s:3:"231";}i:13;a:4:{i:0;s:3:"232";i:1;s:3:"239";i:2;s:3:"245";i:3;s:3:"247";}i:46;a:4:{i:0;s:2:"52";i:1;s:2:"56";i:2;s:2:"70";i:3;s:2:"67";}}', '2016-01-22 12:48:28'),
(33, 41, 'a:10:{i:1;a:4:{i:0;s:2:"76";i:1;s:2:"81";i:2;s:2:"86";i:3;s:2:"91";}i:2;a:4:{i:0;s:3:"136";i:1;s:3:"141";i:2;s:3:"146";i:3;s:3:"151";}i:7;a:4:{i:0;s:2:"96";i:1;s:3:"101";i:2;s:3:"106";i:3;s:3:"111";}i:8;a:4:{i:0;s:3:"116";i:1;s:3:"121";i:2;s:3:"126";i:3;s:3:"131";}i:9;a:4:{i:0;s:3:"156";i:1;s:3:"161";i:2;s:3:"166";i:3;s:3:"171";}i:10;a:4:{i:0;s:3:"176";i:1;s:3:"181";i:2;s:3:"186";i:3;s:3:"191";}i:11;a:4:{i:0;s:3:"196";i:1;s:3:"201";i:2;s:3:"206";i:3;s:3:"211";}i:12;a:4:{i:0;s:3:"216";i:1;s:3:"221";i:2;s:3:"226";i:3;s:3:"231";}i:13;a:4:{i:0;s:3:"236";i:1;s:3:"241";i:2;s:3:"246";i:3;s:3:"251";}i:46;a:4:{i:0;s:2:"53";i:1;s:2:"59";i:2;s:2:"71";i:3;s:2:"69";}}', '2016-01-22 15:26:13'),
(34, 41, 'a:10:{i:1;a:4:{i:0;s:2:"72";i:1;s:2:"81";i:2;s:2:"86";i:3;s:2:"90";}i:2;a:4:{i:0;s:3:"132";i:1;s:3:"137";i:2;s:3:"146";i:3;s:3:"151";}i:7;a:4:{i:0;s:2:"93";i:1;s:2:"97";i:2;s:3:"102";i:3;s:3:"111";}i:8;a:4:{i:0;s:3:"113";i:1;s:3:"118";i:2;s:3:"122";i:3;s:3:"127";}i:9;a:4:{i:0;s:3:"154";i:1;s:3:"158";i:2;s:3:"163";i:3;s:3:"167";}i:10;a:4:{i:0;s:3:"174";i:1;s:3:"179";i:2;s:3:"183";i:3;s:3:"188";}i:11;a:4:{i:0;s:3:"195";i:1;s:3:"199";i:2;s:3:"204";i:3;s:3:"208";}i:12;a:4:{i:0;s:3:"215";i:1;s:3:"220";i:2;s:3:"224";i:3;s:3:"229";}i:13;a:4:{i:0;s:3:"236";i:1;s:3:"240";i:2;s:3:"245";i:3;s:3:"249";}i:46;a:4:{i:0;s:2:"52";i:1;s:2:"58";i:2;s:2:"71";i:3;s:2:"69";}}', '2016-01-27 10:55:01'),
(35, 41, 'a:10:{i:1;a:4:{i:0;s:2:"76";i:1;s:2:"81";i:2;s:2:"86";i:3;s:2:"91";}i:2;a:4:{i:0;s:3:"136";i:1;s:3:"141";i:2;s:3:"146";i:3;s:3:"151";}i:7;a:4:{i:0;s:2:"96";i:1;s:3:"101";i:2;s:3:"106";i:3;s:3:"111";}i:8;a:4:{i:0;s:3:"116";i:1;s:3:"121";i:2;s:3:"126";i:3;s:3:"131";}i:9;a:4:{i:0;s:3:"156";i:1;s:3:"161";i:2;s:3:"166";i:3;s:3:"171";}i:10;a:4:{i:0;s:3:"176";i:1;s:3:"181";i:2;s:3:"186";i:3;s:3:"191";}i:11;a:4:{i:0;s:3:"196";i:1;s:3:"201";i:2;s:3:"206";i:3;s:3:"211";}i:12;a:4:{i:0;s:3:"216";i:1;s:3:"221";i:2;s:3:"226";i:3;s:3:"231";}i:13;a:4:{i:0;s:3:"236";i:1;s:3:"241";i:2;s:3:"246";i:3;s:3:"251";}i:46;a:4:{i:0;s:2:"53";i:1;s:2:"59";i:2;s:2:"71";i:3;s:2:"69";}}', '2016-01-27 17:08:32'),
(36, 41, 'a:10:{i:1;a:4:{i:0;s:2:"72";i:1;s:2:"77";i:2;s:2:"85";i:3;s:2:"89";}i:2;a:4:{i:0;s:3:"133";i:1;s:3:"141";i:2;s:3:"144";i:3;s:3:"149";}i:7;a:4:{i:0;s:2:"94";i:1;s:2:"98";i:2;s:3:"103";i:3;s:3:"109";}i:8;a:4:{i:0;s:3:"113";i:1;s:3:"121";i:2;s:3:"126";i:3;s:3:"128";}i:9;a:4:{i:0;s:3:"155";i:1;s:3:"160";i:2;s:3:"163";i:3;s:3:"171";}i:10;a:4:{i:0;s:3:"176";i:1;s:3:"179";i:2;s:3:"185";i:3;s:3:"188";}i:11;a:4:{i:0;s:3:"194";i:1;s:3:"201";i:2;s:3:"204";i:3;s:3:"208";}i:12;a:4:{i:0;s:3:"213";i:1;s:3:"218";i:2;s:3:"224";i:3;s:3:"230";}i:13;a:4:{i:0;s:3:"234";i:1;s:3:"237";i:2;s:3:"246";i:3;s:3:"251";}i:46;a:4:{i:0;s:2:"52";i:1;s:2:"59";i:2;s:2:"70";i:3;s:2:"69";}}', '2016-01-28 10:05:52');

-- --------------------------------------------------------

--
-- Table structure for table `smg_users`
--

CREATE TABLE IF NOT EXISTS `smg_users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `display_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL COMMENT '1 -> Site Administrator, 2 -> Company, 3 -> Site users',
  `activation_key` varchar(255) NOT NULL,
  `user_status` char(1) NOT NULL DEFAULT 'A' COMMENT 'A -> Active, I -> Inactive, H -> Hold',
  `other_details` text NOT NULL,
  `user_organization` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `smg_users`
--

INSERT INTO `smg_users` (`id_user`, `display_name`, `password`, `user_email`, `user_type`, `activation_key`, `user_status`, `other_details`, `user_organization`, `product`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '7cdde99d72507e5d8388313127f98097', 'subhadip.sahoo@businessprodesigns.com', 1, 'm4yFptICxJrBYH01EDdN', 'A', '', '', '', '2015-11-09 06:18:24', '2015-11-09 06:18:24'),
(15, 'ABC Organization', 'e10adc3949ba59abbe56e057f20f883e', 'sirshendu.das1@businessprodesigns.com', 2, '', 'A', '', '', '', '2015-11-27 09:07:24', '2015-11-27 09:07:24'),
(16, 'testorg', 'e10adc3949ba59abbe56e057f20f883e', 'gautam.kumar@businessprodesigns.com', 2, '', 'A', '', '', '3', '2015-11-27 11:45:25', '2016-01-20 20:18:53'),
(21, 'test again organization', 'aa90d321213cbf42044996aec2f7581b', 'subhadip.sahoo2@businessprodesigns.com', 2, '', 'A', '', '', '', '2015-12-09 07:06:37', '2015-12-09 07:06:37'),
(37, 'Gk', 'e10adc3949ba59abbe56e057f20f883e', 'bpt.gautam@gmail.com', 3, '', 'A', '{"user_organisation":"ABC Organization","user_contact":"9339193123","user_address":"kolkata","user_depertment":"Machinary","user_location":"Australia","user_level":"Manager","user_gender":"M","user_age":"21-30"}', '16', '', '2015-12-10 05:26:40', '2015-12-10 05:26:40'),
(38, 'Anil Joseph', '0120b7672d834446f25c15a22c0bc300', 'anil.joseph@businessprodesigns.com.au', 3, '', 'A', '{"user_organisation":"testorg","user_contact":"0433134786","user_address":"","user_depertment":"","user_location":"","user_level":"","user_gender":"","user_age":""}', 'testorg', '', '2015-12-10 05:50:00', '2015-12-10 05:50:00'),
(39, 'Suraj Kumar Samanta', 'e10adc3949ba59abbe56e057f20f883e', 'suraj.samanta@gmail.com', 3, '', 'A', '{"user_org_id":"21","user_organisation":"test again organization","user_contact":"9876543210","user_address":"Kolkata","user_depertment":"development","user_location":"Mellbourne","user_level":"account manager","user_gender":"M","user_age":"31-40"}', '21', '', '2015-12-10 10:48:23', '2015-12-10 10:48:23'),
(40, 'Suraj Kumar Samanta', 'e10adc3949ba59abbe56e057f20f883e', 'suraj.samanta@businessprodesigns.com', 3, '', 'A', '{"user_org_id":"21","user_organisation":"test again organization","user_contact":"9876543210","user_address":"Kolkata","user_depertment":"development","user_location":"Mellbourne","user_level":"account manager","user_gender":"M","user_age":"31-40"}', '21', '', '2015-12-16 12:01:33', '2015-12-16 12:01:33'),
(41, 'Sirshendu das', 'e10adc3949ba59abbe56e057f20f883e', 'sirshendu.das@businessprodesigns.com', 3, '', 'A', '{"user_org_id":"16","user_organisation":"ABC Organization","user_contact":"1234569870","user_address":"ecospace","user_depertment":" sales","user_location":"Australia","user_level":"Manager","user_gender":"M","user_age":"21-30"}', '16', '', '2015-12-17 09:39:50', '2015-12-17 09:39:50'),
(44, 'Jaqui Bond', '392cf8fc321c767b66919f6b5b11dbd1', 'jaqui.bond@smghealth.com.au', 3, '', 'A', '{"user_org_id":"38","user_organisation":null,"user_contact":"0433910160","user_address":"","user_depertment":"","user_location":"","user_level":"","user_gender":"F","user_age":"41-50"}', '38', '', '2016-01-04 06:51:49', '2016-01-04 06:51:49'),
(46, 'Anil Joseph', '0120b7672d834446f25c15a22c0bc300', 'aniljoseph@appgo.com.au', 3, '', 'A', '{"user_org_id":"45","user_organisation":"Worldwide Digital Pty Ltd","user_contact":"","user_address":"","user_depertment":"Sales","user_location":"Melbourne","user_level":"Manager","user_gender":"M","user_age":"41-50"}', '45', '', '2016-01-06 05:44:02', '2016-01-06 05:44:02'),
(47, 'Worldwide Digita Pty Ltd', 'e43fbff1c6c6f325ab8c9f155456b301', 'aniljoseph@worldwidedigital.com.au', 2, '', 'A', '', '', '2', '2016-01-28 05:31:27', '2016-01-28 05:31:27');

-- --------------------------------------------------------

--
-- Table structure for table `smg_user_details`
--

CREATE TABLE IF NOT EXISTS `smg_user_details` (
  `id_user_details` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `option_name` varchar(255) NOT NULL,
  `option_value` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user_details`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `smg_user_details`
--

INSERT INTO `smg_user_details` (`id_user_details`, `id_user`, `option_name`, `option_value`) VALUES
(1, 15, 'organization_url', 'abc-organization'),
(2, 15, 'organization_depertments', 'Machinary, sales, Marketting'),
(3, 15, 'organization_levels', 'Manager, General Manager'),
(4, 15, 'organization_location', 'Australia'),
(5, 15, 'otp_used', '0'),
(6, 16, 'organization_url', 'testorg'),
(7, 16, 'organization_depertments', 'design, test'),
(8, 16, 'organization_levels', 'Team leader, Executive'),
(9, 16, 'organization_location', 'sydeney'),
(10, 16, 'otp_used', '0'),
(21, 19, 'organization_url', 'major-share-pty-ltd'),
(22, 19, 'organization_depertments', 'Sales'),
(23, 19, 'organization_levels', 'Manager'),
(24, 19, 'organization_location', 'Sydney'),
(25, 19, 'otp_used', '0'),
(31, 21, 'organization_url', 'test-again-organization'),
(32, 21, 'organization_depertments', 'development,Sales'),
(33, 21, 'organization_levels', 'account manager,Operations manager'),
(34, 21, 'organization_location', 'Sydney,Mellbourne,Perth,Adelate'),
(35, 21, 'otp_used', '0'),
(36, 42, 'organization_url', 'hh'),
(37, 42, 'organization_depertments', 'f'),
(38, 42, 'organization_levels', 'fg'),
(39, 42, 'organization_location', 'f'),
(40, 42, 'otp_used', '0'),
(46, 45, 'organization_url', 'worldwide-digital-pty-ltd'),
(47, 45, 'organization_depertments', 'Sales,HR'),
(48, 45, 'organization_levels', 'Manager,Executive'),
(49, 45, 'organization_location', 'Melbourne,Sydney'),
(50, 45, 'otp_used', '0'),
(51, 47, 'organization_url', 'test-amit'),
(52, 47, 'organization_depertments', 'test'),
(53, 47, 'organization_levels', 'test'),
(54, 47, 'organization_location', 'Australia'),
(55, 47, 'otp_used', '0'),
(56, 48, 'organization_url', 'test-amit'),
(57, 48, 'organization_depertments', 'test'),
(58, 48, 'organization_levels', 'test'),
(59, 48, 'organization_location', 'Australia'),
(60, 48, 'otp_used', '0'),
(61, 49, 'organization_url', 'test-amit'),
(62, 49, 'organization_depertments', 'test'),
(63, 49, 'organization_levels', 'test'),
(64, 49, 'organization_location', 'Australia'),
(65, 49, 'otp_used', '0'),
(66, 47, 'organization_url', 'worldwide'),
(67, 47, 'organization_depertments', 'CEO'),
(68, 47, 'organization_levels', 'Executive'),
(69, 47, 'organization_location', 'Melbourne,Sydney'),
(70, 47, 'otp_used', '0'),
(71, 47, 'head_office_location', 'Melbourne'),
(72, 47, 'total_number_emp', '22'),
(73, 47, 'program_manager_name', 'Anil Joseph'),
(74, 47, 'program_manager_telephone', '0433134786'),
(75, 47, 'program_manager_mobile', '0433134786'),
(76, 47, 'program_manager_email', 'aniljoseph@worldwidedigital.com.au');

-- --------------------------------------------------------

--
-- Table structure for table `smg_video`
--

CREATE TABLE IF NOT EXISTS `smg_video` (
  `video_id` int(11) NOT NULL AUTO_INCREMENT,
  `video_title` varchar(255) NOT NULL,
  `video_name` varchar(255) NOT NULL,
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `smg_video`
--

INSERT INTO `smg_video` (`video_id`, `video_title`, `video_name`) VALUES
(2, 'Demo video 2', 'https://www.youtube.com/embed/871_PMieyxI'),
(6, 'Demo video 6', 'https://www.youtube.com/embed/_QNs7Xiup04'),
(7, 'test video again', 'https://www.youtube.com/embed/Iqc6m5bdZIc'),
(8, 'SMG Video', 'https://www.youtube.com/embed/Iqc6m5bdZIc'),
(9, 'ci tut', 'https://www.youtube.com/embed/871_PMieyxI'),
(10, 'ci tut 1', 'https://www.youtube.com/embed/871_PMieyxI'),
(11, 'ci tut 3', 'https://www.youtube.com/embed/871_PMieyxI'),
(12, 'ci tut 4', 'https://www.youtube.com/embed/871_PMieyxI');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
