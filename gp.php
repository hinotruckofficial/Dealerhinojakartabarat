<?php
$password = 'admin123';

// Generate bcrypt hash
$hash = password_hash($password, PASSWORD_BCRYPT);

// Tampilkan hash
echo $hash;
