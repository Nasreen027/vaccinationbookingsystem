const updateAge = () => {
    const birthdateInput = document.getElementById("birthdate");
    const birthdate = new Date(birthdateInput.value);

    if (isNaN(birthdate)) {
        document.getElementById("result").innerText = " ";
        return;
    }

    const today = new Date();
    const ageInMilliseconds = today - birthdate;
    const ageInYears = ageInMilliseconds / (365.25 * 24 * 60 * 60 * 1000);
    const age = Math.floor(ageInYears);

    document.getElementById("result").innerText = `${age}`;
};

const birthdateInput = document.getElementById("birthdate");
birthdateInput.addEventListener("change", updateAge);

updateAge();
document.getElementById("appointment").addEventListener("change", function() {
  const selectedDate = new Date(this.value);

  const daysOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

  const dayOfWeekIndex = selectedDate.getDay();

  const dayOfWeekText = daysOfWeek[dayOfWeekIndex];

  document.getElementById("result2").innerText = `Selected day: ${dayOfWeekText}`;
});