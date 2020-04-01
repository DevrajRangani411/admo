<?php
require_once "db.php";
require_once "functions.php";
// Here the user id is harcoded.
// You can integrate your authentication code here to get the logged in user id
$userId = 1;

$query = "SELECT * FROM advertisement ORDER BY ad_id DESC";
$result = mysqli_query($conn, $query);

$outputString = '';

foreach ($result as $row) {
    $userRating = userRating($userId, $row['ad_id'], $conn);
    $totalRating = totalRating($row['ad_id'], $conn);
    $outputString .= '
        <div class="row-item">
 <div class="row-title">' . $row['name'] . '</div> <div class="response" id="response-' . $row['ad_id'] . '"></div>
 <ul class="list-inline"  onMouseLeave="mouseOutRating(' . $row['ad_id'] . ',' . $userRating . ');"> ';

    for ($count = 1; $count <= 5; $count ++) {
        $starRatingId = $row['id'] . '_' . $count;

        if ($count <= $userRating) {

            $outputString .= '<li value="' . $count . '" id="' . $starRatingId . '" class="star selected">&#9733;</li>';
        } else {
            $outputString .= '<li value="' . $count . '"  id="' . $starRatingId . '" class="star" onclick="addRating(' . $row['ad_id'] . ',' . $count . ');" onMouseOver="mouseOverRating(' . $row['ad_id'] . ',' . $count . ');">&#9733;</li>';
        }
    } // endFor

    $outputString .= '
 </ul>

 <p class="review-note">Total Reviews: ' . $totalRating . '</p>
 <p class="text-address">' . $row["ad_description"] . '</p>
</div>
 ';
}
echo $outputString;
?>
