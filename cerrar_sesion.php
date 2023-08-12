<?php
// Verificar si la sesión está activa
if (session_status() === PHP_SESSION_ACTIVE) {
    // Cerrar la sesión actual
    session_destroy();
}

// Redirigir a la página de confirmación (opcional)
header("Location: confirmation.php");
exit;
?>
