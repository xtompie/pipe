<?php
namespace Xtompie\Pipe;

class Pipe
{
    protected mixed $value;

    public function __construct(mixed $value)
    {
        $this->value = $value;
    }

    public static function new(mixed $value): static
    {
        return new static($value);
    }

    public static function of(mixed $value): static
    {
        return new static($value);
    }

    public function addslashes(): ?static
    {
        if (is_string($this->value)) {
            return new static(addslashes($this->value));
        }
        return null;
    }

    public function explode(string $delimiter): ?static
    {
        if (is_string($this->value)) {
            return new static(explode($delimiter, $this->value));
        }
        return null;
    }

    public function get(): mixed
    {
        return $this->value;
    }

    public function htmlspecialchars(): ?static
    {
        if (is_string($this->value)) {
            return new static(htmlspecialchars($this->value));
        }
        return null;
    }

    public function implode(string $glue = ''): ?static
    {
        if (is_array($this->value)) {
            return new static(implode($glue, $this->value));
        }
        return null;
    }

    public function lower(): ?static
    {
        if (is_string($this->value)) {
            return new static(strtolower($this->value));
        }
        return null;
    }

    public function map(callable $callback): ?static
    {
        $result = $callback($this->value);
        return $result !== null ? new static($result) : null;
    }

    public function md5(): ?static
    {
        if (is_string($this->value)) {
            return new static(md5($this->value));
        }
        return null;
    }

    public function nl2br(): ?static
    {
        if (is_string($this->value)) {
            return new static(nl2br($this->value));
        }
        return null;
    }

    /**
     * @template T of object
     * @param class-string<T> $type
     * @return T
     */
    public function object(string $type): object
    {
        return new $type($this->value);
    }

    public function replace(string $search, string $replace): ?static
    {
        if (is_string($this->value)) {
            return new static(str_replace($search, $replace, $this->value));
        }
        return null;
    }

    public function reverse(): ?static
    {
        if (is_string($this->value)) {
            return new static(strrev($this->value));
        }
        return null;
    }

    public function sha1(): ?static
    {
        if (is_string($this->value)) {
            return new static(sha1($this->value));
        }
        return null;
    }

    public function length(): ?static
    {
        if (is_string($this->value)) {
            return new static(strlen($this->value));
        }
        return null;
    }

    public function slice(int $offset, int $length = null): ?static
    {
        if (is_array($this->value)) {
            return new static(array_slice($this->value, $offset, $length));
        }
        return null;
    }

    public function strpos(string $needle): ?static
    {
        if (is_string($this->value)) {
            $pos = strpos($this->value, $needle);
            if ($pos !== false) {
                return new static($pos);
            }
            return null;
        }
        return null;
    }

    public function stripTags(): ?static
    {
        if (is_string($this->value)) {
            return new static(strip_tags($this->value));
        }
        return null;
    }

    public function substr(int $start, int $length = null): ?static
    {
        if (is_string($this->value)) {
            return new static(substr($this->value, $start, $length));
        }
        return null;
    }

    public function trim(): ?static
    {
        if (is_string($this->value)) {
            return new static(trim($this->value));
        }
        return null;
    }

    public function ucfirst(): ?static
    {
        if (is_string($this->value)) {
            return new static(ucfirst($this->value));
        }
        return null;
    }

    public function ucwords(): ?static
    {
        if (is_string($this->value)) {
            return new static(ucwords($this->value));
        }
        return null;
    }

    public function upper(): ?static
    {
        if (is_string($this->value)) {
            return new static(strtoupper($this->value));
        }
        return null;
    }
}