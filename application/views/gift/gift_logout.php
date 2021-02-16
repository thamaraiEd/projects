<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="google-signin-client_id" content="810782999524-cqctupec1mck5f1inmpl6hpm3uqrlp69.apps.googleusercontent.com">
  <title>Logout</title>
</head>

<body>
  <h2>Signed out...</h2>
  <script src="https://apis.google.com/js/platform.js?onload=onLoadCallback" async defer>
  </script>
  <script>
    window.onLoadCallback = function() {
      gapi.load('auth2', function() {
        gapi.auth2.init().then(function() {
          var auth2 = gapi.auth2.getAuthInstance();
          auth2.signOut().then(function() {
            console.log("User logged out");
            // document.location.href = "<?php echo base_url(); ?>" + 'index.php';
          });
        });
      });
    };
  </script>
</body>

</html>