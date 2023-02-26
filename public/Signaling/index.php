<!DOCTYPE html>
<html>

<head>
    <title> OpenTok Signaling Sample </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://static.opentok.com/v2/js/opentok.min.js"></script>
    <!-- Polyfill for fetch API so that we can fetch the sessionId and token in IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@7/dist/polyfill.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fetch/2.0.3/fetch.min.js" charset="utf-8"></script>
    <link href="css/app.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        #subscriber{
            display: block;
        }
        .OT_subscriber{
            max-height: 48%;
            max-width: 48%;
            display: inline-block;
        }
        @media only screen and (max-width: 767px){
            .OT_subscriber {
                max-height: 24%;
                max-width: 48%;
            }
            #textchat {
                position: fixed!important;
                width: 45%!important;
                float: right;
                right: 38px;
                height: 28%;
                background-color: #333;
                bottom: 10px;
                z-index: 999;
            }
            #videos {
                width: 100%;
            }
            #publisher{
                position: fixed;
                width: 154px;
                height: 173px;
                bottom: 10px;
                left: 1px;
            }
            #subscriber{
                margin-left: 0px!important;
                width: 95%;
            }
            input#msgTxt{
                width: 96%!important;
            }
        }
    </style>
</head>

<body>

    <div id="videos">
        <div id="subscriber"></div>
        <div id="publisher"></div>
    </div>

    <div id="textchat">
         <p id="history"></p>
         <form>
              <input type="text" placeholder="Input your text here" id="msgTxt"></input>
         </form>
    </div>

    <!-- Credit to Tim Holman for the Github corners http://tholman.com/github-corners/ -->


    <script>
    /* eslint-disable no-unused-vars */

// Make a copy of this file and save it as config.js (in the js directory).

// Set this to the base URL of your sample server, such as 'https://your-app-name.herokuapp.com'.
// Do not include the trailing slash. See the README for more information:

var SAMPLE_SERVER_BASE_URL = 'https://admin.khannajeweller.com/Signaling/';

// OR, if you have not set up a web server that runs the learning-opentok-php code,
// set these values to OpenTok API key, a valid session ID, and a token for the session.
// For test purposes, you can obtain these from https://tokbox.com/account.

var API_KEY = '47381671';
var SESSION_ID = '2_MX40NzM4MTY3MX5-MTYzNzY1MTA0MzAzOX41TDR4SnlEUTJLTDRBTkVEYXZnVUZBdGd-QX4';
var TOKEN = 'T1==cGFydG5lcl9pZD00NzM4MTY3MSZzaWc9ZjE4NGFlOTNmZjNhNTFiOTIyYTcwMzUxMzc0YjhiYzM4YmUxYmE0MTpzZXNzaW9uX2lkPTJfTVg0ME56TTRNVFkzTVg1LU1UWXpOelkxTVRBME16QXpPWDQxVERSNFNubEVVVEpMVERSQlRrVkVZWFpuVlVaQmRHZC1RWDQmY3JlYXRlX3RpbWU9MTYzNzY1MTA0MiZyb2xlPW1vZGVyYXRvciZub25jZT0xNjM3NjUxMDQyLjY3ODczMzA5MTgxMCZleHBpcmVfdGltZT0xNjM4MjU1ODQyJmNvbm5lY3Rpb25fZGF0YT1uYW1lJTNEdmlyZW4ra3VtYXI=';

    </script>
    <script type="text/javascript" src="js/app.js"></script>
</body>

</html>
