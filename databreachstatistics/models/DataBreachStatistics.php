<?php namespace MaheshKS\DataBreachStatistics\Models;

use Model;

/**
 * Model
 */
class DataBreachStatistics extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'maheshks_databreachstatistics_item';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
