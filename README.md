# Halt
Halt is the CatchFire WordPress starter theme.
It is a modified version of [Sage](https://roots.io/sage) by the Roots team

## Requirements

| Prerequisite    | How to check | How to install
| --------------- | ------------ | ------------- |
| PHP >= 5.4.x    | `php -v`     | [php.net](http://php.net/manual/en/install.php) |
| Node.js 0.12.x  | `node -v`    | [nodejs.org](http://nodejs.org/) |
| gulp >= 3.9.1   | `gulp -v`    | `npm install -g gulp` |
| Bower >= 1.3.12 | `bower -v`   | `npm install -g bower` |
| Laravel Elixir >= 6.0.0-15  |              |                        |

## Theme installation

Bottom line is you want to get the files in this repo into your local development environment. Just git clone this repo into your themes directory and name it according to the project.

## Theme setup

Edit `lib/setup.php` to enable or disable theme features, setup navigation menus, post thumbnail sizes, etc.

## Theme development

Halt uses [Laravel Elixir](https://laravel.com/docs/5.3/elixir) as its build system. It is an elegeant API for interacting with Gulp.

### Install Laravel Elixir

Building the theme requires [node.js](http://nodejs.org/download/). We recommend you update to the latest version of npm: `npm install -g npm@latest`. This theme also includes a yarn lockfile. Yarn is a speedy drop-in replacement for npm, install it with `brew install yarn` if you don't have it.

From the command line:

1. Navigate to your theme directory and run `yarn install`, if you choose not to use yarn just run `npm i`
2. That's it!

You now have all the necessary dependencies to run the build process.

### Available gulp commands

* `gulp` — Compile and optimize the files in your assets directory
* `gulp watch` — Compile assets when file changes are made
* `gulp --production` — Compile and minimize assets for production (no source maps)

### Using BrowserSync

To use BrowserSync during `gulp watch` you need to update the `browserSyncProxy` variable in your `gulpfile.js` to reflect your local development hostname.
