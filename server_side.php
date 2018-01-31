<?
/*server_side*/
	$table = $_GET['table_use'];

	if ($_GET['p_key'] == '') {
		$primaryKey = 'id';
	} else {
		$primaryKey = $_GET['p_key'];
		
	}
	 
	// print_r($_POST);
	foreach ($_POST['columns'] as $key => $C_3) {
		if (is_array($C_3['data'])) {
			$columns[] = array( 'db' => $C_3['data']['_'], 'dt' => $C_3['data']['_']);
			# code...
		} else {
			$columns[] = array( 'db' => $C_3['data'], 'dt' => $C_3['data']);
			
		}
	}
	// SQL server connection information
	$sql_details = array(
		'user' => _gset()['sql_detail']['login'],
		'pass' => _gset()['sql_detail']['pas'],
		'db'   => _gset()['sql_detail']['base_name'],
		'host' => 'localhost',
	);

	require( '_ss_data_tables.php' );
	 
	echo json_encode(
		SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns)
	);
?>