<?php

namespace Modules\Auth\Dto;

class BaseRequestDTO
{
    public static function fromRequest(array $validated): static
    {
        $dto = new static();

        foreach ($validated as $key => $value) {
            if (!property_exists($dto, $key)) {
                continue;
            }

            $dto->{$key} = $value;
        }

        return $dto;
    }
}
