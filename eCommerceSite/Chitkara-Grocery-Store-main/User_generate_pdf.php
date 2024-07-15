<?php
require_once('TCPDF-main/tcpdf.php');
session_start();

$con = mysqli_connect("localhost", "root", "", "ppa");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Debugging to check session data
if (!isset($_SESSION['username'])) {
    die("Session username not set. Please log in.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['generate_pdf'])) {
    $username = $_SESSION['username'];
    $sql_user = "SELECT * FROM `user` WHERE username = '$username'";
    $result_user = mysqli_query($con, $sql_user);

    if (mysqli_num_rows($result_user) > 0) {
        $row_user = mysqli_fetch_assoc($result_user);

        // Fetch user orders from orderdetails table
        $sql_orders = "SELECT * FROM `orderdetails` WHERE Email = '{$row_user['email']}'";
        $result_orders = mysqli_query($con, $sql_orders);

        // Create a new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // Set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('PPA');
        $pdf->SetTitle('User Profile Report with Orders');
        $pdf->SetSubject('User Profile Report with Orders');
        $pdf->SetKeywords('TCPDF, PDF, report, user, profile, orders');

        // Add a page
        $pdf->AddPage();

        // Set font
        $pdf->SetFont('helvetica', 'B', 20);

        // Title
        $pdf->SetFillColor(119,136,153);
        $pdf->SetTextColor(0, 100, 0);
        $pdf->Cell(0, 10, 'ID Trade Centre', 0, 1, 'C', 1);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(0, 10, 'User Profile Report with Orders', 0, 1, 'C');

        // Line break
        $pdf->Ln();

        // Set font
        $pdf->SetFont('helvetica', '', 12);

        // User information HTML with CSS styling
        $profile_image = './uploads/' . $row_user['profile_photo'];
        if (file_exists($profile_image)) {
            $pdf->Image($profile_image, 15, 30, 50, 50, 'JPG', '', 'T', false, 300, '', false, false, 1, false, false, false);
        }

        // Move cursor to below the image
        $pdf->SetY(100);

        // User information HTML with CSS styling
        $user_info_html = '<h1 style="color: #333;">User Information</h1>
                            <p><strong style="color: #666;">Username:</strong> '.$row_user['username'].'</p>
                            <p><strong style="color: #666;">Email:</strong> '.$row_user['email'].'</p>
                            <p><strong style="color: #666;">First Name:</strong> '.$row_user['first_name'].'</p>
                            <p><strong style="color: #666;">Last Name:</strong> '.$row_user['last_name'].'</p>
                            <p><strong style="color: #666;">Address:</strong> '.$row_user['address'].'</p>
                            <p><strong style="color: #666;">Province:</strong> '.$row_user['province'].'</p>
                            <p><strong style="color: #666;">Postal Code:</strong> '.$row_user['postal_code'].'</p>';

        // Write user information
        $pdf->writeHTML($user_info_html, true, false, true, false, '');

        // Line break
        $pdf->Ln();
        $pdf->AddPage();

        // Orders information HTML with CSS styling
        $orders_info_html = '<br/><br/><h2 style="color: #333;">User Orders</h2><br><br><br>';
        $orders_info_html .= '<table style="width: 100%; border-collapse: collapse;">
                                <tr>
                                    <th style="border: 1px solid #333; padding: 5px; background-color: #696969;">Order ID</th>
                                    <th style="border: 1px solid #333; padding: 5px; background-color: #696969;">Name</th>
                                    <th style="border: 1px solid #333; padding: 5px; background-color: #696969;">Address</th>
                                    <th style="border: 1px solid #333; padding: 5px; background-color: #696969;">Email</th>
                                    <th style="border: 1px solid #333; padding: 5px; background-color: #696969;">Phone</th>
                                    <th style="border: 1px solid #333; padding: 5px; background-color: #696969;">Order Date</th>
                                    <th style="border: 1px solid #333; padding: 5px; background-color: #696969;">Totale Price</th>
                                </tr>';

        // Loop through user orders
        while ($row_order = mysqli_fetch_assoc($result_orders)) {
            $orders_info_html .= '<tr>
                                    <td style="border: 1px solid #333; padding: 5px;">'.$row_order['Order_ID'].'</td>
                                    <td style="border: 1px solid #333; padding: 5px;">'.$row_order['Name'].'</td>
                                    <td style="border: 1px solid #333; padding: 5px;">'.$row_order['Address'].'</td>
                                    <td style="border: 1px solid #333; padding: 5px;">'.$row_order['Email'].'</td>
                                    <td style="border: 1px solid #333; padding: 5px;">'.$row_order['phone'].'</td>
                                    <td style="border: 1px solid #333; padding: 5px;">'.$row_order['orderdate'].'</td>
                                    <td style="border: 1px solid #333; padding: 5px;">RS:'.$row_order['price'].'/=</td>
                                </tr>';
        }

        $orders_info_html .= '</table>';


        // Write orders information
        $pdf->writeHTML($orders_info_html, true, false, true, false, '');

        // Close and output PDF document
        $pdf->Output('user_profile_with_orders.pdf', 'I');

        mysqli_close($con);
    } else {
        echo "User not found!";
    }
}
?>
