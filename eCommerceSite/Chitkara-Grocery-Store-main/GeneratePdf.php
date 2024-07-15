<?php
require_once('TCPDF-main/tcpdf.php');

// PHP code for database connection
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "ppa"; 

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$product= "SELECT * FROM product_details inner join selectpro on product_details.product_ID = selectpro.num";
$result = $con->query($product);
$data = array();

if (isset($_POST['generate_pdf'])) 
{
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

    $pdf->SetCreator('laserX');
    $pdf->SetAuthor('laserX');
    $pdf->SetTitle('Tool Data');
    $pdf->SetSubject('Tool Data PDF');
    $pdf->SetKeywords('Tool, Data, PDF');

    $pdf->SetHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->SetFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    $pdf->AddPage();

    $html='<p style="text-align: center; font-size: 25px; font-family:sans-serif;">Cart Details</p>';
    $html.= '<table border="1" style="color: black;">';
    $html.= '<tr>';
    $html.= '<th style="background-color: rgb(37, 37, 75); color: white; height: 30px;">No</th>';
    $html.= '<th style="background-color: rgb(37, 37, 75); color: white; height: 30px;">Name</th>';
    $html.= '<th style="background-color: rgb(37, 37, 75); color: white; height: 30px;">Price</th>';
    $html.= '<th style="background-color: rgb(37, 37, 75); color: white; height: 30px;">Quantity</th>';
    $html.= '</tr>';

    if ($result->num_rows > 0) 
    {
        while ($row = $result->fetch_assoc()) 
        { 
            $html.= '<tr>';
            $html.= '<td style="border: 1px solid #000; padding: 8px; text-align: left;">'. $row['product_ID']. '</td>';
            $html.= '<td style="border: 1px solid #000; padding: 8px; text-align: left;">'. $row['Name']. '</td>';
            $html.= '<td style="border: 1px solid #000; padding: 8px; text-align: left;">'. $row['Price']. '</td>';
            $html.= '<td style="border: 1px solid #000; padding: 8px; text-align: left;">'. $row['Quantity']. '</td>';
            $html.= '</tr>';
        }
    }

    $html.= '</table>';

    $pdf->writeHTML($html, true, false, true, false, '');

    $pdf->Output('tool_data.pdf', 'D');
    exit;
}
?>
