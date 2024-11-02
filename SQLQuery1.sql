CREATE DATABASE Account;

CREATE TABLE users (
    id INT IDENTITY(1,1),
    username NVARCHAR(50),
    email NVARCHAR(100),
    password NVARCHAR(255)
);

CREATE TABLE tasks (
    ID INT IDENTITY(1,1) PRIMARY KEY,
    Task_Name NVARCHAR(255) NOT NULL,
    Status NVARCHAR(50) NOT NULL DEFAULT 'Pending'CHECK (Status IN ('Pending', 'Complete')),
    Created_Date DATETIME DEFAULT GETDATE(),
	Deskripsi NVARCHAR(255),
	Due_Date DATETIME DEFAULT DATEADD(DAY, 7, GETDATE())
);

INSERT INTO users (username, email, password)
VALUES 
('john_doe', 'john@example.com', 'password1'),
('jane_doe', 'jane@example.com', 'password2'),
('michael_smith', 'michael@example.com', 'password3'),
('anna_jones', 'anna@example.com', 'password4'),
('david_wilson', 'david@example.com', 'password5');

SELECT * FROM Task;
SELECT * FROM users;
