document.getElementById('reservationForm').addEventListener('submit', function (e) {
    e.preventDefault();
  
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const room = document.getElementById('room').value;
    const date = document.getElementById('date').value;
  
    fetch('reserve.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: `name=${encodeURIComponent(name)}&email=${encodeURIComponent(email)}&room=${encodeURIComponent(room)}&date=${encodeURIComponent(date)}`,
    })
      .then(response => response.text())
      .then(data => {
        document.getElementById('message').innerHTML = data;
        if (data.includes('successfully')) {
          document.getElementById('reservationForm').reset();
        }
      })
      .catch(error => console.error('Error:', error));
  });