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

        if (!file_exists($base_path . PathHelper::PATHS)) {
            mkdir($base_path . PathHelper::PATHS);
        }

        if (!file_exists($base_path . PathHelper::COMPONENTS)) {
            mkdir($base_path . PathHelper::COMPONENTS);
        }

        if (!file_exists($base_path . PathHelper::SCHEMAS)) {
            mkdir($base_path . PathHelper::SCHEMAS);
        }

        if (!file_exists($base_path . PathHelper::RESPONSES)) {
            mkdir($base_path . PathHelper::RESPONSES);
        }

        if (!file_exists($base_path . PathHelper::PARAMETERS)) {
            mkdir($base_path . PathHelper::PARAMETERS);
        }

        if (!file_exists($base_path . PathHelper::EXAMPLES)) {
            mkdir($base_path . PathHelper::EXAMPLES);
        }

        if (!file_exists($base_path . PathHelper::REQUEST_BODIES)) {
            mkdir($base_path . PathHelper::REQUEST_BODIES);
        }

        if (!file_exists($base_path . PathHelper::HEADERS)) {
            mkdir($base_path . PathHelper::HEADERS);
        }

        if (!file_exists($base_path . PathHelper::SECURITY_SCHEMES)) {
            mkdir($base_path . PathHelper::SECURITY_SCHEMES);
        }

        if (!file_exists($base_path . PathHelper::LINKS)) {
            mkdir($base_path . PathHelper::LINKS);
        }

        if (!file_exists($base_path . PathHelper::CALLBACKS)) {
            mkdir($base_path . PathHelper::CALLBACKS);
        }

        echo 'scaffolded' . PHP_EOL;

        return 0;
    }
}
