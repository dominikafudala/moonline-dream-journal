<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add your dream - notes</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="/public/css/style.css">
    <link type="text/css" rel="stylesheet" href="/public/css/forms.css">
    <script defer src="/public/js/forms.js"></script>
</head>

<body>
    <header>
        <div class="back">
            <a href="form_emotions">
                <button class="back_btn">
                    <img class="back__btn__arrow" src="/public/img/navigate_before.svg" alt="Navigate before arrow">
                    <p class="back_btn_text">Back</p>
                </button>
            </a>
        </div>
        <button class="save-btn btn--purple" form="dream-form__form" type="submit">
            <img class="save-btn__icon" src="/public/img/save-dark.svg" alt="save icon">
            <p class="save-btn__text">Save</p>
        </button>
    </header>
    <main class="dream-form">
        <h1 class="dream-form__header">Leave your notes</h1>
        <div class="dream-form__dots">
            <div class="dream-form__dots__dot"></div>
            <div class="dream-form__dots__dot"></div>
            <div class="dream-form__dots__dot  dot--active"></div>
        </div>
        <form id="dream-form__form" action="" class="dream-form__form">
            <section class="moon-phase-section">
                <h2 class="section__header">Moon on 25 Nov 2021</h2>
                <div class="moon-phase__info">
                    <div class="moon-phase__img">
                        <img src="/public/img/moon_phases/first_quarter.svg" alt="first quarter">
                    </div>
                    <p class="moon-phase__name">first quarter</p>
                </div>
            </section>
            <div class="input-wrapper">
                <textarea id="notes" name="notes" type="text" class="dream-form__form__input input--longer"></textarea>
                <label for="notes" class="dream-form__form__label">Note, comment or interpret</label>
            </div>
        </form>
    </main>
</body>

</html>