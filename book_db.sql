/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : book_db

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2024-10-28 01:14:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `books`
-- ----------------------------
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(250) NOT NULL DEFAULT '',
  `book_kind` varchar(250) NOT NULL,
  `book_activity` varchar(250) NOT NULL DEFAULT '',
  `book_phone` varchar(250) NOT NULL DEFAULT '',
  `book_adress` varchar(250) NOT NULL DEFAULT '',
  `book_wilaya` varchar(250) NOT NULL DEFAULT '',
  `book_gps` varchar(250) NOT NULL DEFAULT '',
  `book_email` varchar(250) NOT NULL,
  `book_insta` varchar(250) NOT NULL,
  `book_face` varchar(250) NOT NULL,
  `book_description` varchar(1000) NOT NULL DEFAULT '',
  `book_un` varchar(250) NOT NULL DEFAULT '',
  `book_pw` varchar(250) NOT NULL DEFAULT '',
  `book_tags` varchar(250) NOT NULL DEFAULT '',
  `book_fname` varchar(250) NOT NULL DEFAULT '',
  `book_lname` varchar(250) NOT NULL DEFAULT '',
  `book_sex` varchar(250) NOT NULL DEFAULT '',
  `book_birth` date DEFAULT NULL,
  `book_ext` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- ----------------------------
