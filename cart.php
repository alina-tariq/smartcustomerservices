
<div class="container">
       <div class="row d_flex">
             <div class="col-sm-8">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco consectetur adipiscing elit, sed do eiusmod</p>
            </div>    
            <div class="col-sm-4">    
                <form>
                    <label for="uLocation">Delivery Address: </label>
                    <input type="text" id="uLocation"><br>
                    <label for="warehouse">Warehouse: </label>
                    <select id="warehouse">
                        <option value="350 Victoria Street, Toronto, ON" select="selected">350 Victoria Street, Toronto, ON</option>
                        <option value="220 Yonge Street, Toronto, ON">220 Yonge Street, Toronto, ON</option>
                        <option value="290 Brenmer Blvd, Toronto, ON">290 Brenmer Blvd, Toronto, ON</option>
                    </select>
                    <button ng-click="initMap()">Generate Map</button>
                </form>
                    <div id="map"></div>
        </div>
    </div>
</div>
