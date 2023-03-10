<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CSS only -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>


    <title>Quizizy</title>
</head>

<body>

    <!-- navbar -->
    <section class="navigation">
        <div class="container">
            <div class="brand">
                <!-- <a href="index.html"><i class="fa fa-amazon"></i>QUIZIZY</a> -->
                <img src="assets/img/logo.png" style="height: 5rem;" alt="logo">
            </div>
            <nav>
                <div class="nav-mobile">
                    <a id="nav-toggle" href="#!"><span></span></a>
                </div>
                <ul class="nav-list">
                    <li><a href="pages/home.html">Home</a></li>
                    <li><a href="index.php">Quiz</a></li>
                    <li><a href="#!">About Us</a></li>
                    <li><a href="#!">Contact</a></li>
                </ul>
            </nav>
        </div>
    </section>
    
    
    <div class="progress-bar">
        
        <div class="step">
            <p>Start</p>
            <div class="bullet">
                <span>1</span>
            </div>
            <div class="check fas fa-check"></div>
        </div>
        
        <div class="step">
            <p>Questions</p>
            <div class="bullet">
                <span>2</span>
            </div>
            <div class="check fas fa-check"></div>
        </div>
        
        <div class="step">
            <p>Results</p>
            <div class="bullet">
                <span>3</span>
            </div>
            <div class="check fas fa-check"></div>
        </div>
    </div>
    
    <main>
        
        <div class="form-outer">
            <div id="note" class="container col-md-6 shadow p-3 mb-5 bg-white rounded">
                <h1>AWS Cloud Practitioner Knowledge Test</h1>
                <h6>Try to answer the following questions in given time limit<br />
                Keep in mind that incorrect answer will penalize time/score
            </h6>
            <button type="button" id="start" class="btn">Start Quiz</button>
        </div>
        <div id="div1" class="container col-md-8 shadow p-3 mb-5 bg-white rounded">
            <h1 id="ques">Question</h1>
            <div id="res"></div>
            <div id="exp"></div>
            
            <button type="button" id="op1" class="btn col-md-12 col-sm-12 col-xs-12"
            onclick="validate(id);"></button>
            <button type="button" id="op2" class="btn col-md-12 col-sm-12 col-xs-12"
            onclick="validate(id);"></button>
            <button type="button" id="op3" class="btn col-md-12 col-sm-12 col-xs-12"
            onclick="validate(id);"></button>
            <button type="button" id="op4" class="btn col-md-12 col-sm-12 col-xs-12"
            onclick="validate(id);"></button>
            <button id="next-1" class="next-1 next">Next</button>
            <progress class="progress" id="file" max="100" value="0"></progress>
            
            
        </div>
        
        
        
        <div id="page" class="res container col-md-6 shadow p-3 mb-5 rounded">
            <h1>All Done !!!</h1>
            <h6>Your score is <span id="score"></span>/100</h6><br />
            <p>Click Submit To see the Questions's explication </p>
            <button id="done" type="button" class="submit btn" onclick="results();">Submit</button>
            <button type="button" class="btn" onclick="restart();">Go Back</button>
        </div>
        <div id="result-head" class="res container col-md-4  p-3 mb-5  rounded">
            <h3>Answers & Explications</h3>
            
        </div>
        <div id="results" class=""></div>
    </main>
    <!-- <script src="Assets/JS/main.js"></script> -->
    
    <script src="assets/JS/scripts.js"></script>
    <script>
        
        var i = 0;
        var score = 0;

        function show(){
            let { question: q1 } = questions[i];
             let s = JSON.parse(questions[i].options)

                    document.getElementById("ques").innerHTML = q1;
                    document.getElementById("op1").innerHTML = s.a;
                    document.getElementById("op2").innerHTML = s.b;
                    document.getElementById("op3").innerHTML = s.c;
                    document.getElementById("op4").innerHTML = s.d;

        }

        function validate(id) {

            // progressbar
            document.querySelector('#file').value += 10;
            questionData = questions[i];
            optionsData = JSON.parse(questionData.options);
           
            $('#op1,#op2,#op3,#op4').attr('disabled', 'disabled');
            
            let a = optionsData[questionData['answer']];

            var ans = document.getElementById(id).innerHTML

            if (ans === a) {
                questions[i]["correct"]="true";
                // $("#res").text("Correct !!!");
                // $("#res").css({ 'color': 'green' });

                score += 10;

            }
            else {
                questions[i]["incorrect"]="true";

                // $("#res").text("Incorrect ");
                // $("#res").css({ 'color': 'red' });



            }

            if (i === questions.length - 1) {
                setTimeout(function () {
                    document.getElementById("next-1").click();
                    document.getElementById("res").style.display = "none";
                }, 1000)

                $("#score").text(score);
            }
            else {
                i++;

                setTimeout(function () {
                    $('#op1,#op2,#op3,#op4').removeAttr('disabled', 'disabled');
                    $('#res').text("");
                    $('#exp').text("");

                    show();

                }, 10
                )
            }
        }



function results(){
    
    
    for(let index=0 ; index < questions.length; index++){
        questionData = questions[index];
        optionsData = JSON.parse(questionData.options);
        if(questions[index]["incorrect"])
document.getElementById("results").innerHTML += 
`<div id="result" class="incorrect container col-md-6 shadow p-3 mb-5  rounded">
        <div class="card-body fs-4">
             <h5> ${questions[index]["question"]}</h5><hr>
            <div class="answerText fs-5">
                ${optionsData[questionData['answer']]}
                </label>
            </div>
            <div class="justif">
                ${questions[index]["justification"]}
                </label>
            </div>
        </div>
        </div>`;
    
        if(questions[index]["correct"])
document.getElementById("results").innerHTML += 
`<div id="result" class="correct container col-md-6 shadow p-3 mb-5  rounded">
        <div class="card-body ">
             <h5> ${questions[index]["question"]}</h5><hr>
            <div class="answerText">
                ${optionsData[questionData['answer']]}
                </label>
            </div>
            <div class="justif">
                ${questions[index]["justification"]}
                </label>
            </div>
        </div>
        </div>`;


}


}

        // go to first Page function
        function restart() {
            location.reload();
        }
    </script>


</body>

</html>