-- Records of books
-- ----------------------------
INSERT INTO `books` VALUES ('1', 'Soleil Levant', '1', 'Clinique ', '', 'Cité les Mandarines villa n°42, 16212, Mohammadia', 'Mohammadia', '', 'Soleil_Levant@gmail.com', 'Soleil_Levant@Instagramme', 'Soleil_Levant@Facebook', 'Située au cœur de la campagne, la Clinique du Soleil Levant offre un cadre paisible et relaxant pour les patients. Spécialisée en réhabilitation et en soins post-opératoires, elle dispose d\'équipements de pointe et d\'un personnel médical hautement qualifié. La clinique propose également des programmes de bien-être et des thérapies alternatives, comme l\'acupuncture et la naturopathie, pour favoriser une récupération holistique.', 'c01', '202cb962ac59075b964b07152d234b70', '', '', '', '', null, 'jpg');
INSERT INTO `books` VALUES ('2', 'Étoiles Brillantes', '1', 'Clinique ', '', '4 rue des frères Belhadj, 15000, Tizi Ouzou', 'Tizi Ouzou', '', 'Étoiles_Brillantes@gmail.com', 'Étoiles_Brillantes@Instagramme', 'Étoiles_Brillantes@Facebook', 'Cette clinique pédiatrique est dédiée aux soins des enfants et des adolescents. Avec des salles d\'examen colorées et des équipements adaptés aux plus jeunes, elle assure un environnement rassurant et accueillant. Les spécialistes de la Clinique des Étoiles Brillantes travaillent en étroite collaboration avec les parents pour offrir des soins personnalisés et empathiques.', 'c02', '202cb962ac59075b964b07152d234b70', '', '', '', '', null, 'jpg');
INSERT INTO `books` VALUES ('3', 'Rivage Tranquille', '2', 'Pharmacie', '', 'Rue Abdelkader Kadi, 16000, Algiers', 'Alger', '', 'Rivage_Tranquille@gmail.com', 'Rivage_Tranquille@Instagramme', 'Rivage_Tranquille@Facebook', 'Située en bord de mer, cette clinique est un havre de paix pour les patients en quête de soins de santé mentale. Elle propose des thérapies individuelles et de groupe, ainsi que des programmes de désintoxication et de gestion du stress. La proximité de la plage permet aux patients de bénéficier de promenades thérapeutiques et d\'activités de relaxation.', 'c03', '202cb962ac59075b964b07152d234b70', '', '', '', '', null, 'jpg');
INSERT INTO `books` VALUES ('4', 'Cœurs Vaillants ', '1', 'Clinique ', '', 'Boulevard de la Soummam, 31000, Oran', 'Oran', '', 'Cœurs_Vaillants_@gmail.com', 'Cœurs_Vaillants_@Instagramme', 'Cœurs_Vaillants_@Facebook', 'Spécialisée en cardiologie, la Clinique des Cœurs Vaillants offre des soins de haute qualité pour les maladies cardiovasculaires. Dotée d\'équipements de diagnostic avancés, elle propose des traitements innovants et des programmes de réhabilitation cardiaque. Les patients bénéficient d\'une prise en charge globale, incluant des conseils nutritionnels et des programmes d\'exercice physique adaptés.', 'c04', '202cb962ac59075b964b07152d234b70', '', '', '', '', null, 'jpg');
INSERT INTO `books` VALUES ('5', 'Jardins Florissants ', '3', 'Labo Médical', '', 'Rue Ahmed Bey, 25000, Constantine', 'Constantine', '', 'Jardins_Florissants_@gmail.com', 'Jardins_Florissants_@Instagramme', 'Jardins_Florissants_@Facebook', 'Nichée dans un cadre verdoyant, cette clinique de soins palliatifs et gériatriques met l\'accent sur le confort et la qualité de vie des patients. Elle dispose de chambres individuelles donnant sur des jardins luxuriants, favorisant un environnement serein. Les équipes soignantes de la Clinique des Jardins Florissants offrent un accompagnement personnalisé et une écoute attentive aux patients et à leurs familles.', 'c05', '202cb962ac59075b964b07152d234b70', '', '', '', '', null, 'jpg');
INSERT INTO `books` VALUES ('6', 'l\'Aube Radieuse ', '2', 'Pharmacie', '', 'Rue de la Liberté, 09000, Blida', 'Blida', '', 'l\'Aube_Radieuse_@gmail.com', 'l\'Aube_Radieuse_@Instagramme', 'l\'Aube_Radieuse_@Facebook', 'Spécialisée en soins de maternité, la Clinique de l\'Aube Radieuse accompagne les futures mamans tout au long de leur grossesse. Des consultations prénatales aux accouchements, chaque étape est gérée par une équipe de professionnels dévoués. La clinique propose également des cours de préparation à la naissance et des ateliers de parentalité.', 'c06', '202cb962ac59075b964b07152d234b70', '', '', '', '', null, 'jpg');
INSERT INTO `books` VALUES ('7', 'Montagnes Bleues.', '1', 'Clinique ', '', 'Avenue de la Révolution, 06000, Béjaïa', 'Béjaïa', '', 'Montagnes_Bleues.@gmail.com', 'Montagnes_Bleues.@Instagramme', 'Montagnes_Bleues.@Facebook', 'Située dans les montagnes, cette clinique de rééducation physique et sportive est idéale pour les athlètes et les personnes en convalescence. Elle offre des programmes de physiothérapie, de kinésithérapie et d\'ergothérapie. Les patients bénéficient également de séances d\'entraînement supervisées et de thérapies aquatiques dans un cadre naturel revitalisant.', 'c07', '202cb962ac59075b964b07152d234b70', '', '', '', '', null, 'jpg');
INSERT INTO `books` VALUES ('8', 'Forêt Émeraude ', '1', 'Clinique ', '', 'Rue de la Liberté, 19000, Sétif', 'Sétif', '', 'Forêt_Émeraude_@gmail.com', 'Forêt_Émeraude_@Instagramme', 'Forêt_Émeraude_@Facebook', 'Cette clinique spécialisée en soins de santé intégrative combine médecine traditionnelle et thérapies alternatives. Située au cœur d\'une forêt luxuriante, elle offre un environnement propice à la guérison. Les patients peuvent participer à des séances de yoga, de méditation et de thérapie par la nature, en plus des traitements médicaux classiques.', 'c08', '202cb962ac59075b964b07152d234b70', '', '', '', '', null, 'jpg');
INSERT INTO `books` VALUES ('9', 'Lune Argentée ', '1', 'Clinique ', '', 'Rue de l\'Indépendance, 23000, Annaba', 'Annaba', '', 'Lune_Argentée_@gmail.com', 'Lune_Argentée_@Instagramme', 'Lune_Argentée_@Facebook', 'La Clinique de la Lune Argentée se concentre sur les soins dermatologiques et esthétiques. Équipée des dernières technologies en matière de soins de la peau, elle propose des traitements pour les affections cutanées, ainsi que des services de chirurgie esthétique. Les patients y trouvent des solutions personnalisées pour améliorer leur apparence et leur bien-être.', 'c09', '202cb962ac59075b964b07152d234b70', '', '', '', '', null, 'jpg');
INSERT INTO `books` VALUES ('10', 'Brises Douces ', '3', 'Labo Médical', '', 'Rue de la République, 05000, Batna', 'Batna', '', 'Brises_Douces_@gmail.com', 'Brises_Douces_@Instagramme', 'Brises_Douces_@Facebook', 'Spécialisée en soins respiratoires, cette clinique offre des traitements pour les maladies pulmonaires et allergiques. Elle dispose d\'installations modernes pour les tests de fonction pulmonaire et la réhabilitation respiratoire. Les patients bénéficient de programmes éducatifs sur la gestion de l\'asthme et d\'autres affections respiratoires.', 'c10', '202cb962ac59075b964b07152d234b70', '', '', '', '', null, 'jpg');
INSERT INTO `books` VALUES ('11', 'Collines Ensoleillées', '1', 'Clinique ', '', 'Rue de l\'Emir Abdelkader, 17000, Djelfa', 'Djelfa', '', 'Collines_Ensoleillées@gmail.com', 'Collines_Ensoleillées@Instagramme', 'Collines_Ensoleillées@Facebook', 'Cette clinique généraliste offre des soins pour toute la famille dans un cadre chaleureux et accueillant. Avec une équipe de médecins de diverses spécialités, elle propose des consultations médicales, des soins préventifs et des traitements pour des maladies chroniques. La clinique est également équipée pour les urgences mineures.', 'c11', '202cb962ac59075b964b07152d234b70', '', '', '', '', null, 'jpg');
INSERT INTO `books` VALUES ('12', 'Lac Serein ', '1', 'Clinique ', '', 'Rue Ibn Khaldoun, 13000, Tlemcen', 'Tlemcen', '', 'Lac_Serein_@gmail.com', 'Lac_Serein_@Instagramme', 'Lac_Serein_@Facebook', 'Située près d\'un lac paisible, cette clinique de soins psychologiques et psychiatriques offre un environnement apaisant pour les patients en quête de soutien mental. Elle propose des thérapies individuelles, de couple et de groupe, ainsi que des ateliers de gestion du stress et de développement personnel.', 'c12', '202cb962ac59075b964b07152d234b70', '', '', '', '', null, 'jpg');
INSERT INTO `books` VALUES ('13', 'Sources Vitales ', '2', 'Pharmacie', '', 'Avenue de la Résistance, 02000, Chlef', 'Chlef', '', 'Sources_Vitales_@gmail.com', 'Sources_Vitales_@Instagramme', 'Sources_Vitales_@Facebook', 'Spécialisée en médecine holistique, cette clinique combine les approches de la médecine conventionnelle et alternative. Les patients peuvent y recevoir des traitements d\'ostéopathie, d\'acupuncture et de nutrition, en plus des soins médicaux traditionnels. La Clinique des Sources Vitales met l\'accent sur le bien-être global et la prévention.', 'c13', '202cb962ac59075b964b07152d234b70', '', '', '', '', null, 'jpg');
INSERT INTO `books` VALUES ('14', 'Ailes de l\'Espoir', '1', 'Clinique ', '', 'Rue de la Révolution, 27000, Mostaganem', 'Mostaganem', '', 'Ailes_de_l\'Espoir@gmail.com', 'Ailes_de_l\'Espoir@Instagramme', 'Ailes_de_l\'Espoir@Facebook', 'La Clinique des Ailes de l\'Espoir se consacre aux soins oncologiques. Elle offre des traitements de chimiothérapie, de radiothérapie et des thérapies ciblées, ainsi qu\'un soutien psychologique et des soins palliatifs. L\'équipe médicale travaille en collaboration avec les patients et leurs familles pour offrir une prise en charge complète et empathique.', 'c14', '202cb962ac59075b964b07152d234b70', '', '', '', '', null, 'jpg');
INSERT INTO `books` VALUES ('15', 'Temps Suspendu ', '2', 'Pharmacie', '', 'Avenue de la République, 07000, Biskra', 'Biskra', '', 'Temps_Suspendu_@gmail.com', 'Temps_Suspendu_@Instagramme', 'Temps_Suspendu_@Facebook', 'Cette clinique de soins anti-âge et de bien-être propose des traitements pour ralentir les effets du vieillissement et améliorer la qualité de vie. Des soins esthétiques aux thérapies de régénération cellulaire, les patients peuvent bénéficier de programmes personnalisés pour rester en forme et en bonne santé.', 'c15', '202cb962ac59075b964b07152d234b70', '', '', '', '', null, 'jpg');
INSERT INTO `books` VALUES ('16', 'Rives Blanches', '1', 'Clinique ', '', 'Rue des Frères Rahmouni, 10000, Bouira', 'Bouira', '', 'Rives_Blanches@gmail.com', 'Rives_Blanches@Instagramme', 'Rives_Blanches@Facebook', 'Spécialisée en neurologie, cette clinique offre des soins pour les maladies du système nerveux. Elle dispose d\'équipements de pointe pour le diagnostic et le traitement des affections neurologiques, telles que l\'épilepsie, la sclérose en plaques et les AVC. Les patients bénéficient également de programmes de réhabilitation neuro-motrice.', 'c16', '202cb962ac59075b964b07152d234b70', '', '', '', '', null, 'jpg');
INSERT INTO `books` VALUES ('17', 'Vignes Dorées ', '1', 'Clinique ', '', 'Rue de l\'Indépendance, 14000, Tiaret', 'Tiaret', '', 'Vignes_Dorées_@gmail.com', 'Vignes_Dorées_@Instagramme', 'Vignes_Dorées_@Facebook', 'Située au cœur des vignobles, cette clinique de soins de nutrition et de diététique propose des programmes personnalisés pour la gestion du poids et les troubles alimentaires. Les patients peuvent participer à des ateliers de cuisine saine et à des consultations avec des nutritionnistes expérimentés.', 'c17', '202cb962ac59075b964b07152d234b70', '', '', '', '', null, 'jpg');
INSERT INTO `books` VALUES ('18', 'Aurores Boréales', '3', 'Labo Médical', '', 'Rue de la Liberté, 26000, Médéa', 'Médéa', '', 'Aurores_Boréales@gmail.com', 'Aurores_Boréales@Instagramme', 'Aurores_Boréales@Facebook', 'Cette clinique spécialisée en soins de la vue offre des traitements pour les maladies oculaires et des services de correction visuelle. Équipée des dernières technologies en ophtalmologie, elle propose des consultations, des chirurgies et des thérapies pour améliorer la santé visuelle des patients.', 'c18', '202cb962ac59075b964b07152d234b70', '', '', '', '', null, 'jpg');
INSERT INTO `books` VALUES ('19', 'Vents Salins', '1', 'Clinique ', '', 'Rue de la Paix, 08000, Béchar', 'Béchar', '', 'Vents_Salins@gmail.com', 'Vents_Salins@Instagramme', 'Vents_Salins@Facebook', 'Située sur la côte, cette clinique de soins orthopédiques et traumatologiques est idéale pour les patients en convalescence après des accidents ou des interventions chirurgicales. Elle offre des programmes de rééducation et de physiothérapie dans un cadre marin revitalisant.', 'c19', '202cb962ac59075b964b07152d234b70', '', '', '', '', null, 'jpg');
INSERT INTO `books` VALUES ('20', 'Éclats de Lune ', '1', 'Clinique ', '', 'Avenue de la Révolution, 21000, Skikda', 'Skikda', '', 'Éclats_de_Lune_@gmail.com', 'Éclats_de_Lune_@Instagramme', 'Éclats_de_Lune_@Facebook', 'Spécialisée en soins endocrinologiques, cette clinique offre des traitements pour les troubles hormonaux et métaboliques. Les patients peuvent bénéficier de consultations avec des endocrinologues, de tests de laboratoire avancés et de programmes de gestion des maladies chroniques comme le diabète.', 'c20', '202cb962ac59075b964b07152d234b70', '', '', '', '', null, 'jpg');
INSERT INTO `books` VALUES ('21', 'Jardins Zen ', '2', 'Pharmacie', '', 'Rue de l\'Emir Abdelkader, 30000, Ouargla', 'Ouargla', '', 'Jardins_Zen_@gmail.com', 'Jardins_Zen_@Instagramme', 'Jardins_Zen_@Facebook', 'Cette clinique de soins psychothérapeutiques offre un environnement serein et propice à la guérison mentale. Elle propose des thérapies cognitivo-comportementales, des séances de relaxation et des programmes de pleine conscience pour aider les patients à gérer le stress et l\'anxiété.', 'c21', '202cb962ac59075b964b07152d234b70', '', '', '', '', null, 'jpg');
INSERT INTO `books` VALUES ('22', 'Reflets Argentés ', '1', 'Clinique ', '', 'Rue de la Liberté, 12000, Tébessa', 'Tébessa', '', 'Reflets_Argentés_@gmail.com', 'Reflets_Argentés_@Instagramme', 'Reflets_Argentés_@Facebook', 'Spécialisée en soins de l\'ouïe, la Clinique des Reflets Argentés propose des traitements pour les troubles auditifs et des services d\'appareillage auditif. Les patients peuvent y recevoir des tests auditifs, des consultations avec des audiologistes et des solutions personnalisées pour améliorer leur audition.', 'c22', '202cb962ac59075b964b07152d234b70', '', '', '', '', null, 'jpg');
INSERT INTO `books` VALUES ('23', 'Cascade de Lumière ', '1', 'Clinique ', '', 'Rue de la République, 01000, Adrar', 'Adrar', '', 'Cascade_de_Lumière_@gmail.com', 'Cascade_de_Lumière_@Instagramme', 'Cascade_de_Lumière_@Facebook', 'Cette clinique de soins orthopédiques et de réhabilitation propose des traitements pour les affections musculo-squelettiques. Elle offre des programmes de physiothérapie, de kinésithérapie et de thérapies manuelles pour aider les patients à retrouver leur mobilité et leur force.', 'c23', '202cb962ac59075b964b07152d234b70', '', '', '', '', null, 'jpg');
INSERT INTO `books` VALUES ('24', 'Flots Turquoises ', '3', 'Labo Médical', '', 'Avenue de l\'Indépendance, 39000, El Oued', 'El Oued', '', 'Flots_Turquoises_@gmail.com', 'Flots_Turquoises_@Instagramme', 'Flots_Turquoises_@Facebook', 'Située près de l\'océan, cette clinique de soins de thalassothérapie propose des traitements à base d\'eau de mer et de produits marins pour améliorer la santé et le bien-être. Les patients peuvent participer à des bains de mer, des enveloppements d\'algues et des séances de massage.', 'c24', '202cb962ac59075b964b07152d234b70', '', '', '', '', null, 'jpg');
INSERT INTO `books` VALUES ('25', 'Ailes d\'Argent ', '2', 'Pharmacie', '', 'Rue des Martyrs, 03000, Laghouat', 'Laghouat', '', 'Ailes_d\'Argent_@gmail.com', 'Ailes_d\'Argent_@Instagramme', 'Ailes_d\'Argent_@Facebook', 'Spécialisée en soins dentaires et orthodontiques, la Clinique des Lumières Dorées offre des traitements pour améliorer la santé bucco-dentaire. Elle propose des consultations dentaires, des soins de prévention et des traitements orthodontiques pour les patients de tous âges.', 'c25', '202cb962ac59075b964b07152d234b70', '', '', '', '', null, 'jpg');
INSERT INTO `books` VALUES ('26', 'Champs Verdoyants ', '1', 'Clinique ', '', 'Rue de l\'Indépendance, 40000, Khenchela', 'Khenchela', '', 'Champs_Verdoyants_@gmail.com', 'Champs_Verdoyants_@Instagramme', 'Champs_Verdoyants_@Facebook', 'Cette clinique de soins gynécologiques et obstétriques offre des services complets pour les femmes. Des consultations prénatales aux soins post-partum, les patientes bénéficient d\'un accompagnement personnalisé et d\'une écoute attentive. La clinique propose également des programmes de dépistage et de prévention.', 'c26', '202cb962ac59075b964b07152d234b70', '', '', '', '', null, 'jpg');
INSERT INTO `books` VALUES ('27', 'Rayons d\'Or ', '3', 'Labo Médical', '', 'Rue de la Liberté, 44000, Aïn Defla', 'Aïn Defla', '', 'Rayons_d\'Or_@gmail.com', 'Rayons_d\'Or_@Instagramme', 'Rayons_d\'Or_@Facebook', 'Située en pleine nature, cette clinique de soins de santé environnementale se concentre sur les liens entre l\'environnement et la santé. Elle propose des programmes de désintoxication, des conseils sur la nutrition bio et des traitements pour les allergies et les sensibilités environnementales.', 'c27', '202cb962ac59075b964b07152d234b70', '', '', '', '', null, 'jpg');
INSERT INTO `books` VALUES ('28', 'Eaux Vives ', '1', 'Clinique ', '', 'Avenue de la République, 20000, Saïda', 'Saïda', '', 'Eaux_Vives_@gmail.com', 'Eaux_Vives_@Instagramme', 'Eaux_Vives_@Facebook', 'Spécialisée en soins de médecine générale et préventive, la Clinique des Rayons d\'Or offre des consultations pour toute la famille. Elle propose des bilans de santé, des vaccinations et des programmes de prévention pour promouvoir une vie saine et active.', 'c28', '202cb962ac59075b964b07152d234b70', '', '', '', '', null, 'jpg');
INSERT INTO `books` VALUES ('29', 'Cimes Étoilées', '2', 'Pharmacie', '', 'Rue de l\'Emir Abdelkader, 11000, Tamanrasset', 'Tamanrasset', '', 'Cimes_Étoilées@gmail.com', 'Cimes_Étoilées@Instagramme', 'Cimes_Étoilées@Facebook', 'Située près d\'une rivière, cette clinique de soins de réhabilitation neurologique offre des programmes pour les patients ayant subi des traumatismes crâniens ou des AVC. Les patients bénéficient de thérapies physiques, d\'ergothérapie et de soutien psychologique dans un cadre apaisant.', 'c29', '202cb962ac59075b964b07152d234b70', '', '', '', '', null, 'jpg');
INSERT INTO `books` VALUES ('30', 'Lumières Dorées', '3', 'Labo Médical', '', 'Rue de l\'Indépendance, 28000, M\'Sila', 'M\'Sila', '', 'Lumières_Dorées@gmail.com', 'Lumières_Dorées@Instagramme', 'Lumières_Dorées@Facebook', 'Perchée dans les montagnes, cette clinique de soins de médecine alternative propose des traitements de naturopathie, d\'homéopathie et d\'acupuncture. Les patients peuvent profiter de l\'air pur et des paysages magnifiques tout en bénéficiant de soins holistiques pour améliorer leur santé et leur bien-être.', 'c30', '202cb962ac59075b964b07152d234b70', '', '', '', '', null, 'jpg');
INSERT INTO `books` VALUES ('31', '', '0', '', '', '', '', '', '', '', '', '', 'mozart', '202cb962ac59075b964b07152d234b70', '', 'Mozart', 'Amadeus', 'Homme', '1966-06-06', '');
INSERT INTO `books` VALUES ('32', '', '0', '', 'a', 'a', '', '', 'z', '', '', '', 'a', '0cc175b9c0f1b6a831c399e269772661', '', 'a', 'a', 'Femme', '2024-06-05', '');
INSERT INTO `books` VALUES ('33', '', '0', '', '0775330666', 'khenchela', '', '', 'email@rregr.com', '', '', '', 'moi', '202cb962ac59075b964b07152d234b70', '', 'nom', 'prenom', 'Homme', '2024-06-29', '');

