<div class="btn-group">
    <a href="/Team/page/1/jersey" id="jersey-btn" class="btn btn-primary">Jersey #</a>
    <a href="/Team/page/1/surname" id="surname-btn" class="btn btn-primary">Surname</a>
    <a href="/Team/page/1/position" id="lastname-btn" class="btn btn-primary">Position</a>
</div>

<a href="/Player/add" id="player_add_button" class="btn btn-info" role="button">Add Player</a>

<br /><br />
<div>
    {players}
    <div class="roster-cell">
        <a href="/player/view/{id}"><img src="/img/mugs/{mug}" title="{surname}"/></a>
        <p>{surname}, {firstname}</p>
    </div>
    {/players}
</div>

<div class="pagination_links">
    {links}
</div>
