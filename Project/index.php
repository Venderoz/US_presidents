<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="CSS/main_styles.css">
    <link rel="stylesheet" href="CSS/flowText.css">
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/en/thumb/a/a4/Flag_of_the_United_States.svg/1200px-Flag_of_the_United_States.svg.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <title>US Presidents</title>
    <style>
        ::-webkit-scrollbar{
            width: 1rem;
        }
        ::-webkit-scrollbar-thumb {
            background-color: red;
            width: 20px;
            box-shadow: inset 0 0 5px grey;
            border-radius: 1rem;
        }
        ::-webkit-scrollbar-thumb:hover {
            background-color: rgb(197,0,0);
        }
        ::-webkit-scrollbar-track {
            background: white;
            box-shadow: inset 0 0 5px grey;
        }
        body {
            background-color: #f2f2f2;
            background-image: url("https://wallpapercave.com/wp/qhGPDUl.jpg");
            background-attachment: fixed;
            background-size: 100%;
            background-repeat: round;
        }

        table {
            font-size: large;
            margin: 0 auto;
            border-collapse: collapse;
            width: 80%;
            background-color: white;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 7%;
        }

        th,
        td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            font-size: larger;
            transition: 0.5s;
        }
        td{
            cursor: pointer;
        }
        tr:hover {
            background-color: #f5f5f5;
        }

        .image {
            width: 12vw;
            height: 23vh;
            object-fit: cover;
            border-radius: 50%;
            transition: 0.5s;
        }

        .inf1, .inf2, .inf3, .inf4, .inf5, .inf6, .inf7, .inf8, .inf9, .inf10, .inf11, .inf12, .inf13, .inf14, .inf15, .inf16, .inf17, .inf18, .inf19, .inf20, .inf21, .inf22, .inf23, .inf24, .inf25, .inf26, .inf27, .inf28, .inf29, .inf30, .inf31, .inf32, .inf33, .inf34, .inf35, .inf36, .inf37, .inf38, .inf39, .inf40, .inf41, .inf42, .inf43, .inf44, .inf45, .inf46{
            display: none;
            width: 76vw;
            transition: 0.5s;
            cursor: default;
        }
        .more:hover, .tabHead:hover{
            background-color: transparent;
        }
        .search{
            justify-content:center;
        }
        .searchbtn{
            width: 100%;
            border-radius: 2px;
            border-color: red ;
            font-weight: bold;
            transition: 0.5s;
            cursor: pointer;
        }
        .getName{
            font-family: fantasy;
            font-size: 2vh;
            text-align: center;
            justify-content: center;
            align-items: center;
            width:20vw;
            height: 5vh;
            border-radius: 2px;
            border-color: red;
            color: rgb(23, 12, 73);
            transition: 0.5s;
        }
        .searchbtn:hover{
            border-color: white;
            background-color: rgb(23, 12, 73);
            color: white;
        }
        form{
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content:center;
            gap: 1rem;
        }
        #container1{
            margin-top: 1.7vh;
        }
        #container2{
            margin-top: 1.7vh;
        }
        .updateBtn{
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border-color: black;
            border: 1px rgb(23, 12, 73); solid;
	        text-align: center;
            font-size: 1rem;
            padding-top: 4px;
            max-width: 3vw;
            max-height: 6vh;
	        font-weight: bold;
            transition: 0.5s;
            cursor: pointer;
        }
        .updateBtn:hover{
            transform: rotateZ(360deg);
            background-color: rgb(255, 255, 255);
            outline: 1px red solid;
        }

        .material-symbols-outlined {
        font-variation-settings:
        'FILL' 0,
        'wght' 400,
        'GRAD' 0,
        'opsz' 48;
        text-align: center;
        font-size:200%;
        }
    </style>
</head>

