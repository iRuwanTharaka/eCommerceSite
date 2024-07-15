<?php
require_once('TCPDF-main/tcpdf.php');
session_start();

$con = mysqli_connect("localhost", "root", "", "ppa");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql_orders = "SELECT tblcustomaition.*, userselect.quantity AS user_quantity 
               FROM tblcustomaition 
               INNER JOIN userselect 
               ON tblcustomaition.id = userselect.num";
$result_orders = mysqli_query($con, $sql_orders);

// Initialize total cost and total items
$totalCost = 0;
$totalItems = 0;

// Loop through the result to calculate totals
while ($row_order = mysqli_fetch_assoc($result_orders)) {
    $totalItems += $row_order['user_quantity'];
    $totalCost += $row_order['price'] * $row_order['user_quantity'];
}

// Reset the result set pointer to the beginning
mysqli_data_seek($result_orders, 0);

// Create a new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('PPA');
$pdf->SetTitle('ID Trade Centre');
$pdf->SetSubject('ID Trade Centre');
$pdf->SetKeywords('TCPDF, PDF, report, user, profile, orders');

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', 'B', 20);

// Title
$pdf->Cell(0, 10, 'ID Trade Centre', 0, 1, 'C');

// Line break
$pdf->Ln();

// Set font
$pdf->SetFont('helvetica', '', 12);

// Orders information HTML with CSS styling
$orders_info_html = '<h2 style="color: #333;">Cash Receipt</h2>';
$orders_info_html .= '<table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <th style="border: 1px solid #333; padding: 5px; background-color: #696969;">Name</th>
                        <th style="border: 1px solid #333; padding: 5px; background-color: #696969;">Price</th>
                        <th style="border: 1px solid #333; padding: 5px; background-color: #696969;">Quantity</th>
                        <th style="border: 1px solid #333; padding: 5px; background-color: #696969;">Image</th>
                    </tr>';

// Loop through user orders
while ($row_order = mysqli_fetch_assoc($result_orders)) {
    $orders_info_html .= '<tr>
                            <td style="border: 1px solid #333; padding: 5px;">'.$row_order['title'].'</td>
                            <td style="border: 1px solid #333; padding: 5px;">RS:'.$row_order['price'].'.00/=</td>
                            <td style="border: 1px solid #333; padding: 5px;">'.$row_order['user_quantity'].'</td>
                            <td style="border: 1px solid #333; padding: 5px;"><img src="./image/' . $row_order['image'] . '" width="120" height="120"></td>
                        </tr>';
}

$orders_info_html .= '</table>';

// Add totals to the report
$orders_info_html .= '<h3>Total Items: ' . $totalItems . '</h3>';
$orders_info_html .= '<h3>Total Price: RS. ' . $totalCost . '.00/=</h3>';

// Write orders information
$pdf->writeHTML($orders_info_html, true, false, true, false, '');

// Close and output PDF document
$pdf->Output('user_profile_with_orders.pdf', 'I');

mysqli_close($con);
?>
