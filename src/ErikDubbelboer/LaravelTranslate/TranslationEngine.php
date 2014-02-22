<?php


namespace ErikDubbelboer\LaravelTranslate;


use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Compilers\CompilerInterface;


class TranslationEngine extends CompilerEngine {
  /** @var string */
  protected $prefix = 'views';


  public function __construct(CompilerInterface $compiler, $prefix) {
    parent::__construct($compiler);

    $this->prefix = $prefix;
  }


  public function get($path, array $data = array()) {
    $contents = parent::get($path, $data);

    return preg_replace_callback('/{\|([^}]*?)}/', function($match) {
      return e(trans('flip4coins.' . $match[1]));
    }, $contents);
  }
}
