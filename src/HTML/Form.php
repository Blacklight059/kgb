<?php

namespace App\HTML;

class Form {
    private $data;
    private $errors;

    public function __construct($data, array $errors) 
    {
        $this->data = $data;
        $this->errors = $errors;
    }

    public function input (string $key, string $label): string
    {
        $value = $this->getValue($key);
        return <<<HTML
        <div class="form-group">
        <label for="field{$key}">{$label}</label>
        <input type="text" id="field{$key}" class="{$this->getInputClass($key)}" name="{$key}" value="{$value}" required>
        {$this->getErrorFeedback($key)};
        </div>
    </div>
HTML;
    }

    public function textarea (string $key, string $label): string
    {
        $value = $this->getValue($key);

        return <<<HTML
        <div class="form-group">
        <label for="field{$key}">{$label}</label>
        <textarea type="text" id="field{$key}" class="{$this->getInputClass($key)}" name="{$key}" value="{$value}" required>{$value}</textarea>
        {$this->getErrorFeedback($key)};
        </div>
    </div>
HTML;
    }

    private function getValue (string $key): ?string 
    {
        if (is_array($this->data)) {
            return $this->data[$key] ?? null;
        }
        $method = 'get' . str_replace(' ', '',ucfirst(str_replace('_', '', $key)));
        return $this->data->$method();
    }

    private function getInputClass (string $key):string 
    {
        $inputClass = 'form-control';
        if (isset($this->errors[$key])) {
            $inputClass .= ' is-invalid';
        }
        return $inputClass;
    }

    private function getErrorFeedback(string $key): string 
    {

        return '';
    }

}