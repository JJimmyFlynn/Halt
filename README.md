# Halt
Halt is the a WordPress starter theme that utilizes either [Timber + Twig](https://www.upstatement.com/timber/) or a vanilla WordPress setup

## Requirements

| Prerequisite    | How to check | How to install |
| --------------- | ------------ | ------------- |
| PHP >= 5.6.4    | `php -v`     | [php.net](http://php.net/manual/en/install.php) |
| Node.js >= 7.8.x   | `node -v`    | [nodejs.org](http://nodejs.org/) |
| Composer >= 1.4.2 | | |
| Laravel Mix >= 1.0  |              |                        |

## Theme installation

1.) Clone this repo to you machine
2.) Run `composer install` to install Timber + Twig and create the autoloader file
3.) Run `yarn install` or `npm install` to install the theme dependencies
4.) Run `npm run dev` to compile the initial theme assets
5.) Run `wp theme activate {theme_folder_name}`
6.) Visit your WordPress install in your browser and you will be gretted with the Halt welcome screen
7.) Get to work!

## Theme setup

Halt's main configuration is setup in two classes: HaltBaseTheme and HaltTheme found in `/lib/halt-base-theme.php` and `/lib/halt-init-theme.php` respectively.

The `HaltBaseTheme` class contains common functionality useful for all themes built with Halt. All additional configuration should be done in the `HaltTheme` class.

**N.B.** If more PHP files are added to the `/lib` folder, be sure to require them in `functions.php`

## Theme development

Halt uses [Laravel Mix](https://github.com/JeffreyWay/laravel-mix) as its build system. It is an elegeant API for interacting with Webpack.

### Available npm(webpack) commands

* `npm run dev`
  * Runs all tasks
  * Alias for `npm run development`

* `npm run prod --production`
  * Runs all tasks and minifys JS and CSS
  * Alias for `npm run production`

* `npm watch`
  * Run development build, watches SCSS and JS files for changes and runs all tasks on change,
   also launches BrowserSync

### Using BrowserSync

To use BrowserSync during `npm watch` you need to update the `browserSyncProxy` variable in your `webpack.mix.js` to reflect your local development hostname.