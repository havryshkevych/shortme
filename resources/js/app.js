require('./bootstrap');
import 'flatpickr';
import moment from 'moment';

require('flatpickr/dist/themes/material_blue.css');
const datePick = flatpickr('.flatpickr', {
    minDate: moment().add(6, 'minutes').format('YYYY-MM-DD H:m'),
    defaultTime: moment().add(6, 'minutes').format('H:m'),
    minuteIncrement: 1,
    enableTime: true,
    time_24hr: true
});

const copyToClipboard = str => {
    const el = document.createElement('textarea');
    el.value = str;
    document.body.appendChild(el);
    el.select();
    document.execCommand('copy');
    document.body.removeChild(el);
};

const clear_button = document.querySelector('.data-clear');
if (clear_button) {
    clear_button.addEventListener('click', function() {
        datePick.clear();
    });
}

const url = document.querySelector('#short_url');
if (url) {
    url.addEventListener('click', function () {
        copyToClipboard(this.querySelector('span').textContent);
        url.querySelector('#copied-badge').classList.add("d-inline-flex");
        url.querySelector('#copied-badge').classList.remove("hidden");
    })
}
