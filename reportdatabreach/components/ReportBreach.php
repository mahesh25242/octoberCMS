<?php namespace MaheshKS\ReportDataBreach\Components;

use Cms\Classes\ComponentBase;
use ApplicationException;
use MaheshKS\ReportDataBreach\Models\DataBranch as DataBranchModel;
use Validator;
use Mail;
use MaheshKS\ContactUs\Models\Settings;
class ReportBreach extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Repot Breach',
            'description' => 'Implements a Repot Breach.'
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
        
        $this->addJs('/plugins/maheshks/reportdatabreach/assets/js/reportdataBreach.js');
        
        
    }
    public function onSaveBreach()
    {

        $formValidation = [
            'organization' => 'max:255',
            'pdb' => 'max:255',
            'nrb' => 'max:255',
            'wru' => 'max:255',
            'sou' => 'max:255',
            'tob' => 'max:255',
            'comments' => 'max:255',
        ];
        if(!Settings::get("report_breach_to_email")){
            $formValidation["common"] = "required|max:255";
        }
        $validator = Validator::make(post(), $formValidation);


        // check Validator
        if ($validator->fails()) {
            return [
                'message' => $validator->messages()
            ];
        }
        $model = new DataBranchModel();
        $model->organization = strip_tags(post('organization'));
        $model->date_of_breach = strip_tags(post('pdb'));
        $model->no_record_breach = strip_tags(post('nrb'));
        $model->web_site_ref_url = strip_tags(post('wru'));
        $model->source_of_breach = strip_tags(post('sou'));
        $model->type_of_breach = strip_tags(post('tob'));
        $model->comments = strip_tags(post('comments'));

        $model->save();
        $vars["organization"] = $model->organization;
        $vars["date_of_breach"] =  $model->date_of_breach;
        $vars["no_record_breach"] =  $model->no_record_breach;
        $vars["web_site_ref_url"] =  $model->web_site_ref_url;
        $vars["source_of_breach"] =  $model->source_of_breach;
        $vars["type_of_breach"] =  $model->type_of_breach;
        $vars["comments"] =  $model->comments;

        Mail::send('maheshks.reportdatabreach::mail.breachtosdmin', $vars, function($message) {
            $message->to(Settings::get("report_breach_to_email"));                               
        });

    }
}
