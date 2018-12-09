# imagegradientrectangle

[![MIT License](https://img.shields.io/github/license/andrewgjohnson/imagegradientrectangle.png)](https://github.com/andrewgjohnson/imagegradientrectangle/blob/master/LICENSE)
[![Current Release](https://img.shields.io/github/release/andrewgjohnson/imagegradientrectangle.png)](https://github.com/andrewgjohnson/imagegradientrectangle/releases)
[![GitHub Stars](https://img.shields.io/github/stars/andrewgjohnson/imagegradientrectangle.png)](https://github.com/andrewgjohnson/imagegradientrectangle/stargazers)
[![Contributors](https://img.shields.io/github/contributors/andrewgjohnson/imagegradientrectangle.png)](https://github.com/andrewgjohnson/imagegradientrectangle/graphs/contributors)
[![Packagist Downloads](https://img.shields.io/packagist/dt/andrewgjohnson/imagegradientrectangle.png)](https://packagist.org/packages/andrewgjohnson/imagegradientrectangle/stats)
[![Issues](https://img.shields.io/github/issues/andrewgjohnson/imagegradientrectangle.png)](https://github.com/andrewgjohnson/imagegradientrectangle/issues)

## Description

**imagegradientrectangle** is a function that will draw a gradient filled rectangle on your PHP GD images.

## Usage

### With Composer

This project offers support for the [Composer](https://getcomposer.org/) dependency manager.  You can find the imagegradientrectangle package online on [packagist.org](https://packagist.org/packages/andrewgjohnson/imagegradientrectangle).

#### Install using Composer

Either run this command:

    composer require andrewgjohnson/imagegradientrectangle

or add this to the `require` section of your composer.json file:

    "andrewgjohnson/imagegradientrectangle": "1.*"

### Without Composer

To use without Composer add an [include](http://php.net/manual/function.include.php) to the [`imagegradientrectangle.php` source file](https://raw.githubusercontent.com/andrewgjohnson/imagegradientrectangle/master/source/imagegradientrectangle.php).

    include_once 'source/imagegradientrectangle.php';

## Examples

    // standard method to draw a red filled rectangle
    $red = imagecolorallocate($im, 0xFF, 0x00, 0x00);
    imagefilledrectangle($im, 10, 10, 100, 100, $red);

    // standard method to draw a blue filled rectangle
    $blue = imagecolorallocate($im, 0x00, 0x00, 0xFF);
    imagefilledrectangle($im, 10, 10, 100, 100, $blue);

    // this will draw a red-to-blue gradient filled rectangle
    $red = imagecolorallocate($im, 0xFF, 0x00, 0x00);
    $blue = imagecolorallocate($im, 0x00, 0x00, 0xFF);
    imagegradientrectangle($im, 10, 10, 100, 100, $red, $blue);

There are [other examples](https://github.com/andrewgjohnson/imagegradientrectangle/tree/master/examples) included in the GitHub repository.

## Help Requests

Please post any questions on [stackoverflow.com](https://stackoverflow.com/search?q=imagegradientrectangle) if you need help.

If you discover a bug please [enter an issue](https://github.com/andrewgjohnson/imagegradientrectangle/issues/new) on GitHub.  When submitting an issue please use our [issue template](https://github.com/andrewgjohnson/imagegradientrectangle/blob/master/ISSUE_TEMPLATE.md).

## Contributing

Please read our [contributing guidelines](https://github.com/andrewgjohnson/imagegradientrectangle/blob/master/CONTRIBUTING.md) if you want to contribute.

## Acknowledgements

This project was started by [Andrew G. Johnson (@andrewgjohnson)](https://github.com/andrewgjohnson).

Full list of contributors:
 * [Andrew G. Johnson (@andrewgjohnson)](https://github.com/andrewgjohnson)

Our [issue template](https://github.com/andrewgjohnson/imagegradientrectangle/blob/master/ISSUE_TEMPLATE.md) & [pull request template](https://github.com/andrewgjohnson/imagegradientrectangle/blob/master/PULL_REQUEST_TEMPLATE.md) come via the [stevemao/github-issue-templates](https://github.com/stevemao/github-issue-templates) project. The [mountains photo](https://unsplash.com/photos/qJvpykJ5SKs) comes via [Gabriel Garcia Marengo](https://unsplash.com/@gabrielgm).

## Changelog

You can find all notable changes in the [changelog](https://github.com/andrewgjohnson/imagegradientrectangle/blob/master/CHANGELOG.md).
