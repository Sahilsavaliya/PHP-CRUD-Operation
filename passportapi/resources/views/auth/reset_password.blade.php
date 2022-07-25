<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Starter</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #f1f1f1;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        input {
            padding: 10pt;
            width: 60%;
            font-size: 15pt;
            border-radius: 5pt;
            border: 1px solid lightgray;
            margin: 10pt;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            width: 60%;
            align-items: center;
            margin: 20pt;
            border: 1px solid lightgray;
            padding: 20pt;
            border-radius: 5pt;
            background: white;
        }

        button {
            border-radius: 5pt;
            padding: 10pt 14pt;
            background: white;
            border: 1px solid gray;
            font-size: 14pt;
            margin: 20pt;
        }

        button:hover {
            background: lightgray;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        <form class="form-container" action="api/password/reset" method="POST" id="regForm">
            <h2>Forgot Password?</h2>

            <input name="email" placeholder="Enter email" value="{{request()->get('email')}}" readonly>
            <input name="password" placeholder="Enter new password">
            <input name="password_confirmation" placeholder="Confirm new password">
            <input hidden name="token" placeholder="token" value="{{request()->get('token')}}">

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
<script>
    $(document).ready(function() {
        $("#regForm").validate({
            rules: {
                
              
                password: {
                    required: true,
                    minlength: 5
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password"
                },
                
            },
            messages: {
                
                password: {
                    required: "Password is required",
                    minlength: "Password must be at least 5 characters"
                },
                password_confirmation: {
                    required: "Confirm password is required",
                    equalTo: "Password and confirm password should same"
                },
            }
        });
    });
</script>

</html>