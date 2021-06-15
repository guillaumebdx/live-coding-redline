const addButtons = document.getElementsByClassName('add-bottle');

for (let i=0; i<addButtons.length; i++) {
    addButtons[i].addEventListener('click', () => {
        let bottleId = addButtons[i].dataset.id;
        fetch(addButtons[i].dataset.path, {method: 'POST'})
            .then(response => response.json())
            .then(data => document.getElementById('display-quantity-' + bottleId).innerHTML = data)
            .catch(() => alert('error'))
    })
}

const removeButtons = document.getElementsByClassName('remove-bottle');

for (let i=0; i<removeButtons.length; i++) {
    removeButtons[i].addEventListener('click', () => {
        let bottleId = addButtons[i].dataset.id;
        fetch(removeButtons[i].dataset.path, {method: 'POST'})
            .then(response => response.json())
            .then(data => document.getElementById('display-quantity-' + bottleId).innerHTML = data)
            .catch(() => alert('error'))
    })
}
