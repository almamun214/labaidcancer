<!--  submit all checked data -->

<div class="row">

    <div class="col-lg-6 col-md-6 col-sm-6">
        <input type="checkbox" name="satarday" id="satarday"  class="inputcheck" value="Satarday"> <span class="success">Satarday</span>
        <input type="checkbox" name="sunday" id="sunday"    class="inputcheck" value="Sunday"> <span class="success">Sunday</span>
        <input type="checkbox" name="monday" id="monday"    class="inputcheck" value="Monday"> <span class="success">Monday</span>
        <input type="checkbox" name="tuesday" id="tuesday"   class="inputcheck" value="Tuesday"> <span class="success">Tuesday</span>
        <input type="checkbox" name="wednesaday" id="wednesaday" class="inputcheck" value="Wednesaday"> <span class="success">Wednesaday</span>
        <input type="checkbox" name="thursday" id="thursday"   class="inputcheck" value="Thursday"> <span class="success">Thursday</span>
        <input type="checkbox" name="friday" id="friday"     class="inputcheck" value="Friday"> <span class="success">Friday</span>
    </div>

    <div class="col-lg-2 col-md-2 col-sm-3">
        <select name="start" id="start" class="form-control"> 
            <option value="9 AM">9 AM</option>
            <option value="10 AM">10 AM</option>
            <option value="11 AM">11 AM</option>
            <option value="12 PM">12 PM</option>
            <option value="1 PM">1 PM</option>
            <option value="2 PM">2 PM</option>
            <option value="3 PM">3 PM</option>
            <option value="4 PM">4 PM</option>
            <option value="5 PM">5 PM</option>
            <option value="6 PM">6 PM</option>
            <option value="7 PM">7 PM</option>
            <option value="8 PM">8 PM</option>
        </select>
    </div>

    <div class="col-lg-2 col-md-2 col-sm-3">
        <select name="end" id="end" class="form-control">

            <option value="10 AM">10 AM</option>
            <option value="11 AM">11 AM</option>
            <option value="12 PM">12 PM</option>
            <option value="1 PM">1 PM</option>
            <option value="2 PM">2 PM</option>
            <option value="3 PM">3 PM</option>
            <option value="4 PM">4 PM</option>
            <option value="5 PM">5 PM</option>
            <option value="6 PM">6 PM</option>
            <option value="7 PM">7 PM</option>
            <option value="8 PM">8 PM</option>
            <option value="9 PM">9 PM</option>
        </select>
    </div>

    <div class="col-lg-2 col-md-2 col-sm-3">
        <button class="btn btn-primary btn-block" onclick="checkSubmitValidation()" style="float: right;">Change Now</button>
    </div>
</div>

<!-- Already Grid Table -->
