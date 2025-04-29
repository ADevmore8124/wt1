$(document).ready(function () {
    const mockData1 = {
        players: [
            { name: "Yashasvi Jaiswal", runs: 51, balls: 37, fours: 3, sixes: 4, sr: 137.84, outDesc: "c Mitchell Starc b Kuldeep Yadav" },
            { name: "Sanju Samson (C) (Wk)", runs: 31, balls: 19, fours: 2, sixes: 3, sr: 163.16, outDesc: "retired hurt" },
            { name: "Riyan Parag", runs: 8, balls: 11, fours: 1, sixes: 0, sr: 72.73, outDesc: "b Axar Patel" },
            { name: "Nitish Rana", runs: 51, balls: 28, fours: 6, sixes: 2, sr: 182.14, outDesc: "lbw b Mitchell Starc" },
            { name: "Dhruv Jurel", runs: 26, balls: 17, fours: 0, sixes: 2, sr: 152.94, outDesc: "run out (Axar Patel)" },
            { name: "Shimron Hetmyer", runs: 15, balls: 9, fours: 1, sixes: 0, sr: 166.67, outDesc: "not out" }
        ],
        extras: "6 (NB 1, W 3, B 1, LB 1)",
        total: 188,
        wickets: 4,
        overs: "20.0",
        fow: ["76/1 (R. Parag, 8.1 ov)", "112/2 (Y. Jaiswal, 13.2 ov)", "161/3 (N. Rana, 17.4 ov)", "188/4 (D. Jurel, 19.6 ov)"]
    };

    const mockData2 = {
        players: [
            { name: "Yashasvi Jaiswal", runs: 62, balls: 40, fours: 4, sixes: 5, sr: 155.00, outDesc: "c Warner b Nortje" },
            { name: "Sanju Samson (C) (Wk)", runs: 35, balls: 20, fours: 3, sixes: 2, sr: 175.00, outDesc: "b Kuldeep Yadav" },
            { name: "Riyan Parag", runs: 12, balls: 9, fours: 2, sixes: 0, sr: 133.33, outDesc: "run out (Axar)" },
            { name: "Nitish Rana", runs: 25, balls: 20, fours: 2, sixes: 1, sr: 125.00, outDesc: "lbw b Nortje" },
            { name: "Dhruv Jurel", runs: 30, balls: 15, fours: 1, sixes: 3, sr: 200.00, outDesc: "c Stubbs b Mukesh" },
            { name: "Shimron Hetmyer", runs: 10, balls: 6, fours: 0, sixes: 1, sr: 166.67, outDesc: "not out" }
        ],
        extras: "7 (NB 2, W 2, B 2, LB 1)",
        total: 181,
        wickets: 5,
        overs: "19.4",
        fow: ["70/1 (R. Parag, 7.4 ov)", "115/2 (Samson, 12.3 ov)", "138/3 (Rana, 15.2 ov)", "175/4 (Jurel, 18.5 ov)", "181/5 (Jaiswal, 19.4 ov)"]
    };

    let toggle = true;

    function renderScore(data) {
        const tbodyHtml = data.players.map(player => `
            <tr>
                <td>${player.name}</td>
                <td>${player.runs}</td>
                <td>${player.balls}</td>
                <td>${player.fours}</td>
                <td>${player.sixes}</td>
                <td>${player.sr}</td>
                <td title="${player.outDesc}">${player.outDesc}</td>
            </tr>
        `).join('');

        $("#scoreTable tbody").html(tbodyHtml);
        $("#extras").html(`<strong>Extras:</strong> ${data.extras}`);
        $("#total").html(`<strong>Total:</strong> ${data.total} (${data.wickets} wkts, ${data.overs} ov)`);
        $("#fallOfWickets").html(`<strong>Fall of wickets:</strong> ${data.fow.join(" · ")}`);
    }

    function update() {
        renderScore(toggle ? mockData1 : mockData2);
        toggle = !toggle;
    }

    update(); // Initial load
    setInterval(update, 3000); // Update every 10 sec
});
