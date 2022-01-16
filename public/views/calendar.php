<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="/public/css/style.css">
    <link type="text/css" rel="stylesheet" href="/public/css/dreams.css">
    <link type="text/css" rel="stylesheet" href="/public/css/calendar.css">
    <script defer src="/public/js/dreams.js"></script>
    <script defer src="/public/js/calendar.js"></script>
</head>

<body>

    <header>
        <img class="moonline-logo" src="/public/img/moonline.svg" alt="moonline logo">
        <a href="">
            <img class="gear" src="/public/img/icon_gear.svg" alt="gear icon">
        </a>
    </header>
    <nav class="toggle">
        <ul>
            <a href="dreamslist">
                <li class="toggle__list">
                    <div class="toggle__wrapper">
                        <img class="toggle__list__icon" src="/public/img/list_icon.svg" alt="list icon">
                        <p class="toggle__list__name">List</p>
                    </div>
                </li>
            </a>
            <a href="calendar">
                <li class="toggle__calendar toggle--active">
                    <div class="toggle__wrapper">
                        <img class="toggle__calendar__icon toggle--active" src="/public/img/calendar_purple_icon.svg" alt="calendar icon">
                        <p class="toggle__calendar__name toggle--active">Calendar</p>
                    </div>
                </li>
            </a>
        </ul>
    </nav>

    <main>
        <div class="calendar">
            <div class="calendar__nav">
                <div class="calendar__nav__month">
                    <h1></h1>
                </div>
                <div class="calendar__nav__arrows">
                    <svg class="calendar__nav__arrows__arrow prev" width="16" height="16" transform='rotate(180)' viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.45718 15.4571L4.04297 14.0429L9.83586 8.24999L4.04297 2.45709L5.45718 1.04288L12.6643 8.24999L5.45718 15.4571Z" fill="#F9FAFB" />
                    </svg>
                    <svg class="calendar__nav__arrows__arrow next" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.45718 15.4571L4.04297 14.0429L9.83586 8.24999L4.04297 2.45709L5.45718 1.04288L12.6643 8.24999L5.45718 15.4571Z" fill="#F9FAFB" />
                    </svg>
                </div>
            </div>
            <div class="calendar__weekdays">
                <div>Mo</div>
                <div>Tu</div>
                <div>We</div>
                <div>Th</div>
                <div>Fr</div>
                <div>Sa</div>
                <div>Su</div>
            </div>
            <div class="calendar__days">
            </div>
        </div>
        <a href="adddream" class="link-btn-add-dream">
            <img class="link-btn-add-dream__icon" src="/public/img/plus_icon.svg" alt="plus icon">
        </a>

        <section class="dreams">

        </section>
        <footer>
            <img class="smiling-moon" src="/public/img/moon_cloud.svg" alt="Smiling moon">
        </footer>
    </main>
</body>

</html>


<template id="dream-template">
    <a href="dream" class="dreams__dream-day__dream" data-dreamid="">
        <h1 class="dreams__dream-day__dream__title"></h1>
        <div class="dreams__dream-day__dream__options">
            <img class="dreams__dream-day__dream__options__icon" src="/public/img/dots_icon.svg" alt="options icon">
        </div>
        <p class="dreams__dream-day__dream__story">
        </p>
    </a>
</template>