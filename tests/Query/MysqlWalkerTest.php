<?php

namespace DoctrineExtensions\Tests\Query;

use Doctrine\ORM\Query;
use DoctrineExtensions\Query\MysqlWalker;

final class MysqlWalkerTest extends MysqlTestCase
{
    public function testSelectSQLCalcFoundRows(): void
    {
        $dql = "SELECT p FROM DoctrineExtensions\Tests\Entities\Date p";
        $q = $this->entityManager->createQuery($dql);
        $q->setHint(Query::HINT_CUSTOM_OUTPUT_WALKER, MysqlWalker::class);
        $q->setHint('mysqlWalker.sqlCalcFoundRows', true);
        $sql = 'SELECT SQL_CALC_FOUND_ROWS d0_.id AS id_0, d0_.created AS created_1 FROM Date d0_';

        $this->assertEquals($sql, $q->getSql());
    }

    public function testSelectSQLNoCache(): void
    {
        $dql = "SELECT p FROM DoctrineExtensions\Tests\Entities\Date p";
        $q = $this->entityManager->createQuery($dql);
        $q->setHint(Query::HINT_CUSTOM_OUTPUT_WALKER, MysqlWalker::class);
        $q->setHint('mysqlWalker.sqlNoCache', true);
        $sql = 'SELECT SQL_NO_CACHE d0_.id AS id_0, d0_.created AS created_1 FROM Date d0_';

        $this->assertEquals($sql, $q->getSql());
    }

    public function testGroupByWithRollup(): void
    {
        $dql = "SELECT p FROM DoctrineExtensions\Tests\Entities\Date p GROUP BY p.id";
        $q = $this->entityManager->createQuery($dql);
        $q->setHint(Query::HINT_CUSTOM_OUTPUT_WALKER, MysqlWalker::class);
        $q->setHint('mysqlWalker.withRollup', true);
        $sql = 'SELECT d0_.id AS id_0, d0_.created AS created_1 FROM Date d0_ GROUP BY d0_.id WITH ROLLUP';

        $this->assertEquals($sql, $q->getSql());
    }
}
