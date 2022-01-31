<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="/public/css/style.css">
    <link type="text/css" rel="stylesheet" href="/public/css/onboarding.css">
</head>

<body>

    <header>
        <div class="back">
            <a href="./">
                <button class="back_btn">
                    <img class="back__btn__arrow" src="/public/img/navigate_before.svg" alt="Navigate before arrow">
                    <p class="back_btn_text">Back</p>
                </button>
            </a>
        </div>
    </header>
    <div class="desktop-wrapper">
        <aside class="desktop-onboarding">
            <div class="moonline-repr">
                <img class="moonline-repr__logo" src="/public/img/moonline_logo.svg" alt="moonline logo">
                <p class="moonline-repr_slogan">Your personal dream journal</p>
            </div>
            <a href="signup"><button class="onboarding__btn btn--dark">Sign up</button></a>
        </aside>
        <main class="account-onboarding">
            <img class="desktop--moon" src="/public/img/moon_cloud_zzz.svg" alt="sleeping moon">
            <h1 class="account-onboarding__header">Sign in</h1>
            <div class="succesaful-login">
                <p>
                    <?php
                    if (isset($success)) {
                        foreach ($success as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </p>
            </div>
            <form action="signin" class="account-onboarding__form" method="POST">
                <div class="input-wrapper">
                    <input id="username" name="username" type="text" class="account-onboarding__form__input" required>
                    <label for="username" class="account-onboarding__form__label">Username or e-mail</label>
                </div>
                <div class="input-wrapper">
                    <input id="password" name="password" type="password" class="account-onboarding__form__input" required>
                    <label for="password" class="account-onboarding__form__label">Password</label>
                </div>
                <div class="wrong-credentials">
                    <p>
                        <?php
                        if (isset($messages)) {
                            foreach ($messages as $message) {
                                echo $message;
                            }
                        }
                        ?>
                    </p>
                </div>
                <button class="onboarding__btn btn--purple" type="submit">Let's go</button>
                <a class="account-onboarding__action-instead" href="signup">Sign up instead</a>
            </form>
        </main>
    </div>
</body>

</html>