-- ----------------------------
-- Table structure for `comments`
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `com_date` date NOT NULL,
  `com_time` time NOT NULL,
  `com_text` varchar(250) NOT NULL DEFAULT '',
  `com_user` int(11) NOT NULL DEFAULT 0,
  `com_book` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`com_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES ('1', '2024-10-27', '13:06:01', 'personnel médical hautement qualifié. La clinique propose également des programmes', '1', '1');
INSERT INTO `comments` VALUES ('2', '2024-10-27', '13:06:01', 'personnel médical hautement qualifié. La clinique propose également des programmes', '2', '1');
INSERT INTO `comments` VALUES ('3', '2024-10-27', '13:06:01', 'personnel médical hautement qualifié. La clinique propose également des programmes', '3', '1');
INSERT INTO `comments` VALUES ('4', '2024-10-27', '13:06:01', 'personnel médical hautement qualifié. La clinique propose également des programmes', '4', '1');
INSERT INTO `comments` VALUES ('5', '2024-10-27', '13:06:01', 'personnel médical hautement qualifié. La clinique propose également des programmes', '5', '1');
INSERT INTO `comments` VALUES ('6', '2024-10-27', '13:06:01', 'personnel médical hautement qualifié. La clinique propose également des programmes', '6', '1');
INSERT INTO `comments` VALUES ('7', '2024-10-27', '13:06:01', 'personnel médical hautement qualifié. La clinique propose également des programmes', '7', '1');
INSERT INTO `comments` VALUES ('8', '2024-10-27', '13:06:01', 'personnel médical hautement qualifié. La clinique propose également des programmes', '8', '1');
INSERT INTO `comments` VALUES ('9', '2024-10-27', '13:06:01', 'personnel médical hautement qualifié. La clinique propose également des programmes', '9', '1');
INSERT INTO `comments` VALUES ('10', '2024-10-28', '00:46:02', 'mozart comment', '31', '1');
INSERT INTO `comments` VALUES ('11', '2024-10-28', '00:46:12', 'ghfghgfhg', '31', '1');
INSERT INTO `comments` VALUES ('12', '2024-10-28', '00:46:55', 'ghghgfh', '31', '2');
INSERT INTO `comments` VALUES ('13', '2024-10-28', '00:52:13', 'Owner comment', '1', '1');

-- ----------------------------
-- Table structure for `files`
-- ----------------------------
DROP TABLE IF EXISTS `files`;
CREATE TABLE `files` (
  `fil_id` int(11) NOT NULL,
  `fil_msg` int(11) NOT NULL,
  `fil_type` varchar(250) NOT NULL,
  `fil_kind` varchar(250) NOT NULL,
  `fil_name` varchar(250) NOT NULL,
  `fil_infos` varchar(250) NOT NULL,
  PRIMARY KEY (`fil_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- ----------------------------
