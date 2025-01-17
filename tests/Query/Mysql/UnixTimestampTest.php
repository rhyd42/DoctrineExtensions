<?php

namespace DoctrineExtensions\Tests\Query\Mysql;

use DoctrineExtensions\Tests\Query\MysqlTestCase;

final class UnixTimestampTest extends MysqlTestCase
{
    public function testUnixTimeStampNoArguments(): void
    {
        $this->assertDqlProducesSql(
            "SELECT UNIX_TIMESTAMP() from DoctrineExtensions\Tests\Entities\Blank b",
            'SELECT UNIX_TIMESTAMP() AS sclr_0 FROM Blank b0_'
        );
    }

    public function testUnixTimeStampOneArgument(): void
    {
        $this->assertDqlProducesSql(
            "SELECT UNIX_TIMESTAMP(2) from DoctrineExtensions\Tests\Entities\Blank b",
            'SELECT UNIX_TIMESTAMP(2) AS sclr_0 FROM Blank b0_'
        );
    }
}
