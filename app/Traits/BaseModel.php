<?php

namespace App\Traits;

use App\Models\Restaurant;
use Illuminate\Support\Facades\Cache;

trait BaseModel
{
    public function initializeBaseModel(): void
    {
        $this->fillable[] = 'is_active';
        $this->fillable[] = 'restaurant_id';
        $this->fillable[] = 'sequence';
        $this->fillable[] = 'created_at';
        $this->fillable[] = 'updated_at';
        $this->fillable[] = 'deleted_at';

        $this->casts['is_active']     = 'bool';
        $this->casts['restaurant_id'] = 'int';
        $this->casts['sequence']      = 'int';
        $this->casts['created_at']    = 'immutable_date';
        $this->casts['updated_at']    = 'immutable_date';
        $this->casts['deleted_at']    = 'immutable_date';
    }

    /**
     * Get the Translatable json attributes for the model.
     * @method getTranslatableColumns()
     */
    public function getTranslatableColumns(): array
    {
        return Cache::remember($this->getModel()->getTable() . 'getTranslatableColumns', 86400,
            function () {//60 * 60 * 24=day
                $keys = collect($this->getModel()->getCasts())
                    ->filter(function ($value, $key) {
                        if (str_contains($value, 'TranslatableJson')) {
                            return $key;
                        }
                    });

                return $keys->keys()->toArray();
            });
    }

    public function inFillable(string $field): bool
    {
        return in_array($field, $this->model->getFillable(), true);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
