<?php
// Include the PHP Spreadsheet library
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Database connection
include("koneksi.php");

// Fetch data from the database
$sql = "SELECT * FROM rfid";
$query = mysqli_query($konek, $sql);

// Create a new Spreadsheet object
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Add headers to the Excel file
$sheet->setCellValue('A1', 'ID Card');
$sheet->setCellValue('B1', 'Val');
$sheet->setCellValue('C1', 'Nama');
$sheet->setCellValue('D1', 'Timestamp');

// Populate Excel file with data
$row = 2;
while($data = mysqli_fetch_array($query)){
    $sheet->setCellValue('A'.$row, $data['idcard']);
    $sheet->setCellValue('B'.$row, $data['val']);
    $sheet->setCellValue('C'.$row, $data['nama']);
    $sheet->setCellValue('D'.$row, $data['timestamp']);
    $row++;
}

// Save the Excel file to a temporary location
$filename = 'Abensi.xlsx';
$writer = new Xlsx($spreadsheet);
$writer->save($filename);

// Send the Excel file as a download to the user's browser
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$filename.'"');
header('Cache-Control: max-age=0');

readfile($filename);
unlink($filename); // Delete the temporary file after download
