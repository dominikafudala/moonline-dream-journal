<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dream</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="/public/css/style.css">
    <link type="text/css" rel="stylesheet" href="/public/css/dreams.css">
</head>

<body>
    <header class="dream__header">
        <div class="back">
            <a href="/dreamslist">
                <?php include 'back.php';?>
            </a>
        </div>
        <p class="dream__header__date"><?= $dream->getFormattedDate(); ?></p>
        <button class="share_btn">
            <img class="share__btn__icon" src="/public/img/share_icon.svg" alt="share icon">
        </button>
    </header>
    <main class="dream-info">
        <div class="dream-info__emotions">
            <?php foreach ($dream->getMoods() as $key => $url) : ?>
                <?php if (!is_int($key)) : ?>
                    <img src="<?= $url; ?>" alt="<?= $key; ?>">
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="dream-info__moon">
            <img src="<?= $moon[1] ?>" alt="<?= $moon[0] ?>">
        </div>
        <div class="dream-info__title">
            <h1><?= $dream->getTitle(); ?></h1>
            <?php if ($dream->getNightmare() === 1) : ?>
                <div class="dream-info__title__nightmare">
                    <img src="/public/img/ghost.svg" alt="ghost icon">
                    <p>Nightmare</p>
                </div>
            <?php endif; ?>
        </div>
        <section class="dream-info__desc">
            <h2>Story</h2>
            <p><?= $dream->getStory(); ?></p>
        </section>
        <?php if (null != $dream->getNote()) : ?>
            <section class="dream-info__desc">
                <h2>Notes</h2>
                <p><?= $dream->getNote(); ?></p>
            </section>
        <?php endif; ?>
    </main>
</body>

</html>