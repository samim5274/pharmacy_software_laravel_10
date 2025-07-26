function calculateReturn() {
        const dueText = document.getElementById('due').innerText;
        const due = parseFloat(dueText.replace(/[^\d.-]/g, '')) || 0;

        const received = parseFloat(document.getElementById('received').value) || 0;

        const returnBox = document.getElementById('return-output');
        const returnText = document.getElementById('return-amount');

        if (received > due) {
            const returnAmount = received - due;
            returnText.innerText = returnAmount.toFixed(2);
            returnBox.classList.remove('d-none');
            returnBox.classList.remove('alert-danger');
            returnBox.classList.add('alert-info');
            returnBox.innerHTML = `Return Amount: <strong>৳<span id="return-amount">${returnAmount.toFixed(2)}</span></strong>`;
        } else if (received < due) {
            const remainingDue = due - received;
            returnBox.classList.remove('d-none');
            returnBox.classList.remove('alert-info');
            returnBox.classList.add('alert-danger');
            returnBox.innerHTML = `Due Amount: <strong>৳${remainingDue.toFixed(2)}</strong>`;
        } else {
            returnBox.classList.add('d-none');
        }
    }