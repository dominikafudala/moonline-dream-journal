const nightmareIcons = document.querySelectorAll('.nightmare__checkbox');
const textareas = document.querySelectorAll(".input--longer");

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

nightmareIcons.forEach((icon) =>
    icon.addEventListener("click", changeIconIfChecked)
);

textareas.forEach((area) =>
    area.addEventListener("input", resizeTextarea)
);