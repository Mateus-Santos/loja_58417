<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Admin</title>
</head>
<body>
    <form class="form-signin" method="post" action="{{route('admin.login.do')}}">
    @csrf
        @if($errors->all())
            @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{$error}}
            </div>
            @endforeach
        @endif
        <label for="">Endereço email</label>
        <input type="email" name="email" value="test@gmail.com">
        <label for="">senha</label>
        <input type="password" name="password">
        <button type="submit">Login</button>
    </form>
</body>
</html>