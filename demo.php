<?php 
ini_set('display_errors', true);
error_reporting(E_ALL);

header_remove();
session_start();

include "config.php";


$_SESSION['user'] = $_POST['user'];
$_SESSION['passwd'] = $_POST['password'];

$USR = $_POST['user'];
$PWD = $_POST['password'];

// $USR = $_GET['user'];
// $PWD = $_GET['password'];

//$USR = $_SESSION['user'];
//$PWD = $_SESSION['passwd'];



$PDO = db_connect();
//SQL para selecionar os registros
$sql = "SELECT * FROM customer order by id ASC";
//seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();

include "includes/header.php";
?>

<main>
	<div class="container">
		<div class="row">
			<div class="col-md-12 line-top">
				<h4>Logado como: <?php echo $USR ?></h4>
				<h4>Token server: https://<?php echo $tokenserver; ?></h4>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12 line-top">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">ID#</th>
								<th scope="col">Customer</th>
								<th scope="col">Detokenized Value</th>
								<th scope="col">Tokenized Value in DB</th>
								<th scope="col">Format</th>
								<th scope="col">Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								while ($cliente = $stmt->fetch(PDO::FETCH_ASSOC)):
									extract($cliente);
									
									// $command="curl -tlsv1.2 -k -X POST -H 'Content-Type: application/json' -u $USR:$PWD -d '{\"tokengroup\" : \"$tokengroup\" , \"token\" : \"$cardnumber\" , \"tokentemplate\" : \"$template\"}' $detokurl";
									// $output = shell_exec($command);
									// if ($output == "NULL"){
									// 	print "Command: $command<BR><BR>";
									// 	print "Command Output: $output<BR><BR>"; 
									// }

									//print_r($output);

									// $obj = json_decode($output);
									// $cardnumber = $obj->{'data'};

									//$token=$cardnumber;
								
							?>
								<tr>
									<th scope="row"><?php echo $id; ?></th>
									<td><?php echo $name; ?></td>
									<td><?php echo $cardnumber; ?></td>
									<td><?php //echo $token; ?></td>
									<td><?php echo $template; ?></td>
									<td><a class="delete" href="#" data-id="<?php echo $id; ?>" onclick="return confirm('Tem certeza de que deseja remover este cliente?');">Delete</a></td>
								</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="row">
            <div class="col-md-12">
                <div class="alert alert-warning-dell alert-warning" data-dismiss="alert" role="alert" style="display: none"></div>
                <div class="alert alert-danger-dell" data-dismiss="alert" role="alert" style="display: none"></div>
        	</div>
        </div>
	</div>

	<div class="container box-white line-top">
		<div class="row">
			<div class="col-md-12 line-top">
				<h3>API Call to Detokenize Last Row</h3>
			</div>
			<div class="col-md-12 line-top">
				<div class="h5">Command:</div>
				<code>curl -tlsv1.2 -k -X POST -H 'Content-Type: application/json' -u <?php echo $USR; ?>:<?php echo $PWD; ?> -d '{"tokengroup" : "<?php echo  $tokengroup; ?>" , "token" : "<?php echo $token; ?>" , "tokentemplate" : "<?php echo $template; ?>"}' <?php echo $detokurl; ?> </code>
			</div>
			<div class="col-md-12 line-top">
				<div class="h5">Result:</div>
				<code><?php echo json_encode($output, JSON_PRETTY_PRINT); ?></code>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
            <div class="col-md-12">
                <div class="alert alert-success" role="alert" data-dismiss="alert" style="display: none"></div>
                <div class="alert alert-danger" data-dismiss="alert" role="alert" style="display: none"></div>
        	</div>
        </div>
		<div class="row">
			<div class="col-md-12 line-top">
				<h3>Tokenize New Data</h3>
			</div>
			<div class="col-md-12">
				<form class="addTokenizeData" id="addTokenizeData" method="POST">
					<div class="row">
						<div class="form-group mb-3 col-md-6">
							<label for="name" class="form-label ">Customer Name</label>
							<input type="text" class="form-control" placeholder="Insert customer name" id="name" name="name" required>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label for="data" class="form-label ">Value</label>
							<input type="text" class="form-control" placeholder="Inser value data" id="data" name="data" required>
						</div>
						<div class="form-group">
							<div class="col-md-12">
							<label class="form-label">Format:</label>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="template" value="Numeric" id="flexRadioDefault1">
								<label class="form-check-label" for="flexRadioDefault1">Numeric</label>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="template" value="Text" id="flexRadioDefault2">
								<label class="form-check-label" for="flexRadioDefault2">Text</label>
							</div>
						</div>
						<div class="form-group mb-3 button">
							<input type="hidden" name="user" value="<?php echo $USR; ?>">
							<input type="hidden" name="passwd" value="<?php echo $PWD; ?>">
							<input type="hidden" name="action" value="tokenize">
							<button id="submitCustomer" class="btn btn-primary btnLogin" type="submit">Criar</button>
						</div>
						</div>
				</form>
			</div>
		</div>
		
	</div>
</main>
<?php include "includes/footer.php"; ?>

