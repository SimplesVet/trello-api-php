<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Get your Trello API Token</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <style type="text/css">
        .get {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <h1 class="text-center">Get your Trello API Token!</h1>
        <p class="text-center">You need to login into Trello to get a token key and start using Trello API.</p>
        <p class="text-center">All Trello actions done by API will appears like made by the user used on this authentication</p>
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group create">
                <label for="appname">Put your application name here!</label>
                <input type="email" class="form-control" id="appname" placeholder="Application Name">
            </div>
            <div class="form-group get">
                <label for="appname">Here is your API Token! Enjoy!</label>
                <input class="form-control" type="text" placeholder="" id="apiToken" readonly>
            </div>
            <button type="button" class="btn btn-primary btn-lg btn-block" id="getButton">Get your API key!</button>
            <small class="text-center disclaimer">You'll be redirected to Trello's authentication page and we'll be back with your token!</small>
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://trello.com/1/client.js?key=YOUR-KEY-HERE-123"></script>
    <script type="text/javascript">
        function showToken () {
            if (localStorage.getItem('trello_token')) {
                $(".create, #getButton, .disclaimer").hide();
                $(".get").show();
                $("#apiToken").val(localStorage.getItem('trello_token'));
            }
        };
        showToken()

        $("#getButton").on('click', function () {
                Trello.authorize({
                    name: ($("#appname").val()) ? $("#appname").val() : "Test Application",
                    scope: {
                        read: true,
                        write: true 
                    },
                    expiration: "never"
                });
        })
    </script>
</body>
</html>