<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/node_modules/bootswatch/cerulean/bootstrap.css">
    <link rel="stylesheet" href="/css/base.css">
    <title>链家网️</title>
</head>
<body>
<div id="root">
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Link</a></li>
            </ul>
        </div>
    </div>
</nav>
    <div class="container">

        <div class="col-md-8 clearfix control-style search">
            <form @submit="search">
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
                    <input type="text" class="form-control" v-model="row.keyword" id="search" @keyup="search_keyword" placeholder="请输入您要搜索的信息...">
                </div>
            </form>
        </div>

        <div class="result">
            <div v-for="item in list">
                <span>@{{ item.id }}</span>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">@{{ item.title }}</a>
            </div>
        </div>
    </div>
</div>
<script src="/node_modules/axios/dist/axios.js"></script>
<script src="/node_modules/vue/dist/vue.js"></script>
<script src="/js/public/home.js"></script>
</body>
</html>