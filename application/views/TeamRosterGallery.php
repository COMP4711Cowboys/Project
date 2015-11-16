<div class="btn-group">
    <a href="/Team/page/1/jersey" class="btn btn-primary">Jersey #</a>
    <a href="/Team/page/1/surname" class="btn btn-primary">Surname</a>
    <a href="/Team/page/1/position" class="btn btn-primary">Position</a>
</div>
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
