/******/ (() => { // webpackBootstrap
/*!**********************************!*\
  !*** ./resources/js/pollView.js ***!
  \**********************************/
function saveVote(optionId, poll_id) {
  localStorage.setItem('voted_option', "".concat(optionId, "_").concat(poll_id));
}
function getVotedOption() {
  return localStorage.getItem('voted_option');
}
function updateVotes() {
  fetch("/poll/".concat(pollId, "/votes")).then(function (response) {
    if (!response.ok) {
      throw new Error('Erro ao buscar os votos');
    }
    return response.json();
  }).then(function (data) {
    data.forEach(function (option) {
      var optionElement = document.getElementById("".concat(option.id, "-vote"));
      optionElement.innerText = "".concat(option.votes);
    });
  })["catch"](function (error) {
    console.error(error);
  });
}
var pollId = document.querySelector('.poll-container').getAttribute('data-poll-id');
document.querySelectorAll('input[name="options"]').forEach(function (input) {
  input.addEventListener('click', function () {
    var _this = this;
    var optionId = this.getAttribute('id');
    var previousVote = getVotedOption();
    if (previousVote && previousVote.split('_')[1] === pollId) {
      alert('Você já votou nesta enquete!');
      return;
    }
    console.log('Votando na opção:', optionId);
    var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    fetch("/pollOption/".concat(optionId), {
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': token,
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
        optionId: optionId
      })
    }).then(function (response) {
      if (response.ok) {
        console.log('Voto registrado com sucesso!');
        updateVotes();
        saveVote(optionId, pollId);
        _this.style.backgroundColor = 'lightgray';
      } else {
        console.log('Erro ao registrar o voto.');
        console.log(response);
      }
    })["catch"](function (error) {
      console.error('Erro:', error);
      console.log('Erro ao registrar o voto.');
    });
  });
});
/******/ })()
;