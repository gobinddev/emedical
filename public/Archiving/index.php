<!DOCTYPE html>
<html>

<head>
    <title> OpenTok Archiving Sample </title>
    <link href="css/app.css" rel="stylesheet" type="text/css">

    <script src="https://static.opentok.com/v2/js/opentok.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>

    <div id="videos">
        <div id="subscriber"></div>
        <div id="publisher"></div>
    </div>
    <div id="buttonholder">
       <div id="buttons">
            <button type="button" id="start" onClick="javascript:startArchive()" class="btn btn-danger">Start Archive</button>
            <button type="button" id="stop" onClick="javascript:stopArchive()" class="btn btn-danger">Stop Archive</button>
            <button type="button" id="view" onClick="javascript:viewArchive()" class="btn btn-danger" disabled>View Archive</button>
       </div>
    </div>
    <!-- Credit to Tim Holman for the Github corners http://tholman.com/github-corners/ -->
    <a href="https://github.com/opentok/opentok-web-samples/tree/master/Archiving" class="github-corner" aria-label="View source on Github"><svg width="80" height="80" viewBox="0 0 250 250" style="fill:#fff; color:gray; position: absolute; top: 0; border: 0; left: 0; transform: scale(-1, 1);z-index:101;" aria-hidden="true"><path d="M0,0 L115,115 L130,115 L142,142 L250,250 L250,0 Z"></path><path d="M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2" fill="currentColor" style="transform-origin: 130px 106px;" class="octo-arm"></path><path d="M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,141.8 Z" fill="currentColor" class="octo-body"></path></svg></a><style>.github-corner:hover .octo-arm{animation:octocat-wave 560ms ease-in-out}@keyframes octocat-wave{0%,100%{transform:rotate(0)}20%,60%{transform:rotate(-25deg)}40%,80%{transform:rotate(10deg)}}@media (max-width:500px){.github-corner:hover .octo-arm{animation:none}.github-corner .octo-arm{animation:octocat-wave 560ms ease-in-out}}</style>

    <script>
    /* eslint-disable no-unused-vars */

// Make a copy of this file and save it as config.js (in the js directory).

// Set this to the base URL of your sample server, such as 'https://your-app-name.herokuapp.com'.
// Do not include the trailing slash. See the README for more information:

var SAMPLE_SERVER_BASE_URL = 'https://admin.khannajeweller.com/Signaling/';

// OR, if you have not set up a web server that runs the learning-opentok-php code,
// set these values to OpenTok API key, a valid session ID, and a token for the session.
// For test purposes, you can obtain these from https://tokbox.com/account.


    </script>
    <script type="text/javascript" src="js/app.js"></script>
</body>

</html>
