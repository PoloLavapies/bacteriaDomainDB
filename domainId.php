<?php
require("common.php");

$name = $_POST["name"];
$sql = "SELECT * FROM domain WHERE name LIKE '%" . $name. "%';";
$result = $mysqli->query($sql);
echo "<tr>";
echo "<th>ID</th>";
echo "<th>name</th>";
echo "<th>link</th>";
echo "</tr>";
while ($row = $result->fetch_assoc()) {
    $id = $row["id"];
    $name = $row["name"];
    echo "<tr>";
    echo "<td>{$id}</td>";
    echo "<td>{$name}</td>";
    echo "<td><a href='domainDetail.php?id={$id}'>link</a></td>";
    echo "</tr>";
}
// 結果セットを閉じる
$result->close();