-- Records of files
-- ----------------------------

-- ----------------------------
-- Table structure for `messages`
-- ----------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_from` int(11) NOT NULL DEFAULT 0,
  `msg_to` int(11) NOT NULL DEFAULT 0,
  `msg_subject` varchar(250) NOT NULL DEFAULT '',
  `msg_text` varchar(250) NOT NULL DEFAULT '',
  `msg_date` date NOT NULL,
  `msg_time` time NOT NULL,
  `msg_status` int(11) NOT NULL DEFAULT 0,
  `msg_ext` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- ----------------------------
-- Records of messages
-- ----------------------------
INSERT INTO `messages` VALUES ('31', '1', '3', 'Sujet', 'hthythtyhyththtyhthtyhyth', '2024-06-13', '13:35:25', '0', 'jpg');

-- ----------------------------
-- Table structure for `rating`
-- ----------------------------
DROP TABLE IF EXISTS `rating`;
CREATE TABLE `rating` (
  `rat_book` int(11) NOT NULL DEFAULT 0,
  `rat_user` int(11) NOT NULL DEFAULT 0,
  `rat_note` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`rat_book`,`rat_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- ----------------------------
-- Records of rating
-- ----------------------------
INSERT INTO `rating` VALUES ('1', '31', '8');
INSERT INTO `rating` VALUES ('5', '31', '7');

-- ----------------------------
-- Table structure for `services`
-- ----------------------------
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `ser_id` int(11) NOT NULL AUTO_INCREMENT,
  `ser_name` varchar(250) NOT NULL DEFAULT '',
  `ser_text` varchar(250) NOT NULL DEFAULT '',
  `ser_ext` varchar(250) NOT NULL DEFAULT '',
  `ser_book` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ser_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- ----------------------------
-- Records of services
-- ----------------------------
INSERT INTO `services` VALUES ('1', 'Service 01', 'Texte', 'jpg', '3');
INSERT INTO `services` VALUES ('2', 'Service 02', 'Texte', 'jpg', '3');
INSERT INTO `services` VALUES ('3', 'Service 03', 'Texte', 'jpg', '3');
INSERT INTO `services` VALUES ('4', 'Service 04', 'Texte', 'jpg', '3');
INSERT INTO `services` VALUES ('5', 'Service 05', 'Texte', 'jpg', '3');
INSERT INTO `services` VALUES ('6', 'Service 06', 'Texte', 'jpg', '3');
