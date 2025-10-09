const express = require('express');
const app = express();

app.get('/callphpapi', async (req, res) => {
  try {
    const response = await fetch('http://localhost/65_DhruviVavadiya_304_A3/phpapi.php');
    const data = await response.json();
    res.json(data);
  } catch (err) {
    res.status(500).send(err.message);
  }
});

app.listen(3000, () => console.log('http://localhost:3000/callphpapi'));
