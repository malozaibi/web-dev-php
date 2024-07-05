<?php require_once('_partial/header.php') ?>
<?php require_once('core/functions.php') ?>

<main class="form-signin w-100 m-auto mt-5">
  <div class="mx-auto text-center">
    <div id="container"></div>
    <button class="btn btn-success" onclick="makeAjaxRequest()">Get Data</button>
    <br>
    <img id="fox_img" src="" alt="" width="400">
    <br>
    <button class="btn btn-success" onclick="fox()">Fox</button>
  </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
  function makeAjaxRequest() {
    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Set up the request
    xhr.open('GET', 'data.php', true);

    // Define the callback function
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // The request was successful
        var response = xhr.responseText;
        // Do something with the response data
        console.log(response);
        console.log(JSON.parse(response));
        doThings(JSON.parse(response));
      }
    };

    // Send the request
    xhr.send();

    // axios.get('data.php').then(function(response) {
    //   console.log(response.data);
    // });
  }

  function fox() {
    axios.get('https://randomfox.ca/floof/')
      .then(function(response) {
        let img = document.getElementById('fox_img');
        img.src = response.data.image;
      });
  }


  function doThings(data) {
    // alert(data);
    let container = document.getElementById('container');

    let card = `<div>
    <h2>${data.title}</h2>
    <p>${data.body}</p>
    <time>${data.created_at}</time>
    </div>
    <hr>`;

    container.innerHTML += card;
  }
</script>

<?php require_once('_partial/footer.php') ?>