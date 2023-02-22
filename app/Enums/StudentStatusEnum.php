<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class StudentStatusEnum extends Enum
{
    public const HOC = 0;
    public const NGHI_HOC = 1;
    public const TAM_HOANG = 2;

    public static function getStudentStatus()
    {
        return [
            "Đang đi học" => self::HOC,
            "Đã nghĩ học" => self::NGHI_HOC,
            "Tạm hoảng" => self::TAM_HOANG
        ];
    }

    public static function getNameStatus($value)
    {
        return array_search($value, self::getStudentStatus());
    }

    public static function getValueByKey($key)
    {
        return self::getStudentStatus()[$key];
    }
}
