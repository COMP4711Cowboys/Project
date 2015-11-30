<h3>Prediction Engine</h3>
<div>
    <p>Dallas Cowboys</p>
    <p><strong>vs.</strong></p>
    <!-- Do not want page reloading, so have form return false -->
    <form id='prediction_form' onsubmit='return false'>
        <div class='form-group'>
            <p>Opposing Team:
            {f_opposition}
            {f_opposition_err}
            </p>
        </div>
        <div class='prediction_submit'>
            <input type="submit" value="Submit" class="btn btn-primary" id="prediction_submit"/>
        </div>
    </form>
</div>
<div id='prediction_result'></div>