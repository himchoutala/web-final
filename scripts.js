// scripts.js
function openLoginForm() {
  document.getElementById('loginModal').style.display = 'block';
}

function closeLoginForm() {
  document.getElementById('loginModal').style.display = 'none';
}

document.getElementById('loginForm').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent the default form submission

  const email = document.getElementById('username').value;
  const password = document.getElementById('password').value;

  // Perform your validation or authentication here
  console.log('Email:', email);
  console.log('Password:', password);

  // Clear the form after submission
  document.getElementById('loginForm').reset();

  alert('Form submitted!');
  closeLoginForm(); // Close the modal after form submission
});
