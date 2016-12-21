<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class RestfulAPIController extends Controller
{
    private $imageFilePath = 'upload/images/';
    private $videoFilePath = 'upload/videos/';

    public function __construct()
    {

    }

    public function uploadFile()
    {
        $type = Input::get('type');
        $file = Input::file('file');

        $validator = Validator::make([
            'type' => $type,
            'file' => $file
        ], [
            'type' => 'required | max:10 | min:4',
            'file' => 'required | file | max:51200'
        ]);

        if ($validator->fails()) {
            return $this->respsonseValidationError($validator);
        }

        $fileName = date("Ymdhis") . rand(11111111, 99999999) . '.' . $file->getClientOriginalExtension();

        $file->move(public_path($this->imageFilePath), $fileName);

        return $this->responseSuccess(['url' => $fileName]);
    }
}
