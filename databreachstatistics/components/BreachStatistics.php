<?php namespace MaheshKS\DataBreachStatistics\Components;

use Cms\Classes\ComponentBase;
use ApplicationException;
use MaheshKS\DataBreachStatistics\Models\DataBreachStatistics as DataBreachStatisticsModel;
use Validator;
use Carbon\Carbon;
use MaheshKS\DataBreachStatistics\Models\Settings;
class BreachStatistics extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Breach Statics',
            'description' => 'Breach Statics'
        ];
    }
	
	public function settings()
    {
        return [
            'start_breach_number' => Settings::get('start_breach_number', false),
            'start_breach_intervel' => Settings::get('start_breach_intervel', false)            

        ];

    }

    public function defineProperties()
    {
        return [
            'max' => [
                'description'       => 'The most amount of todo items allowed',
                'title'             => 'Max items',
                'default'           => 10,
                'type'              => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'The Max Items value is required and should be integer.'
            ]
        ];
    }
	public function onRun()
    {
        parent::onRun(); 
        
        $this->addJs('/plugins/maheshks/databreachstatistics/assets/js/dataBreachStatistics.js');
        
        
    }
    public function onUpdateDataBreach()
    {

       
        $model = new DataBreachStatisticsModel();
		//$model->breach_count = 10;
		
		$stati = $model::take(1)->get();
		$stati = isset($stati[0]) ? $stati[0] : null;
        
		$secondBreach = (int) Settings::get('breach_in_second', false);
		if($stati){
			//return $stati->updated_at->toDateTimeString();
            if(Settings::get('start_breach_number', false) != $stati->breach_count){
                $stati->breach_count = (int) Settings::get('start_breach_number', false);
            }else{
                $updated_at = Carbon::parse($stati->updated_at);
                $now = Carbon::now();
                $diffSec =  $updated_at->diffInSeconds($now);
                $stati->breach_count = $stati->breach_count + ($diffSec  * $secondBreach );
            }
			
			$stati->update();
            Settings::set('start_breach_number', $stati->breach_count);
		}else{
			$model->breach_count = (int) Settings::get('start_breach_number', false);
			$model->save();
		}
       
        
       
        $stati->breach_count_split = str_split(number_format($stati->breach_count));
		$stati->per_second_breach= (int) $secondBreach;
		return ($stati);
        

    }
}
