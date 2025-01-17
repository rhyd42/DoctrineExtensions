<?php

namespace DoctrineExtensions\Tests\Query\Mysql;

use DoctrineExtensions\Tests\Query\MysqlTestCase;

final class UuidShortTest extends MysqlTestCase
{
    public function testUuidShort(): void
    {
        $this->assertDqlProducesSql(
            "SELECT UUID_SHORT() from DoctrineExtensions\Tests\Entities\Blank b",
            'SELECT UUID_SHORT() AS sclr_0 FROM Blank b0_'
        );
    }
}
