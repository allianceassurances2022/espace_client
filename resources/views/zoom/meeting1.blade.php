<!DOCTYPE html>

<head>
    <title>Zoom WebSDK</title>
    <meta charset="utf-8" />
    <link type="text/css" rel="stylesheet" href="js/lib/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="js/lib/react-select.css" />
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="origin-trial" content="">
</head>
<style type="text/css">
    #zmmtg-root {
        position: relative;
        top: 8px;
        right: 8px;
        display: block;
    }

</style>

<body>
    </div>

    <div id="meetingSDKElement"></div>
    <br>
    <div id="zmmtg-root" style="right: 8px;display: block;margin-top: 62px;"></div>
    <br>
    <br>
    <div id="aria-notify-area"></div>




    <script src="{{ asset('assets/js/lib/react.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/react-dom.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/redux.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/redux-thunk.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/lodash.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/zoom-meeting-2.1.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/zoom-meeting-embedded-2.1.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/tool.js') }}"></script>
    <script src="{{ asset('assets/js/vconsole.min.js') }}"></script>
    <script src="assets/js/tool.js"></script>
    <script src="assets/js/vconsole.min.js"></script>
    <script src="assets/js/meeting.js"></script>


    <script>
        document.getElementById("side-menu").style.display = "none";
        document.getElementById("menu-button").style.display = "none";
        document.getElementById("zmmtg-root").style.top = "70px";
    </script>

    <script>
        var meetingNumber = 0;
        var signature = '';

        $.ajax({
            type: "POST",
            url: "https://demo.adexcloud.dz/api/zoommeeting/1",
            success: function(res) {
                if (res) {
                    console.log(res);
                    result = JSON.parse(res);

                    meetingNumber = result['meeting_id'];
                    signature = result['signature'];
                    password = result['password'];
                    ZoomMtg.preLoadWasm();
                    ZoomMtg.prepareWebSDK();
                    ZoomMtg.i18n.load('fr-FR');
                    ZoomMtg.i18n.reload('fr-FR');
                    ZoomMtg.setZoomJSLib('https://source.zoom.us/2.1.1/lib', '/av');

                    const client = ZoomMtgEmbedded.createClient();
                    let meetingSDKElement = document.getElementById('zmmtg-root');

                    client.init({
                        debug: true,
                        zoomAppRoot: meetingSDKElement,
                        language: 'en-US',
                        customize: {
                            meetingInfo: ['topic', 'host', 'mn', 'pwd', 'telPwd', 'invite',
                                'participant', 'dc', 'enctype'
                            ],
                            toolbar: {
                                buttons: [{
                                    text: 'Custom Button',
                                    className: 'CustomButton',
                                    onClick: () => {
                                        console.log('custom button');
                                    }
                                }]
                            }
                        }
                    });

                    /*
                    xhttp.open("GET", "http://localhost/siggen.php?role=1&mn=98964723608",false);
                    */

                    client.join({
                        apiKey: "XiTA_uUqToafY8cefEIedQ",
                        signature: signature,
                        meetingNumber: meetingNumber,
                        password: password,
                        userName: "Alliance assurances"
                    })





                }


            },
            error: function(e) {
                console.log(e)
            }
        });
    </script>

</body>

</html>
