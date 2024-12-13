const modal = document.getElementById('modal');
const sidebar = document.getElementById('click-off');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    // If clicking off modal
    if (event.target == modal) {
        modal.style.display = "none";
    }
    // If clicking off sidebar
    if (event.target == sidebar) {
        sidebar.style.display = "none";
        document.getElementById('sidebar').style.transform = 'translateX(-100%)';
    }
}

document.querySelector('.note-preview').addEventListener('click', function(e) {
    modal.style.display = "block";
});

function closeModal() {
    modal.style.display = 'none';
}