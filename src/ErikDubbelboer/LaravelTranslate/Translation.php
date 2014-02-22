<?php


namespace ErikDubbelboer\LaravelTranslate;


class Translation implements \ArrayAccess {

  protected $strings = array();


  public function __construct($strings = array()) {
    $this->strings = $strings;
  }


  public static function make($strings) {
    return new static($strings);
  }


  public function offsetSet($offset, $value) {
    // Do nothing.
  }

  public function offsetExists($offset) {
    return true;
  }

  public function offsetUnset($offset) {
    // Do nothing.
  }

  public function offsetGet($offset) {
    if (!isset($this->strings[$offset])) {
      \Log::info('Missing ' . \App::getLocale() . ' translation for: ' . $offset);
    }

    return $offset;
  }
}
