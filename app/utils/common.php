<?php

// Loads common utility functions

function error_404() {
  header("Status: 404 Not Found");
?>
<span style="font-size: 1.1em; font-weight: bold">Sorry, we could not find the file you were looking for.</span>
<?php
  exit;
}

function get_pdo_connection() {
  return new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
}

// View Helpers
// TODO: Yes, they should exist in their own file
function status_bar() {
  $bar = "";
  if (isset($_SESSION['status'])) {
    $status = $_SESSION['status'];
    $bar .= "<div class='status'>" . htmlspecialchars($status) . "</div>"; 
    unset($_SESSION['status']);
  }
  return $bar;
}
