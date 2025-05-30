<?php

namespace Webkul\Tax\Providers;

use Webkul\Core\Providers\CoreModuleServiceProvider;

class ModuleServiceProvider extends CoreModuleServiceProvider
{
    /**
     * Models.
     *
     * @var array
     */
    protected $models = [
        \Webkul\Tax\Models\TaxCategory::class,
        \Webkul\Tax\Models\TaxMap::class,
        \Webkul\Tax\Models\TaxRate::class,
    ];
}
