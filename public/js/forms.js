const nightmareIcons = document.querySelectorAll('.nightmare__checkbox');
const textareas = document.querySelectorAll(".input--longer");

const requiredElements = document.querySelectorAll("[required]");

const btns = document.querySelectorAll(".dream-form__next-step__btn");
const divSteps = document.querySelectorAll("div.step");
const dots = document.querySelectorAll(".dream-form__dots__dot");
let stepCounter = 0;


function changeIconIfChecked(e) {
    if (e.target.id == "yes" || e.target.id == "no") {
        if (e.target.checked) {
            const changeImg = document.querySelectorAll(".nightmare__option img");
            changeImg.forEach((img) =>
                img.classList.toggle("img--not-active")
            );
        }
    }
}

function resizeTextarea(e) {
    const elem = e.target;
    elem.style.height = "";
    elem.style.height = elem.scrollHeight + "px";
    if (elem.classList.contains('not-valid')) elem.classList.remove('not-valid');
}

function updateDots() {
    dots.forEach((dot) => dot.classList.remove("dot--active"));
    dots[stepCounter].classList.add("dot--active");
}


function changeStep() {
    const divVis = divSteps[stepCounter];
    const divVisClass = divVis.classList[0];
    const hVis = document.querySelector(`h1.${divVisClass}`);
    divVis.style.left = "-100vw";
    hVis.style.left = "-100vw";
    divVis.style.opacity = "0";
    hVis.style.opacity = "0";
    const nextDivVis = divSteps[stepCounter + 1];
    const nextDivVisClass = nextDivVis.classList[0];
    const nextHVis = document.querySelector(`h1.${nextDivVisClass}`);
    nextDivVis.style.left = "0";
    nextHVis.style.left = "0";
    nextDivVis.style.opacity = "1";
    nextHVis.style.opacity = "1";
    stepCounter++;
    updateDots();
}

function changeStepBack() {
    stepCounter--;
    if (stepCounter < 0) {
        window.location.href = "dreamslist";
        return;
    }
    const divVis = divSteps[stepCounter + 1];
    const divVisClass = divVis.classList[0];
    const hVis = document.querySelector(`h1.${divVisClass}`);
    divVis.style.left = "100vw";
    hVis.style.left = "100vw";
    divVis.style.opacity = "0";
    hVis.style.opacity = "0";
    const nextDivVis = divSteps[stepCounter];
    const nextDivVisClass = nextDivVis.classList[0];
    const nextHVis = document.querySelector(`h1.${nextDivVisClass}`);
    nextDivVis.style.left = "0";
    nextHVis.style.left = "0";
    nextDivVis.style.opacity = "1";
    nextHVis.style.opacity = "1";
    updateDots();
}

function changeToInvalidInput() {
    const invalidInput = document.querySelector(".dream-form__form__input:invalid");
    if (invalidInput) {
        divSteps.forEach((div) => {
            const divClass = div.classList[0];
            const hVis = document.querySelector(`h1.${divClass}`);
            div.style.left = "100vw";
            hVis.style.left = "100vw";
            div.style.opacity = "0";
            hVis.style.opacity = "0";
        })
        const divVis = divSteps[0];
        const divVisClass = divVis.classList[0];
        const hVis = document.querySelector(`h1.${divVisClass}`);
        divVis.style.left = "0";
        hVis.style.left = "0";
        divVis.style.opacity = "1";
        hVis.style.opacity = "1";
        stepCounter = 0;
        updateDots();
    }
}

//TODO: add invalid class to story element
function addErrorClass() {
    requiredElements.forEach((elem) => {
        if (elem.value == null || elem.value == "") {
            elem.classList.add('not-valid');
        }
    })
}

function calculateMoon(date) {
    const months = [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec"
    ];

    let y = date.getFullYear();
    let m = date.getMonth();
    let d = date.getDate();
    const phases = ['new_moon', 'waxing_crescent', 'first_quarter', 'waxing_gibbous', 'full_moon', 'waning_gibbous', 'last_quarter', 'waning_crescent'];
    let c = e = jd = b = 0;

    if (m < 3) {
        y--;
        m += 12;
    }

    ++m;
    c = 365.25 * y;
    e = 30.6 * m;
    jd = c + e + d - 694039.09;
    jd /= 29.5305882;
    b = parseInt(jd);
    jd -= b;
    b = Math.round(jd * 8);

    if (b >= 8) b = 0;
    const moonphaseSection = document.querySelector('.moon-phase-section');
    const moonphaseTitle = moonphaseSection.querySelector('.section__header');
    moonphaseTitle.textContent = d + " " + months[date.getMonth()] + " " + (y + 1);
    moonphaseSection.querySelector('.moon-phase__name').textContent = phases[b].replace("_", " ");
    moonphaseSection.querySelector('.moon-phase__img img').src = '/public/img/moon_phases/' + phases[b] + '.svg';
    moonphaseSection.querySelector('.moon-phase__img img').alt = phases[b].replace("_", " ");
}

nightmareIcons.forEach((icon) =>
    icon.addEventListener("click", changeIconIfChecked)
);

textareas.forEach((area) => {
    area.addEventListener("input", resizeTextarea);
});

document.getElementById('date').valueAsDate = window.sessionStorage.getItem('dateVal') ? new Date(window.sessionStorage.getItem('dateVal')) : new Date();

calculateMoon(document.getElementById('date').valueAsDate);

btns.forEach((btn) => {
    btn.addEventListener("click", () => {
        changeStep();
    });
})

document.querySelector(".step-back").addEventListener("click", changeStepBack);

document.querySelector(".save-btn").addEventListener("click", changeToInvalidInput);

//prevent default event for invalid and add custom behaviour
document.addEventListener('invalid', (e) => {
    e.preventDefault();
    addErrorClass();
}, true);

document.getElementById('date').addEventListener("change", () => calculateMoon(document.getElementById('date').valueAsDate));