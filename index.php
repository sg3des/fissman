<pre>
<?php
spl_autoload_register(function ($class) {
		include 'class/' . $class . '.class.php';
});
$pdo = new PDOConfig();

$develop = true;

if($develop){
	$bc = new BaseControl();
	$bc->json = json_decode(file_get_contents('data/data.json'), true);

	$table=$pdo->query("SHOW TABLES FROM fissman");
	$result = $table->fetchAll();
	print_r($result);

	$pdo->query($bc->CreateTables());
}