<?php
/*
 * This file is part of the pushull-translation-provider package.
 *
 * (c) 2022 m2m server software gmbh <tech@m2m.at>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pushull\PushullTranslationProvider\Tests\DependencyInjection;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Translation\Provider\TranslationProviderCollection;

class CollectionProviderTest extends TestCase
{
    public function testServiceWiring(): void
    {
        $kernel = new TestKernel();
        $kernel->boot();
        $container = $kernel->getContainer();

        /** @var TranslationProviderCollection $providers */
        $providers = $container->get('translation.provider_collection');
        $this->assertTrue($providers->has('pushull'));

        $this->assertSame('pushull://server', $providers->get('pushull')->__toString());
    }
}
