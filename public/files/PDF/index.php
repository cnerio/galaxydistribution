<?php 
   $documentRoot = isset($_SERVER['DOCUMENT_ROOT']) ? rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) : '';
    $httpHost = strtolower(trim($_SERVER['HTTP_HOST'] ?? ''));
    $serverName = strtolower(trim($_SERVER['SERVER_NAME'] ?? ''));
    $isLocalhost = in_array($httpHost, ['localhost', '127.0.0.1', '::1'], true)
        || in_array($serverName, ['localhost', '127.0.0.1', '::1'], true);

    $configCandidates = [];

    if ($documentRoot !== '') {
        // 1) First attempt from document root.
        $configCandidates[] = $documentRoot . DIRECTORY_SEPARATOR . 'config_glxd.ini';

        // 2) Try .secrets one level above the document root (typical hosted setup).
        $configCandidates[] = dirname($documentRoot) . DIRECTORY_SEPARATOR . '.secrets' . DIRECTORY_SEPARATOR . 'config.ini';

        // 3) If running under public_html, also try two levels up to cover nested doc roots.
        if (stripos($documentRoot, 'public_html') !== false) {
            $configCandidates[] = dirname(dirname($documentRoot)) . DIRECTORY_SEPARATOR . '.secrets' . DIRECTORY_SEPARATOR . 'config.ini';
        }
    }

    // Local fallback from project root for development environments without DOCUMENT_ROOT mapping.
    $configCandidates[] = dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . 'config.ini';

    $configPath = null;
    foreach ($configCandidates as $candidate) {
        if ($candidate && is_readable($candidate)) {
            $configPath = $candidate;
            break;
        }
    }

    if ($configPath === null) {
        $environment = $isLocalhost ? 'localhost' : 'hosted';
        throw new RuntimeException('config.ini not found for ' . $environment . ' environment. Checked: ' . implode(' | ', array_unique($configCandidates)));
    }

    $config = parse_ini_file($configPath);
    if ($config === false) {
        throw new RuntimeException('Unable to parse config.ini at: ' . $configPath);
    }

// Función auxiliar para obtener las cabeceras en cualquier entorno/servidor
function obtener_headers() {
    if (function_exists('getallheaders')) {
        return getallheaders();
    }
    
    // Alternativa si getallheaders() no está disponible (ej. en algunos servidores CGI)
    $headers = [];
    foreach ($_SERVER as $name => $value) {
        if (substr($name, 0, 5) == 'HTTP_') {
            $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
        }
    }
    return $headers;
}

$headers = obtener_headers();
$api_key_recibida = null;

// Opción A: Buscar en cabecera personalizada X-API-Key (insensible a mayúsculas/minúsculas)
if (isset($headers['X-API-Key'])) {
    $api_key_recibida = $headers['X-API-Key'];
}

// 1. Verificar si se envió alguna clave
if (!$api_key_recibida) {
    http_response_code(401); // Unauthorized
    echo json_encode(["error" => "Missing API Key."]);
    exit;
}

// 2. Comparación segura contra ataques de temporización
if (!hash_equals(API_KEY, $api_key_recibida)) {
    http_response_code(403); // Forbidden
    echo json_encode(["error" => "Access denied. Invalid API Key."]);
    exit;
}
$code = $_GET['c'];
// Si todo está bien, continuar con la lógica de la API
echo json_encode(["status" => "Éxito", "mensaje" => "Autenticado correctamente mediante headers.","valor_c"=>$code]);

// use setasign\Fpdi\Fpdi; 
// // error_reporting(E_ALL);
// // ini_set('display_errors', '1');
// require('fpdf.php'); 
// require_once('src/autoload.php');
// require_once($_SERVER['DOCUMENT_ROOT'].'/surgephone/customerPortal/app/config/config.php');
// require_once($_SERVER['DOCUMENT_ROOT'].'/surgephone/customerPortal/app/libraries/Database.php');
// $db = new Database();
// $code = $_GET['c'];
// $decode=base64_decode($code);
// $porciones = explode("-", $decode);
// $invoiceNum=$porciones[1];
// $orderId=$porciones[0];
// //echo $_SESSION['user_id'];



// //$invoiceNum="2813938";
// //$orderId="367196";

// $db->query('SELECT * FROM c1_surgephone.portalusers WHERE subscriber_id=:orderId');
// $db->bind(":orderId",$orderId);
// $row =$db->Single();
// //print_r($row);

// $curl = curl_init();

// $url = "https://wirelessapi.shockwavecrm.com/PrepaidWireless/QuerySubscriberInvoices";
// 		$request = '{
// 					  "Credential":
// 					  {
// 						 "CLECID":"'.CLECID.'",
// 						 "UserName":"'.CLECNAME.'",
// 						 "TokenPassword":"'.TOKENPASSWORD.'",
// 						 "PIN":"'.PIN.'"
// 					  },
// 					  "MDN":"",
// 					"OrderId":"'.$orderId.'"
// 					}';

// curl_setopt_array($curl, array(
//   CURLOPT_URL => $url,
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 0,
//   CURLOPT_FOLLOWLOCATION => true,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => 'POST',
//   CURLOPT_POSTFIELDS =>$request,
//   CURLOPT_HTTPHEADER => array(
//     'Content-Type: application/json'
//   ),
// ));

// $response = curl_exec($curl);

// curl_close($curl);
// //echo "<pre>";
// //print_r($response);
// $data=json_decode($response,true);

// foreach($data['Invoices'] as $invoice){
// 	if($invoice['InvoiceNumber']==$invoiceNum){
		
// 		$type=$invoice['InvoiceType'];
		
