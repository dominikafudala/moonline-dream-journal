const toggleList = document.querySelector(".toggle__list");
const toggleCalendar = document.querySelector(".toggle__calendar");
const btnAddDream = document.querySelector(".link-btn-add-dream");

function deleteDream(e) {
    const dreamElem = e.target.parentElement.tagName == "DIV" ? e.target.parentElement.parentElement : e.target.parentElement;
    const dreamId = dreamElem.dataset.dreamid;
    fetch(`/delete/${dreamId}`).then(() => location.reload());
}

function toggleActiveOptions(e) {
    e.preventDefault();
    let dreamClicked = e.target.parentElement;
    if (dreamClicked.tagName == "DIV") dreamClicked = dreamClicked.parentElement;
    if (!dreamClicked.classList.contains('options-dream')) {
        dreamClicked.classList.add('options-dream');
        const deleteDiv = document.createElement('div');
        deleteDiv.classList.add('options');
        const i = document.createElement('i');
        i.classList.add('fas');
        i.classList.add('fa-trash-alt');
        deleteDiv.appendChild(i);
        const p = document.createElement('p');
        p.textContent = 'Delete';
        deleteDiv.appendChild(p);
        deleteDiv.addEventListener('click', deleteDream);
        dreamClicked.appendChild(deleteDiv);
    } else {
        dreamClicked.classList.remove('options-dream');
        const deleteDiv = document.querySelector('.options');
        deleteDiv.remove();
    }

}

function addOptions() {
    const optionDiv = document.querySelectorAll(".dreams__dream-day__dream__options");

    optionDiv.forEach(
        (div) => {
            div.addEventListener("click", toggleActiveOptions);
        }
    )
}

function showCalendar() {

    if (window.sessionStorage.getItem('dateVal')) {
        const timeElem = document.querySelector(`time[datetime = '${window.sessionStorage.getItem('dateVal')}']`);
        timeElem.parentElement.classList.add("day--clicked");
    } else {
        const currentDateDiv = document.querySelector(".day--today");
        currentDateDiv.classList.add("day--clicked");
    }
    const calendar = document.querySelector('.calendar');
    calendar.classList.remove("--inactive");
    toggleList.classList.remove("toggle--active");
    toggleCalendar.classList.add("toggle--active");

    setDate();

    fetchDreamsByDate();
}

function showList() {
    const dreamsContainer = document.querySelector('.dreams');
    dreamsContainer.innerHTML = "";
    const calendar = document.querySelector('.calendar');
    calendar.classList.add("--inactive");
    const activeDay = document.querySelector(".day--clicked");
    if (activeDay) activeDay.classList.remove("day--clicked");
    const templateDreams = document.querySelector("#dreamslist");
    dreamsContainer.innerHTML = templateDreams.innerHTML;
    toggleCalendar.classList.remove("toggle--active");
    toggleList.classList.add("toggle--active");

    setDate();
}

function setDate() {
    const activeDay = document.querySelector(".day--clicked");
    if (activeDay) {
        window.sessionStorage.setItem('dateVal', activeDay.querySelector('time').dateTime);
    } else {
        window.sessionStorage.removeItem('dateVal');
    }
}

function preventLoadOnDelete() {
    document.querySelectorAll('.dreams__dream-day__dream').forEach((elem) => elem.addEventListener("click", (e) => {
        if (e.target.parentElement.classList.contains("options") || e.target.classList.contains("options"))
            e.preventDefault();
    }));
}

addOptions();
preventLoadOnDelete();

toggleList.addEventListener("click", showList);
toggleCalendar.addEventListener("click", showCalendar);

document.querySelector('.gear').addEventListener("click", () => {
    document.querySelector('.signout').classList.toggle('--inactive');
})

document.querySelector('.signout__btn').addEventListener("click", () => {
    window.sessionStorage.removeItem('dateVal');
    fetch('/signout');
})