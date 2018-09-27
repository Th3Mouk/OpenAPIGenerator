<?php

namespace Th3Mouk\OpenAPIGenerator\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
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
            ->setDescription('Generate the swagger.json')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->generateJson();
        echo 'generated'.PHP_EOL;
    }

    private function generateJson()
    {
        $templateFile = (new Finder())
            ->in(getRootPath().PathHelper::ROOT)
            ->files()
            ->name('swagger.yaml')
        ;

        if (empty($templateFile)) {
            echo 'no swagger.yaml file found'.PHP_EOL;
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

        if (!$file = fopen(getRootPath().PathHelper::ROOT.'/swagger.json', 'w')) {
            echo 'error generating json file'.PHP_EOL;
            return;
        }

        fwrite($file, json_encode($template, JSON_UNESCAPED_SLASHES));
        fclose($file);
    }

    private function getContentGenerator($path): \Generator
    {
        foreach ((new Finder())->files()->in(getRootPath().$path)->name('*.yaml') as $file) {
            yield Yaml::parse($file->getContents());
        }
    }
}
