# Reasearch conclusion

https://evilmartians.com/chronicles/how-to-favicon-in-2021-six-files-that-fit-most-needs

## favicon.ico

32x32px

```html
<link rel="icon" href="/favicon.ico">
```

## favicon.svg

https://css-tricks.com/svg-favicons-in-action/

```html
<link rel="icon" href="/favicon.svg" type="image/svg+xml">
```

## favicon.png

https://developers.google.com/search/docs/appearance/favicon-in-search?hl=de
https://developer.mozilla.org/en-US/docs/Web/HTML/Attributes/rel#attr-icon

<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="icon" type="image/png" href="/favicon.png" >

## Apple

https://developer.apple.com/library/archive/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html

Most commonly 180x180px

```html
<link rel="apple-touch-icon" href="/apple-touch-icon-precomposed.png">

<link rel="apple-touch-icon" sizes="152x152" href="/touch-icon-ipad-precomposed.png">
<link rel="apple-touch-icon" sizes="180x180" href="/touch-icon-iphone-retina-precomposed.png">
<link rel="apple-touch-icon" sizes="167x167" href="/touch-icon-ipad-retina-precomposed.png">
```

If none of the above were found, Safari will automatically scrape the root directory for any `apple-touch-icon*.png` icons like `apple-touch-icon-80x80.png` or `apple-touch-icon-58x58.png`.

The `-precomposed.png` tells safari to not add any gloss effects to the icon.

```html
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#0000ff">
```

Web app mode

```html
<link rel="apple-touch-startup-image" href="/apple-touch-startup-image.png">
<meta name="apple-mobile-web-app-title" content="Website Title">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
```

## Meta theme-color

https://developer.mozilla.org/en-US/docs/Web/HTML/Element/meta/name/theme-color

Used by Chrome mobile and Safari to color the browser window outside the website. At least in Safari, this can also be done by setting the body background color.

```html
<meta name="theme-color" content="#ffffff">
```

## manifest.json

https://developer.mozilla.org/en-US/docs/Mozilla/Add-ons/WebExtensions/manifest.json?retiredLocale=de

Used by various browsers to get basic meta data about the website.

```html
<link rel="manifest" href="/manifest.json">
```

```json
{
    "name": "Website Title",
    "short_name": "Title",
    "icons": [
        {
            "src": "/android-icon-36x36.png",
            "sizes": "36x36",
            "type": "image/png",
            "density": "0.75"
        },
        {
            "src": "/android-icon-48x48.png",
            "sizes": "48x48",
            "type": "image/png",
            "density": "1.0"
        },
        {
            "src": "/android-icon-72x72.png",
            "sizes": "72x72",
            "type": "image/png",
            "density": "1.5"
        },
        {
            "src": "/android-icon-96x96.png",
            "sizes": "96x96",
            "type": "image/png",
            "density": "2.0"
        },
        {
            "src": "/android-icon-144x144.png",
            "sizes": "144x144",
            "type": "image/png",
            "density": "3.0"
        },
        {
            "src": "/android-icon-192x192.png",
            "sizes": "192x192",
            "type": "image/png",
            "density": "4.0"
        },
        {
            "src": "/android-chrome-512x512.png",
            "sizes": "512x512",
            "type": "image/png"
        }
    ],
    "theme_color": "#ffffff",
    "background_color": "#ffffff",
    "display": "standalone"
}
```

## browserconfig.xml

As of Feb 2023, microsoft.com doesn’t have a browserconfig.xml: https://www.microsoft.com/browserconfig.xml.

```html
<meta name="msapplication-config" content="/browserconfig.xml">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
```

```xml
<?xml version="1.0" encoding="utf-8"?>
<browserconfig>
    <msapplication>
        <tile>
            <square70x70logo src="/ms-icon-70x70.png" />
            <square150x150logo src="/ms-icon-150x150.png" />
            <square310x310logo src="/ms-icon-310x310.png" />
            <TileColor>#ffffff</TileColor>
        </tile>
    </msapplication>
</browserconfig>
```