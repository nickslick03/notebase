$(async function () {
    const resource = $('#edit-resource [name="resource"]')[0].value;
    console.log(resource);
    const res = await fetch('/resource/get_data', {
        method: 'post',
        body: new URLSearchParams({
            _token: $('meta[name="csrf-token"]').attr('content'),
            resource
        })
    });
    const type = res.headers.get('Content-Type');
    const raw = await (type.includes('text') ? res.text() : res.blob());
        const [tag, attr] = type.includes('pdf')
        ? ['object', 'data']
        : type.includes('image')
        ? ['img', 'src']
        : ['pre', 'textContent'];
        const $object = $(`<${tag}>`);
        const data = !type.includes('text') ? URL.createObjectURL(raw) : raw;
        $object[0][attr] = data;
        $('#current-resource-display').append($object);
});