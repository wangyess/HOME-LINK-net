<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>楼房·后台管理️页</title>
    <link rel="stylesheet" href="/../node_modules/bootswatch/cerulean/bootstrap.css">
    <link rel="stylesheet" href="/../css/base.css">
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
        <form-sum></form-sum>
        {{--<template id="form-sum-tpl"></template>--}}
        <div class="table-responsive col-md-12 clearfix">
            <table class=" table table-hover table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Create-Time</th>
                    <th>Update-Time</th>
                    <th>Operation</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in list">
                    <td>@{{item.id}}</td>
                    <td>@{{item.title}}</td>
                    <td>@{{item.created_at}}</td>
                    <td>@{{item.updated_at}}</td>
                    <td>
                        <button @click="update(item)">更新</button>
                        <button @click="del(item.id)">删除</button>
                    </td>
                </tr>
                </tbody>
            </table>
            <ul class="pager">
                <li><a href="#" @click="top_page">Previous</a></li>
                <li><a href="#" @click="next_page">Next</a></li>
            </ul>
        </div>
    </div>
</div>

<script src="/../node_modules/axios/dist/axios.js"></script>
<script src="/../node_modules/vue/dist/vue.js"></script>
<script src="/../js/admin/house.js"></script>
</body>
</html>