<body>
    <div class = "topbelt">
        <div class = "search">
            <form action="index.php" method="get">
                <div id="container1">
                    <input type = "text" placeholder="Search..." name="pres" class = "getName" id = "getName"><br>
                    <input type="submit" value="→" class = "searchbtn" id = "searchbtn">
                </div>
                <div id="container2">
                    <button type="submit" name="update" class = "updateBtn" id = "updateBtn"><span class='material-symbols-outlined'>refresh</span></button>
                </div>
            </form>
        </div>

        <div id = "time" class = "time"></div>
        <button type = "button" class = "quizbtn" id = "quiz" onclick="window.location.href = 'quiz_presidents.html'">Quiz</button>
    </div>

    <div id = "theme" class = "pageTheme" style = "background-color: white;">
        <h1 class = "themeText">US PRESIDENTS</h1>
    </div><br><br>
    <table>
            <tr class = "tabHead">
                <th>#</th>
                <th>Name</th>
                <th>Vice-president</th>
                <th>Years in Office</th>
                <th>Party</th>
                <th>Portrait</th>
            </tr>
            
            <?php
            $db = mysqli_connect('localhost', 'root', '', 'presidents');
            if(isset($_GET['update'])){
                $like = "";
            }
            if(isset($_GET['pres'])){
                $like = ucwords(($_GET['pres']));
                if(is_numeric($_GET['pres'])){
                    if(($_GET['pres'] > 2023) || ($_GET['pres'] < 1) || ($_GET['pres'] > 46) && ($_GET['pres'] < 1789)){
                        echo '<script>alert("No president like this...");</script>';
                    $like = "";
                    }
                }
            } else {
                $like = "";
            }
            $query = "SELECT * FROM presidents JOIN vice ON presidents.ID = vice.president_id WHERE presidents.Name LIKE '$like%' OR presidents.Lastname LIKE '$like%' OR presidents.Party LIKE '$like%' OR presidents.ID = '$like' OR CONCAT(presidents.Name, ' ', presidents.Lastname) LIKE '$like%' OR '$like' >= presidents.First_year AND '$like' <= presidents.Last_year GROUP BY presidents.ID";
            $result = mysqli_query($db, $query);

            if (mysqli_num_rows($result) == 0){
                echo '<script>alert("No president like this...");</script>';
                $like = "";
            }

            while ($row = mysqli_fetch_array  ($result))
            {
                echo "<tr onclick = 'show".$row[0]."()'>";
                echo "<td>".$row[0]."</td>";
                echo "<td>".$row[1]." ".$row[2]."</td>";
                echo "<td>".$row[10]." ".$row[11]."</td>";
                echo "<td>".$row[3]."-".$row[4]."</td>";
                echo "<td>".$row[5]."</td>";
                echo '<td class="center"><img class="image" src="'.$row[7].'" alt="'.$row[1].' '.$row[2].'"></td>';
                echo '<tr style="padding: 0; border-bottom: none; justify-content: center; align-items: center; margin-bottom: -1;" class = "more"><td colspan="6"><div class = "inf'.$row[0].'" id = "inf'.$row[0].'">'.$row[6].'</div></td></tr>';
            }
            ?>
    </table>
    <a href = "#top">
        <button class = "btnToTop" id = "btnToTop">
            <span class="material-symbols-outlined">
                        arrow_upward
            </span>
        </button>
    </a>
    <div class = "footer">
        <p id = "date"></p>
    </div>
    <?php
    echo <<< START
    <script>
    const president = document.getElementById("getName");
    const presBtn = document.getElementById("searchbtn");
    function checkText(){
        const text = president.value.toLowerCase().trim();
        if(text === "obamium"){
            window.open("area51/Obamium.html", "newwindow");
        }
    }
    presBtn.addEventListener("click", checkText);
    \n
    START;
    for($x = 1; $x <=46; $x++){
        echo "const infDiv$x = document.getElementById('inf$x');";
        echo <<< FINISH
        let isClicked$x = true;
        function show$x(){
            if(isClicked$x){
                infDiv$x.style.display = "block"; 
                isClicked$x = false;
            } else {
                infDiv$x.style.display = "none";
                isClicked$x = true;
            }
            }
            \n
        FINISH;
    }
    echo "</script>";
    ?>
    <script src = "JS/getTime.js"></script>
    <script src = "JS/goTop.js"></script>

</body>
</html>