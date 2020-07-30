/* Accounts Table */
CREATE TABLE accounts (
    f_name TEXT NOT NULL,
    l_name TEXT NOT NULL,
    email TEXT NOT NULL,
    password VARCHAR(60) NOT NULL,
    user_id VARCHAR(60) NOT NULL PRIMARY KEY
);