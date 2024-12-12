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