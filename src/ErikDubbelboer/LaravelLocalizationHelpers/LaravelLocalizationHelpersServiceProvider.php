<?php

namespace ErikDubbelboer\LaravelLocalizationHelpers;


class LaravelLocalizationHelpersServiceProvider extends \Illuminate\Support\ServiceProvider {

  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register() {
    $this->app->bind('translation', function() {
      return new Translation();
    });

    $app  = $this->app;
    $view = $this->app['view'];

    $view->addExtension('trans.blade.php', 'blade-trans', function() use ($app, $view) {
      $resolver = $view->getEngineResolver();
      $compiler = $resolver->resolve('blade')->getCompiler();

      return new TranslationEngine($compiler, \Config::get('app.localization.prefix', 'messages'));
    });
  }

}
