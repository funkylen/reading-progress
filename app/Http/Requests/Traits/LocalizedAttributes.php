<?php

namespace App\Http\Requests\Traits;

trait LocalizedAttributes
{
    public function attributes(): array
    {
        return $this->localizedAttributes();
    }

    protected function localizedAttributes(): array
    {
        $rules = $this->rules();

        return collect($rules)
            ->mapWithKeys(fn ($value, $key) => [$key => __($key)])
            ->toArray();
    }
}
