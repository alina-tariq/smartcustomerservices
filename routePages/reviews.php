<div class="service2">
<div class="container">
    <div class="row d_flex">
        <div class="services_desc">
        <span class="section_title">Enter Item Review: </span>
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
                <br>
                <input class="reviewTxt" type="textbox" placeholder="Enter a review here" id="reviewTxt" required>
                <br><br>
                <br>
                <button ng-click="insertReview()">Submit</button>
            </form>
        </div>
        </div>
    </div>
</div>
</div>
<div class="service1">
<div class="container">
    <br>
    <div class="row d_flex">
        <div class="services_desc">
        <span class="section_title">Enter Order Review: </span>
        <div>
            <form>
                <input class="orderID" type="text" placeholder="Order ID" id="orderId" required>
                <select id="orderRankingNumber" required>
                   <option value="0">0/5</option>
                   <option value="1">1/5</option>
                   <option value="2">2/5</option>
                   <option value="3">3/5</option>
                   <option value="4">4/5</option>
                   <option value="5">5/5</option>
                </select>
                <br>
                <input class="reviewTxt" type="textbox" placeholder="Enter a review here" id="orderReviewTxt" required>
                <br><br>
                <br>
                <button class="service1_button" ng-click="insertOrderReview()">Submit</button>
            </form>
        </div>
        </div>
    </div>
</div>
</div>
<div class="service2">
<div class="container">
    <br>
    <div class="row d_flex">
        <!-- needs to post all items to selectively show reviews with showReviews() in mainpage.php-->
         <div id="reviewMsg"></div>
     </div>
     <br>
     <div class="row d_flex">
        <!-- needs to post all items to selectively show reviews with showReviews() in mainpage.php-->
         <div id="reviewList" ng-init="drawReviewTable()">
            <span class="section_title"> Reviews </span>
         </div>
     </div>
</div>
</div>