$('.toggle-star').each(function () {
    const is_starred = $(this).find('[name="is_starred"]')[0].value === '1';

    console.log(is_starred);

    $(this).find(`[icon="star${is_starred ? '-border' : ''}"]`).addClass('d-none');
    
});

$('.toggle-star').on('submit', async function (e) {
    e.preventDefault();
    const formData = new FormData(this);
    const params = new URLSearchParams(formData);
    const res = await fetch(this.getAttribute('action'), {
        method: 'post',
        body: params
    });
    if (res.status <= 299) {
        ['star', 'star-border'].map(s => 
            $(this).find(`[icon="${s}"]`).toggleClass('d-none'));
    }
})