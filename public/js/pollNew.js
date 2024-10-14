/******/ (() => { // webpackBootstrap
/*!*********************************!*\
  !*** ./resources/js/pollNew.js ***!
  \*********************************/
function updateRemoveButtons() {
  var removeButtons = document.querySelectorAll('.remove-option-btn');
  removeButtons.forEach(function (btn) {
    btn.style.display = 'inline-block';
    btn.addEventListener('click', function () {
      btn.parentElement.remove();
      updatePlaceholders();
    });
  });
}
function updatePlaceholders() {
  var options = document.querySelectorAll('#options-container input[type="text"]');
  options.forEach(function (option, index) {
    option.placeholder = "Op\xE7\xE3o ".concat(index + 1);
  });
}
function confirmDelete() {
  return confirm('Tem certeza que quer DELETAR a votação?');
}
document.getElementById('add-option').addEventListener('click', function () {
  var optionsContainer = document.getElementById('options-container');
  var optionCount = optionsContainer.children.length + 1;
  var newOption = document.createElement('div');
  newOption.classList.add('input-field');
  newOption.innerHTML = "\n      <input type=\"text\" name=\"options[]\" placeholder=\"Op\xE7\xE3o ".concat(optionCount, "\" required />\n      <button type=\"button\" class=\"remove-option-btn\">-</button>\n    ");
  optionsContainer.appendChild(newOption);
  updateRemoveButtons();
});
updateRemoveButtons();
/******/ })()
;