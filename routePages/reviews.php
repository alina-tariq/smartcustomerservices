<div class="container">
    <div class="row d_flex">
         <p>Enter Item Review: </p>
         <div>
             <form>
                <!-- needs to post all items in database dynamically as a select list -->
                 <select ng-init="setOptions()" id="itemName" required>
                    
                 </select>
                 <select id="rankingNumber" required>
                    <option value="0">0/5</option>
                    <option value="1">1/5</option>
                    <option value="2">2/5</option>
                    <option value="3">3/5</option>
                    <option value="4">4/5</option>
                    <option value="5">5/5</option>
                 </select>
                 <input type="textbox" placeholder="Enter a review here" id="reviewTxt" required>
                 <button ng-click="insertReview()">Submit</button>
             </form>
         </div>
     </div>
     <br>
     <div class="row d_flex">
        <p>Enter Order Review: </p>
        <div>
            <form>
                <input type="text" placeholder="Order ID" id="orderId" required>
                <select id="orderRankingNumber" required>
                   <option value="0">0/5</option>
                   <option value="1">1/5</option>
                   <option value="2">2/5</option>
                   <option value="3">3/5</option>
                   <option value="4">4/5</option>
                   <option value="5">5/5</option>
                </select>
                <input type="textbox" placeholder="Enter a review here" id="orderReviewTxt" required>
                <button ng-click="insertOrderReview()">Submit</button>
            </form>
        </div>
    </div>
    <br>
    <div class="row d_flex">
        <!-- needs to post all items to selectively show reviews with showReviews() in mainpage.php-->
         <div id="reviewMsg"></div>
     </div>
     <br>
     <div class="row d_flex">
        <!-- needs to post all items to selectively show reviews with showReviews() in mainpage.php-->
         <div id="reviewList">
            <h3> Reviews </h3>
            <?php include('../functions/connInfo.php');

                $connect = connect();
                $searchQuery = "SELECT * FROM REVIEWS";
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
                    echo "<table border='1'><tr>";
					foreach ($fields as $field) {
						echo "<th>" . $field . "</th>";
					}
					echo "</tr>";
                    while($row = $result->fetch_assoc()){
                        echo "<tr>";
						foreach ($sqlFields as $sqlField) {
                            if (strlen($row[$sqlField]) != 0) {
							    echo "<td>" . $row[$sqlField] . "</td>";
                            }
						}
						echo "</tr>";
                    }
                } catch (Exception $ex) {
                    echo $ex->getMessage();
                }
            ?>
         </div>
     </div>
</div>