<?php

/**
 * Imagegradientrectangle v1.1.1
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
 * @package   Imagegradientrectangle
 * @author    Andrew G. Johnson <andrew@andrewgjohnson.com>
 * @copyright 2018-2026 Andrew G. Johnson <andrew@andrewgjohnson.com>
 * @license   https://opensource.org/licenses/mit/ The MIT License
 * @link      https://github.com/andrewgjohnson/imagegradientrectangle
 */

if (!function_exists('imagegradientrectangle')) {
    /**
     * Imagegradientrectangle is a function that will draw a gradient filled
     * rectangle on your PHP GD images.
     *
     * Examples:
     * ```
     * <?php
     * $red  = imagecolorallocate($im, 0xFF, 0x00, 0x00);
     * $blue = imagecolorallocate($im, 0x00, 0x00, 0xFF);
     *
     * // Standard method to draw solid filled rectangles
     * imagefilledrectangle($im, 10, 10, 100, 100, $red);
     * imagefilledrectangle($im, 10, 10, 100, 100, $blue);
     *
     * // This will draw a red-to-blue gradient filled rectangle (vertical gradient)
     * imagegradientrectangle($im, 10, 10, 100, 100, $red, $blue);
     *
     * // This will draw a red-to-blue gradient filled rectangle (horizontal gradient)
     * imagegradientrectangle($im, 10, 10, 100, 100, $red, $blue, true);
     * ?>
     * ```
     *
     * @param \GdImage|resource $image              A GdImage object (PHP 8 and newer) or an image resource (older
     * versions of PHP), returned by one of the image creation functions, such as imagecreatetruecolor().
     * @param int               $x1                 x-coordinate for point 1.
     * @param int               $y1                 y-coordinate for point 1.
     * @param int               $x2                 x-coordinate for point 2.
     * @param int               $y2                 y-coordinate for point 2.
     * @param int               $color              The start color. A color identifier created with
     * imagecolorallocate().
     * @param ?int              $gradientColor      The finish color. A color identifier created with
     * imagecolorallocate().
     * @param bool              $horizontalGradient Whether or not to use a horizontal gradient versus a vertical
     * gradient.
     *
     * @throws Exception If imageblendedcolorallocate is needed but isn’t found.
     *
     * @return bool Returns TRUE on success or FALSE on failure.
     */
    function imagegradientrectangle(
        $image,
        $x1,
        $y1,
        $x2,
        $y2,
        $color,
        $gradientColor = null,
        $horizontalGradient = false
    ) {
        if (!is_null($gradientColor) && is_int($gradientColor)) {
            if (!function_exists('imageblendedcolorallocate')) {
                throw new Exception('imageblendedcolorallocate() not found');
            }

            if ($horizontalGradient) {
                $left  = min($x1, $x2);
                $width = max($x1, $x2) - $left;

                if ($width <= 0) {
                    return false;
                }

                for ($i = 0; $i < $width; $i++) {
                    $iColor = imageblendedcolorallocate(
                        $image,
                        $color,
                        $gradientColor,
                        1 - ($i / $width)
                    );

                    imagefilledrectangle(
                        $image,
                        $left + $i,
                        $y1,
                        $left + $i,
                        $y2,
                        $iColor
                    );
                }

                return true;
            }

            $top    = min($y1, $y2);
            $height = max($y1, $y2) - $top;

            if ($height <= 0) {
                return false;
            }

            for ($i = 0; $i < $height; $i++) {
                $iColor = imageblendedcolorallocate(
                    $image,
                    $color,
                    $gradientColor,
                    1 - ($i / $height)
                );

                imagefilledrectangle(
                    $image,
                    $x1,
                    $top + $i,
                    $x2,
                    $top + $i,
                    $iColor
                );
            }

            return true;
        } else {
            return imagefilledrectangle($image, $x1, $y1, $x2, $y2, $color);
        }
    }
}
