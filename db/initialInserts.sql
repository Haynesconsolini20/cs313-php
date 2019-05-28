DELETE FROM users;
DELETE FROM instruments;
DELETE FROM roles;


INSERT INTO instruments
VALUES(nextval('instrument_id_s1'), 'Snare');

INSERT INTO instruments
VALUES(nextval('instrument_id_s1'), 'Bass');

INSERT INTO roles 
VALUES(nextval('roles_id_s1'), 'Member');
INSERT INTO roles 
VALUES(nextval('roles_id_s1'), 'Staff');
INSERT INTO roles 
VALUES(nextval('roles_id_s1'), 'Parent');

INSERT INTO users
VALUES
(
nextval('users_id_s1'),
'Sean',
'Williams',
(SELECT id FROM roles WHERE role_desc = 'Member'),
(SELECT id FROM instruments WHERE instrument_desc = 'Snare'),
'sean_w',
'password123'
);
INSERT INTO users
VALUES
(
nextval('users_id_s1'),
'Macy',
'Williams',
(SELECT id FROM roles WHERE role_desc = 'Member'),
(SELECT id FROM instruments WHERE instrument_desc = 'Bass'),
'macy_w',
'password123'
);
INSERT INTO users
(id,first_name,last_name,role_id,username,user_password)
VALUES
(
nextval('users_id_s1'),
'Sam',
'Haynes',
(SELECT id FROM roles WHERE role_desc = 'Staff'),
'sam_h',
'password123'
);
