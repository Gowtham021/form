CREATE TABLE contact_form (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullName VARCHAR(255) NOT NULL,
    phoneNumber VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    ipAddress VARCHAR(45) NOT NULL,
    timestamp DATETIME NOT NULL
);
