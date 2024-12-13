const all_course_rows = [...$('#courses tr')];
let hidden_course_rows = [];

$('#search-form').on('submit', function (e) {
    e.preventDefault();
    const search_text = $('#search-text')[0].value;
    if (search_text === '') {
        hidden_course_rows.forEach(tr => tr.classList.remove('d-none'));
    } else {
        hidden_course_rows = [];
        const search_regexp = new RegExp(`^${search_text}`, 'i');
        all_course_rows.forEach(tr => {
            const [subject_code, course_code, title] = ['subject_code', 'course_code', 'title'].map(key => tr.getAttribute(`data-${key}`));
            const searchables = [
                `${subject_code} ${course_code}`,
                course_code,
                ...title.split(' ')
            ];
            let isMatch = false;
            for (let searchable of searchables) {
                if (searchable.match(search_regexp) !== null) {
                    isMatch = true;
                    break;
                }
            }
            if (isMatch) {
                tr.classList.remove('d-none');
            } else {
                tr.classList.add('d-none');
                hidden_course_rows.push(tr);
            }
        });
    }
});

[...$('form[action="course/toggle"] button[type="submit"]')].forEach(button => {
    if (button.getAttribute('data-is_enrolled') === '1') {
        button.querySelector('[icon="add"]').classList.add('d-none');
    } else {
        button.querySelector('[icon="clear"]').classList.add('d-none');
    }
});

$('form[action="course/toggle"]').on('submit', async function (e) {
    e.preventDefault();

    $(this).find('button').attr('disabled');

    const _token = $(this).find('[name="_token"]')[0].value;
    const course = $(this).find('[name="course"]')[0].value;
    const add_input = $(this).find('[name="add"]')[0];


    const res = await fetch(this.getAttribute('action'), {
        method: 'post',
        body: new URLSearchParams({
            _token,
            course,
            add: add_input.value
        })
    });

    $(this).find('button').removeAttr('disabled');

    add_input.value = add_input.value === '1' ? '0' : '1';

    if (res.ok) {
        $(this).find('[icon="add"]')[0].classList.toggle('d-none');
        $(this).find('[icon="clear"]')[0].classList.toggle('d-none');
    }  else if (res.status === 419)  { // token timed out
        location.reload();
    }
});