<?php

namespace Th3Mouk\OpenAPIGenerator\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Yaml\Yaml;
use Th3Mouk\OpenAPIGenerator\PathHelper;

final class GenerateCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('generate')
            ->setDescription('Generate the openapi.json')
            ->addArgument('path', InputArgument::OPTIONAL, 'The path where generate the openapi.json file', '')
            ->addOption('pretty-json', 'p', InputOption::VALUE_NONE,'Generate json file in pretty format')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->generateJson($input);
        echo 'generated'.PHP_EOL;
    }

    private function generateJson(InputInterface $input)
    {
        $templateFile = (new Finder())
            ->in(getRootPath().PathHelper::ROOT)
            ->files()
            ->name('openapi.yaml')
        ;

        if (empty($templateFile)) {
            echo 'no openapi.yaml file found'.PHP_EOL;
            return;
        }

        foreach ($templateFile as $current) {
            $template = $current;
            break;
        }

        $template = Yaml::parse($template->getContents());
        $definitions = $template['definitions'] ?? [];
        $paths = $template['paths'] ?? [];

        foreach ($this->getContentGenerator(PathHelper::DEFINITIONS) as $definition) {
            $definitions[] = $definition;
        }

        foreach ($this->getContentGenerator(PathHelper::PATHS) as $path) {
            $paths[key($path)] = $path[key($path)];
        }

        $template['definitions'] = (object) $definitions;
        $template['paths'] = (object) $paths;

        $argPath = $input->getArgument('path');
        $path = '/' !== substr($argPath, 0, 1) ? '/'.$argPath : $argPath ;

        $openapiFilePath = getRootPath().$path.'/openapi.json';
        if (!$file = fopen($openapiFilePath, 'w')) {
            echo 'error generating openapi.json file'.PHP_EOL;
            return;
        }

        if ($input->getOption('pretty-json')) {
            fwrite($file, json_encode($template, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
        } else {
            fwrite($file, json_encode($template, JSON_UNESCAPED_SLASHES));
        }

        fclose($file);
    }

    private function getContentGenerator($path): \Generator
    {
        foreach ((new Finder())->files()->in(getRootPath().$path)->name('*.yaml') as $file) {
            yield Yaml::parse($file->getContents());
        }
    }
}
