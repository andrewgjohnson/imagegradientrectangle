<?php

/**
 * Imageblendedcolorallocate v1.1.2
 *
 * Copyright (c) 2018-2026 Andrew G. Johnson <andrew@andrewgjohnson.com>
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated
 * documentation files (the "Software"), to deal in the Software without restriction, including without limitation the
 * rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to the following conditions:
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the
 * Software.
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE
 * WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR
 * OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 * PHP version 5
 *
 * @category  Andrewgjohnson
 * @package   Imageblendedcolorallocate
 * @author    Andrew G. Johnson <andrew@andrewgjohnson.com>
 * @copyright 2018-2026 Andrew G. Johnson <andrew@andrewgjohnson.com>
 * @license   https://opensource.org/licenses/mit/ The MIT License
 * @link      https://github.com/andrewgjohnson/imageblendedcolorallocate
 */

if (!function_exists('imageblendedcolorallocate')) {
    /**
     * Imageblendedcolorallocate is a function that will allocate a new blended color based on two existing allocated
     * colors for your PHP GD images.
     *
     * Examples:
     * ```
     * <?php
     * // Allocate red and yellow using the standard method then blend the two to allocate orange
     * $red    = imagecolorallocate($im, 0xFF, 0x00, 0x00);
     * $yellow = imagecolorallocate($im, 0xFF, 0xFF, 0x00);
     * $orange = imageblendedcolorallocate($im, $red, $yellow);
     *
     * // You can also allocate RGBA colors as well as RGB
     * $opaqueBlack      = imagecolorallocatealpha($im, 0x00, 0x00, 0x00, 0);
     * $translucentBlack = imagecolorallocatealpha($im, 0x00, 0x00, 0x00, 63);
     * $blendedBlack     = imageblendedcolorallocate($im, $opaqueBlack, $translucentBlack);
     *
     * // By default, we allocate with a 50/50 blend where we average the red, blue, green and alpha values for each
     * // color but also support alternative blends
     * $blue              = imagecolorallocate($im, 0x00, 0x00, 0xFF);
     * $cyan              = imagecolorallocate($im, 0x00, 0xFF, 0xFF);
     * $blendedMostlyCyan = imageblendedcolorallocate($im, $blue, $cyan, 0.25); // 25% blue, 75% cyan
     * $blendedEvenly     = imageblendedcolorallocate($im, $blue, $cyan); // 50% blue, 50% cyan
     * $blendedMostlyBlue = imageblendedcolorallocate($im, $blue, $cyan, 0.75); // 75% blue, 25% cyan
     * ?>
     * ```
     *
     * @param \GdImage|resource $image         A GdImage object (PHP 8 and newer) or an image resource (older versions
     * of PHP), returned by one of the image creation functions, such as imagecreatetruecolor().
     * @param int               $color1        A color identifier created with imagecolorallocate().
     * @param int               $color2        A color identifier created with imagecolorallocate().
     * @param float             $opacityColor1 The blend ratio for color1, between 0 and 1. At 1 the result is entirely
     * color1; at 0 it is entirely color2; 0.5 (the default) produces an even blend.
     *
     * @return mixed Returns a color identifier or FALSE if the allocation failed.
     */
    function imageblendedcolorallocate(
        $image,
        $color1,
        $color2,
        $opacityColor1 = 0.5
    ) {
        // Return false if either color identifier is invalid.
        if ($color1 === false || $color2 === false) {
            return false;
        }

        // Calculate $opacityColor2 based on $opacityColor1.
        if ($opacityColor1 >= 0 && $opacityColor1 <= 1) {
            $opacityColor2 = 1 - $opacityColor1;
        } else {
            $opacityColor1 = 0.5;
            $opacityColor2 = 0.5;
        }

        // Extract RGBA components via imagecolorsforindex() to support both true color and palette images.
        $componentsColor1 = imagecolorsforindex($image, $color1);
        $componentsColor2 = imagecolorsforindex($image, $color2);

        // Calculate $red for the color identifier.
        $red = (int)round(($componentsColor1['red'] * $opacityColor1) + ($componentsColor2['red'] * $opacityColor2));

        // Calculate $green for the color identifier.
        $green = (int)round(
            ($componentsColor1['green'] * $opacityColor1) + ($componentsColor2['green'] * $opacityColor2)
        );

        // Calculate $blue for the color identifier.
        $blue = (int)round(($componentsColor1['blue'] * $opacityColor1) + ($componentsColor2['blue'] * $opacityColor2));

        // Calculate $alpha for the color identifier.
        $alpha = (int)round(
            ($componentsColor1['alpha'] * $opacityColor1) + ($componentsColor2['alpha'] * $opacityColor2)
        );

        // If $alpha is greater than zero return an RGBA color identifier otherwise return an RGB color identifier.
        if ($alpha > 0) {
            return imagecolorallocatealpha($image, $red, $green, $blue, $alpha);
        } else {
            return imagecolorallocate($image, $red, $green, $blue);
        }
    }
}
