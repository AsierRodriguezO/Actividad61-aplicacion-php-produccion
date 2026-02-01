CREATE DATABASE IF NOT EXISTS Genios;
USE Genios;

CREATE TABLE usuarios (
    usuario_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(50) NOT NULL,
    contrasena VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE conquistadores (
    conquistador_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL UNIQUE,
    territorios_conquistados TEXT NOT NULL,
    batallas_principales TEXT,
    logros_principales TEXT,
    ano_nacimiento INT,
    ano_muerte INT,
    descripcion TEXT,
    categoria VARCHAR(50)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO usuarios (nombre_usuario, contrasena, correo) VALUES
('asier2005', 'usuario@1', 'asier@conquistador.com'),
('conquistador_master', 'securepass456', 'master@conquistadores.com'),
('historia_fan', 'history2024', 'historia.fan@email.com'),
('alejandro_fan', 'macedonia323', 'alexander@email.com'),
('cesar_romano', 'etutbrute', 'julius.caesar@email.com'),
('mongol_warrior', 'genghis1227', 'mongol.empire@email.com'),
('spanish_conquistador', 'espana1492', 'conquistador@spain.com'),
('persian_king', 'cyrus530', 'cyrus.great@email.com'),
('napoleon_emperor', 'france1804', 'napoleon@france.com'),
('timur_lame', 'samarkand1405', 'tamerlane@asia.com');


INSERT INTO conquistadores (nombre, territorios_conquistados, batallas_principales, logros_principales, ano_nacimiento, ano_muerte, descripcion, categoria) VALUES
('Alejandro Magno', 'Macedonia, Grecia, Persia, Egipto, Asia Menor, India', 'Gránico, Issos, Gaugamela, Hidaspes', 'Creó uno de los mayores imperios de la antigüedad, extendió la cultura griega hasta la India', -356, -323, 'Rey de Macedonia conocido como el más grande comandante militar de la historia antigua', 'Antiguo'),
('Julio Cesar', 'Galia, Britania, Germania, Egipto, Hispania', 'Alesia, Farsalia, Munda, Farsalo', 'Conquistó la Galia, reformó el calendario romano, estableció la dictadura perpetua', -100, -44, 'General y político romano que transformó la República Romana en el Imperio Romano', 'Antiguo'),
('Gengis Kan', 'Mongolia, China, Asia Central, Persia, Rusia', 'Kalka, Yehuling, Indus', 'Unificó las tribus mongoles, creó el mayor imperio terrestre contiguo de la historia', 1162, 1227, 'Fundador y primer Gran Khan del Imperio Mongol, el mayor imperio contiguo de la historia', 'Medieval'),
('Hernan Cortes', 'Mexico, Imperio Azteca', 'La Noche Triste, Sitio de Tenochtitlan', 'Conquistó el Imperio Azteca, estableció la Nueva España', 1485, 1547, 'Conquistador español que derrocó al Imperio Azteca y reclamó México para la Corona Española', 'Moderno'),
('Francisco Pizarro', 'Peru, Imperio Inca', 'Cajamarca, Cuzco', 'Conquistó el Imperio Inca, fundó Lima', 1478, 1541, 'Conquistador español que derrocó al Imperio Inca y estableció el Virreinato del Perú', 'Moderno'),
('Ciro el Grande', 'Persia, Media, Lidia, Babilonia', 'Opis, Pasargada', 'Fundó el Imperio Persa, liberó a los judíos de Babilonia, estableció los derechos humanos', -600, -530, 'Fundador del Imperio Aqueménida, conocido por su tolerancia religiosa y política', 'Antiguo'),
('Carlomagno', 'Francia, Alemania, Italia, España', 'Roncesvalles, Sajonia', 'Unificó Europa occidental, coronado emperador romano, inició el Renacimiento Carolingio', 742, 814, 'Rey de los francos y primer emperador del Sacro Imperio Romano Germánico', 'Medieval'),
('Napoleon Bonaparte', 'Francia, Italia, Egipto, Europa Central', 'Austerlitz, Waterloo, Marengo', 'Conquistó gran parte de Europa, estableció el Código Napoleónico, reformó Francia', 1769, 1821, 'General y emperador francés que dominó Europa durante las Guerras Napoleónicas', 'Moderno'),
('Tamerlano', 'Asia Central, Persia, India, Siria', 'Ankara, Delhi', 'Fundó el Imperio Timúrida, conquistó gran parte de Asia Central y Medio Oriente', 1336, 1405, 'Conquistador turco-mongol que estableció el mayor imperio de Asia Central desde Gengis Kan', 'Medieval'),
('Attila', 'Hungría, Germania, Galia, Italia', 'Catalaunian Plains, Orleans', 'Lideró el Imperio Huno, aterrorizó al Imperio Romano, conocido como el Azote de Dios', 406, 453, 'Rey de los hunos que lideró incursiones devastadoras contra el Imperio Romano de Occidente', 'Antiguo');

