function toggleActiveOptions(e) {
    e.preventDefault();
    console.log("Yeey");
}

const optionDiv = document.querySelectorAll(".dreams__dream-day__dream__options");

optionDiv.forEach(
    (div) => {
        div.addEventListener("click", toggleActiveOptions);
    }
)