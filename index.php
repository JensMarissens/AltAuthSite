<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="google-signin-client_id" content="482333476170-2c3djagippeh0uiep0s1ininqaa0rec8.apps.googleusercontent.com">
  <script src="https://apis.google.com/js/platform.js" async defer></script>

  <title>Alt Auth</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans">
  <link rel="stylesheet" href="css/styles.css">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto nav-fill w-100">
        <li class="nav-item">
          <a class="nav-link" href="">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Ons kantoor
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="">Wie zijn we</a>
            <a class="dropdown-item" href="">Ons team</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="">Onze partners</a>
          </div>
        </li>
        <li class="nav-item">
         <a class="nav-link" href="">Ons assortiment</a>
        </li>
        <li class="nav-item">
         <a class="nav-link" href="">Privacy</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="" tabindex="-1" aria-disabled="true">Contact</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-xs-6 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card text-white">
          <div class="card-body">
            <h3 class="card-title" id="status">Sign In</h3>
            <div class="g-signin2" data-onsuccess="onSignIn" style="display: flex; justify-content: space-around"></div>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-sm-12 col-md-12 col-lg-12 col-xl-12">
      <table class="table table-striped">
        <tr>
          <th>ID</th>
          <td id="uwId"></td>
        </tr>
        <tr>
          <th>Name</th>
          <td id="uwNaam"></td>
        </tr>
        <tr>
          <th>Email</th>
          <td id="uwEmail"></td>
        </tr>
      </table>
      </div>
      <div class="col-xs-6 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <form onsubmit="store(this)">
          <input type="text" placeholder="Wat is je leeftijd?" id="leeftijd">
          <input type="submit" value="Submit" id="submit">
          <p id="age"></p>
        <form>
      </div>
    </div>
    <a href="#" onclick="signOut()">Sign out</a>
<div>
  <code id="age"></code>
</div>

  </div>

  <script>
    var today = new Date();
    var expiry = new Date(today.getTime() + 30 * 24 * 3600 * 1000); // plus 30 days

    function setCookie(name, value){
        document.cookie=name + "=" + escape(value) + "; path=/; expires=" + expiry.toGMTString();
    }

    function store(form) {
      setCookie("age", form.leeftijd.value);
      return true;
    }

    function returnCookie()
    {
      const age = "Uw leeftijd is: " + document.cookie.split('; ').find(row => row.startsWith('age=')).split('=')[1];
      document.getElementById("age").innerHTML = age;
    }
</script>

	<script>
	function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();

    document.getElementById("uwId").innerHTML = profile.getId();
    document.getElementById("uwNaam").innerHTML = profile.getName();
    document.getElementById("uwEmail").innerHTML = profile.getEmail();
    document.getElementById("status").innerHTML = "Welcome";

    returnCookie();
    }
	</script>

    <script>
    function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then(function () {
            console.log('User signed out.');
            window.location.reload();
            });
        
        }
    </script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>