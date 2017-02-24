var button1 = document.getElementById("button1");
var button2 = document.getElementById("button2");
var button3 = document.getElementById("button3");
var button4 = document.getElementById("button4");
var button5 = document.getElementById("button5");
// var resetButton = document.getElementById("resetButton");

button1.addEventListener("click", function() {
    check(button1, achi1);
});
button2.addEventListener("click", function() {
    check(button2, achi2);
});
button3.addEventListener("click", function() {
    check(button3, achi3);
});
button4.addEventListener("click", function() {
    check(button4, achi4);
});
button5.addEventListener("click", function() {
    check(button5, achi5);
});
// resetButton.addEventListener("click", reset);

var achi1 = {completed: 0}
var achi2 = {completed: 0}
var achi3 = {completed: 0}
var achi4 = {completed: 0}
var achi5 = {completed: 0}
// var points = 0;
var achievements = [achi1, achi2, achi3, achi4, achi5];
var buttons = [button1, button2, button3, button4, button5];

function check(button, achi) {
  if (achi.completed == 0) {
    // points += 10;
    button.classList.add("complete");
    achi.completed = 1;
  } else {
    // points -= 10;
    button.classList.remove("complete");
    achi.completed = 0;
  }
  // update();
}

function update() {
  // score.innerHTML = points;
}

/*
function reset() {
  points = 0;
  for (var i = 0; i < achievements.length; i++) {
    achievements[i].completed = 0;
  }
  for (var j = 0; j < buttons.length; j++) {
    buttons[j].classList.remove("complete");
  }
  update();
}
*/
