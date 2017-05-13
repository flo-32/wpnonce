<?php

use PHPUnit\Framework\TestCase;

class NonceControllerTest extends TestCase {
    
    public function test_correct_nonce() {
	$controller = new NonceController();
	$controller->set_action("foo");

	$nonce = $controller->create_nonce();
	
	$this->assertNotEquals(-1, $controller->verify_nonce($nonce));
    }
    
    public function test_wrong_nonce() {
	$controller = new NonceController();
	$controller->set_action("foo");
	$nonce = $controller->create_nonce();
	
	$wrong_action = "bar";
	
	$this->assertFalse($controller->verify_nonce($nonce, $wrong_action));
    }
}