<h1>Hello</h1>

<p>Please click the following link to reset you password,
    <a href="{{ env('APP_URL') }}/reset/{{ $user->email }}/{{ $code  }}">click here</a>.
</p>