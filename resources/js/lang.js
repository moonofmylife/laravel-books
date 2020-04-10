import Vue from 'vue';
import Lang from 'lang.js';
import translations from './translations';

window.lang = Vue.prototype.lang = new Lang({
    messages: translations,
    locale: window.locale || 'ru',
    fallback: window.fallback || ''
});
