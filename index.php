<?php
// We get the relationships form the platform environement
$relationships = json_decode(base64_decode($_ENV['PLATFORM_RELATIONSHIPS']), TRUE);

echo "<html><body><h4>Platform.sh minimal example with DB connectivity</h4>Here are the relationships for this app:<pre>".base64_decode($_ENV['PLATFORM_RELATIONSHIPS'])."</pre><pre>";

// We are using the first database found in your relationships.
$link = mysql_connect($relationships['database'][0]['host'], $relationships['database'][0]['username'], $relationships['database'][0]['password'])
    or die('Could not connect: ' . mysql_error());
echo 'Connected successfully';
mysql_select_db($relationships['database'][0]['path']) or die('Could not select database');

// Performing SQL query
$query = 'CREATE TABLE users (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, name VARCHAR(30) NOT NULL);';
$result = mysql_query($query);
echo "<br>";
$query = 'INSERT INTO users(name) VALUES ("John");';
$result = mysql_query($query);
echo "<br>";
$query = 'SELECT * from users;';
$result = mysql_query($query);
echo "<br>";
echo("Created table inserted values here are the results:");
echo mysql_result($result, 0);
echo "</pre></body></html>";