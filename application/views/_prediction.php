<h3>The Cowboys will <strong>{win_lose}</strong> against the {their_team}! {message}</h3>
<table class="table">
    <tr>
        <td><img class="league-table-img" src="/img/logos/dal.jpg" title="Dallas Cowboys"/></td>
        <td><img class="league-table-img" src="/img/logos/{their_code}.jpg" title="{their_team}"/></td>
    </tr>
    <tr>
        <td colspan="2">{score}</td>
    </tr>
    <tr>
        <th colspan="2">Historic Score average</th>
    </tr>
    <tr>
        <td>{our_game_average}</td>
        <td>{their_game_average}</td>
    </tr>
    <tr>
        <th colspan="2">Historic 10-game Score average</th>
    </tr>
    <tr>
        <td>{our_10_game_average}</td>
        <td>{their_10_game_average}</td>
    </tr>
    <tr>
        <th colspan="2">Historic 5-Game Score against opponent</th>
    </tr>
    <tr>
        <td>{our_game_average_against}</td>
        <td>{their_game_average_against}</td>
    </tr>
    <tr>
        <th colspan="2">Prediction Formula</th>
    </tr>
    <tr>
        <td colspan="2"> Predicted Score = Historic Score X 70% + 10-Game Score X 20% + 5-Games against X 10% </td>
    </tr>
</table>
