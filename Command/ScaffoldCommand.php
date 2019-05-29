<?php

declare(strict_types=1);

namespace Th3Mouk\OpenAPIGenerator\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Th3Mouk\OpenAPIGenerator\PathHelper;

final class ScaffoldCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->setName('scaffold')
            ->setDescription('Scaffold all directories');
    }

    /**
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.TypeHintDeclaration.MissingReturnTypeHint
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $basePath = getRootPath();
        mkdir($basePath . PathHelper::PATHS, 0777, true);
        mkdir($basePath . PathHelper::DEFINITIONS);
        echo 'scaffolded' . PHP_EOL;
    }
}
