const date = document.getElementById("date");
const time = document.getElementById("time");

function dateToday() {
    let today = new Date();
    let d = today.toLocaleString("en-us", {dateStyle: "full"});
    let t = today.toLocaleString("en-us", {timeStyle: "short"});
    date.innerHTML = d;
    time.innerHTML = t;
}
dateToday();
setInterval(dateToday, 1000);