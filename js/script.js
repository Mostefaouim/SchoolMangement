const alerts = document.querySelectorAll(".alert");

alerts.forEach((alert) => {
  setTimeout(() => {
    alert.style.display = "none"; // or any other action you want to perform
  }, 2000);
});

function fetchGrades(year) {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "fetch_devision.php?year=" + year, true);
  xhr.onload = function () {
    if (this.status == 200) {
      document.getElementById("grad").innerHTML = this.responseText;
    }
  };
  xhr.send();
}
