# Default User Experience

For consistent user experience, we documented the UX design consideration 
for Lasku in this article. This article applies only to the core Lasku 
(ie. base) theme and layouts, and does not force 3rd party extensions or 
themes to follow in any way.

## Browser Compatibility

UX design and implementation should consider the following major browsers 
to be compatible with:

* Firefox 16+
* Safari 5+
* Chrome 24+
* Internet Explorer 9+

Mobile browsers are not yet mandatory, but would be good to be considered 
as well for future implementations. Primary user of this application would 
probably be a desktop users, with exception for Guest Invoice view that 
might be opened from mobile phone and tablet browsers.

## Responsive Web Design

Responsive Web Design (RWD) approach is planned for future implementation. 
Therefore the current UX structure should be done to welcome RWD 
implementation anytime.

To do this, we can create at least two separate files for each CSS definition. 
For example, suppose there's a page `login.php` that wants to use a 
specific CSS file for that page, call it `login.css`.

On `login.php` view file:
```
<link type="text/css" rel="stylesheet" href="<?=URL::base()?>static/css/login.css" />
```

Now on `login.css`, this file should actually be a "meta CSS" file that 
imports different CSS files based on the device.
If adjustments need to be done to support mobile device, we add conditional 
`@import` statement using **media query**:
```
/* Import default CSS */
@import url('login.default.css');

/* Adjustments for mobile device */
@import url('login.mobile.css') (min-device-pixel-ratio: 1.25);
```

The **default** CSS is optimized for wide screen displays. Here's a few 
list of CSS adjustment names and media queries:
* default
* netbook - For narrow screen width, eg. less than 1024px
* mobile - Mobile phones
* mobile.landscape - Landscape orientation
* tab - Tablets
* tab.landscape - Landscape orientation


## Color Harmony

Lasku uses the following combination of colors for its default theme. 

### Primary Colors
* `#1784e3` (light blue)
* `#105fa3` (dark blue)
* `#eeeeee` (semi-white)
* `#333333` (semi-black)

### Secondary Colors
* `#84e317` (green) (triad)
* `#5fa310` (dark green) (triad)
* `#e3c817` (yellow) (split complement)
* `#a39010` (dark yellow) (split complement)
* `#e32417` (red) (split complement)
* `#a31a10` (dark red) (split complement)
* `#cccccc` (light grey)

### Tertiary Colors
* `#e31784` (magenta) (triad)
* `#a3105f` (dark magenta) (triad)
* `#f8f8f8` (almost white)

## CSS3 Features

Using various CSS3 features are encouraged. However, fallback must be 
provided for all use of CSS3 properties which are not fully supported by 
all major browsers.
