const steps = document.querySelectorAll(".step");
const nextBtns = document.querySelectorAll(".next");
const prevBtns = document.querySelectorAll(".prev");
const progressBar = document.getElementById("progressBar");
let currentStep = 0;

nextBtns.forEach(btn => {
  btn.addEventListener("click", () => {
    steps[currentStep].classList.add("d-none");
    currentStep++;
    steps[currentStep].classList.remove("d-none");
    updateProgress();
  });
});

prevBtns.forEach(btn => {
  btn.addEventListener("click", () => {
    steps[currentStep].classList.add("d-none");
    currentStep--;
    steps[currentStep].classList.remove("d-none");
    updateProgress();
  });
});

function updateProgress() {
  const progress = ((currentStep + 1) / steps.length) * 100;
  progressBar.style.width = progress + "%";
}
