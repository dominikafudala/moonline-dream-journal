<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dreams</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="/public/css/style.css">
    <link type="text/css" rel="stylesheet" href="/public/css/dreams.css">
    <link type="text/css" rel="stylesheet" href="/public/css/calendar.css">
    <script defer src="/public/js/dreams.js"></script>
    <script defer src="/public/js/calendar.js"></script>
    <script src="https://kit.fontawesome.com/0bcee96ce7.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <img class="moonline-logo" src="/public/img/moonline.svg" alt="moonline logo">
        <a>
            <img class="gear" src="/public/img/icon_gear.svg" alt="gear icon">
        </a>
    </header>
    <div class="signout --inactive">
        <a href="signout"><button class="signout__btn btn--purple">Sign out</button></a>
    </div>
    <nav class="toggle">
        <ul>
            <a>
                <li class="toggle__list toggle--active">
                    <div class="toggle__wrapper">
                        <svg class="toggle__list__icon" width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.7059 5.54446C15.7346 5.45137 15.75 5.35248 15.75 5.25C15.75 4.69772 15.3023 4.25 14.75 4.25H12.0155C12.0053 4.3319 12 4.41533 12 4.5C12 5.25301 12.4161 5.90882 13.031 6.25H14.75C14.8525 6.25 14.9514 6.23458 15.0445 6.20594C15.3137 6.04077 15.5408 5.81366 15.7059 5.54446ZM10.4021 6.25C10.1445 5.7214 10 5.12758 10 4.5C10 4.41604 10.0026 4.33268 10.0077 4.25H4.25C3.69772 4.25 3.25 4.69772 3.25 5.25C3.25 5.80228 3.69772 6.25 4.25 6.25H10.4021ZM14 8.5C14.495 8.5 14.969 8.41009 15.4065 8.2457C15.617 8.42903 15.75 8.69898 15.75 9C15.75 9.55228 15.3023 10 14.75 10H4.25C3.69772 10 3.25 9.55228 3.25 9C3.25 8.44772 3.69772 8 4.25 8H12.062C12.6361 8.31858 13.2969 8.5 14 8.5ZM4.25 11.75C3.69772 11.75 3.25 12.1977 3.25 12.75C3.25 13.3023 3.69772 13.75 4.25 13.75H14.75C15.3023 13.75 15.75 13.3023 15.75 12.75C15.75 12.1977 15.3023 11.75 14.75 11.75H4.25Z" fill="#9E77ED" />
                            <circle cx="14" cy="4.5" r="2.25" fill="#9E77ED" />
                        </svg>
                        <p class="toggle__list__name">List</p>
                    </div>
                </li>
            </a>
            <a>
                <li class="toggle__calendar">
                    <div class="toggle__wrapper">
                        <svg class="toggle__calendar__icon" width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.75 8.25C2.75 6.60626 2.75 5.78439 3.20398 5.23121C3.28709 5.12995 3.37995 5.03709 3.48121 4.95398C4.03439 4.5 4.85626 4.5 6.5 4.5H12.5C14.1437 4.5 14.9656 4.5 15.5188 4.95398C15.6201 5.03709 15.7129 5.12995 15.796 5.23121C16.25 5.78439 16.25 6.60626 16.25 8.25H2.75Z" fill="#9E77ED" />
                            <rect x="2.75" y="4.5" width="13.5" height="11.25" rx="2" stroke="#9E77ED" stroke-width="1.2" />
                            <path d="M2.75 8.25H16.25" stroke="#9E77ED" stroke-width="1.2" stroke-linecap="round" />
                            <path d="M7.25 12H11.75" stroke="#9E77ED" stroke-width="1.2" stroke-linecap="round" />
                            <path d="M6.5 2.25L6.5 5.25" stroke="#9E77ED" stroke-width="1.2" stroke-linecap="round" />
                            <path d="M12.5 2.25L12.5 5.25" stroke="#9E77ED" stroke-width="1.2" stroke-linecap="round" />
                        </svg>
                        <p class="toggle__calendar__name">Calendar</p>
                    </div>
                </li>
            </a>
        </ul>
    </nav>
    <main class="desktop__main">
        <div class="calendar-desktop-wrapper">
            <div class="calendar --inactive --desktop">
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
        </div>
        <div class="desktop__list">
            <a href="adddream" class="link-btn-add-dream">
                <img class="link-btn-add-dream__icon" src="/public/img/plus_icon.svg" alt="plus icon">
            </a>
            <section class="dreams">
                <?php foreach ($dates as $date => $dreams) : ?>
                    <?php if (!is_int($date)) : ?>
                        <div class="dreams__dream-day">
                            <p class="dreams__dream-day__date"><?= $date; ?></p>
                            <?php foreach ($dreams as $dream) : ?>
                                <a href="dream/<?= $dream->getId(); ?>" class="dreams__dream-day__dream" data-dreamid=<?= $dream->getId(); ?>>
                                    <h1 class="dreams__dream-day__dream__title"><?= $dream->getTitle(); ?></h1>
                                    <div class="dreams__dream-day__dream__options">
                                        <img class="dreams__dream-day__dream__options__icon" src="/public/img/dots_icon.svg" alt="options icon">
                                    </div>
                                    <p class="dreams__dream-day__dream__story">
                                        <?= $dream->getStory(); ?>
                                    </p>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </section>
    </main>
    </div>
    <footer>
        <img class="smiling-moon" src="/public/img/moon_cloud.svg" alt="Smiling moon">
    </footer>
</body>

</html>

<template id="dreamslist">
    <?php foreach ($dates as $date => $dreams) : ?>
        <?php if (!is_int($date)) : ?>
            <div class="dreams__dream-day">
                <p class="dreams__dream-day__date"><?= $date; ?></p>
                <?php foreach ($dreams as $dream) : ?>
                    <a href="dream/<?= $dream->getId(); ?>" class="dreams__dream-day__dream" data-dreamid=<?= $dream->getId(); ?>>
                        <h1 class="dreams__dream-day__dream__title"><?= $dream->getTitle(); ?></h1>
                        <div class="dreams__dream-day__dream__options">
                            <img class="dreams__dream-day__dream__options__icon" src="/public/img/dots_icon.svg" alt="options icon">
                        </div>
                        <p class="dreams__dream-day__dream__story">
                            <?= $dream->getStory(); ?>
                        </p>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</template>

<template id="dream-template">
    <a class="dreams__dream-day__dream" data-dreamid="">
        <h1 class="dreams__dream-day__dream__title"></h1>
        <div class="dreams__dream-day__dream__options">
            <img class="dreams__dream-day__dream__options__icon" src="/public/img/dots_icon.svg" alt="options icon">
        </div>
        <p class="dreams__dream-day__dream__story">
        </p>
    </a>
</template>