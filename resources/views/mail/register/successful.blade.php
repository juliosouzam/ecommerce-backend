@component('mail::message')
# Sucesso

Eae, {{ $user->name }},
você acaba de criar uma conta em nossa loja.
Fique a vontade para ver nossos produtos e qualquer dúvida, entre em contato conosco para resolvermos da melhor forma possível.

@component('mail::button', ['url' => url('/')])
Ir para site
@endcomponent

Obrigado!

Att,<br>
{{ config('app.name') }}
@endcomponent
