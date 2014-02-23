<?php


namespace ErikDubbelboer\LaravelLocalizationHelpers;


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
    if (isset($this->strings[$offset])) {
      return true;
    } else {
      \Log::info('Missing ' . \App::getLocale() . ' translation for: ' . $offset);
      return false;
    }
  }

  public function offsetUnset($offset) {
    // Do nothing.
  }

  public function offsetGet($offset) {
    if (isset($this->strings[$offset])) {
      return $this->strings[$offset];
    } else {
      \Log::info('Missing ' . \App::getLocale() . ' translation for: ' . $offset);
      return $offset;
    }
  }
}
