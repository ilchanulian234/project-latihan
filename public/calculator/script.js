const display = document.getElementById("display");

function clearDisplay() {
  display.value = "";
}

function deleteLast() {
  display.value = display.value.slice(0, -1);
}

function appendValue(value) {
  display.value += value;
}

function calculate() {
  try {
    // Replace symbols for eval
    let expression = display.value
      .replace(/\//g, "/")
      .replace(/\*/g, "*")
      .replace(/÷/g, "/")
      .replace(/×/g, "*");
    let result = eval(expression);
    display.value = result;
  } catch (error) {
    display.value = "Error";
  }
}

// Keyboard support (optional, preserves basic features)
document.addEventListener("keydown", function (event) {
  if ((event.key >= "0" && event.key <= "9") || event.key === ".") {
    appendValue(event.key);
  } else if (
    event.key === "+" ||
    event.key === "-" ||
    event.key === "*" ||
    event.key === "/"
  ) {
    appendValue(event.key);
  } else if (event.key === "Enter" || event.key === "=") {
    calculate();
  } else if (event.key === "Escape" || event.key === "c" || event.key === "C") {
    clearDisplay();
  } else if (event.key === "Backspace") {
    deleteLast();
  }
});
