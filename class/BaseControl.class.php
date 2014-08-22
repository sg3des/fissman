<?php
class BaseControl
{
	public $json;
	public function CreateTables()
	{
		foreach($this->json as $table => $col){
			foreach ($col as $key => $value) {
				$key=='id'?
					$query_values[] = "$key $value AUTO_INCREMENT PRIMARY KEY":
					$query_values[] = "$key $value NOT NULL";
			}
			$query[] = "CREATE TABLE IF NOT EXISTS $table (".implode(',',$query_values).") ENGINE=innoDB DEFAULT CHARSET=utf8;";
			unset($query_values);
		}
		return implode("\n",$query);
	}
	public function CheckTables()
	{
		return 'SHOW TABLES FROM '.$pdo->database;
	}
}