<div class="btn-group">
    Order By:
    <a href="/teamroster/order/jersey" class="btn btn-primary">Jersey #</a>
    <a href="/teamroster/order/surname" class="btn btn-primary">Surname</a>
    <a href="/teamroster/order/position" class="btn btn-primary">Position</a>
</div>
<div>
    {players}
    <div class="roster-cell">
        <a href="/player/view/{id}"><img src="/img/mugs/{mug}" title="{surname}"/></a>
        <p>{surname}, {firstname}</p>
    </div>
    {/players}
</div>