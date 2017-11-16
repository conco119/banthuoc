
<?php
$tenserver = "localhost";
$tentaikhoan = "root"; // tài khoản phpmyadmin
$matkhau = ""; // mật khẩu đăng nhập php myadmin
$tencsdl = "thuoc"; // tên cơ sở dữ liệu
 ?>

 <?php
class vsc_pdo {

	private $server; // database server
	private $username; // database login name
	private $password; // database login password
	private $database; // database name
	public $conn;
	public $query_id;


	/**
	 * Build PDO connection
	 * @param string $conn
	 */
	function __construct($conn = null) {
		$this->getConnection($conn);

		try {


			$this->conn = new PDO("mysql:host=$this->server;dbname=$this->database", $this->username, $this->password);
			$this->conn->exec("set names utf8");
			$this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		}
     catch (PDOException $e)
      {
			echo $e->getMessage();
			exit();
		}
	}

	/**
	 * Run query
	 * @param unknown $sql
	 * @return boolean
	 */
	function query($sql) {
		$stmt = $this->conn->prepare($sql);
		$this->query_id = $stmt->execute();
		return $this->query_id;
	}

	/**
	 * Build query get one row
	 * @param unknown $sql
	 * @return mixed|boolean
	 */
	function fetch_one($sql) {
		try {
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();

			$row = $stmt->fetch();
			return $row;
		} catch (PDOException $e) {
			return false;
		}
	}

	/**
	 * Get all row
	 * @param unknown $sql
	 * @return multitype:|boolean
	 */
	function fetch_all($sql) {
		try {
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();

			$rows = $stmt->fetchAll();
			return $rows;
		}
    catch (PDOException $e) {
			return false;
		}
	}

	/**
	 * Check exits row
	 * @param unknown $sql
	 * @return boolean
	 */
	function check_exist($sql) {
		try {
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			$number = $stmt->rowCount();
			if ($number > 0)
				return true;
				else
					return false;
		} catch (PDOException $e) {
			return false;
		}
	}

	/**
	 * Insert values to table
	 * @param unknown $table
	 * @param unknown $data
	 * @return boolean
	 */
	function insert($table, $data) {
		try {
			if (count($data) == 0)
				return false;
				$sql = "INSERT INTO $table (" . implode(", ", array_keys($data)) . ") VALUES (:" . implode(", :", array_keys($data)) . ")";
				$stmt = $this->conn->prepare($sql);
				$stmt->execute($data);
				return $this->conn->lastInsertId();
		} catch (PDOException $e) {
			return false;
		}
	}

	/**
	 * Update values for table
	 * @param unknown $table
	 * @param unknown $data
	 * @param unknown $where
	 * @return boolean
	 */
	function update($table, $data, $where) {
		try {
			if (count($data) == 0)
				return false;

				$values = array();
				foreach ($data AS $key => $item) {
					$values[] = $key . "=:" . $key;
				}

				$sql = "UPDATE $table SET " . implode(", ", $values);

				if ($where != "") {
					$sql .= " WHERE " . $where;
				}

				$stmt = $this->conn->prepare($sql);
				$stmt->execute($data);

				return true;
		} catch (PDOException $e) {
			return false;
		}
	}

	/**
	 * Count row from query
	 * @param unknown $sql
	 * @return number
	 */
	function count_rows($sql) {
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt->rowCount();
	}

	function close() {
		$this->conn = NULL;
	}

	/**
	 * Set values connection
	 * @param string $conn
	 */
	function getConnection($conn=null) {
		$arr = explode(",", $conn);

		if ($conn == null || count(explode(",", $conn)) != 4)
			$conn = CONN_DEFAULT;



			$this->server = @$arr[0];
			$this->username = @$arr[1];
			$this->password = @$arr[2];
			$this->database = @$arr[3];
	}

}

$exp = new vsc_pdo("$tenserver,$tentaikhoan,$matkhau,$tencsdl");

 ?>
