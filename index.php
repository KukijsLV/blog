
<?php

require "functions.php";
require "Database.php";

echo "<h1>Blog<h1/>";

$config = require("config.php");

$db = new Database($config["database"]);


$sql = "SELECT * FROM posts";
$params =[];
if (isset($_GET["search_query"]) && $_GET["search_query"] != "") {
    $search_query = "%" . $_GET["search_query"] . "%";
    $sql .= " WHERE content LIKE :search_query;";
    $params =["search_query" => $search_query];
};

//dd($sql);
$posts = $db->query($sql, $params)->fetchALL();

echo "<form >";
echo "<input name='search_query' />";
echo "<button>Meklēt</button>";
echo "</form>";

echo "<ul>";
foreach ($posts as $posts){
    echo "<li>" . $posts["content"] . "</li>";
}
echo "</ul>";

?>
