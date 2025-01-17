<?php

namespace DoctrineExtensions\Tests\Query\Mysql;

use DoctrineExtensions\Tests\Query\MysqlTestCase;

final class GreatestTest extends MysqlTestCase
{
    public function testGreatest(): void
    {
        $this->assertDqlProducesSql(
            "SELECT GREATEST(2, 5, 8) from DoctrineExtensions\Tests\Entities\Blank b",
            'SELECT GREATEST(2, 5, 8) AS sclr_0 FROM Blank b0_'
        );
    }
}
