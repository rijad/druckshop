<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Das Attribut: muss akzeptiert werden.',
    'active_url' => 'Das Attribut: ist keine gültige URL.',
    'after' => 'Das Attribut: muss ein Datum nach: Datum sein.',
    'after_or_equal' => 'Das Attribut: muss ein Datum nach oder gleich: Datum sein.',
    'alpha' => 'Das Attribut: darf nur Buchstaben enthalten.',
    'alpha_dash' => 'Das Attribut: darf nur Buchstaben, Zahlen, Bindestriche und Unterstriche enthalten.',
    'alpha_num' => 'Das Attribut: darf nur Buchstaben und Zahlen enthalten.',
    'array' => 'Das Attribut: muss ein Array sein.',
    'before' => 'Das Attribut: muss ein Datum vor: date sein.',
    'before_or_equal' => 'Das Attribut: muss ein Datum vor oder gleich: Datum sein.',
    'between' => [
        'numeric' => 'Das Attribut: muss zwischen: min und: max liegen.',
        'file' => 'Das Attribut: muss zwischen: min und: max Kilobyte liegen.',
        'string' => 'Das Attribut: muss zwischen den Zeichen: min und: max liegen.',
        'array' => 'Das Attribut: muss zwischen: min und: max liegen.',
    ],
    'boolean' => 'Das Attributfeld: muss wahr oder falsch sein.',
    'confirmed' => 'Die Bestätigung des Attributs: stimmt nicht überein.',
    'date' => 'Das Attribut: ist kein gültiges Datum.',
    'date_equals' => 'Das Attribut: muss ein Datum sein, das gleich: Datum ist.',
    'date_format' => 'Das Attribut: stimmt nicht mit dem Format: Format überein.',
    'different' => 'Das Attribut: und: other müssen unterschiedlich sein.',
    'digits' => 'Das Attribut: muss sein: Ziffern Ziffern.',
    'digits_between' => 'Das Attribut: muss zwischen den Ziffern: min und: max liegen.',
    'dimensions' => 'Das Attribut: hat ungültige Bildabmessungen.',
    'distinct' => 'Das Attributfeld: hat einen doppelten Wert.',
    'email' => 'Das Attribut: muss eine gültige E-Mail-Adresse sein.',
    'ends_with' => 'Das Attribut: muss mit einem der folgenden Werte enden :: Werte',
    'exists' => 'Das Attribut selected: ist ungültig.',
    'file' => 'Das Attribut: muss eine Datei sein.',
    'filled' => 'Das Attributfeld: muss einen Wert haben.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'Das Attribut selected: ist ungültig.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file' => 'The :attribute may not be greater than :max kilobytes.',
        'string' => 'The :attribute may not be greater than :max characters.',
        'array' => 'The :attribute may not have more than :max items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'The :attribute must be at least :min characters.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'not_in' => 'Das Attribut selected: ist ungültig.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'Das Feld: Attribut ist erforderlich.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute format is invalid.',
    'uuid' => 'The :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
