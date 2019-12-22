<?php

define ('PASS', '2O7y8Q7r');
define ('DBNAME', 'logger');
define ('USERNAME', 'zot');
define ('HOST', 'localhost');
$link = new mysqli(HOST, USERNAME, PASS, DBNAME);
if($link == false){
    echo "Fatal error. No connection with datebase \n";
    exit();
}
else{
echo '<link rel="stylesheet" href="dede.php" media="screen">';
echo('  <h1> Лист айпи-адресов </h1> ');


echo "<table border='1'>
<tr>
<th>Время перехода </th>
<th> IP-адрес </th>
</tr>";
$result = mysqli_query($link,"SELECT * FROM ips");

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td width='200'>" . date('H:i:s d-m-Y', $row['time']) . "</td>";
echo "<td width='200'>" . $row['ip'] . "</td>";
echo "</tr>";


}
echo "</table>";
}
?>