<?php
// We get the relationships form the platform environement
$relationships = json_decode(base64_decode($_ENV['PLATFORM_RELATIONSHIPS']), TRUE);
// We are using the first database found in your relationships.
$link = mysql_connect($relationships['database'][0]['host'], $relationships['database'][0]['username'], $relationships['database'][0]['password'])
    or die('Could not connect: ' . mysql_error());
echo 'Connected successfully';
mysql_select_db($relationships['database'][0]['path']) or die('Could not select database');

// Performing SQL query
$query = 'CREATE TABLE users (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, name VARCHAR(30) NOT NULL);  INSERT INTO users(name) VALUES ("john"); SELECT * from users ;'
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

echo "Created table inserted values here is the result:";

var_dump($result);