

INSERT INTO clients (clientFirstname, clientLastname, clientEmail, clientPassword, comment)
VALUES('Tony', 'Stark', 'tony@starkent.com', 'Iam1ronM@n', 'I am the real Ironman');

UPDATE clients
SET clientLevel = 3
WHERE clientId = 1;


UPDATE inventory
SET invDescription = REPLACE(invDescription, 'small interior', 'spacious interior')
WHERE invId = 12;

SELECT invModel, classificationName
FROM inventory
INNER JOIN carclassification
ON inventory.classificationId = carclassification.classificationId
WHERE carclassification.carclassificationId = 1;

DELETE
FROM inventory
WHERE invId = 1;

UPDATE  inventory 
SET invImage=concat('/phpmotors',invImage),    invThumbnail=concat('/phpmotors',invThumbnail);



