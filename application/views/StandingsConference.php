<h2>League Standings</h2>

<form method ="post" action="/Standings/data" name="sortLeague">
    Sort By: 
    <select name="sortReq1">
        <option value="league" id="league-option">League</option>
        <option value="conference" id="conference-option">Conference</option>
        <option value="division" id="division-option">Division</option>
    </select>
    <select name="sortReq2">
        <option value="city" id="city-option">City</option>
        <option value="team" id="team-option">Team</option>
        <option value="standing" id="standing-option">Standing</option>
    </select>
    
    <input type="submit" value="Go">
</form><br/>

{league}
<table class="table table-hover table-striped">
    

    <header class="panel-heading danger"> {conference} </header>
    
    <tr>
        <td class = "success">NFL Team</td>
        <td class = "success"></td>
        <td class = "success">W</td>
        <td class = "success">L</td>
        <td class = "success">T</td>
        <td class = "success">Net Points</td>
    <tr/>
    
    {teams}
    <tr>
        <td><img class="league-table-img" src="/img/logos/{filename}" title="{name}"/></td>
        <td><span title="{code}">{name}</span></td>
        <td>{wins}</td>
        <td>{losses}</td>
        <td>{ties}</td>
        <td>{netpoints}</td>
    </tr>

    {/teams}
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>   
</table>
{/league} 
