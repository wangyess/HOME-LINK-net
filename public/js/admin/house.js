;(function () {
    'use strict';
    var Event = new Vue();
    Vue.component('form-sum', {
            template: ` <div class="col-md-6">
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="title" class="col-md-2 control-label">标题:</label>
                    <div class="col-md-10">
                        <input type="text" v-model="house.title" id="title" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="subtitle" class="col-md-2 control-label">副标题:</label>
                    <div class="col-md-10">
                        <input type="text" v-model="house.subtitle" id="subtitle" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="root_count" class="col-md-2 control-label">户型: </label>
                    <div class="col-md-10">
                        <input type="text" v-model="house.room_count" id="root_count" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="area" class="col-md-2 control-label">面积:</label>
                    <div class="col-md-10">
                        <input type="text" v-model="house.area" id="area" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="direction" class="col-md-2 control-label"> 朝向:</label>
                    <div class="col-md-10">
                        <input type="text" v-model="house.direction" id="direction" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="community" class="col-md-2 control-label"> 小区:</label>
                    <div class="col-md-10">
                        <input type="text" v-model="house.community" id="community" class="form-control">
                    </div>
                </div>
                <div class="radio">
                    <label class="col-md-2 control-label">装修:</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="zhuang" value="true" v-model="house.decoration">已装修
                        </label>
                        <label>
                            <input type="radio" name="zhuang" value="false" v-model="house.decoration">未装修
                        </label>
                    </div>
                </div>
                <div class="radio">
                    <label class="col-md-2 control-label">供暖:</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="gong" value="true" v-model="house.heat_supply"> 有
                        </label>
                        <label>
                            <input type="radio" name="gong" value="false" v-model="house.heat_supply"> 没有
                        </label>
                    </div>
                </div>
                <div class="radio">
                    <label class="col-md-2 control-label">电梯:</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="dian" value="true" v-model="house.elevator"> 有
                        </label>
                        <label>
                            <input type="radio" name="dian" value="false" v-model="house.elevator"> 没有
                        </label>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="detail" class="col-md-2 control-label">详细介绍:</label>
                    <div class="col-md-10">
                        <textarea class="form-control" id="detail" cols="30" rows="2" v-model="house.detail"></textarea> <br>
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact_name" class="col-md-2">联系人: </label>
                    <div class="col-md-10">
                        <input type="text" v-model="house.contact_name" id="contact_name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact_phone" class="col-md-2">电话: </label>
                    <div class="col-md-10">
                        <input type="text" v-model="house.contact_phone" id="contact_phone" class="form-control">
                    </div>
                </div>
                <button type="button" @click="kk" class="btn btn-success btn-block">提交</button>
            </form>
        </div>`,
            data: function () {
                return {
                    house: {}
                }
            },
            mounted: function () {
                var me = this;
                //把数据渲染到表单中
                Event.$on('get_and_render', function (data) {
                    me.house = data;
                });
                //成功后重置表单
                Event.$on('this_success', function () {
                    me.reset();
                })
            },
            methods: {
                //表单提交触发的函数
                kk() {
                    Event.$emit('get_data', this.house);
                },
                //重置重置表单函数
                reset: function () {
                    this.house = {};
                }
            }
        }
    );

    var app = new Vue({
        el: '#root',
        data: {
            mssage: '',
            row: {
                page: 1,
            },
            house: {},
            list: [],
            data_number: '',
        },
        mounted: function () {
            this.read();
            this.get_data_number();
            var me = this;
            Event.$on('get_data', function (data) {
                me.house = data;
                me.add();
            })
        },
        methods: {
            //获取表中数据的总数
            get_data_number: function () {
                axios.post('/a/house/number')
                    .then((r) => {
                        this.data_number = r.data;
                    })
            },
            read: function () {
                axios.post('/a/house/read', this.row)
                    .then((r) => {
                        if (r.data.success) {
                            this.list = r.data.data.data;
                        }
                    })
            },
            add: function () {
                if (this.house.id) {
                    axios.post('/a/house/update', this.house)
                        .then((r) => {
                            if (r.data.success) {
                                this.read();
                                Event.$emit('this_success');
                            }
                        })
                } else {
                    axios.post('/a/house/add', this.house)
                        .then((r) => {
                            if (r.data.success) {
                                this.read();
                                Event.$emit('this_success');
                            }
                        })
                }
            },
            del: function (id) {
                axios.post('/a/house/remove', {'id': id})
                    .then((r) => {
                        if (r.data.success) {
                            this.read();
                        }
                    })
            },
            update: function (data) {
                Event.$emit('get_and_render', data);
            },
            //上下翻页
            next_page: function () {
                if (this.row.page < Math.ceil((this.data_number) / 10)) {
                    this.row.page++;
                    this.read();
                }
                return;
            },
            top_page: function () {
                if (this.row.page < 2) {
                    return;
                } else {
                    this.row.page--;
                    this.read();
                }
            },
            //重置
            reset: function () {
                this.row = {};
            }
        }
    })

})();