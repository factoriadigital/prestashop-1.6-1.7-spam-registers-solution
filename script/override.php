<?php
/* This file should be created inside your ADMIN_DIR */ 
/* Then run the file http(s)://domain.tld/<admindir>/patch122.php */ 

// Uncomment (remove //) the following line for debug purposes
//@define('_PS_MODE_DEV_', true);

require_once(__DIR__.'/../../../config/config.inc.php');
if (!version_compare(_PS_VERSION_,'1.5','>=')) {
    die('Este script solo soporta versiones superiores a 1.5 de prestashop.'.PHP_EOL);
}
$ps_root_dir = _PS_ROOT_DIR_;
(substr($ps_root_dir,-1,1) != '/') && $ps_root_dir .= '/';

if (!file_exists($ps_root_dir.'override/classes/Validate.php')) {
    $content = <<< 'EOF'
<?php
class Validate extends ValidateCore
{
    public static function isCustomerName($name)
    {
        if (preg_match(Tools::cleanNonUnicodeSupport('/www|http/ui'), $name)) {
            return false;
        }

        return preg_match(Tools::cleanNonUnicodeSupport('/^[^0-9!\[\]<>,;?=+()@#"째{}_$%:\/\\\*\^]*$/u'), $name);
    }
}
EOF;
    file_put_contents($ps_root_dir.'override/classes/Validate.php', $content);
    @unlink($ps_root_dir.'cache/class_index.php');
    echo 'El archivo validate.ph con su clase ha sido creado de forma correcta en la carpeta override'.PHP_EOL;
}
else {
    echo 'El proceso de creación de archivos en la carpeta override ha fallado, porque ya existían dichos archivos, pongase en contacto con nosotros para darles el presupuesto y que lo realice manualmente uno de nuestros técnicos.'.PHP_EOL;
}

if (!file_exists($ps_root_dir.'override/classes/Customer.php')) {
    $content = <<< 'EOF'
<?php

class Customer extends CustomerCore
{
    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table' => 'customer',
        'primary' => 'id_customer',
        'fields' => array(
            'secure_key' =>                array('type' => self::TYPE_STRING, 'validate' => 'isMd5', 'copy_post' => false),
            'lastname' =>                    array('type' => self::TYPE_STRING, 'validate' => 'isCustomerName', 'required' => true, 'size' => 32),
            'firstname' =>                    array('type' => self::TYPE_STRING, 'validate' => 'isCustomerName', 'required' => true, 'size' => 32),
            'email' =>                        array('type' => self::TYPE_STRING, 'validate' => 'isEmail', 'required' => true, 'size' => 128),
            'passwd' =>                    array('type' => self::TYPE_STRING, 'validate' => 'isPasswd', 'required' => true, 'size' => 32),
            'last_passwd_gen' =>            array('type' => self::TYPE_STRING, 'copy_post' => false),
            'id_gender' =>                    array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'birthday' =>                    array('type' => self::TYPE_DATE, 'validate' => 'isBirthDate'),
            'newsletter' =>                array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'newsletter_date_add' =>        array('type' => self::TYPE_DATE,'copy_post' => false),
            'ip_registration_newsletter' =>    array('type' => self::TYPE_STRING, 'copy_post' => false),
            'optin' =>                        array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'website' =>                    array('type' => self::TYPE_STRING, 'validate' => 'isUrl'),
            'company' =>                    array('type' => self::TYPE_STRING, 'validate' => 'isGenericName'),
            'siret' =>                        array('type' => self::TYPE_STRING, 'validate' => 'isSiret'),
            'ape' =>                        array('type' => self::TYPE_STRING, 'validate' => 'isApe'),
            'outstanding_allow_amount' =>    array('type' => self::TYPE_FLOAT, 'validate' => 'isFloat', 'copy_post' => false),
            'show_public_prices' =>            array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'copy_post' => false),
            'id_risk' =>                    array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'copy_post' => false),
            'max_payment_days' =>            array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'copy_post' => false),
            'active' =>                    array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'copy_post' => false),
            'deleted' =>                    array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'copy_post' => false),
            'note' =>                        array('type' => self::TYPE_HTML, 'validate' => 'isCleanHtml', 'size' => 65000, 'copy_post' => false),
            'is_guest' =>                    array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'copy_post' => false),
            'id_shop' =>                    array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'copy_post' => false),
            'id_shop_group' =>                array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'copy_post' => false),
            'id_default_group' =>            array('type' => self::TYPE_INT, 'copy_post' => false),
            'id_lang' =>                    array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'copy_post' => false),
            'date_add' =>                    array('type' => self::TYPE_DATE, 'validate' => 'isDate', 'copy_post' => false),
            'date_upd' =>                    array('type' => self::TYPE_DATE, 'validate' => 'isDate', 'copy_post' => false),
        ),
    );

}
EOF;
    file_put_contents($ps_root_dir.'override/classes/Customer.php', $content);
    @unlink($ps_root_dir.'cache/class_index.php');
    echo 'El archivo customer.ph con su modificación ha sido creado de forma correcta en la carpeta override'.PHP_EOL;
}
else {
    echo 'El proceso de creación de archivos en la carpeta override ha fallado, porque ya existían dichos archivos, pongase en contacto con nosotros para darles el presupuesto y que lo realice manualmente uno de nuestros técnicos.'.PHP_EOL;
}
echo 'END'.PHP_EOL;