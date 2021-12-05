<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add your dream - emotions</title>
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
            <a href="form_story">
                <button class="back_btn">
                    <img class="back__btn__arrow" src="/public/img/navigate_before.svg" alt="Navigate before arrow">
                    <p class="back_btn_text">Back</p>
                </button>
            </a>
        </div>
        <button class="save-btn btn--gray" form="dream-form__form" type="submit">
            <img class="save-btn__icon" src="/public/img/save.svg" alt="save icon">
            <p class="save-btn__text">Save</p>
        </button>
    </header>
    <main class="dream-form">
        <h1 class="dream-form__header">How do you feel?</h1>
        <div class="dream-form__dots">
            <div class="dream-form__dots__dot"></div>
            <div class="dream-form__dots__dot  dot--active"></div>
            <div class="dream-form__dots__dot"></div>
        </div>
        <form id="dream-form__form" action="" class="dream-form__form">
            <section class="emotion-wrapper">
                <label class="emotion-checkbox__label">
                    <input id="okay" name="okay" type="checkbox" class="emotion-checkbox__input">
                    <div class="emotion-checkbox__background--checked"></div>
                    <div class="emotion-checkbox__img">
                        <img src="/public/img/emotions/okay.svg" alt="okay">
                    </div>
                    <p class="emotion-checkbox__text">
                        okay
                    </p>
                </label>
                <label class="emotion-checkbox__label">
                    <input id="happy" name="happy" type="checkbox" class="emotion-checkbox__input">
                    <div class="emotion-checkbox__background--checked"></div>
                    <div class="emotion-checkbox__img">
                        <img src="/public/img/emotions/happy.svg" alt="happy">
                    </div>
                    <p class="emotion-checkbox__text">
                        happy
                    </p>
                </label>
                <label class="emotion-checkbox__label">
                    <input id="excited" name="excited" type="checkbox" class="emotion-checkbox__input">
                    <div class="emotion-checkbox__background--checked"></div>
                    <div class="emotion-checkbox__img">
                        <img src="/public/img/emotions/excited.svg" alt="excited">
                    </div>
                    <p class="emotion-checkbox__text">
                        excited
                    </p>
                </label>
                <label class="emotion-checkbox__label">
                    <input id="cringe" name="cringe" type="checkbox" class="emotion-checkbox__input">
                    <div class="emotion-checkbox__background--checked"></div>
                    <div class="emotion-checkbox__img">
                        <img src="/public/img/emotions/cringe.svg" alt="cringe">
                    </div>
                    <p class="emotion-checkbox__text">
                        cringe
                    </p>
                </label>
                <label class="emotion-checkbox__label">
                    <input id="sad" name="sad" type="checkbox" class="emotion-checkbox__input">
                    <div class="emotion-checkbox__background--checked"></div>
                    <div class="emotion-checkbox__img">
                        <img src="/public/img/emotions/sad.svg" alt="sad">
                    </div>
                    <p class="emotion-checkbox__text">
                        sad
                    </p>
                </label>
                <label class="emotion-checkbox__label">
                    <input id="scared" name="scared" type="checkbox" class="emotion-checkbox__input">
                    <div class="emotion-checkbox__background--checked"></div>
                    <div class="emotion-checkbox__img">
                        <img src="/public/img/emotions/scared.svg" alt="scared">
                    </div>
                    <p class="emotion-checkbox__text">
                        scared
                    </p>
                </label>
                <label class="emotion-checkbox__label">
                    <input id="confused" name="confused" type="checkbox" class="emotion-checkbox__input">
                    <div class="emotion-checkbox__background--checked"></div>
                    <div class="emotion-checkbox__img">
                        <img src="/public/img/emotions/confused.svg" alt="confused">
                    </div>
                    <p class="emotion-checkbox__text">
                        confused
                    </p>
                </label>
                <label class="emotion-checkbox__label">
                    <input id="angry" name="angry" type="checkbox" class="emotion-checkbox__input">
                    <div class="emotion-checkbox__background--checked"></div>
                    <div class="emotion-checkbox__img">
                        <img src="/public/img/emotions/angry.svg" alt="angry">
                    </div>
                    <p class="emotion-checkbox__text">
                        angry
                    </p>
                </label>
            </section>
            <section class="nightmare-section">
                <h2 class="section__header">Was it a nightmare?</h2>
                <div class="nightmare-wrapper">
                    <label class="nightmare__label">
                        <input type="radio" id="yes" name="nightmare" value="yes" class="nightmare__checkbox">
                        <div class="nightmare__background"></div>
                        <div class="nightmare__option">
                            <img src="/public/img/yes-white.svg" alt="yes icon" class="nightmare__option__img">
                            <img src="/public/img/yes.svg" alt="yes icon"
                                class="nightmare__option__img img--not-active">
                            <p>yes</p>
                        </div>
                    </label>
                    <label class="nightmare__label">
                        <input type="radio" id="no" name="nightmare" value="no" class="nightmare__checkbox" checked>
                        <div class="nightmare__background"></div>
                        <div class="nightmare__option">
                            <img src="/public/img/no-white.svg" alt="no icon"
                                class="nightmare__option__img img--not-active">
                            <img src="/public/img/no.svg" alt="no icon" class="nightmare__option__img">
                            <p>no</p>
                        </div>
                    </label>
                </div>
            </section>
        </form>
        <div class="dream-form__next-step">
            <a href="form_notes">
                <button class="dream-form__next-step__btn btn--purple">
                    <p class="dream-form__next-step__btn_text">Notes</p>
                    <img class="dream-form__next-step__btn__arrow" src="/public/img/next.svg" alt="next arrow">
                </button>
            </a>
        </div>
    </main>
</body>

</html>