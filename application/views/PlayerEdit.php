<div>
    {form_open}
        <div class='container'>
            <div class='row'>
                <div class='col-md-4'>
                    <h5>Upload New Image:</h5>
                        <input type="file" name="userfile" size="20" />
                    <div class="player-image">
                        <img src="/img/mugs/{mug}"></img>
                    </div>
                </div>
                <div class='col-md-4 form_edit_player'>
                    <div class="form-group">
                        {f_firstname_err}
                        <h5>First Name:</h5>
                        {f_firstname}
                    </div>
                    <div class="form-group">
                        {f_surname_err}
                        <h5>Last Name:</h5>
                        {f_surname}
                    </div>
                    <div class="form-group">
                        {f_jersey_err}
                        <h5>Jersey:</h5>
                        {f_jersey}
                    </div>
                    <div class="form-group">
                        {f_position_err}
                        <h5>Position:</h5>
                        {f_position}
                    </div>
                    <div class="form-group">
                        {f_age_err}
                        <h5>Age:</h5>
                        {f_age}
                    </div>
                    <div class="form-group">
                        {f_weight_err}
                        <h5>Weight:</h5>
                        {f_weight}
                    </div>
                    <div class="form-group">
                        {f_college_err}
                        <h5>College:</h5>
                        {f_college}
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-10 edit_submit'>
                    <input type="submit" value="Save" class="btn btn-primary"/>
                    <a href="/player/cancel">
                        <input type="button" value="Cancel" class="btn btn-primary"/>
                    </a>
                    {delete_button}
                </div>
                </form>
                
            </div>
        </div>
    
</div>
