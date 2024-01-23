<?php

namespace App\Dto;

use Illuminate\Support\Collection;

class ModuleDto
{
    private string $name;
    private string $clickout;
    private Collection $dimensions;
    private Collection $position;

    public function __construct(string $name, $clickout, Collection $position, Collection $dimensions)
    {
        $this->name = $name;
        $this->clickout = $clickout;
        $this->position = $position;
        $this->dimensions = $dimensions;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getClickout(): string
    {
        return $this->clickout;
    }

    public function getPosition(): Collection
    {
        return $this->position;
    }

    public function getDimensions(): Collection
    {
        return $this->dimensions;
    }

    public static function fromArray(array $data): self
    {
        return new self(

            $data['name'] ?? '',
            $data['clickout'] ?? '',
            collect($data['settings']['position'] ?? []),
            collect($data['settings']['dimensions'] ?? [])
        );
    }
}
