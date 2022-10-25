<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class FirstWhereTest extends TestCase
{
    public function test_firstWhere(): void
    {
        $collection = collect([
            ['name' => 'John'],
            ['name' => 'Paul'],
        ]);

        $notFound = $collection->firstWhere('name', '=', 'Peter');

        $this->assertNull($notFound);

        $notFoundUsingWhen = $collection->when(
            true,
            fn ($collection) => $collection->firstWhere('name', '=', 'Peter')
        );

        $this->assertNull($notFoundUsingWhen);
    }
}

