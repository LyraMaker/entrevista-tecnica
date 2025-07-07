CREATE TABLE USER(
user_code INT NOT NULL AUTO_INCREMENT, 
first_name TEXT NOT NULL,
second_name TEXT,
date_birth DATE,
street TEXT,
city TEXT,
neighborhood TEXT,
state TEXT,
description TEXT, 
profile_photo TEXT,
PRIMARY KEY(user_code));