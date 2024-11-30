/* section 8 */
/*Abdulla Jamal 20195094 */
/* Albader mohsen 20191367 */
/*we work in one computer */

<?php

$url = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";


$response = file_get_contents($url);

echo $response;
print_r($response);

$data = json_decode($response, true);

echo $response;
print_r($response);


if (!$data || !isset($data["records"])) {
    die("Error fetching the data from the API.");
}


$results = $data["results"];
?>

<html>
    <head>
        <title>Student Statistics</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Semester</th> 
                    <th>The Programs</th> 
                    <th>Nationality</th> 
                    <th>Colleges</th> 
                    <th>Num of Students</th>     
                </tr>
            </thead>
            <tbody>
                <?php
   
                foreach ($records as $student) {
            
                    $fields = $student['record']['fields'];
                    ?>
                    <tr>
                        <td><?php echo ($fields["year"]); ?></td>
                        <td><?php echo ($fields["semester"]); ?></td>
                        <td><?php echo ($fields["the_programs"]); ?></td>
                        <td><?php echo ($fields["nationalities"]); ?></td>
                        <td><?php echo ($fields["colleges"]); ?></td>
                        <td><?php echo ($fields["Num of Students"]); ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </body>
</html>
