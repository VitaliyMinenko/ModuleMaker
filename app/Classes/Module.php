<?php

namespace App\Classes;

use App\Dto\ModuleDTO;
use ZipArchive;

class Module
{
    /**
     * @param ModuleDTO $module
     *
     * @return string
     */
    public function generate(ModuleDTO $module): string
    {
        $placeholders = $this->replacePlaceholders($module);
        $this->prepareFiles($placeholders);
        $zipFileName = $this->makeZipArchiwe();
        $this->removeDirectory();
        return $zipFileName;
    }

    /**
     * @param array $placeholders
     *
     * @return void
     */
    public function prepareFiles(array $placeholders): void
    {
        $templatePath = config('myconfig.template_path');
        $tempDir = storage_path(config('myconfig.temporary_dir'));
        if (!file_exists($tempDir)) {
            mkdir($tempDir);
        }

        $templateHtml = file_get_contents(resource_path($templatePath . '/template.html'));
        $styleCss = file_get_contents(resource_path($templatePath . '/style.css'));
        $scriptJs = file_get_contents(resource_path($templatePath . '/script.js'));

        $templateHtml = str_replace(array_keys($placeholders), array_values($placeholders), $templateHtml);
        $styleCss = str_replace(array_keys($placeholders), array_values($placeholders), $styleCss);

        file_put_contents($tempDir . '/template.html', $templateHtml);
        file_put_contents($tempDir . '/style.css', $styleCss);
        file_put_contents($tempDir . '/script.js', $scriptJs);
    }

    /**
     * @param ModuleDTO $module
     *
     * @return array
     */
    private function replacePlaceholders(ModuleDTO $module): array
    {
        return [
            '%NAME%'                => $module->getName(),
            '%CLICKOUT%'            => $module->getClickout(),
            '/*SECTION_WIDTH*/'     => $module->getDimensions()->get('width'),
            '/*SECTION_HEIGHT*/'    => $module->getDimensions()->get('height'),
            '/*SECTION_TOP*/'       => $module->getPosition()->get('x'),
            '/*SECTION_LEFT*/'      => $module->getPosition()->get('y'),
        ];
    }

    /**
     * @return string
     */
    private function makeZipArchiwe()
    {
        $tempDir = storage_path(config('myconfig.temporary_dir'));
        $zip = new ZipArchive();
        $zipFileName = storage_path('app/template_files.zip');

        if ($zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            $zip->addFile($tempDir . '/template.html', 'template.html');
            $zip->addFile($tempDir . '/style.css', 'style.css');
            $zip->addFile($tempDir . '/script.js', 'script.js');
            $zip->close();
        }
        return $zipFileName;
    }

    /**
     * @return void
     */
    private function removeDirectory(): void
    {
        $dir = storage_path(config('myconfig.temporary_dir'));
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (is_dir($dir . "/" . $object)) {
                        $this->removeDirectory($dir . "/" . $object);
                    } else {
                        unlink($dir . "/" . $object);
                    }
                }
            }
            rmdir($dir);
        }
    }
}