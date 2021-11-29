<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dreams</title>
</head>

<body>
    <header>
        <img class="moonline-logo" src="/public/img/moonline.svg" alt="moonline logo">
        <img class="gear" src="/public/img/icon_gear.svg" alt="gear icon">
    </header>
    <nav class="toggle">
        <ul>
            <li class="toggle__list toggle--active">
                <img class="toggle__list__icon toggle--active" src="/public/img/list_icon.svg" alt="list icon">
                <p class="toggle__list__name toggle--active">List</p>
            </li>
            <li class="toggle__calendar">
                <img class="toggle__calendar__icon" src="/public/img/calendar_icon.svg" alt="calendar icon">
                <p class="toggle__calendar__name">Calendar</p>
            </li>
        </ul>
    </nav>
    <main>
        <a href="#">
            <button class="btn-add-dream">
                <img class="btn-add-dream__icon" src="/public/img/plus_icon.svg" alt="plus icon">
            </button>
        </a>
        <section class="dreams">
            <div class="dreams__dream-day">
                <p class="dreams__dream-day__date">27 Nov 2021</p>
                <div class="dreams__dream-day__dream">
                    <h1 class="dreams__dream-day__dream__title">Title</h1>
                    <div class="dreams__dream-day__dream__options">
                        <img class="dreams__dream-day__dream__options__icon" src="/public/img/dots_icon.svg"
                            alt="options icon">
                    </div>
                    <p class="dreams__dream-day__dream__story">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti consequatur quos, reiciendis
                        culpa harum ea exercitationem modi quas laudantium voluptatum, quae provident hic ab iure
                        quisquam, illo quo fugit assumenda.
                    </p>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <img class="smiling-moon" src="/public/img/moon_cloud.svg" alt="Smiling moon">
    </footer>
</body>

</html>