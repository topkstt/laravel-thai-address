<?php

namespace TopKSTT\ThaiAddress\Contracts;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface District
{
    /**
     * A district may be given various sub_districts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subDistricts(): HasMany;

    /**
     * A district must have only one province.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function province(): BelongsTo;

    /**
     * A district may be given various postal_codes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function postalCodes(): HasMany;
}
