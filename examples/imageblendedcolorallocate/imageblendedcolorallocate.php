<?php

/**
 * Imageblendedcolorallocate v1.0.2
 *
 * Copyright (c) 2018-2022 Andrew G. Johnson <andrew@andrewgjohnson.com>
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
 * @package   Imageblendedcolorallocate
 * @author    Andrew G. Johnson <andrew@andrewgjohnson.com>
 * @copyright 2018-2022 Andrew G. Johnson <andrew@andrewgjohnson.com>
 * @license   https://opensource.org/licenses/mit/ The MIT License
 * @link      https://github.com/andrewgjohnson/imageblendedcolorallocate
 */

if (!function_exists('imageblendedcolorallocate')) {
    /**
     * Imageblendedcolorallocate is a function that will allocate a new blended
     * color based on two existing allocated colors for your PHP GD images.
     *
     * @param resource $image         <p>An image resource, returned by one of the
     *    image creation functions, such as imagecreatetruecolor().</p>
     * @param int      $color1        <p>A color identifier created with
     *    imagecolorallocate().</p>
     * @param int      $color2        <p>A color identifier created with
     *    imagecolorallocate().</p>
     * @param double   $opacityColor1 <p>A value between 0 and 1. 1 indicates
     *    completely opaque while 0 indicates completely transparent.</p>
     *
     * @return mixed Returns a color identifier or FALSE if the allocation failed.
     */
    function imageblendedcolorallocate(
        $image,
        $color1,
        $color2,
        $opacityColor1 = 0.5
    ) {
        if ($opacityColor1 >= 0 && $opacityColor1 <= 1) {
            $opacityColor2 = 1 - $opacityColor1;
        } else {
            $opacityColor1 = $opacityColor2 = 0.5;
        }

        $redColor1 = ($color1 >> 16) & 0xFF;
        $redColor2 = ($color2 >> 16) & 0xFF;
        $red = $redColor1 * $opacityColor1;
        $red += $redColor2 * $opacityColor2;
        $red = round($red);

        $greenColor1 = ($color1 >> 8) & 0xFF;
        $greenColor2 = ($color2 >> 8) & 0xFF;
        $green = $greenColor1 * $opacityColor1;
        $green += $greenColor2 * $opacityColor2;
        $green = round($green);

        $blueColor1 = $color1 & 0xFF;
        $blueColor2 = $color2 & 0xFF;
        $blue = $blueColor1 * $opacityColor1;
        $blue += $blueColor2 * $opacityColor2;
        $blue = round($blue);

        $alphaColor1 = imagecolorsforindex($image, $color1)['alpha'];
        $alphaColor2 = imagecolorsforindex($image, $color2)['alpha'];
        $alpha = $alphaColor1 * $opacityColor1;
        $alpha += $alphaColor2 * $opacityColor2;
        $alpha = round($alpha);

        if ($alpha > 0) {
            return imagecolorallocatealpha($image, $red, $green, $blue, $alpha);
        } else {
            return imagecolorallocate($image, $red, $green, $blue);
        }
    }
}
