<?php

function userRating($userId, $restaurantId, $conn)
{
    $average = 0;
    $avgQuery = "SELECT rating FROM rating WHERE user_id = '" . $userId . "' and restaurant_id = '" . $restaurantId . "'";
    $total_row = 0;

    if ($result = mysqli_query($conn, $avgQuery)) {
        // Return the number of rows in result set
        $total_row = mysqli_num_rows($result);
    } // endIf

    if ($total_row > 0) {
        foreach ($result as $row) {
            $average = round($row["rating"]);
        } // endForeach
    } // endIf
    return $average;
}
 // endFunction
function totalRating($ad_id, $conn)
{
    $totalVotesQuery = "SELECT * FROM rating WHERE ad_id = '" . $ad_id . "'";

    if ($result = mysqli_query($conn, $totalVotesQuery)) {
        // Return the number of rows in result set
        $rowCount = mysqli_num_rows($result);
        // Free result set
        mysqli_free_result($result);
    } // endIf

    return $rowCount;
}//endFunction
