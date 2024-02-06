<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Class_\CompleteDynamicPropertiesRector;
use Rector\CodeQuality\Rector\ClassMethod\InlineArrayReturnAssignRector;
use Rector\CodeQuality\Rector\FuncCall\SetTypeToCastRector;
use Rector\CodeQuality\Rector\LogicalAnd\LogicalToBooleanRector;
use Rector\CodeQuality\Rector\NotEqual\CommonNotEqualRector;
use Rector\Config\RectorConfig;
use Rector\Php55\Rector\String_\StringClassNameToClassConstantRector;
use Rector\Php70\Rector\StaticCall\StaticCallOnNonStaticToInstanceCallRector;
use Rector\Set\ValueObject\SetList;
use Rector\Transform\Rector\StaticCall\StaticCallToNewRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->parallel(86400, 2, 100);

    $rectorConfig->skip([
        InlineArrayReturnAssignRector::class,
        StringClassNameToClassConstantRector::class,
        StaticCallOnNonStaticToInstanceCallRector::class,
        StaticCallToNewRector::class,
        CommonNotEqualRector::class,
        SetTypeToCastRector::class,
        LogicalToBooleanRector::class,
        CompleteDynamicPropertiesRector::class,
    ]);

    // define sets of rules
    $rectorConfig->sets([
        SetList::CODE_QUALITY,
        SetList::CODING_STYLE,
        SetList::NAMING,
        SetList::TYPE_DECLARATION,
    ]);

    $rectorConfig->paths(
        [
            __DIR__ . '/src',
            __DIR__ . '/Tests',
        ]
    );
};
