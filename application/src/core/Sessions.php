<?php

namespace Paw\Sessions;

class Sessions {
    public function startSession() {
        session_start();
    }

    public function destroySession() {
        if (session_status() === PHP_SESSION_ACTIVE) {
            $_SESSION = [];
            setcookie(session_name(), '', time() - 10000);
            session_destroy();
        }
    }

    public function getSessionData($key) {
        return $_SESSION[$key];
    }

    public function setSessionData($key, $value) {
        $_SESSION[$key] = $value;
    }
}