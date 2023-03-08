importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');

firebase.initializeApp({
    apiKey: "AIzaSyC7VzvIJmK5GDMbU0ag4dRoHTFmw1V1BWk",
    authDomain: "aninewstage.firebaseapp.com",
    projectId: "aninewstage",
    storageBucket: "aninewstage.appspot.com",
    messagingSenderId: "305785322749",
    appId: "1:305785322749:web:cfb4c13b56d761a0ef5294",
    measurementId: "G-0WV7E9QL4P"
});

const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function ({ data: { title, body } }) {
    return self.registration.showNotification(title, { body });
});