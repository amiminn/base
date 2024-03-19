import AES from "crypto-js/aes";
import enc from "crypto-js/enc-utf8";
import JsCookie from "js-cookie";
import axios from "axios";

window.jsc = JsCookie;

window.encryptData = function (data) {
    try {
        return AES.encrypt(data, window.Laravel.app_key).toString();
    } catch (error) {
        console.error("harap ubah json ke string");
    }
};

window.decryptData = function (data) {
    return AES.decrypt(data, window.Laravel.app_key).toString(enc);
};

window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
window.axios.defaults.headers.common["X-CSRF-TOKEN"] = window.Laravel.csrfToken;
try {
    // window.axios.defaults.headers.common["Authorization"] =
    //     "Bearer " + decryptData(tokenBearer);
} catch (error) {}

import _ from "lodash";

window._ = _;

String.prototype.isMatch = function (s) {
    return this.match(s) !== null;
};

import Echo from "laravel-echo";

import Pusher from "pusher-js";
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: "pusher",
    key: "7430dd527b18cec39c6b",
    cluster: "ap1",
    forceTLS: true,
});

// example
// Echo.channel("chat").listen(".bubble.chat", (e) => {
//     console.log("listening event", e.callback);
// });

// npm i laravel-echo pusher-js lodash js-cookie crypto-js @inertiajs/vue3 @vitejs/plugin-vue
