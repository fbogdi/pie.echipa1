<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Creating three column responsive layout
    </title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<style>
    body,html,h1,h2,p, div,a,img,header,footer,span{
        margin: 0;
        padding: 0;
    }
    *{box-sizing:border-box}
    html{background:#343434;}
    footer,header{background: #00b4de; color: #fbfbfb; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; text-align: center; padding: 2em 0;}

    main{
        width:94.75%;
        margin: 0 auto;
        overflow: hidden;
    }

    .col{
        width: 33.333%;
        height:500px;
        float: left;
        text-align: center;
        padding:1rem;
    }
    .col1{ background: #9bd5ff;}
    .col2{ background: #ffd587;}
    .col3{ background: #ff8787;}

    footer{
        clear:both;
    }

    @media only screen and (max-width:768px){

        .col1, .col2{
            width:50%;
        }
        .col3{
            width:100%;
        }
    }

    @media only screen and (max-width:480px){
        .col{
            float: none;
            width:100%;
        }
    }
</style>
<body>
<header>
    <h1>Three column responsive layout</h1>
</header>

<main>
    <div class="col col1">
        <h2>Column 1</h2>

    </div>
    <div class="col col2">
        <h2>Column 2</h2>

    </div>
    <div class="col col3">
        <h2>Column 3</h2>

    </div>
</main>

<footer>
    &copy; 2015 | Smashtheshell
</footer>
</body>
</html>