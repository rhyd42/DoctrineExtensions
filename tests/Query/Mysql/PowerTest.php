<?php

namespace DoctrineExtensions\Tests\Query\Mysql;

use DoctrineExtensions\Tests\Query\MysqlTestCase;

final class PowerTest extends MysqlTestCase
{
    public function testPower(): void
    {
        $this->assertDqlProducesSql(
            "SELECT POWER(2, 3) from DoctrineExtensions\Tests\Entities\Blank b",
            'SELECT POWER(2, 3) AS sclr_0 FROM Blank b0_'
        );
    }
}
