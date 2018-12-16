<?php

/**
 * Imagegradientrectangle Example (Basic)
 *
 * Copyright (c) 2018 Andrew G. Johnson <andrew@andrewgjohnson.com>
 * Permission is hereby granted, free of charge, to any person obtaining a copy of
 * this software and associated documentation files (the "Software"), to deal in the
 * Software without restriction, including without limitation the rights to use,
 * copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the
 * Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
 * FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN
 * AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 * PHP version 5
 *
 * @category  Andrewgjohnson
 * @package   Imagegradientrectangle
 * @author    Andrew G. Johnson <andrew@andrewgjohnson.com>
 * @copyright 2018 Andrew G. Johnson <andrew@andrewgjohnson.com>
 * @license   https://opensource.org/licenses/mit/ The MIT License
 * @link      https://github.com/andrewgjohnson/imagegradientrectangle
 */

// include the imagegradientrectangle & imageblendedcolorallocate source if you're
// not using Composer
if (
    file_exists('../source/imagegradientrectangle.php') &&
    file_exists('imageblendedcolorallocate/imageblendedcolorallocate.php')
) {
    include_once '../source/imagegradientrectangle.php';
    include_once 'imageblendedcolorallocate/imageblendedcolorallocate.php';
} else {
    die('Source files not found');
}

// set the parameters for our image
$width           = 600;
$height          = 300;
$offset          = round($width / 10);
$squareWidth     = $offset * 2;
$squareHeight    = $height - ($offset * 2);

// create our image
$im              = imagecreatetruecolor($width, $height);

// set our image's colors
$backgroundColor = imagecolorallocate($im, 0xEE, 0xEE, 0xEE);
$red             = imagecolorallocate($im, 0xFF, 0x00, 0x00);
$blue            = imagecolorallocate($im, 0x00, 0x00, 0xFF);

// fill our image with the background color
imagefill($im, 0, 0, $backgroundColor);

// fill our image with both colors and then a gradient from one to the other
imagefilledrectangle(
    $im,
    ($offset * 1) + ($squareWidth * 0),
    $offset,
    ($offset + $squareWidth) * 1,
    $offset + $squareHeight,
    $red
);
imagefilledrectangle(
    $im,
    ($offset * 2) + ($squareWidth * 1),
    $offset,
    ($offset + $squareWidth) * 2,
    $offset + $squareHeight,
    $blue
);
imagegradientrectangle(
    $im,
    ($offset * 3) + ($squareWidth * 2),
    $offset,
    ($offset + $squareWidth) * 3,
    $offset + $squareHeight,
    $red,
    $blue
);

// display our image and destroy the GD resource
header('Content-Type: image/png');
imagepng($im);
imagedestroy($im);
