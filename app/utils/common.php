<?php

// Loads common utility functions

function error_404() {
  header("Status: 404 Not Found");
  exit;
}

function get_pdo_connection() {
  return new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
}
