<?php

namespace TopKSTT\ThaiAddress\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use TopKSTT\ThaiAddress\Traits\SearchableTrait as Searchable;
use TopKSTT\ThaiAddress\Contracts\Province as ProvinceContract;

class Province extends Model implements ProvinceContract
{
    use Searchable;

    /**
     * Province constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setTable(config('thai_address.table_names.province'));
        if (config('thai_address.uuid')) {
            $this->setKeyType('string');
        }
    }

    /**
     * A province may be given various districts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function districts(): HasMany
    {
        return $this->HasMany(
            config('thai_address.models.district')
        );
    }

    /**
     * A province may be given various postal_codes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function postalCodes(): HasMany
    {
        return $this->HasMany(
            config('thai_address.models.postal_code')
        );
    }
}
