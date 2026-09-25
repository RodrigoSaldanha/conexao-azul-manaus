<?php
require_once __DIR__ . '/app.php';
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_set_cookie_params([
        'httponly' => true,
        'samesite' => 'Lax',
        'secure' => (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    ]);
    session_start();
}
require_once __DIR__ . '/database.php';

function require_admin(): void {
    if (empty($_SESSION['admin_id'])) {
        header('Location: login.php'); exit;
    }
}
function csrf_token(): string {
    if (empty($_SESSION['csrf_token'])) $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    return $_SESSION['csrf_token'];
}
function csrf_input(): string {
    return '<input type="hidden" name="csrf_token" value="'.htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8').'">';
}
function verify_csrf(): void {
    $token = $_POST['csrf_token'] ?? '';
    if (!$token || !hash_equals($_SESSION['csrf_token'] ?? '', $token)) {
        http_response_code(403); die('Requisição inválida. Atualize a página e tente novamente.');
    }
}
function flash(string $message): void { $_SESSION['flash'] = $message; }
function take_flash(): string {
    $m = $_SESSION['flash'] ?? ''; unset($_SESSION['flash']); return $m;
}
