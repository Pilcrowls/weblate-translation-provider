<?php
/*
 * This file is part of the pushull-translation-provider package.
 *
 * (c) 2022 m2m server software gmbh <tech@m2m.at>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pushull\PushullTranslationProvider\Tests\Api\DTO;

use PHPUnit\Framework\TestCase;
use Pushull\PushullTranslationProvider\Api\DTO\Translation;

class TranslationTest extends TestCase
{
    public function testImport(): void
    {
        $data = DTOFaker::createTranslationData();

        $component = new Translation($data + ['ignored' => 'something']);
        foreach ($data as $key => $value) {
            $this->assertSame($value, $component->$key);
        }
    }

    public function testMissing(): void
    {
        if (class_exists('Spatie\DataTransferObject\FlexibleDataTransferObject')) {
            $this->expectError();
        } else {
            $this->assertTrue(true);
        }

        new Translation([]);
    }
}
