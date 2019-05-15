CREATE TABLE instruments (
    id int PRIMARY KEY,
    instrument_desc varchar(30) NOT NULL
);

CREATE TABLE roles (
    id int PRIMARY KEY,
    role_desc varchar(30) NOT NULL
);

CREATE TABLE users (
    id int PRIMARY KEY,
    first_name varchar(30) NOT NULL,
    last_name varchar(30) NOT NULL,
    role_id int NOT NULL REFERENCES roles (id),
    instrument_id int NOT NULL REFERENCES instruments (id),
    username varchar(30) NOT NULL UNIQUE,
    user_password varchar(30) NOT NULL
);

CREATE TABLE ensemble_19 (
    member_id int NOT NULL PRIMARY KEY,
    role_id int NOT NULL REFERENCES roles (id),
    instrument_id int NOT NULL REFERENCES instruments (id)
);