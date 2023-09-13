<?php
// Include necessary files and initialize objects
include_once '../classes/Customer.php';
$cw = new Customer();

if (isset($_GET['customerId'])) {
  $customerId = $_GET['customerId'];

  // Fetch the product report for the specified customer ID
  $productReport = $cw->getProductReport($customerId);

  // Generate HTML content for the modal table
  if ($productReport) {
    while ($row = $productReport->fetch_assoc()) {
      echo '<tr>';
      echo '<td>' . $row['productName'] . '</td>';
      echo '<td>' . $row['quantity'] . '</td>';
      echo '<td>' . $row['price'] . '</td>';
      echo '</tr>';
    }
  } else {
    echo '<tr><td colspan="3">No data available</td></tr>';
  }
} else {
  echo '<tr><td colspan="3">Invalid request</td></tr>';
}
