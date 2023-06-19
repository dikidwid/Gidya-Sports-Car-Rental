<?php
require_once("tcpdf/tcpdf.php");
include '../config.php';
$id = $_REQUEST['pdf'];
$inv = mysqli_query($mysqli, "SELECT * FROM invoice WHERE invoice_id='$id'");

foreach ($inv as $row):
    $book = $row['book_id'];
endforeach;

$bk = mysqli_query($mysqli, "SELECT * FROM booking WHERE book_id='$book'"); foreach ($bk as $row):
    $car = $row['number_plate_id'];
    $customer = $row['customer_id'];
    $cr = mysqli_query($mysqli, "SELECT * FROM car WHERE number_plate_id='$car'");
    $cust = mysqli_query($mysqli, "SELECT * FROM customer WHERE customer_id='$customer'");
endforeach;


$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Gidya Sports Car Rental');
$pdf->setTitle('Invoice');
$pdf->setSubject('Data Customer');
$pdf->setKeywords('Data Customer');

$pdf->setFont('times', '', 11, '', true);

$pdf->addpage(); foreach ($inv as $invs): foreach ($cust as $custs): foreach ($cr as $crs): foreach ($bk as $bks): foreach ($inv as $invs):
                    $booking = new DateTime($bks['book_start_date']);
                    $today = new DateTime($row['book_end_date']);
                    $diff = $today->diff($booking);
                    $day = $diff->d;
                    $total = (int) $crs['car_rent_price'] * (int) $day;
                    $rentPriceinTable = number_format($crs['car_rent_price']);
                    $totalInTable = number_format($total);
                    $html = "
<html>
<head>Receipt of Purchase<title>Gidya Sports Car Rental</title></head>
<body>
<div style=\"text-align:right;\">
        <b>Sender:</b> Admin Gidya Sports Car Rent 
    </div>
    <div style=\"text-align: left;border-top:1px solid #000;\">
        <div style=\"font-size: 24px;color: #666;\">INVOICE</div>
    </div>
<table style=\"line-height: 1.5;\">
    <tr>
        <td><b>Invoice:</b> #$invs[invoice_id]</td>
    </tr>
    <tr>
        <td><b>Date of Issue:</b> $invs[date]</td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td><b>Receiver:</b></td>
    </tr>
    <tr>
        <td>$custs[customer_name]</td>
    </tr>
    <tr>
        <td>$custs[customer_address]</td>
    </tr>
    <tr>
        <td>$custs[customer_phone]</td>
    </tr>
</table>

<div>
</div>
    <div style=\"border-bottom:1px solid #000;\">
        <table style=\"line-height: 2;\">
            <tr style=\"font-weight: bold;border:1px solid #cccccc;background-color:#f2f2f2;\">
                <td style=\"border:1px solid #cccccc;width:175px;\">Car Model</td>
                <td style = \"text-align:right;border:1px solid #cccccc;width:70px;\">Status</td>
                <td style = \"text-align:right;border:1px solid #cccccc;width:108px\">Price/Day (Rp.)</td>
                <td style = \"text-align:right;border:1px solid #cccccc;width:75px;\">Total Day</td>
                <td style = \"text-align:right;border:1px solid #cccccc;\">Subtotal (Rp.)</td>
            </tr>
            <tr>
                <td style=\"border:1px solid #cccccc;\">$crs[car_type]</td>
                <td style=\"text-align:right; border:1px solid #cccccc;\">$invs[status]</td>
                <td style=\"text-align:right; border:1px solid #cccccc;\">Rp. $rentPriceinTable</td>
                <td style=\"text-align:right; border:1px solid #cccccc;\">$day Day</td>
                <td style=\"text-align:right; border:1px solid #cccccc;\">Rp. $totalInTable</td>
            </tr>
        </table>
    </div>
    <p><u>Kindly make your payment to</u>:<br/>
        Bank: Bank Central Asia (BCA)<br/>
        Account Number: 820122022<br/>
    </p>
    <p><i>Note: Please send a remittance advice by email to support@gidya.com</i></p>
</body>
</html>
                    
";
                endforeach;
            endforeach;
        endforeach;
    endforeach;
endforeach;

$pdf->writeHTML($html);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('invoice.pdf', 'I');
?>