<!DOCTYPE html><html><head><link href="https://fonts.googleapis.com/css?family=Forum&display=swap" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet" />
<link href="./css/main.css" rel="stylesheet" />
<title>Начальная страница</title>
<style>
    * {
  box-sizing: border-box;
}
html, body {
  margin: auto;
  overflow-y: hidden;
}
.v1_42 {
  opacity: 1;
  position: relative;
  top: 0px;
  left: 0px;
  overflow: hidden;
}
.v1_43 {
    width: 120%;
  height: 100vh;
  background: url("/PD1/images/изм.png");
  background-size: cover;
}
.v1_44 {
    width: 290px;
    height: 128px;
    background: url(../images/logotip.png);
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    opacity: 1;
    position: relative;
    top: 16px;
    left: 16px;
    overflow: hidden;
}

.v1_46 {
  width: 193px;
  color: rgba(32,58,70,1);
  position: absolute;
  top: 64px;
  left: 283px;
  font-family: Forum;
  font-weight: Regular;
  font-size: 45px;
  opacity: 1;
  text-align: center;
}
.v1_47 {
  width: 320px;
  color: rgba(32,58,70,1);
  position: absolute;
  top: 64px;
  left: 480px;
  font-family: Forum;
  font-weight: Regular;
  font-size: 45px;
  opacity: 1;
  text-align: center;
}

.v1_49 {
  width: 250px;
  color: rgba(32,58,70,1);
  position: absolute;
  top: 64px;
  left: 791px;
  font-family: Forum;
  font-weight: Regular;
  font-size: 45px;
  opacity: 1;
  text-align: center;
}
.v1_50 {
    width: 779px;
    color: rgba(0,0,0,1);
    position: absolute;
    top: 93px;
    left: 350px;
    font-family: 'Forum';
    font-weight: Regular;
    font-size: 25px;
    opacity: 1;
    text-align: center;
    text-align: justify;
    text-indent: 30px;
}
.v1_51 {
    width: 779px;
    color: rgba(0,0,0,1);
    position: absolute;
    top: 129px;
    left: 350px;
    font-family: 'Forum';
    font-weight: Regular;
    font-size: 25px;
    opacity: 1;
    text-align: center;
    text-align: justify;
    text-indent: 30px;
}
.v1_52 {
    width: 779px;
    color: rgba(0,0,0,1);
    position: absolute;
    top: 272px;
    left: 350px;
    font-family: 'Forum';
    font-weight: Regular;
    font-size: 25px;
    opacity: 1;
    text-align: center;
    text-align: justify;
    text-indent: 30px;
}
.v1_53 {
    width: 779px;
    color: rgba(0,0,0,1);
    position: absolute;
    top: 360px;
    left: 350px;
    font-family: 'Forum';
    font-weight: Regular;
    font-size: 25px;
    opacity: 1;
    text-align: center;
    text-align: justify;
    text-indent: 30px;
}
.but {
  --c:  #229091; /* the color*/
            font-family: 'Forum';
            font-style: normal;
            position: relative;
            z-index: 1000;
            width: 140px;
            top: 405px;
            left: 653px;
   font-weight: 400;
   font-size: 45px;
   line-height: 57px;
            /*display: flex;*/
   text-align: center;
   color: #203A46;
            text-decoration: none;
          
          background-color: rgba(0, 125, 215, 0);
          border: none;
          border-radius: 5px;
          letter-spacing: 4px;
          overflow: hidden;
          transition: 0.5s;
          cursor: pointer;

  --_g: linear-gradient(var(--c) 0 0) no-repeat;
  background: 
    var(--_g) calc(var(--_p,0%) - 100%) 0%,
    var(--_g) calc(200% - var(--_p,0%)) 0%,
    var(--_g) calc(var(--_p,0%) - 100%) 100%,
    var(--_g) calc(200% - var(--_p,0%)) 100%;
  background-size: 50.5% calc(var(--_p,0%)/2 + .5%);
  outline-offset: .1em;
  transition: background-size .4s, background-position 0s .4s;
}
.but:hover {
  --_p: 100%;
  transition: background-position .4s, background-size 0s;
  border-radius: 14px;
}
.but:active {
  box-shadow: 0 0 9e9q inset #0009; 
  background-color: var(--c);
  color: #fff;
  
}
</style>
</head>
<body>
    <div class="v1_42"><div class="v1_43"></div>
    <div class="v1_44"></div>

    
    <div class="but"><a style="text-decoration:none; color: black;" href="/PD1/Авторизация/login.php">Вход</a></div>
    <!-- <span class="v1_49">Инструкция</span> -->
    <span class="v1_50">    Добро пожаловать на наш сайт по созданию онлайн тестов!<br></span>
    <span class="v1_51"> Наш сайт предоставляет платформу, где преподаватели могут создавать тесты для своих учеников. Они также имеют возможность просматривать результаты прохождения тестов учениками. Это полезный инструмент, который поможет преподавателям эффективно оценивать знания и прогресс своих студентов.<br></span>
    <span class="v1_52"> Ученики могут проходить тесты, созданные их преподавателями. Это дает им возможность измерить свои знания, получить обратную связь и отслеживать свой успех на пути к образованию.<br></span>
    <span class="v1_53"> Мы стремимся создать удобную и надежную платформу для образования, которая поможет преподавателям и ученикам взаимодействовать и достигать успеха в обучении. Присоединяйтесь к нам уже сегодня и начните свой учебный процесс на новом уровне!</span>
</div>
</body>
</html>