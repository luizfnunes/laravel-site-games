<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Games | Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <section class="hero is-link is-fullheight">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-centered">
                    <div class="column is-5-tablet is-4-desktop is-4-widescreen">
                        @if ($errors->any())
                            <div class="notification is-danger">
                                <button class="delete"></button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="notification is-danger">
                                <button class="delete"></button>
                                <ul>
                                    <li>{{ session('error') }}</li>
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('auth') }}" method="post" class="box">
                            @csrf
                            <div class="field">
                                <label for="" class="label">Email</label>
                                <div class="control">
                                    <input type="text" name="email" placeholder="e.g. username@email.com" class="input" required>
                                </div>
                            </div>
                            <div class="field">
                                <label for="" class="label">Password</label>
                                <div class="control">
                                    <input type="password" name="password" placeholder="*******" class="input" required>
                                </div>
                            </div>
                            <div class="field">
                                <button class="button is-success is-fullwidth">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<script>
  var deleteButton = document.querySelector('.delete');
  deleteButton.addEventListener('click', function(){
    var element = this.parentElement;
    element.style.display = 'none';
  });
</script>
</body>
</html>
