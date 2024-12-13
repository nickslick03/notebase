function expandSidebar() {
    document.getElementById('sidebar').style.transform = 'translateX(0%)';
    document.getElementById('click-off').style.display = 'block';
}

function editInformation() {
    const hiddenInputs = document.getElementsByClassName('hidden');
    const inputs = [].slice.call(hiddenInputs);
    inputs.forEach(input => {
        if(input.style.display === 'none' || input.style.display.length === 0) input.style.display = 'flex';
        else input.style.display = 'none';
    });
}

function openDeleteForm() {
    const deleteForm = document.getElementById('delete-form');
    if(deleteForm.style.display === 'none') deleteForm.style.display = 'flex';
    else deleteForm.style.display = 'none';
}