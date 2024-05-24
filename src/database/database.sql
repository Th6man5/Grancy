CREATE DATABASE `grancy_hotel`;

--buat tabel users
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255),
    username VARCHAR(100) NULL,
    phone_numb INT(12),
    email VARCHAR(255),
    password VARCHAR(255),
    user_type VARCHAR(50) DEFAULT 'user'
);

INSERT INTO users (user_id, fullname, email) VALUES (0, 'tumbal', 'tumbal@gmail.com');

--buat tabel room_type
CREATE TABLE room_type (
    type_id INT AUTO_INCREMENT PRIMARY KEY,
    type_name VARCHAR(255),
    square_meter INT,
    square_foot INT,
    about VARCHAR(255),
    feature text,
    bath text,
    intertainment text,
    equipment text,
    refreshments text,
    picture blob,
    price INT
);

--buat tabel rooms
CREATE TABLE rooms(
    room_id INT AUTO_INCREMENT PRIMARY KEY,
    room_number VARCHAR(255),
    status VARCHAR(50),
    floor INT,
    type_id INT,
    user_id INT NULL,
    CONSTRAINT type_id FOREIGN KEY (type_id) REFERENCES room_type(type_id),
    CONSTRAINT user_id FOREIGN KEY (user_id) REFERENCES users(user_id)
);


--Buat Insert tabel room_type
INSERT INTO room_type (
	type_name,
    square_meter,
    square_foot,
    about,
    feature,
    bath,
    intertainment,
    equipment,
    refreshments,
    price
) VALUES (
	'Standard',
    '45',
    '484',
    'A standard room in our hotel offers a comfortable and relaxing stay featuring a cozy queen-sized bed a modern ensuite 		bathroom a flat-screen TV free Wi-Fi and a spacious work desk Enjoy complimentary coffee and tea making facilities 		 and a serene atmosphere perfect for both business and leisure travelers',
    'Full-size window with sweeping views of the Surabaya cityscape.
	 An indulgent bed with duvet.
	 Marble bathroom with separate shower.',
    'Pillow menu
	 Duvet
     Grancy Hotel amenities
	 Iron and ironing board',
    'Wireless Internet access
	 LCD television
	 Closed-circuit TV channels',
    'Full size executive writing desk
	 International Direct Dial telephone
	 Independent fax line
	 Voice mail
	 Electronic safe',
    'Coffee / tea-making facilities
	 24-hour room service',
     '1000000'
);


