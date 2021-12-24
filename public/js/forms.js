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

//add error class to required and empty fields 
function addErrorClass() {
    requiredElements.forEach((elem) => {
        if (elem.value == null || elem.value == "") {
            console.log('invalid');
        }
    })
}

nightmareIcons.forEach((icon) =>
    icon.addEventListener("click", changeIconIfChecked)
);

textareas.forEach((area) =>
    area.addEventListener("input", resizeTextarea)
);

document.getElementById('date').valueAsDate = new Date();

btns.forEach((btn) =>
    btn.addEventListener("click", changeStep)
)

document.querySelector(".step-back").addEventListener("click", changeStepBack);

document.querySelector(".save-btn").addEventListener("click", changeToInvalidInput);

//prevent default event for invalid and add custom behaviour
document.addEventListener('invalid', (e) => {
    e.preventDefault();
    addErrorClass();
}, true);