<?php

$conn = new mysqli('localhost', 'root', '', 'happyplacetwo');

if ($conn->connect_errno) {
  die($conn->connect_error);
}
