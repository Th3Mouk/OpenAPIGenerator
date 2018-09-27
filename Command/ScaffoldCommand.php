<?php

namespace Th3Mouk\OpenAPIGenerator\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Th3Mouk\OpenAPIGenerator\PathHelper;

final class ScaffoldCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('scaffold')
            ->setDescription('Scaffold all directories')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $basePath = getRootPath();
        mkdir($basePath.PathHelper::PATHS, 0777, true);
        mkdir($basePath.PathHelper::DEFINITIONS);
        echo 'scaffolded'.PHP_EOL;
    }
}
