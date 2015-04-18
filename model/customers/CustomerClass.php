<?php
class CustomerClass {
    private $lastname = '';
    private $firstname = '';
    private $phonenumber = '';
    private $streetaddress = '';
    private $city = '';
    private $state = '';
    private $primkey;
    
    public function displayLastName() { return $lastname; }
    public function displayFirstName() { return $firstname; }
    public function displayPhoneNumber() { return $phonenumber; }
    
    public function displayStreetAddress() { return $streetaddress; }
    public function displayCity() { return $city; }
    public function displayState() { return $state; }
    
    public function displayPrimkey() { return $primkey; }
    
    public function setLastName($nm) { $this->lastname = $nm; }
    public function setFirstName($nm) { $this->firstname = $nm; }
    public function setPhoneNumber($nm) { $this->phonenumber = $nm; }
    public function setStreetAddress($nm) { $this->streetaddress = $nm; }
    public function setCity($nm) { $this->city = $nm; }
    public function setState($nm) { $this->state = $nm; }
    public function setPrimkey($nm) { $this->primkey = $nm; }
    
    
    private function init($ln, $fn, $pn, $sa, $cy, $st, $pk) {
        setLastName(nullCheck($$ln));
        setFirstName(nullCheck($fn));
        setPhoneNumber(nullCheck($pn));
        setStreetAddress(nullCheck($sa));
        setCity(nullCheck($cy));
        setState(nullCheck($st));
        setPrimkey(nullCheck($pk));
    }
    
    function nullCheck($var) {
        if ($var == NULL || $var == false) {
            $message = "Input variable was null or false";
            return '';
        } else {
            return $var;
        }
    }
    // this constructor should never get called, but in case it does, this is what itll do
    function __construct() {
        $customer = func_get_args();
        if(is_array($customer)) {
            init($customer[0], $customer[1],$customer[2],$customer[3],$customer[4],$customer[5], $customer[6]);
        } elseif (is_object($customer)) {
            init($customer->lastname, $customer->firstname, $customer->phonenumber,
                $customer->streetaddress, $customer->city, $customer->state, $customer->primkey);
        } elseif (is_null($customer)) {
            init(null, null, null, null, null, null, null);
        }
    }
}
