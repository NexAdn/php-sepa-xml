<?php

/**
 * SEPA file generator.
 *
 * @copyright © Digitick <www.digitick.net> 2012-2013
 * @copyright © Blage <www.blage.net> 2013
 * @license GNU Lesser General Public License v3.0
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Lesser Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

namespace Digitick\Sepa\Tests\Currency;

use Digitick\Sepa\Currency\EuroCent;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class EuroCentTest extends TestCase
{
    /**
     * @dataProvider amounts
     */
    public function testToCentsReturnsCents(int $intEuros, int $intCents): void
    {
        $eurocent = new EuroCent($intEuros, $intCents);
        $this->assertEquals($intEuros * 100 + $intCents, $eurocent->toCents());
    }

    protected function amounts(): iterable
    {
        return array(
            [20, 00],
            [00, 20],
            [4, 00],
            [57, 46],
            [728, 21],
            [347272, 13],
        );
    }
}
