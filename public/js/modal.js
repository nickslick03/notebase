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

$('.note-preview').on('click', async function () {
    const is_author = $(this).attr('data-is_author') === '1';
    if (is_author) {
        $('#modal-button-container .editable').removeClass('d-none');
        $('#edit-resource-anchor').attr('href', `/resource/edit/${$(this).attr('data-resource')}`);
        $('#delete-resource-field').attr('value', $(this).attr('data-resource'));
    } else {
        $('#modal-button-container .editable').addClass('d-none');
    }

    const resource = $(this).find('[name="resource"]')[0].value;
    const res = await fetch('/resource/get_data', {
        method: 'post',
        body: new URLSearchParams({
            _token: $('meta[name="csrf-token"]').attr('content'),
            resource
        })
    });
    if (res.ok) {
        modal.style.display = 'flex';
        $('#modal-data-container').empty();
        const type = res.headers.get('Content-Type');
        const filename = res.headers.get('Content-Disposition').replace('attachment; filename=', '');
        $('#filename').text(filename);

        const clone = res.clone();
        $('#modal-download').attr('href', URL.createObjectURL(await clone.blob()));
        $('#modal-download').attr('download', filename);

        const raw = await (type.includes('text') ? res.text() : res.blob());
        const [tag, attr] = type.includes('pdf')
        ? ['object', 'data']
        : type.includes('image')
        ? ['img', 'src']
        : ['pre', 'textContent'];
        const $object = $(`<${tag}>`);
        const data = !type.includes('text') ? URL.createObjectURL(raw) : raw;
        $object[0][attr] = data;
        $('#modal-data-container').append($object);
    } else if (res.status === 419)  { // token timed out
        location.reload();
    }
    console.log(res.statusText);
    
});

function closeModal() {
    modal.style.display = 'none';
}