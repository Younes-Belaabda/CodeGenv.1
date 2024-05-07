<?php

namespace App\Extend\Bentools;

// use function BenTools\CartesianProduct\cartesian_product;
use \Countable;
use \Traversable;
use \IteratorAggregate;
use App\Extend\Bentools\CartesianProduct;

/**
 * @property $min
 * @property $max
 * @property $charset
 * @property $glue
 */
final class StringCombinations implements IteratorAggregate, Countable
{
    /**
     * @var string[]
     */
    private array $charset;

    private int $min;

    private int $max;

    private ?int $count = null;

    private string $glue;

    private string $prefix;

    private string $suffix;


    public function __construct($charset, int $min = 1, ?int $max = null, string $glue = '' , string $prefix = '' , string $suffix = '')
    {
        if (is_string($charset) || is_int($charset)) {
            $this->charset = preg_split('/(?<!^)(?!$)/u', $charset);
            $this->validateCharset($this->charset);
        } elseif (is_array($charset)) {
            $this->charset = $charset;
            $this->validateCharset($this->charset);
        } else {
            $this->denyCharset();
        }
        $this->min = $min;
        $length = count($this->charset);
        $this->max = null === $max ? $length : min((int) $max, $this->charset);
        $this->glue = $glue;
        $this->prefix = $prefix;
        $this->suffix = $suffix;
    }

    private function cartesian_product(array $set)
    {
        return new CartesianProduct($set);
    }

    public function withoutDuplicates(): NoDuplicateLettersStringCombinations
    {
        return new NoDuplicateLettersStringCombinations($this);
    }

    public function count(): int
    {
        if (null === $this->count) {
            $this->count = array_sum(array_map(function ($set) {
                return count($this->cartesian_product($set));
            }, iterator_to_array($this->generateSets())));
        }
        return $this->count;
    }

    public function getIterator(): Traversable
    {
        foreach ($this->generateSets() as $set) {
            foreach ($this->cartesian_product($set) as $combination) {
                yield $this->prefix . implode($this->glue, $combination) . $this->suffix;
            }
        }
    }

    /**
     * Creates a random string from current charset
     * @return string
     */
    public function getRandomString(): string
    {
        $length = random_int($this->min, $this->max);
        $charset = $this->charset;
        for ($pos = 0, $str = []; $pos < $length; $pos++) {
            shuffle($charset);
            $str[] = $charset[0];
        }
        return implode($this->glue, $str);
    }

    public function asArray(): array
    {
        return iterator_to_array($this);
    }

    private function generateSets(): \Generator
    {
        for ($i = $this->min; $i <= $this->max; $i++) {
            $set = array_fill(0, $i, $this->charset);
            yield $set;
        }
    }

    private function validateCharset($charset): void
    {
        if (null === $charset) {
            $this->denyCharset();
        }
        foreach ($charset as $value) {
            if (!is_string($value) && !is_integer($value)) {
                $this->denyCharset();
            }
        }
    }

    /**
     * @throws \InvalidArgumentException
     */
    private function denyCharset()
    {
        throw new \InvalidArgumentException('Charset should be a string or an array of strings.');
    }

    /**
     * @inheritDoc
     */
    public function __get($name)
    {
        return $this->{$name};
    }
}
