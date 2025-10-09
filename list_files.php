<?php
$dir = "Admin/uploads/"; 
$files = scandir($dir);

echo "<h3>Files in Directory:</h3><ul>";
foreach ($files as $file) {
    if ($file != "." && $file != "..") {
        echo "<li>$file</li>";
    }
}
echo "</ul>";

echo "<h3>Data from API: Call express rest api in php.)</h3>";
$url = "http://localhost:8000/emp/employee";
$response = file_get_contents($url);
$data = json_decode($response, true);

echo "<pre>";
print_r($data);
echo "</pre>";


// router.get('/employee', (req, res) => {
//     console.log("http://localhost:8000/emp/employee");
//     Emp.find({})
//         .then((data) => {
//              res.status(200).send(data);
//         }).catch((err) => {
//             res.status(500).send("err");
//         })

//     console.log("Get Request");
// });
?>
