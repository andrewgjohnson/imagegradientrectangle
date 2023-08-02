# imagegradientrectangle

[![MIT License](https://img.shields.io/badge/license-MIT-0366d6.png?colorB=0366d6&style=flat-square)](https://github.com/andrewgjohnson/imagegradientrectangle/blob/master/LICENSE)
[![Current Release](https://img.shields.io/github/release/andrewgjohnson/imagegradientrectangle.png?colorB=0366d6&style=flat-square&logoColor=white&logo=github)](https://github.com/andrewgjohnson/imagegradientrectangle/releases)
[![GitHub Stars](https://img.shields.io/github/stars/andrewgjohnson/imagegradientrectangle.png?colorB=0366d6&style=flat-square&logoColor=white&logo=github)](https://github.com/andrewgjohnson/imagegradientrectangle/stargazers)
[![Contributors](https://img.shields.io/github/contributors/andrewgjohnson/imagegradientrectangle.png?colorB=0366d6&style=flat-square&logoColor=white&logo=github)](https://github.com/andrewgjohnson/imagegradientrectangle/graphs/contributors)
[![Packagist Downloads](https://img.shields.io/packagist/dt/andrewgjohnson/imagegradientrectangle.png?colorB=0366d6&style=flat-square&logoColor=white&logo=packagist)](https://packagist.org/packages/andrewgjohnson/imagegradientrectangle/stats)
[![Issues](https://img.shields.io/github/issues/andrewgjohnson/imagegradientrectangle.png?colorB=0366d6&style=flat-square&logoColor=white&logo=github)](https://github.com/andrewgjohnson/imagegradientrectangle/issues)
[![Patreon](https://img.shields.io/endpoint.png?url=https%3A%2F%2Fshieldsio-patreon.vercel.app%2Fapi%3Fusername%3Dagjopensource%26type%3Dpatrons&colorB=0366d6&style=flat-square&logoColor=white&logo=patreon)](https://patreon.com/agjopensource)

<p align="center"><a href="https://imagegradientrectangle.agjgd.org/" title=""><img src="https://imagegradientrectangle.agjgd.org/documentation/imagegradientrectangle.agjgd.org/images/avatar.png" alt="" title="" width="400" id="avatar" /></a></p>

## Description

**imagegradientrectangle** is a function that will draw a gradient filled rectangle on your PHP GD images.

[![Patreon - Become a Patron](https://raster.shields.io/badge/Patreon%20-become%20a%20Patron-FD334A.png?style=for-the-badge&logo=patreon&logoColor=FD334A)](https://patreon.com/agjopensource)

**imagegradientrectangle** is an [agjgd.org](https://agjgd.org) project.

## Usage

### With Composer

This project offers support for the [Composer](https://getcomposer.org/) dependency manager. You can find the imagegradientrectangle package online on [packagist.org](https://packagist.org/packages/andrewgjohnson/imagegradientrectangle).

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

There are [other examples](https://github.com/andrewgjohnson/imagegradientrectangle/tree/master/examples) included in the GitHub repository and on [imagegradientrectangle.agjgd.org](https://imagegradientrectangle.agjgd.org/examples/).

## Help Requests

Please post any questions in the [discussions area](https://github.com/andrewgjohnson/imagegradientrectangle/discussions) on GitHub if you need help.

If you discover a bug please [enter an issue](https://github.com/andrewgjohnson/imagegradientrectangle/issues/new) on GitHub. When submitting an issue please use our [issue template](https://github.com/andrewgjohnson/imagegradientrectangle/blob/master/ISSUE_TEMPLATE.md).

## Contributing

Please read our [contributing guidelines](https://github.com/andrewgjohnson/imagegradientrectangle/blob/master/CONTRIBUTING.md) if you want to contribute.

You can contribute financially by becoming a [patron](https://patreon.com/agjopensource) at [patreon.com/agjopensource](https://patreon.com/agjopensource) to support imagegradientrectangle and [other agjgd.org projects](https://agjgd.org/projects/).

[![Patreon - Become a Patron](https://raster.shields.io/badge/Patreon%20-become%20a%20Patron-FD334A.png?style=for-the-badge&logo=patreon&logoColor=FD334A)](https://patreon.com/agjopensource)

## Acknowledgements

This project was started by [Andrew G. Johnson (@andrewgjohnson)](https://github.com/andrewgjohnson).

Full list of contributors:
 * [Andrew G. Johnson (@andrewgjohnson)](https://github.com/andrewgjohnson)

Our [security policies and procedures](https://github.com/andrewgjohnson/imagegradientrectangle/blob/master/.github/SECURITY.md) comes via the [atomist/samples](https://github.com/atomist/samples/blob/master/SECURITY.md) project. Our [issue templates](https://github.com/andrewgjohnson/imagegradientrectangle/tree/master/.github/ISSUE_TEMPLATE) comes via the [tensorflow/tensorflow](https://github.com/tensorflow/tensorflow/blob/master/SECURITY.md) project. Our [pull request template](https://github.com/andrewgjohnson/imagegradientrectangle/blob/master/.github/PULL_REQUEST_TEMPLATE.md) comes via the [stevemao/github-issue-templates](https://github.com/stevemao/github-issue-templates) project. The [mountains photo](https://unsplash.com/photos/qJvpykJ5SKs) comes via [Gabriel Garcia Marengo](https://unsplash.com/@gabrielgm).

## Changelog

You can find all notable changes in the [changelog](https://github.com/andrewgjohnson/imagegradientrectangle/blob/master/CHANGELOG.md).
