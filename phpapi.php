<?php
header('Content-Type: application/json');

$data = [
    ["id"=>1, "name"=>"Riya", "course"=>"BCA"],
    ["id"=>2, "name"=>"Jay", "course"=>"MCA"],
    ["id"=>3, "name"=>"Dhruvi", "course"=>"Msc.ICT"]
];

echo json_encode($data);
?>
