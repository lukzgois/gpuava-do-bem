if(typeof window.jQuery === 'undefined' || typeof window.$ === 'undefined') {
    window.jQuery = window.$ = require('jquery');
}

require('bootstrap-sass/assets/javascripts/bootstrap.js');

import Vue from 'vue';
Vue.use(require('vue-resource'));

var csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
Vue.http.headers.common['X-CSRF-TOKEN'] = csrf_token;

import gpUsers from './components/user/index.vue';

var app = new Vue({
    components: {
        gpUsers
    }
});

/**
 * In fearful day, in raging night,
 * with strong hearts full, our souls ignite.
 * When all seems lost in the War of Light,
 * Look to the stars, for hope burns bright!"
 */
app.$mount('body');