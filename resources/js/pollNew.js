function updateRemoveButtons() {
    const removeButtons = document.querySelectorAll('.remove-option-btn');
    removeButtons.forEach((btn) => {
        btn.style.display = 'inline-block';
        btn.addEventListener('click', function () {
            btn.parentElement.remove();
            updatePlaceholders();
        });
    });
}
function updatePlaceholders() {
    const options = document.querySelectorAll('#options-container input[type="text"]');
    options.forEach((option, index) => {
        option.placeholder = `Opção ${index + 1}`;
    });
}

function confirmDelete() {
    return confirm('Tem certeza que quer DELETAR a votação?');
}
document.getElementById('add-option').addEventListener('click', function () {
    const optionsContainer = document.getElementById('options-container');
    const optionCount = optionsContainer.children.length + 1;

    const newOption = document.createElement('div');
    newOption.classList.add('input-field');
    newOption.innerHTML = `
      <input type="text" name="options[]" placeholder="Opção ${optionCount}" required />
      <button type="button" class="remove-option-btn">-</button>
    `;
    optionsContainer.appendChild(newOption);

    updateRemoveButtons();
});
updateRemoveButtons();
