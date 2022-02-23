window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });



window.Vue = require('vue');




//不懂prototype
// if Admin,just return true???
//不懂handler。。
Vue.prototype.authorize = function (handler) {

    //let关键字的用法。。
 /*   var的作用域是会提升的，var声明的变量只能是全局的或者是整个函数块的。
let则允许声明一个作用域被限制在块级中的变量、语句或者表达式。*/
    let user = window.App.user;

   /* if(! user) return false;
    return handler(user);*/

    return user ? handler(user) : false;
};



window.events = new Vue();
window.flash = function (message,level = 'success') {
    window.events.$emit('flash',{ message,level });

};
