const modal = document.getElementById('modal');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

document.querySelector('.note-preview').addEventListener('click', function(e) {
    modal.style.display = "block";
});

function closeModal() {
    modal.style.display = 'none';
}