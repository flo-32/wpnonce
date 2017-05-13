# Sample Project: object-oriented wp_nonce

Composer Package to use wordpress nonce functions in an object-oriented way

## How to use nonce 

Create nonce
```sh
$controller = new NonceController();
$controller->set_action("foo");
$nonce = $controller->create_nonce();
```

verify nonce
```sh
$controller = new NonceController();
$controller->set_action("foo");
if( ! $controller->verify_nonce($_REQUEST['_wpnonce'])) {
    //valid
}
```

Create nonce field
```sh
$controller = new NonceController();
$controller->set_action("foo");
echo $controller->nonce_field('field_name');
```

Display ays message
```sh
$controller = new NonceController();
$controller->set_action("foo");
echo $controller->nonceAys();
```


## Testing

### 1. Step
Setup and run Wordpress PHPUnit Test Suite ( [How to](https://make.wordpress.org/core/handbook/testing/automated-testing/phpunit/) )

### 2. Step
[Download Package](https://github.com/flo-32/wpnonce.git) from github and add to project

### 3. Step
Adjust *WP_TESTS_DIR* directory in *bootstrap.php*
```sh
define( 'WP_TESTS_DIR',  'path-to-project/wordpress-develop/tests/phpunit/' );
```
### 4. Step
run *phpunit* in package-folder