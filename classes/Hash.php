<?php

class Hash {
    static function encryption($value) {
        return password_hash($value, PASSWORD_DEFAULT);
    }
    static function decryption($encryption_value, $value) {
        return password_verify($encryption_value, $value);
    }
}