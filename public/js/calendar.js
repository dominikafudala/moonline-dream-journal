const date = new Date();
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
            newDiv.classList.add('day--clicked');
        } else {
            newDiv = createNewDateElement('', i, dateNew);
        }

        days.push(newDiv);
    }

    let monthNext = 1;

    for (let i = dayOfWeekEnd + 1; i <= 7; i++) {
        const dateNew = new Date(date.getFullYear(), date.getMonth() - 1, monthNext);
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
    document.querySelectorAll('.calendar__days div').forEach(div => {
        div.classList.remove('day--clicked');
    })
    const elemType = e.target.nodeName;
    if (elemType === "DIV") {
        e.target.classList.add('day--clicked');
    } else {
        e.target.parentElement.classList.add('day--clicked');
    }
}

function fetchDreamsByDate() {
    const currentDay = document.querySelector('.day--clicked');
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
        dreamsContainer.innerHTML = "";
        loadDreams(dreams);
    });
}

function loadDreams(dreams) {
    dreams.forEach(dream => {
        createDream(dream);
    });
}

function createDream(dream) {
    const template = document.querySelector("#dream-template");
    const clone = template.content.cloneNode(true);

    const a = clone.querySelector(".dreams__dream-day__dream");
    a.setAttribute("data-dreamid", dream.dreamID);

    const h1 = a.querySelector(".dreams__dream-day__dream__title");
    h1.textContent = dream.title;

    const p = a.querySelector(".dreams__dream-day__dream__story");
    p.textContent = dream.story;

    dreamsContainer.appendChild(clone);
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