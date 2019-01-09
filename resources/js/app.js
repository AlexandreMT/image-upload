require('./bootstrap');

window.Vue = require('vue');

import Toasted from 'vue-toasted';

Vue.use(Toasted)

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

let Upform = Vue.component('upload-form', require('./components/UploadForm.vue').default);

import SaveImage from './components/SaveImage';

const app = new Vue({
    el: '#app',
    components: {SaveImage}
});
