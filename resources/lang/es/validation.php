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

    'accepted' => 'El campo :attribute debe ser aceptado.',
    'active_url' => 'El campo :attribute no es una URL válida.',
    'after' => 'El campo :attribute debe ser luego de :date.',
    'after_or_equal' => 'El campo :attribute debe ser una fecha después o igual que :date.',
    'alpha' => 'El campo :attribute puede sólo contener letras.',
    'alpha_dash' => 'El campo :attribute puede sólo contener letras, números, guiones medios y bajos.',
    'alpha_num' => 'El campo :attribute puede sólo contener letras y números.',
    'array' => 'El campo :attribute debe ser una array.',
    'before' => 'El campo :attribute debe ser una fecha antes de :date.',
    'before_or_equal' => 'El campo :attribute debe ser una fecha antes o igual que :date.',
    'between' => [
        'numeric' => 'El campo :attribute debe estar entre :min y :max.',
        'file' => 'El campo :attribute debe ser entre :min y :max kb.',
        'string' => 'El campo :attribute debe ser entre :min y :max caracteres.',
        'array' => 'El campo :attribute debe ser contener entre :min y :max artículos.',
    ],
    'boolean' => 'El campo :attribute debe ser verdadero o false.',
    'confirmed' => 'La confirmación del campo :attribute no concuerda.',
    'date' => 'El campo :attribute no es una fecha válida.',
    'date_equals' => 'El campo :attribute debe ser una fecha igual a :date.',
    'date_format' => 'El campo :attribute no concuerda con el formato :format.',
    'different' => 'Los campos :attribute y :other deben ser distintos entre sí.',
    'digits' => 'El campo :attribute debe ser de :digits dígitos.',
    'digits_between' => 'El campo :attribute debe tener entre :min y :max dígitos.',
    'dimensions' => 'El campo :attribute tiene dimensiones de imagen incorrecta.',
    'distinct' => 'El campo :attribute tiene un valor duplicado.',
    'email' => 'El campo :attribute debe ser una dirección de correo válida.',
    'ends_with' => 'El campo :attribute debe terminar con uno de lo siguientes valores: :values',
    'exists' => 'El campo seleccionado para :attribute no es válido.',
    'file' => 'El campo :attribute debe ser un archivo.',
    'filled' => 'El campo :attribute debe contener al menos un valor.',
    'gt' => [
        'numeric' => 'El campo :attribute debe ser mayor que :value.',
        'file' => 'El campo :attribute debe ser mayor que :value kb.',
        'string' => 'El campo :attribute debe contener más de :value caractéres.',
        'array' => 'El campo :attribute debe contener más de :value artículos.',
    ],
    'gte' => [
        'numeric' => 'El campo :attribute debe ser mayor o igual que :value.',
        'file' => 'El campo :attribute debe ser mayor que or equal :value kb.',
        'string' => 'El campo :attribute debe ser mayor o igual que :value caractéres.',
        'array' => 'El campo :attribute debe tener :value artículos o más.',
    ],
    'image' => 'El campo :attribute debe ser una imagen.',
    'in' => 'El campo seleccionado para :attribute es inválido.',
    'in_array' => 'El campo :attribute no existe en :other.',
    'integer' => 'El campo :attribute debe ser un número.',
    'ip' => 'El campo :attribute debe ser una dirección válida de IP.',
    'ipv4' => 'El campo :attribute debe ser una dirección válida de IPv4.',
    'ipv6' => 'El campo :attribute debe ser una dirección válida de IPv6.',
    'json' => 'El campo :attribute debe ser de un formato válido tipo JSON.',
    'lt' => [
        'numeric' => 'El campo :attribute debe ser menor que :value.',
        'file' => 'El campo :attribute debe ser menor que :value kb.',
        'string' => 'El campo :attribute debe contener menos de :value caractéres.',
        'array' => 'El campo :attribute debe contener menos de :value artículos.',
    ],
    'lte' => [
        'numeric' => 'El campo :attribute debe ser menor o igual que :value.',
        'file' => 'El campo :attribute debe ser menor o igual a :value kb.',
        'string' => 'El campo :attribute debe contener menos o igual a :value caractéres.',
        'array' => 'El campo :attribute no puede tener más de :value artículos.',
    ],
    'max' => [
        'numeric' => 'El valor no debe ser más que :max.',
        'file' => 'El archivo no debe ser más grande que :max kb.',
        'string' => 'El campo no permite más de :max caractéres.',
        'array' => 'El campo no permite más de :max artículos.',
    ],
    'mimes' => 'El campo :attribute debe ser un archivo de tipo: :values.',
    'mimetypes' => 'El campo :attribute debe ser un archivo de tipo: :values.',
    'min' => [
        'numeric' => 'El valor no debe ser menor que :min.',
        'file' => 'El campo debe ser al menos :min kb.',
        'string' => 'El campo debe ser al menos de :min caractéres.',
        'array' => 'El campo debe contener al menos :min artículos.',
    ],
    'not_in' => 'El campo seleccionado para :attribute es inválido.',
    'not_regex' => 'El formato del campo :attribute es inválido.',
    'numeric' => 'El campo :attribute debe ser un número.',
    'password' => 'La contraseña es incorrecta.',
    'present' => 'El campo :attribute debe estar presente.',
    'regex' => 'El formato del campo :attribute es inválido.',
    'required' => 'El campo :attribute es requerido.',
    'required_if' => 'El campo :attribute es requerido cuando :other es :value.',
    'required_unless' => 'El campo :attribute es requerido a menos que :other sea :values.',
    'required_with' => 'El campo :attribute es requerido cuando :values está presente.',
    'required_with_all' => 'El campo :attribute es requerido cuando :values están presentes.',
    'required_without' => 'El campo :attribute es requerido cuando :values no están presentes.',
    'required_without_all' => 'El campo :attribute es requerido cuando ninguno de :values está present.',
    'same' => 'El campo :attribute y :other deben concordar.',
    'size' => [
        'numeric' => 'El campo :attribute debe ser :size.',
        'file' => 'El campo :attribute debe ser :size kb.',
        'string' => 'El campo :attribute contener :size caractéres.',
        'array' => 'El campo :attribute debe contener :size artículos.',
    ],
    'starts_with' => 'El campo :attribute debe comenzar con uno de los siguientes valores: :values',
    'string' => 'El campo :attribute debe ser texto.',
    'timezone' => 'El campo :attribute debe ser una zona horaria válida.',
    'unique' => 'El campo :attribute ya está siendo usado por otro usuario.',
    'uploaded' => 'El campo :attribute falló al cargar.',
    'url' => 'El formato del campo :attribute es inválido.',
    'uuid' => 'El campo :attribute debe ser un UUID válido.',

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

    'attributes' => [
        'name' => 'nombre',
        'country' => 'país',
        'city' => 'ciudad',
        'address' => 'dirección',
        'phone' => 'teléfono',
        'email' => 'correo electrónico'
    ],
];