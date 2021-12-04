<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add your dream</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="/public/css/style.css">
    <link type="text/css" rel="stylesheet" href="/public/css/forms.css">
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
        <button class="save-btn btn--gray" form="dream-form__form" type="submit">
            <img class="save-btn__icon" src="/public/img/save.svg" alt="save icon">
            <p class="save-btn__text">Save</p>
        </button>
    </header>
    <main class="dream-form">
        <h1 class="dream-form__header">Tell your story</h1>
        <div class="dream-form__dots">
            <div class="dream-form__dots__dot dot--active"></div>
            <div class="dream-form__dots__dot"></div>
            <div class="dream-form__dots__dot"></div>
        </div>
        <form id="dream-form__form" action="" class="dream-form__form">
            <div class="input-wrapper">
                <input id="date" name="date" type="date" class="dream-form__form__input">
                <label for="date" class="dream-form__form__label">Date</label>
            </div>
            <div class="input-wrapper">
                <input id="title" name="title" type="text" class="dream-form__form__input">
                <label for="title" class="dream-form__form__label">Title</label>
            </div>
            <div class="input-wrapper">
                <textarea id="story" name="story" type="textarea"
                    class="dream-form__form__input dream-form__form__input__story"></textarea>
                <label for="story" class="dream-form__form__label">Story</label>
            </div>
        </form>
        <div class="dream-form__next-step">
            <a href="">
                <button class="dream-form__next-step__btn btn--purple">
                    <p class="dream-form__next-step__btn_text">Mood</p>
                    <img class="dream-form__next-step__btn__arrow" src="/public/img/next.svg" alt="next arrow">
                </button>
            </a>
        </div>
    </main>
</body>

</html>