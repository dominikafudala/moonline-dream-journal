<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
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
    <main class="account-onboarding">
        <h1 class="account-onboarding__header">Sign up</h1>
        <form action="" class="account-onboarding__form">
            <div class="input-wrapper">
                <input id="username" name="username" type="text" class="account-onboarding__form__input">
                <label for="username" class="account-onboarding__form__label">Username</label>
            </div>
            <div class="input-wrapper">
                <input id="email" name="email" type="email" class="account-onboarding__form__input">
                <label for="email" class="account-onboarding__form__label">E-mail</label>
            </div>
            <div class="input-wrapper">
                <input id="password" name="password" type="password" class="account-onboarding__form__input">
                <label for="password" class="account-onboarding__form__label">Password</label>
            </div>
            <div class="input-wrapper">
                <input id="repeat-password" name="repeat-password" type="password" class="account-onboarding__form__input">
                <label for="repeat-password" class="account-onboarding__form__label">Repeat password</label>
            </div>
            <button class="onboarding__btn btn--purple" type="submit">Let's go</button>
            <a class="account-onboarding__action-instead" href="signin">Sign in instead</a>
        </form>
    </main>

</body>

</html>