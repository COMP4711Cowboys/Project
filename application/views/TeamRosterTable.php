<div class="btn-group">
    <a href="/Team/page/1/jersey" class="btn btn-primary">Jersey #</a>
    <a href="/Team/page/1/surname" class="btn btn-primary">Surname</a>
    <a href="/Team/page/1/position" class="btn btn-primary">Position</a>
</div>
<a href="/Player/add" id="player_add_button" class="btn btn-info" role="button">Add Player</a>

<br /><br />
<table class="table table-hover">
    <thead>
        <tr>
            <th>Jersey #</th>
            <th>Photo</th>
            <th>Surname</th>
            <th>First Name</th>
            <th>Position</th>
            <th>Age</th>
            <th>Weight</th>
            <th>College</th>
        </tr>
    </thead>
    <tbody>
        {players}
        <tr>
            <td>{jersey}</td>
            <td><a href="/player/view/{id}"><img class="table-roster-img" src="/img/mugs/{mug}"></img></a></td>
            <td>{surname}</td>
            <td>{firstname}</td>
            <td>{position}</td>
            <td>{age}</td>
            <td>{weight}</td>
            <td>{college}</td>
        </tr>
        {/players}
    </tbody>
</table>

<div class="pagination_links">
    {links}
</div>