// 		$invoiceDate=date( "m-d-Y",strtotime($invoice['InvoiceDate']));
// 		$invoiceYear=date( "Y",strtotime($invoice['InvoiceDate']));
// 		$invoiceDueDate=($invoice['PaymentDueDate'])?date( "m-d-Y",strtotime($invoice['PaymentDueDate'])):"-";
		
// 		$qty=1;
// 		$description= $invoice['CustomerPackage'];
// 		$price="$".number_format($invoice['TotalAmount'], 2, '.', '');
// 		$amount="$".number_format($invoice['TotalAmount'], 2, '.', '');
// 		$total="$".number_format($invoice['TotalAmount'], 2, '.', '');
// 		$details = $invoice['Details'];
// 	}
// }
// $name= $row['firstname']." ".$row['lastname'];
// $address = $row['address'].",".$row['city'].",".$row['state']." ".$row['zipcode'];


// //echo $timestamp = strtotime($invoiceDate);
// //$invoiceYear = date("Y", strtotime($invoiceDate));
// if($invoiceYear=="2022"){
// 	$planType = "ACP";
// 	//$value="30.00";
// }else{
// 	$planType="EBB";
// 	//$value="50.00";
// }

// $docName=$invoiceNum."-".rand(0,9999).".pdf";
// $pdf = new Fpdi();
// $pdf->SetTitle('SurgePhone Invoice '.$invoiceNum);

// $pdf->AddPage();
// $pdf->setSourceFile("templates/invoice_template2.pdf"); 
// $tplIdx = $pdf->importPage(1); 
// $pdf->useTemplate($tplIdx, 2, 2, 213);  
// $pdf->SetFont('Arial','B','12'); 
// $pdf->Cell(150,128);
// $pdf->Cell(60,128,$invoiceNum);
// $pdf->Ln(20);
// $pdf->Cell(20,100);
// $pdf->Cell(60,100,$name);
// $pdf->Cell(70,100);
// $pdf->Cell(60,100,$invoiceDate);
// $pdf->Ln(20);
// $pdf->Cell(20,71);
// $pdf->Cell(60,71,$address);
// $pdf->Cell(70,71);
// $pdf->Cell(60,71,$invoiceDueDate);
// $pdf->Ln(20);
// $pdf->Cell(20,43);
// $pdf->Cell(60,43);
// $pdf->Cell(70,43);
// $pdf->Cell(60,43,$orderId);
// $pdf->Ln(5);
// if($type=="New Order"){
// 	rsort($details);
// 	//print_r($details);
// 	foreach($details as $items){
// 		$pdf->Ln(10);
// 		$pdf->Cell(25,90);
// 		$pdf->Cell(12,90,$qty);
// 		$pdf->Cell(80,90,$items['Description']);
// 		$pdf->Cell(35,90);
// 		$pdf->Cell(40,90,"$".number_format($items['Amount'], 2, '.', ''));
// 	}
	
// 	$pdf->Ln(20);
// 	$pdf->Cell(25,73);
// 	$pdf->Cell(20,73);
// 	$pdf->Cell(75,73);
// 	$pdf->Cell(35,73);
// 	$pdf->Cell(40,73,$total);
	
// //	$pdf->Ln(15);
// //	$pdf->Cell(25,90);
// //	$pdf->Cell(12,90,$qty);
// //	$pdf->Cell(80,90,"Connected Device 3");
// //	$pdf->Cell(35,90);
// //	$pdf->Cell(40,90,"$110.99");
	
// //	$pdf->Ln(10);
// //	$pdf->Cell(25,90);
// //	$pdf->Cell(12,90);
// //	$pdf->Cell(80,90,'T-Mobile '.$planType.' 10GB Plan');
// //	$pdf->Cell(35,90);
// //	$pdf->Cell(40,90,"$".$value);
	
// //	$pdf->Ln(10);
// //	$pdf->Cell(25,90);
// //	$pdf->Cell(12,90);
// //	$pdf->Cell(80,90,"Connected Device 3 ".$planType." Discount");
// //	$pdf->Cell(35,90);
// //	$pdf->Cell(40,90,"$-100.00");
// //	
// //	$pdf->Ln(10);
// //	$pdf->Cell(25,90);
// //	$pdf->Cell(12,90);
// //	$pdf->Cell(80,90,$planType.' Discount');
// //	$pdf->Cell(35,90);
// //	$pdf->Cell(40,90,"$-".$value);
// //	
// //	$pdf->Ln(20);
// //	$pdf->Cell(25,73);
// //	$pdf->Cell(20,73);
// //	$pdf->Cell(75,73);
// //	$pdf->Cell(35,73);
// //	$pdf->Cell(40,73,"$10.99");
	

// }else{
// 	sort($details);
// 	//print_r($details);
// 	foreach($details as $items){
		
// 		if($planType=="ACP"){
// 		$description = str_replace('EBBP', 'ACP',$items['Description']);
// 		}else{
// 		$description = $items['Description'];
// 		}
		
// 		$pdf->Ln(10);
// 		$pdf->Cell(25,90);
// 		$pdf->Cell(12,90,$qty);
// 		$pdf->Cell(80,90,$description);
// 		$pdf->Cell(35,90);
// 		$pdf->Cell(40,90,"$".number_format($items['Amount'], 2, '.', ''));
// 	}
// 	$pdf->Ln(15);
// 	$pdf->Cell(25,123);
// 	$pdf->Cell(20,123);
// 	$pdf->Cell(75,123);
// 	$pdf->Cell(35,123);
// 	$pdf->Cell(40,123,$total);
// }

// $pdf->Output($docName,'D');