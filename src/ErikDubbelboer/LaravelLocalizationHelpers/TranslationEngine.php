<?php


namespace ErikDubbelboer\LaravelLocalizationHelpers;


use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Compilers\CompilerInterface;


class TranslationEngine extends CompilerEngine {
  /** @var string */
  protected $prefix = 'messages';


  public function __construct(CompilerInterface $compiler, $prefix) {
    parent::__construct($compiler);

    $this->prefix = $prefix;
  }


  public function get($path, array $data = array()) {
    $contents = parent::get($path, $data);
    $prefix   = $this->prefix;

    return preg_replace_callback('/{\|([^}]*?)}/', function($match) use ($prefix) {
      return e(trans($prefix . '.' . trim($match[1])));
    }, $contents);
  }
}
