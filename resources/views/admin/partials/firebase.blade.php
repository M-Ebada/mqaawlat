@auth()
    <script src="{{asset("backend/firebase/firebase-app.js")}}"></script>
    <script src="{{asset("backend/firebase/firebase-messaging.js")}}"></script>
    <script type="text/javascript">
        @include("admin.partials.init_firebase")
    </script>
    <script type="text/javascript">
        const messaging = firebase.messaging();
        toastr.options.escapeHtml = false;
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register("{{route('admin.firebase.init')}}").then((registration) => {
                messaging.useServiceWorker(registration);
                messaging.requestPermission()
                    .then(function () {
                        getRegToken();
                    })
                    .catch(function (err) {
                        console.log('Unable to get permission to notify.', err);
                    });
                messaging.onMessage(function (payload) {
                    toastr.info(payload.data.title + '<br />' + payload.data.body);
                    let sound = new Audio('{{asset('backend/audio/audio-notification.mpeg')}}')
                    sound.play();
                    let notificationTitle = payload.data.title;
                    let notificationOptions = {
                        body: payload.data.body,
                        icon: payload.data.icon,
                        image: payload.data.image
                    };
                    new Notification(notificationTitle, notificationOptions);
                });
            });
        }

        function getRegToken(argument) {
            messaging.getToken().then(function (currentToken) {
                if (currentToken) {
                    saveToken(currentToken);
                } else {
                    console.log('No Instance ID token available. Request permission to generate one.');
                }
            }).catch(function (err) {
                console.log('An error occurred while retrieving token. ', err);
            });
        }

        function saveToken(currentToken) {
            axios.put('{{route("admin.update-device-token")}}', {
                'device_token': currentToken,
            });
        }

    </script>
@endauth
