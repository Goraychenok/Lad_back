<?php namespace Lad\Test\Components;

use Cms\Classes\ComponentBase;
use Lad\Test\Models\Form;
use October\Rain\Exception\ValidationException;
use Validator;


class FormTodo extends ComponentBase
{




    public function componentDetails()
    {
        return [
            'name'        => 'formTodo Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

	public function onAddForm(){

		$name = post('name');
		$phone = post('phone');

		$data = [
			'name' => $name,
			'phone' => $phone,
		];
		$rules = [
			'name' => 'required|min:1',
			'phone' => 'required|min:1'
		];
		$validator = Validator::make($data, $rules);

		if ($validator->fails()) {
			throw new ValidationException($validator);
		}else{
			$form = new Form();
			$form->name = $name;
			$form->phone = $phone;
			$form -> save();
		}
	}


}
