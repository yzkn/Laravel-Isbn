-- $ mysql -u root -pROOTPASSWORD

CREATE DATABASE MYDBNAME DEFAULT CHARACTER SET utf8;
CREATE USER MYUSERNAME IDENTIFIED BY 'MYPASSWORD';
GRANT ALL PRIVILEGES ON MYDBNAME.* TO MYUSERNAME@localhost IDENTIFIED BY 'MYPASSWORD';