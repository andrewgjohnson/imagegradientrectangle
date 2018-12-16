<?php

/**
 * Imagegradientrectangle v1.0.1
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

if (!function_exists('imagegradientrectangle')) {
    /**
     * Imagegradientrectangle is a function that will draw a gradient filled
     * rectangle on your PHP GD images.
     *
     * @param resource $image         <p>An image resource, returned by one of the
     *    image creation functions, such as imagecreatetruecolor().</p>
     * @param int      $x1            <p>x-coordinate for point 1.</p>
     * @param int      $y1            <p>y-coordinate for point 1.</p>
     * @param int      $x2            <p>x-coordinate for point 2.</p>
     * @param int      $y2            <p>y-coordinate for point 2.</p>
     * @param int      $color         <p>The start color. A color identifier created
     *    with imagecolorallocate().</p>
     * @param int      $gradientColor <p>The finish color. A color identifier
     *    created with imagecolorallocate().</p>
     *
     * @throws Exception if imageblendedcolorallocate is needed but doesn't exist
     *
     * @return mixed Returns TRUE on success or FALSE on failure.
     */
    function imagegradientrectangle(
        &$image,
        $x1,
        $y1,
        $x2,
        $y2,
        $color,
        $gradientColor = null
    ) {
        if (!is_null($gradientColor) && is_int($gradientColor)) {
            $top = min($y1, $y2);

            $height = max($y1, $y2) - $top;
            if ($height > 0) {
                if (!function_exists('imageblendedcolorallocate')) {
                    throw new Exception('imageblendedcolorallocate doesn\'t exist');
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
                return false;
            }
        } else {
            return imagefilledrectangle($image, $x1, $y1, $x2, $y2, $color);
        }
    }
}
