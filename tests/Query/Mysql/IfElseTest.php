<?php

namespace DoctrineExtensions\Tests\Query\Mysql;

use DoctrineExtensions\Tests\Query\MysqlTestCase;

final class IfElseTest extends MysqlTestCase
{
    public function testIfElseWithoutNullValue(): void
    {
        $this->assertDqlProducesSql(
            "SELECT IFELSE(2 < 3, 4, 5) from DoctrineExtensions\Tests\Entities\Blank b",
            'SELECT IF(2 < 3, 4, 5) AS sclr_0 FROM Blank b0_'
        );
    }

    public function testIfElseWithNullValue(): void
    {
        $this->assertDqlProducesSql(
            "SELECT IFELSE(2 < 3, NULL, 5) from DoctrineExtensions\Tests\Entities\Blank b",
            'SELECT IF(2 < 3, NULL, 5) AS sclr_0 FROM Blank b0_'
        );
    }
}
