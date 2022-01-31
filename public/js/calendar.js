const date = window.sessionStorage.getItem('dateVal') ? new Date(window.sessionStorage.getItem('dateVal')) : new Date();
const currentDate = new Date();
const dreamsContainer = document.querySelector('.dreams');

function createNewDateElement(className, num, date) {
    const div = document.createElement("div");
    if (className) div.classList.add(className);
    const time = document.createElement("time");
    const datetimeCal = [date.getFullYear(), date.getMonth() + 1, date.getDate()].join('-');
    time.setAttribute("datetime", datetimeCal);
    time.textContent = num;
    div.appendChild(time);
    return div;
}

function renderCalendar() {
    const daysCalendar = document.querySelector(".calendar__days");
    daysCalendar.innerHTML = '';
    let days = [];
    const monthNames = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December"
    ]
    date.setDate(1);

    const thisMonthLastDay = new Date(
        date.getFullYear(),
        date.getMonth() + 1, // month indexed from 0
        0 // getting last day of previous month
    )

    const lastDayCurrentMonth = thisMonthLastDay.getDate();

    const lastDayLastMonth = new Date(
        date.getFullYear(),
        date.getMonth(),
        0
    ).getDate();

    let dayOfWeekStart = date.getDay();
    let dayOfWeekEnd = thisMonthLastDay.getDay();

    if (dayOfWeekStart == 0) dayOfWeekStart = 7; // if date is sunday change index to 7
    if (dayOfWeekEnd == 0) dayOfWeekEnd = 7;

    for (let i = dayOfWeekStart - 1; i > 0; i--) {
        const dayNum = lastDayLastMonth - i + 1; // get numbers of previous month in chronological order
        const dateNew = new Date(date.getFullYear(), date.getMonth() - 1, dayNum);
        const newDiv = createNewDateElement('day--inactive', dayNum, dateNew);
        days.push(newDiv);
    }

    for (let i = 1; i <= lastDayCurrentMonth; i++) {
        const dateNew = new Date(date.getFullYear(), date.getMonth(), i);
        let newDiv;
        if (dateNew.getFullYear() === currentDate.getFullYear() &&
            dateNew.getMonth() === currentDate.getMonth() &&
            dateNew.getDate() === currentDate.getDate()
        ) {
            newDiv = createNewDateElement('day--today', i, dateNew);
        } else {
            newDiv = createNewDateElement('', i, dateNew);
        }

        days.push(newDiv);
    }

    let monthNext = 1;

    for (let i = dayOfWeekEnd + 1; i <= 7; i++) {
        const dateNew = new Date(date.getFullYear(), date.getMonth() + 1, monthNext);
        const newDiv = createNewDateElement('day--inactive', monthNext, dateNew);
        days.push(newDiv);
        monthNext++;
    }

    const monthHeader = document.querySelector(".calendar__nav__month h1");
    monthHeader.innerHTML = '';
    monthHeader.textContent = monthNames[date.getMonth()] + ' ' + date.getFullYear();

    days.forEach(elem => daysCalendar.appendChild(elem));

    document.querySelectorAll('.calendar__days div').forEach(div => div.addEventListener('click', e => {
        updateDateChoice(e);
        fetchDreamsByDate();
    }));
}

function updateDateChoice(e) {

    if (window.innerWidth >= 992) {
        const elemType = e.target.nodeName;
        if (elemType === "DIV") {
            if (e.target.classList.contains('day--clicked')) {
                e.target.classList.remove('day--clicked');
                showList();
                setDate();
                return;
            }
        } else {
            if (e.target.parentElement.classList.contains('day--clicked')) {
                e.target.parentElement.classList.remove('day--clicked');
                showList();
                setDate();
                return;
            }
        }
    }
    document.querySelectorAll('.calendar__days div').forEach(div => {
        div.classList.remove('day--clicked');
    })
    const elemType = e.target.nodeName;
    if (elemType === "DIV") {
        e.target.classList.add('day--clicked');
    } else {
        e.target.parentElement.classList.add('day--clicked');
    }
    setDate();
}

function fetchDreamsByDate() {
    const currentDay = document.querySelector('.day--clicked');
    if (currentDay) {
        const currentDate = currentDay.children[0].dateTime;

        const data = {
            date: currentDate
        };

        fetch("/date", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (dreams) {
            loadDreams(dreams, currentDate);
        });
    }
}

function loadDreams(dreams, currentDate) {
    dreamsContainer.innerHTML = "";
    const divDate = document.createElement("div");
    divDate.classList.add('dreams__dream-day');
    dreamsContainer.appendChild(divDate);
    const p = document.createElement("p");
    p.classList.add("dreams__dream-day__date");
    const splitDate = currentDate.split("-");
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
    p.textContent = splitDate[2] + " " + months[splitDate[1] - 1] + " " + splitDate[0];
    divDate.appendChild(p);
    if (dreams.length <= 0) {
        createDummyDream(divDate);
    } else {
        dreams.forEach(dream => {
            createDream(dream, divDate);
        });

        addOptions();
        preventLoadOnDelete();
    }
}

function createDream(dream, div) {
    const template = document.querySelector("#dream-template");
    const clone = template.content.cloneNode(true);

    const a = clone.querySelector(".dreams__dream-day__dream");
    a.setAttribute("data-dreamid", dream.dreamID);
    a.setAttribute("href", "dream/" + dream.dreamID);

    const h1 = a.querySelector(".dreams__dream-day__dream__title");
    h1.textContent = dream.title;

    const p = a.querySelector(".dreams__dream-day__dream__story");
    p.textContent = dream.story;

    div.appendChild(clone);
}

function createDummyDream(div) {
    const template = document.querySelector("#dream-template");
    const clone = template.content.cloneNode(true);

    const a = clone.querySelector(".dreams__dream-day__dream");

    const h1 = a.querySelector(".dreams__dream-day__dream__title");
    h1.textContent = "No dreams were added that day...";

    const p = a.querySelector(".dreams__dream-day__dream__story");
    p.textContent = "If you remember your dream add it!";

    div.appendChild(clone);
}

document.querySelector('.prev').addEventListener('click', () => {
    date.setMonth(date.getMonth() - 1);
    renderCalendar();
})

document.querySelector('.next').addEventListener('click', () => {
    date.setMonth(date.getMonth() + 1);
    renderCalendar();
})

renderCalendar();
fetchDreamsByDate();

if (window.sessionStorage.getItem('dateVal')) {
    showCalendar();
}