<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | Esta opção define o guard de autenticação padrão e o broker de redefinição
    | de senha para sua aplicação. Você pode alterar esses valores conforme
    | necessário, mas eles são um ótimo começo para a maioria das aplicações.
    |
    */

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Aqui você pode definir cada guard de autenticação para sua aplicação.
    | Uma ótima configuração padrão foi definida para você, utilizando o
    | armazenamento de sessões e o provider de usuários Eloquent.
    |
    | Todos os guards de autenticação possuem um provider de usuários. Isso
    | define como os usuários são realmente recuperados do banco de dados ou
    | outro sistema de armazenamento utilizado por esta aplicação.
    |
    | Suportado: "session"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'custom' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | Todos os guards de autenticação possuem um provider de usuários. Isso
    | define como os usuários são realmente recuperados do banco de dados ou
    | outro sistema de armazenamento utilizado por esta aplicação.
    |
    | Se você possui múltiplas tabelas ou modelos de usuários, você pode
    | configurar múltiplos providers que podem ser atribuídos a qualquer
    | guard de autenticação adicional definido.
    |
    | Suportado: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\Usuario::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | Aqui você pode definir as opções de redefinição de senha. Pode especificar
    | o comportamento da funcionalidade de redefinição de senha, incluindo a
    | tabela utilizada para armazenamento de tokens e o provider de usuários.
    |
    | O tempo de expiração é a quantidade de minutos que cada token de
    | redefinição será considerado válido. Isso mantém os tokens de segurança
    | com uma vida útil curta para que tenham menos chances de serem adivinhados.
    |
    | A configuração throttle é a quantidade de segundos que um usuário deve
    | aguardar antes de gerar mais tokens de redefinição de senha. Isso previne
    | que o usuário gere rapidamente uma grande quantidade de tokens de
    | redefinição de senha.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Aqui você pode definir a quantidade de segundos antes que uma janela
    | de confirmação de senha expire e os usuários sejam solicitados a
    | reentrar sua senha na tela de confirmação. O tempo padrão é de três horas.
    |
    */

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];