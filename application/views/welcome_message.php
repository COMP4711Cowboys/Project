<h1>Dallas Cowboys</h1>

<p>
    <b>Owners:</b> Jerry Jones <br/>
    <b>Head Coach:</b> Jason Garrett <br/>
    <b>Offensive Captain(s):</b> Tony Romo and Jason Witten <br/>
    <b>Defensive Captain(s):</b> Barry Church and Sean Lee <br/><br/>
    

    The Dallas Cowboys are a professional American football team. They are a part
    of the National Football Conference (NFC) East division. All homes games are played 
    at AT&T Stadium located in Arlington, Texas. A unique feature of this team is the Ring of Honor which
    is displayed around the AT&T Stadium. This ring honors former players, coaches and club officials who
    have contributed to the team in an outstanding way.
    
    <h3>Highlights</h3>
    <ul>
        <li>Became the only NFL team to record 20 straight winning seasons</li>
        <li>Won 5 Super Bowl appearances</li>
        <li>First sports team to be valued at $4 billion</li>
    </ul> 
</p>

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