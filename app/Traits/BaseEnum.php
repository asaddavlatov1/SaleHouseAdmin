<?php

namespace App\Traits;

trait BaseEnum
{
    public static function toArray(): array
    {
        $arr = [];
        foreach (static::cases() as $case) {
            $arr[] = $case->value;
        }

        return $arr;
    }

    //to array with expect values
    public static function toArrayExcept(array $except = []): array
    {
        $arr = [];
        foreach (static::cases() as $case) {
            if (!in_array($case->value, $except)) {
                $arr[] = $case->value;
            }
        }

        return $arr;
    }

    public static function toString(): string
    {
        return implode(',', self::toArray());
    }

    //keys
    public static function names(): array
    {
        $arr = [];
        foreach (static::cases() as $case) {
            $arr[] = $case->name;
        }

        return $arr;
    }

    public static function keys(): array
    {
        return static::names();
    }

    protected static function getTranslate(string $translationKey): string
    {
        return __("enums." . class_basename(static::class) . '.' . $translationKey);
    }

    public function translate(): string
    {
        return self::getTranslate($this->value);
    }

    public function lang(): string
    {
        return self::getTranslate($this->value);
    }
}
