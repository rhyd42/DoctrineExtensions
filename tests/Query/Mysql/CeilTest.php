<?php

namespace DoctrineExtensions\Tests\Query\Mysql;

use DoctrineExtensions\Tests\Query\MysqlTestCase;

final class CeilTest extends MysqlTestCase
{
    public function testCeil(): void
    {
        $this->assertDqlProducesSql(
            "SELECT CEIL(2) from DoctrineExtensions\Tests\Entities\Blank b",
            'SELECT CEIL(2) AS sclr_0 FROM Blank b0_'
        );
    }
}
