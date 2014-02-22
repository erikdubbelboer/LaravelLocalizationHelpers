LaravelLocalizationHelpers
=================

Laravel localization helpers.


Add to `app.providers` config:
```
  'ErikDubbelboer\LaravelLocalizationHelpers\LaravelLocalizationHelpersServiceProvider',
```

Add to `app.aliases` config:
```
  'Translation'     => 'ErikDubbelboer\LaravelLocalizationHelpers\Facades\Translation',
```

Optionally add to your `app` config:
```
  'localization' => array(
    // The prefix used for the blade translated messages.
    'prefix' => 'messages'
  ),
```

Example:
```html

<span>{|This is a translated message}</span>
```
