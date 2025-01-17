<?php

namespace DoctrineExtensions\Query\Sqlite;

use Doctrine\ORM\Query\Parser;
use Doctrine\ORM\Query\TokenType;

/**
 * @author Aleksandr Klimenkov <alx.devel@gmail.com>
 */
class Week extends NumberFromStrfTime
{
    /**
     * Currently not in use
     * @var int
     */
    public $mode;

    public function parse(Parser $parser): void
    {
        $parser->match(TokenType::T_IDENTIFIER);
        $parser->match(TokenType::T_OPEN_PARENTHESIS);

        $this->date = $parser->ArithmeticPrimary();

        if (TokenType::T_COMMA === $parser->getLexer()->lookahead->type) {
            $parser->match(TokenType::T_COMMA);
            $this->mode = $parser->Literal();
        }

        $parser->match(TokenType::T_CLOSE_PARENTHESIS);
    }

    protected function getFormat(): string
    {
        return '%W';
    }
}
