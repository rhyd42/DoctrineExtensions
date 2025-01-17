<?php

namespace DoctrineExtensions\Tests\Query\Mysql;

use DoctrineExtensions\Tests\Query\MysqlTestCase;

final class BinaryTest extends MysqlTestCase
{
    public function testBinary(): void
    {
        $this->assertDqlProducesSql(
            "SELECT BINARY('TEST') from DoctrineExtensions\Tests\Entities\Blank b",
            "SELECT BINARY('TEST') AS sclr_0 FROM Blank b0_"
        );
    }
}
