# Changelog

All notable changes to the [imagegradientrectangle project](https://github.com/andrewgjohnson/imagegradientrectangle) will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/) and this project adheres to [Semantic Versioning](http://semver.org/).

## [v1.1.1](https://github.com/andrewgjohnson/imagegradientrectangle/releases/tag/v1.1.1) (May 13, 2026)
 * Changed the font in the examples from Arial to [Noto Sans](https://fonts.google.com/noto/specimen/Noto+Sans) which uses the [SIL OFL 1.1](https://openfontlicense.org/open-font-license-official-text/)
 * Updated documentation website to replace deprecated `hljs.initHighlighting()` call with `hljs.highlightAll()` and removed obsolete Google Analytics script
 * Renamed `$squareWidth` and `$squareHeight` to `$rectangleWidth` and `$rectangleHeight` in all examples
 * Removed the pass-by-reference `&` from the `$image` parameter in `imagegradientrectangle()` and updated the `@return` type annotation from `mixed` to `bool`
 * Expanded PHPUnit test coverage with tests for vertical and horizontal gradient drawing, zero-dimension edge cases, and the solid-fill fallback path
 * Removed references to Gitter and Google+ from the [Code of Conduct](https://github.com/andrewgjohnson/imagegradientrectangle/blob/master/.github/CODE_OF_CONDUCT.md)
 * Fixed broken links and typos across [README.md](https://github.com/andrewgjohnson/imagegradientrectangle/blob/master/README.md) and [CONTRIBUTING.md](https://github.com/andrewgjohnson/imagegradientrectangle/blob/master/.github/CONTRIBUTING.md)
 * Added `.claude` directory to [.gitignore](https://github.com/andrewgjohnson/imagegradientrectangle/blob/master/.gitignore)

## [v1.1.0](https://github.com/andrewgjohnson/imagegradientrectangle/releases/tag/v1.1.0) (May 10, 2026)
 * Added [Contribute](https://imagegradientrectangle.agjgd.org/contribute/) page and updated [contributing guidelines](https://github.com/andrewgjohnson/imagegradientrectangle/blob/master/.github/CONTRIBUTING.md)
 * Added PHP_CodeSniffer support to enforce PSR-12 and PHP 5.0 compatibility
 * Added PHPUnit support for unit tests
 * Added `lint`, `lint:fix`, `phpunit` and `test` composer scripts
 * Added ability to choose between a horizontal and vertical gradient with the new parameter `$horizontalGradient`
 * Fixed support for older PHP versions; this project now truly supports PHP 5.0
 * Added [.gitattributes](https://github.com/andrewgjohnson/imagegradientrectangle/blob/master/.gitattributes) file to help manage end-of-line characters
 * Added a `version_compare()` check before all `imagedestroy()` calls; the imagedestroy() function became an optional step that did nothing as of PHP 8.0 but as of PHP 8.5 when invoked it produces a deprecated notice
 * Fixed a number of broken links

## [v1.0.2](https://github.com/andrewgjohnson/imagegradientrectangle/releases/tag/v1.0.2) (November 22, 2022)
 * Signed up for [Patreon](https://patreon.com/agjopensource) and added links to README.md
 * Added `.github` folder to unclutter the root directory
 * Added `CODEOWNERS` file
 * Added `FUNDING.yml` file
 * Added `SECURITY.md` file
 * Added `SUPPORT.md` file
 * Updated shields.io badge aesthetics on README.md
 * Removed the MIT logo from the shields.io badge for imagegradientrectangle's license
 * Added Patrons shields.io badge to README.md
 * Enabled GitHub [discussions area](https://github.com/andrewgjohnson/imagegradientrectangle/discussions) and now recommending it over StackOverflow
 * Removed `ISSUE_TEMPLATE.md` file for our single issue template and replaced with `ISSUE_TEMPLATE` folder to separate bug reports & feature requests within GitHub [issues](https://github.com/andrewgjohnson/imagegradientrectangle/issues)
 * Updated [avatar image](https://imagegradientrectangle.agjgd.org/documentation/imagegradientrectangle.agjgd.org/images/avatar.png)
 * Moved all Twitter activity for all [agjgd projects](https://agjgd.org/projects/) (including imagegradientrectangle) to the [@agjgdphp Twitter account](https://twitter.com/agjgdphp) as there were issues with the individual accounts being frozen
 * Changed documentation website to [imagegradientrectangle.agjgd.org](https://imagegradientrectangle.agjgd.org)
 * Updated copyright years to 2022

## [v1.0.1](https://github.com/andrewgjohnson/imagegradientrectangle/releases/tag/v1.0.1) (December 15, 2018)
 * Launched online documentation at [imagegradientrectangle.agjgd.org](https://imagegradientrectangle.agjgd.org)

## [v1.0.0](https://github.com/andrewgjohnson/imagegradientrectangle/releases/tag/v1.0.0) (December 9, 2018)
 * Initial release of imagegradientrectangle
