<?php


namespace App\Traits;

trait FormRequestTrait
{

    public function validationData()
    {
        return array_merge($this->all(), $this->route()->parameters());
    }

    public function authorize()
    {
        return true;
    }
}
