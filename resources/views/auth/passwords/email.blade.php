<html>

<head>
    <title>Confirmação de Conta</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style type="text/css">
        * {
            font-family: sans-serif;
        }
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            background: #2E4D61;
        }
        .base-header{
            display:flex;
            justify-content: center;
        }
        .base-content{
            display:flex;
            justify-content: center;
            align-items: center;
            background: #fff;
            margin-top: 2rem;
            border-radius: 1rem;
            padding: 1rem;
            flex-direction: column;
        }

        .base-content h2 {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 4rem;
        }

        .base-content h2::before {
            content: '';
            width: 250px;
            height: 1px;
            background: #2E4D61;
            border-radius: 1rem;
            opacity: .2;
            position: absolute;
            margin-top: 100px;
        }

        .base-content p {
            text-align: center;
        }

        .base-content a {
            background-color: #C32D4B;
            color: #fff;
            padding: 1rem;
            border-radius: 1rem;
            text-decoration: none;
            font-weight: 600;
            margin-top: 4rem;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .base-content a::before {
            content: '';
            width: 250px;
            height: 1px;
            background: #2E4D61;
            border-radius: 1rem;
            opacity: .2;
            position: absolute;
            margin-bottom: 100px;
        }
    </style>
</head>

<body>
    <table border="0" cellpadding="0" cellspacing="0" width="580">
        <tbody>
            <tr>
                <td class="header">
                    <div class="base-header">
                        <img border="0" src="{{\Illuminate\Support\Facades\URL::to('/images/site/logo_white.svg')}}" alt="logo liigo">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="content">
                    <div class="base-content">
                        <h2>Recuperação de senha</h2>
                        <p>Para recuperar sua senha clique no botão abaixo!</p>
                        <a href="{{ route('reset.password', $token) }}" target="_blank">
                            Recuperar Senha
                        </a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>