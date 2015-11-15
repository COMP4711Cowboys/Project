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
            <td><a href="/player/view/{id}"><img src="/img/mugs/{mug}"></img></a></td>
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