<?php include('connInfo.php');

                $connect = connect();
                $searchQuery = "SELECT ITEM_ID, ORDER_ID, RANKING_NUMBER, REVIEW_TXT FROM REVIEWS";
                $fields = array();
                $fields[] = "Item ID/Order ID";
                $fields[] = "Ranking";
                $fields[] = "Review";
                $sqlFields = array();
                $sqlFields[] = "ITEM_ID";
                $sqlFields[] = "ORDER_ID";
                $sqlFields[] = "RANKING_NUMBER";
                $sqlFields[] = "REVIEW_TXT";
                try {
                    $result = mysqli_query($connect, $searchQuery);
                    $rows = [];
                    while($row = $result->fetch_assoc()){
                        $rows[] = $row;
                    }
                    echo json_encode($rows);
                } catch (Exception $ex) {
                    echo $ex->getMessage();
                }
            ?>