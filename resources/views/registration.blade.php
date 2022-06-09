<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Авторизация</title>
</head>
<body class="body_auth">

<form class="form_reg needs-validation" method="POST" action="{{route('register')}}" novalidate>
    @csrf
    <h1 style="font-size: 28px; margin-bottom: 30px">Регистрация</h1>
    <div class="flex_form_reg" @if(session('danger')|| session('warning')) style="height: 457px" @endif>
        <div class="mb-3 w-100">
            <label for="exampleInputEmail1" class="form-label">Электронная почта</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            <div class="valid-feedback">
            </div>
            <div class="invalid-feedback">
                Укажите почту
            </div>
            <div class="mb-3 w-100">
                <label for="exampleInputEmail1" class="form-label">Имя</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                    Укажите имя
                </div>
            <div class="mb-3 w-100">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                    Введите пароль
                </div>
            </div>
                <div class="mb-3 w-100">
                    <label for="exampleInputPassword1" class="form-label">Повторите пароль</label>
                    <input type="password" name="password2" class="form-control" id="exampleInputPassword1" required>
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Повторите пароль
                    </div>
                </div>
            @include('inc.messages')
            <div class="auth_submit">
                <a href="{{route('home')}}">Есть аккаунт?</a>
                <input type="submit" class="btn btn-primary" name="submit" value="Войти">
            </div>
            </div>
        </div>
        </div>

</form>
@include('inc.scripts')
</body>
</html>

