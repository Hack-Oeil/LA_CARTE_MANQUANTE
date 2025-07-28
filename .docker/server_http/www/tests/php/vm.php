<?php
class VM {
  private $sandbox = array();
  
  public function run($code) {
    $this->sandbox = array();
    return eval($code);
  }
  
  public function set($name, $value) {
    $this->sandbox[$name] = $value;
  }
  
  public function get($name) {
    if (isset($this->sandbox[$name])) {
      return $this->sandbox[$name];
    }
    return null;
  }
}