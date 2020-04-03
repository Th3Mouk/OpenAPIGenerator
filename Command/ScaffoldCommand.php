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

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $base_path = getRootPath();
        mkdir($base_path . PathHelper::PATHS, 0777, true);
        mkdir($base_path . PathHelper::DEFINITIONS);
        echo 'scaffolded' . PHP_EOL;

        return 0;
    }
}
