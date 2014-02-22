<?php

namespace ErikDubbelboer\LaravelTranslate;


class LaravelTranslateServiceProvider extends \Illuminate\Support\ServiceProvider {

  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register() {
    $this->app->bind('translation', function($strings) {
      return new Translation($strings);
    });

    $app  = $this->app;
    $view = $this->app['view'];

    $view->addExtension('trans.blade.php', 'blade-trans', function() use ($app, $view) {
      $resolver = $view->getEngineResolver();
      $compiler = $resolver->resolve('blade')->getCompiler();

      return new TranslationEngine($compiler, \Config::get('app.translate.prefix'));
    });
  }

}
