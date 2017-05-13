<?php

class NonceController {

    private $action = -1;

    public function get_action() {
	return $this->action;
    }

    /**
     * @param string|int $action Scalar value to add context to the nonce.
     */
    public function set_action($action) {
	$this->action = $action;
    }

    /**
     * Display "Are You Sure" message to confirm the action being taken.
     *
     */
    public function nonceAys() {
	wp_nonce_ays($this->action);
    }

    /**
     * Creates a cryptographic token tied to a specific action, user, user session,
     * and window of time.
     *
     * @return string The token.
     */
    public function create_nonce() {
	return wp_create_nonce($this->action);
    }

    /**
     * Retrieve or display nonce hidden field for forms.
     *
     * @param string     $name    Optional. Nonce name. Default '_wpnonce'.
     * @param bool       $referer Optional. Whether to set the referer field for validation. Default true.
     * @param bool       $echo    Optional. Whether to display or return hidden form field. Default true.
     * @return string Nonce field HTML markup.
     */
    public function nonce_field($name = "_wpnonce", $referer = true, $echo = true) {
	return wp_nonce_field($this->action, $name, $referer, $echo);
    }

    /**
     * Verify that correct nonce was used with time limit.
     *
     * @param string     $nonce  Nonce that was used in the form to verify
     * @param string|int $action Should give context to what is taking place and be the same when nonce was created.
     * @return false|int False if the nonce is invalid, 1 if the nonce is valid and generated between
     *                   0-12 hours ago, 2 if the nonce is valid and generated between 12-24 hours ago.
     */
    public function verify_nonce($nonce, $action = "") {
	if($action) {
	    return wp_verify_nonce($nonce, $action);
	}
	return wp_verify_nonce($nonce, $this->action);
    }

}
