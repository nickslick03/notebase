$('.toggle-star').each(function () {
    const is_starred = $(this).find('[name="is_starred"]')[0].value === '1';
    $(this).find(`[icon="star${is_starred ? '-border' : ''}"]`).addClass('d-none');
});

$('.toggle-star').on('click', function (e) {
    e.stopPropagation();
});

$('.toggle-star').on('submit', async function (e) {
    e.preventDefault();
    const formData = new FormData(this);
    const params = new URLSearchParams(formData);
    const res = await fetch(this.getAttribute('action'), {
        method: 'post',
        body: params
    });
    const is_starred = $(this).find('[name="is_starred"]')[0].value === '1';
    $(this).find('[name="is_starred"]')[0].value = is_starred ? 0 : 1;
    if (res.ok) {
        ['star', 'star-border'].map(s => 
            $(this).find(`[icon="${s}"]`).toggleClass('d-none'));
    }  else if (res.status === 419)  { // token timed out
        location.reload();
    }
});