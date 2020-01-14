<?php  
	namespace models;
	use \mysql\MySql;

	class Models {
		
		private $view;
		protected $bd;

		function __construct() {
			$this->bd = new MySql();
		}
		
		public function redirect($url) {
			echo '<script>location.href = "'.$url.'"</script>';
			die();
		}

		public function boxAlert($tipo, $msg) {
			if($tipo == 'sucesso')
				echo '<div class="sucesso">'.$msg.'</div>';
			else if($tipo == 'erro')
				echo '<div class="erro">'.$msg.'</div>';
		}

		public function checkInput($var) {
			return htmlspecialchars(trim(stripcslashes($var)));
		}

		public function insert($table, $params = []) {
			$column = implode(',', array_keys($params));
			$val 	= ':'.implode(', :', array_keys($params));
			$query  = "INSERT INTO `{$table}` ({$column}) VALUES ({$val})";
			foreach($params as $key => $value) {
				$data[':'.$key] = $value;
			}
			$stmt = $this->bd->connect()->prepare($query);
			$stmt->execute($data);
			return $this->bd->connect()->lastInsertId();
		}

		public function select($tabela, $all = false, $query = false, $arr = array(), $tudo = '*') {
			if($query === false) {
				$stmt = $this->bd->connect()->prepare("SELECT $tudo FROM `{$tabela}`");
				$stmt->execute();
			} else {
				$stmt = $this->bd->connect()->prepare("SELECT $tudo FROM `{$tabela}` WHERE {$query}");
				$stmt->execute($arr);
			}
			return (($all === false) ? $stmt->fetch() : $stmt->fetchAll());
		}

		public function delete($table, $idUsuario = false) {
			if(!$idUsuario) {
				$stmt = $this->bd->connect()->prepare("DELETE * FROM `{$table}`");
				$stmt->execute();
			} else {
				$stmt = $this->bd->connect()->prepare("DELETE * FROM `{$table}` WHERE id = ?");
				$stmt->execute(array($idUsuario));
			}
		}

	}	

?>