<?php

return [

    'title' => 'Editar :label',

    'breadcrumb' => 'Editar',

    'actions' => [

        'delete' => [

            'label' => 'Borrar',

            'modal' => [

                'heading' => 'Borrar :label',

                'subheading' => '¿Estas seguro?',

                'buttons' => [

                    'delete' => [
                        'label' => 'Borrar',
                    ],

                ],

            ],

        ],

        'view' => [
            'label' => 'Ver',
        ],

    ],

    'form' => [

        'actions' => [

            'cancel' => [
                'label' => 'Cancelar',
            ],

            'save' => [
                'label' => 'Guardar',
            ],

        ],

    ],

    'messages' => [
        'saved' => 'Guardado',
    ],

];
