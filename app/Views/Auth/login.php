<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title; ?></title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?=base_url() ?>fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="<?=base_url('css/style2.css') ?>">
    <!-- background login  -->
    <style type="text/css">
    .image {
        background-image: url("../assets/img/Logo ESports Sumbawa.png");
    }
    </style>
    <body>
    <img src="Logo ESports Sumbawa.png">
    </body>
</head>
<body class="image">

    <div class="main">
        <div class="container">
            <div class="signup-content">
                <form action="/Auth/verifikasi" method="POST" id="signup-form" class="signup-form">
                    <h2>Login</h2>
    
                    <div class="form-group">
                        <input type="email" class="form-input" name="email" id="email" placeholder="Email"/>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-input" name="password" id="password" placeholder="Password"/>
                        <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                    </div>
                    <div class="form-group">
                        <!-- <input type="submit" name="submit" id="submit" class="form-submit submit" value="Sign up"/> -->
                        <button class="form-submit submit" type="submit">Login</button>
                        <a href="/auth/register" class="submit-link submit">Register</a>
                        
                    </div>
                </form>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="<?=base_url() ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url() ?>js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>