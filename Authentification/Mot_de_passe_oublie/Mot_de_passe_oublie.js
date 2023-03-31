var button = document.getElementById("myButton");
var popup = document.getElementById("myPopup");
var closeButton = document.getElementById("closeButton");

button.onclick = function() {
	popup.style.display = "block";
};

closeButton.onclick = function() {
	popup.style.display = "none";
};