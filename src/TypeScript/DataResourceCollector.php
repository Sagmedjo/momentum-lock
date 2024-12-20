<?php

declare(strict_types=1);

namespace Momentum\Lock\TypeScript;

use Momentum\Lock\Data\DataResource;
use ReflectionClass;
use Spatie\TypeScriptTransformer\Collectors\Collector;
use Spatie\TypeScriptTransformer\Structures\TransformedType;
use Spatie\TypeScriptTransformer\TypeReflectors\ClassTypeReflector;

class DataResourceCollector extends Collector
{
    public function getTransformedType(ReflectionClass $class): ?TransformedType
    {
        if (! $class->isSubclassOf(DataResource::class)) {
            return null;
        }

        $transformer = new DataResourceTransformer($this->config);

        $reflector = ClassTypeReflector::create($class);
        return $transformer->transform($reflector->getReflectionClass(), $reflector->getName());
    }
}
