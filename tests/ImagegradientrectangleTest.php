<?php

/**
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
 */

namespace AndrewGJohnson\AgjGd\Tests;

use PHPUnit\Framework\TestCase;

class ImagegradientrectangleTest extends TestCase
{
    public function testFunctionExists(): void
    {
        $this->assertTrue(function_exists('imagegradientrectangle'));
    }

    public function testDependenciesExist(): void
    {
        $this->assertTrue(function_exists('imageblendedcolorallocate'));
    }

    public function testVerticalGradientReturnsTrue(): void
    {
        $image = imagecreatetruecolor(100, 100);
        $red   = imagecolorallocate($image, 0xFF, 0x00, 0x00);
        $blue  = imagecolorallocate($image, 0x00, 0x00, 0xFF);

        $this->assertTrue(imagegradientrectangle($image, 10, 10, 90, 90, $red, $blue));
    }

    public function testHorizontalGradientReturnsTrue(): void
    {
        $image = imagecreatetruecolor(100, 100);
        $red   = imagecolorallocate($image, 0xFF, 0x00, 0x00);
        $blue  = imagecolorallocate($image, 0x00, 0x00, 0xFF);

        $this->assertTrue(imagegradientrectangle($image, 10, 10, 90, 90, $red, $blue, true));
    }

    public function testZeroHeightVerticalGradientReturnsFalse(): void
    {
        $image = imagecreatetruecolor(100, 100);
        $red   = imagecolorallocate($image, 0xFF, 0x00, 0x00);
        $blue  = imagecolorallocate($image, 0x00, 0x00, 0xFF);

        $this->assertFalse(imagegradientrectangle($image, 10, 50, 90, 50, $red, $blue));
    }

    public function testZeroWidthHorizontalGradientReturnsFalse(): void
    {
        $image = imagecreatetruecolor(100, 100);
        $red   = imagecolorallocate($image, 0xFF, 0x00, 0x00);
        $blue  = imagecolorallocate($image, 0x00, 0x00, 0xFF);

        $this->assertFalse(imagegradientrectangle($image, 50, 10, 50, 90, $red, $blue, true));
    }

    public function testSolidFillReturnsTrue(): void
    {
        $image = imagecreatetruecolor(100, 100);
        $red   = imagecolorallocate($image, 0xFF, 0x00, 0x00);

        $this->assertTrue(imagegradientrectangle($image, 10, 10, 90, 90, $red));
    }
}
