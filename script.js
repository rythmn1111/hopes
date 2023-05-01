// Load all the messages from the server when the page loads
window.addEventListener("load", function() {
  loadMessages();
});

// Add a new message to the server when the form is submitted
function addMessage(event) {
  event.preventDefault();
  const message = document.getElementById("message").value;
  document.getElementById("message").value = "";
  fetch("store.php", {
    method: "POST",
    body: JSON.stringify({message: message})
  }).then(function(response) {
    if (response.ok) {
      loadMessages();
    } else {
      alert("Error adding message");
    }
  });
}

// Load all the messages from the server and display them
function loadMessages() {
  fetch("load.php")
    .then(function(response) {
      return response.json();
    })
    .then(function(data) {
      let messagesHtml = "";
      data.forEach(function(message) {
        messagesHtml += "<p>" + message.message + "</p>";
      });
      document.getElementById("messages").innerHTML = messagesHtml;
    });
}
