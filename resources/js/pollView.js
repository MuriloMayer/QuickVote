function saveVote(optionId, poll_id) {
localStorage.setItem('voted_option', `${optionId}_${poll_id}`);}

function getVotedOption() {
    return localStorage.getItem('voted_option');
}

function updateVotes() {
fetch(`/poll/${pollId}/votes`)
    .then(response => {
        if (!response.ok) {
            throw new Error('Erro ao buscar os votos');
        }
        return response.json();
    })
    .then(data => {
        data.forEach(option => {
const optionElement = document.getElementById(`${option.id}-vote`);
            optionElement.innerText = `${option.votes}`;
        });
    })
    .catch(error => {
        console.error(error);
    });
}
const pollId = document.querySelector('.poll-container').getAttribute('data-poll-id');
document.querySelectorAll('input[name="options"]').forEach((input) => {
    input.addEventListener('click', function() {
        const optionId = this.getAttribute('id');
        const previousVote = getVotedOption();

        if (previousVote && previousVote.split('_')[1] === pollId) {
            alert('Você já votou nesta enquete!');
            return;
        }
        console.log('Votando na opção:', optionId);
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        fetch(`/pollOption/${optionId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ optionId: optionId })
        }).then(response => {
            if (response.ok) {
                console.log('Voto registrado com sucesso!');
                updateVotes();
                saveVote(optionId, pollId);
                this.style.backgroundColor = 'lightgray';
            } else {
                console.log('Erro ao registrar o voto.');
                console.log(response);
            }
        }).catch(error => {
            console.error('Erro:', error);
            console.log('Erro ao registrar o voto.');
        });
    });
});
