<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Photo</th>
            <th>Name</th>
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
            <td><img src="img/mugs/{mug}"></img></td>
            <td><a href="/player/{id}">{surname}, {firstname}</a></td>
            <td>{position}</td>
            <td>{age}</td>
            <td>{weight}</td>
            <td>{college}</td>
        </tr>
        {/players}
    </tbody>
</table>