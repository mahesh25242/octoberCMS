<?php namespace MaheshKS\ContactUs\Components;

use Cms\Classes\ComponentBase;
use ApplicationException;
use MaheshKS\ContactUs\Models\ContactUs as ContactUsModel;
use MaheshKS\ContactUs\Models\Settings;
use Validator;
use Mail;
class ContactUs extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Contact Us',
            'description' => 'contact us.'
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
        
        $this->addJs('/plugins/maheshks/contactus/assets/js/contactUs.js');
        
        
    }
    public function onSaveContactUs()
    {

        
        $formValidation = [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'max:255',
            'message' => 'max:255',
        ];
        if(!Settings::get("contact_us_to_email")){
            $formValidation["common"] = "required|max:255";
        }

        $validator = Validator::make(post(), $formValidation);

       

       
        
        // check Validator
        if ($validator->fails()) {
            return [
                'message' => $validator->messages()
            ];
        }
        $model = new ContactUsModel();
        $model->name = strip_tags(post('name'));
        $model->email = strip_tags(post('email'));
        $model->phone = strip_tags(post('phone'));
        $model->comments = strip_tags(post('comments'));
        
        $model->save();
        $vars["name"]  = $model->name;        
        $vars["email"]  = $model->email;        
        $vars["phone"]  = $model->phone;        
        $vars["comments"]  = $model->comments;        
        Mail::send('maheshks.reportdatabreach::mail.contactus', $vars, function($message) {
			$message->to(Settings::get("contact_us_to_email"));                     
        });

    }
}
