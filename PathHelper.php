<?php

declare(strict_types=1);

namespace Th3Mouk\OpenAPIGenerator;

class PathHelper
{
    public const ROOT             = '/specs';
    public const PATHS            = self::ROOT . '/paths';
    public const COMPONENTS       = self::ROOT . '/components';
    public const SCHEMAS          = self::COMPONENTS . '/schemas';
    public const RESPONSES        = self::COMPONENTS . '/responses';
    public const PARAMETERS       = self::COMPONENTS . '/parameters';
    public const EXAMPLES         = self::COMPONENTS . '/examples';
    public const REQUEST_BODIES   = self::COMPONENTS . '/requestBodies';
    public const HEADERS          = self::COMPONENTS . '/headers';
    public const SECURITY_SCHEMES = self::COMPONENTS . '/securitySchemes';
    public const LINKS            = self::COMPONENTS . '/links';
    public const CALLBACKS        = self::COMPONENTS . '/callbacks';
}
